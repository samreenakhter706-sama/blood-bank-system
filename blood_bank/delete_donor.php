<?php
include 'db_connection.php';

if(isset($_GET['id'])){
    $id = (int)$_GET['id']; // cast to int for safety
    mysqli_query($conn, "DELETE FROM donors WHERE id=$id");
}

// Redirect back to donors page
header("Location: donors.php");
exit();
?>