<?php

    define('TITLE', 'Edit | Technician');
    define('PAGE', 'technician');
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
    
        $sql = "SELECT * FROM technician_tb where tech_id = {$_REQUEST['editID']}";

        $result = $conn->query($sql);

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
        } else {
            echo "<h1>Failed.</h1>";
        } // end read show data in form
    
    }

    // start update requester part
    if (isset($_REQUEST['tech_update'])) {

        // start validation show data in form
        $sql = "SELECT * FROM technician_tb where tech_id = {$_REQUEST['tech_id']}";

        $result = $conn->query($sql);

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
        } else {
            echo "<h1>Failed.</h1>";
        } // end validation show data in form

        // start update requester part
        $tech_name = $_REQUEST['tech_name'];
        $tech_city = $_REQUEST['tech_city'];
        $tech_mobile = $_REQUEST['tech_mobile'];
        $tech_email = $_REQUEST['tech_email'];

        if (($_REQUEST['tech_id'] == '') or ($_REQUEST['tech_name']== '') or ($_REQUEST['tech_city'] == '') or ($_REQUEST['tech_mobile'] == '') or ($_REQUEST['tech_email'] == '')) {
            $msg = "<div class='alert mt-2 text-center alert-danger alert-dismissible fade show' role='alert'>All Fields Are Required.
                <button type='button' class='btn-close' data-bs-dismiss = 'alert' aria-label='close'></button>
            </div>";
        } elseif (($tech_name == $row['tech_name']) and ($tech_city == $row['tech_city']) and ($tech_mobile == $row['tech_mobile']) and ($tech_email == $row['tech_email'])) {
            $msg = "<div class='alert mt-2 text-center alert-warning alert-dismissible fade show' role='alert'>Enter a new data then upload.
                <button type='button' class='btn-close' data-bs-dismiss = 'alert' aria-label='close'></button>
            </div>";
        } else {

            $sql = "UPDATE technician_tb SET tech_name = '{$tech_name}', tech_city = '{$tech_city}', tech_mobile = {$tech_mobile}, tech_email = '{$tech_email}' where tech_id = {$_REQUEST['tech_id']}";

            if ($conn->query($sql) == true) {
                $msg = "<div class='alert mt-2 text-center alert-success alert-dismissible fade show' role='alert'>Technician Id Uploaded.
                    <button type='button' class='btn-close' data-bs-dismiss = 'alert' aria-label='close'></button>
                </div>";
                echo '<meta http-equiv="refresh" content="0; url=?closed">';
                echo "<script>location.href='technician.php'</script>";
            } else {
                $msg = "<div class='alert mt-2 text-center alert-danger alert-dismissible fade show' role='alert'>Unable To Technician Id Uploaded.
                    <button type='button' class='btn-close' data-bs-dismiss = 'alert' aria-label='close'></button>
                </div>";
            }
        }
    }
    // end update requester part

?>
    <!-- start 2nd column part in form -->
    <div class='mt-5 col-sm-6'>
    
        <form class='bg-primary p-5 rounded-3 mx-5' action='' method='post'>
            <h2 class='text-center text-light p-2'>Update Technician Details.</h2>
            <?php if (isset($msg)) {echo $msg;} ?>
            <div class='form-group mb-2'>
                <label class='mb-1 text-light fw-bold'>Technician ID</label>
                <input type='number' class='form-control' value='<?php if(isset($row['tech_id'])){echo $row['tech_id'];} ?>' name='tech_id' id='tech_id' onkeypress="isInputNumber(event)" readonly/>
            </div>
            <div class='form-group mb-2'>
                <label class='mb-1 text-light fw-bold'>Name</label>
                <input type='text' class='form-control' value='<?php if(isset($row['tech_name'])){echo $row['tech_name'];} ?>' name='tech_name' id='tech_name'/>
            </div>
            <div class='form-group mb-2'>
                <label class='mb-1 text-light fw-bold'>City</label>
                <input type='text' class='form-control' value='<?php if(isset($row['tech_city'])){echo $row['tech_city'];} ?>' name='tech_city' id='tech_city'/>
            </div>
            <div class='form-group mb-2'>
                <label class='mb-1 text-light fw-bold'>Mobile</label>
                <input type='number' class='form-control' value='<?php if(isset($row['tech_mobile'])){echo $row['tech_mobile'];} ?>' name='tech_mobile' id='tech_mobile' onkeypress="isInputNumber(event)"/>
            </div>
            <div class='form-group mb-5'>
                <label class='mb-1 text-light fw-bold'>Email</label>
                <input type='email' class='form-control' value='<?php if(isset($row['tech_email'])){echo $row['tech_email'];} ?>' name='tech_email' id='tech_email'/>
            </div>
            <div class='form-group text-center'>
                <!-- <input type="hidden" value=''> -->
                <input class='btn btn-warning me-3 text-light fw-bold' type='submit' value='Update' name='tech_update' id='tech_update'/>
                <a class='btn btn-secondary fw-bold' href='technician.php'>Close</a>
            </div>
        </form>

    </div> <!-- end 2nd column part in form -->

    <!--start only number for input tag-->
    <script>
        function isInputNumber(evt) {
            var ch = String.fromCharCode(evt.which);
            if (!(/[0-9]/).test(ch)) {
                evt.preventDefault();
            }
        }
    </script>
<!--end only number for input tag-->

<?php
include('adminFooter.php');
?>