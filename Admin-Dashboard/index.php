
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Admin Login</title>
    <link rel="icon" type="image/x-icon" href="images/icon2.png">
</head>
<body class="login-body" >
<div class="login-body2">
<div class="login-main-div">
            <div class="login-title">
                <h1>Admin Login</h1>
            </div>
            <hr>

    <div class="login-form-div">
        <form action="<?php $_SERVER['PHP_SELF']; ?>" class="login-form" method="post">
            <div class="login-id">
                <label for="">Mobile or Email</label>
                <input type="text" placeholder="Your Mobile or email" required name ="admin_name">
            </div>

            <div class="login-id">
                <label for="">Password</label>
                <input type="password" placeholder="Your password" required name="admin_password">
            </div>

            <div class="login-id2">
                <input type="submit" value="Log In" required name="admin_submit">
            </div>
            
        </form>
       
    </div>
    
<?php 

include '../db_connection.php';

if(isset($_POST['admin_submit'])){

$admin_name = $_POST['admin_name'];
$admin_password = $_POST['admin_password'];

$sql = "SELECT * FROM `admin_login` WHERE `admin_name` = '{$admin_name}' AND `admin_password` = '{$admin_password}'" or die("query failed");

$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result) > 0){
   
   session_start();
   $_SESSION['admin_username'] = $admin_name;
   $_SESSION['admin_password'] = $admin_password;
    header("Location: http://localhost/krushi kendra project/Admin-Dashboard/home.php");
}else{
    echo'<h3 style="color:red;text-align:center;margin:20px 0px;">User Name & Password Incorrect !!</h3>';
}

}


?>
   
</div>
</div>
</body>
</html>