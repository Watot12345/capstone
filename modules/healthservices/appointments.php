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
require_once '../../includes/header.php';
require_once '../../includes/sidebar.php';

require_once __DIR__ . '/../../app/Models/Patient.php';
require_once __DIR__ . '/../../app/Models/Employee.php';
require_once __DIR__ . '/../../app/Models/Appointment.php';
require_once __DIR__ . '/../../app/Controllers/AppointmentController.php';

// Fetch Patients
$patientModel = new Patient();
$dbPatients = [];
try {
    $dbPatients = $patientModel->all(['order' => 'first_name.asc']);
} catch (Throwable $e) {
    error_log('Error loading patients: ' . $e->getMessage());
}

// Fetch Employees/Doctors
$employeeModel = new Employee();
$dbEmployees = [];
try {
    $dbEmployees = $employeeModel->all();
} catch (Throwable $e) {
    error_log('Error loading employees: ' . $e->getMessage());
}

// Fetch Appointments
$appointmentModel = new Appointment();
$appointments = [];

try {
    $rawAppointments = $appointmentModel->all(['order' => 'appointment_date.desc,appointment_time.asc,created_at.desc']);

    $patientsMap = [];
    foreach ($dbPatients as $p) {
        if (isset($p['id'])) {
            $patientsMap[$p['id']] = $p;
        }
    }

    $employeesMap = [];
    foreach ($dbEmployees as $e) {
        if (isset($e['id'])) {
            $employeesMap[$e['id']] = $e;
        }
    }

    foreach ($rawAppointments as $a) {
        $patientId = $a['patient_id'] ?? null;
        $patient = $patientsMap[$patientId] ?? null;

        if ($patient) {
            $firstName = $patient['first_name'] ?? '';
            $lastName = $patient['last_name'] ?? '';
            $patientName = trim("$firstName $lastName");
            $patientCode = $patient['patient_id'] ?? "P-$patientId";

            $initials = '';
            if (!empty($firstName)) $initials .= strtoupper(substr($firstName, 0, 1));
            if (!empty($lastName)) $initials .= strtoupper(substr($lastName, 0, 1));
            $avatar = !empty($initials) ? $initials : 'PT';
        } else {
            $patientName = "Patient #{$patientId}";
            $patientCode = "P-{$patientId}";
            $avatar = "PT";
        }

        $employeeId = $a['employee_id'] ?? null;
        $employee = $employeesMap[$employeeId] ?? null;
        if ($employee) {
            $docFirst = $employee['first_name'] ?? '';
            $docLast = $employee['last_name'] ?? '';
            $docTitle = $employee['title'] ?? $employee['role'] ?? 'Dr.';
            $doctorName = trim("$docTitle $docFirst $docLast");
            if (empty(trim("$docFirst $docLast"))) {
                $doctorName = $employee['name'] ?? $employee['username'] ?? "Employee #{$employeeId}";
            }
        } else {
            $doctorNames = [
                1 => 'Dr. Elena Santos',
                2 => 'Dr. Miguel Reyes',
                3 => 'Dr. Ana Cruz'
            ];
            $doctorName = $doctorNames[$employeeId] ?? 'Dr. Elena Santos';
        }

        $dateStr = $a['appointment_date'] ?? ($a['date'] ?? date('Y-m-d'));
        $timeStr = $a['appointment_time'] ?? ($a['time'] ?? '09:00:00');

        $appointments[] = [
            'id' => (int)($a['id'] ?? 0),
            'appointment_id' => $a['appointment_id'] ?? '',
            'patient_id' => (int)($a['patient_id'] ?? 0),
            'patient_name' => $patientName,
            'patient_code' => $patientCode,
            'patient_avatar' => $avatar,
            'employee_id' => (int)($a['employee_id'] ?? 1),
            'doctor_name' => $doctorName,
            'service_type' => $a['service_type'] ?? ($a['type'] ?? 'General Checkup'),
            'type' => $a['service_type'] ?? ($a['type'] ?? 'General Checkup'),
            'appointment_date' => $dateStr,
            'date' => $dateStr,
            'appointment_time' => !empty($timeStr) ? substr($timeStr, 0, 8) : '09:00:00',
            'time' => !empty($timeStr) ? date('h:i A', strtotime($timeStr)) : '09:00 AM',
            'status' => strtolower($a['status'] ?? 'pending'),
            'priority' => strtolower($a['priority'] ?? 'medium'),
            'notes' => $a['notes'] ?? '',
            'reminder_sent' => (bool)($a['reminder_sent'] ?? false),
            'created_at' => $a['created_at'] ?? ''
        ];
    }
} catch (Throwable $e) {
    error_log("Error building appointments list: " . $e->getMessage());
}

// Doctor list for UI filters and dropdowns
$doctorsList = !empty($dbEmployees) ? $dbEmployees : [
    ['id' => 1, 'name' => 'Dr. Elena Santos', 'specialty' => 'General Medicine'],
    ['id' => 2, 'name' => 'Dr. Miguel Reyes', 'specialty' => 'Cardiology'],
    ['id' => 3, 'name' => 'Dr. Ana Cruz', 'specialty' => 'Pediatrics']
];

// Pagination
$page = isset($_GET['page']) ? max(1, (int)$_GET['page']) : 1;
$limit = 10;
$offset = ($page - 1) * $limit;
$totalAppointments = count($appointments);
$totalPages = ceil($totalAppointments / $limit);
if ($totalPages < 1) $totalPages = 1;
$paginatedAppointments = array_slice($appointments, $offset, $limit);

$title = 'Appointments';

