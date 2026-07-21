<?php
// Core/BaseModel.php

require_once __DIR__ . '/Database.php';

abstract class BaseModel
{
    protected Database $db;
    protected string $table;
    protected string $primaryKey = 'id';
    protected bool $useServiceKey = false;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    public function find(int|string $id): ?array
    {
        $result = $this->db->select($this->table, [$this->primaryKey => $id]);
        return $result[0] ?? null;
    }

    public function all(array $options = []): array
    {
        return $this->db->select($this->table, [], $options);
    }

    public function where(array $filters, array $options = []): array
    {
        return $this->db->select($this->table, $filters, $options);
    }

    public function paginate(int $page = 1, int $perPage = 20, array $filters = [], array $options = []): array
    {
        $options['limit'] = $perPage;
        $options['offset'] = ($page - 1) * $perPage;

        return $this->db->select($this->table, $filters, $options);
    }

    public function create(array $data): array
    {
        $result = $this->db->insert($this->table, $data, $this->useServiceKey);
        return $result[0] ?? [];
    }

    public function updateById(int|string $id, array $data): array
    {
        $result = $this->db->update($this->table, $data, [$this->primaryKey => $id], $this->useServiceKey);
        return $result[0] ?? [];
    }

    public function deleteById(int|string $id): bool
    {
        $this->db->delete($this->table, [$this->primaryKey => $id], $this->useServiceKey);
        return true;
    }
}