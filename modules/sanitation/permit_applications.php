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

// Sample Permit Applications Data
$permitApplications = [
    [
        'id' => 1,
        'permit_id' => 'SP-1040',
        'applicant' => 'ABC Restaurant',
        'business_type' => 'Food Establishment',
        'address' => '123 Rizal St., Barangay San Jose',
        'barangay' => 'Barangay San Jose',
        'owner_name' => 'Juan Dela Cruz',
        'contact' => '09123456789',
        'email' => 'abc.restaurant@email.com',
        'fee' => 1500.00,
        'paid' => true,
        'payment_method' => 'GCash',
        'status' => 'under_review',
        'inspector' => 'Juan Dela Cruz',
        'date_applied' => '2026-07-15',
        'date_reviewed' => '2026-07-16',
        'date_approved' => null,
        'expiry_date' => null,
        'notes' => 'Complete documentation received',
        'documents' => ['Business Registration', 'Floor Plan', 'Health Certificate']
    ],
    [
        'id' => 2,
        'permit_id' => 'SP-1041',
        'applicant' => 'Green Market Stall',
        'business_type' => 'Market Vendor',
        'address' => '456 Mabini Ave., Barangay Poblacion',
        'barangay' => 'Barangay Poblacion',
        'owner_name' => 'Maria Santos',
        'contact' => '09123456788',
        'email' => 'green.market@email.com',
        'fee' => 800.00,
        'paid' => true,
        'payment_method' => 'Cash',
        'status' => 'approved',
        'inspector' => 'Maria Santos',
        'date_applied' => '2026-07-14',
        'date_reviewed' => '2026-07-15',
        'date_approved' => '2026-07-16',
        'expiry_date' => '2027-07-16',
        'notes' => 'Fully compliant',
        'documents' => ['Market Permit', 'Health Certificate']
    ],
    [
        'id' => 3,
        'permit_id' => 'SP-1042',
        'applicant' => 'Fresh Bakes Co.',
        'business_type' => 'Bakery',
        'address' => '789 Bonifacio Rd., Barangay Riverside',
        'barangay' => 'Barangay Riverside',
        'owner_name' => 'Rosa Mendoza',
        'contact' => '09123456787',
        'email' => 'fresh.bakes@email.com',
        'fee' => 1200.00,
        'paid' => false,
        'payment_method' => null,
        'status' => 'pending',
        'inspector' => 'Unassigned',
        'date_applied' => '2026-07-16',
        'date_reviewed' => null,
        'date_approved' => null,
        'expiry_date' => null,
        'notes' => 'Awaiting payment and additional documents',
        'documents' => ['Business Registration']
    ],
    [
        'id' => 4,
        'permit_id' => 'SP-1043',
        'applicant' => 'City Gym',
        'business_type' => 'Recreational Facility',
        'address' => '101 Luna St., Barangay San Roque',
        'barangay' => 'Barangay San Roque',
        'owner_name' => 'Carlos Lim',
        'contact' => '09123456786',
        'email' => 'city.gym@email.com',
        'fee' => 2000.00,
        'paid' => true,
        'payment_method' => 'Bank Transfer',
        'status' => 'rejected',
        'inspector' => 'Ana Reyes',
        'date_applied' => '2026-07-13',
        'date_reviewed' => '2026-07-15',
        'date_approved' => null,
        'expiry_date' => null,
        'notes' => 'Failed inspection - safety violations',
        'documents' => ['Business Registration', 'Floor Plan']
    ],
    [
        'id' => 5,
        'permit_id' => 'SP-1044',
        'applicant' => 'Mega Mart',
        'business_type' => 'Retail Store',
        'address' => '202 Santos St., Barangay Sta. Cruz',
        'barangay' => 'Barangay Sta. Cruz',
        'owner_name' => 'Elena Torres',
        'contact' => '09123456785',
        'email' => 'mega.mart@email.com',
        'fee' => 1000.00,
        'paid' => true,
        'payment_method' => 'GCash',
        'status' => 'approved',
        'inspector' => 'Juan Dela Cruz',
        'date_applied' => '2026-07-12',
        'date_reviewed' => '2026-07-14',
        'date_approved' => '2026-07-15',
        'expiry_date' => '2027-07-15',
        'notes' => 'All requirements met',
        'documents' => ['Business Registration', 'Floor Plan', 'Health Certificate', 'Waste Disposal Plan']
    ],
    [
        'id' => 6,
        'permit_id' => 'SP-1045',
        'applicant' => 'Sunrise Pharmacy',
        'business_type' => 'Pharmacy',
        'address' => '303 Rizal St., Barangay San Jose',
        'barangay' => 'Barangay San Jose',
        'owner_name' => 'Miguel Reyes',
        'contact' => '09123456784',
        'email' => 'sunrise.pharmacy@email.com',
        'fee' => 1800.00,
        'paid' => true,
        'payment_method' => 'Cash',
        'status' => 'pending',
        'inspector' => 'Maria Santos',
        'date_applied' => '2026-07-16',
        'date_reviewed' => '2026-07-16',
        'date_approved' => null,
        'expiry_date' => null,
        'notes' => 'Under review - requires additional FDA documents',
        'documents' => ['Business Registration', 'Floor Plan', 'Pharmacy License']
    ],
    [
        'id' => 7,
        'permit_id' => 'SP-1046',
        'applicant' => 'Green Valley Farm',
        'business_type' => 'Agricultural',
        'address' => '404 Mabini Ave., Barangay Poblacion',
        'barangay' => 'Barangay Poblacion',
        'owner_name' => 'Ana Cruz',
        'contact' => '09123456783',
        'email' => 'green.valley@email.com',
        'fee' => 900.00,
        'paid' => true,
        'payment_method' => 'Bank Transfer',
        'status' => 'expired',
        'inspector' => 'Ana Reyes',
        'date_applied' => '2025-07-10',
        'date_reviewed' => '2025-07-15',
        'date_approved' => '2025-07-20',
        'expiry_date' => '2026-07-20',
        'notes' => 'Permit expired. Renewal required.',
        'documents' => ['Farm Permit', 'Health Certificate']
    ],
    [
        'id' => 8,
        'permit_id' => 'SP-1047',
        'applicant' => 'Tech Hub Inc.',
        'business_type' => 'Office/Commercial',
        'address' => '505 Bonifacio Rd., Barangay Riverside',
        'barangay' => 'Barangay Riverside',
        'owner_name' => 'Ramon Garcia',
        'contact' => '09123456782',
        'email' => 'tech.hub@email.com',
        'fee' => 2500.00,
        'paid' => false,
        'payment_method' => null,
        'status' => 'pending',
        'inspector' => 'Unassigned',
        'date_applied' => '2026-07-17',
        'date_reviewed' => null,
        'date_approved' => null,
        'expiry_date' => null,
        'notes' => 'New application - awaiting initial review',
        'documents' => ['Business Registration']
    ],
];

