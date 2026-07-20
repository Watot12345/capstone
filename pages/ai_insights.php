=<?php include '../includes/header.php'; ?>
<?php include '../includes/sidebar.php'; ?>

<style>
    @media print {
        .no-print { display: none !important; }
    }
    
    /* Smooth animations */
    .fade-in {
        animation: fadeIn 0.3s ease-in-out;
    }
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(8px); }
        to { opacity: 1; transform: translateY(0); }
    }
    
    .pulse-dot {
        animation: pulse 2s infinite;
    }
    @keyframes pulse {
        0%, 100% { opacity: 1; }
        50% { opacity: 0.3; }
    }
    
    /* Scrollable table container */
    .scrollable-table {
        max-height: 300px;
        overflow-y: auto;
    }
    .scrollable-table::-webkit-scrollbar {
        width: 4px;
    }
    .scrollable-table::-webkit-scrollbar-track {
        background: #f1f1f1;
        border-radius: 4px;
    }
    .scrollable-table::-webkit-scrollbar-thumb {
        background: #c1c1c1;
        border-radius: 4px;
    }
    
    /* Enhanced hover effects */
    .hover-lift {
        transition: transform 0.2s cubic-bezier(0.4, 0, 0.2, 1), box-shadow 0.2s cubic-bezier(0.4, 0, 0.2, 1);
    }
    .hover-lift:hover {
        transform: translateY(-3px);
        box-shadow: 0 12px 40px rgba(0,0,0,0.08);
    }
    
    /* Skeleton loading */
    .skeleton {
        animation: shimmer 1.5s infinite;
        background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
        background-size: 200% 100%;
    }
    @keyframes shimmer {
        0% { background-position: -200% 0; }
        100% { background-position: 200% 0; }
    }
    
    /* Tooltip enhancements */
    .tooltip-trigger {
        position: relative;
    }
    .tooltip-trigger:hover .tooltip-content {
        opacity: 1;
        visibility: visible;
        transform: translateY(0);
    }
    .tooltip-content {
        opacity: 0;
        visibility: hidden;
        transform: translateY(-4px);
        transition: all 0.2s ease;
    }
    
    /* Performance metric card enhancements */
    .metric-card {
        transition: all 0.25s cubic-bezier(0.4, 0, 0.2, 1);
        border: 1px solid #e5e7eb;
    }
    .metric-card:hover {
        border-color: #93c5fd;
        box-shadow: 0 8px 25px rgba(59, 130, 246, 0.08);
        transform: translateY(-2px);
    }
    
    /* Status indicators */
    .status-dot {
        display: inline-block;
        width: 6px;
        height: 6px;
        border-radius: 50%;
        margin-right: 4px;
    }
    .status-dot.online { background: #22c55e; }
    .status-dot.warning { background: #eab308; }
    .status-dot.offline { background: #ef4444; }
    
    /* Keyboard shortcut badge */
    .kbd {
        display: inline-block;
        padding: 1px 6px;
        font-size: 9px;
        font-weight: 600;
        color: #6b7280;
        background: #f3f4f6;
        border-radius: 3px;
        border: 1px solid #e5e7eb;
        font-family: monospace;
    }
</style>

<main class="flex-1 h-screen flex flex-col m-5 overflow-y-auto overflow-x-hidden rounded-2xl font-sans scrollbar-track-transparent">
    <div class="p-6">
        <!-- Page Header -->
        <div class="mb-6 flex items-start justify-between flex-wrap gap-2">
            <div>
                <h1 class="text-2xl font-bold text-gray-800 flex items-center gap-3">
                    Analytics
                    <span class="text-xs font-medium text-gray-500 bg-gray-100 px-2.5 py-0.5 rounded-full">v2.5.0</span>
                </h1>
                <p class="text-sm text-gray-500 mt-0.5">AI-powered insights and advanced analytics for data-driven decisions</p>
            </div>
            <!-- Quick Stats Badge -->
            <div class="flex items-center gap-3 bg-white px-4 py-2 rounded-xl border border-gray-200 shadow-sm">
                <span class="text-xs text-gray-500">Data Freshness</span>
                <span class="flex items-center gap-1.5">
                    <span class="relative flex h-2 w-2">
                        <span class="absolute inline-flex h-full w-full animate-ping rounded-full bg-emerald-400 opacity-75"></span>
                        <span class="relative inline-flex h-2 w-2 rounded-full bg-emerald-500"></span>
                    </span>
                    <span class="text-xs font-medium text-gray-700" id="headerTimestamp">Live</span>
                </span>
                <span class="w-px h-4 bg-gray-200"></span>
                <span class="text-xs text-gray-500">
                    <span class="status-dot online"></span> All systems go
                </span>
                <span class="w-px h-4 bg-gray-200"></span>
                <span class="text-[10px] text-gray-400 font-mono" id="sessionId">Session: <span class="text-gray-600">●</span></span>
            </div>
        </div>

        <!-- ====== GLOBAL TOOLBAR ====== -->
        <div class="no-print mb-6 rounded-2xl border border-gray-200 bg-white p-4 shadow-sm flex flex-wrap items-center gap-4">
            <!-- Date Range Picker -->
            <div class="flex items-center gap-2">
                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                </svg>
                <select id="dateRangeSelect" class="text-xs bg-gray-50 text-gray-700 border border-gray-200 rounded-lg px-2.5 py-1.5 focus:outline-none focus:ring-2 focus:ring-blue-100">
                    <option value="today">Today</option>
                    <option value="7d">Last 7 Days</option>
                    <option value="30d">Last 30 Days</option>
                    <option value="90d">Last 90 Days</option>
                    <option value="6m" selected>Last 6 Months</option>
                    <option value="12m">Last 12 Months</option>
                    <option value="custom">Custom Range</option>
                </select>
                <div id="customDateWrap" class="hidden items-center gap-1">
                    <input type="date" id="dateFrom" class="text-xs bg-gray-50 text-gray-700 border border-gray-200 rounded-lg px-2 py-1.5 focus:outline-none focus:ring-2 focus:ring-blue-100">
                    <span class="text-gray-300">–</span>
                    <input type="date" id="dateTo" class="text-xs bg-gray-50 text-gray-700 border border-gray-200 rounded-lg px-2 py-1.5 focus:outline-none focus:ring-2 focus:ring-blue-100">
                </div>
            </div>

            <div class="h-6 w-px bg-gray-200"></div>

            <!-- YoY Comparison -->
            <label class="flex items-center gap-2 text-xs text-gray-600 cursor-pointer select-none">
                <span class="relative inline-flex items-center">
                    <input type="checkbox" id="yoyToggle" class="sr-only peer">
                    <span class="w-9 h-5 bg-gray-200 peer-checked:bg-blue-600 rounded-full transition-colors"></span>
                    <span class="absolute left-0.5 top-0.5 w-4 h-4 bg-white rounded-full shadow transition-transform peer-checked:translate-x-4"></span>
                </span>
                Compare YoY
                <span class="text-[10px] text-gray-400 font-mono">(⌘Y)</span>
            </label>

            <div class="h-6 w-px bg-gray-200"></div>

            <!-- Auto-refresh -->
            <div class="flex items-center gap-2 text-xs text-gray-600">
                <label class="flex items-center gap-2 cursor-pointer select-none">
                    <span class="relative inline-flex items-center">
                        <input type="checkbox" id="autoRefreshToggle" class="sr-only peer" checked>
                        <span class="w-9 h-5 bg-gray-200 peer-checked:bg-emerald-600 rounded-full transition-colors"></span>
                        <span class="absolute left-0.5 top-0.5 w-4 h-4 bg-white rounded-full shadow transition-transform peer-checked:translate-x-4"></span>
                    </span>
                    Auto-refresh
                </label>
                <select id="refreshIntervalSelect" class="text-xs bg-gray-50 text-gray-700 border border-gray-200 rounded-lg px-2 py-1.5 focus:outline-none">
                    <option value="15">15s</option>
                    <option value="30" selected>30s</option>
                    <option value="60">1m</option>
                    <option value="300">5m</option>
                </select>
                <span id="lastUpdatedLabel" class="text-gray-400 whitespace-nowrap">Updated just now</span>
            </div>

            <!-- Right-aligned actions -->
            <div class="ml-auto flex items-center gap-2">
                <!-- Quick Actions Dropdown -->
                <div class="relative">
                    <button id="quickActionsBtn" type="button" class="flex items-center gap-1.5 text-xs font-medium text-gray-600 border border-gray-200 rounded-lg px-3 py-1.5 hover:bg-gray-50">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"></path>
                        </svg>
                        Quick Actions
                    </button>
                    <div id="quickActionsMenu" class="hidden absolute right-0 mt-2 w-48 bg-white border border-gray-200 rounded-xl shadow-lg z-20 p-1.5">
                        <button onclick="refreshData()" class="w-full text-left text-xs text-gray-600 hover:bg-gray-50 rounded-lg px-3 py-2 flex items-center gap-2">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path></svg>
                            Force Refresh
                        </button>
                        <button onclick="resetAllFilters()" class="w-full text-left text-xs text-gray-600 hover:bg-gray-50 rounded-lg px-3 py-2 flex items-center gap-2">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path></svg>
                            Reset All Filters
                        </button>
                        <button onclick="exportDashboardSnapshot()" class="w-full text-left text-xs text-gray-600 hover:bg-gray-50 rounded-lg px-3 py-2 flex items-center gap-2">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v2a2 2 0 002 2h12a2 2 0 002-2v-2M7 10l5 5 5-5M12 15V3"></path></svg>
                            Export Snapshot
                        </button>
                        <hr class="my-1 border-gray-100">
                        <button onclick="showKeyboardShortcuts()" class="w-full text-left text-xs text-gray-600 hover:bg-gray-50 rounded-lg px-3 py-2 flex items-center gap-2">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                            Keyboard Shortcuts
                        </button>
                    </div>
                </div>

                <!-- Saved Views -->
                <div class="relative">
                    <button id="savedViewsBtn" type="button" class="flex items-center gap-1.5 text-xs font-medium text-gray-600 border border-gray-200 rounded-lg px-3 py-1.5 hover:bg-gray-50">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-4-7 4V5z"></path></svg>
                        Saved Views
                        <span class="text-[10px] text-gray-400 font-mono">(⌘S)</span>
                    </button>
                    <div id="savedViewsMenu" class="hidden absolute right-0 mt-2 w-64 bg-white border border-gray-200 rounded-xl shadow-lg z-20 p-2">
                        <div class="flex items-center justify-between mb-2 px-2">
                            <span class="text-[10px] font-medium text-gray-400 uppercase tracking-wider">Your Views</span>
                            <span class="text-[10px] text-gray-400" id="viewCount">0 saved</span>
                        </div>
                        <div id="savedViewsList" class="max-h-48 overflow-y-auto space-y-0.5"></div>
                        <button id="saveViewBtn" type="button" class="mt-2 w-full text-xs font-medium text-blue-600 hover:bg-blue-50 rounded-lg px-3 py-2 text-left flex items-center gap-2">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                            Save current view
                        </button>
                    </div>
                </div>

                <!-- Export -->
                <div class="relative">
                    <button id="exportMenuBtn" type="button" class="flex items-center gap-1.5 text-xs font-medium text-gray-600 border border-gray-200 rounded-lg px-3 py-1.5 hover:bg-gray-50">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v2a2 2 0 002 2h12a2 2 0 002-2v-2M7 10l5 5 5-5M12 15V3"></path></svg>
                        Export
                    </button>
                    <div id="exportMenu" class="hidden absolute right-0 mt-2 w-48 bg-white border border-gray-200 rounded-xl shadow-lg z-20 p-1.5">
                        <button onclick="exportCSV()" type="button" class="w-full text-left text-xs text-gray-600 hover:bg-gray-50 rounded-lg px-3 py-2 flex items-center gap-2">
                            <span class="text-gray-400">📊</span> Export as CSV
                        </button>
                        <button onclick="exportJSON()" type="button" class="w-full text-left text-xs text-gray-600 hover:bg-gray-50 rounded-lg px-3 py-2 flex items-center gap-2">
                            <span class="text-gray-400">📋</span> Export as JSON
                        </button>
                        <button onclick="exportPDF()" type="button" class="w-full text-left text-xs text-gray-600 hover:bg-gray-50 rounded-lg px-3 py-2 flex items-center gap-2">
                            <span class="text-gray-400">📄</span> Export as PDF
                        </button>
                        <hr class="my-1 border-gray-100">
                        <button onclick="printReport()" type="button" class="w-full text-left text-xs text-gray-600 hover:bg-gray-50 rounded-lg px-3 py-2 flex items-center gap-2">
                            <span class="text-gray-400">🖨️</span> Print <span class="text-[10px] text-gray-400 font-mono ml-auto">⌘P</span>
                        </button>
                    </div>
                </div>

                <!-- Share -->
                <button id="shareBtn" type="button" class="flex items-center gap-1.5 text-xs font-medium text-white bg-blue-600 rounded-lg px-3 py-1.5 hover:bg-blue-700 transition-colors">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342a4 4 0 100-2.684m0 2.684a4 4 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a4 4 0 105.657-5.657 4 4 0 00-5.657 5.657zm0 9.316a4 4 0 105.657 5.657 4 4 0 00-5.657-5.657z"></path></svg>
                    Share
                </button>

                <!-- Fullscreen -->
                <button id="fullscreenBtn" type="button" class="flex items-center gap-1.5 text-xs font-medium text-gray-600 border border-gray-200 rounded-lg px-3 py-1.5 hover:bg-gray-50">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8V4m0 0h4M4 4l5 5m11-5v4m0-4h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5v-4m0 4h-4m4 0l-5-5"></path></svg>
                    <span class="hidden xl:inline">Fullscreen</span>
                    <span class="text-[10px] text-gray-400 font-mono">⌘F</span>
                </button>
            </div>
        </div>

        <!-- ====== ANOMALY DETECTION BANNER ====== -->
        <div id="anomalyBanner" class="hidden mb-6 rounded-2xl border border-red-200 bg-red-50 p-4 fade-in">
            <div class="flex items-start gap-3">
                <div class="p-2 bg-red-100 rounded-lg shrink-0">
                    <svg class="w-4 h-4 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636a9 9 0 11-12.728 0M12 9v4m0 4h.01"></path>
                    </svg>
                </div>
                <div class="flex-1">
                    <p class="text-sm font-semibold text-red-700"><span id="anomalyCount">0</span> anomalies detected</p>
                    <ul id="anomalyItems" class="text-xs text-red-600 mt-1 space-y-1 list-disc list-inside"></ul>
                </div>
                <div class="flex items-center gap-2 shrink-0">
                    <button id="viewAnomaliesBtn" type="button" class="no-print text-xs font-medium text-red-600 hover:text-red-800 underline">View All</button>
                    <button id="dismissAnomaly" type="button" class="no-print text-xs font-medium text-red-500 hover:text-red-700">Dismiss</button>
                </div>
            </div>
        </div>

        <!-- ====== AI INSIGHTS ====== -->
        <div class="mb-6 rounded-2xl border border-gray-200 bg-white p-6 shadow-sm hover-lift">
            <div class="flex items-center gap-2 mb-4">
                <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                </svg>
                <h2 class="text-sm font-semibold uppercase tracking-wider text-gray-600">AI Insights</h2>
                <span class="text-xs px-2 py-1 bg-purple-50 text-purple-600 rounded-full font-medium flex items-center gap-1">
                    <span class="pulse-dot">●</span> Live
                </span>
                <span class="text-xs text-gray-400 ml-1">| <span id="insightCount">4</span> insights</span>
                <a href="#" class="ml-auto text-xs font-medium text-blue-600 hover:text-blue-700 flex items-center gap-1">
                    View All
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                    </svg>
                </a>
            </div>
            <div class="grid grid-cols-1 xl:grid-cols-4 gap-4" id="insightsGrid">
                <!-- Insight cards rendered by JavaScript -->
            </div>
        </div>

        <!-- ====== TREND ANALYSIS + PREDICTIVE ANALYTICS + OPERATIONAL MODULES ====== -->
        <div class="mb-6 grid grid-cols-1 xl:grid-cols-3 gap-6">
            <!-- Trend Analysis -->
            <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm hover-lift">
                <div class="flex items-center justify-between mb-1">
                    <div class="flex items-center gap-2">
                        <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                        </svg>
                        <h2 class="text-sm font-semibold uppercase tracking-wider text-gray-600">Trend Analysis</h2>
                    </div>
                    <button onclick="resetTrendZoom()" class="text-xs text-blue-600 hover:text-blue-700 hidden" id="resetZoomBtn">Reset Zoom</button>
                </div>
                <div class="flex items-center gap-2 mt-2">
                    <select id="trendFilter" class="text-xs bg-gray-50 text-gray-600 border border-gray-200 rounded-lg px-3 py-1.5 focus:outline-none focus:ring-2 focus:ring-blue-100 flex-1">
                        <option value="disease" selected>Disease Surveillance</option>
                        <option value="service">Service Requests</option>
                        <option value="combined">Combined View</option>
                    </select>
                    <button id="trendExportBtn" class="text-xs bg-gray-50 border border-gray-200 rounded-lg px-2 py-1.5 hover:bg-gray-100" title="Export chart data">
                        <svg class="w-3.5 h-3.5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v2a2 2 0 002 2h12a2 2 0 002-2v-2M7 10l5 5 5-5M12 15V3"></path></svg>
                    </button>
                </div>
                <p id="trendSubtitle" class="text-xs text-gray-400 mt-3 mb-2">Disease Cases Trend</p>
                <div id="trendChart" class="h-56"></div>
                <div id="trendLegend" class="mt-2 flex flex-wrap items-center gap-3 text-xs text-gray-500"></div>
            </div>

            <!-- Predictive Analytics -->
            <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm hover-lift">
                <div class="flex items-center justify-between mb-1">
                    <div class="flex items-center gap-2">
                        <svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                        </svg>
                        <h2 class="text-sm font-semibold uppercase tracking-wider text-gray-600">Predictive Analytics</h2>
                    </div>
                    <span class="text-[10px] font-medium px-2 py-0.5 bg-emerald-50 text-emerald-700 rounded-full">AI Forecast</span>
                </div>
                <p class="text-xs text-gray-400 mb-4">Next Month Forecast · Confidence interval ±5%</p>

                <div class="space-y-3" id="predictiveCards">
                    <!-- Rendered by JavaScript -->
                </div>
            </div>

            <!-- Operational Modules (Pie Chart) -->
            <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm hover-lift">
                <div class="flex items-center gap-2 mb-1">
                    <svg class="w-5 h-5 text-rose-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.488 9H15V3.512A9.024 9.024 0 0120.488 9z"></path>
                    </svg>
                    <h2 class="text-sm font-semibold uppercase tracking-wider text-gray-600">Operational Modules</h2>
                    <span class="ml-auto text-[10px] font-medium px-2 py-0.5 bg-gray-100 text-gray-600 rounded-full">By Activity</span>
                </div>
                <p class="text-xs text-gray-400 mb-2">Share of activity by module · click a slice for detail</p>
                <div id="modulesChart" class="h-56"></div>
                <div class="mt-3 space-y-2 text-xs text-gray-600" id="moduleLegend">
                    <!-- Rendered by JavaScript -->
                </div>
            </div>
        </div>

        <!-- ====== PERFORMANCE METRICS ====== -->
        <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm hover-lift">
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-sm font-semibold uppercase tracking-wider text-gray-600">Performance Metrics</h2>
                <div class="flex items-center gap-2">
                    <span class="text-[10px] text-gray-400">vs last month</span>
                    <button onclick="toggleMetricView()" class="text-xs text-blue-600 hover:text-blue-700 transition-colors">Change view</button>
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-5 gap-4" id="metricsGrid">
                <!-- Rendered by JavaScript -->
            </div>
        </div>

        <!-- ====== STAFF PERFORMANCE ====== -->
        <div class="mt-6 rounded-2xl border border-gray-200 bg-white p-6 shadow-sm hover-lift">
            <div class="flex items-center justify-between mb-1">
                <div class="flex items-center gap-2">
                    <svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                    </svg>
                    <h2 class="text-sm font-semibold uppercase tracking-wider text-gray-600">Staff Performance</h2>
                    <span class="text-[10px] font-medium px-2 py-0.5 bg-indigo-50 text-indigo-700 rounded-full">Q2 2026</span>
                </div>
                <div class="flex items-center gap-2">
                    <select id="staffSort" class="text-xs bg-gray-50 text-gray-600 border border-gray-200 rounded-lg px-3 py-1.5 focus:outline-none focus:ring-2 focus:ring-blue-100">
                        <option value="desc" selected>Highest First</option>
                        <option value="asc">Lowest First</option>
                    </select>
                    <button id="staffExportBtn" class="text-xs bg-gray-50 border border-gray-200 rounded-lg px-2 py-1.5 hover:bg-gray-100" title="Export staff data">
                        <svg class="w-3.5 h-3.5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v2a2 2 0 002 2h12a2 2 0 002-2v-2M7 10l5 5 5-5M12 15V3"></path></svg>
                    </button>
                </div>
            </div>
            <p class="text-xs text-gray-400 mb-2">Overall performance score by staff member · click a bar for detail</p>
            <div id="staffChart" class="h-80"></div>
        </div>

        <!-- ====== DATA SOURCES FOOTER ====== -->
        <div class="mt-6 pt-4 border-t border-gray-200 flex items-center justify-between text-[10px] text-gray-400">
            <div class="flex items-center gap-4">
                <span>Data sources: Health Center DB · Sanitation DB · Immunization DB · Surveillance DB</span>
                <span class="w-px h-4 bg-gray-200"></span>
                <span>API Status: <span class="text-emerald-600">●</span> All operational</span>
                <span class="w-px h-4 bg-gray-200"></span>
                <span id="dataLastSync">Last sync: <?php echo date('H:i:s'); ?></span>
            </div>
            <div>
                <span>Report generated: <span id="footerTimestamp"><?php echo date('Y-m-d H:i:s'); ?></span></span>
            </div>
        </div>
    </div>
</main>

<!-- ====== DRILL-DOWN MODAL ====== -->
<div id="drillModal" class="no-print hidden fixed inset-0 bg-black/40 z-50 items-center justify-center p-4">
    <div class="bg-white rounded-2xl shadow-xl max-w-md w-full p-6 relative fade-in">
        <button onclick="closeDrillModal()" type="button" class="absolute top-4 right-4 text-gray-400 hover:text-gray-600 transition-colors">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
        </button>
        <h3 id="drillModalTitle" class="text-base font-semibold text-gray-800 pr-6"></h3>
        <p id="drillModalSubtitle" class="text-xs text-gray-400 mt-0.5 mb-4"></p>
        <div id="drillModalBody" class="text-sm"></div>
        <div class="mt-4 pt-3 border-t border-gray-100 flex justify-end">
            <button onclick="closeDrillModal()" class="text-xs font-medium text-gray-500 hover:text-gray-700 px-4 py-1.5 border border-gray-200 rounded-lg transition-colors">Close</button>
            <button onclick="exportDrillData()" class="ml-2 text-xs font-medium text-blue-600 hover:text-blue-700 px-4 py-1.5 border border-blue-200 rounded-lg hover:bg-blue-50 transition-colors">Export</button>
        </div>
    </div>
</div>

<!-- ====== KEYBOARD SHORTCUTS MODAL ====== -->
<div id="shortcutsModal" class="no-print hidden fixed inset-0 bg-black/40 z-50 items-center justify-center p-4">
    <div class="bg-white rounded-2xl shadow-xl max-w-md w-full p-6 relative fade-in">
        <button onclick="closeShortcutsModal()" type="button" class="absolute top-4 right-4 text-gray-400 hover:text-gray-600 transition-colors">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
        </button>
        <h3 class="text-base font-semibold text-gray-800 mb-4">⌨️ Keyboard Shortcuts</h3>
        <div class="space-y-2 text-sm">
            <div class="flex items-center justify-between py-1.5 border-b border-gray-100">
                <span class="text-gray-600">Print Report</span>
                <span class="kbd">⌘P</span>
            </div>
            <div class="flex items-center justify-between py-1.5 border-b border-gray-100">
                <span class="text-gray-600">Save View</span>
                <span class="kbd">⌘S</span>
            </div>
            <div class="flex items-center justify-between py-1.5 border-b border-gray-100">
                <span class="text-gray-600">Toggle Fullscreen</span>
                <span class="kbd">⌘F</span>
            </div>
            <div class="flex items-center justify-between py-1.5 border-b border-gray-100">
                <span class="text-gray-600">Toggle YoY Comparison</span>
                <span class="kbd">⌘Y</span>
            </div>
            <div class="flex items-center justify-between py-1.5">
                <span class="text-gray-600">Close Modal</span>
                <span class="kbd">Esc</span>
            </div>
        </div>
        <div class="mt-4 pt-3 border-t border-gray-100 flex justify-end">
            <button onclick="closeShortcutsModal()" class="text-xs font-medium text-gray-500 hover:text-gray-700 px-4 py-1.5 border border-gray-200 rounded-lg transition-colors">Close</button>
        </div>
    </div>
</div>

<!-- ====== TOAST ====== -->
<div id="toast" class="no-print hidden fixed bottom-6 right-6 z-50 items-center gap-2 bg-gray-900 text-white text-xs font-medium px-4 py-3 rounded-xl shadow-lg fade-in"></div>

<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {

    // =====================================================================
    // CONFIGURATION
    // =====================================================================
    const CONFIG = {
        ANOMALY_THRESHOLD: 15,
        TREND_THRESHOLD: 25,
        STAFF_TARGET: 80,
        REFRESH_DEFAULTS: { enabled: true, interval: 30 },
        CHART_HEIGHTS: { trend: 224, modules: 224, staff: 320 }
    };

    // =====================================================================
    // TOAST + DRILL-DOWN MODAL HELPERS
    // =====================================================================
    window.showToast = function(msg, type) {
        var toast = document.getElementById('toast');
        toast.textContent = msg;
        toast.className = 'no-print hidden fixed bottom-6 right-6 z-50 items-center gap-2 text-xs font-medium px-4 py-3 rounded-xl shadow-lg fade-in';
        if (type === 'error') toast.style.background = '#dc2626';
        else if (type === 'success') toast.style.background = '#16a34a';
        else if (type === 'warning') toast.style.background = '#f59e0b';
        else toast.style.background = '#1f2937';
        toast.classList.remove('hidden');
        toast.classList.add('flex');
        clearTimeout(window.__toastTimer);
        window.__toastTimer = setTimeout(function() {
            toast.classList.add('hidden');
            toast.classList.remove('flex');
            toast.style.background = '#1f2937';
        }, 2800);
    };

    window.openDrillModal = function(title, subtitle, rows) {
        document.getElementById('drillModalTitle').textContent = title;
        document.getElementById('drillModalSubtitle').textContent = subtitle;
        document.getElementById('drillModalBody').innerHTML = rows.map(function(r) {
            return '<div class="flex items-center justify-between border-b border-gray-100 py-2 last:border-0">' +
                   '<span class="text-gray-500">' + r.label + '</span>' +
                   '<span class="font-medium text-gray-800">' + r.value + '</span></div>';
        }).join('');
        window._drillData = { title: title, subtitle: subtitle, rows: rows };
        var modal = document.getElementById('drillModal');
        modal.classList.remove('hidden');
        modal.classList.add('flex');
    };

    window.closeDrillModal = function() {
        var modal = document.getElementById('drillModal');
        modal.classList.add('hidden');
        modal.classList.remove('flex');
    };
    document.getElementById('drillModal').addEventListener('click', function(e) {
        if (e.target.id === 'drillModal') closeDrillModal();
    });

    window.exportDrillData = function() {
        if (!window._drillData) return;
        var data = window._drillData;
        var rows = [data.title + ' - ' + data.subtitle];
        data.rows.forEach(function(r) { rows.push(r.label + ':' + r.value); });
        var blob = new Blob([rows.join('\n')], { type: 'text/plain' });
        var url = URL.createObjectURL(blob);
        var a = document.createElement('a');
        a.href = url; a.download = 'drill-data.txt';
        document.body.appendChild(a); a.click(); a.remove();
        URL.revokeObjectURL(url);
        showToast('Drill data exported', 'success');
    };

    // =====================================================================
    // SHORTCUTS MODAL
    // =====================================================================
    window.showKeyboardShortcuts = function() {
        document.getElementById('shortcutsModal').classList.remove('hidden');
        document.getElementById('shortcutsModal').classList.add('flex');
        closeAllMenus();
    };
    window.closeShortcutsModal = function() {
        document.getElementById('shortcutsModal').classList.add('hidden');
        document.getElementById('shortcutsModal').classList.remove('flex');
    };
    document.getElementById('shortcutsModal').addEventListener('click', function(e) {
        if (e.target.id === 'shortcutsModal') closeShortcutsModal();
    });

    // =====================================================================
    // FULLSCREEN
    // =====================================================================
    document.getElementById('fullscreenBtn').addEventListener('click', function() {
        if (!document.fullscreenElement) {
            document.documentElement.requestFullscreen().catch(function() {});
        } else {
            if (document.exitFullscreen) document.exitFullscreen();
        }
    });

    // =====================================================================
    // DATA STORE
    // =====================================================================
    const InsightsData = [
        {
            id: 'dengue',
            title: 'Dengue cases increased <span class="text-red-600 font-bold">18%</span> compared to last month.',
            priority: 'High Priority',
            priorityColor: 'red',
            icon: 'alert',
            detail: 'Dengue Cases – Barangay Breakdown',
            subtitle: '18% increase vs last month',
            rows: [
                {label: 'Barangay 172', value: '42 cases'},
                {label: 'Barangay 176', value: '31 cases'},
                {label: 'Barangay 168', value: '19 cases'},
                {label: 'Barangay 174', value: '12 cases'},
                {label: 'Total this month', value: '104 cases'}
            ]
        },
        {
            id: 'barangay',
            title: 'Barangay 172 has the <span class="text-orange-600 font-bold">highest patient volume</span>.',
            priority: 'Medium',
            priorityColor: 'orange',
            icon: 'users',
            detail: 'Barangay 172 – Patient Volume',
            subtitle: 'Highest volume this month',
            rows: [
                {label: 'Health Center visits', value: '268'},
                {label: 'Immunization visits', value: '94'},
                {label: 'Sanitation requests', value: '37'},
                {label: 'Staff on duty', value: '6'}
            ]
        },
        {
            id: 'permits',
            title: 'Permit processing time improved by <span class="text-green-600 font-bold">21%</span>.',
            priority: 'Positive',
            priorityColor: 'green',
            icon: 'check',
            detail: 'Permit Processing – Efficiency Gain',
            subtitle: '21% faster vs last month',
            rows: [
                {label: 'Avg. time (this month)', value: '2.3 days'},
                {label: 'Avg. time (last month)', value: '2.9 days'},
                {label: 'Permits processed', value: '356'},
                {label: 'Backlog reduced by', value: '44 permits'}
            ]
        },
        {
            id: 'vaccination',
            title: 'Recommend increasing vaccination staff next week based on trends.',
            priority: 'AI Suggestion',
            priorityColor: 'blue',
            icon: 'ai',
            detail: 'Vaccination Staffing Recommendation',
            subtitle: 'Predictive recommendation',
            rows: [
                {label: 'Projected demand', value: '2,150 doses'},
                {label: 'Current staff capacity', value: '1,680 doses'},
                {label: 'Suggested additional staff', value: '3 nurses'},
                {label: 'Confidence level', value: '58%'}
            ]
        }
    ];

    const PredictiveData = [
        {
            title: 'Expected Disease Cases',
            value: '185',
            confidence: '92%',
            trend: '↑ 8.3% vs current month',
            color: 'indigo',
            icon: 'alert',
            detail: 'Disease Cases Forecast',
            subtitle: 'Next month projection',
            rows: [
                {label: 'Expected cases', value: '185'},
                {label: 'Confidence interval', value: '±5%'},
                {label: 'Trend direction', value: '↑ 8.3%'},
                {label: 'Risk level', value: 'Moderate'}
            ]
        },
        {
            title: 'Estimated Permit Requests',
            value: '420',
            confidence: '89%',
            trend: '↑ 12.1% vs current month',
            color: 'blue',
            icon: 'document',
            detail: 'Permit Requests Forecast',
            subtitle: 'Next month projection',
            rows: [
                {label: 'Estimated requests', value: '420'},
                {label: 'Confidence interval', value: '±4%'},
                {label: 'Trend direction', value: '↑ 12.1%'},
                {label: 'Staff required', value: '8 officers'}
            ]
        },
        {
            title: 'Vaccination Demand',
            value: '2,150',
            unit: 'doses',
            confidence: '58%',
            trend: '↑ 15.7% vs current month',
            color: 'amber',
            icon: 'health',
            detail: 'Vaccination Demand Forecast',
            subtitle: 'Next month projection',
            rows: [
                {label: 'Doses needed', value: '2,150'},
                {label: 'Confidence interval', value: '±8%'},
                {label: 'Trend direction', value: '↑ 15.7%'},
                {label: 'Stock status', value: 'Sufficient'}
            ]
        }
    ];

    const ModuleData = [
        { label: 'Health Center Services', share: 32, color: '#3b82f6', trend: '▲ 3.2%', status: 'On track' },
        { label: 'Sanitation Permits', share: 24, color: '#10b981', trend: '▼ 1.1%', status: 'On track' },
        { label: 'Immunization & Nutrition', share: 20, color: '#f59e0b', trend: '▲ 2.4%', status: 'On track' },
        { label: 'Health Surveillance', share: 16, color: '#f43f5e', trend: '▼ 0.8%', status: 'On track' },
        { label: 'Wastewater Services', share: 8, color: '#a855f7', trend: '▲ 4.2%', status: 'Needs attention' }
    ];

    const MetricsData = [
        { label: 'Permit Processing', value: '2.3', unit: 'Days', change: '↓ 21%', changeColor: 'emerald', progress: 78, detail: 'Permit Processing' },
        { label: 'AI Report Accuracy', value: '96', unit: '%', change: '↑ 5%', changeColor: 'blue', progress: 96, detail: 'AI Report Accuracy' },
        { label: 'System Response', value: '0.4', unit: 'sec', change: '↓ 0.2s', changeColor: 'teal', progress: 92, detail: 'System Response Time' },
        { label: 'Monthly Active Users', value: '1,248', unit: '', change: '↑ 14%', changeColor: 'purple', progress: 85, detail: 'Monthly Active Users' },
        { label: 'User Satisfaction', value: '94', unit: '%', change: '↑ 3%', changeColor: 'amber', progress: 94, detail: 'User Satisfaction Rate' }
    ];

    const StaffData = [
        { name: 'Juan Dela Cruz', score: 94, cases: 112, response: 4.2 },
        { name: 'Ana Reyes', score: 91, cases: 98, response: 4.8 },
        { name: 'Carlos Tan', score: 88, cases: 85, response: 5.1 },
        { name: 'Elena Santos', score: 85, cases: 76, response: 5.6 },
        { name: 'Roberto Silva', score: 82, cases: 68, response: 6.2 },
        { name: 'Jose Mendoza', score: 78, cases: 59, response: 6.8 }
    ];

    // =====================================================================
    // RENDER FUNCTIONS
    // =====================================================================
    function renderInsights() {
        const grid = document.getElementById('insightsGrid');
        const iconMap = {
            'alert': '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>',
            'users': '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>',
            'check': '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>',
            'ai': '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>'
        };
        grid.innerHTML = InsightsData.map(function(insight) {
            return '<button type="button" onclick="openDrillModal(\'' + insight.detail + '\',\'' + insight.subtitle + '\', ' + JSON.stringify(insight.rows).replace(/"/g, '&quot;') + ')" class="text-left rounded-xl border border-gray-200 p-4 hover:border-blue-300 hover:shadow-md transition cursor-pointer group">' +
                '<div class="flex items-start justify-between">' +
                    '<div class="p-2 bg-' + insight.priorityColor + '-50 rounded-lg w-fit">' +
                        '<svg class="w-4 h-4 text-' + insight.priorityColor + '-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">' +
                            iconMap[insight.icon] +
                        '</svg>' +
                    '</div>' +
                    '<span class="text-[10px] font-medium px-2 py-0.5 bg-' + insight.priorityColor + '-100 text-' + insight.priorityColor + '-700 rounded-full">' + insight.priority + '</span>' +
                '</div>' +
                '<p class="text-sm font-medium text-gray-800 mt-3">' + insight.title + '</p>' +
                '<p class="text-xs text-gray-400 mt-2 flex items-center justify-between">' + insight.priority + ' <span class="text-blue-500 group-hover:underline">Details →</span></p>' +
            '</button>';
        }).join('');
    }

    function renderPredictive() {
        const container = document.getElementById('predictiveCards');
        const iconMap = {
            'alert': '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>',
            'document': '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>',
            'health': '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 2a1 1 0 000 2h1v2.101a7.002 7.002 0 00-5.998 8.267l-1.06 1.06a1 1 0 001.415 1.415l.96-.96A6.99 6.99 0 0012 18a6.99 6.99 0 004.683-1.117l.96.96a1 1 0 001.415-1.415l-1.06-1.06A7.002 7.002 0 0014 6.101V4h1a1 1 0 100-2H9z"></path>'
        };
        container.innerHTML = PredictiveData.map(function(item) {
            var unitHtml = item.unit ? ' <span class="text-xs font-normal text-gray-400">' + item.unit + '</span>' : '';
            return '<div class="rounded-xl border border-gray-200 p-3 hover:bg-gray-50/50 transition cursor-pointer" onclick="openDrillModal(\'' + item.detail + '\',\'' + item.subtitle + '\', ' + JSON.stringify(item.rows).replace(/"/g, '&quot;') + ')">' +
                '<div class="flex items-center gap-3">' +
                    '<div class="p-2 bg-' + item.color + '-50 rounded-lg shrink-0">' +
                        '<svg class="w-4 h-4 text-' + item.color + '-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">' +
                            iconMap[item.icon] +
                        '</svg>' +
                    '</div>' +
                    '<div class="flex-1 min-w-0">' +
                        '<p class="text-xs text-gray-400 truncate">' + item.title + '</p>' +
                        '<p class="text-lg font-bold text-gray-800">' + item.value + unitHtml + '</p>' +
                    '</div>' +
                    '<span class="text-xs font-semibold text-' + (parseInt(item.confidence) >= 80 ? 'emerald' : 'amber') + '-600 shrink-0">' + item.confidence + '</span>' +
                '</div>' +
                '<div class="h-1.5 w-full bg-gray-100 rounded-full overflow-hidden mt-2">' +
                    '<div class="h-full bg-' + (parseInt(item.confidence) >= 80 ? 'emerald' : 'amber') + '-500 rounded-full" style="width:' + item.confidence + '"></div>' +
                '</div>' +
                '<p class="text-[10px] text-gray-400 mt-1">' + item.trend + '</p>' +
            '</div>';
        }).join('');
    }

    function renderModuleLegend() {
        const container = document.getElementById('moduleLegend');
        container.innerHTML = ModuleData.map(function(m) {
            return '<span class="flex items-center justify-between">' +
                '<span class="flex items-center gap-1.5"><span class="inline-block h-2.5 w-2.5 rounded-full" style="background:' + m.color + '"></span> ' + m.label + '</span>' +
                '<span class="font-medium text-gray-800">' + m.share + '%</span>' +
            '</span>';
        }).join('');
    }

    function renderMetrics() {
        const grid = document.getElementById('metricsGrid');
        const metricDetails = {
            'Permit Processing': { title: 'Permit Processing', subtitle: 'Performance metric breakdown', rows: [{label:'Current avg.',value:'2.3 Days'},{label:'Previous month',value:'2.9 Days'},{label:'Improvement',value:'21%'},{label:'Target',value:'< 2.5 Days'}] },
            'AI Report Accuracy': { title: 'AI Report Accuracy', subtitle: 'Performance metric breakdown', rows: [{label:'Current accuracy',value:'96%'},{label:'Previous month',value:'91%'},{label:'Improvement',value:'+5%'},{label:'Target',value:'> 95%'}] },
            'System Response Time': { title: 'System Response Time', subtitle: 'Performance metric breakdown', rows: [{label:'Current avg.',value:'0.4 sec'},{label:'Previous month',value:'0.6 sec'},{label:'Improvement',value:'-33%'},{label:'Target',value:'< 0.5 sec'}] },
            'Monthly Active Users': { title: 'Monthly Active Users', subtitle: 'Performance metric breakdown', rows: [{label:'Current users',value:'1,248'},{label:'Previous month',value:'1,094'},{label:'Growth',value:'+14%'},{label:'Target',value:'> 1,200'}] },
            'User Satisfaction Rate': { title: 'User Satisfaction Rate', subtitle: 'Performance metric breakdown', rows: [{label:'Current satisfaction',value:'94%'},{label:'Previous month',value:'91%'},{label:'Improvement',value:'+3%'},{label:'Target',value:'> 92%'}] }
        };
        grid.innerHTML = MetricsData.map(function(m) {
            var detail = metricDetails[m.detail] || metricDetails['Permit Processing'];
            return '<div class="rounded-xl border border-gray-200 p-4 hover:border-blue-300 hover:shadow-md transition cursor-pointer group" onclick="openDrillModal(\'' + detail.title + '\',\'' + detail.subtitle + '\', ' + JSON.stringify(detail.rows).replace(/"/g, '&quot;') + ')">' +
                '<div class="flex items-start justify-between">' +
                    '<div class="p-1.5 bg-' + m.changeColor + '-50 rounded-lg w-fit">' +
                        '<svg class="w-4 h-4 text-' + m.changeColor + '-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">' +
                            '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>' +
                        '</svg>' +
                    '</div>' +
                    '<span class="text-[10px] font-medium px-2 py-0.5 bg-' + m.changeColor + '-100 text-' + m.changeColor + '-700 rounded-full">' + m.change + '</span>' +
                '</div>' +
                '<p class="text-xs font-medium uppercase tracking-wider text-gray-400 mt-3">' + m.label + '</p>' +
                '<p class="mt-1 text-2xl font-bold text-gray-800">' + m.value + (m.unit ? '<span class="text-sm font-normal text-gray-400"> ' + m.unit + '</span>' : '') + '</p>' +
                '<div class="mt-2 h-1 w-full bg-gray-100 rounded-full overflow-hidden">' +
                    '<div class="h-full bg-' + m.changeColor + '-500 rounded-full" style="width:' + m.progress + '%"></div>' +
                '</div>' +
            '</div>';
        }).join('');
    }

    // =====================================================================
    // TREND DATASETS
    // =====================================================================
    var trendDatasets = {
        disease: {
            subtitle: 'Disease Cases Trend',
            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
            colors: ['#ef4444', '#eab308', '#22c55e', '#a855f7'],
            series: [
                { name: 'Dengue', data: [2, 3, 5, 4, 7, 8] },
                { name: 'Influenza', data: [1, 2, 3, 2, 4, 5] },
                { name: 'Food Poisoning', data: [0, 1, 2, 1, 3, 2] },
                { name: 'Leptospirosis', data: [0, 0, 1, 1, 2, 1] }
            ],
            legend: [
                { label: 'Dengue', color: 'bg-red-500' },
                { label: 'Influenza', color: 'bg-yellow-500' },
                { label: 'Food Poisoning', color: 'bg-green-500' },
                { label: 'Leptospirosis', color: 'bg-purple-500' }
            ]
        },
        service: {
            subtitle: 'Service Requests Trend',
            categories: ['Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
            colors: ['#3b82f6', '#10b981', '#f59e0b'],
            series: [
                { name: 'Patients', data: [4, 6, 8, 7, 9, 12] },
                { name: 'Vaccination', data: [3, 5, 7, 6, 8, 10] },
                { name: 'Requests', data: [2, 4, 6, 5, 7, 9] }
            ],
            legend: [
                { label: 'Patients', color: 'bg-blue-500' },
                { label: 'Vaccination', color: 'bg-emerald-500' },
                { label: 'Requests', color: 'bg-amber-500' }
            ]
        },
        combined: {
            subtitle: 'Combined View',
            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
            colors: ['#ef4444', '#3b82f6', '#22c55e'],
            series: [
                { name: 'Disease Cases', data: [3, 5, 8, 7, 11, 13] },
                { name: 'Service Requests', data: [9, 15, 21, 18, 24, 31] },
                { name: 'Permits Issued', data: [4, 6, 8, 7, 9, 12] }
            ],
            legend: [
                { label: 'Disease Cases', color: 'bg-red-500' },
                { label: 'Service Requests', color: 'bg-blue-500' },
                { label: 'Permits Issued', color: 'bg-green-500' }
            ]
        }
    };

    var rangeLabels = { 'today': 'Today', '7d': 'Last 7 Days', '30d': 'Last 30 Days', '90d': 'Last 90 Days', '6m': 'Last 6 Months', '12m': 'Last 12 Months', 'custom': 'Custom Range' };

    function interpolateSeries(values, targetLen) {
        var result = [];
        for (var i = 0; i < targetLen; i++) {
            var t = targetLen === 1 ? 0 : i / (targetLen - 1) * (values.length - 1);
            var i0 = Math.floor(t), i1 = Math.min(i0 + 1, values.length - 1);
            var frac = t - i0;
            var v = values[i0] * (1 - frac) + values[i1] * frac;
            var noise = Math.round(Math.sin(i * 12.9898 + values[0]) * 4) / 10;
            result.push(Math.max(0, Math.round((v + noise) * 10) / 10));
        }
        return result;
    }

    function rangeLength(rangeKey) {
        if (rangeKey === 'today') return 1;
        if (rangeKey === '7d') return 7;
        if (rangeKey === '30d') return 30;
        if (rangeKey === '90d') return 13;
        if (rangeKey === '12m') return 12;
        if (rangeKey === 'custom') {
            var from = document.getElementById('dateFrom').value;
            var to = document.getElementById('dateTo').value;
            if (from && to) {
                var days = Math.max(2, Math.round((new Date(to) - new Date(from)) / 86400000) + 1);
                return Math.min(days, 60);
            }
            return 14;
        }
        return 6;
    }

    function makeCategories(rangeKey, len) {
        if (rangeKey === 'today') return ['Today'];
        if (rangeKey === '7d' || rangeKey === '30d' || rangeKey === 'custom') {
            return Array.from({ length: len }, function(_, i) { 
                if (rangeKey === '7d') {
                    var d = new Date(); d.setDate(d.getDate() - (len - 1 - i));
                    return d.toLocaleDateString('en-US', { month: 'short', day: 'numeric' });
                }
                return 'Day ' + (i + 1); 
            });
        }
        if (rangeKey === '90d') return Array.from({ length: len }, function(_, i) { return 'Wk ' + (i + 1); });
        if (rangeKey === '12m') return ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
        return trendDatasets.disease.categories.slice();
    }

    var currentTrendData = null;

    function buildTrendSeries(typeKey, rangeKey, yoy) {
        var base = trendDatasets[typeKey] || trendDatasets.disease;
        var len = rangeLength(rangeKey);
        var categories = makeCategories(rangeKey, len);
        var series = base.series.map(function(s) { return { name: s.name, data: interpolateSeries(s.data, len) }; });
        var colors = base.colors.slice();
        var legend = base.legend.slice();
        if (yoy && series.length > 0) {
            var primary = series[0];
            var prevYear = primary.data.map(function(v, i) {
                return Math.max(0, Math.round((v * 0.82 + Math.sin(i * 7.13) * 0.6) * 10) / 10);
            });
            series.push({ name: primary.name + ' (YoY)', data: prevYear });
            colors.push('#9ca3af');
            legend.push({ label: primary.name + ' (YoY)', color: 'bg-gray-400' });
        }
        return { categories: categories, series: series, colors: colors, subtitle: base.subtitle, legend: legend, yoy: yoy };
    }

    var trendOptions = {
        series: [],
        chart: { 
            type: 'line', 
            height: 224, 
            toolbar: { show: true, tools: { zoom: true, zoomin: true, zoomout: true, pan: true, reset: true } }, 
            background: 'transparent',
            animations: { enabled: true, easing: 'easeinout', speed: 800 }
        },
        stroke: { curve: 'smooth', width: 2 },
        grid: { borderColor: '#e5e7eb', strokeDashArray: 3 },
        xaxis: { categories: [], labels: { style: { colors: '#9ca3af', fontSize: '10px' } } },
        yaxis: { labels: { style: { colors: '#9ca3af', fontSize: '10px' } }, min: 0 },
        legend: { show: false },
        tooltip: { theme: 'light', style: { fontSize: '12px' } },
        markers: { size: 3 }
    };
    var trendChart = new ApexCharts(document.querySelector("#trendChart"), trendOptions);
    trendChart.render();

    window.resetTrendZoom = function() {
        trendChart.zoomX(0, trendChart.w.globals.seriesX[0].length - 1);
        document.getElementById('resetZoomBtn').classList.add('hidden');
    };

    function renderLegend(items) {
        document.getElementById('trendLegend').innerHTML = items.map(function(item) {
            return '<span class="flex items-center gap-1.5"><span class="inline-block h-2.5 w-2.5 rounded-full ' + item.color + '"></span> ' + item.label + '</span>';
        }).join('');
    }

    function updateTrendChart() {
        var typeKey = document.getElementById('trendFilter').value;
        var rangeKey = document.getElementById('dateRangeSelect').value;
        var yoy = document.getElementById('yoyToggle').checked;
        var built = buildTrendSeries(typeKey, rangeKey, yoy);
        currentTrendData = built;
        document.getElementById('trendSubtitle').textContent = built.subtitle + ' · ' + rangeLabels[rangeKey];
        var dashArray = built.series.map(function(s, i) { return (yoy && i === built.series.length - 1) ? 6 : 0; });
        trendChart.updateOptions({
            series: built.series,
            colors: built.colors,
            xaxis: { categories: built.categories },
            stroke: { curve: 'smooth', width: 2, dashArray: dashArray }
        });
        renderLegend(built.legend);
        runAnomalyCheck();
        
        var now = new Date();
        document.getElementById('headerTimestamp').textContent = now.toLocaleTimeString();
        document.getElementById('footerTimestamp').textContent = now.toLocaleString();
        document.getElementById('dataLastSync').textContent = 'Last sync: ' + now.toLocaleTimeString();
    }

    document.getElementById('trendFilter').addEventListener('change', updateTrendChart);
    document.getElementById('yoyToggle').addEventListener('change', updateTrendChart);
    document.getElementById('dateRangeSelect').addEventListener('change', function(e) {
        document.getElementById('customDateWrap').classList.toggle('hidden', e.target.value !== 'custom');
        document.getElementById('customDateWrap').classList.toggle('flex', e.target.value === 'custom');
        if (e.target.value !== 'custom') updateTrendChart();
    });
    document.getElementById('dateFrom').addEventListener('change', updateTrendChart);
    document.getElementById('dateTo').addEventListener('change', updateTrendChart);

    // =====================================================================
    // OPERATIONAL MODULES PIE CHART
    // =====================================================================
    var modulesOptions = {
        series: ModuleData.map(function(m) { return m.share; }),
        chart: {
            type: 'pie',
            height: 224,
            toolbar: { show: false },
            background: 'transparent',
            events: {
                dataPointSelection: function(event, chartContext, config) {
                    var idx = config.dataPointIndex;
                    var m = ModuleData[idx];
                    openDrillModal(m.label, 'Share of total operational activity', [
                        { label: 'Share of Activity', value: m.share + '%' },
                        { label: 'Trend vs last month', value: m.trend },
                        { label: 'Status', value: m.status },
                        { label: 'Monthly volume', value: Math.round(m.share * 1.2) + ' activities' }
                    ]);
                }
            }
        },
        labels: ModuleData.map(function(m) { return m.label; }),
        colors: ModuleData.map(function(m) { return m.color; }),
        stroke: { width: 2, colors: ['#ffffff'] },
        legend: { show: false },
        dataLabels: { enabled: true, style: { fontSize: '11px', fontWeight: 'bold' }, dropShadow: { enabled: false } },
        tooltip: { theme: 'light', style: { fontSize: '12px' } }
    };
    var modulesChart = new ApexCharts(document.querySelector("#modulesChart"), modulesOptions);
    modulesChart.render();

    // =====================================================================
    // STAFF PERFORMANCE
    // =====================================================================
    var staffData = StaffData.map(function(s) { return { ...s }; });

    function sortedStaff() {
        var dir = document.getElementById('staffSort').value;
        return staffData.slice().sort(function(a, b) { return dir === 'asc' ? a.score - b.score : b.score - a.score; });
    }

    function buildStaffOptions(data) {
        return {
            series: [{ name: 'Performance', data: data.map(function(d) { return d.score; }) }],
            chart: {
                type: 'bar',
                height: 320,
                toolbar: { show: true, tools: { download: true } },
                background: 'transparent',
                animations: { enabled: true, easing: 'easeinout', speed: 600 },
                events: {
                    dataPointSelection: function(event, chartContext, config) {
                        var d = data[config.dataPointIndex];
                        openDrillModal(d.name, 'Staff performance detail', [
                            { label: 'Overall Score', value: d.score + '%' },
                            { label: 'Cases Handled', value: d.cases },
                            { label: 'Avg. Response Time', value: d.response + ' hrs' },
                            { label: 'Status', value: d.score >= 85 ? 'Exceeds expectations' : d.score >= 80 ? 'Meets expectations' : 'Needs improvement' }
                        ]);
                    }
                }
            },
            colors: ['#6366f1'],
            plotOptions: { bar: { borderRadius: 6, horizontal: true, barHeight: '55%' } },
            grid: { borderColor: '#e5e7eb', strokeDashArray: 3 },
            xaxis: {
                categories: data.map(function(d) { return d.name; }),
                labels: { style: { colors: '#9ca3af', fontSize: '11px' } },
                max: 100,
                axisBorder: { show: false },
                axisTicks: { show: false }
            },
            yaxis: { labels: { style: { colors: '#374151', fontSize: '12px', fontWeight: '500' } } },
            dataLabels: {
                enabled: true,
                formatter: function(val) { return val + '%'; },
                style: { fontSize: '11px', fontWeight: 'bold', colors: ['#4338ca'] },
                offsetX: 20
            },
            tooltip: { 
                theme: 'light', 
                style: { fontSize: '12px' }, 
                y: { formatter: function(val) { return val + '%'; } } 
            },
            annotations: {
                xaxis: [{
                    x: CONFIG.STAFF_TARGET,
                    borderColor: '#f59e0b',
                    label: {
                        borderColor: '#f59e0b',
                        style: { color: '#fff', background: '#f59e0b', fontSize: '9px' },
                        text: 'Target: ' + CONFIG.STAFF_TARGET + '%'
                    }
                }]
            }
        };
    }

    var staffChart = new ApexCharts(document.querySelector("#staffChart"), buildStaffOptions(sortedStaff()));
    staffChart.render();

    document.getElementById('staffSort').addEventListener('change', function() {
        staffChart.updateOptions(buildStaffOptions(sortedStaff()), true, true);
    });

    // =====================================================================
    // ANOMALY DETECTION
    // =====================================================================
    function runAnomalyCheck() {
        var anomalies = [];
        if (currentTrendData) {
            var primary = currentTrendData.series[0];
            var d = primary.data;
            var last = d[d.length - 1], prev = d[d.length - 2];
            if (prev > 0 && ((last - prev) / prev) * 100 > CONFIG.ANOMALY_THRESHOLD) {
                anomalies.push(primary.name + ' cases up ' + Math.round(((last - prev) / prev) * 100) + '% — above ' + CONFIG.ANOMALY_THRESHOLD + '% alert threshold');
            }
            if (d.length > 3) {
                var first = d[0];
                if (first > 0 && ((last - first) / first) * 100 > CONFIG.TREND_THRESHOLD) {
                    anomalies.push('Significant upward trend detected in ' + primary.name + ' (' + Math.round(((last - first) / first) * 100) + '% overall increase)');
                }
            }
        }
        staffData.forEach(function(s) {
            if (s.score < CONFIG.STAFF_TARGET) anomalies.push(s.name + ' performance at ' + s.score + '% — below ' + CONFIG.STAFF_TARGET + '% target');
        });

        var banner = document.getElementById('anomalyBanner');
        if (anomalies.length) {
            document.getElementById('anomalyItems').innerHTML = anomalies.map(function(a) { return '<li>' + a + '</li>'; }).join('');
            document.getElementById('anomalyCount').textContent = anomalies.length;
            banner.classList.remove('hidden');
        } else {
            banner.classList.add('hidden');
        }
    }

    document.getElementById('dismissAnomaly').addEventListener('click', function() {
        document.getElementById('anomalyBanner').classList.add('hidden');
    });
    document.getElementById('viewAnomaliesBtn').addEventListener('click', function() {
        showToast('Opening anomalies details...', 'info');
    });

    // =====================================================================
    // AUTO-REFRESH
    // =====================================================================
    var refreshTimer = null;
    var lastUpdated = new Date();

    function tickLastUpdated() {
        var secs = Math.floor((new Date() - lastUpdated) / 1000);
        var label = document.getElementById('lastUpdatedLabel');
        if (secs < 5) label.textContent = 'Updated just now';
        else if (secs < 60) label.textContent = 'Updated ' + secs + 's ago';
        else if (secs < 3600) label.textContent = 'Updated ' + Math.floor(secs / 60) + 'm ago';
        else label.textContent = 'Updated ' + Math.floor(secs / 3600) + 'h ago';
    }
    setInterval(tickLastUpdated, 1000);

    window.refreshData = function() {
        staffData.forEach(function(d) {
            d.score = Math.min(100, Math.max(60, Math.round(d.score + (Math.random() * 4 - 2))));
            d.cases = Math.round(d.cases + (Math.random() * 10 - 5));
            d.response = Math.max(2, Math.round((d.response + (Math.random() * 0.6 - 0.3)) * 10) / 10);
        });
        staffChart.updateOptions(buildStaffOptions(sortedStaff()), true, true);
        updateTrendChart();
        lastUpdated = new Date();
        tickLastUpdated();
        showToast('Data refreshed', 'success');
    };

    function setupAutoRefresh() {
        clearInterval(refreshTimer);
        if (!document.getElementById('autoRefreshToggle').checked) return;
        var secs = parseInt(document.getElementById('refreshIntervalSelect').value, 10);
        refreshTimer = setInterval(refreshData, secs * 1000);
    }

    document.getElementById('autoRefreshToggle').addEventListener('change', setupAutoRefresh);
    document.getElementById('refreshIntervalSelect').addEventListener('change', setupAutoRefresh);

    // =====================================================================
    // QUICK ACTIONS
    // =====================================================================
    document.getElementById('quickActionsBtn').addEventListener('click', function(e) {
        e.stopPropagation();
        document.getElementById('savedViewsMenu').classList.add('hidden');
        document.getElementById('exportMenu').classList.add('hidden');
        document.getElementById('quickActionsMenu').classList.toggle('hidden');
    });

    window.resetAllFilters = function() {
        document.getElementById('dateRangeSelect').value = '6m';
        document.getElementById('yoyToggle').checked = false;
        document.getElementById('trendFilter').value = 'disease';
        document.getElementById('customDateWrap').classList.add('hidden');
        document.getElementById('customDateWrap').classList.remove('flex');
        updateTrendChart();
        showToast('All filters reset', 'success');
        closeAllMenus();
    };

    window.exportDashboardSnapshot = function() {
        showToast('Preparing dashboard snapshot...', 'info');
        // In production: capture screenshot or generate report
        setTimeout(function() {
            showToast('Dashboard snapshot ready for download', 'success');
        }, 1500);
        closeAllMenus();
    };

    // =====================================================================
    // EXPORT: CSV / JSON / PDF / PRINT
    // =====================================================================
    var performanceMetrics = [
        { label: 'Permit Processing', value: '2.3 Days' },
        { label: 'AI Report Accuracy', value: '96%' },
        { label: 'System Response', value: '0.4 sec' },
        { label: 'Monthly Active Users', value: '1,248' },
        { label: 'User Satisfaction', value: '94%' }
    ];

    function downloadBlob(content, filename, mime) {
        var blob = new Blob([content], { type: mime });
        var url = URL.createObjectURL(blob);
        var a = document.createElement('a');
        a.href = url; a.download = filename;
        document.body.appendChild(a); a.click(); a.remove();
        URL.revokeObjectURL(url);
    }

    window.exportCSV = function() {
        if (!currentTrendData) { showToast('No trend data to export', 'error'); return; }
        var rows = ['Period,' + currentTrendData.series.map(function(s) { return s.name; }).join(',')];
        currentTrendData.categories.forEach(function(cat, i) {
            var row = [cat].concat(currentTrendData.series.map(function(s) { return s.data[i]; }));
            rows.push(row.join(','));
        });
        rows.push('');
        rows.push('Performance Metrics');
        performanceMetrics.forEach(function(m) { rows.push(m.label + ',' + m.value); });
        rows.push('');
        rows.push('Staff Performance');
        rows.push('Name,Score,Cases,Response');
        staffData.forEach(function(s) { rows.push(s.name + ',' + s.score + ',' + s.cases + ',' + s.response); });
        downloadBlob(rows.join('\n'), 'analytics-trend-export.csv', 'text/csv');
        showToast('CSV exported successfully', 'success');
        closeAllMenus();
    };

    window.exportJSON = function() {
        var data = {
            exportedAt: new Date().toISOString(),
            trend: currentTrendData,
            metrics: performanceMetrics,
            staff: staffData,
            modules: ModuleData,
            insights: InsightsData
        };
        downloadBlob(JSON.stringify(data, null, 2), 'analytics-export.json', 'application/json');
        showToast('JSON exported successfully', 'success');
        closeAllMenus();
    };

    window.exportPDF = function() {
        var jsPDFCtor = window.jspdf && window.jspdf.jsPDF;
        if (!jsPDFCtor) { showToast('PDF library failed to load', 'error'); return; }
        var doc = new jsPDFCtor('p', 'pt', 'a4');
        var y = 30;
        doc.setFontSize(18); doc.text('Analytics Report', 40, y); y += 14;
        doc.setFontSize(9); doc.text('Generated ' + new Date().toLocaleString(), 40, y); y += 18;

        if (currentTrendData) {
            doc.setFontSize(12); doc.text(currentTrendData.subtitle, 40, y); y += 12;
            doc.setFontSize(8);
            currentTrendData.categories.forEach(function(cat, i) {
                var line = cat + ': ' + currentTrendData.series.map(function(s) { return s.name + '=' + s.data[i]; }).join(', ');
                doc.text(line, 40, y); y += 10;
                if (y > 750) { doc.addPage(); y = 30; }
            });
            y += 12;
        }

        doc.setFontSize(12); doc.text('Performance Metrics', 40, y); y += 12;
        doc.setFontSize(9);
        performanceMetrics.forEach(function(m) { doc.text(m.label + ': ' + m.value, 40, y); y += 9; });

        y += 6;
        doc.setFontSize(12); doc.text('Staff Performance', 40, y); y += 12;
        doc.setFontSize(9);
        staffData.slice().sort(function(a, b) { return b.score - a.score; }).forEach(function(s) {
            doc.text(s.name + ': ' + s.score + '% (Cases: ' + s.cases + ', Response: ' + s.response + 'hrs)', 40, y); y += 9;
        });

        doc.save('analytics-report.pdf');
        showToast('PDF exported successfully', 'success');
        closeAllMenus();
    };

    window.printReport = function() {
        closeAllMenus();
        window.print();
    };

    // =====================================================================
    // SAVED VIEWS
    // =====================================================================
    var SAVED_VIEWS_KEY = 'analyticsSavedViews';

    function getSavedViews() {
        try { return JSON.parse(localStorage.getItem(SAVED_VIEWS_KEY)) || []; } catch (e) { return []; }
    }
    function setSavedViews(views) { localStorage.setItem(SAVED_VIEWS_KEY, JSON.stringify(views)); }

    function renderSavedViews() {
        var list = document.getElementById('savedViewsList');
        var views = getSavedViews();
        document.getElementById('viewCount').textContent = views.length + ' saved';
        if (!views.length) { list.innerHTML = '<p class="text-xs text-gray-400 px-3 py-2">No saved views yet.</p>'; return; }
        list.innerHTML = views.map(function(v, i) {
            return '<div class="flex items-center justify-between px-3 py-2 rounded-lg hover:bg-gray-50">' +
                   '<button data-idx="' + i + '" class="apply-view text-left text-xs text-gray-600 flex-1 truncate">' + v.name + '</button>' +
                   '<button data-idx="' + i + '" class="remove-view text-gray-300 hover:text-red-500 text-xs ml-2" title="Delete">✕</button></div>';
        }).join('');
        list.querySelectorAll('.apply-view').forEach(function(btn) {
            btn.addEventListener('click', function() { applyView(views[parseInt(btn.dataset.idx, 10)]); });
        });
        list.querySelectorAll('.remove-view').forEach(function(btn) {
            btn.addEventListener('click', function() {
                var idx = parseInt(btn.dataset.idx, 10);
                views.splice(idx, 1);
                setSavedViews(views);
                renderSavedViews();
                showToast('View deleted', 'success');
            });
        });
    }

    function applyView(view) {
        document.getElementById('dateRangeSelect').value = view.dateRange;
        document.getElementById('yoyToggle').checked = view.yoy;
        document.getElementById('trendFilter').value = view.trendType;
        var isCustom = view.dateRange === 'custom';
        document.getElementById('customDateWrap').classList.toggle('hidden', !isCustom);
        document.getElementById('customDateWrap').classList.toggle('flex', isCustom);
        updateTrendChart();
        closeAllMenus();
        showToast('Applied view "' + view.name + '"', 'success');
    }

    document.getElementById('saveViewBtn').addEventListener('click', function() {
        var name = prompt('Name this view:');
        if (!name) return;
        var views = getSavedViews();
        views.push({
            name: name,
            dateRange: document.getElementById('dateRangeSelect').value,
            yoy: document.getElementById('yoyToggle').checked,
            trendType: document.getElementById('trendFilter').value
        });
        setSavedViews(views);
        renderSavedViews();
        showToast('View "' + name + '" saved', 'success');
    });
    renderSavedViews();

    // =====================================================================
    // SHAREABLE LINKS
    // =====================================================================
    document.getElementById('shareBtn').addEventListener('click', function() {
        var params = new URLSearchParams();
        params.set('range', document.getElementById('dateRangeSelect').value);
        params.set('yoy', document.getElementById('yoyToggle').checked ? '1' : '0');
        params.set('trend', document.getElementById('trendFilter').value);
        var url = window.location.origin + window.location.pathname + '?' + params.toString();
        if (navigator.clipboard && navigator.clipboard.writeText) {
            navigator.clipboard.writeText(url).then(function() { showToast('Shareable link copied to clipboard', 'success'); })
                .catch(function() { prompt('Copy this link:', url); });
        } else {
            prompt('Copy this link:', url);
        }
    });

    function restoreFromURL() {
        var params = new URLSearchParams(window.location.search);
        if (params.has('range')) document.getElementById('dateRangeSelect').value = params.get('range');
        if (params.has('yoy')) document.getElementById('yoyToggle').checked = params.get('yoy') === '1';
        if (params.has('trend')) document.getElementById('trendFilter').value = params.get('trend');
    }

    // =====================================================================
    // MENU OPEN/CLOSE
    // =====================================================================
    function closeAllMenus() {
        document.getElementById('exportMenu').classList.add('hidden');
        document.getElementById('savedViewsMenu').classList.add('hidden');
        document.getElementById('quickActionsMenu').classList.add('hidden');
    }
    document.getElementById('exportMenuBtn').addEventListener('click', function(e) {
        e.stopPropagation();
        document.getElementById('savedViewsMenu').classList.add('hidden');
        document.getElementById('quickActionsMenu').classList.add('hidden');
        document.getElementById('exportMenu').classList.toggle('hidden');
    });
    document.getElementById('savedViewsBtn').addEventListener('click', function(e) {
        e.stopPropagation();
        document.getElementById('exportMenu').classList.add('hidden');
        document.getElementById('quickActionsMenu').classList.add('hidden');
        document.getElementById('savedViewsMenu').classList.toggle('hidden');
        renderSavedViews();
    });
    document.addEventListener('click', closeAllMenus);

    // =====================================================================
    // KEYBOARD SHORTCUTS
    // =====================================================================
    document.addEventListener('keydown', function(e) {
        if (e.ctrlKey && e.key === 'p') { e.preventDefault(); printReport(); }
        if (e.ctrlKey && e.key === 's') { e.preventDefault(); document.getElementById('saveViewBtn').click(); }
        if (e.ctrlKey && e.key === 'f') { e.preventDefault(); document.getElementById('fullscreenBtn').click(); }
        if (e.ctrlKey && e.key === 'y') { e.preventDefault(); document.getElementById('yoyToggle').click(); }
        if (e.key === 'Escape') { closeDrillModal(); closeShortcutsModal(); closeAllMenus(); }
    });

    // =====================================================================
    // TOGGLE METRIC VIEW
    // =====================================================================
    window.toggleMetricView = function() {
        var grid = document.getElementById('metricsGrid');
        var current = grid.className;
        if (current.includes('grid-cols-1')) {
            grid.className = current.replace('grid-cols-1', 'grid-cols-2').replace('md:grid-cols-2', 'md:grid-cols-3');
            showToast('View changed to compact', 'info');
        } else {
            grid.className = current.replace('grid-cols-2', 'grid-cols-1').replace('md:grid-cols-3', 'md:grid-cols-2');
            showToast('View changed to expanded', 'info');
        }
    };

    // =====================================================================
    // INIT
    // =====================================================================
    // Render all data-driven components
    renderInsights();
    renderPredictive();
    renderModuleLegend();
    renderMetrics();

    // Restore from URL and initialize
    restoreFromURL();
    updateTrendChart();
    setupAutoRefresh();
    
    var now = new Date();
    document.getElementById('headerTimestamp').textContent = now.toLocaleTimeString();
    document.getElementById('dataLastSync').textContent = 'Last sync: ' + now.toLocaleTimeString();

    // Generate session ID
    var sessionId = 'S-' + Math.random().toString(36).substring(2, 7).toUpperCase();
    document.querySelector('#sessionId .text-gray-600').textContent = sessionId;

    console.log('📊 Analytics dashboard initialized v2.5.0');
    console.log('🔑 Keyboard shortcuts: ⌘P (Print), ⌘S (Save), ⌘F (Fullscreen), ⌘Y (YoY), Esc (Close)');
});
</script>

<?php include '../includes/footer.php'; ?>