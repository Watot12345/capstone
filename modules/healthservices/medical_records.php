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

// Sample Patient Data (for dropdown)
$patients = [
    ['id' => 1, 'patient_id' => 'P-1001', 'name' => 'Maria Santos'],
    ['id' => 2, 'patient_id' => 'P-1002', 'name' => 'Juan Dela Cruz'],
    ['id' => 3, 'patient_id' => 'P-1003', 'name' => 'Rosa Mendoza'],
    ['id' => 4, 'patient_id' => 'P-1004', 'name' => 'Carlos Lim'],
    ['id' => 5, 'patient_id' => 'P-1005', 'name' => 'Elena Torres'],
];

// Sample Medical Records Data
$medicalRecords = [
    [
        'id' => 1,
        'patient_id' => 1,
        'patient_name' => 'Maria Santos',
        'patient_avatar' => 'MS',
        'record_type' => 'consultation',
        'title' => 'Hypertension Follow-up',
        'description' => 'Patient presented with elevated BP 140/90. Continue Amlodipine 5mg daily.',
        'date' => '2026-07-15',
        'doctor' => 'Dr. Elena Santos',
        'status' => 'completed',
        'shared_with' => ['Dr. Miguel Reyes'],
        'attachments' => ['BP_Reading.pdf']
    ],
    [
        'id' => 2,
        'patient_id' => 2,
        'patient_name' => 'Juan Dela Cruz',
        'patient_avatar' => 'JD',
        'record_type' => 'lab',
        'title' => 'Blood Sugar Test Results',
        'description' => 'Fasting blood sugar: 180 mg/dL. HbA1c: 8.5%. Diabetes Type 2 - Uncontrolled.',
        'date' => '2026-07-14',
        'doctor' => 'Dr. Miguel Reyes',
        'status' => 'completed',
        'shared_with' => ['Dr. Ana Cruz'],
        'attachments' => ['Lab_Results.pdf']
    ],
    [
        'id' => 3,
        'patient_id' => 3,
        'patient_name' => 'Rosa Mendoza',
        'patient_avatar' => 'RM',
        'record_type' => 'imaging',
        'title' => 'Chest X-Ray Results',
        'description' => 'Chest X-ray shows mild hyperinflation. Consistent with asthma exacerbation.',
        'date' => '2026-07-13',
        'doctor' => 'Dr. Ana Cruz',
        'status' => 'completed',
        'shared_with' => ['Dr. Elena Santos'],
        'attachments' => ['XRay_Results.jpg']
    ],
    [
        'id' => 4,
        'patient_id' => 4,
        'patient_name' => 'Carlos Lim',
        'patient_avatar' => 'CL',
        'record_type' => 'procedure',
        'title' => 'ECG Report',
        'description' => 'ECG shows normal sinus rhythm. No acute ischemic changes. Follow-up in 1 month.',
        'date' => '2026-07-12',
        'doctor' => 'Dr. Elena Santos',
        'status' => 'pending',
        'shared_with' => [],
        'attachments' => ['ECG_Results.pdf']
    ],
    [
        'id' => 5,
        'patient_id' => 5,
        'patient_name' => 'Elena Torres',
        'patient_avatar' => 'ET',
        'record_type' => 'consultation',
        'title' => 'Prenatal Checkup',
        'description' => 'Normal prenatal checkup. Fetal heartbeat: 140 bpm. Continue vitamins.',
        'date' => '2026-07-11',
        'doctor' => 'Dr. Miguel Reyes',
        'status' => 'completed',
        'shared_with' => ['Dr. Ana Cruz'],
        'attachments' => ['Ultrasound_Image.jpg', 'Prenatal_Record.pdf']
    ],
    [
        'id' => 6,
        'patient_id' => 1,
        'patient_name' => 'Maria Santos',
        'patient_avatar' => 'MS',
        'record_type' => 'lab',
        'title' => 'Complete Blood Count',
        'description' => 'CBC results normal. WBC: 7.5, RBC: 4.8, Hemoglobin: 14.2, Platelets: 250.',
        'date' => '2026-07-10',
        'doctor' => 'Dr. Elena Santos',
        'status' => 'completed',
        'shared_with' => [],
        'attachments' => ['CBC_Results.pdf']
    ],
    [
        'id' => 7,
        'patient_id' => 2,
        'patient_name' => 'Juan Dela Cruz',
        'patient_avatar' => 'JD',
        'record_type' => 'imaging',
        'title' => 'Chest CT Scan',
        'description' => 'CT scan shows mild emphysema. No nodules or masses detected.',
        'date' => '2026-07-09',
        'doctor' => 'Dr. Miguel Reyes',
        'status' => 'completed',
        'shared_with' => ['Dr. Ana Cruz', 'Dr. Elena Santos'],
        'attachments' => ['CT_Scan_Results.jpg']
    ],
    [
        'id' => 8,
        'patient_id' => 3,
        'patient_name' => 'Rosa Mendoza',
        'patient_avatar' => 'RM',
        'record_type' => 'consultation',
        'title' => 'Asthma Management Plan',
        'description' => 'Patient educated on inhaler technique. Prescribed maintenance therapy.',
        'date' => '2026-07-08',
        'doctor' => 'Dr. Ana Cruz',
        'status' => 'pending',
        'shared_with' => [],
        'attachments' => ['Asthma_Action_Plan.pdf']
    ],
];

