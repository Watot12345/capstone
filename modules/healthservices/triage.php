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

// Sample Triage Data
$triageQueue = [
    [
        'id' => 1,
        'patient_id' => 1,
        'patient_name' => 'Maria Santos',
        'patient_avatar' => 'MS',
        'age' => 41,
        'gender' => 'Female',
        'queue_number' => 1,
        'queue_status' => 'waiting',
        'arrival_time' => '08:30 AM',
        'wait_time' => '45 mins',
        'vital_signs' => [
            'blood_pressure' => '140/90',
            'heart_rate' => 82,
            'temperature' => 36.5,
            'respiratory_rate' => 18,
            'oxygen_saturation' => 98,
            'weight' => 75.5,
            'height' => 165
        ],
        'priority' => 'medium',
        'symptoms' => ['Headache', 'Dizziness', 'Blurred vision'],
        'chief_complaint' => 'Severe headache and dizziness since yesterday',
        'nurse_assigned' => 'Nurse Maria Cruz',
        'status' => 'in_triage'
    ],
    [
        'id' => 2,
        'patient_id' => 2,
        'patient_name' => 'Juan Dela Cruz',
        'patient_avatar' => 'JD',
        'age' => 35,
        'gender' => 'Male',
        'queue_number' => 2,
        'queue_status' => 'waiting',
        'arrival_time' => '09:15 AM',
        'wait_time' => '30 mins',
        'vital_signs' => [
            'blood_pressure' => '180/110',
            'heart_rate' => 95,
            'temperature' => 37.2,
            'respiratory_rate' => 20,
            'oxygen_saturation' => 97,
            'weight' => 85.0,
            'height' => 175
        ],
        'priority' => 'critical',
        'symptoms' => ['Chest pain', 'Shortness of breath', 'Nausea'],
        'chief_complaint' => 'Severe chest pain radiating to left arm',
        'nurse_assigned' => 'Nurse Anna Reyes',
        'status' => 'in_triage'
    ],
    [
        'id' => 3,
        'patient_id' => 3,
        'patient_name' => 'Rosa Mendoza',
        'patient_avatar' => 'RM',
        'age' => 28,
        'gender' => 'Female',
        'queue_number' => 3,
        'queue_status' => 'waiting',
        'arrival_time' => '09:45 AM',
        'wait_time' => '15 mins',
        'vital_signs' => [
            'blood_pressure' => '120/80',
            'heart_rate' => 75,
            'temperature' => 37.8,
            'respiratory_rate' => 16,
            'oxygen_saturation' => 99,
            'weight' => 62.0,
            'height' => 160
        ],
        'priority' => 'high',
        'symptoms' => ['Fever', 'Cough', 'Body aches'],
        'chief_complaint' => 'Fever and cough for 3 days',
        'nurse_assigned' => 'Nurse Maria Cruz',
        'status' => 'in_triage'
    ],
    [
        'id' => 4,
        'patient_id' => 4,
        'patient_name' => 'Carlos Lim',
        'patient_avatar' => 'CL',
        'age' => 47,
        'gender' => 'Male',
        'queue_number' => 4,
        'queue_status' => 'completed',
        'arrival_time' => '10:00 AM',
        'wait_time' => '10 mins',
        'vital_signs' => [
            'blood_pressure' => '150/95',
            'heart_rate' => 88,
            'temperature' => 36.8,
            'respiratory_rate' => 18,
            'oxygen_saturation' => 98,
            'weight' => 78.0,
            'height' => 170
        ],
        'priority' => 'high',
        'symptoms' => ['Palpitations', 'Fatigue', 'Dizziness'],
        'chief_complaint' => 'Heart palpitations and fatigue',
        'nurse_assigned' => 'Nurse Anna Reyes',
        'status' => 'sent_to_doctor'
    ],
    [
        'id' => 5,
        'patient_id' => 5,
        'patient_name' => 'Elena Torres',
        'patient_avatar' => 'ET',
        'age' => 30,
        'gender' => 'Female',
        'queue_number' => 5,
        'queue_status' => 'waiting',
        'arrival_time' => '10:30 AM',
        'wait_time' => '5 mins',
        'vital_signs' => [
            'blood_pressure' => '110/70',
            'heart_rate' => 72,
            'temperature' => 36.2,
            'respiratory_rate' => 14,
            'oxygen_saturation' => 100,
            'weight' => 58.0,
            'height' => 162
        ],
        'priority' => 'low',
        'symptoms' => ['Mild headache', 'No appetite'],
        'chief_complaint' => 'Mild headache and loss of appetite',
        'nurse_assigned' => 'Nurse Maria Cruz',
        'status' => 'completed'
    ],
];

// Pagination
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$limit = 5;
$offset = ($page - 1) * $limit;
$totalTriage = count($triageQueue);
$totalPages = ceil($totalTriage / $limit);
$paginatedTriage = array_slice($triageQueue, $offset, $limit);

$title = 'Triage';

// Stats
$totalWaiting = count(array_filter($triageQueue, fn($t) => $t['queue_status'] === 'waiting'));
$totalCritical = count(array_filter($triageQueue, fn($t) => $t['priority'] === 'critical'));
$totalCompleted = count(array_filter($triageQueue, fn($t) => $t['status'] === 'completed' || $t['status'] === 'sent_to_doctor'));
$avgWaitTime = rand(15, 45);
?>

<!-- ============================================================ -->
<!-- 2. HTML + PHP EMBEDDED + Tailwind CSS                       -->
<!-- ============================================================ -->

