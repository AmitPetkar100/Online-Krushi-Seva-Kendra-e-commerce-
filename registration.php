<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <link rel="icon" type="image/x-icon" href="images/icon2.png">
    <link rel="stylesheet" href="style.css">
</head>
<body class="reg-body">
 <div class="reg-main-div">    
    <div class="reg-title">
        <h1>Sign Up</h1>
        <h3>It's Free and always will be.</h3>
        <hr>
    </div>

    <div class="reg-form-div">


        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" >
        <div class="form-div1">
            <div class="reg-fname">
                <label for="fname">First Name</label>
                <input type="text" id="fname" placeholder="First Name" required name="user-fn">
            </div>

            <div class="reg-fname">
                <label for="lname">Last Name</label>
                <input type="text" id="lname" placeholder="Last Name" required name="user-ln">
            </div>

            <div class="reg-fname">
                <label for="email">Your Email</label>
                <input type="email" id="email" placeholder="E-mail id" required name="user-email">
            </div>
            
        </div>
        <div class="form-div2">
            <div class="reg-fname">
                <label for="phone">Your Phone</label>
                <input type="text" id="phone" placeholder="Phone Number" required name="user-phone">
            </div>

            <div class="reg-fname">
                <label for="password">Your Password</label>
                <input type="password" id="password" required name="user-password">
            </div>

            <div class="reg-fname">
                <label for="gender">Select Gender</label>
                <div class="reg-gender">
                <input type="radio" id="gender" name="user-gender" value="male"required> <span>Male</span> 
                <input type="radio" id="gender" name="user-gender" value="female"required> <span>Female</span> 
                <input type="radio" id="gender" name="user-gender" value="other"required> <span>Other</span> 
                </div>
            </div>

            <div class="reg-submit">
                <label for="submit"></label>
                <input type="submit" id="password" required value="Sign Up" name="user-submit">
         </div>
        </div>
        
        </form>


    </div>
    <hr>
    <div class="reg-login-menu">
        <a href="login.php">Log In </a> <span> I have an Account?</span>
    </div>
</div>

</body>
</html>


<?php  

include 'db_connection.php';
if(isset($_POST['user-submit']))
{

    $user_fn = mysqli_real_escape_string($conn,$_POST['user-fn']);
    $user_ln = mysqli_real_escape_string($conn,$_POST['user-ln']);
    $user_email = mysqli_real_escape_string($conn,$_POST['user-email']);
    $user_phone = mysqli_real_escape_string($conn,$_POST['user-phone']);
    $user_password = mysqli_real_escape_string($conn,md5($_POST['user-password']));
    $user_gender = mysqli_real_escape_string($conn,$_POST['user-gender']);

    $sql = "SELECT `regemail`,`regphone` FROM `registration` WHERE `regemail` = '{$user_email}' AND `regphone` = '{$user_phone}'";

    $result = mysqli_query($conn,$sql) or die("Query Failed");

    if(mysqli_num_rows($result) > 0){
        echo"<p style = 'color:red;text-align:center;margin:10px 0px;'>UserName already Exists.</p>";
    }else{
        
        $sql1 = "INSERT INTO `registration`(`regfname`, `reglname`, `regemail`, `regphone`, `regpass`, `reggender`) VALUES ('{$user_fn}','{$user_ln}','{$user_email}','{$user_phone}','{$user_password}','{$user_gender}')";

        if(mysqli_query($conn,$sql1)){
            echo '<script> alert("Registration Successful :)") </script>';
            header("Location: http://localhost/krushi kendra project/login.php");
        }

    }


    


}



?>