<?php
// app/Controllers/EmployeeController.php

require_once __DIR__ . '/../../Core/BaseController.php';
require_once __DIR__ . '/../Models/Employee.php';

class EmployeeController extends BaseController
{
    private Employee $employeeModel;
    
    public function __construct()
    {
        $this->employeeModel = new Employee();
    }
    
    public function index(): void
    {
        $this->handle(function() {
            $employees = $this->employeeModel->all(['order' => 'created_at.desc']);
            
            return [
                'success' => true,
                'data' => $employees,
                'total' => count($employees)
            ];
        });
    }
    
    public function show(string $id): void
    {
        $this->handle(function() use ($id) {
            $employee = $this->employeeModel->find($id);
            
            if (!$employee) {
                return [
                    'success' => false,
                    'message' => 'Employee not found',
                    'code' => 404
                ];
            }
            
            return [
                'success' => true,
                'data' => $employee
            ];
        });
    }
    
    public function search(): void
    {
        $query = $_GET['q'] ?? '';
        
        $this->handle(function() use ($query) {
            if (empty($query)) {
                return [
                    'success' => false,
                    'message' => 'Search query is required',
                    'code' => 400
                ];
            }
            
            $all = $this->employeeModel->all();
            $query = strtolower($query);
            
            $results = array_values(array_filter($all, function($e) use ($query) {
                return str_contains(strtolower($e['first_name'] ?? ''), $query) ||
                       str_contains(strtolower($e['last_name'] ?? ''), $query) ||
                       str_contains(strtolower($e['username'] ?? ''), $query) ||
                       str_contains(strtolower($e['email'] ?? ''), $query);
            }));
            
            return [
                'success' => true,
                'data' => $results,
                'total' => count($results)
            ];
        });
    }
}
?>