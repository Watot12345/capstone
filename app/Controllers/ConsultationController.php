<?php
// app/Controllers/ConsultationController.php

require_once __DIR__ . '/../../Core/BaseController.php';
require_once __DIR__ . '/../Models/Consultation.php';
require_once __DIR__ . '/../Models/Patient.php';
require_once __DIR__ . '/../Models/Employee.php';
require_once __DIR__ . '/../Models/Appointment.php';

class ConsultationController extends BaseController
{
    private Consultation $consultationModel;
    private Patient $patientModel;
    private Employee $employeeModel;
    private Appointment $appointmentModel;

    public function __construct()
    {
        $this->consultationModel = new Consultation();
        $this->patientModel = new Patient();
        $this->employeeModel = new Employee();
        $this->appointmentModel = new Appointment();
    }

    public function index(): void
    {
        $rawConsultations = $this->consultationModel->all(['order' => 'date.desc,created_at.desc']);
        $patientsMap = $this->getPatientsMap();
        $employeesMap = $this->getEmployeesMap();

        $consultations = array_map(function ($c) use ($patientsMap, $employeesMap) {
            return $this->enrichConsultation($c, $patientsMap, $employeesMap);
        }, $rawConsultations);

        $this->handle(function() use ($consultations) {
            return [
                'success' => true,
                'data' => $consultations,
                'total' => count($consultations)
            ];
        });
    }

    public function show(string $id): void
    {
        $consultation = $this->consultationModel->find($id);
        
        $this->handle(function() use ($consultation) {
            if (!$consultation) {
                return [
                    'success' => false,
                    'message' => 'Consultation not found',
                    'code' => 404
                ];
            }

            $patientsMap = $this->getPatientsMap();
            $employeesMap = $this->getEmployeesMap();
            
            return [
                'success' => true,
                'data' => $this->enrichConsultation($consultation, $patientsMap, $employeesMap)
            ];
        });
    }

    public function store(): void
    {
        $data = $this->input();

        $this->handle(function() use ($data) {
            if (empty($data['patient_id'])) {
                return [
                    'success' => false,
                    'message' => 'Patient selection is required',
                    'code' => 400
                ];
            }

            $dbData = $this->prepareDbData($data);

            if (empty($dbData['consultation_id'])) {
                $dbData['consultation_id'] = $this->consultationModel->generateConsultationId();
            }

            $result = $this->consultationModel->create($dbData);

            // If appointment_id is linked, update appointment status to completed
            if (!empty($dbData['appointment_id'])) {
                try {
                    $this->appointmentModel->updateStatus($dbData['appointment_id'], 'completed');
                } catch (Throwable $e) {
                    error_log('Failed to update appointment status: ' . $e->getMessage());
                }
            }

            return [
                'success' => true,
                'message' => 'Consultation created successfully',
                'data' => $result,
                'code' => 201
            ];
        });
    }

    public function update(string $id): void
    {
        $data = $this->input();

        $this->handle(function() use ($id, $data) {
            $consultation = $this->consultationModel->find($id);
            if (!$consultation) {
                return [
                    'success' => false,
                    'message' => 'Consultation not found',
                    'code' => 404
                ];
            }

            $dbData = $this->prepareDbData($data, true);
            $result = $this->consultationModel->updateById($id, $dbData);

            return [
                'success' => true,
                'message' => 'Consultation updated successfully',
                'data' => $result
            ];
        });
    }

    public function destroy(string $id): void
    {
        $this->handle(function() use ($id) {
            $consultation = $this->consultationModel->find($id);
            if (!$consultation) {
                return [
                    'success' => false,
                    'message' => 'Consultation not found',
                    'code' => 404
                ];
            }

            $success = $this->consultationModel->deleteById($id);

            return [
                'success' => $success,
                'message' => $success ? 'Consultation deleted successfully' : 'Failed to delete consultation'
            ];
        });
    }