// Pagination
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$limit = 5;
$offset = ($page - 1) * $limit;
$totalApplications = count($permitApplications);
$totalPages = ceil($totalApplications / $limit);
$paginatedApplications = array_slice($permitApplications, $offset, $limit);

$title = 'Permit Applications';

// Stats
$totalPending = count(array_filter($permitApplications, fn($p) => $p['status'] === 'pending'));
$totalUnderReview = count(array_filter($permitApplications, fn($p) => $p['status'] === 'under_review'));
$totalApproved = count(array_filter($permitApplications, fn($p) => $p['status'] === 'approved'));
$totalRejected = count(array_filter($permitApplications, fn($p) => $p['status'] === 'rejected'));
$totalExpired = count(array_filter($permitApplications, fn($p) => $p['status'] === 'expired'));
$totalRevenue = array_sum(array_column($permitApplications, 'fee'));
?>

<!-- ============================================================ -->
<!-- 2. HTML + PHP EMBEDDED + Tailwind CSS                       -->
<!-- ============================================================ -->

<div class="flex-1 px-6 pt-[26px] pb-20 mb-10 flex flex-col min-h-0 overflow-hidden">

    <!-- Page Header -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6">
        <div>
            <h2 class="text-2xl font-black text-slate-900 tracking-tight">Permit Applications</h2>
            <p class="text-sm text-slate-500 mt-0.5">Manage sanitation permit applications</p>
        </div>
        <div class="flex gap-3">
            <button onclick="openModal('newPermitModal')"
                    class="px-4 py-2 bg-brand-dark text-white rounded-lg hover:bg-brand-medium transition-colors text-sm font-semibold flex items-center gap-2 shadow-sm">
                <i class="fa-solid fa-plus text-xs"></i> New Application
            </button>
        </div>
    </div>

    <!-- ============================================================ -->
