<?php
// app/Models/Patient.php

require_once __DIR__ . '/../../config/database.php';

class Patient
{
    private Database $db;
    private string $table = 'patients';

    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    public function all(array $options = []): array
    {
        return $this->db->select($this->table, [], $options);
    }

    public function find(string $id): ?array
    {
        $result = $this->db->select($this->table, ['id' => 'eq.' . $id]);
        return !empty($result) ? $result[0] : null;
    }

    public function findByPatientId(string $patientId): ?array
    {
        $result = $this->db->select($this->table, ['patient_id' => 'eq.' . $patientId]);
        return !empty($result) ? $result[0] : null;
    }

    public function create(array $data): array
    {
        return $this->db->insert($this->table, $data, true);
    }

    public function updateById(string $id, array $data): array
    {
        return $this->db->update($this->table, $data, ['id' => 'eq.' . $id], true);
    }

    public function deleteById(string $id): bool
    {
        $this->db->delete($this->table, ['id' => 'eq.' . $id], true);
        return true;
    }

    public function search(string $query): array
    {
        $all = $this->all();
        $query = strtolower($query);
        return array_values(array_filter($all, function($p) use ($query) {
            return str_contains(strtolower($p['first_name'] ?? ''), $query) ||
                   str_contains(strtolower($p['last_name'] ?? ''), $query) ||
                   str_contains(strtolower($p['patient_id'] ?? ''), $query) ||
                   str_contains(strtolower($p['barangay'] ?? ''), $query);
        }));
    }
}