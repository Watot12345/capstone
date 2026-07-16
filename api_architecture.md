1. PATIENTS

GET /api/patients
Description: Get list of all patients with pagination
Access: Authenticated (Doctor, Nurse, Admin)

Query Parameters:
- page: 1 (default)
- limit: 20 (default)
- search: "Pedro"
- status: "active|inactive"
- sortBy: "name|createdAt"

Response (200 OK):
{
  "status": "success",
  "data": {
    "patients": [
      {
        "id": "P-101",
        "name": "Pedro Garcia",
        "age": 34,
        "gender": "Male",
        "bloodType": "O+",
        "contact": "09123456789",
        "address": "123 Rizal St., Barangay San Jose",
        "lastVisit": "2026-06-15",
        "status": "active"
      }
    ],
    "pagination": {
      "total": 1248,
      "page": 1,
      "limit": 20,
      "pages": 63
    }
  }
}


GET /api/patients/{id}
Description: Get complete patient details
Access: Authenticated (Doctor, Nurse, Admin)

Response (200 OK):
{
  "status": "success",
  "data": {
    "patient": {
      "id": "P-101",
      "name": "Pedro Garcia",
      "age": 34,
      "gender": "Male",
      "birthDate": "1992-03-15",
      "bloodType": "O+",
      "contact": "09123456789",
      "email": "pedro.garcia@email.com",
      "address": "123 Rizal St., Barangay San Jose",
      "emergencyContact": "Maria Garcia - 09176543210",
      "medicalHistory": {
        "allergies": ["None"],
        "conditions": ["Hypertension"],
        "medications": ["Amlodipine 5mg"],
        "surgeries": ["None"]
      },
      "lastVisit": "2026-06-15",
      "status": "active",
      "createdAt": "2024-01-15T08:30:00Z",
      "updatedAt": "2026-06-15T14:20:00Z"
    }
  }
}

POST /api/patients
Description: Register new patient
Access: Authenticated (Doctor, Clerk, Admin)

Request Body:
{
  "name": "Juan Dela Cruz",
  "gender": "Male",
  "birthDate": "1995-08-20",
  "bloodType": "A+",
  "contact": "09123456789",
  "email": "juan@email.com",
  "address": "456 Mabini Ave., Barangay Poblacion",
  "emergencyContact": "Ana Dela Cruz - 09176543210",
  "allergies": ["Penicillin"],
  "conditions": ["Diabetes Type 2"],
  "medications": ["Metformin 500mg"]
}

Response (201 Created):
{
  "status": "success",
  "data": {
    "patient": {
      "id": "P-104",
      "name": "Juan Dela Cruz",
      "createdAt": "2026-07-17T10:30:00Z"
    }
  }
}

PUT /api/patients/{id}
Description: Update patient information
Access: Authenticated (Doctor, Clerk, Admin)

Request Body:
{
  "contact": "09987654321",
  "address": "789 Bonifacio Rd., Barangay Riverside",
  "medications": ["Metformin 500mg", "Lisinopril 10mg"]
}

Response (200 OK):
{
  "status": "success",
  "message": "Patient updated successfully",
  "data": {
    "patient": {
      "id": "P-104",
      "updatedAt": "2026-07-17T10:35:00Z"
    }
  }
}

DELETE /api/patients/{id}
Description: Soft delete patient (archive)
Access: Authenticated (Admin only)

Response (200 OK):
{
  "status": "success",
  "message": "Patient archived successfully"
}

2. APPOINMENTS
GET /api/appointments
Description: Get list of appointments
Access: Authenticated (Doctor, Nurse, Clerk, Admin)

Query Parameters:
- date: "2026-07-20"
- status: "pending|approved|completed|cancelled"
- doctorId: 1
- patientId: "P-101"

