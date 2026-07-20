
Main Actors
Citizens / Patients
Health Center Staff
Sanitary Inspectors
Barangay Health Workers (BHWs)
Doctors / Nurses / Midwives
Environmental / Wastewater Personnel
Health Administrator / CHO Head
System Administrator
MODULE 1 — Health Center Services
Who enters data?
Receptionist
Nurse
Doctor
Midwife
Laboratory staff
What data is entered?
Patient registration
Consultation notes
Diagnosis
Prescriptions
Referrals
Laboratory results
Medical certificates
Who uses the data?
Doctors
Nurses
Health Administrator
Reports Module
Health Surveillance Module

Flow:

Citizen
      │
Registers
      │
Receptionist
      │
Doctor/Nurse
      │
Medical Record
      │
Reports
Analytics
Health Surveillance
MODULE 2 — Sanitation Permits
Who enters data?
Business Owner (application)
Sanitation Inspector
Permit Officer
Data
Business information
Permit application
Inspection findings
Violations
Permit approval
Renewal
Who uses it?
Permit Office
Compliance Module
Reports
Analytics

Flow

Business Owner
      │
Permit Application
      │
Inspector
      │
Inspection Report
      │
Permit Officer
      │
Permit Database
MODULE 3 — Immunization & Nutrition
Who enters?
Barangay Health Worker
Nurse
Midwife
Nutritionist
Data
Child profile
Vaccinations
Weight
Height
Nutrition assessment
Supplements
Who uses?
Parents (view)
Nurses
Midwives
Health Administrator
Health Surveillance

Flow

Child
     │
BHW / Nurse
     │
Vaccination Record
     │
Growth Chart
     │
Analytics
MODULE 4 — Wastewater Services
Who enters?
Citizen (service request)
Field Personnel
Sanitation Inspector
Data
Septic tank registration
Service request
Inspection
Desludging
Billing
Who uses?
Wastewater Team
Environmental Office
Analytics
Health Surveillance

Flow

Citizen
      │
Service Request
      │
Field Team
      │
Inspection
      │
Completed Service
MODULE 5 — Health Surveillance

This module mostly receives data.

Receives data from

Health Center

↓

Immunization

↓

Laboratory

↓

Sanitation

↓

Wastewater

↓

Barangay Reports

It combines everything.

Who enters?

Mostly automatic.

Some manual entries by

Epidemiology Officer
Disease Surveillance Officer
Who uses?
City Health Officer
Mayor
Administrators
Decision Makers

Flow

Health Center
Immunization
Sanitation
Wastewater
      │
      ▼
Health Surveillance
      │
      ▼
Dashboard
AI
Reports
Dashboard / Analytics / Reports

These modules usually do not create data.

They read data from every operational module.

All Modules
      │
      ▼
Dashboard

Analytics

Reports

Compliance
Overall Data Flow
                CITIZENS
                    │
     ┌──────────────┼──────────────┐
     │              │              │
Patient      Business Owner    Resident
     │              │              │
     ▼              ▼              ▼
Health Center  Sanitation    Wastewater
     │              │              │
     └───────┬──────┴──────────────┘
             │
             ▼
Immunization & Nutrition
             │
             ▼
Health Surveillance
             │
      ┌──────┼─────────┐
      ▼      ▼         ▼
 Dashboard Analytics Reports
             │
             ▼
   City Health Officer / LGU Management
Is this realistic?

Yes. It closely mirrors how local government health offices operate:

Citizens provide requests or personal information.
Health personnel (receptionists, nurses, doctors, inspectors, BHWs, environmental staff) create and update operational records.
The system consolidates data into dashboards, reports, and analytics.
Decision-makers (e.g., the City Health Officer and supervisors) consume those outputs for planning, monitoring, and compliance.

This creates a complete end-to-end flow from data collection → service delivery → monitoring → decision support, which is exactly what a Health & Sanitation Management Information System should accomplish.










Since you said:

✅ Web = Management & Administrative System (staff use it)
✅ Mobile App = Citizen App

Then the workflow should be divided like this.

Health Center Services
Citizen

Uses the mobile app to:

Book an appointment
View appointment status
View prescriptions
View medical history (if allowed)
View referrals
Receive notifications
Staff

Uses the web system to:

Register walk-in patients
Record consultations
Enter diagnoses
Enter prescriptions
Record laboratory results
Update patient records

Reason: Doctors and nurses are the ones who should create official medical records.

Immunization & Nutrition
Citizen
View vaccination schedule
Receive reminders
View immunization history
View child's growth chart
Staff
Record vaccinations
Record weight/height
Enter nutrition assessments
Update vaccine inventory
Sanitation Permits

Here the citizen (or business owner) can do much more.

Citizen
Apply for a permit
Upload documents
Track application status
Download permit
Receive renewal reminders
Staff
Review applications
Schedule inspections
Record inspection results
Approve or reject permits
Generate permits
Wastewater Services
Citizen
Request desludging
Report wastewater problems
Track service requests
View invoices
Staff
Assign field teams
Schedule services
Record inspections
Update service completion
Process billing
Health Surveillance
Citizen

Almost nothing.

Maybe only:

Report symptoms
Report health incidents
Staff

Everything else.

Verify reports
Investigate cases
Record outbreaks
Update surveillance records
Overall
Citizen Mobile App
Appointments

Permit Applications

Service Requests

Notifications

View Records

View Vaccines

Download Permits

Track Requests

Citizens mostly request services and view information.

Staff Web System
Patient Registration

Consultations

Medical Records

Vaccinations

Permit Processing

Inspections

Wastewater Operations

Disease Reports

Analytics

Reports

Dashboard

Staff create and maintain the official records.

Should citizens manually enter patient information?

For a Philippine LGU, I would not let citizens create official health records.

A realistic workflow is:

Walk-in patient
Citizen arrives

↓

Receptionist registers patient

↓

Nurse records vital signs

↓

Doctor performs consultation

↓

Doctor enters diagnosis

↓

System saves medical record

↓

Citizen can later view the result in the mobile app
Online appointment
Citizen books appointment using the mobile app

↓

Staff confirms the appointment

↓

Citizen visits the health center

↓

Staff records the consultation

↓

Citizen views the completed record in the mobile app

This mirrors how most health centers and hospitals operate: citizens initiate requests and access their own information, while healthcare staff create and update the official medical records. This approach is also better for data quality and accountability because only authorized personnel can modify clinical records.