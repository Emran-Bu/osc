<?php
    // title define and Page define for active class in sidebar
    define('TITLE', 'Insert | Requester');
    define('PAGE', 'requester');
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

<!-- start insert PHP part -->
<?php
    if (isset($_REQUEST['r_submit'])) {
        $r_id = $_REQUEST['r_id'];
        $r_name = $_REQUEST['r_name'];
        $r_email = $_REQUEST['r_email'];
        $r_password = $_REQUEST['r_password'];

        if ($r_name == '' or $r_email == '' or $r_password == '') {
            $msg = "<div class='alert mt-2 text-center alert-warning alert-dismissible fade show' role='alert'>All Fields Are Required.
                <button type='button' class='btn-close' data-bs-dismiss = 'alert' aria-label='close'></button>
            </div>";
        } else {

            // show already data for table validation
            $sql = "SELECT r_email FROM requester_login_tb";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $check_email = $row['r_email'];
                }
            } // end already data for table validation

            if(($r_email >= $check_email)){
                $msg = "<div class='alert text-center alert-danger alert-dismissible fade show' role='alert'>Email ID Already Registered
                    <button type='button' class='btn-close' data-bs-dismiss = 'alert' aria-label='close'></button>
                </div>";
            } else {
                // Start Insert Table data new requester Create
                $sql = "INSERT INTO requester_login_tb(r_name, r_email, r_password) values('{$r_name}', '{$r_email}', '{$r_password}')";
        
                if ($conn->query($sql)) {
                    $msg = "<div class='alert text-center alert-success alert-dismissible fade show' role='alert'>Requester Account Created Successfully
                        <button type='button' class='btn-close' data-bs-dismiss = 'alert' aria-label='close'></button>
                    </div>";
                } else {
                    $msg = "<div class='alert text-center alert-danger alert-dismissible fade show' role='alert'>Unable to Requester Create Account
                        <button type='button' class='btn-close' data-bs-dismiss = 'alert' aria-label='close'></button>
                    </div>";
                }
            } // End Insert Table data new requester Create
        }
    }
?>
<!-- end insert PHP part -->

<!-- Start technician part -->
    <!-- start 2nd form column -->
    <div class='mt-5 col-sm-6'>
    
        <form class='bg-info p-5 rounded-3 mx-5' action='' method='post'>
            <h2 class='text-center text-light p-2'>Add New Requester.</h2>
            <?php if (isset($msg)) {echo $msg;} ?>
            <div class='form-group mb-2'>
                <input type='hidden' class='form-control' value='' id='r_id' name='r_id' readonly/>
            </div>
            <div class='form-group mb-2'>
                <label class='mb-1'>Name</label>
                <input type='text' class='form-control' value='' name='r_name' id='r_name'/>
            </div>
            <div class='form-group  mb-2'>
                <label class='mb-1'>Email</label>
                <input type='email' class='form-control' value='' name='r_email' id='r_email'/>
            </div>
            <div class='form-group mb-5'>
                <label class='mb-1'>Password</label>
                <input type='password' class='form-control' value='' name='r_password' id='r_password'/>
            </div>
            <div class='form-group text-center'>
                <!-- <input type="hidden" value=''> -->
                <input class='btn me-3 btn-success' type='submit' value='Submit' name='r_submit' id='r_submit'/>
                <a class='btn btn-secondary' href='requester.php'>Close</a>
            </div>
        </form>

    </div>
    <!-- end 2nd form column -->

<!-- End technician part -->
<!-- footer part -->
<?php include('adminFooter.php'); ?>