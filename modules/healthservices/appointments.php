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

// Sample Patients Data
$patients = [
    ['id' => 1, 'patient_id' => 'P-1001', 'name' => 'Maria Santos'],
    ['id' => 2, 'patient_id' => 'P-1002', 'name' => 'Juan Dela Cruz'],
    ['id' => 3, 'patient_id' => 'P-1003', 'name' => 'Rosa Mendoza'],
    ['id' => 4, 'patient_id' => 'P-1004', 'name' => 'Carlos Lim'],
    ['id' => 5, 'patient_id' => 'P-1005', 'name' => 'Elena Torres'],
];

// Sample Doctors Data
$doctors = [
    ['id' => 1, 'name' => 'Dr. Elena Santos', 'specialty' => 'General Medicine', 'status' => 'available'],
    ['id' => 2, 'name' => 'Dr. Miguel Reyes', 'specialty' => 'Cardiology', 'status' => 'busy'],
    ['id' => 3, 'name' => 'Dr. Ana Cruz', 'specialty' => 'Pediatrics', 'status' => 'available'],
];

// Sample Appointments Data
$appointments = [
    [
        'id' => 1,
        'appointment_id' => 'APT-001',
        'patient_id' => 1,
        'patient_name' => 'Maria Santos',
        'patient_avatar' => 'MS',
        'doctor_id' => 1,
        'doctor_name' => 'Dr. Elena Santos',
        'doctor_specialty' => 'General Medicine',
        'date' => '2026-07-20',
        'time' => '09:00 AM',
        'end_time' => '09:30 AM',
        'type' => 'General Checkup',
        'status' => 'confirmed',
        'priority' => 'medium',
        'notes' => 'Routine checkup, bring previous lab results',
        'reminder_sent' => true,
        'reminder_method' => 'SMS',
        'created_at' => '2026-07-15 08:30:00'
    ],
    [
        'id' => 2,
        'appointment_id' => 'APT-002',
        'patient_id' => 2,
        'patient_name' => 'Juan Dela Cruz',
        'patient_avatar' => 'JD',
        'doctor_id' => 2,
        'doctor_name' => 'Dr. Miguel Reyes',
        'doctor_specialty' => 'Cardiology',
        'date' => '2026-07-20',
        'time' => '10:30 AM',
        'end_time' => '11:00 AM',
        'type' => 'Cardiology Follow-up',
        'status' => 'pending',
        'priority' => 'high',
        'notes' => 'ECG results available, check blood pressure',
        'reminder_sent' => false,
        'reminder_method' => 'Email',
        'created_at' => '2026-07-16 09:15:00'
    ],
    [
        'id' => 3,
        'appointment_id' => 'APT-003',
        'patient_id' => 3,
        'patient_name' => 'Rosa Mendoza',
        'patient_avatar' => 'RM',
        'doctor_id' => 3,
        'doctor_name' => 'Dr. Ana Cruz',
        'doctor_specialty' => 'Pediatrics',
        'date' => '2026-07-21',
        'time' => '02:00 PM',
        'end_time' => '02:30 PM',
        'type' => 'Child Vaccination',
        'status' => 'confirmed',
        'priority' => 'medium',
        'notes' => 'MMR Booster due, bring child health record',
        'reminder_sent' => true,
        'reminder_method' => 'SMS',
        'created_at' => '2026-07-14 10:00:00'
    ],
    [
        'id' => 4,
        'appointment_id' => 'APT-004',
        'patient_id' => 4,
        'patient_name' => 'Carlos Lim',
        'patient_avatar' => 'CL',
        'doctor_id' => 1,
        'doctor_name' => 'Dr. Elena Santos',
        'doctor_specialty' => 'General Medicine',
        'date' => '2026-07-21',
        'time' => '03:30 PM',
        'end_time' => '04:00 PM',
        'type' => 'Follow-up',
        'status' => 'pending',
        'priority' => 'high',
        'notes' => 'Heart Disease follow-up, schedule ECG',
        'reminder_sent' => false,
        'reminder_method' => 'Email',
        'created_at' => '2026-07-16 11:30:00'
    ],
    [
        'id' => 5,
        'appointment_id' => 'APT-005',
        'patient_id' => 5,
        'patient_name' => 'Elena Torres',
        'patient_avatar' => 'ET',
        'doctor_id' => 3,
        'doctor_name' => 'Dr. Ana Cruz',
        'doctor_specialty' => 'Pediatrics',
        'date' => '2026-07-22',
        'time' => '09:30 AM',
        'end_time' => '10:00 AM',
        'type' => 'Prenatal Checkup',
        'status' => 'confirmed',
        'priority' => 'medium',
        'notes' => 'Routine prenatal checkup',
        'reminder_sent' => true,
        'reminder_method' => 'SMS',
        'created_at' => '2026-07-13 14:20:00'
    ],
    [
        'id' => 6,
        'appointment_id' => 'APT-006',
        'patient_id' => 1,
        'patient_name' => 'Maria Santos',
        'patient_avatar' => 'MS',
        'doctor_id' => 2,
        'doctor_name' => 'Dr. Miguel Reyes',
        'doctor_specialty' => 'Cardiology',
        'date' => '2026-07-22',
        'time' => '11:00 AM',
        'end_time' => '11:30 AM',
        'type' => 'Cardiology Consultation',
        'status' => 'cancelled',
        'priority' => 'low',
        'notes' => 'Patient cancelled due to emergency',
        'reminder_sent' => false,
        'reminder_method' => null,
        'created_at' => '2026-07-12 16:45:00'
    ],
    [
        'id' => 7,
        'appointment_id' => 'APT-007',
        'patient_id' => 2,
        'patient_name' => 'Juan Dela Cruz',
        'patient_avatar' => 'JD',
        'doctor_id' => 1,
        'doctor_name' => 'Dr. Elena Santos',
        'doctor_specialty' => 'General Medicine',
        'date' => '2026-07-23',
        'time' => '08:30 AM',
        'end_time' => '09:00 AM',
        'type' => 'Lab Test Follow-up',
        'status' => 'pending',
        'priority' => 'medium',
        'notes' => 'Blood test results ready for review',
        'reminder_sent' => false,
        'reminder_method' => 'SMS',
        'created_at' => '2026-07-16 07:00:00'
    ],
    [
        'id' => 8,
        'appointment_id' => 'APT-008',
        'patient_id' => 3,
        'patient_name' => 'Rosa Mendoza',
        'patient_avatar' => 'RM',
        'doctor_id' => 2,
        'doctor_name' => 'Dr. Miguel Reyes',
        'doctor_specialty' => 'Cardiology',
        'date' => '2026-07-23',
        'time' => '01:00 PM',
        'end_time' => '01:30 PM',
        'type' => 'Cardiology Checkup',
        'status' => 'confirmed',
        'priority' => 'high',
        'notes' => 'Check heart condition, bring medications',
        'reminder_sent' => true,
        'reminder_method' => 'Email',
        'created_at' => '2026-07-15 13:00:00'
    ],
];

// Doctor Schedules
// New Doctor Schedule with Date
$doctorSchedules = [
    // Dr. Elena Santos (doctor_id: 1)
    [
        'doctor_id' => 1,
        'doctor_name' => 'Dr. Elena Santos',
        'day' => 'Monday',        // ✅ Changed from 'date' to 'day'
        'start' => '08:00 AM',
        'end' => '05:00 PM',
        'status' => 'available',
        'notes' => 'Regular clinic'
    ],
    [
        'doctor_id' => 1,
        'doctor_name' => 'Dr. Elena Santos',
        'day' => 'Wednesday',     // ✅ Changed from 'date' to 'day'
        'start' => '08:00 AM',
        'end' => '05:00 PM',
        'status' => 'available',
        'notes' => ''
    ],
    [
        'doctor_id' => 1,
        'doctor_name' => 'Dr. Elena Santos',
        'day' => 'Friday',        // ✅ Changed from 'date' to 'day'
        'start' => '08:00 AM',
        'end' => '12:00 PM',
        'status' => 'busy',
        'notes' => 'Half day - Training'
    ],
    // Dr. Miguel Reyes (doctor_id: 2)
    [
        'doctor_id' => 2,
        'doctor_name' => 'Dr. Miguel Reyes',
        'day' => 'Tuesday',       // ✅ Changed from 'date' to 'day'
        'start' => '09:00 AM',
        'end' => '06:00 PM',
        'status' => 'available',
        'notes' => ''
    ],
    [
        'doctor_id' => 2,
        'doctor_name' => 'Dr. Miguel Reyes',
        'day' => 'Thursday',      // ✅ Changed from 'date' to 'day'
        'start' => '09:00 AM',
        'end' => '06:00 PM',
        'status' => 'available',
        'notes' => ''
    ],
    // Dr. Ana Cruz (doctor_id: 3)
    [
        'doctor_id' => 3,
        'doctor_name' => 'Dr. Ana Cruz',
        'day' => 'Monday',        // ✅ Changed from 'date' to 'day'
        'start' => '08:00 AM',
        'end' => '05:00 PM',
        'status' => 'available',
        'notes' => ''
    ],
    [
        'doctor_id' => 3,
        'doctor_name' => 'Dr. Ana Cruz',
        'day' => 'Tuesday',       // ✅ Changed from 'date' to 'day'
        'start' => '08:00 AM',
        'end' => '05:00 PM',
        'status' => 'available',
        'notes' => ''
    ],
    [
        'doctor_id' => 3,
        'doctor_name' => 'Dr. Ana Cruz',
        'day' => 'Thursday',      // ✅ Changed from 'date' to 'day'
        'start' => '08:00 AM',
        'end' => '05:00 PM',
        'status' => 'unavailable',
        'notes' => 'Leave'
    ],
];

$daysOfWeek = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];

// Pagination
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$limit = 6;
$offset = ($page - 1) * $limit;
$totalAppointments = count($appointments);
$totalPages = ceil($totalAppointments / $limit);
$paginatedAppointments = array_slice($appointments, $offset, $limit);

$title = 'Appointments';

// Stats
$totalConfirmed = count(array_filter($appointments, fn($a) => $a['status'] === 'confirmed'));
$totalPending = count(array_filter($appointments, fn($a) => $a['status'] === 'pending'));
$totalCancelled = count(array_filter($appointments, fn($a) => $a['status'] === 'cancelled'));
$todayAppointments = count(array_filter($appointments, fn($a) => $a['date'] === date('Y-m-d')));
?>

