<?php
// app/Models/Triage.php

require_once __DIR__ . '/../../config/database.php';

class Triage
{
    private Database $db;
    private string $table = 'triage';

    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    public function all(array $options = []): array
    {
        if (empty($options['order'])) {
            $options['order'] = 'created_at.desc';
        }
        try {
            return $this->db->select($this->table, [], $options);
        } catch (Throwable $e) {
            error_log('Triage Model Error (all): ' . $e->getMessage());
            return [];
        }
    }

    public function find(string|int $id): ?array
    {
        try {
            $result = $this->db->select($this->table, ['id' => $id]);
            return !empty($result) ? $result[0] : null;
        } catch (Throwable $e) {
            error_log('Triage Model Error (find): ' . $e->getMessage());
            return null;
        }
    }

    public function findByTriageId(string $triageId): ?array
    {
        try {
            $result = $this->db->select($this->table, ['triage_id' => $triageId]);
            return !empty($result) ? $result[0] : null;
        } catch (Throwable $e) {
            error_log('Triage Model Error (findByTriageId): ' . $e->getMessage());
            return null;
        }
    }

    public function getByPatientId(string|int $patientId): array
    {
        try {
            return $this->db->select($this->table, ['patient_id' => $patientId], ['order' => 'created_at.desc']);
        } catch (Throwable $e) {
            error_log('Triage Model Error (getByPatientId): ' . $e->getMessage());
            return [];
        }
    }

    public function create(array $data): array
    {
        if (empty($data['triage_id'])) {
            $data['triage_id'] = $this->generateTriageId();
        }
        if (empty($data['status'])) {
            $data['status'] = 'pending';
        }
        return $this->db->insert($this->table, $data);
    }

    public function updateById(string|int $id, array $data): array
    {
        return $this->db->update($this->table, $data, ['id' => $id]);
    }

    public function updateStatus(string|int $id, string $status): array
    {
        return $this->db->update($this->table, ['status' => $status], ['id' => $id]);
    }

    public function deleteById(string|int $id): bool
    {
        try {
            $this->db->delete($this->table, ['id' => $id]);
            return true;
        } catch (Throwable $e) {
            error_log('Triage Model Error (deleteById): ' . $e->getMessage());
            return false;
        }
    }

    public function generateTriageId(): string
    {
        try {
            $all = $this->all(['limit' => 1000]);
            $maxNum = 0;
            foreach ($all as $t) {
                if (!empty($t['triage_id']) && preg_match('/TRG-(\d+)/i', $t['triage_id'], $matches)) {
                    $num = (int)$matches[1];
                    if ($num > $maxNum) {
                        $maxNum = $num;
                    }
                }
            }
            $nextNum = $maxNum + 1;
            return 'TRG-' . str_pad((string)$nextNum, 4, '0', STR_PAD_LEFT);
        } catch (Throwable $e) {
            return 'TRG-' . date('YmdHis') . '-' . rand(100, 999);
        }
    }
}
