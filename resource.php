<?php include 'navbar.php'; ?>
    <title>Resource - page</title>
</head>
<body>
        <div class="resource-head">
            <h1>Resources</h1>
        </div>
<div class="resource-main-div">
    <div class="resource-sub-div">
        <div class="resource-list">
            <h1>Harvesters</h1>
        </div>      
        <div class="har-list">

        <?php 
        
        include 'db_connection.php';
        
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
        
        <div class="resource-list">
            <h1>Blogs</h1>
        </div>
        <div class="blog-main-div">
            <div class="blog-div">
                <img src="project images/fertilizers/0.0.50.jpg" alt="blogimg">
                <h3>00.00.50</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto, ex voluptate perferendis mollitia quisquam sunt doloremque minus architecto tempora fugit nemo odit, aspernatur assumenda laborum vel ullam esse dolorem. Non odit nihil quos itaque mollitia reprehenderit! Rerum porro optio illo velit incidunt vero architecto nobis fugiat autem! Deserunt cumque ducimus voluptatem dignissimos amet nemo mollitia sunt placeat vero! Cumque, hic! Officiis repudiandae ipsam tenetur, voluptates illo et ea saepe possimus in qui, quis corporis ullam voluptatibus consectetur quas aliquam exercitationem veniam? Consectetur, ipsam! Aliquid eos asperiores, repellendus pariatur consequatur sequi veritatis deleniti corrupti cumque modi. Officiis omnis reprehenderit nihil animi?</p>
            </div>

            <div class="blog-div">
                <img src="project images/fertilizers/00.52.34_.jpg" alt="blogimg">
                <h3>00.00.50</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto, ex voluptate perferendis mollitia quisquam sunt doloremque minus architecto tempora fugit nemo odit, aspernatur assumenda laborum vel ullam esse dolorem. Non odit nihil quos itaque mollitia reprehenderit! Rerum porro optio illo velit incidunt vero architecto nobis fugiat autem! Deserunt cumque ducimus voluptatem dignissimos amet nemo mollitia sunt placeat vero! Cumque, hic! Officiis repudiandae ipsam tenetur, voluptates illo et ea saepe possimus in qui, quis corporis ullam voluptatibus consectetur quas aliquam exercitationem veniam? Consectetur, ipsam! Aliquid eos asperiores, repellendus pariatur consequatur sequi veritatis deleniti corrupti cumque modi. Officiis omnis reprehenderit nihil animi?</p>
            </div>

            <div class="blog-div">
                <img src="project images/fertilizers/00.60.20.png" alt="blogimg">
                <h3>00.00.50</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto, ex voluptate perferendis mollitia quisquam sunt doloremque minus architecto tempora fugit nemo odit, aspernatur assumenda laborum vel ullam esse dolorem. Non odit nihil quos itaque mollitia reprehenderit! Rerum porro optio illo velit incidunt vero architecto nobis fugiat autem! Deserunt cumque ducimus voluptatem dignissimos amet nemo mollitia sunt placeat vero! Cumque, hic! Officiis repudiandae ipsam tenetur, voluptates illo et ea saepe possimus in qui, quis corporis ullam voluptatibus consectetur quas aliquam exercitationem veniam? Consectetur, ipsam! Aliquid eos asperiores, repellendus pariatur consequatur sequi veritatis deleniti corrupti cumque modi. Officiis omnis reprehenderit nihil animi?</p>
            </div>
        </div>
    </div>
</div>



<?php include 'footer.php'; ?>
</body>
</html>