<<<<<<< HEAD
<?php
$scriptSegments = explode('/', trim($_SERVER['PHP_SELF'], '/'));
$projectRoot = isset($scriptSegments[0]) ? '/' . $scriptSegments[0] : '';
function site_url($path) {
    global $projectRoot;
    $clean = preg_replace('#^(?:\./|\.\./)+#', '', $path);
    return $projectRoot . '/' . ltrim($clean, '/');
}

// Get current page for active state
$currentPage = basename($_SERVER['PHP_SELF']);
$currentPath = $_SERVER['PHP_SELF'];

// Detect which module is active
$activeModule = '';
if (strpos($currentPath, 'modules/healthservices') !== false) {
    $activeModule = 'healthCenter';
} elseif (strpos($currentPath, 'modules/sanitation') !== false) {
    $activeModule = 'sanitation';
} elseif (strpos($currentPath, 'modules/immunization') !== false) {
    $activeModule = 'immunization';
} elseif (strpos($currentPath, 'modules/services') !== false) {
    $activeModule = 'wastewater';
} elseif (strpos($currentPath, 'modules/surveillence') !== false) {
    $activeModule = 'surveillance';
} elseif (strpos($currentPath, 'management/') !== false) {
    $activeModule = 'management';
}
?>
=======
>>>>>>> ff2abb8505d5406f10cfe4e980ef57e95b4cb3d3
<!-- admin/includes/sidebar.php -->
<aside id="sidebar" class="bg-brand-light text-slate-600 w-72 min-h-[calc(100vh-5rem)] flex flex-col justify-between transition-all duration-300 border-r border-brand-border/60 sticky top-20 h-[calc(100vh-5rem)] z-30 shrink-0 shadow-sm">
  
  <div class="flex flex-col h-full overflow-hidden">
    <nav class="flex-1 px-3 py-4 space-y-1 overflow-y-auto custom-scrollbar">
      
      <!-- Collapse Button -->
      <div class="px-1 pb-3 mb-2 border-b border-brand-border/30">
        <button onclick="toggleSidebar()" class="w-full text-brand-dark/60 hover:text-brand-dark py-2 bg-white/60 hover:bg-white rounded-xl border border-brand-border/30 flex items-center justify-center focus:outline-none transition cursor-pointer" title="Collapse Menu Panel">
          <i id="toggleArrow" class="fa-solid fa-chevron-left text-xs"></i>
        </button>
      </div>

      <!-- ============================================================ -->
      <!-- SECTION 1: MAIN CONTROLS                                     -->
      <!-- ============================================================ -->
      
      <span class="sidebar-text text-[9px] font-bold tracking-widest text-slate-400 uppercase block px-3 mb-2">Main Controls</span>
      
      <!-- 1. SYSTEM OVERVIEW -->
      <div class="space-y-1">
        <button onclick="toggleDropdown('systemOverviewDropdown', 'systemOverviewChevron')" 
                class="dropdown-btn w-full flex items-center justify-between px-3 py-2.5 hover:bg-white/60 hover:text-brand-dark rounded-xl text-xs font-semibold tracking-wide transition group text-slate-600 cursor-pointer">
          <div class="flex items-center space-x-3">
            <i class="fa-solid fa-table-columns text-sm text-slate-400 group-hover:text-brand-medium transition"></i>
            <span class="sidebar-text truncate">System Overview</span>
          </div>
          <div class="dropdown-right">
            <i id="systemOverviewChevron" class="fa-solid fa-chevron-down text-[10px] opacity-60 dropdown-chevron transition-transform duration-200"></i>
          </div>
        </button>
        <div id="systemOverviewDropdown" class="hidden pl-8 pr-2 space-y-0.5 font-medium sidebar-text">
<<<<<<< HEAD
          <a href="<?= site_url('pages/dashboard.php') ?>" class="flex items-center space-x-2 px-3 py-2 text-[11px] rounded-md transition <?php echo (strpos($currentPath, 'dashboard.php') !== false) ? 'bg-brand-light text-brand-dark' : 'text-slate-500 hover:bg-brand-light hover:text-brand-dark'; ?>">
            <i class="fa-solid fa-chart-simple text-[10px] opacity-50"></i> 
            <span>Dashboard</span>
          </a>
          <a href="<?= site_url('pages/module_activity.php') ?>" class="flex items-center space-x-2 px-3 py-2 text-[11px] rounded-md transition <?php echo (strpos($currentPath, 'module_activity.php') !== false) ? 'bg-brand-light text-brand-dark' : 'text-slate-500 hover:bg-brand-light hover:text-brand-dark'; ?>">
            <i class="fa-solid fa-chart-line text-[10px] opacity-50"></i> 
            <span>Module Activity Summary</span>
          </a>
          <a href="<?= site_url('pages/alerts.php') ?>" class="flex items-center space-x-2 px-3 py-2 text-[11px] rounded-md transition <?php echo (strpos($currentPath, 'alerts.php') !== false) ? 'bg-brand-light text-brand-dark' : 'text-slate-500 hover:bg-brand-light hover:text-brand-dark'; ?>">
            <i class="fa-solid fa-bell text-[10px] opacity-50"></i> 
            <span>Alerts & Notifications</span>
          </a>
          <a href="<?= site_url('pages/system_health.php') ?>" class="flex items-center space-x-2 px-3 py-2 text-[11px] rounded-md transition <?php echo (strpos($currentPath, 'system_health.php') !== false) ? 'bg-brand-light text-brand-dark' : 'text-slate-500 hover:bg-brand-light hover:text-brand-dark'; ?>">
            <i class="fa-solid fa-heart-pulse text-[10px] opacity-50"></i> 
            <span>System Health Status</span>
          </a>
        </div>
      </div>

      <!-- 2. ANALYTICS -->
      <div class="space-y-1">
        <button onclick="toggleDropdown('analyticsDropdown', 'analyticsChevron')" 
                class="dropdown-btn w-full flex items-center justify-between px-3 py-2.5 hover:bg-white/60 hover:text-brand-dark rounded-xl text-xs font-semibold tracking-wide transition group text-slate-600 cursor-pointer">
          <div class="flex items-center space-x-3">
            <i class="fa-solid fa-chart-line text-sm text-slate-400 group-hover:text-brand-medium transition"></i>
            <span class="sidebar-text truncate">Analytics</span>
          </div>
          <div class="dropdown-right">
            <i id="analyticsChevron" class="fa-solid fa-chevron-down text-[10px] opacity-60 dropdown-chevron transition-transform duration-200"></i>
          </div>
        </button>
        <div id="analyticsDropdown" class="hidden pl-8 pr-2 space-y-0.5 font-medium sidebar-text">
          <a href="<?= site_url('pages/ai_insights.php') ?>" class="flex items-center space-x-2 px-3 py-2 text-[11px] rounded-md transition <?php echo (strpos($currentPath, 'ai_insights.php') !== false) ? 'bg-brand-light text-brand-dark' : 'text-slate-500 hover:bg-brand-light hover:text-brand-dark'; ?>">
            <i class="fa-solid fa-brain text-[10px] opacity-50"></i> 
            <span>AI Insights</span>
          </a>
          <a href="<?= site_url('pages/trend_analysis.php') ?>" class="flex items-center space-x-2 px-3 py-2 text-[11px] rounded-md transition <?php echo (strpos($currentPath, 'trend_analysis.php') !== false) ? 'bg-brand-light text-brand-dark' : 'text-slate-500 hover:bg-brand-light hover:text-brand-dark'; ?>">
            <i class="fa-solid fa-arrow-trend-up text-[10px] opacity-50"></i> 
            <span>Trend Analysis</span>
          </a>
          <a href="<?= site_url('pages/predictive.php') ?>" class="flex items-center space-x-2 px-3 py-2 text-[11px] rounded-md transition <?php echo (strpos($currentPath, 'predictive.php') !== false) ? 'bg-brand-light text-brand-dark' : 'text-slate-500 hover:bg-brand-light hover:text-brand-dark'; ?>">
            <i class="fa-solid fa-robot text-[10px] opacity-50"></i> 
            <span>Predictive Analytics</span>
          </a>
          <a href="<?= site_url('pages/performance.php') ?>" class="flex items-center space-x-2 px-3 py-2 text-[11px] rounded-md transition <?php echo (strpos($currentPath, 'performance.php') !== false) ? 'bg-brand-light text-brand-dark' : 'text-slate-500 hover:bg-brand-light hover:text-brand-dark'; ?>">
            <i class="fa-solid fa-gauge-high text-[10px] opacity-50"></i> 
            <span>Performance Metrics</span>
          </a>
