<?php include 'admin-dashboard.php'; ?>
<title>Pesticides</title>
    <div class="dash-page-title">
        <h1>Pesticides page</h1>
    </div>

    <div class="add-product-btn">
        <a href="add-product.php"><span>Add more products</span></a>
    </div>
    
    <!-- //////////////////////////////////////////////////////// -->

    <?php 

    include '../db_connection.php';
    
    $sql = "SELECT * FROM `products` WHERE `pro_category` = 2";

    $result = mysqli_query($conn,$sql) or die("Query Failed");

    if(mysqli_num_rows($result) > 0){

    ?>


    <div class="container">
    <div class="sub-div">
       

    <?php 
    while($rows = mysqli_fetch_assoc($result)){
    ?>
<div>
    <a href="detail-product.php?id=<?php echo $rows['pro_id']; ?>" id="detail-a">
        <div class="div-1">
            <div>
                <img src="upload/<?php echo $rows['pro_image']; ?>" alt="img">
            </div>
            <div style="padding:8px 10px;border-radius:5px;box-shadow:0px 0px 5px gray;">
                <p><?php echo $rows['pro_name']; ?></p>
            </div>
            
            <div style="display:flex;justify-content:start;padding:5px 5px;border-radius:5px;">
                <p style="padding:3px 3px 0px 0px;font-size:18px;"><?php echo substr($rows['pro_detail'],0,10)."..."; ?></p>
                <a href="detail-product.php?id=<?php echo $rows['pro_id']; ?>">more</a>
            </div>
            <div class="cart-price-div">
                <h3>RS. <?php echo $rows['pro_price']; ?> INR</h3>
            </div>
            <div class="product-edit-del-btn">
                <div><a href="edit-product.php?proid=<?php echo $rows['pro_id']; ?>">Edit</a></div>
                <div><a href="delete-product.php?proid=<?php echo $rows['pro_id']; ?>">Delete</a></div>
            </div>
        </div></div></a>

        <?php } ?>
</div>
</div>   

<?php  }else{
    echo'<div><h3 style="color:gray;text-align:center;margin:20px 0px;font-size:24px;">No Fertilizers Found</h3></div>';
} ?>

    <!-- //////////////////////////////////////////////////////// -->
</body>
</html>