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
          <a href="dashboard.php" class="flex items-center space-x-2 px-3 py-2 text-[11px] text-slate-500 hover:text-brand-dark rounded-md transition">
            <i class="fa-solid fa-chart-simple text-[10px] opacity-50"></i> 
            <span>Dashboard</span>
          </a>
          <a href="module_activity.php" class="flex items-center space-x-2 px-3 py-2 text-[11px] text-slate-500 hover:text-brand-dark rounded-md transition">
            <i class="fa-solid fa-chart-line text-[10px] opacity-50"></i> 
            <span>Module Activity Summary</span>
          </a>
          <a href="alerts.php" class="flex items-center space-x-2 px-3 py-2 text-[11px] text-slate-500 hover:text-brand-dark rounded-md transition">
            <i class="fa-solid fa-bell text-[10px] opacity-50"></i> 
            <span>Alerts & Notifications</span>
          </a>
          <a href="system_health.php" class="flex items-center space-x-2 px-3 py-2 text-[11px] text-slate-500 hover:text-brand-dark rounded-md transition">
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
          <a href="ai_insights.php" class="flex items-center space-x-2 px-3 py-2 text-[11px] text-slate-500 hover:text-brand-dark rounded-md transition">
            <i class="fa-solid fa-brain text-[10px] opacity-50"></i> 
            <span>AI Insights</span>
          </a>
          <a href="trend_analysis.php" class="flex items-center space-x-2 px-3 py-2 text-[11px] text-slate-500 hover:text-brand-dark rounded-md transition">
            <i class="fa-solid fa-arrow-trend-up text-[10px] opacity-50"></i> 
            <span>Trend Analysis</span>
          </a>
          <a href="predictive.php" class="flex items-center space-x-2 px-3 py-2 text-[11px] text-slate-500 hover:text-brand-dark rounded-md transition">
            <i class="fa-solid fa-robot text-[10px] opacity-50"></i> 
            <span>Predictive Analytics</span>
          </a>
          <a href="performance.php" class="flex items-center space-x-2 px-3 py-2 text-[11px] text-slate-500 hover:text-brand-dark rounded-md transition">
            <i class="fa-solid fa-gauge-high text-[10px] opacity-50"></i> 
            <span>Performance Metrics</span>
          </a>
        </div>
      </div>

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
          <a href="custom_report.php" class="flex items-center space-x-2 px-3 py-2 text-[11px] text-slate-500 hover:text-brand-dark rounded-md transition">
            <i class="fa-solid fa-sliders text-[10px] opacity-50"></i> 
            <span>Custom Report Generation</span>
          </a>
          <a href="scheduled_reports.php" class="flex items-center space-x-2 px-3 py-2 text-[11px] text-slate-500 hover:text-brand-dark rounded-md transition">
            <i class="fa-solid fa-clock text-[10px] opacity-50"></i> 
            <span>Scheduled Reports</span>
          </a>
          <a href="export.php" class="flex items-center space-x-2 px-3 py-2 text-[11px] text-slate-500 hover:text-brand-dark rounded-md transition">
            <i class="fa-solid fa-file-export text-[10px] opacity-50"></i> 
            <span>Export Options (PDF/Excel)</span>
          </a>
          <a href="report_templates.php" class="flex items-center space-x-2 px-3 py-2 text-[11px] text-slate-500 hover:text-brand-dark rounded-md transition">
            <i class="fa-solid fa-copy text-[10px] opacity-50"></i> 
            <span>Report Templates</span>
          </a>
        </div>
      </div>

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
          <a href="compliance_monitoring.php" class="flex items-center space-x-2 px-3 py-2 text-[11px] text-slate-500 hover:text-brand-dark rounded-md transition">
            <i class="fa-solid fa-check-circle text-[10px] opacity-50"></i> 
            <span>Compliance Monitoring</span>
          </a>
          <a href="violation_tracking.php" class="flex items-center space-x-2 px-3 py-2 text-[11px] text-slate-500 hover:text-brand-dark rounded-md transition">
            <i class="fa-solid fa-triangle-exclamation text-[10px] opacity-50"></i> 
            <span>Violation Tracking</span>
          </a>
          <a href="corrective_actions.php" class="flex items-center space-x-2 px-3 py-2 text-[11px] text-slate-500 hover:text-brand-dark rounded-md transition">
            <i class="fa-solid fa-hammer text-[10px] opacity-50"></i> 
            <span>Corrective Actions</span>
          </a>
          <a href="regulatory_compliance.php" class="flex items-center space-x-2 px-3 py-2 text-[11px] text-slate-500 hover:text-brand-dark rounded-md transition">
            <i class="fa-solid fa-scale-balanced text-[10px] opacity-50"></i> 
            <span>Regulatory Compliance</span>
          </a>
        </div>
      </div>

      <!-- ============================================================ -->
      <!-- SECTION 2: OPERATIONAL MODULES                               -->
      <!-- ============================================================ -->

      <span class="sidebar-text text-[9px] font-bold tracking-widest text-slate-400 uppercase block px-3 mt-6 mb-2">Operational Modules</span>

      <!-- MODULE 1: HEALTH CENTER SERVICES -->
      <div class="space-y-1">
        <button onclick="toggleDropdown('healthCenterDropdown', 'healthCenterChevron')" 
                class="dropdown-btn w-full flex items-center justify-between px-3 py-2.5 hover:bg-white/60 hover:text-brand-dark rounded-xl text-xs font-semibold tracking-wide transition group text-slate-600 cursor-pointer">
          <div class="flex items-center space-x-3">
            <i class="fa-solid fa-hospital text-sm text-slate-400 group-hover:text-brand-medium transition"></i>
            <span class="sidebar-text truncate">Health Center Services</span>
          </div>
          <div class="dropdown-right">
            <i id="healthCenterChevron" class="fa-solid fa-chevron-down text-[10px] opacity-60 dropdown-chevron transition-transform duration-200"></i>
          </div>
        </button>
        <div id="healthCenterDropdown" class="hidden pl-8 pr-2 space-y-0.5 font-medium sidebar-text">
          
          <!-- Patient Management -->
          <a href="patient_management.php" class="flex items-center space-x-2 px-3 py-2 text-[11px] text-slate-500 hover:text-brand-dark rounded-md transition">
            <i class="fa-solid fa-users text-[10px] opacity-50"></i> 
            <span>Patient Management</span>
          </a>

          <!-- Consultations -->
          <a href="consultations.php" class="flex items-center space-x-2 px-3 py-2 text-[11px] text-slate-500 hover:text-brand-dark rounded-md transition">
            <i class="fa-solid fa-stethoscope text-[10px] opacity-50"></i> 
            <span>Consultations</span>
          </a>

          <!-- Medical Records -->
          <a href="medical_records.php" class="flex items-center space-x-2 px-3 py-2 text-[11px] text-slate-500 hover:text-brand-dark rounded-md transition">
            <i class="fa-solid fa-folder text-[10px] opacity-50"></i> 
            <span>Medical Records</span>
          </a>

          <!-- Appointments   -->
          <a href="appointments.php" class="flex items-center space-x-2 px-3 py-2 text-[11px] text-slate-500 hover:text-brand-dark rounded-md transition">
            <i class="fa-solid fa-calendar-check text-[10px] opacity-50"></i> 
            <span>Appointments </span>
          </a>

          <!-- Triage   -->
          <a href="triage.php" class="flex items-center space-x-2 px-3 py-2 text-[11px] text-slate-500 hover:text-brand-dark rounded-md transition">
            <i class="fa-solid fa-heart-pulse text-[10px] opacity-50"></i> 
            <span>Triage  </span>
          </a>

          <!-- Prescriptions   -->
          <a href="prescriptions.php" class="flex items-center space-x-2 px-3 py-2 text-[11px] text-slate-500 hover:text-brand-dark rounded-md transition">
            <i class="fa-solid fa-prescription-bottle text-[10px] opacity-50"></i> 
            <span>Prescriptions  </span>
          </a>

          <!-- Referrals   -->
          <a href="referrals.php" class="flex items-center space-x-2 px-3 py-2 text-[11px] text-slate-500 hover:text-brand-dark rounded-md transition">
            <i class="fa-solid fa-arrow-right-arrow-left text-[10px] opacity-50"></i> 
            <span>Referrals  </span>
          </a>

        </div>
      </div>

      <!-- MODULE 2: SANITATION PERMITS -->
      <div class="space-y-1">
        <button onclick="toggleDropdown('sanitationDropdown', 'sanitationChevron')" 
                class="dropdown-btn w-full flex items-center justify-between px-3 py-2.5 hover:bg-white/60 hover:text-brand-dark rounded-xl text-xs font-semibold tracking-wide transition group text-slate-600 cursor-pointer">
          <div class="flex items-center space-x-3">
            <i class="fa-solid fa-clipboard-check text-sm text-slate-400 group-hover:text-brand-medium transition"></i>
            <span class="sidebar-text truncate">Sanitation Permits</span>
          </div>
          <div class="dropdown-right">
            <i id="sanitationChevron" class="fa-solid fa-chevron-down text-[10px] opacity-60 dropdown-chevron transition-transform duration-200"></i>
          </div>
        </button>
        <div id="sanitationDropdown" class="hidden pl-8 pr-2 space-y-0.5 font-medium sidebar-text">
          
          <a href="permit_applications.php" class="flex items-center space-x-2 px-3 py-2 text-[11px] text-slate-500 hover:text-brand-dark rounded-md transition">
            <i class="fa-solid fa-file-pen text-[10px] opacity-50"></i> 
            <span>Permit Applications</span>
          </a>
          
          <a href="inspections.php" class="flex items-center space-x-2 px-3 py-2 text-[11px] text-slate-500 hover:text-brand-dark rounded-md transition">
            <i class="fa-solid fa-search text-[10px] opacity-50"></i> 
            <span>Inspections</span>
          </a>
          
          <a href="permit_records.php" class="flex items-center space-x-2 px-3 py-2 text-[11px] text-slate-500 hover:text-brand-dark rounded-md transition">
            <i class="fa-solid fa-folder text-[10px] opacity-50"></i> 
            <span>Permit Records</span>
          </a>
          
          <a href="payments.php" class="flex items-center space-x-2 px-3 py-2 text-[11px] text-slate-500 hover:text-brand-dark rounded-md transition">
            <i class="fa-solid fa-money-bill-wave text-[10px] opacity-50"></i> 
            <span>Payments  </span>
          </a>
          
          <a href="documents.php" class="flex items-center space-x-2 px-3 py-2 text-[11px] text-slate-500 hover:text-brand-dark rounded-md transition">
            <i class="fa-solid fa-file text-[10px] opacity-50"></i> 
            <span>Documents  </span>
          </a>
          
          <a href="renewals.php" class="flex items-center space-x-2 px-3 py-2 text-[11px] text-slate-500 hover:text-brand-dark rounded-md transition">
            <i class="fa-solid fa-rotate text-[10px] opacity-50"></i> 
            <span>Renewals  </span>
          </a>

        </div>
      </div>

      <!-- MODULE 3: IMMUNIZATION & NUTRITION -->
      <div class="space-y-1">
        <button onclick="toggleDropdown('immunizationDropdown', 'immunizationChevron')" 
                class="dropdown-btn w-full flex items-center justify-between px-3 py-2.5 hover:bg-white/60 hover:text-brand-dark rounded-xl text-xs font-semibold tracking-wide transition group text-slate-600 cursor-pointer">
          <div class="flex items-center space-x-3">
            <i class="fa-solid fa-syringe text-sm text-slate-400 group-hover:text-brand-medium transition"></i>
            <span class="sidebar-text truncate">Immunization & Nutrition</span>
          </div>
          <div class="dropdown-right">
            <i id="immunizationChevron" class="fa-solid fa-chevron-down text-[10px] opacity-60 dropdown-chevron transition-transform duration-200"></i>
          </div>
        </button>
        <div id="immunizationDropdown" class="hidden pl-8 pr-2 space-y-0.5 font-medium sidebar-text">
          
          <a href="child_records.php" class="flex items-center space-x-2 px-3 py-2 text-[11px] text-slate-500 hover:text-brand-dark rounded-md transition">
            <i class="fa-solid fa-child text-[10px] opacity-50"></i> 
            <span>Child Records</span>
          </a>
          
          <a href="vaccination_tracking.php" class="flex items-center space-x-2 px-3 py-2 text-[11px] text-slate-500 hover:text-brand-dark rounded-md transition">
            <i class="fa-solid fa-vial text-[10px] opacity-50"></i> 
            <span>Vaccination Tracking</span>
          </a>
          
          <a href="growth_charts.php" class="flex items-center space-x-2 px-3 py-2 text-[11px] text-slate-500 hover:text-brand-dark rounded-md transition">
            <i class="fa-solid fa-chart-line text-[10px] opacity-50"></i> 
            <span>Growth Charts</span>
          </a>
          
          <a href="vaccine_inventory.php" class="flex items-center space-x-2 px-3 py-2 text-[11px] text-slate-500 hover:text-brand-dark rounded-md transition">
            <i class="fa-solid fa-boxes text-[10px] opacity-50"></i> 
            <span>Vaccine Inventory  </span>
          </a>
          
          <a href="nutrition_assessment.php" class="flex items-center space-x-2 px-3 py-2 text-[11px] text-slate-500 hover:text-brand-dark rounded-md transition">
            <i class="fa-solid fa-apple-alt text-[10px] opacity-50"></i> 
            <span>Nutrition Assessment  </span>
          </a>

        </div>
      </div>

      <!-- MODULE 4: WASTEWATER SERVICES -->
      <div class="space-y-1">
        <button onclick="toggleDropdown('wastewaterDropdown', 'wastewaterChevron')" 
                class="dropdown-btn w-full flex items-center justify-between px-3 py-2.5 hover:bg-white/60 hover:text-brand-dark rounded-xl text-xs font-semibold tracking-wide transition group text-slate-600 cursor-pointer">
          <div class="flex items-center space-x-3">
            <i class="fa-solid fa-droplet text-sm text-slate-400 group-hover:text-brand-medium transition"></i>
            <span class="sidebar-text truncate">Wastewater Services</span>
          </div>
          <div class="dropdown-right">
            <i id="wastewaterChevron" class="fa-solid fa-chevron-down text-[10px] opacity-60 dropdown-chevron transition-transform duration-200"></i>
          </div>
        </button>
        <div id="wastewaterDropdown" class="hidden pl-8 pr-2 space-y-0.5 font-medium sidebar-text">
          
          <a href="septic_tanks.php" class="flex items-center space-x-2 px-3 py-2 text-[11px] text-slate-500 hover:text-brand-dark rounded-md transition">
            <i class="fa-solid fa-water text-[10px] opacity-50"></i> 
            <span>Septic Tank Registry</span>
          </a>
          
          <a href="maintenance.php" class="flex items-center space-x-2 px-3 py-2 text-[11px] text-slate-500 hover:text-brand-dark rounded-md transition">
            <i class="fa-solid fa-wrench text-[10px] opacity-50"></i> 
            <span>Maintenance & Desludging</span>
          </a>
          
          <a href="service_requests.php" class="flex items-center space-x-2 px-3 py-2 text-[11px] text-slate-500 hover:text-brand-dark rounded-md transition">
            <i class="fa-solid fa-tools text-[10px] opacity-50"></i> 
            <span>Service Requests</span>
          </a>
          
          <a href="providers.php" class="flex items-center space-x-2 px-3 py-2 text-[11px] text-slate-500 hover:text-brand-dark rounded-md transition">
            <i class="fa-solid fa-user-cog text-[10px] opacity-50"></i> 
            <span>Service Providers  </span>
          </a>
          
          <a href="wastewater_billing.php" class="flex items-center space-x-2 px-3 py-2 text-[11px] text-slate-500 hover:text-brand-dark rounded-md transition">
            <i class="fa-solid fa-file-invoice text-[10px] opacity-50"></i> 
            <span>Billing  </span>
          </a>

        </div>
      </div>

      <!-- MODULE 5: HEALTH SURVEILLANCE -->
      <div class="space-y-1">
        <button onclick="toggleDropdown('surveillanceDropdown', 'surveillanceChevron')" 
                class="dropdown-btn w-full flex items-center justify-between px-3 py-2.5 hover:bg-white/60 hover:text-brand-dark rounded-xl text-xs font-semibold tracking-wide transition group text-slate-600 cursor-pointer">
          <div class="flex items-center space-x-3">
            <i class="fa-solid fa-binoculars text-sm text-slate-400 group-hover:text-brand-medium transition"></i>
            <span class="sidebar-text truncate">Health Surveillance</span>
          </div>
          <div class="dropdown-right">
            <i id="surveillanceChevron" class="fa-solid fa-chevron-down text-[10px] opacity-60 dropdown-chevron transition-transform duration-200"></i>
          </div>
        </button>
        <div id="surveillanceDropdown" class="hidden pl-8 pr-2 space-y-0.5 font-medium sidebar-text">
          
          <a href="case_reports.php" class="flex items-center space-x-2 px-3 py-2 text-[11px] text-slate-500 hover:text-brand-dark rounded-md transition">
            <i class="fa-solid fa-file-medical text-[10px] opacity-50"></i> 
            <span>Case Reports</span>
          </a>
          
          <a href="mapping.php" class="flex items-center space-x-2 px-3 py-2 text-[11px] text-slate-500 hover:text-brand-dark rounded-md transition">
            <i class="fa-solid fa-map text-[10px] opacity-50"></i> 
            <span>Mapping & Clustering</span>
          </a>
          
          <a href="outbreak_detection.php" class="flex items-center space-x-2 px-3 py-2 text-[11px] text-slate-500 hover:text-brand-dark rounded-md transition">
            <i class="fa-solid fa-triangle-exclamation text-[10px] opacity-50"></i> 
            <span>Outbreak Detection</span>
          </a>
          
          <a href="alerts.php" class="flex items-center space-x-2 px-3 py-2 text-[11px] text-slate-500 hover:text-brand-dark rounded-md transition">
            <i class="fa-solid fa-bell text-[10px] opacity-50"></i> 
            <span>Real-time Alerts  </span>
          </a>
          
          <a href="contact_tracing.php" class="flex items-center space-x-2 px-3 py-2 text-[11px] text-slate-500 hover:text-brand-dark rounded-md transition">
            <i class="fa-solid fa-people-arrows text-[10px] opacity-50"></i> 
            <span>Contact Tracing  </span>
          </a>
          
          <a href="response_management.php" class="flex items-center space-x-2 px-3 py-2 text-[11px] text-slate-500 hover:text-brand-dark rounded-md transition">
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
      </div>

      <!-- System Logs -->
      <div class="space-y-1">
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
      </div>

      <!-- Settings -->
      <div class="space-y-1">
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