<!-- MODERN KPI CARDS - Updated to match design               -->
<!-- ============================================================ -->
<div class="grid grid-cols-2 md:grid-cols-6 gap-4 mb-6">
    <!-- Card 1: Total Applications -->
    <div class="relative overflow-hidden bg-white rounded-2xl shadow-sm border border-slate-200 p-5 hover:shadow-lg transition group">
        <div class="absolute -top-12 -right-12 w-24 h-24 bg-blue-100 rounded-full opacity-50 group-hover:scale-110 transition"></div>
        <div class="relative">
            <div class="flex items-center gap-3">
                <div class="w-11 h-11 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl flex items-center justify-center text-white shadow-lg shadow-blue-200">
                    <i class="fa-solid fa-file-lines text-lg"></i>
                </div>
                <div>
                    <p class="text-2xl font-black text-slate-900"><?php echo $totalApplications; ?></p>
                    <p class="text-xs font-medium text-slate-500">Total Applications</p>
                </div>
            </div>
            <div class="mt-3 flex items-center gap-2">
                <span class="px-2 py-0.5 bg-blue-100 text-blue-700 rounded-full text-[10px] font-bold">📋 All permits</span>
                <span class="text-[10px] text-slate-400"><?php echo $totalApproved; ?> approved</span>
            </div>
        </div>
    </div>

    <!-- Card 2: Pending -->
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
                <span class="text-[10px] text-slate-400">Initial review</span>
            </div>
        </div>
    </div>

    <!-- Card 3: Under Review -->
    <div class="relative overflow-hidden bg-white rounded-2xl shadow-sm border border-slate-200 p-5 hover:shadow-lg transition group">
        <div class="absolute -top-12 -right-12 w-24 h-24 bg-blue-100 rounded-full opacity-50 group-hover:scale-110 transition"></div>
        <div class="relative">
            <div class="flex items-center gap-3">
                <div class="w-11 h-11 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl flex items-center justify-center text-white shadow-lg shadow-blue-200">
                    <i class="fa-solid fa-clipboard-list text-lg"></i>
                </div>
                <div>
                    <p class="text-2xl font-black text-blue-600"><?php echo $totalUnderReview; ?></p>
                    <p class="text-xs font-medium text-slate-500">Under Review</p>
                </div>
            </div>
            <div class="mt-3 flex items-center gap-2">
                <span class="px-2 py-0.5 bg-blue-100 text-blue-700 rounded-full text-[10px] font-bold">🔍 In progress</span>
                <span class="text-[10px] text-slate-400">Being evaluated</span>
            </div>
        </div>
    </div>

    <!-- Card 4: Approved -->
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
                <span class="px-2 py-0.5 bg-emerald-100 text-emerald-700 rounded-full text-[10px] font-bold">✅ Granted</span>
                <span class="text-[10px] text-slate-400">Permits issued</span>
            </div>
        </div>
    </div>

    <!-- Card 5: Rejected -->
    <div class="relative overflow-hidden bg-white rounded-2xl shadow-sm border border-slate-200 p-5 hover:shadow-lg transition group">
        <div class="absolute -top-12 -right-12 w-24 h-24 bg-rose-100 rounded-full opacity-50 group-hover:scale-110 transition"></div>
        <div class="relative">
            <div class="flex items-center gap-3">
                <div class="w-11 h-11 bg-gradient-to-br from-rose-500 to-rose-600 rounded-xl flex items-center justify-center text-white shadow-lg shadow-rose-200">
                    <i class="fa-solid fa-circle-xmark text-lg"></i>
                </div>
                <div>
                    <p class="text-2xl font-black text-rose-600"><?php echo $totalRejected; ?></p>
                    <p class="text-xs font-medium text-slate-500">Rejected</p>
                </div>
            </div>
            <div class="mt-3 flex items-center gap-2">
                <span class="px-2 py-0.5 bg-rose-100 text-rose-700 rounded-full text-[10px] font-bold">❌ Denied</span>
                <span class="text-[10px] text-slate-400">Non-compliant</span>
            </div>
        </div>
    </div>

    <!-- Card 6: Expired -->
    <div class="relative overflow-hidden bg-white rounded-2xl shadow-sm border border-slate-200 p-5 hover:shadow-lg transition group">
        <div class="absolute -top-12 -right-12 w-24 h-24 bg-slate-100 rounded-full opacity-50 group-hover:scale-110 transition"></div>
        <div class="relative">
            <div class="flex items-center gap-3">
                <div class="w-11 h-11 bg-gradient-to-br from-slate-500 to-slate-600 rounded-xl flex items-center justify-center text-white shadow-lg shadow-slate-200">
                    <i class="fa-solid fa-calendar-xmark text-lg"></i>
                </div>
                <div>
                    <p class="text-2xl font-black text-slate-600"><?php echo $totalExpired; ?></p>
                    <p class="text-xs font-medium text-slate-500">Expired</p>
                </div>
            </div>
            <div class="mt-3 flex items-center gap-2">
                <span class="px-2 py-0.5 bg-slate-100 text-slate-600 rounded-full text-[10px] font-bold">📅 Overdue</span>
                <span class="text-[10px] text-slate-400">Needs renewal</span>
            </div>
        </div>
    </div>
</div>

    <!-- Revenue Card - Modern -->
<div class="relative overflow-hidden bg-gradient-to-r from-brand-dark to-brand-medium rounded-2xl p-5 mb-6 text-white shadow-sm">
    <div class="absolute -top-12 -right-12 w-32 h-32 bg-white/10 rounded-full"></div>
    <div class="relative flex items-center justify-between">
        <div>
            <span class="text-sm font-medium opacity-80">💰 Total Revenue Collected</span>
            <p class="text-2xl font-bold mt-1">₱<?php echo number_format($totalRevenue, 2); ?></p>
        </div>
        <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center">
            <i class="fa-solid fa-coins text-2xl text-white/80"></i>
        </div>
    </div>
