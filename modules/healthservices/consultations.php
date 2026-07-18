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


// Sample Consultation Data (Linked to patients)
$consultations = [
    [
        'id' => 1,
        'consultation_id' => 'C-001',
        'patient_id' => 1,  // Matches Maria Santos (P-1001)
        'patient_name' => 'Maria Santos',
        'patient_avatar' => 'MS',
        'doctor_name' => 'Dr. Elena Santos',
        'date' => '2026-07-15',
        'time' => '09:30 AM',
        'diagnosis' => 'Hypertension - Stage 1',
        'icd_code' => 'I10',
        'treatment' => 'Continue Amlodipine 5mg daily',
        'follow_up' => '2026-08-15',
        'status' => 'completed',
        'documents' => [
            ['name' => 'BP_Reading_July2026.pdf', 'type' => 'pdf', 'size' => '245 KB'],
            ['name' => 'ECG_Results.jpg', 'type' => 'image', 'size' => '1.2 MB'],
        ]
    ],
    [
        'id' => 2,
        'consultation_id' => 'C-002',
        'patient_id' => 2,  // Matches Juan Dela Cruz (P-1002)
        'patient_name' => 'Juan Dela Cruz',
        'patient_avatar' => 'JD',
        'doctor_name' => 'Dr. Miguel Reyes',
        'date' => '2026-07-14',
        'time' => '10:00 AM',
        'diagnosis' => 'Diabetes Type 2 - Uncontrolled',
        'icd_code' => 'E11.9',
        'treatment' => 'Adjust Metformin dosage to 1000mg twice daily',
        'follow_up' => '2026-07-28',
        'status' => 'completed',
        'documents' => [
            ['name' => 'Blood_Sugar_Log.xlsx', 'type' => 'excel', 'size' => '856 KB'],
            ['name' => 'Prescription_Refill.jpg', 'type' => 'image', 'size' => '512 KB'],
        ]
    ],
    [
        'id' => 3,
        'consultation_id' => 'C-003',
        'patient_id' => 3,  // Matches Rosa Mendoza (P-1003)
        'patient_name' => 'Rosa Mendoza',
        'patient_avatar' => 'RM',
        'doctor_name' => 'Dr. Ana Cruz',
        'date' => '2026-07-13',
        'time' => '02:00 PM',
        'diagnosis' => 'Asthma Exacerbation',
        'icd_code' => 'J45.901',
        'treatment' => 'Inhaled corticosteroids + Bronchodilator',
        'follow_up' => '2026-07-20',
        'status' => 'completed',
        'documents' => [
            ['name' => 'Spirometry_Results.pdf', 'type' => 'pdf', 'size' => '1.8 MB'],
        ]
    ],
    [
        'id' => 4,
        'consultation_id' => 'C-004',
        'patient_id' => 4,  // Matches Carlos Lim (P-1004)
        'patient_name' => 'Carlos Lim',
        'patient_avatar' => 'CL',
        'doctor_name' => 'Dr. Elena Santos',
        'date' => '2026-07-12',
        'time' => '11:30 AM',
        'diagnosis' => 'Heart Disease - Follow-up',
        'icd_code' => 'I25.10',
        'treatment' => 'Continue medications. Schedule ECG.',
        'follow_up' => '2026-08-12',
        'status' => 'completed',
        'documents' => [
            ['name' => 'Cardiology_Report.pdf', 'type' => 'pdf', 'size' => '3.2 MB'],
            ['name' => 'Echo_Cardiogram.jpg', 'type' => 'image', 'size' => '2.4 MB'],
            ['name' => 'Medication_List.xlsx', 'type' => 'excel', 'size' => '124 KB'],
        ]
    ],
    [
        'id' => 5,
        'consultation_id' => 'C-005',
        'patient_id' => 5,  // Matches Elena Torres (P-1005)
        'patient_name' => 'Elena Torres',
        'patient_avatar' => 'ET',
        'doctor_name' => 'Dr. Miguel Reyes',
        'date' => '2026-07-11',
        'time' => '09:00 AM',
        'diagnosis' => 'Prenatal Checkup - Normal',
        'icd_code' => 'Z34.00',
        'treatment' => 'Continue prenatal vitamins. Next checkup in 2 weeks.',
        'follow_up' => '2026-07-25',
        'status' => 'completed',
        'documents' => [
            ['name' => 'Ultrasound_Image.jpg', 'type' => 'image', 'size' => '4.5 MB'],
            ['name' => 'Prenatal_Record.pdf', 'type' => 'pdf', 'size' => '678 KB'],
        ]
    ],
    [
        'id' => 6,
        'consultation_id' => 'C-006',
        'patient_id' => 6,  // Matches Miguel Reyes (P-1006)
        'patient_name' => 'Miguel Reyes',
        'patient_avatar' => 'MR',
        'doctor_name' => 'Dr. Ana Cruz',
        'date' => '2026-07-10',
        'time' => '03:00 PM',
        'diagnosis' => 'Hypertension - Follow-up',
        'icd_code' => 'I10',
        'treatment' => 'Adjust medication. Monitor BP daily.',
        'follow_up' => '2026-07-24',
        'status' => 'follow_up_needed',
        'documents' => [
            ['name' => 'BP_Monitoring_Log.xlsx', 'type' => 'excel', 'size' => '234 KB'],
        ]
    ],
    [
        'id' => 7,
        'consultation_id' => 'C-007',
        'patient_id' => 7,  // Matches Ana Cruz (P-1007)
        'patient_name' => 'Ana Cruz',
        'patient_avatar' => 'AC',
        'doctor_name' => 'Dr. Elena Santos',
        'date' => '2026-07-09',
        'time' => '08:30 AM',
        'diagnosis' => 'Annual Physical - Healthy',
        'icd_code' => 'Z00.00',
        'treatment' => 'No treatment needed. Maintain healthy lifestyle.',
        'follow_up' => '2027-07-09',
        'status' => 'completed',
        'documents' => [
            ['name' => 'Lab_Results.pdf', 'type' => 'pdf', 'size' => '1.5 MB'],
        ]
    ],
    [
        'id' => 8,
        'consultation_id' => 'C-008',
        'patient_id' => 8,  // Matches Ramon Garcia (P-1008)
        'patient_name' => 'Ramon Garcia',
        'patient_avatar' => 'RG',
        'doctor_name' => 'Dr. Miguel Reyes',
        'date' => '2026-07-08',
        'time' => '01:00 PM',
        'diagnosis' => 'Arthritis - Flare-up',
        'icd_code' => 'M19.90',
        'treatment' => 'Prescribed NSAIDs. Physical therapy referral.',
        'follow_up' => '2026-07-22',
        'status' => 'pending',
        'documents' => [
            ['name' => 'XRay_Results.jpg', 'type' => 'image', 'size' => '3.8 MB'],
            ['name' => 'Physical_Therapy_Plan.pdf', 'type' => 'pdf', 'size' => '456 KB'],
        ]
    ],
];