// Pagination
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$limit = 6;
$offset = ($page - 1) * $limit;
$totalRecords = count($medicalRecords);
$totalPages = ceil($totalRecords / $limit);
$paginatedRecords = array_slice($medicalRecords, $offset, $limit);

$title = 'Medical Records';

// Stats
$totalConsultations = count(array_filter($medicalRecords, fn($r) => $r['record_type'] === 'consultation'));
$totalLabResults = count(array_filter($medicalRecords, fn($r) => $r['record_type'] === 'lab'));
$totalImaging = count(array_filter($medicalRecords, fn($r) => $r['record_type'] === 'imaging'));
$totalShared = count(array_filter($medicalRecords, fn($r) => count($r['shared_with']) > 0));
?>

<!-- ============================================================ -->
<!-- 2. HTML + PHP EMBEDDED + Tailwind CSS                       -->
<!-- ============================================================ -->

<div class="flex-1 px-6 pt-[26px] pb-20 mb-10 flex flex-col min-h-0 overflow-hidden">

    <!-- Page Header -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6">
        <div>
            <h2 class="text-2xl font-black text-slate-900 tracking-tight">Medical Records</h2>
            <p class="text-sm text-slate-500 mt-0.5">Electronic Health Record (EHR) - Documentation & Reporting</p>
        </div>
        <div class="flex gap-3">
            <button onclick="openModal('addRecordModal')"
                    class="px-4 py-2 bg-brand-dark text-white rounded-lg hover:bg-brand-medium transition-colors text-sm font-semibold flex items-center gap-2 shadow-sm">
                <i class="fa-solid fa-plus text-xs"></i> Add Record
            </button>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-4">
        <div class="bg-white rounded-xl shadow-xs p-4 border border-slate-200 flex items-center gap-3">
            <div class="w-11 h-11 rounded-lg bg-brand-light border border-brand-border flex items-center justify-center flex-shrink-0">
                <i class="fa-solid fa-notes-medical text-brand-dark"></i>
            </div>
            <div>
                <p class="text-xs text-slate-500 font-semibold uppercase tracking-wide">Total Records</p>
                <p class="text-xl font-bold text-slate-900"><?php echo $totalRecords; ?></p>
            </div>
        </div>
        <div class="bg-white rounded-xl shadow-xs p-4 border border-slate-200 flex items-center gap-3">
            <div class="w-11 h-11 rounded-lg bg-emerald-50 border border-emerald-100 flex items-center justify-center flex-shrink-0">
                <i class="fa-solid fa-stethoscope text-emerald-600"></i>
            </div>
            <div>
                <p class="text-xs text-slate-500 font-semibold uppercase tracking-wide">Consultations</p>
                <p class="text-xl font-bold text-slate-900"><?php echo $totalConsultations; ?></p>
            </div>
        </div>
        <div class="bg-white rounded-xl shadow-xs p-4 border border-slate-200 flex items-center gap-3">
            <div class="w-11 h-11 rounded-lg bg-violet-50 border border-violet-100 flex items-center justify-center flex-shrink-0">
                <i class="fa-solid fa-flask text-violet-600"></i>
            </div>
            <div>
                <p class="text-xs text-slate-500 font-semibold uppercase tracking-wide">Lab Results</p>
                <p class="text-xl font-bold text-slate-900"><?php echo $totalLabResults; ?></p>
            </div>
        </div>
        <div class="bg-white rounded-xl shadow-xs p-4 border border-slate-200 flex items-center gap-3">
            <div class="w-11 h-11 rounded-lg bg-sky-50 border border-sky-100 flex items-center justify-center flex-shrink-0">
                <i class="fa-solid fa-share-nodes text-sky-600"></i>
            </div>
            <div>
                <p class="text-xs text-slate-500 font-semibold uppercase tracking-wide">Shared Records</p>
                <p class="text-xl font-bold text-slate-900"><?php echo $totalShared; ?></p>
            </div>
        </div>
    </div>

    <!-- Search & Filter -->
    <div class="bg-white rounded-xl shadow-xs p-4 border border-slate-200 mb-6">
        <div class="flex flex-col sm:flex-row gap-3">
            <div class="flex-1 relative">
                <i class="fa-solid fa-search absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-sm"></i>
                <input type="text"
                       id="searchRecord"
                       placeholder="Search by patient name, record type, or title..."
                       class="w-full pl-9 pr-4 py-2 border border-slate-200 rounded-lg focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none text-sm transition">
            </div>
            <div class="flex gap-2 flex-wrap">
                <select id="filterPatient" class="px-4 py-2 border border-slate-200 rounded-lg focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none text-sm bg-white">
                    <option value="">All Patients</option>
                    <?php foreach ($patients as $p): ?>
                        <option value="<?php echo strtolower($p['name']); ?>"><?php echo $p['name']; ?></option>
                    <?php endforeach; ?>
                </select>
                <select id="filterType" class="px-4 py-2 border border-slate-200 rounded-lg focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none text-sm bg-white">
                    <option value="">All Types</option>
                    <option value="consultation">Consultation</option>
                    <option value="lab">Lab Result</option>
                    <option value="imaging">Imaging</option>
                    <option value="procedure">Procedure</option>
                    <option value="other">Other</option>
                </select>
                <select id="filterStatus" class="px-4 py-2 border border-slate-200 rounded-lg focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none text-sm bg-white">
                    <option value="">All Status</option>
                    <option value="completed">Completed</option>
                    <option value="pending">Pending</option>
                </select>
                <button onclick="resetFilters()" title="Reset filters"
                        class="px-3 py-2 bg-slate-100 text-slate-500 rounded-lg hover:bg-slate-200 hover:text-slate-700 transition-colors text-sm">
                    <i class="fa-solid fa-rotate-right"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- Records Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4" id="recordsGrid">
        <?php foreach ($paginatedRecords as $record): ?>
        <div class="record-card bg-white rounded-xl shadow-xs border border-slate-200 p-4 hover:shadow-md transition-all duration-200"
             data-patient="<?php echo strtolower($record['patient_name']); ?>"
             data-type="<?php echo $record['record_type']; ?>"
             data-title="<?php echo strtolower($record['title']); ?>"
             data-status="<?php echo $record['status']; ?>">
            
            <!-- Header -->
            <div class="flex items-center justify-between mb-3">
                <div class="flex items-center gap-2.5">
                    <div class="w-9 h-9 rounded-full bg-brand-light border border-brand-border flex items-center justify-center text-brand-dark font-bold text-xs flex-shrink-0">
                        <?php echo $record['patient_avatar']; ?>
                    </div>
                    <div>
                        <p class="font-semibold text-slate-800 text-sm"><?php echo $record['patient_name']; ?></p>
                        <p class="text-xs text-slate-400"><?php echo ucfirst($record['record_type']); ?></p>
                    </div>
                </div>
                <?php
                    $typeIcons = [
                        'consultation' => 'fa-stethoscope text-emerald-600',
                        'lab' => 'fa-flask text-violet-600',
                        'imaging' => 'fa-image text-sky-600',
                        'procedure' => 'fa-syringe text-amber-600',
                        'other' => 'fa-file text-slate-400'
                    ];
                    $icon = $typeIcons[$record['record_type']] ?? $typeIcons['other'];
                ?>
                <span class="w-8 h-8 rounded-lg bg-slate-50 flex items-center justify-center">
                    <i class="fa-solid <?php echo $icon; ?>"></i>
                </span>
            </div>
            
            <!-- Title & Description -->
            <div>
                <p class="font-semibold text-slate-800 text-sm"><?php echo $record['title']; ?></p>
                <p class="text-xs text-slate-500 line-clamp-2 mt-1"><?php echo $record['description']; ?></p>
            </div>
            
            <!-- Details -->
            <div class="mt-3 flex items-center justify-between text-xs">
                <span class="text-slate-500"><?php echo date('M d, Y', strtotime($record['date'])); ?></span>
                <span class="text-slate-500"><?php echo $record['doctor']; ?></span>
            </div>
            
            <!-- Status & Shared -->
            <div class="mt-2 flex items-center justify-between">
                <span class="px-2 py-1 rounded-full text-xs font-semibold <?php echo $record['status'] === 'completed' ? 'bg-emerald-100 text-emerald-700' : 'bg-amber-100 text-amber-700'; ?>">
                    <?php echo ucfirst($record['status']); ?>
                </span>
                <?php if (count($record['shared_with']) > 0): ?>
                    <span class="text-xs text-slate-400" title="Shared with: <?php echo implode(', ', $record['shared_with']); ?>">
                        <i class="fa-solid fa-share-nodes text-sky-500 mr-1"></i>
                        <?php echo count($record['shared_with']); ?> shared
                    </span>
                <?php endif; ?>
                <?php if (count($record['attachments']) > 0): ?>
                    <span class="text-xs text-slate-400">
                        <i class="fa-solid fa-paperclip mr-1"></i>
                        <?php echo count($record['attachments']); ?>
                    </span>
                <?php endif; ?>
            </div>
            
            <!-- Actions -->
            <div class="mt-3 pt-3 border-t border-slate-100 flex justify-end gap-2">
                <button onclick="viewRecord(<?php echo $record['id']; ?>)"
                        class="px-3 py-1.5 text-xs font-semibold text-brand-medium hover:bg-brand-light rounded-lg transition">
                    <i class="fa-solid fa-eye mr-1"></i> View
                </button>
                <button onclick="editRecord(<?php echo $record['id']; ?>)"
                        class="px-3 py-1.5 text-xs font-semibold text-slate-500 hover:bg-slate-100 rounded-lg transition">
                    <i class="fa-solid fa-pen mr-1"></i> Edit
                </button>
                <?php if (count($record['shared_with']) > 0): ?>
                    <button onclick="shareRecord(<?php echo $record['id']; ?>)"
                            class="px-3 py-1.5 text-xs font-semibold text-sky-600 hover:bg-sky-50 rounded-lg transition">
                        <i class="fa-solid fa-share-nodes mr-1"></i> Share
                    </button>
                <?php endif; ?>
            </div>
        </div>
        <?php endforeach; ?>
    </div>

    <!-- Empty state -->
    <div id="emptyState" class="hidden flex-col items-center justify-center py-14 text-center">
        <div class="w-12 h-12 rounded-full bg-slate-100 flex items-center justify-center mb-3">
            <i class="fa-solid fa-notes-medical text-slate-400"></i>
        </div>
        <p class="text-sm font-semibold text-slate-600">No records match your filters</p>
        <p class="text-xs text-slate-400 mt-1">Try adjusting your search or clearing filters</p>
        <button onclick="resetFilters()" class="mt-3 text-xs font-semibold text-brand-medium hover:text-brand-dark">Clear all filters</button>
    </div>

    <!-- Pagination -->
    <div class="mt-4 px-4 py-3 border-t border-slate-200 flex flex-col sm:flex-row justify-between items-center gap-3 bg-white rounded-xl shadow-xs border border-slate-200">
        <p class="text-xs text-slate-500">
            Showing <span class="font-semibold text-slate-700"><?php echo $offset + 1; ?></span> to
            <span class="font-semibold text-slate-700"><?php echo min($offset + $limit, $totalRecords); ?></span> of
            <span class="font-semibold text-slate-700"><?php echo $totalRecords; ?></span> records
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

