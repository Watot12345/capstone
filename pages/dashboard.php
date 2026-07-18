<?php include '../includes/header.php'; ?>

<?php include '../includes/sidebar.php'; ?>

<main class="flex-1 bg-dash-bg h-screen flex flex-col overflow-hidden">
    <script src="https://cdn.tailwindcss.com">
    </script>
    <!-- ApexCharts CDN -->
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/dist/tabler-icons.min.css" />
    <link rel="stylesheet" href="../assets/css/dashb-style.css">

    <link rel="stylesheet" href="../assets/css/dashb-style.css">

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'dash-bg': '#EEF5FF',
                        'c1': '#B4D4FF',
                        'c2': '#86B6F6',
                        'c3': '#176B87',
                        'c3d': '#0d4f64',
                    },
                    keyframes: {
                        pulse2: { '0%,100%': { opacity: '1', transform: 'scale(1)' }, '50%': { opacity: '0.45',
                                transform: 'scale(0.72)' } },
                        fadeOverlay: { from: { opacity: '0' }, to: { opacity: '1' } },
                        slideUp: { from: { opacity: '0', transform: 'translateY(36px) scale(0.95)' }, to: { opacity: '1',
                                transform: 'translateY(0) scale(1)' } },
                        popIn: { from: { transform: 'scale(0)', opacity: '0' }, to: { transform: 'scale(1)',
                                opacity: '1' } },
                    },
                    animation: {
                        pulse2: 'pulse2 1.6s infinite',
                        fadeOverlay: 'fadeOverlay 0.18s ease',
                        slideUp: 'slideUp 0.24s cubic-bezier(0.34,1.56,0.64,1)',
                        popIn: 'popIn 0.32s cubic-bezier(0.34,1.56,0.64,1)',
                    },
                }
            }
        }
    </script>

    <!-- Page container with fade‑in on load -->
    <div class="flex-1 px-6 pt-[26px] pb-4 mb-25 flex flex-col min-h-0 overflow-hidden animate-fadeOverlay">

        <div class="w-full flex-1 flex flex-col gap-4 min-h-0 transition-all duration-300">

            <!-- STAT CARDS – all with smooth transitions -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-3 flex-shrink-0">

                <!-- 1 │ Total Users -->
                <div class="stat-card relative bg-white rounded-2xl p-4 border border-c1/30 overflow-hidden cursor-default transition-all duration-200 hover:-translate-y-0.5 hover:shadow-md hover:border-c2">
                    <i class="ti ti-users absolute top-3.5 right-4 text-lg text-c2 opacity-85" aria-hidden="true"></i>
                    <div class="text-[10px] uppercase tracking-[0.7px] text-[#4a6080] font-medium mb-1">Total Users</div>
                    <div class="text-2xl font-semibold leading-none">1,284</div>
                    <div class="text-[11px] text-[#4a6080] mt-1">↑ 12 since last week</div>
                </div>

                <!-- 2 │ Active Staff -->
                <div class="stat-card ok relative bg-white rounded-2xl p-4 border border-c1/30 overflow-hidden cursor-default transition-all duration-200 hover:-translate-y-0.5 hover:shadow-md hover:border-c2">
                    <i class="ti ti-user-check absolute top-3.5 right-4 text-lg text-c2 opacity-85" aria-hidden="true"></i>
                    <div class="text-[10px] uppercase tracking-[0.7px] text-[#4a6080] font-medium mb-1">Active Staff</div>
                    <div class="text-2xl font-semibold leading-none flex items-center gap-1.5">
                        <span class="inline-block w-2 h-2 rounded-full bg-green-400 animate-pulse2 flex-shrink-0"></span>
                        <span id="su-staff">44</span>
                    </div>
                    <div class="text-[11px] text-[#4a6080] mt-1">Online now</div>
                </div>

                <!-- 3 │ Pending Requests -->
                <div class="stat-card warn relative bg-white rounded-2xl p-4 border border-c1/30 overflow-hidden cursor-default transition-all duration-200 hover:-translate-y-0.5 hover:shadow-md hover:border-c2">
                    <i class="ti ti-clock-hour-4 absolute top-3.5 right-4 text-lg text-c2 opacity-85" aria-hidden="true"></i>
                    <div class="text-[10px] uppercase tracking-[0.7px] text-[#4a6080] font-medium mb-1">Pending Requests</div>
                    <div class="text-2xl font-semibold leading-none">23</div>
                    <div class="text-[11px] text-[#4a6080] mt-1">8 high priority</div>
                </div>

                <!-- 4 │ System Alerts -->
                <div class="stat-card alert relative bg-white rounded-2xl p-4 border border-c1/30 overflow-hidden cursor-default transition-all duration-200 hover:-translate-y-0.5 hover:shadow-md hover:border-c2">
                    <i class="ti ti-alert-triangle absolute top-3.5 right-4 text-lg text-c2 opacity-85" aria-hidden="true"></i>
                    <div class="text-[10px] uppercase tracking-[0.7px] text-[#4a6080] font-medium mb-1">System Alerts</div>
                    <div class="text-2xl font-semibold leading-none">4</div>
                    <div class="text-[11px] text-[#4a6080] mt-1">2 critical</div>
                </div>

                <!-- 5 │ Active Sessions -->
                <div class="stat-card relative bg-white rounded-2xl p-4 border border-c1/30 overflow-hidden cursor-default transition-all duration-200 hover:-translate-y-0.5 hover:shadow-md hover:border-c2">
                    <i class="ti ti-device-desktop absolute top-3.5 right-4 text-lg text-c2 opacity-85" aria-hidden="true"></i>
                    <div class="text-[10px] uppercase tracking-[0.7px] text-[#4a6080] font-medium mb-1">Active Sessions</div>
                    <div class="text-2xl font-semibold leading-none flex items-center gap-1.5">
                        <span class="inline-block w-2 h-2 rounded-full bg-green-400 animate-pulse2 flex-shrink-0"></span>
                        <span id="su-sessions">61</span>
                    </div>
                    <div class="text-[11px] text-[#4a6080] mt-1">Across all devices</div>
                </div>

                <!-- 6 │ Pending Approvals -->
                <div class="stat-card warn relative bg-white rounded-2xl p-4 border border-c1/30 overflow-hidden cursor-default transition-all duration-200 hover:-translate-y-0.5 hover:shadow-md hover:border-c2">
                    <i class="ti ti-clipboard-check absolute top-3.5 right-4 text-lg text-c2 opacity-85" aria-hidden="true"></i>
                    <div class="text-[10px] uppercase tracking-[0.7px] text-[#4a6080] font-medium mb-1">Pending Approvals</div>
                    <div class="text-2xl font-semibold leading-none">18</div>
                    <div class="text-[11px] text-[#4a6080] mt-1">Awaiting review</div>
                </div>

                <!-- 7 │ SYSTEM UPTIME -->
                <div class="stat-card relative bg-white rounded-2xl p-4 border border-c1/30 overflow-hidden cursor-default transition-all duration-200 hover:-translate-y-0.5 hover:shadow-md hover:border-c2">
                    <i class="ti ti-server absolute top-3.5 right-4 text-lg text-c2 opacity-85" aria-hidden="true"></i>
                    <div class="text-[10px] uppercase tracking-[0.7px] text-[#4a6080] font-medium mb-1">System Uptime</div>
                    <div class="text-2xl font-semibold leading-none flex items-center gap-1.5 font-mono tracking-tight">
                        <span id="uptime-display">--d --h --m</span>
                    </div>
                    <div class="text-[11px] text-[#4a6080] mt-1 flex items-center gap-1.5">
                        <span class="inline-block w-1.5 h-1.5 rounded-full bg-emerald-400 animate-pulse2 flex-shrink-0"></span>
                        <span id="uptime-sub">Since last restart</span>
                    </div>
                </div>

                <!-- 8 │ Total Inspections -->
                <div class="stat-card relative bg-white rounded-2xl p-4 border border-c1/30 overflow-hidden cursor-default transition-all duration-200 hover:-translate-y-0.5 hover:shadow-md hover:border-c2">
                    <i class="ti ti-file-check absolute top-3.5 right-4 text-lg text-c2 opacity-85" aria-hidden="true"></i>
                    <div class="text-[10px] uppercase tracking-[0.7px] text-[#4a6080] font-medium mb-1">Total Inspections</div>
                    <div class="text-2xl font-semibold leading-none">2,847</div>
                    <div class="text-[11px] text-[#4a6080] mt-1">↑ 143 this month</div>
                </div>

            </div>

            <!-- Quick Actions -->
            <div class="flex-shrink-0">
                <div class="flex items-center gap-1.5 text-xs font-semibold text-c3 mb-2">
                    <i class="ti ti-bolt" aria-hidden="true"></i> Quick Actions
                </div>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
                    <button onclick="openModal('addUser')" class="bg-c3 hover:bg-c3d text-white rounded-xl py-2.5 px-3 text-[12px] font-semibold flex items-center justify-center gap-2 transition-all duration-150 hover:scale-[1.02] active:scale-[0.98] shadow-sm">
                        <i class="ti ti-user-plus text-base" aria-hidden="true"></i> Add User
                    </button>
                    <button onclick="openModal('newInspection')" class="bg-c3 hover:bg-c3d text-white rounded-xl py-2.5 px-3 text-[12px] font-semibold flex items-center justify-center gap-2 transition-all duration-150 hover:scale-[1.02] active:scale-[0.98] shadow-sm">
                        <i class="ti ti-clipboard-list text-base" aria-hidden="true"></i> New Inspection
                    </button>
                    <button onclick="openModal('addPatient')" class="bg-c3 hover:bg-c3d text-white rounded-xl py-2.5 px-3 text-[12px] font-semibold flex items-center justify-center gap-2 transition-all duration-150 hover:scale-[1.02] active:scale-[0.98] shadow-sm">
                        <i class="ti ti-stethoscope text-base" aria-hidden="true"></i> Add Patient
                    </button>
                    <button onclick="openModal('reportCase')" class="bg-c3 hover:bg-c3d text-white rounded-xl py-2.5 px-3 text-[12px] font-semibold flex items-center justify-center gap-2 transition-all duration-150 hover:scale-[1.02] active:scale-[0.98] shadow-sm">
                        <i class="ti ti-file-report text-base" aria-hidden="true"></i> Report Case
                    </button>
                </div>
            </div>

            <!-- Bottom row: ApexChart + activity -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 flex-1 min-h-0">
                <!-- Case Overview with ApexCharts -->
                <div class="bg-white rounded-2xl p-4 border border-c1/25 shadow-sm flex flex-col h-full min-h-0 overflow-hidden">
                    <div class="flex items-center justify-between mb-3 flex-shrink-0">
                        <div class="flex items-center gap-1.5 text-xs font-semibold text-c3">
                            <i class="ti ti-chart-bar" aria-hidden="true"></i> Case Overview
                        </div>
                        <div class="flex items-center gap-2">
                            <select id="year-filter" class="border border-c1 rounded-lg px-2 py-1 text-[10.5px] font-semibold text-[#1a2e44] bg-[#f5faff] outline-none focus:border-c3 focus:bg-white transition-all duration-150 cursor-pointer shadow-sm">
                                <option value="2026">2026</option>
                                <option value="2025">2025</option>
                                <option value="2024">2024</option>
                            </select>
                            <button onclick="downloadChart()" class="bg-c3 hover:bg-c3d text-white rounded-lg px-3 py-1 text-[10.5px] font-semibold flex items-center gap-1.5 transition-all duration-150 active:scale-95 shadow-sm">
                                <i class="ti ti-download text-[12px]" aria-hidden="true"></i> Download
                            </button>
                        </div>
                    </div>
                    <!-- ApexCharts container -->
                    <div id="chart-container" class="flex-1 min-h-0 w-full"></div>
                </div>

                <!-- Recent Activity (unchanged) -->
                <div class="bg-white rounded-2xl p-4 border border-c1/25 shadow-sm flex flex-col h-full min-h-0 overflow-hidden">
                    <div class="flex items-center justify-between mb-2 flex-shrink-0">
                        <div class="flex items-center gap-1.5 text-xs font-semibold text-c3">
                            <i class="ti ti-activity" aria-hidden="true"></i> Recent Activity
                        </div>
                        <span class="text-[10px] text-c2 font-semibold cursor-pointer hover:underline">View All</span>
                    </div>
                    <div class="space-y-2 overflow-y-auto flex-1 custom-scroll pr-1">
                        <div class="flex gap-2.5 text-[11px] pb-2 border-b border-c1/15">
                            <div class="w-1.5 h-1.5 rounded-full bg-green-400 mt-1 flex-shrink-0"></div>
                            <div>
                                <p class="font-semibold text-[#1a2e44]">New Patient Registered</p>
                                <p class="text-[#4a6080] text-[10px]">Maria Santos by Nurse Alcantara · 5m ago</p>
                            </div>
                        </div>
                        <div class="flex gap-2.5 text-[11px] pb-2 border-b border-c1/15">
                            <div class="w-1.5 h-1.5 rounded-full bg-orange-400 mt-1 flex-shrink-0"></div>
                            <div>
                                <p class="font-semibold text-[#1a2e44]">Inspection Scheduled</p>
                                <p class="text-[#4a6080] text-[10px]">Engr. Villanueva assigned to Permit PRM-2026 · 1h ago</p>
                            </div>
                        </div>
                        <div class="flex gap-2.5 text-[11px]">
                            <div class="w-1.5 h-1.5 rounded-full bg-red-400 mt-1 flex-shrink-0"></div>
                            <div>
                                <p class="font-semibold text-[#1a2e44]">High Priority Alert</p>
                                <p class="text-[#4a6080] text-[10px]">Dengue outbreak flagged in Brgy. Payatas · 3h ago</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- ===== MODALS (unchanged) ===== -->

    <!-- Add User -->
    <div id="modal-addUser" class="overlay fixed inset-0 bg-[rgba(10,30,50,0.48)] z-50 items-center justify-center animate-fadeOverlay" role="dialog" aria-modal="true" aria-labelledby="au-title">
        <div class="popup bg-white rounded-[18px] p-6 w-[400px] max-h-[90vh] overflow-y-auto animate-slideUp">
            <div class="flex items-center justify-between mb-4">
                <h2 id="au-title" class="text-sm font-semibold text-c3 flex items-center gap-2">
                    <i class="ti ti-user-plus text-lg" aria-hidden="true"></i> Add new user
                </h2>
                <button onclick="closeModal('addUser')" class="text-[#4a6080] hover:text-[#1a2e44] text-lg leading-none transition-colors" aria-label="Close"><i class="ti ti-x" aria-hidden="true"></i></button>
            </div>
            <div id="au-form">
                <div class="mb-3.5">
                    <label class="block text-[10px] uppercase tracking-[0.55px] text-[#4a6080] font-medium mb-1">Full name</label>
                    <input type="text" placeholder="e.g. Juan Dela Cruz" class="w-full border-[1.5px] border-c1 rounded-lg px-3 py-2 text-xs text-[#1a2e44] bg-[#f5faff] outline-none focus:border-c3 focus:bg-white transition-all duration-150" />
                </div>
                <div class="mb-3.5">
                    <label class="block text-[10px] uppercase tracking-[0.55px] text-[#4a6080] font-medium mb-1">Email address</label>
                    <input type="email" placeholder="juan@healthcenter.gov.ph" class="w-full border-[1.5px] border-c1 rounded-lg px-3 py-2 text-xs text-[#1a2e44] bg-[#f5faff] outline-none focus:border-c3 focus:bg-white transition-all duration-150" />
                </div>
                <div class="mb-3.5">
                    <label class="block text-[10px] uppercase tracking-[0.55px] text-[#4a6080] font-medium mb-1">Role</label>
                    <select class="w-full border-[1.5px] border-c1 rounded-lg px-3 py-2 text-xs text-[#1a2e44] bg-[#f5faff] outline-none focus:border-c3 focus:bg-white transition-all duration-150">
                        <option value="">— Select a role —</option>
                        <option>Health Center Director</option><option>Doctor</option><option>Nurse</option><option>Dentist</option><option>Lab Technician</option><option>Pharmacist</option><option>Medical Records Clerk</option><option>Appointment Clerk</option><option>Sanitation Officer</option><option>Sanitation Inspector</option><option>Permits Clerk</option><option>Cashier</option><option>Immunization Coordinator</option><option>Midwife/Nurse</option><option>Nutritionist</option><option>Nutrition Educator</option><option>Vaccine Manager</option><option>Wastewater Officer</option><option>Field Technician</option><option>Service Clerk</option><option>Billing Clerk</option><option>Surveillance Officer</option><option>Surveillance Coordinator</option><option>Contact Tracer</option><option>Field Investigator</option><option>System Admin</option>
                    </select>
                </div>
                <div class="flex gap-2 mt-4">
                    <button onclick="closeModal('addUser')" class="px-4 py-2 border-[1.5px] border-c1 rounded-lg text-xs text-[#4a6080] hover:bg-c1 hover:text-[#1a2e44] transition-colors">Cancel</button>
                    <button onclick="submitForm('addUser')" class="flex-1 bg-c3 hover:bg-c3d text-white rounded-lg py-2 text-xs font-semibold flex items-center justify-center gap-1.5 transition-colors active:scale-[0.97]">
                        <i class="ti ti-check" aria-hidden="true"></i> Add user
                    </button>
                </div>
            </div>
            <div id="au-success" class="success-anim flex-col items-center gap-2 py-6">
                <i class="ti ti-circle-check text-[48px] text-green-400 animate-popIn" aria-hidden="true"></i>
                <p class="text-xs text-[#4a6080] font-medium">User added successfully!</p>
            </div>
        </div>
    </div>

    <!-- New Inspection -->
    <div id="modal-newInspection" class="overlay fixed inset-0 bg-[rgba(10,30,50,0.48)] z-50 items-center justify-center animate-fadeOverlay" role="dialog" aria-modal="true" aria-labelledby="ni-title">
        <div class="popup bg-white rounded-[18px] p-6 w-[400px] max-h-[90vh] overflow-y-auto animate-slideUp">
            <div class="flex items-center justify-between mb-4">
                <h2 id="ni-title" class="text-sm font-semibold text-c3 flex items-center gap-2">
                    <i class="ti ti-clipboard-list text-lg" aria-hidden="true"></i> New inspection
                </h2>
                <button onclick="closeModal('newInspection')" class="text-[#4a6080] hover:text-[#1a2e44] text-lg leading-none transition-colors" aria-label="Close"><i class="ti ti-x" aria-hidden="true"></i></button>
            </div>
            <div id="ni-form">
                <div class="mb-3.5">
                    <label class="block text-[10px] uppercase tracking-[0.55px] text-[#4a6080] font-medium mb-1">Permit ID</label>
                    <input type="text" placeholder="e.g. PRM-2026-00142" class="w-full border-[1.5px] border-c1 rounded-lg px-3 py-2 text-xs text-[#1a2e44] bg-[#f5faff] outline-none focus:border-c3 focus:bg-white transition-all duration-150" />
                </div>
                <div class="mb-3.5">
                    <label class="block text-[10px] uppercase tracking-[0.55px] text-[#4a6080] font-medium mb-1">Inspector</label>
                    <select class="w-full border-[1.5px] border-c1 rounded-lg px-3 py-2 text-xs text-[#1a2e44] bg-[#f5faff] outline-none focus:border-c3 focus:bg-white transition-all duration-150">
                        <option value="">— Assign inspector —</option>
                        <option>Engr. Ramon Villanueva</option><option>Ms. Carla Bautista</option><option>Mr. Edgar Tiongco</option><option>Ms. Rowena Pascual</option><option>Mr. Gilbert Ramos</option><option>Ms. Liza Mendoza</option><option>Engr. Jonas dela Cruz</option><option>Ms. Danica Soriano</option>
                    </select>
                </div>
                <div class="grid grid-cols-2 gap-3 mb-3.5">
                    <div>
                        <label class="block text-[10px] uppercase tracking-[0.55px] text-[#4a6080] font-medium mb-1">Date</label>
                        <input type="date" class="w-full border-[1.5px] border-c1 rounded-lg px-3 py-2 text-xs text-[#1a2e44] bg-[#f5faff] outline-none focus:border-c3 focus:bg-white transition-all duration-150" />
                    </div>
                    <div>
                        <label class="block text-[10px] uppercase tracking-[0.55px] text-[#4a6080] font-medium mb-1">Time</label>
                        <input type="time" class="w-full border-[1.5px] border-c1 rounded-lg px-3 py-2 text-xs text-[#1a2e44] bg-[#f5faff] outline-none focus:border-c3 focus:bg-white transition-all duration-150" />
                    </div>
                </div>
                <div class="flex gap-2 mt-4">
                    <button onclick="closeModal('newInspection')" class="px-4 py-2 border-[1.5px] border-c1 rounded-lg text-xs text-[#4a6080] hover:bg-c1 hover:text-[#1a2e44] transition-colors">Cancel</button>
                    <button onclick="submitForm('newInspection')" class="flex-1 bg-c3 hover:bg-c3d text-white rounded-lg py-2 text-xs font-semibold flex items-center justify-center gap-1.5 transition-colors active:scale-[0.97]">
                        <i class="ti ti-calendar-check" aria-hidden="true"></i> Schedule
                    </button>
                </div>
            </div>
            <div id="ni-success" class="success-anim flex-col items-center gap-2 py-6">
                <i class="ti ti-circle-check text-[48px] text-green-400 animate-popIn" aria-hidden="true"></i>
                <p class="text-xs text-[#4a6080] font-medium">Inspection scheduled!</p>
            </div>
        </div>
    </div>

    <!-- Add Patient -->
    <div id="modal-addPatient" class="overlay fixed inset-0 bg-[rgba(10,30,50,0.48)] z-50 items-center justify-center animate-fadeOverlay" role="dialog" aria-modal="true" aria-labelledby="ap-title">
        <div class="popup bg-white rounded-[18px] p-6 w-[400px] max-h-[90vh] overflow-y-auto animate-slideUp">
            <div class="flex items-center justify-between mb-4">
                <h2 id="ap-title" class="text-sm font-semibold text-c3 flex items-center gap-2">
                    <i class="ti ti-stethoscope text-lg" aria-hidden="true"></i> Add new patient
                </h2>
                <button onclick="closeModal('addPatient')" class="text-[#4a6080] hover:text-[#1a2e44] text-lg leading-none transition-colors" aria-label="Close"><i class="ti ti-x" aria-hidden="true"></i></button>
            </div>
            <div id="ap-form">
                <div class="grid grid-cols-2 gap-3 mb-3">
                    <div>
                        <label class="block text-[10px] uppercase tracking-[0.55px] text-[#4a6080] font-medium mb-1">First name</label>
                        <input type="text" placeholder="Maria" class="w-full border-[1.5px] border-c1 rounded-lg px-3 py-2 text-xs text-[#1a2e44] bg-[#f5faff] outline-none focus:border-c3 focus:bg-white transition-all duration-150" />
                    </div>
                    <div>
                        <label class="block text-[10px] uppercase tracking-[0.55px] text-[#4a6080] font-medium mb-1">Last name</label>
                        <input type="text" placeholder="Santos" class="w-full border-[1.5px] border-c1 rounded-lg px-3 py-2 text-xs text-[#1a2e44] bg-[#f5faff] outline-none focus:border-c3 focus:bg-white transition-all duration-150" />
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-3 mb-3">
                    <div>
                        <label class="block text-[10px] uppercase tracking-[0.55px] text-[#4a6080] font-medium mb-1">Date of birth</label>
                        <input type="date" class="w-full border-[1.5px] border-c1 rounded-lg px-3 py-2 text-xs text-[#1a2e44] bg-[#f5faff] outline-none focus:border-c3 focus:bg-white transition-all duration-150" />
                    </div>
                    <div>
                        <label class="block text-[10px] uppercase tracking-[0.55px] text-[#4a6080] font-medium mb-1">Sex</label>
                        <select class="w-full border-[1.5px] border-c1 rounded-lg px-3 py-2 text-xs text-[#1a2e44] bg-[#f5faff] outline-none focus:border-c3 focus:bg-white transition-all duration-150">
                            <option value="">— Select —</option><option>Male</option><option>Female</option>
                        </select>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="block text-[10px] uppercase tracking-[0.55px] text-[#4a6080] font-medium mb-1">Contact number</label>
                    <input type="tel" placeholder="09XX-XXX-XXXX" class="w-full border-[1.5px] border-c1 rounded-lg px-3 py-2 text-xs text-[#1a2e44] bg-[#f5faff] outline-none focus:border-c3 focus:bg-white transition-all duration-150" />
                </div>
                <div class="mb-3">
                    <label class="block text-[10px] uppercase tracking-[0.55px] text-[#4a6080] font-medium mb-1">Barangay</label>
                    <select class="w-full border-[1.5px] border-c1 rounded-lg px-3 py-2 text-xs text-[#1a2e44] bg-[#f5faff] outline-none focus:border-c3 focus:bg-white transition-all duration-150">
                        <option value="">— Select barangay —</option>
                        <option>Payatas</option><option>Holy Spirit</option><option>Batasan Hills</option><option>Commonwealth</option><option>Bagong Silangan</option><option>Matandang Balara</option><option>Pasong Tamo</option><option>Tandang Sora</option><option>Bagumbayan</option><option>Fairview</option>
                    </select>
                </div>
                <div class="grid grid-cols-2 gap-3 mb-3">
                    <div>
                        <label class="block text-[10px] uppercase tracking-[0.55px] text-[#4a6080] font-medium mb-1">Blood type</label>
                        <select class="w-full border-[1.5px] border-c1 rounded-lg px-3 py-2 text-xs text-[#1a2e44] bg-[#f5faff] outline-none focus:border-c3 focus:bg-white transition-all duration-150">
                            <option value="">— Select —</option>
                            <option>A+</option><option>A-</option><option>B+</option><option>B-</option><option>O+</option><option>O-</option><option>AB+</option><option>AB-</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-[10px] uppercase tracking-[0.55px] text-[#4a6080] font-medium mb-1">Civil status</label>
                        <select class="w-full border-[1.5px] border-c1 rounded-lg px-3 py-2 text-xs text-[#1a2e44] bg-[#f5faff] outline-none focus:border-c3 focus:bg-white transition-all duration-150">
                            <option value="">— Select —</option>
                            <option>Single</option><option>Married</option><option>Widowed</option><option>Separated</option>
                        </select>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="block text-[10px] uppercase tracking-[0.55px] text-[#4a6080] font-medium mb-1">Allergies / notes</label>
                    <textarea rows="2" placeholder="Known allergies or medical notes…" class="w-full border-[1.5px] border-c1 rounded-lg px-3 py-1.5 text-xs text-[#1a2e44] bg-[#f5faff] outline-none focus:border-c3 focus:bg-white transition-all duration-150 resize-none leading-relaxed"></textarea>
                </div>
                <div class="flex gap-2 mt-4">
                    <button onclick="closeModal('addPatient')" class="px-4 py-2 border-[1.5px] border-c1 rounded-lg text-xs text-[#4a6080] hover:bg-c1 hover:text-[#1a2e44] transition-colors">Cancel</button>
                    <button onclick="submitForm('addPatient')" class="flex-1 bg-c3 hover:bg-c3d text-white rounded-lg py-2 text-xs font-semibold flex items-center justify-center gap-1.5 transition-colors active:scale-[0.97]">
                        <i class="ti ti-check" aria-hidden="true"></i> Register
                    </button>
                </div>
            </div>
            <div id="ap-success" class="success-anim flex-col items-center gap-2 py-6">
                <i class="ti ti-circle-check text-[48px] text-green-400 animate-popIn" aria-hidden="true"></i>
                <p class="text-xs text-[#4a6080] font-medium">Patient registered successfully!</p>
            </div>
        </div>
    </div>

    <!-- Report Case -->
    <div id="modal-reportCase" class="overlay fixed inset-0 bg-[rgba(10,30,50,0.48)] z-50 items-center justify-center animate-fadeOverlay" role="dialog" aria-modal="true" aria-labelledby="rc-title">
        <div class="popup bg-white rounded-[18px] p-6 w-[400px] max-h-[90vh] overflow-y-auto animate-slideUp">
            <div class="flex items-center justify-between mb-4">
                <h2 id="rc-title" class="text-sm font-semibold text-c3 flex items-center gap-2">
                    <i class="ti ti-file-report text-lg" aria-hidden="true"></i> Report case
                </h2>
                <button onclick="closeModal('reportCase')" class="text-[#4a6080] hover:text-[#1a2e44] text-lg leading-none transition-colors" aria-label="Close"><i class="ti ti-x" aria-hidden="true"></i></button>
            </div>
            <div id="rc-form">
                <div class="mb-3">
                    <label class="block text-[10px] uppercase tracking-[0.55px] text-[#4a6080] font-medium mb-1">Patient</label>
                    <select class="w-full border-[1.5px] border-c1 rounded-lg px-3 py-2 text-xs text-[#1a2e44] bg-[#f5faff] outline-none focus:border-c3 focus:bg-white transition-all duration-150">
                        <option value="">— Select patient —</option>
                        <option>Maria Santos</option><option>Jose Reyes</option><option>Ana Cruz</option><option>Pedro Villanueva</option><option>Liza Bautista</option><option>Ramon dela Cruz</option><option>Carina Mendez</option><option>Eduardo Ramos</option><option>Gloria Fernandez</option><option>Ronaldo Aquino</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="block text-[10px] uppercase tracking-[0.55px] text-[#4a6080] font-medium mb-1">Disease / condition</label>
                    <input type="text" placeholder="e.g. Dengue Fever" class="w-full border-[1.5px] border-c1 rounded-lg px-3 py-2 text-xs text-[#1a2e44] bg-[#f5faff] outline-none focus:border-c3 focus:bg-white transition-all duration-150" />
                </div>
                <div class="mb-3">
                    <label class="block text-[10px] uppercase tracking-[0.55px] text-[#4a6080] font-medium mb-1">Symptoms</label>
                    <textarea rows="2" placeholder="List observed symptoms…" class="w-full border-[1.5px] border-c1 rounded-lg px-3 py-1.5 text-xs text-[#1a2e44] bg-[#f5faff] outline-none focus:border-c3 focus:bg-white transition-all duration-150 resize-none leading-relaxed"></textarea>
                </div>
                <div class="mb-3">
                    <label class="block text-[10px] uppercase tracking-[0.55px] text-[#4a6080] font-medium mb-1">Diagnosis</label>
                    <input type="text" placeholder="Clinical diagnosis" class="w-full border-[1.5px] border-c1 rounded-lg px-3 py-2 text-xs text-[#1a2e44] bg-[#f5faff] outline-none focus:border-c3 focus:bg-white transition-all duration-150" />
                </div>
                <div class="grid grid-cols-2 gap-3 mb-3">
                    <div>
                        <label class="block text-[10px] uppercase tracking-[0.55px] text-[#4a6080] font-medium mb-1">Barangay</label>
                        <select class="w-full border-[1.5px] border-c1 rounded-lg px-3 py-2 text-xs text-[#1a2e44] bg-[#f5faff] outline-none focus:border-c3 focus:bg-white transition-all duration-150">
                            <option value="">— Select —</option>
                            <option>Payatas</option><option>Holy Spirit</option><option>Batasan Hills</option><option>Commonwealth</option><option>Bagong Silangan</option><option>Matandang Balara</option><option>Pasong Tamo</option><option>Tandang Sora</option><option>Bagumbayan</option><option>Fairview</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-[10px] uppercase tracking-[0.55px] text-[#4a6080] font-medium mb-1">Severity</label>
                        <select class="w-full border-[1.5px] border-c1 rounded-lg px-3 py-2 text-xs text-[#1a2e44] bg-[#f5faff] outline-none focus:border-c3 focus:bg-white transition-all duration-150">
                            <option value="">— Level —</option>
                            <option>Low</option><option>Moderate</option><option>High</option><option>Critical</option>
                        </select>
                    </div>
                </div>
                <div class="flex gap-2 mt-4">
                    <button onclick="closeModal('reportCase')" class="px-4 py-2 border-[1.5px] border-c1 rounded-lg text-xs text-[#4a6080] hover:bg-c1 hover:text-[#1a2e44] transition-colors">Cancel</button>
                    <button onclick="submitForm('reportCase')" class="flex-1 bg-c3 hover:bg-c3d text-white rounded-lg py-2 text-xs font-semibold flex items-center justify-center gap-1.5 transition-colors active:scale-[0.97]">
                        <i class="ti ti-send" aria-hidden="true"></i> Submit
                    </button>
                </div>
            </div>
            <div id="rc-success" class="success-anim flex-col items-center gap-2 py-6">
                <i class="ti ti-circle-check text-[48px] text-green-400 animate-popIn" aria-hidden="true"></i>
                <p class="text-xs text-[#4a6080] font-medium">Case report submitted!</p>
            </div>
        </div>
    </div>

    <!-- ===== ALL JAVASCRIPT NOW INLINE ===== -->
    <script src="../assets/js/dashb-animation.js" defer></script>

</main>

<?php include '../includes/footer.php'; ?>