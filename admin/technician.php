<?php
    // title define and Page define for active class in sidebar
    define('TITLE', 'Admin | Technician');
    define('PAGE', 'technician');
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
<!-- Start technician part -->

<!-- End technician part -->
<!-- footer part -->
<?php include('adminFooter.php'); ?>