<?php
session_start();
include 'db_connection.php';

$error = '';

if(isset($_POST['login'])){
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    $query = "SELECT * FROM admin WHERE username='$username' AND password='$password' LIMIT 1";
    $result = mysqli_query($conn,$query);

    if(mysqli_num_rows($result) == 1){
        $_SESSION['admin_logged_in'] = true;
        $_SESSION['admin_username'] = $username;
        header("Location: admin_dashboard.php");
        exit();
    } else {
        $error = "Invalid username or password";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Admin Login</title>
<link rel="stylesheet" href="style.css">
<style>
body{font-family:Arial,sans-serif;background:#f2f2f2;margin:0;padding:0;}
.login-box{width:350px;margin:100px auto;padding:30px;background:#fff;border-radius:10px;box-shadow:0 0 10px rgba(0,0,0,0.1);}
.login-box h2{text-align:center;color:#b30000;}
.login-box input[type="text"], .login-box input[type="password"]{width:100%;padding:12px;margin:10px 0;border:1px solid #ccc;border-radius:5px;}
.login-box input[type="submit"]{width:100%;padding:12px;background:#b30000;color:#fff;border:none;border-radius:5px;font-weight:bold;cursor:pointer;}
.login-box input[type="submit"]:hover{background:#800000;}
.error{color:red;text-align:center;}
</style>
</head>
<body>

<div class="login-box">
<h2>Admin Login</h2>
<?php if($error != '') { echo '<p class="error">'.$error.'</p>'; } ?>
<form method="post" action="">
    <input type="text" name="username" placeholder="Username" required>
    <input type="password" name="password" placeholder="Password" required>
    <input type="submit" name="login" value="Login">
</form>
</div>

</body>
</html>