=======
          <a href="dashboard.php" class="flex items-center space-x-2 px-3 py-2 text-[11px] text-slate-500 hover:text-brand-dark rounded-md transition">
            <i class="fa-solid fa-chart-simple text-[10px] opacity-50"></i> 
            <span>Dashboard</span>
          </a>
          <a href="module_activity.php" class="flex items-center space-x-2 px-3 py-2 text-[11px] text-slate-500 hover:text-brand-dark rounded-md transition">
            <i class="fa-solid fa-chart-line text-[10px] opacity-50"></i> 
            <span>Module Activity Summary</span>
          </a>
    
        </div>
      </div>

      <!-- 2. ANALYTICS - DIRECT LINK to AI Insights -->
      <a href="ai_insights.php" class="w-full flex items-center px-3 py-2.5 hover:bg-white/60 hover:text-brand-dark rounded-xl text-xs font-semibold tracking-wide transition group text-slate-600 cursor-pointer">
        <div class="flex items-center space-x-3">
          <i class="fa-solid fa-chart-line text-sm text-slate-400 group-hover:text-brand-medium transition"></i>
          <span class="sidebar-text truncate">Analytics</span>
>>>>>>> ff2abb8505d5406f10cfe4e980ef57e95b4cb3d3
        </div>
      </a>

      <!-- 3. REPORTS -->
      <div class="space-y-1">
        <button onclick="toggleDropdown('reportsDropdown', 'reportsChevron')" 
                class="dropdown-btn w-full flex items-center justify-between px-3 py-2.5 hover:bg-white/60 hover:text-brand-dark rounded-xl text-xs font-semibold tracking-wide transition group text-slate-600 cursor-pointer">
          <div class="flex items-center space-x-3">
            <i class="fa-solid fa-file-pen text-sm text-slate-400 group-hover:text-brand-medium transition"></i>
            <span class="sidebar-text truncate">Reports</span>
          </div>
          <div class="dropdown-right">
            <i id="reportsChevron" class="fa-solid fa-chevron-down text-[10px] opacity-60 dropdown-chevron transition-transform duration-200"></i>
          </div>
        </button>
        <div id="reportsDropdown" class="hidden pl-8 pr-2 space-y-0.5 font-medium sidebar-text">
<<<<<<< HEAD
          <a href="<?= site_url('pages/custom_report.php') ?>" class="flex items-center space-x-2 px-3 py-2 text-[11px] rounded-md transition <?php echo (strpos($currentPath, 'custom_report.php') !== false) ? 'bg-brand-light text-brand-dark' : 'text-slate-500 hover:bg-brand-light hover:text-brand-dark'; ?>">
            <i class="fa-solid fa-sliders text-[10px] opacity-50"></i> 
            <span>Custom Report Generation</span>
          </a>
          <a href="<?= site_url('pages/scheduled_reports.php') ?>" class="flex items-center space-x-2 px-3 py-2 text-[11px] rounded-md transition <?php echo (strpos($currentPath, 'scheduled_reports.php') !== false) ? 'bg-brand-light text-brand-dark' : 'text-slate-500 hover:bg-brand-light hover:text-brand-dark'; ?>">
            <i class="fa-solid fa-clock text-[10px] opacity-50"></i> 
            <span>Scheduled Reports</span>
          </a>
          <a href="<?= site_url('pages/export.php') ?>" class="flex items-center space-x-2 px-3 py-2 text-[11px] rounded-md transition <?php echo (strpos($currentPath, 'export.php') !== false) ? 'bg-brand-light text-brand-dark' : 'text-slate-500 hover:bg-brand-light hover:text-brand-dark'; ?>">
            <i class="fa-solid fa-file-export text-[10px] opacity-50"></i> 
            <span>Export Options (PDF/Excel)</span>
          </a>
          <a href="<?= site_url('pages/report_templates.php') ?>" class="flex items-center space-x-2 px-3 py-2 text-[11px] rounded-md transition <?php echo (strpos($currentPath, 'report_templates.php') !== false) ? 'bg-brand-light text-brand-dark' : 'text-slate-500 hover:bg-brand-light hover:text-brand-dark'; ?>">
=======
          <a href="custom_report.php" class="flex items-center space-x-2 px-3 py-2 text-[11px] text-slate-500 hover:text-brand-dark rounded-md transition">
            <i class="fa-solid fa-sliders text-[10px] opacity-50"></i> 
            <span>Custom Report Generation</span>
          </a>
          <a href="export.php" class="flex items-center space-x-2 px-3 py-2 text-[11px] text-slate-500 hover:text-brand-dark rounded-md transition">
            <i class="fa-solid fa-file-export text-[10px] opacity-50"></i> 
            <span>Export Options (PDF/Excel)</span>
          </a>
          <a href="report_templates.php" class="flex items-center space-x-2 px-3 py-2 text-[11px] text-slate-500 hover:text-brand-dark rounded-md transition">
>>>>>>> ff2abb8505d5406f10cfe4e980ef57e95b4cb3d3
            <i class="fa-solid fa-copy text-[10px] opacity-50"></i> 
            <span>Report Templates</span>
          </a>
        </div>
      </div>

