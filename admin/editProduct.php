<?php

    define('TITLE', 'Edit | Product');
    define('PAGE', 'assets');
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
    
        $sql = "SELECT * FROM asset_tb where p_id = {$_REQUEST['editID']}";

        $result = $conn->query($sql);

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
        } else {
            echo "<h1>Failed.</h1>";
        } // end read show data in form
    
    }

    // start update product part
    if (isset($_REQUEST['p_update'])) {

        // start validation show data in form
        $sql = "SELECT * FROM asset_tb where p_id = {$_REQUEST['p_id']}";

        $result = $conn->query($sql);

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
        } else {
            echo "<h1>Failed.</h1>";
        } // end validation show data in form

        // start update product part
        $p_id = $_REQUEST['p_id'];
        $p_name = $_REQUEST['p_name'];
        $p_date = $_REQUEST['p_date'];
        $p_available = $_REQUEST['p_available'];
        $p_total = $_REQUEST['p_total'];
        $p_org_price = $_REQUEST['p_org_price'];
        $p_sell_price = $_REQUEST['p_sell_price'];

        if ($p_name == '' or $p_date == '' or $p_available == '' or $p_total == '' or $p_org_price == '' or $p_sell_price == '') {
            $msg = "<div class='alert mt-2 text-center alert-danger alert-dismissible fade show' role='alert'>All Fields Are Required.
                <button type='button' class='btn-close' data-bs-dismiss = 'alert' aria-label='close'></button>
            </div>";
        } elseif (($p_id == $row['p_id']) and ($p_name == $row['p_name']) and ($p_date == $row['p_date']) and ($p_available == $row['p_ava']) and ($p_total == $row['p_total']) and ($p_org_price == $row['p_org_cost']) and ($p_sell_price == $row['p_sell_cost'])) {
            $msg = "<div class='alert mt-2 text-center alert-warning alert-dismissible fade show' role='alert'>Enter a new data then upload.
                <button type='button' class='btn-close' data-bs-dismiss = 'alert' aria-label='close'></button>
            </div>";
        } else {

            $sql = "UPDATE asset_tb SET p_name = '{$p_name}', p_date = '{$p_date}', p_ava = {$p_available}, p_total = {$p_total}, p_org_cost = {$p_org_price}, p_sell_cost = {$p_sell_price} where p_id = {$_REQUEST['p_id']}";

            if ($conn->query($sql) == true) {
                $msg = "<div class='alert mt-2 text-center alert-success alert-dismissible fade show' role='alert'>Product Id Uploaded.
                    <button type='button' class='btn-close' data-bs-dismiss = 'alert' aria-label='close'></button>
                </div>";
                echo "<script>location.href='assets.php'</script>";
            } else {
                $msg = "<div class='alert mt-2 text-center alert-danger alert-dismissible fade show' role='alert'>Unable To Product Id Uploaded.
                    <button type='button' class='btn-close' data-bs-dismiss = 'alert' aria-label='close'></button>
                </div>";
            }
        }
    }
    // end update product part

?>
    <!-- start 2nd form column -->
    <div class='py-5 col-sm-8'>
    
        <form class='bg-success p-5 rounded-3 mx-5' action='' method='post'>
            <h2 class='text-center text-light p-2'>Update Product Details.</h2>
            <?php if (isset($msg)) {echo $msg;} ?>
            <div class='form-group mb-2'>
                <input type='hidden' class='form-control' value='<?php if(isset($row['p_id'])) {echo $row['p_id'];} ?>' id='p_id' name='p_id' onkeypress="isInputNumber(event)" readonly/>
            </div>
            <div class='form-group mb-2'>
                <label class='mb-1 text-light fw-bold'>Product Name</label>
                <input type='text' class='form-control' value='<?php if(isset($row['p_name'])) {echo $row['p_name'];} ?>' name='p_name' id='p_name'/>
            </div>
            <div class='form-group mb-2'>
                <label class='mb-1 text-light fw-bold'>Date of Purchase</label>
                <input type='date' class='form-control' value='<?php if(isset($row['p_date'])) {echo $row['p_date'];} ?>' name='p_date' id='p_date'/>
            </div>
            <div class='form-group  mb-2'>
                <label class='mb-1 text-light fw-bold'>Available</label>
                <input type='number' class='form-control' value='<?php if(isset($row['p_ava'])) {echo $row['p_ava'];} ?>' name='p_available' id='p_available' onkeypress="isInputNumber(event)"/>
            </div>
            <div class='form-group  mb-2'>
                <label class='mb-1 text-light fw-bold'>Total</label>
                <input type='number' class='form-control' value='<?php if(isset($row['p_total'])) {echo $row['p_total'];} ?>' name='p_total' id='p_total' onkeypress="isInputNumber(event)"/>
            </div>
            <div class='form-group  mb-2'>
                <label class='mb-1 text-light fw-bold'>Original price</label>
                <input type='number' class='form-control' value='<?php if(isset($row['p_org_cost'])) {echo $row['p_org_cost'];} ?>' name='p_org_price' id='p_org_price' onkeypress="isInputNumber(event)"/>
            </div>
            <div class='form-group  mb-5'>
                <label class='mb-1 text-light fw-bold'>Selling Price</label>
                <input type='number' class='form-control' value='<?php if(isset($row['p_sell_cost'])) {echo $row['p_sell_cost'];} ?>' name='p_sell_price' id='p_sell_price' onkeypress="isInputNumber(event)"/>
            </div>
            <div class='form-group text-center'>
                <!-- <input type="hidden" value=''> -->
                <input class='btn btn-info me-3 text-light fw-bold' type='submit' value='Update' name='p_update' id='p_update'/>
                <a class='btn btn-danger fw-bold' href='assets.php'>Close</a>
            </div>
        </form>

    </div>
    <!-- end 2nd form column -->

<!-- End Product part -->

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