<?php include 'admin-dashboard.php'; ?>



<?php 

include '../db_connection.php';

if(isset($_FILES['product_updateImage'])){
    $errors = array();

    $file_name = $_FILES['product_updateImage']['name'];
    $file_size = $_FILES['product_updateImage']['size'];
    $file_tmp = $_FILES['product_updateImage']['tmp_name'];
    $file_type = $_FILES['product_updateImage']['type'];
    // $file_ext = end(explode('.',$file_name));

    // $extentions = array("jpeg","jpg","png");

    // if(in_array($file_ext,$extentions) === false){
    //     $errors[] = "This Extention file is not allowed";
    // }

    if(empty($errors) == true){
        move_uploaded_file($file_tmp,"upload/".$file_name);
    }else{
        print_r($errors);
        die();
    }
}


$pro_id = $_GET['proid'];

if(isset($_POST['update'])){
    $product_name = mysqli_real_escape_string($conn,$_POST['product_updateName']);
    $product_price = mysqli_real_escape_string($conn,$_POST['product_updatePrice']);
    $product_category = mysqli_real_escape_string($conn,$_POST['product_updatecategory']);
    $product_detail = mysqli_real_escape_string($conn,$_POST['product_updateDetails']);

    // $sql = "INSERT INTO `products`(`pro_name`, `pro_price`, `pro_image`, `pro_detail`, `pro_category`) VALUES ('{$product_name}','{$product_price}','{$file_name}','{$product_detail}','{$product_category}')";

    $sql = "UPDATE `products` SET `pro_name`='{$product_name}',`pro_price`='{$product_price}',`pro_image`='{$file_name}',`pro_detail`='{$product_detail}',`pro_category`='{$product_category}' WHERE `pro_id` = {$pro_id}";

    if(mysqli_query($conn,$sql)){
        // header("Location: http://localhost/krushi kendra project/Admin-Dashboard/home.php");
        echo'<script>alert("Product updated")</script>';
         header("Location: http://localhost/krushi kendra project/Admin-Dashboard/home.php");
    }else{
        echo"<div style='color:red;text-align:center;margin:20px 0px;'>Querry Failed!!!!!!</div>";
    }


}

?>






<title>Fertilizers</title>
    <div class="dash-page-title">
        <h1>Edit Products</h1>
    </div>

    <div class="fer-form-main-div">
        <div class="fer-form-sub-div">
            
            <div class="fer-form-div">
                    <div class="add-fer-title">
                        <h3>Edit <span>Product</span></h3>
                    </div>

                    <?php
                
                include '../db_connection.php';
                $pro_id = $_GET['proid'];
                $sql1 = "SELECT * FROM `products` WHERE pro_id = {$pro_id}";
             
                $result= mysqli_query($conn,$sql1);
                if(!$result){echo"Query Failed";}
    
                if(mysqli_num_rows($result) > 0)
                {
                while($rows = mysqli_fetch_assoc($result)){
                ?>

                <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
                    

                    <div class="fer-label-1">
                        <label for="">Product Name : </label>
                        <input type="text" placeholder="Product Name" name="product_updateName"
                        value="<?php echo $rows['pro_name']; ?>" require autofocus>
                    </div>

                    <div class="fer-label-1">
                        <label for="">Product Price : </label>
                        <input type="text" placeholder="Product Price" name="product_updatePrice" value="<?php echo $rows['pro_price']; ?>" require >
                    </div>

                    <div class="fer-label-1">
                        <label for="">Select Category : </label>
                        <select name="product_updatecategory" id="">
                            <option selected value="<?php echo $rows['pro_category']; ?>">

                            <?php if($rows['pro_category'] == "1"){echo "Fertilizer";}
                            elseif($rows['pro_category'] == "2"){echo "Pesticides";}
                            elseif($rows['pro_category'] == "3"){echo "fungicides";}
                            elseif($rows['pro_category'] == "4"){echo "Herbicides";}
                            else{
                                echo"Select Category";
                            }
                            
                            
                            ?>
                        
                        </option>
                            <?php

                        include '../db_connection.php';

                        $sql = "SELECT * FROM `category`";

                        $result = mysqli_query($conn,$sql) or die("Query Failed");

                        if(mysqli_num_rows($result) > 0){

                            while($rows = mysqli_fetch_assoc($result)){
                            ?>
                        <option value="<?php echo $rows['cat_id']; ?>"><?php echo $rows['cat_name']; ?></option>

                        <?php
                            }
                        }
                        ?>
                        </select>
                    </div>

                    <div class="fer-label-1">
                        <label for="">Product Image : </label>
                        <input type="file" placeholder="Product Image" name="product_updateImage" value="<?php echo $rows['pro_image']; ?>" require >
                    </div>

                    <div class="fer-label-1">
                        <label for="">Product Details :</label>
                        <textarea name="product_updateDetails"  id="" cols="10" rows="10" placeholder="Product Detail"></textarea>    
                    </div>

                    <div class="fer-label-1">
                        <!-- <input type="file" placeholder="fertilizer Name" require > -->
                        <!-- <button>Submit</button> -->
                        <input type="submit" value="Update" name="update" id="add-product">
                    </div>

                </form>
                <?php  } }?>
            </div>
        </div>
    </div>
</body>
</html>