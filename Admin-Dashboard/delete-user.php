<?php

include '../db_connection.php';

$user_id = $_GET['id'];
$sql = "DELETE FROM `registration` WHERE `regid` = '{$user_id}'";

if(mysqli_query($conn,$sql)){
    echo '<script>confirm("Do You Want Delete This User !!")</script>';
    header("Location: http://localhost/krushi kendra project/Admin-Dashboard/users.php");
}else{
    echo '<script>alert("Can not Delete User")</script>';
}

mysqli_close($conn);
?>