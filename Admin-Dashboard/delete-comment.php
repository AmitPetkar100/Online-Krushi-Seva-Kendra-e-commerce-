<?php
include '../db_connection.php';

echo $comm_id = $_GET['comid'];

$sql = "DELETE FROM `comment` WHERE `comm_id` = '{$comm_id}'" or die("Query Failed");

if(mysqli_query($conn,$sql)){
    
    header("Location: http://localhost/krushi kendra project/Admin-Dashboard/comment.php");
    echo '<script> alert("Comment Deleted Successful") </script>';
}else{
    echo '<script>alert("Can not Delete Comment")</script>';
}

mysqli_close($conn);
?>