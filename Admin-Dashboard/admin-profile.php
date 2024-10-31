<?php 

include '../db_connection.php';

session_start();

session_unset();

session_destroy();

header("Location: http://localhost/krushi kendra project/Admin-Dashboard/");


?>