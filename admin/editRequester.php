<?php

    define('TITLE', 'Edit | Requester');
    define('PAGE', 'requester');
    include('adminHead.php');
    include('../dbConnection.php');
    // start login session
    session_start();
    if (isset($_SESSION['is_adminLogin'])) {
        // $_SESSION['aEmail'] = $aemail;
    } else {
        echo "<script>location.href='adminLogin.php';</script>";
    } // end login session

    // if (isset($msg)) {echo $msg;}

    // start read show data in form
    if (isset($_REQUEST['editID'])) {
    
        $sql = "SELECT * FROM requester_login_tb where r_id = {$_REQUEST['editID']}";

        $result = $conn->query($sql);

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
                $o_rname = $row['r_name'];
                $o_remail = $row['r_email'];
        } else {
            echo "<h1>Failed.</h1>";
        } // end read show data in form
    
    }

    // start update requester part
    if (isset($_REQUEST['r_update'])) {

        // start validation show data in form
        $sql = "SELECT * FROM requester_login_tb where r_id = {$_REQUEST['r_id']}";

        $result = $conn->query($sql);

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $o_rname = $row['r_name'];
            $o_remail = $row['r_email'];
        } else {
            echo "<h1>Failed.</h1>";
        } // end validation show data in form

        $r_name = $_REQUEST['r_name'];
        $r_email = $_REQUEST['r_email'];

        if (($_REQUEST['r_id'] == '') or ($_REQUEST['r_name']== '') or ($_REQUEST['r_email'] == '')) {
            $msg = "<div class='alert mt-2 text-center alert-danger alert-dismissible fade show' role='alert'>All Fields Are Required.
                <button type='button' class='btn-close' data-bs-dismiss = 'alert' aria-label='close'></button>
            </div>";
        } elseif (($r_name == $row['r_name']) and ($r_email == $row['r_email'])) {
            $msg = "<div class='alert mt-2 text-center alert-warning alert-dismissible fade show' role='alert'>Enter New Email Or Name Then Upload.
                <button type='button' class='btn-close' data-bs-dismiss = 'alert' aria-label='close'></button>
            </div>";
        } else {

            $sql = "UPDATE requester_login_tb SET r_name = '{$r_name}', r_email = '{$r_email}' where r_id = {$_REQUEST['r_id']}";

            if ($conn->query($sql) == true) {
                $msg = "<div class='alert mt-2 text-center alert-success alert-dismissible fade show' role='alert'>Requester Id Uploaded.
                    <button type='button' class='btn-close' data-bs-dismiss = 'alert' aria-label='close'></button>
                </div>";
                echo "<script>location.href='requester.php'</script>";
            } else {
                $msg = "<div class='alert mt-2 text-center alert-danger alert-dismissible fade show' role='alert'>Unable To Requester Id Uploaded.
                    <button type='button' class='btn-close' data-bs-dismiss = 'alert' aria-label='close'></button>
                </div>";
            }
        }
    }
    // end update requester part

?>
    <!-- start 2nd column part in form -->
    <div class='mt-5 col-sm-6'>
    
        <form class='bg-info p-5 rounded-3 mx-5' action='' method='post'>
            <h2 class='text-center text-light p-2'>Update Requester Details.</h2>
            <?php if (isset($msg)) {echo $msg;} ?>
            <div class='form-group mb-2'>
                <label class='mb-1'>Requester ID</label>
                <input type='number' class='form-control' value='<?php if(isset($row['r_id'])){echo $row['r_id'];} ?>' name='r_id' id='r_id' readonly/>
            </div>
            <div class='form-group mb-2'>
                <label class='mb-1'>Name</label>
                <input type='text' class='form-control' value='<?php if(isset($row['r_name'])){echo $row['r_name'];} ?>' name='r_name' id='r_name'/>
            </div>
            <div class='form-group mb-5'>
                <label class='mb-1'>Email</label>
                <input type='email' class='form-control' value='<?php if(isset($row['r_email'])){echo $row['r_email'];} ?>' name='r_email' id='r_email'/>
            </div>
            <div class='form-group text-center'>
                <!-- <input type="hidden" value=''> -->
                <input class='btn btn-success' type='submit' value='Update' name='r_update' id='r_update'/>
                <a class='btn btn-secondary' href='requester.php'>Close</a>
            </div>
        </form>

    </div> <!-- end 2nd column part in form -->

<?php
include('adminFooter.php');
?>