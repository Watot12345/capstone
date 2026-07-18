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
    ['id' => 1, 'name' => 'Dr. Elena Santos'],
    ['id' => 2, 'name' => 'Dr. Miguel Reyes'],
    ['id' => 3, 'name' => 'Dr. Ana Cruz'],
];

// Sample Drugs/Medications Database
$drugs = [
    ['id' => 1, 'name' => 'Amlodipine', 'category' => 'Antihypertensive', 'strength' => '5mg', 'form' => 'Tablet', 'stock' => 150],
    ['id' => 2, 'name' => 'Metformin', 'category' => 'Antidiabetic', 'strength' => '500mg', 'form' => 'Tablet', 'stock' => 200],
    ['id' => 3, 'name' => 'Losartan', 'category' => 'Antihypertensive', 'strength' => '50mg', 'form' => 'Tablet', 'stock' => 120],
    ['id' => 4, 'name' => 'Salbutamol', 'category' => 'Bronchodilator', 'strength' => '100mcg', 'form' => 'Inhaler', 'stock' => 80],
    ['id' => 5, 'name' => 'Paracetamol', 'category' => 'Analgesic', 'strength' => '500mg', 'form' => 'Tablet', 'stock' => 500],
    ['id' => 6, 'name' => 'Ibuprofen', 'category' => 'NSAID', 'strength' => '400mg', 'form' => 'Tablet', 'stock' => 300],
    ['id' => 7, 'name' => 'Amoxicillin', 'category' => 'Antibiotic', 'strength' => '500mg', 'form' => 'Capsule', 'stock' => 100],
    ['id' => 8, 'name' => 'Omeprazole', 'category' => 'PPI', 'strength' => '20mg', 'form' => 'Capsule', 'stock' => 90],
    ['id' => 9, 'name' => 'Atorvastatin', 'category' => 'Statin', 'strength' => '10mg', 'form' => 'Tablet', 'stock' => 110],
    ['id' => 10, 'name' => 'Cetirizine', 'category' => 'Antihistamine', 'strength' => '10mg', 'form' => 'Tablet', 'stock' => 250],
];

// Sample Prescriptions Data
$prescriptions = [
    [
        'id' => 1,
        'prescription_id' => 'RX-001',
        'patient_id' => 1,
        'patient_name' => 'Maria Santos',
        'patient_avatar' => 'MS',
        'doctor_name' => 'Dr. Elena Santos',
        'date' => '2026-07-15',
        'status' => 'dispensed',
        'medications' => [
            ['name' => 'Amlodipine', 'dosage' => '5mg', 'frequency' => 'Once daily', 'duration' => '30 days', 'quantity' => 30],
            ['name' => 'Losartan', 'dosage' => '50mg', 'frequency' => 'Once daily', 'duration' => '30 days', 'quantity' => 30],
        ],
        'notes' => 'Continue monitoring blood pressure weekly',
        'dispensed_by' => 'Pharmacist Maria Cruz',
        'dispensed_at' => '2026-07-15 10:30 AM'
    ],
    [
        'id' => 2,
        'prescription_id' => 'RX-002',
        'patient_id' => 2,
        'patient_name' => 'Juan Dela Cruz',
        'patient_avatar' => 'JD',
        'doctor_name' => 'Dr. Miguel Reyes',
        'date' => '2026-07-14',
        'status' => 'pending',
        'medications' => [
            ['name' => 'Metformin', 'dosage' => '500mg', 'frequency' => 'Twice daily', 'duration' => '30 days', 'quantity' => 60],
            ['name' => 'Atorvastatin', 'dosage' => '10mg', 'frequency' => 'Once daily', 'duration' => '30 days', 'quantity' => 30],
        ],
        'notes' => 'Check blood sugar levels regularly',
        'dispensed_by' => null,
        'dispensed_at' => null
    ],
    [
        'id' => 3,
        'prescription_id' => 'RX-003',
        'patient_id' => 3,
        'patient_name' => 'Rosa Mendoza',
        'patient_avatar' => 'RM',
        'doctor_name' => 'Dr. Ana Cruz',
        'date' => '2026-07-13',
        'status' => 'dispensed',
        'medications' => [
            ['name' => 'Salbutamol', 'dosage' => '100mcg', 'frequency' => '2 puffs as needed', 'duration' => '30 days', 'quantity' => 1],
            ['name' => 'Cetirizine', 'dosage' => '10mg', 'frequency' => 'Once daily', 'duration' => '15 days', 'quantity' => 15],
        ],
        'notes' => 'Use inhaler as needed for asthma symptoms',
        'dispensed_by' => 'Pharmacist Anna Reyes',
        'dispensed_at' => '2026-07-13 02:15 PM'
    ],
    [
        'id' => 4,
        'prescription_id' => 'RX-004',
        'patient_id' => 4,
        'patient_name' => 'Carlos Lim',
        'patient_avatar' => 'CL',
        'doctor_name' => 'Dr. Elena Santos',
        'date' => '2026-07-12',
        'status' => 'pending',
        'medications' => [
            ['name' => 'Omeprazole', 'dosage' => '20mg', 'frequency' => 'Once daily', 'duration' => '14 days', 'quantity' => 14],
            ['name' => 'Amoxicillin', 'dosage' => '500mg', 'frequency' => 'Three times daily', 'duration' => '7 days', 'quantity' => 21],
        ],
        'notes' => 'Complete the full course of antibiotics',
        'dispensed_by' => null,
        'dispensed_at' => null
    ],
    [
        'id' => 5,
        'prescription_id' => 'RX-005',
        'patient_id' => 5,
        'patient_name' => 'Elena Torres',
        'patient_avatar' => 'ET',
        'doctor_name' => 'Dr. Miguel Reyes',
        'date' => '2026-07-11',
        'status' => 'dispensed',
        'medications' => [
            ['name' => 'Paracetamol', 'dosage' => '500mg', 'frequency' => 'Every 6 hours as needed', 'duration' => '5 days', 'quantity' => 20],
            ['name' => 'Ibuprofen', 'dosage' => '400mg', 'frequency' => 'Twice daily', 'duration' => '5 days', 'quantity' => 10],
        ],
        'notes' => 'Take with food to avoid stomach upset',
        'dispensed_by' => 'Pharmacist Maria Cruz',
        'dispensed_at' => '2026-07-11 09:45 AM'
    ],
    [
        'id' => 6,
        'prescription_id' => 'RX-006',
        'patient_id' => 1,
        'patient_name' => 'Maria Santos',
        'patient_avatar' => 'MS',
        'doctor_name' => 'Dr. Elena Santos',
        'date' => '2026-06-15',
        'status' => 'dispensed',
        'medications' => [
            ['name' => 'Amlodipine', 'dosage' => '5mg', 'frequency' => 'Once daily', 'duration' => '30 days', 'quantity' => 30],
        ],
        'notes' => 'BP reading improved',
        'dispensed_by' => 'Pharmacist Maria Cruz',
        'dispensed_at' => '2026-06-15 11:00 AM'
    ],
    [
        'id' => 7,
        'prescription_id' => 'RX-007',
        'patient_id' => 2,
        'patient_name' => 'Juan Dela Cruz',
        'patient_avatar' => 'JD',
        'doctor_name' => 'Dr. Miguel Reyes',
        'date' => '2026-06-10',
        'status' => 'cancelled',
        'medications' => [
            ['name' => 'Metformin', 'dosage' => '500mg', 'frequency' => 'Twice daily', 'duration' => '30 days', 'quantity' => 60],
        ],
        'notes' => 'Cancelled - patient requested alternative',
        'dispensed_by' => null,
        'dispensed_at' => null
    ],
];

