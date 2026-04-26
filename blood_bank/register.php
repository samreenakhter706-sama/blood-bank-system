<?php
include 'db_connection.php';

if(isset($_POST['submit'])){

$name = $_POST['name'];
$city = $_POST['city'];
$blood_group = $_POST['blood_group'];
$phone = $_POST['phone'];

$query = "INSERT INTO donors (name, city, blood_group, phone) 
VALUES ('$name','$city','$blood_group','$phone')";

$result = mysqli_query($conn,$query);

if($result){
echo "<script>alert('Donor Registered Successfully');</script>";
}
else{
echo "Error: ".mysqli_error($conn);
}

}
?>

<!DOCTYPE html>
<html>
<head>

<title>Register Donor</title>
<link rel="stylesheet" href="style.css">

</head>

<body>

<header>
<h1>Blood Bank Management System</h1>
</header>

<div class="form-container">

<h2>Become a Blood Donor</h2>

<form method="POST">

<input type="text" name="name" placeholder="Enter Name" required>

<input type="text" name="city" placeholder="Enter City" required>

<select name="blood_group" required>

<option value="">Select Blood Group</option>
<option>A+</option>
<option>A-</option>
<option>B+</option>
<option>B-</option>
<option>AB+</option>
<option>AB-</option>
<option>O+</option>
<option>O-</option>

</select>

<input type="text" name="phone" placeholder="Phone Number" required>

<button type="submit" name="submit">Register Donor</button>

</form>

</div>

</body>
</html>