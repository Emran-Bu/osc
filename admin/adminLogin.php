<?php

    include('../dbConnection.php');
    session_start();
    if(!isset($_SESSION['is_adminLogin'])){
        if(isset($_REQUEST['aemail'])){
            if($_REQUEST['aemail']=="" or $_REQUEST['apassword']==""){
                $msg = "<div class='alert alert-warning alert-dismissible fade show' role='alert'>All Fields Are Required
                    <button type='button' class='btn-close' data-bs-dismiss = 'alert' aria-label='close'></button>
                </div>";
            } else{
                $aemail = trim($_REQUEST['aemail']);
                $apassword = trim($_REQUEST['apassword']);

                $sql = "SELECT a_email, a_password FROM admin_login_tb WHERE a_email = '$aemail' AND a_password = '$apassword' limit 1";
                $result = $conn->query($sql);
                if ($result->num_rows == 1) {
                    header('location: dashboard.php');
                    // echo "<script>location.href='dashboard.php';</script>";
                    $_SESSION['is_adminLogin'] = true;
                    $_SESSION['aEmail'] = $aemail;
                    // $msg = "<div class='alert alert-success alert-dismissible fade show' role='alert'>Login Successfully
                    //     <button type='button' class='btn-close' data-bs-dismiss = 'alert' aria-label='close'></button>
                    // </div>";
                } else{
                    $msg = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>Enter Valid Email And Password
                        <button type='button' class='btn-close' data-bs-dismiss = 'alert' aria-label='close'></button>
                    </div>";
                }
            }
        }
    } else {
        echo "<script>location.href='dashboard.php';</script>";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- favicon -->
    <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">
    <!-- bootstrap css -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!-- font Awesome css -->
    <link rel="stylesheet" href="../css/all.min.css">
    <!-- Google Font Ubuntu -->
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300&display=swap" rel="stylesheet">
    <!-- Custom css -->
    <link rel="stylesheet" href="../css/style.css">
    <title>Login</title>
</head>
<body>

    <div class="mt-5 mb-3 text-center" style="font-size: 30px;">
        <i class="fas fa-stethoscope"></i>
        <span>Online Service Center</span>
    </div>
    <p class="text-center" style="font-size: 20px;"><i class="fa fa-user-secret text-danger me-2"></i>Admin Login Area (Demo)</p>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-4">
                <?php if(isset($msg)){echo $msg;} ?>
                <form class="mt-5 shadow-lg p-4" action="" method="post">

                    <div class="form-group">
                        <i class="fas fa-envelope me-2 text-primary"></i><label class="fw-bold" for="aemail">Email</label>
                        <input class="form-control" type="aemail" name="aemail" id="aemail">
                        <small class="form-text" style="font-size: 12px;">We'll Never share your email with anyone else.</small>
                    </div>

                    <div class="form-group mt-3">
                        <i class="fas fa-key me-2 text-danger"></i><label class="fw-bold" for="apassword">Password</label>
                        <input class="form-control" type="password" name="apassword" id="apassword">
                    </div>

                    <button type="submit" class="mt-3 w-100 btn btn-sm btn-outline-primary fw-bold shadow-sm" name="asubmit">Login</button>

                </form>

                <div class="text-center mt-5">
                    <a class="btn btn-warning shadow-sm" href="../index.php">Back to Home</a>
                </div>
            </div>
        </div>
    </div>
    

    <!-- JQuery Plugin -->
    <script src="../js/jquery-3.5.1.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="../js/bootstrap.bundle.min.js"></script>
    <!-- Font Awesome JS -->
    <script src="../js/all.min.js"></script>
</body>
</html>