// Pagination
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$limit = 5;
$offset = ($page - 1) * $limit;
$totalPrescriptions = count($prescriptions);
$totalPages = ceil($totalPrescriptions / $limit);
$paginatedPrescriptions = array_slice($prescriptions, $offset, $limit);

$title = 'Prescriptions';

// Stats
$totalDispensed = count(array_filter($prescriptions, fn($p) => $p['status'] === 'dispensed'));
$totalPending = count(array_filter($prescriptions, fn($p) => $p['status'] === 'pending'));
$totalCancelled = count(array_filter($prescriptions, fn($p) => $p['status'] === 'cancelled'));
$totalMedications = array_sum(array_map(fn($p) => count($p['medications']), $prescriptions));
?>

<!-- ============================================================ -->
<!-- 2. HTML + PHP EMBEDDED + Tailwind CSS                       -->
<!-- ============================================================ -->

<div class="flex-1 px-6 pt-[26px] pb-20 mb-10 flex flex-col min-h-0 overflow-hidden">

    <!-- Page Header -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6">
        <div>
            <h2 class="text-2xl font-black text-slate-900 tracking-tight">Prescriptions</h2>
            <p class="text-sm text-slate-500 mt-0.5">Electronic prescriptions with drug selection & dosage management</p>
        </div>
        <div class="flex gap-3">
            <button onclick="openModal('newPrescriptionModal')"
                    class="px-4 py-2 bg-brand-dark text-white rounded-lg hover:bg-brand-medium transition-colors text-sm font-semibold flex items-center gap-2 shadow-sm">
                <i class="fa-solid fa-prescription-bottle text-xs"></i> New Prescription
            </button>
        </div>
    </div>

    <!-- ============================================================ -->
