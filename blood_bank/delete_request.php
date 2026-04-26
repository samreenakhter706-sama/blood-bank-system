<?php
include 'db_connection.php';

if(isset($_GET['id'])){
    $id = (int)$_GET['id']; // cast to int for safety
    mysqli_query($conn, "DELETE FROM blood_requests WHERE id=$id");
}

// Redirect back to blood requests page
header("Location: blood_requests.php");
exit();
?>