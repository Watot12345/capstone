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

// Sample Permits Data (for document association)
$permits = [
    ['id' => 1, 'permit_id' => 'SP-1040', 'applicant' => 'ABC Restaurant', 'status' => 'active'],
    ['id' => 2, 'permit_id' => 'SP-1041', 'applicant' => 'Green Market Stall', 'status' => 'active'],
    ['id' => 3, 'permit_id' => 'SP-1042', 'applicant' => 'Fresh Bakes Co.', 'status' => 'pending'],
    ['id' => 4, 'permit_id' => 'SP-1043', 'applicant' => 'City Gym', 'status' => 'expired'],
    ['id' => 5, 'permit_id' => 'SP-1044', 'applicant' => 'Mega Mart', 'status' => 'active'],
];

// Sample Documents Data
$documents = [
    [
        'id' => 1,
        'document_id' => 'DOC-001',
        'permit_id' => 'SP-1040',
        'applicant' => 'ABC Restaurant',
        'document_type' => 'Business Registration',
        'file_name' => 'abc_business_registration.pdf',
        'file_size' => '245 KB',
        'file_type' => 'PDF',
        'uploaded_by' => 'Juan Dela Cruz',
        'uploaded_at' => '2026-07-15 08:30:00',
        'status' => 'verified',
        'expiry_date' => '2027-07-15',
        'qr_code' => 'QR-ABC-001',
        'notes' => 'Complete and verified'
    ],
    [
        'id' => 2,
        'document_id' => 'DOC-002',
        'permit_id' => 'SP-1040',
        'applicant' => 'ABC Restaurant',
        'document_type' => 'Floor Plan',
        'file_name' => 'abc_floor_plan.jpg',
        'file_size' => '1.2 MB',
        'file_type' => 'Image',
        'uploaded_by' => 'Maria Santos',
        'uploaded_at' => '2026-07-15 09:15:00',
        'status' => 'verified',
        'expiry_date' => null,
        'qr_code' => null,
        'notes' => 'Approved'
    ],
    [
        'id' => 3,
        'document_id' => 'DOC-003',
        'permit_id' => 'SP-1040',
        'applicant' => 'ABC Restaurant',
        'document_type' => 'Health Certificate',
        'file_name' => 'abc_health_certificate.pdf',
        'file_size' => '512 KB',
        'file_type' => 'PDF',
        'uploaded_by' => 'Juan Dela Cruz',
        'uploaded_at' => '2026-07-15 10:00:00',
        'status' => 'verified',
        'expiry_date' => '2026-12-31',
        'qr_code' => 'QR-ABC-002',
        'notes' => 'Valid until December 2026'
    ],
    [
        'id' => 4,
        'document_id' => 'DOC-004',
        'permit_id' => 'SP-1041',
        'applicant' => 'Green Market Stall',
        'document_type' => 'Market Permit',
        'file_name' => 'green_market_permit.pdf',
        'file_size' => '198 KB',
        'file_type' => 'PDF',
        'uploaded_by' => 'Maria Santos',
        'uploaded_at' => '2026-07-14 11:00:00',
        'status' => 'verified',
        'expiry_date' => '2027-07-14',
        'qr_code' => 'QR-GRN-001',
        'notes' => 'Verified'
    ],
    [
        'id' => 5,
        'document_id' => 'DOC-005',
        'permit_id' => 'SP-1042',
        'applicant' => 'Fresh Bakes Co.',
        'document_type' => 'Business Registration',
        'file_name' => 'fresh_bakes_registration.pdf',
        'file_size' => '320 KB',
        'file_type' => 'PDF',
        'uploaded_by' => 'Ana Reyes',
        'uploaded_at' => '2026-07-16 13:30:00',
        'status' => 'pending',
        'expiry_date' => null,
        'qr_code' => null,
        'notes' => 'Awaiting verification'
    ],
    [
        'id' => 6,
        'document_id' => 'DOC-006',
        'permit_id' => 'SP-1043',
        'applicant' => 'City Gym',
        'document_type' => 'Business Registration',
        'file_name' => 'city_gym_registration.pdf',
        'file_size' => '280 KB',
        'file_type' => 'PDF',
        'uploaded_by' => 'Carlos Lim',
        'uploaded_at' => '2025-07-13 14:00:00',
        'status' => 'expired',
        'expiry_date' => '2026-07-13',
        'qr_code' => 'QR-CGY-001',
        'notes' => 'Expired - Renewal required'
    ],
    [
        'id' => 7,
        'document_id' => 'DOC-007',
        'permit_id' => 'SP-1043',
        'applicant' => 'City Gym',
        'document_type' => 'Floor Plan',
        'file_name' => 'city_gym_floor_plan.jpg',
        'file_size' => '1.8 MB',
        'file_type' => 'Image',
        'uploaded_by' => 'Ana Reyes',
        'uploaded_at' => '2025-07-13 14:30:00',
        'status' => 'expired',
        'expiry_date' => '2026-07-13',
        'qr_code' => null,
        'notes' => 'Expired'
    ],
    [
        'id' => 8,
        'document_id' => 'DOC-008',
        'permit_id' => 'SP-1044',
        'applicant' => 'Mega Mart',
        'document_type' => 'Waste Disposal Plan',
        'file_name' => 'mega_waste_plan.pdf',
        'file_size' => '156 KB',
        'file_type' => 'PDF',
        'uploaded_by' => 'Juan Dela Cruz',
        'uploaded_at' => '2026-07-14 16:00:00',
        'status' => 'verified',
        'expiry_date' => '2027-07-14',
        'qr_code' => 'QR-MEG-001',
        'notes' => 'Approved waste management plan'
    ],
    [
        'id' => 9,
        'document_id' => 'DOC-009',
        'permit_id' => 'SP-1044',
        'applicant' => 'Mega Mart',
        'document_type' => 'Health Certificate',
        'file_name' => 'mega_health_cert.pdf',
        'file_size' => '420 KB',
        'file_type' => 'PDF',
        'uploaded_by' => 'Maria Santos',
        'uploaded_at' => '2026-07-14 16:30:00',
        'status' => 'verified',
        'expiry_date' => '2027-01-15',
        'qr_code' => 'QR-MEG-002',
        'notes' => 'Valid until January 2027'
    ],
    [
        'id' => 10,
        'document_id' => 'DOC-010',
        'permit_id' => 'SP-1045',
        'applicant' => 'Sunrise Pharmacy',
        'document_type' => 'Pharmacy License',
        'file_name' => 'sunrise_pharmacy_license.pdf',
        'file_size' => '650 KB',
        'file_type' => 'PDF',
        'uploaded_by' => 'Miguel Reyes',
        'uploaded_at' => '2026-07-16 17:00:00',
        'status' => 'pending',
        'expiry_date' => '2027-07-16',
        'qr_code' => null,
        'notes' => 'Under review'
    ],
];

