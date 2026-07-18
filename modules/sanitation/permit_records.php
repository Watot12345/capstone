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

// Sample Permits Data (Complete History)
$permits = [
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
        'status' => 'active',
        'inspector' => 'Juan Dela Cruz',
        'date_applied' => '2026-07-15',
        'date_reviewed' => '2026-07-16',
        'date_approved' => '2026-07-17',
        'expiry_date' => '2027-07-17',
        'notes' => 'Complete documentation received',
        'documents' => ['Business Registration', 'Floor Plan', 'Health Certificate'],
        'renewal_count' => 2,
        'last_renewed' => '2026-07-17'
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
        'status' => 'active',
        'inspector' => 'Maria Santos',
        'date_applied' => '2026-07-14',
        'date_reviewed' => '2026-07-15',
        'date_approved' => '2026-07-16',
        'expiry_date' => '2027-07-16',
        'notes' => 'Fully compliant',
        'documents' => ['Market Permit', 'Health Certificate'],
        'renewal_count' => 1,
        'last_renewed' => '2026-07-16'
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
        'documents' => ['Business Registration'],
        'renewal_count' => 0,
        'last_renewed' => null
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
        'status' => 'expired',
        'inspector' => 'Ana Reyes',
        'date_applied' => '2025-07-13',
        'date_reviewed' => '2025-07-15',
        'date_approved' => '2025-07-20',
        'expiry_date' => '2026-07-20',
        'notes' => 'Failed inspection - safety violations',
        'documents' => ['Business Registration', 'Floor Plan'],
        'renewal_count' => 0,
        'last_renewed' => null
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
        'status' => 'active',
        'inspector' => 'Juan Dela Cruz',
        'date_applied' => '2026-07-12',
        'date_reviewed' => '2026-07-14',
        'date_approved' => '2026-07-15',
        'expiry_date' => '2027-07-15',
        'notes' => 'All requirements met',
        'documents' => ['Business Registration', 'Floor Plan', 'Health Certificate', 'Waste Disposal Plan'],
        'renewal_count' => 3,
        'last_renewed' => '2026-07-15'
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
        'status' => 'under_review',
        'inspector' => 'Maria Santos',
        'date_applied' => '2026-07-16',
        'date_reviewed' => '2026-07-16',
        'date_approved' => null,
        'expiry_date' => null,
        'notes' => 'Under review - requires additional FDA documents',
        'documents' => ['Business Registration', 'Floor Plan', 'Pharmacy License'],
        'renewal_count' => 0,
        'last_renewed' => null
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
        'documents' => ['Farm Permit', 'Health Certificate'],
        'renewal_count' => 0,
        'last_renewed' => null
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
        'status' => 'rejected',
        'inspector' => 'Juan Dela Cruz',
        'date_applied' => '2026-07-17',
        'date_reviewed' => '2026-07-18',
        'date_approved' => null,
        'expiry_date' => null,
        'notes' => 'Rejected - incomplete requirements',
        'documents' => ['Business Registration'],
        'renewal_count' => 0,
        'last_renewed' => null
    ],
    [
        'id' => 9,
        'permit_id' => 'SP-1048',
        'applicant' => 'Sunset View Hotel',
        'business_type' => 'Hotel/Lodging',
        'address' => '606 Luna St., Barangay San Roque',
        'barangay' => 'Barangay San Roque',
        'owner_name' => 'Liza Santos',
        'contact' => '09123456781',
        'email' => 'sunset.hotel@email.com',
        'fee' => 3000.00,
        'paid' => true,
        'payment_method' => 'GCash',
        'status' => 'active',
        'inspector' => 'Ana Reyes',
        'date_applied' => '2026-07-10',
        'date_reviewed' => '2026-07-12',
        'date_approved' => '2026-07-13',
        'expiry_date' => '2027-07-13',
        'notes' => 'All requirements met',
        'documents' => ['Business Registration', 'Floor Plan', 'Health Certificate', 'Fire Safety Certificate'],
        'renewal_count' => 1,
        'last_renewed' => '2026-07-13'
    ],
    [
        'id' => 10,
        'permit_id' => 'SP-1049',
        'applicant' => 'Healthy Choice Café',
        'business_type' => 'Food Establishment',
        'address' => '707 Rizal St., Barangay San Jose',
        'barangay' => 'Barangay San Jose',
        'owner_name' => 'Jose Mendoza',
        'contact' => '09123456780',
        'email' => 'healthy.cafe@email.com',
        'fee' => 1500.00,
        'paid' => true,
        'payment_method' => 'Cash',
        'status' => 'active',
        'inspector' => 'Maria Santos',
        'date_applied' => '2026-07-08',
        'date_reviewed' => '2026-07-10',
        'date_approved' => '2026-07-11',
        'expiry_date' => '2027-07-11',
        'notes' => 'Fully compliant - recommended',
        'documents' => ['Business Registration', 'Floor Plan', 'Health Certificate'],
        'renewal_count' => 1,
        'last_renewed' => '2026-07-11'
    ],
];

