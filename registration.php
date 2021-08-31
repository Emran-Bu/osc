<?php include('head.php') ?>

<?php

include('dbConnection.php');

// sign up button set
if (isset($_REQUEST['rSignUp'])) {
    // peak all value to form
    $rName = mysqli_real_escape_string($conn, $_REQUEST['rName']);
    $rEmail = mysqli_real_escape_string($conn, $_REQUEST['rEmail']);
    $rPass = mysqli_real_escape_string($conn, $_REQUEST['rPass']);
    // $rName = $_REQUEST['rName'];
    // $rEmail = $_REQUEST['rEmail'];
    // $rPass = $_REQUEST['rPass'];

    // form validation
    if ($rName == "" or $rEmail == "" or $rPass == "") {
        $msg = "<div class='alert alert-warning alert-dismissible fade show' role='alert'>All Fields Are Required
            <button type='button' class='btn-close' data-bs-dismiss = 'alert' aria-label='close'></button>
        </div>";
    } else {

        // show already data for table
        $sql = "SELECT r_email FROM requester_login_tb where r_email = '{$rEmail}'";
        $result = $conn->query($sql);
        if ($result->num_rows==1) {
            $msg = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>Email ID Already Registered
                <button type='button' class='btn-close' data-bs-dismiss = 'alert' aria-label='close'></button>
            </div>";
        } else {
            // Insert Table data
            $sql = "INSERT INTO requester_login_tb(r_name, r_email, r_password) values('{$rName}', '{$rEmail}', '{$rPass}')";
    
            if ($conn->query($sql)) {
                $msg = "<div class='alert alert-success alert-dismissible fade show' role='alert'>Account Created Successfully
                    <button type='button' class='btn-close' data-bs-dismiss = 'alert' aria-label='close'></button>
                </div>";
            } else {
                $msg = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>Unable to Create Account
                    <button type='button' class='btn-close' data-bs-dismiss = 'alert' aria-label='close'></button>
                </div>";
            }
        }

    }
}

?>

<!-- Start Registration form -->
<div class="container" id="registration" style="padding-top: 100px;">
    <h2 class="text-center">Create an Account</h2>
    <div class="row my-4">
        <div class="col-md-6 offset-md-3">
            <form action="" method="post" class="p-5 bg-dark bg-gradient rounded" style="box-shadow: 7px 6px 12px -2px black;" autocomplete="off">
            <?php if(isset($msg)){echo $msg;} ?>
                <div class="form-group my-4">
                    <i class="fas fa-user text-primary"></i><label class="ps-2 mb-2 fw-bold text-light" for="fname">Name</label>
                    <input class="form-control" type="text" name="rName" id="" placeholder="Name">
                </div>
                <div class="form-group my-3">
                    <i class="fas fa-envelope text-success"></i><label class="ps-2 mb-2 fw-bold text-light" for="fname">Email</label>
                    <input class="form-control" type="text" name="rEmail" id="" placeholder="Email">
                    <small class="form-text" style="font-size: 12px;">We'll Never share your email with anyone else.</small>
                </div>
                <div class="form-group my-3">
                    <i class="fas fa-key text-danger"></i><label class="ps-2 mb-2 fw-bold text-light" for="fname">Password</label>
                    <input class="form-control" type="password" name="rPass" id="" placeholder="Password" autocomplete="off">
                </div>

                <div class="form-Group mt-5">
                    <input class="btn btn-warning d-block w-100" type="submit" value="Sign Up" name="rSignUp">
                    <small class="form-text fst-italic" style="font-size: 12px;">Note - By clicking sign up, you agree to our terms, data and cookie policy.</small>
                </div>
            </form>
        </div>
    </div>
</div><!-- End Registration form -->

<?php include('footer.php') ?>