<<<<<<< HEAD
      <!-- 4. COMPLIANCE & VIOLATIONS -->
      <div class="space-y-1">
        <button onclick="toggleDropdown('complianceDropdown', 'complianceChevron')" 
                class="dropdown-btn w-full flex items-center justify-between px-3 py-2.5 hover:bg-white/60 hover:text-brand-dark rounded-xl text-xs font-semibold tracking-wide transition group text-slate-600 cursor-pointer">
          <div class="flex items-center space-x-3">
            <i class="fa-solid fa-gavel text-sm text-slate-400 group-hover:text-brand-medium transition"></i>
            <span class="sidebar-text truncate">Compliance & Violations</span>
          </div>
          <div class="dropdown-right">
            <i id="complianceChevron" class="fa-solid fa-chevron-down text-[10px] opacity-60 dropdown-chevron transition-transform duration-200"></i>
          </div>
        </button>
        <div id="complianceDropdown" class="hidden pl-8 pr-2 space-y-0.5 font-medium sidebar-text">
          <a href="<?= site_url('pages/compliance_monitoring.php') ?>" class="flex items-center space-x-2 px-3 py-2 text-[11px] rounded-md transition <?php echo (strpos($currentPath, 'compliance_monitoring.php') !== false) ? 'bg-brand-light text-brand-dark' : 'text-slate-500 hover:bg-brand-light hover:text-brand-dark'; ?>">
            <i class="fa-solid fa-check-circle text-[10px] opacity-50"></i> 
            <span>Compliance Monitoring</span>
          </a>
          <a href="<?= site_url('violation_tracking.php') ?>" class="flex items-center space-x-2 px-3 py-2 text-[11px] rounded-md transition <?php echo (strpos($currentPath, 'violation_tracking.php') !== false) ? 'bg-brand-light text-brand-dark' : 'text-slate-500 hover:bg-brand-light hover:text-brand-dark'; ?>">
            <i class="fa-solid fa-triangle-exclamation text-[10px] opacity-50"></i> 
            <span>Violation Tracking</span>
          </a>
          <a href="<?= site_url('corrective_actions.php') ?>" class="flex items-center space-x-2 px-3 py-2 text-[11px] rounded-md transition <?php echo (strpos($currentPath, 'corrective_actions.php') !== false) ? 'bg-brand-light text-brand-dark' : 'text-slate-500 hover:bg-brand-light hover:text-brand-dark'; ?>">
            <i class="fa-solid fa-hammer text-[10px] opacity-50"></i> 
            <span>Corrective Actions</span>
          </a>
          <a href="<?= site_url('regulatory_compliance.php') ?>" class="flex items-center space-x-2 px-3 py-2 text-[11px] rounded-md transition <?php echo (strpos($currentPath, 'regulatory_compliance.php') !== false) ? 'bg-brand-light text-brand-dark' : 'text-slate-500 hover:bg-brand-light hover:text-brand-dark'; ?>">
            <i class="fa-solid fa-scale-balanced text-[10px] opacity-50"></i> 
            <span>Regulatory Compliance</span>
          </a>
=======
      <!-- 4. COMPLIANCE & VIOLATIONS - DIRECT LINK to Compliance Monitoring -->
      <a href="compliance_monitoring.php" class="w-full flex items-center px-3 py-2.5 hover:bg-white/60 hover:text-brand-dark rounded-xl text-xs font-semibold tracking-wide transition group text-slate-600 cursor-pointer">
        <div class="flex items-center space-x-3">
          <i class="fa-solid fa-gavel text-sm text-slate-400 group-hover:text-brand-medium transition"></i>
          <span class="sidebar-text truncate">Compliance & Violations</span>
>>>>>>> ff2abb8505d5406f10cfe4e980ef57e95b4cb3d3
        </div>
      </a>

      <!-- ============================================================ -->
      <!-- SECTION 2: OPERATIONAL MODULES                               -->
      <!-- ============================================================ -->

      <span class="sidebar-text text-[9px] font-bold tracking-widest text-slate-400 uppercase block px-3 mt-6 mb-2">Operational Modules</span>

      <!-- MODULE 1: HEALTH CENTER SERVICES -->
      <div class="space-y-1">
        <button onclick="toggleDropdown('healthCenterDropdown', 'healthCenterChevron')" 
                class="dropdown-btn w-full flex items-center justify-between px-3 py-2.5 rounded-xl text-xs font-semibold tracking-wide transition group 
                <?php echo ($activeModule === 'healthCenter') ? 'bg-white/60 text-brand-dark' : 'text-slate-600 hover:bg-white/60 hover:text-brand-dark'; ?> cursor-pointer">
          <div class="flex items-center space-x-3">
            <i class="fa-solid fa-hospital text-sm <?php echo ($activeModule === 'healthCenter') ? 'text-brand-medium' : 'text-slate-400 group-hover:text-brand-medium'; ?> transition"></i>
            <span class="sidebar-text truncate">Health Center Services</span>
          </div>
          <div class="dropdown-right">
            <i id="healthCenterChevron" class="fa-solid fa-chevron-down text-[10px] opacity-60 dropdown-chevron transition-transform duration-200"></i>
          </div>
        </button>
        <div id="healthCenterDropdown" class="hidden pl-8 pr-2 space-y-0.5 font-medium sidebar-text">
          
<<<<<<< HEAD
          <a href="<?= site_url('../modules/healthservices/patients.php') ?>" class="flex items-center space-x-2 px-3 py-2 text-[11px] rounded-md transition <?php echo (strpos($currentPath, 'patients.php') !== false) ? 'bg-brand-light text-brand-dark' : 'text-slate-500 hover:bg-brand-light hover:text-brand-dark'; ?>">
=======
          <!-- Patient Management -->
          <a href="patient_management.php" class="flex items-center space-x-2 px-3 py-2 text-[11px] text-slate-500 hover:text-brand-dark rounded-md transition">
>>>>>>> ff2abb8505d5406f10cfe4e980ef57e95b4cb3d3
            <i class="fa-solid fa-users text-[10px] opacity-50"></i> 
            <span>Patient Management</span>
          </a>

<<<<<<< HEAD
          <a href="<?= site_url('../modules/healthservices/consultations.php') ?>" class="flex items-center space-x-2 px-3 py-2 text-[11px] rounded-md transition <?php echo (strpos($currentPath, 'consultations.php') !== false) ? 'bg-brand-light text-brand-dark' : 'text-slate-500 hover:bg-brand-light hover:text-brand-dark'; ?>">
=======
          <!-- Consultations -->
          <a href="consultations.php" class="flex items-center space-x-2 px-3 py-2 text-[11px] text-slate-500 hover:text-brand-dark rounded-md transition">
>>>>>>> ff2abb8505d5406f10cfe4e980ef57e95b4cb3d3
            <i class="fa-solid fa-stethoscope text-[10px] opacity-50"></i> 
            <span>Consultations</span>
          </a>

<<<<<<< HEAD
          <a href="<?= site_url('../modules/healthservices/medical_records.php') ?>" class="flex items-center space-x-2 px-3 py-2 text-[11px] rounded-md transition <?php echo (strpos($currentPath, 'medical_records.php') !== false) ? 'bg-brand-light text-brand-dark' : 'text-slate-500 hover:bg-brand-light hover:text-brand-dark'; ?>">
=======
          <!-- Medical Records -->
          <a href="medical_records.php" class="flex items-center space-x-2 px-3 py-2 text-[11px] text-slate-500 hover:text-brand-dark rounded-md transition">
>>>>>>> ff2abb8505d5406f10cfe4e980ef57e95b4cb3d3
            <i class="fa-solid fa-folder text-[10px] opacity-50"></i> 
            <span>Medical Records</span>
          </a>

