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

// Sample Permits Data (for renewal applications)
$permits = [
    ['id' => 1, 'permit_id' => 'SP-1040', 'applicant' => 'ABC Restaurant', 'business_type' => 'Food Establishment', 'fee' => 1500.00, 'status' => 'active', 'expiry_date' => '2027-07-17'],
    ['id' => 2, 'permit_id' => 'SP-1041', 'applicant' => 'Green Market Stall', 'business_type' => 'Market Vendor', 'fee' => 800.00, 'status' => 'active', 'expiry_date' => '2027-07-16'],
    ['id' => 3, 'permit_id' => 'SP-1043', 'applicant' => 'City Gym', 'business_type' => 'Recreational Facility', 'fee' => 2000.00, 'status' => 'expired', 'expiry_date' => '2026-07-20'],
    ['id' => 4, 'permit_id' => 'SP-1044', 'applicant' => 'Mega Mart', 'business_type' => 'Retail Store', 'fee' => 1000.00, 'status' => 'active', 'expiry_date' => '2027-07-15'],
    ['id' => 5, 'permit_id' => 'SP-1046', 'applicant' => 'Green Valley Farm', 'business_type' => 'Agricultural', 'fee' => 900.00, 'status' => 'expired', 'expiry_date' => '2026-07-20'],
    ['id' => 6, 'permit_id' => 'SP-1048', 'applicant' => 'Sunset View Hotel', 'business_type' => 'Hotel/Lodging', 'fee' => 3000.00, 'status' => 'active', 'expiry_date' => '2027-07-13'],
];

// Sample Renewal Applications
$renewalApplications = [
    [
        'id' => 1,
        'renewal_id' => 'REN-001',
        'permit_id' => 'SP-1043',
        'applicant' => 'City Gym',
        'business_type' => 'Recreational Facility',
        'current_fee' => 2000.00,
        'renewal_fee' => 2000.00,
        'status' => 'pending',
        'payment_method' => 'GCash',
        'payment_reference' => 'GCH-20260721-001',
        'date_applied' => '2026-07-21',
        'date_approved' => null,
        'new_expiry_date' => null,
        'notes' => 'Renewal application submitted',
        'documents' => ['Updated Floor Plan', 'Health Certificate']
    ],
    [
        'id' => 2,
        'renewal_id' => 'REN-002',
        'permit_id' => 'SP-1046',
        'applicant' => 'Green Valley Farm',
        'business_type' => 'Agricultural',
        'current_fee' => 900.00,
        'renewal_fee' => 950.00,
        'status' => 'under_review',
        'payment_method' => 'Bank Transfer',
        'payment_reference' => 'BTR-20260720-001',
        'date_applied' => '2026-07-20',
        'date_approved' => null,
        'new_expiry_date' => null,
        'notes' => 'Under review - documents verified',
        'documents' => ['Farm Permit', 'Health Certificate']
    ],
    [
        'id' => 3,
        'renewal_id' => 'REN-003',
        'permit_id' => 'SP-1044',
        'applicant' => 'Mega Mart',
        'business_type' => 'Retail Store',
        'current_fee' => 1000.00,
        'renewal_fee' => 1000.00,
        'status' => 'approved',
        'payment_method' => 'Cash',
        'payment_reference' => 'CSH-20260719-001',
        'date_applied' => '2026-07-19',
        'date_approved' => '2026-07-20',
        'new_expiry_date' => '2028-07-20',
        'notes' => 'Renewal approved',
        'documents' => ['Business Registration']
    ],
    [
        'id' => 4,
        'renewal_id' => 'REN-004',
        'permit_id' => 'SP-1040',
        'applicant' => 'ABC Restaurant',
        'business_type' => 'Food Establishment',
        'current_fee' => 1500.00,
        'renewal_fee' => 1500.00,
        'status' => 'rejected',
        'payment_method' => 'GCash',
        'payment_reference' => 'GCH-20260718-001',
        'date_applied' => '2026-07-18',
        'date_approved' => null,
        'new_expiry_date' => null,
        'notes' => 'Rejected - incomplete documents',
        'documents' => ['Health Certificate']
    ],
    [
        'id' => 5,
        'renewal_id' => 'REN-005',
        'permit_id' => 'SP-1041',
        'applicant' => 'Green Market Stall',
        'business_type' => 'Market Vendor',
        'current_fee' => 800.00,
        'renewal_fee' => 800.00,
        'status' => 'pending',
        'payment_method' => 'Cash',
        'payment_reference' => 'CSH-20260722-001',
        'date_applied' => '2026-07-22',
        'date_approved' => null,
        'new_expiry_date' => null,
        'notes' => 'Awaiting processing',
        'documents' => ['Market Permit']
    ],
    [
        'id' => 6,
        'renewal_id' => 'REN-006',
        'permit_id' => 'SP-1048',
        'applicant' => 'Sunset View Hotel',
        'business_type' => 'Hotel/Lodging',
        'current_fee' => 3000.00,
        'renewal_fee' => 3200.00,
        'status' => 'approved',
        'payment_method' => 'Bank Transfer',
        'payment_reference' => 'BTR-20260717-001',
        'date_applied' => '2026-07-17',
        'date_approved' => '2026-07-19',
        'new_expiry_date' => '2028-07-19',
        'notes' => 'Renewal approved with updated fees',
        'documents' => ['Business Registration', 'Fire Safety Certificate']
    ],
];

