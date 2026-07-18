<?php include '../includes/header.php'; ?>
<?php include '../includes/sidebar.php'; ?>

<main class="flex-1 bg-dash-bg h-screen flex flex-col m-5 overflow-y-auto overflow-x-hidden rounded-2xl font-sans scrollbar-track-transparent">
    <div>
        <!-- ====== SYSTEM STATUS (GLASS MORPHISM) ====== -->
        <div class="relative mb-8 overflow-hidden rounded-2xl border border-white/30 bg-white/20 p-6 shadow-xl backdrop-blur-xl transition hover:shadow-2xl">
            <div class="absolute -right-20 -top-20 h-72 w-72 rounded-full bg-blue-200/25 blur-3xl"></div>
            <div class="absolute -bottom-20 -left-20 h-72 w-72 rounded-full bg-purple-200/25 blur-3xl"></div>
            <div class="absolute right-1/3 top-1/2 h-40 w-40 rounded-full bg-emerald-200/15 blur-3xl"></div>

            <div class="relative z-10 flex flex-wrap items-start justify-between gap-4">
                <div>
                    <h2 class="text-xs font-medium uppercase tracking-wider text-gray-500">System Status</h2>
                    <div class="mt-1 flex items-center gap-3">
                        <span class="text-lg font-semibold text-gray-800">AI Monitoring</span>
                        <span class="inline-flex items-center gap-1.5 rounded-full bg-emerald-100/80 px-2.5 py-0.5 text-xs font-medium text-emerald-700 backdrop-blur-sm">
                            <span class="relative flex h-1.5 w-1.5">
                                <span class="absolute inline-flex h-full w-full animate-ping rounded-full bg-emerald-400 opacity-75"></span>
                                <span class="relative inline-flex h-1.5 w-1.5 rounded-full bg-emerald-500"></span>
                            </span>
                            Live
                        </span>
                        <span class="text-sm text-gray-400">·</span>
                        <span class="text-sm text-gray-500">2 hours</span>
                    </div>
                    <div class="mt-3 flex flex-wrap items-center gap-x-4 gap-y-1">
                        <div class="flex items-center gap-2">
                            <span class="text-sm font-medium text-gray-700">System is normal</span>
                            <span class="rounded-full bg-gray-200/60 px-2.5 py-0.5 text-xs font-medium text-gray-700 backdrop-blur-sm">0% confidence</span>
                        </div>
                        <span class="text-sm text-gray-400">·</span>
                        <span class="text-sm text-gray-500">Top finding:</span>
                        <span class="text-sm font-medium text-gray-700">No critical findings detected</span>
                    </div>
                </div>
                <div class="flex flex-wrap items-center gap-2">
                    <span class="rounded-full bg-yellow-100/70 px-3 py-1 text-xs font-semibold text-yellow-800 backdrop-blur-sm">Medium Priority</span>
                    <span class="rounded-full bg-emerald-100/70 px-3 py-1 text-xs font-semibold text-emerald-700 backdrop-blur-sm">Stable</span>
                    <span class="rounded-full bg-gray-200/60 px-3 py-1 text-xs font-semibold text-gray-700 backdrop-blur-sm">0%</span>
                </div>
            </div>

            <div class="relative z-10 mt-4 flex flex-wrap items-center justify-between gap-4 border-t border-white/30 pt-4">
                <div class="flex items-center gap-2 text-sm">
                    <span class="font-medium text-gray-700">Next action:</span>
                    <span class="text-gray-600">Continue routine monitoring</span>
                </div>
                <div class="flex items-center gap-4 text-xs text-gray-500">
                    <span>Updated 7/17/2026, 10:47:06 PM</span>
                    <span class="text-gray-300">|</span>
                    <span>Monitoring since 2 hours</span>
                </div>
            </div>
        </div>

        <!-- ====== TOP 4 METRIC CARDS ====== -->
        <div class="mb-6 grid grid-cols-2 gap-4 md:grid-cols-4">
            <div class="rounded-2xl border border-white/30 bg-white/30 p-5 backdrop-blur-md shadow-sm transition hover:shadow-lg hover:bg-white/50">
                <p class="text-xs font-medium uppercase tracking-wider text-gray-400">Appointments</p>
                <p class="mt-1 text-3xl font-bold text-gray-800">6</p>
                <p class="mt-1 text-xs text-emerald-600">↑ vs last month</p>
            </div>
            <div class="rounded-2xl border border-white/30 bg-white/30 p-5 backdrop-blur-md shadow-sm transition hover:shadow-lg hover:bg-white/50">
                <p class="text-xs font-medium uppercase tracking-wider text-gray-400">Permits issued</p>
                <p class="mt-1 text-3xl font-bold text-gray-800">5</p>
                <p class="mt-1 text-xs text-emerald-600">↑ vs last month</p>
            </div>
            <div class="rounded-2xl border border-white/30 bg-white/30 p-5 backdrop-blur-md shadow-sm transition hover:shadow-lg hover:bg-white/50">
                <p class="text-xs font-medium uppercase tracking-wider text-gray-400">Total Services</p>
                <p class="mt-1 text-3xl font-bold text-gray-800">14</p>
                <p class="mt-1 text-xs text-emerald-600">↑ vs last month</p>
            </div>
            <div class="rounded-2xl border border-white/30 bg-white/30 p-5 backdrop-blur-md shadow-sm transition hover:shadow-lg hover:bg-white/50">
                <p class="text-xs font-medium uppercase tracking-wider text-gray-400">Active Alerts</p>
                <p class="mt-1 text-3xl font-bold text-rose-600">2</p>
                <p class="mt-1 text-xs text-rose-600">↑ vs last month</p>
            </div>
        </div>

        <!-- ====== SERVICE REQUESTS TREND + DISEASE SURVEILLANCE ====== -->
        <div class="mb-6 grid grid-cols-1 gap-6 lg:grid-cols-2">

            <!-- ===== SERVICE REQUESTS TREND (with Service Activity on hover) ===== -->
            <div class="group relative rounded-2xl border border-white/30 bg-white/30 p-6 backdrop-blur-md shadow-sm transition hover:shadow-lg hover:bg-white/40">
                <h2 class="text-sm font-medium uppercase tracking-wider text-gray-400">Service Requests Trend</h2>

                <!-- Line Chart SVG -->
                <div class="mt-3">
                    <svg viewBox="0 0 500 200" class="w-full h-auto">
                        <!-- Grid lines -->
                        <line x1="40" y1="20" x2="40" y2="180" stroke="#d1d5db" stroke-width="0.5" />
                        <line x1="40" y1="180" x2="480" y2="180" stroke="#d1d5db" stroke-width="0.5" />
                        <line x1="40" y1="100" x2="480" y2="100" stroke="#d1d5db" stroke-width="0.3" stroke-dasharray="3,3" />
                        <!-- Y-axis labels -->
                        <text x="30" y="183" class="text-[8px] fill-gray-400">0</text>
                        <text x="30" y="103" class="text-[8px] fill-gray-400">5</text>
                        <text x="30" y="23" class="text-[8px] fill-gray-400">10</text>
                        <!-- X-axis labels -->
                        <text x="78" y="195" class="text-[8px] fill-gray-400 text-center">Feb</text>
                        <text x="156" y="195" class="text-[8px] fill-gray-400 text-center">Mar</text>
                        <text x="234" y="195" class="text-[8px] fill-gray-400 text-center">Apr</text>
                        <text x="312" y="195" class="text-[8px] fill-gray-400 text-center">May</text>
                        <text x="390" y="195" class="text-[8px] fill-gray-400 text-center">Jun</text>
                        <text x="468" y="195" class="text-[8px] fill-gray-400 text-center">Jul</text>

                        <g id="serviceLineGroup"></g>
                        <g id="serviceDotsGroup"></g>
                    </svg>
                </div>

                <!-- Legend with click toggling -->
                <div class="mt-2 flex flex-wrap items-center gap-4 text-xs text-gray-600">
                    <span class="flex items-center gap-1.5 cursor-pointer service-legend" data-series="appointments">
                        <span class="inline-block h-3 w-3 rounded-full bg-blue-500"></span> Appointments
                    </span>
                    <span class="flex items-center gap-1.5 cursor-pointer service-legend" data-series="emails">
                        <span class="inline-block h-3 w-3 rounded-full bg-emerald-500"></span> Emails
                    </span>
                    <span class="flex items-center gap-1.5 cursor-pointer service-legend" data-series="requests">
                        <span class="inline-block h-3 w-3 rounded-full bg-amber-500"></span> Requests
                    </span>
                </div>

                <!-- ===== SERVICE ACTIVITY (hidden, shows on hover) ===== -->
                <div class="max-h-0 opacity-0 overflow-hidden transition-all duration-300 ease-in-out group-hover:max-h-[500px] group-hover:opacity-100">
                    <div class="mt-4 rounded-xl border border-white/30 bg-white/20 p-4 backdrop-blur-sm shadow-lg">
                        <p class="text-sm font-medium text-gray-700"><strong>Service Activity</strong></p>
                        <p class="mt-1 text-xs text-gray-500">Total of <strong class="text-gray-700">6</strong> appointments recorded in the system.</p>
                        <p class="text-xs text-gray-500">- Monitor service demand trends</p>

                        <div class="mt-3 flex flex-wrap items-center gap-3">
                            <div class="flex-1 min-w-[60px]">
                                <div class="h-2 w-full rounded-full bg-gray-200">
                                    <div class="h-2 rounded-full bg-blue-500" style="width:80%"></div>
                                </div>
                            </div>
                            <span class="text-xl font-bold text-blue-600">80%</span>
                        </div>
                        <div class="mt-2 text-right text-xs font-medium text-blue-600">
                            Details | Confidence breakdown
                        </div>
                    </div>
                </div>
            </div>

            <!-- ===== DISEASE SURVEILLANCE (with Disease Monitoring on hover) ===== -->
            <div class="group relative rounded-2xl border border-white/30 bg-white/30 p-6 backdrop-blur-md shadow-sm transition hover:shadow-lg hover:bg-white/40">
                <h2 class="text-sm font-medium uppercase tracking-wider text-gray-400">Disease Surveillance</h2>

                <!-- Line Chart SVG -->
                <div class="mt-3">
                    <svg viewBox="0 0 500 200" class="w-full h-auto">
                        <!-- Grid lines -->
                        <line x1="40" y1="20" x2="40" y2="180" stroke="#d1d5db" stroke-width="0.5" />
                        <line x1="40" y1="180" x2="480" y2="180" stroke="#d1d5db" stroke-width="0.5" />
                        <line x1="40" y1="100" x2="480" y2="100" stroke="#d1d5db" stroke-width="0.3" stroke-dasharray="3,3" />
                        <!-- Y-axis label -->
                        <text x="10" y="100" class="text-[8px] fill-gray-400" transform="rotate(-90,15,100)">Maximum of Cases</text>
                        <text x="30" y="183" class="text-[8px] fill-gray-400">0</text>
                        <text x="30" y="103" class="text-[8px] fill-gray-400">5</text>
                        <text x="30" y="23" class="text-[8px] fill-gray-400">10</text>
                        <!-- X-axis labels -->
                        <text x="78" y="195" class="text-[8px] fill-gray-400 text-center">Jan</text>
                        <text x="156" y="195" class="text-[8px] fill-gray-400 text-center">Feb</text>
                        <text x="234" y="195" class="text-[8px] fill-gray-400 text-center">Mar</text>
                        <text x="312" y="195" class="text-[8px] fill-gray-400 text-center">Apr</text>
                        <text x="390" y="195" class="text-[8px] fill-gray-400 text-center">May</text>
                        <text x="468" y="195" class="text-[8px] fill-gray-400 text-center">Jun</text>

                        <g id="diseaseLineGroup"></g>
                        <g id="diseaseDotsGroup"></g>
                    </svg>
                </div>

                <!-- Legend with click toggling -->
                <div class="mt-2 flex flex-wrap items-center gap-4 text-xs text-gray-600">
                    <span class="flex items-center gap-1.5 cursor-pointer disease-legend" data-series="dengue">
                        <span class="inline-block h-3 w-3 rounded-full bg-red-500"></span> Dengue
                    </span>
                    <span class="flex items-center gap-1.5 cursor-pointer disease-legend" data-series="influenza">
                        <span class="inline-block h-3 w-3 rounded-full bg-yellow-500"></span> Influenza
                    </span>
                    <span class="flex items-center gap-1.5 cursor-pointer disease-legend" data-series="foodPoisoning">
                        <span class="inline-block h-3 w-3 rounded-full bg-green-500"></span> Food Poisoning
                    </span>
                    <span class="flex items-center gap-1.5 cursor-pointer disease-legend" data-series="leptospirosis">
                        <span class="inline-block h-3 w-3 rounded-full bg-purple-500"></span> Leptospirosis
                    </span>
                </div>

                <!-- Current counts (always visible) -->
                <div class="mt-2 flex flex-wrap gap-3 text-xs text-gray-500">
                    <span>Dengue: 0</span>
                    <span>Influenza: 0</span>
                    <span>Food Poisoning: 0</span>
                    <span>Leptospirosis: 0</span>
                </div>

                <!-- ===== DISEASE MONITORING (hidden, shows on hover) ===== -->
                <div class="max-h-0 opacity-0 overflow-hidden transition-all duration-300 ease-in-out group-hover:max-h-[500px] group-hover:opacity-100">
                    <div class="mt-3 rounded-xl border border-white/30 bg-white/20 p-4 backdrop-blur-sm shadow-lg">
                        <p class="text-sm font-medium text-gray-700"><strong>Disease Monitoring</strong></p>
                        <p class="mt-1 text-xs text-gray-500">Currently tracking <strong class="text-gray-700">2</strong> active disease alerts with <strong class="text-gray-700">40</strong> total cases.</p>
                        <p class="text-xs text-gray-500">- Continue monitor monitoring</p>

                        <div class="mt-3 flex flex-wrap items-center gap-3">
                            <div class="flex-1 min-w-[60px]">
                                <div class="h-2 w-full rounded-full bg-gray-200">
                                    <div class="h-2 rounded-full bg-rose-500" style="width:85%"></div>
                                </div>
                            </div>
                            <span class="text-xl font-bold text-rose-600">85%</span>
                        </div>
                        <div class="mt-2 text-right text-xs font-medium text-rose-600">
                            Details | Confidence breakdown
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- ====== WEEKLY ACTIVITY HEATMAP + SERVICE DISTRIBUTION ====== -->
        <div class="mb-6 grid grid-cols-1 gap-6 lg:grid-cols-2">

            <!-- ===== WEEKLY ACTIVITY HEATMAP ===== -->
            <div class="relative rounded-2xl border border-white/30 bg-white/30 p-6 backdrop-blur-md shadow-sm transition hover:shadow-lg hover:bg-white/40">
                <h2 class="text-sm font-medium uppercase tracking-wider text-gray-400">Weekly Activity Heatmap</h2>
                <p class="text-xs text-gray-500 mt-1">Activity by Day &amp; Hour</p>

                <!-- Heatmap Grid -->
                <div class="mt-3 overflow-x-auto">
                    <table class="w-full text-xs">
                        <thead>
                            <tr>
                                <th class="p-1"></th>
                                <th class="p-1 text-center font-medium text-gray-500">0-5</th>
                                <th class="p-1 text-center font-medium text-gray-500">6-10</th>
                                <th class="p-1 text-center font-medium text-gray-500">11-20</th>
                                <th class="p-1 text-center font-medium text-gray-500">21-30</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Days: Fri, Thu, Wed, Tue, Mon, Sat, Sun -->
                            <tr>
                                <td class="p-1 font-medium text-gray-500">Fri</td>
                                <td class="p-1"><div class="h-8 w-full rounded bg-blue-100 hover:bg-blue-200 transition" style="background-color: rgba(59,130,246,0.3)"></div></td>
                                <td class="p-1"><div class="h-8 w-full rounded bg-blue-200 hover:bg-blue-300 transition" style="background-color: rgba(59,130,246,0.6)"></div></td>
                                <td class="p-1"><div class="h-8 w-full rounded bg-blue-300 hover:bg-blue-400 transition" style="background-color: rgba(59,130,246,0.8)"></div></td>
                                <td class="p-1"><div class="h-8 w-full rounded bg-blue-400 hover:bg-blue-500 transition" style="background-color: rgba(59,130,246,1)"></div></td>
                            </tr>
                            <tr>
                                <td class="p-1 font-medium text-gray-500">Thu</td>
                                <td class="p-1"><div class="h-8 w-full rounded bg-blue-200 hover:bg-blue-300 transition" style="background-color: rgba(59,130,246,0.5)"></div></td>
                                <td class="p-1"><div class="h-8 w-full rounded bg-blue-100 hover:bg-blue-200 transition" style="background-color: rgba(59,130,246,0.3)"></div></td>
                                <td class="p-1"><div class="h-8 w-full rounded bg-blue-300 hover:bg-blue-400 transition" style="background-color: rgba(59,130,246,0.7)"></div></td>
                                <td class="p-1"><div class="h-8 w-full rounded bg-blue-200 hover:bg-blue-300 transition" style="background-color: rgba(59,130,246,0.5)"></div></td>
                            </tr>
                            <tr>
                                <td class="p-1 font-medium text-gray-500">Wed</td>
                                <td class="p-1"><div class="h-8 w-full rounded bg-blue-400 hover:bg-blue-500 transition" style="background-color: rgba(59,130,246,0.9)"></div></td>
                                <td class="p-1"><div class="h-8 w-full rounded bg-blue-300 hover:bg-blue-400 transition" style="background-color: rgba(59,130,246,0.7)"></div></td>
                                <td class="p-1"><div class="h-8 w-full rounded bg-blue-100 hover:bg-blue-200 transition" style="background-color: rgba(59,130,246,0.2)"></div></td>
                                <td class="p-1"><div class="h-8 w-full rounded bg-blue-200 hover:bg-blue-300 transition" style="background-color: rgba(59,130,246,0.4)"></div></td>
                            </tr>
                            <tr>
                                <td class="p-1 font-medium text-gray-500">Tue</td>
                                <td class="p-1"><div class="h-8 w-full rounded bg-blue-100 hover:bg-blue-200 transition" style="background-color: rgba(59,130,246,0.2)"></div></td>
                                <td class="p-1"><div class="h-8 w-full rounded bg-blue-400 hover:bg-blue-500 transition" style="background-color: rgba(59,130,246,0.9)"></div></td>
                                <td class="p-1"><div class="h-8 w-full rounded bg-blue-200 hover:bg-blue-300 transition" style="background-color: rgba(59,130,246,0.5)"></div></td>
                                <td class="p-1"><div class="h-8 w-full rounded bg-blue-300 hover:bg-blue-400 transition" style="background-color: rgba(59,130,246,0.7)"></div></td>
                            </tr>
                            <tr>
                                <td class="p-1 font-medium text-gray-500">Mon</td>
                                <td class="p-1"><div class="h-8 w-full rounded bg-blue-300 hover:bg-blue-400 transition" style="background-color: rgba(59,130,246,0.6)"></div></td>
                                <td class="p-1"><div class="h-8 w-full rounded bg-blue-200 hover:bg-blue-300 transition" style="background-color: rgba(59,130,246,0.4)"></div></td>
                                <td class="p-1"><div class="h-8 w-full rounded bg-blue-400 hover:bg-blue-500 transition" style="background-color: rgba(59,130,246,0.9)"></div></td>
                                <td class="p-1"><div class="h-8 w-full rounded bg-blue-100 hover:bg-blue-200 transition" style="background-color: rgba(59,130,246,0.3)"></div></td>
                            </tr>
                            <tr>
                                <td class="p-1 font-medium text-gray-500">Sat</td>
                                <td class="p-1"><div class="h-8 w-full rounded bg-blue-200 hover:bg-blue-300 transition" style="background-color: rgba(59,130,246,0.5)"></div></td>
                                <td class="p-1"><div class="h-8 w-full rounded bg-blue-100 hover:bg-blue-200 transition" style="background-color: rgba(59,130,246,0.2)"></div></td>
                                <td class="p-1"><div class="h-8 w-full rounded bg-blue-300 hover:bg-blue-400 transition" style="background-color: rgba(59,130,246,0.7)"></div></td>
                                <td class="p-1"><div class="h-8 w-full rounded bg-blue-400 hover:bg-blue-500 transition" style="background-color: rgba(59,130,246,0.9)"></div></td>
                            </tr>
                            <tr>
                                <td class="p-1 font-medium text-gray-500">Sun</td>
                                <td class="p-1"><div class="h-8 w-full rounded bg-blue-400 hover:bg-blue-500 transition" style="background-color: rgba(59,130,246,0.9)"></div></td>
                                <td class="p-1"><div class="h-8 w-full rounded bg-blue-300 hover:bg-blue-400 transition" style="background-color: rgba(59,130,246,0.7)"></div></td>
                                <td class="p-1"><div class="h-8 w-full rounded bg-blue-200 hover:bg-blue-300 transition" style="background-color: rgba(59,130,246,0.4)"></div></td>
                                <td class="p-1"><div class="h-8 w-full rounded bg-blue-100 hover:bg-blue-200 transition" style="background-color: rgba(59,130,246,0.2)"></div></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Legend for heatmap -->
                <div class="mt-3 flex items-center gap-2 text-xs text-gray-500">
                    <span>0-30</span>
                    <div class="flex h-3 w-32 rounded overflow-hidden">
                        <div class="flex-1 bg-blue-100"></div>
                        <div class="flex-1 bg-blue-200"></div>
                        <div class="flex-1 bg-blue-300"></div>
                        <div class="flex-1 bg-blue-400"></div>
                    </div>
                </div>

                <!-- Confidence link -->
                <div class="mt-3 text-right text-xs font-medium text-blue-600">
                    Details | Confidence breakdown
                </div>
            </div>

            <!-- ===== SERVICE DISTRIBUTION (with detail panel on hover) ===== -->
            <div class="group relative rounded-2xl border border-white/30 bg-white/30 p-6 backdrop-blur-md shadow-sm transition hover:shadow-lg hover:bg-white/40">
                <h2 class="text-sm font-medium uppercase tracking-wider text-gray-400">Service Distribution</h2>

                <!-- Donut Chart -->
                <div class="mt-3 flex flex-col items-center relative">
                    <svg viewBox="0 0 200 200" class="w-48 h-48" id="donutSvg">
                        <!-- Background circle -->
                        <circle cx="100" cy="100" r="80" fill="none" stroke="#e5e7eb" stroke-width="30" />
                        <g id="donutSegments"></g>
                        <!-- Inner hole overlay -->
                        <circle cx="100" cy="100" r="65" fill="white" fill-opacity="0.8" pointer-events="none" />
                    </svg>
                    <!-- Tooltip – now positioned at the outer edge of the ring -->
                    <div id="donutTooltip" class="absolute pointer-events-none bg-gray-800/90 text-white text-xs rounded py-1.5 px-3 opacity-0 transition-opacity duration-200 shadow-lg z-10 backdrop-blur-sm border border-white/20" style="top:0;left:0;transform:translate(-50%, -50%);">
                        <span id="tooltipText">Category</span>
                    </div>
                </div>

                <!-- Legend with percentages -->
                <div class="mt-2 grid grid-cols-2 gap-1 text-xs text-gray-600">
                    <span class="flex items-center gap-1.5"><span class="inline-block h-2.5 w-2.5 rounded-full bg-blue-500"></span> Health Center 35.7%</span>
                    <span class="flex items-center gap-1.5"><span class="inline-block h-2.5 w-2.5 rounded-full bg-emerald-500"></span> Sanitation 42.9%</span>
                    <span class="flex items-center gap-1.5"><span class="inline-block h-2.5 w-2.5 rounded-full bg-amber-500"></span> Immunization 21.4%</span>
                    <span class="flex items-center gap-1.5"><span class="inline-block h-2.5 w-2.5 rounded-full bg-purple-500"></span> Wastewater 0%</span>
                </div>

                <!-- ===== SERVICE DISTRIBUTION DETAIL (hidden, shows on hover) ===== -->
                <div class="max-h-0 opacity-0 overflow-hidden transition-all duration-300 ease-in-out group-hover:max-h-[500px] group-hover:opacity-100">
                    <div class="mt-3 rounded-xl border border-white/30 bg-white/20 p-4 backdrop-blur-sm shadow-lg">
                        <div class="text-xs text-gray-500">
                            <p class="text-sm font-medium text-gray-700"><strong>Service Distribution</strong></p>
                            <p>Services distributed across health, sanitation, immunization, and wastewater management.</p>
                            <p class="mt-1">→ Maintain balanced resource allocation</p>
                        </div>
                        <div class="mt-3 flex flex-wrap items-center gap-3">
                            <div class="flex-1 min-w-[60px]">
                                <div class="h-2 w-full rounded-full bg-gray-200">
                                    <div class="h-2 rounded-full bg-blue-500" style="width:90%"></div>
                                </div>
                            </div>
                            <span class="text-xl font-bold text-blue-600">90%</span>
                        </div>
                        <div class="mt-2 text-right text-xs font-medium text-blue-600">
                            Details | Confidence breakdown
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- ====== STAFF PERFORMANCE (with scale) ====== -->
        <div class="mb-6 grid grid-cols-1">
            <div class="rounded-2xl border border-white/30 bg-white/30 p-6 backdrop-blur-md shadow-sm transition hover:shadow-lg hover:bg-white/40">
                <h2 class="text-sm font-medium uppercase tracking-wider text-gray-400">Staff Performance</h2>

                <div class="mt-4 space-y-3">
                    <!-- Staff rows -->
                    <div class="flex items-center gap-3">
                        <span class="w-28 text-sm font-medium text-gray-700">Juan Dela Cruz</span>
                        <div class="flex-1">
                            <div class="h-5 w-full rounded-full bg-gray-200">
                                <div class="h-5 rounded-full bg-blue-500" style="width:94%"></div>
                            </div>
                        </div>
                        <span class="w-10 text-right text-sm font-bold text-blue-600">94%</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <span class="w-28 text-sm font-medium text-gray-700">Ana Reyes</span>
                        <div class="flex-1">
                            <div class="h-5 w-full rounded-full bg-gray-200">
                                <div class="h-5 rounded-full bg-blue-500" style="width:91%"></div>
                            </div>
                        </div>
                        <span class="w-10 text-right text-sm font-bold text-blue-600">91%</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <span class="w-28 text-sm font-medium text-gray-700">Carlos Tan</span>
                        <div class="flex-1">
                            <div class="h-5 w-full rounded-full bg-gray-200">
                                <div class="h-5 rounded-full bg-blue-500" style="width:88%"></div>
                            </div>
                        </div>
                        <span class="w-10 text-right text-sm font-bold text-blue-600">88%</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <span class="w-28 text-sm font-medium text-gray-700">Elena Santos</span>
                        <div class="flex-1">
                            <div class="h-5 w-full rounded-full bg-gray-200">
                                <div class="h-5 rounded-full bg-blue-500" style="width:85%"></div>
                            </div>
                        </div>
                        <span class="w-10 text-right text-sm font-bold text-blue-600">85%</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <span class="w-28 text-sm font-medium text-gray-700">Roberto Silva</span>
                        <div class="flex-1">
                            <div class="h-5 w-full rounded-full bg-gray-200">
                                <div class="h-5 rounded-full bg-blue-500" style="width:82%"></div>
                            </div>
                        </div>
                        <span class="w-10 text-right text-sm font-bold text-blue-600">82%</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <span class="w-28 text-sm font-medium text-gray-700">Jose Mendoza</span>
                        <div class="flex-1">
                            <div class="h-5 w-full rounded-full bg-gray-200">
                                <div class="h-5 rounded-full bg-blue-500" style="width:78%"></div>
                            </div>
                        </div>
                        <span class="w-10 text-right text-sm font-bold text-blue-600">78%</span>
                    </div>

                    <!-- Scale (0, 10, 20, ... 100) aligned with bars -->
                    <div class="flex items-center gap-3 mt-1">
                        <span class="w-28 text-xs text-gray-400"></span> <!-- spacer for name column -->
                        <div class="flex-1 relative">
                            <div class="flex justify-between text-[10px] text-gray-400 px-0">
                                <span>0</span>
                                <span>10</span>
                                <span>20</span>
                                <span>30</span>
                                <span>40</span>
                                <span>50</span>
                                <span>60</span>
                                <span>70</span>
                                <span>80</span>
                                <span>90</span>
                                <span>100</span>
                            </div>
                        </div>
                        <span class="w-10"></span> <!-- spacer for percentage -->
                    </div>
                </div>

                <!-- Optional Confidence link -->
                <div class="mt-4 text-right text-xs font-medium text-blue-600">
                    Details | Confidence breakdown
                </div>
            </div>
        </div>

    </div>
    <script src="../assets/js/ai-insight.js"></script>

</main>

<?php include '../includes/footer.php'; ?>