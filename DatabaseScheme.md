ERD
┌─────────────────────────────────────────────────────────────────────────────────────┐
│                              HSMS DATABASE SCHEMA                                   │
├─────────────────────────────────────────────────────────────────────────────────────┤
│                                                                                      │
│  ┌─────────────────┐     ┌─────────────────┐     ┌─────────────────┐               │
│  │     users        │     │    patients     │     │ appointments   │               │
│  ├─────────────────┤     ├─────────────────┤     ├─────────────────┤               │
│  │ id (PK)         │────<│ id (PK)         │────<│ id (PK)         │               │
│  │ name            │     │ user_id (FK)    │     │ patient_id (FK) │               │
│  │ email           │     │ first_name      │     │ doctor_id (FK)  │               │
│  │ password        │     │ last_name       │     │ date            │               │
│  │ role_id (FK)    │     │ birth_date      │     │ time            │               │
│  │ status          │     │ gender          │     │ status          │               │
│  └─────────────────┘     │ blood_type      │     │ type            │               │
│         │                │ contact         │     └─────────────────┘               │
│         │                │ address         │              │                         │
│         │                └─────────────────┘              │                         │
│         │                         │                       │                         │
│  ┌─────────────────┐     ┌─────────────────┐     ┌─────────────────┐               │
│  │     roles        │     │ consultations   │     │ prescriptions   │               │
│  ├─────────────────┤     ├─────────────────┤     ├─────────────────┤               │
│  │ id (PK)         │     │ id (PK)         │     │ id (PK)         │               │
│  │ name            │     │ patient_id (FK) │     │ patient_id (FK) │               │
│  │ description     │     │ doctor_id (FK)  │     │ doctor_id (FK)  │               │
│  │ permissions     │     │ appointment_id  │     │ consultation_id │               │
│  └─────────────────┘     │ diagnosis       │     │ date            │               │
│                          │ icd_code        │     │ status          │               │
│                          │ treatment       │     └─────────────────┘               │
│                          │ notes           │              │                         │
│                          └─────────────────┘              │                         │
│                                   │                       │                         │
│  ┌─────────────────┐     ┌─────────────────┐     ┌─────────────────┐               │
│  │   permits        │     │  inspections    │     │   payments      │               │
│  ├─────────────────┤     ├─────────────────┤     ├─────────────────┤               │
│  │ id (PK)         │────<│ id (PK)         │     │ id (PK)         │               │
│  │ applicant       │     │ permit_id (FK)  │     │ permit_id (FK)  │               │
│  │ business_type   │     │ inspector_id    │     │ amount          │               │
│  │ address         │     │ date            │     │ method          │               │
│  │ status          │     │ findings        │     │ reference_no    │               │
│  │ fee             │     │ status          │     │ status          │               │
│  └─────────────────┘     └─────────────────┘     └─────────────────┘               │
│                                                                                      │
│  ┌─────────────────┐     ┌─────────────────┐     ┌─────────────────┐               │
│  │    children      │     │  vaccinations   │     │ vaccine_inventory│               │
│  ├─────────────────┤     ├─────────────────┤     ├─────────────────┤               │
│  │ id (PK)         │────<│ id (PK)         │     │ id (PK)         │               │
│  │ name            │     │ child_id (FK)   │     │ vaccine_name    │               │
│  │ mother_name     │     │ vaccine_name    │     │ batch_number    │               │
│  │ birth_date      │     │ dose_number     │     │ quantity        │               │
│  │ weight          │     │ date            │     │ expiry_date     │               │
│  │ height          │     │ administered_by │     │ temperature     │               │
│  └─────────────────┘     │ next_due_date   │     │ status          │               │
│                          └─────────────────┘     └─────────────────┘               │
│                                                                                      │
│  ┌─────────────────┐     ┌─────────────────┐     ┌─────────────────┐               │
│  │ septic_tanks    │     │ service_requests│     │    cases        │               │
│  ├─────────────────┤     ├─────────────────┤     ├─────────────────┤               │
│  │ id (PK)         │────<│ id (PK)         │     │ id (PK)         │               │
│  │ owner_name      │     │ tank_id (FK)    │     │ disease         │               │
│  │ address         │     │ service_type    │     │ patient_name    │               │
│  │ capacity        │     │ date            │     │ barangay        │               │
│  │ type            │     │ status          │     │ onset_date      │               │
│  │ last_maintenance│     │ assigned_to     │     │ status          │               │
│  └─────────────────┘     └─────────────────┘     │ severity       │               │
│                                                    └─────────────────┘               │
│                                                                                      │
│  ┌─────────────────┐     ┌─────────────────┐     ┌─────────────────┐               │
│  │   outbreaks      │     │  contact_tracing│     │   audit_logs    │               │
│  ├─────────────────┤     ├─────────────────┤     ├─────────────────┤               │
│  │ id (PK)         │────<│ id (PK)         │     │ id (PK)         │               │
│  │ disease         │     │ case_id (FK)    │     │ user_id (FK)    │               │
│  │ barangay        │     │ contact_name    │     │ action          │               │
│  │ cases_count     │     │ contact_phone   │     │ module          │               │
│  │ status          │     │ exposure_date   │     │ target_id       │               │
│  │ severity        │     │ quarantine_end  │     │ details         │               │
│  │ reported_date   │     │ status          │     │ ip_address      │               │
│  └─────────────────┘     └─────────────────┘     │ timestamp      │               │
│                                                    └─────────────────┘               │
└─────────────────────────────────────────────────────────────────────────────────────┘