// Sample Renewal History
$renewalHistory = [
    [
        'id' => 1,
        'permit_id' => 'SP-1040',
        'applicant' => 'ABC Restaurant',
        'renewal_date' => '2026-07-17',
        'fee_paid' => 1500.00,
        'new_expiry' => '2027-07-17',
        'status' => 'completed'
    ],
    [
        'id' => 2,
        'permit_id' => 'SP-1044',
        'applicant' => 'Mega Mart',
        'renewal_date' => '2026-07-15',
        'fee_paid' => 1000.00,
        'new_expiry' => '2027-07-15',
        'status' => 'completed'
    ],
    [
        'id' => 3,
        'permit_id' => 'SP-1041',
        'applicant' => 'Green Market Stall',
        'renewal_date' => '2026-07-16',
        'fee_paid' => 800.00,
        'new_expiry' => '2027-07-16',
        'status' => 'completed'
    ],
    [
        'id' => 4,
        'permit_id' => 'SP-1048',
        'applicant' => 'Sunset View Hotel',
        'renewal_date' => '2026-07-13',
        'fee_paid' => 3000.00,
        'new_expiry' => '2027-07-13',
        'status' => 'completed'
    ],
    [
        'id' => 5,
        'permit_id' => 'SP-1043',
        'applicant' => 'City Gym',
        'renewal_date' => '2025-07-20',
        'fee_paid' => 2000.00,
        'new_expiry' => '2026-07-20',
        'status' => 'expired'
    ],
];

// Grace Period Settings
$gracePeriodDays = 30;
$lateFeePercentage = 25;
$interestRate = 2; // per month

// Stats
$totalRenewals = count($renewalApplications);
$pendingRenewals = count(array_filter($renewalApplications, fn($r) => $r['status'] === 'pending' || $r['status'] === 'under_review'));
$approvedRenewals = count(array_filter($renewalApplications, fn($r) => $r['status'] === 'approved'));
$rejectedRenewals = count(array_filter($renewalApplications, fn($r) => $r['status'] === 'rejected'));
$expiredPermits = count(array_filter($permits, fn($p) => $p['status'] === 'expired'));
$totalRenewalRevenue = array_sum(array_column($renewalHistory, 'fee_paid'));

// Expiring Soon (within 30 days)
$expiringSoon = array_filter($permits, function($p) {
    if ($p['status'] !== 'active' || !$p['expiry_date']) return false;
    $daysLeft = (strtotime($p['expiry_date']) - time()) / 86400;
    return $daysLeft <= 30 && $daysLeft > 0;
});

// Pagination
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$limit = 5;
$offset = ($page - 1) * $limit;
$totalPages = ceil(count($renewalApplications) / $limit);
$paginatedRenewals = array_slice($renewalApplications, $offset, $limit);

$title = 'Renewals';
?>

<!-- ============================================================ -->
<!-- 2. HTML + PHP EMBEDDED + Tailwind CSS                       -->
<!-- ============================================================ -->

<div class="flex-1 px-6 pt-[26px] pb-20 mb-10 flex flex-col min-h-0 overflow-hidden">

    <!-- Page Header -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6">
        <div>
            <h2 class="text-2xl font-black text-slate-900 tracking-tight">Renewals</h2>
            <p class="text-sm text-slate-500 mt-0.5">Manage permit renewals, reminders & history</p>
        </div>
        <div class="flex gap-3">
            <button onclick="openModal('newRenewalModal')"
                    class="px-4 py-2 bg-brand-dark text-white rounded-lg hover:bg-brand-medium transition-colors text-sm font-semibold flex items-center gap-2 shadow-sm">
                <i class="fa-solid fa-rotate text-xs"></i> New Renewal
            </button>
            <button onclick="sendAllReminders()"
                    class="px-4 py-2 bg-white border border-slate-200 text-slate-700 rounded-lg hover:bg-slate-50 transition-colors text-sm font-semibold flex items-center gap-2">
                <i class="fa-solid fa-bell text-xs"></i> Send Reminders
            </button>
        </div>
    </div>

    <!-- ============================================================ -->
