<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrap link -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!-- font awesome link -->
    <link rel="stylesheet" href="../css/all.min.css">
    <!-- Google Font Ubuntu -->
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300&display=swap" rel="stylesheet">
    <!-- Custom link -->
    <link rel="stylesheet" href="../css/style.css">
    <title><?php echo TITLE ?></title>
</head>
<body>

    <!-- Topnav -->
    <nav class="navbar navbar-expand bg-primary navbar-dark p-0 fixed-top shadow justify-content-sm-start justify-content-center">
        <a class="navbar-brand ms-sm-3 ms-0" href="profile.php">OSC</a>
    </nav>

    <!-- Start sidebar container -->
    <div class="container-fluid mt-5">
        <div class="row"> <!-- Start Row -->
            <!-- Start left sidebar -->
            <nav class="col-sm-4 col-xl-2 col-md-3 py-5 bg-light sidebar d-print-none"> <!-- start first col start -->
                <div class="sidebar">
                    <ul class="nav flex-column">
                        <li class="nav-item"><a class="nav-link text-dark <?php if(PAGE == 'profile'){echo 'active';} ?>" href="profile.php"><i class="fas fa-user me-2 fw-bold"></i>Profile</a></li>
                        
                        <li class="nav-item"><a class="nav-link text-dark <?php if(PAGE == 'submitReq'){echo 'active';} ?>" href="submitReq.php"><i class="fab fa-accessible-icon me-2 text-secondary fw-bold"></i>Submit Request</a></li>

                        <li class="nav-item"><a class="nav-link text-dark <?php if(PAGE == 'serviceStatus'){echo 'active';} ?>" href="serviceStatus.php"><i class="fas fa-align-center me-2 text-success fw-bold"></i>Service Status</a></li>

                        <li class="nav-item"><a class="nav-link text-dark <?php if(PAGE == 'changePass'){echo 'active';} ?>" href="changePass.php"><i class="fas fa-key me-2 text-danger fw-bold"></i>Change Password</a></li>

                        <li class="nav-item"><a class="nav-link text-dark" href="logout.php"><i class="fas fa-sign-out-alt me-2 text-warning fw-bold"></i>Logout</a></li>
                    </ul>
                </div> <!-- End 1st col start -->
            </nav> <!--End left sidebar -->