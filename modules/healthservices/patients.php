<?php
// ============================================================
// COLOR PALETTE USED ON THIS PAGE
// ============================================================
// This page reuses the same brand-* Tailwind classes as your
// dashboard (modules/index.php). If brand-dark / brand-medium /
// brand-light / brand-border are already defined in
// tailwind.config.js, this page will automatically match.
//
// If they are NOT yet defined, add this to tailwind.config.js
// theme.extend.colors (deep teal — fits a health/sanitation
// department and stays distinct from the generic blue/green
// admin-panel look):
//
//   'brand-dark':   '#0B4F4A',
//   'brand-medium': '#14807A',
//   'brand-light':  '#E6F5F3',
//   'brand-border': '#B8E0DC',
//
// Swap these four values only — every class below (bg-brand-dark,
// text-brand-medium, etc.) will pick up the change automatically.
// ============================================================

// ============================================================
// 1. PHP BACKEND - Fetch Data
// ============================================================
require_once '../../includes/header.php';
require_once '../../includes/sidebar.php';


// Sample Patient Data (In production, this comes from database)
$patients = [
    [
        'id' => 1,
        'patient_id' => 'P-1001',
        'first_name' => 'Maria',
        'last_name' => 'Santos',
        'middle_name' => 'Cruz',
        'gender' => 'Female',
        'birth_date' => '1985-03-15',
        'age' => 41,
        'blood_type' => 'O+',
        'contact' => '09123456789',
        'email' => 'maria.santos@email.com',
        'address' => '123 Rizal St., Barangay San Jose',
        'barangay' => 'Barangay San Jose',
        'emergency_contact' => 'Juan Santos - 09176543210',
        'registration_date' => '2024-01-15',
        'status' => 'active',
        'last_visit' => '2026-07-10',
        'allergies' => 'Penicillin',
        'conditions' => 'Hypertension'
    ],
    [
        'id' => 2,
        'patient_id' => 'P-1002',
        'first_name' => 'Juan',
        'last_name' => 'Dela Cruz',
        'middle_name' => 'Garcia',
        'gender' => 'Male',
        'birth_date' => '1990-08-20',
        'age' => 35,
        'blood_type' => 'A+',
        'contact' => '09123456788',
        'email' => 'juan.delacruz@email.com',
        'address' => '456 Mabini Ave., Barangay Poblacion',
        'barangay' => 'Barangay Poblacion',
        'emergency_contact' => 'Ana Dela Cruz - 09176543211',
        'registration_date' => '2024-02-10',
        'status' => 'active',
        'last_visit' => '2026-07-12',
        'allergies' => 'None',
        'conditions' => 'Diabetes Type 2'
    ],
    [
        'id' => 3,
        'patient_id' => 'P-1003',
        'first_name' => 'Rosa',
        'last_name' => 'Mendoza',
        'middle_name' => 'Lopez',
        'gender' => 'Female',
        'birth_date' => '1998-06-01',
        'age' => 28,
        'blood_type' => 'B+',
        'contact' => '09123456787',
        'email' => 'rosa.mendoza@email.com',
        'address' => '789 Bonifacio Rd., Barangay Riverside',
        'barangay' => 'Barangay Riverside',
        'emergency_contact' => 'Carlos Mendoza - 09176543212',
        'registration_date' => '2024-03-05',
        'status' => 'active',
        'last_visit' => '2026-07-08',
        'allergies' => 'Sulfa',
        'conditions' => 'Asthma'
    ],
    [
        'id' => 4,
        'patient_id' => 'P-1004',
        'first_name' => 'Carlos',
        'last_name' => 'Lim',
        'middle_name' => 'Tan',
        'gender' => 'Male',
        'birth_date' => '1978-11-12',
        'age' => 47,
        'blood_type' => 'AB+',
        'contact' => '09123456786',
        'email' => 'carlos.lim@email.com',
        'address' => '101 Luna St., Barangay San Roque',
        'barangay' => 'Barangay San Roque',
        'emergency_contact' => 'Elena Lim - 09176543213',
        'registration_date' => '2024-04-20',
        'status' => 'active',
        'last_visit' => '2026-07-05',
        'allergies' => 'None',
        'conditions' => 'Heart Disease'
    ],
    [
        'id' => 5,
        'patient_id' => 'P-1005',
        'first_name' => 'Elena',
        'last_name' => 'Torres',
        'middle_name' => 'Rivera',
        'gender' => 'Female',
        'birth_date' => '1995-09-25',
        'age' => 30,
        'blood_type' => 'O-',
        'contact' => '09123456785',
        'email' => 'elena.torres@email.com',
        'address' => '202 Santos St., Barangay Sta. Cruz',
        'barangay' => 'Barangay Sta. Cruz',
        'emergency_contact' => 'Ramon Torres - 09176543214',
        'registration_date' => '2024-05-12',
        'status' => 'active',
        'last_visit' => '2026-07-15',
        'allergies' => 'Peanuts',
        'conditions' => 'None'
    ],
    [
        'id' => 6,
        'patient_id' => 'P-1006',
        'first_name' => 'Miguel',
        'last_name' => 'Reyes',
        'middle_name' => 'Dizon',
        'gender' => 'Male',
        'birth_date' => '1982-02-28',
        'age' => 44,
        'blood_type' => 'A-',
        'contact' => '09123456784',
        'email' => 'miguel.reyes@email.com',
        'address' => '303 Rizal St., Barangay San Jose',
        'barangay' => 'Barangay San Jose',
        'emergency_contact' => 'Liza Reyes - 09176543215',
        'registration_date' => '2024-06-01',
        'status' => 'inactive',
        'last_visit' => '2026-06-28',
        'allergies' => 'None',
        'conditions' => 'Hypertension'
    ],
    [
        'id' => 7,
        'patient_id' => 'P-1007',
        'first_name' => 'Ana',
        'last_name' => 'Cruz',
        'middle_name' => 'Gomez',
        'gender' => 'Female',
        'birth_date' => '2000-12-01',
        'age' => 25,
        'blood_type' => 'B-',
        'contact' => '09123456783',
        'email' => 'ana.cruz@email.com',
        'address' => '404 Mabini Ave., Barangay Poblacion',
        'barangay' => 'Barangay Poblacion',
        'emergency_contact' => 'Jose Cruz - 09176543216',
        'registration_date' => '2024-07-15',
        'status' => 'active',
        'last_visit' => '2026-07-14',
        'allergies' => 'None',
        'conditions' => 'None'
    ],
    [
        'id' => 8,
        'patient_id' => 'P-1008',
        'first_name' => 'Ramon',
        'last_name' => 'Garcia',
        'middle_name' => 'Santos',
        'gender' => 'Male',
        'birth_date' => '1975-04-18',
        'age' => 51,
        'blood_type' => 'O+',
        'contact' => '09123456782',
        'email' => 'ramon.garcia@email.com',
        'address' => '505 Bonifacio Rd., Barangay Riverside',
        'barangay' => 'Barangay Riverside',
        'emergency_contact' => 'Mila Garcia - 09176543217',
        'registration_date' => '2024-08-22',
        'status' => 'active',
        'last_visit' => '2026-07-01',
        'allergies' => 'Aspirin',
        'conditions' => 'Arthritis'
    ]
];

// Pagination
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$limit = 5;
$offset = ($page - 1) * $limit;
$totalPatients = count($patients);
$totalPages = ceil($totalPatients / $limit);
$paginatedPatients = array_slice($patients, $offset, $limit);

$title = 'Patient Management';

?>

<!-- ============================================================ -->
<!-- 2. HTML + PHP EMBEDDED + Tailwind CSS                       -->
<!-- ============================================================ -->

