<?php
session_start();

if(!isset($_SESSION['admin_username'])){
    header("Location: http://localhost/krushi kendra project/Admin-Dashboard/");
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin.css">
    <link rel="icon" type="image/x-icon" href="../images/icon2.png">
</head>
<body class="dash-body">
    <div class="admin-side-bar-1">

        <div class="side-1-menu-title"> 
            <div class="menu-title">
                <h1>Menus</h1>
            </div>
            <hr>
        </div>

        <div class="menu-list">
            <ul>
            <li id="admin-login-li">
                <?php 
                // session_start(); 
                include '../db_connection.php';
                if(isset($_SESSION['admin_username']) && isset($_SESSION['admin_password'])) {

                ?>
                <a href="#">Hello,<?php echo $admin_name = $_SESSION['admin_username']; }?></a><span>
                <a href="admin-profile.php"><img src="../images/logout.png" alt="logimg" class="admin-logout-img"></a></span>
            </li> <hr>


                <li><a href="home.php">HOME</a></li>
                <li><a href="fertilizer.php">Fertilizers</a></li>
                <li><a href="pesticide.php">Pesticides</a></li>
                <li><a href="herbicides.php">Herbicides</a></li>
                <li><a href="fungicides.php">Fungicides</a></li>
                <li><a href="comment.php">Comments</a></li>
                <li><a href="users.php">Users</a></li>
                <li><a href="order.php">Orders</a></li>
                <li><a href="supplyer.php">Supplyers</a></li>
                <li><a href="harvesters.php">Harvesters</a></li>
                
        
            </ul>
        </div>
    </div>
<!-- ////////////////////////////////////////////////////////////////////////////////////// -->

<div class="admin-side-bar-2">
    <div class="side-1-menu-title"> 
        <div class="menu-title">
            <h1>DashBoard</h1>
        </div>
        <hr>
    </div>
<!-- ////////////////////////////////////////code//////////////////////////////////////////// -->

