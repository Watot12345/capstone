hsms/
│
├── 📁 admin/                          # Admin Panel (Web)
│   ├── 📁 assets/
│   │   ├── 📁 css/
│   │   │   ├── style.css              # Custom styles
│   │   │   └── tailwind.css           # Tailwind compiled
│   │   ├── 📁 js/
│   │   │   ├── dashboard.js           # Dashboard functionality
│   │   │   ├── charts.js              # Chart.js integration
│   │   │   ├── datatables.js          # DataTables integration
│   │   │   └── custom.js              # Custom admin scripts
│   │   ├── 📁 images/
│   │   │   ├── logo.png
│   │   │   ├── favicon.ico
│   │   │   └── icons/
│   │   └── 📁 vendor/                 # Third-party libraries
│   │       ├── 📁 chart.js/
│   │       ├── 📁 datatables/
│   │       └── 📁 fontawesome/
│   │
│   ├── 📁 includes/                   # PHP includes
│   │   ├── config.php                 # Database configuration
│   │   ├── functions.php              # Helper functions
│   │   ├── auth.php                   # Authentication functions
│   │   ├── session.php                # Session management
│   │   ├── header.php                 # Admin header
│   │   ├── sidebar.php                # Admin sidebar
│   │   └── footer.php                 # Admin footer
│   │
│   ├── 📁 modules/                    # Admin modules
│   │   ├── 📁 dashboard/
│   │   │   ├── index.php              # Main dashboard
│   │   │   ├── kpi.php                # KPI widgets
│   │   │   └── activity.php           # Activity summary
│   │   │
│   │   ├── 📁 health-center/
│   │   │   ├── index.php              # Health center main
│   │   │   ├── patients.php           # Patient management
│   │   │   ├── appointments.php       # Appointment management
│   │   │   ├── consultations.php      # Consultation records
│   │   │   ├── prescriptions.php      # Prescription management
│   │   │   ├── referrals.php          # Referral management
│   │   │   ├── triage.php             # Triage management
│   │   │   ├── medical-records.php    # Medical records
│   │   │   ├── add-patient.php        # Add patient form
│   │   │   ├── edit-patient.php       # Edit patient form
│   │   │   ├── view-patient.php       # View patient details
│   │   │   └── ajax/
│   │   │       ├── get-patients.php
│   │   │       ├── get-appointments.php
│   │   │       └── save-consultation.php
│   │   │
│   │   ├── 📁 sanitation/
│   │   │   ├── index.php              # Sanitation main
│   │   │   ├── permits.php            # Permit management
│   │   │   ├── inspections.php        # Inspection management
│   │   │   ├── payments.php           # Payment management
│   │   │   ├── documents.php          # Document management
│   │   │   ├── renewals.php           # Renewal management
│   │   │   ├── violations.php         # Violation tracking
│   │   │   ├── add-permit.php         # Add permit form
│   │   │   └── ajax/
│   │   │       ├── get-permits.php
│   │   │       └── update-status.php
│   │   │
│   │   ├── 📁 immunization/
│   │   │   ├── index.php              # Immunization main
│   │   │   ├── children.php           # Child records
│   │   │   ├── vaccinations.php       # Vaccination tracking
│   │   │   ├── vaccine-inventory.php  # Vaccine inventory
│   │   │   ├── growth-charts.php      # Growth monitoring
│   │   │   ├── nutrition.php          # Nutrition assessment
│   │   │   ├── add-child.php          # Add child form
│   │   │   └── ajax/
│   │   │       ├── get-children.php
│   │   │       └── record-vaccine.php
│   │   │
│   │   ├── 📁 wastewater/
│   │   │   ├── index.php              # Wastewater main
│   │   │   ├── septic-tanks.php       # Septic tank registry
│   │   │   ├── service-requests.php   # Service requests
│   │   │   ├── maintenance.php        # Maintenance records
│   │   │   ├── providers.php          # Service providers
│   │   │   ├── billing.php            # Billing management
│   │   │   ├── add-request.php        # Add request form
│   │   │   └── ajax/
│   │   │       ├── get-requests.php
│   │   │       └── assign-technician.php
│   │   │
│   │   ├── 📁 surveillance/
│   │   │   ├── index.php              # Surveillance main
│   │   │   ├── cases.php              # Case reports
│   │   │   ├── outbreaks.php          # Outbreak management
│   │   │   ├── contact-tracing.php    # Contact tracing
│   │   │   ├── mapping.php            # GIS mapping
│   │   │   ├── alerts.php             # Real-time alerts
│   │   │   ├── response.php           # Response management
│   │   │   ├── report-case.php        # Report case form
│   │   │   └── ajax/
│   │   │       ├── get-cases.php
│   │   │       └── create-outbreak.php
│   │   │
│   │   ├── 📁 analytics/
│   │   │   ├── index.php              # Analytics dashboard
│   │   │   ├── ai-insights.php        # AI insights
│   │   │   ├── trends.php             # Trend analysis
│   │   │   ├── predictive.php         # Predictive analytics
│   │   │   └── performance.php        # Performance metrics
│   │   │
│   │   ├── 📁 reports/
│   │   │   ├── index.php              # Reports main
│   │   │   ├── generate.php           # Custom report generation
│   │   │   ├── scheduled.php          # Scheduled reports
│   │   │   ├── templates.php          # Report templates
│   │   │   └── export.php             # Export functionality
│   │   │
│   │   └── 📁 compliance/
│   │       ├── index.php              # Compliance main
│   │       ├── monitoring.php         # Compliance monitoring
│   │       ├── violations.php         # Violation tracking
│   │       ├── corrective.php         # Corrective actions
│   │       └── regulatory.php         # Regulatory compliance
│   │
│   ├── 📁 system/                     # System administration
│   │   ├── users.php                  # User management
│   │   ├── roles.php                  # Role management
│   │   ├── permissions.php            # Permission management
│   │   ├── logs.php                   # System logs
│   │   ├── settings.php               # System settings
│   │   ├── backup.php                 # Backup management
│   │   └── audit.php                  # Audit trail
│   │
│   ├── 📁 auth/                       # Authentication
│   │   ├── login.php                  # Login page
│   │   ├── logout.php                 # Logout
│   │   ├── forgot-password.php        # Forgot password
│   │   ├── reset-password.php         # Reset password
│   │   └── verify.php                 # Email verification
│   │
│   └── index.php                      # Admin entry point
│
├── 📁 staff/                          # Staff Panel (Web)
│   ├── 📁 assets/
│   │   ├── 📁 css/
│   │   │   ├── style.css
│   │   │   └── tailwind.css
│   │   ├── 📁 js/
│   │   │   ├── staff.js
│   │   │   └── custom.js
│   │   └── 📁 images/
│   │
│   ├── 📁 includes/
│   │   ├── config.php
│   │   ├── functions.php
│   │   ├── auth.php
│   │   ├── header.php
│   │   ├── sidebar.php
│   │   └── footer.php
│   │
│   ├── 📁 modules/
│   │   ├── 📁 health-center/
│   │   │   ├── index.php
│   │   │   ├── patients.php
│   │   │   ├── appointments.php
│   │   │   ├── consultations.php
│   │   │   └── triage.php
│   │   ├── 📁 sanitation/
│   │   │   ├── index.php
│   │   │   ├── permits.php
│   │   │   └── inspections.php
│   │   ├── 📁 immunization/
│   │   │   ├── index.php
│   │   │   ├── children.php
│   │   │   └── vaccinations.php
│   │   ├── 📁 wastewater/
│   │   │   ├── index.php
│   │   │   ├── requests.php
│   │   │   └── maintenance.php
│   │   └── 📁 surveillance/
│   │       ├── index.php
│   │       ├── cases.php
│   │       └── tracing.php
│   │
│   ├── 📁 auth/
│   │   ├── login.php
│   │   └── logout.php
│   │
│   └── index.php                      # Staff entry point
│
├── 📁 mobile/                         # Mobile API (Citizen)
│   ├── 📁 api/
│   │   ├── auth.php                   # Authentication endpoints
│   │   ├── appointments.php           # Appointment endpoints
│   │   ├── permits.php                # Permit endpoints
│   │   ├── vaccines.php               # Vaccine endpoints
│   │   ├── services.php               # Service endpoints
│   │   ├── requests.php               # Request endpoints
│   │   └── reports.php                # Report endpoints
│   │
│   ├── 📁 includes/
│   │   ├── config.php
│   │   ├── database.php
│   │   ├── functions.php
│   │   └── auth.php
│   │
│   └── index.php                      # API entry point
│
├── 📁 database/                       # Database files
│   ├── 📁 migrations/
│   │   ├── 001_create_users_table.sql
│   │   ├── 002_create_patients_table.sql
│   │   ├── 003_create_appointments_table.sql
│   │   ├── 004_create_consultations_table.sql
│   │   ├── 005_create_prescriptions_table.sql
│   │   ├── 006_create_permits_table.sql
│   │   ├── 007_create_inspections_table.sql
│   │   ├── 008_create_children_table.sql
│   │   ├── 009_create_vaccinations_table.sql
│   │   ├── 010_create_septic_tanks_table.sql
│   │   ├── 011_create_cases_table.sql
│   │   └── 012_create_audit_logs_table.sql
│   │
│   ├── 📁 seeds/
│   │   ├── roles.sql
│   │   ├── users.sql
│   │   ├── patients.sql
│   │   └── settings.sql
│   │
│   └── backup.sql                     # Full backup
│
├── 📁 logs/                           # System logs
│   ├── error.log
│   ├── access.log
│   └── audit.log
│
├── 📁 uploads/                        # File uploads
│   ├── 📁 patients/
│   ├── 📁 permits/
│   ├── 📁 vaccines/
│   ├── 📁 profiles/
│   └── 📁 reports/
│
├── 📁 vendor/                         # Composer dependencies
│   ├── 📁 phpmailer/
│   ├── 📁 twig/
│   └── 📁 dompdf/
│
├── 📁 config/                         # Configuration files
│   ├── database.php                   # Database config
│   ├── app.php                        # App config
│   ├── mail.php                       # Mail config
│   └── security.php                   # Security config
│
├── 📁 public/                         # Public assets
│   ├── 📁 css/
│   │   ├── app.css                    # Compiled CSS
│   │   └── tailwind.css
│   ├── 📁 js/
│   │   ├── app.js
│   │   └── vendor.js
│   └── index.html
│
├── .env                               # Environment variables
├── .htaccess                          # Apache configuration
├── composer.json                      # PHP dependencies
├── package.json                       # Node.js dependencies
├── tailwind.config.js                 # Tailwind configuration
├── webpack.config.js                  # Webpack configuration
└── README.md                          # Project documentation