// Stats
$totalDocuments = count($documents);
$verifiedDocs = count(array_filter($documents, fn($d) => $d['status'] === 'verified'));
$pendingDocs = count(array_filter($documents, fn($d) => $d['status'] === 'pending'));
$expiredDocs = count(array_filter($documents, fn($d) => $d['status'] === 'expired'));
$hasQR = count(array_filter($documents, fn($d) => $d['qr_code']));
$totalSize = array_sum(array_map(function($d) {
    $size = preg_replace('/[^0-9.]/', '', $d['file_size']);
    return (float)$size;
}, $documents));

// Pagination
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$limit = 5;
$offset = ($page - 1) * $limit;
$totalPages = ceil($totalDocuments / $limit);
$paginatedDocuments = array_slice($documents, $offset, $limit);

$title = 'Documents';
?>

<!-- ============================================================ -->
<!-- 2. HTML + PHP EMBEDDED + Tailwind CSS                       -->
<!-- ============================================================ -->

<div class="flex-1 px-6 pt-[26px] pb-20 mb-10 flex flex-col min-h-0 overflow-hidden">

    <!-- Page Header -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6">
        <div>
            <h2 class="text-2xl font-black text-slate-900 tracking-tight">Documents</h2>
            <p class="text-sm text-slate-500 mt-0.5">Upload, manage, and verify digital permits & documents</p>
        </div>
        <div class="flex gap-3">
            <button onclick="openModal('uploadDocumentModal')"
                    class="px-4 py-2 bg-brand-dark text-white rounded-lg hover:bg-brand-medium transition-colors text-sm font-semibold flex items-center gap-2 shadow-sm">
                <i class="fa-solid fa-upload text-xs"></i> Upload Document
            </button>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-2 md:grid-cols-5 gap-3 mb-4">
        <div class="bg-white rounded-xl shadow-xs p-3 border border-slate-200 text-center">
            <p class="text-xs text-slate-500 font-medium">Total</p>
            <p class="text-xl font-bold text-slate-900"><?php echo $totalDocuments; ?></p>
        </div>
        <div class="bg-white rounded-xl shadow-xs p-3 border border-slate-200 text-center">
            <p class="text-xs text-slate-500 font-medium">Verified</p>
            <p class="text-xl font-bold text-emerald-600"><?php echo $verifiedDocs; ?></p>
        </div>
        <div class="bg-white rounded-xl shadow-xs p-3 border border-slate-200 text-center">
            <p class="text-xs text-slate-500 font-medium">Pending</p>
            <p class="text-xl font-bold text-amber-600"><?php echo $pendingDocs; ?></p>
        </div>
        <div class="bg-white rounded-xl shadow-xs p-3 border border-slate-200 text-center">
            <p class="text-xs text-slate-500 font-medium">Expired</p>
            <p class="text-xl font-bold text-rose-600"><?php echo $expiredDocs; ?></p>
        </div>
        <div class="bg-white rounded-xl shadow-xs p-3 border border-slate-200 text-center">
            <p class="text-xs text-slate-500 font-medium">QR Codes</p>
            <p class="text-xl font-bold text-brand-medium"><?php echo $hasQR; ?></p>
        </div>
    </div>

    <!-- Document Expiry Alerts -->
    <?php 
        $expiringSoon = array_filter($documents, function($d) {
            if (!$d['expiry_date']) return false;
            $daysLeft = (strtotime($d['expiry_date']) - time()) / 86400;
            return $daysLeft <= 30 && $daysLeft > 0 && $d['status'] !== 'expired';
        });
    ?>
    <?php if (count($expiringSoon) > 0): ?>
    <div class="bg-amber-50 border border-amber-200 rounded-xl p-3 mb-4 flex items-center justify-between">
        <div class="flex items-center gap-3">
            <i class="fa-solid fa-clock text-amber-500 text-lg"></i>
            <span class="text-sm text-amber-700">
                <span class="font-bold"><?php echo count($expiringSoon); ?></span> document(s) expiring within 30 days
            </span>
        </div>
        <button onclick="document.getElementById('filterStatus').value='expiring_soon'; filterDocuments();" 
                class="text-xs font-semibold text-amber-700 hover:text-amber-900 underline">
            View expiring
        </button>
    </div>
    <?php endif; ?>

    <!-- Search & Filter -->
    <div class="bg-white rounded-xl shadow-xs p-4 border border-slate-200 mb-6">
        <div class="flex flex-col sm:flex-row gap-3">
            <div class="flex-1 relative">
                <i class="fa-solid fa-search absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-sm"></i>
                <input type="text"
                       id="searchDocument"
                       placeholder="Search by document ID, applicant, or file name..."
                       class="w-full pl-9 pr-4 py-2 border border-slate-200 rounded-lg focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none text-sm transition">
            </div>
            <div class="flex gap-2 flex-wrap">
                <select id="filterStatus" class="px-4 py-2 border border-slate-200 rounded-lg focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none text-sm bg-white">
                    <option value="">All Status</option>
                    <option value="verified">Verified</option>
                    <option value="pending">Pending</option>
                    <option value="expired">Expired</option>
                    <option value="expiring_soon">Expiring Soon</option>
                </select>
                <select id="filterType" class="px-4 py-2 border border-slate-200 rounded-lg focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none text-sm bg-white">
                    <option value="">All Types</option>
                    <option value="Business Registration">Business Registration</option>
                    <option value="Floor Plan">Floor Plan</option>
                    <option value="Health Certificate">Health Certificate</option>
                    <option value="Market Permit">Market Permit</option>
                    <option value="Waste Disposal Plan">Waste Disposal Plan</option>
                    <option value="Pharmacy License">Pharmacy License</option>
                </select>
                <button onclick="resetFilters()" title="Reset filters"
                        class="px-3 py-2 bg-slate-100 text-slate-500 rounded-lg hover:bg-slate-200 hover:text-slate-700 transition-colors text-sm">
                    <i class="fa-solid fa-rotate-right"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- Documents Table -->
    <div class="bg-white rounded-xl shadow-xs border border-slate-200 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead class="bg-slate-50 border-b border-slate-200">
                    <tr>
                        <th class="px-4 py-3 text-left text-[10px] font-bold text-slate-500 uppercase tracking-wider">Doc ID</th>
                        <th class="px-4 py-3 text-left text-[10px] font-bold text-slate-500 uppercase tracking-wider">Applicant / Permit</th>
                        <th class="px-4 py-3 text-left text-[10px] font-bold text-slate-500 uppercase tracking-wider">Document Type</th>
                        <th class="px-4 py-3 text-left text-[10px] font-bold text-slate-500 uppercase tracking-wider">File</th>
                        <th class="px-4 py-3 text-left text-[10px] font-bold text-slate-500 uppercase tracking-wider">QR Code</th>
                        <th class="px-4 py-3 text-left text-[10px] font-bold text-slate-500 uppercase tracking-wider">Status</th>
                        <th class="px-4 py-3 text-left text-[10px] font-bold text-slate-500 uppercase tracking-wider">Expiry</th>
                        <th class="px-4 py-3 text-center text-[10px] font-bold text-slate-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody id="documentTableBody">
                    <?php foreach ($paginatedDocuments as $document): ?>
                    <tr class="border-b border-slate-100 hover:bg-brand-light/40 transition-colors document-row <?php echo $document['status'] === 'expired' ? 'bg-rose-50/50' : ''; ?>"
                        data-applicant="<?php echo strtolower($document['applicant']); ?>"
                        data-type="<?php echo strtolower($document['document_type']); ?>"
                        data-status="<?php echo $document['status']; ?>"
                        data-id="<?php echo $document['document_id']; ?>">
                        <td class="px-4 py-3 font-mono text-xs text-brand-dark font-semibold"><?php echo $document['document_id']; ?></td>
                        <td class="px-4 py-3">
                            <div>
                                <p class="font-semibold text-slate-800 text-sm"><?php echo $document['applicant']; ?></p>
                                <p class="text-xs text-slate-400"><?php echo $document['permit_id']; ?></p>
                            </div>
                        </td>
                        <td class="px-4 py-3 text-slate-600 text-xs"><?php echo $document['document_type']; ?></td>
                        <td class="px-4 py-3">
                            <div class="flex items-center gap-2">
                                <i class="fa-solid fa-file-pdf text-rose-500"></i>
                                <span class="text-xs text-slate-600 truncate max-w-[100px]"><?php echo $document['file_name']; ?></span>
                            </div>
                            <span class="text-[10px] text-slate-400"><?php echo $document['file_size']; ?></span>
                        </td>
                        <td class="px-4 py-3">
                            <?php if ($document['qr_code']): ?>
                                <span class="px-2 py-1 bg-brand-light/60 rounded text-xs font-mono text-brand-dark border border-brand-border">
                                    <i class="fa-solid fa-qrcode mr-1"></i><?php echo $document['qr_code']; ?>
                                </span>
                            <?php else: ?>
                                <span class="text-xs text-slate-400">—</span>
                            <?php endif; ?>
                        </td>
                        <td class="px-4 py-3">
                            <?php
                                $statusColors = [
                                    'verified' => 'bg-emerald-100 text-emerald-700',
                                    'pending' => 'bg-amber-100 text-amber-700',
                                    'expired' => 'bg-rose-100 text-rose-700'
                                ];
                            ?>
                            <span class="px-2 py-1 rounded-full text-xs font-semibold <?php echo $statusColors[$document['status']] ?? $statusColors['pending']; ?>">
                                <?php echo ucfirst($document['status']); ?>
                            </span>
                        </td>
                        <td class="px-4 py-3 text-slate-500 text-xs">
                            <?php if ($document['expiry_date']): ?>
                                <?php 
                                    $daysLeft = (strtotime($document['expiry_date']) - time()) / 86400;
                                    $daysLeft = round($daysLeft);
                                ?>
                                <span class="<?php echo $daysLeft <= 30 ? 'text-rose-600 font-bold' : 'text-slate-500'; ?>">
                                    <?php echo date('M d, Y', strtotime($document['expiry_date'])); ?>
                                </span>
                                <?php if ($document['status'] !== 'expired'): ?>
                                    <span class="block text-[10px] <?php echo $daysLeft <= 30 ? 'text-rose-500' : 'text-slate-400'; ?>">
                                        <?php echo $daysLeft . ' days left'; ?>
                                    </span>
                                <?php endif; ?>
                            <?php else: ?>
                                <span class="text-slate-400">—</span>
                            <?php endif; ?>
                        </td>
                        <td class="px-4 py-3">
                            <div class="flex items-center justify-center gap-1">
                                <button onclick="viewDocument(<?php echo $document['id']; ?>)"
                                        class="p-1.5 text-brand-medium hover:bg-brand-light rounded-lg transition" title="View">
                                    <i class="fa-solid fa-eye text-sm"></i>
                                </button>
                                <button onclick="downloadDocument('<?php echo $document['file_name']; ?>')"
                                        class="p-1.5 text-blue-600 hover:bg-blue-50 rounded-lg transition" title="Download">
                                    <i class="fa-solid fa-download text-sm"></i>
                                </button>
                                <?php if ($document['qr_code']): ?>
                                    <button onclick="viewQR('<?php echo $document['qr_code']; ?>', '<?php echo $document['applicant']; ?>')"
                                            class="p-1.5 text-brand-dark hover:bg-brand-light rounded-lg transition" title="QR Code">
                                        <i class="fa-solid fa-qrcode text-sm"></i>
                                    </button>
                                <?php endif; ?>
                                <?php if ($document['status'] === 'pending'): ?>
                                    <button onclick="verifyDocument(<?php echo $document['id']; ?>)"
                                            class="p-1.5 text-emerald-600 hover:bg-emerald-50 rounded-lg transition" title="Verify">
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
                <i class="fa-solid fa-file-circle-xmark text-slate-400"></i>
            </div>
            <p class="text-sm font-semibold text-slate-600">No documents match your filters</p>
            <p class="text-xs text-slate-400 mt-1">Try adjusting your search or clearing filters</p>
            <button onclick="resetFilters()" class="mt-3 text-xs font-semibold text-brand-medium hover:text-brand-dark">Clear all filters</button>
        </div>

        <!-- Pagination -->
        <div class="px-4 py-3 border-t border-slate-200 flex flex-col sm:flex-row justify-between items-center gap-3 bg-slate-50">
            <p class="text-xs text-slate-500">
                Showing <span class="font-semibold text-slate-700"><?php echo $offset + 1; ?></span> to
                <span class="font-semibold text-slate-700"><?php echo min($offset + $limit, $totalDocuments); ?></span> of
                <span class="font-semibold text-slate-700"><?php echo $totalDocuments; ?></span> documents
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
<!-- UPLOAD DOCUMENT MODAL                                        -->
<!-- ============================================================ -->
<div id="uploadDocumentModal" class="hidden fixed inset-0 bg-slate-900/50 backdrop-blur-sm z-50 items-center justify-center p-4">
    <div class="bg-white rounded-2xl shadow-xl w-full max-w-lg max-h-[90vh] overflow-y-auto">
        <div class="flex items-center justify-between px-6 py-4 border-b border-slate-200 sticky top-0 bg-white rounded-t-2xl">
            <h3 class="font-bold text-slate-900 flex items-center gap-2">
                <i class="fa-solid fa-upload text-brand-medium"></i>
                Upload Document
            </h3>
            <button onclick="closeModal('uploadDocumentModal')" class="w-8 h-8 rounded-lg hover:bg-slate-100 flex items-center justify-center text-slate-400 hover:text-slate-600 transition">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>
        <form id="uploadDocumentForm" class="p-6 space-y-4" onsubmit="saveUploadedDocument(event)">
            <div>
                <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">Permit / Applicant</label>
                <select id="doc_permit" required class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm bg-white focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none">
                    <option value="">Select Permit</option>
                    <?php foreach ($permits as $p): ?>
                        <option value="<?php echo $p['id']; ?>"><?php echo $p['permit_id']; ?> - <?php echo $p['applicant']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div>
                <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">Document Type</label>
                <select id="doc_type" required class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm bg-white focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none">
                    <option value="Business Registration">Business Registration</option>
                    <option value="Floor Plan">Floor Plan</option>
                    <option value="Health Certificate">Health Certificate</option>
                    <option value="Market Permit">Market Permit</option>
                    <option value="Waste Disposal Plan">Waste Disposal Plan</option>
                    <option value="Pharmacy License">Pharmacy License</option>
                    <option value="Other">Other</option>
                </select>
            </div>
            <div>
                <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">File</label>
                <div class="border-2 border-dashed border-slate-200 rounded-xl p-6 text-center cursor-pointer hover:border-brand-medium hover:bg-brand-light/30 transition"
                     onclick="document.getElementById('doc_file_input').click()">
                    <input type="file" id="doc_file_input" class="hidden" accept=".pdf,.jpg,.jpeg,.png,.doc,.docx" onchange="handleFileSelect(this.files[0])">
                    <div class="flex flex-col items-center gap-2">
                        <i class="fa-solid fa-cloud-arrow-up text-3xl text-slate-300"></i>
                        <p class="text-sm text-slate-500">Click to upload or drag & drop</p>
                        <p class="text-xs text-slate-400">PDF, JPG, PNG, DOC (Max 5MB)</p>
                    </div>
                    <div id="fileSelected" class="hidden mt-3 p-2 bg-emerald-50 rounded-lg border border-emerald-200 flex items-center justify-between">
                        <span id="fileNameDisplay" class="text-sm font-medium text-emerald-700"></span>
                        <span id="fileSizeDisplay" class="text-xs text-emerald-500"></span>
                    </div>
                </div>
            </div>
            <div>
                <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">Expiry Date (Optional)</label>
                <input type="date" id="doc_expiry" class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none">
            </div>
            <div>
                <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">Notes</label>
                <textarea id="doc_notes" rows="2" class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none" placeholder="Additional notes..."></textarea>
            </div>

            <div class="flex justify-end gap-2 pt-2 border-t border-slate-100">
                <button type="button" onclick="closeModal('uploadDocumentModal')"
                        class="px-4 py-2 bg-white border border-slate-200 text-slate-600 rounded-lg hover:bg-slate-50 transition text-sm font-semibold">
                    Cancel
                </button>
                <button type="submit"
                        class="px-4 py-2 bg-brand-dark text-white rounded-lg hover:bg-brand-medium transition text-sm font-semibold">
                    <i class="fa-solid fa-upload mr-1.5"></i> Upload
                </button>
            </div>
        </form>
    </div>