<div class="flex-1 px-6 pt-[26px] pb-20 mb-10 flex flex-col min-h-0 overflow-hidden">

    <!-- Page Header -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6">
        <div>
            <h2 class="text-2xl font-black text-slate-900 tracking-tight">Triage</h2>
            <p class="text-sm text-slate-500 mt-0.5">Vital signs recording, priority classification & queue management</p>
        </div>
        <div class="flex gap-3">
            <button onclick="openModal('symptomCheckerModal')"
                    class="px-4 py-2 bg-white border border-slate-200 text-slate-700 rounded-lg hover:bg-slate-50 transition-colors text-sm font-semibold flex items-center gap-2">
                <i class="fa-solid fa-stethoscope text-xs"></i> Symptom Checker
            </button>
            <button onclick="openModal('addTriageModal')"
                    class="px-4 py-2 bg-brand-dark text-white rounded-lg hover:bg-brand-medium transition-colors text-sm font-semibold flex items-center gap-2 shadow-sm">
                <i class="fa-solid fa-plus text-xs"></i> Add Patient
            </button>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-4">
        <div class="bg-white rounded-xl shadow-xs p-4 border border-slate-200 flex items-center gap-3">
            <div class="w-11 h-11 rounded-lg bg-brand-light border border-brand-border flex items-center justify-center flex-shrink-0">
                <i class="fa-solid fa-people-group text-brand-dark"></i>
            </div>
            <div>
                <p class="text-xs text-slate-500 font-semibold uppercase tracking-wide">Waiting</p>
                <p class="text-xl font-bold text-slate-900" id="statWaiting"><?php echo $totalWaiting; ?></p>
                <p class="text-[10px] text-slate-400">Avg wait: <?php echo $avgWaitTime; ?> mins</p>
            </div>
        </div>
        <div class="bg-white rounded-xl shadow-xs p-4 border border-slate-200 flex items-center gap-3">
            <div class="w-11 h-11 rounded-lg bg-rose-50 border border-rose-100 flex items-center justify-center flex-shrink-0">
                <i class="fa-solid fa-heart-pulse text-rose-600"></i>
            </div>
            <div>
                <p class="text-xs text-slate-500 font-semibold uppercase tracking-wide">Critical</p>
                <p class="text-xl font-bold text-slate-900"><?php echo $totalCritical; ?></p>
                <p class="text-[10px] text-rose-400">⚠️ Immediate attention</p>
            </div>
        </div>
        <div class="bg-white rounded-xl shadow-xs p-4 border border-slate-200 flex items-center gap-3">
            <div class="w-11 h-11 rounded-lg bg-emerald-50 border border-emerald-100 flex items-center justify-center flex-shrink-0">
                <i class="fa-solid fa-check-circle text-emerald-600"></i>
            </div>
            <div>
                <p class="text-xs text-slate-500 font-semibold uppercase tracking-wide">Completed</p>
                <p class="text-xl font-bold text-slate-900"><?php echo $totalCompleted; ?></p>
                <p class="text-[10px] text-emerald-400">Sent to doctor</p>
            </div>
        </div>
        <div class="bg-white rounded-xl shadow-xs p-4 border border-slate-200 flex items-center gap-3">
            <div class="w-11 h-11 rounded-lg bg-sky-50 border border-sky-100 flex items-center justify-center flex-shrink-0">
                <i class="fa-solid fa-clock text-sky-600"></i>
            </div>
            <div>
                <p class="text-xs text-slate-500 font-semibold uppercase tracking-wide">Today's Patients</p>
                <p class="text-xl font-bold text-slate-900"><?php echo $totalTriage; ?></p>
                <p class="text-[10px] text-sky-400">+<?php echo rand(2, 5); ?> from yesterday</p>
            </div>
        </div>
    </div>

    <!-- Quick Queue Status -->
    <div class="bg-gradient-to-r from-amber-50 to-white rounded-xl shadow-xs p-3 border border-amber-200 mb-6">
        <div class="flex flex-wrap items-center justify-between gap-2">
            <div class="flex items-center gap-4">
                <span class="text-xs font-semibold text-amber-700"><i class="fa-solid fa-queue mr-1"></i> Current Queue:</span>
                <?php 
                    $priorities = ['critical' => '🔴', 'high' => '🟠', 'medium' => '🟡', 'low' => '🟢'];
                    foreach ($priorities as $key => $icon):
                        $count = count(array_filter($triageQueue, fn($t) => $t['priority'] === $key && $t['queue_status'] === 'waiting'));
                        if ($count > 0):
                ?>
                    <span class="text-xs text-slate-600"><?php echo $icon; ?> <?php echo ucfirst($key); ?>: <?php echo $count; ?></span>
                <?php endif; endforeach; ?>
            </div>
            <div class="flex items-center gap-2">
                <span class="text-xs text-slate-400">Next: <span class="font-semibold text-brand-dark">#<?php echo $triageQueue[0]['queue_number'] ?? 'N/A'; ?></span></span>
                <button onclick="callNextPatient()" class="px-3 py-1 text-xs font-semibold text-white bg-brand-dark rounded-lg hover:bg-brand-medium transition">
                    <i class="fa-solid fa-bullhorn mr-1"></i> Call Next
                </button>
            </div>
        </div>
    </div>

    <!-- Search & Filter -->
    <div class="bg-white rounded-xl shadow-xs p-4 border border-slate-200 mb-6">
        <div class="flex flex-col sm:flex-row gap-3">
            <div class="flex-1 relative">
                <i class="fa-solid fa-search absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-sm"></i>
                <input type="text"
                       id="searchTriage"
                       placeholder="Search by patient name or ID..."
                       class="w-full pl-9 pr-4 py-2 border border-slate-200 rounded-lg focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none text-sm transition">
            </div>
            <div class="flex gap-2 flex-wrap">
                <select id="filterPriority" class="px-4 py-2 border border-slate-200 rounded-lg focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none text-sm bg-white">
                    <option value="">All Priorities</option>
                    <option value="critical">Critical</option>
                    <option value="high">High</option>
                    <option value="medium">Medium</option>
                    <option value="low">Low</option>
                </select>
                <select id="filterStatus" class="px-4 py-2 border border-slate-200 rounded-lg focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none text-sm bg-white">
                    <option value="">All Status</option>
                    <option value="waiting">Waiting</option>
                    <option value="in_triage">In Triage</option>
                    <option value="completed">Completed</option>
                    <option value="sent_to_doctor">Sent to Doctor</option>
                </select>
                <button onclick="resetFilters()" title="Reset filters"
                        class="px-3 py-2 bg-slate-100 text-slate-500 rounded-lg hover:bg-slate-200 hover:text-slate-700 transition-colors text-sm">
                    <i class="fa-solid fa-rotate-right"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- Triage Queue Table -->
    <div class="bg-white rounded-xl shadow-xs border border-slate-200 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead class="bg-slate-50 border-b border-slate-200">
                    <tr>
                        <th class="px-4 py-3 text-left text-[10px] font-bold text-slate-500 uppercase tracking-wider">#</th>
                        <th class="px-4 py-3 text-left text-[10px] font-bold text-slate-500 uppercase tracking-wider">Patient</th>
                        <th class="px-4 py-3 text-left text-[10px] font-bold text-slate-500 uppercase tracking-wider">Age/Gender</th>
                        <th class="px-4 py-3 text-left text-[10px] font-bold text-slate-500 uppercase tracking-wider">Vital Signs</th>
                        <th class="px-4 py-3 text-left text-[10px] font-bold text-slate-500 uppercase tracking-wider">Priority</th>
                        <th class="px-4 py-3 text-left text-[10px] font-bold text-slate-500 uppercase tracking-wider">Status</th>
                        <th class="px-4 py-3 text-left text-[10px] font-bold text-slate-500 uppercase tracking-wider">Wait Time</th>
                        <th class="px-4 py-3 text-center text-[10px] font-bold text-slate-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody id="triageTableBody">
                    <?php foreach ($paginatedTriage as $triage): ?>
                    <tr class="border-b border-slate-100 hover:bg-brand-light/40 transition-colors triage-row <?php echo $triage['priority'] === 'critical' ? 'bg-rose-50/50' : ''; ?>"
                        data-patient="<?php echo strtolower($triage['patient_name']); ?>"
                        data-priority="<?php echo $triage['priority']; ?>"
                        data-status="<?php echo $triage['status']; ?>">
                        <td class="px-4 py-3 font-mono text-xs font-bold <?php echo $triage['priority'] === 'critical' ? 'text-rose-600' : 'text-slate-400'; ?>">
                            #<?php echo $triage['queue_number']; ?>
                        </td>
                        <td class="px-4 py-3">
                            <div class="flex items-center gap-2.5">
                                <div class="w-8 h-8 rounded-full bg-brand-light border border-brand-border flex items-center justify-center text-brand-dark font-bold text-xs flex-shrink-0">
                                    <?php echo $triage['patient_avatar']; ?>
                                </div>
                                <div>
                                    <p class="font-semibold text-slate-800 text-sm"><?php echo $triage['patient_name']; ?></p>
                                    <p class="text-xs text-slate-400"><?php echo $triage['chief_complaint']; ?></p>
                                </div>
                            </div>
                        </td>
                        <td class="px-4 py-3 text-slate-600 text-xs">
                            <?php echo $triage['age']; ?> yrs<br>
                            <?php echo $triage['gender']; ?>
                        </td>
                        <td class="px-4 py-3">
                            <div class="space-y-0.5">
                                <div class="flex items-center gap-2 text-xs">
                                    <span class="text-slate-400">BP:</span>
                                    <span class="font-medium text-slate-700"><?php echo $triage['vital_signs']['blood_pressure']; ?></span>
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    <span class="text-slate-400">HR:</span>
                                    <span class="font-medium text-slate-700"><?php echo $triage['vital_signs']['heart_rate']; ?></span>
                                    <span class="text-slate-400 ml-1">Temp:</span>
                                    <span class="font-medium text-slate-700"><?php echo $triage['vital_signs']['temperature']; ?>°C</span>
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    <span class="text-slate-400">O2:</span>
                                    <span class="font-medium text-slate-700"><?php echo $triage['vital_signs']['oxygen_saturation']; ?>%</span>
                                </div>
                            </div>
                        </td>
                        <td class="px-4 py-3">
                            <?php
                                $priorityColors = [
                                    'critical' => 'bg-rose-100 text-rose-700 border-rose-200',
                                    'high' => 'bg-orange-100 text-orange-700 border-orange-200',
                                    'medium' => 'bg-yellow-100 text-yellow-700 border-yellow-200',
                                    'low' => 'bg-green-100 text-green-700 border-green-200'
                                ];
                                $priorityIcons = [
                                    'critical' => '🔴',
                                    'high' => '🟠',
                                    'medium' => '🟡',
                                    'low' => '🟢'
                                ];
                            ?>
                            <span class="px-2 py-1 rounded-full text-xs font-semibold border <?php echo $priorityColors[$triage['priority']] ?? $priorityColors['medium']; ?>">
                                <?php echo $priorityIcons[$triage['priority']] ?? ''; ?> <?php echo ucfirst($triage['priority']); ?>
                            </span>
                        </td>
                        <td class="px-4 py-3">
                            <span class="px-2 py-1 rounded-full text-xs font-semibold <?php 
                                echo $triage['status'] === 'in_triage' ? 'bg-brand-light text-brand-dark border border-brand-border' : 
                                    ($triage['status'] === 'waiting' ? 'bg-amber-100 text-amber-700' : 
                                    ($triage['status'] === 'sent_to_doctor' ? 'bg-emerald-100 text-emerald-700' : 
                                    'bg-slate-100 text-slate-500')); 
                            ?>">
                                <?php echo str_replace('_', ' ', ucfirst($triage['status'])); ?>
                            </span>
                        </td>
                        <td class="px-4 py-3 text-slate-600 text-xs">
                            <?php echo $triage['wait_time']; ?>
                        </td>
                        <td class="px-4 py-3">
                            <div class="flex items-center justify-center gap-1">
                                <button onclick="viewTriage(<?php echo $triage['id']; ?>)"
                                        class="p-1.5 text-brand-medium hover:bg-brand-light rounded-lg transition" title="View">
                                    <i class="fa-solid fa-eye text-sm"></i>
                                </button>
                                <button onclick="editTriage(<?php echo $triage['id']; ?>)"
                                        class="p-1.5 text-slate-500 hover:bg-slate-100 hover:text-slate-700 rounded-lg transition" title="Edit">
                                    <i class="fa-solid fa-pen text-sm"></i>
                                </button>
                                <?php if ($triage['status'] === 'in_triage' || $triage['status'] === 'waiting'): ?>
                                    <button onclick="completeTriage(<?php echo $triage['id']; ?>)"
                                            class="p-1.5 text-emerald-600 hover:bg-emerald-50 rounded-lg transition" title="Complete & Send to Doctor">
                                        <i class="fa-solid fa-check text-sm"></i>
                                    </button>
                                <?php endif; ?>
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
                <i class="fa-solid fa-user-slash text-slate-400"></i>
            </div>
            <p class="text-sm font-semibold text-slate-600">No patients in triage queue</p>
            <p class="text-xs text-slate-400 mt-1">All patients have been attended to</p>
        </div>

        <!-- Pagination -->
        <div class="px-4 py-3 border-t border-slate-200 flex flex-col sm:flex-row justify-between items-center gap-3 bg-slate-50">
            <p class="text-xs text-slate-500">
                Showing <span class="font-semibold text-slate-700"><?php echo $offset + 1; ?></span> to
                <span class="font-semibold text-slate-700"><?php echo min($offset + $limit, $totalTriage); ?></span> of
                <span class="font-semibold text-slate-700"><?php echo $totalTriage; ?></span> patients
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
</div>