// Stats
$totalPermits = count($permits);
$activePermits = count(array_filter($permits, fn($p) => $p['status'] === 'active'));
$pendingPermits = count(array_filter($permits, fn($p) => $p['status'] === 'pending'));
$expiredPermits = count(array_filter($permits, fn($p) => $p['status'] === 'expired'));
$underReview = count(array_filter($permits, fn($p) => $p['status'] === 'under_review'));
$rejected = count(array_filter($permits, fn($p) => $p['status'] === 'rejected'));
$totalRevenue = array_sum(array_column($permits, 'fee'));
$totalRenewals = array_sum(array_column($permits, 'renewal_count'));

// Pagination (Client-side filtering will handle pagination)
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$limit = 5;
$offset = ($page - 1) * $limit;
$totalPages = ceil($totalPermits / $limit);
$paginatedPermits = array_slice($permits, $offset, $limit);

$title = 'Permit Records';
?>

<!-- ============================================================ -->
<!-- 2. HTML + PHP EMBEDDED + Tailwind CSS                       -->
<!-- ============================================================ -->

<div class="flex-1 px-6 pt-[26px] pb-20 mb-10 flex flex-col min-h-0 overflow-hidden">

    <!-- Page Header -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6">
        <div>
            <h2 class="text-2xl font-black text-slate-900 tracking-tight">Permit Records</h2>
            <p class="text-sm text-slate-500 mt-0.5">View all permit records, history, and status</p>
        </div>
        <div class="flex gap-3">
            <button onclick="exportPermitRecords()"
                    class="px-4 py-2 bg-white border border-slate-200 text-slate-700 rounded-lg hover:bg-slate-50 transition-colors text-sm font-semibold flex items-center gap-2">
                <i class="fa-solid fa-download text-xs"></i> Export Records
            </button>
        </div>
    </div>

    <!-- ============================================================ -->