<!-- MODERN KPI CARDS - Updated to match design               -->
<!-- ============================================================ -->
<div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-6">
    <!-- Card 1: Total Prescriptions -->
    <div class="relative overflow-hidden bg-white rounded-2xl shadow-sm border border-slate-200 p-5 hover:shadow-lg transition group">
        <div class="absolute -top-12 -right-12 w-24 h-24 bg-blue-100 rounded-full opacity-50 group-hover:scale-110 transition"></div>
        <div class="relative">
            <div class="flex items-center gap-3">
                <div class="w-11 h-11 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl flex items-center justify-center text-white shadow-lg shadow-blue-200">
                    <i class="fa-solid fa-prescription text-lg"></i>
                </div>
                <div>
                    <p class="text-2xl font-black text-slate-900"><?php echo $totalPrescriptions; ?></p>
                    <p class="text-xs font-medium text-slate-500">Total Prescriptions</p>
                </div>
            </div>
            <div class="mt-3 flex items-center gap-2">
                <span class="px-2 py-0.5 bg-blue-100 text-blue-700 rounded-full text-[10px] font-bold">💊 All prescriptions</span>
                <span class="text-[10px] text-slate-400"><?php echo $totalDispensed; ?> dispensed</span>
            </div>
        </div>
    </div>

    <!-- Card 2: Dispensed -->
    <div class="relative overflow-hidden bg-white rounded-2xl shadow-sm border border-slate-200 p-5 hover:shadow-lg transition group">
        <div class="absolute -top-12 -right-12 w-24 h-24 bg-emerald-100 rounded-full opacity-50 group-hover:scale-110 transition"></div>
        <div class="relative">
            <div class="flex items-center gap-3">
                <div class="w-11 h-11 bg-gradient-to-br from-emerald-500 to-emerald-600 rounded-xl flex items-center justify-center text-white shadow-lg shadow-emerald-200">
                    <i class="fa-solid fa-check-circle text-lg"></i>
                </div>
                <div>
                    <p class="text-2xl font-black text-emerald-600"><?php echo $totalDispensed; ?></p>
                    <p class="text-xs font-medium text-slate-500">Dispensed</p>
                </div>
            </div>
            <div class="mt-3 flex items-center gap-2">
                <span class="px-2 py-0.5 bg-emerald-100 text-emerald-700 rounded-full text-[10px] font-bold">✅ Filled</span>
                <span class="text-[10px] text-slate-400">Successfully dispensed</span>
            </div>
        </div>
    </div>

    <!-- Card 3: Pending -->
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
                <span class="px-2 py-0.5 bg-amber-100 text-amber-700 rounded-full text-[10px] font-bold">⏳ Awaiting</span>
                <span class="text-[10px] text-slate-400">Ready for dispensing</span>
            </div>
        </div>
    </div>

    <!-- Card 4: Total Medications -->
    <div class="relative overflow-hidden bg-white rounded-2xl shadow-sm border border-slate-200 p-5 hover:shadow-lg transition group">
        <div class="absolute -top-12 -right-12 w-24 h-24 bg-violet-100 rounded-full opacity-50 group-hover:scale-110 transition"></div>
        <div class="relative">
            <div class="flex items-center gap-3">
                <div class="w-11 h-11 bg-gradient-to-br from-violet-500 to-violet-600 rounded-xl flex items-center justify-center text-white shadow-lg shadow-violet-200">
                    <i class="fa-solid fa-capsules text-lg"></i>
                </div>
                <div>
                    <p class="text-2xl font-black text-violet-600"><?php echo $totalMedications; ?></p>
                    <p class="text-xs font-medium text-slate-500">Total Medications</p>
                </div>
            </div>
            <div class="mt-3 flex items-center gap-2">
                <span class="px-2 py-0.5 bg-violet-100 text-violet-700 rounded-full text-[10px] font-bold">🧪 Items</span>
                <span class="text-[10px] text-slate-400">Across all prescriptions</span>
            </div>
        </div>
    </div>