<!-- ============================================================ -->
<!-- 2. HTML + PHP EMBEDDED + Tailwind CSS                       -->
<!-- ============================================================ -->

<div class="flex-1 px-6 pt-[26px] pb-20 mb-10 flex flex-col min-h-0 overflow-hidden">

    <!-- Page Header -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6">
        <div>
            <h2 class="text-2xl font-black text-slate-900 tracking-tight">Appointments</h2>
            <p class="text-sm text-slate-500 mt-0.5">Schedule, manage, and track all patient appointments</p>
        </div>
        <div class="flex gap-3">
            <button onclick="openModal('scheduleModal')"
                    class="px-4 py-2 bg-brand-dark text-white rounded-lg hover:bg-brand-medium transition-colors text-sm font-semibold flex items-center gap-2 shadow-sm">
                <i class="fa-solid fa-calendar-plus text-xs"></i> Schedule Appointment
            </button>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-4">
        <div class="bg-white rounded-xl shadow-xs p-4 border border-slate-200 flex items-center gap-3">
            <div class="w-11 h-11 rounded-lg bg-brand-light border border-brand-border flex items-center justify-center flex-shrink-0">
                <i class="fa-solid fa-calendar-check text-brand-dark"></i>
            </div>
            <div>
                <p class="text-xs text-slate-500 font-semibold uppercase tracking-wide">Total Appointments</p>
                <p class="text-xl font-bold text-slate-900"><?php echo $totalAppointments; ?></p>
            </div>
        </div>
        <div class="bg-white rounded-xl shadow-xs p-4 border border-slate-200 flex items-center gap-3">
            <div class="w-11 h-11 rounded-lg bg-emerald-50 border border-emerald-100 flex items-center justify-center flex-shrink-0">
                <i class="fa-solid fa-check-circle text-emerald-600"></i>
            </div>
            <div>
                <p class="text-xs text-slate-500 font-semibold uppercase tracking-wide">Confirmed</p>
                <p class="text-xl font-bold text-slate-900"><?php echo $totalConfirmed; ?></p>
            </div>
        </div>
        <div class="bg-white rounded-xl shadow-xs p-4 border border-slate-200 flex items-center gap-3">
            <div class="w-11 h-11 rounded-lg bg-amber-50 border border-amber-100 flex items-center justify-center flex-shrink-0">
                <i class="fa-solid fa-clock text-amber-600"></i>
            </div>
            <div>
                <p class="text-xs text-slate-500 font-semibold uppercase tracking-wide">Pending</p>
                <p class="text-xl font-bold text-slate-900"><?php echo $totalPending; ?></p>
            </div>
        </div>
        <div class="bg-white rounded-xl shadow-xs p-4 border border-slate-200 flex items-center gap-3">
            <div class="w-11 h-11 rounded-lg bg-sky-50 border border-sky-100 flex items-center justify-center flex-shrink-0">
                <i class="fa-solid fa-calendar-day text-sky-600"></i>
            </div>
            <div>
                <p class="text-xs text-slate-500 font-semibold uppercase tracking-wide">Today's Appointments</p>
                <p class="text-xl font-bold text-slate-900"><?php echo $todayAppointments; ?></p>
            </div>
        </div>
    </div>

    <!-- Quick Stats: Reminders -->
    <div class="bg-gradient-to-r from-brand-light/60 to-white rounded-xl shadow-xs p-4 border border-brand-border mb-6">
        <div class="flex flex-wrap items-center justify-between gap-3">
            <div class="flex items-center gap-4">
                <div class="flex items-center gap-2">
                    <i class="fa-solid fa-envelope text-brand-medium"></i>
                    <span class="text-xs font-semibold text-slate-600">Email Reminders: <span class="text-brand-dark"><?php echo count(array_filter($appointments, fn($a) => $a['reminder_method'] === 'Email' && $a['reminder_sent'])); ?></span></span>
                </div>
                <div class="flex items-center gap-2">
                    <i class="fa-solid fa-phone text-brand-medium"></i>
                    <span class="text-xs font-semibold text-slate-600">SMS Reminders: <span class="text-brand-dark"><?php echo count(array_filter($appointments, fn($a) => $a['reminder_method'] === 'SMS' && $a['reminder_sent'])); ?></span></span>
                </div>
                <div class="flex items-center gap-2">
                    <i class="fa-solid fa-clock text-amber-500"></i>
                    <span class="text-xs font-semibold text-slate-600">Pending Reminders: <span class="text-amber-600"><?php echo count(array_filter($appointments, fn($a) => !$a['reminder_sent'] && $a['status'] !== 'cancelled')); ?></span></span>
                </div>
            </div>
            <button onclick="sendReminders()" class="px-3 py-1.5 text-xs font-semibold text-brand-medium hover:bg-brand-light rounded-lg transition border border-brand-border">
                <i class="fa-solid fa-bell mr-1"></i> Send Pending Reminders
            </button>
        </div>
    </div>

    <!-- Search & Filter -->
    <div class="bg-white rounded-xl shadow-xs p-4 border border-slate-200 mb-6">
        <div class="flex flex-col sm:flex-row gap-3">
            <div class="flex-1 relative">
                <i class="fa-solid fa-search absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-sm"></i>
                <input type="text"
                       id="searchAppointment"
                       placeholder="Search by patient name, ID, or doctor..."
                       class="w-full pl-9 pr-4 py-2 border border-slate-200 rounded-lg focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none text-sm transition">
            </div>
            <div class="flex gap-2 flex-wrap">
                <select id="filterStatus" class="px-4 py-2 border border-slate-200 rounded-lg focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none text-sm bg-white">
                    <option value="">All Status</option>
                    <option value="confirmed">Confirmed</option>
                    <option value="pending">Pending</option>
                    <option value="cancelled">Cancelled</option>
                </select>
                <select id="filterDoctor" class="px-4 py-2 border border-slate-200 rounded-lg focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none text-sm bg-white">
                    <option value="">All Doctors</option>
                    <?php foreach ($doctors as $d): ?>
                        <option value="<?php echo $d['name']; ?>"><?php echo $d['name']; ?></option>
                    <?php endforeach; ?>
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
    <div class="bg-white rounded-xl shadow-xs border border-slate-200 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead class="bg-slate-50 border-b border-slate-200">
                    <tr>
                        <th class="px-4 py-3 text-left text-[10px] font-bold text-slate-500 uppercase tracking-wider">Appt ID</th>
                        <th class="px-4 py-3 text-left text-[10px] font-bold text-slate-500 uppercase tracking-wider">Patient</th>
                        <th class="px-4 py-3 text-left text-[10px] font-bold text-slate-500 uppercase tracking-wider">Doctor</th>
                        <th class="px-4 py-3 text-left text-[10px] font-bold text-slate-500 uppercase tracking-wider">Date & Time</th>
                        <th class="px-4 py-3 text-left text-[10px] font-bold text-slate-500 uppercase tracking-wider">Type</th>
                        <th class="px-4 py-3 text-left text-[10px] font-bold text-slate-500 uppercase tracking-wider">Status</th>
                        <th class="px-4 py-3 text-left text-[10px] font-bold text-slate-500 uppercase tracking-wider">Priority</th>
                        <th class="px-4 py-3 text-center text-[10px] font-bold text-slate-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody id="appointmentTableBody">
                    <?php foreach ($paginatedAppointments as $appointment): ?>
                    <tr class="border-b border-slate-100 hover:bg-brand-light/40 transition-colors appointment-row"
                        data-patient="<?php echo strtolower($appointment['patient_name']); ?>"
                        data-doctor="<?php echo strtolower($appointment['doctor_name']); ?>"
                        data-status="<?php echo $appointment['status']; ?>"
                        data-date="<?php echo $appointment['date']; ?>">
                        <td class="px-4 py-3 font-mono text-xs text-brand-dark font-semibold"><?php echo $appointment['appointment_id']; ?></td>
                        <td class="px-4 py-3">
                            <div class="flex items-center gap-2.5">
                                <div class="w-8 h-8 rounded-full bg-brand-light border border-brand-border flex items-center justify-center text-brand-dark font-bold text-xs flex-shrink-0">
                                    <?php echo $appointment['patient_avatar']; ?>
                                </div>
                                <div>
                                    <p class="font-semibold text-slate-800 text-sm"><?php echo $appointment['patient_name']; ?></p>
                                    <p class="text-xs text-slate-400"><?php echo $appointment['type']; ?></p>
                                </div>
                            </div>
                        </td>
                        <td class="px-4 py-3">
                            <p class="font-medium text-slate-800 text-xs"><?php echo $appointment['doctor_name']; ?></p>
                            <p class="text-[10px] text-slate-400"><?php echo $appointment['doctor_specialty']; ?></p>
                        </td>
                        <td class="px-4 py-3">
                            <p class="text-xs font-medium text-slate-800"><?php echo date('M d, Y', strtotime($appointment['date'])); ?></p>
                            <p class="text-[10px] text-slate-400"><?php echo $appointment['time']; ?> - <?php echo $appointment['end_time']; ?></p>
                        </td>
                        <td class="px-4 py-3">
                            <span class="text-xs text-slate-600"><?php echo $appointment['type']; ?></span>
                        </td>
                        <td class="px-4 py-3">
                            <span class="px-2 py-1 rounded-full text-xs font-semibold <?php 
                                echo $appointment['status'] === 'confirmed' ? 'bg-emerald-100 text-emerald-700' : 
                                    ($appointment['status'] === 'pending' ? 'bg-amber-100 text-amber-700' : 
                                    'bg-slate-100 text-slate-500'); 
                            ?>">
                                <?php echo ucfirst($appointment['status']); ?>
                            </span>
                        </td>
                        <td class="px-4 py-3">
                            <span class="px-2 py-1 rounded-full text-xs font-semibold <?php 
                                echo $appointment['priority'] === 'high' ? 'bg-rose-100 text-rose-700' : 
                                    ($appointment['priority'] === 'medium' ? 'bg-yellow-100 text-yellow-700' : 
                                    'bg-slate-100 text-slate-500'); 
                            ?>">
                                <?php echo ucfirst($appointment['priority']); ?>
                            </span>
                        </td>
                        <td class="px-4 py-3">
                            <div class="flex items-center justify-center gap-1">
                                <button onclick="viewAppointment(<?php echo $appointment['id']; ?>)"
                                        class="p-1.5 text-brand-medium hover:bg-brand-light rounded-lg transition" title="View">
                                    <i class="fa-solid fa-eye text-sm"></i>
                                </button>
                                <button onclick="editAppointment(<?php echo $appointment['id']; ?>)"
                                        class="p-1.5 text-slate-500 hover:bg-slate-100 hover:text-slate-700 rounded-lg transition" title="Edit">
                                    <i class="fa-solid fa-pen text-sm"></i>
                                </button>
                                <?php if (!$appointment['reminder_sent'] && $appointment['status'] !== 'cancelled'): ?>
                                    <button onclick="sendReminder(<?php echo $appointment['id']; ?>)"
                                            class="p-1.5 text-amber-500 hover:bg-amber-50 rounded-lg transition" title="Send Reminder">
                                        <i class="fa-solid fa-bell text-sm"></i>
                                    </button>
                                <?php endif; ?>
                                <button onclick="deleteAppointment(<?php echo $appointment['id']; ?>)"
                                        class="p-1.5 text-rose-500 hover:bg-rose-50 rounded-lg transition" title="Cancel">
                                    <i class="fa-solid fa-xmark text-sm"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <!-- Empty state -->
        <div id="emptyState" class="hidden flex-col items-center justify-center py-14 text-center">
            <div class="w-12 h-12 rounded-full bg-slate-100 flex items-center justify-center mb-3">
                <i class="fa-solid fa-calendar-xmark text-slate-400"></i>
            </div>
            <p class="text-sm font-semibold text-slate-600">No appointments match your filters</p>
            <p class="text-xs text-slate-400 mt-1">Try adjusting your search or clearing filters</p>
            <button onclick="resetFilters()" class="mt-3 text-xs font-semibold text-brand-medium hover:text-brand-dark">Clear all filters</button>
        </div>

        <!-- Pagination -->
        <div class="px-4 py-3 border-t border-slate-200 flex flex-col sm:flex-row justify-between items-center gap-3 bg-slate-50">
            <p class="text-xs text-slate-500">
                Showing <span class="font-semibold text-slate-700"><?php echo $offset + 1; ?></span> to
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
    </div>

    <!-- Doctor Schedule Section -->
