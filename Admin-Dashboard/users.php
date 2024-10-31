<?php include 'admin-dashboard.php'; ?>
<title>Users</title>
    <div class="dash-page-title">
        <h1>Users details</h1>
    </div>

    <div class="admin-user-table">

        <?php 
        
        include '../db_connection.php';
        
        $sql = "SELECT * FROM `registration` ORDER BY `regid` DESC";

        $result = mysqli_query($conn,$sql) or die("Query Failed");

        if(mysqli_num_rows($result) > 0){
        ?>
        <table>
            <thead>
                <th>Sr.No</th>
                <th>User Full Name</th>
                <th>User Email</th>
                <th>User Phone</th>
                <th>User Gender</th>
                <th>Delete</th>
            </thead>
        
            <tbody>
               <?php 
               
               while($rows = mysqli_fetch_assoc($result)){
               ?> 
                <tr>
                    <td><?php echo $rows['regid']; ?></td>
                    <td><?php echo $rows['regfname']." ".$rows['reglname']; ?></td>
                    <td><?php echo $rows['regemail']; ?></td>
                    <td><?php echo $rows['regphone']; ?></td>
                    <td><?php echo $rows['reggender']; ?></td>
                    <td><a href="delete-user.php?id=<?php echo$rows['regid']; ?>">Delete</a></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
        <?php } ?>
    </div>
</body>
</html>