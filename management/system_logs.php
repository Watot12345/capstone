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

// ============================================================
// AUDIT TRAIL - System change logs
// ============================================================
$auditTrail = [
    [
        'id' => 'AUD-001',
        'timestamp' => '2024-01-20 08:30:00',
        'user' => 'Juan Dela Cruz',
        'action' => 'User Created',
        'module' => 'User Management',
        'details' => 'Created new user: Maria Santos (maria.santos@caloocan.gov.ph)',
        'ip_address' => '192.168.1.1',
        'status' => 'Success'
    ],
    [
        'id' => 'AUD-002',
        'timestamp' => '2024-01-20 09:15:00',
        'user' => 'Maria Santos',
        'action' => 'Patient Record Updated',
        'module' => 'Health Center Services',
        'details' => 'Updated patient record: Patient ID #12345 - Added new diagnosis',
        'ip_address' => '192.168.1.5',
        'status' => 'Success'
    ],
    [
        'id' => 'AUD-003',
        'timestamp' => '2024-01-20 10:00:00',
        'user' => 'Pedro Reyes',
        'action' => 'Permit Approved',
        'module' => 'Sanitation Permits',
        'details' => 'Approved permit application #SAP-2024-001 for Riverside Food Court',
        'ip_address' => '192.168.1.3',
        'status' => 'Success'
    ],
    [
        'id' => 'AUD-004',
        'timestamp' => '2024-01-19 14:30:00',
        'user' => 'Ana Cruz',
        'action' => 'Password Changed',
        'module' => 'User Management',
        'details' => 'User Ana Cruz changed their password',
        'ip_address' => '192.168.1.7',
        'status' => 'Success'
    ],
    [
        'id' => 'AUD-005',
        'timestamp' => '2024-01-19 16:20:00',
        'user' => 'Carlos Garcia',
        'action' => 'Outbreak Alert Created',
        'module' => 'Health Surveillance',
        'details' => 'Created new outbreak alert: Dengue outbreak in San Jose (12 cases reported)',
        'ip_address' => '192.168.1.9',
        'status' => 'Success'
    ],
    [
        'id' => 'AUD-006',
        'timestamp' => '2024-01-18 11:45:00',
        'user' => 'Elena Lim',
        'action' => 'Inventory Updated',
        'module' => 'Immunization & Nutrition',
        'details' => 'Updated vaccine inventory: Added 50 doses of Dengue vaccine',
        'ip_address' => '192.168.1.11',
        'status' => 'Success'
    ],
    [
        'id' => 'AUD-007',
        'timestamp' => '2024-01-18 09:00:00',
        'user' => 'System Admin',
        'action' => 'System Configuration Changed',
        'module' => 'System Management',
        'details' => 'Updated system settings: Changed notification threshold to 10 cases',
        'ip_address' => '127.0.0.1',
        'status' => 'Success'
    ],
];

// ============================================================
// ACTIVITY LOGS - User activities
// ============================================================
$activityLogs = [
    [
        'id' => 'ACT-001',
        'timestamp' => '2024-01-20 08:30:00',
        'user' => 'Juan Dela Cruz',
        'action' => 'Logged In',
        'module' => 'Authentication',
        'duration' => '2.3s',
        'ip_address' => '192.168.1.1',
        'status' => 'Success'
    ],
    [
        'id' => 'ACT-002',
        'timestamp' => '2024-01-20 08:45:00',
        'user' => 'Maria Santos',
        'action' => 'Viewed Dashboard',
        'module' => 'System Overview',
        'duration' => '1.2s',
        'ip_address' => '192.168.1.5',
        'status' => 'Success'
    ],
    [
        'id' => 'ACT-003',
        'timestamp' => '2024-01-20 09:15:00',
        'user' => 'Pedro Reyes',
        'action' => 'Generated Report',
        'module' => 'Reports',
        'duration' => '4.5s',
        'ip_address' => '192.168.1.3',
        'status' => 'Success'
    ],
    [
        'id' => 'ACT-004',
        'timestamp' => '2024-01-20 10:30:00',
        'user' => 'Ana Cruz',
        'action' => 'Updated Patient Record',
        'module' => 'Health Center Services',
        'duration' => '3.1s',
        'ip_address' => '192.168.1.7',
        'status' => 'Success'
    ],
    [
        'id' => 'ACT-005',
        'timestamp' => '2024-01-19 16:00:00',
        'user' => 'Carlos Garcia',
        'action' => 'Exported Data',
        'module' => 'Health Surveillance',
        'duration' => '5.2s',
        'ip_address' => '192.168.1.9',
        'status' => 'Success'
    ],
    [
        'id' => 'ACT-006',
        'timestamp' => '2024-01-19 13:30:00',
        'user' => 'Unknown',
        'action' => 'Failed Login Attempt',
        'module' => 'Authentication',
        'duration' => '0.8s',
        'ip_address' => '10.0.0.5',
        'status' => 'Failed'
    ],
    [
        'id' => 'ACT-007',
        'timestamp' => '2024-01-19 14:00:00',
        'user' => 'Elena Lim',
        'action' => 'Logged Out',
        'module' => 'Authentication',
        'duration' => '0.3s',
        'ip_address' => '192.168.1.11',
        'status' => 'Success'
    ],
    [
        'id' => 'ACT-008',
        'timestamp' => '2024-01-18 10:00:00',
        'user' => 'System Admin',
        'action' => 'System Backup',
        'module' => 'System Management',
        'duration' => '120.0s',
        'ip_address' => '127.0.0.1',
        'status' => 'Success'
    ],
];