</div>

    <!-- Search & Filter -->
    <div class="bg-white rounded-xl shadow-xs p-4 border border-slate-200 mb-6">
        <div class="flex flex-col sm:flex-row gap-3">
            <div class="flex-1 relative">
                <i class="fa-solid fa-search absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-sm"></i>
                <input type="text"
                       id="searchPrescription"
                       placeholder="Search by patient name, ID, or medication..."
                       class="w-full pl-9 pr-4 py-2 border border-slate-200 rounded-lg focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none text-sm transition">
            </div>
            <div class="flex gap-2 flex-wrap">
                <select id="filterStatus" class="px-4 py-2 border border-slate-200 rounded-lg focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none text-sm bg-white">
                    <option value="">All Status</option>
                    <option value="dispensed">Dispensed</option>
                    <option value="pending">Pending</option>
                    <option value="cancelled">Cancelled</option>
                </select>
                <select id="filterPatient" class="px-4 py-2 border border-slate-200 rounded-lg focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none text-sm bg-white">
                    <option value="">All Patients</option>
                    <?php foreach ($patients as $p): ?>
                        <option value="<?php echo strtolower($p['name']); ?>"><?php echo $p['name']; ?></option>
                    <?php endforeach; ?>
                </select>
                <button onclick="resetFilters()" title="Reset filters"
                        class="px-3 py-2 bg-slate-100 text-slate-500 rounded-lg hover:bg-slate-200 hover:text-slate-700 transition-colors text-sm">
                    <i class="fa-solid fa-rotate-right"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- Prescriptions Table -->
    <div class="bg-white rounded-xl shadow-xs border border-slate-200 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead class="bg-slate-50 border-b border-slate-200">
                    <tr>
                        <th class="px-4 py-3 text-left text-[10px] font-bold text-slate-500 uppercase tracking-wider">RX ID</th>
                        <th class="px-4 py-3 text-left text-[10px] font-bold text-slate-500 uppercase tracking-wider">Patient</th>
                        <th class="px-4 py-3 text-left text-[10px] font-bold text-slate-500 uppercase tracking-wider">Doctor</th>
                        <th class="px-4 py-3 text-left text-[10px] font-bold text-slate-500 uppercase tracking-wider">Medications</th>
                        <th class="px-4 py-3 text-left text-[10px] font-bold text-slate-500 uppercase tracking-wider">Date</th>
                        <th class="px-4 py-3 text-left text-[10px] font-bold text-slate-500 uppercase tracking-wider">Status</th>
                        <th class="px-4 py-3 text-center text-[10px] font-bold text-slate-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody id="prescriptionTableBody">
                    <?php foreach ($paginatedPrescriptions as $prescription): ?>
                    <tr class="border-b border-slate-100 hover:bg-brand-light/40 transition-colors prescription-row"
                        data-patient="<?php echo strtolower($prescription['patient_name']); ?>"
                        data-medications="<?php echo strtolower(implode(' ', array_column($prescription['medications'], 'name'))); ?>"
                        data-status="<?php echo $prescription['status']; ?>">
                        <td class="px-4 py-3 font-mono text-xs text-brand-dark font-semibold"><?php echo $prescription['prescription_id']; ?></td>
                        <td class="px-4 py-3">
                            <div class="flex items-center gap-2.5">
                                <div class="w-8 h-8 rounded-full bg-brand-light border border-brand-border flex items-center justify-center text-brand-dark font-bold text-xs flex-shrink-0">
                                    <?php echo $prescription['patient_avatar']; ?>
                                </div>
                                <div>
                                    <p class="font-semibold text-slate-800 text-sm"><?php echo $prescription['patient_name']; ?></p>
                                    <p class="text-xs text-slate-400"><?php echo count($prescription['medications']); ?> medications</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-4 py-3 text-slate-600 text-xs"><?php echo $prescription['doctor_name']; ?></td>
                        <td class="px-4 py-3">
                            <div class="space-y-0.5">
                                <?php foreach (array_slice($prescription['medications'], 0, 2) as $med): ?>
                                    <span class="inline-block px-2 py-0.5 bg-slate-100 rounded text-[10px] text-slate-700">
                                        <?php echo $med['name']; ?> <?php echo $med['dosage']; ?>
                                    </span>
                                <?php endforeach; ?>
                                <?php if (count($prescription['medications']) > 2): ?>
                                    <span class="text-[10px] text-slate-400">+<?php echo count($prescription['medications']) - 2; ?> more</span>
                                <?php endif; ?>
                            </div>
                        </td>
                        <td class="px-4 py-3 text-slate-600 text-xs"><?php echo date('M d, Y', strtotime($prescription['date'])); ?></td>
                        <td class="px-4 py-3">
                            <span class="px-2 py-1 rounded-full text-xs font-semibold <?php 
                                echo $prescription['status'] === 'dispensed' ? 'bg-emerald-100 text-emerald-700' : 
                                    ($prescription['status'] === 'pending' ? 'bg-amber-100 text-amber-700' : 
                                    'bg-slate-100 text-slate-500'); 
                            ?>">
                                <?php echo ucfirst($prescription['status']); ?>
                            </span>
                        </td>
                        <td class="px-4 py-3">
                            <div class="flex items-center justify-center gap-1">
                                <button onclick="viewPrescription(<?php echo $prescription['id']; ?>)"
                                        class="p-1.5 text-brand-medium hover:bg-brand-light rounded-lg transition" title="View">
                                    <i class="fa-solid fa-eye text-sm"></i>
                                </button>
                                <?php if ($prescription['status'] === 'pending'): ?>
                                    <button onclick="dispensePrescription(<?php echo $prescription['id']; ?>)"
                                            class="p-1.5 text-emerald-600 hover:bg-emerald-50 rounded-lg transition" title="Dispense">
                                        <i class="fa-solid fa-check text-sm"></i>
                                    </button>
                                <?php endif; ?>
                                <button onclick="editPrescription(<?php echo $prescription['id']; ?>)"
                                        class="p-1.5 text-slate-500 hover:bg-slate-100 hover:text-slate-700 rounded-lg transition" title="Edit">
                                    <i class="fa-solid fa-pen text-sm"></i>
                                </button>
                                <button onclick="deletePrescription(<?php echo $prescription['id']; ?>)"
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

        <!-- Empty state -->
        <div id="emptyState" class="hidden flex-col items-center justify-center py-14 text-center">
            <div class="w-12 h-12 rounded-full bg-slate-100 flex items-center justify-center mb-3">
                <i class="fa-solid fa-prescription text-slate-400"></i>
            </div>
            <p class="text-sm font-semibold text-slate-600">No prescriptions match your filters</p>
            <p class="text-xs text-slate-400 mt-1">Try adjusting your search or clearing filters</p>
            <button onclick="resetFilters()" class="mt-3 text-xs font-semibold text-brand-medium hover:text-brand-dark">Clear all filters</button>
        </div>

        <!-- Pagination -->
        <div class="px-4 py-3 border-t border-slate-200 flex flex-col sm:flex-row justify-between items-center gap-3 bg-slate-50">
            <p class="text-xs text-slate-500">
                Showing <span class="font-semibold text-slate-700"><?php echo $offset + 1; ?></span> to
                <span class="font-semibold text-slate-700"><?php echo min($offset + $limit, $totalPrescriptions); ?></span> of
                <span class="font-semibold text-slate-700"><?php echo $totalPrescriptions; ?></span> prescriptions
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
<!-- NEW PRESCRIPTION MODAL                                       -->
<!-- ============================================================ -->
<div id="newPrescriptionModal" class="hidden fixed inset-0 bg-slate-900/50 backdrop-blur-sm z-50 items-center justify-center p-4">
    <div class="bg-white rounded-2xl shadow-xl w-full max-w-3xl max-h-[90vh] overflow-y-auto">
        <div class="flex items-center justify-between px-6 py-4 border-b border-slate-200 sticky top-0 bg-white rounded-t-2xl">
            <h3 class="font-bold text-slate-900 flex items-center gap-2">
                <i class="fa-solid fa-prescription-bottle text-brand-medium"></i>
                New Electronic Prescription
            </h3>
            <button onclick="closeModal('newPrescriptionModal')" class="w-8 h-8 rounded-lg hover:bg-slate-100 flex items-center justify-center text-slate-400 hover:text-slate-600 transition">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>
        <form id="newPrescriptionForm" class="p-6 space-y-4" onsubmit="savePrescription(event)">
            <!-- Patient & Doctor -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">Patient</label>
                    <select id="rx_patient" required class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm bg-white focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none">
                        <option value="">Select Patient</option>
                        <?php foreach ($patients as $p): ?>
                            <option value="<?php echo $p['id']; ?>"><?php echo $p['name']; ?> (<?php echo $p['patient_id']; ?>)</option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">Doctor</label>
                    <select id="rx_doctor" required class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm bg-white focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none">
                        <option value="">Select Doctor</option>
                        <?php foreach ($doctors as $d): ?>
                            <option value="<?php echo $d['id']; ?>"><?php echo $d['name']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            
            <!-- Date -->
            <div>
                <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">Prescription Date</label>
                <input type="date" id="rx_date" required class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none">
            </div>

            <!-- Drug Selection -->
            <div>
                <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">Add Medication</label>
                <div class="flex gap-2">
                    <select id="rx_drug_select" class="flex-1 px-3 py-2 border border-slate-200 rounded-lg text-sm bg-white focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none">
                        <option value="">Search or select drug...</option>
                        <?php foreach ($drugs as $d): ?>
                            <option value="<?php echo $d['id']; ?>" data-name="<?php echo $d['name']; ?>" data-strength="<?php echo $d['strength']; ?>">
                                <?php echo $d['name']; ?> <?php echo $d['strength']; ?> (<?php echo $d['category']; ?>)
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <button type="button" onclick="addMedicationToPrescription()" class="px-4 py-2 bg-brand-dark text-white rounded-lg hover:bg-brand-medium transition text-sm font-semibold whitespace-nowrap">
                        <i class="fa-solid fa-plus mr-1"></i> Add
                    </button>
                </div>
            </div>

            <!-- Medication List -->
            <div>
                <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">Medications</label>
                <div id="rxMedicationList" class="space-y-2 max-h-48 overflow-y-auto">
                    <!-- Medication items will be added here -->
                    <div class="text-center py-4 text-slate-400 text-sm" id="rxEmptyMedication">
                        <i class="fa-solid fa-capsules text-2xl block mb-2"></i>
                        No medications added yet
                    </div>
                </div>
            </div>

            <!-- Dosage Management - Per Medication (hidden until medication is added) -->
            <div id="dosageSection" class="hidden bg-slate-50 rounded-xl p-4 border border-slate-200">
                <h4 class="text-xs font-bold text-slate-700 uppercase tracking-wide mb-3">Dosage Management</h4>
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
                    <div>
                        <label class="block text-[10px] font-semibold text-slate-500 mb-1">Dosage</label>
                        <input type="text" id="rx_dosage" placeholder="e.g. 5mg" class="w-full px-3 py-1.5 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none">
                    </div>
                    <div>
                        <label class="block text-[10px] font-semibold text-slate-500 mb-1">Frequency</label>
                        <select id="rx_frequency" class="w-full px-3 py-1.5 border border-slate-200 rounded-lg text-sm bg-white focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none">
                            <option value="Once daily">Once daily</option>
                            <option value="Twice daily">Twice daily</option>
                            <option value="Three times daily">Three times daily</option>
                            <option value="Four times daily">Four times daily</option>
                            <option value="Every 4 hours">Every 4 hours</option>
                            <option value="Every 6 hours">Every 6 hours</option>
                            <option value="Every 8 hours">Every 8 hours</option>
                            <option value="As needed">As needed</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-[10px] font-semibold text-slate-500 mb-1">Duration</label>
                        <select id="rx_duration" class="w-full px-3 py-1.5 border border-slate-200 rounded-lg text-sm bg-white focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none">
                            <option value="3 days">3 days</option>
                            <option value="5 days">5 days</option>
                            <option value="7 days">7 days</option>
                            <option value="10 days">10 days</option>
                            <option value="14 days">14 days</option>
                            <option value="30 days" selected>30 days</option>
                            <option value="60 days">60 days</option>
                            <option value="90 days">90 days</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Notes -->
            <div>
                <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">Notes / Instructions</label>
                <textarea id="rx_notes" rows="2" class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none" placeholder="Additional instructions for the patient..."></textarea>
            </div>

            <div class="flex justify-end gap-2 pt-2 border-t border-slate-100">
                <button type="button" onclick="closeModal('newPrescriptionModal')"
                        class="px-4 py-2 bg-white border border-slate-200 text-slate-600 rounded-lg hover:bg-slate-50 transition text-sm font-semibold">
                    Cancel
                </button>
                <button type="submit"
                        class="px-4 py-2 bg-brand-dark text-white rounded-lg hover:bg-brand-medium transition text-sm font-semibold">
                    <i class="fa-solid fa-prescription mr-1.5"></i> Create Prescription
                </button>
            </div>
        </form>
    </div>
