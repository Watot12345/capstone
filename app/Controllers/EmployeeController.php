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
            $employees = $this->employeeModel->all(['order' => 'id.asc']);
            
            // Add full_name if not present
            foreach ($employees as &$e) {
                if (empty($e['full_name']) && !empty($e['name'])) {
                    $e['full_name'] = $e['name'];
                } elseif (empty($e['full_name']) && !empty($e['username'])) {
                    $e['full_name'] = $e['username'];
                } elseif (empty($e['full_name'])) {
                    $e['full_name'] = "Employee #{$e['id']}";
                }
            }
            
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
                return str_contains(strtolower($e['full_name'] ?? ''), $query) ||
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