<?php

    define('TITLE', 'Sell | Product');
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
    if (isset($_REQUEST['sellBtn'])) {
    
        $sql = "SELECT * FROM asset_tb where p_id = {$_REQUEST['sellID']}";

        $result = $conn->query($sql);

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
        } else {
            echo "<h1>Failed.</h1>";
        } // end read show data in form
    
    }

    // start update sell product part
    if (isset($_REQUEST['p_submit'])) {

        // start update sell product part
        $p_id = $_REQUEST['p_id'];
        $c_name = $_REQUEST['c_name'];
        $c_add = $_REQUEST['c_add'];
        $c_mobile = $_REQUEST['c_mobile'];
        $p_name = $_REQUEST['p_name'];
        $p_available = $_REQUEST['p_available'];
        $p_quan = $_REQUEST['p_quan'];
        $p_sell_price = $_REQUEST['p_sell_price'];
        $total_cost = $_REQUEST['total_cost'];
        $sell_date = $_REQUEST['sell_date'];

        if ($p_id == '' or $c_name == '' or $c_add == '' or $c_mobile == '' or $p_name == '' or $p_available == '' or $p_quan == '' or $p_sell_price == '' or $total_cost == '' or $sell_date == '') {
            $msg = "<div class='alert mt-2 text-center alert-danger alert-dismissible fade show' role='alert'>All Fields Are Required.
                <button type='button' class='btn-close' data-bs-dismiss = 'alert' aria-label='close'></button>
            </div>";
        } else {

            $new_p_available = $_REQUEST['p_available'] - $_REQUEST['p_quan'];
            
            $sql = "INSERT INTO sell_product_tb(s_c_name, s_c_add, s_c_mobile, s_p_name, s_p_quan, s_p_each_price, s_p_total_price, s_p_date) values('{$c_name}', '{$c_add}', {$c_mobile}, '{$p_name}', {$p_quan}, {$p_sell_price}, {$total_cost}, '{$sell_date}')";

            if ($conn->query($sql) == true) {
                $genId = mysqli_insert_id($conn);
                $_SESSION['myId'] = $genId;
                echo "<script>location.href='sellProductSucc.php';</script>";
            } else {
                $msg = "<div class='alert mt-2 text-center alert-danger alert-dismissible fade show' role='alert'>Unable To Product Sell.
                    <button type='button' class='btn-close' data-bs-dismiss = 'alert' aria-label='close'></button>
                </div>";
            }

            $sqlUp = "UPDATE asset_tb SET p_ava = {$new_p_available} where p_id = {$_REQUEST['p_id']}";

            $conn->query($sqlUp);
        } 
    }
    // end update sell product part

?>
    <!-- start 2nd form column -->
    <div class='py-5 col-sm-8'>
    
        <form class='bg-success p-5 rounded-3 mx-5' action='' method='post'>
            <h2 class='text-center text-light p-2'>Customer Bill.</h2>
            <?php if (isset($msg)) {echo $msg;} ?>
            <div class='form-group mb-2'>
                <input type='hidden' class='form-control' value='<?php if(isset($row['p_id'])) {echo $row['p_id'];} ?>' id='p_id' name='p_id' onkeypress="isInputNumber(event)" readonly/>
            </div>
            <div class='form-group mb-2'>
                <label class='mb-1 text-light fw-bold'>Customer Name</label>
                <input type='text' class='form-control' value='' name='c_name' id='c_name'/>
            </div>
            <div class='form-group mb-2'>
                <label class='mb-1 text-light fw-bold'>Customer Address</label>
                <input type='text' class='form-control' value='' name='c_add' id='c_add'/>
            </div>
            <div class='form-group mb-2'>
                <label class='mb-1 text-light fw-bold'>Customer Mobile</label>
                <input type='text' class='form-control' value='' name='c_mobile' id='c_mobile' onkeypress="isInputNumber(event)"/>
            </div>
            <div class='form-group mb-2'>
                <label class='mb-1 text-light fw-bold'>Product Name</label>
                <input type='text' class='form-control' value='<?php if(isset($row['p_name'])) {echo $row['p_name'];} ?>' name='p_name' id='p_name' readonly/>
            </div>
            <div class='form-group  mb-2'>
                <label class='mb-1 text-light fw-bold'>Available</label>
                <input type='number' class='form-control' value='<?php if(isset($row['p_ava'])) {echo $row['p_ava'];} ?>' name='p_available' id='p_available' onkeypress="isInputNumber(event)" readonly/>
            </div>
            <div class='form-group  mb-2'>
                <label class='mb-1 text-light fw-bold'>Quantity</label>
                <input type='number' class='form-control' value='' name='p_quan' id='p_quan' onkeypress="isInputNumber(event)"/>
            </div>
            <div class='form-group  mb-2'>
                <label class='mb-1 text-light fw-bold'> Price Each</label>
                <input type='number' class='form-control' value='<?php if(isset($row['p_sell_cost'])) {echo $row['p_sell_cost'];} ?>' name='p_sell_price' id='p_sell_price' onkeypress="isInputNumber(event)"/>
            </div>
            <div class='form-group mb-2'>
                <label class='mb-1 text-light fw-bold'>Total Price</label>
                <input type='number' class='form-control' value='' name='total_cost' id='total_cost' onkeypress="isInputNumber(event)"/>
            </div>
            <div class='form-group mb-5'>
                <label class='mb-1 text-light fw-bold'>Date</label>
                <input type='date' class='form-control' value='' name='sell_date' id='sell_date'/>
            </div>
            <div class='form-group text-center'>
                <input class='btn btn-info me-3 text-light fw-bold' type='submit' value='Submit' name='p_submit' id='p_submit'/>
                <a class='btn btn-danger fw-bold' href='assets.php'>Close</a>
            </div>
        </form>

    </div>
    <!-- end 2nd form column -->

<!-- End sell Product part -->

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