// Pagination
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$limit = 6;
$offset = ($page - 1) * $limit;
$totalConsultations = count($consultations);
$totalPages = ceil($totalConsultations / $limit);
$paginatedConsultations = array_slice($consultations, $offset, $limit);

$title = 'Consultations';

// Derived stats
$completedCount = count(array_filter($consultations, fn($c) => $c['status'] === 'completed'));
$pendingCount = count(array_filter($consultations, fn($c) => $c['status'] === 'pending' || $c['status'] === 'follow_up_needed'));
$todayConsultations = rand(0, 3);
?>

<!-- ============================================================ -->
<!-- 2. HTML + PHP EMBEDDED + Tailwind CSS                       -->
<!-- ============================================================ -->

<div class="flex-1 px-6 pt-[26px] pb-20 mb-10 flex flex-col min-h-0 overflow-hidden">

    <!-- Page Header -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6">
        <div>
            <h2 class="text-2xl font-black text-slate-900 tracking-tight">Consultations</h2>
            <p class="text-sm text-slate-500 mt-0.5">View and manage all patient consultations</p>
        </div>
        <div class="flex gap-3">
            <button onclick="openModal('addConsultationModal')"
                    class="px-4 py-2 bg-brand-dark text-white rounded-lg hover:bg-brand-medium transition-colors text-sm font-semibold flex items-center gap-2 shadow-sm">
                <i class="fa-solid fa-plus text-xs"></i> New Consultation
            </button>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-4">
        <div class="bg-white rounded-xl shadow-xs p-4 border border-slate-200 flex items-center gap-3">
            <div class="w-11 h-11 rounded-lg bg-brand-light border border-brand-border flex items-center justify-center flex-shrink-0">
                <i class="fa-solid fa-stethoscope text-brand-dark"></i>
            </div>
            <div>
                <p class="text-xs text-slate-500 font-semibold uppercase tracking-wide">Total Consultations</p>
                <p class="text-xl font-bold text-slate-900"><?php echo $totalConsultations; ?></p>
            </div>
        </div>
        <div class="bg-white rounded-xl shadow-xs p-4 border border-slate-200 flex items-center gap-3">
            <div class="w-11 h-11 rounded-lg bg-emerald-50 border border-emerald-100 flex items-center justify-center flex-shrink-0">
                <i class="fa-solid fa-check-circle text-emerald-600"></i>
            </div>
            <div>
                <p class="text-xs text-slate-500 font-semibold uppercase tracking-wide">Completed</p>
                <p class="text-xl font-bold text-slate-900"><?php echo $completedCount; ?></p>
            </div>
        </div>
        <div class="bg-white rounded-xl shadow-xs p-4 border border-slate-200 flex items-center gap-3">
            <div class="w-11 h-11 rounded-lg bg-amber-50 border border-amber-100 flex items-center justify-center flex-shrink-0">
                <i class="fa-solid fa-clock text-amber-600"></i>
            </div>
            <div>
                <p class="text-xs text-slate-500 font-semibold uppercase tracking-wide">Follow-up Needed</p>
                <p class="text-xl font-bold text-slate-900"><?php echo $pendingCount; ?></p>
            </div>
        </div>
        <div class="bg-white rounded-xl shadow-xs p-4 border border-slate-200 flex items-center gap-3">
            <div class="w-11 h-11 rounded-lg bg-sky-50 border border-sky-100 flex items-center justify-center flex-shrink-0">
                <i class="fa-solid fa-calendar-day text-sky-600"></i>
            </div>
            <div>
                <p class="text-xs text-slate-500 font-semibold uppercase tracking-wide">Today's Consultations</p>
                <p class="text-xl font-bold text-slate-900"><?php echo $todayConsultations; ?></p>
            </div>
        </div>
    </div>

    <!-- Search & Filter WITH DATE FILTER -->
    <div class="bg-white rounded-xl shadow-xs p-4 border border-slate-200 mb-6">
        <div class="flex flex-col gap-3">
            <!-- Row 1: Search + Status + Doctor -->
            <div class="flex flex-col sm:flex-row gap-3">
                <div class="flex-1 relative">
                    <i class="fa-solid fa-search absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-sm"></i>
                    <input type="text"
                           id="searchConsultation"
                           placeholder="Search by patient name, ID, or diagnosis..."
                           class="w-full pl-9 pr-4 py-2 border border-slate-200 rounded-lg focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none text-sm transition">
                </div>
                <div class="flex gap-2 flex-wrap">
                    <select id="filterStatus" class="px-4 py-2 border border-slate-200 rounded-lg focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none text-sm bg-white">
                        <option value="">All Status</option>
                        <option value="completed">Completed</option>
                        <option value="pending">Pending</option>
                        <option value="follow_up_needed">Follow-up Needed</option>
                    </select>
                    <select id="filterDoctor" class="px-4 py-2 border border-slate-200 rounded-lg focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none text-sm bg-white">
                        <option value="">All Doctors</option>
                        <option value="Dr. Elena Santos">Dr. Elena Santos</option>
                        <option value="Dr. Miguel Reyes">Dr. Miguel Reyes</option>
                        <option value="Dr. Ana Cruz">Dr. Ana Cruz</option>
                    </select>
                    <button onclick="resetFilters()" title="Reset filters"
                            class="px-3 py-2 bg-slate-100 text-slate-500 rounded-lg hover:bg-slate-200 hover:text-slate-700 transition-colors text-sm">
                        <i class="fa-solid fa-rotate-right"></i>
                    </button>
                </div>
            </div>
            <!-- Row 2: Date Range Filters -->
            <div class="flex flex-wrap items-center gap-2 pt-2 border-t border-slate-100">
                <span class="text-xs font-semibold text-slate-500 uppercase tracking-wide mr-1">Consultation Date:</span>
                
                <button onclick="setDateFilter('today')" 
                        class="date-filter-btn px-3 py-1.5 text-xs rounded-lg border border-slate-200 text-slate-600 hover:bg-brand-light/40 hover:border-brand-medium transition-all">
                    <i class="fa-solid fa-calendar-day mr-1"></i> Today
                </button>
                
                <button onclick="setDateFilter('week')" 
                        class="date-filter-btn px-3 py-1.5 text-xs rounded-lg border border-slate-200 text-slate-600 hover:bg-brand-light/40 hover:border-brand-medium transition-all">
                    <i class="fa-solid fa-calendar-week mr-1"></i> This Week
                </button>
                
                <button onclick="setDateFilter('month')" 
                        class="date-filter-btn px-3 py-1.5 text-xs rounded-lg border border-slate-200 text-slate-600 hover:bg-brand-light/40 hover:border-brand-medium transition-all">
                    <i class="fa-solid fa-calendar mr-1"></i> This Month
                </button>
                
                <button onclick="setDateFilter('year')" 
                        class="date-filter-btn px-3 py-1.5 text-xs rounded-lg border border-slate-200 text-slate-600 hover:bg-brand-light/40 hover:border-brand-medium transition-all">
                    <i class="fa-solid fa-calendar-year mr-1"></i> This Year
                </button>
                
                <button onclick="setDateFilter('all')" 
                        class="date-filter-btn px-3 py-1.5 text-xs rounded-lg border border-slate-200 text-slate-400 hover:bg-slate-100 transition-all">
                    <i class="fa-solid fa-times mr-1"></i> All
                </button>
                
                <span id="activeDateFilter" class="text-xs text-brand-medium font-semibold hidden">
                    <i class="fa-solid fa-filter mr-1"></i> <span id="activeDateFilterLabel">Today</span>
                </span>
            </div>
        </div>
    </div>

    <!-- Consultations Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4" id="consultationGrid">
        <?php foreach ($paginatedConsultations as $consultation): ?>
        <div class="consultation-card bg-white rounded-xl shadow-xs border border-slate-200 p-4 hover:shadow-md transition-all duration-200"
             data-patient="<?php echo strtolower($consultation['patient_name']); ?>"
             data-doctor="<?php echo strtolower($consultation['doctor_name']); ?>"
             data-diagnosis="<?php echo strtolower($consultation['diagnosis']); ?>"
             data-status="<?php echo $consultation['status']; ?>"
             data-date="<?php echo $consultation['date']; ?>">
            
            <!-- Header -->
            <div class="flex items-center justify-between mb-3">
                <div class="flex items-center gap-2.5">
                    <div class="w-9 h-9 rounded-full bg-brand-light border border-brand-border flex items-center justify-center text-brand-dark font-bold text-xs flex-shrink-0">
                        <?php echo $consultation['patient_avatar']; ?>
                    </div>
                    <div>
                        <p class="font-semibold text-slate-800 text-sm"><?php echo $consultation['patient_name']; ?></p>
                        <p class="text-xs text-slate-400"><?php echo $consultation['consultation_id']; ?></p>
                    </div>
                </div>
                <span class="px-2 py-1 rounded-full text-xs font-semibold <?php 
                    echo $consultation['status'] === 'completed' ? 'bg-emerald-100 text-emerald-700' : 
                        ($consultation['status'] === 'pending' ? 'bg-amber-100 text-amber-700' : 
                        'bg-rose-100 text-rose-700'); 
                ?>">
                    <?php echo str_replace('_', ' ', ucfirst($consultation['status'])); ?>
                </span>
            </div>
            
            <!-- Details -->
            <div class="space-y-2 text-sm">
                <div class="flex justify-between">
                    <span class="text-slate-500">Doctor</span>
                    <span class="text-slate-800 font-medium"><?php echo $consultation['doctor_name']; ?></span>
                </div>
                <div class="flex justify-between">
                    <span class="text-slate-500">Date</span>
                    <span class="text-slate-800"><?php echo date('M d, Y', strtotime($consultation['date'])); ?></span>
                </div>
                <div class="flex justify-between">
                    <span class="text-slate-500">Time</span>
                    <span class="text-slate-800"><?php echo $consultation['time']; ?></span>
                </div>
                <div class="flex justify-between">
                    <span class="text-slate-500">ICD-10</span>
                    <span class="text-slate-800 font-mono text-xs"><?php echo $consultation['icd_code']; ?></span>
                </div>
            </div>
            
            <!-- Diagnosis -->
            <div class="mt-3 pt-3 border-t border-slate-100">
                <p class="text-xs text-slate-500 font-semibold uppercase tracking-wide">Diagnosis</p>
                <p class="text-sm text-slate-800 font-medium"><?php echo $consultation['diagnosis']; ?></p>
            </div>
            
            <!-- Treatment -->
            <div class="mt-2">
                <p class="text-xs text-slate-500 font-semibold uppercase tracking-wide">Treatment</p>
                <p class="text-xs text-slate-600 line-clamp-2"><?php echo $consultation['treatment']; ?></p>
            </div>
            
            <!-- Actions -->
            <div class="mt-3 pt-3 border-t border-slate-100 flex justify-end gap-2">
                <button onclick="viewConsultation(<?php echo $consultation['id']; ?>)"
                        class="px-3 py-1.5 text-xs font-semibold text-brand-medium hover:bg-brand-light rounded-lg transition">
                    <i class="fa-solid fa-eye mr-1"></i> View
                </button>
                <button onclick="editConsultation(<?php echo $consultation['id']; ?>)"
                        class="px-3 py-1.5 text-xs font-semibold text-slate-500 hover:bg-slate-100 rounded-lg transition">
                    <i class="fa-solid fa-pen mr-1"></i> Edit
                </button>
                <!-- ✅ FIXED: Goes to specific patient -->
                <a href="patients.php?patient=<?php echo $consultation['patient_id']; ?>" 
                   class="px-3 py-1.5 text-xs font-semibold text-emerald-600 hover:bg-emerald-50 rounded-lg transition" title="View Patient Record">
                    <i class="fa-solid fa-user mr-1"></i> Patient
                </a>
            </div>
        </div>
        <?php endforeach; ?>
    </div>

    <!-- Empty state -->
    <div id="emptyState" class="hidden flex-col items-center justify-center py-14 text-center">
        <div class="w-12 h-12 rounded-full bg-slate-100 flex items-center justify-center mb-3">
            <i class="fa-solid fa-stethoscope text-slate-400"></i>
        </div>
        <p class="text-sm font-semibold text-slate-600">No consultations match your filters</p>
        <p class="text-xs text-slate-400 mt-1">Try adjusting your search or clearing filters</p>
        <button onclick="resetFilters()" class="mt-3 text-xs font-semibold text-brand-medium hover:text-brand-dark">Clear all filters</button>
    </div>

    <!-- Pagination -->
    <div class="mt-4 px-4 py-3 border-t border-slate-200 flex flex-col sm:flex-row justify-between items-center gap-3 bg-white rounded-xl shadow-xs border border-slate-200">
        <p class="text-xs text-slate-500">
            Showing <span class="font-semibold text-slate-700"><?php echo $offset + 1; ?></span> to
            <span class="font-semibold text-slate-700"><?php echo min($offset + $limit, $totalConsultations); ?></span> of
            <span class="font-semibold text-slate-700"><?php echo $totalConsultations; ?></span> consultations
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
<!-- VIEW CONSULTATION MODAL (WITH DOCUMENTS/IMAGES)              -->
<!-- ============================================================ -->
<div id="viewConsultationModal" class="hidden fixed inset-0 bg-slate-900/50 backdrop-blur-sm z-50 items-center justify-center p-4">
    <div class="bg-white rounded-2xl shadow-xl w-full max-w-3xl max-h-[90vh] overflow-y-auto">
        <div class="flex items-center justify-between px-6 py-4 border-b border-slate-200 sticky top-0 bg-white rounded-t-2xl">
            <h3 class="font-bold text-slate-900">Consultation Details</h3>
            <button onclick="closeModal('viewConsultationModal')" class="w-8 h-8 rounded-lg hover:bg-slate-100 flex items-center justify-center text-slate-400 hover:text-slate-600 transition">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>
        <div id="consultationDetailsContent" class="p-6">
            <div class="flex items-center justify-center py-10 text-slate-400 text-sm">
                <i class="fa-solid fa-spinner fa-spin mr-2"></i> Loading...
            </div>
        </div>
    </div>
