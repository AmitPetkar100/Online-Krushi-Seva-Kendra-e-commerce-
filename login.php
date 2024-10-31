
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
    <link rel="icon" type="image/x-icon" href="images/icon2.png">
</head>
<body class="login-body">


<!-- //////////////////// if user is login then it show user profile & details ///////////// -->

    <?php 
    session_start(); 
        include 'db_connection.php';
        if(isset($_SESSION['user-name'])) {

            $login_name = $_SESSION['user-id']; 

            $sql_qurery = "SELECT * FROM `registration` WHERE `regid` = '{$login_name}'" or die("query failed");

            $result2 = mysqli_query($conn,$sql_qurery);

            if(mysqli_num_rows($result2) > 0){ 
                while($rows2 = mysqli_fetch_assoc($result2)) {
                    
    ?>

<!-- ////////////////////////////// User Profile Page HTML //////////////////////////////// -->

            <!-- <span>hello </span><span><?php //echo $rows2['regfname'] . " ".$rows2['reglname'] ?></span><span> <a href="log-out.php"> logout</a></span> -->
            <div class="login-profile-title">
                <h1>Profile</h1>
            </div>
            <div class="login-user-profile-main-div">
                <div class="login-user-profile-sub-div">
                    <div class="login-user-profile-div">
                        <div>
                            <img src="images/account.png" alt="profile logo">
                        </div> 
                    </div>
                    <hr>
                    <div class="login-user-profile-sub-div-sub-div">
                        <div class="profile-name">
                            <h3>Name : </h3> 
                            <h3><?php echo $rows2['regfname'] . " ".$rows2['reglname'] ?> </h3>
                        </div>
                        <hr>

                        <div class="profile-name">
                            <h3>Email : </h3>
                            <h3><?php echo $rows2['regemail']; ?> </h3>
                        </div>
                        <hr>

                        <div class="profile-name">
                            <h3>Phone: </h3>
                            <h3><?php echo $rows2['regphone'];?> </h3>
                        </div>
                        <hr>

                        <div class="profile-name">
                            <h3>Gender : </h3>
                            <h3><?php echo $rows2['reggender']; ?> </h3>
                        </div>
                        <hr>
                        <a href="log-out.php">
                        <div class="profile-logout">
                            <img src="images/logout.png" alt="">
                            <h5>Log out</h5>
                        </div></a>
        
                    </div>
                </div>
            </div>
           

<!-- //////////////////////////////// user profile page HTML end //////////////////////////// -->

    <?php
               }
            }

        }else{ 
    ?>
     

     <!-- ////////////////// if user does not login it show login page //////////////////// -->
    
<div class="login-body2">
<div class="login-main-div">
            <div class="login-title">
                <h1>Login</h1>
            </div>
            <hr>

    <div class="login-form-div">

        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" class="login-form">
            <div class="login-id">
                <label for="">Mobile or Email</label>
                <input type="text" placeholder="Your Mobile or email" required name="user_name">
            </div>

            <div class="login-id">
                <label for="">Password</label>
                <input type="password" placeholder="Your password" required name="user_password">
            </div>

            <div class="login-id2">
                <input type="submit" value="Log In" required name="login_btn">
            </div>
        </form>

    </div>
    <?php 

        if(isset($_POST['login_btn'])){
            include 'db_connection.php';

            $user_name = mysqli_real_escape_string($conn,$_POST['user_name']);
            $user_password = mysqli_real_escape_string($conn,md5($_POST['user_password']));

            $sql = "SELECT `regid`,`regemail` FROM `registration` WHERE `regemail` = '{$user_name}' AND `regpass` = '{$user_password}'";
            $result = mysqli_query($conn,$sql) or die("Query Failed");

            if(mysqli_num_rows($result) > 0){
                

                while($rows = mysqli_fetch_assoc($result)){
                    session_start();
                    $_SESSION['user-name'] = $rows['regemail'];
                    $_SESSION['user-id'] = $rows['regid'];

                    header("Location: http://localhost/krushi kendra project/index.php");
                }


            }else{
                echo '<div><h3 style="color:red;text-align:center;margin:20px 0px">Username And Password are not Match</h3></div>';
            }


        }

        ?>


    <hr>
        <div class="login-signin-menu">
            <a href="registration.php" target="_blank">Sign In</a> <span> I don't have an Account?</span>
        </div>

      
</div>
<?php } ?>
</div>
</body>
</html>