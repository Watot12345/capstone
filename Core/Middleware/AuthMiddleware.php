<?php
// Core/Middleware/AuthMiddleware.php

require_once __DIR__ . '/../AuthService.php';
require_once __DIR__ . '/../Response.php';

class AuthMiddleware
{
    public static function handle(): AuthService
    {
        $auth = new AuthService();

        if (!$auth->check()) {
            if (self::isApiRequest()) {
                Response::error('Unauthorized. Please log in.', 401);
            }
            header('Location: /login.php');
            exit;
        }

        return $auth;
    }

    public static function role(string|array $roles): AuthService
    {
        $auth = self::handle();

        if (!$auth->hasRole($roles)) {
            if (self::isApiRequest()) {
                Response::error('Forbidden. Insufficient permissions.', 403);
            }
            http_response_code(403);
            exit('Access denied.');
        }

        return $auth;
    }

    private static function isApiRequest(): bool
    {
        return str_starts_with($_SERVER['REQUEST_URI'] ?? '', '/api/')
            || (($_SERVER['HTTP_ACCEPT'] ?? '') === 'application/json');
    }
}