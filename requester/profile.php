<?php
    define('TITLE', 'User | Profile');
    define('PAGE', 'profile');
    include('../dbConnection.php');
    // session start to login start
    session_start();
    if (isset($_SESSION['is_login'])) {
        $rEmail = $_SESSION['rEmail'];
    } else {
        echo "<script>location.href='../login.php';</script>";
    } // session end to login start
    
    // Start show record in form
    $sql = "SELECT r_name, r_email FROM requester_login_tb where r_email = '$rEmail'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $rName = $row['r_name'];
        // $rEmail = $row['r_email'];
    } // end show record in form

    // Start update record form to database
    if (isset($_REQUEST['rName'])) {
        $rNewName = $_REQUEST['rName'];
        if ($rNewName==$rName) {
            $msg = "<div class='alert alert-warning alert-dismissible fade show' role='alert'>Name Already Exits.
                <button type='button' class='btn-close' data-bs-dismiss = 'alert' aria-label='close'></button>
            </div>";
        } elseif ($rNewName=='') {
            $msg = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>Name Fields Are Required.
                <button type='button' class='btn-close' data-bs-dismiss = 'alert' aria-label='close'></button>
            </div>";
        } else {
            $sql = "UPDATE requester_login_tb set r_name = '$rNewName' where r_email = '$rEmail'";
             if ($conn->query($sql) == true) {
                $msg = "<div class='alert alert-success alert-dismissible fade show' role='alert'>Name Updated Successfully.
                    <button type='button' class='btn-close' data-bs-dismiss = 'alert' aria-label='close'></button>
                </div>";
             } else {
                $msg = "<div class='alert alert-warning alert-dismissible fade show' role='alert'> Unable To Name Updated.
                    <button type='button' class='btn-close' data-bs-dismiss = 'alert' aria-label='close'></button>
                </div>";
             }
             
             
        }
    } // End update record form to database

?>

<!-- include header -->
<?php include('headReq.php'); ?>
    <!-- Start Profile Area -->
    <div class="col-sm-6 pt-5"> <!-- 2nd col start -->
        <form class="mx-5" action="" method="post">
        <?php if (isset($msg)) {echo $msg;}?>
            <div class="form-group">
                <label class="fw-50" for="rEmail">Email</label>
                <input class="form-control" type="email" name="rEmail" id="rEmail" value="<?= $rEmail; ?>" readonly>
            </div>
            <div class="form-group mt-3">
                <label class="fw-50" for="rName">Name</label>
                <input class="form-control" type="text" name="rName" id="rName" value="<?= $rName; ?>">
            </div>
            <div class="form-group mt-4">
                <input class="form-control btn btn-warning" type="submit" name="nameUpdate" value="Update" id="nameUpdate">
            </div>
        </form>
        
    </div> <!-- End Profile Area --> <!-- End 2nd col start -->
<!-- include footer -->
<?php include('footerReq.php'); ?>
        