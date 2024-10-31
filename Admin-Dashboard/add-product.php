<?php include 'admin-dashboard.php'; ?>
<title>Fertilizers</title>
    <div class="dash-page-title">
        <h1>Add Products</h1>
    </div>

    <div class="fer-form-main-div">
        <div class="fer-form-sub-div">
            
            <div class="fer-form-div">
                    <div class="add-fer-title">
                        <h3>Add <span>Product</span></h3>
                    </div>

                    <!-- ////////////////////////////////////////////////////////////// -->
                <form action="save-product.php" method="post" enctype="multipart/form-data">
                    

                    <div class="fer-label-1">
                        <label for="">Product Name : </label>
                        <input type="text" placeholder="Product Name" name="product_name" require autofocus>
                    </div>

                    <div class="fer-label-1">
                        <label for="">Product Price : </label>
                        <input type="text" placeholder="Product Price" name="product_price" require >
                    </div>

                    <div class="fer-label-1">
                        <label for="">Select Category : </label>
                        <select name="product_category" id="">
                        <option disable>Select Category</option>

                        <?php

                        include '../db_connection.php';

                        $sql = "SELECT * FROM category";

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
                        <input type="file" placeholder="Product Image" name="product_image" require >
                    </div>

                    <div class="fer-label-1">
                        <label for="">Product Details :</label>
                        <textarea name="product_detail" id="" cols="10" rows="10" placeholder="Product Details"></textarea>    
                    </div>

                    <div class="fer-label-1">
                        <!-- <input type="file" placeholder="fertilizer Name" require > -->
                        <!-- <button>Add</button> -->
                        <input type="submit" value="Add" name="product_add" id="add-product">
                    </div>

                </form>
                <!-- /////////////////////////////////////////////////////////////////////// -->
            </div>
        </div>
    </div>
</body>
</html>