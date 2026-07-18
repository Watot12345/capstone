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

// Sample Doctors/Specialists Data
$specialists = [
    ['id' => 1, 'name' => 'Dr. Maria Santos', 'specialty' => 'Cardiology', 'hospital' => 'Caloocan City Medical Center'],
    ['id' => 2, 'name' => 'Dr. Juan Reyes', 'specialty' => 'Neurology', 'hospital' => 'Philippine General Hospital'],
    ['id' => 3, 'name' => 'Dr. Ana Cruz', 'specialty' => 'Orthopedics', 'hospital' => 'St. Luke\'s Medical Center'],
    ['id' => 4, 'name' => 'Dr. Carlos Lim', 'specialty' => 'Oncology', 'hospital' => 'National Kidney and Transplant Institute'],
    ['id' => 5, 'name' => 'Dr. Elena Torres', 'specialty' => 'Obstetrics & Gynecology', 'hospital' => 'Caloocan City Medical Center'],
    ['id' => 6, 'name' => 'Dr. Miguel Garcia', 'specialty' => 'Pediatrics', 'hospital' => 'Philippine Children\'s Medical Center'],
];

// Sample Referrals Data
$referrals = [
    [
        'id' => 1,
        'referral_id' => 'REF-001',
        'patient_id' => 1,
        'patient_name' => 'Maria Santos',
        'patient_avatar' => 'MS',
        'from_doctor' => 'Dr. Elena Santos',
        'to_specialist' => 'Dr. Maria Santos',
        'specialty' => 'Cardiology',
        'hospital' => 'Caloocan City Medical Center',
        'referral_type' => 'specialist',
        'date' => '2026-07-15',
        'reason' => 'Patient presents with chest pain and abnormal ECG. Suspected cardiac issue requiring specialist evaluation.',
        'diagnosis' => 'Hypertension with possible cardiac complications',
        'urgency' => 'high',
        'status' => 'accepted',
        'notes' => 'Patient scheduled for ECG and stress test',
        'follow_up_date' => '2026-07-29',
        'feedback' => 'ECG showed normal sinus rhythm. Echo-cardiogram scheduled.',
        'created_at' => '2026-07-15 09:30:00'
    ],
    [
        'id' => 2,
        'referral_id' => 'REF-002',
        'patient_id' => 2,
        'patient_name' => 'Juan Dela Cruz',
        'patient_avatar' => 'JD',
        'from_doctor' => 'Dr. Miguel Reyes',
        'to_specialist' => 'Dr. Ana Cruz',
        'specialty' => 'Orthopedics',
        'hospital' => 'St. Luke\'s Medical Center',
        'referral_type' => 'specialist',
        'date' => '2026-07-14',
        'reason' => 'Patient has severe knee pain and limited mobility. X-ray shows possible meniscus tear.',
        'diagnosis' => 'Meniscus Tear, Right Knee',
        'urgency' => 'medium',
        'status' => 'pending',
        'notes' => 'MRI recommended for further evaluation',
        'follow_up_date' => '2026-07-28',
        'feedback' => null,
        'created_at' => '2026-07-14 10:15:00'
    ],
    [
        'id' => 3,
        'referral_id' => 'REF-003',
        'patient_id' => 3,
        'patient_name' => 'Rosa Mendoza',
        'patient_avatar' => 'RM',
        'from_doctor' => 'Dr. Ana Cruz',
        'to_specialist' => 'Dr. Carlos Lim',
        'specialty' => 'Oncology',
        'hospital' => 'National Kidney and Transplant Institute',
        'referral_type' => 'hospital',
        'date' => '2026-07-13',
        'reason' => 'Patient found with breast lump. Ultrasound and biopsy results indicate possible malignancy.',
        'diagnosis' => 'Suspected Breast Carcinoma',
        'urgency' => 'critical',
        'status' => 'accepted',
        'notes' => 'Oncology consult scheduled for July 20',
        'follow_up_date' => '2026-07-20',
        'feedback' => 'Biopsy confirmed early-stage breast cancer. Treatment plan initiated.',
        'created_at' => '2026-07-13 14:00:00'
    ],
    [
        'id' => 4,
        'referral_id' => 'REF-004',
        'patient_id' => 4,
        'patient_name' => 'Carlos Lim',
        'patient_avatar' => 'CL',
        'from_doctor' => 'Dr. Elena Santos',
        'to_specialist' => 'Dr. Juan Reyes',
        'specialty' => 'Neurology',
        'hospital' => 'Philippine General Hospital',
        'referral_type' => 'specialist',
        'date' => '2026-07-12',
        'reason' => 'Patient experiencing severe headaches, dizziness, and occasional loss of balance.',
        'diagnosis' => 'Suspected Neurological Disorder',
        'urgency' => 'high',
        'status' => 'completed',
        'notes' => 'MRI and neurological assessment recommended',
        'follow_up_date' => '2026-07-26',
        'feedback' => 'MRI normal. Diagnosed with vestibular migraine. Treatment started.',
        'created_at' => '2026-07-12 11:45:00'
    ],
    [
        'id' => 5,
        'referral_id' => 'REF-005',
        'patient_id' => 5,
        'patient_name' => 'Elena Torres',
        'patient_avatar' => 'ET',
        'from_doctor' => 'Dr. Miguel Reyes',
        'to_specialist' => 'Dr. Elena Torres',
        'specialty' => 'Obstetrics & Gynecology',
        'hospital' => 'Caloocan City Medical Center',
        'referral_type' => 'hospital',
        'date' => '2026-07-11',
        'reason' => 'Patient is pregnant with complications. Requires specialist OB-GYN care.',
        'diagnosis' => 'High-Risk Pregnancy',
        'urgency' => 'medium',
        'status' => 'pending',
        'notes' => 'Referral to high-risk pregnancy clinic',
        'follow_up_date' => '2026-07-25',
        'feedback' => null,
        'created_at' => '2026-07-11 09:00:00'
    ],
    [
        'id' => 6,
        'referral_id' => 'REF-006',
        'patient_id' => 1,
        'patient_name' => 'Maria Santos',
        'patient_avatar' => 'MS',
        'from_doctor' => 'Dr. Elena Santos',
        'to_specialist' => 'Dr. Miguel Garcia',
        'specialty' => 'Pediatrics',
        'hospital' => 'Philippine Children\'s Medical Center',
        'referral_type' => 'specialist',
        'date' => '2026-07-10',
        'reason' => 'Patient\'s child shows developmental delay. Referral for pediatric evaluation.',
        'diagnosis' => 'Developmental Delay',
        'urgency' => 'low',
        'status' => 'rejected',
        'notes' => 'Patient referred to developmental pediatrician',
        'follow_up_date' => null,
        'feedback' => 'Referral rejected - patient needs to complete initial screening first',
        'created_at' => '2026-07-10 16:30:00'
    ],
];

