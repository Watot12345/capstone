(function () {
  // =====================================================
  // SERVICE REQUESTS TREND - Line Chart
  // =====================================================
  // UPDATED
  const serviceMonths = ['Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'];
  const serviceData = {
    appointments: [6, 8, 10, 11, 9, 7],
    emails: [4, 5, 6, 7, 5, 3],
    requests: [3, 4, 5, 6, 4, 2]
  };
  const serviceColors = {
    appointments: '#3b82f6',
    emails: '#10b981',
    requests: '#f59e0b'
  };
  let serviceVisibility = {
    appointments: true,
    emails: true,
    requests: true
  };

  function drawServiceChart() {
    const group = document.getElementById('serviceLineGroup');
    const dots = document.getElementById('serviceDotsGroup');
    if (!group || !dots) return;
    group.innerHTML = '';
    dots.innerHTML = '';

    const width = 500,
      height = 200;
    const margin = { top: 20, bottom: 30, left: 40, right: 20 };
    const chartWidth = width - margin.left - margin.right;
    const chartHeight = height - margin.top - margin.bottom;
    const maxVal = 12;

    function getX(idx) { return margin.left + (idx / (serviceMonths.length - 1)) * chartWidth; }

    function getY(val) { return margin.top + chartHeight - (val / maxVal) * chartHeight; }

    Object.keys(serviceData).forEach(series => {
      if (!serviceVisibility[series]) return;
      const values = serviceData[series];
      const color = serviceColors[series];
      let pathD = '';
      values.forEach((val, idx) => {
        const x = getX(idx);
        const y = getY(val);
        if (idx === 0) pathD += `M ${x} ${y}`;
        else pathD += ` L ${x} ${y}`;
      });
      const path = document.createElementNS('http://www.w3.org/2000/svg', 'path');
      path.setAttribute('d', pathD);
      path.setAttribute('stroke', color);
      path.setAttribute('stroke-width', '2.5');
      path.setAttribute('fill', 'none');
      path.setAttribute('stroke-linecap', 'round');
      path.setAttribute('stroke-linejoin', 'round');
      group.appendChild(path);

      values.forEach((val, idx) => {
        const x = getX(idx);
        const y = getY(val);
        const circle = document.createElementNS('http://www.w3.org/2000/svg', 'circle');
        circle.setAttribute('cx', x);
        circle.setAttribute('cy', y);
        circle.setAttribute('r', '4');
        circle.setAttribute('fill', color);
        circle.setAttribute('stroke', '#fff');
        circle.setAttribute('stroke-width', '1');
        dots.appendChild(circle);
      });
    });
  }

  drawServiceChart();

  document.querySelectorAll('.service-legend').forEach(item => {
    item.addEventListener('click', function () {
      const series = this.dataset.series;
      serviceVisibility[series] = !serviceVisibility[series];
      const dot = this.querySelector('.inline-block');
      dot.style.opacity = serviceVisibility[series] ? '1' : '0.3';
      drawServiceChart();
    });
  });

  // =====================================================
  // DISEASE SURVEILLANCE - Line Chart
  // =====================================================
  const diseaseMonths = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'];
  const diseaseData = {
    dengue: [2, 4, 3, 5, 7, 4],
    influenza: [5, 7, 6, 8, 6, 3],
    foodPoisoning: [1, 2, 4, 3, 5, 2],
    leptospirosis: [0, 1, 2, 1, 3, 1]
  };
  const diseaseColors = {
    dengue: '#ef4444',
    influenza: '#eab308',
    foodPoisoning: '#22c55e',
    leptospirosis: '#a855f7'
  };
  let diseaseVisibility = {
    dengue: true,
    influenza: true,
    foodPoisoning: true,
    leptospirosis: true
  };

  function drawDiseaseChart() {
    const group = document.getElementById('diseaseLineGroup');
    const dots = document.getElementById('diseaseDotsGroup');
    if (!group || !dots) return;
    group.innerHTML = '';
    dots.innerHTML = '';

    const width = 500,
      height = 200;
    const margin = { top: 20, bottom: 30, left: 40, right: 20 };
    const chartWidth = width - margin.left - margin.right;
    const chartHeight = height - margin.top - margin.bottom;
    const maxVal = 10;

    function getX(idx) { return margin.left + (idx / (diseaseMonths.length - 1)) * chartWidth; }

    function getY(val) { return margin.top + chartHeight - (val / maxVal) * chartHeight; }

    Object.keys(diseaseData).forEach(series => {
      if (!diseaseVisibility[series]) return;
      const values = diseaseData[series];
      const color = diseaseColors[series];
      let pathD = '';
      values.forEach((val, idx) => {
        const x = getX(idx);
        const y = getY(val);
        if (idx === 0) pathD += `M ${x} ${y}`;
        else pathD += ` L ${x} ${y}`;
      });
      const path = document.createElementNS('http://www.w3.org/2000/svg', 'path');
      path.setAttribute('d', pathD);
      path.setAttribute('stroke', color);
      path.setAttribute('stroke-width', '2.5');
      path.setAttribute('fill', 'none');
      path.setAttribute('stroke-linecap', 'round');
      path.setAttribute('stroke-linejoin', 'round');
      group.appendChild(path);

      values.forEach((val, idx) => {
        const x = getX(idx);
        const y = getY(val);
        const circle = document.createElementNS('http://www.w3.org/2000/svg', 'circle');
        circle.setAttribute('cx', x);
        circle.setAttribute('cy', y);
        circle.setAttribute('r', '4');
        circle.setAttribute('fill', color);
        circle.setAttribute('stroke', '#fff');
        circle.setAttribute('stroke-width', '1');
        dots.appendChild(circle);
      });
    });
  }

  drawDiseaseChart();

  document.querySelectorAll('.disease-legend').forEach(item => {
    item.addEventListener('click', function () {
      const series = this.dataset.series;
      diseaseVisibility[series] = !diseaseVisibility[series];
      const dot = this.querySelector('.inline-block');
      dot.style.opacity = diseaseVisibility[series] ? '1' : '0.3';
      drawDiseaseChart();
    });
  });

  // =====================================================
  // SERVICE DISTRIBUTION - Donut Chart & Tooltip
  // =====================================================
  function drawDonut() {
    const container = document.getElementById('donutSegments');
    if (!container) return;
    container.innerHTML = '';

    const segments = [
      { label: 'Health Center', percentage: 35.7, color: '#3b82f6' },
      { label: 'Sanitation', percentage: 42.9, color: '#10b981' },
      { label: 'Immunization', percentage: 21.4, color: '#f59e0b' },
      { label: 'Wastewater', percentage: 0, color: '#8b5cf6' }
    ];

    const radius = 80;
    const circumference = 2 * Math.PI * radius;
    let cumulativeOffset = 0;

    segments.forEach(seg => {
      const percent = seg.percentage;
      if (percent === 0) return;

      const dashLength = (percent / 100) * circumference;
      const dashArray = dashLength + ' ' + (circumference - dashLength);
      const circle = document.createElementNS('http://www.w3.org/2000/svg', 'circle');
      circle.setAttribute('cx', '100');
      circle.setAttribute('cy', '100');
      circle.setAttribute('r', radius);
      circle.setAttribute('fill', 'none');
      circle.setAttribute('stroke', seg.color);
      circle.setAttribute('stroke-width', '30');
      circle.setAttribute('stroke-dasharray', dashArray);
      circle.setAttribute('stroke-dashoffset', -cumulativeOffset);
      circle.setAttribute('stroke-linecap', 'round');
      circle.style.cursor = 'pointer';

      // Store data for tooltip
      circle.dataset.label = seg.label;
      circle.dataset.percentage = seg.percentage;

      // Compute midpoint angle (12 o'clock, clockwise)
      const startAngleFrom3 = (-cumulativeOffset / circumference) * 360;
      const midAngleFrom3 = startAngleFrom3 + (dashLength / 2 / circumference) * 360;
      let midAngleFromTop = midAngleFrom3 + 90;
      midAngleFromTop = ((midAngleFromTop % 360) + 360) % 360;
      circle.dataset.midpointAngle = midAngleFromTop;

      container.appendChild(circle);
      cumulativeOffset += dashLength;
    });
  }

  drawDonut();

  // =====================================================
  // TOOLTIP – FIXED THE BUG: use absolute positioning
  // relative to the chart's own container instead of
  // "fixed" positioning relative to the viewport.
  // (backdrop-blur on ancestor cards creates a new
  // containing block for position:fixed elements, which
  // was throwing the tooltip's coordinates off completely.)
  // =====================================================
  function initDonutTooltip() {
    const donutSvg = document.getElementById('donutSvg');
    const tooltip = document.getElementById('donutTooltip');
    const tooltipText = document.getElementById('tooltipText');

    if (!donutSvg || !tooltip || !tooltipText) return;

    // The wrapper div that has class "relative" around the SVG + tooltip
    const container = donutSvg.parentElement;

    tooltip.style.position = 'absolute';
    tooltip.style.left = '0px';
    tooltip.style.top = '0px';
    tooltip.style.transform = 'translate(-50%, -50%)';
    tooltip.style.opacity = '0'; // start hidden
    tooltip.style.zIndex = '50';

    const circles = document.querySelectorAll('#donutSegments circle');
    if (circles.length === 0) {
      setTimeout(initDonutTooltip, 300);
      return;
    }

    circles.forEach(circle => {
      const label = circle.dataset.label;
      const percentage = parseFloat(circle.dataset.percentage);
      const midAngleDeg = parseFloat(circle.dataset.midpointAngle);
      const angleRad = midAngleDeg * Math.PI / 180;

      circle.style.cursor = 'pointer';

      const positionTooltip = () => {
        const svgRect = donutSvg.getBoundingClientRect();
        const containerRect = container.getBoundingClientRect();

        // Center of the SVG, expressed relative to the container
        // (not the viewport) — this is what makes it work under
        // a backdrop-blur ancestor.
        const centerX = (svgRect.left - containerRect.left) + svgRect.width / 2;
        const centerY = (svgRect.top - containerRect.top) + svgRect.height / 2;

        const viewBoxSize = 200;
        const svgSize = Math.min(donutSvg.clientWidth, donutSvg.clientHeight);
        const scale = svgSize / viewBoxSize;
        const ringCenterRadius = 80 * scale; // centre of the ring

        const x = centerX + ringCenterRadius * Math.sin(angleRad);
        const y = centerY - ringCenterRadius * Math.cos(angleRad);

        // Update position and text
        tooltip.style.left = x + 'px';
        tooltip.style.top = y + 'px';
        tooltipText.textContent = label + ' (' + percentage + '%)';
      };

      circle.addEventListener('mouseenter', function () {
        positionTooltip();
        tooltip.style.opacity = '1';
      });

      circle.addEventListener('mousemove', function () {
        positionTooltip();
      });

      circle.addEventListener('mouseleave', function () {
        tooltip.style.opacity = '0';
      });
    });
  }

  // Run after DOM ready
  if (document.readyState === 'complete') {
    setTimeout(initDonutTooltip, 300);
  } else {
    window.addEventListener('load', function () {
      setTimeout(initDonutTooltip, 300);
    });
  }

})();