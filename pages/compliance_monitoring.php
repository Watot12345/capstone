<?php include '../includes/header.php'; ?>
<?php include '../includes/sidebar.php'; ?>
<!-- UPDATED -->
<?php
/* ============================================================
   DUMMY DATA (simulates database records, avoids undefined errors)
   ============================================================ */
$stats = [
    'compliance_score' => 94,
    'open_violations'  => 3,
    'overdue_actions'  => 1,
    'pending_inspections' => 2
];

$violations = [
    [
        'id'          => 1,
        'location'    => 'Kitchen Area A',
        'description' => 'Fridge temp above 40°F for > 15 min',
        'severity'    => 'critical',
        'status'      => 'open',
        'timestamp'   => '2026-07-18 09:30 AM'
    ],
    [
        'id'          => 2,
        'location'    => 'Pool Deck',
        'description' => 'Chlorine level below 1.0 ppm',
        'severity'    => 'critical',
        'status'      => 'in_progress',
        'timestamp'   => '2026-07-17 04:15 PM'
    ],
    [
        'id'          => 3,
        'location'    => 'Dishwashing Station',
        'description' => 'Sanitizer concentration too low (50 ppm)',
        'severity'    => 'non-critical',
        'status'      => 'open',
        'timestamp'   => '2026-07-18 08:00 AM'
    ],
    [
        'id'          => 4,
        'location'    => 'Dry Storage',
        'description' => 'Pest droppings found near flour bins',
        'severity'    => 'critical',
        'status'      => 'resolved',
        'timestamp'   => '2026-07-16 11:20 AM'
    ],
];

$actions = [
    [
        'id'           => 101,
        'violation_id' => 1,
        'assigned_to'  => 'John Doe (Maintenance)',
        'due_date'     => '2026-07-18 04:00 PM',
        'status'       => 'in_progress'
    ],
    [
        'id'           => 102,
        'violation_id' => 2,
        'assigned_to'  => 'Sarah Lee (Pool Ops)',
        'due_date'     => '2026-07-17 06:00 PM',
        'status'       => 'overdue'
    ],
    [
        'id'           => 103,
        'violation_id' => 3,
        'assigned_to'  => 'Mike Chen (Kitchen)',
        'due_date'     => '2026-07-18 12:00 PM',
        'status'       => 'open'
    ],
];

$permits = [
    ['name' => 'Food Service License', 'expiry' => '2026-12-31', 'status' => 'active'],
    ['name' => 'Pool Sanitation Permit', 'expiry' => '2026-08-15', 'status' => 'expiring_soon'],
    ['name' => 'Waste Disposal Certificate', 'expiry' => '2025-11-01', 'status' => 'active'],
];

/* Helper to get action status badge color */
function getActionBadge($status) {
    return match ($status) {
        'open'        => 'bg-[#B4D4FF] text-[#0d4f64]',
        'in_progress' => 'bg-[#86B6F6] text-white',
        'overdue'     => 'bg-red-100 text-red-800',
        'resolved'    => 'bg-green-100 text-green-800',
        default       => 'bg-gray-100 text-gray-800',
    };
}
?>