<div class="mt-6">
    <div class="flex items-center justify-between mb-4">
        <h3 class="text-lg font-bold text-slate-900 flex items-center gap-2">
            <i class="fa-solid fa-clock text-brand-medium"></i> Doctor Schedule
        </h3>
        <div class="flex gap-2">
            <button onclick="openModal('doctorScheduleModal')" 
                    class="px-3 py-1.5 text-xs font-semibold text-brand-medium hover:bg-brand-light rounded-lg transition border border-brand-border">
                <i class="fa-solid fa-pen mr-1"></i> Manage Schedule
            </button>
        </div>
    </div>
    
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        <?php foreach ($doctors as $doctor): ?>
            <?php 
                $docSchedules = array_filter($doctorSchedules, fn($s) => $s['doctor_id'] === $doctor['id']);
                $days = array_column($docSchedules, 'day');
                $statusDot = $doctor['status'] === 'available' ? 'bg-emerald-500' : 'bg-amber-500';
                $today = date('l');
            ?>
            <div class="bg-white rounded-xl shadow-xs border border-slate-200 p-4 hover:shadow-md transition-all">
                <!-- Doctor Header -->
                <div class="flex items-center justify-between mb-3">
                    <div class="flex items-center gap-2.5">
                        <div class="w-9 h-9 rounded-full bg-brand-light border border-brand-border flex items-center justify-center text-brand-dark font-bold text-xs flex-shrink-0">
                            <?php echo strtoupper(substr($doctor['name'], 0, 1) . substr(explode(' ', $doctor['name'])[1] ?? '', 0, 1)); ?>
                        </div>
                        <div>
                            <p class="font-semibold text-slate-800 text-sm"><?php echo $doctor['name']; ?></p>
                            <p class="text-xs text-slate-400"><?php echo $doctor['specialty']; ?></p>
                        </div>
                    </div>
                    <span class="flex items-center gap-1 text-xs">
                        <span class="w-2 h-2 rounded-full <?php echo $statusDot; ?>"></span>
                        <?php echo ucfirst($doctor['status']); ?>
                    </span>
                </div>
                
                <!-- Schedule Grid -->
                <div class="grid grid-cols-7 gap-1 mb-2">
                    <?php 
                        $daysOfWeek = ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'];
                        $fullDays = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
                        foreach ($daysOfWeek as $index => $day):
                            $fullDay = $fullDays[$index];
                            $hasSchedule = in_array($fullDay, $days);
                            $schedule = array_filter($docSchedules, fn($s) => $s['day'] === $fullDay);
                            $schedule = reset($schedule);
                            $isToday = $day === substr($today, 0, 3);
                    ?>
                    <div class="text-center">
                        <span class="text-[10px] text-slate-400 block"><?php echo $day; ?></span>
                        <div class="mt-1 <?php 
                            echo $hasSchedule ? 'bg-brand-light border border-brand-border rounded-lg p-1' : 'bg-slate-50 rounded-lg p-1 border border-dashed border-slate-200'; 
                            echo $isToday ? ' ring-2 ring-brand-medium ring-offset-1' : '';
                        ?>">
                            <?php if ($hasSchedule): ?>
                                <span class="text-[10px] font-semibold text-brand-dark">✓</span>
                                <span class="text-[8px] text-slate-500 block leading-tight">
                                    <?php echo date('g:i A', strtotime($schedule['start'] ?? '08:00 AM')); ?>
                                </span>
                            <?php else: ?>
                                <span class="text-[8px] text-slate-300">─</span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
                
                <!-- Quick Stats -->
                <div class="flex items-center justify-between text-[10px] text-slate-400 pt-2 border-t border-slate-100">
                    <span>
                        <i class="fa-regular fa-calendar mr-1"></i> 
                        <?php echo count($docSchedules); ?> days scheduled
                    </span>
                    <span>
                        <?php 
                            $available = count(array_filter($docSchedules, fn($s) => $s['status'] === 'available'));
                            echo $available . ' available';
                        ?>
                    </span>
                    <?php if ($isToday && $hasSchedule): ?>
                        <span class="text-emerald-600 font-semibold">● Today</span>
                    <?php endif; ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
</div>
<!-- ============================================================ -->
<!-- DOCTOR SCHEDULE MODAL (WITH DATE)                            -->
<!-- ============================================================ -->
<div id="doctorScheduleModal" class="hidden fixed inset-0 bg-slate-900/50 backdrop-blur-sm z-50 items-center justify-center p-4">
    <div class="bg-white rounded-2xl shadow-xl w-full max-w-4xl max-h-[90vh] overflow-y-auto">
        <div class="flex items-center justify-between px-6 py-4 border-b border-slate-200 sticky top-0 bg-white rounded-t-2xl">
            <h3 class="font-bold text-slate-900 flex items-center gap-2">
                <i class="fa-solid fa-calendar text-brand-medium"></i>
                Manage Doctor Schedule
            </h3>
            <button onclick="closeModal('doctorScheduleModal')" class="w-8 h-8 rounded-lg hover:bg-slate-100 flex items-center justify-center text-slate-400 hover:text-slate-600 transition">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>
        
        <div class="p-6">
            <!-- Date Range Selector -->
            <div class="flex flex-wrap items-center gap-4 mb-6 pb-4 border-b border-slate-200">
                <div class="flex items-center gap-2">
                    <label class="text-xs font-semibold text-slate-500 uppercase tracking-wide">Date Range:</label>
                    <input type="date" id="schedule_date_from" class="px-3 py-1.5 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none">
                    <span class="text-slate-400">to</span>
                    <input type="date" id="schedule_date_to" class="px-3 py-1.5 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none">
                    <button onclick="filterScheduleByDate()" class="px-3 py-1.5 text-xs font-semibold text-white bg-brand-dark rounded-lg hover:bg-brand-medium transition">
                        <i class="fa-solid fa-filter mr-1"></i> Filter
                    </button>
                </div>
                <div class="flex items-center gap-2">
                    <span class="text-xs font-semibold text-slate-500">Quick Filters:</span>
                    <button onclick="setDateRange('today')" class="px-3 py-1 text-xs rounded-lg border border-slate-200 text-slate-600 hover:bg-brand-light/40 hover:border-brand-medium transition">Today</button>
                    <button onclick="setDateRange('week')" class="px-3 py-1 text-xs rounded-lg border border-slate-200 text-slate-600 hover:bg-brand-light/40 hover:border-brand-medium transition">This Week</button>
                    <button onclick="setDateRange('month')" class="px-3 py-1 text-xs rounded-lg border border-slate-200 text-slate-600 hover:bg-brand-light/40 hover:border-brand-medium transition">This Month</button>
                    <button onclick="setDateRange('all')" class="px-3 py-1 text-xs rounded-lg border border-slate-200 text-slate-400 hover:bg-slate-100 transition">All</button>
                </div>
            </div>

            <!-- Schedule Grid by Doctor -->
            <div class="space-y-6" id="scheduleGrid">
                <?php 
                // Group schedules by doctor
                $doctorScheduleMap = [];
                foreach ($doctorSchedules as $schedule) {
                    $doctorScheduleMap[$schedule['doctor_id']][] = $schedule;
                }
                ?>
                
                <?php foreach ($doctors as $doctor): ?>
                    <?php 
                        $doctorSchedulesList = $doctorScheduleMap[$doctor['id']] ?? [];
                    ?>
                    <div class="doctor-schedule-block border border-slate-200 rounded-xl p-4" data-doctor-id="<?php echo $doctor['id']; ?>">
                        <div class="flex items-center justify-between mb-4">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-full bg-brand-light border border-brand-border flex items-center justify-center text-brand-dark font-bold text-sm flex-shrink-0">
                                    <?php echo strtoupper(substr($doctor['name'], 0, 1) . substr(explode(' ', $doctor['name'])[1] ?? '', 0, 1)); ?>
                                </div>
                                <div>
                                    <p class="font-semibold text-slate-800"><?php echo $doctor['name']; ?></p>
                                    <p class="text-xs text-slate-400"><?php echo $doctor['specialty']; ?></p>
                                </div>
                            </div>
                            <div class="flex items-center gap-3">
                                <span class="flex items-center gap-1 text-xs">
                                    <span class="w-2 h-2 rounded-full <?php echo $doctor['status'] === 'available' ? 'bg-emerald-500' : 'bg-amber-500'; ?>"></span>
                                    <?php echo ucfirst($doctor['status']); ?>
                                </span>
                                <button onclick="addScheduleDate(<?php echo $doctor['id']; ?>)" 
                                        class="px-3 py-1.5 text-xs font-semibold text-brand-medium hover:bg-brand-light rounded-lg transition border border-brand-border">
                                    <i class="fa-solid fa-plus mr-1"></i> Add Date
                                </button>
                            </div>
                        </div>
                        
                        <!-- Schedule Cards for this Doctor -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3" id="doctor-schedule-<?php echo $doctor['id']; ?>">
                            <?php foreach ($doctorSchedulesList as $schedule): ?>
                                <div class="schedule-item p-3 rounded-lg border <?php echo $schedule['status'] === 'available' ? 'border-emerald-200 bg-emerald-50/30' : ($schedule['status'] === 'busy' ? 'border-amber-200 bg-amber-50/30' : 'border-slate-200 bg-slate-50/30'); ?>">
                                    <div class="flex items-center justify-between mb-1">
                                        <span class="text-xs font-semibold text-slate-700">
                                            <?php echo date('M d, Y', strtotime($schedule['date'])); ?>
                                            <span class="font-normal text-slate-400">(<?php echo date('D', strtotime($schedule['date'])); ?>)</span>
                                        </span>
                                        <button onclick="editScheduleDate(<?php echo $doctor['id']; ?>, '<?php echo $schedule['date']; ?>')" 
                                                class="text-xs text-brand-medium hover:text-brand-dark transition">
                                            <i class="fa-solid fa-pen"></i>
                                        </button>
                                    </div>
                                    <div class="flex items-center gap-2 text-xs text-slate-600">
                                        <span class="font-medium"><?php echo $schedule['start']; ?></span>
                                        <span class="text-slate-400">—</span>
                                        <span class="font-medium"><?php echo $schedule['end']; ?></span>
                                    </div>
                                    <div class="flex items-center justify-between mt-1">
                                        <span class="px-2 py-0.5 rounded-full text-[10px] <?php 
                                            echo $schedule['status'] === 'available' ? 'bg-emerald-100 text-emerald-700' : 
                                                ($schedule['status'] === 'busy' ? 'bg-amber-100 text-amber-700' : 
                                                'bg-slate-100 text-slate-500'); 
                                        ?>">
                                            <?php echo ucfirst($schedule['status']); ?>
                                        </span>
                                        <?php if ($schedule['notes']): ?>
                                            <span class="text-[10px] text-slate-400 truncate max-w-[100px]">
                                                <i class="fa-solid fa-comment mr-1"></i><?php echo $schedule['notes']; ?>
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                            
                            <?php if (empty($doctorSchedulesList)): ?>
                                <div class="col-span-full text-center py-6 text-slate-400 text-sm">
                                    <i class="fa-solid fa-calendar-plus text-2xl block mb-2"></i>
                                    No schedules set for this doctor
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="flex justify-end gap-2 px-6 pb-6 pt-4 border-t border-slate-200">
            <button type="button" onclick="closeModal('doctorScheduleModal')"
                    class="px-4 py-2 bg-white border border-slate-200 text-slate-600 rounded-lg hover:bg-slate-50 transition text-sm font-semibold">
                Cancel
            </button>
            <button type="button" onclick="saveDoctorSchedule()"
                    class="px-4 py-2 bg-brand-dark text-white rounded-lg hover:bg-brand-medium transition text-sm font-semibold">
                <i class="fa-solid fa-check mr-1.5"></i> Save All Schedules
            </button>
        </div>
    </div>
