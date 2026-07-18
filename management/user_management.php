<?php
// ============================================================
// COLOR PALETTE USED ON THIS PAGE
// ============================================================
//   'brand-dark':   '#0B4F4A',
//   'brand-medium': '#14807A',
//   'brand-light':  '#E6F5F3',
//   'brand-border': '#B8E0DC',
// ============================================================

// ============================================================
// 1. PHP BACKEND - Fetch Data
// ============================================================
require_once '../includes/header.php';
require_once '../includes/sidebar.php';

// Sample Users Data
$users = [
    [
        'id' => 1,
        'username' => 'juan_delacruz',
        'full_name' => 'Juan Dela Cruz',
        'email' => 'juan.delacruz@caloocan.gov.ph',
        'role' => 'Admin',
        'status' => 'Active',
        'last_login' => '2024-01-20 08:30:00',
        'created_at' => '2024-01-01 09:00:00',
        'permissions' => ['Full Access', 'User Management', 'System Settings']
    ],
    [
        'id' => 2,
        'username' => 'maria_santos',
        'full_name' => 'Maria Santos',
        'email' => 'maria.santos@caloocan.gov.ph',
        'role' => 'Health Officer',
        'status' => 'Active',
        'last_login' => '2024-01-20 10:15:00',
        'created_at' => '2024-01-05 14:30:00',
        'permissions' => ['Health Services', 'Patient Records', 'Consultations']
    ],
    [
        'id' => 3,
        'username' => 'pedro_reyes',
        'full_name' => 'Pedro Reyes',
        'email' => 'pedro.reyes@caloocan.gov.ph',
        'role' => 'Sanitation Officer',
        'status' => 'Active',
        'last_login' => '2024-01-19 16:45:00',
        'created_at' => '2024-01-10 11:00:00',
        'permissions' => ['Sanitation Permits', 'Inspections', 'Compliance']
    ],
    [
        'id' => 4,
        'username' => 'ana_cruz',
        'full_name' => 'Ana Cruz',
        'email' => 'ana.cruz@caloocan.gov.ph',
        'role' => 'Nurse',
        'status' => 'Inactive',
        'last_login' => '2024-01-15 09:20:00',
        'created_at' => '2024-01-15 08:00:00',
        'permissions' => ['Patient Care', 'Vaccination', 'Records']
    ],
    [
        'id' => 5,
        'username' => 'carlos_garcia',
        'full_name' => 'Carlos Garcia',
        'email' => 'carlos.garcia@caloocan.gov.ph',
        'role' => 'Surveillance Officer',
        'status' => 'Suspended',
        'last_login' => '2024-01-10 13:00:00',
        'created_at' => '2024-01-20 10:30:00',
        'permissions' => ['Surveillance', 'Case Reports', 'Outbreak Detection']
    ],
    [
        'id' => 6,
        'username' => 'elena_lim',
        'full_name' => 'Elena Lim',
        'email' => 'elena.lim@caloocan.gov.ph',
        'role' => 'Immunization Specialist',
        'status' => 'Active',
        'last_login' => '2024-01-20 07:45:00',
        'created_at' => '2024-01-25 09:00:00',
        'permissions' => ['Immunization', 'Child Records', 'Nutrition']
    ],
];

// Role definitions with permissions
$roles = [
    'Admin' => [
        'permissions' => ['Full Access', 'User Management', 'System Settings', 'All Modules'],
        'color' => 'bg-red-100 text-red-700'
    ],
    'Health Officer' => [
        'permissions' => ['Health Services', 'Patient Records', 'Consultations', 'Medical Records'],
        'color' => 'bg-blue-100 text-blue-700'
    ],
    'Sanitation Officer' => [
        'permissions' => ['Sanitation Permits', 'Inspections', 'Compliance', 'Violations'],
        'color' => 'bg-amber-100 text-amber-700'
    ],
    'Nurse' => [
        'permissions' => ['Patient Care', 'Vaccination', 'Records', 'Appointments'],
        'color' => 'bg-green-100 text-green-700'
    ],
    'Surveillance Officer' => [
        'permissions' => ['Surveillance', 'Case Reports', 'Outbreak Detection', 'Mapping'],
        'color' => 'bg-purple-100 text-purple-700'
    ],
    'Immunization Specialist' => [
        'permissions' => ['Immunization', 'Child Records', 'Nutrition', 'Vaccine Inventory'],
        'color' => 'bg-pink-100 text-pink-700'
    ],
];