<!-- MODERN KPI CARDS - Updated to match design               -->
<!-- ============================================================ -->
<div class="grid grid-cols-2 md:grid-cols-5 gap-4 mb-6">
    <!-- Card 1: Total Renewals -->
    <div class="relative overflow-hidden bg-white rounded-2xl shadow-sm border border-slate-200 p-5 hover:shadow-lg transition group">
        <div class="absolute -top-12 -right-12 w-24 h-24 bg-blue-100 rounded-full opacity-50 group-hover:scale-110 transition"></div>
        <div class="relative">
            <div class="flex items-center gap-3">
                <div class="w-11 h-11 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl flex items-center justify-center text-white shadow-lg shadow-blue-200">
                    <i class="fa-solid fa-rotate text-lg"></i>
                </div>
                <div>
                    <p class="text-2xl font-black text-slate-900"><?php echo $totalRenewals; ?></p>
                    <p class="text-xs font-medium text-slate-500">Total Renewals</p>
                </div>
            </div>
            <div class="mt-3 flex items-center gap-2">
                <span class="px-2 py-0.5 bg-blue-100 text-blue-700 rounded-full text-[10px] font-bold">🔄 All renewals</span>
                <span class="text-[10px] text-slate-400"><?php echo $approvedRenewals; ?> approved</span>
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
                    <p class="text-2xl font-black text-amber-600"><?php echo $pendingRenewals; ?></p>
                    <p class="text-xs font-medium text-slate-500">Pending</p>
                </div>
            </div>
            <div class="mt-3 flex items-center gap-2">
                <span class="px-2 py-0.5 bg-amber-100 text-amber-700 rounded-full text-[10px] font-bold">⏳ Awaiting</span>
                <span class="text-[10px] text-slate-400">Needs review</span>
            </div>
        </div>
    </div>

    <!-- Card 3: Approved -->
    <div class="relative overflow-hidden bg-white rounded-2xl shadow-sm border border-slate-200 p-5 hover:shadow-lg transition group">
        <div class="absolute -top-12 -right-12 w-24 h-24 bg-emerald-100 rounded-full opacity-50 group-hover:scale-110 transition"></div>
        <div class="relative">
            <div class="flex items-center gap-3">
                <div class="w-11 h-11 bg-gradient-to-br from-emerald-500 to-emerald-600 rounded-xl flex items-center justify-center text-white shadow-lg shadow-emerald-200">
                    <i class="fa-solid fa-check-circle text-lg"></i>
                </div>
                <div>
                    <p class="text-2xl font-black text-emerald-600"><?php echo $approvedRenewals; ?></p>
                    <p class="text-xs font-medium text-slate-500">Approved</p>
                </div>
            </div>
            <div class="mt-3 flex items-center gap-2">
                <span class="px-2 py-0.5 bg-emerald-100 text-emerald-700 rounded-full text-[10px] font-bold">✅ Completed</span>
                <span class="text-[10px] text-slate-400">Successfully renewed</span>
            </div>
        </div>
    </div>

    <!-- Card 4: Expired Permits -->
    <div class="relative overflow-hidden bg-white rounded-2xl shadow-sm border border-slate-200 p-5 hover:shadow-lg transition group">
        <div class="absolute -top-12 -right-12 w-24 h-24 bg-rose-100 rounded-full opacity-50 group-hover:scale-110 transition"></div>
        <div class="relative">
            <div class="flex items-center gap-3">
                <div class="w-11 h-11 bg-gradient-to-br from-rose-500 to-rose-600 rounded-xl flex items-center justify-center text-white shadow-lg shadow-rose-200">
                    <i class="fa-solid fa-calendar-xmark text-lg"></i>
                </div>
                <div>
                    <p class="text-2xl font-black text-rose-600"><?php echo $expiredPermits; ?></p>
                    <p class="text-xs font-medium text-slate-500">Expired Permits</p>
                </div>
            </div>
            <div class="mt-3 flex items-center gap-2">
                <span class="px-2 py-0.5 bg-rose-100 text-rose-700 rounded-full text-[10px] font-bold">🚨 Overdue</span>
                <span class="text-[10px] text-slate-400">Immediate renewal</span>
            </div>
        </div>
    </div>

    <!-- Card 5: Revenue -->
    <div class="relative overflow-hidden bg-white rounded-2xl shadow-sm border border-slate-200 p-5 hover:shadow-lg transition group">
        <div class="absolute -top-12 -right-12 w-24 h-24 bg-brand-light rounded-full opacity-50 group-hover:scale-110 transition"></div>
        <div class="relative">
            <div class="flex items-center gap-3">
                <div class="w-11 h-11 bg-gradient-to-br from-brand-dark to-brand-medium rounded-xl flex items-center justify-center text-white shadow-lg shadow-brand-light">
                    <i class="fa-solid fa-coins text-lg"></i>
                </div>
                <div>
                    <p class="text-2xl font-black text-brand-dark">₱<?php echo number_format($totalRenewalRevenue, 0); ?></p>
                    <p class="text-xs font-medium text-slate-500">Revenue</p>
                </div>
            </div>
            <div class="mt-3 flex items-center gap-2">
                <span class="px-2 py-0.5 bg-emerald-100 text-emerald-700 rounded-full text-[10px] font-bold">💰 Collected</span>
                <span class="text-[10px] text-slate-400">From renewals</span>
            </div>
        </div>
    </div>
