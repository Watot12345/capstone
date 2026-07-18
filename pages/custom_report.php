<?php include '../includes/header.php'; ?>
<?php include '../includes/sidebar.php'; ?>
<!-- UPDATED -->
<main class="flex-1 bg-dash-bg h-screen m-5  rounded-2xl font-sans overflow-y-auto scrollbar-track-transparent">

    <!-- ─── CONFIGURATION CARD ─── -->
    <div class="report-card rounded-3xl p-5 sm:p-7 mb-8">
        <!-- Card Shapes -->
        <div class="card-shape card-shape-1"></div>
        <div class="card-shape card-shape-2"></div>
        <div class="card-shape card-shape-3"></div>
        <div class="dot-pattern absolute inset-0"></div>

        <div class="relative z-10">
            <div class="flex flex-wrap items-start justify-between gap-4 mb-5">
                <div>
                    <h3 class="text-base font-semibold text-[#176B87] flex items-center gap-2">
                        <i class="fa-solid fa-sliders text-[#86B6F6] text-sm"></i>
                        Report Configuration
                    </h3>
                    <p class="text-xs text-slate-400 mt-0.5">Customize your report parameters below</p>
                </div>
                <div class="flex flex-wrap gap-2">
                    <button class="btn-outline-primary px-4 py-1.5 rounded-xl text-xs font-medium flex items-center gap-2">
                        <i class="fa-regular fa-floppy-disk"></i> Save Template
                    </button>
                    <button class="btn-outline-primary px-4 py-1.5 rounded-xl text-xs font-medium flex items-center gap-2">
                        <i class="fa-regular fa-folder-open"></i> Load Template
                    </button>
                </div>
            </div>

            <!-- filters grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">

                <div>
                    <label class="block text-xs font-semibold text-[#176B87] uppercase tracking-wider mb-1.5">
                        <i class="fa-regular fa-file-lines mr-1"></i> Report Type
                    </label>
                    <select id="reportType" class="w-full rounded-xl px-4 py-2.5 text-sm">
                        <option value="inspection">Sanitation Inspection</option>
                        <option value="water">Water Quality Analysis</option>
                        <option value="waste">Waste Management</option>
                        <option value="compliance">Compliance Summary</option>
                        <option value="incident">Incident Report</option>
                        <option value="custom">Custom Report</option>
                    </select>
                </div>

                <div>
                    <label class="block text-xs font-semibold text-[#176B87] uppercase tracking-wider mb-1.5">
                        <i class="fa-regular fa-calendar mr-1"></i> Date Range
                    </label>
                    <div class="flex items-center gap-2">
                        <input type="date" id="startDate" value="2026-06-01" class="w-full rounded-xl px-4 py-2.5 text-sm" />
                        <span class="text-slate-400 text-xs">to</span>
                        <input type="date" id="endDate" value="2026-07-18" class="w-full rounded-xl px-4 py-2.5 text-sm" />
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-semibold text-[#176B87] uppercase tracking-wider mb-1.5">
                        <i class="fa-regular fa-building mr-1"></i> Facility
                    </label>
                    <select id="facility" class="w-full rounded-xl px-4 py-2.5 text-sm">
                        <option value="all">All Facilities</option>
                        <option value="central">Central Health Center</option>
                        <option value="east">Eastside Clinic</option>
                        <option value="west">West District Hospital</option>
                        <option value="north">North Community Hub</option>
                        <option value="south">South Sanitation Depot</option>
                    </select>
                </div>

                <div>
                    <label class="block text-xs font-semibold text-[#176B87] uppercase tracking-wider mb-1.5">
                        <i class="fa-regular fa-user mr-1"></i> Inspector
                    </label>
                    <select id="inspector" class="w-full rounded-xl px-4 py-2.5 text-sm">
                        <option value="all">All Inspectors</option>
                        <option value="dr_omari">Dr. Omari</option>
                        <option value="ms_kenya">Ms. Kenya</option>
                        <option value="mr_tanz">Mr. Tanzania</option>
                        <option value="dr_uganda">Dr. Uganda</option>
                    </select>
                </div>

            </div>

            <!-- second row -->
            <div class="mt-5 flex flex-wrap items-center justify-between gap-4 pt-4 border-t border-[#B4D4FF]/30">
                <div class="flex flex-wrap items-center gap-3">
                    <span class="text-xs font-medium text-slate-500">Status:</span>
                    <div class="flex flex-wrap gap-1.5">
                        <span class="filter-chip active px-3 py-1 rounded-full text-xs font-medium">All</span>
                        <span class="filter-chip px-3 py-1 rounded-full text-xs font-medium">Compliant</span>
                        <span class="filter-chip px-3 py-1 rounded-full text-xs font-medium">Non-Compliant</span>
                        <span class="filter-chip px-3 py-1 rounded-full text-xs font-medium">Pending</span>
                        <span class="filter-chip px-3 py-1 rounded-full text-xs font-medium">Urgent</span>
                    </div>
                </div>
                <div class="flex items-center gap-2">
                    <button onclick="generateReport()" class="btn-primary px-6 py-2.5 rounded-xl text-sm font-semibold text-white flex items-center gap-2">
                        <i class="fa-solid fa-play"></i> Generate Report
                    </button>
                    <button class="px-4 py-2.5 rounded-xl text-sm font-medium border border-[#B4D4FF]/40 bg-white/50 backdrop-blur-sm text-slate-600 hover:bg-[#B4D4FF]/20 transition flex items-center gap-2">
                        <i class="fa-regular fa-circle-xmark"></i> Reset
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- ─── QUICK STATS ─── -->
    <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 mb-8">
        <!-- Stat 1 -->
        <div class="stat-card rounded-2xl p-4">
            <div class="card-shape card-shape-sm"></div>
            <div class="relative z-10">
                <div class="flex items-center justify-between">
                    <span class="text-xs font-medium text-slate-400 uppercase tracking-wider">Total Inspections</span>
                    <span class="w-8 h-8 rounded-xl bg-[#B4D4FF]/30 flex items-center justify-center text-[#176B87]"><i class="fa-regular fa-clipboard text-sm"></i></span>
                </div>
                <p class="text-2xl font-bold text-[#176B87] mt-1.5">1,284</p>
                <span class="text-[10px] text-emerald-600 bg-emerald-50/70 px-2 py-0.5 rounded-full inline-flex items-center gap-1 mt-0.5"><i class="fa-solid fa-arrow-up text-[8px]"></i> +12.5%</span>
            </div>
        </div>
        <!-- Stat 2 -->
        <div class="stat-card rounded-2xl p-4">
            <div class="card-shape card-shape-sm" style="background: #86B6F6; top: -5px; right: -5px;"></div>
            <div class="relative z-10">
                <div class="flex items-center justify-between">
                    <span class="text-xs font-medium text-slate-400 uppercase tracking-wider">Compliance Rate</span>
                    <span class="w-8 h-8 rounded-xl bg-[#86B6F6]/30 flex items-center justify-center text-[#176B87]"><i class="fa-regular fa-circle-check text-sm"></i></span>
                </div>
                <p class="text-2xl font-bold text-[#176B87] mt-1.5">94.7%</p>
                <span class="text-[10px] text-emerald-600 bg-emerald-50/70 px-2 py-0.5 rounded-full inline-flex items-center gap-1 mt-0.5"><i class="fa-solid fa-arrow-up text-[8px]"></i> +2.3%</span>
            </div>
        </div>
        <!-- Stat 3 -->
        <div class="stat-card rounded-2xl p-4">
            <div class="card-shape card-shape-sm" style="background: #176B87; bottom: -5px; left: -5px; opacity: 0.10;"></div>
            <div class="relative z-10">
                <div class="flex items-center justify-between">
                    <span class="text-xs font-medium text-slate-400 uppercase tracking-wider">Urgent Issues</span>
                    <span class="w-8 h-8 rounded-xl bg-red-100/50 flex items-center justify-center text-red-500"><i class="fa-regular fa-circle-exclamation text-sm"></i></span>
                </div>
                <p class="text-2xl font-bold text-[#176B87] mt-1.5">37</p>
                <span class="text-[10px] text-red-500 bg-red-50/70 px-2 py-0.5 rounded-full inline-flex items-center gap-1 mt-0.5"><i class="fa-solid fa-arrow-up text-[8px]"></i> +4</span>
            </div>
        </div>
        <!-- Stat 4 -->
        <div class="stat-card rounded-2xl p-4">
            <div class="card-shape card-shape-sm" style="background: #B4D4FF; top: 0px; right: 0px; opacity: 0.30;"></div>
            <div class="relative z-10">
                <div class="flex items-center justify-between">
                    <span class="text-xs font-medium text-slate-400 uppercase tracking-wider">Facilities Covered</span>
                    <span class="w-8 h-8 rounded-xl bg-purple-100/50 flex items-center justify-center text-purple-600"><i class="fa-regular fa-hospital text-sm"></i></span>
                </div>
                <p class="text-2xl font-bold text-[#176B87] mt-1.5">47</p>
                <span class="text-[10px] text-slate-400 bg-slate-100/70 px-2 py-0.5 rounded-full inline-flex items-center gap-1 mt-0.5">of 52 total</span>
            </div>
        </div>
    </div>

    <!-- ─── REPORT PREVIEW CARD ─── -->
    <div class="report-card rounded-3xl overflow-hidden mb-8">
        <div class="card-shape card-shape-4"></div>
        <div class="card-shape card-shape-2" style="top: 20%; right: 10%;"></div>
        <div class="dot-pattern absolute inset-0"></div>

        <div class="relative z-10">
            <!-- tabs -->
            <div class="flex items-center justify-between px-5 sm:px-7 pt-4 pb-0 border-b border-[#B4D4FF]/30 flex-wrap gap-2">
                <div class="flex gap-5 text-sm overflow-x-auto">
                    <button class="tab-btn active pb-3" data-tab="chart">
                        <i class="fa-regular fa-chart-bar"></i> Chart View
                    </button>
                    <button class="tab-btn pb-3" data-tab="table">
                        <i class="fa-regular fa-table"></i> Table View
                    </button>
                    <button class="tab-btn pb-3" data-tab="summary">
                        <i class="fa-regular fa-file-lines"></i> Summary
                    </button>
                </div>
                <div class="flex items-center gap-2 pb-2">
                    <button class="p-1.5 rounded-lg hover:bg-[#B4D4FF]/30 text-slate-400 hover:text-[#176B87] transition text-sm" title="Export PDF"><i class="fa-regular fa-file-pdf"></i></button>
                    <button class="p-1.5 rounded-lg hover:bg-[#B4D4FF]/30 text-slate-400 hover:text-[#176B87] transition text-sm" title="Export Excel"><i class="fa-regular fa-file-excel"></i></button>
                    <button class="p-1.5 rounded-lg hover:bg-[#B4D4FF]/30 text-slate-400 hover:text-[#176B87] transition text-sm" title="Export CSV"><i class="fa-regular fa-file-csv"></i></button>
                    <button class="p-1.5 rounded-lg hover:bg-[#B4D4FF]/30 text-slate-400 hover:text-[#176B87] transition text-sm" title="Print"><i class="fa-regular fa-print"></i></button>
                    <button onclick="openScheduleModal()" class="ml-1 px-3 py-1.5 rounded-lg bg-[#B4D4FF]/30 text-[#176B87] text-xs font-medium hover:bg-[#86B6F6]/40 transition flex items-center gap-1.5">
                        <i class="fa-regular fa-clock"></i> Schedule
                    </button>
                </div>
            </div>

            <!-- tab content -->
            <div class="p-5 sm:p-7">

                <!-- Chart View -->
                <div id="tabChart" class="tab-content">
                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                        <div class="lg:col-span-2 bg-white/40 backdrop-blur-sm rounded-xl p-4 border border-[#B4D4FF]/20 relative overflow-hidden">
                            <div class="card-shape card-shape-3" style="opacity: 0.05; width: 100px; height: 100px; bottom: -30px; right: -30px;"></div>
                            <div class="relative z-10">
                                <div class="flex items-center justify-between mb-3">
                                    <h4 class="text-sm font-semibold text-[#176B87]">Sanitation Compliance by Facility</h4>
                                    <span class="text-[10px] text-slate-400 bg-white/50 px-2 py-0.5 rounded-full border border-[#B4D4FF]/20">Jul 2026</span>
                                </div>
                                <div class="chart-container">
                                    <canvas id="barChart"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="space-y-5">
                            <div class="bg-white/40 backdrop-blur-sm rounded-xl p-4 border border-[#B4D4FF]/20 relative overflow-hidden">
                                <div class="card-shape card-shape-sm" style="width: 60px; height: 60px; bottom: -20px; right: -20px; background: #86B6F6;"></div>
                                <div class="relative z-10">
                                    <h4 class="text-sm font-semibold text-[#176B87] mb-2">Overall Status</h4>
                                    <div class="chart-container" style="height:140px;">
                                        <canvas id="doughnutChart"></canvas>
                                    </div>
                                </div>
                            </div>
                            <div class="bg-white/40 backdrop-blur-sm rounded-xl p-4 border border-[#B4D4FF]/20 relative overflow-hidden">
                                <div class="card-shape card-shape-sm" style="width: 40px; height: 40px; top: -10px; left: -10px; background: #176B87; opacity: 0.10;"></div>
                                <div class="relative z-10">
                                    <h4 class="text-sm font-semibold text-[#176B87] mb-1">Trend (last 6 mo)</h4>
                                    <div class="chart-container" style="height:80px;">
                                        <canvas id="lineChart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Table View -->
                <div id="tabTable" class="tab-content hidden">
                    <div class="table-wrap">
                        <table class="w-full text-sm">
                            <thead>
                                <tr class="text-left text-xs font-semibold text-[#176B87] uppercase tracking-wider border-b border-[#B4D4FF]/30">
                                    <th class="pb-3 pr-4">Facility</th>
                                    <th class="pb-3 pr-4">Inspector</th>
                                    <th class="pb-3 pr-4">Date</th>
                                    <th class="pb-3 pr-4">Score</th>
                                    <th class="pb-3 pr-4">Status</th>
                                    <th class="pb-3">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-[#B4D4FF]/20">
                                <tr class="table-row-hover">
                                    <td class="py-3 pr-4 font-medium text-[#176B87]">Central Health Center</td>
                                    <td class="py-3 pr-4 text-slate-600">Dr. Omari</td>
                                    <td class="py-3 pr-4 text-slate-500">2026-07-15</td>
                                    <td class="py-3 pr-4 font-semibold">96 / 100</td>
                                    <td class="py-3 pr-4"><span class="status-badge bg-emerald-100/70 text-emerald-700">Compliant</span></td>
                                    <td><button class="text-[#176B87] hover:underline text-xs font-medium">view</button></td>
                                </tr>
                                <tr class="table-row-hover">
                                    <td class="py-3 pr-4 font-medium text-[#176B87]">Eastside Clinic</td>
                                    <td class="py-3 pr-4 text-slate-600">Ms. Kenya</td>
                                    <td class="py-3 pr-4 text-slate-500">2026-07-14</td>
                                    <td class="py-3 pr-4 font-semibold">82 / 100</td>
                                    <td class="py-3 pr-4"><span class="status-badge bg-amber-100/70 text-amber-700">Pending</span></td>
                                    <td><button class="text-[#176B87] hover:underline text-xs font-medium">view</button></td>
                                </tr>
                                <tr class="table-row-hover">
                                    <td class="py-3 pr-4 font-medium text-[#176B87]">West District Hospital</td>
                                    <td class="py-3 pr-4 text-slate-600">Mr. Tanzania</td>
                                    <td class="py-3 pr-4 text-slate-500">2026-07-12</td>
                                    <td class="py-3 pr-4 font-semibold">68 / 100</td>
                                    <td class="py-3 pr-4"><span class="status-badge bg-red-100/70 text-red-700">Urgent</span></td>
                                    <td><button class="text-[#176B87] hover:underline text-xs font-medium">view</button></td>
                                </tr>
                                <tr class="table-row-hover">
                                    <td class="py-3 pr-4 font-medium text-[#176B87]">North Community Hub</td>
                                    <td class="py-3 pr-4 text-slate-600">Dr. Uganda</td>
                                    <td class="py-3 pr-4 text-slate-500">2026-07-10</td>
                                    <td class="py-3 pr-4 font-semibold">91 / 100</td>
                                    <td class="py-3 pr-4"><span class="status-badge bg-emerald-100/70 text-emerald-700">Compliant</span></td>
                                    <td><button class="text-[#176B87] hover:underline text-xs font-medium">view</button></td>
                                </tr>
                                <tr class="table-row-hover">
                                    <td class="py-3 pr-4 font-medium text-[#176B87]">South Sanitation Depot</td>
                                    <td class="py-3 pr-4 text-slate-600">Dr. Omari</td>
                                    <td class="py-3 pr-4 text-slate-500">2026-07-08</td>
                                    <td class="py-3 pr-4 font-semibold">74 / 100</td>
                                    <td class="py-3 pr-4"><span class="status-badge bg-red-100/70 text-red-700">Non-Compliant</span></td>
                                    <td><button class="text-[#176B87] hover:underline text-xs font-medium">view</button></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-4 flex flex-wrap items-center justify-between text-xs text-slate-400 border-t border-[#B4D4FF]/30 pt-3 gap-2">
                        <span>Showing 5 of 47 entries</span>
                        <div class="flex gap-2">
                            <button class="px-3 py-1 rounded-lg border border-[#B4D4FF]/30 hover:bg-[#B4D4FF]/20 transition">Prev</button>
                            <button class="px-3 py-1 rounded-lg bg-[#176B87] text-white shadow-sm shadow-[#176B87]/20">1</button>
                            <button class="px-3 py-1 rounded-lg border border-[#B4D4FF]/30 hover:bg-[#B4D4FF]/20 transition">2</button>
                            <button class="px-3 py-1 rounded-lg border border-[#B4D4FF]/30 hover:bg-[#B4D4FF]/20 transition">3</button>
                            <button class="px-3 py-1 rounded-lg border border-[#B4D4FF]/30 hover:bg-[#B4D4FF]/20 transition">Next</button>
                        </div>
                    </div>
                </div>

                <!-- Summary View -->
                <div id="tabSummary" class="tab-content hidden">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        <div>
                            <h4 class="text-sm font-semibold text-[#176B87] mb-3">📌 Executive Summary</h4>
                            <div class="space-y-2.5 text-sm text-slate-600 leading-relaxed">
                                <p>This report covers <strong class="text-[#176B87]">47 facilities</strong> across the region, with a total of <strong class="text-[#176B87]">1,284 inspections</strong> conducted between <strong>June 1 – July 18, 2026</strong>.</p>
                                <p>The overall compliance rate stands at <strong class="text-emerald-600">94.7%</strong>, reflecting a <strong>+2.3%</strong> improvement over the previous period. However, <strong class="text-red-500">37 urgent issues</strong> were identified, requiring immediate intervention.</p>
                                <p>Key areas of concern include waste disposal protocols at 3 facilities and water quality testing at 2 locations. Recommended actions are outlined in the full report.</p>
                            </div>
                            <div class="mt-4 flex flex-wrap gap-2">
                                <span class="px-3 py-1 bg-[#B4D4FF]/30 text-[#176B87] rounded-full text-xs font-medium">🔹 Compliance ↑</span>
                                <span class="px-3 py-1 bg-amber-100/60 text-amber-700 rounded-full text-xs font-medium">⚠️ Pending: 12</span>
                                <span class="px-3 py-1 bg-red-100/60 text-red-700 rounded-full text-xs font-medium">🚨 Urgent: 37</span>
                            </div>
                        </div>
                        <div>
                            <h4 class="text-sm font-semibold text-[#176B87] mb-3">📊 Key Metrics</h4>
                            <div class="space-y-3">
                                <div>
                                    <div class="flex justify-between text-xs"><span>Compliance Rate</span><span class="font-semibold text-[#176B87]">94.7%</span></div>
                                    <div class="w-full h-2 bg-[#B4D4FF]/30 rounded-full mt-1"><div class="h-2 bg-[#176B87] rounded-full" style="width:94.7%"></div></div>
                                </div>
                                <div>
                                    <div class="flex justify-between text-xs"><span>Inspection Coverage</span><span class="font-semibold text-[#176B87]">90.4%</span></div>
                                    <div class="w-full h-2 bg-[#B4D4FF]/30 rounded-full mt-1"><div class="h-2 bg-[#86B6F6] rounded-full" style="width:90.4%"></div></div>
                                </div>
                                <div>
                                    <div class="flex justify-between text-xs"><span>Issue Resolution Rate</span><span class="font-semibold text-[#176B87]">78.2%</span></div>
                                    <div class="w-full h-2 bg-[#B4D4FF]/30 rounded-full mt-1"><div class="h-2 bg-[#B4D4FF] rounded-full" style="width:78.2%"></div></div>
                                </div>
                                <div>
                                    <div class="flex justify-between text-xs"><span>Facility Participation</span><span class="font-semibold text-[#176B87]">100%</span></div>
                                    <div class="w-full h-2 bg-[#B4D4FF]/30 rounded-full mt-1"><div class="h-2 bg-[#176B87] rounded-full" style="width:100%"></div></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- ─── RECENT REPORTS CARD ─── -->
    <div class="report-card rounded-3xl p-5 sm:p-7">
        <div class="card-shape card-shape-1" style="top: -40px; right: -40px; width: 150px; height: 150px;"></div>
        <div class="card-shape card-shape-2" style="bottom: -30px; left: -30px; width: 100px; height: 100px;"></div>
        <div class="dot-pattern absolute inset-0"></div>

        <div class="relative z-10">
            <div class="flex items-center justify-between mb-4">
                <div>
                    <h3 class="text-base font-semibold text-[#176B87] flex items-center gap-2">
                        <i class="fa-regular fa-clock-rotate-left text-[#86B6F6] text-sm"></i>
                        Recent Reports
                    </h3>
                    <p class="text-xs text-slate-400">Last 5 generated reports</p>
                </div>
                <button class="text-sm font-medium text-[#176B87] hover:underline">View All →</button>
            </div>
            <div class="table-wrap">
                <table class="w-full text-sm">
                    <thead class="text-left text-xs font-semibold text-[#176B87] uppercase tracking-wider border-b border-[#B4D4FF]/30">
                        <tr>
                            <th class="pb-2 pr-4">Report Name</th>
                            <th class="pb-2 pr-4">Type</th>
                            <th class="pb-2 pr-4">Date</th>
                            <th class="pb-2 pr-4">Status</th>
                            <th class="pb-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-[#B4D4FF]/20">
                        <tr class="table-row-hover">
                            <td class="py-2.5 pr-4 font-medium text-[#176B87]">Q3 Sanitation Overview</td>
                            <td class="py-2.5 pr-4 text-slate-500">Inspection</td>
                            <td class="py-2.5 pr-4 text-slate-500">2026-07-18</td>
                            <td class="py-2.5 pr-4"><span class="status-badge bg-emerald-100/70 text-emerald-700">Generated</span></td>
                            <td><button class="text-[#176B87] hover:underline text-xs mr-2 font-medium">view</button><button class="text-slate-400 hover:text-[#176B87] text-xs transition">⬇</button></td>
                        </tr>
                        <tr class="table-row-hover">
                            <td class="py-2.5 pr-4 font-medium text-[#176B87]">Water Quality Report - East</td>
                            <td class="py-2.5 pr-4 text-slate-500">Water</td>
                            <td class="py-2.5 pr-4 text-slate-500">2026-07-16</td>
                            <td class="py-2.5 pr-4"><span class="status-badge bg-emerald-100/70 text-emerald-700">Generated</span></td>
                            <td><button class="text-[#176B87] hover:underline text-xs mr-2 font-medium">view</button><button class="text-slate-400 hover:text-[#176B87] text-xs transition">⬇</button></td>
                        </tr>
                        <tr class="table-row-hover">
                            <td class="py-2.5 pr-4 font-medium text-[#176B87]">Waste Management Audit</td>
                            <td class="py-2.5 pr-4 text-slate-500">Waste</td>
                            <td class="py-2.5 pr-4 text-slate-500">2026-07-14</td>
                            <td class="py-2.5 pr-4"><span class="status-badge bg-amber-100/70 text-amber-700">Processing</span></td>
                            <td><button class="text-[#176B87] hover:underline text-xs mr-2 font-medium">view</button><button class="text-slate-400 hover:text-[#176B87] text-xs transition">⬇</button></td>
                        </tr>
                        <tr class="table-row-hover">
                            <td class="py-2.5 pr-4 font-medium text-[#176B87]">Compliance Summary - July</td>
                            <td class="py-2.5 pr-4 text-slate-500">Compliance</td>
                            <td class="py-2.5 pr-4 text-slate-500">2026-07-12</td>
                            <td class="py-2.5 pr-4"><span class="status-badge bg-emerald-100/70 text-emerald-700">Generated</span></td>
                            <td><button class="text-[#176B87] hover:underline text-xs mr-2 font-medium">view</button><button class="text-slate-400 hover:text-[#176B87] text-xs transition">⬇</button></td>
                        </tr>
                        <tr class="table-row-hover">
                            <td class="py-2.5 pr-4 font-medium text-[#176B87]">Incident Report - West</td>
                            <td class="py-2.5 pr-4 text-slate-500">Incident</td>
                            <td class="py-2.5 pr-4 text-slate-500">2026-07-09</td>
                            <td class="py-2.5 pr-4"><span class="status-badge bg-red-100/70 text-red-700">Failed</span></td>
                            <td><button class="text-[#176B87] hover:underline text-xs mr-2 font-medium">retry</button><button class="text-slate-400 hover:text-[#176B87] text-xs transition">⬇</button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- footer note -->
    <div class="mt-8 text-center text-xs text-slate-400/70 border-t border-[#B4D4FF]/20 pt-6">
        Health Sanitation Management System · Report Generator v2.0
    </div>

    <!-- ─── SCHEDULE MODAL ─── -->
    <div id="scheduleModal" class="fixed inset-0 z-50 flex items-center justify-center modal-overlay hidden" onclick="if(event.target===this) closeScheduleModal()">
        <div class="modal-content rounded-3xl max-w-lg w-full mx-4 shadow-2xl overflow-hidden">
            <div class="px-6 py-5 border-b border-[#B4D4FF]/30 flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <div class="w-9 h-9 rounded-xl bg-[#B4D4FF]/30 flex items-center justify-center text-[#176B87]">
                        <i class="fa-regular fa-clock"></i>
                    </div>
                    <div>
                        <h3 class="text-base font-semibold text-[#176B87]">Schedule Report</h3>
                        <p class="text-xs text-slate-400">Automate report generation &amp; delivery</p>
                    </div>
                </div>
                <button onclick="closeScheduleModal()" class="p-1.5 rounded-lg hover:bg-[#B4D4FF]/20 text-slate-400 transition">
                    <i class="fa-regular fa-xmark text-xl"></i>
                </button>
            </div>
            <div class="px-6 py-5 space-y-4">
                <div>
                    <label class="block text-xs font-semibold text-[#176B87] uppercase tracking-wider mb-1.5">Frequency</label>
                    <select class="w-full rounded-xl px-4 py-2.5 text-sm">
                        <option>Daily</option>
                        <option selected>Weekly</option>
                        <option>Monthly</option>
                        <option>Quarterly</option>
                    </select>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-semibold text-[#176B87] uppercase tracking-wider mb-1.5">Start Date</label>
                        <input type="date" value="2026-07-20" class="w-full rounded-xl px-4 py-2.5 text-sm" />
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-[#176B87] uppercase tracking-wider mb-1.5">Time</label>
                        <input type="time" value="08:00" class="w-full rounded-xl px-4 py-2.5 text-sm" />
                    </div>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-[#176B87] uppercase tracking-wider mb-1.5">Recipients (email)</label>
                    <input type="text" placeholder="admin@hsms.gov, team@hsms.gov" class="w-full rounded-xl px-4 py-2.5 text-sm" />
                </div>
                <div>
                    <label class="block text-xs font-semibold text-[#176B87] uppercase tracking-wider mb-1.5">Format</label>
                    <div class="flex gap-4 text-sm">
                        <label class="flex items-center gap-2 text-slate-600"><input type="radio" name="format" checked class="accent-[#176B87]" /> PDF</label>
                        <label class="flex items-center gap-2 text-slate-600"><input type="radio" name="format" class="accent-[#176B87]" /> Excel</label>
                        <label class="flex items-center gap-2 text-slate-600"><input type="radio" name="format" class="accent-[#176B87]" /> CSV</label>
                    </div>
                </div>
            </div>
            <div class="px-6 py-4 border-t border-[#B4D4FF]/30 bg-white/30 flex justify-end gap-3">
                <button onclick="closeScheduleModal()" class="px-5 py-2 rounded-xl text-sm font-medium border border-[#B4D4FF]/40 bg-white/50 text-slate-600 hover:bg-[#B4D4FF]/20 transition">Cancel</button>
                <button onclick="scheduleReport()" class="btn-primary px-6 py-2 rounded-xl text-sm font-semibold text-white flex items-center gap-2">
                    <i class="fa-regular fa-floppy-disk"></i> Schedule
                </button>
            </div>
        </div>
    </div>

    <!-- ─── TOAST ─── -->
    <div id="toast" class="fixed bottom-6 right-6 z-50 text-white px-5 py-3.5 rounded-xl shadow-2xl flex items-center gap-3 translate-y-20 opacity-0 transition-all duration-500 pointer-events-none">
        <i class="fa-regular fa-circle-check text-[#B4D4FF] text-lg"></i>
        <span class="text-sm font-medium" id="toastMessage">Report generated successfully!</span>
        <button onclick="hideToast()" class="ml-2 text-white/60 hover:text-white transition"><i class="fa-regular fa-xmark"></i></button>
    </div>

    <!-- ====== END REPORT GENERATOR CONTENT ====== -->

</main>

<?php include '../includes/footer.php'; ?>

<!-- ─── REQUIRED STYLES & SCRIPTS ─── -->
<link rel="stylesheet" href="../assets/css/custom-report.css">

<!-- ─── CHART.JS ─── -->
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js">
</script>

<!-- ─── JAVASCRIPT ─── -->
<script src="../assets/js/custom-report.js"></script>

