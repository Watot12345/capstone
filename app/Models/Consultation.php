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
        if (empty($options['order'])) {
            $options['order'] = 'created_at.desc';
        }
        return $this->db->select($this->table, [], $options);
    }

    public function find(string|int $id): ?array
    {
        $result = $this->db->select($this->table, ['id' => $id]);
        return !empty($result) ? $result[0] : null;
    }

    public function findByConsultationId(string $consultationId): ?array
    {
        $result = $this->db->select($this->table, ['consultation_id' => $consultationId]);
        return !empty($result) ? $result[0] : null;
    }

    public function getByPatientId(string|int $patientId): array
    {
        return $this->db->select($this->table, ['patient_id' => $patientId], ['order' => 'created_at.desc']);
    }

    public function create(array $data): array
    {
        if (empty($data['consultation_id'])) {
            $data['consultation_id'] = $this->generateConsultationId();
        }
        return $this->db->insert($this->table, $data);
    }

    public function updateById(string|int $id, array $data): array
    {
        return $this->db->update($this->table, $data, ['id' => $id]);
    }

    public function deleteById(string|int $id): bool
    {
        $this->db->delete($this->table, ['id' => $id]);
        return true;
    }

    public function generateConsultationId(): string
    {
        try {
            $all = $this->all(['limit' => 1000]);
            $maxNum = 0;
            foreach ($all as $c) {
                if (!empty($c['consultation_id']) && preg_match('/CNS-(\d+)/i', $c['consultation_id'], $matches)) {
                    $num = (int)$matches[1];
                    if ($num > $maxNum) {
                        $maxNum = $num;
                    }
                }
            }
            $nextNum = $maxNum + 1;
            return 'CNS-' . str_pad((string)$nextNum, 4, '0', STR_PAD_LEFT);
        } catch (Throwable $e) {
            return 'CNS-' . date('YmdHis') . '-' . rand(100, 999);
        }
    }
}
