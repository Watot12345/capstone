    <aside id="sidebar" class="bg-brand-light text-slate-600 w-72 min-h-[calc(100vh-5rem)] flex flex-col justify-between transition-all duration-300 border-r border-brand-border/60 sticky top-20 h-[calc(100vh-5rem)] z-30 shrink-0 shadow-sm">
      
      <div class="flex flex-col h-full overflow-hidden">
        <nav class="flex-1 px-3 py-4 space-y-1 overflow-y-auto custom-scrollbar">
          
          <div class="px-1 pb-3 mb-2 border-b border-brand-border/30">
            <button onclick="toggleSidebar()" class="w-full text-brand-dark/60 hover:text-brand-dark py-2 bg-white/60 hover:bg-white rounded-xl border border-brand-border/30 flex items-center justify-center focus:outline-none transition cursor-pointer" title="Collapse Menu Panel">
              <i id="toggleArrow" class="fa-solid fa-chevron-left text-xs"></i>
            </button>
          </div>
           <span class="sidebar-text text-[9px] font-bold tracking-widest text-slate-400 uppercase block px-3 mb-2">Modules</span>

          <span class="sidebar-text text-[9px] font-bold tracking-widest text-slate-400 uppercase block px-3 mb-2">Main Controls</span>
          
          <a href="dashboard.php" class="flex items-center space-x-3 px-3 py-2.5 bg-white text-brand-dark border border-brand-border rounded-xl text-xs font-bold tracking-wide transition shadow-xs relative">
            <i class="fa-solid fa-table-columns text-sm text-brand-medium"></i>
            <span class="sidebar-text truncate">System Overview</span>
          </a>

          <div class="space-y-1">
           <button onclick="toggleDropdown('userDropdown', 'userChevron')" class="dropdown-btn w-full flex items-center justify-between px-3 py-2.5 hover:bg-white/60 hover:text-brand-dark rounded-xl text-xs font-semibold tracking-wide transition group text-slate-600 cursor-pointer">
             <div class="flex items-center space-x-3">
                <i class="fa-solid fa-users-gear text-sm text-slate-400 group-hover:text-brand-medium transition"></i>
                <span class="sidebar-text truncate">User Management</span>
             </div>
             <div class="dropdown-right">
                <i id="userChevron"
                   class="fa-solid fa-chevron-down text-[10px] opacity-60 dropdown-chevron transition-transform duration-200"></i>
             </div>
            </button>
            <div id="userDropdown" class="hidden pl-8 pr-2 space-y-0.5 font-medium sidebar-text">
              <a href="create_staff.php" class="flex items-center space-x-2 px-3 py-2 text-[11px] text-slate-500 hover:text-brand-dark rounded-md transition"><i class="fa-solid fa-user-plus text-[10px] opacity-50"></i> <span>Create Staff Accounts</span></a>
              <a href="manage_users.php" class="flex items-center space-x-2 px-3 py-2 text-[11px] text-slate-500 hover:text-brand-dark rounded-md transition"><i class="fa-solid fa-user-pen text-[10px] opacity-50"></i> <span>Manage Users</span></a>
              <a href="account_status.php" class="flex items-center space-x-2 px-3 py-2 text-[11px] text-slate-500 hover:text-brand-dark rounded-md transition"><i class="fa-solid fa-user-check text-[10px] opacity-50"></i> <span>Activate/Deactivate</span></a>
            </div>
          </div>

          <div class="space-y-1">
            <button
                onclick="toggleDropdown('roleDropdown', 'roleChevron')"
                class="dropdown-btn w-full flex items-center justify-between px-3 py-2.5 hover:bg-white/60 hover:text-brand-dark rounded-xl text-xs font-semibold tracking-wide transition group text-slate-600 cursor-pointer">
                <div class="flex items-center space-x-3">
                    <i class="fa-solid fa-user-shield text-sm text-slate-400 group-hover:text-brand-medium transition"></i>
                    <span class="sidebar-text truncate">System Logs</span>
                </div>
                <div class="dropdown-right">
                    <i id="roleChevron"
                      class="fa-solid fa-chevron-down text-[10px] opacity-60 dropdown-chevron transition-transform duration-200"></i>
                </div>
          </button>
            <div id="roleDropdown" class="hidden pl-8 pr-2 space-y-0.5 font-medium sidebar-text">
              <a href="rbac_roles.php" class="flex items-center space-x-2 px-3 py-2 text-[11px] text-slate-500 hover:text-brand-dark rounded-md transition"><i class="fa-solid fa-shield text-[10px] opacity-50"></i> <span>Roles</span></a>
              <a href="rbac_permissions.php" class="flex items-center space-x-2 px-3 py-2 text-[11px] text-slate-500 hover:text-brand-dark rounded-md transition"><i class="fa-solid fa-key text-[10px] opacity-50"></i> <span>Module Permissions</span></a>
              <a href="rbac_control.php" class="flex items-center space-x-2 px-3 py-2 text-[11px] text-slate-500 hover:text-brand-dark rounded-md transition"><i class="fa-solid fa-sliders text-[10px] opacity-50"></i> <span>Access Control (RBAC)</span></a>
            </div>
          </div>

          <div class="space-y-1">
            <button onclick="toggleDropdown('deptDropdown', 'deptChevron')"
              class="dropdown-btn w-full flex items-center justify-between px-3 py-2.5 hover:bg-white/60 hover:text-brand-dark rounded-xl text-xs font-semibold tracking-wide transition group text-slate-600 cursor-pointer">
                <div class="flex items-center space-x-3">
                    <i class="fa-solid fa-sitemap text-sm text-slate-400 group-hover:text-brand-medium transition"></i>
                    <span class="sidebar-text truncate">Analytics</span>
              </div>
                <div class="dropdown-right">
                    <i id="deptChevron"
                       class="fa-solid fa-chevron-down text-[10px] opacity-60 dropdown-chevron transition-transform duration-200"></i>
                </div>
            </button>

            <div id="deptDropdown" class="hidden pl-8 pr-2 space-y-0.5 font-medium sidebar-text">
              <a href="depts.php" class="flex items-center space-x-2 px-3 py-2 text-[11px] text-slate-500 hover:text-brand-dark rounded-md transition"><i class="fa-solid fa-building text-[10px] opacity-50"></i> <span>Departments</span></a>
              <a href="offices.php" class="flex items-center space-x-2 px-3 py-2 text-[11px] text-slate-500 hover:text-brand-dark rounded-md transition"><i class="fa-solid fa-door-open text-[10px] opacity-50"></i> <span>Offices</span></a>
              <a href="assign_staff.php" class="flex items-center space-x-2 px-3 py-2 text-[11px] text-slate-500 hover:text-brand-dark rounded-md transition"><i class="fa-solid fa-user-tag text-[10px] opacity-50"></i> <span>Assign Staff</span></a>
            </div>
          </div>

          <div class="space-y-1">
               <button
                  onclick="toggleDropdown('citizenDropdown', 'citizenChevron')"
                  class="dropdown-btn w-full flex items-center justify-between px-3 py-2.5 hover:bg-white/60 hover:text-brand-dark rounded-xl text-xs font-semibold tracking-wide transition group text-slate-600 cursor-pointer">
                  <div class="flex items-center space-x-3">
                      <i class="fa-solid fa-address-book text-sm text-slate-400 group-hover:text-brand-medium transition"></i>
                      <span class="sidebar-text truncate">Reports</span>
                  </div>
                  <div class="dropdown-right">
                      <i id="citizenChevron"
                        class="fa-solid fa-chevron-down text-[10px] opacity-60 dropdown-chevron transition-transform duration-200"></i>
                  </div>
              </button>

            <div id="citizenDropdown" class="hidden pl-8 pr-2 space-y-0.5 font-medium sidebar-text">
              <a href="citizen_records.php" class="flex items-center space-x-2 px-3 py-2 text-[11px] text-slate-500 hover:text-brand-dark rounded-md transition"><i class="fa-solid fa-id-card text-[10px] opacity-50"></i> <span>View Citizen Records</span></a>
              <a href="citizen_master.php" class="flex items-center space-x-2 px-3 py-2 text-[11px] text-slate-500 hover:text-brand-dark rounded-md transition"><i class="fa-solid fa-database text-[10px] opacity-50"></i> <span>Manage Master Data</span></a>
            </div>
          </div>

          <div class="space-y-1">
           <button
                  onclick="toggleDropdown('auditDropdown', 'auditChevron')"
                  class="dropdown-btn w-full flex items-center justify-between px-3 py-2.5 hover:bg-white/60 hover:text-brand-dark rounded-xl text-xs font-semibold tracking-wide transition group text-slate-600 cursor-pointer">

                  <div class="flex items-center space-x-3">
                      <i class="fa-solid fa-clock-rotate-left text-sm text-slate-400 group-hover:text-brand-medium transition"></i>
                      <span class="sidebar-text truncate">Compliance & Violations</span>
              </div>

              <div class="dropdown-right">
                  <i id="auditChevron"
                    class="fa-solid fa-chevron-down text-[10px] opacity-60 dropdown-chevron transition-transform duration-200"></i>
              </div>
            </button>

            <div id="auditDropdown" class="hidden pl-8 pr-2 space-y-0.5 font-medium sidebar-text">
              <a href="log_activities.php" class="flex items-center space-x-2 px-3 py-2 text-[11px] text-slate-500 hover:text-brand-dark rounded-md transition"><i class="fa-solid fa-chart-line text-[10px] opacity-50"></i> <span>User Activities</span></a>
              <a href="log_history.php" class="flex items-center space-x-2 px-3 py-2 text-[11px] text-slate-500 hover:text-brand-dark rounded-md transition"><i class="fa-solid fa-history text-[10px] opacity-50"></i> <span>Login History</span></a>
              <a href="log_changes.php" class="flex items-center space-x-2 px-3 py-2 text-[11px] text-slate-500 hover:text-brand-dark rounded-md transition"><i class="fa-solid fa-pen-to-square text-[10px] opacity-50"></i> <span>Data Changes</span></a>
            </div>
          </div>

           <div class="space-y-1">
               <button
                  onclick="toggleDropdown('citizenDropdown', 'citizenChevron')"
                  class="dropdown-btn w-full flex items-center justify-between px-3 py-2.5 hover:bg-white/60 hover:text-brand-dark rounded-xl text-xs font-semibold tracking-wide transition group text-slate-600 cursor-pointer">
                  <div class="flex items-center space-x-3">
                      <i class="fa-solid fa-address-book text-sm text-slate-400 group-hover:text-brand-medium transition"></i>
                      <span class="sidebar-text truncate">Settings</span>
                  </div>
                  <div class="dropdown-right">
                      <i id="citizenChevron"
                        class="fa-solid fa-chevron-down text-[10px] opacity-60 dropdown-chevron transition-transform duration-200"></i>
                  </div>
              </button>

            <div id="citizenDropdown" class="hidden pl-8 pr-2 space-y-0.5 font-medium sidebar-text">
              <a href="citizen_records.php" class="flex items-center space-x-2 px-3 py-2 text-[11px] text-slate-500 hover:text-brand-dark rounded-md transition"><i class="fa-solid fa-id-card text-[10px] opacity-50"></i> <span>View Citizen Records</span></a>
              <a href="citizen_master.php" class="flex items-center space-x-2 px-3 py-2 text-[11px] text-slate-500 hover:text-brand-dark rounded-md transition"><i class="fa-solid fa-database text-[10px] opacity-50"></i> <span>Manage Master Data</span></a>
            </div>
          </div>
        </nav>
        
        <div class="p-4 border-t border-brand-border/40 shrink-0 bg-white/40">
          <a href="logout.php" class="flex items-center space-x-3 px-3 py-2.5 hover:bg-red-50 hover:text-red-600 text-slate-500 rounded-xl text-xs font-bold tracking-wide transition group cursor-pointer">
            <i class="fa-solid fa-arrow-right-from-bracket text-sm"></i>
            <span class="sidebar-text truncate">Logout</span>
          </a>
        </div>
      </div>
    </aside>