// Pagination
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$limit = 5;
$offset = ($page - 1) * $limit;
$totalReferrals = count($referrals);
$totalPages = ceil($totalReferrals / $limit);
$paginatedReferrals = array_slice($referrals, $offset, $limit);

$title = 'Referrals';

// Stats
$totalPending = count(array_filter($referrals, fn($r) => $r['status'] === 'pending'));
$totalAccepted = count(array_filter($referrals, fn($r) => $r['status'] === 'accepted'));
$totalCompleted = count(array_filter($referrals, fn($r) => $r['status'] === 'completed'));
$totalCritical = count(array_filter($referrals, fn($r) => $r['urgency'] === 'critical'));
?>

<!-- ============================================================ -->
<!-- 2. HTML + PHP EMBEDDED + Tailwind CSS                       -->
<!-- ============================================================ -->

<div class="flex-1 px-6 pt-[26px] pb-20 mb-10 flex flex-col min-h-0 overflow-hidden">

    <!-- Page Header -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6">
        <div>
            <h2 class="text-2xl font-black text-slate-900 tracking-tight">Referrals</h2>
            <p class="text-sm text-slate-500 mt-0.5">Specialist, hospital referrals & follow-up management</p>
        </div>
        <div class="flex gap-3">
            <button onclick="openModal('newReferralModal')"
                    class="px-4 py-2 bg-brand-dark text-white rounded-lg hover:bg-brand-medium transition-colors text-sm font-semibold flex items-center gap-2 shadow-sm">
                <i class="fa-solid fa-arrow-right-arrow-left text-xs"></i> New Referral
            </button>
        </div>
    </div>

    <!-- ============================================================ -->