</div>

<!-- ============================================================ -->
<!-- EDIT SCHEDULE BY DATE MODAL                                  -->
<!-- ============================================================ -->
<div id="editScheduleDateModal" class="hidden fixed inset-0 bg-slate-900/50 backdrop-blur-sm z-50 items-center justify-center p-4">
    <div class="bg-white rounded-2xl shadow-xl w-full max-w-md">
        <div class="flex items-center justify-between px-6 py-4 border-b border-slate-200">
            <h3 class="font-bold text-slate-900">Edit Schedule</h3>
            <button onclick="closeModal('editScheduleDateModal')" class="w-8 h-8 rounded-lg hover:bg-slate-100 flex items-center justify-center text-slate-400 hover:text-slate-600 transition">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>
        <form id="editScheduleDateForm" class="p-6 space-y-4" onsubmit="saveEditedScheduleDate(event)">
            <input type="hidden" id="edit_doctor_id">
            <input type="hidden" id="edit_schedule_date">
            
            <div>
                <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">Doctor</label>
                <input type="text" id="edit_doctor_name_display" readonly class="w-full px-3 py-2 bg-slate-50 border border-slate-200 rounded-lg text-sm text-slate-600 outline-none cursor-not-allowed">
            </div>
            <div>
                <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">Date</label>
                <input type="date" id="edit_schedule_date_input" required class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none">
            </div>
            <div>
                <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">Start Time</label>
                <input type="time" id="edit_schedule_start" required class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none">
            </div>
            <div>
                <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">End Time</label>
                <input type="time" id="edit_schedule_end" required class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none">
            </div>
            <div>
                <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">Status</label>
                <select id="edit_schedule_status_date" class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm bg-white focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none">
                    <option value="available">🟢 Available</option>
                    <option value="busy">🟡 Busy</option>
                    <option value="unavailable">🔴 Unavailable</option>
                </select>
            </div>
            <div>
                <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">Notes (Optional)</label>
                <input type="text" id="edit_schedule_notes" placeholder="e.g. Half day, Training, Leave" class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none">
            </div>

            <div class="flex justify-between gap-2 pt-2 border-t border-slate-100">
                <button type="button" onclick="deleteScheduleDate()" class="px-4 py-2 text-rose-600 hover:bg-rose-50 rounded-lg transition text-sm font-semibold">
                    <i class="fa-solid fa-trash-can mr-1.5"></i> Delete
                </button>
                <div class="flex gap-2">
                    <button type="button" onclick="closeModal('editScheduleDateModal')"
                            class="px-4 py-2 bg-white border border-slate-200 text-slate-600 rounded-lg hover:bg-slate-50 transition text-sm font-semibold">
                        Cancel
                    </button>
                    <button type="submit"
                            class="px-4 py-2 bg-brand-dark text-white rounded-lg hover:bg-brand-medium transition text-sm font-semibold">
                        <i class="fa-solid fa-check mr-1.5"></i> Save
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>


<!-- ============================================================ -->
<!-- SCHEDULE APPOINTMENT MODAL                                   -->
<!-- ============================================================ -->
<div id="scheduleModal" class="hidden fixed inset-0 bg-slate-900/50 backdrop-blur-sm z-50 items-center justify-center p-4">
    <div class="bg-white rounded-2xl shadow-xl w-full max-w-2xl max-h-[90vh] overflow-y-auto">
        <div class="flex items-center justify-between px-6 py-4 border-b border-slate-200 sticky top-0 bg-white rounded-t-2xl">
            <h3 class="font-bold text-slate-900">Schedule Appointment</h3>
            <button onclick="closeModal('scheduleModal')" class="w-8 h-8 rounded-lg hover:bg-slate-100 flex items-center justify-center text-slate-400 hover:text-slate-600 transition">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>
        <form id="scheduleForm" class="p-6 space-y-4" onsubmit="saveAppointment(event)">
            <div>
                <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">Patient</label>
                <select id="schedule_patient" required class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm bg-white focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none">
                    <option value="">Select Patient</option>
                    <?php foreach ($patients as $p): ?>
                        <option value="<?php echo $p['id']; ?>"><?php echo $p['name']; ?> (<?php echo $p['patient_id']; ?>)</option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div>
                <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">Doctor</label>
                <select id="schedule_doctor" required class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm bg-white focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none">
                    <option value="">Select Doctor</option>
                    <?php foreach ($doctors as $d): ?>
                        <option value="<?php echo $d['id']; ?>"><?php echo $d['name']; ?> (<?php echo $d['specialty']; ?>)</option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div>
                <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">Appointment Type</label>
                <select id="schedule_type" required class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm bg-white focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none">
                    <option value="General Checkup">General Checkup</option>
                    <option value="Follow-up">Follow-up</option>
                    <option value="Consultation">Consultation</option>
                    <option value="Vaccination">Vaccination</option>
                    <option value="Lab Test">Lab Test</option>
                    <option value="Procedure">Procedure</option>
                    <option value="Other">Other</option>
                </select>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">Date</label>
                    <input type="date" id="schedule_date" required class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">Time</label>
                    <input type="time" id="schedule_time" required class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none">
                </div>
            </div>
            <div>
                <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">Priority</label>
                <select id="schedule_priority" class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm bg-white focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none">
                    <option value="low">Low</option>
                    <option value="medium" selected>Medium</option>
                    <option value="high">High</option>
                </select>
            </div>
            <div>
                <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">Notes</label>
                <textarea id="schedule_notes" rows="2" class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none" placeholder="Additional notes..."></textarea>
            </div>
            <div>
                <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">Send Reminder</label>
                <div class="flex gap-4">
                    <label class="flex items-center gap-2 text-sm text-slate-600">
                        <input type="radio" name="reminder_method" value="SMS" checked class="accent-brand-dark"> SMS
                    </label>
                    <label class="flex items-center gap-2 text-sm text-slate-600">
                        <input type="radio" name="reminder_method" value="Email" class="accent-brand-dark"> Email
                    </label>
                    <label class="flex items-center gap-2 text-sm text-slate-600">
                        <input type="radio" name="reminder_method" value="none" class="accent-brand-dark"> No Reminder
                    </label>
                </div>
            </div>

            <div class="flex justify-end gap-2 pt-2 border-t border-slate-100">
                <button type="button" onclick="closeModal('scheduleModal')"
                        class="px-4 py-2 bg-white border border-slate-200 text-slate-600 rounded-lg hover:bg-slate-50 transition text-sm font-semibold">
                    Cancel
                </button>
                <button type="submit"
                        class="px-4 py-2 bg-brand-dark text-white rounded-lg hover:bg-brand-medium transition text-sm font-semibold">
                    <i class="fa-solid fa-calendar-plus mr-1.5"></i> Schedule
                </button>
            </div>
        </form>
    </div>
