<?php
// app/Controllers/PatientController.php

require_once __DIR__ . '/../../Core/BaseController.php';
require_once __DIR__ . '/../Models/Patient.php';

class PatientController extends BaseController
{
    private Patient $patientModel;
    
    public function __construct()
    {
        $this->patientModel = new Patient();
    }
    
    public function index(): void
    {
        // Add order via options if supported by db layer. For now, fetch all.
        $patients = $this->patientModel->all(['order' => 'created_at.desc']);
        
        // Map DB fields to what frontend expects
        $patients = array_map([$this, 'mapToFrontend'], $patients);
        
        $this->handle(function() use ($patients) {
            return [
                'success' => true,
                'data' => $patients,
                'total' => count($patients)
            ];
        });
    }
    
    public function show(string $id): void
    {
        $patient = $this->patientModel->find($id);
        
        $this->handle(function() use ($patient) {
            if (!$patient) {
                return [
                    'success' => false,
                    'message' => 'Patient not found',
                    'code' => 404
                ];
            }
            
            return [
                'success' => true,
                'data' => $this->mapToFrontend($patient)
            ];
        });
    }
    
    public function store(): void
    {
        $data = $this->input();
        
        $this->handle(function() use ($data) {
            // Check if patient ID already exists
            if (!empty($data['patient_id']) && $this->patientModel->findByPatientId($data['patient_id'])) {
                return [
                    'success' => false,
                    'message' => 'Patient ID already exists',
                    'code' => 409
                ];
            }
            
            // Map frontend fields to DB schema
            $dbData = $this->mapToDb($data);
            
            // Set default values
            $dbData['registration_date'] = $dbData['registration_date'] ?? date('Y-m-d');
            $dbData['status'] = $dbData['status'] ?? 'active';
            
            $result = $this->patientModel->create($dbData);
            
            return [
                'success' => true,
                'message' => 'Patient created successfully',
                'data' => $result,
                'code' => 201
            ];
        });
    }
    
    public function update(string $id): void
    {
        $data = $this->input();
        
        $this->handle(function() use ($id, $data) {
            $patient = $this->patientModel->find($id);
            if (!$patient) {
                return [
                    'success' => false,
                    'message' => 'Patient not found',
                    'code' => 404
                ];
            }
            
            // Map frontend fields to DB schema
            $dbData = $this->mapToDb($data);
            $result = $this->patientModel->updateById($id, $dbData);
            
            return [
                'success' => true,
                'message' => 'Patient updated successfully',
                'data' => $result
            ];
        });
    }
    
    public function destroy(string $id): void
    {
        $this->handle(function() use ($id) {
            $patient = $this->patientModel->find($id);
            if (!$patient) {
                return [
                    'success' => false,
                    'message' => 'Patient not found',
                    'code' => 404
                ];
            }
            
            $success = $this->patientModel->deleteById($id);
            
            return [
                'success' => $success,
                'message' => $success ? 'Patient deleted successfully' : 'Failed to delete patient'
            ];
        });
    }
    
    public function search(): void
    {
        $query = $_GET['q'] ?? '';
        
        $this->handle(function() use ($query) {
            if (empty($query)) {
                return [
                    'success' => false,
                    'message' => 'Search query is required',
                    'code' => 400
                ];
            }
            
            $results = $this->patientModel->search($query);
            $results = array_map([$this, 'mapToFrontend'], $results);
            
            return [
                'success' => true,
                'data' => $results,
                'total' => count($results)
            ];
        });
    }

    private function mapToFrontend(array $patient): array
    {
        // Calculate age if missing
        if (!isset($patient['age']) && isset($patient['birth_date'])) {
            $dob = new DateTime($patient['birth_date']);
            $now = new DateTime();
            $patient['age'] = $now->diff($dob)->y;
        }
        
        // Extract conditions from medical_history jsonb
        if (isset($patient['medical_history'])) {
            $history = is_string($patient['medical_history']) 
                ? json_decode($patient['medical_history'], true) 
                : $patient['medical_history'];
            $patient['conditions'] = $history['conditions'] ?? 'None';
        } else {
            $patient['conditions'] = 'None';
        }
        
        // Ensure last_visit is present
        if (!isset($patient['last_visit'])) {
            $patient['last_visit'] = isset($patient['updated_at']) 
                ? substr($patient['updated_at'], 0, 10) 
                : date('Y-m-d');
        }
        
        return $patient;
    }

    private function mapToDb(array $data): array
    {
        $dbData = $data;
        
        // If age is provided but no birth_date, estimate birth_date
        if (!empty($data['age']) && empty($data['birth_date'])) {
            $age = (int)$data['age'];
            $dbData['birth_date'] = date('Y-m-d', strtotime("-$age years"));
        }
        unset($dbData['age']); // Not in DB schema
        
        // Map conditions to medical_history jsonb
        if (isset($data['conditions'])) {
            $dbData['medical_history'] = json_encode(['conditions' => $data['conditions']]);
            unset($dbData['conditions']);
        }
        
        unset($dbData['last_visit']); // Not in DB schema
        
        return $dbData;
    }
}