Response (200 OK):
{
  "status": "success",
  "data": {
    "appointments": [
      {
        "id": "APT-001",
        "patient": {
          "id": "P-101",
          "name": "Pedro Garcia"
        },
        "doctor": {
          "id": 1,
          "name": "Dr. Elena Santos",
          "specialty": "General Medicine"
        },
        "service": "General Checkup",
        "date": "2026-07-20",
        "time": "09:00 AM",
        "status": "pending",
        "triage": "Medium",
        "notes": "Routine checkup",
        "createdAt": "2026-07-15T08:30:00Z"
      }
    ]
  }
}
POST /api/appointments
Description: Schedule new appointment
Access: Authenticated (Doctor, Nurse, Clerk, Admin)

Request Body:
{
  "patientId": "P-101",
  "doctorId": 1,
  "service": "General Checkup",
  "date": "2026-07-22",
  "time": "10:30 AM",
  "notes": "Patient requested specific doctor",
  "priority": "Medium"
}

Response (201 Created):
{
  "status": "success",
  "data": {
    "appointment": {
      "id": "APT-006",
      "status": "pending",
      "createdAt": "2026-07-17T11:00:00Z"
    }
  }
}
PATCH /api/appointments/{id}/status
Description: Update appointment status
Access: Authenticated (Doctor, Nurse, Admin)

Request Body:
{
  "status": "approved",
  "notes": "Doctor confirmed availability"
}

Response (200 OK):
{
  "status": "success",
  "message": "Appointment status updated"
}
3.CONSULTATIONS
POST /api/consultations
Description: Record new consultation
Access: Authenticated (Doctor only)

Request Body:
{
  "patientId": "P-101",
  "doctorId": 1,
  "appointmentId": "APT-001",
  "diagnosis": "Hypertension - Stage 1",
  "icdCode": "I10",
  "symptoms": ["Headache", "Dizziness", "Blurred vision"],
  "vitalSigns": {
    "bloodPressure": "140/90",
    "heartRate": 82,
    "temperature": 36.5,
    "respiratoryRate": 18,
    "weight": 75.5,
    "height": 175
  },
  "treatment": "Continue Amlodipine 5mg daily. Follow up in 1 month.",
  "notes": "Patient advised to reduce salt intake and exercise regularly"
}

Response (201 Created):
{
  "status": "success",
  "data": {
    "consultation": {
      "id": "CON-001",
      "createdAt": "2026-07-17T09:15:00Z"
    }
  }
}
GET /api/consultations/patient/{patientId}
Description: Get consultation history for a patient
Access: Authenticated (Doctor, Nurse, Admin)

Response (200 OK):
{
  "status": "success",
  "data": {
    "consultations": [
      {
        "id": "CON-001",
        "date": "2026-07-17",
        "doctor": "Dr. Elena Santos",
        "diagnosis": "Hypertension - Stage 1",
        "treatment": "Continue Amlodipine 5mg daily",
        "followUp": "2026-08-17"
      }
    ]
  }
}
POST /api/prescriptions
Description: Create new prescription
Access: Authenticated (Doctor only)

Request Body:
{
  "patientId": "P-101",
  "consultationId": "CON-001",
  "medications": [
    {
      "name": "Amlodipine",
      "dosage": "5mg",
      "frequency": "Once daily",
      "duration": "30 days",
      "quantity": 30,
      "instructions": "Take one tablet daily in the morning"
    }
  ],
  "notes": "Monitor blood pressure weekly"
}

Response (201 Created):
{
  "status": "success",
  "data": {
    "prescription": {
      "id": "RX-001",
      "status": "pending",
      "createdAt": "2026-07-17T09:20:00Z"
    }
  }
}
GET /api/consultations/patient/{patientId}
Description: Get consultation history for a patient
Access: Authenticated (Doctor, Nurse, Admin)