<!-- MODERN KPI CARDS - Updated to match design               -->
<!-- ============================================================ -->
<div class="grid grid-cols-2 md:grid-cols-6 gap-4 mb-6">
    <!-- Card 1: Total Permits -->
    <div class="relative overflow-hidden bg-white rounded-2xl shadow-sm border border-slate-200 p-5 hover:shadow-lg transition group">
        <div class="absolute -top-12 -right-12 w-24 h-24 bg-blue-100 rounded-full opacity-50 group-hover:scale-110 transition"></div>
        <div class="relative">
            <div class="flex items-center gap-3">
                <div class="w-11 h-11 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl flex items-center justify-center text-white shadow-lg shadow-blue-200">
                    <i class="fa-solid fa-file-lines text-lg"></i>
                </div>
                <div>
                    <p class="text-2xl font-black text-slate-900"><?php echo $totalPermits; ?></p>
                    <p class="text-xs font-medium text-slate-500">Total Permits</p>
                </div>
            </div>
            <div class="mt-3 flex items-center gap-2">
                <span class="px-2 py-0.5 bg-blue-100 text-blue-700 rounded-full text-[10px] font-bold">📋 All permits</span>
                <span class="text-[10px] text-slate-400"><?php echo $activePermits; ?> active</span>
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
                    <p class="text-2xl font-black text-emerald-600"><?php echo $activePermits; ?></p>
                    <p class="text-xs font-medium text-slate-500">Active</p>
                </div>
            </div>
            <div class="mt-3 flex items-center gap-2">
                <span class="px-2 py-0.5 bg-emerald-100 text-emerald-700 rounded-full text-[10px] font-bold">✅ Valid</span>
                <span class="text-[10px] text-slate-400">Currently active</span>
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
                    <p class="text-2xl font-black text-amber-600"><?php echo $pendingPermits; ?></p>
                    <p class="text-xs font-medium text-slate-500">Pending</p>
                </div>
            </div>
            <div class="mt-3 flex items-center gap-2">
                <span class="px-2 py-0.5 bg-amber-100 text-amber-700 rounded-full text-[10px] font-bold">⏳ Awaiting</span>
                <span class="text-[10px] text-slate-400">Initial review</span>
            </div>
        </div>
    </div>

    <!-- Card 4: Under Review -->
    <div class="relative overflow-hidden bg-white rounded-2xl shadow-sm border border-slate-200 p-5 hover:shadow-lg transition group">
        <div class="absolute -top-12 -right-12 w-24 h-24 bg-blue-100 rounded-full opacity-50 group-hover:scale-110 transition"></div>
        <div class="relative">
            <div class="flex items-center gap-3">
                <div class="w-11 h-11 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl flex items-center justify-center text-white shadow-lg shadow-blue-200">
                    <i class="fa-solid fa-clipboard-list text-lg"></i>
                </div>
                <div>
                    <p class="text-2xl font-black text-blue-600"><?php echo $underReview; ?></p>
                    <p class="text-xs font-medium text-slate-500">Under Review</p>
                </div>
            </div>
            <div class="mt-3 flex items-center gap-2">
                <span class="px-2 py-0.5 bg-blue-100 text-blue-700 rounded-full text-[10px] font-bold">🔍 In progress</span>
                <span class="text-[10px] text-slate-400">Being evaluated</span>
            </div>
        </div>
    </div>

    <!-- Card 5: Expired -->
    <div class="relative overflow-hidden bg-white rounded-2xl shadow-sm border border-slate-200 p-5 hover:shadow-lg transition group">
        <div class="absolute -top-12 -right-12 w-24 h-24 bg-slate-100 rounded-full opacity-50 group-hover:scale-110 transition"></div>
        <div class="relative">
            <div class="flex items-center gap-3">
                <div class="w-11 h-11 bg-gradient-to-br from-slate-500 to-slate-600 rounded-xl flex items-center justify-center text-white shadow-lg shadow-slate-200">
                    <i class="fa-solid fa-calendar-xmark text-lg"></i>
                </div>
                <div>
                    <p class="text-2xl font-black text-slate-600"><?php echo $expiredPermits; ?></p>
                    <p class="text-xs font-medium text-slate-500">Expired</p>
                </div>
            </div>
            <div class="mt-3 flex items-center gap-2">
                <span class="px-2 py-0.5 bg-slate-100 text-slate-600 rounded-full text-[10px] font-bold">📅 Overdue</span>
                <span class="text-[10px] text-slate-400">Needs renewal</span>
            </div>
        </div>
    </div>

    <!-- Card 6: Rejected -->
    <div class="relative overflow-hidden bg-white rounded-2xl shadow-sm border border-slate-200 p-5 hover:shadow-lg transition group">
        <div class="absolute -top-12 -right-12 w-24 h-24 bg-rose-100 rounded-full opacity-50 group-hover:scale-110 transition"></div>
        <div class="relative">
            <div class="flex items-center gap-3">
                <div class="w-11 h-11 bg-gradient-to-br from-rose-500 to-rose-600 rounded-xl flex items-center justify-center text-white shadow-lg shadow-rose-200">
                    <i class="fa-solid fa-circle-xmark text-lg"></i>
                </div>
                <div>
                    <p class="text-2xl font-black text-rose-600"><?php echo $rejected; ?></p>
                    <p class="text-xs font-medium text-slate-500">Rejected</p>
                </div>
            </div>
            <div class="mt-3 flex items-center gap-2">
                <span class="px-2 py-0.5 bg-rose-100 text-rose-700 rounded-full text-[10px] font-bold">❌ Denied</span>
                <span class="text-[10px] text-slate-400">Non-compliant</span>
            </div>
        </div>
    </div>
</div>

<!-- ============================================================ -->
<!-- MODERN SUMMARY CARDS                                        -->
<!-- ============================================================ -->
<div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-6">
    <!-- Revenue Card -->
    <div class="relative overflow-hidden bg-gradient-to-r from-emerald-500 to-emerald-600 rounded-2xl p-5 shadow-sm">
        <div class="absolute -top-12 -right-12 w-32 h-32 bg-white/10 rounded-full"></div>
        <div class="relative flex items-center justify-between text-white">
            <div>
                <p class="text-sm font-medium opacity-80">💰 Total Revenue</p>
                <p class="text-2xl font-bold mt-1">₱<?php echo number_format($totalRevenue, 2); ?></p>
            </div>
            <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center">
                <i class="fa-solid fa-coins text-2xl text-white/80"></i>
            </div>
        </div>
    </div>

    <!-- Renewals Card -->
    <div class="relative overflow-hidden bg-gradient-to-r from-blue-500 to-blue-600 rounded-2xl p-5 shadow-sm">
        <div class="absolute -top-12 -right-12 w-32 h-32 bg-white/10 rounded-full"></div>
        <div class="relative flex items-center justify-between text-white">
            <div>
                <p class="text-sm font-medium opacity-80">🔄 Total Renewals</p>
                <p class="text-2xl font-bold mt-1"><?php echo $totalRenewals; ?></p>
            </div>
            <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center">
                <i class="fa-solid fa-rotate text-2xl text-white/80"></i>
            </div>
        </div>
    </div>

    <!-- Active Rate Card -->
    <div class="relative overflow-hidden bg-gradient-to-r from-purple-500 to-purple-600 rounded-2xl p-5 shadow-sm">
        <div class="absolute -top-12 -right-12 w-32 h-32 bg-white/10 rounded-full"></div>
        <div class="relative flex items-center justify-between text-white">
            <div>
                <p class="text-sm font-medium opacity-80">📋 Active Rate</p>
                <p class="text-2xl font-bold mt-1"><?php echo $totalPermits > 0 ? round(($activePermits / $totalPermits) * 100) : 0; ?>%</p>
            </div>
            <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center">
                <i class="fa-solid fa-chart-pie text-2xl text-white/80"></i>
            </div>
        </div>
    </div>