RELATION MAPPING
┌─────────────────────────────────────────────────────────────────────┐
│                    TABLE RELATIONSHIPS                              │
├─────────────────────────────────────────────────────────────────────┤
│                                                                      │
│  1. users → roles (Many-to-One)                                    │
│  2. users → patients (One-to-Many)                                 │
│  3. patients → appointments (One-to-Many)                         │
│  4. patients → consultations (One-to-Many)                        │
│  5. patients → prescriptions (One-to-Many)                        │
│  6. patients → referrals (One-to-Many)                            │
│  7. patients → medical_records (One-to-Many)                      │
│  8. appointments → consultations (One-to-One)                     │
│  9. consultations → prescriptions (One-to-Many)                   │
│  10. consultations → referrals (One-to-Many)                      │
│  11. permits → inspections (One-to-Many)                          │
│  12. permits → payments (One-to-Many)                             │
│  13. permits → violations (One-to-Many)                           │
│  14. children → vaccinations (One-to-Many)                        │
│  15. children → growth_charts (One-to-Many)                       │
│  16. septic_tanks → service_requests (One-to-Many)                │
│  17. septic_tanks → maintenance_records (One-to-Many)             │
│  18. cases → contact_tracing (One-to-Many)                        │
│  19. cases → outbreaks (One-to-Many)                              │
│                                                                      │
└─────────────────────────────────────────────────────────────────────┘

 INDEXES FOR PERFORMANCE
 -- Patients
CREATE INDEX idx_patients_name ON patients(last_name, first_name);
CREATE INDEX idx_patients_barangay ON patients(barangay);
CREATE INDEX idx_patients_registration ON patients(registration_date);

-- Appointments
CREATE INDEX idx_appointments_date ON appointments(appointment_date);
CREATE INDEX idx_appointments_status ON appointments(status);
CREATE INDEX idx_appointments_patient ON appointments(patient_id);

-- Permits
CREATE INDEX idx_permits_status ON permits(status);
CREATE INDEX idx_permits_applicant ON permits(applicant);
CREATE INDEX idx_permits_date ON permits(created_at);

-- Cases
CREATE INDEX idx_cases_barangay ON cases(barangay);
CREATE INDEX idx_cases_disease ON cases(disease);
CREATE INDEX idx_cases_status ON cases(status);

-- Audit Logs
CREATE INDEX idx_audit_user ON audit_logs(user_id);
CREATE INDEX idx_audit_timestamp ON audit_logs(timestamp);
CREATE INDEX idx_audit_module ON audit_logs(module);