<div class="flex-1 px-6 pt-[26px] pb-20 mb-10 flex flex-col min-h-0 overflow-hidden">

    <!-- Page Header -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6">
        <div>
            <h2 class="text-2xl font-black text-slate-900 tracking-tight">Patient Management</h2>
            <p class="text-sm text-slate-500 mt-0.5">Manage all patient records and information</p>
        </div>
        <div class="flex gap-3">
            <div class="flex rounded-lg border border-slate-200 overflow-hidden">
                <button onclick="openModal('importModal')"
                        class="px-4 py-2 bg-white text-slate-700 hover:bg-slate-50 transition-colors text-sm font-semibold flex items-center gap-2 border-r border-slate-200">
                    <i class="fa-solid fa-file-import text-xs"></i> Import
                </button>
                <button onclick="openModal('exportModal'); prepExportModal();"
                        class="px-4 py-2 bg-white text-slate-700 hover:bg-slate-50 transition-colors text-sm font-semibold flex items-center gap-2">
                    <i class="fa-solid fa-file-export text-xs"></i> Export
                </button>
            </div>
            <button onclick="openModal('addPatientModal'); prepAddPatientModal();"
                    class="px-4 py-2 bg-brand-dark text-white rounded-lg hover:bg-brand-medium transition-colors text-sm font-semibold flex items-center gap-2 shadow-sm">
                <i class="fa-solid fa-plus text-xs"></i> Add Patient
            </button>
        </div>
    </div>

    <?php
    // ------------------------------------------------------------
    // Derived stats for the extra cards below.
    // Critical Patients is computed from real data (anyone flagged
    // with a condition on the critical list). Today's Appointments,
    // Pending Lab Results, and Follow-ups Due are placeholders —
    // this sample dataset has no appointments/lab-results table yet,
    // so wire these to real queries once those exist.
    // ------------------------------------------------------------
    $criticalConditions = ['Heart Disease'];
    $criticalCount = count(array_filter($patients, fn($p) => in_array($p['conditions'], $criticalConditions)));

    $todaysAppointments = 3;   // TODO: COUNT(*) FROM appointments WHERE date = CURDATE()
    $pendingLabResults  = 2;   // TODO: COUNT(*) FROM lab_results WHERE status = 'pending'
    $followUpsDue       = 4;   // TODO: COUNT(*) FROM appointments WHERE type = 'follow_up' AND date <= CURDATE()

    // Age group distribution
    $ageGroups = ['0-17' => 0, '18-35' => 0, '36-50' => 0, '51-65' => 0, '66+' => 0];
    foreach ($patients as $p) {
        $a = $p['age'];
        if ($a <= 17) $ageGroups['0-17']++;
        elseif ($a <= 35) $ageGroups['18-35']++;
        elseif ($a <= 50) $ageGroups['36-50']++;
        elseif ($a <= 65) $ageGroups['51-65']++;
        else $ageGroups['66+']++;
    }
    $maxAgeGroup = max(1, max($ageGroups));

    // Barangay distribution
    $barangayCounts = [];
    foreach ($patients as $p) {
        $barangayCounts[$p['barangay']] = ($barangayCounts[$p['barangay']] ?? 0) + 1;
    }
    arsort($barangayCounts);
    $maxBarangay = max(1, max($barangayCounts));
    ?>

    <!-- ============================================================ -->
<!-- MODERN KPI CARDS - Updated to match design               -->
<!-- ============================================================ -->
<div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-6">
    <!-- Card 1: Total Patients -->
    <div class="relative overflow-hidden bg-white rounded-2xl shadow-sm border border-slate-200 p-5 hover:shadow-lg transition group">
        <div class="absolute -top-12 -right-12 w-24 h-24 bg-blue-100 rounded-full opacity-50 group-hover:scale-110 transition"></div>
        <div class="relative">
            <div class="flex items-center gap-3">
                <div class="w-11 h-11 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl flex items-center justify-center text-white shadow-lg shadow-blue-200">
                    <i class="fa-solid fa-users text-lg"></i>
                </div>
                <div>
                    <p class="text-2xl font-black text-slate-900" id="statTotal"><?php echo $totalPatients; ?></p>
                    <p class="text-xs font-medium text-slate-500">Total Patients</p>
                </div>
            </div>
            <div class="mt-3 flex items-center gap-2">
                <span class="px-2 py-0.5 bg-blue-100 text-blue-700 rounded-full text-[10px] font-bold">👥 All patients</span>
                <span class="text-[10px] text-slate-400"><?php echo count(array_filter($patients, fn($p) => $p['status'] === 'active')); ?> active</span>
            </div>
        </div>
    </div>

    <!-- Card 2: Active -->
    <div class="relative overflow-hidden bg-white rounded-2xl shadow-sm border border-slate-200 p-5 hover:shadow-lg transition group">
        <div class="absolute -top-12 -right-12 w-24 h-24 bg-emerald-100 rounded-full opacity-50 group-hover:scale-110 transition"></div>
        <div class="relative">
            <div class="flex items-center gap-3">
                <div class="w-11 h-11 bg-gradient-to-br from-emerald-500 to-emerald-600 rounded-xl flex items-center justify-center text-white shadow-lg shadow-emerald-200">
                    <i class="fa-solid fa-user-check text-lg"></i>
                </div>
                <div>
                    <p class="text-2xl font-black text-emerald-600" id="statActive"><?php echo count(array_filter($patients, fn($p) => $p['status'] === 'active')); ?></p>
                    <p class="text-xs font-medium text-slate-500">Active</p>
                </div>
            </div>
            <div class="mt-3 flex items-center gap-2">
                <span class="px-2 py-0.5 bg-emerald-100 text-emerald-700 rounded-full text-[10px] font-bold">✅ Verified</span>
                <span class="text-[10px] text-slate-400">Currently enrolled</span>
            </div>
        </div>
    </div>

    <!-- Card 3: Today's Appointments -->
    <div class="relative overflow-hidden bg-white rounded-2xl shadow-sm border border-slate-200 p-5 hover:shadow-lg transition group">
        <div class="absolute -top-12 -right-12 w-24 h-24 bg-sky-100 rounded-full opacity-50 group-hover:scale-110 transition"></div>
        <div class="relative">
            <div class="flex items-center gap-3">
                <div class="w-11 h-11 bg-gradient-to-br from-sky-500 to-sky-600 rounded-xl flex items-center justify-center text-white shadow-lg shadow-sky-200">
                    <i class="fa-solid fa-calendar-check text-lg"></i>
                </div>
                <div>
                    <p class="text-2xl font-black text-sky-600"><?php echo $todaysAppointments; ?></p>
                    <p class="text-xs font-medium text-slate-500">Today's Appointments</p>
                </div>
            </div>
            <div class="mt-3 flex items-center gap-2">
                <span class="px-2 py-0.5 bg-sky-100 text-sky-700 rounded-full text-[10px] font-bold">📅 Today</span>
                <span class="text-[10px] text-slate-400"><?php echo date('F d, Y'); ?></span>
            </div>
        </div>
    </div>

    <!-- Card 4: Critical Patients -->
    <div class="relative overflow-hidden bg-white rounded-2xl shadow-sm border border-slate-200 p-5 hover:shadow-lg transition group">
        <div class="absolute -top-12 -right-12 w-24 h-24 bg-rose-100 rounded-full opacity-50 group-hover:scale-110 transition"></div>
        <div class="relative">
            <div class="flex items-center gap-3">
                <div class="w-11 h-11 bg-gradient-to-br from-rose-500 to-rose-600 rounded-xl flex items-center justify-center text-white shadow-lg shadow-rose-200">
                    <i class="fa-solid fa-heart-pulse text-lg"></i>
                </div>
                <div>
                    <p class="text-2xl font-black text-rose-600"><?php echo $criticalCount; ?></p>
                    <p class="text-xs font-medium text-slate-500">Critical Patients</p>
                </div>
            </div>
            <div class="mt-3 flex items-center gap-2">
                <span class="px-2 py-0.5 bg-rose-100 text-rose-700 rounded-full text-[10px] font-bold">🚨 Urgent</span>
                <span class="text-[10px] text-slate-400">Needs attention</span>
            </div>
        </div>
    </div>