</div>

    <!-- Search & Filter -->
    <div class="bg-white rounded-xl shadow-xs p-4 border border-slate-200 mb-6">
        <div class="flex flex-col sm:flex-row gap-3">
            <div class="flex-1 relative">
                <i class="fa-solid fa-search absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-sm"></i>
                <input type="text"
                       id="searchPermit"
                       placeholder="Search by applicant, ID, or business type..."
                       class="w-full pl-9 pr-4 py-2 border border-slate-200 rounded-lg focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none text-sm transition">
            </div>
            <div class="flex gap-2 flex-wrap">
                <select id="filterStatus" class="px-4 py-2 border border-slate-200 rounded-lg focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none text-sm bg-white">
                    <option value="">All Status</option>
                    <option value="pending">Pending</option>
                    <option value="under_review">Under Review</option>
                    <option value="approved">Approved</option>
                    <option value="rejected">Rejected</option>
                    <option value="expired">Expired</option>
                </select>
                <select id="filterType" class="px-4 py-2 border border-slate-200 rounded-lg focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none text-sm bg-white">
                    <option value="">All Types</option>
                    <option value="Food Establishment">Food Establishment</option>
                    <option value="Market Vendor">Market Vendor</option>
                    <option value="Bakery">Bakery</option>
                    <option value="Recreational Facility">Recreational Facility</option>
                    <option value="Retail Store">Retail Store</option>
                    <option value="Pharmacy">Pharmacy</option>
                    <option value="Agricultural">Agricultural</option>
                    <option value="Office/Commercial">Office/Commercial</option>
                </select>
                <button onclick="resetFilters()" title="Reset filters"
                        class="px-3 py-2 bg-slate-100 text-slate-500 rounded-lg hover:bg-slate-200 hover:text-slate-700 transition-colors text-sm">
                    <i class="fa-solid fa-rotate-right"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- Permits Table -->
    <div class="bg-white rounded-xl shadow-xs border border-slate-200 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead class="bg-slate-50 border-b border-slate-200">
                    <tr>
                        <th class="px-4 py-3 text-left text-[10px] font-bold text-slate-500 uppercase tracking-wider">Permit ID</th>
                        <th class="px-4 py-3 text-left text-[10px] font-bold text-slate-500 uppercase tracking-wider">Applicant</th>
                        <th class="px-4 py-3 text-left text-[10px] font-bold text-slate-500 uppercase tracking-wider">Business Type</th>
                        <th class="px-4 py-3 text-left text-[10px] font-bold text-slate-500 uppercase tracking-wider">Barangay</th>
                        <th class="px-4 py-3 text-left text-[10px] font-bold text-slate-500 uppercase tracking-wider">Fee</th>
                        <th class="px-4 py-3 text-left text-[10px] font-bold text-slate-500 uppercase tracking-wider">Status</th>
                        <th class="px-4 py-3 text-left text-[10px] font-bold text-slate-500 uppercase tracking-wider">Date Applied</th>
                        <th class="px-4 py-3 text-center text-[10px] font-bold text-slate-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody id="permitTableBody">
                    <?php foreach ($paginatedApplications as $permit): ?>
                    <tr class="border-b border-slate-100 hover:bg-brand-light/40 transition-colors permit-row"
                        data-applicant="<?php echo strtolower($permit['applicant']); ?>"
                        data-type="<?php echo strtolower($permit['business_type']); ?>"
                        data-status="<?php echo $permit['status']; ?>"
                        data-id="<?php echo $permit['permit_id']; ?>">
                        <td class="px-4 py-3 font-mono text-xs text-brand-dark font-semibold"><?php echo $permit['permit_id']; ?></td>
                        <td class="px-4 py-3">
                            <div>
                                <p class="font-semibold text-slate-800 text-sm"><?php echo $permit['applicant']; ?></p>
                                <p class="text-xs text-slate-400"><?php echo $permit['owner_name']; ?></p>
                            </div>
                        </td>
                        <td class="px-4 py-3 text-slate-600 text-xs"><?php echo $permit['business_type']; ?></td>
                        <td class="px-4 py-3 text-slate-600 text-xs"><?php echo $permit['barangay']; ?></td>
                        <td class="px-4 py-3">
                            <span class="text-xs font-semibold text-slate-700">₱<?php echo number_format($permit['fee'], 2); ?></span>
                            <?php if ($permit['paid']): ?>
                                <span class="ml-1 text-[10px] text-emerald-600">✓ Paid</span>
                            <?php else: ?>
                                <span class="ml-1 text-[10px] text-rose-500">Unpaid</span>
                            <?php endif; ?>
                        </td>
                        <td class="px-4 py-3">
                            <?php
                                $statusColors = [
                                    'pending' => 'bg-amber-100 text-amber-700',
                                    'under_review' => 'bg-blue-100 text-blue-700',
                                    'approved' => 'bg-emerald-100 text-emerald-700',
                                    'rejected' => 'bg-rose-100 text-rose-700',
                                    'expired' => 'bg-slate-100 text-slate-500'
                                ];
                            ?>
                            <span class="px-2 py-1 rounded-full text-xs font-semibold <?php echo $statusColors[$permit['status']] ?? $statusColors['pending']; ?>">
                                <?php echo str_replace('_', ' ', ucfirst($permit['status'])); ?>
                            </span>
                        </td>
                        <td class="px-4 py-3 text-slate-500 text-xs"><?php echo date('M d, Y', strtotime($permit['date_applied'])); ?></td>
                        <td class="px-4 py-3">
                            <div class="flex items-center justify-center gap-1">
                                <button onclick="viewPermit(<?php echo $permit['id']; ?>)"
                                        class="p-1.5 text-brand-medium hover:bg-brand-light rounded-lg transition" title="View">
                                    <i class="fa-solid fa-eye text-sm"></i>
                                </button>
                                <?php if ($permit['status'] === 'pending' || $permit['status'] === 'under_review'): ?>
                                    <button onclick="reviewPermit(<?php echo $permit['id']; ?>)"
                                            class="p-1.5 text-blue-600 hover:bg-blue-50 rounded-lg transition" title="Review">
                                        <i class="fa-solid fa-clipboard-list text-sm"></i>
                                    </button>
                                    <button onclick="updatePermitStatus(<?php echo $permit['id']; ?>, 'approved')"
                                            class="p-1.5 text-emerald-600 hover:bg-emerald-50 rounded-lg transition" title="Approve">
                                        <i class="fa-solid fa-check text-sm"></i>
                                    </button>
                                    <button onclick="updatePermitStatus(<?php echo $permit['id']; ?>, 'rejected')"
                                            class="p-1.5 text-rose-500 hover:bg-rose-50 rounded-lg transition" title="Reject">
                                        <i class="fa-solid fa-times text-sm"></i>
                                    </button>
                                <?php endif; ?>
                                <button onclick="editPermit(<?php echo $permit['id']; ?>)"
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
                <i class="fa-solid fa-file-circle-xmark text-slate-400"></i>
            </div>
            <p class="text-sm font-semibold text-slate-600">No permits match your filters</p>
            <p class="text-xs text-slate-400 mt-1">Try adjusting your search or clearing filters</p>
            <button onclick="resetFilters()" class="mt-3 text-xs font-semibold text-brand-medium hover:text-brand-dark">Clear all filters</button>
        </div>

        <!-- Pagination -->
        <div class="px-4 py-3 border-t border-slate-200 flex flex-col sm:flex-row justify-between items-center gap-3 bg-slate-50">
            <p class="text-xs text-slate-500">
                Showing <span class="font-semibold text-slate-700"><?php echo $offset + 1; ?></span> to
                <span class="font-semibold text-slate-700"><?php echo min($offset + $limit, $totalApplications); ?></span> of
                <span class="font-semibold text-slate-700"><?php echo $totalApplications; ?></span> applications
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
<!-- NEW PERMIT APPLICATION MODAL                                 -->
<!-- ============================================================ -->
<div id="newPermitModal" class="hidden fixed inset-0 bg-slate-900/50 backdrop-blur-sm z-50 items-center justify-center p-4">
    <div class="bg-white rounded-2xl shadow-xl w-full max-w-2xl max-h-[90vh] overflow-y-auto">
        <div class="flex items-center justify-between px-6 py-4 border-b border-slate-200 sticky top-0 bg-white rounded-t-2xl">
            <h3 class="font-bold text-slate-900 flex items-center gap-2">
                <i class="fa-solid fa-file-pen text-brand-medium"></i>
                New Permit Application
            </h3>
            <button onclick="closeModal('newPermitModal')" class="w-8 h-8 rounded-lg hover:bg-slate-100 flex items-center justify-center text-slate-400 hover:text-slate-600 transition">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>
        <form id="newPermitForm" class="p-6 space-y-4" onsubmit="savePermit(event)">
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">Applicant Name</label>
                    <input type="text" id="permit_applicant" required class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">Owner Name</label>
                    <input type="text" id="permit_owner" required class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none">
                </div>
            </div>
            <div>
                <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">Business Type</label>
                <select id="permit_type" required class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm bg-white focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none">
                    <option value="">Select Business Type</option>
                    <option value="Food Establishment">Food Establishment</option>
                    <option value="Market Vendor">Market Vendor</option>
                    <option value="Bakery">Bakery</option>
                    <option value="Recreational Facility">Recreational Facility</option>
                    <option value="Retail Store">Retail Store</option>
                    <option value="Pharmacy">Pharmacy</option>
                    <option value="Agricultural">Agricultural</option>
                    <option value="Office/Commercial">Office/Commercial</option>
                </select>
            </div>
            <div>
                <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">Address</label>
                <input type="text" id="permit_address" required class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none">
            </div>
            <div>
                <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">Barangay</label>
                <select id="permit_barangay" required class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm bg-white focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none">
                    <option value="">Select Barangay</option>
                    <option value="Barangay San Jose">Barangay San Jose</option>
                    <option value="Barangay Poblacion">Barangay Poblacion</option>
                    <option value="Barangay Riverside">Barangay Riverside</option>
                    <option value="Barangay San Roque">Barangay San Roque</option>
                    <option value="Barangay Sta. Cruz">Barangay Sta. Cruz</option>
                </select>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">Contact</label>
                    <input type="text" id="permit_contact" required class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">Email</label>
                    <input type="email" id="permit_email" required class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none">
                </div>
            </div>
            <div>
                <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">Fee</label>
                <input type="number" id="permit_fee" required class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none">
            </div>
            <div>
                <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">Payment Method</label>
                <select id="permit_payment" class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm bg-white focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none">
                    <option value="Cash">Cash</option>
                    <option value="GCash">GCash</option>
                    <option value="Bank Transfer">Bank Transfer</option>
                    <option value="Over-the-Counter">Over-the-Counter</option>
                </select>
            </div>
            <div>
                <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">Notes</label>
                <textarea id="permit_notes" rows="2" class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none" placeholder="Additional notes..."></textarea>
            </div>

            <div class="flex justify-end gap-2 pt-2 border-t border-slate-100">
                <button type="button" onclick="closeModal('newPermitModal')"
                        class="px-4 py-2 bg-white border border-slate-200 text-slate-600 rounded-lg hover:bg-slate-50 transition text-sm font-semibold">
                    Cancel
                </button>
                <button type="submit"
                        class="px-4 py-2 bg-brand-dark text-white rounded-lg hover:bg-brand-medium transition text-sm font-semibold">
                    <i class="fa-solid fa-file-pen mr-1.5"></i> Submit Application
                </button>
            </div>
        </form>
    </div>