// ============================================================
// ERROR LOGS - System errors
// ============================================================
$errorLogs = [
    [
        'id' => 'ERR-001',
        'timestamp' => '2024-01-20 08:15:00',
        'level' => 'Warning',
        'source' => 'Database Connection',
        'message' => 'Database connection timeout after 5 seconds',
        'file' => '/var/www/html/includes/db.php',
        'line' => 45,
        'stack_trace' => 'db_connect() -> query_timeout()',
        'status' => 'Resolved'
    ],
    [
        'id' => 'ERR-002',
        'timestamp' => '2024-01-20 09:30:00',
        'level' => 'Error',
        'source' => 'Patient Records',
        'message' => 'Failed to update patient record: Invalid data format',
        'file' => '/var/www/html/modules/healthservices/patients.php',
        'line' => 234,
        'stack_trace' => 'update_patient() -> validate_data() -> format_error()',
        'status' => 'Resolved'
    ],
    [
        'id' => 'ERR-003',
        'timestamp' => '2024-01-19 15:20:00',
        'level' => 'Critical',
        'source' => 'Authentication',
        'message' => 'Multiple failed login attempts detected from IP 10.0.0.5',
        'file' => '/var/www/html/includes/auth.php',
        'line' => 89,
        'stack_trace' => 'authenticate() -> check_attempts() -> block_ip()',
        'status' => 'Open'
    ],
    [
        'id' => 'ERR-004',
        'timestamp' => '2024-01-19 11:00:00',
        'level' => 'Warning',
        'source' => 'File Upload',
        'message' => 'File upload failed: File exceeds maximum allowed size',
        'file' => '/var/www/html/modules/sanitation/documents.php',
        'line' => 156,
        'stack_trace' => 'upload_file() -> check_size() -> size_exceeded()',
        'status' => 'Resolved'
    ],
    [
        'id' => 'ERR-005',
        'timestamp' => '2024-01-18 16:45:00',
        'level' => 'Error',
        'source' => 'API Integration',
        'message' => 'API request failed: Service unavailable',
        'file' => '/var/www/html/api/weather_api.php',
        'line' => 67,
        'stack_trace' => 'call_api() -> request() -> timeout()',
        'status' => 'Open'
    ],
    [
        'id' => 'ERR-006',
        'timestamp' => '2024-01-18 08:00:00',
        'level' => 'Critical',
        'source' => 'System Memory',
        'message' => 'System memory usage exceeded 90%',
        'file' => '/var/www/html/includes/monitor.php',
        'line' => 23,
        'stack_trace' => 'memory_check() -> usage_high() -> alert()',
        'status' => 'Resolved'
    ],
];

// ============================================================
// STATISTICS
// ============================================================
$totalAudit = count($auditTrail);
$totalActivities = count($activityLogs);
$totalErrors = count($errorLogs);
$criticalErrors = count(array_filter($errorLogs, function($e) { return $e['level'] == 'Critical'; }));
$openErrors = count(array_filter($errorLogs, function($e) { return $e['status'] == 'Open'; }));

$title = 'System Logs';
?>

<!-- ============================================================ -->
<!-- 2. HTML + PHP EMBEDDED + Tailwind CSS                       -->
<!-- ============================================================ -->

