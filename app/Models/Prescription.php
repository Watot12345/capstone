<?php

require_once __DIR__ . '/../../config/database.php';

class Prescription
{
    private Database $db;
    private string $table = 'prescriptions';

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

    public function create(array $data): array
    {
        if (empty($data['prescription_id'])) {
            $data['prescription_id'] = $this->generatePrescriptionId();
        }
        if (empty($data['status'])) {
            $data['status'] = 'pending';
        }
        // Encode medications if it's an array
        if (isset($data['medications']) && is_array($data['medications'])) {
            $data['medications'] = json_encode($data['medications']);
        }
        return $this->db->insert($this->table, $data);
    }

    public function updateById(string|int $id, array $data): array
    {
        // Encode medications if it's an array
        if (isset($data['medications']) && is_array($data['medications'])) {
            $data['medications'] = json_encode($data['medications']);
        }
        return $this->db->update($this->table, $data, ['id' => $id]);
    }

    public function deleteById(string|int $id): bool
    {
        try {
            $this->db->delete($this->table, ['id' => $id]);
            return true;
        } catch (\Throwable $e) {
            error_log('Prescription Model Error (deleteById): ' . $e->getMessage());
            return false;
        }
    }

    public function generatePrescriptionId(): string
    {
        try {
            $all = $this->all(['limit' => 1000]);
            $maxNum = 0;
            foreach ($all as $p) {
                if (!empty($p['prescription_id']) && preg_match('/RX-(\d+)/i', $p['prescription_id'], $matches)) {
                    $num = (int)$matches[1];
                    if ($num > $maxNum) {
                        $maxNum = $num;
                    }
                }
            }
            $nextNum = $maxNum + 1;
            return 'RX-' . str_pad((string)$nextNum, 3, '0', STR_PAD_LEFT);
        } catch (\Throwable $e) {
            return 'RX-' . date('YmdHis') . '-' . rand(100, 999);
        }
    }

    public function dispense(string $id, int $employeeId): array
    {
        $data = [
            'status' => 'dispensed',
            'dispensed_by' => $employeeId,
            'dispensed_at' => date('Y-m-d H:i:s')
        ];
        return $this->db->update($this->table, $data, ['id' => $id]);
    }
    
   /**
 * Get total count of prescriptions with filters
 */
public function count(array $filters = []): int
{
    try {
        // Remove any limit/offset that might be in filters
        unset($filters['limit']);
        unset($filters['offset']);
        unset($filters['order']);
        
        $options = [];
        
        // If there are OR conditions, pass them
        if (isset($filters['or'])) {
            $options['or'] = $filters['or'];
            unset($filters['or']);
        }
        
        // Use the database's count method
        return $this->db->count($this->table, $filters, $options);
        
    } catch (\Exception $e) {
        error_log("Prescription count error: " . $e->getMessage());
        return 0;
    }
}
}