Response (200 OK):
{
  "status": "success",
  "data": {
    "consultations": [
      {
        "id": "CON-001",
        "date": "2026-07-17",
        "doctor": "Dr. Elena Santos",
        "diagnosis": "Hypertension - Stage 1",
        "treatment": "Continue Amlodipine 5mg daily",
        "followUp": "2026-08-17"
      }
    ]
  }
}
4.PRESCRIPTIONS
POST /api/prescriptions
Description: Create new prescription
Access: Authenticated (Doctor only)

Request Body:
{
  "patientId": "P-101",
  "consultationId": "CON-001",
  "medications": [
    {
      "name": "Amlodipine",
      "dosage": "5mg",
      "frequency": "Once daily",
      "duration": "30 days",
      "quantity": 30,
      "instructions": "Take one tablet daily in the morning"
    }
  ],
  "notes": "Monitor blood pressure weekly"
}

Response (201 Created):
{
  "status": "success",
  "data": {
    "prescription": {
      "id": "RX-001",
      "status": "pending",
      "createdAt": "2026-07-17T09:20:00Z"
    }
  }
}
GET /api/prescriptions/patient/{patientId}
Description: Get patient prescriptions
Access: Authenticated (Doctor, Pharmacist, Admin)

Response (200 OK):
{
  "status": "success",
  "data": {
    "prescriptions": [
      {
        "id": "RX-001",
        "date": "2026-07-17",
        "doctor": "Dr. Elena Santos",
        "medications": [
          {
            "name": "Amlodipine",
            "dosage": "5mg",
            "frequency": "Once daily",
            "duration": "30 days"
          }
        ],
        "status": "dispensed",
        "dispensedBy": "Pharmacist Maria Cruz",
        "dispensedAt": "2026-07-17T10:00:00Z"
      }
    ]
  }
}
PATCH /api/prescriptions/{id}/dispense
Description: Mark prescription as dispensed
Access: Authenticated (Pharmacist only)

Request Body:
{
  "dispensedBy": "Pharmacist Maria Cruz",
  "notes": "Patient received medication"
}

Response (200 OK):
{
  "status": "success",
  "message": "Prescription dispensed successfully"
}
5. TRIAGE
POST /api/triage
Description: Record patient triage
Access: Authenticated (Nurse only)

Request Body:
{
  "patientId": "P-101",
  "vitalSigns": {
    "bloodPressure": "140/90",
    "heartRate": 82,
    "temperature": 36.5,
    "respiratoryRate": 18,
    "oxygenSaturation": 98,
    "weight": 75.5,
    "height": 175
  },
  "symptoms": ["Headache", "Dizziness"],
  "priority": "Medium",
  "allergies": ["None"],
  "medications": ["Amlodipine 5mg"],
  "notes": "Patient conscious and oriented"
}

Response (201 Created):
{
  "status": "success",
  "data": {
    "triage": {
      "id": "TRI-001",
      "priority": "Medium",
      "createdAt": "2026-07-17T08:45:00Z"
    }
  }
}
6.REFERALS
POST /api/referrals
Description: Create patient referral
Access: Authenticated (Doctor only)

Request Body:
{
  "patientId": "P-101",
  "fromDoctorId": 1,
  "toDoctorId": 2,
  "toHospital": "Caloocan City Medical Center",
  "reason": "Cardiologist consultation needed",
  "diagnosis": "Hypertension with possible heart complications",
  "urgency": "High",
  "notes": "Patient needs ECG and cardiologist evaluation"
}

Response (201 Created):
{
  "status": "success",
  "data": {
    "referral": {
      "id": "REF-001",
      "status": "pending",
      "createdAt": "2026-07-17T09:25:00Z"
    }
  }
}

GET /api/referrals/patient/{patientId}
Description: Get patient referrals
Access: Authenticated (Doctor, Admin)

Response (200 OK):
{
  "status": "success",
  "data": {
    "referrals": [
      {
        "id": "REF-001",
        "date": "2026-07-17",
        "fromDoctor": "Dr. Elena Santos",
        "toDoctor": "Dr. Miguel Reyes (Cardiologist)",
        "toHospital": "Caloocan City Medical Center",
        "reason": "Cardiologist consultation needed",
        "status": "pending",
        "followUp": "2026-07-24"
      }
    ]
  }
}