</div>

<!-- Document/Image Viewer Modal -->
<div id="documentViewerModal" class="hidden fixed inset-0 bg-slate-900/90 backdrop-blur-md z-[70] items-center justify-center p-4">
    <div class="relative w-full max-w-4xl max-h-[90vh]">
        <button onclick="closeDocumentViewer()" 
                class="absolute -top-12 right-0 text-white hover:text-slate-300 transition text-3xl">
            <i class="fa-solid fa-xmark"></i>
        </button>
        <div id="documentViewerContent" class="bg-white rounded-2xl overflow-hidden shadow-2xl max-h-[85vh]">
            <div class="flex items-center justify-between px-6 py-3 border-b border-slate-200 bg-white">
                <h4 id="documentViewerTitle" class="font-semibold text-slate-800">Document</h4>
                <button onclick="closeDocumentViewer()" class="w-8 h-8 rounded-lg hover:bg-slate-100 flex items-center justify-center text-slate-400 hover:text-slate-600 transition">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
            <div id="documentViewerBody" class="p-4 bg-slate-50 flex items-center justify-center min-h-[400px]">
                <!-- Document content loaded by JavaScript -->
            </div>
        </div>
    </div>
</div>
<!-- ============================================================ -->
<!-- EDIT CONSULTATION MODAL                                      -->
<!-- ============================================================ -->
<div id="editConsultationModal" class="hidden fixed inset-0 bg-slate-900/50 backdrop-blur-sm z-50 items-center justify-center p-4">
    <div class="bg-white rounded-2xl shadow-xl w-full max-w-2xl max-h-[90vh] overflow-y-auto">
        <div class="flex items-center justify-between px-6 py-4 border-b border-slate-200 sticky top-0 bg-white rounded-t-2xl">
            <h3 class="font-bold text-slate-900">Edit Consultation</h3>
            <button onclick="closeModal('editConsultationModal')" class="w-8 h-8 rounded-lg hover:bg-slate-100 flex items-center justify-center text-slate-400 hover:text-slate-600 transition">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>
        <form id="editConsultationForm" class="p-6 space-y-4" onsubmit="saveEditedConsultation(event)">
            <input type="hidden" id="edit_consultation_id">

            <!-- Patient (Read-only) -->
            <div>
                <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">Patient</label>
                <input type="text" id="edit_patient_name" readonly
                       class="w-full px-3 py-2 bg-slate-50 border border-slate-200 rounded-lg text-sm text-slate-600 outline-none cursor-not-allowed">
            </div>
            
            <!-- Doctor -->
            <div>
                <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">Doctor</label>
                <select id="edit_doctor" required class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm bg-white focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none">
                    <option value="Dr. Elena Santos">Dr. Elena Santos</option>
                    <option value="Dr. Miguel Reyes">Dr. Miguel Reyes</option>
                    <option value="Dr. Ana Cruz">Dr. Ana Cruz</option>
                </select>
            </div>
            
            <!-- Date & Time -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">Date</label>
                    <input type="date" id="edit_date" required class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">Time</label>
                    <input type="time" id="edit_time" required class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none">
                </div>
            </div>
            
            <!-- Diagnosis -->
            <div>
                <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">Diagnosis</label>
                <input type="text" id="edit_diagnosis" required class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none">
            </div>
            
            <!-- ICD-10 Code -->
            <div>
                <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">ICD-10 Code</label>
                <input type="text" id="edit_icd_code" placeholder="e.g. I10, E11.9" class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none">
            </div>
            
            <!-- Treatment Plan -->
            <div>
                <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">Treatment Plan</label>
                <textarea id="edit_treatment" rows="2" class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none"></textarea>
            </div>
            
            <!-- Follow-up Date -->
            <div>
                <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">Follow-up Date</label>
                <input type="date" id="edit_follow_up" class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none">
            </div>
            
            <!-- Status -->
            <div>
                <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">Status</label>
                <select id="edit_status" class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm bg-white focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none">
                    <option value="completed">Completed</option>
                    <option value="pending">Pending</option>
                    <option value="follow_up_needed">Follow-up Needed</option>
                </select>
            </div>

            <!-- ============================================================ -->
            <!-- DOCUMENTS SECTION                                           -->
            <!-- ============================================================ -->
            <div class="border-t border-slate-200 pt-4">
                <div class="flex items-center justify-between mb-3">
                    <label class="text-xs font-semibold text-slate-500 uppercase tracking-wide">📎 Documents</label>
                    <button type="button" onclick="document.getElementById('edit_document_upload').click()"
                            class="px-3 py-1.5 text-xs font-semibold text-brand-medium hover:bg-brand-light rounded-lg transition border border-brand-border">
                        <i class="fa-solid fa-plus mr-1"></i> Add Document
                    </button>
                    <input type="file" id="edit_document_upload" class="hidden" accept=".pdf,.jpg,.jpeg,.png,.gif,.webp,.xls,.xlsx" onchange="addEditDocument()">
                </div>
                
                <!-- Documents List -->
                <div id="editDocumentsList" class="space-y-2 max-h-40 overflow-y-auto">
                    <div class="text-center py-4 text-slate-400 text-xs">
                        <i class="fa-solid fa-file-circle-plus text-2xl block mb-1"></i>
                        No documents attached
                    </div>
                </div>
                
                <p class="text-[10px] text-slate-400 mt-2">
                    <i class="fa-solid fa-info-circle mr-1"></i>
                    Supported: Images (JPG, PNG, GIF, WebP), PDF, Excel files. Max 5MB each.
                </p>
            </div>

            <!-- Actions -->
            <div class="flex justify-end gap-2 pt-2 border-t border-slate-100">
                <button type="button" onclick="closeModal('editConsultationModal')"
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
<!-- ADD CONSULTATION MODAL                                       -->
<!-- ============================================================ -->
<div id="addConsultationModal" class="hidden fixed inset-0 bg-slate-900/50 backdrop-blur-sm z-50 items-center justify-center p-4">
    <div class="bg-white rounded-2xl shadow-xl w-full max-w-2xl max-h-[90vh] overflow-y-auto">
        <div class="flex items-center justify-between px-6 py-4 border-b border-slate-200 sticky top-0 bg-white rounded-t-2xl">
            <h3 class="font-bold text-slate-900">New Consultation</h3>
            <button onclick="closeModal('addConsultationModal')" class="w-8 h-8 rounded-lg hover:bg-slate-100 flex items-center justify-center text-slate-400 hover:text-slate-600 transition">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>
        <form id="addConsultationForm" class="p-6 space-y-4" onsubmit="saveNewConsultation(event)">
            <div>
                <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">Patient</label>
                <select id="add_patient_id" required class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm bg-white focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none">
                    <option value="">Select Patient</option>
                    <?php foreach ($patients ?? [] as $p): ?>
                        <option value="<?php echo $p['id']; ?>"><?php echo $p['first_name'] . ' ' . $p['last_name']; ?> (<?php echo $p['patient_id']; ?>)</option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div>
                <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">Doctor</label>
                <select id="add_doctor" required class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm bg-white focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none">
                    <option value="Dr. Elena Santos">Dr. Elena Santos</option>
                    <option value="Dr. Miguel Reyes">Dr. Miguel Reyes</option>
                    <option value="Dr. Ana Cruz">Dr. Ana Cruz</option>
                </select>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">Date</label>
                    <input type="date" id="add_date" required class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">Time</label>
                    <input type="time" id="add_time" required class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none">
                </div>
            </div>
            <div>
                <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">Diagnosis</label>
                <input type="text" id="add_diagnosis" required class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none">
            </div>
            <div>
                <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">ICD-10 Code</label>
                <input type="text" id="add_icd_code" placeholder="e.g. I10, E11.9" class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none">
            </div>
            <div>
                <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">Treatment Plan</label>
                <textarea id="add_treatment" rows="2" class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none"></textarea>
            </div>
            <div>
                <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">Follow-up Date</label>
                <input type="date" id="add_follow_up" class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none">
            </div>
            <div>
                <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">Status</label>
                <select id="add_status" class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm bg-white focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none">
                    <option value="completed">Completed</option>
                    <option value="pending">Pending</option>
                    <option value="follow_up_needed">Follow-up Needed</option>
                </select>
            </div>

            <div class="flex justify-end gap-2 pt-2 border-t border-slate-100">
                <button type="button" onclick="closeModal('addConsultationModal')"
                        class="px-4 py-2 bg-white border border-slate-200 text-slate-600 rounded-lg hover:bg-slate-50 transition text-sm font-semibold">
                    Cancel
                </button>
                <button type="submit"
                        class="px-4 py-2 bg-brand-dark text-white rounded-lg hover:bg-brand-medium transition text-sm font-semibold">
                    <i class="fa-solid fa-plus mr-1.5"></i> Add Consultation
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
<!-- 3. CSS STYLES                                                -->
<!-- ============================================================ -->
<style>
    .date-filter-btn.active {
        background-color: #14807A;
        border-color: #14807A;
        color: white;
    }
    .date-filter-btn.active:hover {
        background-color: #0B4F4A;
        border-color: #0B4F4A;
        color: white;
    }
    .document-preview-img {
        max-height: 500px;
        object-fit: contain;
    }
