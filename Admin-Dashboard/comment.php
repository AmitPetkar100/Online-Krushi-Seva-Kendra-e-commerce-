<?php include 'admin-dashboard.php'; ?>
<title>Comments</title>
    <div class="dash-page-title">
        <h1>Comments</h1>
    </div>

    <?php 
    
    
    include '../db_connection.php';

    $sql = "SELECT * FROM `comment` ORDER BY `comm_id` DESC" or dir("Query Failed");

    $result = mysqli_query($conn,$sql);


    if(mysqli_num_rows($result) > 0)
    {
    ?>


    <div class="comment-main-div">
        <div class="comment-sub-div">

        <?php

        while($rows = mysqli_fetch_assoc($result)){

        ?>


            <div class="comment-div">
                    <div class="comment-div-user-detail">
                        <h5><?php echo $rows['comm_name']; ?></h5> <hr>
                        <h5><?php echo $rows['comm_phone']; ?></h5> <hr>
                        <h5><?php echo $rows['comm_email']; ?></h5> 
                    </div> <hr>
                    <div class="comment-div-comment">
                        <p><?php echo $rows['comm_comment']; ?></p>
                    </div>

                    <div class="delete-comment">
                        <a href="delete-comment.php?comid=<?php echo $rows['comm_id'];?>">Delete</a>
                    </div>
            </div>

        
            <?php } ?>

        </div>
    </div>
<?php }else{
?>

<div class="no-comment">
    <h3>No Comments Found !!</h3>
</div>

<?php
} ?>
</body>
</html>