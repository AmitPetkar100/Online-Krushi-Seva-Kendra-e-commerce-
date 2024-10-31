<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" type="image/x-icon" href="images/icon2.png">
    <title>Waghjai Krushi Seva Kendra</title>
</head>
<body>
    <header class="main-header">

    <div class="nav-img">
        <img src="images/final logo.jpg" alt="Store Banner img" class="banner-img">
    </div>

<!-- /////////////////////////////////////////////////////////////////////////////////// -->
<!-- /////////////////////// Side bar Code Of html >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>> -->
<div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <hr>
    <a href="index.php"> Home</a>
    <hr>
    <a href="fertilizer.php"> Fertilizers</a>
    <a href="pesticide.php"> Pesticides</a>
    <a href="fungicide.php"> Fungicides</a>
    <a href="herbicide.php"> Herbicides</a>
    <a href="contact.php"> Contact</a>
    <a href="about.php"> About Us</a>
    <a href="resource.php"> Resources</a>
    <hr>
    <a href="login.php" target="_self" style="display:flex;">
        <img src="images/account.png" alt="" style="height:30px;"> 
        <span style="color:black;margin-left:10px;">Profile</span> 
    </a>
    <hr>
  </div>
  
  <!-- Use any element to open the sidenav -->

<div class="side-bar-menus-copy">
<div>
  <span onclick="openNav()"><img src="images/menu.png" alt="" style="height: 28px;margin-top:.9vh;"></span>
</div>
  <div class="search-whether-copy">

        <img src="images/weather-app.png" alt="" style="height: 30px;"> <span>29 C Mostly coudy</span>
    </div>

    <div class="search-cart-copy">
        <a href="cart.php"><img src="images/shopping-cart.png" alt="" style="height: 30px;margin-top:.5vh;"></a>
    </div>

</div>


<!-- //////////////////////////////////////////////////////////////////////////////////////// -->

    <div class="nav-menus">
        <ul>
            <li> <a href="index.php"> Home</a></li>
            <li> <a href="fertilizer.php"> Fertilizers</a></li>
            <li> <a href="pesticide.php"> Pesticides</a></li>
            <li> <a href="fungicide.php"> Fungicides</a></li>
            <li> <a href="herbicide.php"> Herbicides</a></li>
            <li> <a href="contact.php"> Contact</a></li>
            <li> <a href="about.php"> About Us</a></li>
            <li> <a href="resource.php"> Resources</a></li>
        </ul>
    </div>

    <div class="Nav-search-bar">
        <div class="search-whether">

        <img src="images/weather-app.png" alt=""> <span>29 C Mostly coudy</span>
            </div>
           
<!-- ///////////////////////// Search bar ////////////////////////////////////////////// -->
        <div class="search-bar">
            <form action="search.php" method="get">
                <input type="search" placeholder="Search Products" name="search_pro" autofocus>
                <!-- <img src="images/search-interface-symbol.png" alt=""> -->
            </form>
            
        </div>
<!-- //////////////////////////////////////////////////////////////////////////////////////// -->
<div class="nav-login-cart">
        <div class="search-admin">
             <a href="login.php" target="_self" ><img src="images/account.png" alt=""></a>

        </div>

        <div class="search-cart">
        <a href="cart.php"><img src="images/shopping-cart.png" alt=""></a>
        </div>
</div>
    </div>
    <hr>
    </header>
</body>
</html>