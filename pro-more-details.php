<?php include 'navbar.php'; ?>
<title>product-Details</title>
</head>
<body>
<div class="index-product-title">
    <div class="index-popular">
        <h1>Product More Detials</h1>
    </div>
</div>

    <?php 
    include 'db_connection.php';
     $product_id = $_GET['id'];

    $sql = "SELECT * FROM `products` WHERE `pro_id` = {$product_id}" or die("Query Failed!");

    $result = mysqli_query($conn,$sql);

    if(mysqli_num_rows($result) > 0){

        while($rows = mysqli_fetch_assoc($result)){

        
    ?>

    <div class="details-main-div">
         <!-- change -->
         <form method="post" class="box" action="cart.php">
            <!--  -->
        <div class="details-sub-div">
        <div class="details-pro-div">
           
                <div class="detail-pro-img">
                    <img src="Admin-Dashboard/upload/<?php echo $rows['pro_image']; ?>" alt="img">
                    
                </div>
                <div class="detail-pro-details">

                    <div class="details-h3">
                        <h3>Name : <span><?php echo $rows['pro_name']; ?></span></h3>
                    </div> <hr>

                    <div class="details-h3">
                        <h3>Price : <span>RS. <?php echo $rows['pro_price']; ?> INR</span></h3>
                    </div> <hr>

                    <div class="details-h3">
                        <h3>Details : </h3>
                    </div>
                    
                    <div class="detail-h3">
                        
                        <h3><span><?php echo $rows['pro_detail']; ?>
                        </span></h3>

                    </div>

                    <div class="pro-addtocart">
                        <!-- <a href="cart.php">Add To Cart</a> -->
                        <!-- change -->
                            <input type="number" min="1" name="product_quantity" value="1">

                            <input type="hidden" name="product_image" value="<?php echo $rows['pro_image']; ?>">

                            <input type="hidden" name="product_name" value="<?php echo $rows['pro_name']; ?>">

                            <input type="hidden" name="product_price" value="<?php echo $rows['pro_price']; ?>">

                            <input type="submit" value="Add to cart" name="add_to_cart" class="btn">

                        </form>
                    </div>
                </div>

                
        </div>
    </div>

    </div>
    <?php } }?>

    <div class="related-products-div">
        <h1>More Products</h1>
    </div>

    <?php 

    include 'db_connection.php';

    $sql = "SELECT * FROM `products` ORDER BY RAND() LIMIT 12";

    $result = mysqli_query($conn,$sql) or die("more Query Failed");

    if(mysqli_num_rows($result) > 0){

    ?>

<div class="container">
    <div class="sub-div">
       
    <?php 
    while($rows = mysqli_fetch_assoc($result)){
    ?>
<div><a href="pro-more-details.php?id=<?php echo $rows['pro_id']; ?>" id="detail-a">
        <div class="div-1">
            <div>
                <img src="Admin-Dashboard/upload/<?php echo $rows['pro_image']; ?>" alt="">
            </div>
            <div>
                <p><?php echo $rows['pro_name']; ?></p>
            </div>
            <div style="display:flex;justify-content:start;padding:5px 5px;border-radius:5px;">
                <p style="padding:3px 3px 0px 0px;font-size:18px;"><?php echo substr($rows['pro_detail'],0,10)."..."; ?></p>
                <a href="pro-more-details.php?id=<?php echo $rows['pro_id']; ?>">more</a>
            </div>
            <div class="cart-price-div">
                <h3>RS. <?php echo $rows['pro_price']; ?> INR</h3>
            </div>

        </div></div></a>
<?php } ?>
        
</div>
</div>

<?php } ?>

</body>
</html>