<div class="flex-1 px-6 pt-[26px] pb-20 mb-10 flex flex-col min-h-0 overflow-hidden">

    <!-- Page Header -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6">
        <div>
            <div class="flex items-center gap-3 mb-1">
                <h2 class="text-2xl font-black text-slate-900 tracking-tight">System Logs</h2>
                <span class="px-3 py-1 bg-brand-light text-brand-dark rounded-full text-xs font-bold flex items-center gap-1">
                    <i class="fa-solid fa-clock-rotate-left"></i> <?php echo $totalAudit + $totalActivities + $totalErrors; ?> Total Logs
                </span>
            </div>
            <p class="text-sm text-slate-500 mt-0.5">Audit trail, activity logs, error logs & log search</p>
        </div>
        <div class="flex gap-3 flex-wrap">
            <button onclick="exportLogs()" class="px-4 py-2 bg-brand-dark text-white rounded-lg hover:bg-brand-medium transition text-sm font-semibold flex items-center gap-2 shadow-sm">
                <i class="fa-solid fa-file-export text-xs"></i> Export Logs
            </button>
            <button onclick="refreshData()" class="px-4 py-2 bg-white border border-slate-200 text-slate-700 rounded-lg hover:bg-slate-50 transition text-sm font-semibold flex items-center gap-2">
                <i class="fa-solid fa-sync-alt text-xs"></i> Refresh
            </button>
        </div>
    </div>

    <!-- ============================================================ -->
    <!-- KPI CARDS - Logs Overview                                 -->
    <!-- ============================================================ -->
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-6">
        <!-- Card 1: Total Logs -->
        <div class="relative overflow-hidden bg-white rounded-2xl shadow-sm border border-slate-200 p-5 hover:shadow-lg transition group">
            <div class="absolute -top-12 -right-12 w-24 h-24 bg-blue-100 rounded-full opacity-50 group-hover:scale-110 transition"></div>
            <div class="relative">
                <div class="flex items-center gap-3">
                    <div class="w-11 h-11 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl flex items-center justify-center text-white shadow-lg shadow-blue-200">
                        <i class="fa-solid fa-list text-lg"></i>
                    </div>
                    <div>
                        <p class="text-2xl font-black text-slate-900"><?php echo $totalAudit + $totalActivities + $totalErrors; ?></p>
                        <p class="text-xs font-medium text-slate-500">Total Logs</p>
                    </div>
                </div>
                <div class="mt-3 flex items-center gap-2">
                    <span class="px-2 py-0.5 bg-blue-100 text-blue-700 rounded-full text-[10px] font-bold">📊 All records</span>
                    <span class="text-[10px] text-slate-400">Last 30 days</span>
                </div>
            </div>
        </div>

        <!-- Card 2: Critical Errors -->
        <div class="relative overflow-hidden bg-white rounded-2xl shadow-sm border border-slate-200 p-5 hover:shadow-lg transition group">
            <div class="absolute -top-12 -right-12 w-24 h-24 bg-red-100 rounded-full opacity-50 group-hover:scale-110 transition"></div>
            <div class="relative">
                <div class="flex items-center gap-3">
                    <div class="w-11 h-11 bg-gradient-to-br from-red-500 to-red-600 rounded-xl flex items-center justify-center text-white shadow-lg shadow-red-200">
                        <i class="fa-solid fa-bug text-lg"></i>
                    </div>
                    <div>
                        <p class="text-2xl font-black text-red-600"><?php echo $criticalErrors; ?></p>
                        <p class="text-xs font-medium text-slate-500">Critical Errors</p>
                    </div>
                </div>
                <div class="mt-3 flex items-center gap-2">
                    <span class="px-2 py-0.5 bg-red-100 text-red-700 rounded-full text-[10px] font-bold">⚠️ Urgent</span>
                    <span class="text-[10px] text-slate-400"><?php echo $openErrors; ?> Open</span>
                </div>
            </div>
        </div>

        <!-- Card 3: Open Issues -->
        <div class="relative overflow-hidden bg-white rounded-2xl shadow-sm border border-slate-200 p-5 hover:shadow-lg transition group">
            <div class="absolute -top-12 -right-12 w-24 h-24 bg-amber-100 rounded-full opacity-50 group-hover:scale-110 transition"></div>
            <div class="relative">
                <div class="flex items-center gap-3">
                    <div class="w-11 h-11 bg-gradient-to-br from-amber-500 to-amber-600 rounded-xl flex items-center justify-center text-white shadow-lg shadow-amber-200">
                        <i class="fa-solid fa-triangle-exclamation text-lg"></i>
                    </div>
                    <div>
                        <p class="text-2xl font-black text-amber-600"><?php echo $openErrors; ?></p>
                        <p class="text-xs font-medium text-slate-500">Open Issues</p>
                    </div>
                </div>
                <div class="mt-3 flex items-center gap-2">
                    <span class="px-2 py-0.5 bg-amber-100 text-amber-700 rounded-full text-[10px] font-bold">🔧 Needs Fix</span>
                    <span class="text-[10px] text-slate-400">Unresolved</span>
                </div>
            </div>
        </div>

        <!-- Card 4: Audit Entries -->
        <div class="relative overflow-hidden bg-white rounded-2xl shadow-sm border border-slate-200 p-5 hover:shadow-lg transition group">
            <div class="absolute -top-12 -right-12 w-24 h-24 bg-purple-100 rounded-full opacity-50 group-hover:scale-110 transition"></div>
            <div class="relative">
                <div class="flex items-center gap-3">
                    <div class="w-11 h-11 bg-gradient-to-br from-purple-500 to-purple-600 rounded-xl flex items-center justify-center text-white shadow-lg shadow-purple-200">
                        <i class="fa-solid fa-file-shield text-lg"></i>
                    </div>
                    <div>
                        <p class="text-2xl font-black text-purple-600"><?php echo $totalAudit; ?></p>
                        <p class="text-xs font-medium text-slate-500">Audit Entries</p>
                    </div>
                </div>
                <div class="mt-3 flex items-center gap-2">
                    <span class="px-2 py-0.5 bg-purple-100 text-purple-700 rounded-full text-[10px] font-bold">🔍 Tracked</span>
                    <span class="text-[10px] text-slate-400">System changes</span>
                </div>
            </div>
        </div>
    </div>

    <!-- ============================================================ -->
    <!-- LOG SEARCH BAR                                             -->
    <!-- ============================================================ -->
    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden mb-6">
        <div class="p-4">
            <div class="flex flex-wrap items-center gap-3">
                <div class="flex-1 min-w-[200px]">
                    <div class="relative">
                        <i class="fa-solid fa-search absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-xs"></i>
                        <input type="text" id="logSearch" onkeyup="searchLogs()" placeholder="Search logs by user, action, module, or message..." class="w-full pl-9 pr-3 py-2 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none">
                    </div>
                </div>
                <div class="flex items-center gap-2">
                    <select id="logTypeFilter" onchange="filterLogs()" class="px-3 py-2 text-sm border border-slate-200 rounded-lg bg-white focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none">
                        <option value="all">All Log Types</option>
                        <option value="audit">Audit Trail</option>
                        <option value="activity">Activity Logs</option>
                        <option value="error">Error Logs</option>
                    </select>
                    <select id="logStatusFilter" onchange="filterLogs()" class="px-3 py-2 text-sm border border-slate-200 rounded-lg bg-white focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none">
                        <option value="all">All Status</option>
                        <option value="Success">Success</option>
                        <option value="Failed">Failed</option>
                        <option value="Resolved">Resolved</option>
                        <option value="Open">Open</option>
                    </select>
                    <button onclick="clearSearch()" class="px-3 py-2 bg-slate-100 text-slate-600 rounded-lg hover:bg-slate-200 transition text-sm font-semibold">
                        <i class="fa-solid fa-times"></i> Clear
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- ============================================================ -->
    <!-- TAB NAVIGATION                                             -->
    <!-- ============================================================ -->
    <div class="flex gap-2 mb-6 border-b border-slate-200">
        <button onclick="switchTab('audit')" class="tab-btn active px-4 py-2.5 text-sm font-semibold border-b-2 border-brand-dark text-brand-dark transition" id="tab-audit">
            <i class="fa-solid fa-file-shield"></i> Audit Trail
            <span class="ml-1.5 px-2 py-0.5 bg-slate-100 text-slate-600 rounded-full text-[10px]"><?php echo $totalAudit; ?></span>
        </button>
        <button onclick="switchTab('activity')" class="tab-btn px-4 py-2.5 text-sm font-semibold border-b-2 border-transparent text-slate-500 hover:text-slate-700 transition" id="tab-activity">
            <i class="fa-solid fa-list-check"></i> Activity Logs
            <span class="ml-1.5 px-2 py-0.5 bg-slate-100 text-slate-600 rounded-full text-[10px]"><?php echo $totalActivities; ?></span>
        </button>
        <button onclick="switchTab('error')" class="tab-btn px-4 py-2.5 text-sm font-semibold border-b-2 border-transparent text-slate-500 hover:text-slate-700 transition" id="tab-error">
            <i class="fa-solid fa-bug"></i> Error Logs
            <span class="ml-1.5 px-2 py-0.5 bg-slate-100 text-slate-600 rounded-full text-[10px]"><?php echo $totalErrors; ?></span>
        </button>
    </div>

    <!-- ============================================================ -->
    <!-- TAB CONTENT: AUDIT TRAIL                                  -->
    <!-- ============================================================ -->
    <div id="auditContent" class="tab-content">
        <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
            <div class="px-5 py-4 border-b border-slate-200 flex flex-wrap items-center justify-between gap-2">
                <h3 class="font-semibold text-slate-800 flex items-center gap-2">
                    <i class="fa-solid fa-file-shield text-brand-medium"></i>
                    Audit Trail
                    <span class="text-xs font-normal text-slate-400">(<?php echo $totalAudit; ?> entries)</span>
                </h3>
                <div class="flex items-center gap-2">
                    <span class="text-xs text-slate-400">Showing system changes and modifications</span>
                </div>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead>
                        <tr class="bg-slate-50 border-b border-slate-200">
                            <th class="text-left px-4 py-3 text-xs font-semibold text-slate-500 uppercase tracking-wider">ID</th>
                            <th class="text-left px-4 py-3 text-xs font-semibold text-slate-500 uppercase tracking-wider">Timestamp</th>
                            <th class="text-left px-4 py-3 text-xs font-semibold text-slate-500 uppercase tracking-wider">User</th>
                            <th class="text-left px-4 py-3 text-xs font-semibold text-slate-500 uppercase tracking-wider">Action</th>
                            <th class="text-left px-4 py-3 text-xs font-semibold text-slate-500 uppercase tracking-wider">Module</th>
                            <th class="text-left px-4 py-3 text-xs font-semibold text-slate-500 uppercase tracking-wider">Details</th>
                            <th class="text-left px-4 py-3 text-xs font-semibold text-slate-500 uppercase tracking-wider">Status</th>
                        </tr>
                    </thead>
                    <tbody id="auditTableBody">
                        <?php foreach ($auditTrail as $log): ?>
                        <tr class="border-b border-slate-100 hover:bg-slate-50 transition log-row" data-type="audit" data-status="<?php echo $log['status']; ?>">
                            <td class="px-4 py-3 font-medium text-slate-700 text-xs"><?php echo $log['id']; ?></td>
                            <td class="px-4 py-3 text-slate-500 text-xs"><?php echo date('M d, Y h:i A', strtotime($log['timestamp'])); ?></td>
                            <td class="px-4 py-3 font-medium text-slate-700"><?php echo $log['user']; ?></td>
                            <td class="px-4 py-3 text-slate-600 text-sm"><?php echo $log['action']; ?></td>
                            <td class="px-4 py-3">
                                <span class="px-2 py-1 bg-purple-100 text-purple-700 rounded-full text-xs font-medium"><?php echo $log['module']; ?></span>
                            </td>
                            <td class="px-4 py-3 text-slate-500 text-xs max-w-[200px] truncate" title="<?php echo $log['details']; ?>"><?php echo $log['details']; ?></td>
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
    <!-- TAB CONTENT: ACTIVITY LOGS                                -->
    <!-- ============================================================ -->
    <div id="activityContent" class="tab-content hidden">
        <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
            <div class="px-5 py-4 border-b border-slate-200 flex flex-wrap items-center justify-between gap-2">
                <h3 class="font-semibold text-slate-800 flex items-center gap-2">
                    <i class="fa-solid fa-list-check text-brand-medium"></i>
                    Activity Logs
                    <span class="text-xs font-normal text-slate-400">(<?php echo $totalActivities; ?> entries)</span>
                </h3>
                <div class="flex items-center gap-2">
                    <span class="text-xs text-slate-400">User activities and system events</span>
                </div>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead>
                        <tr class="bg-slate-50 border-b border-slate-200">
                            <th class="text-left px-4 py-3 text-xs font-semibold text-slate-500 uppercase tracking-wider">ID</th>
                            <th class="text-left px-4 py-3 text-xs font-semibold text-slate-500 uppercase tracking-wider">Timestamp</th>
                            <th class="text-left px-4 py-3 text-xs font-semibold text-slate-500 uppercase tracking-wider">User</th>
                            <th class="text-left px-4 py-3 text-xs font-semibold text-slate-500 uppercase tracking-wider">Action</th>
                            <th class="text-left px-4 py-3 text-xs font-semibold text-slate-500 uppercase tracking-wider">Module</th>
                            <th class="text-left px-4 py-3 text-xs font-semibold text-slate-500 uppercase tracking-wider">Duration</th>
                            <th class="text-left px-4 py-3 text-xs font-semibold text-slate-500 uppercase tracking-wider">Status</th>
                        </tr>
                    </thead>
                    <tbody id="activityTableBody">
                        <?php foreach ($activityLogs as $log): ?>
                        <tr class="border-b border-slate-100 hover:bg-slate-50 transition log-row" data-type="activity" data-status="<?php echo $log['status']; ?>">
                            <td class="px-4 py-3 font-medium text-slate-700 text-xs"><?php echo $log['id']; ?></td>
                            <td class="px-4 py-3 text-slate-500 text-xs"><?php echo date('M d, Y h:i A', strtotime($log['timestamp'])); ?></td>
                            <td class="px-4 py-3 font-medium text-slate-700"><?php echo $log['user']; ?></td>
                            <td class="px-4 py-3 text-slate-600 text-sm"><?php echo $log['action']; ?></td>
                            <td class="px-4 py-3">
                                <span class="px-2 py-1 bg-blue-100 text-blue-700 rounded-full text-xs font-medium"><?php echo $log['module']; ?></span>
                            </td>
                            <td class="px-4 py-3 text-slate-500 text-xs"><?php echo $log['duration']; ?></td>
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
    <!-- TAB CONTENT: ERROR LOGS                                  -->
    <!-- ============================================================ -->
    <div id="errorContent" class="tab-content hidden">
        <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
            <div class="px-5 py-4 border-b border-slate-200 flex flex-wrap items-center justify-between gap-2">
                <h3 class="font-semibold text-slate-800 flex items-center gap-2">
                    <i class="fa-solid fa-bug text-brand-medium"></i>
                    Error Logs
                    <span class="text-xs font-normal text-slate-400">(<?php echo $totalErrors; ?> entries)</span>
                </h3>
                <div class="flex items-center gap-2">
                    <span class="text-xs text-slate-400">System errors and warnings</span>
                </div>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead>
                        <tr class="bg-slate-50 border-b border-slate-200">
                            <th class="text-left px-4 py-3 text-xs font-semibold text-slate-500 uppercase tracking-wider">ID</th>
                            <th class="text-left px-4 py-3 text-xs font-semibold text-slate-500 uppercase tracking-wider">Timestamp</th>
                            <th class="text-left px-4 py-3 text-xs font-semibold text-slate-500 uppercase tracking-wider">Level</th>
                            <th class="text-left px-4 py-3 text-xs font-semibold text-slate-500 uppercase tracking-wider">Source</th>
                            <th class="text-left px-4 py-3 text-xs font-semibold text-slate-500 uppercase tracking-wider">Message</th>
                            <th class="text-left px-4 py-3 text-xs font-semibold text-slate-500 uppercase tracking-wider">Status</th>
                            <th class="text-left px-4 py-3 text-xs font-semibold text-slate-500 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody id="errorTableBody">
                        <?php foreach ($errorLogs as $log): 
                            $levelColors = [
                                'Critical' => 'bg-red-100 text-red-700',
                                'Error' => 'bg-amber-100 text-amber-700',
                                'Warning' => 'bg-yellow-100 text-yellow-700'
                            ];
                        ?>
                        <tr class="border-b border-slate-100 hover:bg-slate-50 transition log-row" data-type="error" data-status="<?php echo $log['status']; ?>">
                            <td class="px-4 py-3 font-medium text-slate-700 text-xs"><?php echo $log['id']; ?></td>
                            <td class="px-4 py-3 text-slate-500 text-xs"><?php echo date('M d, Y h:i A', strtotime($log['timestamp'])); ?></td>
                            <td class="px-4 py-3">
                                <span class="px-2 py-1 <?php echo $levelColors[$log['level']] ?? 'bg-slate-100 text-slate-700'; ?> rounded-full text-xs font-semibold">
                                    <?php echo $log['level']; ?>
                                </span>
                            </td>
                            <td class="px-4 py-3 text-slate-600 text-sm"><?php echo $log['source']; ?></td>
                            <td class="px-4 py-3 text-slate-500 text-xs max-w-[200px] truncate" title="<?php echo $log['message']; ?>"><?php echo $log['message']; ?></td>
                            <td class="px-4 py-3">
                                <span class="px-2 py-1 <?php echo $log['status'] == 'Resolved' ? 'bg-emerald-100 text-emerald-700' : 'bg-red-100 text-red-700'; ?> rounded-full text-xs font-semibold">
                                    <?php echo $log['status']; ?>
                                </span>
                            </td>
                            <td class="px-4 py-3">
                                <button onclick="viewErrorDetails('<?php echo $log['id']; ?>')" class="text-brand-dark hover:text-brand-medium text-xs font-medium transition px-2 py-1 hover:bg-brand-light rounded">
                                    <i class="fa-solid fa-eye"></i>
                                </button>
                                <button onclick="resolveError('<?php echo $log['id']; ?>')" class="text-emerald-600 hover:text-emerald-800 text-xs font-medium transition px-2 py-1 hover:bg-emerald-50 rounded">
                                    <i class="fa-solid fa-check"></i>
                                </button>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- ============================================================ -->