</div>

<!-- ============================================================ -->
<!-- VIEW PRESCRIPTION MODAL                                      -->
<!-- ============================================================ -->
<div id="viewPrescriptionModal" class="hidden fixed inset-0 bg-slate-900/50 backdrop-blur-sm z-50 items-center justify-center p-4">
    <div class="bg-white rounded-2xl shadow-xl w-full max-w-2xl max-h-[90vh] overflow-y-auto">
        <div class="flex items-center justify-between px-6 py-4 border-b border-slate-200 sticky top-0 bg-white rounded-t-2xl">
            <h3 class="font-bold text-slate-900">Prescription Details</h3>
            <button onclick="closeModal('viewPrescriptionModal')" class="w-8 h-8 rounded-lg hover:bg-slate-100 flex items-center justify-center text-slate-400 hover:text-slate-600 transition">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>
        <div id="prescriptionDetailsContent" class="p-6">
            <div class="flex items-center justify-center py-10 text-slate-400 text-sm">
                <i class="fa-solid fa-spinner fa-spin mr-2"></i> Loading...
            </div>
        </div>
    </div>
</div>

<!-- ============================================================ -->
<!-- EDIT PRESCRIPTION MODAL                                      -->
<!-- ============================================================ -->
<div id="editPrescriptionModal" class="hidden fixed inset-0 bg-slate-900/50 backdrop-blur-sm z-50 items-center justify-center p-4">
    <div class="bg-white rounded-2xl shadow-xl w-full max-w-3xl max-h-[90vh] overflow-y-auto">
        <div class="flex items-center justify-between px-6 py-4 border-b border-slate-200 sticky top-0 bg-white rounded-t-2xl">
            <h3 class="font-bold text-slate-900">Edit Prescription</h3>
            <button onclick="closeModal('editPrescriptionModal')" class="w-8 h-8 rounded-lg hover:bg-slate-100 flex items-center justify-center text-slate-400 hover:text-slate-600 transition">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>
        <form id="editPrescriptionForm" class="p-6 space-y-4" onsubmit="saveEditedPrescription(event)">
            <input type="hidden" id="edit_rx_id">
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">Patient</label>
                    <input type="text" id="edit_rx_patient" readonly class="w-full px-3 py-2 bg-slate-50 border border-slate-200 rounded-lg text-sm text-slate-600 outline-none cursor-not-allowed">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">Doctor</label>
                    <select id="edit_rx_doctor" class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm bg-white focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none">
                        <?php foreach ($doctors as $d): ?>
                            <option value="<?php echo $d['name']; ?>"><?php echo $d['name']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div>
                <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">Date</label>
                <input type="date" id="edit_rx_date" class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none">
            </div>
            <div>
                <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">Status</label>
                <select id="edit_rx_status" class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm bg-white focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none">
                    <option value="pending">Pending</option>
                    <option value="dispensed">Dispensed</option>
                    <option value="cancelled">Cancelled</option>
                </select>
            </div>
            <div>
                <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">Notes</label>
                <textarea id="edit_rx_notes" rows="2" class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none"></textarea>
            </div>
            <div class="flex justify-end gap-2 pt-2 border-t border-slate-100">
                <button type="button" onclick="closeModal('editPrescriptionModal')"
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

