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

// Sample Inspectors Data
$inspectors = [
    ['id' => 1, 'name' => 'Juan Dela Cruz', 'specialty' => 'Food Safety'],
    ['id' => 2, 'name' => 'Maria Santos', 'specialty' => 'Environmental Health'],
    ['id' => 3, 'name' => 'Ana Reyes', 'specialty' => 'Building Safety'],
    ['id' => 4, 'name' => 'Carlos Lim', 'specialty' => 'General Sanitation'],
];

// Sample Permits Data (for dropdown reference)
$permits = [
    ['id' => 1, 'permit_id' => 'SP-1040', 'applicant' => 'ABC Restaurant', 'business_type' => 'Food Establishment'],
    ['id' => 2, 'permit_id' => 'SP-1041', 'applicant' => 'Green Market Stall', 'business_type' => 'Market Vendor'],
    ['id' => 3, 'permit_id' => 'SP-1042', 'applicant' => 'Fresh Bakes Co.', 'business_type' => 'Bakery'],
    ['id' => 4, 'permit_id' => 'SP-1043', 'applicant' => 'City Gym', 'business_type' => 'Recreational Facility'],
    ['id' => 5, 'permit_id' => 'SP-1044', 'applicant' => 'Mega Mart', 'business_type' => 'Retail Store'],
    ['id' => 6, 'permit_id' => 'SP-1045', 'applicant' => 'Sunrise Pharmacy', 'business_type' => 'Pharmacy'],
];

// Sample Inspections Data
$inspections = [
    [
        'id' => 1,
        'inspection_id' => 'INS-001',
        'permit_id' => 1,
        'permit_number' => 'SP-1040',
        'applicant' => 'ABC Restaurant',
        'business_type' => 'Food Establishment',
        'address' => '123 Rizal St., Barangay San Jose',
        'inspector_id' => 1,
        'inspector_name' => 'Juan Dela Cruz',
        'scheduled_date' => '2026-07-20',
        'scheduled_time' => '09:00 AM',
        'conducted_date' => '2026-07-20',
        'conducted_time' => '09:30 AM',
        'status' => 'completed',
        'findings' => [
            ['category' => 'Food Storage', 'status' => 'compliant', 'notes' => 'Proper temperature maintained'],
            ['category' => 'Sanitation', 'status' => 'compliant', 'notes' => 'All areas clean'],
            ['category' => 'Waste Disposal', 'status' => 'partially_compliant', 'notes' => 'Need proper segregation'],
        ],
        'overall_status' => 'partially_compliant',
        'recommendations' => 'Implement waste segregation system within 7 days',
        'follow_up_date' => '2026-07-27',
        'attachments' => ['inspection_photo_1.jpg', 'inspection_photo_2.jpg'],
        'notes' => 'Establishment generally compliant. Minor issues found.',
        'created_at' => '2026-07-15 08:00:00'
    ],
    [
        'id' => 2,
        'inspection_id' => 'INS-002',
        'permit_id' => 2,
        'permit_number' => 'SP-1041',
        'applicant' => 'Green Market Stall',
        'business_type' => 'Market Vendor',
        'address' => '456 Mabini Ave., Barangay Poblacion',
        'inspector_id' => 2,
        'inspector_name' => 'Maria Santos',
        'scheduled_date' => '2026-07-22',
        'scheduled_time' => '10:00 AM',
        'conducted_date' => null,
        'conducted_time' => null,
        'status' => 'scheduled',
        'findings' => [],
        'overall_status' => null,
        'recommendations' => '',
        'follow_up_date' => null,
        'attachments' => [],
        'notes' => 'Initial inspection scheduled',
        'created_at' => '2026-07-16 09:30:00'
    ],
    [
        'id' => 3,
        'inspection_id' => 'INS-003',
        'permit_id' => 4,
        'permit_number' => 'SP-1043',
        'applicant' => 'City Gym',
        'business_type' => 'Recreational Facility',
        'address' => '101 Luna St., Barangay San Roque',
        'inspector_id' => 3,
        'inspector_name' => 'Ana Reyes',
        'scheduled_date' => '2026-07-18',
        'scheduled_time' => '02:00 PM',
        'conducted_date' => '2026-07-18',
        'conducted_time' => '02:30 PM',
        'status' => 'completed',
        'findings' => [
            ['category' => 'Building Safety', 'status' => 'non_compliant', 'notes' => 'Fire exits blocked'],
            ['category' => 'Sanitation', 'status' => 'non_compliant', 'notes' => 'Bathroom facilities unsanitary'],
            ['category' => 'Equipment Safety', 'status' => 'non_compliant', 'notes' => 'Expired safety equipment'],
        ],
        'overall_status' => 'non_compliant',
        'recommendations' => 'Immediate corrective action required. Clear fire exits, sanitize bathrooms, replace safety equipment.',
        'follow_up_date' => '2026-07-25',
        'attachments' => ['violation_photo_1.jpg', 'violation_photo_2.jpg'],
        'notes' => 'Multiple violations found. Follow-up inspection required.',
        'created_at' => '2026-07-16 14:15:00'
    ],
    [
        'id' => 4,
        'inspection_id' => 'INS-004',
        'permit_id' => 3,
        'permit_number' => 'SP-1042',
        'applicant' => 'Fresh Bakes Co.',
        'business_type' => 'Bakery',
        'address' => '789 Bonifacio Rd., Barangay Riverside',
        'inspector_id' => 1,
        'inspector_name' => 'Juan Dela Cruz',
        'scheduled_date' => '2026-07-25',
        'scheduled_time' => '11:00 AM',
        'conducted_date' => null,
        'conducted_time' => null,
        'status' => 'scheduled',
        'findings' => [],
        'overall_status' => null,
        'recommendations' => '',
        'follow_up_date' => null,
        'attachments' => [],
        'notes' => 'Follow-up inspection for waste segregation',
        'created_at' => '2026-07-17 10:00:00'
    ],
    [
        'id' => 5,
        'inspection_id' => 'INS-005',
        'permit_id' => 5,
        'permit_number' => 'SP-1044',
        'applicant' => 'Mega Mart',
        'business_type' => 'Retail Store',
        'address' => '202 Santos St., Barangay Sta. Cruz',
        'inspector_id' => 4,
        'inspector_name' => 'Carlos Lim',
        'scheduled_date' => '2026-07-15',
        'scheduled_time' => '08:30 AM',
        'conducted_date' => '2026-07-15',
        'conducted_time' => '09:00 AM',
        'status' => 'completed',
        'findings' => [
            ['category' => 'Sanitation', 'status' => 'compliant', 'notes' => 'All areas clean and organized'],
            ['category' => 'Waste Disposal', 'status' => 'compliant', 'notes' => 'Proper waste segregation observed'],
            ['category' => 'Storage', 'status' => 'compliant', 'notes' => 'Stock properly arranged'],
        ],
        'overall_status' => 'compliant',
        'recommendations' => 'Continue maintaining current sanitation standards',
        'follow_up_date' => null,
        'attachments' => ['inspection_report.pdf'],
        'notes' => 'Fully compliant establishment',
        'created_at' => '2026-07-14 16:30:00'
    ],
    [
        'id' => 6,
        'inspection_id' => 'INS-006',
        'permit_id' => 6,
        'permit_number' => 'SP-1045',
        'applicant' => 'Sunrise Pharmacy',
        'business_type' => 'Pharmacy',
        'address' => '303 Rizal St., Barangay San Jose',
        'inspector_id' => 2,
        'inspector_name' => 'Maria Santos',
        'scheduled_date' => '2026-07-19',
        'scheduled_time' => '10:30 AM',
        'conducted_date' => null,
        'conducted_time' => null,
        'status' => 'cancelled',
        'findings' => [],
        'overall_status' => null,
        'recommendations' => '',
        'follow_up_date' => null,
        'attachments' => [],
        'notes' => 'Cancelled - applicant requested reschedule',
        'created_at' => '2026-07-16 08:45:00'
    ],
];

