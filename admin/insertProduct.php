<?php
    // title define and Page define for active class in sidebar
    define('TITLE', 'Insert | Product');
    define('PAGE', 'assets');
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

<!-- start Insert PHP part -->
<?php
    if (isset($_REQUEST['p_submit'])) {
        $p_id = $_REQUEST['p_id'];
        $p_name = $_REQUEST['p_name'];
        $p_date = $_REQUEST['p_date'];
        $p_available = $_REQUEST['p_available'];
        $p_total = $_REQUEST['p_total'];
        $p_org_price = $_REQUEST['p_org_price'];
        $p_sell_price = $_REQUEST['p_sell_price'];

        if ($p_name == '' or $p_date == '' or $p_available == '' or $p_total == '' or $p_org_price == '' or $p_sell_price == '') {
            $msg = "<div class='alert mt-2 text-center alert-warning alert-dismissible fade show' role='alert'>All Fields Are Required.
                <button type='button' class='btn-close' data-bs-dismiss = 'alert' aria-label='close'></button>
            </div>";
        } else {

            // show already data for table validation
            $sql = "SELECT p_name FROM asset_tb where p_name = '{$p_name}'";
            $result = $conn->query($sql);
            if ($result->num_rows == 1) {
                $msg = "<div class='alert text-center alert-danger alert-dismissible fade show' role='alert'>Product Name Already Exists.
                    <button type='button' class='btn-close' data-bs-dismiss = 'alert' aria-label='close'></button>
                </div>";    
            } // end already data for table validation
            else {
                // Start Insert Table data new requester Create
                $sql = "INSERT INTO asset_tb(p_name, p_date, p_ava, p_total, p_org_cost, p_sell_cost) values('{$p_name}', '{$p_date}', {$p_available}, {$p_total}, {$p_org_price}, {$p_sell_price})";
        
                if ($conn->query($sql)) {
                    $msg = "<div class='alert text-center alert-success alert-dismissible fade show' role='alert'>Product Created Successfully.
                        <button type='button' class='btn-close' data-bs-dismiss = 'alert' aria-label='close'></button>
                    </div>";
                } else {
                    $msg = "<div class='alert text-center alert-danger alert-dismissible fade show' role='alert'>Unable to Product Created.
                        <button type='button' class='btn-close' data-bs-dismiss = 'alert' aria-label='close'></button>
                    </div>";
                }
            } // End Insert Table data new requester Create
        }
    }
?>
<!-- end Insert PHP part -->

<!-- Start Product part -->
    <!-- start 2nd form column -->
    <div class='py-5 col-sm-8'>
    
        <form class='bg-success p-5 rounded-3 mx-5' action='' method='post'>
            <h2 class='text-center text-light p-2'>Add New Product.</h2>
            <?php if (isset($msg)) {echo $msg;} ?>
            <div class='form-group mb-2'>
                <input type='hidden' class='form-control' value='' id='p_id' name='p_id' onkeypress="isInputNumber(event)" readonly/>
            </div>
            <div class='form-group mb-2'>
                <label class='mb-1 text-light fw-bold'>Product Name</label>
                <input type='text' class='form-control' value='' name='p_name' id='p_name'/>
            </div>
            <div class='form-group mb-2'>
                <label class='mb-1 text-light fw-bold'>Date of Purchase</label>
                <input type='date' class='form-control' value='' name='p_date' id='p_date'/>
            </div>
            <div class='form-group  mb-2'>
                <label class='mb-1 text-light fw-bold'>Available</label>
                <input type='number' class='form-control' value='' name='p_available' id='p_available' onkeypress="isInputNumber(event)"/>
            </div>
            <div class='form-group  mb-2'>
                <label class='mb-1 text-light fw-bold'>Total</label>
                <input type='number' class='form-control' value='' name='p_total' id='p_total' onkeypress="isInputNumber(event)"/>
            </div>
            <div class='form-group  mb-2'>
                <label class='mb-1 text-light fw-bold'>Original price</label>
                <input type='number' class='form-control' value='' name='p_org_price' id='p_org_price' onkeypress="isInputNumber(event)"/>
            </div>
            <div class='form-group  mb-5'>
                <label class='mb-1 text-light fw-bold'>Selling Price</label>
                <input type='number' class='form-control' value='' name='p_sell_price' id='p_sell_price' onkeypress="isInputNumber(event)"/>
            </div>
            <div class='form-group text-center'>
                <!-- <input type="hidden" value=''> -->
                <input class='btn btn-info me-3 text-light fw-bold' type='submit' value='Submit' name='p_submit' id='p_submit'/>
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
<!-- footer part -->
<?php include('adminFooter.php'); ?>