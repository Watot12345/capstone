 // ============================================================
  // 1. CASE FLOW
  // ============================================================
  const stages = document.querySelectorAll('.flow-stage');
  const flowFill = document.getElementById('flowFill');
  const stageDescText = document.getElementById('stageDescText');

  function updateFlow(activeStage) {
    const totalStages = stages.length;
    const progress = (activeStage / totalStages) * 100;
    flowFill.style.width = `${progress}%`;

    stages.forEach((btn, idx) => {
      const node = btn.querySelector('.stage-node');
      node.classList.remove('border-[#176B87]', 'bg-[#176B87]', 'text-white', 'shadow-md');
      node.classList.add('border-[#86B6F6]', 'bg-white', 'text-[#176B87]');
      if (idx + 1 <= activeStage) {
        node.classList.remove('border-[#86B6F6]', 'bg-white', 'text-[#176B87]');
        node.classList.add('border-[#176B87]', 'bg-[#176B87]', 'text-white', 'shadow-md');
      }
    });

    const activeBtn = stages[activeStage - 1];
    if (activeBtn) {
      stageDescText.textContent = activeBtn.dataset.function;
    }
  }

  stages.forEach((btn, index) => {
    btn.addEventListener('click', function() {
      const stage = parseInt(this.dataset.stage);
      updateFlow(stage);
    });
  });

  let currentStage = 1;
  document.getElementById('advanceBtn').addEventListener('click', function() {
    if (currentStage < stages.length) {
      currentStage++;
      updateFlow(currentStage);
    }
  });

  document.getElementById('resetBtn').addEventListener('click', function() {
    currentStage = 1;
    updateFlow(1);
  });

  // ============================================================
  // 2. MODULE ACCORDION
  // ============================================================
  document.querySelectorAll('.module-toggle').forEach(toggle => {
    toggle.addEventListener('click', function() {
      const panel = this.nextElementSibling;
      const isExpanded = this.getAttribute('aria-expanded') === 'true';
      this.setAttribute('aria-expanded', !isExpanded);
      panel.style.gridTemplateRows = isExpanded ? '0fr' : '1fr';
      this.querySelector('.chevron').style.transform = isExpanded ? 'rotate(0deg)' : 'rotate(180deg)';
    });
  });

  // ============================================================
  // 3. APEXCHARTS – LINE CHART
  // ============================================================
  const options = {
    series: [{
      name: 'Cases (last 7 days)',
      data: [142, 98, 76, 54, 31]
    }],
    chart: {
      type: 'line',
      height: 220,
      animations: {
        enabled: true,
        easing: 'easeinout',
        speed: 800,
        animateGradually: { enabled: true, delay: 150 },
        dynamicAnimation: { enabled: true, speed: 350 }
      },
      toolbar: { show: false },
      zoom: { enabled: false }
    },
    dataLabels: { enabled: false },
    stroke: {
      curve: 'smooth',
      width: 3,
      colors: ['#176B87']
    },
    markers: {
      size: 6,
      colors: ['#176B87'],
      strokeColors: '#fff',
      strokeWidth: 2,
      hover: { size: 8 }
    },
    fill: {
      type: 'gradient',
      gradient: {
        shade: 'light',
        type: 'vertical',
        shadeIntensity: 0.2,
        gradientToColors: ['#86B6F6'],
        inverseColors: false,
        opacityFrom: 0.9,
        opacityTo: 0.2,
        stops: [0, 100]
      }
    },
    xaxis: {
      categories: ['Water Quality', 'Waste Collection', 'Facility Insp.', 'Vector Control', 'Advisories'],
      labels: { style: { fontSize: '11px', colors: '#475569' } }
    },
    yaxis: {
      title: { text: 'Volume', style: { color: '#475569' } },
      min: 0
    },
    grid: { borderColor: '#e2e8f0' },
    tooltip: { theme: 'light' }
  };

  const chart = new ApexCharts(document.querySelector("#activityChart"), options);
  chart.render();

  // ============================================================
  // 4. FILTER (mock)
  // ============================================================
  document.getElementById('filterBtn').addEventListener('click', function() {
    const from = document.getElementById('dateFrom').value;
    const to = document.getElementById('dateTo').value;
    if (from && to) {
      alert(`Filtering from ${from} to ${to} (mock – would reload chart data from server)`);
      // In production: fetch new data and update chart with chart.updateSeries([{ data: [...] }])
    } else {
      alert('Please select both date fields.');
    }
  });

  // ============================================================
  // 5. EXPORT CSV
  // ============================================================
  document.getElementById('exportBtn').addEventListener('click', function() {
    const rows = [
      ['Module', 'Total', 'Resolved', 'In Progress', 'Flagged'],
      ['Water Quality', '142', '88', '32', '22'],
      ['Waste Collection', '98', '61', '25', '12'],
      ['Facility Inspections', '76', '41', '24', '11'],
      ['Vector Control', '54', '28', '16', '10'],
      ['Community Advisories', '31', '18', '8', '5']
    ];
    let csv = rows.map(row => row.join(',')).join('\n');
    const blob = new Blob([csv], { type: 'text/csv' });
    const url = URL.createObjectURL(blob);
    const a = document.createElement('a');
    a.href = url;
    a.download = 'module_activity_summary.csv';
    a.click();
    URL.revokeObjectURL(url);
  });