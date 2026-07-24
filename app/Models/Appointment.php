<?php
// app/Models/Appointment.php

require_once __DIR__ . '/../../config/database.php';

class Appointment
{
    private Database $db;
    private string $table = 'appointments';

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
        // FIXED: Use eq. format for Supabase
        $result = $this->db->select($this->table, ['id' => 'eq.' . $id]);
        return !empty($result) ? $result[0] : null;
    }

    public function findByAppointmentId(string $appointmentId): ?array
    {
        // FIXED: Use eq. format for Supabase
        $result = $this->db->select($this->table, ['appointment_id' => 'eq.' . $appointmentId]);
        return !empty($result) ? $result[0] : null;
    }

    public function create(array $data): array
    {
        if (empty($data['appointment_id'])) {
            $data['appointment_id'] = $this->generateAppointmentId();
        }
        // FIXED: Use service key
        return $this->db->insert($this->table, $data, true);
    }

    public function updateById(string|int $id, array $data): array
    {
        // FIXED: Use eq. format + service key
        return $this->db->update($this->table, $data, ['id' => 'eq.' . $id], true);
    }

    public function updateStatus(string|int $id, string $status): array
    {
        // FIXED: Use eq. format + service key
        return $this->db->update($this->table, ['status' => $status], ['id' => 'eq.' . $id], true);
    }

    public function deleteById(string|int $id): bool
    {
        // FIXED: Use eq. format + service key
        $this->db->delete($this->table, ['id' => 'eq.' . $id], true);
        return true;
    }

    public function generateAppointmentId(): string
    {
        try {
            $all = $this->all();
            $maxNum = 0;
            foreach ($all as $a) {
                if (!empty($a['appointment_id']) && preg_match('/APT-(\d+)/i', $a['appointment_id'], $matches)) {
                    $num = (int)$matches[1];
                    if ($num > $maxNum) {
                        $maxNum = $num;
                    }
                }
            }
            $nextNum = $maxNum + 1;
            return 'APT-' . str_pad((string)$nextNum, 4, '0', STR_PAD_LEFT);
        } catch (Throwable $e) {
            return 'APT-' . date('YmdHis') . '-' . rand(100, 999);
        }
    }
}