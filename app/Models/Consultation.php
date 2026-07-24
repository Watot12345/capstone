<?php
// app/Models/Consultation.php

require_once __DIR__ . '/../../config/database.php';

class Consultation
{
    private Database $db;
    private string $table = 'consultations';

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

    public function generateConsultationId(): string
    {
        try {
            $all = $this->all();
            $maxNum = 0;
            foreach ($all as $c) {
                if (!empty($c['consultation_id']) && preg_match('/CONS-(\d+)/i', $c['consultation_id'], $matches)) {
                    $num = (int)$matches[1];
                    if ($num > $maxNum) $maxNum = $num;
                }
            }
            return 'CONS-' . str_pad((string)($maxNum + 1), 4, '0', STR_PAD_LEFT);
        } catch (Throwable $e) {
            return 'CONS-' . date('YmdHis') . '-' . rand(100, 999);
        }
    }
}