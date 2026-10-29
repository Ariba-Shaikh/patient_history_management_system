# Healing Hands Clinic History Management System

### Overview of Project: 
Healing Hands Clinic History Management System is a website to store the history of patients came in a doctor's clinic. the website includes a login page *(For receptionist, Doctor and Admin)* to login.<br><br>

Receptionist has to handle an appointment form page which stores patient’s data and appointment related information, the data gets stored in the database connected to *http://localhost/phpmyadmin*.
The moment this form is filled, this appointment is scheduled in today's apponitment list in *"View Appointments"* card.
<br><br>
After meeting with Doctor,  receptionist needs to fill another form which stores the prescription, diagnosis etc. This form's data is stored as patient history, this history is accessible in *"Patient's History"* section.<br><br>
Another feature is of searching, user can search a particular patient's ID which retrives the required patient's data from patient's history data brings the user to respective data of that patient.
The *"Login History"* section is  accessible for admin only as it is an important data.
<br><br>

---
**This is a mini project, this project can be improved with further enhancements, such as:**
- Automatic scheduling of appointment for the next patient.
- Good looking user interface for the Doctor to see upcoming patient's data
- Log-out message before leaving website.
<br> <br>

---
### Technologies used:<br> 
1. Frontend:
    - HTML
    - CSS
    - JavaScript

2. Backend:
    - PHP
<br><br>
--- 
### Required Installation:
- XAMPP

### Notes:

1. You must have database created in *http://localhost/phpmyadmin*

2. Set the same password in the code of connection which you would have set in **phpMyAdmin** while creating database

3. Type *"http://localhost/your_folder_name/file_name(login.html)"* and the project runs.