</div>

    <!-- Summary Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-3 mb-4">
        <div class="bg-gradient-to-r from-emerald-50 to-white rounded-xl shadow-xs p-3 border border-emerald-200">
            <p class="text-xs text-emerald-600 font-medium">💰 Total Revenue</p>
            <p class="text-xl font-bold text-emerald-700">₱<?php echo number_format($totalRevenue, 2); ?></p>
        </div>
        <div class="bg-gradient-to-r from-blue-50 to-white rounded-xl shadow-xs p-3 border border-blue-200">
            <p class="text-xs text-blue-600 font-medium">🔄 Total Renewals</p>
            <p class="text-xl font-bold text-blue-700"><?php echo $totalRenewals; ?></p>
        </div>
        <div class="bg-gradient-to-r from-purple-50 to-white rounded-xl shadow-xs p-3 border border-purple-200">
            <p class="text-xs text-purple-600 font-medium">📋 Active Rate</p>
            <p class="text-xl font-bold text-purple-700"><?php echo $totalPermits > 0 ? round(($activePermits / $totalPermits) * 100) : 0; ?>%</p>
        </div>
    </div>

    <!-- Search & Filter -->
    <div class="bg-white rounded-xl shadow-xs p-4 border border-slate-200 mb-6">
        <div class="flex flex-col sm:flex-row gap-3">
            <div class="flex-1 relative">
                <i class="fa-solid fa-search absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-sm"></i>
                <input type="text"
                       id="searchPermitRecord"
                       placeholder="Search by permit ID, applicant, or business type..."
                       class="w-full pl-9 pr-4 py-2 border border-slate-200 rounded-lg focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none text-sm transition">
            </div>
            <div class="flex gap-2 flex-wrap">
                <select id="filterStatus" class="px-4 py-2 border border-slate-200 rounded-lg focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none text-sm bg-white">
                    <option value="">All Status</option>
                    <option value="active">Active</option>
                    <option value="pending">Pending</option>
                    <option value="under_review">Under Review</option>
                    <option value="expired">Expired</option>
                    <option value="rejected">Rejected</option>
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
                    <option value="Hotel/Lodging">Hotel/Lodging</option>
                </select>
                <select id="filterBarangay" class="px-4 py-2 border border-slate-200 rounded-lg focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none text-sm bg-white">
                    <option value="">All Barangays</option>
                    <option value="Barangay San Jose">San Jose</option>
                    <option value="Barangay Poblacion">Poblacion</option>
                    <option value="Barangay Riverside">Riverside</option>
                    <option value="Barangay San Roque">San Roque</option>
                    <option value="Barangay Sta. Cruz">Sta. Cruz</option>
                </select>
                <button onclick="resetFilters()" title="Reset filters"
                        class="px-3 py-2 bg-slate-100 text-slate-500 rounded-lg hover:bg-slate-200 hover:text-slate-700 transition-colors text-sm">
                    <i class="fa-solid fa-rotate-right"></i>
                </button>
            </div>
        </div>
        <!-- Quick Filter Buttons -->
        <div class="flex flex-wrap gap-2 mt-3 pt-3 border-t border-slate-100">
            <span class="text-xs font-semibold text-slate-500 uppercase tracking-wide mr-1">Quick Filters:</span>
            <button onclick="quickFilter('all')" class="quick-filter-btn px-3 py-1 text-xs rounded-lg border border-slate-200 text-slate-600 hover:bg-brand-light/40 hover:border-brand-medium transition-all active:bg-brand-dark active:text-white active:border-brand-dark">
                All
            </button>
            <button onclick="quickFilter('active')" class="quick-filter-btn px-3 py-1 text-xs rounded-lg border border-slate-200 text-slate-600 hover:bg-brand-light/40 hover:border-brand-medium transition-all">
                ✅ Active
            </button>
            <button onclick="quickFilter('expired')" class="quick-filter-btn px-3 py-1 text-xs rounded-lg border border-slate-200 text-slate-600 hover:bg-brand-light/40 hover:border-brand-medium transition-all">
                ⏰ Expired
            </button>
            <button onclick="quickFilter('pending')" class="quick-filter-btn px-3 py-1 text-xs rounded-lg border border-slate-200 text-slate-600 hover:bg-brand-light/40 hover:border-brand-medium transition-all">
                ⏳ Pending
            </button>
            <button onclick="quickFilter('under_review')" class="quick-filter-btn px-3 py-1 text-xs rounded-lg border border-slate-200 text-slate-600 hover:bg-brand-light/40 hover:border-brand-medium transition-all">
                📋 Under Review
            </button>
            <button onclick="quickFilter('rejected')" class="quick-filter-btn px-3 py-1 text-xs rounded-lg border border-slate-200 text-slate-600 hover:bg-brand-light/40 hover:border-brand-medium transition-all">
                ❌ Rejected
            </button>
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
                        <th class="px-4 py-3 text-left text-[10px] font-bold text-slate-500 uppercase tracking-wider">Expiry</th>
                        <th class="px-4 py-3 text-left text-[10px] font-bold text-slate-500 uppercase tracking-wider">Renewals</th>
                        <th class="px-4 py-3 text-center text-[10px] font-bold text-slate-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody id="permitRecordTableBody">
                    <?php foreach ($paginatedPermits as $permit): ?>
                    <tr class="border-b border-slate-100 hover:bg-brand-light/40 transition-colors permit-record-row"
                        data-applicant="<?php echo strtolower($permit['applicant']); ?>"
                        data-type="<?php echo strtolower($permit['business_type']); ?>"
                        data-status="<?php echo $permit['status']; ?>"
                        data-barangay="<?php echo $permit['barangay']; ?>"
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
                        </td>
                        <td class="px-4 py-3">
                            <?php
                                $statusColors = [
                                    'active' => 'bg-emerald-100 text-emerald-700',
                                    'pending' => 'bg-amber-100 text-amber-700',
                                    'under_review' => 'bg-blue-100 text-blue-700',
                                    'expired' => 'bg-slate-100 text-slate-500',
                                    'rejected' => 'bg-rose-100 text-rose-700'
                                ];
                            ?>
                            <span class="px-2 py-1 rounded-full text-xs font-semibold <?php echo $statusColors[$permit['status']] ?? $statusColors['pending']; ?>">
                                <?php echo str_replace('_', ' ', ucfirst($permit['status'])); ?>
                            </span>
                        </td>
                        <td class="px-4 py-3 text-slate-500 text-xs">
                            <?php echo $permit['expiry_date'] ? date('M d, Y', strtotime($permit['expiry_date'])) : '—'; ?>
                            <?php if ($permit['expiry_date'] && strtotime($permit['expiry_date']) < time() && $permit['status'] !== 'expired'): ?>
                                <span class="block text-[10px] text-rose-500">⚠️ Expired</span>
                            <?php endif; ?>
                        </td>
                        <td class="px-4 py-3 text-center">
                            <span class="text-xs font-semibold text-brand-dark"><?php echo $permit['renewal_count']; ?></span>
                            <?php if ($permit['renewal_count'] > 0): ?>
                                <span class="block text-[10px] text-slate-400">Last: <?php echo date('M Y', strtotime($permit['last_renewed'])); ?></span>
                            <?php endif; ?>
                        </td>
                        <td class="px-4 py-3">
                            <div class="flex items-center justify-center gap-1">
                                <button onclick="viewPermitRecord(<?php echo $permit['id']; ?>)"
                                        class="p-1.5 text-brand-medium hover:bg-brand-light rounded-lg transition" title="View">
                                    <i class="fa-solid fa-eye text-sm"></i>
                                </button>
                                <?php if ($permit['status'] === 'expired'): ?>
                                    <button onclick="renewPermit(<?php echo $permit['id']; ?>)"
                                            class="p-1.5 text-emerald-600 hover:bg-emerald-50 rounded-lg transition" title="Renew">
                                        <i class="fa-solid fa-rotate text-sm"></i>
                                    </button>
                                <?php endif; ?>
                                <?php if ($permit['status'] === 'active' || $permit['status'] === 'under_review'): ?>
                                    <button onclick="editPermitRecord(<?php echo $permit['id']; ?>)"
                                            class="p-1.5 text-slate-500 hover:bg-slate-100 hover:text-slate-700 rounded-lg transition" title="Edit">
                                        <i class="fa-solid fa-pen text-sm"></i>
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
                <span class="font-semibold text-slate-700"><?php echo min($offset + $limit, $totalPermits); ?></span> of
                <span class="font-semibold text-slate-700"><?php echo $totalPermits; ?></span> permits
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
<!-- VIEW PERMIT RECORD MODAL                                     -->
<!-- ============================================================ -->
<div id="viewPermitRecordModal" class="hidden fixed inset-0 bg-slate-900/50 backdrop-blur-sm z-50 items-center justify-center p-4">
    <div class="bg-white rounded-2xl shadow-xl w-full max-w-2xl max-h-[90vh] overflow-y-auto">
        <div class="flex items-center justify-between px-6 py-4 border-b border-slate-200 sticky top-0 bg-white rounded-t-2xl">
            <h3 class="font-bold text-slate-900">Permit Record Details</h3>
            <button onclick="closeModal('viewPermitRecordModal')" class="w-8 h-8 rounded-lg hover:bg-slate-100 flex items-center justify-center text-slate-400 hover:text-slate-600 transition">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>
        <div id="permitRecordDetailsContent" class="p-6">
            <div class="flex items-center justify-center py-10 text-slate-400 text-sm">
                <i class="fa-solid fa-spinner fa-spin mr-2"></i> Loading...
            </div>
        </div>
    </div>