// Derived stats
$totalApproved = count(array_filter($appointments, fn($a) => in_array($a['status'], ['approved', 'confirmed'])));
$totalPending  = count(array_filter($appointments, fn($a) => $a['status'] === 'pending'));
$totalCompleted = count(array_filter($appointments, fn($a) => $a['status'] === 'completed'));
$todayAppointments = count(array_filter($appointments, fn($a) => $a['date'] === date('Y-m-d')));
?>

<!-- ============================================================ -->
<!-- 2. HTML + PHP EMBEDDED + Tailwind CSS                       -->
<!-- ============================================================ -->

<div class="flex-1 px-6 pt-[26px] pb-20 mb-10 flex flex-col min-h-0 overflow-y-auto">

    <!-- Page Header -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6">
        <div>
            <h2 class="text-2xl font-black text-slate-900 tracking-tight">Appointment Scheduling</h2>
            <p class="text-sm text-slate-500 mt-0.5">Manage patient bookings, approvals, and medical service schedules</p>
        </div>
        <div class="flex gap-3">
            <button onclick="openModal('addAppointmentModal')"
                    class="px-4 py-2 bg-brand-dark text-white rounded-lg hover:bg-brand-medium transition-colors text-sm font-semibold flex items-center gap-2 shadow-sm">
                <i class="fa-solid fa-calendar-plus text-xs"></i> New Appointment
            </button>
        </div>
    </div>

    <!-- MODERN KPI CARDS -->
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-6">
        <!-- Card 1: Total Appointments -->
        <div class="relative overflow-hidden bg-white rounded-2xl shadow-sm border border-slate-200 p-5 hover:shadow-lg transition group">
            <div class="absolute -top-12 -right-12 w-24 h-24 bg-blue-100 rounded-full opacity-50 group-hover:scale-110 transition"></div>
            <div class="relative">
                <div class="flex items-center gap-3">
                    <div class="w-11 h-11 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl flex items-center justify-center text-white shadow-lg shadow-blue-200">
                        <i class="fa-solid fa-calendar-check text-lg"></i>
                    </div>
                    <div>
                        <p class="text-2xl font-black text-slate-900"><?php echo $totalAppointments; ?></p>
                        <p class="text-xs font-medium text-slate-500">Total Bookings</p>
                    </div>
                </div>
                <div class="mt-3 flex items-center gap-2">
                    <span class="px-2 py-0.5 bg-blue-100 text-blue-700 rounded-full text-[10px] font-bold">📋 All records</span>
                    <span class="text-[10px] text-slate-400"><?php echo $totalApproved; ?> approved</span>
                </div>
            </div>
        </div>

        <!-- Card 2: Approved / Confirmed -->
        <div class="relative overflow-hidden bg-white rounded-2xl shadow-sm border border-slate-200 p-5 hover:shadow-lg transition group">
            <div class="absolute -top-12 -right-12 w-24 h-24 bg-emerald-100 rounded-full opacity-50 group-hover:scale-110 transition"></div>
            <div class="relative">
                <div class="flex items-center gap-3">
                    <div class="w-11 h-11 bg-gradient-to-br from-emerald-500 to-emerald-600 rounded-xl flex items-center justify-center text-white shadow-lg shadow-emerald-200">
                        <i class="fa-solid fa-check-circle text-lg"></i>
                    </div>
                    <div>
                        <p class="text-2xl font-black text-emerald-600"><?php echo $totalApproved; ?></p>
                        <p class="text-xs font-medium text-slate-500">Approved</p>
                    </div>
                </div>
                <div class="mt-3 flex items-center gap-2">
                    <span class="px-2 py-0.5 bg-emerald-100 text-emerald-700 rounded-full text-[10px] font-bold">✅ Ready</span>
                    <span class="text-[10px] text-slate-400">Scheduled & confirmed</span>
                </div>
            </div>
        </div>

        <!-- Card 3: Pending Approval -->
        <div class="relative overflow-hidden bg-white rounded-2xl shadow-sm border border-slate-200 p-5 hover:shadow-lg transition group">
            <div class="absolute -top-12 -right-12 w-24 h-24 bg-amber-100 rounded-full opacity-50 group-hover:scale-110 transition"></div>
            <div class="relative">
                <div class="flex items-center gap-3">
                    <div class="w-11 h-11 bg-gradient-to-br from-amber-500 to-amber-600 rounded-xl flex items-center justify-center text-white shadow-lg shadow-amber-200">
                        <i class="fa-solid fa-clock text-lg"></i>
                    </div>
                    <div>
                        <p class="text-2xl font-black text-amber-600"><?php echo $totalPending; ?></p>
                        <p class="text-xs font-medium text-slate-500">Pending</p>
                    </div>
                </div>
                <div class="mt-3 flex items-center gap-2">
                    <span class="px-2 py-0.5 bg-amber-100 text-amber-700 rounded-full text-[10px] font-bold">⏳ Action needed</span>
                    <span class="text-[10px] text-slate-400">Awaiting approval</span>
                </div>
            </div>
        </div>

        <!-- Card 4: Today's Appointments -->
        <div class="relative overflow-hidden bg-white rounded-2xl shadow-sm border border-slate-200 p-5 hover:shadow-lg transition group">
            <div class="absolute -top-12 -right-12 w-24 h-24 bg-sky-100 rounded-full opacity-50 group-hover:scale-110 transition"></div>
            <div class="relative">
                <div class="flex items-center gap-3">
                    <div class="w-11 h-11 bg-gradient-to-br from-sky-500 to-sky-600 rounded-xl flex items-center justify-center text-white shadow-lg shadow-sky-200">
                        <i class="fa-solid fa-calendar-day text-lg"></i>
                    </div>
                    <div>
                        <p class="text-2xl font-black text-sky-600"><?php echo $todayAppointments; ?></p>
                        <p class="text-xs font-medium text-slate-500">Today's Schedule</p>
                    </div>
                </div>
                <div class="mt-3 flex items-center gap-2">
                    <span class="px-2 py-0.5 bg-sky-100 text-sky-700 rounded-full text-[10px] font-bold">📅 Today</span>
                    <span class="text-[10px] text-slate-400"><?php echo date('F d, Y'); ?></span>
                </div>
            </div>
        </div>
    </div>

    <!-- Search & Filters -->
    <div class="bg-white rounded-xl shadow-xs p-4 border border-slate-200 mb-6">
        <div class="flex flex-col sm:flex-row gap-3">
            <div class="flex-1 relative">
                <i class="fa-solid fa-search absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-sm"></i>
                <input type="text"
                       id="searchAppointment"
                       placeholder="Search by patient name, appointment ID, service type, or doctor..."
                       class="w-full pl-9 pr-4 py-2 border border-slate-200 rounded-lg focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none text-sm transition">
            </div>
            <div class="flex gap-2 flex-wrap">
                <select id="filterStatus" class="px-4 py-2 border border-slate-200 rounded-lg focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none text-sm bg-white">
                    <option value="">All Status</option>
                    <option value="pending">Pending</option>
                    <option value="approved">Approved</option>
                    <option value="completed">Completed</option>
                    <option value="cancelled">Cancelled</option>
                    <option value="no_show">No Show</option>
                </select>
                <select id="filterPriority" class="px-4 py-2 border border-slate-200 rounded-lg focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none text-sm bg-white">
                    <option value="">All Priorities</option>
                    <option value="critical">Critical</option>
                    <option value="high">High</option>
                    <option value="medium">Medium</option>
                    <option value="low">Low</option>
                </select>
                <select id="filterDate" class="px-4 py-2 border border-slate-200 rounded-lg focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none text-sm bg-white">
                    <option value="">All Dates</option>
                    <option value="today">Today</option>
                    <option value="tomorrow">Tomorrow</option>
                    <option value="week">This Week</option>
                </select>
                <button onclick="resetFilters()" title="Reset filters"
                        class="px-3 py-2 bg-slate-100 text-slate-500 rounded-lg hover:bg-slate-200 hover:text-slate-700 transition-colors text-sm">
                    <i class="fa-solid fa-rotate-right"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- Appointments Table -->
    <div class="bg-white rounded-xl shadow-xs border border-slate-200 overflow-hidden flex-1 flex flex-col justify-between">
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead class="bg-slate-50 border-b border-slate-200">
                    <tr>
                        <th class="px-4 py-3 text-left text-[10px] font-bold text-slate-500 uppercase tracking-wider">Appt ID</th>
                        <th class="px-4 py-3 text-left text-[10px] font-bold text-slate-500 uppercase tracking-wider">Patient</th>
                        <th class="px-4 py-3 text-left text-[10px] font-bold text-slate-500 uppercase tracking-wider">Doctor / Staff</th>
                        <th class="px-4 py-3 text-left text-[10px] font-bold text-slate-500 uppercase tracking-wider">Date & Time</th>
                        <th class="px-4 py-3 text-left text-[10px] font-bold text-slate-500 uppercase tracking-wider">Service Type</th>
                        <th class="px-4 py-3 text-left text-[10px] font-bold text-slate-500 uppercase tracking-wider">Priority</th>
                        <th class="px-4 py-3 text-left text-[10px] font-bold text-slate-500 uppercase tracking-wider">Status</th>
                        <th class="px-4 py-3 text-center text-[10px] font-bold text-slate-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody id="appointmentTableBody">
                    <?php if (empty($paginatedAppointments)): ?>
                        <tr>
                            <td colspan="8" class="text-center py-12 text-slate-400">
                                <i class="fa-solid fa-calendar-xmark text-3xl block mb-2"></i>
                                No appointment records found.
                            </td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($paginatedAppointments as $a): ?>
                        <tr class="border-b border-slate-100 hover:bg-brand-light/40 transition-colors appointment-row"
                            data-patient="<?php echo htmlspecialchars(strtolower($a['patient_name'])); ?>"
                            data-doctor="<?php echo htmlspecialchars(strtolower($a['doctor_name'])); ?>"
                            data-service="<?php echo htmlspecialchars(strtolower($a['service_type'])); ?>"
                            data-status="<?php echo htmlspecialchars(strtolower($a['status'])); ?>"
                            data-priority="<?php echo htmlspecialchars(strtolower($a['priority'])); ?>"
                            data-date="<?php echo htmlspecialchars($a['date']); ?>">
                            
                            <td class="px-4 py-3 font-mono text-xs text-brand-dark font-bold"><?php echo htmlspecialchars($a['appointment_id']); ?></td>
                            
                            <td class="px-4 py-3">
                                <div class="flex items-center gap-2.5">
                                    <div class="w-8 h-8 rounded-full bg-brand-light border border-brand-border flex items-center justify-center text-brand-dark font-bold text-xs flex-shrink-0">
                                        <?php echo htmlspecialchars($a['patient_avatar']); ?>
                                    </div>
                                    <div>
                                        <p class="font-semibold text-slate-800 text-sm"><?php echo htmlspecialchars($a['patient_name']); ?></p>
                                        <p class="text-xs text-slate-400 font-mono"><?php echo htmlspecialchars($a['patient_code']); ?></p>
                                    </div>
                                </div>
                            </td>

                            <td class="px-4 py-3">
                                <p class="font-medium text-slate-800 text-xs"><?php echo htmlspecialchars($a['doctor_name']); ?></p>
                            </td>

                            <td class="px-4 py-3">
                                <p class="text-xs font-semibold text-slate-800"><?php echo date('M d, Y', strtotime($a['date'])); ?></p>
                                <p class="text-[10px] text-slate-400 font-medium"><?php echo htmlspecialchars($a['time']); ?></p>
                            </td>

                            <td class="px-4 py-3">
                                <span class="px-2 py-1 bg-slate-100 text-slate-700 rounded-md text-xs font-medium">
                                    <?php echo htmlspecialchars($a['service_type']); ?>
                                </span>
                            </td>

                            <td class="px-4 py-3">
                                <span class="px-2 py-0.5 rounded-full text-xs font-semibold <?php 
                                    echo $a['priority'] === 'critical' ? 'bg-rose-100 text-rose-700' :
                                        ($a['priority'] === 'high' ? 'bg-amber-100 text-amber-700' :
                                        ($a['priority'] === 'medium' ? 'bg-blue-100 text-blue-700' :
                                        'bg-slate-100 text-slate-600'));
                                ?>">
                                    <?php echo htmlspecialchars(ucfirst($a['priority'])); ?>
                                </span>
                            </td>

                            <td class="px-4 py-3">
                                <span class="px-2 py-1 rounded-full text-xs font-semibold <?php 
                                    echo in_array($a['status'], ['approved', 'confirmed']) ? 'bg-emerald-100 text-emerald-700' : 
                                        ($a['status'] === 'pending' ? 'bg-amber-100 text-amber-700' : 
                                        ($a['status'] === 'completed' ? 'bg-blue-100 text-blue-700' : 
                                        'bg-rose-100 text-rose-700')); 
                                ?>">
                                    <?php echo htmlspecialchars(ucfirst($a['status'])); ?>
                                </span>
                            </td>

                            <td class="px-4 py-3 text-center">
                                <div class="flex items-center justify-center gap-1">
                                    <button onclick="viewAppointment(<?php echo $a['id']; ?>)"
                                            class="p-1.5 text-brand-medium hover:bg-brand-light rounded-lg transition" title="View Details">
                                        <i class="fa-solid fa-eye text-sm"></i>
                                    </button>
                                    <button onclick="editAppointment(<?php echo $a['id']; ?>)"
                                            class="p-1.5 text-slate-500 hover:bg-slate-100 hover:text-slate-700 rounded-lg transition" title="Edit">
                                        <i class="fa-solid fa-pen text-sm"></i>
                                    </button>
                                    <?php if ($a['status'] === 'pending'): ?>
                                        <button onclick="changeAppointmentStatus(<?php echo $a['id']; ?>, 'approved')"
                                                class="p-1.5 text-emerald-600 hover:bg-emerald-50 rounded-lg transition" title="Approve">
                                            <i class="fa-solid fa-check text-sm"></i>
                                        </button>
                                    <?php endif; ?>
                                    <button onclick="deleteAppointment(<?php echo $a['id']; ?>)"
                                            class="p-1.5 text-rose-500 hover:bg-rose-50 rounded-lg transition" title="Delete">
                                        <i class="fa-solid fa-trash-can text-sm"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <!-- Empty State for Filters -->
        <div id="emptyState" class="hidden flex-col items-center justify-center py-14 text-center">
            <div class="w-12 h-12 rounded-full bg-slate-100 flex items-center justify-center mb-3">
                <i class="fa-solid fa-calendar-xmark text-slate-400"></i>
            </div>
            <p class="text-sm font-semibold text-slate-600">No appointments match your filter criteria</p>
            <p class="text-xs text-slate-400 mt-1">Try resetting or broadening your search</p>
            <button onclick="resetFilters()" class="mt-3 text-xs font-semibold text-brand-medium hover:text-brand-dark">Reset filters</button>
        </div>

        <!-- Pagination -->
        <?php if ($totalAppointments > 0): ?>
        <div class="px-4 py-3 border-t border-slate-200 flex flex-col sm:flex-row justify-between items-center gap-3 bg-slate-50">
            <p class="text-xs text-slate-500">
                Showing <span class="font-semibold text-slate-700"><?php echo min($offset + 1, $totalAppointments); ?></span> to
                <span class="font-semibold text-slate-700"><?php echo min($offset + $limit, $totalAppointments); ?></span> of
                <span class="font-semibold text-slate-700"><?php echo $totalAppointments; ?></span> appointments
            </p>
            <div class="flex gap-1">
                <button onclick="changePage(<?php echo $page - 1; ?>)"
                        class="px-3 py-1.5 rounded-lg text-sm <?php echo $page <= 1 ? 'bg-slate-100 text-slate-300 cursor-not-allowed' : 'bg-white border border-slate-200 text-slate-600 hover:bg-slate-100'; ?>"
                        <?php echo $page <= 1 ? 'disabled' : ''; ?>>
                    <i class="fa-solid fa-chevron-left text-xs"></i>
                </button>
                <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                    <button onclick="changePage(<?php echo $i; ?>)"
                            class="px-3 py-1.5 rounded-lg text-sm font-medium <?php echo $i === $page ? 'bg-brand-dark text-white' : 'bg-white border border-slate-200 text-slate-600 hover:bg-slate-100'; ?>">
                        <?php echo $i; ?>
                    </button>
                <?php endfor; ?>
                <button onclick="changePage(<?php echo $page + 1; ?>)"
                        class="px-3 py-1.5 rounded-lg text-sm <?php echo $page >= $totalPages ? 'bg-slate-100 text-slate-300 cursor-not-allowed' : 'bg-white border border-slate-200 text-slate-600 hover:bg-slate-100'; ?>"
                        <?php echo $page >= $totalPages ? 'disabled' : ''; ?>>
                    <i class="fa-solid fa-chevron-right text-xs"></i>
                </button>
            </div>
        </div>
        <?php endif; ?>
    </div>
