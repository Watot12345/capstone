// ─── TOPBAR DATE ───────────────────────────────────────────────
(function () {
  const el = document.getElementById('topbar-date');
  const opts = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
  if (el) {
    el.textContent = new Date().toLocaleDateString('en-PH', opts) + '  ·  System operational';
  }
})();

// ─── MODAL LOGIC ──────────────────────────────────────────────
const PREFIX = { addUser: 'au', newInspection: 'ni', addPatient: 'ap', reportCase: 'rc' };

function openModal(id) {
  document.getElementById('modal-' + id).classList.add('open');
  document.body.style.overflow = 'hidden';
}

function closeModal(id) {
  document.getElementById('modal-' + id).classList.remove('open');
  document.body.style.overflow = '';
  const p = PREFIX[id];
  const form = document.getElementById(p + '-form');
  const success = document.getElementById(p + '-success');
  if (form) { form.style.display = ''; }
  if (success) { success.classList.remove('show'); }
}

function submitForm(id) {
  const p = PREFIX[id];
  const form = document.getElementById(p + '-form');
  const success = document.getElementById(p + '-success');
  if (form) { form.style.display = 'none'; }
  if (success) { success.classList.add('show'); }
  setTimeout(() => closeModal(id), 1900);
}

// Close overlay on backdrop click
document.querySelectorAll('.overlay').forEach(function (overlay) {
  overlay.addEventListener('click', function (e) {
    if (e.target === overlay) {
      closeModal(overlay.id.replace('modal-', ''));
    }
  });
});

// Close with Escape key
document.addEventListener('keydown', function (e) {
  if (e.key === 'Escape') {
    document.querySelectorAll('.overlay.open').forEach(function (o) {
      closeModal(o.id.replace('modal-', ''));
    });
  }
});

// ─── LIVE STATS UPDATES ──────────────────────────────────────
setInterval(function () {
  const staff = document.getElementById('su-staff');
  const sessions = document.getElementById('su-sessions');
  if (staff) staff.textContent = Math.floor(44 + Math.random() * 7);
  if (sessions) sessions.textContent = Math.floor(57 + Math.random() * 9);
}, 3000);

// ─── CHART DATA ──────────────────────────────────────────────
const yearlyData = {
  '2026': [
    { label: 'Dengue', val: 38, color: '#ff8a65' },
    { label: 'Influenza', val: 61, color: '#86B6F6' },
    { label: 'TB', val: 12, color: '#B4D4FF' },
    { label: 'COVID-19', val: 25, color: '#176B87' },
    { label: 'Diarrhea', val: 19, color: '#4db6ac' },
    { label: 'Pneumonia', val: 9, color: '#ce93d8' }
  ],
  '2025': [
    { label: 'Dengue', val: 45, color: '#ff8a65' },
    { label: 'Influenza', val: 48, color: '#86B6F6' },
    { label: 'TB', val: 18, color: '#B4D4FF' },
    { label: 'COVID-19', val: 35, color: '#176B87' },
    { label: 'Diarrhea', val: 22, color: '#4db6ac' },
    { label: 'Pneumonia', val: 14, color: '#ce93d8' }
  ],
  '2024': [
    { label: 'Dengue', val: 30, color: '#ff8a65' },
    { label: 'Influenza', val: 55, color: '#86B6F6' },
    { label: 'TB', val: 15, color: '#B4D4FF' },
    { label: 'COVID-19', val: 50, color: '#176B87' },
    { label: 'Diarrhea', val: 28, color: '#4db6ac' },
    { label: 'Pneumonia', val: 11, color: '#ce93d8' }
  ]
};

// ─── APEXCHART INITIALISATION ──────────────────────────────
let chart = null;

