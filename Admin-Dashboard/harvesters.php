<?php include 'admin-dashboard.php'; ?>
<title>Harvester - Page</title>
    <div class="dash-page-title">
        <h1>Harvesters</h1>
    </div>

    <div class="add-product-btn">
        <a href="add-harvester.php"><span>Add more Harvesters</span></a>
    </div>

    <div class="harvester-main-div">
        <div class="harvester-sub-div">

        <?php 
        
        include '../db_connection.php';
        
        $sql = "SELECT * FROM `harvesters`";

        $result = mysqli_query($conn,$sql) or die("Query Failed");

        if(mysqli_num_rows($result) > 0){
        ?>
            <table>
                <thead>
                    <th>SR.no</th>
                    <th>Name</th>
                    <th>Mobile</th>
                    <th>Address</th>
                    <th>action</th>
                </thead>
                <tbody>
                <?php 
               $srno = 0;
               while($rows = mysqli_fetch_assoc($result)){
                $srno+=1;
               ?> 
                    <tr>
                        <td><?=$srno?></td>
                        <td><?=$rows['name']; ?></td>
                        <td><?=$rows['mobile']; ?></td>
                        <td id="har-address"><?=$rows['address']; ?></td>
                        <td id="har-action"><a href="add-harvester.php?harid=<?php echo $rows['id']; ?>" id="har-delete">Delete</a></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
            <?php }else{?>


                <div class="har-no-record">
                    <h3>No Record Found</h3>
                </div>

            <?php } ?>
        </div>
    </div>



            
</body>
</html>