<!-- ============================================================ -->
<!-- VIEW RECORD MODAL                                            -->
<!-- ============================================================ -->
<div id="viewRecordModal" class="hidden fixed inset-0 bg-slate-900/50 backdrop-blur-sm z-50 items-center justify-center p-4">
    <div class="bg-white rounded-2xl shadow-xl w-full max-w-2xl max-h-[90vh] overflow-y-auto">
        <div class="flex items-center justify-between px-6 py-4 border-b border-slate-200 sticky top-0 bg-white rounded-t-2xl">
            <h3 class="font-bold text-slate-900">Medical Record Details</h3>
            <button onclick="closeModal('viewRecordModal')" class="w-8 h-8 rounded-lg hover:bg-slate-100 flex items-center justify-center text-slate-400 hover:text-slate-600 transition">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>
        <div id="recordDetailsContent" class="p-6">
            <div class="flex items-center justify-center py-10 text-slate-400 text-sm">
                <i class="fa-solid fa-spinner fa-spin mr-2"></i> Loading...
            </div>
        </div>
    </div>
</div>

<!-- ============================================================ -->
<!-- ADD RECORD MODAL                                             -->
<!-- ============================================================ -->
<div id="addRecordModal" class="hidden fixed inset-0 bg-slate-900/50 backdrop-blur-sm z-50 items-center justify-center p-4">
    <div class="bg-white rounded-2xl shadow-xl w-full max-w-2xl max-h-[90vh] overflow-y-auto">
        <div class="flex items-center justify-between px-6 py-4 border-b border-slate-200 sticky top-0 bg-white rounded-t-2xl">
            <h3 class="font-bold text-slate-900">Add Medical Record</h3>
            <button onclick="closeModal('addRecordModal')" class="w-8 h-8 rounded-lg hover:bg-slate-100 flex items-center justify-center text-slate-400 hover:text-slate-600 transition">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>
        <form id="addRecordForm" class="p-6 space-y-4" onsubmit="saveNewRecord(event)">
            <div>
                <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">Patient</label>
                <select id="add_patient" required class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm bg-white focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none">
                    <option value="">Select Patient</option>
                    <?php foreach ($patients as $p): ?>
                        <option value="<?php echo $p['id']; ?>"><?php echo $p['name']; ?> (<?php echo $p['patient_id']; ?>)</option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div>
                <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">Record Type</label>
                <select id="add_type" required class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm bg-white focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none">
                    <option value="consultation">Consultation</option>
                    <option value="lab">Lab Result</option>
                    <option value="imaging">Imaging</option>
                    <option value="procedure">Procedure</option>
                    <option value="other">Other</option>
                </select>
            </div>
            <div>
                <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">Title</label>
                <input type="text" id="add_title" required class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none">
            </div>
            <div>
                <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">Description</label>
                <textarea id="add_description" rows="3" required class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none"></textarea>
            </div>
            <div>
                <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">Date</label>
                <input type="date" id="add_date" required class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none">
            </div>
            <div>
                <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">Doctor</label>
                <input type="text" id="add_doctor" required class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none" placeholder="Dr. Name">
            </div>
            <div>
                <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">Status</label>
                <select id="add_status" class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm bg-white focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none">
                    <option value="completed">Completed</option>
                    <option value="pending">Pending</option>
                </select>
            </div>
            <div>
                <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">Share With (Optional)</label>
                <input type="text" id="add_shared" class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none" placeholder="Dr. Name (comma separated)">
                <p class="text-[10px] text-slate-400 mt-1">Enter doctor names separated by commas</p>
            </div>
            <div>
                <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">Attachments</label>
                <input type="file" id="add_attachments" multiple class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm bg-white focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none">
                <p class="text-[10px] text-slate-400 mt-1">Supported: PDF, JPG, PNG, GIF, WebP (Max 5MB each)</p>
            </div>

            <div class="flex justify-end gap-2 pt-2 border-t border-slate-100">
                <button type="button" onclick="closeModal('addRecordModal')"
                        class="px-4 py-2 bg-white border border-slate-200 text-slate-600 rounded-lg hover:bg-slate-50 transition text-sm font-semibold">
                    Cancel
                </button>
                <button type="submit"
                        class="px-4 py-2 bg-brand-dark text-white rounded-lg hover:bg-brand-medium transition text-sm font-semibold">
                    <i class="fa-solid fa-plus mr-1.5"></i> Add Record
                </button>
            </div>
        </form>
    </div>
