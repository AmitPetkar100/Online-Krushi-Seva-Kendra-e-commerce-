<?php 
include '../db_connection.php';
    if(isset($_GET['harid'])){


    echo $har_id = $_GET['harid'];

    $sql3 = "DELETE FROM `supplyer` WHERE `id` = {$har_id}";

    $delete = mysqli_query($conn,$sql3) or die("Delete Query Failed");

    if($delete){
        header("Location: http://localhost/krushi kendra project/Admin-Dashboard/supplyer.php");
}
}


?>

<?php include 'admin-dashboard.php'; ?>
<title>Add Suppler - page</title>
    <div class="dash-page-title">
        <h1>Add Supplers</h1>
    </div>

    <div class="fer-form-main-div">
        <div class="fer-form-sub-div">
            
            <div class="fer-form-div">
                    <div class="add-fer-title">
                        <h3>Add <span>Suppler</span></h3>
                    </div>

                    <!-- ////////////////////////////////////////////////////////////// -->
                <form action="<?php echo $_SERVER['PHP_SELF']; ?> " method="post">
                    

                    <div class="fer-label-1">
                        <label for="">Suppler Name : </label>
                        <input type="text" placeholder="Suppler Name" name="suppler_name" require autofocus>
                    </div>

                    <div class="fer-label-1">
                        <label for="">Suppler Mobile : </label>
                        <input type="text" placeholder="Suppler Mobile Number" name="suppler_mobile" require >
                    </div>

                    <div class="fer-label-1">
                        <label for="">Suppler Company : </label>
                        <input type="text" placeholder="Suppler Company Name" name="suppler_company" require >
                    </div>


                    <div class="fer-label-1">
                        <label for="">Suppler Address :</label>
                        <textarea name="product_detail" id="" cols="10" rows="10" placeholder="Suppler Address"></textarea>    
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
            $name = $_POST['suppler_name'];
            $mobile = $_POST['suppler_mobile'];
            $company = $_POST['suppler_company'];
            $address = $_POST['product_detail'];

            $sql = "INSERT INTO `supplyer`(`name`, `address`, `mobile`, `company`) VALUES ('{$name}','{$address}','{$mobile}','{$company}')";

            $result = mysqli_query($conn,$sql) or die("Query Failed");

            if($result){
                echo'<script>alert("Harvester Added Successfully")</script>';
                header("Location: http://localhost/krushi kendra project/Admin-Dashboard/supplyer.php");
            }
        }

    ?>
</body>
</html>

