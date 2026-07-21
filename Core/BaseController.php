<?php
// Core/BaseController.php

require_once __DIR__ . '/Response.php';

abstract class BaseController
{
    protected function input(): array
    {
        $json = file_get_contents('php://input');
        $data = json_decode($json, true);
        return $data ?? $_POST;
    }

    protected function handle(callable $callback): void
    {
        try {
            $result = $callback();
            
            if (isset($result['success']) && !$result['success']) {
                $code = $result['code'] ?? 400;
                Response::error($result['message'] ?? 'Error', $code);
            }
            
            Response::json($result, $result['code'] ?? 200);
        } catch (Exception $e) {
            error_log("Controller Error: " . $e->getMessage());
            Response::error('Internal server error', 500);
        }
    }
}
