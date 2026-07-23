<?php
// api/employees.php

require_once __DIR__ . '/../Core/Env.php';
require_once __DIR__ . '/../Core/Response.php';
require_once __DIR__ . '/../app/Controllers/EmployeeController.php';

// Handle CORS
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Authorization');

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit;
}

header('Content-Type: application/json');

try {
    // Skipping auth for now since AuthMiddleware is not fully implemented
    
    $controller = new EmployeeController();
    $method = $_SERVER['REQUEST_METHOD'];
    $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $parts = explode('/', trim($path, '/'));
    
    // Get employee ID from URL if exists (e.g. /api/employees.php/123)
    $employeeId = null;
    if (count($parts) >= 3 && is_numeric($parts[2])) {
        $employeeId = $parts[2];
    }
    
    // Also support ?id=...
    if (!$employeeId && isset($_GET['id'])) {
        $employeeId = $_GET['id'];
    }
    
    switch ($method) {
        case 'GET':
            if ($employeeId) {
                $controller->show($employeeId);
            } elseif (isset($_GET['q'])) {
                $controller->search();
            } else {
                $controller->index();
            }
            break;
            
        case 'POST':
            // Add employee logic if needed
            Response::error('Method not implemented', 501);
            break;
            
        case 'PUT':
            if ($employeeId) {
                // Update employee logic if needed
                Response::error('Method not implemented', 501);
            } else {
                Response::error('Employee ID required for update', 400);
            }
            break;
            
        case 'DELETE':
            if ($employeeId) {
                // Delete employee logic if needed
                Response::error('Method not implemented', 501);
            } else {
                Response::error('Employee ID required for deletion', 400);
            }
            break;
            
        default:
            Response::error('Method not allowed', 405);
    }
    
} catch (Exception $e) {
    error_log('API Error: ' . $e->getMessage());
    Response::error('Internal server error', 500);
}