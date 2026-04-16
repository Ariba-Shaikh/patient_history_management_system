<?php
session_start();
if (!isset($_SESSION['staff_logged_in']) || $_SESSION['staff_logged_in'] !== true) {
    header("Location: login.html");
    exit();
}
?>


<!DOCTYPE html>
<html>
<head>
<title>Healing Hands</title>

<meta charset="UTF-8">
<meta name="keywords" content="Healing Hands, healing hands, healing hands login">
<meta name="description" content="clinic history dashboard">
<meta http-equiv="refresh" content="30">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">


<link rel="stylesheet" href="dashstyle.css" />
</head>
<body>

<header>
<img src="logo.jpg" width="95%" height="210px">
<marquee direction="right"><h1>Welcome to Healing Hands Clinic Website!</h1></marquee>

<form action="search_patient_history.php" method="GET">

<input type="search" placeholder="🔍︎ Search for Patient's Appointment ID Here" name="patient_id" id="searchbar">

</form>

</header>

<div class="container">

<nav class="sidebar">

<ul>

<li><a href="patients_history.php"><i class="fa-solid fa-clipboard-list"></i>  Patients History</a></li> <!--Patient's Detail Form-->

<li><a href="login_history.php"><i class="fa-solid fa-clock-rotate-left"></i>  Login History</a></li>	 <!--Shows Login History-->

<li><a href="logout.php"><i class="fa-solid fa-right-from-bracket"></i>  Log Out</a></li>			 <!--Logs the staff out-->

</ul>
</nav>

<main class="main-content">

<div id="datetime-widget">
  <div id="date"></div>
  <div id="clock"></div>
</div>




<section>
<a href="appointment_scheduling_form.php" style="text-decoration: none;">
<div class="apmnt">
<h2><i class="fa-solid fa-calendar-plus"></i>  Schedule Appointments</h2>
</div>
</a>
</section>

<section>
<a href="patient_registration_form.php" style="text-decoration: none;">
<div class="regP">
<h2><i class="fa-solid fa-user-plus"></i>  Register a Patient</h2>
</div>
</a>
</section>

<section>
<a href="doctors_availability.php" style="text-decoration: none;">
<div class="doc_av">
<h2><i class="fa-solid fa-user-doctor"></i>  Doctor's Availability</h2>
</div>
</a>
</section>

<section>
<a href="view_appointments.php">
<div class="view_app">
<h2><i class="fa-solid fa-calendar-check"></i>  View Appointments</h2>
</div>
</a>
</section>

</main>
</div>
</body>

<script>
  function updateDateTime() {
    const now = new Date();
    
    // Format date
    const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
    const formattedDate = now.toLocaleDateString('en-IN', options);
    
    // Format time
    const formattedTime = now.toLocaleTimeString('en-IN', { hour: '2-digit', minute: '2-digit', second: '2-digit' });

    document.getElementById("date").innerText = formattedDate;
    document.getElementById("clock").innerText = formattedTime;
  }

  // Update every second
  setInterval(updateDateTime, 1000);
  updateDateTime(); // Initial call
</script>


</html>