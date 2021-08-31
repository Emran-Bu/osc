<?php
    define('TITLE', 'Change | Password');
    define('PAGE', 'changePass');
    include('../dbConnection.php');
    // session start to login start
    session_start();
    if (isset($_SESSION['is_login'])) {
        $rEmail = $_SESSION['rEmail'];
    } else {
        echo "<script>location.href='../login.php';</script>";
    } // session end to login start

    // Start show record in form
    $sql = "SELECT r_email, r_password FROM requester_login_tb where r_email = '$rEmail'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $showPassword = $row['r_password'];
    } // end show record in form

    // Start update record form to database
    if (isset($_REQUEST['rPassword'])) {
        $rPass = $_REQUEST['rPassword'];
        if ($rPass==$showPassword) {
            $msg = "<div class='alert alert-warning alert-dismissible fade show' role='alert'>Enter a New Password.
                <button type='button' class='btn-close' data-bs-dismiss = 'alert' aria-label='close'></button>
            </div>";
        } elseif ($rPass=='') {
            $msg = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>Password Fields Are Required.
                <button type='button' class='btn-close' data-bs-dismiss = 'alert' aria-label='close'></button>
            </div>";
        } else {
            $sql = "UPDATE requester_login_tb SET r_password = '{$rPass}' where r_email = '{$rEmail}'";
                if ($conn->query($sql) == true) {
                $msg = "<div class='alert alert-success alert-dismissible fade show' role='alert'>Password Updated Successfully.
                    <button type='button' class='btn-close' data-bs-dismiss = 'alert' aria-label='close'></button>
                </div>";
                } else {
                $msg = "<div class='alert alert-warning alert-dismissible fade show' role='alert'> Unable To Password Updated.
                    <button type='button' class='btn-close' data-bs-dismiss = 'alert' aria-label='close'></button>
                </div>";
                }
                
                
        }
    } // End update record form to database
    
?>
<!-- include header -->
<?php include('headReq.php'); ?>
    <!-- Start Change password Area -->
    <div class="col-sm-6 pt-5">
        <!-- Start user change pass -->
            <form class="mx-5" action="" method="post">
            <?php if (isset($msg)) {echo $msg;}?>
                <div class="form-group">
                    <label class="fw-50" for="rEmail">Email</label>
                    <input class="form-control" type="email" name="rEmail" id="rEmail" value="<?= $rEmail; ?>" readonly>
                </div>
                <div class="form-group mt-3">
                    <label class="fw-50" for="rPassword">Password</label>
                    <input class="form-control" type="password" name="rPassword" id="rPassword">
                </div>
                <div class="form-group mt-4">
                    <input class=" btn btn-danger" type="submit" name="passUpdate" value="Update" id="passUpdate">
                    <input class=" btn btn-secondary" type="reset" name="passReset" value="Reset" id="passReset">
                </div>
            </form>
        <!-- End user change pass -->
        </div>
    <!-- End Change password Area -->
<!-- include footer -->
<?php include('footerReq.php'); ?>