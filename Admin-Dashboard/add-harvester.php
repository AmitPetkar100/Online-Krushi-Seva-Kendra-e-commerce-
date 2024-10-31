<?php 
include '../db_connection.php';
    if(isset($_GET['harid'])){


    echo $har_id = $_GET['harid'];

    $sql3 = "DELETE FROM `harvesters` WHERE `id` = {$har_id}";

    $delete = mysqli_query($conn,$sql3) or die("Delete Query Failed");

    if($delete){
        header("Location: http://localhost/krushi kendra project/Admin-Dashboard/harvesters.php");
}
}


?>

<?php include 'admin-dashboard.php'; ?>
<title>Add Harvester - page</title>
    <div class="dash-page-title">
        <h1>Add Harvesters</h1>
    </div>

    <div class="fer-form-main-div">
        <div class="fer-form-sub-div">
            
            <div class="fer-form-div">
                    <div class="add-fer-title">
                        <h3>Add <span>Harvester</span></h3>
                    </div>

                    <!-- ////////////////////////////////////////////////////////////// -->
                <form action="<?php echo $_SERVER['PHP_SELF']; ?> " method="post">
                    

                    <div class="fer-label-1">
                        <label for="">Harvester Name : </label>
                        <input type="text" placeholder="Harvester Name" name="product_name" require autofocus>
                    </div>

                    <div class="fer-label-1">
                        <label for="">Harvester Mobile : </label>
                        <input type="text" placeholder="Harvester Mobile Number" name="product_price" require >
                    </div>


                    <div class="fer-label-1">
                        <label for="">Harvester Address :</label>
                        <textarea name="product_detail" id="" cols="10" rows="10" placeholder="Harvester Address"></textarea>    
                    </div>

                    <div class="fer-label-1">
                        <input type="submit" value="Add" name="product_add" id="add-product">
                    </div>

                </form>
                <!-- /////////////////////////////////////////////////////////////////////// -->
            </div>
        </div>
    </div>
    <?php 
        include '../db_connection.php';
        if(isset($_POST['product_add'])){
            $name = $_POST['product_name'];
            $mobile = $_POST['product_price'];
            $address = $_POST['product_detail'];

            $sql = "INSERT INTO `harvesters`(`name`, `mobile`, `address`) VALUES ('{$name}','{$mobile}','{$address}')";

            $result = mysqli_query($conn,$sql) or die("Query Failed");

            if($result){
                echo'<script>alert("Harvester Added Successfully")</script>';
                header("Location: http://localhost/krushi kendra project/Admin-Dashboard/harvesters.php");
            }
        }

    ?>
</body>
</html>

