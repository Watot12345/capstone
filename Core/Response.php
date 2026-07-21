<?php
// Core/Response.php

class Response
{
    public static function json(bool $success, string $message = '', mixed $data = null, int $httpCode = 200): never
    {
        http_response_code($httpCode);
        header('Content-Type: application/json');

        echo json_encode([
            'success' => $success,
            'message' => $message,
            'data'    => $data,
        ]);

        exit;
    }

    public static function success(string $message = 'Operation completed successfully.', mixed $data = null, int $httpCode = 200): never
    {
        self::json(true, $message, $data, $httpCode);
    }

    public static function error(string $message = 'An error occurred.', int $httpCode = 400, mixed $data = null): never
    {
        self::json(false, $message, $data, $httpCode);
    }
}