<main class="flex-1 m-5 overflow-hidden rounded-2xl font-sans scrollbar-track-transparent">

        <!-- ============================================================
             ROW 1: KPI STATS CARDS
             ============================================================ -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
            <div class="bg-white rounded-xl shadow-sm border p-5 flex items-center justify-between transition-all duration-300 hover:-translate-y-1 hover:shadow-md" style="border-color: #B4D4FF;">
                <div>
                    <p class="text-sm font-medium" style="color: #176B87;">Compliance Score</p>
                    <p class="text-3xl font-bold" style="color: #0d4f64;"><?= $stats['compliance_score'] ?>%</p>
                </div>
                <div class="w-12 h-12 rounded-full flex items-center justify-center text-xl font-bold transition-all duration-300 hover:scale-110" style="background-color: #B4D4FF; color: #0d4f64;">CS</div>
            </div>
            <div class="bg-white rounded-xl shadow-sm border p-5 flex items-center justify-between transition-all duration-300 hover:-translate-y-1 hover:shadow-md" style="border-color: #B4D4FF;">
                <div>
                    <p class="text-sm font-medium" style="color: #176B87;">Open Violations</p>
                    <p class="text-3xl font-bold" style="color: #0d4f64;"><?= $stats['open_violations'] ?></p>
                </div>
                <div class="w-12 h-12 rounded-full flex items-center justify-center text-xl font-bold transition-all duration-300 hover:scale-110" style="background-color: #B4D4FF; color: #0d4f64;">OV</div>
            </div>
            <div class="bg-white rounded-xl shadow-sm border p-5 flex items-center justify-between transition-all duration-300 hover:-translate-y-1 hover:shadow-md" style="border-color: #B4D4FF;">
                <div>
                    <p class="text-sm font-medium" style="color: #176B87;">Overdue Actions</p>
                    <p class="text-3xl font-bold" style="color: #0d4f64;"><?= $stats['overdue_actions'] ?></p>
                </div>
                <div class="w-12 h-12 rounded-full flex items-center justify-center text-xl font-bold transition-all duration-300 hover:scale-110" style="background-color: #B4D4FF; color: #0d4f64;">OA</div>
            </div>
            <div class="bg-white rounded-xl shadow-sm border p-5 flex items-center justify-between transition-all duration-300 hover:-translate-y-1 hover:shadow-md" style="border-color: #B4D4FF;">
                <div>
                    <p class="text-sm font-medium" style="color: #176B87;">Pending Inspections</p>
                    <p class="text-3xl font-bold" style="color: #0d4f64;"><?= $stats['pending_inspections'] ?></p>
                </div>
                <div class="w-12 h-12 rounded-full flex items-center justify-center text-xl font-bold transition-all duration-300 hover:scale-110" style="background-color: #B4D4FF; color: #0d4f64;">PI</div>
            </div>
        </div>

        <!-- ============================================================
             ROW 2: MONITORING FEED + VIOLATION TABLE
             ============================================================ -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">
            <!-- LEFT: Real-Time Monitoring Feed -->
            <div class="lg:col-span-1 bg-white rounded-xl shadow-sm border p-4 transition-all duration-300 hover:shadow-md" style="border-color: #B4D4FF;">
                <div class="flex items-center justify-between mb-3">
                    <h2 class="font-semibold flex items-center gap-2" style="color: #0d4f64;">
                        <span class="w-2 h-2 rounded-full animate-pulse" style="background-color: #176B87;"></span>
                        Live Alerts
                    </h2>
                    <span class="text-xs" style="color: #86B6F6;">auto‑update</span>
                </div>
                <div class="space-y-3 max-h-[340px] overflow-y-auto pr-1">
                    <!-- Alerts will be dynamically added, but initial ones have hover effects -->
                    <div class="border-l-4 p-3 rounded-r-md transition-all duration-200 hover:bg-[#dce8f5] hover:scale-[1.01]" style="border-color: #176B87; background-color: #EEF5FF;">
                        <div class="flex justify-between"><span class="font-medium" style="color: #0d4f64;">Critical</span><span class="text-xs" style="color: #86B6F6;">09:30</span></div>
                        <p class="text-sm" style="color: #0d4f64;">Fridge temp 42°F – Kitchen A</p>
                    </div>
                    <div class="border-l-4 p-3 rounded-r-md transition-all duration-200 hover:bg-[#dce8f5] hover:scale-[1.01]" style="border-color: #86B6F6; background-color: #EEF5FF;">
                        <div class="flex justify-between"><span class="font-medium" style="color: #176B87;">Warning</span><span class="text-xs" style="color: #86B6F6;">08:45</span></div>
                        <p class="text-sm" style="color: #0d4f64;">Dish sanitizer low – Station #2</p>
                    </div>
                    <div class="border-l-4 p-3 rounded-r-md transition-all duration-200 hover:bg-[#dce8f5] hover:scale-[1.01]" style="border-color: #B4D4FF; background-color: #EEF5FF;">
                        <div class="flex justify-between"><span class="font-medium" style="color: #176B87;">Resolved</span><span class="text-xs" style="color: #86B6F6;">08:10</span></div>
                        <p class="text-sm" style="color: #0d4f64;">Pool chlorine adjusted to 2.0 ppm</p>
                    </div>
                    <div class="border-l-4 p-3 rounded-r-md transition-all duration-200 hover:bg-[#dce8f5] hover:scale-[1.01]" style="border-color: #176B87; background-color: #EEF5FF;">
                        <div class="flex justify-between"><span class="font-medium" style="color: #0d4f64;">Critical</span><span class="text-xs" style="color: #86B6F6;">07:55</span></div>
                        <p class="text-sm" style="color: #0d4f64;">Pest activity detected – Dry Storage</p>
                    </div>
                    <div class="border-l-4 p-3 rounded-r-md transition-all duration-200 hover:bg-[#dce8f5] hover:scale-[1.01]" style="border-color: #86B6F6; background-color: #EEF5FF;">
                        <div class="flex justify-between"><span class="font-medium" style="color: #176B87;">Info</span><span class="text-xs" style="color: #86B6F6;">07:20</span></div>
                        <p class="text-sm" style="color: #0d4f64;">Scheduled walk‑through started</p>
                    </div>
                </div>
                <button class="mt-3 text-sm font-medium flex items-center gap-1 transition-all duration-200 hover:translate-x-1" style="color: #176B87;">
                    View full monitoring log →
                </button>
            </div>

            <!-- RIGHT: Violation Tracking + Corrective Actions -->
            <div class="lg:col-span-2 bg-white rounded-xl shadow-sm border p-4 transition-all duration-300 hover:shadow-md" style="border-color: #B4D4FF;">
                <div class="flex flex-wrap items-center justify-between mb-3 gap-2">
                    <h2 class="font-semibold flex items-center gap-2" style="color: #0d4f64;">
                        Violations & Corrective Actions
                    </h2>
                    <div class="flex items-center gap-2">
                        <label class="text-sm" style="color: #176B87;">Filter:</label>
                        <select id="severityFilter" class="text-sm border rounded-md px-2 py-1 bg-white focus:ring-2 focus:ring-transparent transition-all duration-200 hover:border-[#176B87]" style="border-color: #B4D4FF; color: #0d4f64; outline-color: #176B87;">
                            <option value="all">All</option>
                            <option value="critical">Critical</option>
                            <option value="non-critical">Non‑Critical</option>
                        </select>
                    </div>
                </div>

                <!-- Violation Table -->
                <div class="overflow-x-auto">
                    <table class="w-full text-sm">
                        <thead class="text-gray-600 uppercase text-xs border-b" style="background-color: #EEF5FF; border-color: #B4D4FF;">
                            <tr>
                                <th class="px-3 py-2 text-left" style="color: #0d4f64;">Location</th>
                                <th class="px-3 py-2 text-left" style="color: #0d4f64;">Description</th>
                                <th class="px-3 py-2 text-center" style="color: #0d4f64;">Severity</th>
                                <th class="px-3 py-2 text-center" style="color: #0d4f64;">Status</th>
                                <th class="px-3 py-2 text-right" style="color: #0d4f64;">Action</th>
                            </tr>
                        </thead>
                        <tbody id="violationTableBody">
                            <?php foreach ($violations as $v): ?>
                            <tr class="border-b transition-all duration-150 hover:bg-[#EEF5FF] hover:scale-[1.002] violation-row" style="border-color: #B4D4FF;" data-severity="<?= $v['severity'] ?>">
                                <td class="px-3 py-3 font-medium" style="color: #0d4f64;"><?= htmlspecialchars($v['location']) ?></td>
                                <td class="px-3 py-3 max-w-[180px] truncate" style="color: #176B87;" title="<?= htmlspecialchars($v['description']) ?>">
                                    <?= htmlspecialchars($v['description']) ?>
                                </td>
                                <td class="px-3 py-3 text-center">
                                    <span class="inline-block px-2 py-1 rounded-full text-xs font-semibold transition-all duration-200 hover:scale-105" style="<?= $v['severity'] === 'critical' ? 'background-color: #176B87; color: #EEF5FF;' : 'background-color: #B4D4FF; color: #0d4f64;' ?>">
                                        <?= ucfirst($v['severity']) ?>
                                    </span>
                                </td>
                                <td class="px-3 py-3 text-center">
                                    <span class="inline-block px-2 py-1 rounded-full text-xs font-semibold transition-all duration-200 hover:scale-105"
                                        style="<?= $v['status'] === 'open' ? 'background-color: #176B87; color: #EEF5FF;' : ($v['status'] === 'in_progress' ? 'background-color: #86B6F6; color: white;' : 'background-color: #B4D4FF; color: #0d4f64;') ?>">
                                        <?= ucfirst(str_replace('_', ' ', $v['status'])) ?>
                                    </span>
                                </td>
                                <td class="px-3 py-3 text-right">
                                    <button class="assignActionBtn text-xs font-medium border px-3 py-1 rounded-md transition-all duration-200 hover:bg-[#176B87] hover:text-white hover:border-[#176B87] hover:shadow-sm" style="color: #0d4f64; border-color: #86B6F6; background-color: transparent;" data-violation-id="<?= $v['id'] ?>" data-location="<?= htmlspecialchars($v['location']) ?>">
                                        Assign Action
                                    </button>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

                <!-- Quick Corrective Actions overview -->
                <div class="mt-4 pt-3 border-t" style="border-color: #B4D4FF;">
                    <p class="text-xs mb-2" style="color: #176B87;">Pending Corrective Actions</p>
                    <div class="flex flex-wrap gap-2">
                        <?php foreach ($actions as $a): ?>
                        <div class="border rounded-md px-3 py-1.5 text-xs flex items-center gap-2 transition-all duration-200 hover:scale-105 hover:shadow-sm" style="background-color: #EEF5FF; border-color: #B4D4FF;">
                            <span class="font-medium" style="color: #0d4f64;">#<?= $a['id'] ?></span>
                            <span style="color: #176B87;"><?= htmlspecialchars($a['assigned_to']) ?></span>
                            <span class="inline-block px-1.5 py-0.5 rounded text-[10px] font-bold <?= getActionBadge($a['status']) ?>">
                                <?= strtoupper(str_replace('_', ' ', $a['status'])) ?>
                            </span>
                            <span style="color: #86B6F6;">due <?= date('M d', strtotime($a['due_date'])) ?></span>
                            <?php if ($a['status'] === 'overdue'): ?>
                                <span style="color: #176B87; font-weight: bold;">!</span>
                            <?php endif; ?>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- ============================================================
             ROW 3: REGULATORY COMPLIANCE + AUDIT TOOLS
             ============================================================ -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- Permits & Expiry -->
            <div class="bg-white rounded-xl shadow-sm border p-4 transition-all duration-300 hover:shadow-md" style="border-color: #B4D4FF;">
                <h2 class="font-semibold mb-3 flex items-center gap-2" style="color: #0d4f64;">
                    Regulatory Compliance – Permits
                </h2>
                <ul class="divide-y" style="border-color: #B4D4FF;">
                    <?php foreach ($permits as $p): ?>
                    <li class="py-2 flex items-center justify-between transition-all duration-200 hover:pl-2">
                        <span style="color: #0d4f64;"><?= htmlspecialchars($p['name']) ?></span>
                        <div class="flex items-center gap-3">
                            <span class="text-sm" style="color: #176B87;">Exp: <?= date('M d, Y', strtotime($p['expiry'])) ?></span>
                            <?php if ($p['status'] === 'expiring_soon'): ?>
                                <span class="text-[10px] font-bold px-2 py-1 rounded-full transition-all duration-200 hover:scale-105" style="background-color: #86B6F6; color: white;">EXPIRING SOON</span>
                            <?php else: ?>
                                <span class="text-[10px] font-bold px-2 py-1 rounded-full transition-all duration-200 hover:scale-105" style="background-color: #B4D4FF; color: #0d4f64;">ACTIVE</span>
                            <?php endif; ?>
                        </div>
                    </li>
                    <?php endforeach; ?>
                </ul>
                <button class="mt-3 text-sm font-medium flex items-center gap-1 transition-all duration-200 hover:translate-x-1" style="color: #176B87;">
                    Renew / upload new permit →
                </button>
            </div>

            <!-- Audit Report Generator -->
            <div class="bg-white rounded-xl shadow-sm border p-4 transition-all duration-300 hover:shadow-md" style="border-color: #B4D4FF;">
                <h2 class="font-semibold mb-3 flex items-center gap-2" style="color: #0d4f64;">
                    Compliance Audit & Reporting
                </h2>
                <div class="rounded-lg p-4 border transition-all duration-200 hover:bg-[#e6f0fa]" style="background-color: #EEF5FF; border-color: #B4D4FF;">
                    <p class="text-sm mb-3" style="color: #176B87;">Generate a complete audit trail with all monitoring logs, violations, and corrective actions for any date range.</p>
                    <div class="flex flex-wrap items-center gap-3">
                        <div>
                            <label class="text-xs block" style="color: #176B87;">From</label>
                            <input type="date" id="reportFrom" value="2026-07-01" class="border rounded-md px-2 py-1 text-sm transition-all duration-200 hover:border-[#176B87]" style="border-color: #B4D4FF; color: #0d4f64; background-color: white;">
                        </div>
                        <div>
                            <label class="text-xs block" style="color: #176B87;">To</label>
                            <input type="date" id="reportTo" value="2026-07-18" class="border rounded-md px-2 py-1 text-sm transition-all duration-200 hover:border-[#176B87]" style="border-color: #B4D4FF; color: #0d4f64; background-color: white;">
                        </div>
                        <button id="generateReportBtn" class="mt-1 text-white text-sm font-medium px-4 py-2 rounded-md transition-all duration-200 hover:scale-105 hover:shadow-md flex items-center gap-2" style="background-color: #176B87;">
                            Generate Report
                        </button>
                    </div>
                    <div id="reportStatus" class="mt-3 text-sm hidden"></div>
                </div>
                <div class="mt-3 flex items-center justify-between text-xs border-t pt-3" style="border-color: #B4D4FF; color: #86B6F6;">
                    <span>Last audit: July 17, 2026 (all clear)</span>
                    <span class="font-medium transition-all duration-200 hover:text-[#0d4f64]" style="color: #176B87;">Compliant</span>
                </div>
            </div>
        </div>

    </div>
