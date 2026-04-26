<?php
include 'db_connection.php';

$blood = "";

if(isset($_GET['blood'])){
    $blood = trim($_GET['blood']);
}

$query = "SELECT * FROM donors WHERE blood_group='$blood'";
$result = mysqli_query($conn,$query);
?>

<!DOCTYPE html>
<html>
<head>
<title>Matching Donors</title>

<style>
body{
font-family:Arial;
background:#f2f2f2;
}

h2{
text-align:center;
margin-top:30px;
}

table{
width:80%;
margin:30px auto;
border-collapse:collapse;
background:white;
box-shadow:0 0 10px rgba(0,0,0,0.1);
}

th,td{
padding:12px;
text-align:center;
border-bottom:1px solid #ddd;
}

th{
background:#b30000;
color:white;
}

tr:hover{
background:#ffe6e6;
}

.call-btn{
background:#28a745;
color:white;
padding:6px 12px;
text-decoration:none;
border-radius:5px;
}

.call-btn:hover{
background:#1e7e34;
}
</style>

</head>

<body>

<h2>Matching Blood Donors</h2>

<table>

<tr>
<th>Name</th>
<th>Blood Group</th>
<th>City</th>
<th>Phone</th>
<th>Contact</th>
</tr>

<?php

if($blood!=""){

if(mysqli_num_rows($result)>0){

while($row=mysqli_fetch_assoc($result)){

echo "<tr>";

echo "<td>".$row['name']."</td>";
echo "<td>".$row['blood_group']."</td>";
echo "<td>".$row['city']."</td>";
echo "<td>".$row['phone']."</td>";

echo "<td>
<a class='call-btn' href='tel:".$row['phone']."'>Call</a>
</td>";

echo "</tr>";

}

}else{

echo "<tr><td colspan='5'>No matching donors found</td></tr>";

}

}else{

echo "<tr><td colspan='5'>Blood group not provided</td></tr>";

}

?>

</table>

</body>
</html>