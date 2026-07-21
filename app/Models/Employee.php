<?php
// app/Models/Employee.php

require_once __DIR__ . '/../../config/database.php';

class Employee
{
    private Database $db;
    private string $table = 'employees';

    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    public function all(array $options = []): array
    {
        try {
            return $this->db->select($this->table, [], $options);
        } catch (Throwable $e) {
            // Fallback to users table if employees table is not directly accessible or missing
            try {
                return $this->db->select('users', [], $options);
            } catch (Throwable $e2) {
                return [];
            }
        }
    }

    public function find(string|int $id): ?array
    {
        try {
            $result = $this->db->select($this->table, ['id' => $id]);
            return !empty($result) ? $result[0] : null;
        } catch (Throwable $e) {
            try {
                $result = $this->db->select('users', ['id' => $id]);
                return !empty($result) ? $result[0] : null;
            } catch (Throwable $e2) {
                return null;
            }
        }
    }
}
