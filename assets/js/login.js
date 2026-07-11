function togglePasswordVisibility() {
      const passwordInput = document.getElementById('password');
      const passwordIcon = document.getElementById('passwordIcon');
      
      if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        passwordIcon.classList.remove('fa-eye-slash');
        passwordIcon.classList.add('fa-eye');
      } else {
        passwordInput.type = 'password';
        passwordIcon.classList.remove('fa-eye');
        passwordIcon.classList.add('fa-eye-slash');
      }
    }

      // FOR THE FUCKING MODALS 
    function showStatusAlert(type, customMessage = "") {
      const modal = document.getElementById('statusModal');
      const icon = document.getElementById('modalIcon');
      const msgText = document.getElementById('modalMessage');

      modal.classList.remove('hidden');
      modal.className = "mt-4 border rounded-lg p-4 flex items-start space-x-3 transition-all duration-300";

      if (type === 'success') {
        modal.classList.add('border-green-200', 'bg-green-50', 'text-green-700');
        icon.innerHTML = '<i class="fa-solid fa-circle-check text-xl"></i>';
        msgText.textContent = customMessage || "Login successful. Redirecting...";
      } else if (type === 'error') {
        modal.classList.add('border-red-200', 'bg-red-50', 'text-red-700');
        icon.innerHTML = '<i class="fa-solid fa-circle-exclamation text-xl"></i>';
        msgText.textContent = customMessage || "Login failed. Please check your credentials.";
      } else if (type === 'maintenance') {
        modal.classList.add('border-brand-border', 'bg-brand-light', 'text-brand-dark');
        icon.innerHTML = '<i class="fa-solid fa-circle-info text-xl"></i>';
        msgText.textContent = customMessage || "System maintenance is scheduled for Sunday, 11:00 PM–1:00 AM. Save drafts before then.";
      }
    }

    function handleLogin(event) {
      event.preventDefault();
      const id = document.getElementById('employeeId').value;
      const pass = document.getElementById('password').value;
      
      if (id === 'maintenance') {
        showStatusAlert('maintenance');
      } else if (id === 'admin' && pass === '1234') {
        showStatusAlert('success');
      } else {
        showStatusAlert('error');
      }
    }