.htaccess (URL Rewriting)
apache
RewriteEngine On

# Force HTTPS
# RewriteCond %{HTTPS} off
# RewriteRule ^(.*)$ https://%{HTTP_HOST}/$1 [R=301,L]

# Remove .php extension
RewriteCond %{REQUEST_FILENAME}.php -f
RewriteRule ^(.*)$ $1.php [NC,L]

# Admin routes
RewriteRule ^admin/?$ admin/index.php [NC,L]
RewriteRule ^admin/([a-zA-Z0-9_-]+)/?$ admin/modules/$1/index.php [NC,L]

# API routes
RewriteRule ^api/([a-zA-Z0-9_-]+)/?$ mobile/api/$1.php [NC,L]

# 404 Error
ErrorDocument 404 /404.php

# admin/.htaccess
RewriteEngine On

# Remove .php extension
RewriteCond %{REQUEST_FILENAME}.php -f
RewriteRule ^(.*?)/?$ $1.php [L]

# Clean URL routing
RewriteRule ^module/([a-zA-Z0-9_-]+)/([a-zA-Z0-9_-]+)/?$ modules/$1/$2.php [L]
RewriteRule ^module/([a-zA-Z0-9_-]+)/?$ modules/$1/index.php [L]

# Example:
# /module/health-center/patients → /admin/modules/health-center/patients.php
# /module/health-center → /admin/modules/health-center/index.php


