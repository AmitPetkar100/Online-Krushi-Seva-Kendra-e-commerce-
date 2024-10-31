<?php

include 'db_connection.php';

if(isset($_POST['order_btn'])){

   $name = $_POST['name'];
   $number = $_POST['number'];
   $email = $_POST['email'];
   $method = $_POST['method'];
   $flat = $_POST['flat'];
   $street = $_POST['street'];
   $city = $_POST['city'];
   $state = $_POST['state'];
   $country = $_POST['country'];
   $pin_code = $_POST['pin_code'];

   session_start();

   $user_id = $_SESSION['user-id'];


   $cart_query = mysqli_query($conn, "SELECT * FROM `cart` WHERE `user_id` = '$user_id'");
   $price_total = 0;
        
   if(mysqli_num_rows($cart_query) > 0){
      while($product_item = mysqli_fetch_assoc($cart_query)){
         $product_name[] = $product_item['name'] .' ('. $product_item['quantity'] .') ';

         //$product_price = number_format($product_item['price'] * $product_item['quantity']);
         //$price_total += $product_price;

         $sub_total2 = 0;$sub_total2 += ((int)$product_item['price'] * (int)$product_item['quantity']);
            // $grand_total = ($total += $total_price);
            $price_total += $sub_total2;
      };
   };

   $total_product = implode(', ',$product_name);
   $detail_query = mysqli_query($conn, "INSERT INTO `order`(name, number, email, method, flat, street, city, state, country, pin_code, total_products, total_price) VALUES('$name','$number','$email','$method','$flat','$street','$city','$state','$country','$pin_code','$total_product','$price_total')") or die('query failed');

   if($cart_query && $detail_query){
      echo "
      <div class='order-message-container'>
      <div class='message-container'>
         <h3>thank you for shopping!</h3>
         <div class='order-detail'>
            <span>".$total_product."</span>
            <span class='total'> total : $".$price_total."/-  </span>
         </div>
         <div class='customer-details'>
            <p> your name : <span>".$name."</span> </p>
            <p> your number : <span>".$number."</span> </p>
            <p> your email : <span>".$email."</span> </p>
            <p> your address : <span>".$flat.", ".$street.", ".$city.", ".$state.", ".$country." - ".$pin_code."</span> </p>
            <p> your payment mode : <span>".$method."</span> </p>
            <p>(*pay when product arrives*)</p>
         </div>
            <a href='index.php' class='btn'>continue shopping</a>
         </div>
      </div>
      ";
   }

   // /////////////////////////////////////////////////////////////////////////////////////

$sql3 = "SELECT `user_id` FROM `tracking_details` WHERE `user_id` = '{$user_id}'";

    $result3 = mysqli_query($conn,$sql3) or die("Query Failed123");

    if(mysqli_num_rows($result3) > 0){
      echo'<script>alert("Thank You For Order :)")</script>';
    }else{$addressQuery = mysqli_query($conn,"INSERT INTO `tracking_details`(`user_id`, `name`, `number`, `email`, `flat`, `street`, `city`, `state`, `country`, `pincode`) VALUES ('{$user_id}','{$name}','{$number}','{$email}','{$flat}','{$street}','{$city}','{$state}','{$country}','{$pin_code}')") or die("Tracking Query Failed");

      if($addressQuery){
         echo'<script>alert("Tracking Details Saved")</script>';
      }
         }
      }
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>checkout</title>
   <link rel="icon" type="image/x-icon" href="images/icon2.png">
   <!-- font awesome cdn link  -->
   <!-- custom css file link  -->
   <link rel="stylesheet" href="style.css">

</head>
<body>


<div class="container">