<<<<<<< HEAD
          <a href="<?= site_url('../modules/healthservices/appointments.php') ?>" class="flex items-center space-x-2 px-3 py-2 text-[11px] rounded-md transition <?php echo (strpos($currentPath, 'appointments.php') !== false) ? 'bg-brand-light text-brand-dark' : 'text-slate-500 hover:bg-brand-light hover:text-brand-dark'; ?>">
=======
          <!-- Appointments   -->
          <a href="appointments.php" class="flex items-center space-x-2 px-3 py-2 text-[11px] text-slate-500 hover:text-brand-dark rounded-md transition">
>>>>>>> ff2abb8505d5406f10cfe4e980ef57e95b4cb3d3
            <i class="fa-solid fa-calendar-check text-[10px] opacity-50"></i> 
            <span>Appointments </span>
          </a>

<<<<<<< HEAD
          <a href="<?= site_url('../modules/healthservices/triage.php') ?>" class="flex items-center space-x-2 px-3 py-2 text-[11px] rounded-md transition <?php echo (strpos($currentPath, 'triage.php') !== false) ? 'bg-brand-light text-brand-dark' : 'text-slate-500 hover:bg-brand-light hover:text-brand-dark'; ?>">
=======
          <!-- Triage   -->
          <a href="triage.php" class="flex items-center space-x-2 px-3 py-2 text-[11px] text-slate-500 hover:text-brand-dark rounded-md transition">
>>>>>>> ff2abb8505d5406f10cfe4e980ef57e95b4cb3d3
            <i class="fa-solid fa-heart-pulse text-[10px] opacity-50"></i> 
            <span>Triage  </span>
          </a>

<<<<<<< HEAD
          <a href="<?= site_url('../modules/healthservices/prescriptions.php') ?>" class="flex items-center space-x-2 px-3 py-2 text-[11px] rounded-md transition <?php echo (strpos($currentPath, 'prescriptions.php') !== false) ? 'bg-brand-light text-brand-dark' : 'text-slate-500 hover:bg-brand-light hover:text-brand-dark'; ?>">
=======
          <!-- Prescriptions   -->
          <a href="prescriptions.php" class="flex items-center space-x-2 px-3 py-2 text-[11px] text-slate-500 hover:text-brand-dark rounded-md transition">
>>>>>>> ff2abb8505d5406f10cfe4e980ef57e95b4cb3d3
            <i class="fa-solid fa-prescription-bottle text-[10px] opacity-50"></i> 
            <span>Prescriptions  </span>
          </a>

<<<<<<< HEAD
          <a href="<?= site_url('../modules/healthservices/referrals.php') ?>" class="flex items-center space-x-2 px-3 py-2 text-[11px] rounded-md transition <?php echo (strpos($currentPath, 'referrals.php') !== false) ? 'bg-brand-light text-brand-dark' : 'text-slate-500 hover:bg-brand-light hover:text-brand-dark'; ?>">
=======
          <!-- Referrals   -->
          <a href="referrals.php" class="flex items-center space-x-2 px-3 py-2 text-[11px] text-slate-500 hover:text-brand-dark rounded-md transition">
>>>>>>> ff2abb8505d5406f10cfe4e980ef57e95b4cb3d3
            <i class="fa-solid fa-arrow-right-arrow-left text-[10px] opacity-50"></i> 
            <span>Referrals  </span>
          </a>

        </div>
      </div>

      <!-- MODULE 2: SANITATION PERMITS -->
      <div class="space-y-1">
        <button onclick="toggleDropdown('sanitationDropdown', 'sanitationChevron')" 
                class="dropdown-btn w-full flex items-center justify-between px-3 py-2.5 rounded-xl text-xs font-semibold tracking-wide transition group 
                <?php echo ($activeModule === 'sanitation') ? 'bg-white/60 text-brand-dark' : 'text-slate-600 hover:bg-white/60 hover:text-brand-dark'; ?> cursor-pointer">
          <div class="flex items-center space-x-3">
            <i class="fa-solid fa-clipboard-check text-sm <?php echo ($activeModule === 'sanitation') ? 'text-brand-medium' : 'text-slate-400 group-hover:text-brand-medium'; ?> transition"></i>
            <span class="sidebar-text truncate">Sanitation Permits</span>
          </div>
          <div class="dropdown-right">
            <i id="sanitationChevron" class="fa-solid fa-chevron-down text-[10px] opacity-60 dropdown-chevron transition-transform duration-200"></i>
          </div>
        </button>
        <div id="sanitationDropdown" class="hidden pl-8 pr-2 space-y-0.5 font-medium sidebar-text">
          
<<<<<<< HEAD
          <a href="<?= site_url('../modules/sanitation/permit_applications.php') ?>" class="flex items-center space-x-2 px-3 py-2 text-[11px] rounded-md transition <?php echo (strpos($currentPath, 'permit_applications.php') !== false) ? 'bg-brand-light text-brand-dark' : 'text-slate-500 hover:bg-brand-light hover:text-brand-dark'; ?>">
=======
          <a href="permit_applications.php" class="flex items-center space-x-2 px-3 py-2 text-[11px] text-slate-500 hover:text-brand-dark rounded-md transition">
>>>>>>> ff2abb8505d5406f10cfe4e980ef57e95b4cb3d3
            <i class="fa-solid fa-file-pen text-[10px] opacity-50"></i> 
            <span>Permit Applications</span>
          </a>
          
<<<<<<< HEAD
          <a href="<?= site_url('../modules/sanitation/inspections.php') ?>" class="flex items-center space-x-2 px-3 py-2 text-[11px] rounded-md transition <?php echo (strpos($currentPath, 'inspections.php') !== false) ? 'bg-brand-light text-brand-dark' : 'text-slate-500 hover:bg-brand-light hover:text-brand-dark'; ?>">
=======
          <a href="inspections.php" class="flex items-center space-x-2 px-3 py-2 text-[11px] text-slate-500 hover:text-brand-dark rounded-md transition">
>>>>>>> ff2abb8505d5406f10cfe4e980ef57e95b4cb3d3
            <i class="fa-solid fa-search text-[10px] opacity-50"></i> 
            <span>Inspections</span>
          </a>
          
<<<<<<< HEAD
          <a href="<?= site_url('../modules/sanitation/permit_records.php') ?>" class="flex items-center space-x-2 px-3 py-2 text-[11px] rounded-md transition <?php echo (strpos($currentPath, 'permit_records.php') !== false) ? 'bg-brand-light text-brand-dark' : 'text-slate-500 hover:bg-brand-light hover:text-brand-dark'; ?>">
=======
          <a href="permit_records.php" class="flex items-center space-x-2 px-3 py-2 text-[11px] text-slate-500 hover:text-brand-dark rounded-md transition">
>>>>>>> ff2abb8505d5406f10cfe4e980ef57e95b4cb3d3
            <i class="fa-solid fa-folder text-[10px] opacity-50"></i> 
            <span>Permit Records</span>
          </a>
          
<<<<<<< HEAD
          <a href="<?= site_url('../modules/sanitation/payments.php') ?>" class="flex items-center space-x-2 px-3 py-2 text-[11px] rounded-md transition <?php echo (strpos($currentPath, 'payments.php') !== false) ? 'bg-brand-light text-brand-dark' : 'text-slate-500 hover:bg-brand-light hover:text-brand-dark'; ?>">