<!-- ============================================================ -->
<!-- ADD TRIAGE MODAL                                             -->
<!-- ============================================================ -->
<div id="addTriageModal" class="hidden fixed inset-0 bg-slate-900/50 backdrop-blur-sm z-50 items-center justify-center p-4">
    <div class="bg-white rounded-2xl shadow-xl w-full max-w-2xl max-h-[90vh] overflow-y-auto">
        <div class="flex items-center justify-between px-6 py-4 border-b border-slate-200 sticky top-0 bg-white rounded-t-2xl">
            <h3 class="font-bold text-slate-900">Add Triage Patient</h3>
            <button onclick="closeModal('addTriageModal')" class="w-8 h-8 rounded-lg hover:bg-slate-100 flex items-center justify-center text-slate-400 hover:text-slate-600 transition">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>
        <form id="addTriageForm" class="p-6 space-y-4" onsubmit="saveTriage(event)">
            <div>
                <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">Patient</label>
                <select id="triage_patient" required class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm bg-white focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none">
                    <option value="">Select Patient</option>
                    <?php foreach ($patients as $p): ?>
                        <option value="<?php echo $p['id']; ?>"><?php echo $p['name']; ?> (<?php echo $p['patient_id']; ?>)</option>
                    <?php endforeach; ?>
                </select>
            </div>
            
            <!-- Vital Signs -->
            <div class="bg-slate-50 rounded-xl p-4 border border-slate-200">
                <h4 class="text-xs font-bold text-slate-700 uppercase tracking-wide mb-3">Vital Signs</h4>
                <div class="grid grid-cols-2 sm:grid-cols-4 gap-3">
                    <div>
                        <label class="block text-[10px] font-semibold text-slate-500 mb-1">BP (Systolic/Diastolic)</label>
                        <input type="text" id="triage_bp" placeholder="120/80" class="w-full px-3 py-1.5 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none">
                    </div>
                    <div>
                        <label class="block text-[10px] font-semibold text-slate-500 mb-1">Heart Rate (bpm)</label>
                        <input type="number" id="triage_hr" placeholder="72" class="w-full px-3 py-1.5 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none">
                    </div>
                    <div>
                        <label class="block text-[10px] font-semibold text-slate-500 mb-1">Temperature (°C)</label>
                        <input type="text" id="triage_temp" placeholder="36.5" class="w-full px-3 py-1.5 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none">
                    </div>
                    <div>
                        <label class="block text-[10px] font-semibold text-slate-500 mb-1">O2 Saturation (%)</label>
                        <input type="number" id="triage_o2" placeholder="98" class="w-full px-3 py-1.5 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none">
                    </div>
                    <div>
                        <label class="block text-[10px] font-semibold text-slate-500 mb-1">Respiratory Rate</label>
                        <input type="number" id="triage_rr" placeholder="18" class="w-full px-3 py-1.5 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none">
                    </div>
                    <div>
                        <label class="block text-[10px] font-semibold text-slate-500 mb-1">Weight (kg)</label>
                        <input type="text" id="triage_weight" placeholder="65.0" class="w-full px-3 py-1.5 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none">
                    </div>
                    <div>
                        <label class="block text-[10px] font-semibold text-slate-500 mb-1">Height (cm)</label>
                        <input type="text" id="triage_height" placeholder="165" class="w-full px-3 py-1.5 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none">
                    </div>
                </div>
            </div>

            <!-- Symptoms -->
            <div>
                <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">Symptoms</label>
                <div class="flex flex-wrap gap-2" id="symptomCheckboxes">
                    <?php 
                        $symptoms = ['Headache', 'Fever', 'Cough', 'Chest pain', 'Shortness of breath', 'Nausea', 'Dizziness', 'Body aches', 'Fatigue', 'Palpitations', 'Blurred vision', 'Loss of appetite'];
                        foreach ($symptoms as $symptom):
                    ?>
                    <label class="flex items-center gap-1.5 px-3 py-1.5 bg-white border border-slate-200 rounded-lg text-xs hover:bg-brand-light/40 cursor-pointer transition has-[:checked]:border-brand-medium has-[:checked]:bg-brand-light/40">
                        <input type="checkbox" value="<?php echo $symptom; ?>" class="accent-brand-dark"> <?php echo $symptom; ?>
                    </label>
                    <?php endforeach; ?>
                </div>
            </div>

            <div>
                <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">Chief Complaint</label>
                <textarea id="triage_complaint" rows="2" class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none" placeholder="Describe the main reason for visit..."></textarea>
            </div>

            <div>
                <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">Priority</label>
                <select id="triage_priority" class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm bg-white focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none">
                    <option value="low">🟢 Low</option>
                    <option value="medium" selected>🟡 Medium</option>
                    <option value="high">🟠 High</option>
                    <option value="critical">🔴 Critical</option>
                </select>
            </div>

            <div>
                <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">Nurse Assigned</label>
                <select id="triage_nurse" class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm bg-white focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none">
                    <option value="Nurse Maria Cruz">Nurse Maria Cruz</option>
                    <option value="Nurse Anna Reyes">Nurse Anna Reyes</option>
                    <option value="Nurse Jose Santos">Nurse Jose Santos</option>
                </select>
            </div>

            <div class="flex justify-end gap-2 pt-2 border-t border-slate-100">
                <button type="button" onclick="closeModal('addTriageModal')"
                        class="px-4 py-2 bg-white border border-slate-200 text-slate-600 rounded-lg hover:bg-slate-50 transition text-sm font-semibold">
                    Cancel
                </button>
                <button type="submit"
                        class="px-4 py-2 bg-brand-dark text-white rounded-lg hover:bg-brand-medium transition text-sm font-semibold">
                    <i class="fa-solid fa-plus mr-1.5"></i> Add to Queue
                </button>
            </div>
        </form>
    </div>