</div>

    <!-- Expiring Soon Alert -->
    <?php if (count($expiringSoon) > 0): ?>
    <div class="bg-amber-50 border border-amber-200 rounded-xl p-3 mb-4 flex items-center justify-between">
        <div class="flex items-center gap-3">
            <i class="fa-solid fa-clock text-amber-500 text-lg"></i>
            <span class="text-sm text-amber-700">
                <span class="font-bold"><?php echo count($expiringSoon); ?></span> permit(s) expiring within <?php echo $gracePeriodDays; ?> days
            </span>
        </div>
        <button onclick="document.getElementById('quickFilter').value='expiring_soon'; filterRenewals();" 
                class="text-xs font-semibold text-amber-700 hover:text-amber-900 underline">
            View expiring
        </button>
    </div>
    <?php endif; ?>

    <!-- Grace Period Info -->
    <div class="bg-blue-50 border border-blue-200 rounded-xl p-3 mb-4 flex items-center gap-3">
        <i class="fa-solid fa-info-circle text-blue-500 text-lg"></i>
        <div class="text-sm text-blue-700">
            <span class="font-bold">Grace Period:</span> <?php echo $gracePeriodDays; ?> days after expiry 
            <span class="mx-2">•</span>
            <span class="font-bold">Late Fee:</span> <?php echo $lateFeePercentage; ?>% 
            <span class="mx-2">•</span>
            <span class="font-bold">Monthly Interest:</span> <?php echo $interestRate; ?>%
        </div>
    </div>

    <!-- Search & Filter -->
    <div class="bg-white rounded-xl shadow-xs p-4 border border-slate-200 mb-6">
        <div class="flex flex-col sm:flex-row gap-3">
            <div class="flex-1 relative">
                <i class="fa-solid fa-search absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-sm"></i>
                <input type="text"
                       id="searchRenewal"
                       placeholder="Search by permit ID, applicant, or renewal ID..."
                       class="w-full pl-9 pr-4 py-2 border border-slate-200 rounded-lg focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none text-sm transition">
            </div>
            <div class="flex gap-2 flex-wrap">
                <select id="filterStatus" class="px-4 py-2 border border-slate-200 rounded-lg focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none text-sm bg-white">
                    <option value="">All Status</option>
                    <option value="pending">Pending</option>
                    <option value="under_review">Under Review</option>
                    <option value="approved">Approved</option>
                    <option value="rejected">Rejected</option>
                </select>
                <select id="quickFilter" class="px-4 py-2 border border-slate-200 rounded-lg focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none text-sm bg-white">
                    <option value="">All Renewals</option>
                    <option value="expiring_soon">Expiring Soon</option>
                    <option value="grace_period">In Grace Period</option>
                    <option value="completed">Completed</option>
                </select>
                <button onclick="resetFilters()" title="Reset filters"
                        class="px-3 py-2 bg-slate-100 text-slate-500 rounded-lg hover:bg-slate-200 hover:text-slate-700 transition-colors text-sm">
                    <i class="fa-solid fa-rotate-right"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- Renewals Table -->
    <div class="bg-white rounded-xl shadow-xs border border-slate-200 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead class="bg-slate-50 border-b border-slate-200">
                    <tr>
                        <th class="px-4 py-3 text-left text-[10px] font-bold text-slate-500 uppercase tracking-wider">Renewal ID</th>
                        <th class="px-4 py-3 text-left text-[10px] font-bold text-slate-500 uppercase tracking-wider">Permit / Applicant</th>
                        <th class="px-4 py-3 text-left text-[10px] font-bold text-slate-500 uppercase tracking-wider">Fee</th>
                        <th class="px-4 py-3 text-left text-[10px] font-bold text-slate-500 uppercase tracking-wider">Status</th>
                        <th class="px-4 py-3 text-left text-[10px] font-bold text-slate-500 uppercase tracking-wider">Date Applied</th>
                        <th class="px-4 py-3 text-left text-[10px] font-bold text-slate-500 uppercase tracking-wider">Payment</th>
                        <th class="px-4 py-3 text-center text-[10px] font-bold text-slate-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody id="renewalTableBody">
                    <?php foreach ($paginatedRenewals as $renewal): ?>
                    <tr class="border-b border-slate-100 hover:bg-brand-light/40 transition-colors renewal-row <?php echo $renewal['status'] === 'pending' ? 'bg-amber-50/30' : ''; ?>"
                        data-applicant="<?php echo strtolower($renewal['applicant']); ?>"
                        data-status="<?php echo $renewal['status']; ?>"
                        data-id="<?php echo $renewal['renewal_id']; ?>">
                        <td class="px-4 py-3 font-mono text-xs text-brand-dark font-semibold"><?php echo $renewal['renewal_id']; ?></td>
                        <td class="px-4 py-3">
                            <div>
                                <p class="font-semibold text-slate-800 text-sm"><?php echo $renewal['applicant']; ?></p>
                                <p class="text-xs text-slate-400"><?php echo $renewal['permit_id']; ?> • <?php echo $renewal['business_type']; ?></p>
                            </div>
                        </td>
                        <td class="px-4 py-3">
                            <span class="text-sm font-bold text-slate-800">₱<?php echo number_format($renewal['renewal_fee'], 2); ?></span>
                            <span class="block text-[10px] text-slate-400">Prev: ₱<?php echo number_format($renewal['current_fee'], 2); ?></span>
                        </td>
                        <td class="px-4 py-3">
                            <?php
                                $statusColors = [
                                    'pending' => 'bg-amber-100 text-amber-700',
                                    'under_review' => 'bg-blue-100 text-blue-700',
                                    'approved' => 'bg-emerald-100 text-emerald-700',
                                    'rejected' => 'bg-rose-100 text-rose-700'
                                ];
                            ?>
                            <span class="px-2 py-1 rounded-full text-xs font-semibold <?php echo $statusColors[$renewal['status']] ?? $statusColors['pending']; ?>">
                                <?php echo str_replace('_', ' ', ucfirst($renewal['status'])); ?>
                            </span>
                        </td>
                        <td class="px-4 py-3 text-slate-500 text-xs"><?php echo date('M d, Y', strtotime($renewal['date_applied'])); ?></td>
                        <td class="px-4 py-3">
                            <?php if ($renewal['payment_method']): ?>
                                <span class="text-xs text-slate-600"><?php echo $renewal['payment_method']; ?></span>
                                <span class="block text-[10px] text-slate-400 font-mono"><?php echo $renewal['payment_reference']; ?></span>
                            <?php else: ?>
                                <span class="text-xs text-slate-400">—</span>
                            <?php endif; ?>
                        </td>
                        <td class="px-4 py-3">
                            <div class="flex items-center justify-center gap-1">
                                <button onclick="viewRenewal(<?php echo $renewal['id']; ?>)"
                                        class="p-1.5 text-brand-medium hover:bg-brand-light rounded-lg transition" title="View">
                                    <i class="fa-solid fa-eye text-sm"></i>
                                </button>
                                <?php if ($renewal['status'] === 'pending' || $renewal['status'] === 'under_review'): ?>
                                    <button onclick="updateRenewalStatus(<?php echo $renewal['id']; ?>, 'approved')"
                                            class="p-1.5 text-emerald-600 hover:bg-emerald-50 rounded-lg transition" title="Approve">
                                        <i class="fa-solid fa-check text-sm"></i>
                                    </button>
                                    <button onclick="updateRenewalStatus(<?php echo $renewal['id']; ?>, 'rejected')"
                                            class="p-1.5 text-rose-500 hover:bg-rose-50 rounded-lg transition" title="Reject">
                                        <i class="fa-solid fa-times text-sm"></i>
                                    </button>
                                <?php endif; ?>
                                <?php if ($renewal['status'] === 'approved'): ?>
                                    <button onclick="viewRenewalHistory(<?php echo $renewal['id']; ?>)"
                                            class="p-1.5 text-blue-600 hover:bg-blue-50 rounded-lg transition" title="History">
                                        <i class="fa-solid fa-clock-rotate-left text-sm"></i>
                                    </button>
                                <?php endif; ?>
                                <button onclick="sendReminder(<?php echo $renewal['id']; ?>)"
                                        class="p-1.5 text-amber-500 hover:bg-amber-50 rounded-lg transition" title="Send Reminder">
                                    <i class="fa-solid fa-bell text-sm"></i>
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
                <i class="fa-solid fa-rotate text-slate-400"></i>
            </div>
            <p class="text-sm font-semibold text-slate-600">No renewals match your filters</p>
            <p class="text-xs text-slate-400 mt-1">Try adjusting your search or clearing filters</p>
            <button onclick="resetFilters()" class="mt-3 text-xs font-semibold text-brand-medium hover:text-brand-dark">Clear all filters</button>
        </div>

        <!-- Pagination -->
        <div class="px-4 py-3 border-t border-slate-200 flex flex-col sm:flex-row justify-between items-center gap-3 bg-slate-50">
            <p class="text-xs text-slate-500">
                Showing <span class="font-semibold text-slate-700"><?php echo $offset + 1; ?></span> to
                <span class="font-semibold text-slate-700"><?php echo min($offset + $limit, count($renewalApplications)); ?></span> of
                <span class="font-semibold text-slate-700"><?php echo count($renewalApplications); ?></span> renewals
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
<!-- NEW RENEWAL MODAL                                            -->
<!-- ============================================================ -->
<div id="newRenewalModal" class="hidden fixed inset-0 bg-slate-900/50 backdrop-blur-sm z-50 items-center justify-center p-4">
    <div class="bg-white rounded-2xl shadow-xl w-full max-w-lg max-h-[90vh] overflow-y-auto">
        <div class="flex items-center justify-between px-6 py-4 border-b border-slate-200 sticky top-0 bg-white rounded-t-2xl">
            <h3 class="font-bold text-slate-900 flex items-center gap-2">
                <i class="fa-solid fa-rotate text-brand-medium"></i>
                New Renewal Application
            </h3>
            <button onclick="closeModal('newRenewalModal')" class="w-8 h-8 rounded-lg hover:bg-slate-100 flex items-center justify-center text-slate-400 hover:text-slate-600 transition">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>
        <form id="newRenewalForm" class="p-6 space-y-4" onsubmit="saveRenewalApplication(event)">
            <div>
                <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">Select Permit to Renew</label>
                <select id="renew_permit" required class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm bg-white focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none">
                    <option value="">Select Permit</option>
                    <?php foreach (array_merge($permits, []) as $p): ?>
                        <option value="<?php echo $p['id']; ?>" data-fee="<?php echo $p['fee']; ?>">
                            <?php echo $p['permit_id']; ?> - <?php echo $p['applicant']; ?> (<?php echo $p['business_type']; ?>)
                            <?php if ($p['status'] === 'expired'): ?> ⚠️ Expired<?php endif; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div>
                <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">Renewal Fee</label>
                <input type="number" id="renew_fee_amount" required step="0.01" class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none">
            </div>
            <div>
                <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">Payment Method</label>
                <select id="renew_payment_method" required class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm bg-white focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none">
                    <option value="Cash">Cash</option>
                    <option value="GCash">GCash</option>
                    <option value="Bank Transfer">Bank Transfer</option>
                    <option value="Over-the-Counter">Over-the-Counter</option>
                </select>
            </div>
            <div>
                <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">Payment Reference (Optional)</label>
                <input type="text" id="renew_payment_ref" class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none" placeholder="Reference number">
            </div>
            <div>
                <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">Notes</label>
                <textarea id="renew_notes" rows="2" class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none" placeholder="Additional notes..."></textarea>
            </div>

            <div class="flex justify-end gap-2 pt-2 border-t border-slate-100">
                <button type="button" onclick="closeModal('newRenewalModal')"
                        class="px-4 py-2 bg-white border border-slate-200 text-slate-600 rounded-lg hover:bg-slate-50 transition text-sm font-semibold">
                    Cancel
                </button>
                <button type="submit"
                        class="px-4 py-2 bg-brand-dark text-white rounded-lg hover:bg-brand-medium transition text-sm font-semibold">
                    <i class="fa-solid fa-rotate mr-1.5"></i> Submit Renewal
                </button>
            </div>
        </form>
    </div>
