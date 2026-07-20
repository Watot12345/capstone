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
    .report-card:hover {
        box-shadow: 0 15px 40px -10px rgba(23, 107, 135, 0.15);
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
    .glow-amber { border-color: rgba(245, 158, 11, 0.1); }
    .glow-amber:hover { border-color: rgba(245, 158, 11, 0.4); box-shadow: 0 15px 40px -10px rgba(245, 158, 11, 0.15); }
    .glow-purple { border-color: rgba(139, 92, 246, 0.1); }
    .glow-purple:hover { border-color: rgba(139, 92, 246, 0.4); box-shadow: 0 15px 40px -10px rgba(139, 92, 246, 0.15); }

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
</style>

<main class="p-6 bg-[#EEF5FF] min-h-screen font-sans">
  <link rel="stylesheet" href="../css/modAct.css" />

  <!-- ===== CASE FLOW PIPELINE ===== -->
  <div class="report-card rounded-2xl p-6 mb-6">
    <div class="flex items-start justify-between gap-6 mb-6 flex-wrap">
      <div>
        <p class="text-[11px] font-semibold tracking-widest text-slate-400 uppercase mb-1.5">Case flow pipeline — intake through resolution</p>
      </div>
    </div>

    <div id="caseFlow" class="relative grid grid-cols-4 gap-2 py-2">
      <div class="absolute top-[30px] left-[10%] right-[10%] h-[3px] bg-[#B4D4FF] rounded-full"></div>
      <div id="flowFill" class="absolute top-[30px] left-[10%] h-[3px] bg-gradient-to-r from-[#86B6F6] to-[#176B87] rounded-full w-0 transition-all duration-[1000ms] ease-out"></div>

      <button type="button" data-stage="1" data-function="Logs and centralizes incoming community issues or service requests."
        class="flow-stage relative z-10 flex flex-col items-center text-center group focus:outline-none">
        <span class="stage-node flex items-center justify-center w-11 h-11 rounded-full border-2 border-[#86B6F6] bg-white text-[#176B87] font-bold text-sm transition-all duration-300 group-hover:-translate-y-1.5 group-hover:shadow-xl group-hover:scale-105 group-hover:border-[#176B87] group-focus:ring-2 group-focus:ring-[#176B87] group-focus:ring-offset-2">312</span>
        <span class="mt-3 text-xs sm:text-sm font-semibold text-slate-700">Reported</span>
        <span class="text-[10px] sm:text-[11px] text-slate-400">intake logged</span>
      </button>

      <button type="button" data-stage="2" data-function="Dispatches inspectors to verify complaints and document site conditions."
        class="flow-stage relative z-10 flex flex-col items-center text-center group focus:outline-none">
        <span class="stage-node flex items-center justify-center w-11 h-11 rounded-full border-2 border-[#86B6F6] bg-white text-[#176B87] font-bold text-sm transition-all duration-300 group-hover:-translate-y-1.5 group-hover:shadow-xl group-hover:scale-105 group-hover:border-[#176B87] group-focus:ring-2 group-focus:ring-[#176B87] group-focus:ring-offset-2">284</span>
        <span class="mt-3 text-xs sm:text-sm font-semibold text-slate-700">Inspected</span>
        <span class="text-[10px] sm:text-[11px] text-slate-400">site visited</span>
      </button>

      <button type="button" data-stage="3" data-function="Initiates cleanup, pest control, or corrective action plans at the site."
        class="flow-stage relative z-10 flex flex-col items-center text-center group focus:outline-none">
        <span class="stage-node flex items-center justify-center w-11 h-11 rounded-full border-2 border-[#86B6F6] bg-white text-[#176B87] font-bold text-sm transition-all duration-300 group-hover:-translate-y-1.5 group-hover:shadow-xl group-hover:scale-105 group-hover:border-[#176B87] group-focus:ring-2 group-focus:ring-[#176B87] group-focus:ring-offset-2">241</span>
        <span class="mt-3 text-xs sm:text-sm font-semibold text-slate-700">Actioned</span>
        <span class="text-[10px] sm:text-[11px] text-slate-400">treatment applied</span>
      </button>

      <button type="button" data-stage="4" data-function="Verifies that corrective actions meet safety standards, closes the case, and archives the record."
        class="flow-stage relative z-10 flex flex-col items-center text-center group focus:outline-none">
        <span class="stage-node flex items-center justify-center w-11 h-11 rounded-full border-2 border-[#86B6F6] bg-white text-[#176B87] font-bold text-sm transition-all duration-300 group-hover:-translate-y-1.5 group-hover:shadow-xl group-hover:scale-105 group-hover:border-[#176B87] group-focus:ring-2 group-focus:ring-[#176B87] group-focus:ring-offset-2">198</span>
        <span class="mt-3 text-xs sm:text-sm font-semibold text-slate-700">Resolved</span>
        <span class="text-[10px] sm:text-[11px] text-slate-400">closed, verified</span>
      </button>
    </div>

    <div id="stageDesc" class="mt-5 text-xs text-slate-600 bg-gradient-to-r from-[#EEF5FF] to-[#E6F0FA] border border-[#B4D4FF] rounded-xl px-4 py-3 min-h-[46px] flex items-center gap-1.5 transition-all duration-300">
      <span class="font-semibold text-[#176B87] shrink-0">Function:</span>
      <span id="stageDescText" class="transition-opacity duration-200">Select a stage above to see what happens at that step.</span>
    </div>

    <div class="mt-4 flex items-center gap-2">
      <button id="advanceBtn" type="button" class="text-xs font-semibold px-4 py-2 rounded-lg bg-gradient-to-r from-[#176B87] to-[#0F4B5F] text-white hover:from-[#0F4B5F] hover:to-[#176B87] hover:shadow-lg hover:scale-105 active:scale-95 transition-all duration-300 shadow-md">Advance</button>
      <button id="resetBtn" type="button" class="text-xs font-semibold px-4 py-2 rounded-lg border border-slate-200 text-slate-500 hover:bg-slate-50 hover:shadow-lg hover:scale-105 active:scale-95 transition-all duration-300">Reset</button>
    </div>
  </div>

  <!-- ===== ADMIN SUMMARY CARDS (Restyled to match System Overview KPIs) ===== -->
  <div class="kpi-grid grid grid-cols-2 md:grid-cols-4 gap-4 mb-6">
    
    <!-- KPI 1: Total Cases -->
    <a href="#" class="kpi-card glow-blue relative overflow-hidden rounded-2xl shadow-sm cursor-pointer group block">
      <div class="kpi-shine"></div>
      <div class="absolute inset-0 bg-gradient-to-br from-blue-50 via-transparent to-transparent pointer-events-none"></div>
      <i class="fas fa-folder-open kpi-watermark absolute -bottom-3 -right-2 text-[58px] text-blue-500/10 rotate-[-8deg] pointer-events-none"></i>
      <div class="absolute left-0 top-0 h-full w-[3px] bg-gradient-to-b from-blue-400 to-blue-600"></div>
      <div class="relative p-4">
        <div class="flex items-start justify-between gap-2">
          <div>
            <p class="text-[8px] font-bold uppercase tracking-wider text-blue-600">Total Cases</p>
            <p class="kpi-value text-xl font-black text-slate-900 mt-1 leading-none">312</p>
            <p class="text-[8px] font-medium text-slate-400 mt-0.5">All time</p>
          </div>
          <svg viewBox="0 0 36 36" class="kpi-ring w-10 h-10 flex-shrink-0">
            <circle cx="18" cy="18" r="15.5" fill="none" stroke="#e2e8f0" stroke-width="3"/>
            <circle cx="18" cy="18" r="15.5" fill="none" stroke="#3b82f6" stroke-width="3" stroke-linecap="round" pathLength="100" class="kpi-ring-progress" style="--offset:0" transform="rotate(-90 18 18)"/>
            <text x="18" y="20.5" text-anchor="middle" font-size="8.5" font-weight="700" fill="#3b82f6">100%</text>
          </svg>
        </div>
        <div class="mt-2 pt-2 border-t border-slate-100 flex items-center justify-between gap-2">
          <span class="px-1.5 py-0.5 bg-blue-100 text-blue-700 rounded-full text-[7px] font-bold">
            <i class="fas fa-layer-group text-[5px] mr-0.5"></i> Active
          </span>
          <span class="text-[7px] text-slate-400">Pipeline view</span>
          <svg viewBox="0 0 60 20" class="w-8 h-3 opacity-70">
            <polyline points="0,16 10,14 20,15 30,10 40,11 50,4 60,3" fill="none" stroke="#3b82f6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
        </div>
      </div>
    </a>

    <!-- KPI 2: Resolved -->
    <a href="#" class="kpi-card glow-emerald relative overflow-hidden rounded-2xl shadow-sm cursor-pointer group block">
      <div class="kpi-shine"></div>
      <div class="absolute inset-0 bg-gradient-to-br from-emerald-50 via-transparent to-transparent pointer-events-none"></div>
      <i class="fas fa-circle-check kpi-watermark absolute -bottom-3 -right-2 text-[58px] text-emerald-500/10 rotate-[-8deg] pointer-events-none"></i>
      <div class="absolute left-0 top-0 h-full w-[3px] bg-gradient-to-b from-emerald-400 to-emerald-600"></div>
      <div class="relative p-4">
        <div class="flex items-start justify-between gap-2">
          <div>
            <p class="text-[8px] font-bold uppercase tracking-wider text-emerald-600">Resolved</p>
            <p class="kpi-value text-xl font-black text-slate-900 mt-1 leading-none">198</p>
            <p class="text-[8px] font-medium text-slate-400 mt-0.5">Closed & verified</p>
          </div>
          <svg viewBox="0 0 36 36" class="kpi-ring w-10 h-10 flex-shrink-0">
            <circle cx="18" cy="18" r="15.5" fill="none" stroke="#e2e8f0" stroke-width="3"/>
            <circle cx="18" cy="18" r="15.5" fill="none" stroke="#10b981" stroke-width="3" stroke-linecap="round" pathLength="100" class="kpi-ring-progress" style="--offset:37" transform="rotate(-90 18 18)"/>
            <text x="18" y="20.5" text-anchor="middle" font-size="8.5" font-weight="700" fill="#10b981">63%</text>
          </svg>
        </div>
        <div class="mt-2 pt-2 border-t border-slate-100 flex items-center justify-between gap-2">
          <span class="px-1.5 py-0.5 bg-emerald-100 text-emerald-700 rounded-full text-[7px] font-bold">
            <i class="fas fa-arrow-up text-[5px] mr-0.5"></i> High
          </span>
          <span class="text-[7px] text-slate-400">Resolution rate</span>
          <svg viewBox="0 0 60 20" class="w-8 h-3 opacity-70">
            <polyline points="0,12 10,11 20,9 30,8 40,5 50,4 60,2" fill="none" stroke="#10b981" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
        </div>
      </div>
    </a>

    <!-- KPI 3: In Progress -->
    <a href="#" class="kpi-card glow-purple relative overflow-hidden rounded-2xl shadow-sm cursor-pointer group block">
      <div class="kpi-shine"></div>
      <div class="absolute inset-0 bg-gradient-to-br from-purple-50 via-transparent to-transparent pointer-events-none"></div>
      <i class="fas fa-spinner kpi-watermark absolute -bottom-3 -right-2 text-[58px] text-purple-500/10 rotate-[-8deg] pointer-events-none"></i>
      <div class="absolute left-0 top-0 h-full w-[3px] bg-gradient-to-b from-purple-400 to-purple-600"></div>
      <div class="relative p-4">
        <div class="flex items-start justify-between gap-2">
          <div>
            <p class="text-[8px] font-bold uppercase tracking-wider text-purple-600">In Progress</p>
            <p class="kpi-value text-xl font-black text-slate-900 mt-1 leading-none">67</p>
            <p class="text-[8px] font-medium text-slate-400 mt-0.5">Currently active</p>
          </div>
          <svg viewBox="0 0 36 36" class="kpi-ring w-10 h-10 flex-shrink-0">
            <circle cx="18" cy="18" r="15.5" fill="none" stroke="#e2e8f0" stroke-width="3"/>
            <circle cx="18" cy="18" r="15.5" fill="none" stroke="#9333ea" stroke-width="3" stroke-linecap="round" pathLength="100" class="kpi-ring-progress" style="--offset:79" transform="rotate(-90 18 18)"/>
            <text x="18" y="20.5" text-anchor="middle" font-size="8.5" font-weight="700" fill="#9333ea">21%</text>
          </svg>
        </div>
        <div class="mt-2 pt-2 border-t border-slate-100 flex items-center justify-between gap-2">
          <span class="px-1.5 py-0.5 bg-purple-100 text-purple-700 rounded-full text-[7px] font-bold">
            <i class="fas fa-bolt text-[5px] mr-0.5"></i> Working
          </span>
          <span class="text-[7px] text-slate-400">In pipeline</span>
          <svg viewBox="0 0 60 20" class="w-8 h-3 opacity-70">
            <polyline points="0,14 10,13 20,15 30,10 40,12 50,8 60,9" fill="none" stroke="#9333ea" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
        </div>
      </div>
    </a>

    <!-- KPI 4: Flagged -->
    <a href="#" class="kpi-card glow-amber relative overflow-hidden rounded-2xl shadow-sm cursor-pointer group block">
      <div class="kpi-shine"></div>
      <div class="absolute inset-0 bg-gradient-to-br from-amber-50 via-transparent to-transparent pointer-events-none"></div>
      <i class="fas fa-flag kpi-watermark absolute -bottom-3 -right-2 text-[58px] text-amber-500/10 rotate-[-8deg] pointer-events-none"></i>
      <div class="absolute left-0 top-0 h-full w-[3px] bg-gradient-to-b from-amber-400 to-amber-600"></div>
      <div class="relative p-4">
        <div class="flex items-start justify-between gap-2">
          <div>
            <p class="text-[8px] font-bold uppercase tracking-wider text-amber-600">Flagged</p>
            <p class="kpi-value text-xl font-black text-slate-900 mt-1 leading-none">23</p>
            <p class="text-[8px] font-medium text-slate-400 mt-0.5">Needs review</p>
          </div>
          <svg viewBox="0 0 36 36" class="kpi-ring w-10 h-10 flex-shrink-0">
            <circle cx="18" cy="18" r="15.5" fill="none" stroke="#e2e8f0" stroke-width="3"/>
            <circle cx="18" cy="18" r="15.5" fill="none" stroke="#f59e0b" stroke-width="3" stroke-linecap="round" pathLength="100" class="kpi-ring-progress" style="--offset:93" transform="rotate(-90 18 18)"/>
            <text x="18" y="20.5" text-anchor="middle" font-size="8.5" font-weight="700" fill="#f59e0b">7%</text>
          </svg>
        </div>
        <div class="mt-2 pt-2 border-t border-slate-100 flex items-center justify-between gap-2">
          <span class="px-1.5 py-0.5 bg-amber-100 text-amber-700 rounded-full text-[7px] font-bold">
            <i class="fas fa-exclamation text-[5px] mr-0.5"></i> Review
          </span>
          <span class="text-[7px] text-slate-400">Pending check</span>
          <svg viewBox="0 0 60 20" class="w-8 h-3 opacity-70">
            <polyline points="0,6 10,9 20,7 30,12 40,10 50,15 60,17" fill="none" stroke="#f59e0b" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
        </div>
      </div>
    </a>

  </div>

  <!-- ===== CHART + FILTERS ===== -->
  <div class="report-card rounded-2xl p-6 mb-6">
    <div class="flex flex-wrap items-center justify-between gap-4 mb-4">
      <h2 class="font-semibold text-slate-800">Module Activity Trends</h2>
      <div class="flex items-center gap-3 flex-wrap">
        <input type="date" id="dateFrom" class="text-xs border border-slate-300 rounded-lg px-3 py-1.5 focus:ring-2 focus:ring-[#86B6F6] focus:border-transparent transition-all duration-200" />
        <span class="text-slate-400">—</span>
        <input type="date" id="dateTo" class="text-xs border border-slate-300 rounded-lg px-3 py-1.5 focus:ring-2 focus:ring-[#86B6F6] focus:border-transparent transition-all duration-200" />
        <button id="filterBtn" class="text-xs font-semibold px-4 py-1.5 rounded-lg bg-gradient-to-r from-[#176B87] to-[#0F4B5F] text-white hover:from-[#0F4B5F] hover:to-[#176B87] hover:shadow-lg hover:scale-105 transition-all duration-300 shadow-sm">Apply</button>
        <button id="exportBtn" class="text-xs font-semibold px-4 py-1.5 rounded-lg border border-slate-200 text-slate-600 hover:bg-slate-50 hover:shadow-lg hover:scale-105 transition-all duration-300">Export CSV</button>
      </div>
    </div>
    <div id="activityChart"></div>
  </div>

  <!-- ===== ENHANCED MODULE ACTIVITY SUMMARY ===== -->
  <div class="grid grid-cols-1 lg:grid-cols-[1.4fr_1fr] gap-5 mb-6">
    <!-- Module list -->
    <div class="report-card rounded-2xl p-6">
      <div class="flex items-center justify-between mb-1">
        <h2 class="font-semibold text-slate-800">Module Activity Summary</h2>
        <span class="text-[11px] font-semibold text-slate-400 tracking-wider">7-DAY VOLUME</span>
      </div>
      <p class="text-xs text-slate-400 mb-4">Click a module to see its status breakdown and recent actions.</p>

      <div class="divide-y divide-slate-100">
        <!-- Water Quality Monitoring -->
        <div class="module-item">
          <button type="button" aria-expanded="false" class="module-toggle w-full grid grid-cols-[1.6fr_1fr_70px_20px] items-center gap-4 py-3.5 px-2 rounded-xl transition-all duration-300 hover:bg-gradient-to-r hover:from-[#EEF5FF] hover:to-white hover:shadow-md hover:-translate-y-0.5 text-left focus:outline-none focus:ring-2 focus:ring-[#86B6F6] focus:ring-offset-1">
            <div>
              <p class="text-sm font-semibold text-slate-800">Water Quality Monitoring</p>
              <p class="text-[11px] text-slate-400">142 samples logged</p>
            </div>
            <div class="h-1.5 bg-[#EEF5FF] rounded-full overflow-hidden border border-slate-100">
              <div class="h-full rounded-full bg-gradient-to-r from-[#86B6F6] to-[#176B87]" style="width:88%"></div>
            </div>
            <p class="text-right text-sm font-semibold text-slate-700">142</p>
            <svg class="chevron w-4 h-4 text-slate-400 transition-transform duration-300 justify-self-end" viewBox="0 0 20 20" fill="none"><path d="M6 8l4 4 4-4" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
          </button>
          <div class="module-panel grid grid-rows-[0fr] transition-[grid-template-rows] duration-300 ease-in-out">
            <div class="overflow-hidden">
              <div class="px-3 pb-4 pt-1 text-xs text-slate-600 leading-relaxed bg-gradient-to-br from-[#F8FAFC] to-white rounded-lg mt-1 border border-slate-50 shadow-inner">
                <p class="mb-1.5"><span class="font-semibold text-[#176B87]">Purpose:</span> To ensure the safety of public and environmental water sources.</p>
                <p class="mb-3"><span class="font-semibold text-[#176B87]">Function:</span> Logs and tracks chemical, biological, and physical water sample tests from municipal supplies, recreational areas, and local water bodies to prevent contamination-related health outbreaks.</p>
                <div class="grid grid-cols-3 gap-2 mb-3">
                  <span class="bg-gradient-to-r from-emerald-50 to-emerald-100 text-emerald-700 px-2 py-1 rounded-lg text-center font-medium shadow-sm hover:shadow-md transition-all">Resolved 88</span>
                  <span class="bg-gradient-to-r from-[#EEF5FF] to-[#D6E9FF] text-[#176B87] px-2 py-1 rounded-lg text-center font-medium shadow-sm hover:shadow-md transition-all">In prog. 32</span>
                  <span class="bg-gradient-to-r from-orange-50 to-orange-100 text-orange-700 px-2 py-1 rounded-lg text-center font-medium shadow-sm hover:shadow-md transition-all">Flagged 22</span>
                </div>
                <p class="font-semibold text-[#176B87] mb-1">Recent actions</p>
                <ul class="space-y-1 text-slate-500">
                  <li class="hover:translate-x-1 transition-transform">• 09:22 – Flagged elevated turbidity at Well Station 4</li>
                  <li class="hover:translate-x-1 transition-transform">• 08:10 – Routine sample taken at Barangay Central</li>
                  <li class="hover:translate-x-1 transition-transform">• 07:45 – Chlorine level adjusted at Treatment Plant B</li>
                </ul>
              </div>
            </div>
          </div>
        </div>

        <!-- Waste Collection Tracking -->
        <div class="module-item">
          <button type="button" aria-expanded="false" class="module-toggle w-full grid grid-cols-[1.6fr_1fr_70px_20px] items-center gap-4 py-3.5 px-2 rounded-xl transition-all duration-300 hover:bg-gradient-to-r hover:from-[#EEF5FF] hover:to-white hover:shadow-md hover:-translate-y-0.5 text-left focus:outline-none focus:ring-2 focus:ring-[#86B6F6] focus:ring-offset-1">
            <div>
              <p class="text-sm font-semibold text-slate-800">Waste Collection Tracking</p>
              <p class="text-[11px] text-slate-400">98 routes completed</p>
            </div>
            <div class="h-1.5 bg-[#EEF5FF] rounded-full overflow-hidden border border-slate-100">
              <div class="h-full rounded-full bg-gradient-to-r from-[#86B6F6] to-[#176B87]" style="width:61%"></div>
            </div>
            <p class="text-right text-sm font-semibold text-slate-700">98</p>
            <svg class="chevron w-4 h-4 text-slate-400 transition-transform duration-300 justify-self-end" viewBox="0 0 20 20" fill="none"><path d="M6 8l4 4 4-4" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
          </button>
          <div class="module-panel grid grid-rows-[0fr] transition-[grid-template-rows] duration-300 ease-in-out">
            <div class="overflow-hidden">
              <div class="px-3 pb-4 pt-1 text-xs text-slate-600 leading-relaxed bg-gradient-to-br from-[#F8FAFC] to-white rounded-lg mt-1 border border-slate-50 shadow-inner">
                <p class="mb-1.5"><span class="font-semibold text-[#176B87]">Purpose:</span> To maintain community sanitation and prevent environmental hazards.</p>
                <p class="mb-3"><span class="font-semibold text-[#176B87]">Function:</span> Monitors the scheduling, progress, and completion of municipal garbage and solid waste collection routes to ensure timely trash disposal and identify missed service areas.</p>
                <div class="grid grid-cols-3 gap-2 mb-3">
                  <span class="bg-gradient-to-r from-emerald-50 to-emerald-100 text-emerald-700 px-2 py-1 rounded-lg text-center font-medium shadow-sm hover:shadow-md transition-all">Resolved 61</span>
                  <span class="bg-gradient-to-r from-[#EEF5FF] to-[#D6E9FF] text-[#176B87] px-2 py-1 rounded-lg text-center font-medium shadow-sm hover:shadow-md transition-all">In prog. 25</span>
                  <span class="bg-gradient-to-r from-orange-50 to-orange-100 text-orange-700 px-2 py-1 rounded-lg text-center font-medium shadow-sm hover:shadow-md transition-all">Flagged 12</span>
                </div>
                <p class="font-semibold text-[#176B87] mb-1">Recent actions</p>
                <ul class="space-y-1 text-slate-500">
                  <li class="hover:translate-x-1 transition-transform">• 08:57 – Route R-12 marked complete, 8 stops</li>
                  <li class="hover:translate-x-1 transition-transform">• 07:30 – Route R-05 delayed due to road closure</li>
                  <li class="hover:translate-x-1 transition-transform">• 06:45 – Missed pickup reported at Sitio San Juan</li>
                </ul>
              </div>
            </div>
          </div>
        </div>

        <!-- Facility Inspections -->
        <div class="module-item">
          <button type="button" aria-expanded="false" class="module-toggle w-full grid grid-cols-[1.6fr_1fr_70px_20px] items-center gap-4 py-3.5 px-2 rounded-xl transition-all duration-300 hover:bg-gradient-to-r hover:from-[#EEF5FF] hover:to-white hover:shadow-md hover:-translate-y-0.5 text-left focus:outline-none focus:ring-2 focus:ring-[#86B6F6] focus:ring-offset-1">
            <div>
              <p class="text-sm font-semibold text-slate-800">Facility Inspections</p>
              <p class="text-[11px] text-slate-400">76 sites reviewed</p>
            </div>
            <div class="h-1.5 bg-[#EEF5FF] rounded-full overflow-hidden border border-slate-100">
              <div class="h-full rounded-full bg-gradient-to-r from-[#86B6F6] to-[#176B87]" style="width:47%"></div>
            </div>
            <p class="text-right text-sm font-semibold text-slate-700">76</p>
            <svg class="chevron w-4 h-4 text-slate-400 transition-transform duration-300 justify-self-end" viewBox="0 0 20 20" fill="none"><path d="M6 8l4 4 4-4" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
          </button>
          <div class="module-panel grid grid-rows-[0fr] transition-[grid-template-rows] duration-300 ease-in-out">
            <div class="overflow-hidden">
              <div class="px-3 pb-4 pt-1 text-xs text-slate-600 leading-relaxed bg-gradient-to-br from-[#F8FAFC] to-white rounded-lg mt-1 border border-slate-50 shadow-inner">
                <p class="mb-1.5"><span class="font-semibold text-[#176B87]">Purpose:</span> To enforce sanitation standards in commercial and public spaces.</p>
                <p class="mb-3"><span class="font-semibold text-[#176B87]">Function:</span> Schedules, records, and tracks physical health inspections for food establishments, public facilities, and businesses to ensure they comply with local sanitary codes and regulations.</p>
                <div class="grid grid-cols-3 gap-2 mb-3">
                  <span class="bg-gradient-to-r from-emerald-50 to-emerald-100 text-emerald-700 px-2 py-1 rounded-lg text-center font-medium shadow-sm hover:shadow-md transition-all">Resolved 41</span>
                  <span class="bg-gradient-to-r from-[#EEF5FF] to-[#D6E9FF] text-[#176B87] px-2 py-1 rounded-lg text-center font-medium shadow-sm hover:shadow-md transition-all">In prog. 24</span>
                  <span class="bg-gradient-to-r from-orange-50 to-orange-100 text-orange-700 px-2 py-1 rounded-lg text-center font-medium shadow-sm hover:shadow-md transition-all">Flagged 11</span>
                </div>
                <p class="font-semibold text-[#176B87] mb-1">Recent actions</p>
                <ul class="space-y-1 text-slate-500">
                  <li class="hover:translate-x-1 transition-transform">• 10:15 – Inspection completed at Riverside Eatery</li>
                  <li class="hover:translate-x-1 transition-transform">• 09:00 – Re-inspection ordered for Downtown Diner</li>
                  <li class="hover:translate-x-1 transition-transform">• 08:20 – Report submitted for Barangay Health Center</li>
                </ul>
              </div>
            </div>
          </div>
        </div>

        <!-- Vector & Pest Control -->
        <div class="module-item">
          <button type="button" aria-expanded="false" class="module-toggle w-full grid grid-cols-[1.6fr_1fr_70px_20px] items-center gap-4 py-3.5 px-2 rounded-xl transition-all duration-300 hover:bg-gradient-to-r hover:from-[#EEF5FF] hover:to-white hover:shadow-md hover:-translate-y-0.5 text-left focus:outline-none focus:ring-2 focus:ring-[#86B6F6] focus:ring-offset-1">
            <div>
              <p class="text-sm font-semibold text-slate-800">Vector & Pest Control</p>
              <p class="text-[11px] text-slate-400">54 treatments issued</p>
            </div>
            <div class="h-1.5 bg-[#EEF5FF] rounded-full overflow-hidden border border-slate-100">
              <div class="h-full rounded-full bg-gradient-to-r from-[#86B6F6] to-[#176B87]" style="width:34%"></div>
            </div>
            <p class="text-right text-sm font-semibold text-slate-700">54</p>
            <svg class="chevron w-4 h-4 text-slate-400 transition-transform duration-300 justify-self-end" viewBox="0 0 20 20" fill="none"><path d="M6 8l4 4 4-4" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
          </button>
          <div class="module-panel grid grid-rows-[0fr] transition-[grid-template-rows] duration-300 ease-in-out">
            <div class="overflow-hidden">
              <div class="px-3 pb-4 pt-1 text-xs text-slate-600 leading-relaxed bg-gradient-to-br from-[#F8FAFC] to-white rounded-lg mt-1 border border-slate-50 shadow-inner">
                <p class="mb-1.5"><span class="font-semibold text-[#176B87]">Purpose:</span> To mitigate the spread of vector-borne illnesses (e.g., dengue, malaria, rodent-borne diseases).</p>
                <p class="mb-3"><span class="font-semibold text-[#176B87]">Function:</span> Tracks the dispatch, application, and effectiveness of chemical or biological pest treatments (like spraying or baiting) in high-risk municipal zones.</p>
                <div class="grid grid-cols-3 gap-2 mb-3">
                  <span class="bg-gradient-to-r from-emerald-50 to-emerald-100 text-emerald-700 px-2 py-1 rounded-lg text-center font-medium shadow-sm hover:shadow-md transition-all">Resolved 28</span>
                  <span class="bg-gradient-to-r from-[#EEF5FF] to-[#D6E9FF] text-[#176B87] px-2 py-1 rounded-lg text-center font-medium shadow-sm hover:shadow-md transition-all">In prog. 16</span>
                  <span class="bg-gradient-to-r from-orange-50 to-orange-100 text-orange-700 px-2 py-1 rounded-lg text-center font-medium shadow-sm hover:shadow-md transition-all">Flagged 10</span>
                </div>
                <p class="font-semibold text-[#176B87] mb-1">Recent actions</p>
                <ul class="space-y-1 text-slate-500">
                  <li class="hover:translate-x-1 transition-transform">• 08:30 – Treatment order for Sitio Ilaya drainage canal</li>
                  <li class="hover:translate-x-1 transition-transform">• 07:15 – Spraying completed at Barangay San Jose</li>
                  <li class="hover:translate-x-1 transition-transform">• 06:50 – Bait stations replenished in Market Area</li>
                </ul>
              </div>
            </div>
          </div>
        </div>

        <!-- Community Health Advisories -->
        <div class="module-item">
          <button type="button" aria-expanded="false" class="module-toggle w-full grid grid-cols-[1.6fr_1fr_70px_20px] items-center gap-4 py-3.5 px-2 rounded-xl transition-all duration-300 hover:bg-gradient-to-r hover:from-[#EEF5FF] hover:to-white hover:shadow-md hover:-translate-y-0.5 text-left focus:outline-none focus:ring-2 focus:ring-[#86B6F6] focus:ring-offset-1">
            <div>
              <p class="text-sm font-semibold text-slate-800">Community Health Advisories</p>
              <p class="text-[11px] text-slate-400">31 notices sent</p>
            </div>
            <div class="h-1.5 bg-[#EEF5FF] rounded-full overflow-hidden border border-slate-100">
              <div class="h-full rounded-full bg-gradient-to-r from-[#86B6F6] to-[#176B87]" style="width:19%"></div>
            </div>
            <p class="text-right text-sm font-semibold text-slate-700">31</p>
            <svg class="chevron w-4 h-4 text-slate-400 transition-transform duration-300 justify-self-end" viewBox="0 0 20 20" fill="none"><path d="M6 8l4 4 4-4" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
          </button>
          <div class="module-panel grid grid-rows-[0fr] transition-[grid-template-rows] duration-300 ease-in-out">
            <div class="overflow-hidden">
              <div class="px-3 pb-4 pt-1 text-xs text-slate-600 leading-relaxed bg-gradient-to-br from-[#F8FAFC] to-white rounded-lg mt-1 border border-slate-50 shadow-inner">
                <p class="mb-1.5"><span class="font-semibold text-[#176B87]">Purpose:</span> To keep the public informed of immediate health risks and prevention practices.</p>
                <p class="mb-3"><span class="font-semibold text-[#176B87]">Function:</span> Manages the distribution of urgent sanitation alerts, boil-water notices, and educational campaigns to citizens, businesses, and local health networks.</p>
                <div class="grid grid-cols-3 gap-2 mb-3">
                  <span class="bg-gradient-to-r from-emerald-50 to-emerald-100 text-emerald-700 px-2 py-1 rounded-lg text-center font-medium shadow-sm hover:shadow-md transition-all">Resolved 18</span>
                  <span class="bg-gradient-to-r from-[#EEF5FF] to-[#D6E9FF] text-[#176B87] px-2 py-1 rounded-lg text-center font-medium shadow-sm hover:shadow-md transition-all">In prog. 8</span>
                  <span class="bg-gradient-to-r from-orange-50 to-orange-100 text-orange-700 px-2 py-1 rounded-lg text-center font-medium shadow-sm hover:shadow-md transition-all">Flagged 5</span>
                </div>
                <p class="font-semibold text-[#176B87] mb-1">Recent actions</p>
                <ul class="space-y-1 text-slate-500">
                  <li class="hover:translate-x-1 transition-transform">• 08:04 – Boil-water notice sent to 340 households</li>
                  <li class="hover:translate-x-1 transition-transform">• 07:20 – Dengue prevention flyer distributed in schools</li>
                  <li class="hover:translate-x-1 transition-transform">• 06:30 – Emergency alert issued for flooding in low-lying areas</li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- ===== CASE STATUS ===== -->
    <div class="report-card rounded-2xl p-6">
      <div class="flex items-center justify-between mb-1">
        <h2 class="font-semibold text-slate-800">Case status</h2>
        <span class="text-[11px] font-semibold text-slate-400 tracking-wider">CURRENT</span>
      </div>
      <p class="text-xs text-slate-400 mb-4">Purpose: Gives supervisors a high-level view of departmental workload and bottlenecks, segregated by priority queue so staff can be redistributed toward blocked or complicated cases.</p>

      <div class="flex flex-col gap-3">
        <div class="flex items-center justify-between px-4 py-3 rounded-xl bg-gradient-to-r from-[#EEF5FF] to-white hover:from-white hover:to-[#EEF5FF] border border-transparent hover:border-[#86B6F6] hover:shadow-lg hover:-translate-y-0.5 transition-all duration-300 cursor-default">
          <span class="flex items-center gap-2.5 text-sm font-medium text-slate-700"><span class="w-2.5 h-2.5 rounded-full bg-emerald-500"></span>Resolved</span>
          <span class="text-sm font-bold text-[#176B87]">198</span>
        </div>
        <div class="flex items-center justify-between px-4 py-3 rounded-xl bg-gradient-to-r from-[#EEF5FF] to-white hover:from-white hover:to-[#EEF5FF] border border-transparent hover:border-[#86B6F6] hover:shadow-lg hover:-translate-y-0.5 transition-all duration-300 cursor-default">
          <span class="flex items-center gap-2.5 text-sm font-medium text-slate-700"><span class="w-2.5 h-2.5 rounded-full bg-[#176B87]"></span>In progress</span>
          <span class="text-sm font-bold text-[#176B87]">67</span>
        </div>
        <div class="flex items-center justify-between px-4 py-3 rounded-xl bg-gradient-to-r from-[#EEF5FF] to-white hover:from-white hover:to-[#EEF5FF] border border-transparent hover:border-[#86B6F6] hover:shadow-lg hover:-translate-y-0.5 transition-all duration-300 cursor-default">
          <span class="flex items-center gap-2.5 text-sm font-medium text-slate-700"><span class="w-2.5 h-2.5 rounded-full bg-amber-600"></span>Flagged for review</span>
          <span class="text-sm font-bold text-[#176B87]">23</span>
        </div>
        <div class="flex items-center justify-between px-4 py-3 rounded-xl bg-gradient-to-r from-[#EEF5FF] to-white hover:from-white hover:to-[#EEF5FF] border border-transparent hover:border-[#86B6F6] hover:shadow-lg hover:-translate-y-0.5 transition-all duration-300 cursor-default">
          <span class="flex items-center gap-2.5 text-sm font-medium text-slate-700"><span class="w-2.5 h-2.5 rounded-full bg-[#86B6F6]"></span>Awaiting inspection</span>
          <span class="text-sm font-bold text-[#176B87]">24</span>
        </div>
      </div>
    </div>
  </div>

  <!-- ===== RECENT ACTIVITY ===== -->
  <div class="report-card rounded-2xl p-6">
    <div class="flex items-center justify-between mb-4">
      <h2 class="font-semibold text-slate-800">Recent activity</h2>
      <div class="flex items-center gap-2">
        <span class="relative flex h-2 w-2">
          <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-400 opacity-75"></span>
          <span class="relative inline-flex rounded-full h-2 w-2 bg-red-500"></span>
        </span>
        <span class="text-[11px] font-semibold text-slate-400 tracking-wider">LIVE LOG</span>
      </div>
    </div>
    <div id="liveLogContainer" class="divide-y divide-dashed divide-slate-200">
      <div class="log-item grid grid-cols-[80px_1fr_110px] gap-4 items-baseline py-3 px-2 rounded-lg hover:bg-gradient-to-r hover:from-[#EEF5FF] hover:to-white hover:shadow-md hover:-translate-y-0.5 transition-all duration-300 cursor-default">
        <span class="text-xs text-slate-400">09:41 AM</span>
        <span class="text-sm text-slate-700"><span class="font-semibold">Inspector J. Reyes</span> completed site visit at Barangay Malanday Market</span>
        <span class="justify-self-end text-[10px] font-semibold uppercase tracking-wide px-2.5 py-1 rounded-full bg-gradient-to-r from-[#B4D4FF] to-[#86B6F6] text-[#176B87] shadow-sm">Inspected</span>
      </div>
      <div class="log-item grid grid-cols-[80px_1fr_110px] gap-4 items-baseline py-3 px-2 rounded-lg hover:bg-gradient-to-r hover:from-[#EEF5FF] hover:to-white hover:shadow-md hover:-translate-y-0.5 transition-all duration-300 cursor-default">
        <span class="text-xs text-slate-400">09:22 AM</span>
        <span class="text-sm text-slate-700"><span class="font-semibold">Water Quality Monitoring</span> flagged elevated turbidity at Well Station 4</span>
        <span class="justify-self-end text-[10px] font-semibold uppercase tracking-wide px-2.5 py-1 rounded-full bg-gradient-to-r from-orange-100 to-orange-200 text-orange-700 shadow-sm">Flagged</span>
      </div>
      <div class="log-item grid grid-cols-[80px_1fr_110px] gap-4 items-baseline py-3 px-2 rounded-lg hover:bg-gradient-to-r hover:from-[#EEF5FF] hover:to-white hover:shadow-md hover:-translate-y-0.5 transition-all duration-300 cursor-default">
        <span class="text-xs text-slate-400">08:57 AM</span>
        <span class="text-sm text-slate-700"><span class="font-semibold">Waste Collection</span> route R-12 marked complete, 8 stops, no exceptions</span>
        <span class="justify-self-end text-[10px] font-semibold uppercase tracking-wide px-2.5 py-1 rounded-full bg-gradient-to-r from-emerald-100 to-emerald-200 text-emerald-700 shadow-sm">Cleared</span>
      </div>
      <div class="log-item grid grid-cols-[80px_1fr_110px] gap-4 items-baseline py-3 px-2 rounded-lg hover:bg-gradient-to-r hover:from-[#EEF5FF] hover:to-white hover:shadow-md hover:-translate-y-0.5 transition-all duration-300 cursor-default">
        <span class="text-xs text-slate-400">08:30 AM</span>
        <span class="text-sm text-slate-700"><span class="font-semibold">Vector Control</span> issued treatment order for Sitio Ilaya drainage canal</span>
        <span class="justify-self-end text-[10px] font-semibold uppercase tracking-wide px-2.5 py-1 rounded-full bg-gradient-to-r from-[#B4D4FF] to-[#86B6F6] text-[#176B87] shadow-sm">Actioned</span>
      </div>
      <div class="log-item grid grid-cols-[80px_1fr_110px] gap-4 items-baseline py-3 px-2 rounded-lg hover:bg-gradient-to-r hover:from-[#EEF5FF] hover:to-white hover:shadow-md hover:-translate-y-0.5 transition-all duration-300 cursor-default">
        <span class="text-xs text-slate-400">08:04 AM</span>
        <span class="text-sm text-slate-700"><span class="font-semibold">Community Advisory</span> boil-water notice sent to 340 households</span>
        <span class="justify-self-end text-[10px] font-semibold uppercase tracking-wide px-2.5 py-1 rounded-full bg-gradient-to-r from-emerald-100 to-emerald-200 text-emerald-700 shadow-sm">Sent</span>
      </div>
    </div>
  </div>

</main>

<!-- ===== SCRIPTS ===== -->
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script src="../assets/js/module_activity.js" defer></script>

<?php include '../includes/footer.php'; ?>