COMPLETE TABLE SCHEMAS
1. AUTHENTICATION & USER MANAGEMENT
Table: users
sql
CREATE TABLE users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) UNIQUE NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    password_hash VARCHAR(255) NOT NULL,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    role_id INT NOT NULL,
    department VARCHAR(50),
    contact VARCHAR(20),
    profile_image VARCHAR(255),
    status ENUM('active', 'inactive', 'suspended') DEFAULT 'active',
    last_login DATETIME,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (role_id) REFERENCES roles(id)
);
Table: roles
sql
CREATE TABLE roles (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(50) UNIQUE NOT NULL,
    description TEXT,
    permissions JSON, -- Store permissions as JSON
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
Table: permissions
sql
CREATE TABLE permissions (
    id INT PRIMARY KEY AUTO_INCREMENT,
    role_id INT NOT NULL,
    module VARCHAR(50) NOT NULL,
    permission VARCHAR(50) NOT NULL, -- read, write, edit, delete
    FOREIGN KEY (role_id) REFERENCES roles(id)
);
Table: password_resets
sql
CREATE TABLE password_resets (
    id INT PRIMARY KEY AUTO_INCREMENT,
    email VARCHAR(100) NOT NULL,
    token VARCHAR(255) NOT NULL,
    expires_at DATETIME NOT NULL,
    used BOOLEAN DEFAULT FALSE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
Table: sessions
sql
CREATE TABLE sessions (
    id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT NOT NULL,
    token VARCHAR(255) UNIQUE NOT NULL,
    ip_address VARCHAR(45),
    user_agent TEXT,
    expires_at DATETIME NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id)
);
2. HEALTH CENTER SERVICES
Table: patients
sql
CREATE TABLE patients (
    id INT PRIMARY KEY AUTO_INCREMENT,
    patient_id VARCHAR(20) UNIQUE NOT NULL, -- P-101 format
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    middle_name VARCHAR(50),
    birth_date DATE NOT NULL,
    gender ENUM('Male', 'Female', 'Other') NOT NULL,
    blood_type ENUM('A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-'),
    contact VARCHAR(20) NOT NULL,
    email VARCHAR(100),
    address TEXT NOT NULL,
    barangay VARCHAR(50),
    emergency_contact VARCHAR(50),
    emergency_contact_number VARCHAR(20),
    allergies TEXT,
    medical_history JSON,
    registration_date DATE NOT NULL,
    status ENUM('active', 'inactive', 'archived') DEFAULT 'active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);
Table: appointments
sql
CREATE TABLE appointments (
    id INT PRIMARY KEY AUTO_INCREMENT,
    appointment_id VARCHAR(20) UNIQUE NOT NULL, -- APT-001 format
    patient_id INT NOT NULL,
    doctor_id INT NOT NULL, -- References users
    service_type VARCHAR(100) NOT NULL,
    appointment_date DATE NOT NULL,
    appointment_time TIME NOT NULL,
    status ENUM('pending', 'approved', 'completed', 'cancelled', 'no_show') DEFAULT 'pending',
    priority ENUM('critical', 'high', 'medium', 'low') DEFAULT 'medium',
    notes TEXT,
    reminder_sent BOOLEAN DEFAULT FALSE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (patient_id) REFERENCES patients(id),
    FOREIGN KEY (doctor_id) REFERENCES users(id)
);
Table: triage
sql
CREATE TABLE triage (
    id INT PRIMARY KEY AUTO_INCREMENT,
    patient_id INT NOT NULL,
    nurse_id INT NOT NULL, -- References users
    blood_pressure VARCHAR(20),
    heart_rate INT,
    temperature DECIMAL(4,1),
    respiratory_rate INT,
    oxygen_saturation INT,
    weight DECIMAL(5,2),
    height DECIMAL(5,2),
    symptoms TEXT,
    priority ENUM('critical', 'high', 'medium', 'low') NOT NULL,
    allergies VARCHAR(255),
    medications VARCHAR(255),
    notes TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (patient_id) REFERENCES patients(id),
    FOREIGN KEY (nurse_id) REFERENCES users(id)
);
Table: consultations
sql
CREATE TABLE consultations (
    id INT PRIMARY KEY AUTO_INCREMENT,
    consultation_id VARCHAR(20) UNIQUE NOT NULL, -- CON-001 format
    patient_id INT NOT NULL,
    doctor_id INT NOT NULL, -- References users
    appointment_id INT,
    date DATE NOT NULL,
    time TIME NOT NULL,
    diagnosis TEXT,
    icd_code VARCHAR(20),
    symptoms TEXT,
    vital_signs JSON,
    treatment_plan TEXT,
    notes TEXT,
    follow_up_date DATE,
    status ENUM('completed', 'referred') DEFAULT 'completed',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (patient_id) REFERENCES patients(id),
    FOREIGN KEY (doctor_id) REFERENCES users(id),
    FOREIGN KEY (appointment_id) REFERENCES appointments(id)
);
Table: prescriptions
sql
CREATE TABLE prescriptions (
    id INT PRIMARY KEY AUTO_INCREMENT,
    prescription_id VARCHAR(20) UNIQUE NOT NULL, -- RX-001 format
    patient_id INT NOT NULL,
    doctor_id INT NOT NULL,
    consultation_id INT,
    date DATE NOT NULL,
    medications JSON NOT NULL, -- [{name, dosage, frequency, duration, quantity, instructions}]
    notes TEXT,
    status ENUM('pending', 'dispensed', 'cancelled') DEFAULT 'pending',
    dispensed_by INT, -- References users (pharmacist)
    dispensed_at DATETIME,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (patient_id) REFERENCES patients(id),
    FOREIGN KEY (doctor_id) REFERENCES users(id),
    FOREIGN KEY (consultation_id) REFERENCES consultations(id),
    FOREIGN KEY (dispensed_by) REFERENCES users(id)
);
Table: referrals
sql
CREATE TABLE referrals (
    id INT PRIMARY KEY AUTO_INCREMENT,
    referral_id VARCHAR(20) UNIQUE NOT NULL, -- REF-001 format
    patient_id INT NOT NULL,
    from_doctor_id INT NOT NULL,
    to_doctor_id INT,
    to_hospital VARCHAR(100),
    reason TEXT NOT NULL,
    diagnosis TEXT,
    urgency ENUM('emergency', 'high', 'medium', 'low') DEFAULT 'medium',
    notes TEXT,
    status ENUM('pending', 'accepted', 'completed', 'rejected') DEFAULT 'pending',
    accepted_at DATETIME,
    completed_at DATETIME,
    feedback TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (patient_id) REFERENCES patients(id),
    FOREIGN KEY (from_doctor_id) REFERENCES users(id),
    FOREIGN KEY (to_doctor_id) REFERENCES users(id)
);
Table: medical_records
sql
CREATE TABLE medical_records (
    id INT PRIMARY KEY AUTO_INCREMENT,
    patient_id INT NOT NULL,
    record_type ENUM('consultation', 'lab', 'imaging', 'procedure', 'other') NOT NULL,
    date DATE NOT NULL,
    description TEXT NOT NULL,
    attachments JSON,
    created_by INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (patient_id) REFERENCES patients(id),
    FOREIGN KEY (created_by) REFERENCES users(id)
);
3. SANITATION PERMITS
Table: permits
sql
CREATE TABLE permits (
    id INT PRIMARY KEY AUTO_INCREMENT,
    permit_id VARCHAR(20) UNIQUE NOT NULL, -- SP-1040 format
    applicant VARCHAR(100) NOT NULL,
    business_name VARCHAR(100),
    business_type VARCHAR(50) NOT NULL,
    address TEXT NOT NULL,
    owner_name VARCHAR(100) NOT NULL,
    contact VARCHAR(20) NOT NULL,
    email VARCHAR(100),
    fee DECIMAL(10,2) NOT NULL,
    paid BOOLEAN DEFAULT FALSE,
    payment_method VARCHAR(50),
    payment_reference VARCHAR(100),
    status ENUM('pending', 'under_review', 'approved', 'rejected', 'expired') DEFAULT 'pending',
    inspector_id INT,
    inspection_date DATE,
    approved_date DATE,
    expiry_date DATE,
    notes TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (inspector_id) REFERENCES users(id)
);
Table: permit_documents
sql
CREATE TABLE permit_documents (
    id INT PRIMARY KEY AUTO_INCREMENT,
    permit_id INT NOT NULL,
    document_type VARCHAR(50) NOT NULL,
    file_name VARCHAR(255) NOT NULL,
    file_path VARCHAR(255) NOT NULL,
    uploaded_by INT NOT NULL,
    uploaded_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    verified BOOLEAN DEFAULT FALSE,
    FOREIGN KEY (permit_id) REFERENCES permits(id),
    FOREIGN KEY (uploaded_by) REFERENCES users(id)
);
Table: inspections
sql
CREATE TABLE inspections (
    id INT PRIMARY KEY AUTO_INCREMENT,
    inspection_id VARCHAR(20) UNIQUE NOT NULL, -- INS-501 format
    permit_id INT NOT NULL,
    inspector_id INT NOT NULL,
    scheduled_date DATE NOT NULL,
    scheduled_time TIME NOT NULL,
    conducted_date DATETIME,
    findings JSON,
    overall_status ENUM('compliant', 'partially_compliant', 'non_compliant') DEFAULT 'partially_compliant',
    recommendations TEXT,
    attachments JSON,
    status ENUM('scheduled', 'completed', 'cancelled') DEFAULT 'scheduled',
    completed_at DATETIME,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (permit_id) REFERENCES permits(id),
    FOREIGN KEY (inspector_id) REFERENCES users(id)
);
Table: violations
sql
CREATE TABLE violations (
    id INT PRIMARY KEY AUTO_INCREMENT,
    permit_id INT NOT NULL,
    inspection_id INT,
    violation_type VARCHAR(100) NOT NULL,
    description TEXT NOT NULL,
    severity ENUM('low', 'medium', 'high', 'critical') NOT NULL,
    status ENUM('pending', 'in_progress', 'resolved', 'dismissed') DEFAULT 'pending',
    corrective_action TEXT,
    corrected_date DATE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (permit_id) REFERENCES permits(id),
    FOREIGN KEY (inspection_id) REFERENCES inspections(id)
);
Table: payments
sql
CREATE TABLE payments (
    id INT PRIMARY KEY AUTO_INCREMENT,
    payment_id VARCHAR(20) UNIQUE NOT NULL, -- PAY-001 format
    permit_id INT NOT NULL,
    amount DECIMAL(10,2) NOT NULL,
    method ENUM('cash', 'gcash', 'paymaya', 'bank_transfer', 'over_the_counter') NOT NULL,
    reference_number VARCHAR(50) UNIQUE,
    status ENUM('pending', 'completed', 'failed', 'refunded') DEFAULT 'pending',
    receipt_path VARCHAR(255),
    paid_by VARCHAR(100),
    paid_at DATETIME,
    notes TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (permit_id) REFERENCES permits(id)
);
4. IMMUNIZATION & NUTRITION
Table: children
sql
CREATE TABLE children (
    id INT PRIMARY KEY AUTO_INCREMENT,
    child_id VARCHAR(20) UNIQUE NOT NULL, -- CH-001 format
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    birth_date DATE NOT NULL,
    gender ENUM('Male', 'Female') NOT NULL,
    birth_weight DECIMAL(4,1),
    birth_height DECIMAL(4,1),
    blood_type VARCHAR(5),
    mother_name VARCHAR(100) NOT NULL,
    mother_contact VARCHAR(20) NOT NULL,
    father_name VARCHAR(100),
    address TEXT NOT NULL,
    barangay VARCHAR(50),
    health_center VARCHAR(100),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);
Table: vaccinations
sql
CREATE TABLE vaccinations (
    id INT PRIMARY KEY AUTO_INCREMENT,
    child_id INT NOT NULL,
    vaccine_name VARCHAR(50) NOT NULL,
    dose_number INT NOT NULL,
    dose_sequence VARCHAR(20), -- 1st dose, 2nd dose, etc.
    date DATE NOT NULL,
    administered_by INT NOT NULL, -- References users
    health_center VARCHAR(100) NOT NULL,
    batch_number VARCHAR(50),
    expiry_date DATE,
    site VARCHAR(20), -- Right arm, left arm, etc.
    route VARCHAR(20), -- IM, SC, etc.
    next_due_date DATE,
    notes TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (child_id) REFERENCES children(id),
    FOREIGN KEY (administered_by) REFERENCES users(id)
);
Table: vaccine_inventory
sql
CREATE TABLE vaccine_inventory (
    id INT PRIMARY KEY AUTO_INCREMENT,
    vaccine_name VARCHAR(50) NOT NULL,
    batch_number VARCHAR(50) UNIQUE NOT NULL,
    quantity INT NOT NULL,
    minimum_stock INT NOT NULL,
    received_date DATE,
    expiry_date DATE NOT NULL,
    temperature DECIMAL(4,1), -- Celsius
    storage_location VARCHAR(100),
    supplier VARCHAR(100),
    status ENUM('in_stock', 'low_stock', 'expired', 'out_of_stock') DEFAULT 'in_stock',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);
Table: growth_charts
sql
CREATE TABLE growth_charts (
    id INT PRIMARY KEY AUTO_INCREMENT,
    child_id INT NOT NULL,
    date DATE NOT NULL,
    weight DECIMAL(5,2),
    height DECIMAL(5,2),
    head_circumference DECIMAL(5,2),
    weight_percentile INT,
    height_percentile INT,
    bmi DECIMAL(4,1),
    nutrition_status VARCHAR(50),
    recorded_by INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (child_id) REFERENCES children(id),
    FOREIGN KEY (recorded_by) REFERENCES users(id)
);
Table: nutrition_assessments
sql
CREATE TABLE nutrition_assessments (
    id INT PRIMARY KEY AUTO_INCREMENT,
    child_id INT NOT NULL,
    date DATE NOT NULL,
    nutrition_status ENUM('normal', 'underweight', 'overweight', 'obese', 'malnourished') NOT NULL,
    risk_level ENUM('low', 'medium', 'high') DEFAULT 'medium',
    assessment_notes TEXT,
    plan_of_action TEXT,
    supplement_given VARCHAR(100),
    next_assessment_date DATE,
    assessed_by INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (child_id) REFERENCES children(id),
    FOREIGN KEY (assessed_by) REFERENCES users(id)
);
5. WASTEWATER SERVICES
Table: septic_tanks
sql
CREATE TABLE septic_tanks (
    id INT PRIMARY KEY AUTO_INCREMENT,
    tank_id VARCHAR(20) UNIQUE NOT NULL, -- ST-001 format
    owner_name VARCHAR(100) NOT NULL,
    address TEXT NOT NULL,
    latitude DECIMAL(10,6),
    longitude DECIMAL(10,6),
    capacity VARCHAR(20),
    type ENUM('concrete', 'plastic', 'fiberglass') DEFAULT 'concrete',
    installation_year YEAR,
    last_maintenance DATE,
    maintenance_frequency INT, -- in months
    status ENUM('good', 'needs_maintenance', 'critical') DEFAULT 'good',
    notes TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);
Table: service_providers
sql
CREATE TABLE service_providers (
    id INT PRIMARY KEY AUTO_INCREMENT,
    provider_id VARCHAR(20) UNIQUE NOT NULL, -- PRV-001 format
    name VARCHAR(100) NOT NULL,
    contact VARCHAR(20) NOT NULL,
    email VARCHAR(100),
    address TEXT,
    license_number VARCHAR(50),
    specialization VARCHAR(50),
    rating DECIMAL(3,2),
    status ENUM('active', 'inactive', 'suspended') DEFAULT 'active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);
Table: service_requests
sql
CREATE TABLE service_requests (
    id INT PRIMARY KEY AUTO_INCREMENT,
    request_id VARCHAR(20) UNIQUE NOT NULL, -- SR-001 format
    tank_id INT NOT NULL,
    service_type ENUM('desludging', 'maintenance', 'inspection', 'installation') NOT NULL,
    preferred_date DATE NOT NULL,
    preferred_time TIME,
    provider_id INT,
    assigned_to INT, -- References users (technician)
    status ENUM('pending', 'assigned', 'in_progress', 'completed', 'cancelled') DEFAULT 'pending',
    scheduled_date DATE,
    completed_date DATETIME,
    notes TEXT,
    feedback TEXT,
    rating INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (tank_id) REFERENCES septic_tanks(id),
    FOREIGN KEY (provider_id) REFERENCES service_providers(id),
    FOREIGN KEY (assigned_to) REFERENCES users(id)
);
Table: maintenance_records
sql
CREATE TABLE maintenance_records (
    id INT PRIMARY KEY AUTO_INCREMENT,
    tank_id INT NOT NULL,
    service_request_id INT,
    maintenance_date DATETIME NOT NULL,
    performed_by INT NOT NULL,
    services_performed TEXT NOT NULL,
    materials_used JSON,
    cost DECIMAL(10,2),
    status ENUM('completed', 'pending', 'cancelled') DEFAULT 'completed',
    next_maintenance_date DATE,
    notes TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (tank_id) REFERENCES septic_tanks(id),
    FOREIGN KEY (service_request_id) REFERENCES service_requests(id),
    FOREIGN KEY (performed_by) REFERENCES users(id)
);
Table: billing (Wastewater)
sql
CREATE TABLE wastewater_billing (
    id INT PRIMARY KEY AUTO_INCREMENT,
    invoice_id VARCHAR(20) UNIQUE NOT NULL, -- INV-001 format
    request_id INT NOT NULL,
    amount DECIMAL(10,2) NOT NULL,
    tax DECIMAL(10,2) DEFAULT 0,
    total_amount DECIMAL(10,2) NOT NULL,
    status ENUM('pending', 'paid', 'overdue', 'cancelled') DEFAULT 'pending',
    payment_method VARCHAR(50),
    payment_reference VARCHAR(50),
    invoice_date DATE NOT NULL,
    due_date DATE NOT NULL,
    paid_at DATETIME,
    notes TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (request_id) REFERENCES service_requests(id)
);
6. HEALTH SURVEILLANCE
Table: cases
sql
CREATE TABLE cases (
    id INT PRIMARY KEY AUTO_INCREMENT,
    case_id VARCHAR(20) UNIQUE NOT NULL, -- CS-001 format
    disease VARCHAR(100) NOT NULL,
    patient_name VARCHAR(100) NOT NULL,
    age INT,
    gender ENUM('Male', 'Female') NOT NULL,
    address TEXT NOT NULL,
    barangay VARCHAR(50) NOT NULL,
    contact VARCHAR(20),
    symptoms TEXT,
    onset_date DATE NOT NULL,
    reporting_facility VARCHAR(100),
    status ENUM('reported', 'investigating', 'confirmed', 'resolved', 'closed') DEFAULT 'reported',
    severity ENUM('low', 'moderate', 'high', 'critical') DEFAULT 'moderate',
    reported_by INT NOT NULL,
    investigator_id INT,
    notes TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (reported_by) REFERENCES users(id),
    FOREIGN KEY (investigator_id) REFERENCES users(id)
);
Table: outbreaks
sql
CREATE TABLE outbreaks (
    id INT PRIMARY KEY AUTO_INCREMENT,
    outbreak_id VARCHAR(20) UNIQUE NOT NULL, -- OUT-001 format
    disease VARCHAR(100) NOT NULL,
    barangays JSON NOT NULL, -- List of affected barangays
    cases_count INT NOT NULL,
    severity ENUM('low', 'moderate', 'high', 'critical') NOT NULL,
    alert_level ENUM('yellow', 'orange', 'red') NOT NULL,
    start_date DATE NOT NULL,
    end_date DATE,
    status ENUM('active', 'contained', 'resolved') DEFAULT 'active',
    recommendations TEXT,
    declared_by INT NOT NULL,
    notes TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (declared_by) REFERENCES users(id)
);
Table: contact_tracing
sql
CREATE TABLE contact_tracing (
    id INT PRIMARY KEY AUTO_INCREMENT,
    case_id INT NOT NULL,
    contact_name VARCHAR(100) NOT NULL,
    contact_age INT,
    contact_gender ENUM('Male', 'Female'),
    contact_address TEXT NOT NULL,
    contact_phone VARCHAR(20),
    relationship VARCHAR(50),
    exposure_date DATE,
    exposure_type VARCHAR(50),
    exposure_duration VARCHAR(50),
    quarantine_start_date DATE,
    quarantine_end_date DATE,
    status ENUM('active', 'cleared', 'symptomatic', 'confirmed') DEFAULT 'active',
    monitored_by INT NOT NULL,
    notes TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (case_id) REFERENCES cases(id),
    FOREIGN KEY (monitored_by) REFERENCES users(id)
);
Table: outbreak_response
sql
CREATE TABLE outbreak_response (
    id INT PRIMARY KEY AUTO_INCREMENT,
    outbreak_id INT NOT NULL,
    response_team VARCHAR(100),
    actions JSON NOT NULL,
    resources_allocated JSON,
    response_date DATETIME NOT NULL,
    status ENUM('initiated', 'in_progress', 'completed') DEFAULT 'initiated',
    effectiveness_rating INT,
    lessons_learned TEXT,
    reported_by INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (outbreak_id) REFERENCES outbreaks(id),
    FOREIGN KEY (reported_by) REFERENCES users(id)
);
7. SYSTEM ADMIN & LOGS
Table: audit_logs
sql
CREATE TABLE audit_logs (
    id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT NOT NULL,
    action VARCHAR(50) NOT NULL,
    module VARCHAR(50) NOT NULL,
    target_type VARCHAR(50), -- patient, permit, etc.
    target_id VARCHAR(20),
    details JSON,
    ip_address VARCHAR(45),
    user_agent TEXT,
    timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id)
);
Table: system_settings
sql
CREATE TABLE system_settings (
    id INT PRIMARY KEY AUTO_INCREMENT,
    setting_key VARCHAR(50) UNIQUE NOT NULL,
    setting_value TEXT,
    setting_group VARCHAR(50),
    description TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);
Table: notifications
sql
CREATE TABLE notifications (
    id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT NOT NULL,
    type VARCHAR(50) NOT NULL, -- appointment, permit, vaccine, etc.
    title VARCHAR(255) NOT NULL,
    message TEXT NOT NULL,
    link VARCHAR(255),
    read BOOLEAN DEFAULT FALSE,
    sent_via VARCHAR(50), -- email, sms, push
    sent_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id)
);
Table: schedules
sql
CREATE TABLE schedules (
    id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT NOT NULL,
    entity_type VARCHAR(50) NOT NULL, -- doctor, inspector, technician
    entity_id INT NOT NULL,
    date DATE NOT NULL,
    start_time TIME NOT NULL,
    end_time TIME NOT NULL,
    status ENUM('available', 'booked', 'unavailable') DEFAULT 'available',
    notes TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id)
);