</div>

<!-- ============================================================ -->
<!-- SHARE RECORD MODAL                                           -->
<!-- ============================================================ -->
<div id="shareRecordModal" class="hidden fixed inset-0 bg-slate-900/50 backdrop-blur-sm z-50 items-center justify-center p-4">
    <div class="bg-white rounded-2xl shadow-xl w-full max-w-md">
        <div class="flex items-center justify-between px-6 py-4 border-b border-slate-200">
            <h3 class="font-bold text-slate-900">Share Medical Record</h3>
            <button onclick="closeModal('shareRecordModal')" class="w-8 h-8 rounded-lg hover:bg-slate-100 flex items-center justify-center text-slate-400 hover:text-slate-600 transition">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>
        <div class="p-6 space-y-4">
            <div class="flex items-center gap-3 p-3 bg-brand-light/40 rounded-xl border border-brand-border">
                <div class="w-10 h-10 rounded-full bg-brand-light border border-brand-border flex items-center justify-center text-brand-dark font-bold text-sm flex-shrink-0">
                    MS
                </div>
                <div>
                    <p id="sharePatientName" class="font-semibold text-slate-800 text-sm">Maria Santos</p>
                    <p id="shareRecordTitle" class="text-xs text-slate-400">Hypertension Follow-up</p>
                </div>
            </div>
            <div>
                <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">Share With</label>
                <input type="text" id="shareWithInput" placeholder="Enter doctor name" class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none">
                <button onclick="addShareDoctor()" class="mt-2 text-xs font-semibold text-brand-medium hover:text-brand-dark transition">
                    <i class="fa-solid fa-plus mr-1"></i> Add Doctor
                </button>
            </div>
            <div id="shareDoctorsList" class="flex flex-wrap gap-2">
                <span class="px-2 py-1 bg-brand-light/40 rounded-full text-xs text-slate-600 border border-brand-border">Dr. Elena Santos</span>
                <span class="px-2 py-1 bg-brand-light/40 rounded-full text-xs text-slate-600 border border-brand-border">Dr. Miguel Reyes</span>
            </div>
            <p class="text-[10px] text-slate-400 mt-2">
                <i class="fa-solid fa-info-circle mr-1"></i>
                Shared doctors will have view-only access to this record.
            </p>
        </div>
        <div class="flex justify-end gap-2 px-6 pb-6">
            <button type="button" onclick="closeModal('shareRecordModal')"
                    class="px-4 py-2 bg-white border border-slate-200 text-slate-600 rounded-lg hover:bg-slate-50 transition text-sm font-semibold">
                Cancel
            </button>
            <button type="button" onclick="confirmShareRecord()"
                    class="px-4 py-2 bg-brand-dark text-white rounded-lg hover:bg-brand-medium transition text-sm font-semibold">
                <i class="fa-solid fa-share-nodes mr-1.5"></i> Share Record
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
<style>
    .record-card {
        transition: all 0.2s ease;
    }
    .record-card:hover {
        transform: translateY(-2px);
    }
