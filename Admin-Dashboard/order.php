<?php include 'admin-dashboard.php'; ?>
<title>Orders</title>
    <div class="dash-page-title">
        <h1>Customers Orders</h1>
    </div>

    <div class="order-main-div">
        <div class="order-sub-div">

        <?php 
        
        include '../db_connection.php';
        
        $sql = "SELECT * FROM `order` ORDER BY `id` DESC";

        $result = mysqli_query($conn,$sql) or die("Query Failed");

        if(mysqli_num_rows($result) > 0){
        ?>



            <table>
                <thead>
                    <th>SR.NO</th>
                    <th>Name</th>
                    <th>Number</th>
                    <th>Email</th>
                    <th>Method</th>
                    <th>flat</th>
                    <th>street</th>
                    <th>City</th>
                    <th>State</th>
                    <th>Country</th>
                    <th>Pin Code</th>
                    <th>Products</th>
                    <th>Total Amount</th>
                    <th>Action</th>
                    
                </thead>

                <tbody>
                <?php 
               $srno = 0;
               while($rows = mysqli_fetch_assoc($result)){
                $srno+=1;
               ?> 
                    <tr>
                        <td><?=$srno;?></td>
                        <td><?=$rows['name'];?></td>
                        <td><?=$rows['number'];?></td>
                        <td><?=$rows['email'];?></td>
                        <td><?=$rows['method'];?></td>
                        <td><?=$rows['flat'];?></td>
                        <td><?=$rows['street'];?></td>
                        <td><?=$rows['city'];?>r</td>
                        <td><?=$rows['state'];?></td>
                        <td><?=$rows['country'];?></td>
                        <td><?=$rows['pin_code'];?></td>
                        <td><?=substr($rows['total_products'],0,10)."...";?></td>
                        <td><?=$rows['total_price'];?>/-</td>
                        <td><a href="#">print Bill</a></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
            <?php }else{?>
                <div style="text-align:center;margin:50px 0px;color:gray;">
                    <h3>No Orders Founds</h3>
                </div>
            <?php } ?>
        </div>
    </div>





</body>
</html>