7.MEDICAL RECORDS
GET /api/medical-records/{patientId}
Description: Get complete medical records of patient
Access: Authenticated (Doctor, Admin)

Response (200 OK):
{
  "status": "success",
  "data": {
    "patient": {
      "id": "P-101",
      "name": "Pedro Garcia"
    },
    "records": {
      "consultations": [...],
      "prescriptions": [...],
      "labResults": [...],
      "immunizations": [...],
      "allergies": ["None"],
      "conditions": ["Hypertension"],
      "surgeries": ["None"],
      "familyHistory": "Mother - Diabetes Type 2"
    }
  }
}

MODULE 2: SANITATION PERMITS API
1. Permits
Get Permits
text
GET /api/permits
Description: Get list of sanitation permits
Access: Authenticated (Sanitation Officer, Inspector, Clerk)

Query Parameters:
- status: "pending|approved|rejected|expired"
- type: "Food Establishment|Market Vendor|Bakery"
- dateFrom: "2026-01-01"
- dateTo: "2026-12-31"
- search: "ABC Restaurant"

Response (200 OK):
{
  "status": "success",
  "data": {
    "permits": [
      {
        "id": "SP-1040",
        "applicant": "ABC Restaurant",
        "type": "Food Establishment",
        "address": "123 Rizal St.",
        "dateApplied": "2026-06-20",
        "status": "pending",
        "inspector": "Unassigned",
        "fee": 1500.00,
        "paid": false
      }
    ]
  }
}
Create Permit Application
text
POST /api/permits
Description: Submit new permit application
Access: Authenticated (Clerk, Citizen)

Request Body:
{
  "applicant": "ABC Restaurant",
  "businessType": "Food Establishment",
  "address": "123 Rizal St.",
  "ownerName": "Juan Dela Cruz",
  "contact": "09123456789",
  "email": "abc.restaurant@email.com",
  "documents": [
    {
      "type": "Business Registration",
      "fileUrl": "https://storage.hsms.com/docs/abc_business_reg.pdf"
    },
    {
      "type": "Floor Plan",
      "fileUrl": "https://storage.hsms.com/docs/abc_floor_plan.pdf"
    }
  ],
  "fee": 1500.00
}

Response (201 Created):
{
  "status": "success",
  "data": {
    "permit": {
      "id": "SP-1044",
      "status": "pending",
      "createdAt": "2026-07-17T10:30:00Z"
    }
  }
}
Update Permit Status
text
PATCH /api/permits/{id}/status
Description: Update permit status
Access: Authenticated (Sanitation Officer)

Request Body:
{
  "status": "approved",
  "notes": "All requirements met",
  "inspector": "Juan Dela Cruz",
  "inspectionDate": "2026-07-20"
}

Response (200 OK):
{
  "status": "success",
  "message": "Permit status updated",
  "data": {
    "permit": {
      "id": "SP-1044",
      "status": "approved",
      "inspector": "Juan Dela Cruz"
    }
  }
}
2. Inspections
Create Inspection
text
POST /api/inspections
Description: Schedule/create new inspection
Access: Authenticated (Sanitation Officer, Inspector)

Request Body:
{
  "permitId": "SP-1040",
  "inspectorId": 5,
  "date": "2026-07-25",
  "time": "10:00 AM",
  "type": "Initial",
  "address": "123 Rizal St."
}

Response (201 Created):
{
  "status": "success",
  "data": {
    "inspection": {
      "id": "INS-503",
      "status": "scheduled",
      "createdAt": "2026-07-17T11:00:00Z"
    }
  }
}
Submit Inspection Report
text
POST /api/inspections/{id}/report
Description: Submit inspection findings
Access: Authenticated (Sanitation Inspector)