=======
          <a href="payments.php" class="flex items-center space-x-2 px-3 py-2 text-[11px] text-slate-500 hover:text-brand-dark rounded-md transition">
>>>>>>> ff2abb8505d5406f10cfe4e980ef57e95b4cb3d3
            <i class="fa-solid fa-money-bill-wave text-[10px] opacity-50"></i> 
            <span>Payments  </span>
          </a>
          
<<<<<<< HEAD
          <a href="<?= site_url('../modules/sanitation/documents.php') ?>" class="flex items-center space-x-2 px-3 py-2 text-[11px] rounded-md transition <?php echo (strpos($currentPath, 'documents.php') !== false) ? 'bg-brand-light text-brand-dark' : 'text-slate-500 hover:bg-brand-light hover:text-brand-dark'; ?>">
=======
          <a href="documents.php" class="flex items-center space-x-2 px-3 py-2 text-[11px] text-slate-500 hover:text-brand-dark rounded-md transition">
>>>>>>> ff2abb8505d5406f10cfe4e980ef57e95b4cb3d3
            <i class="fa-solid fa-file text-[10px] opacity-50"></i> 
            <span>Documents  </span>
          </a>
          
<<<<<<< HEAD
          <a href="<?= site_url('../modules/sanitation/renewals.php') ?>" class="flex items-center space-x-2 px-3 py-2 text-[11px] rounded-md transition <?php echo (strpos($currentPath, 'renewals.php') !== false) ? 'bg-brand-light text-brand-dark' : 'text-slate-500 hover:bg-brand-light hover:text-brand-dark'; ?>">
=======
          <a href="renewals.php" class="flex items-center space-x-2 px-3 py-2 text-[11px] text-slate-500 hover:text-brand-dark rounded-md transition">
>>>>>>> ff2abb8505d5406f10cfe4e980ef57e95b4cb3d3
            <i class="fa-solid fa-rotate text-[10px] opacity-50"></i> 
            <span>Renewals  </span>
          </a>

        </div>
      </div>

      <!-- MODULE 3: IMMUNIZATION & NUTRITION -->
      <div class="space-y-1">
        <button onclick="toggleDropdown('immunizationDropdown', 'immunizationChevron')" 
                class="dropdown-btn w-full flex items-center justify-between px-3 py-2.5 rounded-xl text-xs font-semibold tracking-wide transition group 
                <?php echo ($activeModule === 'immunization') ? 'bg-white/60 text-brand-dark' : 'text-slate-600 hover:bg-white/60 hover:text-brand-dark'; ?> cursor-pointer">
          <div class="flex items-center space-x-3">
            <i class="fa-solid fa-syringe text-sm <?php echo ($activeModule === 'immunization') ? 'text-brand-medium' : 'text-slate-400 group-hover:text-brand-medium'; ?> transition"></i>
            <span class="sidebar-text truncate">Immunization & Nutrition</span>
          </div>
          <div class="dropdown-right">
            <i id="immunizationChevron" class="fa-solid fa-chevron-down text-[10px] opacity-60 dropdown-chevron transition-transform duration-200"></i>
          </div>
        </button>
        <div id="immunizationDropdown" class="hidden pl-8 pr-2 space-y-0.5 font-medium sidebar-text">
          
<<<<<<< HEAD
          <a href="<?= site_url('../modules/immunization/child_records.php') ?>" class="flex items-center space-x-2 px-3 py-2 text-[11px] rounded-md transition <?php echo (strpos($currentPath, 'child_records.php') !== false) ? 'bg-brand-light text-brand-dark' : 'text-slate-500 hover:bg-brand-light hover:text-brand-dark'; ?>">
=======
          <a href="child_records.php" class="flex items-center space-x-2 px-3 py-2 text-[11px] text-slate-500 hover:text-brand-dark rounded-md transition">
>>>>>>> ff2abb8505d5406f10cfe4e980ef57e95b4cb3d3
            <i class="fa-solid fa-child text-[10px] opacity-50"></i> 
            <span>Child Records</span>
          </a>
          
<<<<<<< HEAD
          <a href="<?= site_url('../modules/immunization/vaccination_tracking.php') ?>" class="flex items-center space-x-2 px-3 py-2 text-[11px] rounded-md transition <?php echo (strpos($currentPath, 'vaccination_tracking.php') !== false) ? 'bg-brand-light text-brand-dark' : 'text-slate-500 hover:bg-brand-light hover:text-brand-dark'; ?>">
=======
          <a href="vaccination_tracking.php" class="flex items-center space-x-2 px-3 py-2 text-[11px] text-slate-500 hover:text-brand-dark rounded-md transition">
>>>>>>> ff2abb8505d5406f10cfe4e980ef57e95b4cb3d3
            <i class="fa-solid fa-vial text-[10px] opacity-50"></i> 
            <span>Vaccination Tracking</span>
          </a>
          
<<<<<<< HEAD
          <a href="<?= site_url('../modules/immunization/growth_charts.php') ?>" class="flex items-center space-x-2 px-3 py-2 text-[11px] rounded-md transition <?php echo (strpos($currentPath, 'growth_charts.php') !== false) ? 'bg-brand-light text-brand-dark' : 'text-slate-500 hover:bg-brand-light hover:text-brand-dark'; ?>">
=======
          <a href="growth_charts.php" class="flex items-center space-x-2 px-3 py-2 text-[11px] text-slate-500 hover:text-brand-dark rounded-md transition">
>>>>>>> ff2abb8505d5406f10cfe4e980ef57e95b4cb3d3
            <i class="fa-solid fa-chart-line text-[10px] opacity-50"></i> 
            <span>Growth Charts</span>
          </a>
          
<<<<<<< HEAD
          <a href="<?= site_url('../modules/immunization/vaccine_inventory.php') ?>" class="flex items-center space-x-2 px-3 py-2 text-[11px] rounded-md transition <?php echo (strpos($currentPath, 'vaccine_inventory.php') !== false) ? 'bg-brand-light text-brand-dark' : 'text-slate-500 hover:bg-brand-light hover:text-brand-dark'; ?>">
=======
          <a href="vaccine_inventory.php" class="flex items-center space-x-2 px-3 py-2 text-[11px] text-slate-500 hover:text-brand-dark rounded-md transition">
>>>>>>> ff2abb8505d5406f10cfe4e980ef57e95b4cb3d3
            <i class="fa-solid fa-boxes text-[10px] opacity-50"></i> 
            <span>Vaccine Inventory  </span>
          </a>
          
<<<<<<< HEAD
          <a href="<?= site_url('../modules/immunization/nutrition_assessment.php') ?>" class="flex items-center space-x-2 px-3 py-2 text-[11px] rounded-md transition <?php echo (strpos($currentPath, 'nutrition_assessment.php') !== false) ? 'bg-brand-light text-brand-dark' : 'text-slate-500 hover:bg-brand-light hover:text-brand-dark'; ?>">
=======
          <a href="nutrition_assessment.php" class="flex items-center space-x-2 px-3 py-2 text-[11px] text-slate-500 hover:text-brand-dark rounded-md transition">