// Pagination
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$limit = 5;
$offset = ($page - 1) * $limit;
$totalInspections = count($inspections);
$totalPages = ceil($totalInspections / $limit);
$paginatedInspections = array_slice($inspections, $offset, $limit);

$title = 'Inspections';

// Stats
$totalScheduled = count(array_filter($inspections, fn($i) => $i['status'] === 'scheduled'));
$totalCompleted = count(array_filter($inspections, fn($i) => $i['status'] === 'completed'));
$totalCancelled = count(array_filter($inspections, fn($i) => $i['status'] === 'cancelled'));
$totalFollowUps = count(array_filter($inspections, fn($i) => $i['follow_up_date'] && $i['status'] !== 'cancelled'));
$totalNonCompliant = count(array_filter($inspections, fn($i) => $i['overall_status'] === 'non_compliant'));
?>

<!-- ============================================================ -->
<!-- 2. HTML + PHP EMBEDDED + Tailwind CSS                       -->
<!-- ============================================================ -->

<div class="flex-1 px-6 pt-[26px] pb-20 mb-10 flex flex-col min-h-0 overflow-hidden">

    <!-- Page Header -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6">
        <div>
            <h2 class="text-2xl font-black text-slate-900 tracking-tight">Inspections</h2>
            <p class="text-sm text-slate-500 mt-0.5">Schedule, conduct, and manage inspections</p>
        </div>
        <div class="flex gap-3">
            <button onclick="openModal('scheduleInspectionModal')"
                    class="px-4 py-2 bg-brand-dark text-white rounded-lg hover:bg-brand-medium transition-colors text-sm font-semibold flex items-center gap-2 shadow-sm">
                <i class="fa-solid fa-calendar-plus text-xs"></i> Schedule Inspection
            </button>
        </div>
    </div>

    <!-- ============================================================ -->