</style>

<!-- ============================================================ -->
<!-- 4. JAVASCRIPT                                                -->
<!-- ============================================================ -->
<script>
    const CONSULTATIONS = <?php echo json_encode(array_column($consultations, null, 'id'), JSON_PRETTY_PRINT); ?>;
    let activeDateFilter = 'all';

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
    // DATE FILTER FUNCTIONS
    // ============================================================
    function setDateFilter(range) {
        activeDateFilter = range;
        
        document.querySelectorAll('.date-filter-btn').forEach(btn => {
            btn.classList.remove('active');
        });
        
        const indicator = document.getElementById('activeDateFilter');
        const label = document.getElementById('activeDateFilterLabel');
        
        if (range === 'all') {
            indicator.classList.add('hidden');
        } else {
            document.querySelectorAll('.date-filter-btn').forEach(btn => {
                const btnText = btn.textContent.trim().toLowerCase();
                if ((range === 'today' && btnText.includes('today')) ||
                    (range === 'week' && btnText.includes('week')) ||
                    (range === 'month' && btnText.includes('month')) ||
                    (range === 'year' && btnText.includes('year'))) {
                    btn.classList.add('active');
                }
            });
            
            const labels = {
                'today': 'Today',
                'week': 'This Week',
                'month': 'This Month',
                'year': 'This Year'
            };
            label.textContent = labels[range] || range;
            indicator.classList.remove('hidden');
        }
        
        filterConsultations();
    }

    function matchesDateFilter(consultationDate, range) {
        if (!range || range === 'all') return true;
        if (!consultationDate) return false;

        const date = new Date(consultationDate + 'T00:00:00');
        const today = new Date();
        today.setHours(0, 0, 0, 0);
        
        // Get start of week (Monday)
        const startOfWeek = new Date(today);
        const day = startOfWeek.getDay();
        const diff = startOfWeek.getDate() - day + (day === 0 ? -6 : 1);
        startOfWeek.setDate(diff);
        startOfWeek.setHours(0, 0, 0, 0);
        
        const startOfMonth = new Date(today.getFullYear(), today.getMonth(), 1);
        const startOfYear = new Date(today.getFullYear(), 0, 1);

        switch(range) {
            case 'today':
                return date.getTime() === today.getTime();
            case 'week':
                return date >= startOfWeek && date <= today;
            case 'month':
                return date >= startOfMonth && date <= today;
            case 'year':
                return date >= startOfYear && date <= today;
            default:
                return true;
        }
    }

    // ============================================================
    // VIEW CONSULTATION (WITH DOCUMENTS)
    // ============================================================
    function viewConsultation(id) {
        openModal('viewConsultationModal');
        const c = CONSULTATIONS[id];
        if (!c) return;

        setTimeout(() => {
            let documentsHtml = '';
            if (c.documents && c.documents.length > 0) {
                documentsHtml = `
                    <div class="mt-4 pt-4 border-t border-slate-200">
                        <h5 class="text-sm font-bold text-slate-700 mb-3">📎 Attached Documents</h5>
                        <div class="grid grid-cols-2 md:grid-cols-3 gap-3">
                            ${c.documents.map(doc => {
                                const isImage = doc.type === 'image' || doc.name.match(/\.(jpg|jpeg|png|gif|svg|webp)$/i);
                                const icon = isImage ? 'fa-image' : 
                                            doc.type === 'pdf' ? 'fa-file-pdf' : 
                                            doc.type === 'excel' ? 'fa-file-excel' : 'fa-file';
                                const color = isImage ? 'text-purple-600' : 
                                            doc.type === 'pdf' ? 'text-red-500' : 
                                            doc.type === 'excel' ? 'text-green-600' : 'text-slate-500';
                                return `
                                    <div onclick="viewDocument('${doc.name}', '${isImage ? 'image' : 'file'}', '${doc.size}')"
                                         class="flex items-center gap-2 p-2 bg-slate-50 rounded-lg border border-slate-200 hover:bg-brand-light/40 hover:border-brand-medium cursor-pointer transition">
                                        <i class="fa-solid ${icon} ${color} text-lg"></i>
                                        <div class="flex-1 min-w-0">
                                            <p class="text-xs font-medium text-slate-700 truncate">${doc.name}</p>
                                            <p class="text-[10px] text-slate-400">${doc.size}</p>
                                        </div>
                                        <i class="fa-solid fa-eye text-xs text-slate-400"></i>
                                    </div>
                                `;
                            }).join('')}
                        </div>
                    </div>
                `;
            }

            document.getElementById('consultationDetailsContent').innerHTML = `
                <div class="space-y-4">
                    <div class="flex items-center gap-4 pb-4 border-b border-slate-200">
                        <div class="w-14 h-14 rounded-full bg-brand-light border border-brand-border flex items-center justify-center text-brand-dark font-bold text-lg flex-shrink-0">
                            ${c.patient_avatar}
                        </div>
                        <div>
                            <h4 class="text-lg font-bold text-slate-900">${c.patient_name}</h4>
                            <p class="text-sm text-slate-500">${c.consultation_id} • ${c.doctor_name}</p>
                            <span class="inline-block px-2 py-0.5 rounded-full text-xs font-semibold mt-1 ${c.status === 'completed' ? 'bg-emerald-100 text-emerald-700' : 'bg-amber-100 text-amber-700'}">
                                ${c.status.replace('_', ' ').toUpperCase()}
                            </span>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div><p class="text-xs text-slate-400 font-semibold">Date</p><p class="text-sm text-slate-800">${new Date(c.date).toLocaleDateString('en-US', { month: 'long', day: 'numeric', year: 'numeric' })}</p></div>
                        <div><p class="text-xs text-slate-400 font-semibold">Time</p><p class="text-sm text-slate-800">${c.time}</p></div>
                        <div><p class="text-xs text-slate-400 font-semibold">ICD-10 Code</p><p class="text-sm text-slate-800 font-mono">${c.icd_code}</p></div>
                        <div><p class="text-xs text-slate-400 font-semibold">Follow-up</p><p class="text-sm text-slate-800">${new Date(c.follow_up).toLocaleDateString('en-US', { month: 'long', day: 'numeric', year: 'numeric' })}</p></div>
                    </div>
                    <div class="bg-slate-50 rounded-xl p-4 border border-slate-200">
                        <h5 class="text-sm font-bold text-slate-700 mb-2">Diagnosis</h5>
                        <p class="text-sm text-slate-800">${c.diagnosis}</p>
                    </div>
                    <div class="bg-brand-light/40 rounded-xl p-4 border border-brand-border">
                        <h5 class="text-sm font-bold text-slate-700 mb-2">Treatment Plan</h5>
                        <p class="text-sm text-slate-800">${c.treatment}</p>
                    </div>
                    ${documentsHtml}
                    <div class="flex justify-end gap-2 pt-2">
                        <!-- ✅ FIXED: Goes to specific patient -->
                        <a href="patients.php?patient=${c.patient_id}" class="px-4 py-2 bg-emerald-600 text-white rounded-lg hover:bg-emerald-700 transition text-sm font-semibold">
                            <i class="fa-solid fa-user mr-1.5"></i> View Patient Record
                        </a>
                    </div>
                </div>
            `;
        }, 300);
    }

    // ============================================================
    // DOCUMENT VIEWER
    // ============================================================
    function viewDocument(name, type, size) {
        openModal('documentViewerModal');
        const body = document.getElementById('documentViewerBody');
        const title = document.getElementById('documentViewerTitle');
        title.textContent = name;

        // Simulate document viewing - in production, this would load from server
        if (type === 'image') {
            // For images, show a placeholder with image icon
            body.innerHTML = `
                <div class="flex flex-col items-center justify-center p-10">
                    <div class="w-32 h-32 rounded-2xl bg-brand-light border border-brand-border flex items-center justify-center mb-4">
                        <i class="fa-solid fa-image text-5xl text-brand-medium"></i>
                    </div>
                    <p class="text-sm text-slate-600 font-medium">${name}</p>
                    <p class="text-xs text-slate-400">${size} • Image file</p>
                    <div class="mt-4 p-4 bg-slate-100 rounded-lg border border-dashed border-slate-300 w-full max-w-md text-center">
                        <p class="text-xs text-slate-500">
                            <i class="fa-solid fa-cloud-arrow-up mr-1"></i>
                            Click to view full image or download
                        </p>
                        <button class="mt-2 px-4 py-1.5 bg-brand-dark text-white rounded-lg text-xs hover:bg-brand-medium transition">
                            <i class="fa-solid fa-download mr-1"></i> Download
                        </button>
                    </div>
                </div>
            `;
        } else {
            // For documents (PDF, Excel, etc.)
            body.innerHTML = `
                <div class="flex flex-col items-center justify-center p-10">
                    <div class="w-32 h-32 rounded-2xl bg-slate-100 border border-slate-200 flex items-center justify-center mb-4">
                        <i class="fa-solid fa-file-pdf text-5xl text-red-500"></i>
                    </div>
                    <p class="text-sm text-slate-600 font-medium">${name}</p>
                    <p class="text-xs text-slate-400">${size} • Document file</p>
                    <div class="mt-4 p-4 bg-slate-100 rounded-lg border border-dashed border-slate-300 w-full max-w-md text-center">
                        <p class="text-xs text-slate-500">
                            <i class="fa-solid fa-cloud-arrow-up mr-1"></i>
                            Click to view or download document
                        </p>
                        <button class="mt-2 px-4 py-1.5 bg-brand-dark text-white rounded-lg text-xs hover:bg-brand-medium transition">
                            <i class="fa-solid fa-download mr-1"></i> Download
                        </button>
                    </div>
                </div>
            `;
        }
    }

    function closeDocumentViewer() {
        closeModal('documentViewerModal');
    }

    // ============================================================
