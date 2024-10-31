

<?php
include '../db_connection.php';

echo $pro_id = $_GET['proid'];

$sql = "DELETE FROM `products` WHERE `pro_id` = '{$pro_id}'" or die("Query Failed");

if(mysqli_query($conn,$sql)){
    
    header("Location: http://localhost/krushi kendra project/Admin-Dashboard/home.php");
    echo '<script> alert("product Deleted Successful") </script>';
}else{
    echo '<script>alert("Can not Delete Comment")</script>';
}

mysqli_close($conn);
?>

