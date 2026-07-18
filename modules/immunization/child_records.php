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

// Sample Child Records Data
$children = [
    [
        'id' => 1,
        'child_id' => 'CH-001',
        'first_name' => 'Sofia',
        'last_name' => 'Garcia',
        'middle_name' => 'Dela Cruz',
        'gender' => 'Female',
        'birth_date' => '2024-03-15',
        'age' => '2 yrs 4 mos',
        'birth_weight' => 3.2,
        'birth_height' => 50,
        'blood_type' => 'O+',
        'address' => '123 Rizal St., Barangay San Jose',
        'barangay' => 'Barangay San Jose',
        'mother_name' => 'Rosa Mendoza',
        'mother_contact' => '09123456787',
        'mother_occupation' => 'Teacher',
        'father_name' => 'Ramon Garcia',
        'father_contact' => '09123456788',
        'father_occupation' => 'Engineer',
        'family_history' => 'Mother - Asthma, Grandfather - Diabetes',
        'allergies' => 'None',
        'health_center' => 'Health Center 1',
        'registration_date' => '2024-03-15',
        'status' => 'active',
        'nutrition_status' => 'Normal',
        'vaccine_compliance' => 75,
        'last_visit' => '2026-07-10'
    ],
    [
        'id' => 2,
        'child_id' => 'CH-002',
        'first_name' => 'Luis',
        'last_name' => 'Mendoza',
        'middle_name' => 'Santos',
        'gender' => 'Male',
        'birth_date' => '2025-04-20',
        'age' => '1 yr 3 mos',
        'birth_weight' => 3.0,
        'birth_height' => 48,
        'blood_type' => 'A+',
        'address' => '456 Mabini Ave., Barangay Poblacion',
        'barangay' => 'Barangay Poblacion',
        'mother_name' => 'Rosa Mendoza',
        'mother_contact' => '09123456787',
        'mother_occupation' => 'Teacher',
        'father_name' => 'Carlos Mendoza',
        'father_contact' => '09123456789',
        'father_occupation' => 'Architect',
        'family_history' => 'Father - Hypertension',
        'allergies' => 'Peanuts',
        'health_center' => 'Health Center 1',
        'registration_date' => '2025-04-20',
        'status' => 'active',
        'nutrition_status' => 'Moderate',
        'vaccine_compliance' => 50,
        'last_visit' => '2026-07-08'
    ],
    [
        'id' => 3,
        'child_id' => 'CH-003',
        'first_name' => 'Emma',
        'last_name' => 'Lim',
        'middle_name' => 'Tan',
        'gender' => 'Female',
        'birth_date' => '2023-06-01',
        'age' => '3 yrs 1 mo',
        'birth_weight' => 3.5,
        'birth_height' => 52,
        'blood_type' => 'B+',
        'address' => '789 Bonifacio Rd., Barangay Riverside',
        'barangay' => 'Barangay Riverside',
        'mother_name' => 'Elena Tan',
        'mother_contact' => '09123456786',
        'mother_occupation' => 'Nurse',
        'father_name' => 'Carlos Lim',
        'father_contact' => '09123456785',
        'father_occupation' => 'Doctor',
        'family_history' => 'None',
        'allergies' => 'None',
        'health_center' => 'Health Center 2',
        'registration_date' => '2023-06-01',
        'status' => 'active',
        'nutrition_status' => 'Normal',
        'vaccine_compliance' => 90,
        'last_visit' => '2026-07-12'
    ],
    [
        'id' => 4,
        'child_id' => 'CH-004',
        'first_name' => 'Noah',
        'last_name' => 'Torres',
        'middle_name' => 'Rivera',
        'gender' => 'Male',
        'birth_date' => '2025-10-10',
        'age' => '9 mos',
        'birth_weight' => 2.8,
        'birth_height' => 46,
        'blood_type' => 'O-',
        'address' => '101 Luna St., Barangay San Roque',
        'barangay' => 'Barangay San Roque',
        'mother_name' => 'Elena Torres',
        'mother_contact' => '09123456784',
        'mother_occupation' => 'Freelancer',
        'father_name' => 'Ramon Torres',
        'father_contact' => '09123456783',
        'father_occupation' => 'Driver',
        'family_history' => 'Mother - Anemia',
        'allergies' => 'None',
        'health_center' => 'Health Center 1',
        'registration_date' => '2025-10-10',
        'status' => 'active',
        'nutrition_status' => 'Critical',
        'vaccine_compliance' => 30,
        'last_visit' => '2026-07-15'
    ],
    [
        'id' => 5,
        'child_id' => 'CH-005',
        'first_name' => 'Isabella',
        'last_name' => 'Cruz',
        'middle_name' => 'Gomez',
        'gender' => 'Female',
        'birth_date' => '2024-08-25',
        'age' => '1 yr 11 mos',
        'birth_weight' => 3.3,
        'birth_height' => 51,
        'blood_type' => 'AB+',
        'address' => '202 Santos St., Barangay Sta. Cruz',
        'barangay' => 'Barangay Sta. Cruz',
        'mother_name' => 'Ana Cruz',
        'mother_contact' => '09123456782',
        'mother_occupation' => 'Accountant',
        'father_name' => 'Jose Cruz',
        'father_contact' => '09123456781',
        'father_occupation' => 'Police Officer',
        'family_history' => 'None',
        'allergies' => 'Latex',
        'health_center' => 'Health Center 2',
        'registration_date' => '2024-08-25',
        'status' => 'active',
        'nutrition_status' => 'Normal',
        'vaccine_compliance' => 80,
        'last_visit' => '2026-07-14'
    ],
    [
        'id' => 6,
        'child_id' => 'CH-006',
        'first_name' => 'Marcus',
        'last_name' => 'Reyes',
        'middle_name' => 'Dizon',
        'gender' => 'Male',
        'birth_date' => '2023-11-30',
        'age' => '2 yrs 8 mos',
        'birth_weight' => 3.6,
        'birth_height' => 53,
        'blood_type' => 'A-',
        'address' => '303 Rizal St., Barangay San Jose',
        'barangay' => 'Barangay San Jose',
        'mother_name' => 'Liza Reyes',
        'mother_contact' => '09123456780',
        'mother_occupation' => 'Teacher',
        'father_name' => 'Miguel Reyes',
        'father_contact' => '09123456779',
        'father_occupation' => 'Engineer',
        'family_history' => 'Mother - Diabetes',
        'allergies' => 'None',
        'health_center' => 'Health Center 1',
        'registration_date' => '2023-11-30',
        'status' => 'inactive',
        'nutrition_status' => 'Overweight',
        'vaccine_compliance' => 60,
        'last_visit' => '2026-06-28'
    ],
    [
        'id' => 7,
        'child_id' => 'CH-007',
        'first_name' => 'Sophia',
        'last_name' => 'Santos',
        'middle_name' => 'Bautista',
        'gender' => 'Female',
        'birth_date' => '2025-12-01',
        'age' => '7 mos',
        'birth_weight' => 2.9,
        'birth_height' => 47,
        'blood_type' => 'B-',
        'address' => '404 Mabini Ave., Barangay Poblacion',
        'barangay' => 'Barangay Poblacion',
        'mother_name' => 'Maria Santos',
        'mother_contact' => '09123456778',
        'mother_occupation' => 'Nurse',
        'father_name' => 'Juan Santos',
        'father_contact' => '09123456777',
        'father_occupation' => 'Lawyer',
        'family_history' => 'None',
        'allergies' => 'None',
        'health_center' => 'Health Center 2',
        'registration_date' => '2025-12-01',
        'status' => 'active',
        'nutrition_status' => 'Normal',
        'vaccine_compliance' => 45,
        'last_visit' => '2026-07-11'
    ],
    [
        'id' => 8,
        'child_id' => 'CH-008',
        'first_name' => 'Nathan',
        'last_name' => 'Garcia',
        'middle_name' => 'Ramos',
        'gender' => 'Male',
        'birth_date' => '2024-02-14',
        'age' => '2 yrs 5 mos',
        'birth_weight' => 3.1,
        'birth_height' => 49,
        'blood_type' => 'O+',
        'address' => '505 Bonifacio Rd., Barangay Riverside',
        'barangay' => 'Barangay Riverside',
        'mother_name' => 'Rosa Ramos',
        'mother_contact' => '09123456776',
        'mother_occupation' => 'Entrepreneur',
        'father_name' => 'Ramon Garcia',
        'father_contact' => '09123456775',
        'father_occupation' => 'Accountant',
        'family_history' => 'Father - Hypertension',
        'allergies' => 'None',
        'health_center' => 'Health Center 1',
        'registration_date' => '2024-02-14',
        'status' => 'active',
        'nutrition_status' => 'Normal',
        'vaccine_compliance' => 70,
        'last_visit' => '2026-07-13'
    ],
];