</div>

<!-- ============================================================ -->
<!-- VIEW APPOINTMENT MODAL                                       -->
<!-- ============================================================ -->
<div id="viewAppointmentModal" class="hidden fixed inset-0 bg-slate-900/50 backdrop-blur-sm z-50 items-center justify-center p-4">
    <div class="bg-white rounded-2xl shadow-xl w-full max-w-2xl max-h-[90vh] overflow-y-auto">
        <div class="flex items-center justify-between px-6 py-4 border-b border-slate-200 sticky top-0 bg-white rounded-t-2xl z-10">
            <h3 class="font-bold text-slate-900 flex items-center gap-2">
                <i class="fa-solid fa-calendar-check text-brand-medium"></i> Appointment Information
            </h3>
            <button onclick="closeModal('viewAppointmentModal')" class="w-8 h-8 rounded-lg hover:bg-slate-100 flex items-center justify-center text-slate-400 hover:text-slate-600 transition">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>
        <div id="appointmentDetailsContent" class="p-6">
            <div class="flex items-center justify-center py-10 text-slate-400 text-sm">
                <i class="fa-solid fa-spinner fa-spin mr-2"></i> Loading appointment details...
            </div>
        </div>
    </div>
</div>

<!-- ============================================================ -->
<!-- ADD APPOINTMENT MODAL                                        -->
<!-- ============================================================ -->
<div id="addAppointmentModal" class="hidden fixed inset-0 bg-slate-900/50 backdrop-blur-sm z-50 items-center justify-center p-4">
    <div class="bg-white rounded-2xl shadow-xl w-full max-w-2xl max-h-[90vh] overflow-y-auto">
        <div class="flex items-center justify-between px-6 py-4 border-b border-slate-200 sticky top-0 bg-white rounded-t-2xl z-10">
            <h3 class="font-bold text-slate-900 flex items-center gap-2">
                <i class="fa-solid fa-calendar-plus text-brand-medium"></i> Schedule New Appointment
            </h3>
            <button onclick="closeModal('addAppointmentModal')" class="w-8 h-8 rounded-lg hover:bg-slate-100 flex items-center justify-center text-slate-400 hover:text-slate-600 transition">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>
        <form id="addAppointmentForm" class="p-6 space-y-4" onsubmit="saveNewAppointment(event)">
            <!-- Patient -->
            <div>
                <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">Patient <span class="text-rose-500">*</span></label>
                <select id="add_patient_id" required class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm bg-white focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none">
                    <option value="">Select Patient</option>
                    <?php foreach ($dbPatients as $p): ?>
                        <option value="<?php echo $p['id']; ?>">
                            <?php echo htmlspecialchars($p['first_name'] . ' ' . $p['last_name']); ?> (<?php echo htmlspecialchars($p['patient_id'] ?? "P-{$p['id']}"); ?>)
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <!-- Attending Doctor / Staff -->
                <div>
                    <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">Doctor / Staff <span class="text-rose-500">*</span></label>
                    <select id="add_employee_id" required class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm bg-white focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none">
                        <?php if (!empty($dbEmployees)): ?>
                            <?php foreach ($dbEmployees as $e): ?>
                                <option value="<?php echo $e['id']; ?>">
                                    <?php echo htmlspecialchars(trim(($e['first_name'] ?? '') . ' ' . ($e['last_name'] ?? '')) ?: ($e['name'] ?? "Employee #{$e['id']}")); ?>
                                </option>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <option value="1">Dr. Elena Santos (General Medicine)</option>
                            <option value="2">Dr. Miguel Reyes (Cardiology)</option>
                            <option value="3">Dr. Ana Cruz (Pediatrics)</option>
                        <?php endif; ?>
                    </select>
                </div>

                <!-- Service Type -->
                <div>
                    <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">Service Type <span class="text-rose-500">*</span></label>
                    <select id="add_service_type" required class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm bg-white focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none">
                        <option value="General Checkup">General Checkup</option>
                        <option value="Cardiology Consultation">Cardiology Consultation</option>
                        <option value="Pediatric Checkup">Pediatric Checkup</option>
                        <option value="Prenatal Checkup">Prenatal Checkup</option>
                        <option value="Vaccination">Vaccination</option>
                        <option value="Follow-up Visit">Follow-up Visit</option>
                        <option value="Dental Services">Dental Services</option>
                    </select>
                </div>
            </div>

            <!-- Date & Time -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">Date <span class="text-rose-500">*</span></label>
                    <input type="date" id="add_appointment_date" value="<?php echo date('Y-m-d'); ?>" required class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">Time <span class="text-rose-500">*</span></label>
                    <input type="time" id="add_appointment_time" value="09:00" required class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none">
                </div>
            </div>

            <!-- Priority & Status -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">Priority</label>
                    <select id="add_priority" class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm bg-white focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none">
                        <option value="medium">Medium</option>
                        <option value="high">High</option>
                        <option value="critical">Critical</option>
                        <option value="low">Low</option>
                    </select>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">Status</label>
                    <select id="add_status" class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm bg-white focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none">
                        <option value="pending">Pending Approval</option>
                        <option value="approved">Approved</option>
                    </select>
                </div>
            </div>

            <!-- Notes -->
            <div>
                <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">Notes / Instructions</label>
                <textarea id="add_notes" rows="3" placeholder="Reason for visit or special instructions..." class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none"></textarea>
            </div>

            <div class="flex justify-end gap-2 pt-3 border-t border-slate-100">
                <button type="button" onclick="closeModal('addAppointmentModal')"
                        class="px-4 py-2 bg-white border border-slate-200 text-slate-600 rounded-lg hover:bg-slate-50 transition text-sm font-semibold">
                    Cancel
                </button>
                <button type="submit" id="submitAddBtn"
                        class="px-4 py-2 bg-brand-dark text-white rounded-lg hover:bg-brand-medium transition text-sm font-semibold flex items-center gap-1.5">
                    <i class="fa-solid fa-calendar-check"></i> Book Appointment
                </button>
            </div>
        </form>
    </div>