SAMPLE FILES

1. admin/includes/config.php
php
<?php
// Database configuration
define('DB_HOST', 'localhost');
define('DB_NAME', 'hsms_db');
define('DB_USER', 'root');
define('DB_PASS', '');

// Application configuration
define('APP_NAME', 'Health & Sanitation Management System');
define('APP_URL', 'http://localhost/hsms');
define('APP_VERSION', '1.0.0');

// Session configuration
ini_set('session.cookie_httponly', 1);
ini_set('session.use_only_cookies', 1);
ini_set('session.cookie_secure', 0); // Set to 1 for HTTPS

// Timezone
date_default_timezone_set('Asia/Manila');

// Error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database connection
function getDB() {
    try {
        $pdo = new PDO(
            "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME,
            DB_USER,
            DB_PASS
        );
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $pdo;
    } catch(PDOException $e) {
        die("Connection failed: " . $e->getMessage());
    }
}
?>




4. admin/includes/sidebar.php

<aside class="w-64 bg-white border-r border-gray-200">
    <div class="p-4 border-b border-gray-200">
        <h1 class="text-xl font-bold text-blue-600">HSMS</h1>
        <p class="text-xs text-gray-500">Caloocan City Health</p>
    </div>
    
    <nav class="p-4">
        <!-- Main Controls -->
        <div class="mb-4">
            <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Main Controls</p>
            
            <!-- Dashboard -->
            <a href="<?php echo APP_URL; ?>/admin/modules/dashboard/" 
               class="flex items-center px-4 py-2 mt-2 text-gray-700 hover:bg-blue-50 hover:text-blue-600 rounded-lg">
                <i class="fas fa-chart-pie w-5"></i>
                <span class="ml-3">Dashboard</span>
            </a>
            
            <!-- System Overview Dropdown -->
            <div x-data="{ open: false }" class="relative">
                <button @click="open = !open" 
                        class="flex items-center justify-between w-full px-4 py-2 mt-1 text-gray-700 hover:bg-blue-50 hover:text-blue-600 rounded-lg">
                    <span class="flex items-center">
                        <i class="fas fa-eye w-5"></i>
                        <span class="ml-3">System Overview</span>
                    </span>
                    <i class="fas fa-chevron-down text-xs"></i>
                </button>
                <div x-show="open" class="ml-4 mt-1">
                    <a href="<?php echo APP_URL; ?>/admin/modules/dashboard/kpi.php" 
                       class="block px-4 py-2 text-sm text-gray-600 hover:bg-blue-50 hover:text-blue-600 rounded-lg">
                        <i class="fas fa-chart-bar w-4"></i> Dashboard KPIs
                    </a>
                    <a href="<?php echo APP_URL; ?>/admin/modules/dashboard/activity.php" 
                       class="block px-4 py-2 text-sm text-gray-600 hover:bg-blue-50 hover:text-blue-600 rounded-lg">
                        <i class="fas fa-activity w-4"></i> Module Activity
                    </a>
                    <a href="<?php echo APP_URL; ?>/admin/modules/dashboard/alerts.php" 
                       class="block px-4 py-2 text-sm text-gray-600 hover:bg-blue-50 hover:text-blue-600 rounded-lg">
                        <i class="fas fa-bell w-4"></i> Alerts & Notifications
                    </a>
                    <a href="<?php echo APP_URL; ?>/admin/modules/dashboard/health.php" 
                       class="block px-4 py-2 text-sm text-gray-600 hover:bg-blue-50 hover:text-blue-600 rounded-lg">
                        <i class="fas fa-heartbeat w-4"></i> System Health
                    </a>
                </div>
            </div>
            
            <!-- Analytics -->
            <a href="<?php echo APP_URL; ?>/admin/modules/analytics/" 
               class="flex items-center px-4 py-2 mt-1 text-gray-700 hover:bg-blue-50 hover:text-blue-600 rounded-lg">
                <i class="fas fa-chart-line w-5"></i>
                <span class="ml-3">Analytics</span>
            </a>
            
            <!-- Reports -->
            <a href="<?php echo APP_URL; ?>/admin/modules/reports/" 
               class="flex items-center px-4 py-2 mt-1 text-gray-700 hover:bg-blue-50 hover:text-blue-600 rounded-lg">
                <i class="fas fa-file-alt w-5"></i>
                <span class="ml-3">Reports</span>
            </a>
            
            <!-- Compliance -->
            <a href="<?php echo APP_URL; ?>/admin/modules/compliance/" 
               class="flex items-center px-4 py-2 mt-1 text-gray-700 hover:bg-blue-50 hover:text-blue-600 rounded-lg">
                <i class="fas fa-gavel w-5"></i>
                <span class="ml-3">Compliance</span>
            </a>
        </div>
        
        <!-- Modules -->
        <div class="mb-4">
            <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Modules</p>
            
            <!-- Health Center -->
            <div x-data="{ open: false }" class="relative">
                <button @click="open = !open" 
                        class="flex items-center justify-between w-full px-4 py-2 mt-2 text-gray-700 hover:bg-blue-50 hover:text-blue-600 rounded-lg">
                    <span class="flex items-center">
                        <i class="fas fa-hospital w-5"></i>
                        <span class="ml-3">Health Center</span>
                    </span>
                    <i class="fas fa-chevron-down text-xs"></i>
                </button>
                <div x-show="open" class="ml-4 mt-1">
                    <a href="<?php echo APP_URL; ?>/admin/modules/health-center/patients.php" 
                       class="block px-4 py-2 text-sm text-gray-600 hover:bg-blue-50 hover:text-blue-600 rounded-lg">
                        <i class="fas fa-users w-4"></i> Patients
                    </a>
                    <a href="<?php echo APP_URL; ?>/admin/modules/health-center/appointments.php" 
                       class="block px-4 py-2 text-sm text-gray-600 hover:bg-blue-50 hover:text-blue-600 rounded-lg">
                        <i class="fas fa-calendar w-4"></i> Appointments
                    </a>
                    <a href="<?php echo APP_URL; ?>/admin/modules/health-center/consultations.php" 
                       class="block px-4 py-2 text-sm text-gray-600 hover:bg-blue-50 hover:text-blue-600 rounded-lg">
                        <i class="fas fa-stethoscope w-4"></i> Consultations
                    </a>
                    <a href="<?php echo APP_URL; ?>/admin/modules/health-center/prescriptions.php" 
                       class="block px-4 py-2 text-sm text-gray-600 hover:bg-blue-50 hover:text-blue-600 rounded-lg">
                        <i class="fas fa-prescription w-4"></i> Prescriptions
                    </a>
                    <a href="<?php echo APP_URL; ?>/admin/modules/health-center/referrals.php" 
                       class="block px-4 py-2 text-sm text-gray-600 hover:bg-blue-50 hover:text-blue-600 rounded-lg">
                        <i class="fas fa-ambulance w-4"></i> Referrals
                    </a>
                    <a href="<?php echo APP_URL; ?>/admin/modules/health-center/triage.php" 
                       class="block px-4 py-2 text-sm text-gray-600 hover:bg-blue-50 hover:text-blue-600 rounded-lg">
                        <i class="fas fa-heart w-4"></i> Triage
                    </a>
                    <a href="<?php echo APP_URL; ?>/admin/modules/health-center/medical-records.php" 
                       class="block px-4 py-2 text-sm text-gray-600 hover:bg-blue-50 hover:text-blue-600 rounded-lg">
                        <i class="fas fa-folder w-4"></i> Medical Records
                    </a>
                </div>
            </div>
            
            <!-- Sanitation -->
            <div x-data="{ open: false }" class="relative">
                <button @click="open = !open" 
                        class="flex items-center justify-between w-full px-4 py-2 mt-1 text-gray-700 hover:bg-blue-50 hover:text-blue-600 rounded-lg">
                    <span class="flex items-center">
                        <i class="fas fa-clipboard-check w-5"></i>
                        <span class="ml-3">Sanitation</span>
                    </span>
                    <i class="fas fa-chevron-down text-xs"></i>
                </button>
                <div x-show="open" class="ml-4 mt-1">
                    <a href="<?php echo APP_URL; ?>/admin/modules/sanitation/permits.php" 
                       class="block px-4 py-2 text-sm text-gray-600 hover:bg-blue-50 hover:text-blue-600 rounded-lg">
                        <i class="fas fa-file-signature w-4"></i> Permits
                    </a>
                    <a href="<?php echo APP_URL; ?>/admin/modules/sanitation/inspections.php" 
                       class="block px-4 py-2 text-sm text-gray-600 hover:bg-blue-50 hover:text-blue-600 rounded-lg">
                        <i class="fas fa-search w-4"></i> Inspections
                    </a>
                    <a href="<?php echo APP_URL; ?>/admin/modules/sanitation/payments.php" 
                       class="block px-4 py-2 text-sm text-gray-600 hover:bg-blue-50 hover:text-blue-600 rounded-lg">
                        <i class="fas fa-money-bill w-4"></i> Payments
                    </a>
                    <a href="<?php echo APP_URL; ?>/admin/modules/sanitation/documents.php" 
                       class="block px-4 py-2 text-sm text-gray-600 hover:bg-blue-50 hover:text-blue-600 rounded-lg">
                        <i class="fas fa-file-alt w-4"></i> Documents
                    </a>
                    <a href="<?php echo APP_URL; ?>/admin/modules/sanitation/renewals.php" 
                       class="block px-4 py-2 text-sm text-gray-600 hover:bg-blue-50 hover:text-blue-600 rounded-lg">
                        <i class="fas fa-undo w-4"></i> Renewals
                    </a>
                </div>
            </div>
            
            <!-- Immunization -->
            <div x-data="{ open: false }" class="relative">
                <button @click="open = !open" 
                        class="flex items-center justify-between w-full px-4 py-2 mt-1 text-gray-700 hover:bg-blue-50 hover:text-blue-600 rounded-lg">
                    <span class="flex items-center">
                        <i class="fas fa-syringe w-5"></i>
                        <span class="ml-3">Immunization</span>
                    </span>
                    <i class="fas fa-chevron-down text-xs"></i>
                </button>
                <div x-show="open" class="ml-4 mt-1">
                    <a href="<?php echo APP_URL; ?>/admin/modules/immunization/children.php" 
                       class="block px-4 py-2 text-sm text-gray-600 hover:bg-blue-50 hover:text-blue-600 rounded-lg">
                        <i class="fas fa-child w-4"></i> Children
                    </a>
                    <a href="<?php echo APP_URL; ?>/admin/modules/immunization/vaccinations.php" 
                       class="block px-4 py-2 text-sm text-gray-600 hover:bg-blue-50 hover:text-blue-600 rounded-lg">
                        <i class="fas fa-vaccine w-4"></i> Vaccinations
                    </a>
                    <a href="<?php echo APP_URL; ?>/admin/modules/immunization/vaccine-inventory.php" 
                       class="block px-4 py-2 text-sm text-gray-600 hover:bg-blue-50 hover:text-blue-600 rounded-lg">
                        <i class="fas fa-boxes w-4"></i> Vaccine Inventory
                    </a>
                    <a href="<?php echo APP_URL; ?>/admin/modules/immunization/growth-charts.php" 
                       class="block px-4 py-2 text-sm text-gray-600 hover:bg-blue-50 hover:text-blue-600 rounded-lg">
                        <i class="fas fa-chart-line w-4"></i> Growth Charts
                    </a>
                    <a href="<?php echo APP_URL; ?>/admin/modules/immunization/nutrition.php" 
                       class="block px-4 py-2 text-sm text-gray-600 hover:bg-blue-50 hover:text-blue-600 rounded-lg">
                        <i class="fas fa-apple-alt w-4"></i> Nutrition
                    </a>
                </div>
            </div>
            
            <!-- Wastewater -->
            <div x-data="{ open: false }" class="relative">
                <button @click="open = !open" 
                        class="flex items-center justify-between w-full px-4 py-2 mt-1 text-gray-700 hover:bg-blue-50 hover:text-blue-600 rounded-lg">
                    <span class="flex items-center">
                        <i class="fas fa-tint w-5"></i>
                        <span class="ml-3">Wastewater</span>
                    </span>
                    <i class="fas fa-chevron-down text-xs"></i>
                </button>
                <div x-show="open" class="ml-4 mt-1">
                    <a href="<?php echo APP_URL; ?>/admin/modules/wastewater/septic-tanks.php" 
                       class="block px-4 py-2 text-sm text-gray-600 hover:bg-blue-50 hover:text-blue-600 rounded-lg">
                        <i class="fas fa-water w-4"></i> Septic Tanks
                    </a>
                    <a href="<?php echo APP_URL; ?>/admin/modules/wastewater/service-requests.php" 
                       class="block px-4 py-2 text-sm text-gray-600 hover:bg-blue-50 hover:text-blue-600 rounded-lg">
                        <i class="fas fa-tools w-4"></i> Service Requests
                    </a>
                    <a href="<?php echo APP_URL; ?>/admin/modules/wastewater/maintenance.php" 
                       class="block px-4 py-2 text-sm text-gray-600 hover:bg-blue-50 hover:text-blue-600 rounded-lg">
                        <i class="fas fa-wrench w-4"></i> Maintenance
                    </a>
                    <a href="<?php echo APP_URL; ?>/admin/modules/wastewater/providers.php" 
                       class="block px-4 py-2 text-sm text-gray-600 hover:bg-blue-50 hover:text-blue-600 rounded-lg">
                        <i class="fas fa-user-cog w-4"></i> Providers
                    </a>
                    <a href="<?php echo APP_URL; ?>/admin/modules/wastewater/billing.php" 
                       class="block px-4 py-2 text-sm text-gray-600 hover:bg-blue-50 hover:text-blue-600 rounded-lg">
                        <i class="fas fa-file-invoice w-4"></i> Billing
                    </a>
                </div>
            </div>
            
            <!-- Surveillance -->
            <div x-data="{ open: false }" class="relative">
                <button @click="open = !open" 
                        class="flex items-center justify-between w-full px-4 py-2 mt-1 text-gray-700 hover:bg-blue-50 hover:text-blue-600 rounded-lg">
                    <span class="flex items-center">
                        <i class="fas fa-binoculars w-5"></i>
                        <span class="ml-3">Surveillance</span>
                    </span>
                    <i class="fas fa-chevron-down text-xs"></i>
                </button>
                <div x-show="open" class="ml-4 mt-1">
                    <a href="<?php echo APP_URL; ?>/admin/modules/surveillance/cases.php" 
                       class="block px-4 py-2 text-sm text-gray-600 hover:bg-blue-50 hover:text-blue-600 rounded-lg">
                        <i class="fas fa-file-medical w-4"></i> Cases
                    </a>
                    <a href="<?php echo APP_URL; ?>/admin/modules/surveillance/outbreaks.php" 
                       class="block px-4 py-2 text-sm text-gray-600 hover:bg-blue-50 hover:text-blue-600 rounded-lg">
                        <i class="fas fa-exclamation-triangle w-4"></i> Outbreaks
                    </a>
                    <a href="<?php echo APP_URL; ?>/admin/modules/surveillance/contact-tracing.php" 
                       class="block px-4 py-2 text-sm text-gray-600 hover:bg-blue-50 hover:text-blue-600 rounded-lg">
                        <i class="fas fa-people-arrows w-4"></i> Contact Tracing
                    </a>
                    <a href="<?php echo APP_URL; ?>/admin/modules/surveillance/mapping.php" 
                       class="block px-4 py-2 text-sm text-gray-600 hover:bg-blue-50 hover:text-blue-600 rounded-lg">
                        <i class="fas fa-map w-4"></i> Mapping
                    </a>
                    <a href="<?php echo APP_URL; ?>/admin/modules/surveillance/alerts.php" 
                       class="block px-4 py-2 text-sm text-gray-600 hover:bg-blue-50 hover:text-blue-600 rounded-lg">
                        <i class="fas fa-bell w-4"></i> Alerts
                    </a>
                    <a href="<?php echo APP_URL; ?>/admin/modules/surveillance/response.php" 
                       class="block px-4 py-2 text-sm text-gray-600 hover:bg-blue-50 hover:text-blue-600 rounded-lg">
                        <i class="fas fa-phone-alt w-4"></i> Response
                    </a>
                </div>
            </div>
        </div>
        
        <!-- System Admin -->
        <div>
            <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider">System</p>
            <a href="<?php echo APP_URL; ?>/admin/system/users.php" 
               class="flex items-center px-4 py-2 mt-2 text-gray-700 hover:bg-blue-50 hover:text-blue-600 rounded-lg">
                <i class="fas fa-users-cog w-5"></i>
                <span class="ml-3">User Management</span>
            </a>
            <a href="<?php echo APP_URL; ?>/admin/system/logs.php" 
               class="flex items-center px-4 py-2 mt-1 text-gray-700 hover:bg-blue-50 hover:text-blue-600 rounded-lg">
                <i class="fas fa-history w-5"></i>
                <span class="ml-3">System Logs</span>
            </a>
            <a href="<?php echo APP_URL; ?>/admin/system/settings.php" 
               class="flex items-center px-4 py-2 mt-1 text-gray-700 hover:bg-blue-50 hover:text-blue-600 rounded-lg">
                <i class="fas fa-cog w-5"></i>
                <span class="ml-3">Settings</span>
            </a>
        </div>
    </nav>
</aside>