</div>

<!-- ============================================================ -->
<!-- VIEW TRIAGE MODAL                                            -->
<!-- ============================================================ -->
<div id="viewTriageModal" class="hidden fixed inset-0 bg-slate-900/50 backdrop-blur-sm z-50 items-center justify-center p-4">
    <div class="bg-white rounded-2xl shadow-xl w-full max-w-2xl max-h-[90vh] overflow-y-auto">
        <div class="flex items-center justify-between px-6 py-4 border-b border-slate-200 sticky top-0 bg-white rounded-t-2xl">
            <h3 class="font-bold text-slate-900">Triage Details</h3>
            <button onclick="closeModal('viewTriageModal')" class="w-8 h-8 rounded-lg hover:bg-slate-100 flex items-center justify-center text-slate-400 hover:text-slate-600 transition">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>
        <div id="triageDetailsContent" class="p-6">
            <div class="flex items-center justify-center py-10 text-slate-400 text-sm">
                <i class="fa-solid fa-spinner fa-spin mr-2"></i> Loading...
            </div>
        </div>
    </div>
</div>

<!-- ============================================================ -->
<!-- SYMPTOM CHECKER MODAL                                        -->
<!-- ============================================================ -->
<div id="symptomCheckerModal" class="hidden fixed inset-0 bg-slate-900/50 backdrop-blur-sm z-50 items-center justify-center p-4">
    <div class="bg-white rounded-2xl shadow-xl w-full max-w-2xl max-h-[90vh] overflow-y-auto">
        <div class="flex items-center justify-between px-6 py-4 border-b border-slate-200 sticky top-0 bg-white rounded-t-2xl">
            <h3 class="font-bold text-slate-900">Symptom Checker</h3>
            <button onclick="closeModal('symptomCheckerModal')" class="w-8 h-8 rounded-lg hover:bg-slate-100 flex items-center justify-center text-slate-400 hover:text-slate-600 transition">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>
        <div class="p-6">
            <div class="mb-4">
                <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">Select Symptoms</label>
                <div class="flex flex-wrap gap-2" id="symptomCheckerList">
                    <?php 
                        $allSymptoms = ['Fever', 'Headache', 'Cough', 'Chest pain', 'Shortness of breath', 'Nausea', 'Dizziness', 'Body aches', 'Fatigue', 'Palpitations', 'Blurred vision', 'Sore throat', 'Runny nose', 'Loss of taste', 'Abdominal pain'];
                        foreach ($allSymptoms as $sym):
                    ?>
                    <button onclick="toggleSymptom(this)" 
                            class="px-3 py-1.5 bg-white border border-slate-200 rounded-lg text-xs hover:bg-brand-light/40 transition">
                        <?php echo $sym; ?>
                    </button>
                    <?php endforeach; ?>
                </div>
            </div>
            
            <div class="bg-brand-light/40 rounded-xl p-4 border border-brand-border mb-4">
                <h4 class="text-sm font-bold text-slate-700 mb-2">Selected Symptoms</h4>
                <div id="selectedSymptomsDisplay" class="flex flex-wrap gap-2 min-h-[40px]">
                    <span class="text-xs text-slate-400">No symptoms selected</span>
                </div>
            </div>

            <div id="symptomResult" class="hidden">
                <div class="bg-amber-50 border border-amber-200 rounded-xl p-4">
                    <h4 class="text-sm font-bold text-amber-700 mb-2">⚠️ Possible Conditions</h4>
                    <div class="space-y-2">
                        <div class="flex items-center gap-2 p-2 bg-white rounded-lg border border-amber-100">
                            <span class="text-amber-500">•</span>
                            <span class="text-sm text-slate-700">Common Cold / Influenza</span>
                            <span class="ml-auto text-xs text-amber-600 font-semibold">65% match</span>
                        </div>
                        <div class="flex items-center gap-2 p-2 bg-white rounded-lg border border-amber-100">
                            <span class="text-amber-500">•</span>
                            <span class="text-sm text-slate-700">Allergic Rhinitis</span>
                            <span class="ml-auto text-xs text-amber-600 font-semibold">40% match</span>
                        </div>
                        <div class="flex items-center gap-2 p-2 bg-white rounded-lg border border-amber-100">
                            <span class="text-amber-500">•</span>
                            <span class="text-sm text-slate-700">Sinusitis</span>
                            <span class="ml-auto text-xs text-amber-600 font-semibold">35% match</span>
                        </div>
                    </div>
                    <p class="text-xs text-amber-600 mt-3">
                        <i class="fa-solid fa-info-circle mr-1"></i>
                        This is not a medical diagnosis. Please consult a doctor.
                    </p>
                </div>
            </div>

            <div class="flex justify-end gap-2 pt-4 border-t border-slate-100">
                <button onclick="analyzeSymptoms()" class="px-4 py-2 bg-brand-dark text-white rounded-lg hover:bg-brand-medium transition text-sm font-semibold">
                    <i class="fa-solid fa-microscope mr-1.5"></i> Analyze Symptoms
                </button>
                <button onclick="resetSymptomChecker()" class="px-4 py-2 bg-white border border-slate-200 text-slate-600 rounded-lg hover:bg-slate-50 transition text-sm font-semibold">
                    Reset
                </button>
            </div>
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
    const TRIAGE_DATA = <?php echo json_encode(array_column($triageQueue, null, 'id'), JSON_PRETTY_PRINT); ?>;
    let selectedSymptoms = [];

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
    // VIEW TRIAGE
    // ============================================================
    function viewTriage(id) {
        openModal('viewTriageModal');
        const t = TRIAGE_DATA[id];
        if (!t) return;

        setTimeout(() => {
            const priorityColors = {
                critical: 'bg-rose-100 text-rose-700 border-rose-200',
                high: 'bg-orange-100 text-orange-700 border-orange-200',
                medium: 'bg-yellow-100 text-yellow-700 border-yellow-200',
                low: 'bg-green-100 text-green-700 border-green-200'
            };
            const statusColors = {
                waiting: 'bg-amber-100 text-amber-700',
                in_triage: 'bg-brand-light text-brand-dark border border-brand-border',
                completed: 'bg-slate-100 text-slate-500',
                sent_to_doctor: 'bg-emerald-100 text-emerald-700'
            };

            const symptomsHtml = t.symptoms.map(s => `<span class="px-2 py-1 bg-slate-100 rounded-full text-xs">${s}</span>`).join('');

            document.getElementById('triageDetailsContent').innerHTML = `
                <div class="space-y-4">
                    <div class="flex items-center gap-4 pb-4 border-b border-slate-200">
                        <div class="w-14 h-14 rounded-full bg-brand-light border border-brand-border flex items-center justify-center text-brand-dark font-bold text-lg flex-shrink-0">
                            ${t.patient_avatar}
                        </div>
                        <div>
                            <h4 class="text-lg font-bold text-slate-900">${t.patient_name}</h4>
                            <p class="text-sm text-slate-500">Queue #${t.queue_number} • Arrived: ${t.arrival_time}</p>
                            <span class="inline-block px-2 py-0.5 rounded-full text-xs font-semibold mt-1 border ${priorityColors[t.priority] || priorityColors.medium}">
                                ${t.priority.toUpperCase()} PRIORITY
                            </span>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div><p class="text-xs text-slate-400 font-semibold">Age</p><p class="text-sm text-slate-800">${t.age} yrs</p></div>
                        <div><p class="text-xs text-slate-400 font-semibold">Gender</p><p class="text-sm text-slate-800">${t.gender}</p></div>
                        <div><p class="text-xs text-slate-400 font-semibold">Wait Time</p><p class="text-sm text-slate-800">${t.wait_time}</p></div>
                        <div><p class="text-xs text-slate-400 font-semibold">Status</p><p class="text-sm"><span class="px-2 py-0.5 rounded-full text-xs font-semibold ${statusColors[t.status] || statusColors.waiting}">${t.status.replace('_', ' ').toUpperCase()}</span></p></div>
                    </div>
                    <div class="bg-slate-50 rounded-xl p-4 border border-slate-200">
                        <h5 class="text-sm font-bold text-slate-700 mb-2">Vital Signs</h5>
                        <div class="grid grid-cols-2 sm:grid-cols-4 gap-3">
                            <div><p class="text-[10px] text-slate-400">BP</p><p class="text-sm font-semibold text-slate-800">${t.vital_signs.blood_pressure}</p></div>
                            <div><p class="text-[10px] text-slate-400">Heart Rate</p><p class="text-sm font-semibold text-slate-800">${t.vital_signs.heart_rate} bpm</p></div>
                            <div><p class="text-[10px] text-slate-400">Temperature</p><p class="text-sm font-semibold text-slate-800">${t.vital_signs.temperature}°C</p></div>
                            <div><p class="text-[10px] text-slate-400">O2 Saturation</p><p class="text-sm font-semibold text-slate-800">${t.vital_signs.oxygen_saturation}%</p></div>
                            <div><p class="text-[10px] text-slate-400">Respiratory Rate</p><p class="text-sm font-semibold text-slate-800">${t.vital_signs.respiratory_rate}</p></div>
                            <div><p class="text-[10px] text-slate-400">Weight</p><p class="text-sm font-semibold text-slate-800">${t.vital_signs.weight} kg</p></div>
                            <div><p class="text-[10px] text-slate-400">Height</p><p class="text-sm font-semibold text-slate-800">${t.vital_signs.height} cm</p></div>
                        </div>
                    </div>
                    <div class="bg-brand-light/40 rounded-xl p-4 border border-brand-border">
                        <h5 class="text-sm font-bold text-slate-700 mb-2">Symptoms</h5>
                        <div class="flex flex-wrap gap-2">${symptomsHtml}</div>
                    </div>
                    <div class="bg-slate-50 rounded-xl p-4 border border-slate-200">
                        <h5 class="text-sm font-bold text-slate-700 mb-2">Chief Complaint</h5>
                        <p class="text-sm text-slate-800">${t.chief_complaint}</p>
                    </div>
                    <div class="flex justify-end gap-2 pt-2 border-t border-slate-200">
                        <button onclick="closeModal('viewTriageModal')" class="px-4 py-2 bg-white border border-slate-200 text-slate-600 rounded-lg hover:bg-slate-50 transition text-sm font-semibold">Close</button>
                        <button onclick="closeModal('viewTriageModal'); editTriage(${t.id})" class="px-4 py-2 bg-brand-dark text-white rounded-lg hover:bg-brand-medium transition text-sm font-semibold"><i class="fa-solid fa-pen mr-1.5"></i> Edit</button>
                    </div>
                </div>
            `;
        }, 300);
    }

    // ============================================================
    // EDIT TRIAGE
    // ============================================================
    function editTriage(id) {
        showToast('Edit triage ID: ' + id + ' (Edit modal coming soon)', 'info');
    }

    // ============================================================
    // COMPLETE TRIAGE
    // ============================================================
    function completeTriage(id) {
        if (confirm('Mark this patient as complete and send to doctor?')) {
            const t = TRIAGE_DATA[id];
            if (t) {
                t.status = 'sent_to_doctor';
                t.queue_status = 'completed';
                showToast(t.patient_name + ' sent to doctor successfully!', 'success');
                // Update UI
                const rows = document.querySelectorAll('.triage-row');
                rows.forEach(row => {
                    const patientName = row.querySelector('.font-semibold.text-slate-800.text-sm')?.textContent;
                    if (patientName === t.patient_name) {
                        const statusBadge = row.querySelector('.px-2.py-1.rounded-full');
                        statusBadge.className = 'px-2 py-1 rounded-full text-xs font-semibold bg-emerald-100 text-emerald-700';
                        statusBadge.textContent = 'Sent to Doctor';
                    }
                });
            }
        }
    }

    // ============================================================
    // ADD TRIAGE
    // ============================================================
    function saveTriage(event) {
        event.preventDefault();
        showToast('Patient added to triage queue successfully!', 'success');
        closeModal('addTriageModal');
    }

    // ============================================================
    // CALL NEXT PATIENT
    // ============================================================
    function callNextPatient() {
        showToast('📢 Calling next patient: #' + (<?php echo $triageQueue[0]['queue_number'] ?? '1'; ?>), 'info');
    }

    // ============================================================
    // SYMPTOM CHECKER
    // ============================================================
    function toggleSymptom(btn) {
        btn.classList.toggle('border-brand-medium');
        btn.classList.toggle('bg-brand-light/40');
        const symptom = btn.textContent.trim();
        
        if (btn.classList.contains('border-brand-medium')) {
            if (!selectedSymptoms.includes(symptom)) {
                selectedSymptoms.push(symptom);
            }
        } else {
            selectedSymptoms = selectedSymptoms.filter(s => s !== symptom);
        }
        
        updateSymptomDisplay();
    }

    function updateSymptomDisplay() {
        const display = document.getElementById('selectedSymptomsDisplay');
        if (selectedSymptoms.length === 0) {
            display.innerHTML = '<span class="text-xs text-slate-400">No symptoms selected</span>';
            document.getElementById('symptomResult').classList.add('hidden');
        } else {
            display.innerHTML = selectedSymptoms.map(s => 
                `<span class="px-2 py-1 bg-brand-light border border-brand-border rounded-full text-xs flex items-center gap-1">
                    ${s}
                    <button onclick="removeSymptom('${s}')" class="text-slate-400 hover:text-rose-500">✕</button>
                </span>`
            ).join('');
        }
    }

    function removeSymptom(symptom) {
        selectedSymptoms = selectedSymptoms.filter(s => s !== symptom);
        document.querySelectorAll('#symptomCheckerList button').forEach(btn => {
            if (btn.textContent.trim() === symptom) {
                btn.classList.remove('border-brand-medium', 'bg-brand-light/40');
            }
        });
        updateSymptomDisplay();
    }

    function analyzeSymptoms() {
        if (selectedSymptoms.length === 0) {
            showToast('Please select at least one symptom', 'warning');
            return;
        }
        
        const result = document.getElementById('symptomResult');
        result.classList.remove('hidden');
        result.scrollIntoView({ behavior: 'smooth', block: 'center' });
        
        // Show different results based on symptoms
        if (selectedSymptoms.some(s => ['Chest pain', 'Shortness of breath'].includes(s))) {
            document.querySelector('#symptomResult .bg-amber-50').innerHTML = `
                <h4 class="text-sm font-bold text-rose-700 mb-2">⚠️ URGENT - Possible Cardiac Issues</h4>
                <div class="space-y-2">
                    <div class="flex items-center gap-2 p-2 bg-white rounded-lg border border-rose-200">
                        <span class="text-rose-500">•</span>
                        <span class="text-sm text-slate-700">Cardiac Event / Heart Attack</span>
                        <span class="ml-auto text-xs text-rose-600 font-semibold">85% match</span>
                    </div>
                    <div class="flex items-center gap-2 p-2 bg-white rounded-lg border border-rose-200">
                        <span class="text-rose-500">•</span>
                        <span class="text-sm text-slate-700">Angina</span>
                        <span class="ml-auto text-xs text-rose-600 font-semibold">70% match</span>
                    </div>
                    <div class="flex items-center gap-2 p-2 bg-white rounded-lg border border-rose-200">
                        <span class="text-rose-500">•</span>
                        <span class="text-sm text-slate-700">Pulmonary Embolism</span>
                        <span class="ml-auto text-xs text-rose-600 font-semibold">55% match</span>
                    </div>
                </div>
                <p class="text-xs text-rose-600 mt-3 font-bold">
                    <i class="fa-solid fa-triangle-exclamation mr-1"></i>
                    URGENT: Seek immediate medical attention!
                </p>
            `;
        } else if (selectedSymptoms.some(s => ['Fever', 'Cough', 'Body aches'].includes(s))) {
            document.querySelector('#symptomResult .bg-amber-50').innerHTML = `
                <h4 class="text-sm font-bold text-amber-700 mb-2">⚠️ Possible Respiratory Infection</h4>
                <div class="space-y-2">
                    <div class="flex items-center gap-2 p-2 bg-white rounded-lg border border-amber-100">
                        <span class="text-amber-500">•</span>
                        <span class="text-sm text-slate-700">Influenza (Flu)</span>
                        <span class="ml-auto text-xs text-amber-600 font-semibold">75% match</span>
                    </div>
                    <div class="flex items-center gap-2 p-2 bg-white rounded-lg border border-amber-100">
                        <span class="text-amber-500">•</span>
                        <span class="text-sm text-slate-700">COVID-19</span>
                        <span class="ml-auto text-xs text-amber-600 font-semibold">60% match</span>
                    </div>
                    <div class="flex items-center gap-2 p-2 bg-white rounded-lg border border-amber-100">
                        <span class="text-amber-500">•</span>
                        <span class="text-sm text-slate-700">Pneumonia</span>
                        <span class="ml-auto text-xs text-amber-600 font-semibold">45% match</span>
                    </div>
                </div>
                <p class="text-xs text-amber-600 mt-3">
                    <i class="fa-solid fa-info-circle mr-1"></i>
                    Please consult a doctor for proper diagnosis.
                </p>
            `;
        } else {
            document.querySelector('#symptomResult .bg-amber-50').innerHTML = `
                <h4 class="text-sm font-bold text-slate-700 mb-2">📋 Possible Conditions</h4>
                <div class="space-y-2">
                    <div class="flex items-center gap-2 p-2 bg-white rounded-lg border border-slate-200">
                        <span class="text-slate-500">•</span>
                        <span class="text-sm text-slate-700">Stress / Anxiety</span>
                        <span class="ml-auto text-xs text-slate-500 font-semibold">50% match</span>
                    </div>
                    <div class="flex items-center gap-2 p-2 bg-white rounded-lg border border-slate-200">
                        <span class="text-slate-500">•</span>
                        <span class="text-sm text-slate-700">Migraine</span>
                        <span class="ml-auto text-xs text-slate-500 font-semibold">40% match</span>
                    </div>
                    <div class="flex items-center gap-2 p-2 bg-white rounded-lg border border-slate-200">
                        <span class="text-slate-500">•</span>
                        <span class="text-sm text-slate-700">Allergies</span>
                        <span class="ml-auto text-xs text-slate-500 font-semibold">35% match</span>
                    </div>
                </div>
                <p class="text-xs text-slate-500 mt-3">
                    <i class="fa-solid fa-info-circle mr-1"></i>
                    Please consult a doctor for proper diagnosis.
                </p>
            `;
        }
    }

    function resetSymptomChecker() {
        selectedSymptoms = [];
        document.querySelectorAll('#symptomCheckerList button').forEach(btn => {
            btn.classList.remove('border-brand-medium', 'bg-brand-light/40');
        });
        updateSymptomDisplay();
        document.getElementById('symptomResult').classList.add('hidden');
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
    document.getElementById('searchTriage').addEventListener('input', filterTriage);
    document.getElementById('filterPriority').addEventListener('change', filterTriage);
    document.getElementById('filterStatus').addEventListener('change', filterTriage);

    function filterTriage() {
        const search = document.getElementById('searchTriage').value.toLowerCase();
        const priority = document.getElementById('filterPriority').value;
        const status = document.getElementById('filterStatus').value;
        let visibleCount = 0;

        document.querySelectorAll('.triage-row').forEach(row => {
            const patient = row.dataset.patient;
            const rowPriority = row.dataset.priority;
            const rowStatus = row.dataset.status;

            const matchesSearch = patient.includes(search);
            const matchesPriority = !priority || rowPriority === priority;
            const matchesStatus = !status || rowStatus === status;
            const isVisible = matchesSearch && matchesPriority && matchesStatus;

            row.style.display = isVisible ? '' : 'none';
            if (isVisible) visibleCount++;
        });

        document.getElementById('emptyState').style.display = visibleCount === 0 ? 'flex' : 'none';
    }

    function resetFilters() {
        document.getElementById('searchTriage').value = '';
        document.getElementById('filterPriority').value = '';
        document.getElementById('filterStatus').value = '';
        document.querySelectorAll('.triage-row').forEach(row => row.style.display = '');
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