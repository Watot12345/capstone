<?php
// app/Models/MedicalRecord.php

require_once __DIR__ . '/../../config/database.php';

class MedicalRecord
{
    private Database $db;
    private string $table = 'medical_records';

    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    public function all(array $options = []): array
    {
        return $this->db->select($this->table, [], $options);
    }

    public function find(string|int $id): ?array
    {
        $result = $this->db->select($this->table, ['id' => 'eq.' . $id]);
        return !empty($result) ? $result[0] : null;
    }

    public function create(array $data): array
    {
        return $this->db->insert($this->table, $data, true);
    }

    public function updateById(string|int $id, array $data): array
    {
        return $this->db->update($this->table, $data, ['id' => 'eq.' . $id], true);
    }

    public function deleteById(string|int $id): bool
    {
        $this->db->delete($this->table, ['id' => 'eq.' . $id], true);
        return true;
    }
}
