<?php
// app/Controllers/TriageController.php

require_once __DIR__ . '/../../Core/BaseController.php';
require_once __DIR__ . '/../Models/Triage.php';
require_once __DIR__ . '/../Models/Patient.php';
require_once __DIR__ . '/../Models/Employee.php';

class TriageController extends BaseController
{
    private Triage $triageModel;
    private Patient $patientModel;
    private Employee $employeeModel;

    public function __construct()
    {
        $this->triageModel = new Triage();
        $this->patientModel = new Patient();
        $this->employeeModel = new Employee();
    }

    public function index(): void
{
    $page = isset($_GET['page']) ? max(1, (int)$_GET['page']) : 1;
    $limit = isset($_GET['limit']) ? max(1, (int)$_GET['limit']) : 1000;

    $rawTriage = $this->triageModel->all(['order' => 'created_at.desc']);
    $patientsMap = $this->getPatientsMap();
    $employeesMap = $this->getEmployeesMap();

    $triageList = array_map(function ($t) use ($patientsMap, $employeesMap) {
        return $this->enrichTriage($t, $patientsMap, $employeesMap);
    }, $rawTriage);

    $total = count($triageList);
    $totalPages = max(1, (int)ceil($total / $limit));
    if ($page > $totalPages) $page = $totalPages;
    $offset = ($page - 1) * $limit;
    $paginated = array_slice($triageList, $offset, $limit);

    $this->handle(function() use ($paginated, $total, $page, $totalPages, $limit) {
        return [
            'success' => true,
            'data' => $paginated,
            'total' => $total,
            'page' => $page,
            'total_pages' => $totalPages,
            'limit' => $limit
        ];
    });
}