    public function search(): void
    {
        $query = strtolower($_GET['q'] ?? '');

        $this->handle(function() use ($query) {
            if (empty($query)) {
                return [
                    'success' => false,
                    'message' => 'Search query is required',
                    'code' => 400
                ];
            }

            $rawConsultations = $this->consultationModel->all();
            $patientsMap = $this->getPatientsMap();
            $employeesMap = $this->getEmployeesMap();

            $enriched = array_map(fn($c) => $this->enrichConsultation($c, $patientsMap, $employeesMap), $rawConsultations);

            $results = array_values(array_filter($enriched, function($c) use ($query) {
                return str_contains(strtolower($c['patient_name'] ?? ''), $query) ||
                       str_contains(strtolower($c['consultation_id'] ?? ''), $query) ||
                       str_contains(strtolower($c['diagnosis'] ?? ''), $query) ||
                       str_contains(strtolower($c['icd_code'] ?? ''), $query) ||
                       str_contains(strtolower($c['symptoms'] ?? ''), $query) ||
                       str_contains(strtolower($c['doctor_name'] ?? ''), $query);
            }));

            return [
                'success' => true,
                'data' => $results,
                'total' => count($results)
            ];
        });
    }

    private function prepareDbData(array $data, bool $isUpdate = false): array
    {
        $dbData = [];

        if (isset($data['consultation_id'])) {
            $dbData['consultation_id'] = trim($data['consultation_id']);
        }
        if (isset($data['patient_id'])) {
            $dbData['patient_id'] = (int)$data['patient_id'];
        }
        if (isset($data['employee_id'])) {
            $dbData['employee_id'] = (int)$data['employee_id'];
        } elseif (!$isUpdate && empty($dbData['employee_id'])) {
            // Default fallback employee_id if none specified
            $dbData['employee_id'] = 1;
        }

        if (isset($data['appointment_id']) && $data['appointment_id'] !== '') {
            $dbData['appointment_id'] = (int)$data['appointment_id'];
        } elseif (!$isUpdate) {
            $dbData['appointment_id'] = null;
        }

        if (isset($data['date'])) {
            $dbData['date'] = $data['date'];
        } elseif (!$isUpdate) {
            $dbData['date'] = date('Y-m-d');
        }

        if (isset($data['time'])) {
            $dbData['time'] = $data['time'];
        } elseif (!$isUpdate) {
            $dbData['time'] = date('H:i:s');
        }

        if (isset($data['diagnosis'])) {
            $dbData['diagnosis'] = trim($data['diagnosis']);
        }
        if (isset($data['icd_code'])) {
            $dbData['icd_code'] = trim($data['icd_code']);
        }
        if (isset($data['symptoms'])) {
            $dbData['symptoms'] = trim($data['symptoms']);
        }

        if (isset($data['vital_signs'])) {
            if (is_array($data['vital_signs'])) {
                $dbData['vital_signs'] = json_encode($data['vital_signs']);
            } else {
                $dbData['vital_signs'] = $data['vital_signs'];
            }
        }

        if (isset($data['treatment_plan'])) {
            $dbData['treatment_plan'] = trim($data['treatment_plan']);
        } elseif (isset($data['treatment'])) {
            $dbData['treatment_plan'] = trim($data['treatment']);
        }

        if (isset($data['notes'])) {
            $dbData['notes'] = trim($data['notes']);
        }

        if (isset($data['follow_up_date']) && !empty($data['follow_up_date'])) {
            $dbData['follow_up_date'] = $data['follow_up_date'];
        } elseif (array_key_exists('follow_up_date', $data) && empty($data['follow_up_date'])) {
            $dbData['follow_up_date'] = null;
        }

        if (isset($data['status'])) {
            $status = strtolower(trim($data['status']));
            // Enforce database check constraint: status IN ('completed', 'referred')
            if (in_array($status, ['completed', 'referred'])) {
                $dbData['status'] = $status;
            } else {
                $dbData['status'] = 'completed';
            }
        } elseif (!$isUpdate) {
            $dbData['status'] = 'completed';
        }

        $dbData['updated_at'] = date('Y-m-d H:i:sP');

        return $dbData;
    }