</div>

<!-- ============================================================ -->
<!-- EDIT APPOINTMENT MODAL                                       -->
<!-- ============================================================ -->
<div id="editAppointmentModal" class="hidden fixed inset-0 bg-slate-900/50 backdrop-blur-sm z-50 items-center justify-center p-4">
    <div class="bg-white rounded-2xl shadow-xl w-full max-w-2xl max-h-[90vh] overflow-y-auto">
        <div class="flex items-center justify-between px-6 py-4 border-b border-slate-200 sticky top-0 bg-white rounded-t-2xl z-10">
            <h3 class="font-bold text-slate-900 flex items-center gap-2">
                <i class="fa-solid fa-pen-to-square text-brand-medium"></i> Edit Appointment
            </h3>
            <button onclick="closeModal('editAppointmentModal')" class="w-8 h-8 rounded-lg hover:bg-slate-100 flex items-center justify-center text-slate-400 hover:text-slate-600 transition">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>
        <form id="editAppointmentForm" class="p-6 space-y-4" onsubmit="saveEditedAppointment(event)">
            <input type="hidden" id="edit_id">

            <!-- Patient -->
            <div>
                <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">Patient</label>
                <input type="text" id="edit_patient_name" readonly class="w-full px-3 py-2 bg-slate-100 border border-slate-200 rounded-lg text-sm text-slate-700 outline-none font-semibold cursor-not-allowed">
                <input type="hidden" id="edit_patient_id">
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <!-- Doctor / Staff -->
                <div>
                    <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">Doctor / Staff</label>
                    <select id="edit_employee_id" required class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm bg-white focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none">
                        <?php if (!empty($dbEmployees)): ?>
                            <?php foreach ($dbEmployees as $e): ?>
                                <option value="<?php echo $e['id']; ?>">
                                    <?php echo htmlspecialchars(trim(($e['first_name'] ?? '') . ' ' . ($e['last_name'] ?? '')) ?: ($e['name'] ?? "Employee #{$e['id']}")); ?>
                                </option>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <option value="1">Dr. Elena Santos (General Medicine)</option>
                            <option value="2">Dr. Miguel Reyes (Cardiology)</option>
                            <option value="3">Dr. Ana Cruz (Pediatrics)</option>
                        <?php endif; ?>
                    </select>
                </div>

                <!-- Service Type -->
                <div>
                    <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">Service Type</label>
                    <input type="text" id="edit_service_type" required class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none">
                </div>
            </div>

            <!-- Date & Time -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">Date</label>
                    <input type="date" id="edit_appointment_date" required class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">Time</label>
                    <input type="time" id="edit_appointment_time" required class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none">
                </div>
            </div>

            <!-- Priority & Status -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">Priority</label>
                    <select id="edit_priority" class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm bg-white focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none">
                        <option value="critical">Critical</option>
                        <option value="high">High</option>
                        <option value="medium">Medium</option>
                        <option value="low">Low</option>
                    </select>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">Status</label>
                    <select id="edit_status" class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm bg-white focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none">
                        <option value="pending">Pending</option>
                        <option value="approved">Approved</option>
                        <option value="completed">Completed</option>
                        <option value="cancelled">Cancelled</option>
                        <option value="no_show">No Show</option>
                    </select>
                </div>
            </div>

            <!-- Notes -->
            <div>
                <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">Notes</label>
                <textarea id="edit_notes" rows="3" class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none"></textarea>
            </div>

            <div class="flex justify-end gap-2 pt-3 border-t border-slate-100">
                <button type="button" onclick="closeModal('editAppointmentModal')"
                        class="px-4 py-2 bg-white border border-slate-200 text-slate-600 rounded-lg hover:bg-slate-50 transition text-sm font-semibold">
                    Cancel
                </button>
                <button type="submit" id="submitEditBtn"
                        class="px-4 py-2 bg-brand-dark text-white rounded-lg hover:bg-brand-medium transition text-sm font-semibold flex items-center gap-1.5">
                    <i class="fa-solid fa-check"></i> Save Changes
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Toast notification -->
<div id="toast" class="hidden fixed bottom-6 right-6 z-[60] px-4 py-3 rounded-lg shadow-lg text-sm font-semibold text-white flex items-center gap-2 transition-all duration-300">
    <i class="fa-solid fa-circle-check"></i>
    <span id="toastMessage"></span>