// Stats
$totalChildren = count($children);
$activeChildren = count(array_filter($children, fn($c) => $c['status'] === 'active'));
$criticalNutrition = count(array_filter($children, fn($c) => $c['nutrition_status'] === 'Critical'));
$normalNutrition = count(array_filter($children, fn($c) => $c['nutrition_status'] === 'Normal'));
$vaccineCompliant = count(array_filter($children, fn($c) => $c['vaccine_compliance'] >= 80));

// Pagination
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$limit = 5;
$offset = ($page - 1) * $limit;
$totalPages = ceil($totalChildren / $limit);
$paginatedChildren = array_slice($children, $offset, $limit);

$title = 'Child Records';
?>

<!-- ============================================================ -->
<!-- 2. HTML + PHP EMBEDDED + Tailwind CSS                       -->
<!-- ============================================================ -->

<div class="flex-1 px-6 pt-[26px] pb-20 mb-10 flex flex-col min-h-0 overflow-hidden">

    <!-- Page Header -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6">
        <div>
            <h2 class="text-2xl font-black text-slate-900 tracking-tight">Child Records</h2>
            <p class="text-sm text-slate-500 mt-0.5">Manage child registration, demographics & health records</p>
        </div>
        <div class="flex gap-3">
            <button onclick="openModal('registerChildModal')"
                    class="px-4 py-2 bg-brand-dark text-white rounded-lg hover:bg-brand-medium transition-colors text-sm font-semibold flex items-center gap-2 shadow-sm">
                <i class="fa-solid fa-child text-xs"></i> Register Child
            </button>
        </div>
    </div>

    <!-- ============================================================ -->
    <!-- MODERN KPI CARDS - Updated to match design               -->
    <!-- ============================================================ -->
    <div class="grid grid-cols-2 md:grid-cols-5 gap-4 mb-6">
        <!-- Card 1: Total Children -->
        <div class="relative overflow-hidden bg-white rounded-2xl shadow-sm border border-slate-200 p-5 hover:shadow-lg transition group">
            <div class="absolute -top-12 -right-12 w-24 h-24 bg-blue-100 rounded-full opacity-50 group-hover:scale-110 transition"></div>
            <div class="relative">
                <div class="flex items-center gap-3">
                    <div class="w-11 h-11 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl flex items-center justify-center text-white shadow-lg shadow-blue-200">
                        <i class="fa-solid fa-child text-lg"></i>
                    </div>
                    <div>
                        <p class="text-2xl font-black text-slate-900"><?php echo $totalChildren; ?></p>
                        <p class="text-xs font-medium text-slate-500">Total Children</p>
                    </div>
                </div>
                <div class="mt-3 flex items-center gap-2">
                    <span class="px-2 py-0.5 bg-blue-100 text-blue-700 rounded-full text-[10px] font-bold">👶 All children</span>
                    <span class="text-[10px] text-slate-400"><?php echo $activeChildren; ?> active</span>
                </div>
            </div>
        </div>

        <!-- Card 2: Active -->
        <div class="relative overflow-hidden bg-white rounded-2xl shadow-sm border border-slate-200 p-5 hover:shadow-lg transition group">
            <div class="absolute -top-12 -right-12 w-24 h-24 bg-emerald-100 rounded-full opacity-50 group-hover:scale-110 transition"></div>
            <div class="relative">
                <div class="flex items-center gap-3">
                    <div class="w-11 h-11 bg-gradient-to-br from-emerald-500 to-emerald-600 rounded-xl flex items-center justify-center text-white shadow-lg shadow-emerald-200">
                        <i class="fa-solid fa-check-circle text-lg"></i>
                    </div>
                    <div>
                        <p class="text-2xl font-black text-emerald-600"><?php echo $activeChildren; ?></p>
                        <p class="text-xs font-medium text-slate-500">Active</p>
                    </div>
                </div>
                <div class="mt-3 flex items-center gap-2">
                    <span class="px-2 py-0.5 bg-emerald-100 text-emerald-700 rounded-full text-[10px] font-bold">✅ Enrolled</span>
                    <span class="text-[10px] text-slate-400">Regular checkups</span>
                </div>
            </div>
        </div>

        <!-- Card 3: Critical Nutrition -->
        <div class="relative overflow-hidden bg-white rounded-2xl shadow-sm border border-slate-200 p-5 hover:shadow-lg transition group">
            <div class="absolute -top-12 -right-12 w-24 h-24 bg-rose-100 rounded-full opacity-50 group-hover:scale-110 transition"></div>
            <div class="relative">
                <div class="flex items-center gap-3">
                    <div class="w-11 h-11 bg-gradient-to-br from-rose-500 to-rose-600 rounded-xl flex items-center justify-center text-white shadow-lg shadow-rose-200">
                        <i class="fa-solid fa-triangle-exclamation text-lg"></i>
                    </div>
                    <div>
                        <p class="text-2xl font-black text-rose-600"><?php echo $criticalNutrition; ?></p>
                        <p class="text-xs font-medium text-slate-500">Critical Nutrition</p>
                    </div>
                </div>
                <div class="mt-3 flex items-center gap-2">
                    <span class="px-2 py-0.5 bg-rose-100 text-rose-700 rounded-full text-[10px] font-bold">🚨 Urgent</span>
                    <span class="text-[10px] text-slate-400">Immediate intervention</span>
                </div>
            </div>
        </div>

        <!-- Card 4: Normal Nutrition -->
        <div class="relative overflow-hidden bg-white rounded-2xl shadow-sm border border-slate-200 p-5 hover:shadow-lg transition group">
            <div class="absolute -top-12 -right-12 w-24 h-24 bg-emerald-100 rounded-full opacity-50 group-hover:scale-110 transition"></div>
            <div class="relative">
                <div class="flex items-center gap-3">
                    <div class="w-11 h-11 bg-gradient-to-br from-emerald-500 to-emerald-600 rounded-xl flex items-center justify-center text-white shadow-lg shadow-emerald-200">
                        <i class="fa-solid fa-heart-pulse text-lg"></i>
                    </div>
                    <div>
                        <p class="text-2xl font-black text-emerald-600"><?php echo $normalNutrition; ?></p>
                        <p class="text-xs font-medium text-slate-500">Normal Nutrition</p>
                    </div>
                </div>
                <div class="mt-3 flex items-center gap-2">
                    <span class="px-2 py-0.5 bg-emerald-100 text-emerald-700 rounded-full text-[10px] font-bold">✅ Healthy</span>
                    <span class="text-[10px] text-slate-400">On track</span>
                </div>
            </div>
        </div>

        <!-- Card 5: Vaccine Compliant -->
        <div class="relative overflow-hidden bg-white rounded-2xl shadow-sm border border-slate-200 p-5 hover:shadow-lg transition group">
            <div class="absolute -top-12 -right-12 w-24 h-24 bg-brand-light rounded-full opacity-50 group-hover:scale-110 transition"></div>
            <div class="relative">
                <div class="flex items-center gap-3">
                    <div class="w-11 h-11 bg-gradient-to-br from-brand-dark to-brand-medium rounded-xl flex items-center justify-center text-white shadow-lg shadow-brand-light">
                        <i class="fa-solid fa-syringe text-lg"></i>
                    </div>
                    <div>
                        <p class="text-2xl font-black text-brand-dark"><?php echo $vaccineCompliant; ?></p>
                        <p class="text-xs font-medium text-slate-500">Vaccine Compliant</p>
                    </div>
                </div>
                <div class="mt-3 flex items-center gap-2">
                    <span class="px-2 py-0.5 bg-brand-light text-brand-dark rounded-full text-[10px] font-bold">💉 Protected</span>
                    <span class="text-[10px] text-slate-400">≥80% compliance</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Critical Nutrition Alert -->
    <?php if ($criticalNutrition > 0): ?>
    <div class="bg-rose-50 border border-rose-200 rounded-xl p-3 mb-4 flex items-center justify-between">
        <div class="flex items-center gap-3">
            <i class="fa-solid fa-triangle-exclamation text-rose-500 text-lg"></i>
            <span class="text-sm text-rose-700">
                <span class="font-bold"><?php echo $criticalNutrition; ?></span> child(ren) with critical nutrition status require immediate attention
            </span>
        </div>
        <button onclick="document.getElementById('filterNutrition').value='Critical'; filterChildren();" 
                class="text-xs font-semibold text-rose-700 hover:text-rose-900 underline">
            View critical
        </button>
    </div>
    <?php endif; ?>

    <!-- Search & Filter -->
    <div class="bg-white rounded-xl shadow-xs p-4 border border-slate-200 mb-6">
        <div class="flex flex-col sm:flex-row gap-3">
            <div class="flex-1 relative">
                <i class="fa-solid fa-search absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-sm"></i>
                <input type="text"
                       id="searchChild"
                       placeholder="Search by name, ID, or mother's name..."
                       class="w-full pl-9 pr-4 py-2 border border-slate-200 rounded-lg focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none text-sm transition">
            </div>
            <div class="flex gap-2 flex-wrap">
                <select id="filterGender" class="px-4 py-2 border border-slate-200 rounded-lg focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none text-sm bg-white">
                    <option value="">All Genders</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
                <select id="filterNutrition" class="px-4 py-2 border border-slate-200 rounded-lg focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none text-sm bg-white">
                    <option value="">All Nutrition</option>
                    <option value="Normal">Normal</option>
                    <option value="Moderate">Moderate</option>
                    <option value="Critical">Critical</option>
                    <option value="Overweight">Overweight</option>
                </select>
                <select id="filterStatus" class="px-4 py-2 border border-slate-200 rounded-lg focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none text-sm bg-white">
                    <option value="">All Status</option>
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                </select>
                <button onclick="resetFilters()" title="Reset filters"
                        class="px-3 py-2 bg-slate-100 text-slate-500 rounded-lg hover:bg-slate-200 hover:text-slate-700 transition-colors text-sm">
                    <i class="fa-solid fa-rotate-right"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- Children Table -->
    <div class="bg-white rounded-xl shadow-xs border border-slate-200 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead class="bg-slate-50 border-b border-slate-200">
                    <tr>
                        <th class="px-4 py-3 text-left text-[10px] font-bold text-slate-500 uppercase tracking-wider">Child ID</th>
                        <th class="px-4 py-3 text-left text-[10px] font-bold text-slate-500 uppercase tracking-wider">Child Name</th>
                        <th class="px-4 py-3 text-left text-[10px] font-bold text-slate-500 uppercase tracking-wider">Gender</th>
                        <th class="px-4 py-3 text-left text-[10px] font-bold text-slate-500 uppercase tracking-wider">Age</th>
                        <th class="px-4 py-3 text-left text-[10px] font-bold text-slate-500 uppercase tracking-wider">Mother</th>
                        <th class="px-4 py-3 text-left text-[10px] font-bold text-slate-500 uppercase tracking-wider">Nutrition</th>
                        <th class="px-4 py-3 text-left text-[10px] font-bold text-slate-500 uppercase tracking-wider">Vaccine %</th>
                        <th class="px-4 py-3 text-left text-[10px] font-bold text-slate-500 uppercase tracking-wider">Status</th>
                        <th class="px-4 py-3 text-center text-[10px] font-bold text-slate-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody id="childTableBody">
                    <?php foreach ($paginatedChildren as $child): ?>
                    <tr class="border-b border-slate-100 hover:bg-brand-light/40 transition-colors child-row <?php echo $child['nutrition_status'] === 'Critical' ? 'bg-rose-50/50' : ''; ?>"
                        data-name="<?php echo strtolower($child['first_name'] . ' ' . $child['last_name']); ?>"
                        data-id="<?php echo $child['child_id']; ?>"
                        data-mother="<?php echo strtolower($child['mother_name']); ?>"
                        data-status="<?php echo $child['status']; ?>">
                        <td class="px-4 py-3 font-mono text-xs text-brand-dark font-semibold"><?php echo $child['child_id']; ?></td>
                        <td class="px-4 py-3">
                            <div class="flex items-center gap-2.5">
                                <div class="w-8 h-8 rounded-full bg-brand-light border border-brand-border flex items-center justify-center text-brand-dark font-bold text-xs flex-shrink-0">
                                    <?php echo strtoupper(substr($child['first_name'], 0, 1) . substr($child['last_name'], 0, 1)); ?>
                                </div>
                                <div>
                                    <p class="font-semibold text-slate-800 text-sm"><?php echo $child['first_name'] . ' ' . $child['last_name']; ?></p>
                                    <p class="text-xs text-slate-400"><?php echo $child['barangay']; ?></p>
                                </div>
                            </div>
                        </td>
                        <td class="px-4 py-3">
                            <span class="text-slate-600 text-xs">
                                <i class="fa-solid <?php echo $child['gender'] === 'Male' ? 'fa-mars text-sky-500' : 'fa-venus text-pink-500'; ?>"></i>
                                <?php echo $child['gender']; ?>
                            </span>
                        </td>
                        <td class="px-4 py-3 text-slate-600 text-xs"><?php echo $child['age']; ?></td>
                        <td class="px-4 py-3 text-slate-600 text-xs"><?php echo $child['mother_name']; ?></td>
                        <td class="px-4 py-3">
                            <?php
                                $nutritionColors = [
                                    'Normal' => 'bg-emerald-100 text-emerald-700',
                                    'Moderate' => 'bg-amber-100 text-amber-700',
                                    'Critical' => 'bg-rose-100 text-rose-700',
                                    'Overweight' => 'bg-blue-100 text-blue-700'
                                ];
                            ?>
                            <span class="px-2 py-1 rounded-full text-xs font-semibold <?php echo $nutritionColors[$child['nutrition_status']] ?? $nutritionColors['Normal']; ?>">
                                <?php echo $child['nutrition_status']; ?>
                            </span>
                        </td>
                        <td class="px-4 py-3">
                            <div class="flex items-center gap-1">
                                <div class="w-full bg-slate-200 rounded-full h-1.5">
                                    <div class="h-1.5 rounded-full <?php echo $child['vaccine_compliance'] >= 80 ? 'bg-emerald-500' : ($child['vaccine_compliance'] >= 50 ? 'bg-amber-500' : 'bg-rose-500'); ?>" 
                                         style="width: <?php echo $child['vaccine_compliance']; ?>%"></div>
                                </div>
                                <span class="text-xs font-semibold text-slate-600 min-w-[35px]"><?php echo $child['vaccine_compliance']; ?>%</span>
                            </div>
                        </td>
                        <td class="px-4 py-3">
                            <span class="px-2 py-1 rounded-full text-xs font-semibold <?php echo $child['status'] === 'active' ? 'bg-emerald-100 text-emerald-700' : 'bg-slate-100 text-slate-500'; ?>">
                                <?php echo ucfirst($child['status']); ?>
                            </span>
                        </td>
                        <td class="px-4 py-3">
                            <div class="flex items-center justify-center gap-1">
                                <button onclick="viewChild(<?php echo $child['id']; ?>)"
                                        class="p-1.5 text-brand-medium hover:bg-brand-light rounded-lg transition" title="View">
                                    <i class="fa-solid fa-eye text-sm"></i>
                                </button>
                                <button onclick="editChild(<?php echo $child['id']; ?>)"
                                        class="p-1.5 text-slate-500 hover:bg-slate-100 hover:text-slate-700 rounded-lg transition" title="Edit">
                                    <i class="fa-solid fa-pen text-sm"></i>
                                </button>
                                <button onclick="viewHealthRecord(<?php echo $child['id']; ?>)"
                                        class="p-1.5 text-emerald-600 hover:bg-emerald-50 rounded-lg transition" title="Health Records">
                                    <i class="fa-solid fa-folder-medical text-sm"></i>
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
                <i class="fa-solid fa-child text-slate-400"></i>
            </div>
            <p class="text-sm font-semibold text-slate-600">No children match your filters</p>
            <p class="text-xs text-slate-400 mt-1">Try adjusting your search or clearing filters</p>
            <button onclick="resetFilters()" class="mt-3 text-xs font-semibold text-brand-medium hover:text-brand-dark">Clear all filters</button>
        </div>

        <!-- Pagination -->
        <div class="px-4 py-3 border-t border-slate-200 flex flex-col sm:flex-row justify-between items-center gap-3 bg-slate-50">
            <p class="text-xs text-slate-500">
                Showing <span class="font-semibold text-slate-700"><?php echo $offset + 1; ?></span> to
                <span class="font-semibold text-slate-700"><?php echo min($offset + $limit, $totalChildren); ?></span> of
                <span class="font-semibold text-slate-700"><?php echo $totalChildren; ?></span> children
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
<!-- REGISTER CHILD MODAL                                         -->
<!-- ============================================================ -->
<div id="registerChildModal" class="hidden fixed inset-0 bg-slate-900/50 backdrop-blur-sm z-50 items-center justify-center p-4">
    <div class="bg-white rounded-2xl shadow-xl w-full max-w-2xl max-h-[90vh] overflow-y-auto">
        <div class="flex items-center justify-between px-6 py-4 border-b border-slate-200 sticky top-0 bg-white rounded-t-2xl">
            <h3 class="font-bold text-slate-900 flex items-center gap-2">
                <i class="fa-solid fa-child text-brand-medium"></i>
                Register Child
            </h3>
            <button onclick="closeModal('registerChildModal')" class="w-8 h-8 rounded-lg hover:bg-slate-100 flex items-center justify-center text-slate-400 hover:text-slate-600 transition">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>
        <form id="registerChildForm" class="p-6 space-y-4" onsubmit="saveChildRegistration(event)">
            <!-- Child Information -->
            <div class="bg-slate-50 rounded-xl p-4 border border-slate-200">
                <h4 class="text-xs font-bold text-slate-700 uppercase tracking-wide mb-3">👶 Child Information</h4>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">First Name</label>
                        <input type="text" id="child_first_name" required class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none">
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">Last Name</label>
                        <input type="text" id="child_last_name" required class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none">
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">Gender</label>
                        <select id="child_gender" class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm bg-white focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none">
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">Birth Date</label>
                        <input type="date" id="child_birth_date" required class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none">
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">Birth Weight (kg)</label>
                        <input type="number" id="child_birth_weight" step="0.1" class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none">
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">Birth Height (cm)</label>
                        <input type="number" id="child_birth_height" class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none">
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">Blood Type</label>
                        <select id="child_blood_type" class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm bg-white focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none">
                            <option value="">Select</option>
                            <option value="A+">A+</option>
                            <option value="A-">A-</option>
                            <option value="B+">B+</option>
                            <option value="B-">B-</option>
                            <option value="AB+">AB+</option>
                            <option value="AB-">AB-</option>
                            <option value="O+">O+</option>
                            <option value="O-">O-</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">Barangay</label>
                        <select id="child_barangay" class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm bg-white focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none">
                            <option value="Barangay San Jose">Barangay San Jose</option>
                            <option value="Barangay Poblacion">Barangay Poblacion</option>
                            <option value="Barangay Riverside">Barangay Riverside</option>
                            <option value="Barangay San Roque">Barangay San Roque</option>
                            <option value="Barangay Sta. Cruz">Barangay Sta. Cruz</option>
                        </select>
                    </div>
                    <div class="sm:col-span-2">
                        <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">Address</label>
                        <input type="text" id="child_address" class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none">
                    </div>
                </div>
            </div>

            <!-- Mother Information -->
            <div class="bg-slate-50 rounded-xl p-4 border border-slate-200">
                <h4 class="text-xs font-bold text-slate-700 uppercase tracking-wide mb-3">👩 Mother Information</h4>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">Mother's Name</label>
                        <input type="text" id="child_mother_name" required class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none">
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">Contact</label>
                        <input type="text" id="child_mother_contact" class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none">
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">Occupation</label>
                        <input type="text" id="child_mother_occupation" class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none">
                    </div>
                </div>
            </div>

            <!-- Father Information -->
            <div class="bg-slate-50 rounded-xl p-4 border border-slate-200">
                <h4 class="text-xs font-bold text-slate-700 uppercase tracking-wide mb-3">👨 Father Information</h4>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">Father's Name</label>
                        <input type="text" id="child_father_name" class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none">
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">Contact</label>
                        <input type="text" id="child_father_contact" class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none">
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">Occupation</label>
                        <input type="text" id="child_father_occupation" class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none">
                    </div>
                </div>
            </div>

            <div>
                <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">Family History</label>
                <textarea id="child_family_history" rows="2" class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none" placeholder="Any family medical history..."></textarea>
            </div>
            <div>
                <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">Allergies</label>
                <input type="text" id="child_allergies" class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none" placeholder="None">
            </div>

            <div class="flex justify-end gap-2 pt-2 border-t border-slate-100">
                <button type="button" onclick="closeModal('registerChildModal')"
                        class="px-4 py-2 bg-white border border-slate-200 text-slate-600 rounded-lg hover:bg-slate-50 transition text-sm font-semibold">
                    Cancel
                </button>
                <button type="submit"
                        class="px-4 py-2 bg-brand-dark text-white rounded-lg hover:bg-brand-medium transition text-sm font-semibold">
                    <i class="fa-solid fa-child mr-1.5"></i> Register
                </button>
            </div>
        </form>
    </div>
