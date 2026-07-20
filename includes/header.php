<?php
$assetBasePath = str_repeat('../', substr_count(trim(dirname($_SERVER['PHP_SELF']), '/'), '/'));
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Civentral</title>
  <link rel="icon" type="image/png" href="<?= $assetBasePath; ?>assets/images/logo.png">
  
  <!-- Tailwind CSS -->
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
  <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
  
  <!-- Font Awesome 6 (Latest) - Loaded in head for priority -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
  
  <!-- Alternative: Use the full Font Awesome package with more icons -->
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" /> -->
  
  <style type="text/tailwindcss">
    @theme {
      --color-brand-light: #EEF5FF;
      --color-brand-border: #B4D4FF;
      --color-brand-medium: #86B6F6;
      --color-brand-dark: #176B87;
      --color-dash-bg: #F9FAFB;
      --color-c1: #B4D4FF;
      --color-c2: #86B6F6;
      --color-c3: #176B87;
      --color-c3d: #0d4f64;
    }
  </style>
  
  <!-- Your custom styles -->
  <link rel="stylesheet" href="<?= $assetBasePath; ?>assets/css/dashb-style.css">
</head>
<body class="bg-white font-sans antialiased text-slate-800 min-h-screen flex flex-col">

  <header class="bg-white border-b border-slate-200 h-20 px-6 flex items-center justify-between sticky top-0 z-40 shadow-xs shrink-0">
    <div class="flex items-center space-x-4 text-brand-dark">
        <div class="shrink-0 flex items-center justify-center">
          <img src="<?= $assetBasePath; ?>assets/images/logo.png" alt="Logo" class="h-16 w-auto object-contain">
        </div>
    <div class="flex flex-col">
      <span class="text-base font-black tracking-[0.15em] uppercase leading-none">CIVENTRAL</span>
      <span class="text-[9px] font-bold text-brand-medium tracking-widest uppercase mt-1">Caloocan Portal</span>
    </div>
  </div>

    <div class="flex items-center space-x-4">
      
      <div class="hidden md:flex items-center space-x-2 text-slate-500 font-mono text-xs font-semibold">
    <i class="fa-solid fa-calendar-day text-brand-medium"></i>
    <span id="headerClock">Loading System Time...</span>
</div>
      
      <div class="hidden md:block h-6 w-px bg-slate-200"></div>

      <button class="relative p-2 text-slate-400 hover:text-brand-dark rounded-lg hover:bg-slate-50 transition focus:outline-none cursor-pointer">
        <i class="fa-solid fa-bell text-lg"></i>
        <span class="absolute top-1.5 right-1.5 h-2 w-2 rounded-full bg-red-500 ring-2 ring-white"></span>
      </button>
      
      <div class="h-6 w-px bg-slate-200"></div>

      <div class="flex items-center space-x-2 p-1.5 rounded-lg text-left select-none">
        <div class="h-8 w-8 rounded-lg bg-brand-light border border-brand-border flex items-center justify-center text-brand-dark font-extrabold text-xs">
          JS
        </div>
        <div class="hidden sm:flex flex-col">
          <span class="text-xs font-bold text-slate-700 leading-none">Joshua Sierra</span>
          <span class="text-[9px] font-bold text-slate-400 uppercase mt-0.5 tracking-wider">admin</span>
        </div>
      </div>
    </div>
  </header>

  <div class="flex-1 flex relative">