</div>

    <!-- Distribution Panels -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 mb-6">
        <div class="bg-white rounded-xl shadow-xs p-5 border border-slate-200">
            <h3 class="text-sm font-bold text-slate-800 mb-4 flex items-center gap-2">
                <i class="fa-solid fa-chart-simple text-brand-medium"></i> Age Group Distribution
            </h3>
            <div class="space-y-3">
                <?php foreach ($ageGroups as $label => $count): ?>
                <div>
                    <div class="flex justify-between text-xs mb-1">
                        <span class="text-slate-600 font-medium"><?php echo $label; ?></span>
                        <span class="text-slate-400"><?php echo $count; ?> patient<?php echo $count === 1 ? '' : 's'; ?></span>
                    </div>
                    <div class="w-full h-2 bg-slate-100 rounded-full overflow-hidden">
                        <div class="h-full bg-brand-medium rounded-full" style="width: <?php echo ($count / $maxAgeGroup) * 100; ?>%"></div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-xs p-5 border border-slate-200">
            <h3 class="text-sm font-bold text-slate-800 mb-4 flex items-center gap-2">
                <i class="fa-solid fa-map-location-dot text-brand-medium"></i> Barangay Distribution
            </h3>
            <div class="space-y-3">
                <?php foreach ($barangayCounts as $barangay => $count): ?>
                <div>
                    <div class="flex justify-between text-xs mb-1">
                        <span class="text-slate-600 font-medium"><?php echo str_replace('Barangay ', '', $barangay); ?></span>
                        <span class="text-slate-400"><?php echo $count; ?> patient<?php echo $count === 1 ? '' : 's'; ?></span>
                    </div>
                    <div class="w-full h-2 bg-slate-100 rounded-full overflow-hidden">
                        <div class="h-full bg-brand-dark rounded-full" style="width: <?php echo ($count / $maxBarangay) * 100; ?>%"></div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <!-- Search & Filter -->
    <div class="bg-white rounded-xl shadow-xs p-4 border border-slate-200 mb-6">
        <div class="flex flex-col sm:flex-row gap-3">
            <div class="flex-1 relative">
                <i class="fa-solid fa-search absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-sm"></i>
                <input type="text"
                       id="searchPatient"
                       placeholder="Search by name, ID, or barangay..."
                       class="w-full pl-9 pr-4 py-2 border border-slate-200 rounded-lg focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none text-sm transition">
            </div>
            <div class="flex gap-2 flex-wrap">
                <select id="filterStatus" class="px-4 py-2 border border-slate-200 rounded-lg focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none text-sm bg-white">
                    <option value="">All Status</option>
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                </select>

                <!-- Last-visit date filter (replaces the barangay dropdown) -->
                <select id="filterDateType" onchange="onDateFilterTypeChange()"
                        class="px-4 py-2 border border-slate-200 rounded-lg focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none text-sm bg-white">
                    <option value="">Last Visit: Any time</option>
                    <option value="today">Today</option>
                    <option value="day">Specific day</option>
                    <option value="month">Specific month</option>
                    <option value="year">Specific year</option>
                </select>
                <input type="date" id="filterDateValue"
                       class="hidden px-3 py-2 border border-slate-200 rounded-lg focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none text-sm bg-white">

                <button onclick="resetFilters()" title="Reset filters"
                        class="px-3 py-2 bg-slate-100 text-slate-500 rounded-lg hover:bg-slate-200 hover:text-slate-700 transition-colors text-sm">
                    <i class="fa-solid fa-rotate-right"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- Patient Table -->
    <div class="bg-white rounded-xl shadow-xs border border-slate-200 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead class="bg-slate-50 border-b border-slate-200">
                    <tr>
                        <th class="px-4 py-3 text-left text-[10px] font-bold text-slate-500 uppercase tracking-wider">Patient ID</th>
                        <th class="px-4 py-3 text-left text-[10px] font-bold text-slate-500 uppercase tracking-wider">Name</th>
                        <th class="px-4 py-3 text-left text-[10px] font-bold text-slate-500 uppercase tracking-wider">Gender</th>
                        <th class="px-4 py-3 text-left text-[10px] font-bold text-slate-500 uppercase tracking-wider">Age</th>
                        <th class="px-4 py-3 text-left text-[10px] font-bold text-slate-500 uppercase tracking-wider">Blood Type</th>
                        <th class="px-4 py-3 text-left text-[10px] font-bold text-slate-500 uppercase tracking-wider">Barangay</th>
                        <th class="px-4 py-3 text-left text-[10px] font-bold text-slate-500 uppercase tracking-wider">Status</th>
                        <th class="px-4 py-3 text-left text-[10px] font-bold text-slate-500 uppercase tracking-wider">Last Visit</th>
                        <th class="px-4 py-3 text-center text-[10px] font-bold text-slate-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody id="patientTableBody">
                    <?php foreach ($paginatedPatients as $patient): ?>
                    <tr class="border-b border-slate-100 hover:bg-brand-light/40 transition-colors patient-row"
                        data-row-id="<?php echo $patient['id']; ?>"
                        data-name="<?php echo strtolower($patient['first_name'] . ' ' . $patient['last_name']); ?>"
                        data-id="<?php echo $patient['patient_id']; ?>"
                        data-barangay="<?php echo $patient['barangay']; ?>"
                        data-status="<?php echo $patient['status']; ?>"
                        data-last-visit="<?php echo $patient['last_visit']; ?>">
                        <td class="px-4 py-3 font-mono text-xs text-brand-dark font-semibold"><?php echo $patient['patient_id']; ?></td>
                        <td class="px-4 py-3">
                            <div class="flex items-center gap-2.5">
                                <div class="cell-avatar w-8 h-8 rounded-full bg-brand-light border border-brand-border flex items-center justify-center text-brand-dark font-bold text-xs flex-shrink-0">
                                    <?php echo strtoupper(substr($patient['first_name'], 0, 1) . substr($patient['last_name'], 0, 1)); ?>
                                </div>
                                <div>
                                    <p class="cell-name font-semibold text-slate-800"><?php echo $patient['first_name'] . ' ' . $patient['last_name']; ?></p>
                                    <p class="cell-email text-xs text-slate-400"><?php echo $patient['email']; ?></p>
                                </div>
                            </div>
                        </td>
                        <td class="px-4 py-3">
                            <span class="cell-gender text-slate-600 text-xs">
                                <i class="fa-solid <?php echo $patient['gender'] === 'Male' ? 'fa-mars text-sky-500' : 'fa-venus text-pink-500'; ?>"></i>
                                <?php echo $patient['gender']; ?>
                            </span>
                        </td>
                        <td class="px-4 py-3 text-slate-600 cell-age"><?php echo $patient['age']; ?></td>
                        <td class="px-4 py-3">
                            <span class="cell-blood px-2 py-1 bg-rose-50 text-rose-600 rounded text-xs font-semibold"><?php echo $patient['blood_type']; ?></span>
                        </td>
                        <td class="px-4 py-3 text-slate-600 cell-barangay"><?php echo $patient['barangay']; ?></td>
                        <td class="px-4 py-3">
                            <span class="cell-status px-2 py-1 rounded-full text-xs font-semibold <?php echo $patient['status'] === 'active' ? 'bg-emerald-100 text-emerald-700' : 'bg-slate-100 text-slate-500'; ?>">
                                <?php echo ucfirst($patient['status']); ?>
                            </span>
                        </td>
                        <td class="px-4 py-3 text-slate-500 text-xs cell-visit"><?php echo date('M d, Y', strtotime($patient['last_visit'])); ?></td>
                        <td class="px-4 py-3">
                            <div class="flex items-center justify-center gap-1">
                                <button onclick="viewPatient(<?php echo $patient['id']; ?>)"
                                        class="p-1.5 text-brand-medium hover:bg-brand-light rounded-lg transition" title="View">
                                    <i class="fa-solid fa-eye text-sm"></i>
                                </button>
                                <button onclick="editPatient(<?php echo $patient['id']; ?>)"
                                        class="p-1.5 text-slate-500 hover:bg-slate-100 hover:text-slate-700 rounded-lg transition" title="Edit">
                                    <i class="fa-solid fa-pen text-sm"></i>
                                </button>
                                <button onclick="deletePatient(<?php echo $patient['id']; ?>)"
                                        class="p-1.5 text-rose-500 hover:bg-rose-50 rounded-lg transition" title="Delete">
                                    <i class="fa-solid fa-trash-can text-sm"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <!-- Empty state (shown by JS when filters return nothing) -->
        <div id="emptyState" class="hidden flex-col items-center justify-center py-14 text-center">
            <div class="w-12 h-12 rounded-full bg-slate-100 flex items-center justify-center mb-3">
                <i class="fa-solid fa-user-slash text-slate-400"></i>
            </div>
            <p class="text-sm font-semibold text-slate-600">No patients match your filters</p>
            <p class="text-xs text-slate-400 mt-1">Try adjusting your search or clearing filters</p>
            <button onclick="resetFilters()" class="mt-3 text-xs font-semibold text-brand-medium hover:text-brand-dark">Clear all filters</button>
        </div>

        <!-- Pagination -->
        <div class="px-4 py-3 border-t border-slate-200 flex flex-col sm:flex-row justify-between items-center gap-3 bg-slate-50">
            <p class="text-xs text-slate-500">
                Showing <span class="font-semibold text-slate-700"><?php echo $offset + 1; ?></span> to
                <span class="font-semibold text-slate-700"><?php echo min($offset + $limit, $totalPatients); ?></span> of
                <span class="font-semibold text-slate-700"><?php echo $totalPatients; ?></span> patients
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
<!-- 3. VIEW PATIENT MODAL                                        -->
<!-- ============================================================ -->
<div id="viewPatientModal" class="hidden fixed inset-0 bg-slate-900/50 backdrop-blur-sm z-50 items-center justify-center p-4">
    <div class="bg-white rounded-2xl shadow-xl w-full max-w-2xl max-h-[90vh] overflow-y-auto">
        <div class="flex items-center justify-between px-6 py-4 border-b border-slate-200 sticky top-0 bg-white rounded-t-2xl">
            <h3 class="font-bold text-slate-900">Patient Details</h3>
            <button onclick="closeModal('viewPatientModal')" class="w-8 h-8 rounded-lg hover:bg-slate-100 flex items-center justify-center text-slate-400 hover:text-slate-600 transition">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>
        <div id="patientDetailsContent" class="p-6">
            <div class="flex items-center justify-center py-10 text-slate-400 text-sm">
                <i class="fa-solid fa-spinner fa-spin mr-2"></i> Loading patient record...
            </div>
        </div>
    </div>
