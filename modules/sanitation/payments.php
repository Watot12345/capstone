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

// Sample Permits Data (for payment processing)
$permits = [
    ['id' => 1, 'permit_id' => 'SP-1040', 'applicant' => 'ABC Restaurant', 'fee' => 1500.00, 'status' => 'pending'],
    ['id' => 2, 'permit_id' => 'SP-1042', 'applicant' => 'Fresh Bakes Co.', 'fee' => 1200.00, 'status' => 'pending'],
    ['id' => 3, 'permit_id' => 'SP-1045', 'applicant' => 'Sunrise Pharmacy', 'fee' => 1800.00, 'status' => 'under_review'],
    ['id' => 4, 'permit_id' => 'SP-1047', 'applicant' => 'Tech Hub Inc.', 'fee' => 2500.00, 'status' => 'pending'],
    ['id' => 5, 'permit_id' => 'SP-1048', 'applicant' => 'Sunset View Hotel', 'fee' => 3000.00, 'status' => 'approved'],
];

// Sample Fee Structure
$feeStructure = [
    ['category' => 'Food Establishment', 'base_fee' => 1500.00, 'inspection_fee' => 500.00, 'total' => 2000.00],
    ['category' => 'Market Vendor', 'base_fee' => 800.00, 'inspection_fee' => 300.00, 'total' => 1100.00],
    ['category' => 'Bakery', 'base_fee' => 1200.00, 'inspection_fee' => 400.00, 'total' => 1600.00],
    ['category' => 'Recreational Facility', 'base_fee' => 2000.00, 'inspection_fee' => 600.00, 'total' => 2600.00],
    ['category' => 'Retail Store', 'base_fee' => 1000.00, 'inspection_fee' => 350.00, 'total' => 1350.00],
    ['category' => 'Pharmacy', 'base_fee' => 1800.00, 'inspection_fee' => 500.00, 'total' => 2300.00],
    ['category' => 'Agricultural', 'base_fee' => 900.00, 'inspection_fee' => 300.00, 'total' => 1200.00],
    ['category' => 'Office/Commercial', 'base_fee' => 2500.00, 'inspection_fee' => 700.00, 'total' => 3200.00],
    ['category' => 'Hotel/Lodging', 'base_fee' => 3000.00, 'inspection_fee' => 800.00, 'total' => 3800.00],
];

// Sample Payment History
$paymentHistory = [
    [
        'id' => 1,
        'payment_id' => 'PAY-001',
        'permit_id' => 'SP-1040',
        'applicant' => 'ABC Restaurant',
        'amount' => 1500.00,
        'method' => 'GCash',
        'reference' => 'GCH-20260717-001',
        'status' => 'completed',
        'date' => '2026-07-17 10:30:00',
        'receipt' => 'RCP-001.pdf'
    ],
    [
        'id' => 2,
        'payment_id' => 'PAY-002',
        'permit_id' => 'SP-1041',
        'applicant' => 'Green Market Stall',
        'amount' => 800.00,
        'method' => 'Cash',
        'reference' => 'CSH-20260716-001',
        'status' => 'completed',
        'date' => '2026-07-16 09:15:00',
        'receipt' => 'RCP-002.pdf'
    ],
    [
        'id' => 3,
        'payment_id' => 'PAY-003',
        'permit_id' => 'SP-1043',
        'applicant' => 'City Gym',
        'amount' => 2000.00,
        'method' => 'Bank Transfer',
        'reference' => 'BTR-20260715-001',
        'status' => 'completed',
        'date' => '2026-07-15 14:20:00',
        'receipt' => 'RCP-003.pdf'
    ],
    [
        'id' => 4,
        'payment_id' => 'PAY-004',
        'permit_id' => 'SP-1044',
        'applicant' => 'Mega Mart',
        'amount' => 1000.00,
        'method' => 'GCash',
        'reference' => 'GCH-20260714-001',
        'status' => 'completed',
        'date' => '2026-07-14 11:45:00',
        'receipt' => 'RCP-004.pdf'
    ],
    [
        'id' => 5,
        'payment_id' => 'PAY-005',
        'permit_id' => 'SP-1046',
        'applicant' => 'Green Valley Farm',
        'amount' => 900.00,
        'method' => 'Bank Transfer',
        'reference' => 'BTR-20260713-001',
        'status' => 'completed',
        'date' => '2026-07-13 08:30:00',
        'receipt' => 'RCP-005.pdf'
    ],
    [
        'id' => 6,
        'payment_id' => 'PAY-006',
        'permit_id' => 'SP-1042',
        'applicant' => 'Fresh Bakes Co.',
        'amount' => 1200.00,
        'method' => 'Cash',
        'reference' => 'CSH-20260718-001',
        'status' => 'pending',
        'date' => '2026-07-18 16:00:00',
        'receipt' => null
    ],
    [
        'id' => 7,
        'payment_id' => 'PAY-007',
        'permit_id' => 'SP-1047',
        'applicant' => 'Tech Hub Inc.',
        'amount' => 2500.00,
        'method' => 'GCash',
        'reference' => 'GCH-20260719-001',
        'status' => 'failed',
        'date' => '2026-07-19 13:20:00',
        'receipt' => null
    ],
];