>>>>>>> ff2abb8505d5406f10cfe4e980ef57e95b4cb3d3
            <i class="fa-solid fa-apple-alt text-[10px] opacity-50"></i> 
            <span>Nutrition Assessment  </span>
          </a>

        </div>
      </div>

      <!-- MODULE 4: WASTEWATER SERVICES -->
      <div class="space-y-1">
        <button onclick="toggleDropdown('wastewaterDropdown', 'wastewaterChevron')" 
                class="dropdown-btn w-full flex items-center justify-between px-3 py-2.5 rounded-xl text-xs font-semibold tracking-wide transition group 
                <?php echo ($activeModule === 'wastewater') ? 'bg-white/60 text-brand-dark' : 'text-slate-600 hover:bg-white/60 hover:text-brand-dark'; ?> cursor-pointer">
          <div class="flex items-center space-x-3">
            <i class="fa-solid fa-droplet text-sm <?php echo ($activeModule === 'wastewater') ? 'text-brand-medium' : 'text-slate-400 group-hover:text-brand-medium'; ?> transition"></i>
            <span class="sidebar-text truncate">Wastewater Services</span>
          </div>
          <div class="dropdown-right">
            <i id="wastewaterChevron" class="fa-solid fa-chevron-down text-[10px] opacity-60 dropdown-chevron transition-transform duration-200"></i>
          </div>
        </button>
        <div id="wastewaterDropdown" class="hidden pl-8 pr-2 space-y-0.5 font-medium sidebar-text">
          
<<<<<<< HEAD
          <a href="<?= site_url('../modules/services/septic_tanks.php') ?>" class="flex items-center space-x-2 px-3 py-2 text-[11px] rounded-md transition <?php echo (strpos($currentPath, 'septic_tanks.php') !== false) ? 'bg-brand-light text-brand-dark' : 'text-slate-500 hover:bg-brand-light hover:text-brand-dark'; ?>">
=======
          <a href="septic_tanks.php" class="flex items-center space-x-2 px-3 py-2 text-[11px] text-slate-500 hover:text-brand-dark rounded-md transition">
>>>>>>> ff2abb8505d5406f10cfe4e980ef57e95b4cb3d3
            <i class="fa-solid fa-water text-[10px] opacity-50"></i> 
            <span>Septic Tank Registry</span>
          </a>
          
<<<<<<< HEAD
          <a href="<?= site_url('../modules/services/maintenance.php') ?>" class="flex items-center space-x-2 px-3 py-2 text-[11px] rounded-md transition <?php echo (strpos($currentPath, 'maintenance.php') !== false) ? 'bg-brand-light text-brand-dark' : 'text-slate-500 hover:bg-brand-light hover:text-brand-dark'; ?>">
=======
          <a href="maintenance.php" class="flex items-center space-x-2 px-3 py-2 text-[11px] text-slate-500 hover:text-brand-dark rounded-md transition">
>>>>>>> ff2abb8505d5406f10cfe4e980ef57e95b4cb3d3
            <i class="fa-solid fa-wrench text-[10px] opacity-50"></i> 
            <span>Maintenance & Desludging</span>
          </a>
          
<<<<<<< HEAD
          <a href="<?= site_url('../modules/services/service_requests.php') ?>" class="flex items-center space-x-2 px-3 py-2 text-[11px] rounded-md transition <?php echo (strpos($currentPath, 'service_requests.php') !== false) ? 'bg-brand-light text-brand-dark' : 'text-slate-500 hover:bg-brand-light hover:text-brand-dark'; ?>">
=======
          <a href="service_requests.php" class="flex items-center space-x-2 px-3 py-2 text-[11px] text-slate-500 hover:text-brand-dark rounded-md transition">
>>>>>>> ff2abb8505d5406f10cfe4e980ef57e95b4cb3d3
            <i class="fa-solid fa-tools text-[10px] opacity-50"></i> 
            <span>Service Requests</span>
          </a>
          
<<<<<<< HEAD
          <a href="<?= site_url('../modules/services/providers.php') ?>" class="flex items-center space-x-2 px-3 py-2 text-[11px] rounded-md transition <?php echo (strpos($currentPath, 'providers.php') !== false) ? 'bg-brand-light text-brand-dark' : 'text-slate-500 hover:bg-brand-light hover:text-brand-dark'; ?>">
=======
          <a href="providers.php" class="flex items-center space-x-2 px-3 py-2 text-[11px] text-slate-500 hover:text-brand-dark rounded-md transition">
>>>>>>> ff2abb8505d5406f10cfe4e980ef57e95b4cb3d3
            <i class="fa-solid fa-user-cog text-[10px] opacity-50"></i> 
            <span>Service Providers  </span>
          </a>
          
<<<<<<< HEAD
          <a href="<?= site_url('../modules/services/wastewater_billing.php') ?>" class="flex items-center space-x-2 px-3 py-2 text-[11px] rounded-md transition <?php echo (strpos($currentPath, 'wastewater_billing.php') !== false) ? 'bg-brand-light text-brand-dark' : 'text-slate-500 hover:bg-brand-light hover:text-brand-dark'; ?>">
=======
          <a href="wastewater_billing.php" class="flex items-center space-x-2 px-3 py-2 text-[11px] text-slate-500 hover:text-brand-dark rounded-md transition">
>>>>>>> ff2abb8505d5406f10cfe4e980ef57e95b4cb3d3
            <i class="fa-solid fa-file-invoice text-[10px] opacity-50"></i> 
            <span>Billing  </span>
          </a>

        </div>
      </div>

      <!-- MODULE 5: HEALTH SURVEILLANCE -->
      <div class="space-y-1">
        <button onclick="toggleDropdown('surveillanceDropdown', 'surveillanceChevron')" 
                class="dropdown-btn w-full flex items-center justify-between px-3 py-2.5 rounded-xl text-xs font-semibold tracking-wide transition group 
                <?php echo ($activeModule === 'surveillance') ? 'bg-white/60 text-brand-dark' : 'text-slate-600 hover:bg-white/60 hover:text-brand-dark'; ?> cursor-pointer">
          <div class="flex items-center space-x-3">
            <i class="fa-solid fa-binoculars text-sm <?php echo ($activeModule === 'surveillance') ? 'text-brand-medium' : 'text-slate-400 group-hover:text-brand-medium'; ?> transition"></i>
            <span class="sidebar-text truncate">Health Surveillance</span>
          </div>
          <div class="dropdown-right">
            <i id="surveillanceChevron" class="fa-solid fa-chevron-down text-[10px] opacity-60 dropdown-chevron transition-transform duration-200"></i>
          </div>
        </button>
        <div id="surveillanceDropdown" class="hidden pl-8 pr-2 space-y-0.5 font-medium sidebar-text">
          
<<<<<<< HEAD
          <a href="<?= site_url('../modules/surveillence/case_reports.php') ?>" class="flex items-center space-x-2 px-3 py-2 text-[11px] rounded-md transition <?php echo (strpos($currentPath, 'case_reports.php') !== false) ? 'bg-brand-light text-brand-dark' : 'text-slate-500 hover:bg-brand-light hover:text-brand-dark'; ?>">