SAMPLE DATA INSERTION
Users
sql
INSERT INTO users (username, email, password_hash, first_name, last_name, role_id, department, status) 
VALUES 
('admin', 'admin@caloocan.gov.ph', '$2y$10$...', 'Maria', 'Santos', 1, 'System Admin', 'active'),
('dr.santos', 'dr.santos@caloocan.gov.ph', '$2y$10$...', 'Elena', 'Santos', 2, 'Health Center 1', 'active'),
('nurse.cruz', 'nurse.cruz@caloocan.gov.ph', '$2y$10$...', 'Maria', 'Cruz', 3, 'Health Center 1', 'active');
Patients
sql
INSERT INTO patients (patient_id, first_name, last_name, birth_date, gender, blood_type, contact, address, barangay, registration_date) 
VALUES 
('P-101', 'Pedro', 'Garcia', '1992-03-15', 'Male', 'O+', '09123456789', '123 Rizal St.', 'Barangay San Jose', '2024-01-15'),
('P-102', 'Rosa', 'Mendoza', '1998-06-01', 'Female', 'A+', '09176543210', '456 Mabini Ave.', 'Barangay Poblacion', '2024-01-20');
Roles
sql
INSERT INTO roles (name, description, permissions) VALUES 
('admin', 'Full system access', '{"all": true}'),
('doctor', 'Doctor access for consultations', '{"patients": "rw", "prescriptions": "rw", "consultations": "rw"}');