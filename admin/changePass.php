<?php
    // title define and Page define for active class in sidebar
    define('TITLE', 'Admin | ChangePassword');
    define('PAGE', 'changePass');
    // database connection
    include('../dbConnection.php');
    // start login session
    session_start();
    if (isset($_SESSION['is_adminLogin'])) {
        // $_SESSION['aEmail'] = $aemail;
    } else {
        echo "<script>location.href='adminLogin.php';</script>";
    } // end login session

?>

<!-- header part -->
<?php include('adminHead.php'); ?>
<!-- Start changePass part -->

<!-- End changePass part -->
<!-- footer part -->
<?php include('adminFooter.php'); ?>