</div>

<!-- ============================================================ -->
<!-- 3B. EDIT PATIENT MODAL                                       -->
<!-- ============================================================ -->
<div id="editPatientModal" class="hidden fixed inset-0 bg-slate-900/50 backdrop-blur-sm z-50 items-center justify-center p-4">
    <div class="bg-white rounded-2xl shadow-xl w-full max-w-2xl max-h-[90vh] overflow-y-auto">
        <div class="flex items-center justify-between px-6 py-4 border-b border-slate-200 sticky top-0 bg-white rounded-t-2xl">
            <h3 class="font-bold text-slate-900">Edit Patient</h3>
            <button onclick="closeModal('editPatientModal')" class="w-8 h-8 rounded-lg hover:bg-slate-100 flex items-center justify-center text-slate-400 hover:text-slate-600 transition">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>
        <form id="editPatientForm" class="p-6 space-y-5" onsubmit="saveEditedPatient(event)">
            <input type="hidden" id="edit_id">

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">First Name</label>
                    <input type="text" id="edit_first_name" required
                           class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">Last Name</label>
                    <input type="text" id="edit_last_name" required
                           class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">Email</label>
                    <input type="email" id="edit_email" required
                           class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">Contact Number</label>
                    <input type="text" id="edit_contact" required
                           class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">Gender</label>
                    <select id="edit_gender" class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm bg-white focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none">
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">Age</label>
                    <input type="number" id="edit_age" min="0" max="120" required
                           class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">Blood Type</label>
                    <select id="edit_blood_type" class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm bg-white focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none">
                        <?php foreach (['O+','O-','A+','A-','B+','B-','AB+','AB-'] as $bt): ?>
                            <option value="<?php echo $bt; ?>"><?php echo $bt; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">Status</label>
                    <select id="edit_status" class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm bg-white focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none">
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                    </select>
                </div>
                <div class="sm:col-span-2">
                    <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">Barangay</label>
                    <select id="edit_barangay" class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm bg-white focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none">
                        <option value="Barangay San Jose">Barangay San Jose</option>
                        <option value="Barangay Poblacion">Barangay Poblacion</option>
                        <option value="Barangay Riverside">Barangay Riverside</option>
                        <option value="Barangay San Roque">Barangay San Roque</option>
                        <option value="Barangay Sta. Cruz">Barangay Sta. Cruz</option>
                    </select>
                </div>
                <div class="sm:col-span-2">
                    <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">Address</label>
                    <input type="text" id="edit_address"
                           class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">Allergies</label>
                    <input type="text" id="edit_allergies"
                           class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">Conditions</label>
                    <input type="text" id="edit_conditions"
                           class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none">
                </div>
            </div>

            <div class="flex justify-end gap-2 pt-2 border-t border-slate-100">
                <button type="button" onclick="closeModal('editPatientModal')"
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
<!-- 3C. DELETE CONFIRMATION MODAL                                -->
<!-- ============================================================ -->
<div id="deletePatientModal" class="hidden fixed inset-0 bg-slate-900/50 backdrop-blur-sm z-50 items-center justify-center p-4">
    <div class="bg-white rounded-2xl shadow-xl w-full max-w-sm">
        <div class="p-6 text-center">
            <div class="w-12 h-12 rounded-full bg-rose-50 flex items-center justify-center mx-auto mb-4">
                <i class="fa-solid fa-trash-can text-rose-500"></i>
            </div>
            <h3 class="font-bold text-slate-900 mb-1">Delete this patient?</h3>
            <p class="text-sm text-slate-500" id="deletePatientName">This action cannot be undone.</p>
        </div>
        <div class="flex gap-2 px-6 pb-6">
            <button type="button" onclick="closeModal('deletePatientModal')"
                    class="flex-1 px-4 py-2 bg-white border border-slate-200 text-slate-600 rounded-lg hover:bg-slate-50 transition text-sm font-semibold">
                Cancel
            </button>
            <button type="button" onclick="confirmDeletePatient()"
                    class="flex-1 px-4 py-2 bg-rose-600 text-white rounded-lg hover:bg-rose-700 transition text-sm font-semibold">
                <i class="fa-solid fa-trash-can mr-1.5"></i> Delete
            </button>
        </div>
    </div>
</div>

<!-- Toast notification (replaces alert() for save/delete feedback) -->
<div id="toast" class="hidden fixed bottom-6 right-6 z-[60] px-4 py-3 rounded-lg shadow-lg text-sm font-semibold text-white items-center gap-2">
    <i class="fa-solid fa-circle-check"></i>
    <span id="toastMessage"></span>
</div>

<!-- ============================================================ -->
<!-- 4A. ADD PATIENT MODAL                                        -->
<!-- ============================================================ -->
<div id="addPatientModal" class="hidden fixed inset-0 bg-slate-900/50 backdrop-blur-sm z-50 items-center justify-center p-4">
    <div class="bg-white rounded-2xl shadow-xl w-full max-w-2xl max-h-[90vh] overflow-y-auto">
        <div class="flex items-center justify-between px-6 py-4 border-b border-slate-200 sticky top-0 bg-white rounded-t-2xl">
            <div>
                <h3 class="font-bold text-slate-900">Add New Patient</h3>
                <p class="text-xs text-slate-400 mt-0.5">Next ID: <span id="nextPatientIdPreview" class="font-mono font-semibold text-brand-dark"></span></p>
            </div>
            <button onclick="closeModal('addPatientModal')" class="w-8 h-8 rounded-lg hover:bg-slate-100 flex items-center justify-center text-slate-400 hover:text-slate-600 transition">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>
        <form id="addPatientForm" class="p-6 space-y-5" onsubmit="saveNewPatient(event)">
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">First Name</label>
                    <input type="text" id="add_first_name" required
                           class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">Last Name</label>
                    <input type="text" id="add_last_name" required
                           class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">Email</label>
                    <input type="email" id="add_email" required
                           class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">Contact Number</label>
                    <input type="text" id="add_contact" required placeholder="09XXXXXXXXX"
                           class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">Gender</label>
                    <select id="add_gender" class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm bg-white focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none">
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">Age</label>
                    <input type="number" id="add_age" min="0" max="120" required
                           class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">Blood Type</label>
                    <select id="add_blood_type" class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm bg-white focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none">
                        <?php foreach (['O+','O-','A+','A-','B+','B-','AB+','AB-'] as $bt): ?>
                            <option value="<?php echo $bt; ?>"><?php echo $bt; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">Status</label>
                    <select id="add_status" class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm bg-white focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none">
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                    </select>
                </div>
                <div class="sm:col-span-2">
                    <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">Barangay</label>
                    <select id="add_barangay" class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm bg-white focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none">
                        <option value="Barangay San Jose">Barangay San Jose</option>
                        <option value="Barangay Poblacion">Barangay Poblacion</option>
                        <option value="Barangay Riverside">Barangay Riverside</option>
                        <option value="Barangay San Roque">Barangay San Roque</option>
                        <option value="Barangay Sta. Cruz">Barangay Sta. Cruz</option>
                    </select>
                </div>
                <div class="sm:col-span-2">
                    <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">Address</label>
                    <input type="text" id="add_address" required
                           class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none">
                </div>
                <div class="sm:col-span-2">
                    <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">Emergency Contact</label>
                    <input type="text" id="add_emergency_contact" placeholder="Name - Phone Number"
                           class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">Allergies</label>
                    <input type="text" id="add_allergies" placeholder="None"
                           class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">Conditions</label>
                    <input type="text" id="add_conditions" placeholder="None"
                           class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none">
                </div>
            </div>

            <div class="flex justify-end gap-2 pt-2 border-t border-slate-100">
                <button type="button" onclick="closeModal('addPatientModal')"
                        class="px-4 py-2 bg-white border border-slate-200 text-slate-600 rounded-lg hover:bg-slate-50 transition text-sm font-semibold">
                    Cancel
                </button>
                <button type="submit"
                        class="px-4 py-2 bg-brand-dark text-white rounded-lg hover:bg-brand-medium transition text-sm font-semibold">
                    <i class="fa-solid fa-user-plus mr-1.5"></i> Add Patient
                </button>
            </div>
        </form>
    </div>
