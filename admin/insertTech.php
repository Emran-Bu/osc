<?php
    // title define and Page define for active class in sidebar
    define('TITLE', 'Insert | Technician');
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

<!-- start Insert PHP part -->
<?php
    if (isset($_REQUEST['tech_submit'])) {
        $tech_id = $_REQUEST['tech_id'];
        $tech_name = $_REQUEST['tech_name'];
        $tech_city = $_REQUEST['tech_city'];
        $tech_mobile = $_REQUEST['tech_mobile'];
        $tech_email = $_REQUEST['tech_email'];

        if ($tech_name == '' or $tech_city == '' or $tech_mobile == '' or $tech_email == '') {
            $msg = "<div class='alert mt-2 text-center alert-warning alert-dismissible fade show' role='alert'>All Fields Are Required.
                <button type='button' class='btn-close' data-bs-dismiss = 'alert' aria-label='close'></button>
            </div>";
        } else {
            // show already data for table validation
            $sql = "SELECT tech_email FROM technician_tb where tech_email = '{$tech_email}'";
            $result = $conn->query($sql);
            if ($result->num_rows == 1) {
                $msg = "<div class='alert text-center alert-danger alert-dismissible fade show' role='alert'>Email ID Already Registered
                    <button type='button' class='btn-close' data-bs-dismiss = 'alert' aria-label='close'></button>
                </div>";
            } // end already data for table validation
            else {
                // Start Insert Table data new requester Create
                $sql = "INSERT INTO technician_tb(tech_name, tech_city, tech_mobile, tech_email) values('{$tech_name}', '{$tech_city}', {$tech_mobile}, '{$tech_email}')";
        
                if ($conn->query($sql)) {
                    $msg = "<div class='alert text-center alert-success alert-dismissible fade show' role='alert'>Technician Account Created Successfully
                        <button type='button' class='btn-close' data-bs-dismiss = 'alert' aria-label='close'></button>
                    </div>";
                } else {
                    $msg = "<div class='alert text-center alert-danger alert-dismissible fade show' role='alert'>Unable to Technician Create Account
                        <button type='button' class='btn-close' data-bs-dismiss = 'alert' aria-label='close'></button>
                    </div>";
                }
            } // End Insert Table data new requester Create
        }
    }
?>
<!-- end Insert PHP part -->

<!-- Start technician part -->
    <!-- start 2nd form column -->
    <div class='py-5 col-sm-8'>
    
        <form class='bg-primary p-5 rounded-3 mx-5' action='' method='post'>
            <h2 class='text-center text-light p-2'>Add New Technician.</h2>
            <?php if (isset($msg)) {echo $msg;} ?>
            <div class='form-group mb-2'>
                <input type='hidden' class='form-control' value='' id='tech_id' name='tech_id' onkeypress="isInputNumber(event)" readonly/>
            </div>
            <div class='form-group mb-2'>
                <label class='mb-1 text-light fw-bold'>Name</label>
                <input type='text' class='form-control' value='' name='tech_name' id='tech_name'/>
            </div>
            <div class='form-group mb-2'>
                <label class='mb-1 text-light fw-bold'>City</label>
                <input type='text' class='form-control' value='' name='tech_city' id='tech_city'/>
            </div>
            <div class='form-group  mb-2'>
                <label class='mb-1 text-light fw-bold'>Mobile</label>
                <input type='number' class='form-control' value='' name='tech_mobile' id='tech_mobile' onkeypress="isInputNumber(event)"/>
            </div>
            <div class='form-group mb-5'>
                <label class='mb-1 text-light fw-bold'>Email</label>
                <input type='email' class='form-control' value='' name='tech_email' id='tech_email'/>
            </div>
            <div class='form-group text-center'>
                <!-- <input type="hidden" value=''> -->
                <input class='btn btn-warning me-3 text-light fw-bold' type='submit' value='Submit' name='tech_submit' id='tech_submit'/>
                <a class='btn btn-danger fw-bold' href='technician.php'>Close</a>
            </div>
        </form>

    </div>
    <!-- end 2nd form column -->

<!-- End technician part -->
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