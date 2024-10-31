<?php include 'admin-dashboard.php'; ?>
<title>Admin home</title>
    <div class="dash-page-title">
        <h1>Admin home</h1>
    </div>
<!-- <iframe> -->

    <div class="home-main-div">
        <div class="home-sub-div">
        <?php

include '../db_connection.php';
$sql = "SELECT COUNT('pro_id') as total FROM `products` WHERE `pro_category` = 1";
$result = mysqli_query($conn,$sql) or die("Query Failed");
$data = mysqli_fetch_assoc($result);

?>
        <a href="fertilizer.php" class="home-count-a">
            <div class="home-user-count">
            <div class="home-user-title">
                    <h3>Total <span>fertilizers</span></h3>
                </div>
                <div class="user-count">
                    <h4><?php echo $data['total']; ?></h4>
                </div>
            </div></a>

            <?php

            include '../db_connection.php';
            $sql = "SELECT COUNT('pro_id') as total FROM `products` WHERE `pro_category` = 2";
            $result = mysqli_query($conn,$sql) or die("Query Failed");
            $data = mysqli_fetch_assoc($result);

            ?>

            <a href="pesticide.php" class="home-count-a">
            <div class="home-user-count">
            <div class="home-user-title">
                    <h3>Total <span>pesticides</span></h3>
                </div>
                <div class="user-count">
                    <h4><?php echo $data['total']; ?></h4>
                </div>
            </div></a>
            <?php

            include '../db_connection.php';
            $sql = "SELECT COUNT('pro_id') as total FROM `products` WHERE `pro_category` = 4";
            $result = mysqli_query($conn,$sql) or die("Query Failed");
            $data = mysqli_fetch_assoc($result);

            ?>

            <a href="herbicides.php" class="home-count-a">
            <div class="home-user-count">
            <div class="home-user-title">
                    <h3>Total <span>herbicides</span></h3>
                </div>
                <div class="user-count">
                    <h4><?php echo $data['total']; ?></h4>
                </div>
            </div></a>
            <?php

            include '../db_connection.php';
            $sql = "SELECT COUNT('pro_id') as total FROM `products` WHERE `pro_category` = 3";
            $result = mysqli_query($conn,$sql) or die("Query Failed");
            $data = mysqli_fetch_assoc($result);

            ?>

            <a href="fungicides.php" class="home-count-a">
            <div class="home-user-count">
            <div class="home-user-title">
                    <h3>Total <span>fungicides</span></h3>
                </div>
                <div class="user-count">
                    <h4><?php echo $data['total']; ?></h4>
                </div>
            </div></a>

            <?php

            include '../db_connection.php';
            $sql = "SELECT COUNT('comm_id') as total FROM `comment`";
            $result = mysqli_query($conn,$sql) or die("Query Failed");
            $data = mysqli_fetch_assoc($result);
            
            ?>

            <a href="comment.php" class="home-count-a">
            <div class="home-user-count">
                <div class="home-user-title">
                    <h3>Total <span>comments</span></h3>
                </div>
                <div class="user-count">
                    <h4><?php echo $data['total']; ?></h4>
                </div>
            </div></a>

            <?php

            include '../db_connection.php';
            $sql = "SELECT COUNT('regid') as total FROM `registration`";
            $result = mysqli_query($conn,$sql) or die("Query Failed");
            $data = mysqli_fetch_assoc($result);
            
            ?>
            <a href="users.php" class="home-count-a">
            <div class="home-user-count">
                <div class="home-user-title">
                    <h3>Total <span>Users</span></h3>
                </div>
                <div class="user-count">
                    <h4><?php echo $data['total']; ?></h4>
                </div>
            </div></a>


            <?php

            include '../db_connection.php';
            $sql = "SELECT COUNT('id') as total FROM `order`";
            $result = mysqli_query($conn,$sql) or die("Query Failed");
            $data = mysqli_fetch_assoc($result);
            
            ?>

            <a href="order.php" class="home-count-a">
            <div class="home-user-count">
                <div class="home-user-title">
                    <h3>Total <span>orders</span></h3>
                </div>
                <div class="user-count">
                    <h4><?php echo $data['total']; ?></h4>
                </div>
            </div></a>

            <?php

            include '../db_connection.php';
            $sql = "SELECT COUNT('id') as total FROM `supplyer`";
            $result = mysqli_query($conn,$sql) or die("Query Failed");
            $data = mysqli_fetch_assoc($result);
            
            ?>

            <a href="supplyer.php" class="home-count-a">
            <div class="home-user-count">
                <div class="home-user-title">
                    <h3>Total <span>Supplyers</span></h3>
                </div>
                <div class="user-count">
                    <h4><?php echo $data['total']; ?></h4>
                </div>
            </div></a>

            <?php

            include '../db_connection.php';
            $sql = "SELECT COUNT('id') as total FROM `harvesters`";
            $result = mysqli_query($conn,$sql) or die("Query Failed");
            $data = mysqli_fetch_assoc($result);
            
            ?>
            <a href="harvesters.php" class="home-count-a">
            <div class="home-user-count">
                <div class="home-user-title">
                    <h3>Total <span>Harvesters</span></h3>
                </div>
                <div class="user-count">
                    <h4><?php echo $data['total']; ?></h4>
                </div>
            </div></a>

        
        </div>
    </div>
    <!-- </iframe> -->
    
</body>
</html>