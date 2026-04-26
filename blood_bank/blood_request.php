<?php
ob_start(); // Output buffering start
include 'db_connection.php';

if(isset($_POST['submit'])){
    $patient = $_POST['patient_name'];
    $blood = $_POST['blood_group'];
    $units = $_POST['units'];
    $hospital = $_POST['hospital'];
    $city = $_POST['city'];

    $emergency = isset($_POST['emergency']) ? 1 : 0;

    $query = "INSERT INTO blood_requests (patient_name,blood_group,units,hospital,city,emergency)
              VALUES ('$patient','$blood','$units','$hospital','$city','$emergency')";

    if(mysqli_query($conn,$query)){
        // Redirect prevents double insert & hides raw data
       
        header("Location: match_donors.php?blood=".urlencode($blood));
        exit();
    } else {
        echo "<script>alert('Error: ".mysqli_error($conn)."');</script>";
    }
}

// Alert only after redirect
if(isset($_GET['success'])){
    echo "<script>alert('Request Submitted Successfully');</script>";
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Request Blood</title>
<link rel="stylesheet" href="style.css">
<style>
body{font-family: Arial, sans-serif; background:#f2f2f2; margin:0; padding:0;}
.form-container{
    width: 400px;
    margin: 50px auto;
    padding: 20px;
    background:#fff;
    border-radius: 10px;
    box-shadow: 0 0 15px rgba(0,0,0,0.2);
}
.form-container h2{text-align:center; margin-bottom:20px; color:#333;}
.form-container input, .form-container select{
    width:100%; padding:10px; margin:10px 0; border-radius:5px; border:1px solid #ccc;
}
.form-check{display:flex; align-items:center; gap:10px; margin:10px 0;}
.form-check input[type="checkbox"]{width:18px; height:18px; cursor:pointer;}
.form-check label{font-size:16px; font-weight:500; cursor:pointer;}
button[type="submit"]{
    width:100%; padding:10px; background:#b30000; color:white; border:none; border-radius:5px; cursor:pointer; font-size:16px;
}
button[type="submit"]:hover{background:#800000;}
</style>
</head>
<body>
<div class="form-container">
<h2>Blood Request Form</h2>
<form method="POST" action="blood_request.php">
    <input type="text" name="patient_name" placeholder="Patient Name" required>
    
    <select name="blood_group" required>
        <option value="">Select Blood Group</option>
        <option>A+</option>
        <option>A-</option>
        <option>B+</option>
        <option>B-</option>
        <option>O+</option>
        <option>O-</option>
        <option>AB+</option>
        <option>AB-</option>
    </select>
    
    <input type="number" name="units" placeholder="Required Units" min="1" required>
    <input type="text" name="hospital" placeholder="Hospital Name" required>
    <input type="text" name="city" placeholder="City" required>
    
    <div class="form-check">
      <input type="checkbox" name="emergency" id="emergency">
      <label for="emergency">Emergency Request</label>
    </div>
    
    <button type="submit" name="submit">Submit Request</button>
</form>
</div>
</body>
</html>