=======
          <a href="case_reports.php" class="flex items-center space-x-2 px-3 py-2 text-[11px] text-slate-500 hover:text-brand-dark rounded-md transition">
>>>>>>> ff2abb8505d5406f10cfe4e980ef57e95b4cb3d3
            <i class="fa-solid fa-file-medical text-[10px] opacity-50"></i> 
            <span>Case Reports</span>
          </a>
          
<<<<<<< HEAD
          <a href="<?= site_url('../modules/surveillence/mapping.php') ?>" class="flex items-center space-x-2 px-3 py-2 text-[11px] rounded-md transition <?php echo (strpos($currentPath, 'mapping.php') !== false) ? 'bg-brand-light text-brand-dark' : 'text-slate-500 hover:bg-brand-light hover:text-brand-dark'; ?>">
=======
          <a href="mapping.php" class="flex items-center space-x-2 px-3 py-2 text-[11px] text-slate-500 hover:text-brand-dark rounded-md transition">
>>>>>>> ff2abb8505d5406f10cfe4e980ef57e95b4cb3d3
            <i class="fa-solid fa-map text-[10px] opacity-50"></i> 
            <span>Mapping & Clustering</span>
          </a>
          
<<<<<<< HEAD
          <a href="<?= site_url('../modules/surveillence/outbreak_detection.php') ?>" class="flex items-center space-x-2 px-3 py-2 text-[11px] rounded-md transition <?php echo (strpos($currentPath, 'outbreak_detection.php') !== false) ? 'bg-brand-light text-brand-dark' : 'text-slate-500 hover:bg-brand-light hover:text-brand-dark'; ?>">
=======
          <a href="outbreak_detection.php" class="flex items-center space-x-2 px-3 py-2 text-[11px] text-slate-500 hover:text-brand-dark rounded-md transition">
>>>>>>> ff2abb8505d5406f10cfe4e980ef57e95b4cb3d3
            <i class="fa-solid fa-triangle-exclamation text-[10px] opacity-50"></i> 
            <span>Outbreak Detection</span>
          </a>
          
<<<<<<< HEAD
          <a href="<?= site_url('../modules/surveillence/alerts.php') ?>" class="flex items-center space-x-2 px-3 py-2 text-[11px] rounded-md transition <?php echo (strpos($currentPath, 'alerts.php') !== false) ? 'bg-brand-light text-brand-dark' : 'text-slate-500 hover:bg-brand-light hover:text-brand-dark'; ?>">
=======
          <a href="alerts.php" class="flex items-center space-x-2 px-3 py-2 text-[11px] text-slate-500 hover:text-brand-dark rounded-md transition">
>>>>>>> ff2abb8505d5406f10cfe4e980ef57e95b4cb3d3
            <i class="fa-solid fa-bell text-[10px] opacity-50"></i> 
            <span>Real-time Alerts  </span>
          </a>
          
<<<<<<< HEAD
          <a href="<?= site_url('../modules/surveillence/contact_tracing.php') ?>" class="flex items-center space-x-2 px-3 py-2 text-[11px] rounded-md transition <?php echo (strpos($currentPath, 'contact_tracing.php') !== false) ? 'bg-brand-light text-brand-dark' : 'text-slate-500 hover:bg-brand-light hover:text-brand-dark'; ?>">
=======
          <a href="contact_tracing.php" class="flex items-center space-x-2 px-3 py-2 text-[11px] text-slate-500 hover:text-brand-dark rounded-md transition">
>>>>>>> ff2abb8505d5406f10cfe4e980ef57e95b4cb3d3
            <i class="fa-solid fa-people-arrows text-[10px] opacity-50"></i> 
            <span>Contact Tracing  </span>
          </a>
          
<<<<<<< HEAD
          <a href="<?= site_url('../modules/surveillence/response_management.php') ?>" class="flex items-center space-x-2 px-3 py-2 text-[11px] rounded-md transition <?php echo (strpos($currentPath, 'response_management.php') !== false) ? 'bg-brand-light text-brand-dark' : 'text-slate-500 hover:bg-brand-light hover:text-brand-dark'; ?>">
=======
          <a href="response_management.php" class="flex items-center space-x-2 px-3 py-2 text-[11px] text-slate-500 hover:text-brand-dark rounded-md transition">
>>>>>>> ff2abb8505d5406f10cfe4e980ef57e95b4cb3d3
            <i class="fa-solid fa-phone-alt text-[10px] opacity-50"></i> 
            <span>Response Management </span>
          </a>

        </div>
      </div>

      <!-- ============================================================ -->
      <!-- SECTION 3: SYSTEM MANAGEMENT                                 -->
      <!-- ============================================================ -->

      <span class="sidebar-text text-[9px] font-bold tracking-widest text-slate-400 uppercase block px-3 mt-6 mb-2">System Management</span>

      <!-- User Management -->
      <div class="space-y-1">
<<<<<<< HEAD
        <a href="<?= site_url('management/user_management.php') ?>"
           class="w-full flex items-center px-3 py-2.5 rounded-xl text-xs font-semibold tracking-wide transition group 
           <?php echo (strpos($currentPath, 'user_management.php') !== false) ? 'bg-white/60 text-brand-dark' : 'text-slate-600 hover:bg-white/60 hover:text-brand-dark'; ?>">
          <div class="flex items-center space-x-3">
            <i class="fa-solid fa-users-gear text-sm <?php echo (strpos($currentPath, 'user_management.php') !== false) ? 'text-brand-medium' : 'text-slate-400 group-hover:text-brand-medium'; ?> transition"></i>
            <span class="sidebar-text truncate">User Management</span>
          </div>
        </a>
=======
        <button onclick="toggleDropdown('userMgmtDropdown', 'userMgmtChevron')" 
                class="dropdown-btn w-full flex items-center justify-between px-3 py-2.5 hover:bg-white/60 hover:text-brand-dark rounded-xl text-xs font-semibold tracking-wide transition group text-slate-600 cursor-pointer">
          <div class="flex items-center space-x-3">
            <i class="fa-solid fa-users-gear text-sm text-slate-400 group-hover:text-brand-medium transition"></i>
            <span class="sidebar-text truncate">User Management</span>
          </div>
          <div class="dropdown-right">
            <i id="userMgmtChevron" class="fa-solid fa-chevron-down text-[10px] opacity-60 dropdown-chevron transition-transform duration-200"></i>
          </div>
        </button>
        <div id="userMgmtDropdown" class="hidden pl-8 pr-2 space-y-0.5 font-medium sidebar-text">
          <a href="create_staff.php" class="flex items-center space-x-2 px-3 py-2 text-[11px] text-slate-500 hover:text-brand-dark rounded-md transition">
            <i class="fa-solid fa-user-plus text-[10px] opacity-50"></i> <span>User Registration</span>
          </a>
          <a href="manage_users.php" class="flex items-center space-x-2 px-3 py-2 text-[11px] text-slate-500 hover:text-brand-dark rounded-md transition">
            <i class="fa-solid fa-user-pen text-[10px] opacity-50"></i> <span>Role Assignment</span>
          </a>
          <a href="rbac_permissions.php" class="flex items-center space-x-2 px-3 py-2 text-[11px] text-slate-500 hover:text-brand-dark rounded-md transition">
            <i class="fa-solid fa-key text-[10px] opacity-50"></i> <span>Permission Management</span>
          </a>
          <a href="user_activity.php" class="flex items-center space-x-2 px-3 py-2 text-[11px] text-slate-500 hover:text-brand-dark rounded-md transition">
            <i class="fa-solid fa-chart-line text-[10px] opacity-50"></i> <span>User Activity</span>
          </a>
        </div>