<section class="checkout-form">

   <h1 class="heading">complete your order</h1>

   <form action="" method="post">

   <div class="display-order">
      <?php
      session_start();
      $user_id2 = $_SESSION['user-id'];
         $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE `user_id` = '$user_id2'");
         $total = 0;
         $grand_total = 0;
         if(mysqli_num_rows($select_cart) > 0){
            while($fetch_cart = mysqli_fetch_assoc($select_cart)){
            //$total_price = number_format($fetch_cart['price'] * $fetch_cart['quantity']);
            $sub_total = 0;$sub_total += ((int)$fetch_cart['price'] * (int)$fetch_cart['quantity']);
            // $grand_total = ($total += $total_price);
            $grand_total += $sub_total;

?>
       
      <span><?= $fetch_cart['name']; ?>-(<?= $fetch_cart['quantity']; ?>)-<?= $fetch_cart['price']; ?>/-</span>
 
      <?php
         }
      }else{
         echo "<div class='display-order'><span>your cart is empty!</span></div>";
      }
      ?>
      <span class="grand-total"> grand total : <?= $grand_total; ?>/- </span>
   </div>

   <?php
   
   $us_id = $_SESSION['user-id'];
         $sql1 = "SELECT * FROM `tracking_details` WHERE user_id = {$us_id}";

         $result= mysqli_query($conn,$sql1);
         if(!$result){echo"Selecting Details Query Failed";}

         if(mysqli_num_rows($result)>0)
         {
         while($rows = mysqli_fetch_assoc($result)){
   ?>
      <div class="flex">
         <div class="inputBox">
            <span>your name</span>
            <input type="text" placeholder="enter your name" name="name" value="<?php echo $rows['name']; ?>" required>
         </div>
         <div class="inputBox">
            <span>your number</span>
            <input type="number" placeholder="enter your number" name="number" value="<?php echo $rows['number']; ?>" required>
         </div>
         <div class="inputBox">
            <span>your email</span>
            <input type="email" placeholder="enter your email" name="email" value="<?php echo $rows['email']; ?>" required>
         </div>
         <div class="inputBox">
            <span>payment method</span>
            <select name="method">
               <option value="cash on delivery" selected>cash on devlivery</option>
               
            </select>
         </div>
         <div class="inputBox">
            <span>address line 1</span>
            <input type="text" placeholder="e.g. flat no." value="<?php echo $rows['flat']; ?>" name="flat">
         </div>
         <div class="inputBox">
            <span>address line 2</span>
            <input type="text" placeholder="e.g. street name" value="<?php echo $rows['street']; ?>" name="street">
         </div>
         <div class="inputBox">
            <span>city</span>
            <input type="text" placeholder="e.g. mumbai" name="city" value="<?php echo $rows['city']; ?>" required>
         </div>
         <div class="inputBox">
            <span>state</span>
            <input type="text" placeholder="e.g. maharashtra" name="state" value="<?php echo $rows['state']; ?>" required>
         </div>
         <div class="inputBox">
            <span>country</span>
            <input type="text" placeholder="e.g. india" name="country" value="<?php echo $rows['country']; ?>" required>
         </div>
         <div class="inputBox">
            <span>pin code</span>
            <input type="text" placeholder="e.g. 123456" name="pin_code" value="<?php echo $rows['pincode']; ?>" required>
         </div>
      </div>
      <input type="submit" value="order now" name="order_btn" class="btn">
   </form>
   <?php  } }else{?>
   <!-- //////////////////////////////////////////////////////////////////////////////////// -->
   <div class="flex">
         <div class="inputBox">
            <span>your name</span>
            <input type="text" placeholder="enter your name" name="name"  required>
         </div>
         <div class="inputBox">
            <span>your number</span>
            <input type="number" placeholder="enter your number" name="number"  required>
         </div>
         <div class="inputBox">
            <span>your email</span>
            <input type="email" placeholder="enter your email" name="email"  required>
         </div>
         <div class="inputBox">
            <span>payment method</span>
            <select name="method">
               <option value="cash on delivery" selected>cash on devlivery</option>
               
            </select>
         </div>
         <div class="inputBox">
            <span>address line 1</span>
            <input type="text" placeholder="e.g. address 1."  name="flat" required>
         </div>
         <div class="inputBox">
            <span>address line 2</span>
            <input type="text" placeholder="e.g. street name"  name="street" required>
         </div>
         <div class="inputBox">
            <span>city</span>
            <input type="text" placeholder="e.g. mumbai" name="city"  required>
         </div>
         <div class="inputBox">
            <span>state</span>
            <input type="text" placeholder="e.g. maharashtra" name="state"  required>
         </div>
         <div class="inputBox">
            <span>country</span>
            <input type="text" placeholder="e.g. india" name="country"  required>
         </div>
         <div class="inputBox">
            <span>pin code</span>
            <input type="text" placeholder="e.g. 123456" name="pin_code"  required>
         </div>
      </div>
      <input type="submit" value="order now" name="order_btn" class="btn">
   </form>
   <?php } ?>
</section>

</div>

<!-- custom js file link  -->
<script src="js/script.js"></script>
   
</body>
</html>