Request Body:
{
  "findings": [
    {
      "category": "Sanitation",
      "status": "compliant",
      "notes": "All sanitation requirements met"
    },
    {
      "category": "Food Safety",
      "status": "non-compliant",
      "notes": "Food storage temperature not maintained"
    }
  ],
  "overallStatus": "partially-compliant",
  "recommendations": "Fix food storage issues within 7 days",
  "attachments": [
    "https://storage.hsms.com/photos/inspection_abc_1.jpg"
  ]
}

Response (200 OK):
{
  "status": "success",
  "data": {
    "inspection": {
      "id": "INS-503",
      "status": "completed",
      "overallStatus": "partially-compliant"
    }
  }
}
3. Payments
Process Payment
text
POST /api/payments
Description: Process permit payment
Access: Authenticated (Cashier)

Request Body:
{
  "permitId": "SP-1044",
  "amount": 1500.00,
  "method": "GCash",
  "referenceNumber": "GCH-20260717-001",
  "paidBy": "Juan Dela Cruz"
}

Response (201 Created):
{
  "status": "success",
  "data": {
    "payment": {
      "id": "PAY-001",
      "amount": 1500.00,
      "status": "completed",
      "receipt": "https://storage.hsms.com/receipts/RCP-001.pdf"
    }
  }
}
💉 MODULE 3: IMMUNIZATION API
1. Children
Get Children
text
GET /api/children
Description: Get list of children
Access: Authenticated (Immunization Coordinator, Midwife)

Response (200 OK):
{
  "status": "success",
  "data": {
    "children": [
      {
        "id": "CH-001",
        "name": "Sofia Garcia",
        "age": "2 yrs",
        "gender": "Female",
        "mother": "Rosa Mendoza",
        "contact": "09123456789",
        "address": "123 Rizal St.",
        "vaccines": 75,
        "nextDue": "MMR Booster",
        "nutritionRisk": "Low",
        "weight": "12.4 kg"
      }
    ]
  }
}
Register Child
text
POST /api/children
Description: Register new child
Access: Authenticated (Midwife, Coordinator)

Request Body:
{
  "name": "Noah Torres",
  "gender": "Male",
  "birthDate": "2026-01-15",
  "motherName": "Elena Torres",
  "motherContact": "09123456789",
  "address": "456 Mabini Ave.",
  "birthWeight": 3.2,
  "birthHeight": 50,
  "bloodType": "O+"
}

Response (201 Created):
{
  "status": "success",
  "data": {
    "child": {
      "id": "CH-005",
      "createdAt": "2026-07-17T09:00:00Z"
    }
  }
}
2. Vaccinations
Record Vaccination
text
POST /api/vaccinations
Description: Record vaccine administration
Access: Authenticated (Midwife, Nurse)

Request Body:
{
  "childId": "CH-001",
  "vaccineName": "BCG",
  "dose": 1,
  "date": "2026-07-17",
  "administeredBy": "Midwife Maria Cruz",
  "healthCenter": "Health Center 1",
  "batchNumber": "BCG-2026-01",
  "expiryDate": "2027-12-31",
  "nextDueDate": "2026-08-17",
  "notes": "Good response"
}

Response (201 Created):
{
  "status": "success",
  "data": {
    "vaccination": {
      "id": "VAC-001",
      "createdAt": "2026-07-17T09:15:00Z"
    }
  }
}
Get Child Vaccination Schedule
text
GET /api/vaccinations/child/{childId}/schedule
Description: Get vaccination schedule for child
Access: Authenticated (Midwife, Coordinator)

Response (200 OK):
{
  "status": "success",
  "data": {
    "schedule": [
      {
        "vaccine": "BCG",
        "dueDate": "2026-01-15",
        "status": "completed",
        "dateCompleted": "2026-01-15"
      },
      {
        "vaccine": "DPT 1st Dose",
        "dueDate": "2026-03-15",
        "status": "completed",
        "dateCompleted": "2026-03-15"
      },
      {
        "vaccine": "MMR Booster",
        "dueDate": "2026-07-28",
        "status": "pending",
        "daysUntilDue": 11
      }
    ]
  }
}
3. Vaccine Inventory
Get Vaccine Inventory
text
GET /api/vaccine-inventory
Description: Get vaccine stock
Access: Authenticated (Vaccine Manager, Coordinator)