</div>

<!-- ============================================================ -->
<!-- 3. JAVASCRIPT                                                -->
<!-- ============================================================ -->
<script>
    const APPOINTMENTS_DATA = <?php echo json_encode(array_column($appointments, null, 'id'), JSON_UNESCAPED_UNICODE); ?>;

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

    document.querySelectorAll('.fixed.inset-0').forEach(modal => {
        modal.addEventListener('click', function(e) {
            if (e.target === this) {
                this.classList.add('hidden');
                this.classList.remove('flex');
                document.body.classList.remove('overflow-hidden');
            }
        });
    });

    let toastTimer = null;
    function showToast(message, type = 'success') {
        const toast = document.getElementById('toast');
        const colors = {
            success: 'bg-brand-dark',
            danger: 'bg-rose-600',
            warning: 'bg-amber-600'
        };
        toast.className = 'fixed bottom-6 right-6 z-[60] px-4 py-3 rounded-lg shadow-lg text-sm font-semibold text-white flex items-center gap-2 ' + (colors[type] || colors.success);
        document.getElementById('toastMessage').textContent = message;
        toast.classList.remove('hidden');

        clearTimeout(toastTimer);
        toastTimer = setTimeout(() => toast.classList.add('hidden'), 3500);
    }

    // View Appointment Details
    function viewAppointment(id) {
        openModal('viewAppointmentModal');
        const a = APPOINTMENTS_DATA[id];
        const content = document.getElementById('appointmentDetailsContent');

        if (!a) {
            content.innerHTML = `<p class="text-center text-slate-500 py-6">Appointment details not found.</p>`;
            return;
        }

        const statusBadges = {
            pending: 'bg-amber-100 text-amber-700',
            approved: 'bg-emerald-100 text-emerald-700',
            completed: 'bg-blue-100 text-blue-700',
            cancelled: 'bg-rose-100 text-rose-700',
            no_show: 'bg-slate-100 text-slate-600'
        };

        content.innerHTML = `
            <div class="space-y-5">
                <div class="flex items-center gap-4 pb-4 border-b border-slate-200">
                    <div class="w-14 h-14 rounded-full bg-brand-light border border-brand-border flex items-center justify-center text-brand-dark font-bold text-lg flex-shrink-0">
                        ${a.patient_avatar || 'PT'}
                    </div>
                    <div>
                        <h4 class="text-lg font-bold text-slate-900">${a.patient_name}</h4>
                        <p class="text-xs text-slate-500 font-mono">${a.appointment_id} • ${a.patient_code}</p>
                        <span class="inline-block px-2.5 py-0.5 rounded-full text-xs font-semibold mt-1 ${statusBadges[a.status] || 'bg-slate-100 text-slate-700'}">
                            ${a.status.toUpperCase()}
                        </span>
                    </div>
                </div>

                <div class="grid grid-cols-2 sm:grid-cols-3 gap-4 bg-slate-50 p-4 rounded-xl border border-slate-200 text-xs">
                    <div>
                        <p class="text-slate-400 font-semibold uppercase">Doctor / Staff</p>
                        <p class="text-slate-800 font-bold mt-0.5">${a.doctor_name}</p>
                    </div>
                    <div>
                        <p class="text-slate-400 font-semibold uppercase">Date & Time</p>
                        <p class="text-slate-800 font-semibold mt-0.5">${a.date} ${a.time}</p>
                    </div>
                    <div>
                        <p class="text-slate-400 font-semibold uppercase">Service Type</p>
                        <p class="text-slate-800 font-bold mt-0.5">${a.service_type}</p>
                    </div>
                    <div>
                        <p class="text-slate-400 font-semibold uppercase">Priority Level</p>
                        <p class="text-slate-800 font-bold uppercase mt-0.5">${a.priority}</p>
                    </div>
                </div>

                ${a.notes ? `
                <div>
                    <h5 class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-1">Notes / Instructions</h5>
                    <p class="text-sm text-slate-800 bg-slate-50 p-3 rounded-lg border border-slate-200">${a.notes}</p>
                </div>
                ` : ''}

                <div class="flex justify-end gap-2 pt-3 border-t border-slate-100">
                    <a href="patients.php?patient=${a.patient_id}&id=${a.patient_id}" class="px-4 py-2 bg-emerald-600 text-white rounded-lg hover:bg-emerald-700 transition text-xs font-semibold inline-flex items-center gap-1.5">
                        <i class="fa-solid fa-user"></i> View Patient Profile
                    </a>
                    <button onclick="closeModal('viewAppointmentModal'); editAppointment(${a.id});" class="px-4 py-2 bg-brand-dark text-white rounded-lg hover:bg-brand-medium transition text-xs font-semibold inline-flex items-center gap-1.5">
                        <i class="fa-solid fa-pen"></i> Edit Appointment
                    </button>
                </div>
            </div>
        `;
    }

    // Save New Appointment
    async function saveNewAppointment(event) {
        event.preventDefault();
        const submitBtn = document.getElementById('submitAddBtn');
        submitBtn.disabled = true;
        submitBtn.innerHTML = `<i class="fa-solid fa-spinner fa-spin mr-1"></i> Saving...`;

        const payload = {
            patient_id: parseInt(document.getElementById('add_patient_id').value),
            employee_id: parseInt(document.getElementById('add_employee_id').value),
            service_type: document.getElementById('add_service_type').value,
            appointment_date: document.getElementById('add_appointment_date').value,
            appointment_time: document.getElementById('add_appointment_time').value,
            priority: document.getElementById('add_priority').value,
            status: document.getElementById('add_status').value,
            notes: document.getElementById('add_notes').value.trim()
        };

        try {
            const res = await fetch('/api/appointments.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify(payload)
            });
            const data = await res.json();

            if (res.ok && data.success) {
                showToast('Appointment scheduled successfully!', 'success');
                closeModal('addAppointmentModal');
                setTimeout(() => window.location.reload(), 1000);
            } else {
                showToast(data.message || 'Failed to schedule appointment', 'danger');
            }
        } catch (err) {
            showToast('Error booking appointment', 'danger');
            console.error(err);
        } finally {
            submitBtn.disabled = false;
            submitBtn.innerHTML = `<i class="fa-solid fa-calendar-check"></i> Book Appointment`;
        }
    }

    // Edit Appointment
    function editAppointment(id) {
        const a = APPOINTMENTS_DATA[id];
        if (!a) {
            showToast('Appointment not found', 'danger');
            return;
        }

        document.getElementById('edit_id').value = a.id;
        document.getElementById('edit_patient_id').value = a.patient_id;
        document.getElementById('edit_patient_name').value = a.patient_name + ' (' + a.patient_code + ')';
        document.getElementById('edit_employee_id').value = a.employee_id || 1;
        document.getElementById('edit_service_type').value = a.service_type || a.type;
        document.getElementById('edit_appointment_date').value = a.date;
        document.getElementById('edit_appointment_time').value = a.appointment_time || '09:00';
        document.getElementById('edit_priority').value = a.priority || 'medium';
        document.getElementById('edit_status').value = a.status || 'pending';
        document.getElementById('edit_notes').value = a.notes || '';

        openModal('editAppointmentModal');
    }

    async function saveEditedAppointment(event) {
        event.preventDefault();
        const id = document.getElementById('edit_id').value;
        const submitBtn = document.getElementById('submitEditBtn');
        submitBtn.disabled = true;
        submitBtn.innerHTML = `<i class="fa-solid fa-spinner fa-spin mr-1"></i> Saving...`;

        const payload = {
            patient_id: parseInt(document.getElementById('edit_patient_id').value),
            employee_id: parseInt(document.getElementById('edit_employee_id').value),
            service_type: document.getElementById('edit_service_type').value.trim(),
            appointment_date: document.getElementById('edit_appointment_date').value,
            appointment_time: document.getElementById('edit_appointment_time').value,
            priority: document.getElementById('edit_priority').value,
            status: document.getElementById('edit_status').value,
            notes: document.getElementById('edit_notes').value.trim()
        };

        try {
            const res = await fetch('/api/appointments.php?id=' + id, {
                method: 'PUT',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify(payload)
            });
            const data = await res.json();

            if (res.ok && data.success) {
                showToast('Appointment updated successfully!', 'success');
                closeModal('editAppointmentModal');
                setTimeout(() => window.location.reload(), 1000);
            } else {
                showToast(data.message || 'Failed to update appointment', 'danger');
            }
        } catch (err) {
            showToast('Error updating appointment', 'danger');
            console.error(err);
        } finally {
            submitBtn.disabled = false;
            submitBtn.innerHTML = `<i class="fa-solid fa-check"></i> Save Changes`;
        }
    }

    // Change Status (Quick Action)
    async function changeAppointmentStatus(id, newStatus) {
        try {
            const res = await fetch('/api/appointments.php?id=' + id + '&action=status', {
                method: 'PUT',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ status: newStatus })
            });
            const data = await res.json();

            if (res.ok && data.success) {
                showToast('Appointment status updated to ' + newStatus, 'success');
                setTimeout(() => window.location.reload(), 800);
            } else {
                showToast(data.message || 'Failed to update status', 'danger');
            }
        } catch (err) {
            showToast('Error updating appointment status', 'danger');
            console.error(err);
        }
    }

    // Delete Appointment
    async function deleteAppointment(id) {
        if (!confirm('Are you sure you want to delete this appointment?')) return;

        try {
            const res = await fetch('/api/appointments.php?id=' + id, {
                method: 'DELETE'
            });
            const data = await res.json();

            if (res.ok && data.success) {
                showToast('Appointment deleted successfully!', 'success');
                setTimeout(() => window.location.reload(), 800);
            } else {
                showToast(data.message || 'Failed to delete appointment', 'danger');
            }
        } catch (err) {
            showToast('Error deleting appointment', 'danger');
            console.error(err);
        }
    }

    // Search & Filter
    document.getElementById('searchAppointment').addEventListener('input', filterAppointments);
    document.getElementById('filterStatus').addEventListener('change', filterAppointments);
    document.getElementById('filterPriority').addEventListener('change', filterAppointments);
    document.getElementById('filterDate').addEventListener('change', filterAppointments);

    function filterAppointments() {
        const search = document.getElementById('searchAppointment').value.toLowerCase();
        const status = document.getElementById('filterStatus').value.toLowerCase();
        const priority = document.getElementById('filterPriority').value.toLowerCase();
        const dateFilter = document.getElementById('filterDate').value;
        let visibleCount = 0;

        const today = new Date();
        today.setHours(0, 0, 0, 0);
        const tomorrow = new Date(today);
        tomorrow.setDate(tomorrow.getDate() + 1);
        const weekEnd = new Date(today);
        weekEnd.setDate(weekEnd.getDate() + 7);

        document.querySelectorAll('.appointment-row').forEach(row => {
            const patient = row.dataset.patient || '';
            const doctor = row.dataset.doctor || '';
            const service = row.dataset.service || '';
            const rowStatus = (row.dataset.status || '').toLowerCase();
            const rowPriority = (row.dataset.priority || '').toLowerCase();
            const rowDateStr = row.dataset.date;
            const rowDate = new Date(rowDateStr + 'T00:00:00');

            const matchesSearch = patient.includes(search) || doctor.includes(search) || service.includes(search);
            const matchesStatus = !status || rowStatus === status;
            const matchesPriority = !priority || rowPriority === priority;

            let matchesDate = true;
            if (dateFilter === 'today') {
                matchesDate = rowDate.getTime() === today.getTime();
            } else if (dateFilter === 'tomorrow') {
                matchesDate = rowDate.getTime() === tomorrow.getTime();
            } else if (dateFilter === 'week') {
                matchesDate = rowDate >= today && rowDate <= weekEnd;
            }

            const isVisible = matchesSearch && matchesStatus && matchesPriority && matchesDate;

            row.style.display = isVisible ? '' : 'none';
            if (isVisible) visibleCount++;
        });

        document.getElementById('emptyState').style.display = visibleCount === 0 ? 'flex' : 'none';
    }

    function resetFilters() {
        document.getElementById('searchAppointment').value = '';
        document.getElementById('filterStatus').value = '';
        document.getElementById('filterPriority').value = '';
        document.getElementById('filterDate').value = '';
        document.querySelectorAll('.appointment-row').forEach(row => row.style.display = '');
        document.getElementById('emptyState').style.display = 'none';
    }

    function changePage(page) {
        if (page < 1 || page > <?php echo $totalPages; ?>) return;
        window.location.href = '?page=' + page;
    }

    // ESC to close modals
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

<?php include_once '../../includes/footer.php'; ?>