// User Activity Logs
$activityLogs = [
    ['user' => 'Juan Dela Cruz', 'action' => 'Logged in', 'timestamp' => '2024-01-20 08:30:00', 'ip' => '192.168.1.1', 'status' => 'Success'],
    ['user' => 'Maria Santos', 'action' => 'Created new patient record', 'timestamp' => '2024-01-20 10:15:00', 'ip' => '192.168.1.5', 'status' => 'Success'],
    ['user' => 'Pedro Reyes', 'action' => 'Updated permit application', 'timestamp' => '2024-01-19 16:45:00', 'ip' => '192.168.1.3', 'status' => 'Success'],
    ['user' => 'Ana Cruz', 'action' => 'Logged out', 'timestamp' => '2024-01-19 17:00:00', 'ip' => '192.168.1.7', 'status' => 'Success'],
    ['user' => 'Carlos Garcia', 'action' => 'Failed login attempt', 'timestamp' => '2024-01-19 13:30:00', 'ip' => '192.168.1.9', 'status' => 'Failed'],
    ['user' => 'Elena Lim', 'action' => 'Updated vaccination records', 'timestamp' => '2024-01-20 07:45:00', 'ip' => '192.168.1.11', 'status' => 'Success'],
    ['user' => 'Juan Dela Cruz', 'action' => 'Changed user role', 'timestamp' => '2024-01-18 09:00:00', 'ip' => '192.168.1.1', 'status' => 'Success'],
    ['user' => 'Maria Santos', 'action' => 'Viewed patient report', 'timestamp' => '2024-01-18 14:20:00', 'ip' => '192.168.1.5', 'status' => 'Success'],
];

// Statistics
$totalUsers = count($users);
$activeUsers = count(array_filter($users, function($u) { return $u['status'] == 'Active'; }));
$inactiveUsers = count(array_filter($users, function($u) { return $u['status'] == 'Inactive'; }));
$suspendedUsers = count(array_filter($users, function($u) { return $u['status'] == 'Suspended'; }));

$title = 'User Management';
?>

<!-- ============================================================ -->
<!-- 2. HTML + PHP EMBEDDED + Tailwind CSS                       -->
<!-- ============================================================ -->