</div>

<!-- ============================================================ -->
<!-- RENEW PERMIT MODAL                                           -->
<!-- ============================================================ -->
<div id="renewPermitModal" class="hidden fixed inset-0 bg-slate-900/50 backdrop-blur-sm z-50 items-center justify-center p-4">
    <div class="bg-white rounded-2xl shadow-xl w-full max-w-md">
        <div class="flex items-center justify-between px-6 py-4 border-b border-slate-200">
            <h3 class="font-bold text-slate-900">Renew Permit</h3>
            <button onclick="closeModal('renewPermitModal')" class="w-8 h-8 rounded-lg hover:bg-slate-100 flex items-center justify-center text-slate-400 hover:text-slate-600 transition">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>
        <div class="p-6 space-y-4">
            <div class="flex items-center gap-3 p-3 bg-brand-light/40 rounded-xl border border-brand-border">
                <div>
                    <p id="renewPermitId" class="font-semibold text-slate-800 text-sm">SP-1043</p>
                    <p id="renewApplicant" class="text-xs text-slate-400">City Gym</p>
                </div>
            </div>
            <div>
                <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">Renewal Fee</label>
                <input type="number" id="renew_fee" class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none" value="2000.00">
            </div>
            <div>
                <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">Payment Method</label>
                <select id="renew_payment" class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm bg-white focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none">
                    <option value="Cash">Cash</option>
                    <option value="GCash">GCash</option>
                    <option value="Bank Transfer">Bank Transfer</option>
                </select>
            </div>
            <div>
                <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">Notes</label>
                <textarea id="renew_notes" rows="2" class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none" placeholder="Renewal notes..."></textarea>
            </div>
        </div>
        <div class="flex justify-end gap-2 px-6 pb-6">
            <button type="button" onclick="closeModal('renewPermitModal')"
                    class="px-4 py-2 bg-white border border-slate-200 text-slate-600 rounded-lg hover:bg-slate-50 transition text-sm font-semibold">
                Cancel
            </button>
            <button type="button" onclick="confirmRenew()"
                    class="px-4 py-2 bg-brand-dark text-white rounded-lg hover:bg-brand-medium transition text-sm font-semibold">
                <i class="fa-solid fa-rotate mr-1.5"></i> Renew Permit
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
    const PERMITS = <?php echo json_encode(array_column($permits, null, 'id'), JSON_PRETTY_PRINT); ?>;
    let renewPermitId = null;

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
    // VIEW PERMIT RECORD
    // ============================================================
    function viewPermitRecord(id) {
        openModal('viewPermitRecordModal');
        const p = PERMITS[id];
        if (!p) return;

        setTimeout(() => {
            const statusColors = {
                active: 'bg-emerald-100 text-emerald-700',
                pending: 'bg-amber-100 text-amber-700',
                under_review: 'bg-blue-100 text-blue-700',
                expired: 'bg-slate-100 text-slate-500',
                rejected: 'bg-rose-100 text-rose-700'
            };

            const docsHtml = p.documents.map(d => `
                <span class="px-2 py-1 bg-slate-100 rounded text-xs text-slate-600">${d}</span>
            `).join('');

            const statusHistory = [
                { date: p.date_applied, status: 'Applied', color: 'bg-blue-100 text-blue-700' },
                { date: p.date_reviewed, status: 'Under Review', color: 'bg-purple-100 text-purple-700' },
                { date: p.date_approved, status: 'Approved', color: 'bg-emerald-100 text-emerald-700' }
            ].filter(item => item.date);

            const historyHtml = statusHistory.map(item => `
                <div class="flex items-center gap-3">
                    <div class="w-2 h-2 rounded-full ${item.color.replace('bg-', 'bg-').replace(' text-', ' border-')}"></div>
                    <span class="text-xs text-slate-600">${item.status}</span>
                    <span class="text-xs text-slate-400">${new Date(item.date).toLocaleDateString()}</span>
                </div>
            `).join('');

            document.getElementById('permitRecordDetailsContent').innerHTML = `
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
                        <div><p class="text-xs text-slate-400 font-semibold">Fee</p><p class="text-sm text-slate-800 font-bold">₱${Number(p.fee).toFixed(2)}</p></div>
                        <div><p class="text-xs text-slate-400 font-semibold">Status</p><p class="text-sm text-slate-800">${p.status.replace('_', ' ').toUpperCase()}</p></div>
                        <div><p class="text-xs text-slate-400 font-semibold">Date Applied</p><p class="text-sm text-slate-800">${new Date(p.date_applied).toLocaleDateString('en-US', { month: 'long', day: 'numeric', year: 'numeric' })}</p></div>
                        <div><p class="text-xs text-slate-400 font-semibold">Expiry Date</p><p class="text-sm text-slate-800">${p.expiry_date ? new Date(p.expiry_date).toLocaleDateString('en-US', { month: 'long', day: 'numeric', year: 'numeric' }) : '—'}</p></div>
                    </div>
                    <div class="bg-slate-50 rounded-xl p-4 border border-slate-200">
                        <h5 class="text-sm font-bold text-slate-700 mb-2">📎 Documents</h5>
                        <div class="flex flex-wrap gap-2">${docsHtml}</div>
                    </div>
                    <div class="bg-brand-light/40 rounded-xl p-4 border border-brand-border">
                        <h5 class="text-sm font-bold text-slate-700 mb-2">🔄 Status History</h5>
                        <div class="space-y-2">${historyHtml || '<p class="text-xs text-slate-400">No history available</p>'}</div>
                    </div>
                    ${p.notes ? `<div class="bg-slate-50 rounded-xl p-4 border border-slate-200"><h5 class="text-sm font-bold text-slate-700 mb-2">Notes</h5><p class="text-sm text-slate-800">${p.notes}</p></div>` : ''}
                    <div class="flex justify-end gap-2 pt-2 border-t border-slate-200">
                        <button onclick="closeModal('viewPermitRecordModal')" class="px-4 py-2 bg-white border border-slate-200 text-slate-600 rounded-lg hover:bg-slate-50 transition text-sm font-semibold">Close</button>
                        ${p.status === 'expired' ? `<button onclick="closeModal('viewPermitRecordModal'); renewPermit(${p.id})" class="px-4 py-2 bg-emerald-600 text-white rounded-lg hover:bg-emerald-700 transition text-sm font-semibold"><i class="fa-solid fa-rotate mr-1.5"></i> Renew</button>` : ''}
                    </div>
                </div>
            `;
        }, 300);
    }

    // ============================================================
    // RENEW PERMIT
    // ============================================================
    function renewPermit(id) {
        const p = PERMITS[id];
        if (!p) return;
        
        renewPermitId = id;
        document.getElementById('renewPermitId').textContent = p.permit_id;
        document.getElementById('renewApplicant').textContent = p.applicant;
        document.getElementById('renew_fee').value = p.fee;
        
        openModal('renewPermitModal');
    }

    function confirmRenew() {
        const id = renewPermitId;
        const p = PERMITS[id];
        if (!p) return;
        
        p.status = 'active';
        p.renewal_count += 1;
        p.last_renewed = new Date().toISOString().split('T')[0];
        const newExpiry = new Date();
        newExpiry.setFullYear(newExpiry.getFullYear() + 1);
        p.expiry_date = newExpiry.toISOString().split('T')[0];
        p.fee = parseFloat(document.getElementById('renew_fee').value) || p.fee;
        p.notes = document.getElementById('renew_notes').value || p.notes;
        
        updatePermitRecordRow(p);
        closeModal('renewPermitModal');
        showToast('Permit #' + p.permit_id + ' renewed successfully!', 'success');
    }

    function updatePermitRecordRow(p) {
        const rows = document.querySelectorAll('.permit-record-row');
        rows.forEach(row => {
            const applicant = row.querySelector('.font-semibold.text-slate-800.text-sm')?.textContent;
            if (applicant === p.applicant) {
                const statusBadge = row.querySelector('.px-2.py-1.rounded-full');
                const statusColors = {
                    active: 'bg-emerald-100 text-emerald-700',
                    pending: 'bg-amber-100 text-amber-700',
                    under_review: 'bg-blue-100 text-blue-700',
                    expired: 'bg-slate-100 text-slate-500',
                    rejected: 'bg-rose-100 text-rose-700'
                };
                statusBadge.className = `px-2 py-1 rounded-full text-xs font-semibold ${statusColors[p.status] || statusColors.pending}`;
                statusBadge.textContent = p.status.replace('_', ' ').toUpperCase();
                
                // Update renewals count
                const renewalsCell = row.querySelector('.text-xs.font-semibold.text-brand-dark');
                if (renewalsCell) {
                    renewalsCell.textContent = p.renewal_count;
                    const lastRenewed = row.querySelector('.block.text-\\[10px\\].text-slate-400');
                    if (lastRenewed) {
                        lastRenewed.textContent = 'Last: ' + new Date(p.last_renewed).toLocaleDateString('en-US', { month: 'short', year: 'numeric' });
                    }
                }
                
                // Update expiry date
                const expiryCell = row.querySelector('.px-4.py-3.text-slate-500.text-xs');
                if (expiryCell) {
                    expiryCell.innerHTML = p.expiry_date ? new Date(p.expiry_date).toLocaleDateString('en-US', { month: 'short', day: 'numeric', year: 'numeric' }) : '—';
                }
            }
        });
    }

    // ============================================================
    // EDIT PERMIT RECORD
    // ============================================================
    function editPermitRecord(id) {
        showToast('Edit permit ID: ' + id + ' (Edit modal coming soon)', 'info');
    }

    // ============================================================
    // QUICK FILTER
    // ============================================================
    function quickFilter(status) {
        document.getElementById('filterStatus').value = status === 'all' ? '' : status;
        document.querySelectorAll('.quick-filter-btn').forEach(btn => {
            btn.classList.remove('bg-brand-dark', 'text-white', 'border-brand-dark');
        });
        if (status !== 'all') {
            document.querySelectorAll('.quick-filter-btn').forEach(btn => {
                if (btn.textContent.trim().toLowerCase().includes(status.replace('_', ' '))) {
                    btn.classList.add('bg-brand-dark', 'text-white', 'border-brand-dark');
                }
            });
        }
        filterPermitRecords();
    }

    // ============================================================
    // EXPORT PERMIT RECORDS
    // ============================================================
    function exportPermitRecords() {
        const rows = document.querySelectorAll('.permit-record-row:not([style*="display: none"])');
        if (rows.length === 0) {
            showToast('No records to export', 'warning');
            return;
        }
        
        let csv = 'Permit ID,Applicant,Business Type,Barangay,Status,Fee,Expiry Date,Renewals\n';
        rows.forEach(row => {
            const cells = row.querySelectorAll('td');
            const permitId = cells[0]?.textContent.trim() || '';
            const applicant = cells[1]?.querySelector('.font-semibold')?.textContent.trim() || '';
            const businessType = cells[2]?.textContent.trim() || '';
            const barangay = cells[3]?.textContent.trim() || '';
            const fee = cells[4]?.textContent.trim() || '';
            const status = cells[5]?.textContent.trim() || '';
            const expiry = cells[6]?.textContent.trim() || '';
            const renewals = cells[7]?.querySelector('.text-xs.font-semibold')?.textContent.trim() || '0';
            
            csv += `"${permitId}","${applicant}","${businessType}","${barangay}","${status}","${fee}","${expiry}","${renewals}"\n`;
        });
        
        const blob = new Blob([csv], { type: 'text/csv;charset=utf-8;' });
        const url = URL.createObjectURL(blob);
        const a = document.createElement('a');
        a.href = url;
        a.download = 'permit_records_' + new Date().toISOString().slice(0,10) + '.csv';
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);
        URL.revokeObjectURL(url);
        showToast('Exported ' + rows.length + ' records successfully!', 'success');
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
    document.getElementById('searchPermitRecord').addEventListener('input', filterPermitRecords);
    document.getElementById('filterStatus').addEventListener('change', filterPermitRecords);
    document.getElementById('filterType').addEventListener('change', filterPermitRecords);
    document.getElementById('filterBarangay').addEventListener('change', filterPermitRecords);

    function filterPermitRecords() {
        const search = document.getElementById('searchPermitRecord').value.toLowerCase();
        const status = document.getElementById('filterStatus').value;
        const type = document.getElementById('filterType').value.toLowerCase();
        const barangay = document.getElementById('filterBarangay').value;
        let visibleCount = 0;

        document.querySelectorAll('.permit-record-row').forEach(row => {
            const applicant = row.dataset.applicant;
            const rowType = row.dataset.type;
            const rowStatus = row.dataset.status;
            const rowBarangay = row.dataset.barangay;
            const permitId = row.dataset.id.toLowerCase();

            const matchesSearch = applicant.includes(search) || permitId.includes(search);
            const matchesStatus = !status || rowStatus === status;
            const matchesType = !type || rowType === type;
            const matchesBarangay = !barangay || rowBarangay === barangay;
            const isVisible = matchesSearch && matchesStatus && matchesType && matchesBarangay;

            row.style.display = isVisible ? '' : 'none';
            if (isVisible) visibleCount++;
        });

        document.getElementById('emptyState').style.display = visibleCount === 0 ? 'flex' : 'none';
    }

    function resetFilters() {
        document.getElementById('searchPermitRecord').value = '';
        document.getElementById('filterStatus').value = '';
        document.getElementById('filterType').value = '';
        document.getElementById('filterBarangay').value = '';
        document.querySelectorAll('.quick-filter-btn').forEach(btn => {
            btn.classList.remove('bg-brand-dark', 'text-white', 'border-brand-dark');
        });
        document.querySelectorAll('.permit-record-row').forEach(row => row.style.display = '');
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