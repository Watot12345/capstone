<?php include '../includes/header.php'; ?>
<?php include '../includes/sidebar.php'; ?>

<!-- ADD FONT AWESOME CDN (If not already in header.php) -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />

<style>
    /* ===== CSS VARIABLES (From System Overview) ===== */
    :root {
        --color-primary: #176B87;
        --color-primary-dark: #0F4A5E;
        --color-secondary: #86B6F6;
        --color-success: #10B981;
        --color-warning: #F59E0B;
        --color-danger: #EF4444;
        --color-info: #3B82F6;
        
        --radius-sm: 0.5rem;
        --radius-md: 0.75rem;
        --radius-lg: 1rem;
        --radius-xl: 1.5rem;
        
        --shadow-sm: 0 1px 2px rgba(0,0,0,0.05);
        --shadow-md: 0 4px 6px rgba(0,0,0,0.07);
        --shadow-lg: 0 10px 15px rgba(0,0,0,0.1);
        
        --transition-fast: 0.15s ease;
        --transition-normal: 0.22s cubic-bezier(0.34, 1.56, 0.64, 1);
        --transition-slow: 0.35s ease;
        
        --glass-bg: rgba(255,255,255,0.7);
        --glass-border: rgba(255,255,255,0.2);
    }

    /* ===== BASE CARD STYLES ===== */
    .report-card {
        background: rgba(255, 255, 255, 0.8);
        backdrop-filter: blur(12px);
        border: 1px solid rgba(180, 212, 255, 0.3);
        box-shadow: 0 10px 40px -10px rgba(23, 107, 135, 0.15);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        position: relative;
    }

    /* Tab Animations */
    .tab-content {
        animation: fadeInSlide 0.5s ease-in-out;
    }
    @keyframes fadeInSlide {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }

    /* Button Animations */
    .btn-primary {
        background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-primary-dark) 100%);
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(23, 107, 135, 0.3);
    }
    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(23, 107, 135, 0.4);
    }
    .btn-primary:active { transform: translateY(0); }

    .btn-outline-primary {
        border: 1px solid rgba(180, 212, 255, 0.5);
        color: var(--color-primary);
        transition: all 0.2s ease;
    }
    .btn-outline-primary:hover {
        background: rgba(180, 212, 255, 0.2);
        border-color: var(--color-primary);
    }

    /* Filter Chips */
    .filter-chip {
        border: 1px solid rgba(180, 212, 255, 0.4);
        color: #64748b;
        cursor: pointer;
        transition: all 0.2s ease;
    }
    .filter-chip:hover { background: rgba(180, 212, 255, 0.2); }
    .filter-chip.active {
        background: var(--color-primary);
        color: white;
        border-color: var(--color-primary);
    }

    /* Tab Buttons */
    .tab-btn {
        color: #64748b;
        border-bottom: 2px solid transparent;
        transition: all 0.3s ease;
        white-space: nowrap;
    }
    .tab-btn:hover { color: var(--color-primary); }
    .tab-btn.active {
        color: var(--color-primary);
        border-color: var(--color-primary);
        font-weight: 600;
    }

    /* Table Hover */
    .table-row-hover { transition: background-color 0.2s ease; }
    .table-row-hover:hover { background-color: rgba(180, 212, 255, 0.1); }

    /* Modal Animations */
    .modal-overlay {
        background: rgba(23, 107, 135, 0.4);
        backdrop-filter: blur(4px);
        transition: opacity 0.3s ease;
    }
    .modal-content {
        background: rgba(255, 255, 255, 0.95);
        animation: scaleIn 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
    }
    @keyframes scaleIn {
        from { opacity: 0; transform: scale(0.9); }
        to { opacity: 1; transform: scale(1); }
    }

    /* Spinner */
    .spinner {
        width: 16px; height: 16px;
        border: 2px solid rgba(255, 255, 255, 0.3);
        border-radius: 50%;
        border-top-color: #fff;
        animation: spin 1s ease-in-out infinite;
    }
    @keyframes spin { to { transform: rotate(360deg); } }

    .toast-show {
        transform: translateY(0) !important;
        opacity: 1 !important;
    }

    /* Decorative Shapes */
    .card-shape {
        position: absolute;
        border-radius: 50%;
        filter: blur(40px);
        z-index: 0;
    }
    .card-shape-1 { background: #B4D4FF; width: 200px; height: 200px; top: -50px; right: -50px; opacity: 0.15; }
    .card-shape-2 { background: #86B6F6; width: 150px; height: 150px; bottom: -30px; left: -30px; opacity: 0.15; }
    .card-shape-3 { background: #176B87; width: 100px; height: 100px; top: 20%; right: 10%; opacity: 0.08; }
    .card-shape-4 { background: #86B6F6; width: 180px; height: 180px; top: 0; right: 0; opacity: 0.1; }
    .card-shape-sm { width: 80px; height: 80px; background: #B4D4FF; opacity: 0.2; top: -10px; right: -10px; }

    .dot-pattern {
        background-image: radial-gradient(#176B8710 1px, transparent 1px);
        background-size: 20px 20px;
        z-index: 0;
    }

    /* Form Inputs */
    select, input[type="date"], input[type="time"], input[type="text"] {
        background: rgba(255, 255, 255, 0.7);
        border: 1px solid rgba(180, 212, 255, 0.5);
        transition: all 0.2s ease;
    }
    select:focus, input:focus {
        outline: none;
        border-color: var(--color-primary);
        box-shadow: 0 0 0 3px rgba(23, 107, 135, 0.1);
        background: #fff;
    }

    /* ===== KPI CARDS (Applied from System Overview) ===== */
    .kpi-card {
        position: relative;
        overflow: hidden;
        background: white;
        border: 1px solid slate-100;
        transition: transform 0.22s cubic-bezier(0.34,1.56,0.64,1), 
                    box-shadow 0.22s ease, 
                    border-color 0.22s ease;
    }
    .kpi-card:hover {
        transform: translateY(-4px) scale(1.015);
    }
    .kpi-card:active {
        transform: translateY(-1px) scale(0.985);
    }
    .kpi-shine {
        position: absolute;
        top: 0; left: 0;
        width: 40%; height: 100%;
        background: linear-gradient(120deg, transparent, rgba(255,255,255,0.55), transparent);
        opacity: 0;
        pointer-events: none;
    }
    .kpi-card:hover .kpi-shine {
        opacity: 1;
        animation: shine 0.85s ease forwards;
    }
    @keyframes shine {
        0% { transform: translateX(-120%) skewX(-20deg); }
        100% { transform: translateX(220%) skewX(-20deg); }
    }
    
    .kpi-value {
        transition: transform 0.22s ease;
        display: inline-block;
    }
    .kpi-card:hover .kpi-value {
        transform: scale(1.06);
    }
    
    .kpi-watermark {
        transition: transform 0.35s cubic-bezier(0.34,1.56,0.64,1);
    }
    .kpi-card:hover .kpi-watermark {
        transform: scale(1.12) rotate(-3deg);
    }
    
    .kpi-ring-progress {
        stroke-dasharray: 100;
        stroke-dashoffset: 100;
        animation: ringFill 1s cubic-bezier(0.65,0,0.35,1) forwards;
    }
    @keyframes ringFill {
        to { stroke-dashoffset: var(--offset, 0); }
    }
    .kpi-ring {
        transition: transform 0.25s cubic-bezier(0.34,1.56,0.64,1);
    }
    .kpi-card:hover .kpi-ring {
        transform: scale(1.08);
    }

    /* Staggered entrance */
    .kpi-grid > a {
        opacity: 0;
        animation: slideUp 0.45s cubic-bezier(0.34,1.56,0.64,1) forwards;
    }
    @keyframes slideUp {
        from { opacity: 0; transform: translateY(36px) scale(0.95); }
        to { opacity: 1; transform: translateY(0) scale(1); }
    }
    .kpi-grid > a:nth-child(1) { animation-delay: 0.05s; }
    .kpi-grid > a:nth-child(1) .kpi-ring-progress { animation-delay: 0.35s; }
    .kpi-grid > a:nth-child(2) { animation-delay: 0.12s; }
    .kpi-grid > a:nth-child(2) .kpi-ring-progress { animation-delay: 0.42s; }
    .kpi-grid > a:nth-child(3) { animation-delay: 0.19s; }
    .kpi-grid > a:nth-child(3) .kpi-ring-progress { animation-delay: 0.49s; }
    .kpi-grid > a:nth-child(4) { animation-delay: 0.26s; }
    .kpi-grid > a:nth-child(4) .kpi-ring-progress { animation-delay: 0.56s; }

    /* Glow effects */
    .glow-blue { border-color: rgba(59, 130, 246, 0.1); }
    .glow-blue:hover { border-color: rgba(59, 130, 246, 0.4); box-shadow: 0 15px 40px -10px rgba(59, 130, 246, 0.15); }
    .glow-emerald { border-color: rgba(16, 185, 129, 0.1); }
    .glow-emerald:hover { border-color: rgba(16, 185, 129, 0.4); box-shadow: 0 15px 40px -10px rgba(16, 185, 129, 0.15); }
    .glow-red { border-color: rgba(239, 68, 68, 0.1); }
    .glow-red:hover { border-color: rgba(239, 68, 68, 0.4); box-shadow: 0 15px 40px -10px rgba(239, 68, 68, 0.15); }
    .glow-purple { border-color: rgba(139, 92, 246, 0.1); }
    .glow-purple:hover { border-color: rgba(139, 92, 246, 0.4); box-shadow: 0 15px 40px -10px rgba(139, 92, 246, 0.15); }
</style>

<main class="flex-1 bg-dash-bg h-screen m-5 rounded-2xl font-sans overflow-y-auto scrollbar-track-transparent">

    <!-- ─── CONFIGURATION CARD ─── -->
    <div class="report-card rounded-3xl p-5 sm:p-7 mb-8">
        <div class="card-shape card-shape-1"></div>
        <div class="card-shape card-shape-2"></div>
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
                    <button class="btn-outline-primary px-4 py-1.5 rounded-xl text-xs font-medium flex items-center gap-2" onclick="showToast('Template saved successfully!', 'success')">
                        <i class="fa-regular fa-floppy-disk"></i> Save Template
                    </button>
                    <button class="btn-outline-primary px-4 py-1.5 rounded-xl text-xs font-medium flex items-center gap-2" onclick="showToast('Template loaded.', 'info')">
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
                    <button id="generateBtn" onclick="generateReport()" class="btn-primary px-6 py-2.5 rounded-xl text-sm font-semibold text-white flex items-center gap-2">
                        <i class="fa-solid fa-play"></i> Generate Report
                    </button>
                    <button class="px-4 py-2.5 rounded-xl text-sm font-medium border border-[#B4D4FF]/40 bg-white/50 text-slate-600 hover:bg-[#B4D4FF]/20 transition flex items-center gap-2">
                        <i class="fa-regular fa-circle-xmark"></i> Reset
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- ─── QUICK STATS (Restyled to match System Overview KPIs) ─── -->
    <div class="kpi-grid grid grid-cols-2 md:grid-cols-4 gap-4 mb-8">
        
        <!-- KPI 1: Total Inspections -->
        <a href="#" class="kpi-card glow-blue relative overflow-hidden rounded-2xl shadow-sm cursor-pointer group block">
            <div class="kpi-shine"></div>
            <div class="absolute inset-0 bg-gradient-to-br from-blue-50 via-transparent to-transparent pointer-events-none"></div>
            <i class="fas fa-clipboard kpi-watermark absolute -bottom-3 -right-2 text-[58px] text-blue-500/10 rotate-[-8deg] pointer-events-none"></i>
            <div class="absolute left-0 top-0 h-full w-[3px] bg-gradient-to-b from-blue-400 to-blue-600"></div>
            <div class="relative p-4">
                <div class="flex items-start justify-between gap-2">
                    <div>
                        <p class="text-[8px] font-bold uppercase tracking-wider text-blue-600">Total Inspections</p>
                        <p class="kpi-value text-xl font-black text-slate-900 mt-1 leading-none">1,284</p>
                        <p class="text-[8px] font-medium text-slate-400 mt-0.5">Conducted</p>
                    </div>
                    <svg viewBox="0 0 36 36" class="kpi-ring w-10 h-10 flex-shrink-0">
                        <circle cx="18" cy="18" r="15.5" fill="none" stroke="#e2e8f0" stroke-width="3"/>
                        <circle cx="18" cy="18" r="15.5" fill="none" stroke="#3b82f6" stroke-width="3" stroke-linecap="round" pathLength="100" class="kpi-ring-progress" style="--offset:15" transform="rotate(-90 18 18)"/>
                        <text x="18" y="20.5" text-anchor="middle" font-size="8.5" font-weight="700" fill="#3b82f6">85%</text>
                    </svg>
                </div>
                <div class="mt-2 pt-2 border-t border-slate-100 flex items-center justify-between gap-2">
                    <span class="px-1.5 py-0.5 bg-emerald-100 text-emerald-700 rounded-full text-[7px] font-bold">
                        <i class="fas fa-arrow-up text-[5px] mr-0.5"></i> 12.5%
                    </span>
                    <span class="text-[7px] text-slate-400">vs last month</span>
                    <svg viewBox="0 0 60 20" class="w-8 h-3 opacity-70">
                        <polyline points="0,16 10,14 20,15 30,10 40,11 50,4 60,3" fill="none" stroke="#3b82f6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
            </div>
        </a>

        <!-- KPI 2: Compliance Rate -->
        <a href="#" class="kpi-card glow-emerald relative overflow-hidden rounded-2xl shadow-sm cursor-pointer group block">
            <div class="kpi-shine"></div>
            <div class="absolute inset-0 bg-gradient-to-br from-emerald-50 via-transparent to-transparent pointer-events-none"></div>
            <i class="fas fa-circle-check kpi-watermark absolute -bottom-3 -right-2 text-[58px] text-emerald-500/10 rotate-[-8deg] pointer-events-none"></i>
            <div class="absolute left-0 top-0 h-full w-[3px] bg-gradient-to-b from-emerald-400 to-emerald-600"></div>
            <div class="relative p-4">
                <div class="flex items-start justify-between gap-2">
                    <div>
                        <p class="text-[8px] font-bold uppercase tracking-wider text-emerald-600">Compliance Rate</p>
                        <p class="kpi-value text-xl font-black text-slate-900 mt-1 leading-none">94.7%</p>
                        <p class="text-[8px] font-medium text-slate-400 mt-0.5">Overall</p>
                    </div>
                    <svg viewBox="0 0 36 36" class="kpi-ring w-10 h-10 flex-shrink-0">
                        <circle cx="18" cy="18" r="15.5" fill="none" stroke="#e2e8f0" stroke-width="3"/>
                        <circle cx="18" cy="18" r="15.5" fill="none" stroke="#10b981" stroke-width="3" stroke-linecap="round" pathLength="100" class="kpi-ring-progress" style="--offset:5" transform="rotate(-90 18 18)"/>
                        <text x="18" y="20.5" text-anchor="middle" font-size="8.5" font-weight="700" fill="#10b981">95%</text>
                    </svg>
                </div>
                <div class="mt-2 pt-2 border-t border-slate-100 flex items-center justify-between gap-2">
                    <span class="px-1.5 py-0.5 bg-emerald-100 text-emerald-700 rounded-full text-[7px] font-bold">
                        <i class="fas fa-arrow-up text-[5px] mr-0.5"></i> 2.3%
                    </span>
                    <span class="text-[7px] text-slate-400">vs last month</span>
                    <svg viewBox="0 0 60 20" class="w-8 h-3 opacity-70">
                        <polyline points="0,12 10,11 20,9 30,8 40,5 50,4 60,2" fill="none" stroke="#10b981" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
            </div>
        </a>

        <!-- KPI 3: Urgent Issues -->
        <a href="#" class="kpi-card glow-red relative overflow-hidden rounded-2xl shadow-sm cursor-pointer group block">
            <div class="kpi-shine"></div>
            <div class="absolute inset-0 bg-gradient-to-br from-rose-50 via-transparent to-transparent pointer-events-none"></div>
            <i class="fas fa-circle-exclamation kpi-watermark absolute -bottom-3 -right-2 text-[58px] text-rose-500/10 rotate-[-8deg] pointer-events-none"></i>
            <div class="absolute left-0 top-0 h-full w-[3px] bg-gradient-to-b from-rose-400 to-rose-600"></div>
            <div class="relative p-4">
                <div class="flex items-start justify-between gap-2">
                    <div>
                        <p class="text-[8px] font-bold uppercase tracking-wider text-rose-600">Urgent Issues</p>
                        <p class="kpi-value text-xl font-black text-slate-900 mt-1 leading-none">37</p>
                        <p class="text-[8px] font-medium text-slate-400 mt-0.5">Need Attention</p>
                    </div>
                    <svg viewBox="0 0 36 36" class="kpi-ring w-10 h-10 flex-shrink-0">
                        <circle cx="18" cy="18" r="15.5" fill="none" stroke="#e2e8f0" stroke-width="3"/>
                        <circle cx="18" cy="18" r="15.5" fill="none" stroke="#ef4444" stroke-width="3" stroke-linecap="round" pathLength="100" class="kpi-ring-progress" style="--offset:80" transform="rotate(-90 18 18)"/>
                        <text x="18" y="20.5" text-anchor="middle" font-size="8.5" font-weight="700" fill="#ef4444">20%</text>
                    </svg>
                </div>
                <div class="mt-2 pt-2 border-t border-slate-100 flex items-center justify-between gap-2">
                    <span class="px-1.5 py-0.5 bg-rose-100 text-rose-700 rounded-full text-[7px] font-bold">
                        <i class="fas fa-arrow-up text-[5px] mr-0.5"></i> +4
                    </span>
                    <span class="text-[7px] text-slate-400">vs last month</span>
                    <svg viewBox="0 0 60 20" class="w-8 h-3 opacity-70">
                        <polyline points="0,16 10,14 20,15 30,10 40,11 50,4 60,3" fill="none" stroke="#ef4444" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
            </div>
        </a>

        <!-- KPI 4: Facilities Covered -->
        <a href="#" class="kpi-card glow-purple relative overflow-hidden rounded-2xl shadow-sm cursor-pointer group block">
            <div class="kpi-shine"></div>
            <div class="absolute inset-0 bg-gradient-to-br from-purple-50 via-transparent to-transparent pointer-events-none"></div>
            <i class="fas fa-hospital kpi-watermark absolute -bottom-3 -right-2 text-[58px] text-purple-500/10 rotate-[-8deg] pointer-events-none"></i>
            <div class="absolute left-0 top-0 h-full w-[3px] bg-gradient-to-b from-purple-400 to-purple-600"></div>
            <div class="relative p-4">
                <div class="flex items-start justify-between gap-2">
                    <div>
                        <p class="text-[8px] font-bold uppercase tracking-wider text-purple-600">Facilities Covered</p>
                        <p class="kpi-value text-xl font-black text-slate-900 mt-1 leading-none">47</p>
                        <p class="text-[8px] font-medium text-slate-400 mt-0.5">of 52 total</p>
                    </div>
                    <svg viewBox="0 0 36 36" class="kpi-ring w-10 h-10 flex-shrink-0">
                        <circle cx="18" cy="18" r="15.5" fill="none" stroke="#e2e8f0" stroke-width="3"/>
                        <circle cx="18" cy="18" r="15.5" fill="none" stroke="#9333ea" stroke-width="3" stroke-linecap="round" pathLength="100" class="kpi-ring-progress" style="--offset:10" transform="rotate(-90 18 18)"/>
                        <text x="18" y="20.5" text-anchor="middle" font-size="8.5" font-weight="700" fill="#9333ea">90%</text>
                    </svg>
                </div>
                <div class="mt-2 pt-2 border-t border-slate-100 flex items-center justify-between gap-2">
                    <span class="px-1.5 py-0.5 bg-purple-100 text-purple-700 rounded-full text-[7px] font-bold">
                        <i class="fas fa-check-circle text-[5px] mr-0.5"></i> Active
                    </span>
                    <span class="text-[7px] text-slate-400">90.4% coverage</span>
                    <svg viewBox="0 0 60 20" class="w-8 h-3 opacity-70">
                        <polyline points="0,14 10,13 20,15 30,10 40,12 50,8 60,9" fill="none" stroke="#9333ea" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
            </div>
        </a>

    </div>

    <!-- ─── REPORT PREVIEW CARD ─── -->
    <div class="report-card rounded-3xl overflow-hidden mb-8">
        <div class="card-shape card-shape-4"></div>
        <div class="dot-pattern absolute inset-0"></div>

        <div class="relative z-10">
            <!-- tabs -->
            <div class="flex items-center justify-between px-5 sm:px-7 pt-4 pb-0 border-b border-[#B4D4FF]/30 flex-wrap gap-2">
                <div class="flex gap-5 text-sm overflow-x-auto">
                    <button class="tab-btn active pb-3" data-tab="chart" onclick="switchTab('chart')">
                        <i class="fa-regular fa-chart-bar"></i> Chart View
                    </button>
                    <button class="tab-btn pb-3" data-tab="table" onclick="switchTab('table')">
                        <i class="fa-solid fa-table"></i> Table View
                    </button>
                    <button class="tab-btn pb-3" data-tab="summary" onclick="switchTab('summary')">
                        <i class="fa-regular fa-file-lines"></i> Summary
                    </button>
                </div>
                <div class="flex items-center gap-2 pb-2">
                    <button onclick="showToast('Preparing PDF export...', 'info')" class="p-1.5 rounded-lg hover:bg-[#B4D4FF]/30 text-slate-400 hover:text-[#176B87] transition text-sm" title="Export PDF"><i class="fa-solid fa-file-pdf"></i></button>
                    <button onclick="showToast('Preparing Excel export...', 'info')" class="p-1.5 rounded-lg hover:bg-[#B4D4FF]/30 text-slate-400 hover:text-[#176B87] transition text-sm" title="Export Excel"><i class="fa-solid fa-file-excel"></i></button>
                    <button onclick="showToast('Preparing CSV export...', 'info')" class="p-1.5 rounded-lg hover:bg-[#B4D4FF]/30 text-slate-400 hover:text-[#176B87] transition text-sm" title="Export CSV"><i class="fa-solid fa-file-csv"></i></button>
                    <button onclick="window.print()" class="p-1.5 rounded-lg hover:bg-[#B4D4FF]/30 text-slate-400 hover:text-[#176B87] transition text-sm" title="Print"><i class="fa-solid fa-print"></i></button>
                    <button onclick="openScheduleModal()" class="ml-1 px-3 py-1.5 rounded-lg bg-[#B4D4FF]/30 text-[#176B87] text-xs font-medium hover:bg-[#86B6F6]/40 transition flex items-center gap-1.5">
                        <i class="fa-solid fa-clock"></i> Schedule
                    </button>
                </div>
            </div>

            <!-- tab content -->
            <div class="p-5 sm:p-7">
                <!-- Chart View -->
                <div id="tabChart" class="tab-content">
                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                        <div class="lg:col-span-2 bg-white/40 backdrop-blur-sm rounded-xl p-4 border border-[#B4D4FF]/20 relative overflow-hidden">
                            <div class="relative z-10">
                                <div class="flex items-center justify-between mb-3">
                                    <h4 class="text-sm font-semibold text-[#176B87]">Sanitation Compliance by Facility</h4>
                                    <span class="text-[10px] text-slate-400 bg-white/50 px-2 py-0.5 rounded-full border border-[#B4D4FF]/20">Jul 2026</span>
                                </div>
                                <div class="chart-container h-64">
                                    <canvas id="barChart"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="space-y-5">
                            <div class="bg-white/40 backdrop-blur-sm rounded-xl p-4 border border-[#B4D4FF]/20 relative overflow-hidden">
                                <div class="relative z-10">
                                    <h4 class="text-sm font-semibold text-[#176B87] mb-2">Overall Status</h4>
                                    <div class="chart-container h-36">
                                        <canvas id="doughnutChart"></canvas>
                                    </div>
                                </div>
                            </div>
                            <div class="bg-white/40 backdrop-blur-sm rounded-xl p-4 border border-[#B4D4FF]/20 relative overflow-hidden">
                                <div class="relative z-10">
                                    <h4 class="text-sm font-semibold text-[#176B87] mb-1">Trend (last 6 mo)</h4>
                                    <div class="chart-container h-20">
                                        <canvas id="lineChart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Table View -->
                <div id="tabTable" class="tab-content hidden">
                    <div class="table-wrap overflow-x-auto">
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
                                <tr class="table-row-hover"><td class="py-3 pr-4 font-medium text-[#176B87]">Central Health Center</td><td class="py-3 pr-4 text-slate-600">Dr. Omari</td><td class="py-3 pr-4 text-slate-500">2026-07-15</td><td class="py-3 pr-4 font-semibold">96 / 100</td><td class="py-3 pr-4"><span class="status-badge bg-emerald-100/70 text-emerald-700 px-2 py-1 rounded-full text-xs">Compliant</span></td><td><button class="text-[#176B87] hover:underline text-xs font-medium">view</button></td></tr>
                                <tr class="table-row-hover"><td class="py-3 pr-4 font-medium text-[#176B87]">Eastside Clinic</td><td class="py-3 pr-4 text-slate-600">Ms. Kenya</td><td class="py-3 pr-4 text-slate-500">2026-07-14</td><td class="py-3 pr-4 font-semibold">82 / 100</td><td class="py-3 pr-4"><span class="status-badge bg-amber-100/70 text-amber-700 px-2 py-1 rounded-full text-xs">Pending</span></td><td><button class="text-[#176B87] hover:underline text-xs font-medium">view</button></td></tr>
                                <tr class="table-row-hover"><td class="py-3 pr-4 font-medium text-[#176B87]">West District Hospital</td><td class="py-3 pr-4 text-slate-600">Mr. Tanzania</td><td class="py-3 pr-4 text-slate-500">2026-07-12</td><td class="py-3 pr-4 font-semibold">68 / 100</td><td class="py-3 pr-4"><span class="status-badge bg-red-100/70 text-red-700 px-2 py-1 rounded-full text-xs">Urgent</span></td><td><button class="text-[#176B87] hover:underline text-xs font-medium">view</button></td></tr>
                                <tr class="table-row-hover"><td class="py-3 pr-4 font-medium text-[#176B87]">North Community Hub</td><td class="py-3 pr-4 text-slate-600">Dr. Uganda</td><td class="py-3 pr-4 text-slate-500">2026-07-10</td><td class="py-3 pr-4 font-semibold">91 / 100</td><td class="py-3 pr-4"><span class="status-badge bg-emerald-100/70 text-emerald-700 px-2 py-1 rounded-full text-xs">Compliant</span></td><td><button class="text-[#176B87] hover:underline text-xs font-medium">view</button></td></tr>
                                <tr class="table-row-hover"><td class="py-3 pr-4 font-medium text-[#176B87]">South Sanitation Depot</td><td class="py-3 pr-4 text-slate-600">Dr. Omari</td><td class="py-3 pr-4 text-slate-500">2026-07-08</td><td class="py-3 pr-4 font-semibold">74 / 100</td><td class="py-3 pr-4"><span class="status-badge bg-red-100/70 text-red-700 px-2 py-1 rounded-full text-xs">Non-Compliant</span></td><td><button class="text-[#176B87] hover:underline text-xs font-medium">view</button></td></tr>
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
    <div class="report-card rounded-3xl p-5 sm:p-7 mb-8">
        <div class="card-shape card-shape-1"></div>
        <div class="dot-pattern absolute inset-0"></div>

        <div class="relative z-10">
            <div class="flex items-center justify-between mb-4">
                <div>
                    <h3 class="text-base font-semibold text-[#176B87] flex items-center gap-2">
                        <i class="fa-solid fa-clock-rotate-left text-[#86B6F6] text-sm"></i>
                        Recent Reports
                    </h3>
                    <p class="text-xs text-slate-400">Last 5 generated reports</p>
                </div>
                <button class="text-sm font-medium text-[#176B87] hover:underline">View All →</button>
            </div>
            <div class="table-wrap overflow-x-auto">
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
                        <tr class="table-row-hover"><td class="py-2.5 pr-4 font-medium text-[#176B87]">Q3 Sanitation Overview</td><td class="py-2.5 pr-4 text-slate-500">Inspection</td><td class="py-2.5 pr-4 text-slate-500">2026-07-18</td><td class="py-2.5 pr-4"><span class="status-badge bg-emerald-100/70 text-emerald-700 px-2 py-1 rounded-full text-xs">Generated</span></td><td><button class="text-[#176B87] hover:underline text-xs mr-2 font-medium">view</button><button class="text-slate-400 hover:text-[#176B87] text-xs transition">⬇</button></td></tr>
                        <tr class="table-row-hover"><td class="py-2.5 pr-4 font-medium text-[#176B87]">Water Quality Report - East</td><td class="py-2.5 pr-4 text-slate-500">Water</td><td class="py-2.5 pr-4 text-slate-500">2026-07-16</td><td class="py-2.5 pr-4"><span class="status-badge bg-emerald-100/70 text-emerald-700 px-2 py-1 rounded-full text-xs">Generated</span></td><td><button class="text-[#176B87] hover:underline text-xs mr-2 font-medium">view</button><button class="text-slate-400 hover:text-[#176B87] text-xs transition">⬇</button></td></tr>
                        <tr class="table-row-hover"><td class="py-2.5 pr-4 font-medium text-[#176B87]">Waste Management Audit</td><td class="py-2.5 pr-4 text-slate-500">Waste</td><td class="py-2.5 pr-4 text-slate-500">2026-07-14</td><td class="py-2.5 pr-4"><span class="status-badge bg-amber-100/70 text-amber-700 px-2 py-1 rounded-full text-xs">Processing</span></td><td><button class="text-[#176B87] hover:underline text-xs mr-2 font-medium">view</button><button class="text-slate-400 hover:text-[#176B87] text-xs transition">⬇</button></td></tr>
                        <tr class="table-row-hover"><td class="py-2.5 pr-4 font-medium text-[#176B87]">Compliance Summary - July</td><td class="py-2.5 pr-4 text-slate-500">Compliance</td><td class="py-2.5 pr-4 text-slate-500">2026-07-12</td><td class="py-2.5 pr-4"><span class="status-badge bg-emerald-100/70 text-emerald-700 px-2 py-1 rounded-full text-xs">Generated</span></td><td><button class="text-[#176B87] hover:underline text-xs mr-2 font-medium">view</button><button class="text-slate-400 hover:text-[#176B87] text-xs transition">⬇</button></td></tr>
                        <tr class="table-row-hover"><td class="py-2.5 pr-4 font-medium text-[#176B87]">Incident Report - West</td><td class="py-2.5 pr-4 text-slate-500">Incident</td><td class="py-2.5 pr-4 text-slate-500">2026-07-09</td><td class="py-2.5 pr-4"><span class="status-badge bg-red-100/70 text-red-700 px-2 py-1 rounded-full text-xs">Failed</span></td><td><button class="text-[#176B87] hover:underline text-xs mr-2 font-medium">retry</button><button class="text-slate-400 hover:text-[#176B87] text-xs transition">⬇</button></td></tr>
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
    <div id="scheduleModal" class="fixed inset-0 z-50 flex items-center justify-center modal-overlay hidden opacity-0" onclick="if(event.target===this) closeScheduleModal()">
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
    <div id="toast" class="fixed bottom-6 right-6 z-[60] text-white px-5 py-3.5 rounded-xl shadow-2xl flex items-center gap-3 translate-y-20 opacity-0 transition-all duration-500 pointer-events-none" style="background: #176B87;">
        <i id="toastIcon" class="fa-regular fa-circle-check text-[#B4D4FF] text-lg"></i>
        <span class="text-sm font-medium" id="toastMessage">Report generated successfully!</span>
        <button onclick="hideToast()" class="ml-2 text-white/60 hover:text-white transition"><i class="fa-regular fa-xmark"></i></button>
    </div>

</main>

<?php include '../includes/footer.php'; ?>

<!-- ─── CHART.JS ─── -->
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>

<script>
    // --- INTERACTIVE UI/UX SCRIPTS ---

    // 1. Tab Switching Logic
    function switchTab(tabName) {
        // Hide all tabs
        document.querySelectorAll('.tab-content').forEach(tab => {
            tab.classList.add('hidden');
        });
        // Remove active class from all buttons
        document.querySelectorAll('.tab-btn').forEach(btn => {
            btn.classList.remove('active');
        });
        
        // Show selected tab and add active class to button
        const selectedTab = document.getElementById('tab' + tabName.charAt(0).toUpperCase() + tabName.slice(1));
        selectedTab.classList.remove('hidden');
        document.querySelector(`[data-tab="${tabName}"]`).classList.add('active');
    }

    // 2. Filter Chips Logic
    document.querySelectorAll('.filter-chip').forEach(chip => {
        chip.addEventListener('click', () => {
            document.querySelectorAll('.filter-chip').forEach(c => c.classList.remove('active'));
            chip.classList.add('active');
        });
    });

    // 3. Generate Report Process Flow
    function generateReport() {
        const btn = document.getElementById('generateBtn');
        const originalContent = btn.innerHTML;
        
        // Change to loading state
        btn.innerHTML = '<div class="spinner"></div> Generating...';
        btn.disabled = true;

        // Simulate server delay for UX purposes
        setTimeout(() => {
            btn.innerHTML = '<i class="fa-solid fa-check"></i> Report Ready!';
            
            // Show success toast
            showToast('Report generated successfully!', 'success');
            
            // Reset button after 2 seconds
            setTimeout(() => {
                btn.innerHTML = originalContent;
                btn.disabled = false;
            }, 2000);
        }, 2500);
    }

    // 4. Modal Controls
    function openScheduleModal() {
        const modal = document.getElementById('scheduleModal');
        modal.classList.remove('hidden');
        // Trigger reflow for transition
        void modal.offsetWidth; 
        modal.style.opacity = '1';
    }

    function closeScheduleModal() {
        const modal = document.getElementById('scheduleModal');
        modal.style.opacity = '0';
        setTimeout(() => {
            modal.classList.add('hidden');
        }, 300);
    }

    function scheduleReport() {
        closeScheduleModal();
        setTimeout(() => {
            showToast('Report scheduled successfully!', 'success');
        }, 300);
    }

    // 5. Toast Notifications
    let toastTimer;
    function showToast(message, type = 'success') {
        const toast = document.getElementById('toast');
        const toastMessage = document.getElementById('toastMessage');
        const toastIcon = document.getElementById('toastIcon');

        toastMessage.textContent = message;
        
        // Set styles based on type
        if(type === 'success') {
            toast.style.background = '#176B87';
            toastIcon.className = 'fa-regular fa-circle-check text-[#B4D4FF] text-lg';
        } else if(type === 'info') {
            toast.style.background = '#64748b';
            toastIcon.className = 'fa-regular fa-circle-info text-white text-lg';
        }

        // Show toast
        toast.classList.add('toast-show');
        toast.style.pointerEvents = 'auto';

        // Auto hide after 3 seconds
        clearTimeout(toastTimer);
        toastTimer = setTimeout(hideToast, 3000);
    }

    function hideToast() {
        const toast = document.getElementById('toast');
        toast.classList.remove('toast-show');
        toast.style.pointerEvents = 'none';
    }

    // 6. Initialize Charts
    document.addEventListener('DOMContentLoaded', function () {
        const ctxBar = document.getElementById('barChart');
        if(ctxBar) {
            new Chart(ctxBar, {
                type: 'bar',
                data: {
                    labels: ['Central', 'Eastside', 'West Dist.', 'North Hub', 'South Dep.'],
                    datasets: [{
                        label: 'Compliance Score',
                        data: [96, 82, 68, 91, 74],
                        backgroundColor: ['#176B87', '#86B6F6', '#ef4444', '#176B87', '#f59e0b'],
                        borderRadius: 8,
                        borderSkipped: false,
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: { legend: { display: false } },
                    scales: {
                        y: { beginAtZero: true, max: 100, grid: { color: 'rgba(180, 212, 255, 0.2)' } },
                        x: { grid: { display: false } }
                    }
                }
            });
        }

        const ctxDoughnut = document.getElementById('doughnutChart');
        if(ctxDoughnut) {
            new Chart(ctxDoughnut, {
                type: 'doughnut',
                data: {
                    labels: ['Compliant', 'Pending', 'Urgent'],
                    datasets: [{
                        data: [75, 15, 10],
                        backgroundColor: ['#176B87', '#f59e0b', '#ef4444'],
                        borderWidth: 0,
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    cutout: '70%',
                    plugins: { legend: { position: 'bottom', labels: { font: { size: 10 } } } }
                }
            });
        }

        const ctxLine = document.getElementById('lineChart');
        if(ctxLine) {
            new Chart(ctxLine, {
                type: 'line',
                data: {
                    labels: ['Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
                    datasets: [{
                        data: [85, 88, 90, 92, 93, 94.7],
                        borderColor: '#176B87',
                        backgroundColor: 'rgba(23, 107, 135, 0.1)',
                        fill: true,
                        tension: 0.4,
                        borderWidth: 2,
                        pointRadius: 0
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: { legend: { display: false } },
                    scales: {
                        y: { display: false },
                        x: { display: false }
                    }
                }
            });
        }
    });
</script>