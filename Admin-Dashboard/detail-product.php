<?php include 'admin-dashboard.php'; ?>
<title>Details Of Product</title>
    <div class="dash-page-title">
        <h1>More Details Page</h1>
    </div>

    <?php 
    include '../db_connection.php';
     $product_id = $_GET['id'];

    $sql = "SELECT * FROM `products` WHERE `pro_id` = {$product_id}" or die("Query Failed!");

    $result = mysqli_query($conn,$sql);

    if(mysqli_num_rows($result) > 0){

        while($rows = mysqli_fetch_assoc($result)){

        
    ?>

    <div class="details-main-div">
    <div class="details-sub-div">
        <div class="details-pro-div">
                <div class="detail-pro-img">
                    <img src="upload/<?php echo $rows['pro_image']; ?>" alt="img">
                    <div id="edit-delete"><a href="">Edit</a> 
                    <a href="delete-product.php?proid=<?php echo $product_id; ?>">Delete</a></div>
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
                </div>
        </div>
    </div>

    </div>
    <?php } }?>

   

</body>
</html>