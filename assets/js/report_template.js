// ===== DATA =====
// UPDATED
let templates = [
  { id: 1, name: 'Food Establishment Inspection', type: 'inspection', status: 'active', description: 'Standard inspection for restaurants.', updated: '2026-07-15' },
  { id: 2, name: 'Water Quality Audit', type: 'water', status: 'active', description: 'Comprehensive water testing.', updated: '2026-07-12' },
  { id: 3, name: 'Waste Disposal Compliance', type: 'waste', status: 'draft', description: 'Waste management assessment.', updated: '2026-07-10' },
  { id: 4, name: 'Healthcare Facility Sanitation', type: 'audit', status: 'inactive', description: 'Sanitation audit for hospitals.', updated: '2026-06-28' },
  { id: 5, name: 'Public Restroom Inspection', type: 'inspection', status: 'active', description: 'Routine restroom checks.', updated: '2026-07-18' },
];
let nextId = 6;

// ===== DOM refs =====
const $ = id => document.getElementById(id);
const tbody = $('templatesBody');
const emptyState = $('emptyState');
const searchInput = $('searchInput');
const statusFilter = $('statusFilter');
const typeFilter = $('typeFilter');
const clearFiltersBtn = $('clearFiltersBtn');
const modalOverlay = $('modalOverlay');
const modalTitle = $('modalTitle');
const closeModalBtn = $('closeModalBtn');
const cancelModalBtn = $('cancelModalBtn');
const openAddBtn = $('openAddModal');
const templateForm = $('templateForm');
const editId = $('editId');
const templateName = $('templateName');
const templateType = $('templateType');
const templateStatus = $('templateStatus');
const templateDesc = $('templateDesc');
const saveBtnText = $('saveBtnText');
const totalTemplates = $('totalTemplates');
const activeTemplates = $('activeTemplates');
const draftTemplates = $('draftTemplates');
const toastContainer = $('toastContainer');

// ===== Render =====
function render() {
  const search = searchInput.value.toLowerCase().trim();
  const statusVal = statusFilter.value;
  const typeVal = typeFilter.value;

  let filtered = templates.filter(t =>
    (t.name.toLowerCase().includes(search) || t.description.toLowerCase().includes(search)) &&
    (statusVal === 'all' || t.status === statusVal) &&
    (typeVal === 'all' || t.type === typeVal)
  );

  totalTemplates.textContent = templates.length;
  activeTemplates.textContent = templates.filter(t => t.status === 'active').length;
  draftTemplates.textContent = templates.filter(t => t.status === 'draft').length;

  if (filtered.length === 0) {
    tbody.innerHTML = '';
    emptyState.classList.remove('hidden');
    return;
  }
  emptyState.classList.add('hidden');

  const typeMap = { inspection: 'Inspection', audit: 'Audit', water: 'Water Quality', waste: 'Waste Management' };
  tbody.innerHTML = filtered.map(t => `
            <tr>
                <td class="px-5 py-3 font-medium text-gray-800">${t.name}</td>
                <td class="px-5 py-3 text-gray-600">${typeMap[t.type]}</td>
                <td class="px-5 py-3">
                    <span class="status-badge ${t.status}">
                        <span class="dot"></span> ${t.status.charAt(0).toUpperCase() + t.status.slice(1)}
                    </span>
                </td>
                <td class="px-5 py-3 text-right">
                    <button onclick="editTemplate(${t.id})" class="text-gray-400 hover:text-[#176B87] px-1"><i class="fas fa-edit"></i></button>
                    <button onclick="deleteTemplate(${t.id})" class="text-gray-400 hover:text-red-500 px-1"><i class="fas fa-trash"></i></button>
                </td>
            </tr>
        `).join('');
}

// ===== CRUD =====
function editTemplate(id) {
  const t = templates.find(t => t.id === id);
  if (!t) return;
  modalTitle.textContent = 'Edit Template';
  saveBtnText.textContent = 'Update';
  editId.value = id;
  templateName.value = t.name;
  templateType.value = t.type;
  templateStatus.value = t.status;
  templateDesc.value = t.description || '';
  modalOverlay.classList.remove('hidden');
}

function deleteTemplate(id) {
  if (!confirm('Delete this template?')) return;
  templates = templates.filter(t => t.id !== id);
  render();
  showToast('Template deleted', 'success');
}

function saveTemplate(e) {
  e.preventDefault();
  const name = templateName.value.trim();
  if (!name) return showToast('Name is required', 'error');

  const data = {
    name,
    type: templateType.value,
    status: templateStatus.value,
    description: templateDesc.value.trim(),
    updated: new Date().toISOString().slice(0, 10)
  };

  const id = editId.value;
  if (id) {
    const idx = templates.findIndex(t => t.id === Number(id));
    if (idx !== -1) { templates[idx] = { ...templates[idx], ...data }; }
    showToast('Template updated', 'success');
  } else {
    templates.push({ id: nextId++, ...data });
    showToast('Template created', 'success');
  }
  closeModal();
  render();
}

function closeModal() {
  modalOverlay.classList.add('hidden');
  templateForm.reset();
  editId.value = '';
  modalTitle.textContent = 'New Template';
  saveBtnText.textContent = 'Save';
}

function showToast(msg, type = 'success') {
  const toast = document.createElement('div');
  toast.className = `toast ${type}`;
  toast.innerHTML = `<i class="fas ${type === 'success' ? 'fa-check-circle' : 'fa-exclamation-circle'}"></i> ${msg}`;
  toastContainer.appendChild(toast);
  setTimeout(() => {
    toast.style.opacity = '0';
    toast.style.transform = 'translateX(30px)';
    setTimeout(() => toast.remove(), 300);
  }, 3000);
}

// ===== Events =====
openAddBtn.addEventListener('click', () => { closeModal(); modalOverlay.classList.remove('hidden'); });
closeModalBtn.addEventListener('click', closeModal);
cancelModalBtn.addEventListener('click', closeModal);
modalOverlay.addEventListener('click', (e) => { if (e.target === modalOverlay) closeModal(); });
templateForm.addEventListener('submit', saveTemplate);

searchInput.addEventListener('input', render);
statusFilter.addEventListener('change', render);
typeFilter.addEventListener('change', render);
clearFiltersBtn.addEventListener('click', () => {
  searchInput.value = '';
  statusFilter.value = 'all';
  typeFilter.value = 'all';
  render();
  showToast('Filters reset');
});

// ===== Init =====
render();