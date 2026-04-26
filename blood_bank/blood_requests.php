<?php
include 'db_connection.php';

// Fetch all blood requests
$requests_result = mysqli_query($conn,"SELECT * FROM blood_requests ORDER BY id DESC");
?>

<!DOCTYPE html>                                             
<html>
<head>
<title>All Blood Requests</title>
<link rel="stylesheet" href="style.css">
<style>
body{font-family:Arial,sans-serif;background:#f2f2f2;margin:0;padding:0;}
h2{text-align:center;margin:20px 0;color:#333;}
table{width:95%;margin:20px auto;border-collapse:collapse;background:#fff;border-radius:10px;overflow:hidden;box-shadow:0 0 10px rgba(0,0,0,0.1);}
th,td{padding:12px;text-align:center;border-bottom:1px solid #ccc;}
th{background:#b30000;color:#fff;font-weight:bold;}
tr:nth-child(even){background:#f9f9f9;}
tr:hover{background:#ffe6e6;}
a.delete-button{background:#b30000;color:#fff;padding:6px 12px;border-radius:5px;text-decoration:none;font-weight:500;}
a.delete-button:hover{background:#800000;}
a.call-button{background:#28a745;color:#fff;padding:4px 10px;border-radius:5px;text-decoration:none;font-weight:500;margin-left:5px;}
a.call-button:hover{background:#1c7c31;}
</style>
</head>
<body>

<h2>All Blood Requests</h2>

<table>
<tr>
<th>#</th>
<th>Patient Name</th>
<th>Blood Group</th>
<th>Units</th>
<th>Hospital</th>
<th>City</th>
<th>Emergency</th>
<th>Matching Donors</th> <!-- New Column -->
<th>Action</th>
</tr>

<?php 
$counter = 1; // Initialize serial counter
while($row=mysqli_fetch_assoc($requests_result)){ ?>
<tr>
<td><?php echo $counter++; ?></td>
<td><?php echo htmlspecialchars($row['patient_name']); ?></td>
<td><?php echo $row['blood_group']; ?></td>
<td><?php echo $row['units']; ?></td>
<td><?php echo htmlspecialchars($row['hospital']); ?></td>
<td><?php echo htmlspecialchars($row['city']); ?></td>
<td><?php echo $row['emergency'] ? 'Yes' : 'No'; ?></td>

<!-- Matching Donors Column -->
<td>
<?php
// Check donors for this blood request
$request_blood_group = $row['blood_group'];
$donor_query = "SELECT * FROM donors WHERE blood_group='$request_blood_group'";
$donor_result = mysqli_query($conn, $donor_query);

if(mysqli_num_rows($donor_result) > 0){
    while($donor = mysqli_fetch_assoc($donor_result)){
        // Show donor name + call button
        echo htmlspecialchars($donor['name']) . " - ";
        echo "<a class='call-button' href='tel:" . $donor['phone'] . "'>Call</a><br>";
    }
} else {
    echo "No donor available";
}
?>
</td>

<td>
<a class="delete-button" href="delete_request.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Delete this request?');">Delete</a>
</td>
</tr>
<?php } ?>

</table>

</body>
</html>