</div>

<!-- ============================================================ -->
<!-- 4B. IMPORT PATIENTS MODAL                                    -->
<!-- ============================================================ -->
<div id="importModal" class="hidden fixed inset-0 bg-slate-900/50 backdrop-blur-sm z-50 items-center justify-center p-4">
    <div class="bg-white rounded-2xl shadow-xl w-full max-w-lg">
        <div class="flex items-center justify-between px-6 py-4 border-b border-slate-200">
            <h3 class="font-bold text-slate-900">Import Patients</h3>
            <button onclick="closeModal('importModal')" class="w-8 h-8 rounded-lg hover:bg-slate-100 flex items-center justify-center text-slate-400 hover:text-slate-600 transition">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>

        <div class="p-6 space-y-4">
            <!-- Dropzone -->
            <div id="importDropzone"
                 class="border-2 border-dashed border-slate-200 rounded-xl p-8 text-center cursor-pointer hover:border-brand-medium hover:bg-brand-light/30 transition"
                 onclick="document.getElementById('importFileInput').click()">
                <input type="file" id="importFileInput" accept=".csv" class="hidden" onchange="handleImportFile(this.files[0])">
                <div class="w-12 h-12 rounded-full bg-brand-light border border-brand-border flex items-center justify-center mx-auto mb-3">
                    <i class="fa-solid fa-cloud-arrow-up text-brand-dark text-lg"></i>
                </div>
                <p class="text-sm font-semibold text-slate-700">Drag & drop your CSV file here</p>
                <p class="text-xs text-slate-400 mt-1">or click to browse — .csv only, max 5MB</p>
            </div>

            <!-- Selected file / preview state -->
            <div id="importFileInfo" class="hidden bg-slate-50 border border-slate-200 rounded-lg p-3 flex items-center justify-between">
                <div class="flex items-center gap-3 min-w-0">
                    <div class="w-9 h-9 rounded-lg bg-emerald-50 flex items-center justify-center flex-shrink-0">
                        <i class="fa-solid fa-file-csv text-emerald-600"></i>
                    </div>
                    <div class="min-w-0">
                        <p id="importFileName" class="text-sm font-semibold text-slate-800 truncate"></p>
                        <p id="importFileSummary" class="text-xs text-slate-400"></p>
                    </div>
                </div>
                <button onclick="clearImportFile()" class="w-7 h-7 rounded-lg hover:bg-slate-200 flex items-center justify-center text-slate-400 hover:text-slate-600 transition flex-shrink-0" title="Remove file">
                    <i class="fa-solid fa-xmark text-sm"></i>
                </button>
            </div>

            <div id="importError" class="hidden bg-rose-50 border border-rose-100 text-rose-600 text-xs rounded-lg p-3"></div>

            <!-- Expected format helper -->
            <details class="text-xs text-slate-500">
                <summary class="cursor-pointer font-semibold text-brand-medium hover:text-brand-dark select-none">Expected column format</summary>
                <p class="mt-2 leading-relaxed">
                    first_name, last_name, email, contact, gender, age, blood_type, barangay, address, status
                </p>
            </details>
        </div>

        <div class="flex justify-end gap-2 px-6 pb-6">
            <button type="button" onclick="closeModal('importModal')"
                    class="px-4 py-2 bg-white border border-slate-200 text-slate-600 rounded-lg hover:bg-slate-50 transition text-sm font-semibold">
                Cancel
            </button>
            <button type="button" id="importConfirmBtn" onclick="confirmImport()" disabled
                    class="px-4 py-2 bg-brand-dark text-white rounded-lg hover:bg-brand-medium transition text-sm font-semibold disabled:opacity-40 disabled:cursor-not-allowed disabled:hover:bg-brand-dark">
                <i class="fa-solid fa-file-import mr-1.5"></i> Import Patients
            </button>
        </div>
    </div>
</div>

<!-- ============================================================ -->
<!-- 4C. EXPORT PATIENTS MODAL                                    -->
<!-- ============================================================ -->
<div id="exportModal" class="hidden fixed inset-0 bg-slate-900/50 backdrop-blur-sm z-50 items-center justify-center p-4">
    <div class="bg-white rounded-2xl shadow-xl w-full max-w-md">
        <div class="flex items-center justify-between px-6 py-4 border-b border-slate-200">
            <h3 class="font-bold text-slate-900">Export Patients</h3>
            <button onclick="closeModal('exportModal')" class="w-8 h-8 rounded-lg hover:bg-slate-100 flex items-center justify-center text-slate-400 hover:text-slate-600 transition">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>

        <div class="p-6 space-y-5">
            <div>
                <p class="text-xs font-semibold text-slate-500 uppercase tracking-wide mb-2">Format</p>
                <div class="grid grid-cols-3 gap-2" id="exportFormatGroup">
                    <button type="button" data-format="csv" onclick="selectExportFormat('csv')"
                            class="export-format-btn px-3 py-2.5 rounded-lg border text-xs font-semibold flex flex-col items-center gap-1.5 transition">
                        <i class="fa-solid fa-file-csv text-base"></i> CSV
                    </button>
                    <button type="button" data-format="excel" onclick="selectExportFormat('excel')"
                            class="export-format-btn px-3 py-2.5 rounded-lg border text-xs font-semibold flex flex-col items-center gap-1.5 transition">
                        <i class="fa-solid fa-file-excel text-base"></i> Excel
                    </button>
                    <button type="button" data-format="pdf" onclick="selectExportFormat('pdf')"
                            class="export-format-btn px-3 py-2.5 rounded-lg border text-xs font-semibold flex flex-col items-center gap-1.5 transition">
                        <i class="fa-solid fa-file-pdf text-base"></i> PDF
                    </button>
                </div>
            </div>

            <div>
                <p class="text-xs font-semibold text-slate-500 uppercase tracking-wide mb-2">Scope</p>
                <div class="space-y-2">
                    <label class="flex items-center gap-2.5 p-2.5 rounded-lg border border-slate-200 hover:bg-slate-50 cursor-pointer has-[:checked]:border-brand-medium has-[:checked]:bg-brand-light/40">
                        <input type="radio" name="exportScope" value="all" checked class="accent-brand-dark">
                        <span class="text-sm text-slate-700">All patients <span class="text-slate-400">(<span id="exportCountAll"></span>)</span></span>
                    </label>
                    <label class="flex items-center gap-2.5 p-2.5 rounded-lg border border-slate-200 hover:bg-slate-50 cursor-pointer has-[:checked]:border-brand-medium has-[:checked]:bg-brand-light/40">
                        <input type="radio" name="exportScope" value="filtered" class="accent-brand-dark">
                        <span class="text-sm text-slate-700">Current filtered view <span class="text-slate-400">(<span id="exportCountFiltered"></span>)</span></span>
                    </label>
                </div>
            </div>
        </div>

        <div class="flex justify-end gap-2 px-6 pb-6">
            <button type="button" onclick="closeModal('exportModal')"
                    class="px-4 py-2 bg-white border border-slate-200 text-slate-600 rounded-lg hover:bg-slate-50 transition text-sm font-semibold">
                Cancel
            </button>
            <button type="button" onclick="runExport()"
                    class="px-4 py-2 bg-brand-dark text-white rounded-lg hover:bg-brand-medium transition text-sm font-semibold">
                <i class="fa-solid fa-download mr-1.5"></i> Export
            </button>
        </div>
    </div>
</div>

