<?php if (!isset($assetBasePath)) { $assetBasePath = ''; } ?>
  </div>

  
  <?php include_once __DIR__ . '/toast.php'; ?>
  
  <script src="<?= $assetBasePath; ?>assets/js/dashboard.js"></script>
  <script src="<?= $assetBasePath; ?>assets/js/modal-system.js"></script>
</body>
</html>