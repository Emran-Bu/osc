<?php

    include('dbConnection.php');
    session_start();
    if(!isset($_SESSION['is_login'])){
        if(isset($_REQUEST['lemail'])){
            if($_REQUEST['lemail']=="" or $_REQUEST['lpassword']==""){
                $msg = "<div class='alert alert-warning alert-dismissible fade show' role='alert'>All Fields Are Required
                    <button type='button' class='btn-close' data-bs-dismiss = 'alert' aria-label='close'></button>
                </div>";
            } else{
                $lemail = trim($_REQUEST['lemail']);
                $lpassword = trim($_REQUEST['lpassword']);

                $sql = "SELECT r_email, r_password FROM requester_login_tb WHERE r_email = '$lemail' AND r_password = '$lpassword' limit 1";
                $result = $conn->query($sql);
                if ($result->num_rows == 1) {
                    header('location: requester/profile.php');
                    // echo "<script>location.href='dashboard.php';</script>";
                    $_SESSION['is_login'] = true;
                    $_SESSION['rEmail'] = $lemail;
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
        echo "<script>location.href='requester/profile.php';</script>";
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
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- font Awesome css -->
    <link rel="stylesheet" href="css/all.min.css">
    <!-- Google Font Ubuntu -->
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300&display=swap" rel="stylesheet">
    <!-- Custom css -->
    <link rel="stylesheet" href="css/style.css">
    <title>Login</title>
</head>
<body>

    <div class="mt-5 mb-3 text-center" style="font-size: 30px;">
        <i class="fas fa-stethoscope"></i>
        <span>Online Service Center</span>
    </div>
    <p class="text-center" style="font-size: 20px;"><i class="fa fa-user-secret text-danger me-2"></i>Requester Login Area (Demo)</p>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-4">
                <?php if(isset($msg)){echo $msg;} ?>
                <form class="mt-5 shadow-lg p-4" action="" method="post">

                    <div class="form-group">
                        <i class="fas fa-envelope me-2 text-primary"></i><label class="fw-bold" for="lemail">Email</label>
                        <input class="form-control" type="email" name="lemail" id="lemail">
                        <small class="form-text" style="font-size: 12px;">We'll Never share your email with anyone else.</small>
                    </div>

                    <div class="form-group mt-3">
                        <i class="fas fa-key me-2 text-danger"></i><label class="fw-bold" for="lpassword">Password</label>
                        <input class="form-control" type="password" name="lpassword" id="lpassword">
                    </div>

                    <button type="submit" class="mt-3 w-100 btn btn-sm btn-outline-primary fw-bold shadow-sm" name="lsubmit">Login</button>

                </form>

                <div class="text-center mt-5">
                    <a class="btn btn-warning shadow-sm" href="index.php">Back to Home</a>
                </div>
            </div>
        </div>
    </div>
    

    <!-- JQuery Plugin -->
    <script src="js/jquery-3.5.1.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="js/bootstrap.bundle.min.js"></script>
    <!-- Font Awesome JS -->
    <script src="js/all.min.js"></script>
</body>
</html>