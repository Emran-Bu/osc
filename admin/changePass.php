<?php
    // title define and Page define for active class in sidebar
    define('TITLE', 'Admin | ChangePassword');
    define('PAGE', 'changePass');
    // database connection
    include('../dbConnection.php');
    // start login session
    session_start();
    if (isset($_SESSION['is_adminLogin'])) {
        $aEmail = $_SESSION['aEmail'];
    } else {
        echo "<script>location.href='adminLogin.php';</script>";
    } // end login session

    // Start show record in form
    $sql = "SELECT a_email, a_password FROM admin_login_tb where a_email = '$aEmail'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $showPassword = $row['a_password'];
    } // end show record in form

    // Start update record form to database
    if (isset($_REQUEST['aPassword'])) {
        $aPass = $_REQUEST['aPassword'];
        if ($aPass==$showPassword) {
            $msg = "<div class='alert alert-warning alert-dismissible fade show' role='alert'>Enter a New Password.
                <button type='button' class='btn-close' data-bs-dismiss = 'alert' aria-label='close'></button>
            </div>";
        } elseif ($aPass=='') {
            $msg = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>Password Fields Are Required.
                <button type='button' class='btn-close' data-bs-dismiss = 'alert' aria-label='close'></button>
            </div>";
        } else {
            $sql = "UPDATE admin_login_tb SET a_password = '{$aPass}' where a_email = '{$aEmail}'";
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

<!-- header part -->
<?php include('adminHead.php'); ?>
<!-- Start changePass part -->
<!-- 2nd col Start changePass part -->
<div class="col-sm-6 pt-5">
    <form class="mx-5" action="" method="post">
    <?php if (isset($msg)) {echo $msg;}?>
        <div class="form-group">
            <label class="fw-50" for="aEmail">Email</label>
            <input class="form-control" type="email" name="aEmail" id="aEmail" value="<?= $aEmail; ?>" readonly>
        </div>
        <div class="form-group mt-3">
            <label class="fw-50" for="aPassword">Password</label>
            <input class="form-control" type="password" name="aPassword" id="aPassword">
        </div>
        <div class="form-group mt-4">
            <input class=" btn btn-danger" type="submit" name="passUpdate" value="Update" id="passUpdate">
            <input class=" btn btn-secondary" type="reset" name="passReset" value="Reset" id="passReset">
        </div>
    </form>
</div>
<!-- 2nd col End changePass part -->
<!-- footer part -->
<?php include('adminFooter.php'); ?>