>>>>>>> ff2abb8505d5406f10cfe4e980ef57e95b4cb3d3
      </div>

      <!-- System Logs -->
      <div class="space-y-1">
<<<<<<< HEAD
        <a href="<?= site_url('management/system_logs.php') ?>"
           class="w-full flex items-center px-3 py-2.5 rounded-xl text-xs font-semibold tracking-wide transition group 
           <?php echo (strpos($currentPath, 'system_logs.php') !== false) ? 'bg-white/60 text-brand-dark' : 'text-slate-600 hover:bg-white/60 hover:text-brand-dark'; ?>">
          <div class="flex items-center space-x-3">
            <i class="fa-solid fa-clock-rotate-left text-sm <?php echo (strpos($currentPath, 'system_logs.php') !== false) ? 'text-brand-medium' : 'text-slate-400 group-hover:text-brand-medium'; ?> transition"></i>
            <span class="sidebar-text truncate">System Logs</span>
          </div>
        </a>
=======
        <button onclick="toggleDropdown('sysLogsDropdown', 'sysLogsChevron')" 
                class="dropdown-btn w-full flex items-center justify-between px-3 py-2.5 hover:bg-white/60 hover:text-brand-dark rounded-xl text-xs font-semibold tracking-wide transition group text-slate-600 cursor-pointer">
          <div class="flex items-center space-x-3">
            <i class="fa-solid fa-clock-rotate-left text-sm text-slate-400 group-hover:text-brand-medium transition"></i>
            <span class="sidebar-text truncate">System Logs</span>
          </div>
          <div class="dropdown-right">
            <i id="sysLogsChevron" class="fa-solid fa-chevron-down text-[10px] opacity-60 dropdown-chevron transition-transform duration-200"></i>
          </div>
        </button>
        <div id="sysLogsDropdown" class="hidden pl-8 pr-2 space-y-0.5 font-medium sidebar-text">
          <a href="audit_trail.php" class="flex items-center space-x-2 px-3 py-2 text-[11px] text-slate-500 hover:text-brand-dark rounded-md transition">
            <i class="fa-solid fa-list-check text-[10px] opacity-50"></i> <span>Audit Trail</span>
          </a>
          <a href="activity_logs.php" class="flex items-center space-x-2 px-3 py-2 text-[11px] text-slate-500 hover:text-brand-dark rounded-md transition">
            <i class="fa-solid fa-chart-line text-[10px] opacity-50"></i> <span>Activity Logs</span>
          </a>
          <a href="error_logs.php" class="flex items-center space-x-2 px-3 py-2 text-[11px] text-slate-500 hover:text-brand-dark rounded-md transition">
            <i class="fa-solid fa-bug text-[10px] opacity-50"></i> <span>Error Logs</span>
          </a>
          <a href="log_search.php" class="flex items-center space-x-2 px-3 py-2 text-[11px] text-slate-500 hover:text-brand-dark rounded-md transition">
            <i class="fa-solid fa-search text-[10px] opacity-50"></i> <span>Log Search</span>
          </a>
        </div>
>>>>>>> ff2abb8505d5406f10cfe4e980ef57e95b4cb3d3
      </div>

      <!-- Settings -->
      <div class="space-y-1">
<<<<<<< HEAD
        <a href="<?= site_url('management/settings.php') ?>"
           class="w-full flex items-center px-3 py-2.5 rounded-xl text-xs font-semibold tracking-wide transition group 
           <?php echo (strpos($currentPath, 'settings.php') !== false) ? 'bg-white/60 text-brand-dark' : 'text-slate-600 hover:bg-white/60 hover:text-brand-dark'; ?>">
          <div class="flex items-center space-x-3">
            <i class="fa-solid fa-gear text-sm <?php echo (strpos($currentPath, 'settings.php') !== false) ? 'text-brand-medium' : 'text-slate-400 group-hover:text-brand-medium'; ?> transition"></i>
            <span class="sidebar-text truncate">Settings</span>
          </div>
        </a>
=======
        <button onclick="toggleDropdown('settingsDropdown', 'settingsChevron')" 
                class="dropdown-btn w-full flex items-center justify-between px-3 py-2.5 hover:bg-white/60 hover:text-brand-dark rounded-xl text-xs font-semibold tracking-wide transition group text-slate-600 cursor-pointer">
          <div class="flex items-center space-x-3">
            <i class="fa-solid fa-gear text-sm text-slate-400 group-hover:text-brand-medium transition"></i>
            <span class="sidebar-text truncate">Settings</span>
          </div>
          <div class="dropdown-right">
            <i id="settingsChevron" class="fa-solid fa-chevron-down text-[10px] opacity-60 dropdown-chevron transition-transform duration-200"></i>
          </div>
        </button>
        <div id="settingsDropdown" class="hidden pl-8 pr-2 space-y-0.5 font-medium sidebar-text">
          <a href="system_config.php" class="flex items-center space-x-2 px-3 py-2 text-[11px] text-slate-500 hover:text-brand-dark rounded-md transition">
            <i class="fa-solid fa-sliders text-[10px] opacity-50"></i> <span>System Configuration</span>
          </a>
          <a href="module_settings.php" class="flex items-center space-x-2 px-3 py-2 text-[11px] text-slate-500 hover:text-brand-dark rounded-md transition">
            <i class="fa-solid fa-puzzle-piece text-[10px] opacity-50"></i> <span>Module Settings</span>
          </a>
          <a href="notification_settings.php" class="flex items-center space-x-2 px-3 py-2 text-[11px] text-slate-500 hover:text-brand-dark rounded-md transition">
            <i class="fa-solid fa-bell text-[10px] opacity-50"></i> <span>Notification Settings</span>
          </a>
          <a href="backup_recovery.php" class="flex items-center space-x-2 px-3 py-2 text-[11px] text-slate-500 hover:text-brand-dark rounded-md transition">
            <i class="fa-solid fa-database text-[10px] opacity-50"></i> <span>Backup & Recovery</span>
          </a>
        </div>
>>>>>>> ff2abb8505d5406f10cfe4e980ef57e95b4cb3d3
      </div>

    </nav>
    
    <!-- Logout -->
    <div class="p-4 border-t border-brand-border/40 shrink-0 bg-white/40">
      <a href="logout.php" class="flex items-center space-x-3 px-3 py-2.5 hover:bg-red-50 hover:text-red-600 text-slate-500 rounded-xl text-xs font-bold tracking-wide transition group cursor-pointer">
        <i class="fa-solid fa-arrow-right-from-bracket text-sm"></i>
        <span class="sidebar-text truncate">Logout</span>
      </a>
    </div>
  </div>
</aside>