Response (200 OK):
{
  "status": "success",
  "data": {
    "inventory": [
      {
        "id": "INV-001",
        "vaccineName": "BCG",
        "batchNumber": "BCG-2026-01",
        "quantity": 150,
        "minimumStock": 50,
        "expiryDate": "2027-12-31",
        "temperature": 2.5,
        "status": "in-stock",
        "reorderLevel": 75
      }
    ],
    "alerts": [
      {
        "vaccine": "DPT",
        "quantity": 12,
        "alert": "Low stock - reorder immediately"
      }
    ]
  }
}
Update Vaccine Stock
text
PATCH /api/vaccine-inventory/{id}
Description: Update vaccine stock
Access: Authenticated (Vaccine Manager)

Request Body:
{
  "quantity": 120,
  "temperature": 2.5,
  "notes": "Received new shipment"
}

Response (200 OK):
{
  "status": "success",
  "message": "Inventory updated"
}
🏭 MODULE 4: WASTEWATER API
1. Septic Tanks
Get Septic Tanks
text
GET /api/septic-tanks
Description: Get list of septic tanks
Access: Authenticated (Wastewater Officer, Clerk)

Response (200 OK):
{
  "status": "success",
  "data": {
    "septicTanks": [
      {
        "id": "ST-001",
        "owner": "Pedro Garcia",
        "address": "123 Rizal St.",
        "latitude": 14.6542,
        "longitude": 120.9821,
        "capacity": "1200L",
        "type": "Concrete",
        "lastMaintenance": "2026-03-15",
        "status": "good"
      }
    ]
  }
}
2. Service Requests
Create Service Request
text
POST /api/service-requests
Description: Request wastewater service
Access: Authenticated (Citizen, Clerk)

Request Body:
{
  "tankId": "ST-001",
  "serviceType": "Desludging",
  "preferredDate": "2026-07-25",
  "preferredTime": "09:00 AM",
  "notes": "Accessible from front gate"
}

Response (201 Created):
{
  "status": "success",
  "data": {
    "request": {
      "id": "SR-001",
      "status": "pending",
      "createdAt": "2026-07-17T10:00:00Z"
    }
  }
}
🦟 MODULE 5: SURVEILLANCE API
1. Cases
Report Case
text
POST /api/cases
Description: Report new disease case
Access: Authenticated (Surveillance Officer, Field Investigator)

Request Body:
{
  "disease": "Dengue Fever",
  "patientName": "Juan Dela Cruz",
  "age": 34,
  "gender": "Male",
  "address": "123 Rizal St.",
  "barangay": "Barangay San Jose",
  "symptoms": ["High fever", "Headache", "Joint pain"],
  "onsetDate": "2026-07-14",
  "reportingFacility": "Health Center 1",
  "status": "confirmed",
  "severity": "Moderate",
  "contactTracing": {
    "householdContacts": 4,
    "workContacts": 10
  }
}

Response (201 Created):
{
  "status": "success",
  "data": {
    "case": {
      "id": "CS-005",
      "createdAt": "2026-07-17T09:30:00Z"
    }
  }
}
Get Cases by Barangay
text
GET /api/cases/barangay/{barangay}
Description: Get cases by barangay
Access: Authenticated (Surveillance Officer)

Response (200 OK):
{
  "status": "success",
  "data": {
    "barangay": "Barangay San Jose",
    "cases": [
      {
        "disease": "Dengue Fever",
        "cases": 12,
        "date": "2026-06-22",
        "severity": "Moderate"
      }
    ],
    "trend": "Rising"
  }
}
2. Outbreaks
Create Outbreak Alert
text
POST /api/outbreaks
Description: Create outbreak alert
Access: Authenticated (Surveillance Officer)