</div>

<!-- ============================================================ -->
<!-- VIEW DOCUMENT MODAL                                          -->
<!-- ============================================================ -->
<div id="viewDocumentModal" class="hidden fixed inset-0 bg-slate-900/50 backdrop-blur-sm z-50 items-center justify-center p-4">
    <div class="bg-white rounded-2xl shadow-xl w-full max-w-2xl max-h-[90vh] overflow-y-auto">
        <div class="flex items-center justify-between px-6 py-4 border-b border-slate-200 sticky top-0 bg-white rounded-t-2xl">
            <h3 class="font-bold text-slate-900">Document Details</h3>
            <button onclick="closeModal('viewDocumentModal')" class="w-8 h-8 rounded-lg hover:bg-slate-100 flex items-center justify-center text-slate-400 hover:text-slate-600 transition">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>
        <div id="documentDetailsContent" class="p-6">
            <div class="flex items-center justify-center py-10 text-slate-400 text-sm">
                <i class="fa-solid fa-spinner fa-spin mr-2"></i> Loading...
            </div>
        </div>
    </div>
</div>

<!-- ============================================================ -->
<!-- QR CODE VIEWER MODAL                                         -->
<!-- ============================================================ -->
<div id="qrViewerModal" class="hidden fixed inset-0 bg-slate-900/50 backdrop-blur-sm z-50 items-center justify-center p-4">
    <div class="bg-white rounded-2xl shadow-xl w-full max-w-md">
        <div class="flex items-center justify-between px-6 py-4 border-b border-slate-200">
            <h3 class="font-bold text-slate-900 flex items-center gap-2">
                <i class="fa-solid fa-qrcode text-brand-medium"></i>
                QR Code Verification
            </h3>
            <button onclick="closeModal('qrViewerModal')" class="w-8 h-8 rounded-lg hover:bg-slate-100 flex items-center justify-center text-slate-400 hover:text-slate-600 transition">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>
        <div class="p-6 text-center">
            <div class="w-48 h-48 mx-auto bg-white border-2 border-brand-border rounded-2xl flex items-center justify-center">
                <div id="qrCodeDisplay" class="w-40 h-40 bg-brand-light/40 rounded-xl flex items-center justify-center">
                    <i class="fa-solid fa-qrcode text-8xl text-brand-dark"></i>
                </div>
            </div>
            <div class="mt-4">
                <p id="qrApplicant" class="font-semibold text-slate-800 text-sm">ABC Restaurant</p>
                <p id="qrCodeId" class="text-xs text-slate-400 font-mono">QR-ABC-001</p>
                <div class="mt-3 p-3 bg-emerald-50 border border-emerald-200 rounded-lg">
                    <p class="text-xs text-emerald-700">✅ Verified Document</p>
                    <p class="text-[10px] text-emerald-500 mt-1">This QR code confirms the authenticity of this document</p>
                </div>
                <div class="mt-4 flex justify-center gap-2">
                    <button onclick="closeModal('qrViewerModal')" class="px-4 py-2 bg-white border border-slate-200 text-slate-600 rounded-lg hover:bg-slate-50 transition text-sm font-semibold">Close</button>
                    <button onclick="downloadQR()" class="px-4 py-2 bg-brand-dark text-white rounded-lg hover:bg-brand-medium transition text-sm font-semibold">
                        <i class="fa-solid fa-download mr-1.5"></i> Download QR
                    </button>
                </div>
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
    const DOCUMENTS = <?php echo json_encode(array_column($documents, null, 'id'), JSON_PRETTY_PRINT); ?>;

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
    // FILE HANDLING
    // ============================================================
    function handleFileSelect(file) {
        const fileSelected = document.getElementById('fileSelected');
        const fileName = document.getElementById('fileNameDisplay');
        const fileSize = document.getElementById('fileSizeDisplay');
        
        if (file) {
            fileName.textContent = file.name;
            fileSize.textContent = (file.size / 1024).toFixed(1) + ' KB';
            fileSelected.classList.remove('hidden');
        } else {
            fileSelected.classList.add('hidden');
        }
    }

    // ============================================================
    // UPLOAD DOCUMENT
    // ============================================================
    function saveUploadedDocument(event) {
        event.preventDefault();
        showToast('Document uploaded successfully!', 'success');
        closeModal('uploadDocumentModal');
    }

    // ============================================================
    // VIEW DOCUMENT
    // ============================================================
    function viewDocument(id) {
        openModal('viewDocumentModal');
        const d = DOCUMENTS[id];
        if (!d) return;

        setTimeout(() => {
            const statusColors = {
                verified: 'bg-emerald-100 text-emerald-700',
                pending: 'bg-amber-100 text-amber-700',
                expired: 'bg-rose-100 text-rose-700'
            };

            document.getElementById('documentDetailsContent').innerHTML = `
                <div class="space-y-4">
                    <div class="flex items-center gap-4 pb-4 border-b border-slate-200">
                        <div class="w-14 h-14 rounded-full bg-brand-light border border-brand-border flex items-center justify-center text-brand-dark font-bold text-2xl flex-shrink-0">
                            ${d.applicant.charAt(0)}
                        </div>
                        <div>
                            <h4 class="text-lg font-bold text-slate-900">${d.document_type}</h4>
                            <p class="text-sm text-slate-500">${d.document_id} • ${d.applicant}</p>
                            <span class="inline-block px-2 py-0.5 rounded-full text-xs font-semibold mt-1 ${statusColors[d.status] || statusColors.pending}">
                                ${d.status.toUpperCase()}
                            </span>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div><p class="text-xs text-slate-400 font-semibold">Permit ID</p><p class="text-sm text-slate-800">${d.permit_id}</p></div>
                        <div><p class="text-xs text-slate-400 font-semibold">File Name</p><p class="text-sm text-slate-800">${d.file_name}</p></div>
                        <div><p class="text-xs text-slate-400 font-semibold">File Size</p><p class="text-sm text-slate-800">${d.file_size}</p></div>
                        <div><p class="text-xs text-slate-400 font-semibold">Uploaded By</p><p class="text-sm text-slate-800">${d.uploaded_by}</p></div>
                        <div><p class="text-xs text-slate-400 font-semibold">Uploaded At</p><p class="text-sm text-slate-800">${new Date(d.uploaded_at).toLocaleString()}</p></div>
                        <div><p class="text-xs text-slate-400 font-semibold">Expiry Date</p><p class="text-sm text-slate-800">${d.expiry_date ? new Date(d.expiry_date).toLocaleDateString() : '—'}</p></div>
                    </div>
                    ${d.notes ? `<div class="bg-slate-50 rounded-xl p-4 border border-slate-200"><h5 class="text-sm font-bold text-slate-700 mb-2">Notes</h5><p class="text-sm text-slate-800">${d.notes}</p></div>` : ''}
                    ${d.qr_code ? `<div class="bg-brand-light/40 rounded-xl p-4 border border-brand-border text-center"><i class="fa-solid fa-qrcode text-2xl text-brand-dark block mb-2"></i><p class="text-sm font-semibold text-slate-700">QR Code: ${d.qr_code}</p><button onclick="closeModal('viewDocumentModal'); viewQR('${d.qr_code}', '${d.applicant}')" class="mt-2 px-4 py-1.5 bg-brand-dark text-white rounded-lg text-xs hover:bg-brand-medium transition"><i class="fa-solid fa-qrcode mr-1"></i> View QR</button></div>` : ''}
                    <div class="flex justify-end gap-2 pt-2 border-t border-slate-200">
                        <button onclick="closeModal('viewDocumentModal')" class="px-4 py-2 bg-white border border-slate-200 text-slate-600 rounded-lg hover:bg-slate-50 transition text-sm font-semibold">Close</button>
                        <button onclick="downloadDocument('${d.file_name}')" class="px-4 py-2 bg-brand-dark text-white rounded-lg hover:bg-brand-medium transition text-sm font-semibold"><i class="fa-solid fa-download mr-1.5"></i> Download</button>
                    </div>
                </div>
            `;
        }, 300);
    }

    // ============================================================
    // DOWNLOAD DOCUMENT
    // ============================================================
    function downloadDocument(fileName) {
        showToast('Downloading: ' + fileName, 'success');
    }

    // ============================================================
    // VERIFY DOCUMENT
    // ============================================================
    function verifyDocument(id) {
        if (!confirm('Verify this document?')) return;
        const d = DOCUMENTS[id];
        if (!d) return;
        
        d.status = 'verified';
        if (!d.qr_code) {
            d.qr_code = 'QR-' + String(id).padStart(3, '0') + '-' + String(Math.floor(Math.random() * 900) + 100);
        }
        updateDocumentRow(d);
        showToast('Document ' + d.document_id + ' verified!', 'success');
    }

    function updateDocumentRow(d) {
        const rows = document.querySelectorAll('.document-row');
        rows.forEach(row => {
            const docId = row.querySelector('.font-mono.text-xs.text-brand-dark.font-semibold')?.textContent;
            if (docId === d.document_id) {
                // Update status
                const statusBadge = row.querySelector('.px-2.py-1.rounded-full');
                const statusColors = {
                    verified: 'bg-emerald-100 text-emerald-700',
                    pending: 'bg-amber-100 text-amber-700',
                    expired: 'bg-rose-100 text-rose-700'
                };
                statusBadge.className = `px-2 py-1 rounded-full text-xs font-semibold ${statusColors[d.status] || statusColors.pending}`;
                statusBadge.textContent = d.status.charAt(0).toUpperCase() + d.status.slice(1);
                
                // Update QR
                const qrCell = row.querySelector('.px-4.py-3 .px-2.py-1');
                if (qrCell) {
                    if (d.qr_code) {
                        qrCell.className = 'px-2 py-1 bg-brand-light/60 rounded text-xs font-mono text-brand-dark border border-brand-border';
                        qrCell.innerHTML = `<i class="fa-solid fa-qrcode mr-1"></i>${d.qr_code}`;
                    }
                }
            }
        });
    }

    // ============================================================
    // QR CODE VIEWER
    // ============================================================
    function viewQR(qrCode, applicant) {
        document.getElementById('qrCodeId').textContent = qrCode;
        document.getElementById('qrApplicant').textContent = applicant;
        openModal('qrViewerModal');
    }

    function downloadQR() {
        showToast('QR Code downloaded successfully!', 'success');
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
    document.getElementById('searchDocument').addEventListener('input', filterDocuments);
    document.getElementById('filterStatus').addEventListener('change', filterDocuments);
    document.getElementById('filterType').addEventListener('change', filterDocuments);

    function filterDocuments() {
        const search = document.getElementById('searchDocument').value.toLowerCase();
        const status = document.getElementById('filterStatus').value;
        const type = document.getElementById('filterType').value.toLowerCase();
        let visibleCount = 0;

        document.querySelectorAll('.document-row').forEach(row => {
            const applicant = row.dataset.applicant;
            const rowType = row.dataset.type;
            const rowStatus = row.dataset.status;
            const docId = row.dataset.id.toLowerCase();

            let matchesStatus = true;
            if (status === 'expiring_soon') {
                const expiryCell = row.querySelector('.px-4.py-3.text-slate-500.text-xs span');
                if (expiryCell) {
                    const daysText = expiryCell.textContent.match(/\d+/);
                    const daysLeft = daysText ? parseInt(daysText[0]) : 999;
                    matchesStatus = daysLeft <= 30 && rowStatus !== 'expired';
                } else {
                    matchesStatus = false;
                }
            } else {
                matchesStatus = !status || rowStatus === status;
            }

            const matchesSearch = applicant.includes(search) || docId.includes(search);
            const matchesType = !type || rowType === type;
            const isVisible = matchesSearch && matchesStatus && matchesType;

            row.style.display = isVisible ? '' : 'none';
            if (isVisible) visibleCount++;
        });

        document.getElementById('emptyState').style.display = visibleCount === 0 ? 'flex' : 'none';
    }

    function resetFilters() {
        document.getElementById('searchDocument').value = '';
        document.getElementById('filterStatus').value = '';
        document.getElementById('filterType').value = '';
        document.querySelectorAll('.document-row').forEach(row => row.style.display = '');
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