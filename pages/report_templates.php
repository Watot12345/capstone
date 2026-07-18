<?php
// ============================================================
// admin-templates.php – Full page with includes
// ============================================================
include '../includes/header.php';
include '../includes/sidebar.php';
?>

<main class="flex-1 bg-dash-bg h-screen m-5  rounded-2xl font-sans">

    <!-- ===== PAGE HEADER ===== -->
    <div class="flex items-center justify-between mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Report Templates</h1>
            <p class="text-sm text-gray-500">Manage sanitation inspection templates</p>
        </div>
        <button id="openAddModal" class="bg-[#176B87] text-white px-5 py-2.5 rounded-xl shadow hover:bg-[#135e78] transition flex items-center gap-2">
            <i class="fas fa-plus"></i> New Template
        </button>
    </div>

    <!-- ===== STATS CARDS ===== -->
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-6">
        <div class="bg-white p-5 rounded-2xl shadow-sm border-l-4 border-[#86B6F6]">
            <div class="flex items-center justify-between">
                <span class="text-gray-500 text-sm">Total</span>
                <i class="fas fa-file-alt text-[#86B6F6] text-xl"></i>
            </div>
            <div class="text-2xl font-bold text-gray-800" id="totalTemplates">0</div>
        </div>
        <div class="bg-white p-5 rounded-2xl shadow-sm border-l-4 border-green-400">
            <div class="flex items-center justify-between">
                <span class="text-gray-500 text-sm">Active</span>
                <i class="fas fa-check-circle text-green-400 text-xl"></i>
            </div>
            <div class="text-2xl font-bold text-gray-800" id="activeTemplates">0</div>
        </div>
        <div class="bg-white p-5 rounded-2xl shadow-sm border-l-4 border-yellow-400">
            <div class="flex items-center justify-between">
                <span class="text-gray-500 text-sm">Draft</span>
                <i class="fas fa-pencil-alt text-yellow-400 text-xl"></i>
            </div>
            <div class="text-2xl font-bold text-gray-800" id="draftTemplates">0</div>
        </div>
    </div>

    <!-- ===== TOOLBAR ===== -->
    <div class="flex flex-wrap items-center gap-3 mb-4">
        <div class="flex-1 min-w-[200px]">
            <div class="relative">
                <i class="fas fa-search absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-sm"></i>
                <input type="text" id="searchInput" placeholder="Search templates..." class="w-full pl-9 pr-4 py-2 bg-white rounded-xl border border-gray-200 focus:border-[#86B6F6] focus:ring-2 focus:ring-[#86B6F6]/30 outline-none text-sm" />
            </div>
        </div>
        <select id="statusFilter" class="bg-white border border-gray-200 rounded-xl px-4 py-2 text-sm focus:border-[#86B6F6] outline-none">
            <option value="all">All Status</option>
            <option value="active">Active</option>
            <option value="inactive">Inactive</option>
            <option value="draft">Draft</option>
        </select>
        <select id="typeFilter" class="bg-white border border-gray-200 rounded-xl px-4 py-2 text-sm focus:border-[#86B6F6] outline-none">
            <option value="all">All Types</option>
            <option value="inspection">Inspection</option>
            <option value="audit">Audit</option>
            <option value="water">Water Quality</option>
            <option value="waste">Waste Management</option>
        </select>
        <button id="clearFiltersBtn" class="px-4 py-2 text-sm text-[#176B87] border border-[#B4D4FF] rounded-xl hover:bg-[#B4D4FF] hover:text-[#176B87] transition">
            <i class="fas fa-undo"></i> Reset
        </button>
    </div>

    <!-- ===== TABLE ===== -->
    <div class="bg-white rounded-2xl shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead class="bg-[#EEF5FF] text-gray-600 uppercase text-xs tracking-wider">
                    <tr>
                        <th class="px-5 py-3 text-left">Name</th>
                        <th class="px-5 py-3 text-left">Type</th>
                        <th class="px-5 py-3 text-left">Status</th>
                        <th class="px-5 py-3 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody id="templatesBody" class="divide-y divide-gray-100">
                    <!-- rows injected by JS -->
                </tbody>
            </table>
        </div>
        <div id="emptyState" class="text-center py-12 text-gray-400 hidden">
            <i class="fas fa-file-alt text-4xl mb-3 block"></i>
            <p class="font-medium">No templates found</p>
            <p class="text-sm">Adjust filters or create a new one.</p>
        </div>
    </div>

    <!-- ===== MODAL ===== -->
    <div id="modalOverlay" class="fixed inset-0 bg-black/40 backdrop-blur-sm flex items-center justify-center z-50 hidden px-4">
        <div class="bg-white w-full max-w-lg rounded-2xl shadow-xl p-6 animate-fadeInUp">
            <div class="flex items-center justify-between mb-5">
                <h3 id="modalTitle" class="text-xl font-bold text-gray-800">New Template</h3>
                <button id="closeModalBtn" class="text-gray-400 hover:text-gray-600"><i class="fas fa-times"></i></button>
            </div>
            <form id="templateForm">
                <input type="hidden" id="editId" />
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Template Name <span class="text-red-500">*</span></label>
                    <input type="text" id="templateName" required class="w-full border border-gray-200 rounded-xl px-4 py-2.5 focus:border-[#86B6F6] focus:ring-2 focus:ring-[#86B6F6]/30 outline-none" placeholder="e.g. Food Inspection" />
                </div>
                <div class="grid grid-cols-2 gap-4 mb-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Type</label>
                        <select id="templateType" class="w-full border border-gray-200 rounded-xl px-4 py-2.5 focus:border-[#86B6F6] outline-none">
                            <option value="inspection">Inspection</option>
                            <option value="audit">Audit</option>
                            <option value="water">Water Quality</option>
                            <option value="waste">Waste Management</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                        <select id="templateStatus" class="w-full border border-gray-200 rounded-xl px-4 py-2.5 focus:border-[#86B6F6] outline-none">
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                            <option value="draft">Draft</option>
                        </select>
                    </div>
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                    <textarea id="templateDesc" rows="2" class="w-full border border-gray-200 rounded-xl px-4 py-2.5 focus:border-[#86B6F6] focus:ring-2 focus:ring-[#86B6F6]/30 outline-none" placeholder="Optional description"></textarea>
                </div>
                <div class="flex justify-end gap-3 mt-6">
                    <button type="button" id="cancelModalBtn" class="px-5 py-2.5 text-sm text-gray-600 bg-[#EEF5FF] rounded-xl hover:bg-[#B4D4FF] transition">Cancel</button>
                    <button type="submit" class="px-5 py-2.5 text-sm text-white bg-[#176B87] rounded-xl hover:bg-[#135e78] transition shadow flex items-center gap-2">
                        <i class="fas fa-save"></i> <span id="saveBtnText">Save</span>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- ===== TOAST CONTAINER ===== -->
    <div id="toastContainer" class="fixed bottom-6 right-6 z-50 flex flex-col gap-2"></div>

</main>

<?php include '../includes/footer.php'; ?>


<!-- =========================================================== -->
<!-- ===== CUSTOM STYLES (inline for portability) =============== -->
<!-- =========================================================== -->
 <link rel="stylesheet" href="../assets/css/report_template.css" />


<!-- =========================================================== -->
<!-- ===== JAVASCRIPT =========================================== -->
<!-- =========================================================== -->
<script src="../assets/js/report_template.js" defer></script>

</body>
</html>