</main>

<!-- ============================================================
     MODAL: Assign Corrective Action (hidden by default)
     ============================================================ -->
<div id="actionModal" class="fixed inset-0 bg-black/40 backdrop-blur-sm flex items-center justify-center z-50 hidden transition-all duration-300">
    <div class="bg-white rounded-2xl shadow-2xl max-w-md w-full mx-4 p-6 animate-fadeIn scale-95 transition-all duration-300">
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-lg font-bold" style="color: #0d4f64;">Assign Corrective Action</h3>
            <button id="closeModalBtn" class="text-2xl leading-none transition-all duration-200 hover:rotate-90" style="color: #86B6F6;">&times;</button>
        </div>
        <form id="actionForm" onsubmit="return false;">
            <input type="hidden" id="modalViolationId">
            <div class="mb-3">
                <label class="block text-sm font-medium" style="color: #0d4f64;">Violation</label>
                <p id="modalViolationDesc" class="text-sm p-2 rounded border mt-1" style="background-color: #EEF5FF; border-color: #B4D4FF; color: #176B87;">—</p>
            </div>
            <div class="mb-3">
                <label for="assignedTo" class="block text-sm font-medium" style="color: #0d4f64;">Assign to</label>
                <input type="text" id="assignedTo" placeholder="e.g. John Doe" class="w-full border rounded-md px-3 py-2 text-sm focus:ring-2 focus:ring-transparent transition-all duration-200 hover:border-[#176B87]" style="border-color: #B4D4FF; color: #0d4f64; outline-color: #176B87;">
            </div>
            <div class="mb-3">
                <label for="dueDate" class="block text-sm font-medium" style="color: #0d4f64;">Due Date &amp; Time</label>
                <input type="datetime-local" id="dueDate" class="w-full border rounded-md px-3 py-2 text-sm focus:ring-2 focus:ring-transparent transition-all duration-200 hover:border-[#176B87]" style="border-color: #B4D4FF; color: #0d4f64; outline-color: #176B87;">
            </div>
            <div class="mb-4">
                <label for="proofUpload" class="block text-sm font-medium" style="color: #0d4f64;">Proof attachment (optional)</label>
                <input type="file" id="proofUpload" accept="image/*" class="w-full text-sm file:mr-3 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm transition-all duration-200 file:transition file:duration-200 file:hover:bg-[#176B87] file:hover:text-white" style="color: #86B6F6; background-color: transparent;">
            </div>
            <div class="flex gap-3">
                <button type="button" id="submitActionBtn" class="flex-1 text-white font-medium py-2 rounded-md transition-all duration-200 hover:scale-105 hover:shadow-md" style="background-color: #176B87;">Assign Action</button>
                <button type="button" id="cancelModalBtn" class="flex-1 font-medium py-2 rounded-md transition-all duration-200 hover:bg-[#dce8f5]" style="background-color: #EEF5FF; color: #0d4f64;">Cancel</button>
            </div>
        </form>
        <p id="actionFeedback" class="mt-3 text-sm text-center hidden"></p>
    </div>