</div>

<!-- ============================================================ -->
<!-- VIEW CHILD MODAL                                             -->
<!-- ============================================================ -->
<div id="viewChildModal" class="hidden fixed inset-0 bg-slate-900/50 backdrop-blur-sm z-50 items-center justify-center p-4">
    <div class="bg-white rounded-2xl shadow-xl w-full max-w-2xl max-h-[90vh] overflow-y-auto">
        <div class="flex items-center justify-between px-6 py-4 border-b border-slate-200 sticky top-0 bg-white rounded-t-2xl">
            <h3 class="font-bold text-slate-900">Child Record Details</h3>
            <button onclick="closeModal('viewChildModal')" class="w-8 h-8 rounded-lg hover:bg-slate-100 flex items-center justify-center text-slate-400 hover:text-slate-600 transition">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>
        <div id="childDetailsContent" class="p-6">
            <div class="flex items-center justify-center py-10 text-slate-400 text-sm">
                <i class="fa-solid fa-spinner fa-spin mr-2"></i> Loading...
            </div>
        </div>
    </div>
</div>

<!-- ============================================================ -->
<!-- HEALTH RECORDS MODAL                                         -->
<!-- ============================================================ -->
<div id="healthRecordModal" class="hidden fixed inset-0 bg-slate-900/50 backdrop-blur-sm z-50 items-center justify-center p-4">
    <div class="bg-white rounded-2xl shadow-xl w-full max-w-2xl max-h-[90vh] overflow-y-auto">
        <div class="flex items-center justify-between px-6 py-4 border-b border-slate-200 sticky top-0 bg-white rounded-t-2xl">
            <h3 class="font-bold text-slate-900">Health Records</h3>
            <button onclick="closeModal('healthRecordModal')" class="w-8 h-8 rounded-lg hover:bg-slate-100 flex items-center justify-center text-slate-400 hover:text-slate-600 transition">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>
        <div id="healthRecordContent" class="p-6">
            <div class="flex items-center justify-center py-10 text-slate-400 text-sm">
                <i class="fa-solid fa-spinner fa-spin mr-2"></i> Loading...
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
    const CHILDREN = <?php echo json_encode(array_column($children, null, 'id'), JSON_PRETTY_PRINT); ?>;

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
    // VIEW CHILD
    // ============================================================
    function viewChild(id) {
        openModal('viewChildModal');
        const c = CHILDREN[id];
        if (!c) return;

        setTimeout(() => {
            const nutritionColors = {
                Normal: 'bg-emerald-100 text-emerald-700',
                Moderate: 'bg-amber-100 text-amber-700',
                Critical: 'bg-rose-100 text-rose-700',
                Overweight: 'bg-blue-100 text-blue-700'
            };

            document.getElementById('childDetailsContent').innerHTML = `
                <div class="space-y-4">
                    <div class="flex items-center gap-4 pb-4 border-b border-slate-200">
                        <div class="w-14 h-14 rounded-full bg-brand-light border border-brand-border flex items-center justify-center text-brand-dark font-bold text-2xl flex-shrink-0">
                            ${c.first_name.charAt(0)}${c.last_name.charAt(0)}
                        </div>
                        <div>
                            <h4 class="text-lg font-bold text-slate-900">${c.first_name} ${c.last_name}</h4>
                            <p class="text-sm text-slate-500">${c.child_id} • ${c.age} • ${c.barangay}</p>
                            <span class="inline-block px-2 py-0.5 rounded-full text-xs font-semibold mt-1 ${nutritionColors[c.nutrition_status] || nutritionColors.Normal}">
                                Nutrition: ${c.nutrition_status}
                            </span>
                        </div>
                    </div>
                    
                    <!-- Demographics -->
                    <div class="bg-slate-50 rounded-xl p-4 border border-slate-200">
                        <h5 class="text-sm font-bold text-slate-700 mb-2">📋 Demographics</h5>
                        <div class="grid grid-cols-2 gap-3">
                            <div><p class="text-xs text-slate-400">Gender</p><p class="text-sm text-slate-800">${c.gender}</p></div>
                            <div><p class="text-xs text-slate-400">Birth Date</p><p class="text-sm text-slate-800">${new Date(c.birth_date).toLocaleDateString()}</p></div>
                            <div><p class="text-xs text-slate-400">Birth Weight</p><p class="text-sm text-slate-800">${c.birth_weight} kg</p></div>
                            <div><p class="text-xs text-slate-400">Birth Height</p><p class="text-sm text-slate-800">${c.birth_height} cm</p></div>
                            <div><p class="text-xs text-slate-400">Blood Type</p><p class="text-sm text-slate-800">${c.blood_type || '—'}</p></div>
                            <div><p class="text-xs text-slate-400">Health Center</p><p class="text-sm text-slate-800">${c.health_center}</p></div>
                        </div>
                    </div>

                    <!-- Family History -->
                    <div class="bg-brand-light/40 rounded-xl p-4 border border-brand-border">
                        <h5 class="text-sm font-bold text-slate-700 mb-2">👨‍👩‍👧 Family History</h5>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                            <div>
                                <p class="text-xs text-slate-400 font-semibold">Mother</p>
                                <p class="text-sm text-slate-800">${c.mother_name}</p>
                                <p class="text-xs text-slate-400">${c.mother_occupation || 'N/A'} • ${c.mother_contact || 'N/A'}</p>
                            </div>
                            <div>
                                <p class="text-xs text-slate-400 font-semibold">Father</p>
                                <p class="text-sm text-slate-800">${c.father_name || 'N/A'}</p>
                                <p class="text-xs text-slate-400">${c.father_occupation || 'N/A'} • ${c.father_contact || 'N/A'}</p>
                            </div>
                            <div class="sm:col-span-2">
                                <p class="text-xs text-slate-400 font-semibold">Family Medical History</p>
                                <p class="text-sm text-slate-800">${c.family_history || 'None reported'}</p>
                            </div>
                            <div class="sm:col-span-2">
                                <p class="text-xs text-slate-400 font-semibold">Allergies</p>
                                <p class="text-sm text-slate-800">${c.allergies || 'None'}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Health Records Summary -->
                    <div class="bg-slate-50 rounded-xl p-4 border border-slate-200">
                        <h5 class="text-sm font-bold text-slate-700 mb-2">💉 Health Records Summary</h5>
                        <div class="grid grid-cols-2 gap-3">
                            <div>
                                <p class="text-xs text-slate-400">Vaccine Compliance</p>
                                <div class="flex items-center gap-2 mt-1">
                                    <div class="flex-1 bg-slate-200 rounded-full h-2">
                                        <div class="h-2 rounded-full ${c.vaccine_compliance >= 80 ? 'bg-emerald-500' : c.vaccine_compliance >= 50 ? 'bg-amber-500' : 'bg-rose-500'}" 
                                             style="width: ${c.vaccine_compliance}%"></div>
                                    </div>
                                    <span class="text-sm font-bold">${c.vaccine_compliance}%</span>
                                </div>
                            </div>
                            <div>
                                <p class="text-xs text-slate-400">Last Visit</p>
                                <p class="text-sm font-semibold text-slate-800">${new Date(c.last_visit).toLocaleDateString()}</p>
                            </div>
                        </div>
                    </div>

                    <div class="flex justify-end gap-2 pt-2 border-t border-slate-200">
                        <button onclick="closeModal('viewChildModal')" class="px-4 py-2 bg-white border border-slate-200 text-slate-600 rounded-lg hover:bg-slate-50 transition text-sm font-semibold">Close</button>
                        <button onclick="closeModal('viewChildModal'); viewHealthRecord(${c.id})" class="px-4 py-2 bg-emerald-600 text-white rounded-lg hover:bg-emerald-700 transition text-sm font-semibold">
                            <i class="fa-solid fa-folder-medical mr-1.5"></i> Health Records
                        </button>
                    </div>
                </div>
            `;
        }, 300);
    }

    // ============================================================
    // EDIT CHILD
    // ============================================================
    function editChild(id) {
        showToast('Edit child ID: ' + id + ' (Edit modal coming soon)', 'info');
    }

    // ============================================================
    // VIEW HEALTH RECORDS
    // ============================================================
    function viewHealthRecord(id) {
        openModal('healthRecordModal');
        const c = CHILDREN[id];
        if (!c) return;

        setTimeout(() => {
            // Sample health records data (in production, fetch from database)
            const healthRecords = [
                { date: '2026-07-10', type: 'Checkup', doctor: 'Dr. Elena Santos', notes: 'Normal development', follow_up: '2026-08-10' },
                { date: '2026-06-15', type: 'Vaccination', doctor: 'Dr. Ana Cruz', notes: 'MMR Booster given', follow_up: '2026-07-15' },
                { date: '2026-05-20', type: 'Nutrition Assessment', doctor: 'Dr. Miguel Reyes', notes: 'Weight within normal range', follow_up: '2026-06-20' },
            ];

            const recordsHtml = healthRecords.map(r => `
                <div class="flex items-center justify-between p-3 bg-white rounded-lg border border-slate-200">
                    <div>
                        <p class="font-semibold text-slate-800 text-sm">${r.type}</p>
                        <p class="text-xs text-slate-400">${new Date(r.date).toLocaleDateString()} • ${r.doctor}</p>
                        <p class="text-xs text-slate-600 mt-1">${r.notes}</p>
                    </div>
                    <div class="text-right">
                        <span class="text-xs text-slate-400">Follow-up:</span>
                        <p class="text-xs font-semibold text-brand-dark">${new Date(r.follow_up).toLocaleDateString()}</p>
                    </div>
                </div>
            `).join('');

            document.getElementById('healthRecordContent').innerHTML = `
                <div class="space-y-4">
                    <div class="flex items-center gap-3 p-3 bg-brand-light/40 rounded-xl border border-brand-border">
                        <div class="w-10 h-10 rounded-full bg-brand-light border border-brand-border flex items-center justify-center text-brand-dark font-bold text-sm flex-shrink-0">
                            ${c.first_name.charAt(0)}${c.last_name.charAt(0)}
                        </div>
                        <div>
                            <p class="font-semibold text-slate-800 text-sm">${c.first_name} ${c.last_name}</p>
                            <p class="text-xs text-slate-400">${c.child_id} • ${c.age}</p>
                        </div>
                    </div>
                    <div class="space-y-2">
                        ${recordsHtml}
                    </div>
                    <div class="flex justify-end gap-2 pt-2 border-t border-slate-200">
                        <button onclick="closeModal('healthRecordModal')" class="px-4 py-2 bg-white border border-slate-200 text-slate-600 rounded-lg hover:bg-slate-50 transition text-sm font-semibold">Close</button>
                        <button class="px-4 py-2 bg-brand-dark text-white rounded-lg hover:bg-brand-medium transition text-sm font-semibold">
                            <i class="fa-solid fa-plus mr-1.5"></i> Add Record
                        </button>
                    </div>
                </div>
            `;
        }, 300);
    }

    // ============================================================
    // SAVE CHILD REGISTRATION
    // ============================================================
    function saveChildRegistration(event) {
        event.preventDefault();
        showToast('Child registered successfully!', 'success');
        closeModal('registerChildModal');
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
    document.getElementById('searchChild').addEventListener('input', filterChildren);
    document.getElementById('filterGender').addEventListener('change', filterChildren);
    document.getElementById('filterNutrition').addEventListener('change', filterChildren);
    document.getElementById('filterStatus').addEventListener('change', filterChildren);

    function filterChildren() {
        const search = document.getElementById('searchChild').value.toLowerCase();
        const gender = document.getElementById('filterGender').value;
        const nutrition = document.getElementById('filterNutrition').value;
        const status = document.getElementById('filterStatus').value;
        let visibleCount = 0;

        document.querySelectorAll('.child-row').forEach(row => {
            const name = row.dataset.name;
            const id = row.dataset.id.toLowerCase();
            const mother = row.dataset.mother;
            const rowStatus = row.dataset.status;
            
            // Get gender and nutrition from row cells
            const genderCell = row.querySelector('.text-slate-600.text-xs');
            const nutritionCell = row.querySelector('.px-2.py-1.rounded-full.text-xs.font-semibold');
            
            const rowGender = genderCell ? genderCell.textContent.trim() : '';
            const rowNutrition = nutritionCell ? nutritionCell.textContent.trim() : '';

            const matchesSearch = name.includes(search) || id.includes(search) || mother.includes(search);
            const matchesGender = !gender || rowGender === gender;
            const matchesNutrition = !nutrition || rowNutrition === nutrition;
            const matchesStatus = !status || rowStatus === status;
            const isVisible = matchesSearch && matchesGender && matchesNutrition && matchesStatus;

            row.style.display = isVisible ? '' : 'none';
            if (isVisible) visibleCount++;
        });

        document.getElementById('emptyState').style.display = visibleCount === 0 ? 'flex' : 'none';
    }

    function resetFilters() {
        document.getElementById('searchChild').value = '';
        document.getElementById('filterGender').value = '';
        document.getElementById('filterNutrition').value = '';
        document.getElementById('filterStatus').value = '';
        document.querySelectorAll('.child-row').forEach(row => row.style.display = '');
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