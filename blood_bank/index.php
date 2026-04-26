<?php
include 'db_connection.php';

// Total Donors
$total_donors = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM donors"));

// Total Requests
$total_requests = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM blood_requests"));

// Emergency Requests
$total_emergency = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM blood_requests WHERE emergency=1"));
?>

<!DOCTYPE html>
<html>
<head>
<title>Blood Bank System</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<!-- HEADER -->
<header>
<h1>Blood Bank Management System</h1>
</header>

<!-- BANNER -->
<section class="banner">
<h2>Donate Blood, Save Life ❤️</h2>
<p>Your blood can give someone another chance at life</p>
</section>

<!-- MENU CARDS -->
<div class="menu">

<a href="register.php" class="menu-card">
<img src="images/donor.png" alt="Become Donor">
<h3>Become Donor</h3>
</a>

<a href="blood_request.php" class="menu-card">
<img src="images/request.png" alt="Request Blood">
<h3>Request Blood</h3>
</a>

<a href="donors.php" class="menu-card">
<img src="images/list.png" alt="View Donors">
<h3>View Donors</h3>
</a>

<a href="blood_requests.php" class="menu-card">
<img src="images/request_list.png" alt="View Requests">
<h3>View Requests</h3>
</a>

<a href="login.php" class="menu-card">
<img src="images/admin.png" alt="Admin Panel">
<h3>Admin Panel</h3>
</a>

</div>

<!-- WEBSITE STATISTICS -->
<div class="stats">
<div class="card">
<h2><?php echo $total_donors; ?></h2>
<p>Total Donors</p>
</div>

<div class="card">
<h2><?php echo $total_requests; ?></h2>
<p>Total Requests</p>
</div>

<div class="card">
<h2><?php echo $total_emergency; ?></h2>
<p>Emergency Requests</p>
</div>
</div>

<!-- FOOTER -->
<footer>
<p>Blood Bank System | Save Lives ❤️</p>
</footer>

</body>
</html>