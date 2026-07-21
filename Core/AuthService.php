<?php
// Core/AuthService.php

require_once __DIR__ . '/Database.php';

class AuthService
{
    private Database $db;

    public function __construct()
    {
        $this->db = Database::getInstance();
        $this->ensureSession();
    }

    private function ensureSession(): void
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_set_cookie_params([
                'lifetime' => (int) Env::get('SESSION_LIFETIME', 7200),
                'httponly' => true,
                'samesite' => 'Strict',
                'secure'   => (Env::get('APP_ENV') === 'production'),
            ]);
            session_start();
        }
    }

    public function attempt(string $employeeId, string $password): bool
    {
        $result = $this->db->select('employees', ['employee_id' => $employeeId]);
        $employee = $result[0] ?? null;

        if (!$employee || !password_verify($password, $employee['password'])) {
            return false;
        }

        $this->login($employee);
        return true;
    }

    private function login(array $employee): void
    {
        session_regenerate_id(true);

        $_SESSION['employee_id_pk'] = $employee['id'];
        $_SESSION['employee_id']    = $employee['employee_id'];
        $_SESSION['full_name']      = $employee['full_name'];
        $_SESSION['role']           = $employee['role'];
        $_SESSION['department']     = $employee['department'];
        $_SESSION['logged_in_at']   = time();
    }

    public function logout(): void
    {
        $_SESSION = [];

        if (ini_get('session.use_cookies')) {
            $params = session_get_cookie_params();
            setcookie('PHPSESSID', '', time() - 42000,
                $params['path'], $params['domain'],
                $params['secure'], $params['httponly']
            );
        }

        session_destroy();
    }

    public function check(): bool
    {
        return isset($_SESSION['employee_id_pk']);
    }

    public function user(): ?array
    {
        if (!$this->check()) {
            return null;
        }

        return [
            'id'          => $_SESSION['employee_id_pk'],
            'employee_id' => $_SESSION['employee_id'],
            'full_name'   => $_SESSION['full_name'],
            'role'        => $_SESSION['role'],
            'department'  => $_SESSION['department'],
        ];
    }

    public function hasRole(string|array $roles): bool
    {
        if (!$this->check()) {
            return false;
        }

        $roles = is_array($roles) ? $roles : [$roles];
        return in_array($_SESSION['role'], $roles, true);
    }
}