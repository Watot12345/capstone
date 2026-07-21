<?php
// api/consultations.php

require_once __DIR__ . '/../Core/Env.php';
require_once __DIR__ . '/../Core/Response.php';
require_once __DIR__ . '/../app/Controllers/ConsultationController.php';

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
    $controller = new ConsultationController();
    $method = $_SERVER['REQUEST_METHOD'];
    $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $parts = explode('/', trim($path, '/'));
    
    // Get consultation ID from URL if exists (e.g. /api/consultations.php/123)
    $consultationId = null;
    if (count($parts) >= 3 && is_numeric($parts[2])) {
        $consultationId = $parts[2];
    }
    
    // Also support ?id=...
    if (!$consultationId && isset($_GET['id']) && is_numeric($_GET['id'])) {
        $consultationId = $_GET['id'];
    }

    switch ($method) {
        case 'GET':
            if ($consultationId) {
                $controller->show($consultationId);
            } elseif (isset($_GET['q'])) {
                $controller->search();
            } else {
                $controller->index();
            }
            break;

        case 'POST':
            $controller->store();
            break;

        case 'PUT':
            if ($consultationId) {
                $controller->update($consultationId);
            } else {
                Response::error('Consultation ID is required for update', 400);
            }
            break;

        case 'DELETE':
            if ($consultationId) {
                $controller->destroy($consultationId);
            } else {
                Response::error('Consultation ID is required for deletion', 400);
            }
            break;

        default:
            Response::error('Method not allowed', 405);
    }
} catch (Exception $e) {
    error_log('API Error in consultations.php: ' . $e->getMessage());
    Response::error('Internal server error: ' . $e->getMessage(), 500);
}