</div>

<!-- ============================================================
     JAVASCRIPT
     ============================================================ -->
<script>
    (function() {
        'use strict';

        // ----- 1. LIVE CLOCK -----
        function updateClock() {
            const now = new Date();
            const str = now.toLocaleString('en-US', {
                weekday: 'short',
                month: 'short',
                day: 'numeric',
                hour: '2-digit',
                minute: '2-digit',
                second: '2-digit'
            });
            const el = document.getElementById('liveClock');
            if (el) el.textContent = str;
        }
        updateClock();
        setInterval(updateClock, 1000);

        // ----- 2. SEVERITY FILTER -----
        const filterSelect = document.getElementById('severityFilter');
        const rows = document.querySelectorAll('.violation-row');

        if (filterSelect) {
            filterSelect.addEventListener('change', function() {
                const val = this.value;
                rows.forEach(row => {
                    const sev = row.getAttribute('data-severity');
                    if (val === 'all' || sev === val) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                });
            });
        }

        // ----- 3. MODAL LOGIC (Assign Corrective Action) -----
        const modal = document.getElementById('actionModal');
        const openBtns = document.querySelectorAll('.assignActionBtn');
        const closeModalBtn = document.getElementById('closeModalBtn');
        const cancelModalBtn = document.getElementById('cancelModalBtn');
        const modalViolationDesc = document.getElementById('modalViolationDesc');
        const modalViolationId = document.getElementById('modalViolationId');
        const assignedTo = document.getElementById('assignedTo');
        const dueDate = document.getElementById('dueDate');
        const submitBtn = document.getElementById('submitActionBtn');
        const feedback = document.getElementById('actionFeedback');

        function openModal(violationId, location) {
            let desc = 'Violation #' + violationId;
            rows.forEach(row => {
                const btn = row.querySelector('.assignActionBtn');
                if (btn && btn.dataset.violationId == violationId) {
                    const descTd = row.querySelectorAll('td')[1];
                    if (descTd) desc = descTd.textContent.trim();
                }
            });
            modalViolationId.value = violationId;
            modalViolationDesc.textContent = location + ' – ' + desc;
            assignedTo.value = '';
            dueDate.value = '';
            feedback.classList.add('hidden');
            feedback.textContent = '';
            modal.classList.remove('hidden');
            // Scale animation
            const modalContent = modal.querySelector('.bg-white');
            modalContent.style.transform = 'scale(1)';
        }

        function closeModal() {
            const modalContent = modal.querySelector('.bg-white');
            modalContent.style.transform = 'scale(0.95)';
            setTimeout(() => {
                modal.classList.add('hidden');
            }, 200);
        }

        openBtns.forEach(btn => {
            btn.addEventListener('click', function(e) {
                const id = this.dataset.violationId;
                const loc = this.dataset.location || 'Unknown';
                openModal(id, loc);
            });
        });

        if (closeModalBtn) closeModalBtn.addEventListener('click', closeModal);
        if (cancelModalBtn) cancelModalBtn.addEventListener('click', closeModal);

        modal.addEventListener('click', function(e) {
            if (e.target === this) closeModal();
        });

        // ----- 4. SUBMIT ACTION (simulated) -----
        if (submitBtn) {
            submitBtn.addEventListener('click', function() {
                const id = modalViolationId.value;
                const assign = assignedTo.value.trim();
                const due = dueDate.value;

                if (!assign || !due) {
                    feedback.classList.remove('hidden');
                    feedback.textContent = 'Please fill in both "Assign to" and "Due Date".';
                    feedback.className = 'mt-3 text-sm text-center';
                    feedback.style.color = '#0d4f64';
                    return;
                }

                feedback.classList.remove('hidden');
                feedback.textContent = '✅ Corrective action assigned to ' + assign + ' (due ' + new Date(due)
                    .toLocaleString() + ')';
                feedback.className = 'mt-3 text-sm text-center';
                feedback.style.color = '#176B87';

                const container = document.querySelector('.flex.flex-wrap.gap-2');
                if (container) {
                    const newPill = document.createElement('div');
                    newPill.className = 'border rounded-md px-3 py-1.5 text-xs flex items-center gap-2 transition-all duration-200 hover:scale-105 hover:shadow-sm';
                    newPill.style.backgroundColor = '#EEF5FF';
                    newPill.style.borderColor = '#B4D4FF';
                    newPill.innerHTML = `
                                <span class="font-medium" style="color: #0d4f64;">NEW</span>
                                <span style="color: #176B87;">${assign}</span>
                                <span class="inline-block px-1.5 py-0.5 rounded text-[10px] font-bold" style="background-color: #86B6F6; color: white;">OPEN</span>
                                <span style="color: #86B6F6;">due ${new Date(due).toLocaleDateString()}</span>
                            `;
                    container.prepend(newPill);
                }

                setTimeout(closeModal, 2000);
            });
        }

        // ----- 5. REPORT GENERATOR (simulated) -----
        const genBtn = document.getElementById('generateReportBtn');
        const reportStatus = document.getElementById('reportStatus');

        if (genBtn) {
            genBtn.addEventListener('click', function() {
                const from = document.getElementById('reportFrom').value;
                const to = document.getElementById('reportTo').value;
                if (!from || !to) {
                    reportStatus.classList.remove('hidden');
                    reportStatus.textContent = 'Please select both date ranges.';
                    reportStatus.className = 'mt-3 text-sm';
                    reportStatus.style.color = '#0d4f64';
                    return;
                }

                reportStatus.classList.remove('hidden');
                reportStatus.textContent = '⏳ Generating audit report from ' + from + ' to ' + to + ' ...';
                reportStatus.className = 'mt-3 text-sm';
                reportStatus.style.color = '#176B87';

                setTimeout(() => {
                    reportStatus.textContent = '✅ Audit report generated – includes 4 violations, 3 actions.';
                    reportStatus.className = 'mt-3 text-sm font-medium';
                    reportStatus.style.color = '#0d4f64';
                }, 1500);
            });
        }

        // ----- 6. KEYBOARD SHORTCUT: ESC to close modal -----
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && modal && !modal.classList.contains('hidden')) {
                closeModal();
            }
        });

        // ----- 7. AUTO-REFRESH SIMULATION (new alert every 30s) -----
        setInterval(function() {
            const feed = document.querySelector('.space-y-3');
            if (!feed) return;
            const alerts = [
                { type: 'info', msg: '🧼 Sanitation walk‑through completed – all clear' },
                { type: 'warning', msg: '⚠️ Hand sanitizer station #3 empty – restock needed' },
                { type: 'critical', msg: '🔥 Dishwasher temp below 160°F – check heating element' },
            ];
            const rand = alerts[Math.floor(Math.random() * alerts.length)];
            const newAlert = document.createElement('div');
            newAlert.className = 'border-l-4 p-3 rounded-r-md transition-all duration-200 hover:bg-[#dce8f5] hover:scale-[1.01] animate-slideIn';
            newAlert.style.borderColor = rand.type === 'critical' ? '#176B87' : rand.type === 'warning' ?
                '#86B6F6' : '#B4D4FF';
            newAlert.style.backgroundColor = '#EEF5FF';
            newAlert.innerHTML = `
                        <div class="flex justify-between">
                            <span class="font-medium" style="color: #0d4f64;">${rand.type.toUpperCase()}</span>
                            <span class="text-xs" style="color: #86B6F6;">just now</span>
                        </div>
                        <p class="text-sm" style="color: #0d4f64;">${rand.msg}</p>
                    `;
            feed.prepend(newAlert);
            if (feed.children.length > 8) {
                feed.removeChild(feed.lastChild);
            }
        }, 30000);

        console.log('Health Sanitation Dashboard initialized.');
    })();