<!-- MODERN KPI CARDS - Updated to match design               -->
<!-- ============================================================ -->
<div class="grid grid-cols-2 md:grid-cols-5 gap-4 mb-6">
    <!-- Card 1: Total Inspections -->
    <div class="relative overflow-hidden bg-white rounded-2xl shadow-sm border border-slate-200 p-5 hover:shadow-lg transition group">
        <div class="absolute -top-12 -right-12 w-24 h-24 bg-blue-100 rounded-full opacity-50 group-hover:scale-110 transition"></div>
        <div class="relative">
            <div class="flex items-center gap-3">
                <div class="w-11 h-11 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl flex items-center justify-center text-white shadow-lg shadow-blue-200">
                    <i class="fa-solid fa-clipboard-list text-lg"></i>
                </div>
                <div>
                    <p class="text-2xl font-black text-slate-900"><?php echo $totalInspections; ?></p>
                    <p class="text-xs font-medium text-slate-500">Total Inspections</p>
                </div>
            </div>
            <div class="mt-3 flex items-center gap-2">
                <span class="px-2 py-0.5 bg-blue-100 text-blue-700 rounded-full text-[10px] font-bold">📋 All inspections</span>
                <span class="text-[10px] text-slate-400"><?php echo $totalCompleted; ?> completed</span>
            </div>
        </div>
    </div>

    <!-- Card 2: Scheduled -->
    <div class="relative overflow-hidden bg-white rounded-2xl shadow-sm border border-slate-200 p-5 hover:shadow-lg transition group">
        <div class="absolute -top-12 -right-12 w-24 h-24 bg-blue-100 rounded-full opacity-50 group-hover:scale-110 transition"></div>
        <div class="relative">
            <div class="flex items-center gap-3">
                <div class="w-11 h-11 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl flex items-center justify-center text-white shadow-lg shadow-blue-200">
                    <i class="fa-solid fa-calendar-check text-lg"></i>
                </div>
                <div>
                    <p class="text-2xl font-black text-blue-600"><?php echo $totalScheduled; ?></p>
                    <p class="text-xs font-medium text-slate-500">Scheduled</p>
                </div>
            </div>
            <div class="mt-3 flex items-center gap-2">
                <span class="px-2 py-0.5 bg-blue-100 text-blue-700 rounded-full text-[10px] font-bold">📅 Upcoming</span>
                <span class="text-[10px] text-slate-400">Awaiting conduct</span>
            </div>
        </div>
    </div>

    <!-- Card 3: Completed -->
    <div class="relative overflow-hidden bg-white rounded-2xl shadow-sm border border-slate-200 p-5 hover:shadow-lg transition group">
        <div class="absolute -top-12 -right-12 w-24 h-24 bg-emerald-100 rounded-full opacity-50 group-hover:scale-110 transition"></div>
        <div class="relative">
            <div class="flex items-center gap-3">
                <div class="w-11 h-11 bg-gradient-to-br from-emerald-500 to-emerald-600 rounded-xl flex items-center justify-center text-white shadow-lg shadow-emerald-200">
                    <i class="fa-solid fa-check-circle text-lg"></i>
                </div>
                <div>
                    <p class="text-2xl font-black text-emerald-600"><?php echo $totalCompleted; ?></p>
                    <p class="text-xs font-medium text-slate-500">Completed</p>
                </div>
            </div>
            <div class="mt-3 flex items-center gap-2">
                <span class="px-2 py-0.5 bg-emerald-100 text-emerald-700 rounded-full text-[10px] font-bold">✅ Done</span>
                <span class="text-[10px] text-slate-400">Successfully finished</span>
            </div>
        </div>
    </div>

    <!-- Card 4: Follow-ups -->
    <div class="relative overflow-hidden bg-white rounded-2xl shadow-sm border border-slate-200 p-5 hover:shadow-lg transition group">
        <div class="absolute -top-12 -right-12 w-24 h-24 bg-amber-100 rounded-full opacity-50 group-hover:scale-110 transition"></div>
        <div class="relative">
            <div class="flex items-center gap-3">
                <div class="w-11 h-11 bg-gradient-to-br from-amber-500 to-amber-600 rounded-xl flex items-center justify-center text-white shadow-lg shadow-amber-200">
                    <i class="fa-solid fa-arrow-rotate-right text-lg"></i>
                </div>
                <div>
                    <p class="text-2xl font-black text-amber-600"><?php echo $totalFollowUps; ?></p>
                    <p class="text-xs font-medium text-slate-500">Follow-ups</p>
                </div>
            </div>
            <div class="mt-3 flex items-center gap-2">
                <span class="px-2 py-0.5 bg-amber-100 text-amber-700 rounded-full text-[10px] font-bold">🔄 Pending</span>
                <span class="text-[10px] text-slate-400">Needs re-inspection</span>
            </div>
        </div>
    </div>

    <!-- Card 5: Non-Compliant -->
    <div class="relative overflow-hidden bg-white rounded-2xl shadow-sm border border-slate-200 p-5 hover:shadow-lg transition group">
        <div class="absolute -top-12 -right-12 w-24 h-24 bg-rose-100 rounded-full opacity-50 group-hover:scale-110 transition"></div>
        <div class="relative">
            <div class="flex items-center gap-3">
                <div class="w-11 h-11 bg-gradient-to-br from-rose-500 to-rose-600 rounded-xl flex items-center justify-center text-white shadow-lg shadow-rose-200">
                    <i class="fa-solid fa-triangle-exclamation text-lg"></i>
                </div>
                <div>
                    <p class="text-2xl font-black text-rose-600"><?php echo $totalNonCompliant; ?></p>
                    <p class="text-xs font-medium text-slate-500">Non-Compliant</p>
                </div>
            </div>
            <div class="mt-3 flex items-center gap-2">
                <span class="px-2 py-0.5 bg-rose-100 text-rose-700 rounded-full text-[10px] font-bold">🚨 Violations</span>
                <span class="text-[10px] text-slate-400">Immediate action</span>
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
                       id="searchInspection"
                       placeholder="Search by applicant, permit ID, or inspector..."
                       class="w-full pl-9 pr-4 py-2 border border-slate-200 rounded-lg focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none text-sm transition">
            </div>
            <div class="flex gap-2 flex-wrap">
                <select id="filterStatus" class="px-4 py-2 border border-slate-200 rounded-lg focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none text-sm bg-white">
                    <option value="">All Status</option>
                    <option value="scheduled">Scheduled</option>
                    <option value="completed">Completed</option>
                    <option value="cancelled">Cancelled</option>
                </select>
                <select id="filterResult" class="px-4 py-2 border border-slate-200 rounded-lg focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none text-sm bg-white">
                    <option value="">All Results</option>
                    <option value="compliant">Compliant</option>
                    <option value="partially_compliant">Partially Compliant</option>
                    <option value="non_compliant">Non-Compliant</option>
                </select>
                <select id="filterInspector" class="px-4 py-2 border border-slate-200 rounded-lg focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none text-sm bg-white">
                    <option value="">All Inspectors</option>
                    <?php foreach ($inspectors as $i): ?>
                        <option value="<?php echo $i['name']; ?>"><?php echo $i['name']; ?></option>
                    <?php endforeach; ?>
                </select>
                <button onclick="resetFilters()" title="Reset filters"
                        class="px-3 py-2 bg-slate-100 text-slate-500 rounded-lg hover:bg-slate-200 hover:text-slate-700 transition-colors text-sm">
                    <i class="fa-solid fa-rotate-right"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- Inspections Table -->
    <div class="bg-white rounded-xl shadow-xs border border-slate-200 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead class="bg-slate-50 border-b border-slate-200">
                    <tr>
                        <th class="px-4 py-3 text-left text-[10px] font-bold text-slate-500 uppercase tracking-wider">Inspection ID</th>
                        <th class="px-4 py-3 text-left text-[10px] font-bold text-slate-500 uppercase tracking-wider">Permit/Applicant</th>
                        <th class="px-4 py-3 text-left text-[10px] font-bold text-slate-500 uppercase tracking-wider">Inspector</th>
                        <th class="px-4 py-3 text-left text-[10px] font-bold text-slate-500 uppercase tracking-wider">Scheduled Date</th>
                        <th class="px-4 py-3 text-left text-[10px] font-bold text-slate-500 uppercase tracking-wider">Status</th>
                        <th class="px-4 py-3 text-left text-[10px] font-bold text-slate-500 uppercase tracking-wider">Result</th>
                        <th class="px-4 py-3 text-center text-[10px] font-bold text-slate-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody id="inspectionTableBody">
                    <?php foreach ($paginatedInspections as $inspection): ?>
                    <tr class="border-b border-slate-100 hover:bg-brand-light/40 transition-colors inspection-row"
                        data-applicant="<?php echo strtolower($inspection['applicant']); ?>"
                        data-inspector="<?php echo strtolower($inspection['inspector_name']); ?>"
                        data-status="<?php echo $inspection['status']; ?>"
                        data-result="<?php echo $inspection['overall_status'] ?? ''; ?>">
                        <td class="px-4 py-3 font-mono text-xs text-brand-dark font-semibold"><?php echo $inspection['inspection_id']; ?></td>
                        <td class="px-4 py-3">
                            <div>
                                <p class="font-semibold text-slate-800 text-sm"><?php echo $inspection['applicant']; ?></p>
                                <p class="text-xs text-slate-400"><?php echo $inspection['permit_number']; ?> • <?php echo $inspection['business_type']; ?></p>
                            </div>
                        </td>
                        <td class="px-4 py-3 text-slate-600 text-xs"><?php echo $inspection['inspector_name']; ?></td>
                        <td class="px-4 py-3 text-slate-600 text-xs">
                            <?php echo date('M d, Y', strtotime($inspection['scheduled_date'])); ?>
                            <br><span class="text-[10px] text-slate-400"><?php echo $inspection['scheduled_time']; ?></span>
                        </td>
                        <td class="px-4 py-3">
                            <?php
                                $statusColors = [
                                    'scheduled' => 'bg-blue-100 text-blue-700',
                                    'completed' => 'bg-emerald-100 text-emerald-700',
                                    'cancelled' => 'bg-slate-100 text-slate-500'
                                ];
                            ?>
                            <span class="px-2 py-1 rounded-full text-xs font-semibold <?php echo $statusColors[$inspection['status']] ?? $statusColors['scheduled']; ?>">
                                <?php echo ucfirst($inspection['status']); ?>
                            </span>
                        </td>
                        <td class="px-4 py-3">
                            <?php if ($inspection['overall_status']): ?>
                                <?php
                                    $resultColors = [
                                        'compliant' => 'bg-emerald-100 text-emerald-700',
                                        'partially_compliant' => 'bg-amber-100 text-amber-700',
                                        'non_compliant' => 'bg-rose-100 text-rose-700'
                                    ];
                                ?>
                                <span class="px-2 py-1 rounded-full text-xs font-semibold <?php echo $resultColors[$inspection['overall_status']] ?? $resultColors['partially_compliant']; ?>">
                                    <?php echo str_replace('_', ' ', ucfirst($inspection['overall_status'])); ?>
                                </span>
                            <?php else: ?>
                                <span class="text-xs text-slate-400">—</span>
                            <?php endif; ?>
                        </td>
                        <td class="px-4 py-3">
                            <div class="flex items-center justify-center gap-1">
                                <button onclick="viewInspection(<?php echo $inspection['id']; ?>)"
                                        class="p-1.5 text-brand-medium hover:bg-brand-light rounded-lg transition" title="View">
                                    <i class="fa-solid fa-eye text-sm"></i>
                                </button>
                                <?php if ($inspection['status'] === 'scheduled'): ?>
                                    <button onclick="conductInspection(<?php echo $inspection['id']; ?>)"
                                            class="p-1.5 text-emerald-600 hover:bg-emerald-50 rounded-lg transition" title="Conduct">
                                        <i class="fa-solid fa-clipboard-check text-sm"></i>
                                    </button>
                                <?php endif; ?>
                                <?php if ($inspection['follow_up_date'] && $inspection['status'] !== 'cancelled'): ?>
                                    <button onclick="viewFollowUp(<?php echo $inspection['id']; ?>)"
                                            class="p-1.5 text-amber-600 hover:bg-amber-50 rounded-lg transition" title="Follow-up">
                                        <i class="fa-solid fa-arrow-rotate-right text-sm"></i>
                                    </button>
                                <?php endif; ?>
                                <button onclick="editInspection(<?php echo $inspection['id']; ?>)"
                                        class="p-1.5 text-slate-500 hover:bg-slate-100 hover:text-slate-700 rounded-lg transition" title="Edit">
                                    <i class="fa-solid fa-pen text-sm"></i>
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
                <i class="fa-solid fa-clipboard-list text-slate-400"></i>
            </div>
            <p class="text-sm font-semibold text-slate-600">No inspections match your filters</p>
            <p class="text-xs text-slate-400 mt-1">Try adjusting your search or clearing filters</p>
            <button onclick="resetFilters()" class="mt-3 text-xs font-semibold text-brand-medium hover:text-brand-dark">Clear all filters</button>
        </div>

        <!-- Pagination -->
        <div class="px-4 py-3 border-t border-slate-200 flex flex-col sm:flex-row justify-between items-center gap-3 bg-slate-50">
            <p class="text-xs text-slate-500">
                Showing <span class="font-semibold text-slate-700"><?php echo $offset + 1; ?></span> to
                <span class="font-semibold text-slate-700"><?php echo min($offset + $limit, $totalInspections); ?></span> of
                <span class="font-semibold text-slate-700"><?php echo $totalInspections; ?></span> inspections
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
<!-- SCHEDULE INSPECTION MODAL                                    -->
<!-- ============================================================ -->
<div id="scheduleInspectionModal" class="hidden fixed inset-0 bg-slate-900/50 backdrop-blur-sm z-50 items-center justify-center p-4">
    <div class="bg-white rounded-2xl shadow-xl w-full max-w-lg max-h-[90vh] overflow-y-auto">
        <div class="flex items-center justify-between px-6 py-4 border-b border-slate-200 sticky top-0 bg-white rounded-t-2xl">
            <h3 class="font-bold text-slate-900 flex items-center gap-2">
                <i class="fa-solid fa-calendar-plus text-brand-medium"></i>
                Schedule Inspection
            </h3>
            <button onclick="closeModal('scheduleInspectionModal')" class="w-8 h-8 rounded-lg hover:bg-slate-100 flex items-center justify-center text-slate-400 hover:text-slate-600 transition">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>
        <form id="scheduleInspectionForm" class="p-6 space-y-4" onsubmit="saveScheduledInspection(event)">
            <div>
                <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">Permit/Applicant</label>
                <select id="insp_permit" required class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm bg-white focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none">
                    <option value="">Select Permit</option>
                    <?php foreach ($permits as $p): ?>
                        <option value="<?php echo $p['id']; ?>"><?php echo $p['permit_id']; ?> - <?php echo $p['applicant']; ?> (<?php echo $p['business_type']; ?>)</option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div>
                <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">Inspector</label>
                <select id="insp_inspector" required class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm bg-white focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none">
                    <option value="">Select Inspector</option>
                    <?php foreach ($inspectors as $i): ?>
                        <option value="<?php echo $i['id']; ?>"><?php echo $i['name']; ?> (<?php echo $i['specialty']; ?>)</option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">Date</label>
                    <input type="date" id="insp_date" required class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">Time</label>
                    <input type="time" id="insp_time" required class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none">
                </div>
            </div>
            <div>
                <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">Notes</label>
                <textarea id="insp_notes" rows="2" class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none" placeholder="Additional notes..."></textarea>
            </div>
            <div class="flex justify-end gap-2 pt-2 border-t border-slate-100">
                <button type="button" onclick="closeModal('scheduleInspectionModal')"
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
<!-- CONDUCT INSPECTION MODAL                                     -->
<!-- ============================================================ -->
<div id="conductInspectionModal" class="hidden fixed inset-0 bg-slate-900/50 backdrop-blur-sm z-50 items-center justify-center p-4">
    <div class="bg-white rounded-2xl shadow-xl w-full max-w-2xl max-h-[90vh] overflow-y-auto">
        <div class="flex items-center justify-between px-6 py-4 border-b border-slate-200 sticky top-0 bg-white rounded-t-2xl">
            <h3 class="font-bold text-slate-900 flex items-center gap-2">
                <i class="fa-solid fa-clipboard-check text-brand-medium"></i>
                Conduct Inspection
            </h3>
            <button onclick="closeModal('conductInspectionModal')" class="w-8 h-8 rounded-lg hover:bg-slate-100 flex items-center justify-center text-slate-400 hover:text-slate-600 transition">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>
        <form id="conductInspectionForm" class="p-6 space-y-4" onsubmit="saveConductedInspection(event)">
            <input type="hidden" id="conduct_inspection_id">
            <div class="flex items-center gap-3 p-3 bg-brand-light/40 rounded-xl border border-brand-border">
                <div>
                    <p id="conductApplicant" class="font-semibold text-slate-800 text-sm">ABC Restaurant</p>
                    <p id="conductPermit" class="text-xs text-slate-400">SP-1040</p>
                    <p id="conductAddress" class="text-xs text-slate-400">123 Rizal St.</p>
                </div>
            </div>
            
            <div>
                <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">Findings</label>
                <div class="space-y-3" id="findingsContainer">
                    <div class="finding-item p-3 bg-slate-50 rounded-lg border border-slate-200">
                        <div class="grid grid-cols-3 gap-2">
                            <div>
                                <label class="block text-[10px] font-semibold text-slate-500 mb-1">Category</label>
                                <input type="text" class="finding-category w-full px-2 py-1 border border-slate-200 rounded text-sm focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none" placeholder="e.g. Sanitation" value="Sanitation">
                            </div>
                            <div>
                                <label class="block text-[10px] font-semibold text-slate-500 mb-1">Status</label>
                                <select class="finding-status w-full px-2 py-1 border border-slate-200 rounded text-sm bg-white focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none">
                                    <option value="compliant">Compliant</option>
                                    <option value="partially_compliant">Partially Compliant</option>
                                    <option value="non_compliant">Non-Compliant</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-[10px] font-semibold text-slate-500 mb-1">Notes</label>
                                <input type="text" class="finding-notes w-full px-2 py-1 border border-slate-200 rounded text-sm focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none" placeholder="Details...">
                            </div>
                        </div>
                    </div>
                </div>
                <button type="button" onclick="addFinding()" class="mt-2 text-xs font-semibold text-brand-medium hover:text-brand-dark transition">
                    <i class="fa-solid fa-plus mr-1"></i> Add Finding
                </button>
            </div>
            
            <div>
                <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">Overall Status</label>
                <select id="conduct_overall" required class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm bg-white focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none">
                    <option value="compliant">Compliant</option>
                    <option value="partially_compliant">Partially Compliant</option>
                    <option value="non_compliant">Non-Compliant</option>
                </select>
            </div>
            <div>
                <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">Recommendations</label>
                <textarea id="conduct_recommendations" rows="2" class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none"></textarea>
            </div>
            <div>
                <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">Follow-up Date (if needed)</label>
                <input type="date" id="conduct_follow_up" class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none">
            </div>
            <div>
                <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">Notes</label>
                <textarea id="conduct_notes" rows="2" class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none"></textarea>
            </div>

            <div class="flex justify-end gap-2 pt-2 border-t border-slate-100">
                <button type="button" onclick="closeModal('conductInspectionModal')"
                        class="px-4 py-2 bg-white border border-slate-200 text-slate-600 rounded-lg hover:bg-slate-50 transition text-sm font-semibold">
                    Cancel
                </button>
                <button type="submit"
                        class="px-4 py-2 bg-brand-dark text-white rounded-lg hover:bg-brand-medium transition text-sm font-semibold">
                    <i class="fa-solid fa-check mr-1.5"></i> Submit Report
                </button>
            </div>
        </form>
    </div>