Request Body:
{
  "disease": "Dengue Fever",
  "barangays": ["Barangay San Jose", "Barangay Riverside"],
  "cases": 25,
  "severity": "High",
  "startDate": "2026-07-10",
  "status": "active",
  "recommendations": ["Immediate fogging", "Community education"],
  "emergency": true
}

Response (201 Created):
{
  "status": "success",
  "data": {
    "outbreak": {
      "id": "OUT-001",
      "alertLevel": "Red",
      "createdAt": "2026-07-17T08:00:00Z"
    }
  }
}
👨‍💼 SYSTEM ADMIN API
1. Users
Get Users
text
GET /api/users
Description: Get list of users
Access: Authenticated (Admin only)

Response (200 OK):
{
  "status": "success",
  "data": {
    "users": [
      {
        "id": 1,
        "name": "Maria Santos",
        "email": "maria.santos@caloocan.gov.ph",
        "role": "admin",
        "status": "active",
        "lastLogin": "2026-07-17T08:00:00Z",
        "createdAt": "2024-01-15T08:30:00Z"
      }
    ]
  }
}
Create User
text
POST /api/users
Description: Create new user
Access: Authenticated (Admin only)

Request Body:
{
  "name": "Anna Reyes",
  "email": "anna.reyes@caloocan.gov.ph",
  "password": "TempPass123!",
  "role": "nurse",
  "department": "Health Center 1"
}

Response (201 Created):
{
  "status": "success",
  "data": {
    "user": {
      "id": 7,
      "name": "Anna Reyes",
      "role": "nurse",
      "createdAt": "2026-07-17T11:00:00Z"
    }
  }
}
Update User Role
text
PATCH /api/users/{id}/role
Description: Update user role
Access: Authenticated (Admin only)

Request Body:
{
  "role": "doctor",
  "department": "Health Center 2"
}

Response (200 OK):
{
  "status": "success",
  "message": "User role updated"
}
2. System Logs
Get Audit Logs
text
GET /api/logs
Description: Get system audit logs
Access: Authenticated (Admin only)

Query Parameters:
- startDate: "2026-07-01"
- endDate: "2026-07-17"
- user: 1
- action: "login|view|edit|delete"
- module: "patients|permits|vaccines"

Response (200 OK):
{
  "status": "success",
  "data": {
    "logs": [
      {
        "id": 1,
        "timestamp": "2026-07-17T09:15:32Z",
        "user": "Dr. Elena Santos",
        "action": "view",
        "module": "patients",
        "target": "P-101",
        "ipAddress": "192.168.1.1",
        "details": "Viewed patient record"
      }
    ],
    "pagination": {
      "total": 1250,
      "page": 1,
      "limit": 20
    }
  }
}

Success Response
json
{
  "status": "success",
  "data": { ... },
  "message": "Optional success message"
}
Error Response
json
{
  "status": "error",
  "message": "Error description",
  "code": "ERR_001",
  "details": {}
}
Paginated Response
json
{
  "status": "success",
  "data": {
    "items": [],
    "pagination": {
      "total": 100,
      "page": 1,
      "limit": 20,
      "pages": 5
    }
  }
}

🔒 API SECURITY
Headers Required
text
Authorization: Bearer {jwt_token}
Content-Type: application/json
Accept: application/json
X-API-Key: {optional_api_key}
Rate Limiting
text
X-RateLimit-Limit: 1000
X-RateLimit-Remaining: 950
X-RateLimit-Reset: 2026-07-17T12:00:00Z
Error Codes
text
AUTH_001: Invalid credentials
AUTH_002: Token expired
AUTH_003: Insufficient permissions
ERR_404: Resource not found
ERR_400: Bad request
ERR_500: Internal server error