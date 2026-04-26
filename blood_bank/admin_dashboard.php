<?php
session_start();
if(!isset($_SESSION['admin_logged_in'])){
    header("Location: admin_login.php");
    exit();
}

include 'db_connection.php';
?>

<!DOCTYPE html>
<html>
<head>
<title>Admin Dashboard</title>
<link rel="stylesheet" href="style.css">
<style>
body{font-family:Arial,sans-serif;background:#f2f2f2;margin:0;padding:0;}
header{background:#b30000;color:white;padding:15px;text-align:center;}
.container{width:95%;margin:20px auto;}
h2{text-align:center;color:#333;}
.logout-btn{float:right;background:#fff;color:#b30000;padding:6px 12px;border-radius:5px;text-decoration:none;font-weight:bold;margin-top:-35px;}
.logout-btn:hover{background:#ffe6e6;}
table{width:100%;border-collapse:collapse;background:#fff;border-radius:10px;overflow:hidden;box-shadow:0 0 10px rgba(0,0,0,0.1);margin-bottom:40px;}
th,td{padding:12px;text-align:center;border-bottom:1px solid #ccc;}
th{background:#b30000;color:#fff;font-weight:bold;}
tr:nth-child(even){background:#f9f9f9;}
tr:hover{background:#ffe6e6;}
a.delete-button{background:#b30000;color:#fff;padding:6px 12px;border-radius:5px;text-decoration:none;font-weight:500;}
a.delete-button:hover{background:#800000;}
</style>
</head>
<body>

<header>
<h1>Welcome, <?php echo $_SESSION['admin_username']; ?></h1>
<a class="logout-btn" href="admin_logout.php">Logout</a>
</header>

<div class="container">
<h2>All Donors</h2>
<table>
<tr>
<th>ID</th>
<th>Name</th>
<th>Blood Group</th>
<th>City</th>
<th>Action</th>
</tr>
<?php
$donors_result = mysqli_query($conn,"SELECT * FROM donors ORDER BY id ASC");
while($row=mysqli_fetch_assoc($donors_result)){
    echo "<tr>";
    echo "<td>".$row['id']."</td>";
    echo "<td>".htmlspecialchars($row['name'])."</td>";
    echo "<td>".$row['blood_group']."</td>";
    echo "<td>".htmlspecialchars($row['city'])."</td>";
    echo "<td><a class='delete-button' href='delete_donor.php?id=".$row['id']."' onclick='return confirm(\"Delete this donor?\");'>Delete</a></td>";
    echo "</tr>";
}
?>
</table>

<h2>All Blood Requests</h2>
<table>
<tr>
<th>ID</th>
<th>Patient Name</th>
<th>Blood Group</th>
<th>Units</th>
<th>Hospital</th>
<th>City</th>
<th>Emergency</th>
<th>Action</th>
</tr>
<?php
$requests_result = mysqli_query($conn,"SELECT * FROM blood_requests ORDER BY id ASC");
while($row=mysqli_fetch_assoc($requests_result)){
    echo "<tr>";
    echo "<td>".$row['id']."</td>";
    echo "<td>".htmlspecialchars($row['patient_name'])."</td>";
    echo "<td>".$row['blood_group']."</td>";
    echo "<td>".$row['units']."</td>";
    echo "<td>".htmlspecialchars($row['hospital'])."</td>";
    echo "<td>".htmlspecialchars($row['city'])."</td>";
    echo "<td>".($row['emergency'] ? 'Yes' : 'No')."</td>";
    echo "<td><a class='delete-button' href='delete_request.php?id=".$row['id']."' onclick='return confirm(\"Delete this request?\");'>Delete</a></td>";
    echo "</tr>";
}
?>
</table>
</div>

</body>
</html> 