// Stats
$totalPayments = count($paymentHistory);
$totalCompleted = count(array_filter($paymentHistory, fn($p) => $p['status'] === 'completed'));
$totalPending = count(array_filter($paymentHistory, fn($p) => $p['status'] === 'pending'));
$totalFailed = count(array_filter($paymentHistory, fn($p) => $p['status'] === 'failed'));
$totalRevenue = array_sum(array_column(array_filter($paymentHistory, fn($p) => $p['status'] === 'completed'), 'amount'));
$pendingPermits = count(array_filter($permits, fn($p) => $p['status'] === 'pending'));

// Pagination
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$limit = 5;
$offset = ($page - 1) * $limit;
$totalPages = ceil($totalPayments / $limit);
$paginatedPayments = array_slice($paymentHistory, $offset, $limit);

$title = 'Payments';
?>

<!-- ============================================================ -->
<!-- 2. HTML + PHP EMBEDDED + Tailwind CSS                       -->
<!-- ============================================================ -->

<div class="flex-1 px-6 pt-[26px] pb-20 mb-10 flex flex-col min-h-0 overflow-hidden">

    <!-- Page Header -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6">
        <div>
            <h2 class="text-2xl font-black text-slate-900 tracking-tight">Payments</h2>
            <p class="text-sm text-slate-500 mt-0.5">Fee structure, payment processing & history</p>
        </div>
        <div class="flex gap-3">
            <button onclick="openModal('processPaymentModal')"
                    class="px-4 py-2 bg-brand-dark text-white rounded-lg hover:bg-brand-medium transition-colors text-sm font-semibold flex items-center gap-2 shadow-sm">
                <i class="fa-solid fa-credit-card text-xs"></i> Process Payment
            </button>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-2 md:grid-cols-5 gap-3 mb-4">
        <div class="bg-white rounded-xl shadow-xs p-3 border border-slate-200 text-center">
            <p class="text-xs text-slate-500 font-medium">Total</p>
            <p class="text-xl font-bold text-slate-900"><?php echo $totalPayments; ?></p>
        </div>
        <div class="bg-white rounded-xl shadow-xs p-3 border border-slate-200 text-center">
            <p class="text-xs text-slate-500 font-medium">Completed</p>
            <p class="text-xl font-bold text-emerald-600"><?php echo $totalCompleted; ?></p>
        </div>
        <div class="bg-white rounded-xl shadow-xs p-3 border border-slate-200 text-center">
            <p class="text-xs text-slate-500 font-medium">Pending</p>
            <p class="text-xl font-bold text-amber-600"><?php echo $totalPending; ?></p>
        </div>
        <div class="bg-white rounded-xl shadow-xs p-3 border border-slate-200 text-center">
            <p class="text-xs text-slate-500 font-medium">Failed</p>
            <p class="text-xl font-bold text-rose-600"><?php echo $totalFailed; ?></p>
        </div>
        <div class="bg-white rounded-xl shadow-xs p-3 border border-slate-200 text-center">
            <p class="text-xs text-slate-500 font-medium">Revenue</p>
            <p class="text-xl font-bold text-brand-dark">₱<?php echo number_format($totalRevenue, 2); ?></p>
        </div>
    </div>

    <!-- Pending Permits Alert -->
    <?php if ($pendingPermits > 0): ?>
    <div class="bg-amber-50 border border-amber-200 rounded-xl p-3 mb-4 flex items-center justify-between">
        <div class="flex items-center gap-3">
            <i class="fa-solid fa-triangle-exclamation text-amber-500 text-lg"></i>
            <span class="text-sm text-amber-700"><span class="font-bold"><?php echo $pendingPermits; ?></span> permits require payment</span>
        </div>
        <button onclick="document.getElementById('filterStatus').value='pending'; filterPayments();" 
                class="text-xs font-semibold text-amber-700 hover:text-amber-900 underline">
            View pending
        </button>
    </div>
    <?php endif; ?>

    <!-- Fee Structure Section -->
    <div class="bg-white rounded-xl shadow-xs border border-slate-200 mb-6 overflow-hidden">
        <div class="flex items-center justify-between px-4 py-3 bg-slate-50 border-b border-slate-200">
            <h4 class="text-sm font-bold text-slate-700 flex items-center gap-2">
                <i class="fa-solid fa-table-list text-brand-medium"></i> Fee Structure
            </h4>
            <button onclick="openModal('feeStructureModal')" class="text-xs font-semibold text-brand-medium hover:text-brand-dark transition">
                <i class="fa-solid fa-pen mr-1"></i> Edit
            </button>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead class="bg-slate-50/50">
                    <tr>
                        <th class="px-4 py-2 text-left text-[10px] font-bold text-slate-500 uppercase tracking-wider">Category</th>
                        <th class="px-4 py-2 text-right text-[10px] font-bold text-slate-500 uppercase tracking-wider">Base Fee</th>
                        <th class="px-4 py-2 text-right text-[10px] font-bold text-slate-500 uppercase tracking-wider">Inspection Fee</th>
                        <th class="px-4 py-2 text-right text-[10px] font-bold text-slate-500 uppercase tracking-wider">Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach (array_slice($feeStructure, 0, 5) as $fee): ?>
                    <tr class="border-b border-slate-100">
                        <td class="px-4 py-2 text-slate-700 text-xs"><?php echo $fee['category']; ?></td>
                        <td class="px-4 py-2 text-right text-xs font-medium text-slate-700">₱<?php echo number_format($fee['base_fee'], 2); ?></td>
                        <td class="px-4 py-2 text-right text-xs font-medium text-slate-700">₱<?php echo number_format($fee['inspection_fee'], 2); ?></td>
                        <td class="px-4 py-2 text-right text-xs font-bold text-brand-dark">₱<?php echo number_format($fee['total'], 2); ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <?php if (count($feeStructure) > 5): ?>
        <div class="px-4 py-2 text-center text-xs text-slate-400 border-t border-slate-200">
            <button onclick="openModal('feeStructureModal')" class="text-brand-medium hover:text-brand-dark">View all <?php echo count($feeStructure); ?> categories</button>
        </div>
        <?php endif; ?>
    </div>

    <!-- Search & Filter -->
    <div class="bg-white rounded-xl shadow-xs p-4 border border-slate-200 mb-6">
        <div class="flex flex-col sm:flex-row gap-3">
            <div class="flex-1 relative">
                <i class="fa-solid fa-search absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-sm"></i>
                <input type="text"
                       id="searchPayment"
                       placeholder="Search by permit ID, applicant, or reference..."
                       class="w-full pl-9 pr-4 py-2 border border-slate-200 rounded-lg focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none text-sm transition">
            </div>
            <div class="flex gap-2 flex-wrap">
                <select id="filterStatus" class="px-4 py-2 border border-slate-200 rounded-lg focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none text-sm bg-white">
                    <option value="">All Status</option>
                    <option value="completed">Completed</option>
                    <option value="pending">Pending</option>
                    <option value="failed">Failed</option>
                </select>
                <select id="filterMethod" class="px-4 py-2 border border-slate-200 rounded-lg focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none text-sm bg-white">
                    <option value="">All Methods</option>
                    <option value="Cash">Cash</option>
                    <option value="GCash">GCash</option>
                    <option value="Bank Transfer">Bank Transfer</option>
                </select>
                <button onclick="resetFilters()" title="Reset filters"
                        class="px-3 py-2 bg-slate-100 text-slate-500 rounded-lg hover:bg-slate-200 hover:text-slate-700 transition-colors text-sm">
                    <i class="fa-solid fa-rotate-right"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- Payment History Table -->
    <div class="bg-white rounded-xl shadow-xs border border-slate-200 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead class="bg-slate-50 border-b border-slate-200">
                    <tr>
                        <th class="px-4 py-3 text-left text-[10px] font-bold text-slate-500 uppercase tracking-wider">Payment ID</th>
                        <th class="px-4 py-3 text-left text-[10px] font-bold text-slate-500 uppercase tracking-wider">Permit/Applicant</th>
                        <th class="px-4 py-3 text-left text-[10px] font-bold text-slate-500 uppercase tracking-wider">Amount</th>
                        <th class="px-4 py-3 text-left text-[10px] font-bold text-slate-500 uppercase tracking-wider">Method</th>
                        <th class="px-4 py-3 text-left text-[10px] font-bold text-slate-500 uppercase tracking-wider">Reference</th>
                        <th class="px-4 py-3 text-left text-[10px] font-bold text-slate-500 uppercase tracking-wider">Status</th>
                        <th class="px-4 py-3 text-left text-[10px] font-bold text-slate-500 uppercase tracking-wider">Date</th>
                        <th class="px-4 py-3 text-center text-[10px] font-bold text-slate-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody id="paymentTableBody">
                    <?php foreach ($paginatedPayments as $payment): ?>
                    <tr class="border-b border-slate-100 hover:bg-brand-light/40 transition-colors payment-row"
                        data-applicant="<?php echo strtolower($payment['applicant']); ?>"
                        data-status="<?php echo $payment['status']; ?>"
                        data-method="<?php echo $payment['method']; ?>"
                        data-reference="<?php echo strtolower($payment['reference'] ?? ''); ?>"
                        data-id="<?php echo $payment['permit_id']; ?>">
                        <td class="px-4 py-3 font-mono text-xs text-brand-dark font-semibold"><?php echo $payment['payment_id']; ?></td>
                        <td class="px-4 py-3">
                            <div>
                                <p class="font-semibold text-slate-800 text-sm"><?php echo $payment['applicant']; ?></p>
                                <p class="text-xs text-slate-400"><?php echo $payment['permit_id']; ?></p>
                            </div>
                        </td>
                        <td class="px-4 py-3">
                            <span class="text-sm font-bold text-slate-800">₱<?php echo number_format($payment['amount'], 2); ?></span>
                        </td>
                        <td class="px-4 py-3 text-slate-600 text-xs">
                            <?php
                                $methodIcons = [
                                    'Cash' => 'fa-money-bill-wave',
                                    'GCash' => 'fa-mobile-screen',
                                    'Bank Transfer' => 'fa-building-columns'
                                ];
                            ?>
                            <i class="fa-solid <?php echo $methodIcons[$payment['method']] ?? 'fa-credit-card'; ?> mr-1"></i>
                            <?php echo $payment['method']; ?>
                        </td>
                        <td class="px-4 py-3 text-slate-500 text-xs font-mono"><?php echo $payment['reference'] ?? '—'; ?></td>
                        <td class="px-4 py-3">
                            <?php
                                $statusColors = [
                                    'completed' => 'bg-emerald-100 text-emerald-700',
                                    'pending' => 'bg-amber-100 text-amber-700',
                                    'failed' => 'bg-rose-100 text-rose-700'
                                ];
                            ?>
                            <span class="px-2 py-1 rounded-full text-xs font-semibold <?php echo $statusColors[$payment['status']] ?? $statusColors['pending']; ?>">
                                <?php echo ucfirst($payment['status']); ?>
                            </span>
                        </td>
                        <td class="px-4 py-3 text-slate-500 text-xs"><?php echo date('M d, Y h:i A', strtotime($payment['date'])); ?></td>
                        <td class="px-4 py-3">
                            <div class="flex items-center justify-center gap-1">
                                <button onclick="viewPayment(<?php echo $payment['id']; ?>)"
                                        class="p-1.5 text-brand-medium hover:bg-brand-light rounded-lg transition" title="View">
                                    <i class="fa-solid fa-eye text-sm"></i>
                                </button>
                                <?php if ($payment['receipt']): ?>
                                    <button onclick="downloadReceipt('<?php echo $payment['receipt']; ?>')"
                                            class="p-1.5 text-emerald-600 hover:bg-emerald-50 rounded-lg transition" title="Receipt">
                                        <i class="fa-solid fa-receipt text-sm"></i>
                                    </button>
                                <?php endif; ?>
                                <?php if ($payment['status'] === 'pending'): ?>
                                    <button onclick="completePayment(<?php echo $payment['id']; ?>)"
                                            class="p-1.5 text-blue-600 hover:bg-blue-50 rounded-lg transition" title="Complete">
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
                <i class="fa-solid fa-credit-card text-slate-400"></i>
            </div>
            <p class="text-sm font-semibold text-slate-600">No payments match your filters</p>
            <p class="text-xs text-slate-400 mt-1">Try adjusting your search or clearing filters</p>
            <button onclick="resetFilters()" class="mt-3 text-xs font-semibold text-brand-medium hover:text-brand-dark">Clear all filters</button>
        </div>

        <!-- Pagination -->
        <div class="px-4 py-3 border-t border-slate-200 flex flex-col sm:flex-row justify-between items-center gap-3 bg-slate-50">
            <p class="text-xs text-slate-500">
                Showing <span class="font-semibold text-slate-700"><?php echo $offset + 1; ?></span> to
                <span class="font-semibold text-slate-700"><?php echo min($offset + $limit, $totalPayments); ?></span> of
                <span class="font-semibold text-slate-700"><?php echo $totalPayments; ?></span> payments
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
<!-- PROCESS PAYMENT MODAL                                        -->
<!-- ============================================================ -->
<div id="processPaymentModal" class="hidden fixed inset-0 bg-slate-900/50 backdrop-blur-sm z-50 items-center justify-center p-4">
    <div class="bg-white rounded-2xl shadow-xl w-full max-w-lg max-h-[90vh] overflow-y-auto">
        <div class="flex items-center justify-between px-6 py-4 border-b border-slate-200 sticky top-0 bg-white rounded-t-2xl">
            <h3 class="font-bold text-slate-900 flex items-center gap-2">
                <i class="fa-solid fa-credit-card text-brand-medium"></i>
                Process Payment
            </h3>
            <button onclick="closeModal('processPaymentModal')" class="w-8 h-8 rounded-lg hover:bg-slate-100 flex items-center justify-center text-slate-400 hover:text-slate-600 transition">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>
        <form id="processPaymentForm" class="p-6 space-y-4" onsubmit="savePayment(event)">
            <div>
                <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">Permit / Applicant</label>
                <select id="payment_permit" required class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm bg-white focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none">
                    <option value="">Select Permit</option>
                    <?php foreach ($permits as $p): ?>
                        <option value="<?php echo $p['id']; ?>" data-fee="<?php echo $p['fee']; ?>">
                            <?php echo $p['permit_id']; ?> - <?php echo $p['applicant']; ?> (₱<?php echo number_format($p['fee'], 2); ?>)
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div>
                <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">Amount</label>
                <input type="number" id="payment_amount" required step="0.01" class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none">
            </div>
            <div>
                <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">Payment Method</label>
                <select id="payment_method" required class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm bg-white focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none">
                    <option value="Cash">Cash</option>
                    <option value="GCash">GCash</option>
                    <option value="Bank Transfer">Bank Transfer</option>
                    <option value="Over-the-Counter">Over-the-Counter</option>
                </select>
            </div>
            <div>
                <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">Reference Number</label>
                <input type="text" id="payment_reference" class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none" placeholder="Optional reference number">
            </div>
            <div>
                <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">Notes</label>
                <textarea id="payment_notes" rows="2" class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none" placeholder="Payment notes..."></textarea>
            </div>

            <div class="flex justify-end gap-2 pt-2 border-t border-slate-100">
                <button type="button" onclick="closeModal('processPaymentModal')"
                        class="px-4 py-2 bg-white border border-slate-200 text-slate-600 rounded-lg hover:bg-slate-50 transition text-sm font-semibold">
                    Cancel
                </button>
                <button type="submit"
                        class="px-4 py-2 bg-brand-dark text-white rounded-lg hover:bg-brand-medium transition text-sm font-semibold">
                    <i class="fa-solid fa-credit-card mr-1.5"></i> Process Payment
                </button>
            </div>
        </form>
    </div>