<!-- MODERN KPI CARDS - Updated to match design               -->
<!-- ============================================================ -->
<div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-6">
    <!-- Card 1: Total Referrals -->
    <div class="relative overflow-hidden bg-white rounded-2xl shadow-sm border border-slate-200 p-5 hover:shadow-lg transition group">
        <div class="absolute -top-12 -right-12 w-24 h-24 bg-blue-100 rounded-full opacity-50 group-hover:scale-110 transition"></div>
        <div class="relative">
            <div class="flex items-center gap-3">
                <div class="w-11 h-11 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl flex items-center justify-center text-white shadow-lg shadow-blue-200">
                    <i class="fa-solid fa-arrow-right-arrow-left text-lg"></i>
                </div>
                <div>
                    <p class="text-2xl font-black text-slate-900"><?php echo $totalReferrals; ?></p>
                    <p class="text-xs font-medium text-slate-500">Total Referrals</p>
                </div>
            </div>
            <div class="mt-3 flex items-center gap-2">
                <span class="px-2 py-0.5 bg-blue-100 text-blue-700 rounded-full text-[10px] font-bold">📋 All referrals</span>
                <span class="text-[10px] text-slate-400"><?php echo $totalAccepted; ?> accepted</span>
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
                <span class="text-[10px] text-slate-400">Needs review</span>
            </div>
        </div>
    </div>

    <!-- Card 3: Accepted -->
    <div class="relative overflow-hidden bg-white rounded-2xl shadow-sm border border-slate-200 p-5 hover:shadow-lg transition group">
        <div class="absolute -top-12 -right-12 w-24 h-24 bg-emerald-100 rounded-full opacity-50 group-hover:scale-110 transition"></div>
        <div class="relative">
            <div class="flex items-center gap-3">
                <div class="w-11 h-11 bg-gradient-to-br from-emerald-500 to-emerald-600 rounded-xl flex items-center justify-center text-white shadow-lg shadow-emerald-200">
                    <i class="fa-solid fa-check-circle text-lg"></i>
                </div>
                <div>
                    <p class="text-2xl font-black text-emerald-600"><?php echo $totalAccepted; ?></p>
                    <p class="text-xs font-medium text-slate-500">Accepted</p>
                </div>
            </div>
            <div class="mt-3 flex items-center gap-2">
                <span class="px-2 py-0.5 bg-emerald-100 text-emerald-700 rounded-full text-[10px] font-bold">✅ Approved</span>
                <span class="text-[10px] text-slate-400">Appointment confirmed</span>
            </div>
        </div>
    </div>

    <!-- Card 4: Critical -->
    <div class="relative overflow-hidden bg-white rounded-2xl shadow-sm border border-slate-200 p-5 hover:shadow-lg transition group">
        <div class="absolute -top-12 -right-12 w-24 h-24 bg-rose-100 rounded-full opacity-50 group-hover:scale-110 transition"></div>
        <div class="relative">
            <div class="flex items-center gap-3">
                <div class="w-11 h-11 bg-gradient-to-br from-rose-500 to-rose-600 rounded-xl flex items-center justify-center text-white shadow-lg shadow-rose-200">
                    <i class="fa-solid fa-triangle-exclamation text-lg"></i>
                </div>
                <div>
                    <p class="text-2xl font-black text-rose-600"><?php echo $totalCritical; ?></p>
                    <p class="text-xs font-medium text-slate-500">Critical</p>
                </div>
            </div>
            <div class="mt-3 flex items-center gap-2">
                <span class="px-2 py-0.5 bg-rose-100 text-rose-700 rounded-full text-[10px] font-bold">🚨 Urgent</span>
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
                       id="searchReferral"
                       placeholder="Search by patient name, specialist, or hospital..."
                       class="w-full pl-9 pr-4 py-2 border border-slate-200 rounded-lg focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none text-sm transition">
            </div>
            <div class="flex gap-2 flex-wrap">
                <select id="filterStatus" class="px-4 py-2 border border-slate-200 rounded-lg focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none text-sm bg-white">
                    <option value="">All Status</option>
                    <option value="pending">Pending</option>
                    <option value="accepted">Accepted</option>
                    <option value="completed">Completed</option>
                    <option value="rejected">Rejected</option>
                </select>
                <select id="filterType" class="px-4 py-2 border border-slate-200 rounded-lg focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none text-sm bg-white">
                    <option value="">All Types</option>
                    <option value="specialist">Specialist</option>
                    <option value="hospital">Hospital</option>
                </select>
                <select id="filterUrgency" class="px-4 py-2 border border-slate-200 rounded-lg focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none text-sm bg-white">
                    <option value="">All Urgency</option>
                    <option value="critical">Critical</option>
                    <option value="high">High</option>
                    <option value="medium">Medium</option>
                    <option value="low">Low</option>
                </select>
                <button onclick="resetFilters()" title="Reset filters"
                        class="px-3 py-2 bg-slate-100 text-slate-500 rounded-lg hover:bg-slate-200 hover:text-slate-700 transition-colors text-sm">
                    <i class="fa-solid fa-rotate-right"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- Referrals Table -->
    <div class="bg-white rounded-xl shadow-xs border border-slate-200 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead class="bg-slate-50 border-b border-slate-200">
                    <tr>
                        <th class="px-4 py-3 text-left text-[10px] font-bold text-slate-500 uppercase tracking-wider">REF ID</th>
                        <th class="px-4 py-3 text-left text-[10px] font-bold text-slate-500 uppercase tracking-wider">Patient</th>
                        <th class="px-4 py-3 text-left text-[10px] font-bold text-slate-500 uppercase tracking-wider">To</th>
                        <th class="px-4 py-3 text-left text-[10px] font-bold text-slate-500 uppercase tracking-wider">Specialty</th>
                        <th class="px-4 py-3 text-left text-[10px] font-bold text-slate-500 uppercase tracking-wider">Type</th>
                        <th class="px-4 py-3 text-left text-[10px] font-bold text-slate-500 uppercase tracking-wider">Urgency</th>
                        <th class="px-4 py-3 text-left text-[10px] font-bold text-slate-500 uppercase tracking-wider">Status</th>
                        <th class="px-4 py-3 text-center text-[10px] font-bold text-slate-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody id="referralTableBody">
                    <?php foreach ($paginatedReferrals as $referral): ?>
                    <tr class="border-b border-slate-100 hover:bg-brand-light/40 transition-colors referral-row <?php echo $referral['urgency'] === 'critical' ? 'bg-rose-50/50' : ''; ?>"
                        data-patient="<?php echo strtolower($referral['patient_name']); ?>"
                        data-specialist="<?php echo strtolower($referral['to_specialist']); ?>"
                        data-hospital="<?php echo strtolower($referral['hospital']); ?>"
                        data-status="<?php echo $referral['status']; ?>"
                        data-type="<?php echo $referral['referral_type']; ?>"
                        data-urgency="<?php echo $referral['urgency']; ?>">
                        <td class="px-4 py-3 font-mono text-xs text-brand-dark font-semibold"><?php echo $referral['referral_id']; ?></td>
                        <td class="px-4 py-3">
                            <div class="flex items-center gap-2.5">
                                <div class="w-8 h-8 rounded-full bg-brand-light border border-brand-border flex items-center justify-center text-brand-dark font-bold text-xs flex-shrink-0">
                                    <?php echo $referral['patient_avatar']; ?>
                                </div>
                                <div>
                                    <p class="font-semibold text-slate-800 text-sm"><?php echo $referral['patient_name']; ?></p>
                                    <p class="text-xs text-slate-400"><?php echo $referral['from_doctor']; ?></p>
                                </div>
                            </div>
                        </td>
                        <td class="px-4 py-3">
                            <p class="font-medium text-slate-800 text-xs"><?php echo $referral['to_specialist']; ?></p>
                            <p class="text-[10px] text-slate-400"><?php echo $referral['hospital']; ?></p>
                        </td>
                        <td class="px-4 py-3 text-slate-600 text-xs"><?php echo $referral['specialty']; ?></td>
                        <td class="px-4 py-3">
                            <span class="px-2 py-0.5 rounded-full text-[10px] font-semibold <?php echo $referral['referral_type'] === 'specialist' ? 'bg-blue-100 text-blue-700' : 'bg-purple-100 text-purple-700'; ?>">
                                <?php echo ucfirst($referral['referral_type']); ?>
                            </span>
                        </td>
                        <td class="px-4 py-3">
                            <?php
                                $urgencyColors = [
                                    'critical' => 'bg-rose-100 text-rose-700',
                                    'high' => 'bg-orange-100 text-orange-700',
                                    'medium' => 'bg-yellow-100 text-yellow-700',
                                    'low' => 'bg-green-100 text-green-700'
                                ];
                                $urgencyIcons = [
                                    'critical' => '🔴',
                                    'high' => '🟠',
                                    'medium' => '🟡',
                                    'low' => '🟢'
                                ];
                            ?>
                            <span class="px-2 py-1 rounded-full text-xs font-semibold <?php echo $urgencyColors[$referral['urgency']] ?? $urgencyColors['medium']; ?>">
                                <?php echo $urgencyIcons[$referral['urgency']] ?? ''; ?> <?php echo ucfirst($referral['urgency']); ?>
                            </span>
                        </td>
                        <td class="px-4 py-3">
                            <span class="px-2 py-1 rounded-full text-xs font-semibold <?php 
                                echo $referral['status'] === 'accepted' ? 'bg-emerald-100 text-emerald-700' : 
                                    ($referral['status'] === 'pending' ? 'bg-amber-100 text-amber-700' : 
                                    ($referral['status'] === 'completed' ? 'bg-blue-100 text-blue-700' : 
                                    'bg-slate-100 text-slate-500')); 
                            ?>">
                                <?php echo ucfirst($referral['status']); ?>
                            </span>
                        </td>
                        <td class="px-4 py-3">
                            <div class="flex items-center justify-center gap-1">
                                <button onclick="viewReferral(<?php echo $referral['id']; ?>)"
                                        class="p-1.5 text-brand-medium hover:bg-brand-light rounded-lg transition" title="View">
                                    <i class="fa-solid fa-eye text-sm"></i>
                                </button>
                                <?php if ($referral['status'] === 'pending'): ?>
                                    <button onclick="updateReferralStatus(<?php echo $referral['id']; ?>, 'accepted')"
                                            class="p-1.5 text-emerald-600 hover:bg-emerald-50 rounded-lg transition" title="Accept">
                                        <i class="fa-solid fa-check text-sm"></i>
                                    </button>
                                    <button onclick="updateReferralStatus(<?php echo $referral['id']; ?>, 'rejected')"
                                            class="p-1.5 text-rose-500 hover:bg-rose-50 rounded-lg transition" title="Reject">
                                        <i class="fa-solid fa-times text-sm"></i>
                                    </button>
                                <?php endif; ?>
                                <?php if ($referral['status'] === 'accepted'): ?>
                                    <button onclick="markCompleted(<?php echo $referral['id']; ?>)"
                                            class="p-1.5 text-blue-600 hover:bg-blue-50 rounded-lg transition" title="Mark Completed">
                                        <i class="fa-solid fa-flag-checkered text-sm"></i>
                                    </button>
                                <?php endif; ?>
                                <button onclick="editReferral(<?php echo $referral['id']; ?>)"
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
                <i class="fa-solid fa-arrow-right-arrow-left text-slate-400"></i>
            </div>
            <p class="text-sm font-semibold text-slate-600">No referrals match your filters</p>
            <p class="text-xs text-slate-400 mt-1">Try adjusting your search or clearing filters</p>
            <button onclick="resetFilters()" class="mt-3 text-xs font-semibold text-brand-medium hover:text-brand-dark">Clear all filters</button>
        </div>

        <!-- Pagination -->
        <div class="px-4 py-3 border-t border-slate-200 flex flex-col sm:flex-row justify-between items-center gap-3 bg-slate-50">
            <p class="text-xs text-slate-500">
                Showing <span class="font-semibold text-slate-700"><?php echo $offset + 1; ?></span> to
                <span class="font-semibold text-slate-700"><?php echo min($offset + $limit, $totalReferrals); ?></span> of
                <span class="font-semibold text-slate-700"><?php echo $totalReferrals; ?></span> referrals
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
<!-- NEW REFERRAL MODAL                                           -->
<!-- ============================================================ -->
<div id="newReferralModal" class="hidden fixed inset-0 bg-slate-900/50 backdrop-blur-sm z-50 items-center justify-center p-4">
    <div class="bg-white rounded-2xl shadow-xl w-full max-w-2xl max-h-[90vh] overflow-y-auto">
        <div class="flex items-center justify-between px-6 py-4 border-b border-slate-200 sticky top-0 bg-white rounded-t-2xl">
            <h3 class="font-bold text-slate-900 flex items-center gap-2">
                <i class="fa-solid fa-arrow-right-arrow-left text-brand-medium"></i>
                New Referral
            </h3>
            <button onclick="closeModal('newReferralModal')" class="w-8 h-8 rounded-lg hover:bg-slate-100 flex items-center justify-center text-slate-400 hover:text-slate-600 transition">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>
        <form id="newReferralForm" class="p-6 space-y-4" onsubmit="saveReferral(event)">
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">Patient</label>
                    <select id="ref_patient" required class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm bg-white focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none">
                        <option value="">Select Patient</option>
                        <?php foreach ($patients as $p): ?>
                            <option value="<?php echo $p['id']; ?>"><?php echo $p['name']; ?> (<?php echo $p['patient_id']; ?>)</option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">Referring Doctor</label>
                    <input type="text" id="ref_from_doctor" required placeholder="Dr. Name" class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none">
                </div>
            </div>
            <div>
                <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">Referral Type</label>
                <select id="ref_type" class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm bg-white focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none" onchange="toggleReferralFields()">
                    <option value="specialist">Specialist Referral</option>
                    <option value="hospital">Hospital Referral</option>
                </select>
            </div>
            <div>
                <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">Refer To</label>
                <select id="ref_to" required class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm bg-white focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none">
                    <option value="">Select Specialist or Hospital</option>
                    <?php foreach ($specialists as $s): ?>
                        <option value="<?php echo $s['name']; ?>" data-hospital="<?php echo $s['hospital']; ?>" data-specialty="<?php echo $s['specialty']; ?>">
                            <?php echo $s['name']; ?> - <?php echo $s['specialty']; ?> (<?php echo $s['hospital']; ?>)
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">Specialty</label>
                    <input type="text" id="ref_specialty" readonly class="w-full px-3 py-2 bg-slate-50 border border-slate-200 rounded-lg text-sm text-slate-600 outline-none cursor-not-allowed">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">Hospital</label>
                    <input type="text" id="ref_hospital" readonly class="w-full px-3 py-2 bg-slate-50 border border-slate-200 rounded-lg text-sm text-slate-600 outline-none cursor-not-allowed">
                </div>
            </div>
            <div>
                <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">Reason for Referral</label>
                <textarea id="ref_reason" rows="2" required class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none" placeholder="Explain why this referral is needed..."></textarea>
            </div>
            <div>
                <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">Diagnosis</label>
                <input type="text" id="ref_diagnosis" class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none" placeholder="e.g. Hypertension, Diabetes, etc.">
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">Urgency</label>
                    <select id="ref_urgency" class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm bg-white focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none">
                        <option value="low">Low</option>
                        <option value="medium" selected>Medium</option>
                        <option value="high">High</option>
                        <option value="critical">Critical</option>
                    </select>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">Follow-up Date</label>
                    <input type="date" id="ref_follow_up" class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none">
                </div>
            </div>
            <div>
                <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">Additional Notes</label>
                <textarea id="ref_notes" rows="1" class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none" placeholder="Any additional information..."></textarea>
            </div>

            <div class="flex justify-end gap-2 pt-2 border-t border-slate-100">
                <button type="button" onclick="closeModal('newReferralModal')"
                        class="px-4 py-2 bg-white border border-slate-200 text-slate-600 rounded-lg hover:bg-slate-50 transition text-sm font-semibold">
                    Cancel
                </button>
                <button type="submit"
                        class="px-4 py-2 bg-brand-dark text-white rounded-lg hover:bg-brand-medium transition text-sm font-semibold">
                    <i class="fa-solid fa-arrow-right-arrow-left mr-1.5"></i> Create Referral
                </button>
            </div>
        </form>
    </div>