</div>

<!-- ============================================================ -->
<!-- VIEW PERMIT MODAL                                            -->
<!-- ============================================================ -->
<div id="viewPermitModal" class="hidden fixed inset-0 bg-slate-900/50 backdrop-blur-sm z-50 items-center justify-center p-4">
    <div class="bg-white rounded-2xl shadow-xl w-full max-w-2xl max-h-[90vh] overflow-y-auto">
        <div class="flex items-center justify-between px-6 py-4 border-b border-slate-200 sticky top-0 bg-white rounded-t-2xl">
            <h3 class="font-bold text-slate-900">Permit Application Details</h3>
            <button onclick="closeModal('viewPermitModal')" class="w-8 h-8 rounded-lg hover:bg-slate-100 flex items-center justify-center text-slate-400 hover:text-slate-600 transition">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>
        <div id="permitDetailsContent" class="p-6">
            <div class="flex items-center justify-center py-10 text-slate-400 text-sm">
                <i class="fa-solid fa-spinner fa-spin mr-2"></i> Loading...
            </div>
        </div>
    </div>
</div>

<!-- ============================================================ -->
<!-- REVIEW PERMIT MODAL                                          -->
<!-- ============================================================ -->
<div id="reviewPermitModal" class="hidden fixed inset-0 bg-slate-900/50 backdrop-blur-sm z-50 items-center justify-center p-4">
    <div class="bg-white rounded-2xl shadow-xl w-full max-w-md">
        <div class="flex items-center justify-between px-6 py-4 border-b border-slate-200">
            <h3 class="font-bold text-slate-900 flex items-center gap-2">
                <i class="fa-solid fa-clipboard-list text-brand-medium"></i>
                Review Application
            </h3>
            <button onclick="closeModal('reviewPermitModal')" class="w-8 h-8 rounded-lg hover:bg-slate-100 flex items-center justify-center text-slate-400 hover:text-slate-600 transition">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>
        <div class="p-6 space-y-4">
            <div class="flex items-center gap-3 p-3 bg-brand-light/40 rounded-xl border brand-border">
                <div>
                    <p id="reviewApplicant" class="font-semibold text-slate-800 text-sm">ABC Restaurant</p>
                    <p id="reviewPermitId" class="text-xs text-slate-400">SP-1040</p>
                </div>
            </div>
            <div>
                <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">Review Status</label>
                <select id="review_status" class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm bg-white focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none">
                    <option value="under_review">Under Review</option>
                    <option value="approved">Approve</option>
                    <option value="rejected">Reject</option>
                </select>
            </div>
            <div>
                <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">Inspector</label>
                <select id="review_inspector" class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm bg-white focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none">
                    <option value="Juan Dela Cruz">Juan Dela Cruz</option>
                    <option value="Maria Santos">Maria Santos</option>
                    <option value="Ana Reyes">Ana Reyes</option>
                </select>
            </div>
            <div>
                <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">Review Notes</label>
                <textarea id="review_notes" rows="3" class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none" placeholder="Inspection findings, recommendations..."></textarea>
            </div>
        </div>
        <div class="flex justify-end gap-2 px-6 pb-6">
            <button type="button" onclick="closeModal('reviewPermitModal')"
                    class="px-4 py-2 bg-white border border-slate-200 text-slate-600 rounded-lg hover:bg-slate-50 transition text-sm font-semibold">
                Cancel
            </button>
            <button type="button" onclick="submitReview()"
                    class="px-4 py-2 bg-brand-dark text-white rounded-lg hover:bg-brand-medium transition text-sm font-semibold">
                <i class="fa-solid fa-check mr-1.5"></i> Submit Review
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
    const PERMITS = <?php echo json_encode(array_column($permitApplications, null, 'id'), JSON_PRETTY_PRINT); ?>;
    let reviewPermitId = null;

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
    // VIEW PERMIT
    // ============================================================
    function viewPermit(id) {
        openModal('viewPermitModal');
        const p = PERMITS[id];
        if (!p) return;

        setTimeout(() => {
            const statusColors = {
                pending: 'bg-amber-100 text-amber-700',
                under_review: 'bg-blue-100 text-blue-700',
                approved: 'bg-emerald-100 text-emerald-700',
                rejected: 'bg-rose-100 text-rose-700',
                expired: 'bg-slate-100 text-slate-500'
            };

            const docsHtml = p.documents.map(d => `
                <span class="px-2 py-1 bg-slate-100 rounded text-xs text-slate-600">${d}</span>
            `).join('');

            document.getElementById('permitDetailsContent').innerHTML = `
                <div class="space-y-4">
                    <div class="flex items-center gap-4 pb-4 border-b border-slate-200">
                        <div class="w-14 h-14 rounded-full bg-brand-light border border-brand-border flex items-center justify-center text-brand-dark font-bold text-xl flex-shrink-0">
                            ${p.applicant.charAt(0)}
                        </div>
                        <div>
                            <h4 class="text-lg font-bold text-slate-900">${p.applicant}</h4>
                            <p class="text-sm text-slate-500">${p.permit_id} • ${p.business_type}</p>
                            <span class="inline-block px-2 py-0.5 rounded-full text-xs font-semibold mt-1 ${statusColors[p.status] || statusColors.pending}">
                                ${p.status.replace('_', ' ').toUpperCase()}
                            </span>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div><p class="text-xs text-slate-400 font-semibold">Owner</p><p class="text-sm text-slate-800">${p.owner_name}</p></div>
                        <div><p class="text-xs text-slate-400 font-semibold">Contact</p><p class="text-sm text-slate-800">${p.contact}</p></div>
                        <div><p class="text-xs text-slate-400 font-semibold">Email</p><p class="text-sm text-slate-800">${p.email}</p></div>
                        <div><p class="text-xs text-slate-400 font-semibold">Barangay</p><p class="text-sm text-slate-800">${p.barangay}</p></div>
                        <div><p class="text-xs text-slate-400 font-semibold">Address</p><p class="text-sm text-slate-800">${p.address}</p></div>
                        <div><p class="text-xs text-slate-400 font-semibold">Fee</p><p class="text-sm text-slate-800 font-bold">₱${Number(p.fee).toFixed(2)}</p></div>
                        <div><p class="text-xs text-slate-400 font-semibold">Date Applied</p><p class="text-sm text-slate-800">${new Date(p.date_applied).toLocaleDateString('en-US', { month: 'long', day: 'numeric', year: 'numeric' })}</p></div>
                        <div><p class="text-xs text-slate-400 font-semibold">Inspector</p><p class="text-sm text-slate-800">${p.inspector || 'Not assigned'}</p></div>
                    </div>
                    <div class="bg-slate-50 rounded-xl p-4 border border-slate-200">
                        <h5 class="text-sm font-bold text-slate-700 mb-2">📎 Documents</h5>
                        <div class="flex flex-wrap gap-2">${docsHtml}</div>
                    </div>
                    ${p.notes ? `<div class="bg-brand-light/40 rounded-xl p-4 border border-brand-border"><h5 class="text-sm font-bold text-slate-700 mb-2">Notes</h5><p class="text-sm text-slate-800">${p.notes}</p></div>` : ''}
                    <div class="flex justify-end gap-2 pt-2 border-t border-slate-200">
                        <button onclick="closeModal('viewPermitModal')" class="px-4 py-2 bg-white border border-slate-200 text-slate-600 rounded-lg hover:bg-slate-50 transition text-sm font-semibold">Close</button>
                        ${p.status === 'pending' ? `<button onclick="closeModal('viewPermitModal'); reviewPermit(${p.id})" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition text-sm font-semibold"><i class="fa-solid fa-clipboard-list mr-1.5"></i> Review</button>` : ''}
                    </div>
                </div>
            `;
        }, 300);
    }

    // ============================================================
    // REVIEW PERMIT
    // ============================================================
    function reviewPermit(id) {
        const p = PERMITS[id];
        if (!p) return;
        
        reviewPermitId = id;
        document.getElementById('reviewApplicant').textContent = p.applicant;
        document.getElementById('reviewPermitId').textContent = p.permit_id;
        document.getElementById('review_status').value = p.status;
        document.getElementById('review_inspector').value = p.inspector || 'Juan Dela Cruz';
        document.getElementById('review_notes').value = p.notes || '';
        
        openModal('reviewPermitModal');
    }

    function submitReview() {
        const id = reviewPermitId;
        const p = PERMITS[id];
        if (!p) return;
        
        p.status = document.getElementById('review_status').value;
        p.inspector = document.getElementById('review_inspector').value;
        p.notes = document.getElementById('review_notes').value;
        p.date_reviewed = new Date().toISOString().split('T')[0];
        
        if (p.status === 'approved') {
            p.date_approved = new Date().toISOString().split('T')[0];
            const expiry = new Date();
            expiry.setFullYear(expiry.getFullYear() + 1);
            p.expiry_date = expiry.toISOString().split('T')[0];
        }
        
        updatePermitRow(p);
        closeModal('reviewPermitModal');
        showToast('Permit #' + p.permit_id + ' reviewed successfully!', 'success');
    }

    // ============================================================
    // UPDATE PERMIT STATUS
    // ============================================================
    function updatePermitStatus(id, status) {
        if (!confirm('Mark this permit as ' + status.toUpperCase() + '?')) return;
        
        const p = PERMITS[id];
        if (!p) return;
        
        p.status = status;
        if (status === 'approved') {
            p.date_approved = new Date().toISOString().split('T')[0];
            const expiry = new Date();
            expiry.setFullYear(expiry.getFullYear() + 1);
            p.expiry_date = expiry.toISOString().split('T')[0];
        }
        
        updatePermitRow(p);
        showToast('Permit #' + p.permit_id + ' marked as ' + status, 'success');
    }

    function updatePermitRow(p) {
        const rows = document.querySelectorAll('.permit-row');
        rows.forEach(row => {
            const applicant = row.querySelector('.font-semibold.text-slate-800.text-sm')?.textContent;
            if (applicant === p.applicant) {
                const statusBadge = row.querySelector('.px-2.py-1.rounded-full');
                const statusColors = {
                    pending: 'bg-amber-100 text-amber-700',
                    under_review: 'bg-blue-100 text-blue-700',
                    approved: 'bg-emerald-100 text-emerald-700',
                    rejected: 'bg-rose-100 text-rose-700',
                    expired: 'bg-slate-100 text-slate-500'
                };
                statusBadge.className = `px-2 py-1 rounded-full text-xs font-semibold ${statusColors[p.status] || statusColors.pending}`;
                statusBadge.textContent = p.status.replace('_', ' ').toUpperCase();
            }
        });
    }

    // ============================================================
    // SAVE PERMIT
    // ============================================================
    function savePermit(event) {
        event.preventDefault();
        showToast('Permit application submitted successfully!', 'success');
        closeModal('newPermitModal');
    }

    // ============================================================
    // EDIT PERMIT
    // ============================================================
    function editPermit(id) {
        showToast('Edit permit ID: ' + id + ' (Edit modal coming soon)', 'info');
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
    document.getElementById('searchPermit').addEventListener('input', filterPermits);
    document.getElementById('filterStatus').addEventListener('change', filterPermits);
    document.getElementById('filterType').addEventListener('change', filterPermits);

    function filterPermits() {
        const search = document.getElementById('searchPermit').value.toLowerCase();
        const status = document.getElementById('filterStatus').value;
        const type = document.getElementById('filterType').value.toLowerCase();
        let visibleCount = 0;

        document.querySelectorAll('.permit-row').forEach(row => {
            const applicant = row.dataset.applicant;
            const rowType = row.dataset.type;
            const rowStatus = row.dataset.status;
            const permitId = row.dataset.id.toLowerCase();

            const matchesSearch = applicant.includes(search) || permitId.includes(search);
            const matchesStatus = !status || rowStatus === status;
            const matchesType = !type || rowType === type;
            const isVisible = matchesSearch && matchesStatus && matchesType;

            row.style.display = isVisible ? '' : 'none';
            if (isVisible) visibleCount++;
        });

        document.getElementById('emptyState').style.display = visibleCount === 0 ? 'flex' : 'none';
    }

    function resetFilters() {
        document.getElementById('searchPermit').value = '';
        document.getElementById('filterStatus').value = '';
        document.getElementById('filterType').value = '';
        document.querySelectorAll('.permit-row').forEach(row => row.style.display = '');
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