</div>

<!-- ============================================================ -->
<!-- VIEW PAYMENT MODAL                                           -->
<!-- ============================================================ -->
<div id="viewPaymentModal" class="hidden fixed inset-0 bg-slate-900/50 backdrop-blur-sm z-50 items-center justify-center p-4">
    <div class="bg-white rounded-2xl shadow-xl w-full max-w-md max-h-[90vh] overflow-y-auto">
        <div class="flex items-center justify-between px-6 py-4 border-b border-slate-200 sticky top-0 bg-white rounded-t-2xl">
            <h3 class="font-bold text-slate-900">Payment Details</h3>
            <button onclick="closeModal('viewPaymentModal')" class="w-8 h-8 rounded-lg hover:bg-slate-100 flex items-center justify-center text-slate-400 hover:text-slate-600 transition">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>
        <div id="paymentDetailsContent" class="p-6">
            <div class="flex items-center justify-center py-10 text-slate-400 text-sm">
                <i class="fa-solid fa-spinner fa-spin mr-2"></i> Loading...
            </div>
        </div>
    </div>
</div>

<!-- ============================================================ -->
<!-- FEE STRUCTURE MODAL                                          -->
<!-- ============================================================ -->
<div id="feeStructureModal" class="hidden fixed inset-0 bg-slate-900/50 backdrop-blur-sm z-50 items-center justify-center p-4">
    <div class="bg-white rounded-2xl shadow-xl w-full max-w-2xl max-h-[90vh] overflow-y-auto">
        <div class="flex items-center justify-between px-6 py-4 border-b border-slate-200 sticky top-0 bg-white rounded-t-2xl">
            <h3 class="font-bold text-slate-900 flex items-center gap-2">
                <i class="fa-solid fa-table-list text-brand-medium"></i>
                Fee Structure
            </h3>
            <button onclick="closeModal('feeStructureModal')" class="w-8 h-8 rounded-lg hover:bg-slate-100 flex items-center justify-center text-slate-400 hover:text-slate-600 transition">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>
        <div class="p-6">
            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead class="bg-slate-50 border-b border-slate-200">
                        <tr>
                            <th class="px-4 py-2 text-left text-[10px] font-bold text-slate-500 uppercase tracking-wider">Category</th>
                            <th class="px-4 py-2 text-right text-[10px] font-bold text-slate-500 uppercase tracking-wider">Base Fee</th>
                            <th class="px-4 py-2 text-right text-[10px] font-bold text-slate-500 uppercase tracking-wider">Inspection Fee</th>
                            <th class="px-4 py-2 text-right text-[10px] font-bold text-slate-500 uppercase tracking-wider">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($feeStructure as $fee): ?>
                        <tr class="border-b border-slate-100">
                            <td class="px-4 py-2 text-slate-700 text-xs"><?php echo $fee['category']; ?></td>
                            <td class="px-4 py-2 text-right text-xs font-medium text-slate-700">₱<?php echo number_format($fee['base_fee'], 2); ?></td>
                            <td class="px-4 py-2 text-right text-xs font-medium text-slate-700">₱<?php echo number_format($fee['inspection_fee'], 2); ?></td>
                            <td class="px-4 py-2 text-right text-xs font-bold text-brand-dark">₱<?php echo number_format($fee['total'], 2); ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <p class="text-[10px] text-slate-400 mt-4">
                <i class="fa-solid fa-info-circle mr-1"></i>
                Fees are based on Ordinance No. 0386 (Section 137). Subject to change.
            </p>
        </div>
    </div>