function initChart(year) {
  const data = yearlyData[year] || yearlyData['2026'];
  const categories = data.map(d => d.label);
  const values = data.map(d => d.val);
  const colors = data.map(d => d.color);

  const options = {
    series: [{
      name: 'Cases',
      data: values
    }],
    chart: {
      type: 'bar',
      height: '100%',
      toolbar: { show: false },
      animations: { enabled: true, easing: 'easeinout', speed: 400 }
    },
    plotOptions: {
      bar: {
        borderRadius: 6,
        horizontal: false,
        columnWidth: '60%',
        distributed: true,
      }
    },
    colors: colors,
    dataLabels: { enabled: false },
    xaxis: {
      categories: categories,
      labels: { style: { fontSize: '11px', fontWeight: 600, colors: '#4a6080' } },
      axisBorder: { show: false },
      axisTicks: { show: false }
    },
    yaxis: {
      max: 80,
      tickAmount: 4,
      labels: { style: { fontSize: '10px', fontWeight: 600, colors: '#4a6080' } },
      title: { text: 'Cases', style: { fontSize: '10px', fontWeight: 600, color: '#4a6080' } }
    },
    grid: {
      borderColor: '#f1f5f9',
      strokeDashArray: 4,
      position: 'back',
      xaxis: { lines: { show: false } },
      yaxis: { lines: { show: true } }
    },
    annotations: {
      yaxis: [{
        y: 30,
        borderColor: '#ef4444',
        strokeDashArray: 6,
        label: {
          text: 'Alert Limit (30)',
          style: { color: '#ef4444', fontSize: '9px', fontWeight: 'bold', background: '#fef2f2', padding: { left: 6, right: 6, top: 2, bottom: 2 } },
          offsetX: -10,
          orientation: 'horizontal'
        }
      }]
    },
    tooltip: {
      y: { formatter: (val) => val + ' cases' },
      style: { fontSize: '11px' }
    },
    fill: { opacity: 0.9 }
  };

  const container = document.getElementById('chart-container');
  if (!container) return;

  // Destroy existing chart instance if any
  if (chart) {
    chart.destroy();
    chart = null;
  }

  chart = new ApexCharts(container, options);
  chart.render();
}

// ─── DOWNLOAD CSV ─────────────────────────────────────────────
function downloadChart() {
  const yearFilter = document.getElementById('year-filter');
  const year = yearFilter ? yearFilter.value : '2026';
  const cases = yearlyData[year];

  let csvContent = "data:text/csv;charset=utf-8,";
  csvContent += "Disease Case,Active Cases Count\n";

  for (let i = 0; i < cases.length; i++) {
    csvContent += cases[i].label + "," + cases[i].val + "\n";
  }

  const encodedUri = encodeURI(csvContent);
  const link = document.createElement("a");
  link.setAttribute("href", encodedUri);
  link.setAttribute("download", "case_metrics_overview_" + year + ".csv");
  document.body.appendChild(link);
  link.click();
  document.body.removeChild(link);
}

// ─── INIT ON DOM READY ──────────────────────────────────────
document.addEventListener('DOMContentLoaded', function () {
  // Initial chart
  initChart('2026');

  // Year filter change
  const filterEl = document.getElementById('year-filter');
  if (filterEl) {
    filterEl.addEventListener('change', function () {
      initChart(this.value);
    });
  }
});

// ─── UPTIME COUNTER ───────────────────────────────────────────
(function () {
  const START = new Date('2026-01-01T00:00:00').getTime();
  const displayEl = document.getElementById('uptime-display');
  const subEl = document.getElementById('uptime-sub');

  function pad(n) { return String(n).padStart(2, '0'); }

  function formatUptime(ms) {
    if (ms < 0) ms = 0;
    const days = Math.floor(ms / 86400000);
    const hours = Math.floor((ms % 86400000) / 3600000);
    const minutes = Math.floor((ms % 3600000) / 60000);
    if (days > 0) {
      return days + 'd ' + pad(hours) + 'h ' + pad(minutes) + 'm';
    }
    return pad(hours) + 'h ' + pad(minutes) + 'm';
  }

  function updateUptime() {
    const now = Date.now();
    const elapsed = now - START;
    displayEl.textContent = formatUptime(elapsed);
    const sinceDate = new Date(START);
    const options = { year: 'numeric', month: 'short', day: 'numeric', hour: '2-digit', minute: '2-digit' };
    subEl.textContent = 'Since ' + sinceDate.toLocaleDateString('en-US', options);
  }

  updateUptime();
  setInterval(updateUptime, 30000);
})();