<div class="flex-1 px-6 pt-[26px] pb-20 mb-10 flex flex-col min-h-0 overflow-hidden">

    <!-- Page Header -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6">
        <div>
            <div class="flex items-center gap-3 mb-1">
                <h2 class="text-2xl font-black text-slate-900 tracking-tight">User Management</h2>
                <span class="px-3 py-1 bg-brand-light text-brand-dark rounded-full text-xs font-bold flex items-center gap-1">
                    <i class="fa-solid fa-users-cog"></i> <?php echo $totalUsers; ?> Users
                </span>
            </div>
            <p class="text-sm text-slate-500 mt-0.5">User registration, role assignment, permission management & activity monitoring</p>
        </div>
        <div class="flex gap-3 flex-wrap">
            <button onclick="openModal('addUserModal')" class="px-4 py-2 bg-brand-dark text-white rounded-lg hover:bg-brand-medium transition text-sm font-semibold flex items-center gap-2 shadow-sm">
                <i class="fa-solid fa-user-plus text-xs"></i> Add New User
            </button>
            <button onclick="refreshData()" class="px-4 py-2 bg-white border border-slate-200 text-slate-700 rounded-lg hover:bg-slate-50 transition text-sm font-semibold flex items-center gap-2">
                <i class="fa-solid fa-sync-alt text-xs"></i> Refresh
            </button>
        </div>
    </div>

    <!-- ============================================================ -->
    <!-- KPI CARDS - User Overview                                 -->
    <!-- ============================================================ -->
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-6">
        <!-- Card 1: Total Users -->
        <div class="relative overflow-hidden bg-white rounded-2xl shadow-sm border border-slate-200 p-5 hover:shadow-lg transition group">
            <div class="absolute -top-12 -right-12 w-24 h-24 bg-blue-100 rounded-full opacity-50 group-hover:scale-110 transition"></div>
            <div class="relative">
                <div class="flex items-center gap-3">
                    <div class="w-11 h-11 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl flex items-center justify-center text-white shadow-lg shadow-blue-200">
                        <i class="fa-solid fa-users text-lg"></i>
                    </div>
                    <div>
                        <p class="text-2xl font-black text-slate-900"><?php echo $totalUsers; ?></p>
                        <p class="text-xs font-medium text-slate-500">Total Users</p>
                    </div>
                </div>
                <div class="mt-3 flex items-center gap-2">
                    <span class="px-2 py-0.5 bg-emerald-100 text-emerald-700 rounded-full text-[10px] font-bold"><?php echo $activeUsers; ?> Active</span>
                    <span class="text-[10px] text-slate-400"><?php echo $inactiveUsers; ?> Inactive</span>
                </div>
            </div>
        </div>

        <!-- Card 2: Active Users -->
        <div class="relative overflow-hidden bg-white rounded-2xl shadow-sm border border-slate-200 p-5 hover:shadow-lg transition group">
            <div class="absolute -top-12 -right-12 w-24 h-24 bg-emerald-100 rounded-full opacity-50 group-hover:scale-110 transition"></div>
            <div class="relative">
                <div class="flex items-center gap-3">
                    <div class="w-11 h-11 bg-gradient-to-br from-emerald-500 to-emerald-600 rounded-xl flex items-center justify-center text-white shadow-lg shadow-emerald-200">
                        <i class="fa-solid fa-user-check text-lg"></i>
                    </div>
                    <div>
                        <p class="text-2xl font-black text-emerald-600"><?php echo $activeUsers; ?></p>
                        <p class="text-xs font-medium text-slate-500">Active Users</p>
                    </div>
                </div>
                <div class="mt-3 flex items-center gap-2">
                    <span class="px-2 py-0.5 bg-emerald-100 text-emerald-700 rounded-full text-[10px] font-bold">✅ Online</span>
                    <span class="text-[10px] text-slate-400"><?php echo round(($activeUsers / $totalUsers) * 100); ?>% of total</span>
                </div>
            </div>
        </div>

        <!-- Card 3: Roles -->
        <div class="relative overflow-hidden bg-white rounded-2xl shadow-sm border border-slate-200 p-5 hover:shadow-lg transition group">
            <div class="absolute -top-12 -right-12 w-24 h-24 bg-purple-100 rounded-full opacity-50 group-hover:scale-110 transition"></div>
            <div class="relative">
                <div class="flex items-center gap-3">
                    <div class="w-11 h-11 bg-gradient-to-br from-purple-500 to-purple-600 rounded-xl flex items-center justify-center text-white shadow-lg shadow-purple-200">
                        <i class="fa-solid fa-layer-group text-lg"></i>
                    </div>
                    <div>
                        <p class="text-2xl font-black text-purple-600"><?php echo count($roles); ?></p>
                        <p class="text-xs font-medium text-slate-500">Roles</p>
                    </div>
                </div>
                <div class="mt-3 flex items-center gap-2">
                    <span class="px-2 py-0.5 bg-purple-100 text-purple-700 rounded-full text-[10px] font-bold">🔑 Defined</span>
                    <span class="text-[10px] text-slate-400">With permissions</span>
                </div>
            </div>
        </div>

        <!-- Card 4: Recent Activity -->
        <div class="relative overflow-hidden bg-white rounded-2xl shadow-sm border border-slate-200 p-5 hover:shadow-lg transition group">
            <div class="absolute -top-12 -right-12 w-24 h-24 bg-amber-100 rounded-full opacity-50 group-hover:scale-110 transition"></div>
            <div class="relative">
                <div class="flex items-center gap-3">
                    <div class="w-11 h-11 bg-gradient-to-br from-amber-500 to-amber-600 rounded-xl flex items-center justify-center text-white shadow-lg shadow-amber-200">
                        <i class="fa-solid fa-clock text-lg"></i>
                    </div>
                    <div>
                        <p class="text-2xl font-black text-amber-600"><?php echo count($activityLogs); ?></p>
                        <p class="text-xs font-medium text-slate-500">Activities</p>
                    </div>
                </div>
                <div class="mt-3 flex items-center gap-2">
                    <span class="px-2 py-0.5 bg-amber-100 text-amber-700 rounded-full text-[10px] font-bold">📊 Today</span>
                    <span class="text-[10px] text-slate-400">Last 24 hours</span>
                </div>
            </div>
        </div>
    </div>

    <!-- ============================================================ -->
    <!-- USER REGISTRATION - Users Table                           -->
    <!-- ============================================================ -->
    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden mb-6">
        <div class="px-5 py-4 border-b border-slate-200 flex flex-wrap items-center justify-between gap-2">
            <h3 class="font-semibold text-slate-800 flex items-center gap-2">
                <i class="fa-solid fa-user-plus text-brand-medium"></i>
                User Registration
                <span class="text-xs font-normal text-slate-400">(<?php echo $totalUsers; ?> registered)</span>
            </h3>
            <div class="flex items-center gap-3">
                <select id="roleFilter" onchange="filterUsers()" class="px-3 py-1.5 text-xs border border-slate-200 rounded-lg bg-white focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none">
                    <option value="all">All Roles</option>
                    <?php foreach ($roles as $role => $data): ?>
                    <option value="<?php echo $role; ?>"><?php echo $role; ?></option>
                    <?php endforeach; ?>
                </select>
                <select id="statusFilter" onchange="filterUsers()" class="px-3 py-1.5 text-xs border border-slate-200 rounded-lg bg-white focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none">
                    <option value="all">All Status</option>
                    <option value="Active">Active</option>
                    <option value="Inactive">Inactive</option>
                    <option value="Suspended">Suspended</option>
                </select>
                <button onclick="openModal('addUserModal')" class="px-3 py-1.5 bg-brand-dark text-white rounded-lg hover:bg-brand-medium transition text-xs font-semibold flex items-center gap-1.5">
                    <i class="fa-solid fa-plus"></i> Add User
                </button>
            </div>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="bg-slate-50 border-b border-slate-200">
                        <th class="text-left px-4 py-3 text-xs font-semibold text-slate-500 uppercase tracking-wider">User</th>
                        <th class="text-left px-4 py-3 text-xs font-semibold text-slate-500 uppercase tracking-wider">Username</th>
                        <th class="text-left px-4 py-3 text-xs font-semibold text-slate-500 uppercase tracking-wider">Role</th>
                        <th class="text-left px-4 py-3 text-xs font-semibold text-slate-500 uppercase tracking-wider">Status</th>
                        <th class="text-left px-4 py-3 text-xs font-semibold text-slate-500 uppercase tracking-wider">Last Login</th>
                        <th class="text-left px-4 py-3 text-xs font-semibold text-slate-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody id="usersTableBody">
                    <?php foreach ($users as $user): ?>
                    <tr class="border-b border-slate-100 hover:bg-slate-50 transition user-row" data-role="<?php echo $user['role']; ?>" data-status="<?php echo $user['status']; ?>">
                        <td class="px-4 py-3">
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 rounded-full bg-brand-light flex items-center justify-center text-brand-dark font-bold text-xs">
                                    <?php echo strtoupper(substr($user['full_name'], 0, 1)); ?>
                                </div>
                                <div>
                                    <span class="font-medium text-slate-800"><?php echo $user['full_name']; ?></span>
                                    <span class="text-xs text-slate-400 block"><?php echo $user['email']; ?></span>
                                </div>
                            </div>
                        </td>
                        <td class="px-4 py-3 text-slate-600 text-sm"><?php echo $user['username']; ?></td>
                        <td class="px-4 py-3">
                            <span class="px-2 py-1 <?php echo $roles[$user['role']]['color'] ?? 'bg-slate-100 text-slate-700'; ?> rounded-full text-xs font-semibold">
                                <?php echo $user['role']; ?>
                            </span>
                        </td>
                        <td class="px-4 py-3">
                            <span class="px-2 py-1 <?php echo $user['status'] == 'Active' ? 'bg-emerald-100 text-emerald-700' : ($user['status'] == 'Inactive' ? 'bg-slate-100 text-slate-700' : 'bg-red-100 text-red-700'); ?> rounded-full text-xs font-semibold">
                                <?php echo $user['status']; ?>
                            </span>
                        </td>
                        <td class="px-4 py-3 text-slate-500 text-xs"><?php echo date('M d, Y h:i A', strtotime($user['last_login'])); ?></td>
                        <td class="px-4 py-3">
                            <div class="flex gap-1">
                                <button onclick="editUser(<?php echo $user['id']; ?>)" class="text-brand-dark hover:text-brand-medium text-xs font-medium transition px-2 py-1 hover:bg-brand-light rounded">
                                    <i class="fa-solid fa-pen"></i>
                                </button>
                                <button onclick="managePermissions(<?php echo $user['id']; ?>)" class="text-purple-600 hover:text-purple-800 text-xs font-medium transition px-2 py-1 hover:bg-purple-50 rounded">
                                    <i class="fa-solid fa-key"></i>
                                </button>
                                <button onclick="toggleUserStatus(<?php echo $user['id']; ?>)" class="text-amber-600 hover:text-amber-800 text-xs font-medium transition px-2 py-1 hover:bg-amber-50 rounded">
                                    <i class="fa-solid <?php echo $user['status'] == 'Active' ? 'fa-pause' : 'fa-play'; ?>"></i>
                                </button>
                                <button onclick="deleteUser(<?php echo $user['id']; ?>)" class="text-red-500 hover:text-red-700 text-xs font-medium transition px-2 py-1 hover:bg-red-50 rounded">
                                    <i class="fa-solid fa-trash-can"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- ============================================================ -->
    <!-- ROLE ASSIGNMENT & PERMISSION MANAGEMENT                   -->
    <!-- ============================================================ -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
        <!-- Role Assignment -->
        <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
            <div class="px-5 py-4 border-b border-slate-200 flex items-center justify-between">
                <h3 class="font-semibold text-slate-800 flex items-center gap-2">
                    <i class="fa-solid fa-user-tag text-brand-medium"></i>
                    Role Assignment
                </h3>
                <span class="text-xs text-slate-400"><?php echo count($roles); ?> roles</span>
            </div>
            <div class="p-4">
                <div class="space-y-3">
                    <?php foreach ($roles as $role => $data): 
                        $userCount = count(array_filter($users, function($u) use ($role) { return $u['role'] == $role; }));
                    ?>
                    <div class="flex items-center justify-between p-3 border border-slate-200 rounded-lg hover:shadow-md transition">
                        <div class="flex items-center gap-3">
                            <span class="w-2 h-2 rounded-full <?php echo $data['color'] ?? 'bg-slate-500'; ?>"></span>
                            <div>
                                <p class="font-medium text-slate-800 text-sm"><?php echo $role; ?></p>
                                <p class="text-xs text-slate-500"><?php echo $userCount; ?> users • <?php echo count($data['permissions']); ?> permissions</p>
                            </div>
                        </div>
                        <button onclick="editRole('<?php echo $role; ?>')" class="px-3 py-1 bg-brand-light text-brand-dark rounded-lg hover:bg-brand-dark hover:text-white transition text-xs font-semibold">
                            <i class="fa-solid fa-pen"></i> Edit
                        </button>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

        <!-- Permission Management -->
        <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
            <div class="px-5 py-4 border-b border-slate-200 flex items-center justify-between">
                <h3 class="font-semibold text-slate-800 flex items-center gap-2">
                    <i class="fa-solid fa-key text-brand-medium"></i>
                    Permission Management
                </h3>
                <span class="text-xs text-slate-400">Module access control</span>
            </div>
            <div class="p-4 max-h-[400px] overflow-y-auto">
                <div class="space-y-4">
                    <!-- Health Services Permissions -->
                    <div class="border border-slate-200 rounded-lg p-3">
                        <h4 class="font-semibold text-slate-700 text-sm flex items-center gap-2">
                            <i class="fa-solid fa-hospital text-brand-medium"></i>
                            Health Center Services
                        </h4>
                        <div class="grid grid-cols-2 gap-2 mt-2">
                            <label class="flex items-center gap-2 text-xs text-slate-600">
                                <input type="checkbox" class="rounded border-slate-300 text-brand-dark" checked> View Patients
                            </label>
                            <label class="flex items-center gap-2 text-xs text-slate-600">
                                <input type="checkbox" class="rounded border-slate-300 text-brand-dark" checked> Add Patients
                            </label>
                            <label class="flex items-center gap-2 text-xs text-slate-600">
                                <input type="checkbox" class="rounded border-slate-300 text-brand-dark" checked> Edit Patients
                            </label>
                            <label class="flex items-center gap-2 text-xs text-slate-600">
                                <input type="checkbox" class="rounded border-slate-300 text-brand-dark"> Delete Patients
                            </label>
                            <label class="flex items-center gap-2 text-xs text-slate-600">
                                <input type="checkbox" class="rounded border-slate-300 text-brand-dark" checked> View Consultations
                            </label>
                            <label class="flex items-center gap-2 text-xs text-slate-600">
                                <input type="checkbox" class="rounded border-slate-300 text-brand-dark" checked> Manage Records
                            </label>
                        </div>
                    </div>

                    <!-- Sanitation Permissions -->
                    <div class="border border-slate-200 rounded-lg p-3">
                        <h4 class="font-semibold text-slate-700 text-sm flex items-center gap-2">
                            <i class="fa-solid fa-clipboard-check text-brand-medium"></i>
                            Sanitation Permits
                        </h4>
                        <div class="grid grid-cols-2 gap-2 mt-2">
                            <label class="flex items-center gap-2 text-xs text-slate-600">
                                <input type="checkbox" class="rounded border-slate-300 text-brand-dark" checked> View Permits
                            </label>
                            <label class="flex items-center gap-2 text-xs text-slate-600">
                                <input type="checkbox" class="rounded border-slate-300 text-brand-dark" checked> Issue Permits
                            </label>
                            <label class="flex items-center gap-2 text-xs text-slate-600">
                                <input type="checkbox" class="rounded border-slate-300 text-brand-dark" checked> Conduct Inspections
                            </label>
                            <label class="flex items-center gap-2 text-xs text-slate-600">
                                <input type="checkbox" class="rounded border-slate-300 text-brand-dark"> Manage Violations
                            </label>
                        </div>
                    </div>

                    <!-- Immunization Permissions -->
                    <div class="border border-slate-200 rounded-lg p-3">
                        <h4 class="font-semibold text-slate-700 text-sm flex items-center gap-2">
                            <i class="fa-solid fa-syringe text-brand-medium"></i>
                            Immunization & Nutrition
                        </h4>
                        <div class="grid grid-cols-2 gap-2 mt-2">
                            <label class="flex items-center gap-2 text-xs text-slate-600">
                                <input type="checkbox" class="rounded border-slate-300 text-brand-dark" checked> View Child Records
                            </label>
                            <label class="flex items-center gap-2 text-xs text-slate-600">
                                <input type="checkbox" class="rounded border-slate-300 text-brand-dark" checked> Manage Vaccinations
                            </label>
                            <label class="flex items-center gap-2 text-xs text-slate-600">
                                <input type="checkbox" class="rounded border-slate-300 text-brand-dark" checked> Track Growth
                            </label>
                            <label class="flex items-center gap-2 text-xs text-slate-600">
                                <input type="checkbox" class="rounded border-slate-300 text-brand-dark"> Manage Inventory
                            </label>
                        </div>
                    </div>

                    <!-- System Management Permissions -->
                    <div class="border border-slate-200 rounded-lg p-3">
                        <h4 class="font-semibold text-slate-700 text-sm flex items-center gap-2">
                            <i class="fa-solid fa-gear text-brand-medium"></i>
                            System Management
                        </h4>
                        <div class="grid grid-cols-2 gap-2 mt-2">
                            <label class="flex items-center gap-2 text-xs text-slate-600">
                                <input type="checkbox" class="rounded border-slate-300 text-brand-dark"> Manage Users
                            </label>
                            <label class="flex items-center gap-2 text-xs text-slate-600">
                                <input type="checkbox" class="rounded border-slate-300 text-brand-dark"> System Settings
                            </label>
                            <label class="flex items-center gap-2 text-xs text-slate-600">
                                <input type="checkbox" class="rounded border-slate-300 text-brand-dark"> View Logs
                            </label>
                            <label class="flex items-center gap-2 text-xs text-slate-600">
                                <input type="checkbox" class="rounded border-slate-300 text-brand-dark"> Backup & Recovery
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ============================================================ -->
    <!-- USER ACTIVITY LOG                                          -->
    <!-- ============================================================ -->
    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
        <div class="px-5 py-4 border-b border-slate-200 flex flex-wrap items-center justify-between gap-2">
            <h3 class="font-semibold text-slate-800 flex items-center gap-2">
                <i class="fa-solid fa-list-check text-brand-medium"></i>
                User Activity Logs
                <span class="text-xs font-normal text-slate-400">(<?php echo count($activityLogs); ?> activities)</span>
            </h3>
            <div class="flex items-center gap-2">
                <button onclick="filterActivity('all')" class="filter-btn-activity active px-3 py-1 text-xs font-semibold rounded-full bg-brand-dark text-white hover:bg-brand-medium transition" id="act-all">All</button>
                <button onclick="filterActivity('Success')" class="filter-btn-activity px-3 py-1 text-xs font-semibold rounded-full bg-emerald-100 text-emerald-700 hover:bg-emerald-200 transition" id="act-success">Success</button>
                <button onclick="filterActivity('Failed')" class="filter-btn-activity px-3 py-1 text-xs font-semibold rounded-full bg-red-100 text-red-700 hover:bg-red-200 transition" id="act-failed">Failed</button>
                <button onclick="clearLogs()" class="text-xs text-slate-400 hover:text-slate-600 font-medium">
                    Clear logs
                </button>
            </div>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="bg-slate-50 border-b border-slate-200">
                        <th class="text-left px-4 py-3 text-xs font-semibold text-slate-500 uppercase tracking-wider">User</th>
                        <th class="text-left px-4 py-3 text-xs font-semibold text-slate-500 uppercase tracking-wider">Action</th>
                        <th class="text-left px-4 py-3 text-xs font-semibold text-slate-500 uppercase tracking-wider">Timestamp</th>
                        <th class="text-left px-4 py-3 text-xs font-semibold text-slate-500 uppercase tracking-wider">IP Address</th>
                        <th class="text-left px-4 py-3 text-xs font-semibold text-slate-500 uppercase tracking-wider">Status</th>
                    </tr>
                </thead>
                <tbody id="activityTableBody">
                    <?php foreach ($activityLogs as $log): ?>
                    <tr class="border-b border-slate-100 hover:bg-slate-50 transition activity-row" data-status="<?php echo $log['status']; ?>">
                        <td class="px-4 py-3 font-medium text-slate-700"><?php echo $log['user']; ?></td>
                        <td class="px-4 py-3 text-slate-600 text-sm"><?php echo $log['action']; ?></td>
                        <td class="px-4 py-3 text-slate-500 text-xs"><?php echo date('M d, Y h:i A', strtotime($log['timestamp'])); ?></td>
                        <td class="px-4 py-3 text-slate-500 text-xs"><?php echo $log['ip']; ?></td>
                        <td class="px-4 py-3">
                            <span class="px-2 py-1 <?php echo $log['status'] == 'Success' ? 'bg-emerald-100 text-emerald-700' : 'bg-red-100 text-red-700'; ?> rounded-full text-xs font-semibold">
                                <?php echo $log['status']; ?>
                            </span>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- ============================================================ -->