</div>

<!-- ============================================================ -->
<!-- RECEIPT MODAL                                                -->
<!-- ============================================================ -->
<div id="receiptModal" class="hidden fixed inset-0 bg-slate-900/50 backdrop-blur-sm z-50 items-center justify-center p-4">
    <div class="bg-white rounded-2xl shadow-xl w-full max-w-md max-h-[90vh] overflow-y-auto">
        <div class="flex items-center justify-between px-6 py-4 border-b border-slate-200 sticky top-0 bg-white rounded-t-2xl">
            <h3 class="font-bold text-slate-900 flex items-center gap-2">
                <i class="fa-solid fa-receipt text-brand-medium"></i>
                Official Receipt
            </h3>
            <button onclick="closeModal('receiptModal')" class="w-8 h-8 rounded-lg hover:bg-slate-100 flex items-center justify-center text-slate-400 hover:text-slate-600 transition">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>
        <div class="p-6" id="receiptContent">
            <!-- Receipt content loaded by JavaScript -->
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
    const PAYMENTS = <?php echo json_encode(array_column($paymentHistory, null, 'id'), JSON_PRETTY_PRINT); ?>;
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
    // AUTO-FILL AMOUNT ON PERMIT SELECT
    // ============================================================
    document.getElementById('payment_permit').addEventListener('change', function() {
        const selected = this.options[this.selectedIndex];
        const fee = selected.dataset.fee || 0;
        document.getElementById('payment_amount').value = fee;
    });

    // ============================================================
    // PROCESS PAYMENT
    // ============================================================
    function savePayment(event) {
        event.preventDefault();
        showToast('Payment processed successfully!', 'success');
        closeModal('processPaymentModal');
    }

    // ============================================================
    // VIEW PAYMENT
    // ============================================================
    function viewPayment(id) {
        openModal('viewPaymentModal');
        const p = PAYMENTS[id];
        if (!p) return;

        setTimeout(() => {
            const statusColors = {
                completed: 'bg-emerald-100 text-emerald-700',
                pending: 'bg-amber-100 text-amber-700',
                failed: 'bg-rose-100 text-rose-700'
            };

            document.getElementById('paymentDetailsContent').innerHTML = `
                <div class="space-y-4">
                    <div class="flex items-center gap-4 pb-4 border-b border-slate-200">
                        <div class="w-14 h-14 rounded-full bg-brand-light border border-brand-border flex items-center justify-center text-brand-dark font-bold text-2xl flex-shrink-0">
                            ${p.applicant.charAt(0)}
                        </div>
                        <div>
                            <h4 class="text-lg font-bold text-slate-900">${p.applicant}</h4>
                            <p class="text-sm text-slate-500">${p.payment_id} • ${p.permit_id}</p>
                            <span class="inline-block px-2 py-0.5 rounded-full text-xs font-semibold mt-1 ${statusColors[p.status] || statusColors.pending}">
                                ${p.status.toUpperCase()}
                            </span>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div><p class="text-xs text-slate-400 font-semibold">Amount</p><p class="text-sm font-bold text-slate-800">₱${Number(p.amount).toFixed(2)}</p></div>
                        <div><p class="text-xs text-slate-400 font-semibold">Method</p><p class="text-sm text-slate-800">${p.method}</p></div>
                        <div><p class="text-xs text-slate-400 font-semibold">Reference</p><p class="text-sm text-slate-800 font-mono">${p.reference || '—'}</p></div>
                        <div><p class="text-xs text-slate-400 font-semibold">Date</p><p class="text-sm text-slate-800">${new Date(p.date).toLocaleString()}</p></div>
                    </div>
                    ${p.receipt ? `
                        <div class="bg-brand-light/40 rounded-xl p-4 border border-brand-border text-center">
                            <i class="fa-solid fa-receipt text-2xl text-brand-medium block mb-2"></i>
                            <p class="text-sm font-semibold text-slate-700">Receipt Generated</p>
                            <p class="text-xs text-slate-400">${p.receipt}</p>
                            <button onclick="closeModal('viewPaymentModal'); downloadReceipt('${p.receipt}')" class="mt-2 px-4 py-1.5 bg-brand-dark text-white rounded-lg text-xs hover:bg-brand-medium transition">
                                <i class="fa-solid fa-download mr-1"></i> Download
                            </button>
                        </div>
                    ` : `<div class="bg-slate-50 rounded-xl p-4 border border-slate-200 text-center text-xs text-slate-400">No receipt generated</div>`}
                    <div class="flex justify-end gap-2 pt-2 border-t border-slate-200">
                        <button onclick="closeModal('viewPaymentModal')" class="px-4 py-2 bg-white border border-slate-200 text-slate-600 rounded-lg hover:bg-slate-50 transition text-sm font-semibold">Close</button>
                        ${p.status === 'pending' ? `<button onclick="closeModal('viewPaymentModal'); completePayment(${p.id})" class="px-4 py-2 bg-emerald-600 text-white rounded-lg hover:bg-emerald-700 transition text-sm font-semibold"><i class="fa-solid fa-check mr-1.5"></i> Complete</button>` : ''}
                    </div>
                </div>
            `;
        }, 300);
    }

    // ============================================================
    // COMPLETE PAYMENT
    // ============================================================
    function completePayment(id) {
        if (!confirm('Mark this payment as completed?')) return;
        const p = PAYMENTS[id];
        if (!p) return;
        
        p.status = 'completed';
        p.receipt = 'RCP-' + String(id).padStart(3, '0') + '.pdf';
        updatePaymentRow(p);
        showToast('Payment #' + p.payment_id + ' completed!', 'success');
    }

    function updatePaymentRow(p) {
        const rows = document.querySelectorAll('.payment-row');
        rows.forEach(row => {
            const applicant = row.querySelector('.font-semibold.text-slate-800.text-sm')?.textContent;
            if (applicant === p.applicant) {
                const statusBadge = row.querySelector('.px-2.py-1.rounded-full');
                const statusColors = {
                    completed: 'bg-emerald-100 text-emerald-700',
                    pending: 'bg-amber-100 text-amber-700',
                    failed: 'bg-rose-100 text-rose-700'
                };
                statusBadge.className = `px-2 py-1 rounded-full text-xs font-semibold ${statusColors[p.status] || statusColors.pending}`;
                statusBadge.textContent = p.status.charAt(0).toUpperCase() + p.status.slice(1);
            }
        });
    }

    // ============================================================
    // RECEIPT GENERATION
    // ============================================================
    function downloadReceipt(receipt) {
        // In production, this would download the actual PDF
        showToast('Downloading receipt: ' + receipt, 'success');
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
    document.getElementById('searchPayment').addEventListener('input', filterPayments);
    document.getElementById('filterStatus').addEventListener('change', filterPayments);
    document.getElementById('filterMethod').addEventListener('change', filterPayments);

    function filterPayments() {
        const search = document.getElementById('searchPayment').value.toLowerCase();
        const status = document.getElementById('filterStatus').value;
        const method = document.getElementById('filterMethod').value;
        let visibleCount = 0;

        document.querySelectorAll('.payment-row').forEach(row => {
            const applicant = row.dataset.applicant;
            const reference = row.dataset.reference || '';
            const rowStatus = row.dataset.status;
            const rowMethod = row.dataset.method;
            const permitId = row.dataset.id.toLowerCase();

            const matchesSearch = applicant.includes(search) || permitId.includes(search) || reference.includes(search);
            const matchesStatus = !status || rowStatus === status;
            const matchesMethod = !method || rowMethod === method;
            const isVisible = matchesSearch && matchesStatus && matchesMethod;

            row.style.display = isVisible ? '' : 'none';
            if (isVisible) visibleCount++;
        });

        document.getElementById('emptyState').style.display = visibleCount === 0 ? 'flex' : 'none';
    }

    function resetFilters() {
        document.getElementById('searchPayment').value = '';
        document.getElementById('filterStatus').value = '';
        document.getElementById('filterMethod').value = '';
        document.querySelectorAll('.payment-row').forEach(row => row.style.display = '');
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