<!-- Toast notification -->
<div id="toast" class="hidden fixed bottom-6 right-6 z-[60] px-4 py-3 rounded-lg shadow-lg text-sm font-semibold text-white flex items-center gap-2">
    <i class="fa-solid fa-circle-check"></i>
    <span id="toastMessage"></span>
</div>

<!-- ============================================================ -->
<!-- JAVASCRIPT                                                   -->
<!-- ============================================================ -->
<script>
    const PRESCRIPTIONS = <?php echo json_encode(array_column($prescriptions, null, 'id'), JSON_PRETTY_PRINT); ?>;
    const DRUGS = <?php echo json_encode($drugs, JSON_PRETTY_PRINT); ?>;
    let prescriptionMedications = [];

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
    // MEDICATION MANAGEMENT
    // ============================================================
    function addMedicationToPrescription() {
        const select = document.getElementById('rx_drug_select');
        const drugId = select.value;
        if (!drugId) {
            showToast('Please select a medication', 'warning');
            return;
        }

        const drug = DRUGS.find(d => d.id == drugId);
        if (!drug) return;

        const dosage = document.getElementById('rx_dosage').value.trim() || drug.strength;
        const frequency = document.getElementById('rx_frequency').value;
        const duration = document.getElementById('rx_duration').value;

        // Check if already added
        if (prescriptionMedications.some(m => m.name === drug.name && m.dosage === dosage)) {
            showToast('Medication already added', 'warning');
            return;
        }

        const medication = {
            id: drug.id,
            name: drug.name,
            dosage: dosage,
            frequency: frequency,
            duration: duration,
            quantity: calculateQuantity(frequency, duration)
        };

        prescriptionMedications.push(medication);
        renderMedicationList();
        
        // Reset dosage section
        document.getElementById('rx_dosage').value = '';
        select.value = '';
        
        showToast(drug.name + ' added to prescription', 'success');
    }

    function calculateQuantity(frequency, duration) {
        const freqMap = {
            'Once daily': 1,
            'Twice daily': 2,
            'Three times daily': 3,
            'Four times daily': 4,
            'Every 4 hours': 6,
            'Every 6 hours': 4,
            'Every 8 hours': 3,
            'As needed': 1
        };
        const days = parseInt(duration) || 30;
        return (freqMap[frequency] || 1) * days;
    }

    function renderMedicationList() {
        const container = document.getElementById('rxMedicationList');
        const emptyMsg = document.getElementById('rxEmptyMedication');
        
        if (prescriptionMedications.length === 0) {
            if (!emptyMsg) {
                container.innerHTML = `
                    <div class="text-center py-4 text-slate-400 text-sm" id="rxEmptyMedication">
                        <i class="fa-solid fa-capsules text-2xl block mb-2"></i>
                        No medications added yet
                    </div>
                `;
            }
            return;
        }

        container.innerHTML = prescriptionMedications.map((med, index) => `
            <div class="flex items-center justify-between p-3 bg-brand-light/40 rounded-lg border border-brand-border">
                <div class="flex-1">
                    <div class="flex items-center gap-3">
                        <span class="font-semibold text-slate-800 text-sm">${med.name}</span>
                        <span class="text-xs text-slate-500">${med.dosage}</span>
                        <span class="text-xs text-slate-400">•</span>
                        <span class="text-xs text-slate-500">${med.frequency}</span>
                        <span class="text-xs text-slate-400">•</span>
                        <span class="text-xs text-slate-500">${med.duration}</span>
                        <span class="text-xs text-brand-dark font-semibold">Qty: ${med.quantity}</span>
                    </div>
                </div>
                <button onclick="removeMedication(${index})" class="text-rose-500 hover:text-rose-700 transition text-sm px-2">
                    <i class="fa-solid fa-trash-can"></i>
                </button>
            </div>
        `).join('');
    }

    function removeMedication(index) {
        prescriptionMedications.splice(index, 1);
        renderMedicationList();
        showToast('Medication removed', 'info');
    }

    // ============================================================
    // VIEW PRESCRIPTION
    // ============================================================
    function viewPrescription(id) {
        openModal('viewPrescriptionModal');
        const p = PRESCRIPTIONS[id];
        if (!p) return;

        setTimeout(() => {
            const statusColors = {
                dispensed: 'bg-emerald-100 text-emerald-700',
                pending: 'bg-amber-100 text-amber-700',
                cancelled: 'bg-slate-100 text-slate-500'
            };

            const medsHtml = p.medications.map(m => `
                <div class="flex items-center justify-between p-2 bg-white rounded-lg border border-slate-200">
                    <div>
                        <p class="font-semibold text-slate-800 text-sm">${m.name}</p>
                        <p class="text-xs text-slate-500">${m.dosage} • ${m.frequency} • ${m.duration}</p>
                    </div>
                    <span class="text-xs font-semibold text-brand-dark">Qty: ${m.quantity}</span>
                </div>
            `).join('');

            document.getElementById('prescriptionDetailsContent').innerHTML = `
                <div class="space-y-4">
                    <div class="flex items-center gap-4 pb-4 border-b border-slate-200">
                        <div class="w-14 h-14 rounded-full bg-brand-light border border-brand-border flex items-center justify-center text-brand-dark font-bold text-lg flex-shrink-0">
                            ${p.patient_avatar}
                        </div>
                        <div>
                            <h4 class="text-lg font-bold text-slate-900">${p.patient_name}</h4>
                            <p class="text-sm text-slate-500">${p.prescription_id} • ${p.doctor_name}</p>
                            <span class="inline-block px-2 py-0.5 rounded-full text-xs font-semibold mt-1 ${statusColors[p.status] || statusColors.pending}">
                                ${p.status.toUpperCase()}
                            </span>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div><p class="text-xs text-slate-400 font-semibold">Date</p><p class="text-sm text-slate-800">${new Date(p.date).toLocaleDateString('en-US', { month: 'long', day: 'numeric', year: 'numeric' })}</p></div>
                        <div><p class="text-xs text-slate-400 font-semibold">Doctor</p><p class="text-sm text-slate-800">${p.doctor_name}</p></div>
                        ${p.dispensed_by ? `<div><p class="text-xs text-slate-400 font-semibold">Dispensed By</p><p class="text-sm text-slate-800">${p.dispensed_by}</p></div>` : ''}
                        ${p.dispensed_at ? `<div><p class="text-xs text-slate-400 font-semibold">Dispensed At</p><p class="text-sm text-slate-800">${p.dispensed_at}</p></div>` : ''}
                    </div>
                    <div class="bg-slate-50 rounded-xl p-4 border border-slate-200">
                        <h5 class="text-sm font-bold text-slate-700 mb-2">💊 Medications</h5>
                        <div class="space-y-2">${medsHtml}</div>
                    </div>
                    ${p.notes ? `<div class="bg-brand-light/40 rounded-xl p-4 border border-brand-border"><h5 class="text-sm font-bold text-slate-700 mb-2">Notes</h5><p class="text-sm text-slate-800">${p.notes}</p></div>` : ''}
                    <div class="flex justify-end gap-2 pt-2 border-t border-slate-200">
                        <button onclick="closeModal('viewPrescriptionModal')" class="px-4 py-2 bg-white border border-slate-200 text-slate-600 rounded-lg hover:bg-slate-50 transition text-sm font-semibold">Close</button>
                        ${p.status === 'pending' ? `<button onclick="closeModal('viewPrescriptionModal'); dispensePrescription(${p.id})" class="px-4 py-2 bg-emerald-600 text-white rounded-lg hover:bg-emerald-700 transition text-sm font-semibold"><i class="fa-solid fa-check mr-1.5"></i> Dispense</button>` : ''}
                    </div>
                </div>
            `;
        }, 300);
    }

    // ============================================================
    // DISPENSE PRESCRIPTION
    // ============================================================
    function dispensePrescription(id) {
        if (confirm('Dispense this prescription?')) {
            const p = PRESCRIPTIONS[id];
            if (p) {
                p.status = 'dispensed';
                p.dispensed_by = 'Pharmacist ' + ['Maria Cruz', 'Anna Reyes', 'Jose Santos'][Math.floor(Math.random() * 3)];
                p.dispensed_at = new Date().toLocaleString('en-US', { 
                    month: 'short', 
                    day: 'numeric', 
                    year: 'numeric',
                    hour: '2-digit',
                    minute: '2-digit'
                });
                updatePrescriptionRow(p);
                showToast('Prescription #' + p.prescription_id + ' dispensed successfully!', 'success');
            }
        }
    }

    function updatePrescriptionRow(p) {
        const rows = document.querySelectorAll('.prescription-row');
        rows.forEach(row => {
            const patientName = row.querySelector('.font-semibold.text-slate-800.text-sm')?.textContent;
            if (patientName === p.patient_name) {
                const statusBadge = row.querySelector('.px-2.py-1.rounded-full');
                const statusClasses = {
                    dispensed: 'bg-emerald-100 text-emerald-700',
                    pending: 'bg-amber-100 text-amber-700',
                    cancelled: 'bg-slate-100 text-slate-500'
                };
                statusBadge.className = `px-2 py-1 rounded-full text-xs font-semibold ${statusClasses[p.status] || statusClasses.pending}`;
                statusBadge.textContent = p.status.charAt(0).toUpperCase() + p.status.slice(1);
            }
        });
    }

    // ============================================================
    // SAVE PRESCRIPTION
    // ============================================================
    function savePrescription(event) {
        event.preventDefault();
        if (prescriptionMedications.length === 0) {
            showToast('Please add at least one medication', 'warning');
            return;
        }
        showToast('Prescription created successfully!', 'success');
        prescriptionMedications = [];
        renderMedicationList();
        closeModal('newPrescriptionModal');
    }

    // ============================================================
    // EDIT PRESCRIPTION
    // ============================================================
    function editPrescription(id) {
        const p = PRESCRIPTIONS[id];
        if (!p) return;

        document.getElementById('edit_rx_id').value = p.id;
        document.getElementById('edit_rx_patient').value = p.patient_name;
        document.getElementById('edit_rx_doctor').value = p.doctor_name;
        document.getElementById('edit_rx_date').value = p.date;
        document.getElementById('edit_rx_status').value = p.status;
        document.getElementById('edit_rx_notes').value = p.notes || '';

        openModal('editPrescriptionModal');
    }

    function saveEditedPrescription(event) {
        event.preventDefault();
        const id = document.getElementById('edit_rx_id').value;
        const p = PRESCRIPTIONS[id];
        if (!p) return;

        p.doctor_name = document.getElementById('edit_rx_doctor').value;
        p.date = document.getElementById('edit_rx_date').value;
        p.status = document.getElementById('edit_rx_status').value;
        p.notes = document.getElementById('edit_rx_notes').value;

        updatePrescriptionRow(p);
        closeModal('editPrescriptionModal');
        showToast('Prescription updated successfully!', 'success');
    }

    // ============================================================
    // DELETE PRESCRIPTION
    // ============================================================
    function deletePrescription(id) {
        if (confirm('Are you sure you want to delete this prescription?')) {
            const p = PRESCRIPTIONS[id];
            if (p) {
                p.status = 'cancelled';
                updatePrescriptionRow(p);
                showToast('Prescription #' + p.prescription_id + ' cancelled.', 'success');
            }
        }
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
    document.getElementById('searchPrescription').addEventListener('input', filterPrescriptions);
    document.getElementById('filterStatus').addEventListener('change', filterPrescriptions);
    document.getElementById('filterPatient').addEventListener('change', filterPrescriptions);

    function filterPrescriptions() {
        const search = document.getElementById('searchPrescription').value.toLowerCase();
        const status = document.getElementById('filterStatus').value;
        const patient = document.getElementById('filterPatient').value.toLowerCase();
        let visibleCount = 0;

        document.querySelectorAll('.prescription-row').forEach(row => {
            const rowPatient = row.dataset.patient;
            const medications = row.dataset.medications;
            const rowStatus = row.dataset.status;

            const matchesSearch = rowPatient.includes(search) || (medications && medications.includes(search));
            const matchesStatus = !status || rowStatus === status;
            const matchesPatient = !patient || rowPatient === patient;
            const isVisible = matchesSearch && matchesStatus && matchesPatient;

            row.style.display = isVisible ? '' : 'none';
            if (isVisible) visibleCount++;
        });

        document.getElementById('emptyState').style.display = visibleCount === 0 ? 'flex' : 'none';
    }

    function resetFilters() {
        document.getElementById('searchPrescription').value = '';
        document.getElementById('filterStatus').value = '';
        document.getElementById('filterPatient').value = '';
        document.querySelectorAll('.prescription-row').forEach(row => row.style.display = '');
        document.getElementById('emptyState').style.display = 'none';
    }

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
    });

    // ============================================================
    // SET DEFAULT DATE
    // ============================================================
    document.addEventListener('DOMContentLoaded', function() {
        const dateInput = document.getElementById('rx_date');
        if (dateInput) {
            dateInput.value = new Date().toISOString().split('T')[0];
        }
    });
</script>

<?php include_once '../../includes/footer.php'; ?>