<!-- ERROR DETAILS MODAL                                        -->
<!-- ============================================================ -->
<div id="errorDetailsModal" class="hidden fixed inset-0 bg-slate-900/50 backdrop-blur-sm z-50 items-center justify-center p-4">
    <div class="bg-white rounded-2xl shadow-xl w-full max-w-2xl max-h-[90vh] overflow-y-auto">
        <div class="flex items-center justify-between px-6 py-4 border-b border-slate-200 sticky top-0 bg-white rounded-t-2xl">
            <h3 class="font-bold text-slate-900 flex items-center gap-2">
                <i class="fa-solid fa-bug text-red-500"></i>
                Error Details
            </h3>
            <button onclick="closeModal('errorDetailsModal')" class="w-8 h-8 rounded-lg hover:bg-slate-100 flex items-center justify-center text-slate-400 hover:text-slate-600 transition">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>
        <div class="p-6" id="errorDetailsContent">
            <!-- Dynamic content loaded via JavaScript -->
        </div>
    </div>
</div>

<!-- Toast -->
<div id="toast" class="hidden fixed bottom-6 right-6 z-[60] px-4 py-3 rounded-lg shadow-lg text-sm font-semibold text-white flex items-center gap-2">
    <i class="fa-solid fa-circle-check"></i>
    <span id="toastMessage"></span>