</div>

<!-- ============================================================ -->
<!-- VIEW APPOINTMENT MODAL                                       -->
<!-- ============================================================ -->
<div id="viewAppointmentModal" class="hidden fixed inset-0 bg-slate-900/50 backdrop-blur-sm z-50 items-center justify-center p-4">
    <div class="bg-white rounded-2xl shadow-xl w-full max-w-2xl max-h-[90vh] overflow-y-auto">
        <div class="flex items-center justify-between px-6 py-4 border-b border-slate-200 sticky top-0 bg-white rounded-t-2xl">
            <h3 class="font-bold text-slate-900">Appointment Details</h3>
            <button onclick="closeModal('viewAppointmentModal')" class="w-8 h-8 rounded-lg hover:bg-slate-100 flex items-center justify-center text-slate-400 hover:text-slate-600 transition">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>
        <div id="appointmentDetailsContent" class="p-6">
            <div class="flex items-center justify-center py-10 text-slate-400 text-sm">
                <i class="fa-solid fa-spinner fa-spin mr-2"></i> Loading...
            </div>
        </div>
    </div>
</div>

<!-- ============================================================ -->
<!-- EDIT APPOINTMENT MODAL                                       -->
<!-- ============================================================ -->
<div id="editAppointmentModal" class="hidden fixed inset-0 bg-slate-900/50 backdrop-blur-sm z-50 items-center justify-center p-4">
    <div class="bg-white rounded-2xl shadow-xl w-full max-w-2xl max-h-[90vh] overflow-y-auto">
        <div class="flex items-center justify-between px-6 py-4 border-b border-slate-200 sticky top-0 bg-white rounded-t-2xl">
            <h3 class="font-bold text-slate-900">Edit Appointment</h3>
            <button onclick="closeModal('editAppointmentModal')" class="w-8 h-8 rounded-lg hover:bg-slate-100 flex items-center justify-center text-slate-400 hover:text-slate-600 transition">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>
        <form id="editAppointmentForm" class="p-6 space-y-4" onsubmit="saveEditedAppointment(event)">
            <input type="hidden" id="edit_appointment_id">
            <div>
                <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">Patient</label>
                <input type="text" id="edit_patient_name" readonly class="w-full px-3 py-2 bg-slate-50 border border-slate-200 rounded-lg text-sm text-slate-600 outline-none cursor-not-allowed">
            </div>
            <div>
                <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">Doctor</label>
                <select id="edit_doctor" required class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm bg-white focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none">
                    <?php foreach ($doctors as $d): ?>
                        <option value="<?php echo $d['name']; ?>"><?php echo $d['name']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div>
                <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">Appointment Type</label>
                <select id="edit_type" required class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm bg-white focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none">
                    <option value="General Checkup">General Checkup</option>
                    <option value="Follow-up">Follow-up</option>
                    <option value="Consultation">Consultation</option>
                    <option value="Vaccination">Vaccination</option>
                    <option value="Lab Test">Lab Test</option>
                </select>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">Date</label>
                    <input type="date" id="edit_date" required class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">Time</label>
                    <input type="time" id="edit_time" required class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none">
                </div>
            </div>
            <div>
                <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">Status</label>
                <select id="edit_status" class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm bg-white focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none">
                    <option value="pending">Pending</option>
                    <option value="confirmed">Confirmed</option>
                    <option value="cancelled">Cancelled</option>
                </select>
            </div>
            <div>
                <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">Priority</label>
                <select id="edit_priority" class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm bg-white focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none">
                    <option value="low">Low</option>
                    <option value="medium">Medium</option>
                    <option value="high">High</option>
                </select>
            </div>
            <div>
                <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">Notes</label>
                <textarea id="edit_notes" rows="2" class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none"></textarea>
            </div>

            <div class="flex justify-end gap-2 pt-2 border-t border-slate-100">
                <button type="button" onclick="closeModal('editAppointmentModal')"
                        class="px-4 py-2 bg-white border border-slate-200 text-slate-600 rounded-lg hover:bg-slate-50 transition text-sm font-semibold">
                    Cancel
                </button>
                <button type="submit"
                        class="px-4 py-2 bg-brand-dark text-white rounded-lg hover:bg-brand-medium transition text-sm font-semibold">
                    <i class="fa-solid fa-check mr-1.5"></i> Save Changes
                </button>
            </div>
        </form>
    </div>
</div>

<!-- ============================================================ -->
<!-- DOCTOR SCHEDULE MODAL                                        -->
<!-- ============================================================ -->
<div id="doctorScheduleModal" class="hidden fixed inset-0 bg-slate-900/50 backdrop-blur-sm z-50 items-center justify-center p-4">
    <div class="bg-white rounded-2xl shadow-xl w-full max-w-2xl max-h-[90vh] overflow-y-auto">
        <div class="flex items-center justify-between px-6 py-4 border-b border-slate-200 sticky top-0 bg-white rounded-t-2xl">
            <h3 class="font-bold text-slate-900">Manage Doctor Schedule</h3>
            <button onclick="closeModal('doctorScheduleModal')" class="w-8 h-8 rounded-lg hover:bg-slate-100 flex items-center justify-center text-slate-400 hover:text-slate-600 transition">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>
        <div class="p-6 space-y-6">
            <?php foreach ($doctors as $doctor): ?>
                <?php 
                    $docSchedules = array_filter($doctorSchedules, fn($s) => $s['doctor_id'] === $doctor['id']);
                    $days = array_column($docSchedules, 'day');
                ?>
                <div class="border border-slate-200 rounded-xl p-4">
                    <div class="flex items-center justify-between mb-3">
                        <div class="flex items-center gap-2.5">
                            <div class="w-8 h-8 rounded-full bg-brand-light border border-brand-border flex items-center justify-center text-brand-dark font-bold text-xs flex-shrink-0">
                                <?php echo strtoupper(substr($doctor['name'], 0, 1) . substr(explode(' ', $doctor['name'])[1] ?? '', 0, 1)); ?>
                            </div>
                            <div>
                                <p class="font-semibold text-slate-800 text-sm"><?php echo $doctor['name']; ?></p>
                                <p class="text-xs text-slate-400"><?php echo $doctor['specialty']; ?></p>
                            </div>
                        </div>
                        <span class="flex items-center gap-1 text-xs">
                            <span class="w-2 h-2 rounded-full <?php echo $doctor['status'] === 'available' ? 'bg-emerald-500' : 'bg-amber-500'; ?>"></span>
                            <?php echo ucfirst($doctor['status']); ?>
                        </span>
                    </div>
                    <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-2">
                        <?php foreach ($daysOfWeek as $day): ?>
                            <?php 
                                $hasSchedule = in_array($day, $days);
                                $schedule = array_filter($docSchedules, fn($s) => $s['day'] === $day);
                                $schedule = reset($schedule);
                            ?>
                            <label class="flex items-center gap-2 text-xs p-2 rounded-lg border <?php echo $hasSchedule ? 'border-brand-border bg-brand-light/40' : 'border-slate-200 hover:bg-slate-50'; ?> cursor-pointer transition">
                                <input type="checkbox" <?php echo $hasSchedule ? 'checked' : ''; ?> class="accent-brand-dark">
                                <span class="flex-1">
                                    <?php echo substr($day, 0, 3); ?>
                                    <?php if ($hasSchedule): ?>
                                        <span class="text-[8px] text-slate-400 block"><?php echo $schedule['start']; ?> - <?php echo $schedule['end']; ?></span>
                                    <?php endif; ?>
                                </span>
                            </label>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="flex justify-end gap-2 px-6 pb-6">
            <button type="button" onclick="closeModal('doctorScheduleModal')"
                    class="px-4 py-2 bg-white border border-slate-200 text-slate-600 rounded-lg hover:bg-slate-50 transition text-sm font-semibold">
                Cancel
            </button>
            <button type="button" onclick="saveDoctorSchedule()"
                    class="px-4 py-2 bg-brand-dark text-white rounded-lg hover:bg-brand-medium transition text-sm font-semibold">
                <i class="fa-solid fa-check mr-1.5"></i> Save Schedule
            </button>
        </div>
    </div>
</div>

<!-- Toast notification -->
<div id="toast" class="hidden fixed bottom-6 right-6 z-[60] px-4 py-3 rounded-lg shadow-lg text-sm font-semibold text-white flex items-center gap-2">
    <i class="fa-solid fa-circle-check"></i>
    <span id="toastMessage"></span>
</div>

