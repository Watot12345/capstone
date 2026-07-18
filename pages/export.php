<?php include '../includes/header.php'; ?>
<?php include '../includes/sidebar.php'; ?>

<main class="flex-1 bg-dash-bg h-screen m-5  rounded-2xl font-sans overflow-y-auto scrollbar-track-transparent">
  <link rel="stylesheet" href="../assets/css/export.css" />
    <div class="export-dashboard">

        <!-- ─── Category tabs ─── -->
        <div class="category-tabs" id="categoryTabs">
            <!-- Rendered by JS -->
        </div>

        <!-- ─── Header with title & Select All ─── -->
        <div class="flex items-center justify-between mb-3 flex-wrap gap-3">
            <div>
                <h2 id="categoryTitle" class="text-xl font-semibold text-[#176B87] flex items-center gap-2">
                    <span id="categoryIcon">📊</span>
                    <span id="categoryLabel">AI Executive Reports</span>
                </h2>
                <p class="text-sm text-slate-500 mt-0.5">
                    <span id="reportCount">0</span> reports · click a format button to select export type
                </p>
            </div>
            <button id="selectAllBtn" class="text-xs font-medium px-4 py-2 rounded-full bg-white/70 backdrop-blur-sm border border-[#B4D4FF] text-[#176B87] hover:bg-[#B4D4FF]/20 transition shadow-sm flex items-center gap-1.5">
                <span>⤵</span> Select All (first format)
            </button>
        </div>

        <!-- ─── Filter toolbar ─── -->
        <div class="filter-toolbar">
            <div class="flex items-center gap-2 flex-1 min-w-[160px]">
                <span class="text-slate-400 text-sm">🔍</span>
                <input type="text" id="searchInput" placeholder="Search reports..." class="flex-1" />
            </div>
            <div class="flex items-center gap-2 flex-wrap">
                <label>
                    📅 From
                    <input type="date" id="dateFrom" class="date-input" />
                </label>
                <label>
                    To
                    <input type="date" id="dateTo" class="date-input" />
                </label>
                <button id="clearFiltersBtn" class="clear-btn">✕ Clear filters</button>
            </div>
        </div>

        <!-- ─── Report list ─── -->
        <div id="reportList" class="space-y-2">
            <!-- Rendered by JS -->
        </div>

        <!-- ─── Footer stats ─── -->
        <div class="stats-bar">
            <span>
                <span class="live-dot"></span>
                <span id="totalFormats">0</span> export formats selected
            </span>
            <span>
                <span class="inline-block w-2 h-2 rounded-full bg-[#86B6F6] mr-1"></span>
                <span id="lastUpdated">Updated just now</span>
            </span>
        </div>
    </div>

    <script src="../assets/js/export.js" defer></script>

</main>

<?php include '../includes/footer.php'; ?>  