// EDIT CONSULTATION (WITH MODAL)
// ============================================================
let editConsultationId = null;

function editConsultation(id) {
    const c = CONSULTATIONS[id];
    if (!c) {
        showToast('Consultation not found', 'danger');
        return;
    }
    
    editConsultationId = id;
    
    // Populate the edit form
    document.getElementById('edit_consultation_id').value = c.id;
    document.getElementById('edit_patient_name').value = c.patient_name;
    document.getElementById('edit_doctor').value = c.doctor_name;
    document.getElementById('edit_date').value = c.date;
    document.getElementById('edit_time').value = c.time;
    document.getElementById('edit_diagnosis').value = c.diagnosis;
    document.getElementById('edit_icd_code').value = c.icd_code;
    document.getElementById('edit_treatment').value = c.treatment;
    document.getElementById('edit_follow_up').value = c.follow_up;
    document.getElementById('edit_status').value = c.status;
    
    // Clear and reload documents list
    renderEditDocuments(c.documents || []);
    
    openModal('editConsultationModal');
}

function renderEditDocuments(docs) {
    const container = document.getElementById('editDocumentsList');
    if (!docs || docs.length === 0) {
        container.innerHTML = `
            <div class="text-center py-4 text-slate-400 text-xs">
                <i class="fa-solid fa-file-circle-plus text-2xl block mb-1"></i>
                No documents attached
            </div>
        `;
        return;
    }
    
    container.innerHTML = docs.map((doc, index) => `
        <div class="flex items-center justify-between p-2 bg-slate-50 rounded-lg border border-slate-200">
            <div class="flex items-center gap-2">
                <i class="fa-solid ${doc.type === 'image' ? 'fa-image text-purple-500' : doc.type === 'pdf' ? 'fa-file-pdf text-red-500' : 'fa-file text-slate-500'}"></i>
                <div>
                    <p class="text-xs font-medium text-slate-700">${doc.name}</p>
                    <p class="text-[10px] text-slate-400">${doc.size}</p>
                </div>
            </div>
            <button onclick="removeEditDocument(${index})" 
                    class="text-rose-500 hover:text-rose-700 transition text-xs" title="Remove document">
                <i class="fa-solid fa-trash-can"></i>
            </button>
        </div>
    `).join('');
}

