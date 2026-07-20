// assets/js/login.js
function togglePasswordVisibility() {
    const passwordInput = document.getElementById('password');
    const passwordIcon = document.getElementById('passwordIcon');
    
    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        passwordIcon.className = 'fa-solid fa-eye text-sm';
    } else {
        passwordInput.type = 'password';
        passwordIcon.className = 'fa-solid fa-eye-slash text-sm';
    }
}

function showModal(message, isSuccess = false) {
    const modal = document.getElementById('statusModal');
    const modalIcon = document.getElementById('modalIcon');
    const modalMessage = document.getElementById('modalMessage');
    
    modal.classList.remove('hidden', 'border-red-300', 'border-green-300', 'bg-red-50', 'bg-green-50');
    modal.classList.add('flex');
    
    if (isSuccess) {
        modal.classList.add('border-green-300', 'bg-green-50');
        modalIcon.innerHTML = '<i class="fa-solid fa-check-circle text-green-500 text-base"></i>';
    } else {
        modal.classList.add('border-red-300', 'bg-red-50');
        modalIcon.innerHTML = '<i class="fa-solid fa-exclamation-circle text-red-500 text-base"></i>';
    }
    
    modalMessage.textContent = message;
    
    // Auto-hide after 5 seconds
    setTimeout(() => {
        modal.classList.add('hidden');
        modal.classList.remove('flex');
    }, 5000);
}

async function handleLogin(event) {
    event.preventDefault();
    
    const employeeId = document.getElementById('employeeId').value.trim();
    const password = document.getElementById('password').value;
    const submitBtn = document.getElementById('loginButton');
    const originalText = submitBtn.textContent;
    
    // Basic validation
    if (!employeeId || !password) {
        showModal('Please fill in all fields', false);
        return;
    }
    
    // Disable button and show loading
    submitBtn.disabled = true;
    submitBtn.textContent = 'Signing in...';
    
    try {
        const formData = new FormData();
        formData.append('employee_id', employeeId);
        formData.append('password', password);
        
        // Use the current page URL
        const response = await fetch('login.php', {
            method: 'POST',
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            },
            body: formData
        });
        
        // Check if response is OK
        if (!response.ok) {
            const text = await response.text();
            console.error('Server response:', text);
            throw new Error(`HTTP error! status: ${response.status}`);
        }
        
        const data = await response.json();
        
        if (data.success) {
            showModal('Welcome back, ' + data.user.name + '! Redirecting...', true);
            
            setTimeout(() => {
                window.location.href = 'pages/dashboard.php';
            }, 1500);
        } else {
            showModal(data.message || 'Login failed. Please try again.', false);
        }
    } catch (error) {
        console.error('Login error:', error);
        showModal('Network error: ' + error.message, false);
    } finally {
        submitBtn.disabled = false;
        submitBtn.textContent = originalText;
    }
}

// Add event listener when DOM is loaded
document.addEventListener('DOMContentLoaded', function() {
    const loginForm = document.getElementById('loginForm');
    if (loginForm) {
        loginForm.removeEventListener('submit', handleLogin);
        loginForm.addEventListener('submit', handleLogin);
    }
});

// Enter key support for the password field
const passwordField = document.getElementById('password');
if (passwordField) {
    passwordField.addEventListener('keypress', function(e) {
        if (e.key === 'Enter') {
            document.getElementById('loginForm').dispatchEvent(new Event('submit'));
        }
    });
}