</style>

<script>
    const RECORDS = <?php echo json_encode(array_column($medicalRecords, null, 'id'), JSON_PRETTY_PRINT); ?>;

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
    // VIEW RECORD
    // ============================================================
    function viewRecord(id) {
        openModal('viewRecordModal');
        const r = RECORDS[id];
        if (!r) return;

        setTimeout(() => {
            const typeIcons = {
                consultation: 'fa-stethoscope text-emerald-600',
                lab: 'fa-flask text-violet-600',
                imaging: 'fa-image text-sky-600',
                procedure: 'fa-syringe text-amber-600',
                other: 'fa-file text-slate-400'
            };
            const icon = typeIcons[r.record_type] || typeIcons.other;

            const sharedHtml = r.shared_with && r.shared_with.length > 0 
                ? r.shared_with.map(d => `<span class="px-2 py-1 bg-brand-light/40 rounded-full text-xs text-slate-600 border border-brand-border">${d}</span>`).join('')
                : '<span class="text-xs text-slate-400">Not shared with anyone</span>';

            const attachmentsHtml = r.attachments && r.attachments.length > 0
                ? r.attachments.map(a => `
                    <div class="flex items-center gap-2 p-2 bg-slate-50 rounded-lg border border-slate-200">
                        <i class="fa-solid fa-paperclip text-slate-400"></i>
                        <span class="text-xs text-slate-600">${a}</span>
                        <button class="ml-auto text-xs text-brand-medium hover:text-brand-dark transition">
                            <i class="fa-solid fa-download"></i>
                        </button>
                    </div>
                `).join('')
                : '<span class="text-xs text-slate-400">No attachments</span>';

            document.getElementById('recordDetailsContent').innerHTML = `
                <div class="space-y-4">
                    <div class="flex items-center gap-4 pb-4 border-b border-slate-200">
                        <div class="w-14 h-14 rounded-full bg-brand-light border border-brand-border flex items-center justify-center text-brand-dark font-bold text-lg flex-shrink-0">
                            ${r.patient_avatar}
                        </div>
                        <div>
                            <h4 class="text-lg font-bold text-slate-900">${r.patient_name}</h4>
                            <p class="text-sm text-slate-500">${r.title}</p>
                            <span class="inline-block px-2 py-0.5 rounded-full text-xs font-semibold mt-1 ${r.status === 'completed' ? 'bg-emerald-100 text-emerald-700' : 'bg-amber-100 text-amber-700'}">
                                ${r.status.toUpperCase()}
                            </span>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div><p class="text-xs text-slate-400 font-semibold">Type</p><p class="text-sm text-slate-800 capitalize">${r.record_type}</p></div>
                        <div><p class="text-xs text-slate-400 font-semibold">Date</p><p class="text-sm text-slate-800">${new Date(r.date).toLocaleDateString('en-US', { month: 'long', day: 'numeric', year: 'numeric' })}</p></div>
                        <div><p class="text-xs text-slate-400 font-semibold">Doctor</p><p class="text-sm text-slate-800">${r.doctor}</p></div>
                        <div><p class="text-xs text-slate-400 font-semibold">Status</p><p class="text-sm text-slate-800 capitalize">${r.status}</p></div>
                    </div>
                    <div class="bg-slate-50 rounded-xl p-4 border border-slate-200">
                        <h5 class="text-sm font-bold text-slate-700 mb-2">Description</h5>
                        <p class="text-sm text-slate-800">${r.description}</p>
                    </div>
                    <div class="bg-brand-light/40 rounded-xl p-4 border border-brand-border">
                        <h5 class="text-sm font-bold text-slate-700 mb-2">
                            <i class="fa-solid fa-share-nodes mr-1"></i> Shared With
                        </h5>
                        <div class="flex flex-wrap gap-2">${sharedHtml}</div>
                    </div>
                    <div class="bg-slate-50 rounded-xl p-4 border border-slate-200">
                        <h5 class="text-sm font-bold text-slate-700 mb-2">
                            <i class="fa-solid fa-paperclip mr-1"></i> Attachments
                        </h5>
                        <div class="space-y-2">${attachmentsHtml}</div>
                    </div>
                    <div class="flex justify-end gap-2 pt-2 border-t border-slate-200">
                        <button onclick="closeModal('viewRecordModal')" 
                                class="px-4 py-2 bg-white border border-slate-200 text-slate-600 rounded-lg hover:bg-slate-50 transition text-sm font-semibold">
                            Close
                        </button>
                        <button onclick="closeModal('viewRecordModal'); editRecord(${r.id})"
                                class="px-4 py-2 bg-brand-dark text-white rounded-lg hover:bg-brand-medium transition text-sm font-semibold">
                            <i class="fa-solid fa-pen mr-1.5"></i> Edit Record
                        </button>
                    </div>
                </div>
            `;
        }, 300);
    }

    // ============================================================
    // EDIT RECORD
    // ============================================================
    function editRecord(id) {
        showToast('Edit record ID: ' + id + ' (Edit modal coming soon)', 'info');
    }

    // ============================================================
    // SHARE RECORD
    // ============================================================
    let shareRecordId = null;

    function shareRecord(id) {
        shareRecordId = id;
        const r = RECORDS[id];
        if (!r) return;

        document.getElementById('sharePatientName').textContent = r.patient_name;
        document.getElementById('shareRecordTitle').textContent = r.title;
        document.getElementById('shareWithInput').value = '';

        // Load existing shared doctors
        const list = document.getElementById('shareDoctorsList');
        if (r.shared_with && r.shared_with.length > 0) {
            list.innerHTML = r.shared_with.map(d => `
                <span class="px-2 py-1 bg-brand-light/40 rounded-full text-xs text-slate-600 border border-brand-border">
                    ${d}
                    <button onclick="removeShareDoctor('${d}')" class="ml-1 text-slate-400 hover:text-rose-500">✕</button>
                </span>
            `).join('');
        } else {
            list.innerHTML = '<span class="text-xs text-slate-400">No doctors added yet</span>';
        }

        openModal('shareRecordModal');
    }

    function addShareDoctor() {
        const input = document.getElementById('shareWithInput');
        const name = input.value.trim();
        if (!name) return;

        const list = document.getElementById('shareDoctorsList');
        const existing = list.textContent;
        if (existing.includes(name)) {
            showToast('Doctor already added', 'warning');
            return;
        }

        const span = document.createElement('span');
        span.className = 'px-2 py-1 bg-brand-light/40 rounded-full text-xs text-slate-600 border border-brand-border';
        span.innerHTML = `${name} <button onclick="this.parentElement.remove()" class="ml-1 text-slate-400 hover:text-rose-500">✕</button>`;
        list.appendChild(span);
        input.value = '';
    }

    function removeShareDoctor(name) {
        const list = document.getElementById('shareDoctorsList');
        const items = list.querySelectorAll('span');
        items.forEach(item => {
            if (item.textContent.includes(name)) {
                item.remove();
            }
        });
    }

    function confirmShareRecord() {
        const list = document.getElementById('shareDoctorsList');
        const doctors = [];
        list.querySelectorAll('span').forEach(item => {
            const text = item.textContent.replace('✕', '').trim();
            if (text && !text.includes('No doctors')) {
                doctors.push(text);
            }
        });

        if (doctors.length === 0) {
            showToast('Please add at least one doctor to share with', 'warning');
            return;
        }

        const r = RECORDS[shareRecordId];
        if (r) {
            r.shared_with = doctors;
            showToast('Record shared with ' + doctors.length + ' doctor(s)', 'success');
        }

        closeModal('shareRecordModal');
    }

    // ============================================================
    // ADD RECORD
    // ============================================================
    function saveNewRecord(event) {
        event.preventDefault();
        showToast('Medical record added successfully!', 'success');
        closeModal('addRecordModal');
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
    // SEARCH & FILTER
    // ============================================================
    document.getElementById('searchRecord').addEventListener('input', filterRecords);
    document.getElementById('filterPatient').addEventListener('change', filterRecords);
    document.getElementById('filterType').addEventListener('change', filterRecords);
    document.getElementById('filterStatus').addEventListener('change', filterRecords);

    function filterRecords() {
        const search = document.getElementById('searchRecord').value.toLowerCase();
        const patient = document.getElementById('filterPatient').value.toLowerCase();
        const type = document.getElementById('filterType').value.toLowerCase();
        const status = document.getElementById('filterStatus').value.toLowerCase();
        let visibleCount = 0;

        document.querySelectorAll('.record-card').forEach(card => {
            const cardPatient = card.dataset.patient;
            const cardTitle = card.dataset.title;
            const cardType = card.dataset.type;
            const cardStatus = card.dataset.status;

            const matchesSearch = cardPatient.includes(search) || cardTitle.includes(search);
            const matchesPatient = !patient || cardPatient === patient;
            const matchesType = !type || cardType === type;
            const matchesStatus = !status || cardStatus === status;
            const isVisible = matchesSearch && matchesPatient && matchesType && matchesStatus;

            card.style.display = isVisible ? '' : 'none';
            if (isVisible) visibleCount++;
        });

        document.getElementById('emptyState').style.display = visibleCount === 0 ? 'flex' : 'none';
    }

    function resetFilters() {
        document.getElementById('searchRecord').value = '';
        document.getElementById('filterPatient').value = '';
        document.getElementById('filterType').value = '';
        document.getElementById('filterStatus').value = '';
        document.querySelectorAll('.record-card').forEach(card => card.style.display = '');
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