<!-- ADD USER MODAL                                             -->
<!-- ============================================================ -->
<div id="addUserModal" class="hidden fixed inset-0 bg-slate-900/50 backdrop-blur-sm z-50 items-center justify-center p-4">
    <div class="bg-white rounded-2xl shadow-xl w-full max-w-lg max-h-[90vh] overflow-y-auto">
        <div class="flex items-center justify-between px-6 py-4 border-b border-slate-200 sticky top-0 bg-white rounded-t-2xl">
            <h3 class="font-bold text-slate-900 flex items-center gap-2">
                <i class="fa-solid fa-user-plus text-brand-medium"></i>
                Register New User
            </h3>
            <button onclick="closeModal('addUserModal')" class="w-8 h-8 rounded-lg hover:bg-slate-100 flex items-center justify-center text-slate-400 hover:text-slate-600 transition">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>
        <div class="p-6">
            <form onsubmit="registerUser(event)">
                <div class="space-y-4">
                    <div>
                        <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">Full Name</label>
                        <input type="text" class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none" placeholder="Enter full name" required>
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">Username</label>
                        <input type="text" class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none" placeholder="Choose username" required>
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">Email</label>
                        <input type="email" class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none" placeholder="Enter email address" required>
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">Password</label>
                        <input type="password" class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none" placeholder="Create password" required>
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">Role</label>
                        <select class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm bg-white focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none" required>
                            <option value="">Select Role</option>
                            <?php foreach ($roles as $role => $data): ?>
                            <option value="<?php echo $role; ?>"><?php echo $role; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">Status</label>
                        <select class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm bg-white focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none">
                            <option value="Active">Active</option>
                            <option value="Inactive">Inactive</option>
                            <option value="Suspended">Suspended</option>
                        </select>
                    </div>
                </div>
                <div class="flex justify-end gap-2 pt-4 border-t border-slate-100 mt-4">
                    <button type="button" onclick="closeModal('addUserModal')" class="px-4 py-2 bg-white border border-slate-200 text-slate-600 rounded-lg hover:bg-slate-50 transition text-sm font-semibold">
                        Cancel
                    </button>
                    <button type="submit" class="px-4 py-2 bg-brand-dark text-white rounded-lg hover:bg-brand-medium transition text-sm font-semibold">
                        <i class="fa-solid fa-save mr-1.5"></i> Register User
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Toast -->
<div id="toast" class="hidden fixed bottom-6 right-6 z-[60] px-4 py-3 rounded-lg shadow-lg text-sm font-semibold text-white flex items-center gap-2">
    <i class="fa-solid fa-circle-check"></i>
    <span id="toastMessage"></span>
