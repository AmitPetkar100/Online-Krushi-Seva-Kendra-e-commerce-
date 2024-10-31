<?php include 'navbar.php'; ?>

    <title>Herbicides</title>
</head>
<body>
<div class="index-product-title">
    <div class="index-popular">
        <h1>herbicides</h1>
    </div>
</div>


<?php 

    include 'db_connection.php';
    
    $sql = "SELECT * FROM `products` WHERE `pro_category` = 4";

    $result = mysqli_query($conn,$sql) or die("Query Failed");

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



<?php include 'footer.php'; ?>
</body>
</html>