</div>

<script>
    // PHP Data to JavaScript
    const ERROR_LOGS = <?php echo json_encode($errorLogs); ?>;

    // ============================================================
    // TAB SWITCHING
    // ============================================================
    function switchTab(tab) {
        // Update tab buttons
        document.querySelectorAll('.tab-btn').forEach(btn => {
            btn.classList.remove('active', 'border-brand-dark', 'text-brand-dark');
            btn.classList.add('border-transparent', 'text-slate-500');
        });
        
        const tabBtn = document.getElementById('tab-' + tab);
        tabBtn.classList.add('active', 'border-brand-dark', 'text-brand-dark');
        tabBtn.classList.remove('border-transparent', 'text-slate-500');
        
        // Show/hide content
        document.querySelectorAll('.tab-content').forEach(content => {
            content.classList.add('hidden');
        });
        
        if (tab === 'audit') {
            document.getElementById('auditContent').classList.remove('hidden');
        } else if (tab === 'activity') {
            document.getElementById('activityContent').classList.remove('hidden');
        } else if (tab === 'error') {
            document.getElementById('errorContent').classList.remove('hidden');
        }
    }

    // ============================================================
    // SEARCH LOGS
    // ============================================================
    function searchLogs() {
        const searchTerm = document.getElementById('logSearch').value.toLowerCase();
        const rows = document.querySelectorAll('.log-row');
        
        rows.forEach(row => {
            const text = row.textContent.toLowerCase();
            if (text.includes(searchTerm)) {
                row.style.display = 'table-row';
            } else {
                row.style.display = 'none';
            }
        });
    }

    // ============================================================
    // FILTER LOGS
    // ============================================================
    function filterLogs() {
        const typeFilter = document.getElementById('logTypeFilter').value;
        const statusFilter = document.getElementById('logStatusFilter').value;
        const rows = document.querySelectorAll('.log-row');
        
        rows.forEach(row => {
            const type = row.dataset.type;
            const status = row.dataset.status;
            
            let show = true;
            if (typeFilter !== 'all' && type !== typeFilter) show = false;
            if (statusFilter !== 'all' && status !== statusFilter) show = false;
            
            // Also check if the row's tab is visible
            const parentContent = row.closest('.tab-content');
            if (parentContent && parentContent.classList.contains('hidden')) {
                show = false;
            }
            
            row.style.display = show ? 'table-row' : 'none';
        });
    }

    // ============================================================
    // CLEAR SEARCH
    // ============================================================
    function clearSearch() {
        document.getElementById('logSearch').value = '';
        document.getElementById('logTypeFilter').value = 'all';
        document.getElementById('logStatusFilter').value = 'all';
        
        document.querySelectorAll('.log-row').forEach(row => {
            row.style.display = 'table-row';
        });
    }

    // ============================================================
    // VIEW ERROR DETAILS
    // ============================================================
    function viewErrorDetails(errorId) {
        const error = ERROR_LOGS.find(e => e.id === errorId);
        const content = document.getElementById('errorDetailsContent');
        
        if (error) {
            content.innerHTML = `
                <div class="space-y-4">
                    <div class="flex items-center justify-between">
                        <div>
                            <h4 class="font-bold text-slate-800">${error.id}</h4>
                            <p class="text-xs text-slate-500">${error.timestamp}</p>
                        </div>
                        <span class="px-2 py-1 ${error.level === 'Critical' ? 'bg-red-100 text-red-700' : error.level === 'Error' ? 'bg-amber-100 text-amber-700' : 'bg-yellow-100 text-yellow-700'} rounded-full text-xs font-semibold">
                            ${error.level}
                        </span>
                    </div>
                    
                    <div class="grid grid-cols-2 gap-3">
                        <div>
                            <p class="text-xs text-slate-500">Source</p>
                            <p class="font-medium text-slate-700">${error.source}</p>
                        </div>
                        <div>
                            <p class="text-xs text-slate-500">Status</p>
                            <span class="px-2 py-1 ${error.status === 'Resolved' ? 'bg-emerald-100 text-emerald-700' : 'bg-red-100 text-red-700'} rounded-full text-xs font-semibold">
                                ${error.status}
                            </span>
                        </div>
                        <div>
                            <p class="text-xs text-slate-500">File</p>
                            <p class="font-medium text-slate-700 text-sm">${error.file}</p>
                        </div>
                        <div>
                            <p class="text-xs text-slate-500">Line</p>
                            <p class="font-medium text-slate-700">${error.line}</p>
                        </div>
                    </div>
                    
                    <div>
                        <p class="text-xs text-slate-500">Message</p>
                        <div class="p-3 bg-red-50 border border-red-200 rounded-lg">
                            <p class="text-sm text-red-700 font-medium">${error.message}</p>
                        </div>
                    </div>
                    
                    <div>
                        <p class="text-xs text-slate-500">Stack Trace</p>
                        <div class="p-3 bg-slate-50 border border-slate-200 rounded-lg">
                            <code class="text-xs text-slate-700 font-mono">${error.stack_trace}</code>
                        </div>
                    </div>
                    
                    <div class="flex gap-2 pt-2">
                        <button onclick="closeModal('errorDetailsModal')" class="flex-1 px-4 py-2 bg-white border border-slate-200 text-slate-600 rounded-lg hover:bg-slate-50 transition text-sm font-semibold">
                            Close
                        </button>
                        <button onclick="resolveError('${error.id}')" class="flex-1 px-4 py-2 bg-emerald-600 text-white rounded-lg hover:bg-emerald-700 transition text-sm font-semibold">
                            <i class="fa-solid fa-check"></i> Resolve Issue
                        </button>
                    </div>
                </div>
            `;
        }
        
        openModal('errorDetailsModal');
    }

    // ============================================================
    // RESOLVE ERROR
    // ============================================================
    function resolveError(errorId) {
        if (confirm('Mark error ' + errorId + ' as resolved?')) {
            showToast('✅ Error ' + errorId + ' resolved!', 'success');
        }
    }

    // ============================================================
    // EXPORT LOGS
    // ============================================================
    function exportLogs() {
        showToast('📄 Exporting logs...', 'info');
        setTimeout(() => {
            showToast('✅ Logs exported successfully!', 'success');
        }, 1500);
    }

    // ============================================================
    // REFRESH DATA
    // ============================================================
    function refreshData() {
        showToast('🔄 Refreshing logs...', 'info');
        setTimeout(() => {
            showToast('✅ Logs refreshed!', 'success');
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
    
    .tab-btn.active {
        border-bottom-width: 2px;
    }
    .tab-btn:not(.active):hover {
        border-bottom-color: #CBD5E1;
    }
    
    .log-row {
        transition: background-color 0.2s ease;
    }
</style>

<?php include_once '../includes/footer.php'; ?>