</div>

<script>
    // ============================================================
    // FILTER USERS
    // ============================================================
    function filterUsers() {
        const roleFilter = document.getElementById('roleFilter').value;
        const statusFilter = document.getElementById('statusFilter').value;
        
        const rows = document.querySelectorAll('.user-row');
        rows.forEach(row => {
            const role = row.dataset.role;
            const status = row.dataset.status;
            
            let show = true;
            if (roleFilter !== 'all' && role !== roleFilter) show = false;
            if (statusFilter !== 'all' && status !== statusFilter) show = false;
            
            row.style.display = show ? 'table-row' : 'none';
        });
    }

    // ============================================================
    // FILTER ACTIVITY
    // ============================================================
    function filterActivity(status) {
        document.querySelectorAll('.filter-btn-activity').forEach(btn => {
            btn.classList.remove('active', 'bg-brand-dark', 'text-white');
            btn.classList.add('bg-white', 'text-slate-700');
        });
        
        if (status === 'all') {
            document.getElementById('act-all').classList.add('active', 'bg-brand-dark', 'text-white');
        } else if (status === 'Success') {
            document.getElementById('act-success').classList.add('active', 'bg-brand-dark', 'text-white');
        } else if (status === 'Failed') {
            document.getElementById('act-failed').classList.add('active', 'bg-brand-dark', 'text-white');
        }
        
        const rows = document.querySelectorAll('.activity-row');
        rows.forEach(row => {
            if (status === 'all' || row.dataset.status === status) {
                row.style.display = 'table-row';
            } else {
                row.style.display = 'none';
            }
        });
    }

    // ============================================================
    // EDIT USER
    // ============================================================
    function editUser(userId) {
        showToast('✏️ Editing user ID: ' + userId, 'info');
    }

    // ============================================================
    // MANAGE PERMISSIONS
    // ============================================================
    function managePermissions(userId) {
        showToast('🔑 Managing permissions for user ID: ' + userId, 'info');
    }

    // ============================================================
    // TOGGLE USER STATUS
    // ============================================================
    function toggleUserStatus(userId) {
        showToast('🔄 Toggled status for user ID: ' + userId, 'warning');
    }

    // ============================================================
    // DELETE USER
    // ============================================================
    function deleteUser(userId) {
        if (confirm('Are you sure you want to delete this user?')) {
            showToast('🗑️ User ID ' + userId + ' deleted', 'danger');
        }
    }

    // ============================================================
    // EDIT ROLE
    // ============================================================
    function editRole(roleName) {
        showToast('✏️ Editing role: ' + roleName, 'info');
    }

    // ============================================================
    // CLEAR LOGS
    // ============================================================
    function clearLogs() {
        if (confirm('Are you sure you want to clear all activity logs?')) {
            showToast('🗑️ Activity logs cleared', 'info');
        }
    }

    // ============================================================
    // REGISTER USER
    // ============================================================
    function registerUser(e) {
        e.preventDefault();
        showToast('✅ User registered successfully!', 'success');
        closeModal('addUserModal');
    }

    // ============================================================
    // REFRESH DATA
    // ============================================================
    function refreshData() {
        showToast('🔄 Refreshing data...', 'info');
        setTimeout(() => {
            showToast('✅ Data refreshed!', 'success');
        }, 1000);
    }

    // ============================================================
    // MODAL FUNCTIONS
    // ============================================================
    function openModal(id) {
        document.getElementById(id).classList.remove('hidden');
        document.getElementById(id).classList.add('flex');
        document.body.classList.add('overflow-hidden');
    }

    function closeModal(id) {
        document.getElementById(id).classList.add('hidden');
        document.getElementById(id).classList.remove('flex');
        document.body.classList.remove('overflow-hidden');
    }

    // Close modal on backdrop click
    document.querySelectorAll('.fixed.inset-0').forEach(modal => {
        modal.addEventListener('click', function(e) {
            if (e.target === this) {
                this.classList.add('hidden');
                this.classList.remove('flex');
                document.body.classList.remove('overflow-hidden');
            }
        });
    });

    // ============================================================
    // TOAST
    // ============================================================
    let toastTimer = null;

    function showToast(msg, type = 'success') {
        const t = document.getElementById('toast');
        const colors = {
            success: 'bg-brand-dark',
            danger: 'bg-rose-600',
            info: 'bg-blue-600',
            warning: 'bg-amber-600'
        };
        t.className = `fixed bottom-6 right-6 z-[60] px-4 py-3 rounded-lg shadow-lg text-sm font-semibold text-white flex items-center gap-2 ${colors[type] || colors.success}`;
        t.querySelector('i').className = 'fa-solid fa-circle-check';
        document.getElementById('toastMessage').textContent = msg;
        t.classList.remove('hidden');
        clearTimeout(toastTimer);
        toastTimer = setTimeout(() => t.classList.add('hidden'), 3000);
    }

    // ============================================================
    // ESC KEY TO CLOSE MODALS
    // ============================================================
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            document.querySelectorAll('.fixed.inset-0:not(.hidden)').forEach(modal => {
                modal.classList.add('hidden');
                modal.classList.remove('flex');
                document.body.classList.remove('overflow-hidden');
            });
        }
    });
</script>

<style>
    .animate-pulse {
        animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
    }
    @keyframes pulse {
        0%, 100% { opacity: 1; }
        50% { opacity: 0.5; }
    }
    
    .filter-btn-activity.active {
        background: #0B4F4A !important;
        color: white !important;
    }
    .filter-btn-activity:not(.active):hover {
        opacity: 0.8;
    }
    
    .user-row, .activity-row {
        transition: background-color 0.2s ease;
    }
</style>

<?php include_once '../includes/footer.php'; ?>