<!-- ============================================================ -->
<!-- JAVASCRIPT                                                   -->
<!-- ============================================================ -->
<script>
    const APPOINTMENTS = <?php echo json_encode(array_column($appointments, null, 'id'), JSON_PRETTY_PRINT); ?>;
    
    // ============================================================
    // DOCTOR SCHEDULES DATA (Single source of truth)
    // ============================================================
    const DOCTOR_SCHEDULES = <?php echo json_encode($doctorSchedules, JSON_PRETTY_PRINT); ?>;
    let editScheduleData = {};
    let currentScheduleFilter = 'all';

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
    // VIEW APPOINTMENT
    // ============================================================
    function viewAppointment(id) {
        openModal('viewAppointmentModal');
        const a = APPOINTMENTS[id];
        if (!a) return;

        setTimeout(() => {
            const statusColors = {
                confirmed: 'bg-emerald-100 text-emerald-700',
                pending: 'bg-amber-100 text-amber-700',
                cancelled: 'bg-slate-100 text-slate-500'
            };
            const priorityColors = {
                high: 'bg-rose-100 text-rose-700',
                medium: 'bg-yellow-100 text-yellow-700',
                low: 'bg-slate-100 text-slate-500'
            };

            document.getElementById('appointmentDetailsContent').innerHTML = `
                <div class="space-y-4">
                    <div class="flex items-center gap-4 pb-4 border-b border-slate-200">
                        <div class="w-14 h-14 rounded-full bg-brand-light border border-brand-border flex items-center justify-center text-brand-dark font-bold text-lg flex-shrink-0">
                            ${a.patient_avatar}
                        </div>
                        <div>
                            <h4 class="text-lg font-bold text-slate-900">${a.patient_name}</h4>
                            <p class="text-sm text-slate-500">${a.appointment_id} • ${a.type}</p>
                            <span class="inline-block px-2 py-0.5 rounded-full text-xs font-semibold mt-1 ${statusColors[a.status] || statusColors.pending}">
                                ${a.status.toUpperCase()}
                            </span>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div><p class="text-xs text-slate-400 font-semibold">Doctor</p><p class="text-sm text-slate-800">${a.doctor_name}</p></div>
                        <div><p class="text-xs text-slate-400 font-semibold">Specialty</p><p class="text-sm text-slate-800">${a.doctor_specialty}</p></div>
                        <div><p class="text-xs text-slate-400 font-semibold">Date</p><p class="text-sm text-slate-800">${new Date(a.date).toLocaleDateString('en-US', { month: 'long', day: 'numeric', year: 'numeric' })}</p></div>
                        <div><p class="text-xs text-slate-400 font-semibold">Time</p><p class="text-sm text-slate-800">${a.time} - ${a.end_time}</p></div>
                        <div><p class="text-xs text-slate-400 font-semibold">Priority</p><p class="text-sm"><span class="px-2 py-0.5 rounded-full text-xs font-semibold ${priorityColors[a.priority] || priorityColors.medium}">${a.priority.toUpperCase()}</span></p></div>
                        <div><p class="text-xs text-slate-400 font-semibold">Reminder</p><p class="text-sm text-slate-800">${a.reminder_sent ? '✅ Sent via ' + a.reminder_method : '❌ Not sent'}</p></div>
                    </div>
                    ${a.notes ? `<div class="bg-slate-50 rounded-xl p-4 border border-slate-200"><h5 class="text-sm font-bold text-slate-700 mb-2">Notes</h5><p class="text-sm text-slate-800">${a.notes}</p></div>` : ''}
                    <div class="flex justify-end gap-2 pt-2 border-t border-slate-200">
                        <button onclick="closeModal('viewAppointmentModal')" class="px-4 py-2 bg-white border border-slate-200 text-slate-600 rounded-lg hover:bg-slate-50 transition text-sm font-semibold">Close</button>
                        <button onclick="closeModal('viewAppointmentModal'); editAppointment(${a.id})" class="px-4 py-2 bg-brand-dark text-white rounded-lg hover:bg-brand-medium transition text-sm font-semibold"><i class="fa-solid fa-pen mr-1.5"></i> Edit</button>
                    </div>
                </div>
            `;
        }, 300);
    }

    // ============================================================
    // EDIT APPOINTMENT
    // ============================================================
    function editAppointment(id) {
        const a = APPOINTMENTS[id];
        if (!a) return;

        document.getElementById('edit_appointment_id').value = a.id;
        document.getElementById('edit_patient_name').value = a.patient_name;
        document.getElementById('edit_doctor').value = a.doctor_name;
        document.getElementById('edit_type').value = a.type;
        document.getElementById('edit_date').value = a.date;
        document.getElementById('edit_time').value = a.time;
        document.getElementById('edit_status').value = a.status;
        document.getElementById('edit_priority').value = a.priority;
        document.getElementById('edit_notes').value = a.notes || '';

        openModal('editAppointmentModal');
    }

    function saveEditedAppointment(event) {
        event.preventDefault();
        const id = document.getElementById('edit_appointment_id').value;
        const a = APPOINTMENTS[id];
        if (!a) return;

        a.doctor_name = document.getElementById('edit_doctor').value;
        a.type = document.getElementById('edit_type').value;
        a.date = document.getElementById('edit_date').value;
        a.time = document.getElementById('edit_time').value;
        a.status = document.getElementById('edit_status').value;
        a.priority = document.getElementById('edit_priority').value;
        a.notes = document.getElementById('edit_notes').value;

        updateAppointmentRow(a);

        closeModal('editAppointmentModal');
        showToast('Appointment #' + a.appointment_id + ' updated successfully!', 'success');
    }

    function updateAppointmentRow(a) {
        const rows = document.querySelectorAll('.appointment-row');
        rows.forEach(row => {
            const patientName = row.querySelector('.font-semibold.text-slate-800.text-sm')?.textContent;
            if (patientName === a.patient_name) {
                const statusBadge = row.querySelector('.px-2.py-1.rounded-full');
                const statusClasses = {
                    confirmed: 'bg-emerald-100 text-emerald-700',
                    pending: 'bg-amber-100 text-amber-700',
                    cancelled: 'bg-slate-100 text-slate-500'
                };
                statusBadge.className = `px-2 py-1 rounded-full text-xs font-semibold ${statusClasses[a.status] || statusClasses.pending}`;
                statusBadge.textContent = a.status.charAt(0).toUpperCase() + a.status.slice(1);
            }
        });
    }

    // ============================================================
    // DELETE APPOINTMENT
    // ============================================================
    function deleteAppointment(id) {
        if (confirm('Are you sure you want to cancel this appointment?')) {
            const a = APPOINTMENTS[id];
            if (a) {
                a.status = 'cancelled';
                updateAppointmentRow(a);
                showToast('Appointment #' + a.appointment_id + ' cancelled.', 'success');
            }
        }
    }

    // ============================================================
    // SCHEDULE APPOINTMENT
    // ============================================================
    function saveAppointment(event) {
        event.preventDefault();
        showToast('Appointment scheduled successfully!', 'success');
        closeModal('scheduleModal');
    }

    // ============================================================
    // REMINDERS
    // ============================================================
    function sendReminder(id) {
        if (id) {
            const a = APPOINTMENTS[id];
            if (a) {
                a.reminder_sent = true;
                showToast('Reminder sent to ' + a.patient_name + ' via ' + (a.reminder_method || 'SMS'), 'success');
            }
        } else {
            let count = 0;
            Object.values(APPOINTMENTS).forEach(a => {
                if (!a.reminder_sent && a.status !== 'cancelled') {
                    a.reminder_sent = true;
                    count++;
                }
            });
            showToast('Sent ' + count + ' reminder(s)!', 'success');
        }
    }

    function sendReminders() {
        sendReminder(null);
    }

    // ============================================================
    // DOCTOR SCHEDULE MANAGEMENT (FIXED - No Duplicates)
    // ============================================================
    
    // Get doctor name by ID
    function getDoctorName(doctorId) {
        const doctors = <?php echo json_encode($doctors, JSON_PRETTY_PRINT); ?>;
        const doctor = doctors.find(d => d.id == doctorId);
        return doctor ? doctor.name : 'Unknown Doctor';
    }

    // Toggle schedule day (checkbox)
    function toggleScheduleDay(checkbox) {
        const doctorId = checkbox.dataset.doctor;
        const day = checkbox.dataset.day;
        const scheduleBlock = checkbox.closest('.schedule-day-item');
        
        if (checkbox.checked) {
            editScheduleDay(doctorId, day);
        } else {
            if (confirm('Remove schedule for ' + day + '?')) {
                const index = DOCTOR_SCHEDULES.findIndex(s => s.doctor_id == doctorId && s.day === day);
                if (index !== -1) {
                    DOCTOR_SCHEDULES.splice(index, 1);
                    scheduleBlock.classList.remove('border-brand-border', 'bg-brand-light/40');
                    scheduleBlock.classList.add('border-slate-200', 'bg-white');
                    scheduleBlock.innerHTML = `
                        <div class="flex items-center justify-between mb-2">
                            <label class="flex items-center gap-2 text-xs font-medium text-slate-700 cursor-pointer">
                                <input type="checkbox" class="day-checkbox accent-brand-dark" 
                                       data-doctor="${doctorId}" data-day="${day}"
                                       onchange="toggleScheduleDay(this)">
                                ${day}
                            </label>
                        </div>
                        <div class="text-xs text-slate-400 italic">Not scheduled</div>
                    `;
                    showToast('Schedule removed for ' + day, 'info');
                }
            } else {
                checkbox.checked = true;
            }
        }
    }

    // Edit schedule day (opens modal)
    function editScheduleDay(doctorId, day) {
        const schedule = DOCTOR_SCHEDULES.find(s => s.doctor_id == doctorId && s.day === day);
        if (!schedule) {
            const newSchedule = {
                doctor_id: doctorId,
                doctor_name: getDoctorName(doctorId),
                day: day,
                start: '08:00 AM',
                end: '05:00 PM',
                status: 'available'
            };
            DOCTOR_SCHEDULES.push(newSchedule);
            editScheduleData = newSchedule;
        } else {
            editScheduleData = schedule;
        }
        
        document.getElementById('edit_doctor_id').value = doctorId;
        document.getElementById('edit_day').value = day;
        document.getElementById('edit_day_display').value = day;
        document.getElementById('edit_start_time').value = convertTo24Hour(editScheduleData.start);
        document.getElementById('edit_end_time').value = convertTo24Hour(editScheduleData.end);
        document.getElementById('edit_schedule_status').value = editScheduleData.status;
        
        openModal('editScheduleDayModal');
    }

    // Save edited schedule
    function saveEditedSchedule(event) {
        event.preventDefault();
        
        const doctorId = document.getElementById('edit_doctor_id').value;
        const day = document.getElementById('edit_day').value;
        const startTime = document.getElementById('edit_start_time').value;
        const endTime = document.getElementById('edit_end_time').value;
        const status = document.getElementById('edit_schedule_status').value;
        
        let schedule = DOCTOR_SCHEDULES.find(s => s.doctor_id == doctorId && s.day === day);
        if (!schedule) {
            schedule = {
                doctor_id: parseInt(doctorId),
                doctor_name: getDoctorName(doctorId),
                day: day,
                start: '',
                end: '',
                status: 'available'
            };
            DOCTOR_SCHEDULES.push(schedule);
        }
        
        schedule.start = convertTo12Hour(startTime);
        schedule.end = convertTo12Hour(endTime);
        schedule.status = status;
        
        updateScheduleUI(doctorId, day, schedule);
        
        closeModal('editScheduleDayModal');
        showToast('Schedule updated for ' + day, 'success');
    }

    // Update UI after schedule change
    function updateScheduleUI(doctorId, day, schedule) {
        const scheduleBlocks = document.querySelectorAll('.doctor-schedule-block');
        scheduleBlocks.forEach(block => {
            if (block.dataset.doctorId == doctorId) {
                const dayItems = block.querySelectorAll('.schedule-day-item');
                dayItems.forEach(item => {
                    const label = item.querySelector('label');
                    if (label && label.textContent.trim() === day) {
                        const checkbox = item.querySelector('.day-checkbox');
                        checkbox.checked = true;
                        
                        item.classList.remove('border-slate-200', 'bg-white');
                        item.classList.add('border-brand-border', 'bg-brand-light/40');
                        
                        const timeDisplay = item.querySelector('.flex.items-center.gap-2.text-xs.text-slate-600');
                        if (timeDisplay) {
                            timeDisplay.innerHTML = `
                                <span class="font-medium">${schedule.start}</span>
                                <span class="text-slate-400">—</span>
                                <span class="font-medium">${schedule.end}</span>
                                <span class="ml-auto px-2 py-0.5 rounded-full text-[10px] ${schedule.status === 'available' ? 'bg-emerald-100 text-emerald-700' : 'bg-amber-100 text-amber-700'}">
                                    ${schedule.status.charAt(0).toUpperCase() + schedule.status.slice(1)}
                                </span>
                            `;
                        }
                        
                        const editBtn = item.querySelector('button');
                        if (editBtn) {
                            editBtn.setAttribute('onclick', `editScheduleDay(${doctorId}, '${day}')`);
                        }
                    }
                });
            }
        });
    }

    // Add new schedule day
    function addScheduleDay(doctorId) {
        const doctor = <?php echo json_encode($doctors, JSON_PRETTY_PRINT); ?>.find(d => d.id == doctorId);
        if (!doctor) return;
        
        const days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
        const availableDays = days.filter(d => !DOCTOR_SCHEDULES.some(s => s.doctor_id == doctorId && s.day === d));
        
        if (availableDays.length === 0) {
            showToast('All days already scheduled for this doctor', 'warning');
            return;
        }
        
        const day = prompt('Enter day to add (Monday-Sunday):', availableDays[0]);
        if (!day) return;
        
        const formattedDay = day.charAt(0).toUpperCase() + day.slice(1).toLowerCase();
        if (!days.includes(formattedDay)) {
            showToast('Invalid day. Please enter a valid day.', 'warning');
            return;
        }
        
        if (DOCTOR_SCHEDULES.some(s => s.doctor_id == doctorId && s.day === formattedDay)) {
            showToast('Schedule already exists for ' + formattedDay, 'warning');
            return;
        }
        
        const newSchedule = {
            doctor_id: doctorId,
            doctor_name: doctor.name,
            day: formattedDay,
            start: '08:00 AM',
            end: '05:00 PM',
            status: 'available'
        };
        DOCTOR_SCHEDULES.push(newSchedule);
        
        renderDoctorSchedule(doctorId);
        showToast('Added schedule for ' + formattedDay, 'success');
        
        setTimeout(() => {
            editScheduleDay(doctorId, formattedDay);
        }, 500);
    }

    // Render doctor schedule
    function renderDoctorSchedule(doctorId) {
        const scheduleBlocks = document.querySelectorAll('.doctor-schedule-block');
        scheduleBlocks.forEach(block => {
            if (block.dataset.doctorId == doctorId) {
                const scheduleGrid = block.querySelector('.grid');
                if (!scheduleGrid) return;
                
                const doctorSchedules = DOCTOR_SCHEDULES.filter(s => s.doctor_id == doctorId);
                const days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
                
                scheduleGrid.innerHTML = '';
                days.forEach(day => {
                    const schedule = doctorSchedules.find(s => s.day === day);
                    const hasSchedule = !!schedule;
                    
                    const div = document.createElement('div');
                    div.className = `schedule-day-item p-3 rounded-lg border transition ${hasSchedule ? 'border-brand-border bg-brand-light/40' : 'border-slate-200 bg-white hover:bg-slate-50'}`;
                    
                    div.innerHTML = `
                        <div class="flex items-center justify-between mb-2">
                            <label class="flex items-center gap-2 text-xs font-medium text-slate-700 cursor-pointer">
                                <input type="checkbox" ${hasSchedule ? 'checked' : ''} 
                                       class="day-checkbox accent-brand-dark" 
                                       data-doctor="${doctorId}" 
                                       data-day="${day}"
                                       onchange="toggleScheduleDay(this)">
                                ${day}
                            </label>
                            ${hasSchedule ? `
                                <button onclick="editScheduleDay(${doctorId}, '${day}')" 
                                        class="text-xs text-brand-medium hover:text-brand-dark transition">
                                    <i class="fa-solid fa-pen"></i>
                                </button>
                            ` : ''}
                        </div>
                        ${hasSchedule ? `
                            <div class="flex items-center gap-2 text-xs text-slate-600">
                                <span class="font-medium">${schedule.start}</span>
                                <span class="text-slate-400">—</span>
                                <span class="font-medium">${schedule.end}</span>
                                <span class="ml-auto px-2 py-0.5 rounded-full text-[10px] ${schedule.status === 'available' ? 'bg-emerald-100 text-emerald-700' : 'bg-amber-100 text-amber-700'}">
                                    ${schedule.status.charAt(0).toUpperCase() + schedule.status.slice(1)}
                                </span>
                            </div>
                        ` : `
                            <div class="text-xs text-slate-400 italic">Not scheduled</div>
                        `}
                    `;
                    
                    scheduleGrid.appendChild(div);
                });
            }
        });
    }

    // ============================================================
    // DOCTOR SCHEDULE WITH DATE (FIXED - No Duplicates)
    // ============================================================

    // Date range filtering
    function setDateRange(range) {
        const today = new Date();
        const from = document.getElementById('schedule_date_from');
        const to = document.getElementById('schedule_date_to');
        
        if (range === 'today') {
            const dateStr = today.toISOString().split('T')[0];
            from.value = dateStr;
            to.value = dateStr;
        } else if (range === 'week') {
            const weekEnd = new Date(today);
            weekEnd.setDate(weekEnd.getDate() + 7);
            from.value = today.toISOString().split('T')[0];
            to.value = weekEnd.toISOString().split('T')[0];
        } else if (range === 'month') {
            const monthEnd = new Date(today.getFullYear(), today.getMonth() + 1, 0);
            from.value = today.toISOString().split('T')[0];
            to.value = monthEnd.toISOString().split('T')[0];
        } else {
            from.value = '';
            to.value = '';
        }
        currentScheduleFilter = range;
        filterScheduleByDate();
    }

    function filterScheduleByDate() {
        const from = document.getElementById('schedule_date_from').value;
        const to = document.getElementById('schedule_date_to').value;
        
        document.querySelectorAll('.doctor-schedule-block').forEach(block => {
            const scheduleItems = block.querySelectorAll('.schedule-item');
            let hasVisible = false;
            
            scheduleItems.forEach(item => {
                const date = item.dataset.date;
                if (!date) {
                    item.style.display = '';
                    hasVisible = true;
                    return;
                }
                
                let visible = true;
                if (from && date < from) visible = false;
                if (to && date > to) visible = false;
                
                item.style.display = visible ? '' : 'none';
                if (visible) hasVisible = true;
            });
            
            let emptyMsg = block.querySelector('.schedule-empty-msg');
            if (!hasVisible) {
                if (!emptyMsg) {
                    emptyMsg = document.createElement('div');
                    emptyMsg.className = 'schedule-empty-msg col-span-full text-center py-6 text-slate-400 text-sm';
                    emptyMsg.innerHTML = '<i class="fa-solid fa-calendar-xmark text-2xl block mb-2"></i>No schedules in this date range';
                    block.querySelector('.grid').appendChild(emptyMsg);
                }
                emptyMsg.style.display = '';
            } else if (emptyMsg) {
                emptyMsg.style.display = 'none';
            }
        });
    }

    // Add schedule by date
    function addScheduleDate(doctorId) {
        const doctor = <?php echo json_encode($doctors, JSON_PRETTY_PRINT); ?>.find(d => d.id == doctorId);
        if (!doctor) return;
        
        const tomorrow = new Date();
        tomorrow.setDate(tomorrow.getDate() + 1);
        const dateStr = tomorrow.toISOString().split('T')[0];
        
        if (DOCTOR_SCHEDULES.some(s => s.doctor_id == doctorId && s.date === dateStr)) {
            showToast('Schedule already exists for ' + dateStr, 'warning');
            return;
        }
        
        document.getElementById('edit_doctor_id').value = doctorId;
        document.getElementById('edit_doctor_name_display').value = doctor.name;
        document.getElementById('edit_schedule_date').value = dateStr;
        document.getElementById('edit_schedule_date_input').value = dateStr;
        document.getElementById('edit_schedule_start').value = '08:00';
        document.getElementById('edit_schedule_end').value = '17:00';
        document.getElementById('edit_schedule_status_date').value = 'available';
        document.getElementById('edit_schedule_notes').value = '';
        
        openModal('editScheduleDateModal');
    }

    // Edit schedule by date
    function editScheduleDate(doctorId, date) {
        const schedule = DOCTOR_SCHEDULES.find(s => s.doctor_id == doctorId && s.date === date);
        if (!schedule) {
            showToast('Schedule not found', 'danger');
            return;
        }
        
        const doctor = <?php echo json_encode($doctors, JSON_PRETTY_PRINT); ?>.find(d => d.id == doctorId);
        
        document.getElementById('edit_doctor_id').value = doctorId;
        document.getElementById('edit_doctor_name_display').value = doctor ? doctor.name : 'Unknown';
        document.getElementById('edit_schedule_date').value = date;
        document.getElementById('edit_schedule_date_input').value = date;
        document.getElementById('edit_schedule_start').value = convertTo24Hour(schedule.start);
        document.getElementById('edit_schedule_end').value = convertTo24Hour(schedule.end);
        document.getElementById('edit_schedule_status_date').value = schedule.status;
        document.getElementById('edit_schedule_notes').value = schedule.notes || '';
        
        openModal('editScheduleDateModal');
    }

    // Save schedule by date
    function saveEditedScheduleDate(event) {
        event.preventDefault();
        
        const doctorId = parseInt(document.getElementById('edit_doctor_id').value);
        const date = document.getElementById('edit_schedule_date_input').value;
        const start = document.getElementById('edit_schedule_start').value;
        const end = document.getElementById('edit_schedule_end').value;
        const status = document.getElementById('edit_schedule_status_date').value;
        const notes = document.getElementById('edit_schedule_notes').value.trim();
        
        if (!date || !start || !end) {
            showToast('Please fill in all required fields', 'warning');
            return;
        }
        
        let schedule = DOCTOR_SCHEDULES.find(s => s.doctor_id == doctorId && s.date === date);
        if (!schedule) {
            const doctor = <?php echo json_encode($doctors, JSON_PRETTY_PRINT); ?>.find(d => d.id == doctorId);
            schedule = {
                doctor_id: doctorId,
                doctor_name: doctor ? doctor.name : 'Unknown Doctor',
                date: date,
                start: '',
                end: '',
                status: 'available',
                notes: ''
            };
            DOCTOR_SCHEDULES.push(schedule);
        }
        
        schedule.start = convertTo12Hour(start);
        schedule.end = convertTo12Hour(end);
        schedule.status = status;
        schedule.notes = notes;
        
        updateScheduleCard(doctorId, date, schedule);
        
        closeModal('editScheduleDateModal');
        showToast('Schedule updated for ' + date, 'success');
    }

    // Delete schedule by date
    function deleteScheduleDate() {
        const doctorId = parseInt(document.getElementById('edit_doctor_id').value);
        const date = document.getElementById('edit_schedule_date').value;
        
        if (!confirm('Delete schedule for ' + date + '?')) return;
        
        const index = DOCTOR_SCHEDULES.findIndex(s => s.doctor_id == doctorId && s.date === date);
        if (index !== -1) {
            DOCTOR_SCHEDULES.splice(index, 1);
            const card = document.querySelector(`.schedule-item[data-doctor="${doctorId}"][data-date="${date}"]`);
            if (card) card.remove();
            closeModal('editScheduleDateModal');
            showToast('Schedule deleted for ' + date, 'info');
        }
    }

    // Update schedule card UI
    function updateScheduleCard(doctorId, date, schedule) {
        const container = document.getElementById('doctor-schedule-' + doctorId);
        if (!container) return;
        
        let card = container.querySelector(`.schedule-item[data-doctor="${doctorId}"][data-date="${date}"]`);
        const statusColors = {
            available: 'border-emerald-200 bg-emerald-50/30',
            busy: 'border-amber-200 bg-amber-50/30',
            unavailable: 'border-slate-200 bg-slate-50/30'
        };
        const statusBadgeColors = {
            available: 'bg-emerald-100 text-emerald-700',
            busy: 'bg-amber-100 text-amber-700',
            unavailable: 'bg-slate-100 text-slate-500'
        };
        
        const dateDisplay = new Date(date + 'T00:00:00');
        const dayName = dateDisplay.toLocaleDateString('en-US', { weekday: 'short' });
        const monthDay = dateDisplay.toLocaleDateString('en-US', { month: 'short', day: 'numeric' });
        
        if (card) {
            card.className = `schedule-item p-3 rounded-lg border ${statusColors[schedule.status] || statusColors.available}`;
            card.innerHTML = `
                <div class="flex items-center justify-between mb-1">
                    <span class="text-xs font-semibold text-slate-700">
                        ${monthDay}, ${dateDisplay.getFullYear()}
                        <span class="font-normal text-slate-400">(${dayName})</span>
                    </span>
                    <button onclick="editScheduleDate(${doctorId}, '${date}')" 
                            class="text-xs text-brand-medium hover:text-brand-dark transition">
                        <i class="fa-solid fa-pen"></i>
                    </button>
                </div>
                <div class="flex items-center gap-2 text-xs text-slate-600">
                    <span class="font-medium">${schedule.start}</span>
                    <span class="text-slate-400">—</span>
                    <span class="font-medium">${schedule.end}</span>
                </div>
                <div class="flex items-center justify-between mt-1">
                    <span class="px-2 py-0.5 rounded-full text-[10px] ${statusBadgeColors[schedule.status] || statusBadgeColors.available}">
                        ${schedule.status.charAt(0).toUpperCase() + schedule.status.slice(1)}
                    </span>
                    ${schedule.notes ? `<span class="text-[10px] text-slate-400 truncate max-w-[100px]"><i class="fa-solid fa-comment mr-1"></i>${schedule.notes}</span>` : ''}
                </div>
            `;
            card.dataset.date = date;
            card.dataset.doctor = doctorId;
        } else {
            const newCard = document.createElement('div');
            newCard.className = `schedule-item p-3 rounded-lg border ${statusColors[schedule.status] || statusColors.available}`;
            newCard.dataset.doctor = doctorId;
            newCard.dataset.date = date;
            newCard.innerHTML = `
                <div class="flex items-center justify-between mb-1">
                    <span class="text-xs font-semibold text-slate-700">
                        ${monthDay}, ${dateDisplay.getFullYear()}
                        <span class="font-normal text-slate-400">(${dayName})</span>
                    </span>
                    <button onclick="editScheduleDate(${doctorId}, '${date}')" 
                            class="text-xs text-brand-medium hover:text-brand-dark transition">
                        <i class="fa-solid fa-pen"></i>
                    </button>
                </div>
                <div class="flex items-center gap-2 text-xs text-slate-600">
                    <span class="font-medium">${schedule.start}</span>
                    <span class="text-slate-400">—</span>
                    <span class="font-medium">${schedule.end}</span>
                </div>
                <div class="flex items-center justify-between mt-1">
                    <span class="px-2 py-0.5 rounded-full text-[10px] ${statusBadgeColors[schedule.status] || statusBadgeColors.available}">
                        ${schedule.status.charAt(0).toUpperCase() + schedule.status.slice(1)}
                    </span>
                    ${schedule.notes ? `<span class="text-[10px] text-slate-400 truncate max-w-[100px]"><i class="fa-solid fa-comment mr-1"></i>${schedule.notes}</span>` : ''}
                </div>
            `;
            container.appendChild(newCard);
            
            const emptyMsg = container.querySelector('.schedule-empty-msg');
            if (emptyMsg) emptyMsg.remove();
        }
    }

    // Save all schedules
    function saveDoctorSchedule() {
        console.log('Saving schedules:', DOCTOR_SCHEDULES);
        showToast('All schedules saved successfully!', 'success');
        closeModal('doctorScheduleModal');
    }

    // ============================================================
    // TIME CONVERSION HELPERS
    // ============================================================
    function convertTo24Hour(time12) {
        if (!time12) return '09:00';
        const parts = time12.match(/(\d+):(\d+)\s*(AM|PM)/i);
        if (!parts) return '09:00';
        let hours = parseInt(parts[1]);
        const minutes = parts[2];
        const ampm = parts[3].toUpperCase();
        if (ampm === 'PM' && hours !== 12) hours += 12;
        if (ampm === 'AM' && hours === 12) hours = 0;
        return String(hours).padStart(2, '0') + ':' + minutes;
    }

    function convertTo12Hour(time24) {
        if (!time24) return '09:00 AM';
        const parts = time24.split(':');
        let hours = parseInt(parts[0]);
        const minutes = parts[1];
        const ampm = hours >= 12 ? 'PM' : 'AM';
        if (hours > 12) hours -= 12;
        if (hours === 0) hours = 12;
        return hours + ':' + minutes + ' ' + ampm;
    }

    // ============================================================
    // TOAST NOTIFICATIONS
    // ============================================================
    let toastTimer = null;

    function showToast(message, type = 'success') {
        const toast = document.getElementById('toast');
        const colors = {
            success: 'bg-brand-dark',
            danger: 'bg-rose-600',
            info: 'bg-blue-600',
            warning: 'bg-amber-600'
        };
        toast.className = 'fixed bottom-6 right-6 z-[60] px-4 py-3 rounded-lg shadow-lg text-sm font-semibold text-white flex items-center gap-2 ' + (colors[type] || colors.success);
        toast.querySelector('i').className = 'fa-solid fa-circle-check';
        document.getElementById('toastMessage').textContent = message;
        toast.classList.remove('hidden');

        clearTimeout(toastTimer);
        toastTimer = setTimeout(() => toast.classList.add('hidden'), 4000);
    }

    // ============================================================
    // SEARCH & FILTER
    // ============================================================
    document.getElementById('searchAppointment').addEventListener('input', filterAppointments);
    document.getElementById('filterStatus').addEventListener('change', filterAppointments);
    document.getElementById('filterDoctor').addEventListener('change', filterAppointments);
    document.getElementById('filterDate').addEventListener('change', filterAppointments);

    function filterAppointments() {
        const search = document.getElementById('searchAppointment').value.toLowerCase();
        const status = document.getElementById('filterStatus').value;
        const doctor = document.getElementById('filterDoctor').value.toLowerCase();
        const dateFilter = document.getElementById('filterDate').value;
        let visibleCount = 0;

        const today = new Date();
        today.setHours(0, 0, 0, 0);
        const tomorrow = new Date(today);
        tomorrow.setDate(tomorrow.getDate() + 1);
        const weekEnd = new Date(today);
        weekEnd.setDate(weekEnd.getDate() + 7);

        document.querySelectorAll('.appointment-row').forEach(row => {
            const patient = row.dataset.patient;
            const rowDoctor = row.dataset.doctor;
            const rowStatus = row.dataset.status;
            const rowDate = new Date(row.dataset.date + 'T00:00:00');

            const matchesSearch = patient.includes(search) || rowDoctor.includes(search);
            const matchesStatus = !status || rowStatus === status;
            const matchesDoctor = !doctor || rowDoctor.includes(doctor);

            let matchesDate = true;
            if (dateFilter === 'today') {
                matchesDate = rowDate.getTime() === today.getTime();
            } else if (dateFilter === 'tomorrow') {
                matchesDate = rowDate.getTime() === tomorrow.getTime();
            } else if (dateFilter === 'week') {
                matchesDate = rowDate >= today && rowDate <= weekEnd;
            }

            const isVisible = matchesSearch && matchesStatus && matchesDoctor && matchesDate;

            row.style.display = isVisible ? '' : 'none';
            if (isVisible) visibleCount++;
        });

        document.getElementById('emptyState').style.display = visibleCount === 0 ? 'flex' : 'none';
    }

    function resetFilters() {
        document.getElementById('searchAppointment').value = '';
        document.getElementById('filterStatus').value = '';
        document.getElementById('filterDoctor').value = '';
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