<?php
// app/Models/Referral.php

require_once __DIR__ . '/../../config/database.php';

class Referral
{
    private Database $db;
    private string $table = 'referrals';

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
            error_log('Referral Model Error (all): ' . $e->getMessage());
            return [];
        }
    }

    public function find(string|int $id): ?array
    {
        try {
            $result = $this->db->select($this->table, ['id' => $id]);
            return !empty($result) ? $result[0] : null;
        } catch (Throwable $e) {
            error_log('Referral Model Error (find): ' . $e->getMessage());
            return null;
        }
    }

    public function create(array $data): array
    {
        if (empty($data['referral_id'])) {
            $data['referral_id'] = $this->generateReferralId();
        }
        return $this->db->insert($this->table, $data);
    }

    public function update(string|int $id, array $data): array
    {
        return $this->db->update($this->table, $data, ['id' => $id]);
    }

    public function delete(string|int $id): bool
    {
        try {
            $this->db->delete($this->table, ['id' => $id]);
            return true;
        } catch (Throwable $e) {
            error_log('Referral Model Error (delete): ' . $e->getMessage());
            return false;
        }
    }

    public function generateReferralId(): string
    {
        try {
            $all = $this->all(['limit' => 1000]);
            $maxNum = 0;
            foreach ($all as $r) {
                if (!empty($r['referral_id']) && preg_match('/REF-(\d+)/i', $r['referral_id'], $matches)) {
                    $num = (int)$matches[1];
                    if ($num > $maxNum) {
                        $maxNum = $num;
                    }
                }
            }
            $nextNum = $maxNum + 1;
            return 'REF-' . str_pad((string)$nextNum, 3, '0', STR_PAD_LEFT);
        } catch (Throwable $e) {
            return 'REF-' . date('YmdHis') . '-' . rand(100, 999);
        }
    }
}
?>