    private function getPatientsMap(): array
    {
        try {
            $patients = $this->patientModel->all();
            $map = [];
            foreach ($patients as $p) {
                if (isset($p['id'])) {
                    $map[$p['id']] = $p;
                }
            }
            return $map;
        } catch (Throwable $e) {
            return [];
        }
    }

    private function getEmployeesMap(): array
    {
        try {
            $employees = $this->employeeModel->all();
            $map = [];
            foreach ($employees as $e) {
                if (isset($e['id'])) {
                    $map[$e['id']] = $e;
                }
            }
            return $map;
        } catch (Throwable $e) {
            return [];
        }
    }

    private function enrichConsultation(array $c, array $patientsMap, array $employeesMap): array
    {
        $patientId = $c['patient_id'] ?? null;
        $patient = $patientsMap[$patientId] ?? null;

        if ($patient) {
            $firstName = $patient['first_name'] ?? '';
            $lastName = $patient['last_name'] ?? '';
            $patientName = trim("$firstName $lastName");
            $patientCode = $patient['patient_id'] ?? "P-$patientId";

            $initials = '';
            if (!empty($firstName)) $initials .= strtoupper(substr($firstName, 0, 1));
            if (!empty($lastName)) $initials .= strtoupper(substr($lastName, 0, 1));
            $avatar = !empty($initials) ? $initials : 'PT';
        } else {
            $patientName = "Patient #{$patientId}";
            $patientCode = "P-{$patientId}";
            $avatar = "PT";
        }

        $employeeId = $c['employee_id'] ?? null;
        $employee = $employeesMap[$employeeId] ?? null;

        if ($employee) {
            $docFirst = $employee['first_name'] ?? '';
            $docLast = $employee['last_name'] ?? '';
            $docTitle = $employee['title'] ?? $employee['role'] ?? 'Dr.';
            $doctorName = trim("$docTitle $docFirst $docLast");
            if (empty(trim("$docFirst $docLast"))) {
                $doctorName = $employee['name'] ?? $employee['username'] ?? "Employee #{$employeeId}";
            }
        } else {
            $doctorName = "Dr. Elena Santos"; // Default doctor display if employee ID matches system default
        }

        // Parse vital signs if JSON
        $vitalSigns = $c['vital_signs'] ?? null;
        if (is_string($vitalSigns)) {
            $decoded = json_decode($vitalSigns, true);
            if (json_last_error() === JSON_ERROR_NONE) {
                $vitalSigns = $decoded;
            }
        }

        return [
            'id' => (int)($c['id'] ?? 0),
            'consultation_id' => $c['consultation_id'] ?? '',
            'patient_id' => (int)($c['patient_id'] ?? 0),
            'patient_name' => $patientName,
            'patient_code' => $patientCode,
            'patient_avatar' => $avatar,
            'employee_id' => (int)($c['employee_id'] ?? 0),
            'doctor_name' => $doctorName,
            'appointment_id' => !empty($c['appointment_id']) ? (int)$c['appointment_id'] : null,
            'date' => $c['date'] ?? '',
            'time' => !empty($c['time']) ? substr($c['time'], 0, 8) : '',
            'diagnosis' => $c['diagnosis'] ?? '',
            'icd_code' => $c['icd_code'] ?? '',
            'symptoms' => $c['symptoms'] ?? '',
            'vital_signs' => $vitalSigns,
            'treatment_plan' => $c['treatment_plan'] ?? ($c['treatment'] ?? ''),
            'treatment' => $c['treatment_plan'] ?? ($c['treatment'] ?? ''),
            'notes' => $c['notes'] ?? '',
            'follow_up_date' => $c['follow_up_date'] ?? null,
            'follow_up' => $c['follow_up_date'] ?? null,
            'status' => $c['status'] ?? 'completed',
            'created_at' => $c['created_at'] ?? '',
            'updated_at' => $c['updated_at'] ?? ''
        ];
    }
}