</script>

<!-- CSS Animations & Hover Effects -->
<style>
    /* Fade-in for header */
    .animate-fadeIn {
        animation: fadeIn 0.6s ease-out forwards;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(-10px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Slide-in for new alerts */
    .animate-slideIn {
        animation: slideIn 0.4s ease-out forwards;
    }

    @keyframes slideIn {
        from {
            opacity: 0;
            transform: translateX(-20px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    /* Modal scale animation */
    #actionModal .bg-white {
        transform: scale(0.95);
        transition: transform 0.2s ease-out;
    }

    #actionModal:not(.hidden) .bg-white {
        transform: scale(1);
    }

    /* Custom scrollbar for feed */
    .space-y-3::-webkit-scrollbar {
        width: 4px;
    }

    .space-y-3::-webkit-scrollbar-track {
        background: #EEF5FF;
        border-radius: 8px;
    }

    .space-y-3::-webkit-scrollbar-thumb {
        background: #B4D4FF;
        border-radius: 8px;
    }

    .space-y-3::-webkit-scrollbar-thumb:hover {
        background: #86B6F6;
    }

    /* Hover glow for stat cards */
    .hover\:shadow-md:hover {
        box-shadow: 0 8px 20px rgba(23, 107, 135, 0.12);
    }

    /* Button hover glow */
    button.hover\:shadow-md:hover {
        box-shadow: 0 4px 12px rgba(23, 107, 135, 0.3);
    }

    /* Table row hover scale */
    .violation-row:hover {
        transform: scale(1.002);
    }

    /* Input focus glow */
    input:focus, select:focus {
        box-shadow: 0 0 0 3px rgba(23, 107, 135, 0.2);
        border-color: #176B87;
    }

    /* File input hover */
    input[type="file"]::file-selector-button {
        transition: background-color 0.2s, color 0.2s;
    }
    input[type="file"]::file-selector-button:hover {
        background-color: #176B87;
        color: white;
    }
</style>

<?php include '../includes/footer.php'; ?>