</div>

<!-- ============================================================ -->
<!-- VIEW INSPECTION MODAL                                        -->
<!-- ============================================================ -->
<div id="viewInspectionModal" class="hidden fixed inset-0 bg-slate-900/50 backdrop-blur-sm z-50 items-center justify-center p-4">
    <div class="bg-white rounded-2xl shadow-xl w-full max-w-2xl max-h-[90vh] overflow-y-auto">
        <div class="flex items-center justify-between px-6 py-4 border-b border-slate-200 sticky top-0 bg-white rounded-t-2xl">
            <h3 class="font-bold text-slate-900">Inspection Details</h3>
            <button onclick="closeModal('viewInspectionModal')" class="w-8 h-8 rounded-lg hover:bg-slate-100 flex items-center justify-center text-slate-400 hover:text-slate-600 transition">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>
        <div id="inspectionDetailsContent" class="p-6">
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
    const INSPECTIONS = <?php echo json_encode(array_column($inspections, null, 'id'), JSON_PRETTY_PRINT); ?>;
    let conductInspectionId = null;

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
    // FINDINGS MANAGEMENT
    // ============================================================
    let findingCount = 1;

    function addFinding() {
        const container = document.getElementById('findingsContainer');
        const newItem = document.createElement('div');
        newItem.className = 'finding-item p-3 bg-slate-50 rounded-lg border border-slate-200';
        newItem.innerHTML = `
            <div class="grid grid-cols-3 gap-2">
                <div>
                    <label class="block text-[10px] font-semibold text-slate-500 mb-1">Category</label>
                    <input type="text" class="finding-category w-full px-2 py-1 border border-slate-200 rounded text-sm focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none" placeholder="e.g. Sanitation">
                </div>
                <div>
                    <label class="block text-[10px] font-semibold text-slate-500 mb-1">Status</label>
                    <select class="finding-status w-full px-2 py-1 border border-slate-200 rounded text-sm bg-white focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none">
                        <option value="compliant">Compliant</option>
                        <option value="partially_compliant">Partially Compliant</option>
                        <option value="non_compliant">Non-Compliant</option>
                    </select>
                </div>
                <div>
                    <label class="block text-[10px] font-semibold text-slate-500 mb-1">Notes</label>
                    <input type="text" class="finding-notes w-full px-2 py-1 border border-slate-200 rounded text-sm focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none" placeholder="Details...">
                </div>
            </div>
            <button type="button" onclick="this.parentElement.remove()" class="mt-1 text-xs text-rose-500 hover:text-rose-700 transition">
                <i class="fa-solid fa-trash-can mr-1"></i> Remove
            </button>
        `;
        container.appendChild(newItem);
    }

    // ============================================================
    // VIEW INSPECTION
    // ============================================================
    function viewInspection(id) {
        openModal('viewInspectionModal');
        const i = INSPECTIONS[id];
        if (!i) return;

        setTimeout(() => {
            const statusColors = {
                scheduled: 'bg-blue-100 text-blue-700',
                completed: 'bg-emerald-100 text-emerald-700',
                cancelled: 'bg-slate-100 text-slate-500'
            };
            const resultColors = {
                compliant: 'bg-emerald-100 text-emerald-700',
                partially_compliant: 'bg-amber-100 text-amber-700',
                non_compliant: 'bg-rose-100 text-rose-700'
            };

            const findingsHtml = i.findings && i.findings.length > 0 ? i.findings.map(f => `
                <div class="flex items-center justify-between p-2 bg-white rounded-lg border border-slate-200">
                    <div>
                        <p class="font-semibold text-slate-800 text-sm">${f.category}</p>
                        <p class="text-xs text-slate-500">${f.notes || 'No notes'}</p>
                    </div>
                    <span class="px-2 py-0.5 rounded-full text-xs font-semibold ${f.status === 'compliant' ? 'bg-emerald-100 text-emerald-700' : f.status === 'partially_compliant' ? 'bg-amber-100 text-amber-700' : 'bg-rose-100 text-rose-700'}">
                        ${f.status.replace('_', ' ').toUpperCase()}
                    </span>
                </div>
            `).join('') : '<p class="text-xs text-slate-400">No findings recorded</p>';

            document.getElementById('inspectionDetailsContent').innerHTML = `
                <div class="space-y-4">
                    <div class="flex items-center gap-4 pb-4 border-b border-slate-200">
                        <div class="w-14 h-14 rounded-full bg-brand-light border border-brand-border flex items-center justify-center text-brand-dark font-bold text-xl flex-shrink-0">
                            ${i.applicant.charAt(0)}
                        </div>
                        <div>
                            <h4 class="text-lg font-bold text-slate-900">${i.applicant}</h4>
                            <p class="text-sm text-slate-500">${i.inspection_id} • ${i.permit_number}</p>
                            <span class="inline-block px-2 py-0.5 rounded-full text-xs font-semibold mt-1 ${statusColors[i.status] || statusColors.scheduled}">
                                ${i.status.toUpperCase()}
                            </span>
                            ${i.overall_status ? `<span class="inline-block px-2 py-0.5 rounded-full text-xs font-semibold ml-1 ${resultColors[i.overall_status] || resultColors.partially_compliant}">${i.overall_status.replace('_', ' ').toUpperCase()}</span>` : ''}
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div><p class="text-xs text-slate-400 font-semibold">Inspector</p><p class="text-sm text-slate-800">${i.inspector_name}</p></div>
                        <div><p class="text-xs text-slate-400 font-semibold">Business Type</p><p class="text-sm text-slate-800">${i.business_type}</p></div>
                        <div><p class="text-xs text-slate-400 font-semibold">Scheduled Date</p><p class="text-sm text-slate-800">${new Date(i.scheduled_date).toLocaleDateString('en-US', { month: 'long', day: 'numeric', year: 'numeric' })} at ${i.scheduled_time}</p></div>
                        ${i.conducted_date ? `<div><p class="text-xs text-slate-400 font-semibold">Conducted Date</p><p class="text-sm text-slate-800">${new Date(i.conducted_date).toLocaleDateString('en-US', { month: 'long', day: 'numeric', year: 'numeric' })} at ${i.conducted_time || 'N/A'}</p></div>` : ''}
                        ${i.follow_up_date ? `<div><p class="text-xs text-slate-400 font-semibold">Follow-up Date</p><p class="text-sm text-slate-800">${new Date(i.follow_up_date).toLocaleDateString('en-US', { month: 'long', day: 'numeric', year: 'numeric' })}</p></div>` : ''}
                    </div>
                    <div class="bg-slate-50 rounded-xl p-4 border border-slate-200">
                        <h5 class="text-sm font-bold text-slate-700 mb-2">📋 Findings</h5>
                        <div class="space-y-2">${findingsHtml}</div>
                    </div>
                    ${i.recommendations ? `<div class="bg-brand-light/40 rounded-xl p-4 border border-brand-border"><h5 class="text-sm font-bold text-slate-700 mb-2">Recommendations</h5><p class="text-sm text-slate-800">${i.recommendations}</p></div>` : ''}
                    ${i.notes ? `<div class="bg-slate-50 rounded-xl p-4 border border-slate-200"><h5 class="text-sm font-bold text-slate-700 mb-2">Notes</h5><p class="text-sm text-slate-800">${i.notes}</p></div>` : ''}
                    <div class="flex justify-end gap-2 pt-2 border-t border-slate-200">
                        <button onclick="closeModal('viewInspectionModal')" class="px-4 py-2 bg-white border border-slate-200 text-slate-600 rounded-lg hover:bg-slate-50 transition text-sm font-semibold">Close</button>
                        ${i.status === 'scheduled' ? `<button onclick="closeModal('viewInspectionModal'); conductInspection(${i.id})" class="px-4 py-2 bg-emerald-600 text-white rounded-lg hover:bg-emerald-700 transition text-sm font-semibold"><i class="fa-solid fa-clipboard-check mr-1.5"></i> Conduct</button>` : ''}
                        ${i.follow_up_date && i.status !== 'cancelled' ? `<button onclick="closeModal('viewInspectionModal'); scheduleFollowUp(${i.id})" class="px-4 py-2 bg-amber-600 text-white rounded-lg hover:bg-amber-700 transition text-sm font-semibold"><i class="fa-solid fa-arrow-rotate-right mr-1.5"></i> Follow-up</button>` : ''}
                    </div>
                </div>
            `;
        }, 300);
    }

    // ============================================================
    // SCHEDULE INSPECTION
    // ============================================================
    function saveScheduledInspection(event) {
        event.preventDefault();
        showToast('Inspection scheduled successfully!', 'success');
        closeModal('scheduleInspectionModal');
    }

    // ============================================================
    // CONDUCT INSPECTION
    // ============================================================
    function conductInspection(id) {
        const i = INSPECTIONS[id];
        if (!i) return;
        
        conductInspectionId = id;
        document.getElementById('conduct_inspection_id').value = id;
        document.getElementById('conductApplicant').textContent = i.applicant;
        document.getElementById('conductPermit').textContent = i.permit_number;
        document.getElementById('conductAddress').textContent = i.address;
        document.getElementById('conduct_overall').value = 'partially_compliant';
        document.getElementById('conduct_recommendations').value = '';
        document.getElementById('conduct_follow_up').value = '';
        document.getElementById('conduct_notes').value = '';
        
        // Reset findings
        const container = document.getElementById('findingsContainer');
        container.innerHTML = `
            <div class="finding-item p-3 bg-slate-50 rounded-lg border border-slate-200">
                <div class="grid grid-cols-3 gap-2">
                    <div>
                        <label class="block text-[10px] font-semibold text-slate-500 mb-1">Category</label>
                        <input type="text" class="finding-category w-full px-2 py-1 border border-slate-200 rounded text-sm focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none" placeholder="e.g. Sanitation">
                    </div>
                    <div>
                        <label class="block text-[10px] font-semibold text-slate-500 mb-1">Status</label>
                        <select class="finding-status w-full px-2 py-1 border border-slate-200 rounded text-sm bg-white focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none">
                            <option value="compliant">Compliant</option>
                            <option value="partially_compliant">Partially Compliant</option>
                            <option value="non_compliant">Non-Compliant</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-[10px] font-semibold text-slate-500 mb-1">Notes</label>
                        <input type="text" class="finding-notes w-full px-2 py-1 border border-slate-200 rounded text-sm focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none" placeholder="Details...">
                    </div>
                </div>
            </div>
        `;
        
        openModal('conductInspectionModal');
    }

    function saveConductedInspection(event) {
        event.preventDefault();
        const id = conductInspectionId;
        const i = INSPECTIONS[id];
        if (!i) return;
        
        // Collect findings
        const findings = [];
        document.querySelectorAll('.finding-item').forEach(item => {
            const category = item.querySelector('.finding-category')?.value || '';
            const status = item.querySelector('.finding-status')?.value || 'compliant';
            const notes = item.querySelector('.finding-notes')?.value || '';
            if (category) {
                findings.push({ category, status, notes });
            }
        });
        
        i.findings = findings;
        i.overall_status = document.getElementById('conduct_overall').value;
        i.recommendations = document.getElementById('conduct_recommendations').value;
        i.follow_up_date = document.getElementById('conduct_follow_up').value || null;
        i.notes = document.getElementById('conduct_notes').value;
        i.status = 'completed';
        i.conducted_date = new Date().toISOString().split('T')[0];
        i.conducted_time = new Date().toLocaleTimeString('en-US', { hour: '2-digit', minute: '2-digit' });
        
        updateInspectionRow(i);
        closeModal('conductInspectionModal');
        showToast('Inspection #' + i.inspection_id + ' completed successfully!', 'success');
    }

    function updateInspectionRow(i) {
        const rows = document.querySelectorAll('.inspection-row');
        rows.forEach(row => {
            const applicant = row.querySelector('.font-semibold.text-slate-800.text-sm')?.textContent;
            if (applicant === i.applicant) {
                const statusBadge = row.querySelector('.px-2.py-1.rounded-full:first-of-type');
                const statusColors = {
                    scheduled: 'bg-blue-100 text-blue-700',
                    completed: 'bg-emerald-100 text-emerald-700',
                    cancelled: 'bg-slate-100 text-slate-500'
                };
                statusBadge.className = `px-2 py-1 rounded-full text-xs font-semibold ${statusColors[i.status] || statusColors.scheduled}`;
                statusBadge.textContent = i.status.charAt(0).toUpperCase() + i.status.slice(1);
                
                // Update result badge
                const resultBadge = row.querySelector('.px-2.py-1.rounded-full:last-of-type');
                if (i.overall_status && resultBadge) {
                    const resultColors = {
                        compliant: 'bg-emerald-100 text-emerald-700',
                        partially_compliant: 'bg-amber-100 text-amber-700',
                        non_compliant: 'bg-rose-100 text-rose-700'
                    };
                    resultBadge.className = `px-2 py-1 rounded-full text-xs font-semibold ${resultColors[i.overall_status] || resultColors.partially_compliant}`;
                    resultBadge.textContent = i.overall_status.replace('_', ' ').toUpperCase();
                }
            }
        });
    }

    // ============================================================
    // FOLLOW-UP
    // ============================================================
    function viewFollowUp(id) {
        scheduleFollowUp(id);
    }

    function scheduleFollowUp(id) {
        const i = INSPECTIONS[id];
        if (!i) return;
        
        // For demo, just show a toast
        showToast('Follow-up scheduled for ' + new Date(i.follow_up_date).toLocaleDateString(), 'info');
    }

    // ============================================================
    // EDIT INSPECTION
    // ============================================================
    function editInspection(id) {
        showToast('Edit inspection ID: ' + id + ' (Edit modal coming soon)', 'info');
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
    document.getElementById('searchInspection').addEventListener('input', filterInspections);
    document.getElementById('filterStatus').addEventListener('change', filterInspections);
    document.getElementById('filterResult').addEventListener('change', filterInspections);
    document.getElementById('filterInspector').addEventListener('change', filterInspections);

    function filterInspections() {
        const search = document.getElementById('searchInspection').value.toLowerCase();
        const status = document.getElementById('filterStatus').value;
        const result = document.getElementById('filterResult').value;
        const inspector = document.getElementById('filterInspector').value.toLowerCase();
        let visibleCount = 0;

        document.querySelectorAll('.inspection-row').forEach(row => {
            const applicant = row.dataset.applicant;
            const rowInspector = row.dataset.inspector;
            const rowStatus = row.dataset.status;
            const rowResult = row.dataset.result;

            const matchesSearch = applicant.includes(search) || rowInspector.includes(search);
            const matchesStatus = !status || rowStatus === status;
            const matchesResult = !result || rowResult === result;
            const matchesInspector = !inspector || rowInspector.includes(inspector);
            const isVisible = matchesSearch && matchesStatus && matchesResult && matchesInspector;

            row.style.display = isVisible ? '' : 'none';
            if (isVisible) visibleCount++;
        });

        document.getElementById('emptyState').style.display = visibleCount === 0 ? 'flex' : 'none';
    }

    function resetFilters() {
        document.getElementById('searchInspection').value = '';
        document.getElementById('filterStatus').value = '';
        document.getElementById('filterResult').value = '';
        document.getElementById('filterInspector').value = '';
        document.querySelectorAll('.inspection-row').forEach(row => row.style.display = '');
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

    // ============================================================
    // SET DEFAULT DATE
    // ============================================================
    document.addEventListener('DOMContentLoaded', function() {
        const dateInput = document.getElementById('insp_date');
        if (dateInput) {
            const tomorrow = new Date();
            tomorrow.setDate(tomorrow.getDate() + 1);
            dateInput.value = tomorrow.toISOString().split('T')[0];
        }
    });
</script>

<?php include_once '../../includes/footer.php'; ?>