<style>
    .export-format-btn { border-color: #E2E8F0; color: #64748B; }
    .export-format-btn.selected { border-color: var(--tw-color-brand-medium, #14807A); background-color: rgba(20,128,122,0.08); color: #0B4F4A; }
</style>

<!-- ============================================================ -->
<!-- 5. JAVASCRIPT                                                -->
<!-- ============================================================ -->
<script>
    // Real patient data from PHP, keyed by id
    const PATIENTS = <?php echo json_encode(array_column($patients, null, 'id'), JSON_PRETTY_PRINT); ?>;

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
    // VIEW PATIENT
    // ============================================================
    function viewPatient(id) {
        openModal('viewPatientModal');
        const content = document.getElementById('patientDetailsContent');
        content.innerHTML = `
            <div class="flex items-center justify-center py-10 text-slate-400 text-sm">
                <i class="fa-solid fa-spinner fa-spin mr-2"></i> Loading patient record...
            </div>`;

        setTimeout(() => {
            const p = PATIENTS[id];
            if (!p) {
                content.innerHTML = `<p class="text-sm text-rose-500 text-center py-10">Patient not found.</p>`;
                return;
            }
            const initials = (p.first_name[0] + p.last_name[0]).toUpperCase();
            const statusBadge = p.status === 'active'
                ? '<span class="inline-block px-2 py-0.5 bg-emerald-100 text-emerald-700 rounded-full text-xs font-semibold mt-1">Active</span>'
                : '<span class="inline-block px-2 py-0.5 bg-slate-100 text-slate-500 rounded-full text-xs font-semibold mt-1">Inactive</span>';

            content.innerHTML = `
                <div class="space-y-6">
                    <div class="flex items-center gap-4 pb-4 border-b border-slate-200">
                        <div class="w-16 h-16 rounded-full bg-brand-light border border-brand-border flex items-center justify-center text-brand-dark font-bold text-xl flex-shrink-0">
                            ${initials}
                        </div>
                        <div>
                            <h4 class="text-lg font-bold text-slate-900">${p.first_name} ${p.last_name}</h4>
                            <p class="text-sm text-slate-500">${p.patient_id} &bull; ${p.gender} &bull; ${p.age} years old</p>
                            ${statusBadge}
                        </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div><p class="text-xs text-slate-400 font-semibold uppercase tracking-wide">Contact</p><p class="text-sm text-slate-800">${p.contact}</p></div>
                        <div><p class="text-xs text-slate-400 font-semibold uppercase tracking-wide">Email</p><p class="text-sm text-slate-800">${p.email}</p></div>
                        <div><p class="text-xs text-slate-400 font-semibold uppercase tracking-wide">Blood Type</p><p class="text-sm text-slate-800 font-semibold text-rose-600">${p.blood_type}</p></div>
                        <div><p class="text-xs text-slate-400 font-semibold uppercase tracking-wide">Barangay</p><p class="text-sm text-slate-800">${p.barangay}</p></div>
                        <div><p class="text-xs text-slate-400 font-semibold uppercase tracking-wide">Address</p><p class="text-sm text-slate-800">${p.address}</p></div>
                        <div><p class="text-xs text-slate-400 font-semibold uppercase tracking-wide">Emergency Contact</p><p class="text-sm text-slate-800">${p.emergency_contact}</p></div>
                        <div><p class="text-xs text-slate-400 font-semibold uppercase tracking-wide">Registration Date</p><p class="text-sm text-slate-800">${formatDate(p.registration_date)}</p></div>
                        <div><p class="text-xs text-slate-400 font-semibold uppercase tracking-wide">Last Visit</p><p class="text-sm text-slate-800">${formatDate(p.last_visit)}</p></div>
                    </div>
                    <div class="bg-brand-light/40 rounded-xl p-4 border border-brand-border">
                        <h5 class="text-sm font-bold text-slate-700 mb-2">Medical Information</h5>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                            <div><p class="text-xs text-slate-400 font-semibold uppercase tracking-wide">Allergies</p><p class="text-sm text-slate-800">${p.allergies}</p></div>
                            <div><p class="text-xs text-slate-400 font-semibold uppercase tracking-wide">Conditions</p><p class="text-sm text-slate-800">${p.conditions}</p></div>
                        </div>
                    </div>
                    <div class="flex justify-end gap-2 pt-2">
                        <button onclick="closeModal('viewPatientModal'); editPatient(${p.id})" class="px-4 py-2 bg-brand-dark text-white rounded-lg hover:bg-brand-medium transition text-sm font-semibold">
                            <i class="fa-solid fa-pen mr-1.5"></i> Edit Patient
                        </button>
                    </div>
                </div>
            `;
        }, 400);
    }

    function formatDate(dateStr) {
        return new Date(dateStr).toLocaleDateString('en-US', { year: 'numeric', month: 'short', day: 'numeric' });
    }

    // ============================================================
    // EDIT PATIENT
    // ============================================================
    function editPatient(id) {
        const p = PATIENTS[id];
        if (!p) return;

        document.getElementById('edit_id').value = p.id;
        document.getElementById('edit_first_name').value = p.first_name;
        document.getElementById('edit_last_name').value = p.last_name;
        document.getElementById('edit_email').value = p.email;
        document.getElementById('edit_contact').value = p.contact;
        document.getElementById('edit_gender').value = p.gender;
        document.getElementById('edit_age').value = p.age;
        document.getElementById('edit_blood_type').value = p.blood_type;
        document.getElementById('edit_status').value = p.status;
        document.getElementById('edit_barangay').value = p.barangay;
        document.getElementById('edit_address').value = p.address;
        document.getElementById('edit_allergies').value = p.allergies;
        document.getElementById('edit_conditions').value = p.conditions;

        openModal('editPatientModal');
    }

    function saveEditedPatient(event) {
        event.preventDefault();
        const id = document.getElementById('edit_id').value;
        const p = PATIENTS[id];
        if (!p) return;

        p.first_name = document.getElementById('edit_first_name').value.trim();
        p.last_name = document.getElementById('edit_last_name').value.trim();
        p.email = document.getElementById('edit_email').value.trim();
        p.contact = document.getElementById('edit_contact').value.trim();
        p.gender = document.getElementById('edit_gender').value;
        p.age = document.getElementById('edit_age').value;
        p.blood_type = document.getElementById('edit_blood_type').value;
        p.status = document.getElementById('edit_status').value;
        p.barangay = document.getElementById('edit_barangay').value;
        p.address = document.getElementById('edit_address').value.trim();
        p.allergies = document.getElementById('edit_allergies').value.trim();
        p.conditions = document.getElementById('edit_conditions').value.trim();

        updateRowUI(p);
        recalculateStats();
        closeModal('editPatientModal');
        showToast(p.first_name + ' ' + p.last_name + '\'s record was updated.', 'success');
    }

    function updateRowUI(p) {
        const row = document.querySelector('tr[data-row-id="' + p.id + '"]');
        if (!row) return;

        row.dataset.name = (p.first_name + ' ' + p.last_name).toLowerCase();
        row.dataset.barangay = p.barangay;
        row.dataset.status = p.status;

        row.querySelector('.cell-avatar').textContent = (p.first_name[0] + p.last_name[0]).toUpperCase();
        row.querySelector('.cell-name').textContent = p.first_name + ' ' + p.last_name;
        row.querySelector('.cell-email').textContent = p.email;

        const genderIcon = p.gender === 'Male' ? 'fa-mars text-sky-500' : 'fa-venus text-pink-500';
        row.querySelector('.cell-gender').innerHTML = `<i class="fa-solid ${genderIcon}"></i> ${p.gender}`;

        row.querySelector('.cell-age').textContent = p.age;
        row.querySelector('.cell-blood').textContent = p.blood_type;
        row.querySelector('.cell-barangay').textContent = p.barangay;

        const statusEl = row.querySelector('.cell-status');
        statusEl.textContent = p.status.charAt(0).toUpperCase() + p.status.slice(1);
        statusEl.className = 'cell-status px-2 py-1 rounded-full text-xs font-semibold ' +
            (p.status === 'active' ? 'bg-emerald-100 text-emerald-700' : 'bg-slate-100 text-slate-500');
    }

    // ============================================================
    // DELETE PATIENT
    // ============================================================
    let pendingDeleteId = null;

    function deletePatient(id) {
        const p = PATIENTS[id];
        if (!p) return;
        pendingDeleteId = id;
        document.getElementById('deletePatientName').textContent =
            `${p.first_name} ${p.last_name} (${p.patient_id}) will be permanently removed.`;
        openModal('deletePatientModal');
    }

    function confirmDeletePatient() {
        const id = pendingDeleteId;
        const p = PATIENTS[id];
        if (!p) return;

        const row = document.querySelector('tr[data-row-id="' + id + '"]');
        if (row) row.remove();
        delete PATIENTS[id];

        recalculateStats();
        filterPatients();
        closeModal('deletePatientModal');
        showToast(p.first_name + ' ' + p.last_name + ' was deleted.', 'danger');
        pendingDeleteId = null;
    }

    function recalculateStats() {
        const remaining = Object.values(PATIENTS);
        document.getElementById('statTotal').textContent = remaining.length;
        document.getElementById('statActive').textContent = remaining.filter(p => p.status === 'active').length;
        document.getElementById('statInactive').textContent = remaining.filter(p => p.status === 'inactive').length;
    }

    // ============================================================
    // TOAST NOTIFICATIONS (UPDATED with 'info' and 'warning')
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
        const icons = {
            success: 'fa-circle-check',
            danger: 'fa-circle-check',
            info: 'fa-circle-info',
            warning: 'fa-triangle-exclamation'
        };
        toast.className = 'fixed bottom-6 right-6 z-[60] px-4 py-3 rounded-lg shadow-lg text-sm font-semibold text-white flex items-center gap-2 ' + (colors[type] || colors.success);
        toast.querySelector('i').className = 'fa-solid ' + (icons[type] || icons.success);
        document.getElementById('toastMessage').textContent = message;
        toast.classList.remove('hidden');

        clearTimeout(toastTimer);
        toastTimer = setTimeout(() => toast.classList.add('hidden'), 4000);
    }

    // ============================================================
    // ADD PATIENT
    // ============================================================
    function nextPatientId() {
        const ids = Object.values(PATIENTS).map(p => p.id);
        return ids.length ? Math.max(...ids) + 1 : 1;
    }

    function prepAddPatientModal() {
        document.getElementById('addPatientForm').reset();
        const n = nextPatientId();
        document.getElementById('nextPatientIdPreview').textContent = 'P-' + String(1000 + n);
    }

    function saveNewPatient(event) {
        event.preventDefault();
        const id = nextPatientId();
        const p = {
            id: id,
            patient_id: 'P-' + String(1000 + id),
            first_name: document.getElementById('add_first_name').value.trim(),
            last_name: document.getElementById('add_last_name').value.trim(),
            email: document.getElementById('add_email').value.trim(),
            contact: document.getElementById('add_contact').value.trim(),
            gender: document.getElementById('add_gender').value,
            age: document.getElementById('add_age').value,
            blood_type: document.getElementById('add_blood_type').value,
            status: document.getElementById('add_status').value,
            barangay: document.getElementById('add_barangay').value,
            address: document.getElementById('add_address').value.trim(),
            emergency_contact: document.getElementById('add_emergency_contact').value.trim() || 'None on file',
            allergies: document.getElementById('add_allergies').value.trim() || 'None',
            conditions: document.getElementById('add_conditions').value.trim() || 'None',
            registration_date: new Date().toISOString().slice(0, 10),
            last_visit: new Date().toISOString().slice(0, 10)
        };

        PATIENTS[id] = p;
        insertPatientRow(p, true);
        recalculateStats();
        closeModal('addPatientModal');
        showToast(p.first_name + ' ' + p.last_name + ' was added as ' + p.patient_id + '.', 'success');
    }

    function insertPatientRow(p, prepend = false) {
        const tbody = document.getElementById('patientTableBody');
        const tr = document.createElement('tr');
        tr.className = 'border-b border-slate-100 hover:bg-brand-light/40 transition-colors patient-row';
        tr.dataset.rowId = p.id;
        tr.dataset.name = (p.first_name + ' ' + p.last_name).toLowerCase();
        tr.dataset.id = p.patient_id;
        tr.dataset.barangay = p.barangay;
        tr.dataset.status = p.status;
        tr.dataset.lastVisit = p.last_visit;

        const initials = (p.first_name[0] + p.last_name[0]).toUpperCase();
        const genderIcon = p.gender === 'Male' ? 'fa-mars text-sky-500' : 'fa-venus text-pink-500';
        const statusClass = p.status === 'active' ? 'bg-emerald-100 text-emerald-700' : 'bg-slate-100 text-slate-500';
        const statusLabel = p.status.charAt(0).toUpperCase() + p.status.slice(1);
        const lastVisit = new Date(p.last_visit).toLocaleDateString('en-US', { year: 'numeric', month: 'short', day: 'numeric' });

        tr.innerHTML = `
            <td class="px-4 py-3 font-mono text-xs text-brand-dark font-semibold">${p.patient_id}</td>
            <td class="px-4 py-3">
                <div class="flex items-center gap-2.5">
                    <div class="cell-avatar w-8 h-8 rounded-full bg-brand-light border border-brand-border flex items-center justify-center text-brand-dark font-bold text-xs flex-shrink-0">${initials}</div>
                    <div>
                        <p class="cell-name font-semibold text-slate-800">${p.first_name} ${p.last_name}</p>
                        <p class="cell-email text-xs text-slate-400">${p.email}</p>
                    </div>
                </div>
            </td>
            <td class="px-4 py-3"><span class="cell-gender text-slate-600 text-xs"><i class="fa-solid ${genderIcon}"></i> ${p.gender}</span></td>
            <td class="px-4 py-3 text-slate-600 cell-age">${p.age}</td>
            <td class="px-4 py-3"><span class="cell-blood px-2 py-1 bg-rose-50 text-rose-600 rounded text-xs font-semibold">${p.blood_type}</span></td>
            <td class="px-4 py-3 text-slate-600 cell-barangay">${p.barangay}</td>
            <td class="px-4 py-3"><span class="cell-status px-2 py-1 rounded-full text-xs font-semibold ${statusClass}">${statusLabel}</span></td>
            <td class="px-4 py-3 text-slate-500 text-xs cell-visit">${lastVisit}</td>
            <td class="px-4 py-3">
                <div class="flex items-center justify-center gap-1">
                    <button onclick="viewPatient(${p.id})" class="p-1.5 text-brand-medium hover:bg-brand-light rounded-lg transition" title="View"><i class="fa-solid fa-eye text-sm"></i></button>
                    <button onclick="editPatient(${p.id})" class="p-1.5 text-slate-500 hover:bg-slate-100 hover:text-slate-700 rounded-lg transition" title="Edit"><i class="fa-solid fa-pen text-sm"></i></button>
                    <button onclick="deletePatient(${p.id})" class="p-1.5 text-rose-500 hover:bg-rose-50 rounded-lg transition" title="Delete"><i class="fa-solid fa-trash-can text-sm"></i></button>
                </div>
            </td>
        `;

        if (prepend && tbody.firstChild) {
            tbody.insertBefore(tr, tbody.firstChild);
        } else {
            tbody.appendChild(tr);
        }
    }

    // ============================================================
    // IMPORT PATIENTS (CSV)
    // ============================================================
    let pendingImportRows = null;

    const importDropzone = document.getElementById('importDropzone');
    ['dragenter', 'dragover'].forEach(evt => {
        importDropzone.addEventListener(evt, e => {
            e.preventDefault();
            importDropzone.classList.add('border-brand-medium', 'bg-brand-light/30');
        });
    });
    ['dragleave', 'drop'].forEach(evt => {
        importDropzone.addEventListener(evt, e => {
            e.preventDefault();
            importDropzone.classList.remove('border-brand-medium', 'bg-brand-light/30');
        });
    });
    importDropzone.addEventListener('drop', e => {
        const file = e.dataTransfer.files[0];
        if (file) handleImportFile(file);
    });

    function handleImportFile(file) {
        const errorBox = document.getElementById('importError');
        errorBox.classList.add('hidden');

        if (!file) return;
        if (!file.name.toLowerCase().endsWith('.csv')) {
            errorBox.textContent = 'Please choose a .csv file.';
            errorBox.classList.remove('hidden');
            return;
        }

        const reader = new FileReader();
        reader.onload = e => {
            try {
                const rows = parseCSV(e.target.result);
                if (!rows.length) throw new Error('No data rows found in this file.');
                pendingImportRows = rows;

                document.getElementById('importFileName').textContent = file.name;
                document.getElementById('importFileSummary').textContent = rows.length + ' patient' + (rows.length === 1 ? '' : 's') + ' ready to import';
                document.getElementById('importFileInfo').classList.remove('hidden');
                document.getElementById('importConfirmBtn').disabled = false;
            } catch (err) {
                pendingImportRows = null;
                document.getElementById('importConfirmBtn').disabled = true;
                errorBox.textContent = 'Could not read that file: ' + err.message;
                errorBox.classList.remove('hidden');
            }
        };
        reader.readAsText(file);
    }

    function clearImportFile() {
        pendingImportRows = null;
        document.getElementById('importFileInput').value = '';
        document.getElementById('importFileInfo').classList.add('hidden');
        document.getElementById('importError').classList.add('hidden');
        document.getElementById('importConfirmBtn').disabled = true;
    }

    function parseCSV(text) {
        const lines = text.trim().split(/\r?\n/).filter(l => l.trim().length);
        if (lines.length < 2) return [];
        const headers = lines[0].split(',').map(h => h.trim().toLowerCase());
        return lines.slice(1).map(line => {
            const cells = line.split(',').map(c => c.trim());
            const row = {};
            headers.forEach((h, i) => row[h] = cells[i] || '');
            return row;
        });
    }

    function confirmImport() {
        if (!pendingImportRows || !pendingImportRows.length) return;

        let imported = 0;
        pendingImportRows.forEach(row => {
            if (!row.first_name || !row.last_name) return;
            const id = nextPatientId();
            const p = {
                id: id,
                patient_id: 'P-' + String(1000 + id),
                first_name: row.first_name,
                last_name: row.last_name,
                email: row.email || '',
                contact: row.contact || '',
                gender: row.gender === 'Female' ? 'Female' : 'Male',
                age: row.age || '',
                blood_type: row.blood_type || 'O+',
                status: row.status === 'inactive' ? 'inactive' : 'active',
                barangay: row.barangay || 'Barangay San Jose',
                address: row.address || '',
                emergency_contact: 'None on file',
                allergies: 'None',
                conditions: 'None',
                registration_date: new Date().toISOString().slice(0, 10),
                last_visit: new Date().toISOString().slice(0, 10)
            };
            PATIENTS[id] = p;
            insertPatientRow(p, true);
            imported++;
        });

        recalculateStats();
        closeModal('importModal');
        clearImportFile();
        showToast(imported + ' patient' + (imported === 1 ? '' : 's') + ' imported successfully.', 'success');
    }

    // ============================================================
    // EXPORT PATIENTS
    // ============================================================
    let selectedExportFormat = 'csv';

    function prepExportModal() {
        document.getElementById('exportCountAll').textContent = Object.keys(PATIENTS).length;
        const visibleRows = document.querySelectorAll('.patient-row:not([style*="display: none"])').length;
        document.getElementById('exportCountFiltered').textContent = visibleRows;
        selectExportFormat('csv');
    }

    function selectExportFormat(format) {
        selectedExportFormat = format;
        document.querySelectorAll('.export-format-btn').forEach(btn => {
            btn.classList.toggle('selected', btn.dataset.format === format);
        });
    }

    function runExport() {
        const scope = document.querySelector('input[name="exportScope"]:checked').value;
        let rows;
        if (scope === 'filtered') {
            const visibleIds = Array.from(document.querySelectorAll('.patient-row'))
                .filter(r => r.style.display !== 'none')
                .map(r => r.dataset.rowId);
            rows = Object.values(PATIENTS).filter(p => visibleIds.includes(String(p.id)));
        } else {
            rows = Object.values(PATIENTS);
        }

        if (selectedExportFormat === 'csv') {
            downloadCSV(rows);
        } else {
            showToast((selectedExportFormat === 'excel' ? 'Excel' : 'PDF') + ' export needs a backend endpoint — exporting CSV instead.', 'success');
            downloadCSV(rows);
        }
        closeModal('exportModal');
    }

    function downloadCSV(rows) {
        const headers = ['patient_id','first_name','last_name','gender','age','blood_type','barangay','status','contact','email','last_visit'];
        const csvLines = [headers.join(',')];
        rows.forEach(p => {
            csvLines.push(headers.map(h => `"${String(p[h] ?? '').replace(/"/g, '""')}"`).join(','));
        });
        const blob = new Blob([csvLines.join('\n')], { type: 'text/csv;charset=utf-8;' });
        const url = URL.createObjectURL(blob);
        const a = document.createElement('a');
        a.href = url;
        a.download = 'patients_export_' + new Date().toISOString().slice(0, 10) + '.csv';
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);
        URL.revokeObjectURL(url);
        showToast(rows.length + ' patient' + (rows.length === 1 ? '' : 's') + ' exported.', 'success');
    }

    // ============================================================
    // SEARCH & FILTER
    // ============================================================
    document.getElementById('searchPatient').addEventListener('input', filterPatients);
    document.getElementById('filterStatus').addEventListener('change', filterPatients);
    document.getElementById('filterDateValue').addEventListener('input', filterPatients);
    document.getElementById('filterDateValue').addEventListener('change', filterPatients);

    function onDateFilterTypeChange() {
        const type = document.getElementById('filterDateType').value;
        const valueInput = document.getElementById('filterDateValue');

        if (type === 'day') {
            valueInput.type = 'date';
            valueInput.classList.remove('hidden');
            valueInput.value = '';
        } else if (type === 'month') {
            valueInput.type = 'month';
            valueInput.classList.remove('hidden');
            valueInput.value = '';
        } else if (type === 'year') {
            valueInput.type = 'number';
            valueInput.min = 2000;
            valueInput.max = 2100;
            valueInput.placeholder = 'e.g. ' + new Date().getFullYear();
            valueInput.classList.remove('hidden');
            valueInput.value = '';
        } else {
            valueInput.classList.add('hidden');
            valueInput.value = '';
        }
        filterPatients();
    }

    function matchesDateFilter(lastVisit, type, value) {
        if (!type) return true;
        if (!lastVisit) return false;

        const visitDate = new Date(lastVisit + 'T00:00:00');
        const today = new Date();
        today.setHours(0, 0, 0, 0);

        if (type === 'today') {
            return visitDate.getTime() === today.getTime();
        }
        if (type === 'day') {
            if (!value) return true;
            return lastVisit === value;
        }
        if (type === 'month') {
            if (!value) return true;
            return lastVisit.slice(0, 7) === value;
        }
        if (type === 'year') {
            if (!value) return true;
            return lastVisit.slice(0, 4) === String(value);
        }
        return true;
    }

    function filterPatients() {
        const search = document.getElementById('searchPatient').value.toLowerCase();
        const status = document.getElementById('filterStatus').value;
        const dateType = document.getElementById('filterDateType').value;
        const dateValue = document.getElementById('filterDateValue').value;
        let visibleCount = 0;

        document.querySelectorAll('.patient-row').forEach(row => {
            const name = row.dataset.name;
            const id = row.dataset.id.toLowerCase();
            const barangay = (row.dataset.barangay || '').toLowerCase();
            const rowStatus = row.dataset.status;
            const lastVisit = row.dataset.lastVisit;

            const matchesSearch = name.includes(search) || id.includes(search) || barangay.includes(search);
            const matchesStatus = !status || rowStatus === status;
            const matchesDate = matchesDateFilter(lastVisit, dateType, dateValue);
            const isVisible = matchesSearch && matchesStatus && matchesDate;

            row.style.display = isVisible ? '' : 'none';
            if (isVisible) visibleCount++;
        });

        document.getElementById('emptyState').style.display = visibleCount === 0 ? 'flex' : 'none';
    }

    function resetFilters() {
        document.getElementById('searchPatient').value = '';
        document.getElementById('filterStatus').value = '';
        document.getElementById('filterDateType').value = '';
        document.getElementById('filterDateValue').value = '';
        document.getElementById('filterDateValue').classList.add('hidden');
        document.querySelectorAll('.patient-row').forEach(row => row.style.display = '');
        document.getElementById('emptyState').style.display = 'none';
        
        // Remove URL parameter
        if (window.history && window.history.replaceState) {
            const url = new URL(window.location.href);
            url.searchParams.delete('patient');
            window.history.replaceState({}, document.title, url);
        }
    }

    // ============================================================
    // HANDLE URL PARAMETER FOR SPECIFIC PATIENT
    // ============================================================
    document.addEventListener('DOMContentLoaded', function() {
        const urlParams = new URLSearchParams(window.location.search);
        const patientId = urlParams.get('patient');
        
        if (patientId) {
            const rows = document.querySelectorAll('.patient-row');
            let found = false;
            
            rows.forEach(row => {
                const rowId = row.dataset.rowId;
                if (rowId == patientId) {
                    found = true;
                    row.style.backgroundColor = '#E6F5F3';
                    row.style.borderLeft = '4px solid #14807A';
                    row.style.boxShadow = '0 0 0 2px #14807A40';
                    
                    setTimeout(() => {
                        row.scrollIntoView({ behavior: 'smooth', block: 'center' });
                    }, 300);
                    
                    const patientName = row.querySelector('.cell-name')?.textContent || 'Patient';
                    showToast('🔍 Viewing: ' + patientName, 'info');
                }
            });
            
            if (!found) {
                showToast('⚠️ Patient not found in the current list', 'warning');
            }
        }
    });

    // ============================================================
    // PAGINATION
    // ============================================================
    function changePage(page) {
        if (page < 1 || page > <?php echo $totalPages; ?>) return;
        window.location.href = '?page=' + page;
    }

    // ============================================================
    // KEYBOARD SHORTCUTS
    // ============================================================
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            document.querySelectorAll('.fixed.inset-0:not(.hidden)').forEach(modal => {
                modal.classList.add('hidden');
                modal.classList.remove('flex');
                document.body.classList.remove('overflow-hidden');
            });
        }
        if ((e.ctrlKey || e.metaKey) && e.key === 'n') {
            e.preventDefault();
            openModal('addPatientModal');
        }
        if ((e.ctrlKey || e.metaKey) && e.key === 'f') {
            e.preventDefault();
            document.getElementById('searchPatient').focus();
        }
    });
</script>
<?php include_once '../../includes/footer.php'; ?>