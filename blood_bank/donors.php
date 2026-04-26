<?php
include 'db_connection.php';

// Fetch all donors
$donors_result = mysqli_query($conn,"SELECT * FROM donors ORDER BY id DESC");
?>

<!DOCTYPE html>
<html>
<head>
<title>All Donors</title>
<link rel="stylesheet" href="style.css">
<style>
body{font-family:Arial,sans-serif;background:#f2f2f2;margin:0;padding:0;}
h2{text-align:center;margin:20px 0;color:#333;}
table{width:90%;margin:20px auto;border-collapse:collapse;background:#fff;border-radius:10px;overflow:hidden;box-shadow:0 0 10px rgba(0,0,0,0.1);}
th,td{padding:12px;text-align:center;border-bottom:1px solid #ccc;}
th{background:#b30000;color:#fff;font-weight:bold;} /* RED heading */
tr:nth-child(even){background:#f9f9f9;}
tr:hover{background:#ffe6e6;}
a.delete-button{background:#b30000;color:#fff;padding:6px 12px;border-radius:5px;text-decoration:none;font-weight:500;} /* RED delete button */
a.delete-button:hover{background:#800000;}
</style>
</head>
<body>

<h2>All Donors</h2>

<table>
<tr>
<th>#</th> <!-- Serial number -->
<th>Name</th>
<th>Blood Group</th>
<th>City</th>
<th>Action</th>
</tr>

<?php 
$counter = 1; // Initialize serial counter
while($row=mysqli_fetch_assoc($donors_result)){ ?>
<tr>
<td><?php echo $counter++; ?></td> <!-- Sequential numbering -->
<td><?php echo htmlspecialchars($row['name']); ?></td>
<td><?php echo $row['blood_group']; ?></td>
<td><?php echo htmlspecialchars($row['city']); ?></td>
<td>
<a class="delete-button" href="delete_donor.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Delete this donor?');">Delete</a>
</td>
</tr>
<?php } ?>

</table>

</body>
</html>