    public function show(string|int $id): void
    {
        $triage = $this->triageModel->find($id);

        $this->handle(function() use ($triage) {
            if (!$triage) {
                return [
                    'success' => false,
                    'message' => 'Triage record not found',
                    'code' => 404
                ];
            }

            $patientsMap = $this->getPatientsMap();
            $employeesMap = $this->getEmployeesMap();

            return [
                'success' => true,
                'data' => $this->enrichTriage($triage, $patientsMap, $employeesMap)
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

            if (empty($data['priority'])) {
                return [
                    'success' => false,
                    'message' => 'Priority level is required',
                    'code' => 400
                ];
            }

            $dbData = $this->prepareDbData($data);

            if (empty($dbData['triage_id'])) {
                $dbData['triage_id'] = $this->triageModel->generateTriageId();
            }

            $result = $this->triageModel->create($dbData);

            return [
                'success' => true,
                'message' => 'Triage record created successfully',
                'data' => $result,
                'code' => 201
            ];
        });
    }

    public function update(string|int $id): void
    {
        $data = $this->input();

        $this->handle(function() use ($id, $data) {
            $existing = $this->triageModel->find($id);
            if (!$existing) {
                return [
                    'success' => false,
                    'message' => 'Triage record not found',
                    'code' => 404
                ];
            }

            $dbData = $this->prepareDbData($data);
            $result = $this->triageModel->updateById($id, $dbData);

            return [
                'success' => true,
                'message' => 'Triage record updated successfully',
                'data' => $result
            ];
        });
    }

    public function updateStatus(string|int $id): void
    {
        $data = $this->input();
        $status = $data['status'] ?? $_GET['status'] ?? null;

        $this->handle(function() use ($id, $status) {
            if (!$status || !in_array($status, ['pending', 'triaged', 'consulted', 'cancelled'])) {
                return [
                    'success' => false,
                    'message' => 'Invalid status value provided',
                    'code' => 400
                ];
            }

            $existing = $this->triageModel->find($id);
            if (!$existing) {
                return [
                    'success' => false,
                    'message' => 'Triage record not found',
                    'code' => 404
                ];
            }

            $result = $this->triageModel->updateStatus($id, $status);

            return [
                'success' => true,
                'message' => 'Triage status updated to ' . $status,
                'data' => $result
            ];
        });
    }

    public function destroy(string|int $id): void
    {
        $this->handle(function() use ($id) {
            $existing = $this->triageModel->find($id);
            if (!$existing) {
                return [
                    'success' => false,
                    'message' => 'Triage record not found',
                    'code' => 404
                ];
            }

            $success = $this->triageModel->deleteById($id);

            return [
                'success' => $success,
                'message' => $success ? 'Triage record deleted successfully' : 'Failed to delete triage record'
            ];
        });
    }

    private function prepareDbData(array $data): array
    {
        $dbData = [];

        if (isset($data['triage_id'])) $dbData['triage_id'] = trim((string)$data['triage_id']);
        if (isset($data['patient_id'])) $dbData['patient_id'] = (int)$data['patient_id'];
        if (isset($data['nurse_id'])) $dbData['nurse_id'] = (int)$data['nurse_id'];
        else $dbData['nurse_id'] = 1; // Default nurse ID if omitted

        if (isset($data['blood_pressure'])) $dbData['blood_pressure'] = trim((string)$data['blood_pressure']);
        if (isset($data['heart_rate']) && $data['heart_rate'] !== '') $dbData['heart_rate'] = (int)$data['heart_rate'];
        if (isset($data['temperature']) && $data['temperature'] !== '') $dbData['temperature'] = (float)$data['temperature'];
        if (isset($data['respiratory_rate']) && $data['respiratory_rate'] !== '') $dbData['respiratory_rate'] = (int)$data['respiratory_rate'];
        if (isset($data['oxygen_saturation']) && $data['oxygen_saturation'] !== '') $dbData['oxygen_saturation'] = (int)$data['oxygen_saturation'];
        if (isset($data['weight']) && $data['weight'] !== '') $dbData['weight'] = (float)$data['weight'];
        if (isset($data['height']) && $data['height'] !== '') $dbData['height'] = (float)$data['height'];
if (isset($data['blood_sugar']) && $data['blood_sugar'] !== '') $dbData['blood_sugar'] = (float)$data['blood_sugar'];
if (isset($data['blood_sugar_type'])) $dbData['blood_sugar_type'] = trim((string)$data['blood_sugar_type']);
if (isset($data['gcs_eye'])) $dbData['gcs_eye'] = (int)$data['gcs_eye'];
if (isset($data['gcs_verbal'])) $dbData['gcs_verbal'] = (int)$data['gcs_verbal'];
if (isset($data['gcs_motor'])) $dbData['gcs_motor'] = (int)$data['gcs_motor'];

        if (isset($data['symptoms'])) {
            $dbData['symptoms'] = is_array($data['symptoms']) ? implode(', ', $data['symptoms']) : trim((string)$data['symptoms']);
        }
        if (isset($data['priority'])) $dbData['priority'] = strtolower(trim((string)$data['priority']));
        if (isset($data['allergies'])) $dbData['allergies'] = trim((string)$data['allergies']);
        if (isset($data['medications'])) $dbData['medications'] = trim((string)$data['medications']);
        if (isset($data['notes'])) $dbData['notes'] = trim((string)$data['notes']);
        if (isset($data['chief_complaint']) && !isset($dbData['notes'])) {
            $dbData['notes'] = trim((string)$data['chief_complaint']);
        }
        if (isset($data['consultation_id']) && $data['consultation_id'] !== '') $dbData['consultation_id'] = (int)$data['consultation_id'];
        if (isset($data['status'])) $dbData['status'] = strtolower(trim((string)$data['status']));

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

    private function enrichTriage(array $triage, array $patientsMap, array $employeesMap): array
    {
        $patientId = $triage['patient_id'] ?? null;
        $patient = $patientsMap[$patientId] ?? null;

        if ($patient) {
            $firstName = $patient['first_name'] ?? '';
            $lastName = $patient['last_name'] ?? '';
            $patientName = trim($firstName . ' ' . $lastName);
            if (empty($patientName)) {
                $patientName = $patient['name'] ?? ('Patient #' . $patientId);
            }
            $triage['patient_name'] = $patientName;
            $triage['patient_code'] = $patient['patient_id'] ?? ('P-' . $patientId);
            $triage['gender'] = $patient['gender'] ?? 'Unspecified';

            if (isset($patient['birth_date'])) {
                try {
                    $dob = new DateTime($patient['birth_date']);
                    $now = new DateTime();
                    $triage['age'] = $now->diff($dob)->y;
                } catch (Throwable $e) {
                    $triage['age'] = $patient['age'] ?? 'N/A';
                }
            } else {
                $triage['age'] = $patient['age'] ?? 'N/A';
            }

            // Generate avatar initials
            $parts = explode(' ', $patientName);
            $initials = '';
            foreach ($parts as $p) {
                if (!empty($p)) $initials .= strtoupper($p[0]);
            }
            $triage['patient_avatar'] = substr($initials, 0, 2) ?: 'P';
        } else {
            $triage['patient_name'] = 'Patient #' . ($patientId ?? 'N/A');
            $triage['patient_code'] = 'P-' . ($patientId ?? '00');
            $triage['gender'] = 'Unspecified';
            $triage['age'] = 'N/A';
            $triage['patient_avatar'] = 'P';
        }

        $nurseId = $triage['nurse_id'] ?? null;
        $nurse = $employeesMap[$nurseId] ?? null;
        if ($nurse) {
            $nurseName = trim(($nurse['first_name'] ?? '') . ' ' . ($nurse['last_name'] ?? ''));
            $triage['nurse_name'] = !empty($nurseName) ? 'Nurse ' . $nurseName : ($nurse['name'] ?? 'Nurse #' . $nurseId);
        } else {
            $triage['nurse_name'] = 'Nurse #' . ($nurseId ?? '1');
        }

        // Parse symptoms into array if string
        if (isset($triage['symptoms']) && is_string($triage['symptoms'])) {
            $symptomsArr = array_filter(array_map('trim', explode(',', $triage['symptoms'])));
            $triage['symptoms_list'] = array_values($symptomsArr);
        } else {
            $triage['symptoms_list'] = is_array($triage['symptoms'] ?? null) ? $triage['symptoms'] : [];
        }

        $triage['chief_complaint'] = $triage['notes'] ?? '';

        return $triage;
    }
}
