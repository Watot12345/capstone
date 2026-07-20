<?php
// login.php - Combined PHP + HTML
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

// Check if this is a POST request (form submission)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle the login logic
    require_once 'config/database.php';
    
    $employeeId = $_POST['employee_id'] ?? '';
    $password = $_POST['password'] ?? '';
    
    // If it's a fetch/AJAX request, return JSON
    if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && 
        strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest') {
        header('Content-Type: application/json');
        
        try {
            $db = new SupabaseDB();
            $result = $db->select('employees', ['employee_id' => $employeeId]);
            
            if (empty($result) || !is_array($result)) {
                echo json_encode(['success' => false, 'message' => 'Invalid credentials']);
                exit;
            }
            
            $user = $result[0];
            
            if (!password_verify($password, $user['password'])) {
                echo json_encode(['success' => false, 'message' => 'Invalid credentials']);
                exit;
            }
            
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['employee_id'] = $user['employee_id'];
            $_SESSION['full_name'] = $user['full_name'];
            $_SESSION['department'] = $user['department'] ?? '';
            $_SESSION['role'] = $user['role'] ?? 'employee';
            $_SESSION['logged_in'] = true;
            
            echo json_encode([
                'success' => true,
                'message' => 'Login successful',
                'user' => [
                    'name' => $user['full_name'],
                    'employee_id' => $user['employee_id'],
                    'department' => $user['department'] ?? '',
                    'role' => $user['role'] ?? 'employee'
                ]
            ]);
            exit;
            
        } catch (Exception $e) {
            echo json_encode(['success' => false, 'message' => 'Server error: ' . $e->getMessage()]);
            exit;
        }
    }
}

// If user is already logged in, redirect to dashboard
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
    header('Location: /capstone/pages/dashboard.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Civentral</title>
    <link rel="icon" type="image/png" href="assets/images/logo.png">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <style type="text/tailwindcss">
    @theme {
        --color-brand-light: #EEF5FF;
        --color-brand-border: #B4D4FF;
        --color-brand-medium: #86B6F6;
        --color-brand-dark: #176B87;
    }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-white min-h-screen font-sans antialiased selection:bg-brand-medium selection:text-white">

    <div class="min-h-screen flex flex-col md:flex-row relative">
        <div class="hidden md:block md:w-1/2 lg:w-3/5 bg-[url(assets/images/building-bg.jpg)] bg-cover bg-left bg-no-repeat mix-blend-multiply relative">
            <div class="absolute inset-0 bg-gradient-to-r from-transparent to-white"></div>
        </div>

        <div class="flex-1 flex flex-col justify-between p-8 sm:p-12 md:p-16 lg:p-24 bg-white z-10">
            <div></div>

            <div class="w-full max-w-md mx-auto space-y-6 my-auto relative">
                <div class="w-full space-y-6">
                    <div class="flex flex-col items-center justify-center text-center pb-4 w-full">
                        <img src="assets/images/logo.png" alt="Civentral Graphic" class="h-24 w-auto object-contain mb-3">
                        <span class="text-4xl font-black text-brand-medium tracking-[0.25em] uppercase font-sans">
                            Civentral
                        </span>
                    </div>
                    <div class="flex flex-col items-center md:items-start text-center md:text-left space-y-2">
                        <span class="text-xs font-bold tracking-widest text-gray-400 uppercase">Employee Access</span>
                        <h1 class="text-3xl font-extrabold text-gray-600 tracking-tight">Sign in to your office</h1>
                        <p class="text-xs text-gray-500">Enter your LGU-issued credentials to continue.</p>
                    </div>
                </div>

                <div class="relative min-h-[4px]">
                    <div id="statusModal" class="hidden absolute left-0 right-0 -top-2 z-20 border rounded-lg p-4 items-start space-x-3 shadow-md transition-all duration-300">
                        <div id="modalIcon" class="mt-0.5"></div>
                        <p id="modalMessage" class="text-xs font-medium leading-relaxed"></p>
                    </div>
                </div>

                <form id="loginForm" class="space-y-4 pt-2">
                    <div class="space-y-1.5">
                        <label for="employeeId" class="text-xs font-semibold text-gray-500">LGU Employee ID</label>
                        <div class="relative flex items-center">
                            <span class="absolute left-4 text-gray-400">
                                <i class="fa-solid fa-user-tie text-sm"></i>
                            </span>
                            <input 
                                type="text" 
                                id="employeeId" 
                                placeholder="ID 1111-ADMIN-2011" 
                                required
                                class="w-full pl-11 pr-4 py-3 bg-white border border-gray-300 rounded-lg text-sm text-gray-800 placeholder-gray-400 focus:outline-none focus:border-brand-medium focus:ring-1 focus:ring-brand-medium transition"
                            />
                        </div>
                    </div>

                    <div class="space-y-1.5">
                        <label for="password" class="text-xs font-semibold text-gray-500">Password</label>
                        <div class="relative flex items-center">
                            <span class="absolute left-4 text-gray-400">
                                <i class="fa-solid fa-key text-sm"></i>
                            </span>
                            <input 
                                type="password" 
                                id="password" 
                                placeholder="••••••••••••••••" 
                                required
                                class="w-full pl-11 pr-11 py-3 bg-white border border-gray-300 rounded-lg text-sm text-gray-800 placeholder-gray-400 focus:outline-none focus:border-brand-medium focus:ring-1 focus:ring-brand-medium transition"
                            />
                            <button 
                                type="button" 
                                onclick="togglePasswordVisibility()" 
                                class="absolute right-4 text-gray-400 hover:text-gray-600 focus:outline-none"
                            >
                                <i id="passwordIcon" class="fa-solid fa-eye-slash text-sm"></i>
                            </button>
                        </div>
                    </div>

                    <div class="flex items-center justify-between pt-1">
                        <label class="flex items-center space-x-2 cursor-pointer select-none">
                            <input type="checkbox" class="w-4 h-4 text-brand-medium border-gray-300 rounded focus:ring-brand-medium accent-brand-medium" />
                            <span class="text-xs text-gray-500">Keep me signed in</span>
                        </label>
                        <a href="#" class="text-xs font-semibold text-brand-medium hover:underline">Forgot password?</a>
                    </div>

                    <button type="submit" id="loginButton" class="w-full py-3 px-4 bg-brand-medium hover:bg-opacity-90 text-white font-medium rounded-lg text-sm transition shadow-sm focus:outline-none">
                        Sign in
                    </button>
                </form>

                <div class="relative flex py-2 items-center">
                    <div class="flex-grow border-t border-gray-200"></div>
                    <span class="flex-shrink mx-4 text-xs font-semibold text-gray-400 tracking-wider">OR</span>
                    <div class="flex-grow border-t border-gray-200"></div>
                </div>

                <a href="index.php" class="inline-block text-center w-full py-3 px-4 bg-white hover:bg-brand-medium hover:text-white text-brand-medium font-medium border border-brand-medium rounded-lg text-sm transition focus:outline-none">
                    Back to Home
                </a>
            </div>

            <div class="text-center pt-8">
                <p class="text-[10px] md:text-xs font-bold text-gray-400 tracking-wider uppercase max-w-sm mx-auto leading-relaxed">
                    DEPT ACCESS ONLY - UNAUTHORIZED USE IS LOGGED & PROSECUTABLE UNDER RA 8792
                </p>
            </div>
        </div>
    </div>

    <script src="assets/js/login.js"></script>
</body>
</html>