function removeEditDocument(index) {
    const c = CONSULTATIONS[editConsultationId];
    if (!c || !c.documents) return;
    c.documents.splice(index, 1);
    renderEditDocuments(c.documents);
}

function addEditDocument() {
    const fileInput = document.getElementById('edit_document_upload');
    const file = fileInput.files[0];
    if (!file) return;
    
    // Check file size (max 5MB)
    if (file.size > 5 * 1024 * 1024) {
        showToast('File size exceeds 5MB limit', 'warning');
        return;
    }
    
    // Check file type
    const allowedTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/webp', 'application/pdf', 'application/vnd.ms-excel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];
    if (!allowedTypes.includes(file.type)) {
        showToast('File type not supported. Please upload images, PDFs, or Excel files.', 'warning');
        return;
    }
    
    const c = CONSULTATIONS[editConsultationId];
    if (!c) return;
    
    if (!c.documents) c.documents = [];
    
    // Generate file size string
    let sizeStr = '';
    if (file.size < 1024) {
        sizeStr = file.size + ' B';
    } else if (file.size < 1024 * 1024) {
        sizeStr = (file.size / 1024).toFixed(1) + ' KB';
    } else {
        sizeStr = (file.size / (1024 * 1024)).toFixed(1) + ' MB';
    }
    
    // Determine type
    let type = 'file';
    if (file.type.startsWith('image/')) type = 'image';
    else if (file.type === 'application/pdf') type = 'pdf';
    else if (file.type.includes('spreadsheet') || file.type.includes('excel')) type = 'excel';
    
    c.documents.push({
        name: file.name,
        type: type,
        size: sizeStr
    });
    
    renderEditDocuments(c.documents);
    fileInput.value = '';
    showToast('Document added: ' + file.name, 'success');
}