</div>

<!-- ============================================================ -->
<!-- VIEW REFERRAL MODAL                                          -->
<!-- ============================================================ -->
<div id="viewReferralModal" class="hidden fixed inset-0 bg-slate-900/50 backdrop-blur-sm z-50 items-center justify-center p-4">
    <div class="bg-white rounded-2xl shadow-xl w-full max-w-2xl max-h-[90vh] overflow-y-auto">
        <div class="flex items-center justify-between px-6 py-4 border-b border-slate-200 sticky top-0 bg-white rounded-t-2xl">
            <h3 class="font-bold text-slate-900">Referral Details</h3>
            <button onclick="closeModal('viewReferralModal')" class="w-8 h-8 rounded-lg hover:bg-slate-100 flex items-center justify-center text-slate-400 hover:text-slate-600 transition">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>
        <div id="referralDetailsContent" class="p-6">
            <div class="flex items-center justify-center py-10 text-slate-400 text-sm">
                <i class="fa-solid fa-spinner fa-spin mr-2"></i> Loading...
            </div>
        </div>
    </div>
</div>

<!-- ============================================================ -->
<!-- FOLLOW-UP MODAL                                              -->
<!-- ============================================================ -->
<div id="followUpModal" class="hidden fixed inset-0 bg-slate-900/50 backdrop-blur-sm z-50 items-center justify-center p-4">
    <div class="bg-white rounded-2xl shadow-xl w-full max-w-md">
        <div class="flex items-center justify-between px-6 py-4 border-b border-slate-200">
            <h3 class="font-bold text-slate-900">Follow-up Management</h3>
            <button onclick="closeModal('followUpModal')" class="w-8 h-8 rounded-lg hover:bg-slate-100 flex items-center justify-center text-slate-400 hover:text-slate-600 transition">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>
        <div class="p-6 space-y-4">
            <div class="flex items-center gap-3 p-3 bg-brand-light/40 rounded-xl border border-brand-border">
                <div class="w-10 h-10 rounded-full bg-brand-light border border-brand-border flex items-center justify-center text-brand-dark font-bold text-sm flex-shrink-0">
                    MS
                </div>
                <div>
                    <p id="followUpPatient" class="font-semibold text-slate-800 text-sm">Maria Santos</p>
                    <p id="followUpReferral" class="text-xs text-slate-400">REF-001</p>
                </div>
            </div>
            <div>
                <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">Follow-up Date</label>
                <input type="date" id="follow_up_date" class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none">
            </div>
            <div>
                <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">Feedback / Outcome</label>
                <textarea id="follow_up_feedback" rows="3" class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-brand-medium/40 focus:border-brand-medium outline-none" placeholder="Update on referral outcome..."></textarea>
            </div>
        </div>
        <div class="flex justify-end gap-2 px-6 pb-6">
            <button type="button" onclick="closeModal('followUpModal')"
                    class="px-4 py-2 bg-white border border-slate-200 text-slate-600 rounded-lg hover:bg-slate-50 transition text-sm font-semibold">
                Cancel
            </button>
            <button type="button" onclick="saveFollowUp()"
                    class="px-4 py-2 bg-brand-dark text-white rounded-lg hover:bg-brand-medium transition text-sm font-semibold">
                <i class="fa-solid fa-check mr-1.5"></i> Save Follow-up
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
    const REFERRALS = <?php echo json_encode(array_column($referrals, null, 'id'), JSON_PRETTY_PRINT); ?>;
    let followUpReferralId = null;

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
    // REFERRAL FORM HELPERS
    // ============================================================
    function toggleReferralFields() {
        // No additional fields needed, keeping it simple
    }

    document.getElementById('ref_to').addEventListener('change', function() {
        const selected = this.options[this.selectedIndex];
        const hospital = selected.dataset.hospital || '';
        const specialty = selected.dataset.specialty || '';
        document.getElementById('ref_hospital').value = hospital;
        document.getElementById('ref_specialty').value = specialty;
    });

    // ============================================================
    // VIEW REFERRAL
    // ============================================================
    function viewReferral(id) {
        openModal('viewReferralModal');
        const r = REFERRALS[id];
        if (!r) return;

        setTimeout(() => {
            const statusColors = {
                pending: 'bg-amber-100 text-amber-700',
                accepted: 'bg-emerald-100 text-emerald-700',
                completed: 'bg-blue-100 text-blue-700',
                rejected: 'bg-slate-100 text-slate-500'
            };
            const urgencyColors = {
                critical: 'bg-rose-100 text-rose-700',
                high: 'bg-orange-100 text-orange-700',
                medium: 'bg-yellow-100 text-yellow-700',
                low: 'bg-green-100 text-green-700'
            };

            document.getElementById('referralDetailsContent').innerHTML = `
                <div class="space-y-4">
                    <div class="flex items-center gap-4 pb-4 border-b border-slate-200">
                        <div class="w-14 h-14 rounded-full bg-brand-light border border-brand-border flex items-center justify-center text-brand-dark font-bold text-lg flex-shrink-0">
                            ${r.patient_avatar}
                        </div>
                        <div>
                            <h4 class="text-lg font-bold text-slate-900">${r.patient_name}</h4>
                            <p class="text-sm text-slate-500">${r.referral_id} • ${r.referral_type} referral</p>
                            <span class="inline-block px-2 py-0.5 rounded-full text-xs font-semibold mt-1 ${statusColors[r.status] || statusColors.pending}">
                                ${r.status.toUpperCase()}
                            </span>
                            <span class="inline-block px-2 py-0.5 rounded-full text-xs font-semibold ml-1 ${urgencyColors[r.urgency] || urgencyColors.medium}">
                                ${r.urgency.toUpperCase()}
                            </span>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div><p class="text-xs text-slate-400 font-semibold">Referring Doctor</p><p class="text-sm text-slate-800">${r.from_doctor}</p></div>
                        <div><p class="text-xs text-slate-400 font-semibold">Referred To</p><p class="text-sm text-slate-800">${r.to_specialist}</p></div>
                        <div><p class="text-xs text-slate-400 font-semibold">Specialty</p><p class="text-sm text-slate-800">${r.specialty}</p></div>
                        <div><p class="text-xs text-slate-400 font-semibold">Hospital</p><p class="text-sm text-slate-800">${r.hospital}</p></div>
                        <div><p class="text-xs text-slate-400 font-semibold">Date</p><p class="text-sm text-slate-800">${new Date(r.date).toLocaleDateString('en-US', { month: 'long', day: 'numeric', year: 'numeric' })}</p></div>
                        <div><p class="text-xs text-slate-400 font-semibold">Follow-up</p><p class="text-sm text-slate-800">${r.follow_up_date ? new Date(r.follow_up_date).toLocaleDateString('en-US', { month: 'long', day: 'numeric', year: 'numeric' }) : 'Not scheduled'}</p></div>
                    </div>
                    <div class="bg-slate-50 rounded-xl p-4 border border-slate-200">
                        <h5 class="text-sm font-bold text-slate-700 mb-2">Reason for Referral</h5>
                        <p class="text-sm text-slate-800">${r.reason}</p>
                    </div>
                    ${r.diagnosis ? `<div class="bg-brand-light/40 rounded-xl p-4 border border-brand-border"><h5 class="text-sm font-bold text-slate-700 mb-2">Diagnosis</h5><p class="text-sm text-slate-800">${r.diagnosis}</p></div>` : ''}
                    ${r.notes ? `<div class="bg-slate-50 rounded-xl p-4 border border-slate-200"><h5 class="text-sm font-bold text-slate-700 mb-2">Notes</h5><p class="text-sm text-slate-800">${r.notes}</p></div>` : ''}
                    ${r.feedback ? `<div class="bg-emerald-50/40 rounded-xl p-4 border border-emerald-200"><h5 class="text-sm font-bold text-emerald-700 mb-2">📋 Feedback</h5><p class="text-sm text-slate-800">${r.feedback}</p></div>` : ''}
                    <div class="flex justify-end gap-2 pt-2 border-t border-slate-200">
                        <button onclick="closeModal('viewReferralModal')" class="px-4 py-2 bg-white border border-slate-200 text-slate-600 rounded-lg hover:bg-slate-50 transition text-sm font-semibold">Close</button>
                        ${r.status === 'pending' ? `<button onclick="closeModal('viewReferralModal'); updateReferralStatus(${r.id}, 'accepted')" class="px-4 py-2 bg-emerald-600 text-white rounded-lg hover:bg-emerald-700 transition text-sm font-semibold"><i class="fa-solid fa-check mr-1.5"></i> Accept</button>` : ''}
                        ${r.status === 'accepted' ? `<button onclick="closeModal('viewReferralModal'); openFollowUp(${r.id})" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition text-sm font-semibold"><i class="fa-solid fa-flag-checkered mr-1.5"></i> Complete</button>` : ''}
                    </div>
                </div>
            `;
        }, 300);
    }

    // ============================================================
    // UPDATE REFERRAL STATUS
    // ============================================================
    function updateReferralStatus(id, status) {
        if (!confirm('Mark this referral as ' + status.toUpperCase() + '?')) return;
        
        const r = REFERRALS[id];
        if (!r) return;
        
        r.status = status;
        updateReferralRow(r);
        showToast('Referral #' + r.referral_id + ' marked as ' + status, 'success');
    }

    function updateReferralRow(r) {
        const rows = document.querySelectorAll('.referral-row');
        rows.forEach(row => {
            const patientName = row.querySelector('.font-semibold.text-slate-800.text-sm')?.textContent;
            if (patientName === r.patient_name) {
                const statusBadge = row.querySelector('.px-2.py-1.rounded-full:last-child');
                const statusClasses = {
                    accepted: 'bg-emerald-100 text-emerald-700',
                    pending: 'bg-amber-100 text-amber-700',
                    completed: 'bg-blue-100 text-blue-700',
                    rejected: 'bg-slate-100 text-slate-500'
                };
                statusBadge.className = `px-2 py-1 rounded-full text-xs font-semibold ${statusClasses[r.status] || statusClasses.pending}`;
                statusBadge.textContent = r.status.charAt(0).toUpperCase() + r.status.slice(1);
            }
        });
    }

    // ============================================================
    // MARK COMPLETED
    // ============================================================
    function markCompleted(id) {
        openFollowUp(id);
    }

    // ============================================================
    // FOLLOW-UP MANAGEMENT
    // ============================================================
    function openFollowUp(id) {
        const r = REFERRALS[id];
        if (!r) return;
        
        followUpReferralId = id;
        document.getElementById('followUpPatient').textContent = r.patient_name;
        document.getElementById('followUpReferral').textContent = r.referral_id;
        document.getElementById('follow_up_date').value = r.follow_up_date || new Date().toISOString().split('T')[0];
        document.getElementById('follow_up_feedback').value = r.feedback || '';
        
        openModal('followUpModal');
    }

    function saveFollowUp() {
        const id = followUpReferralId;
        const r = REFERRALS[id];
        if (!r) return;
        
        r.follow_up_date = document.getElementById('follow_up_date').value;
        r.feedback = document.getElementById('follow_up_feedback').value.trim();
        r.status = 'completed';
        
        updateReferralRow(r);
        closeModal('followUpModal');
        showToast('Follow-up saved for referral #' + r.referral_id, 'success');
    }

    // ============================================================
    // SAVE REFERRAL
    // ============================================================
    function saveReferral(event) {
        event.preventDefault();
        showToast('Referral created successfully!', 'success');
        closeModal('newReferralModal');
    }

    // ============================================================
    // EDIT REFERRAL
    // ============================================================
    function editReferral(id) {
        showToast('Edit referral ID: ' + id + ' (Edit modal coming soon)', 'info');
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
    document.getElementById('searchReferral').addEventListener('input', filterReferrals);
    document.getElementById('filterStatus').addEventListener('change', filterReferrals);
    document.getElementById('filterType').addEventListener('change', filterReferrals);
    document.getElementById('filterUrgency').addEventListener('change', filterReferrals);

    function filterReferrals() {
        const search = document.getElementById('searchReferral').value.toLowerCase();
        const status = document.getElementById('filterStatus').value;
        const type = document.getElementById('filterType').value;
        const urgency = document.getElementById('filterUrgency').value;
        let visibleCount = 0;

        document.querySelectorAll('.referral-row').forEach(row => {
            const patient = row.dataset.patient;
            const specialist = row.dataset.specialist;
            const hospital = row.dataset.hospital;
            const rowStatus = row.dataset.status;
            const rowType = row.dataset.type;
            const rowUrgency = row.dataset.urgency;

            const matchesSearch = patient.includes(search) || specialist.includes(search) || hospital.includes(search);
            const matchesStatus = !status || rowStatus === status;
            const matchesType = !type || rowType === type;
            const matchesUrgency = !urgency || rowUrgency === urgency;
            const isVisible = matchesSearch && matchesStatus && matchesType && matchesUrgency;

            row.style.display = isVisible ? '' : 'none';
            if (isVisible) visibleCount++;
        });

        document.getElementById('emptyState').style.display = visibleCount === 0 ? 'flex' : 'none';
    }

    function resetFilters() {
        document.getElementById('searchReferral').value = '';
        document.getElementById('filterStatus').value = '';
        document.getElementById('filterType').value = '';
        document.getElementById('filterUrgency').value = '';
        document.querySelectorAll('.referral-row').forEach(row => row.style.display = '');
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
        const followUpDate = document.getElementById('ref_follow_up');
        if (followUpDate) {
            const date = new Date();
            date.setDate(date.getDate() + 14);
            followUpDate.value = date.toISOString().split('T')[0];
        }
    });
</script>

<?php include_once '../../includes/footer.php'; ?>