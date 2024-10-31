<?php include 'navbar.php'; ?>

<body class="contact-body">

<!-- ////////////////////////////////////////////////////////////////////// -->
    <div class="con-main-div">
        <div class="con-title">
            <h1>Contact</h1>
            <p>Need help with farming or have questions?</p>
            <p>We're here for you! Just reach out to us for guidance or any concerns you may have. You can contact us through phone or email. We're here to help you out.</p>
        </div>
    </div>
<!-- ///////////////////////////////////////////////////////////// -->
    <div class="con-contact-detail-main-div">
        <div class="con-address contact-info">
            <h1>Address :</h1>
            <!-- <p>Corp Office Mx 175, E7 Extension, <br> Arera Colony, Bhopal- 462016, <br> Madhya Pradesh India</p> -->
            <p>Kacheri Corner, nearest Indreshwar Temple, <br> Indapur - 413106, Pune <br> Maharastra</p>
        </div>

        <div class="con-phone">
            <h1>Phone Number : </h1>
            <p>+91 9423188513  <br> +91 9730234685</p>
        </div>

        <div class="con-email">
            <h1>Email Address :</h1>
            <p>waghjai@gmail.com</p>
        </div>

    </div>
<!-- ///////////////////////////////////////////////////////////////////// -->

    <div class="con-about-form-title">
        <h1>About Us</h1>
    </div>
<!-- ///////////////////////////////////////////////////////////////////// -->

    <div class="contact-form">
        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" class="contact-form-tag">
            <div class="contact-fn-email">
                <div>
                    <input type="text" placeholder="Name" require name="comment_name">
                </div>
                <div>
                    <input type="Email" placeholder="Email" require name="comment_email">
                </div>
            </div>

            <div class="contact-phone">
                <input type="text" placeholder="Phone Number" require name="comment_phone">
            </div>

            <div class="contact-comment">
                <textarea name="comment_comment" id="" cols="30" rows="5" placeholder="Comment"></textarea>
            </div>

            <div class="contact-submit-btn">
                <button name="comment_send">Send</button>
            </div>
        </form>
    </div>

<?php 

include 'db_connection.php';

if(isset($_POST['comment_send'])){

    $comm_name = $_POST['comment_name'];
    $comm_email = $_POST['comment_email'];
    $comm_phone = $_POST['comment_phone'];
    $comm_comment = $_POST['comment_comment'];


    $sql = "INSERT INTO `comment` (`comm_name`,`comm_email`,`comm_phone`,`comm_comment`) VALUES ('{$comm_name}','{$comm_email}','{$comm_phone}','{$comm_comment}')" or die("Query Failed");

    if(mysqli_query($conn,$sql)){
        echo '<script> alert("comment added :)") </script>';
        // header("Location: http://localhost/krushi kendra project/contact.php");
    }

}








?>


<!-- //////////////////////////////////////////////////////////////////////// -->

<?php include 'footer.php'; ?>
    <!-- <script src="script.js"></script> -->
</body>
</html>