function saveEditedConsultation(event) {
    event.preventDefault();
    const id = editConsultationId;
    const c = CONSULTATIONS[id];
    if (!c) return;
    
    // Update consultation data
    c.patient_name = document.getElementById('edit_patient_name').value.trim();
    c.doctor_name = document.getElementById('edit_doctor').value.trim();
    c.date = document.getElementById('edit_date').value;
    c.time = document.getElementById('edit_time').value;
    c.diagnosis = document.getElementById('edit_diagnosis').value.trim();
    c.icd_code = document.getElementById('edit_icd_code').value.trim();
    c.treatment = document.getElementById('edit_treatment').value.trim();
    c.follow_up = document.getElementById('edit_follow_up').value;
    c.status = document.getElementById('edit_status').value;
    // Documents are already updated via the add/remove functions
    
    // Update the UI card
    updateConsultationCard(c);
    
    closeModal('editConsultationModal');
    showToast('Consultation #' + c.consultation_id + ' updated successfully!', 'success');
}

function updateConsultationCard(c) {
    const card = document.querySelector(`.consultation-card[data-patient="${c.patient_name.toLowerCase()}"]`);
    if (!card) return;
    
    // Update card content
    card.querySelector('.font-semibold.text-slate-800.text-sm').textContent = c.patient_name;
    card.querySelectorAll('.text-slate-800.font-medium')[0].textContent = c.doctor_name;
    card.querySelectorAll('.text-slate-800')[1].textContent = new Date(c.date).toLocaleDateString('en-US', { month: 'short', day: 'numeric', year: 'numeric' });
    card.querySelectorAll('.text-slate-800')[2].textContent = c.time;
    card.querySelectorAll('.text-slate-800.font-mono.text-xs')[0].textContent = c.icd_code;
    card.querySelector('.text-sm.text-slate-800.font-medium').textContent = c.diagnosis;
    card.querySelector('.text-xs.text-slate-600.line-clamp-2').textContent = c.treatment;
    
    // Update status badge
    const statusBadge = card.querySelector('.px-2.py-1.rounded-full.text-xs.font-semibold');
    const statusClasses = {
        'completed': 'bg-emerald-100 text-emerald-700',
        'pending': 'bg-amber-100 text-amber-700',
        'follow_up_needed': 'bg-rose-100 text-rose-700'
    };
    statusBadge.className = `px-2 py-1 rounded-full text-xs font-semibold ${statusClasses[c.status] || statusClasses.completed}`;
    statusBadge.textContent = c.status.replace('_', ' ').toUpperCase();
}

    // ============================================================
    // ADD CONSULTATION
    // ============================================================
    function saveNewConsultation(event) {
        event.preventDefault();
        showToast('Consultation added successfully!', 'success');
        closeModal('addConsultationModal');
    }

    // ============================================================
    // TOAST NOTIFICATIONS
    // ============================================================
    let toastTimer = null;
    function showToast(message, type = 'success') {
        const toast = document.getElementById('toast');
        const colors = {
            success: 'bg-brand-dark',
            danger: 'bg-rose-600'
        };
        const icons = {
            success: 'fa-circle-check',
            danger: 'fa-circle-check'
        };
        toast.className = 'fixed bottom-6 right-6 z-[60] px-4 py-3 rounded-lg shadow-lg text-sm font-semibold text-white flex items-center gap-2 ' + colors[type];
        toast.querySelector('i').className = 'fa-solid ' + icons[type];
        document.getElementById('toastMessage').textContent = message;
        toast.classList.remove('hidden');

        clearTimeout(toastTimer);
        toastTimer = setTimeout(() => toast.classList.add('hidden'), 3000);
    }

    // ============================================================
    // SEARCH & FILTER (UPDATED WITH DATE)
    // ============================================================
    document.getElementById('searchConsultation').addEventListener('input', filterConsultations);
    document.getElementById('filterStatus').addEventListener('change', filterConsultations);
    document.getElementById('filterDoctor').addEventListener('change', filterConsultations);

    function filterConsultations() {
        const search = document.getElementById('searchConsultation').value.toLowerCase();
        const status = document.getElementById('filterStatus').value;
        const doctor = document.getElementById('filterDoctor').value.toLowerCase();
        const dateRange = activeDateFilter;
        let visibleCount = 0;

        document.querySelectorAll('.consultation-card').forEach(card => {
            const patient = card.dataset.patient;
            const diagnosis = card.dataset.diagnosis;
            const cardStatus = card.dataset.status;
            const cardDoctor = card.dataset.doctor;
            const cardDate = card.dataset.date;

            const matchesSearch = patient.includes(search) || diagnosis.includes(search);
            const matchesStatus = !status || cardStatus === status;
            const matchesDoctor = !doctor || cardDoctor.includes(doctor);
            const matchesDate = matchesDateFilter(cardDate, dateRange);
            const isVisible = matchesSearch && matchesStatus && matchesDoctor && matchesDate;

            card.style.display = isVisible ? '' : 'none';
            if (isVisible) visibleCount++;
        });

        document.getElementById('emptyState').style.display = visibleCount === 0 ? 'flex' : 'none';
    }

    function resetFilters() {
        document.getElementById('searchConsultation').value = '';
        document.getElementById('filterStatus').value = '';
        document.getElementById('filterDoctor').value = '';
        setDateFilter('all');
        document.querySelectorAll('.consultation-card').forEach(card => card.style.display = '');
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
            // Also close document viewer if open
            if (!document.getElementById('documentViewerModal').classList.contains('hidden')) {
                closeDocumentViewer();
            }
        }
    });
</script>

<?php include_once '../../includes/footer.php'; ?>