</div>

<!-- ============================================================ -->
<!-- VIEW RENEWAL MODAL                                           -->
<!-- ============================================================ -->
<div id="viewRenewalModal" class="hidden fixed inset-0 bg-slate-900/50 backdrop-blur-sm z-50 items-center justify-center p-4">
    <div class="bg-white rounded-2xl shadow-xl w-full max-w-2xl max-h-[90vh] overflow-y-auto">
        <div class="flex items-center justify-between px-6 py-4 border-b border-slate-200 sticky top-0 bg-white rounded-t-2xl">
            <h3 class="font-bold text-slate-900">Renewal Details</h3>
            <button onclick="closeModal('viewRenewalModal')" class="w-8 h-8 rounded-lg hover:bg-slate-100 flex items-center justify-center text-slate-400 hover:text-slate-600 transition">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>
        <div id="renewalDetailsContent" class="p-6">
            <div class="flex items-center justify-center py-10 text-slate-400 text-sm">
                <i class="fa-solid fa-spinner fa-spin mr-2"></i> Loading...
            </div>
        </div>
    </div>
</div>

<!-- ============================================================ -->
<!-- RENEWAL HISTORY MODAL                                        -->
<!-- ============================================================ -->
<div id="renewalHistoryModal" class="hidden fixed inset-0 bg-slate-900/50 backdrop-blur-sm z-50 items-center justify-center p-4">
    <div class="bg-white rounded-2xl shadow-xl w-full max-w-2xl max-h-[90vh] overflow-y-auto">
        <div class="flex items-center justify-between px-6 py-4 border-b border-slate-200 sticky top-0 bg-white rounded-t-2xl">
            <h3 class="font-bold text-slate-900">Renewal History</h3>
            <button onclick="closeModal('renewalHistoryModal')" class="w-8 h-8 rounded-lg hover:bg-slate-100 flex items-center justify-center text-slate-400 hover:text-slate-600 transition">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>
        <div id="renewalHistoryContent" class="p-6">
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
    const RENEWALS = <?php echo json_encode(array_column($renewalApplications, null, 'id'), JSON_PRETTY_PRINT); ?>;
    const RENEWAL_HISTORY = <?php echo json_encode($renewalHistory, JSON_PRETTY_PRINT); ?>;
    const PERMITS_DATA = <?php echo json_encode($permits, JSON_PRETTY_PRINT); ?>;

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
    // AUTO-FILL FEE ON PERMIT SELECT
    // ============================================================
    document.getElementById('renew_permit').addEventListener('change', function() {
        const selected = this.options[this.selectedIndex];
        const fee = selected.dataset.fee || 0;
        // Add 5% increase or keep same
        document.getElementById('renew_fee_amount').value = (parseFloat(fee) * 1.05).toFixed(2);
    });

    // ============================================================
    // VIEW RENEWAL
    // ============================================================
    function viewRenewal(id) {
        openModal('viewRenewalModal');
        const r = RENEWALS[id];
        if (!r) return;

        setTimeout(() => {
            const statusColors = {
                pending: 'bg-amber-100 text-amber-700',
                under_review: 'bg-blue-100 text-blue-700',
                approved: 'bg-emerald-100 text-emerald-700',
                rejected: 'bg-rose-100 text-rose-700'
            };

            const docsHtml = r.documents && r.documents.length > 0 
                ? r.documents.map(d => `<span class="px-2 py-1 bg-slate-100 rounded text-xs text-slate-600">${d}</span>`).join('')
                : '<span class="text-xs text-slate-400">No documents</span>';

            document.getElementById('renewalDetailsContent').innerHTML = `
                <div class="space-y-4">
                    <div class="flex items-center gap-4 pb-4 border-b border-slate-200">
                        <div class="w-14 h-14 rounded-full bg-brand-light border border-brand-border flex items-center justify-center text-brand-dark font-bold text-2xl flex-shrink-0">
                            ${r.applicant.charAt(0)}
                        </div>
                        <div>
                            <h4 class="text-lg font-bold text-slate-900">${r.applicant}</h4>
                            <p class="text-sm text-slate-500">${r.renewal_id} • ${r.permit_id}</p>
                            <span class="inline-block px-2 py-0.5 rounded-full text-xs font-semibold mt-1 ${statusColors[r.status] || statusColors.pending}">
                                ${r.status.replace('_', ' ').toUpperCase()}
                            </span>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div><p class="text-xs text-slate-400 font-semibold">Business Type</p><p class="text-sm text-slate-800">${r.business_type}</p></div>
                        <div><p class="text-xs text-slate-400 font-semibold">Current Fee</p><p class="text-sm text-slate-800">₱${Number(r.current_fee).toFixed(2)}</p></div>
                        <div><p class="text-xs text-slate-400 font-semibold">Renewal Fee</p><p class="text-sm font-bold text-brand-dark">₱${Number(r.renewal_fee).toFixed(2)}</p></div>
                        <div><p class="text-xs text-slate-400 font-semibold">Date Applied</p><p class="text-sm text-slate-800">${new Date(r.date_applied).toLocaleDateString()}</p></div>
                        <div><p class="text-xs text-slate-400 font-semibold">Payment Method</p><p class="text-sm text-slate-800">${r.payment_method || '—'}</p></div>
                        <div><p class="text-xs text-slate-400 font-semibold">Reference</p><p class="text-sm text-slate-800 font-mono">${r.payment_reference || '—'}</p></div>
                        ${r.date_approved ? `<div><p class="text-xs text-slate-400 font-semibold">Date Approved</p><p class="text-sm text-slate-800">${new Date(r.date_approved).toLocaleDateString()}</p></div>` : ''}
                        ${r.new_expiry_date ? `<div><p class="text-xs text-slate-400 font-semibold">New Expiry</p><p class="text-sm font-bold text-emerald-600">${new Date(r.new_expiry_date).toLocaleDateString()}</p></div>` : ''}
                    </div>
                    <div class="bg-slate-50 rounded-xl p-4 border border-slate-200">
                        <h5 class="text-sm font-bold text-slate-700 mb-2">📎 Documents</h5>
                        <div class="flex flex-wrap gap-2">${docsHtml}</div>
                    </div>
                    ${r.notes ? `<div class="bg-brand-light/40 rounded-xl p-4 border border-brand-border"><h5 class="text-sm font-bold text-slate-700 mb-2">Notes</h5><p class="text-sm text-slate-800">${r.notes}</p></div>` : ''}
                    <div class="flex justify-end gap-2 pt-2 border-t border-slate-200">
                        <button onclick="closeModal('viewRenewalModal')" class="px-4 py-2 bg-white border border-slate-200 text-slate-600 rounded-lg hover:bg-slate-50 transition text-sm font-semibold">Close</button>
                        ${r.status === 'pending' ? `<button onclick="closeModal('viewRenewalModal'); updateRenewalStatus(${r.id}, 'approved')" class="px-4 py-2 bg-emerald-600 text-white rounded-lg hover:bg-emerald-700 transition text-sm font-semibold"><i class="fa-solid fa-check mr-1.5"></i> Approve</button>` : ''}
                        <button onclick="sendReminder(${r.id})" class="px-4 py-2 bg-amber-600 text-white rounded-lg hover:bg-amber-700 transition text-sm font-semibold"><i class="fa-solid fa-bell mr-1.5"></i> Send Reminder</button>
                    </div>
                </div>
            `;
        }, 300);
    }

    // ============================================================
    // UPDATE RENEWAL STATUS
    // ============================================================
    function updateRenewalStatus(id, status) {
        if (!confirm('Mark this renewal as ' + status.toUpperCase() + '?')) return;
        
        const r = RENEWALS[id];
        if (!r) return;
        
        r.status = status;
        if (status === 'approved') {
            r.date_approved = new Date().toISOString().split('T')[0];
            const newExpiry = new Date();
            newExpiry.setFullYear(newExpiry.getFullYear() + 1);
            r.new_expiry_date = newExpiry.toISOString().split('T')[0];
            
            // Add to renewal history
            RENEWAL_HISTORY.push({
                id: RENEWAL_HISTORY.length + 1,
                permit_id: r.permit_id,
                applicant: r.applicant,
                renewal_date: r.date_approved,
                fee_paid: r.renewal_fee,
                new_expiry: r.new_expiry_date,
                status: 'completed'
            });
        }
        
        updateRenewalRow(r);
        showToast('Renewal #' + r.renewal_id + ' ' + status + '!', 'success');
    }

    function updateRenewalRow(r) {
        const rows = document.querySelectorAll('.renewal-row');
        rows.forEach(row => {
            const applicant = row.querySelector('.font-semibold.text-slate-800.text-sm')?.textContent;
            if (applicant === r.applicant) {
                const statusBadge = row.querySelector('.px-2.py-1.rounded-full');
                const statusColors = {
                    pending: 'bg-amber-100 text-amber-700',
                    under_review: 'bg-blue-100 text-blue-700',
                    approved: 'bg-emerald-100 text-emerald-700',
                    rejected: 'bg-rose-100 text-rose-700'
                };
                statusBadge.className = `px-2 py-1 rounded-full text-xs font-semibold ${statusColors[r.status] || statusColors.pending}`;
                statusBadge.textContent = r.status.replace('_', ' ').toUpperCase();
            }
        });
    }

    // ============================================================
    // VIEW RENEWAL HISTORY
    // ============================================================
    function viewRenewalHistory(id) {
        openModal('renewalHistoryModal');
        const r = RENEWALS[id];
        if (!r) return;

        setTimeout(() => {
            const history = RENEWAL_HISTORY.filter(h => h.permit_id === r.permit_id);
            
            const historyHtml = history.length > 0
                ? history.map(h => `
                    <div class="flex items-center justify-between p-3 bg-white rounded-lg border border-slate-200">
                        <div>
                            <p class="font-semibold text-slate-800 text-sm">${h.permit_id}</p>
                            <p class="text-xs text-slate-400">Renewed on ${new Date(h.renewal_date).toLocaleDateString()}</p>
                        </div>
                        <div class="text-right">
                            <p class="font-bold text-brand-dark">₱${Number(h.fee_paid).toFixed(2)}</p>
                            <p class="text-xs text-slate-400">Expires: ${new Date(h.new_expiry).toLocaleDateString()}</p>
                        </div>
                    </div>
                `).join('')
                : '<p class="text-sm text-slate-400 text-center py-4">No renewal history found</p>';

            document.getElementById('renewalHistoryContent').innerHTML = `
                <div class="space-y-4">
                    <div class="flex items-center gap-3 p-3 bg-brand-light/40 rounded-xl border border-brand-border">
                        <div>
                            <p class="font-semibold text-slate-800 text-sm">${r.applicant}</p>
                            <p class="text-xs text-slate-400">${r.permit_id}</p>
                        </div>
                        <span class="ml-auto text-xs font-semibold text-brand-dark">${history.length} renewal(s)</span>
                    </div>
                    <div class="space-y-2">${historyHtml}</div>
                </div>
            `;
        }, 300);
    }

    // ============================================================
    // SAVE RENEWAL APPLICATION
    // ============================================================
    function saveRenewalApplication(event) {
        event.preventDefault();
        showToast('Renewal application submitted successfully!', 'success');
        closeModal('newRenewalModal');
    }

    // ============================================================
    // AUTO-REMINDERS
    // ============================================================
    function sendReminder(id) {
        const r = RENEWALS[id];
        if (!r) {
            // Send to all pending
            let count = 0;
            Object.values(RENEWALS).forEach(r => {
                if (r.status === 'pending' || r.status === 'under_review') {
                    count++;
                }
            });
            showToast('Sent reminders to ' + count + ' pending renewal(s)!', 'success');
            return;
        }
        
        showToast('Reminder sent to ' + r.applicant + ' for renewal #' + r.renewal_id, 'success');
    }

    function sendAllReminders() {
        sendReminder(null);
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
    document.getElementById('searchRenewal').addEventListener('input', filterRenewals);
    document.getElementById('filterStatus').addEventListener('change', filterRenewals);
    document.getElementById('quickFilter').addEventListener('change', filterRenewals);

    function filterRenewals() {
        const search = document.getElementById('searchRenewal').value.toLowerCase();
        const status = document.getElementById('filterStatus').value;
        const quick = document.getElementById('quickFilter').value;
        let visibleCount = 0;

        document.querySelectorAll('.renewal-row').forEach(row => {
            const applicant = row.dataset.applicant;
            const rowStatus = row.dataset.status;
            const rowId = row.dataset.id.toLowerCase();

            let matchesQuick = true;
            if (quick === 'expiring_soon') {
                const expiryCell = row.querySelector('.px-4.py-3.text-slate-500.text-xs span');
                // Check if permit is expiring soon (simplified)
                matchesQuick = true;
            } else if (quick === 'grace_period') {
                matchesQuick = rowStatus === 'pending' || rowStatus === 'under_review';
            } else if (quick === 'completed') {
                matchesQuick = rowStatus === 'approved';
            }

            const matchesSearch = applicant.includes(search) || rowId.includes(search);
            const matchesStatus = !status || rowStatus === status;
            const isVisible = matchesSearch && matchesStatus && matchesQuick;

            row.style.display = isVisible ? '' : 'none';
            if (isVisible) visibleCount++;
        });

        document.getElementById('emptyState').style.display = visibleCount === 0 ? 'flex' : 'none';
    }

    function resetFilters() {
        document.getElementById('searchRenewal').value = '';
        document.getElementById('filterStatus').value = '';
        document.getElementById('quickFilter').value = '';
        document.querySelectorAll('.renewal-row').forEach(row => row.style.display = '');
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