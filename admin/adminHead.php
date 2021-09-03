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
    <nav class="navbar navbar-expand bg-info navbar-dark p-0 fixed-top shadow justify-content-sm-start justify-content-center">
        <a class="navbar-brand ms-sm-3 ms-0" href="dashboard.php">OSC</a>
    </nav>

    <!-- Start sidebar container -->
    <div class="container-fluid mt-5">
        <div class="row"> <!-- Start Row -->
            <!-- Start left sidebar -->
            <nav class="col-sm-4 col-xl-2 col-md-3 py-5 bg-light sidebar d-print-none"> <!-- start first col start -->
                <div class="sidebar">
                    <ul class="nav flex-column">
                        <li class="nav-item"><a class="nav-link text-dark adminHover <?php if(PAGE == 'dashboard'){echo 'adminActive';} ?>" href="dashboard.php"><i class="fas fa-tachometer-alt text-warning me-2 fw-bold"></i>Dashboard</a></li>
                        
                        <li class="nav-item"><a class="nav-link text-dark adminHover <?php if(PAGE == 'workOrder'){echo 'adminActive';} ?>" href="workOrder.php"><i class="fab fa-accessible-icon me-2 text-secondary fw-bold"></i>Work Order</a></li>

                        <li class="nav-item"><a class="nav-link text-dark adminHover <?php if(PAGE == 'request'){echo 'adminActive';} ?>" href="request.php"><i class="fas fa-align-center me-2 text-success fw-bold"></i>Requests</a></li>

                        <li class="nav-item"><a class="nav-link text-dark adminHover <?php if(PAGE == 'assets'){echo 'adminActive';} ?>" href="assets.php"><i class="fas fa-database me-2 text-info fw-bold"></i>Assets</a></li>

                        <li class="nav-item"><a class="nav-link text-dark adminHover <?php if(PAGE == 'technician'){echo 'adminActive';} ?>" href="technician.php"><i class="fab fa-teamspeak me-2 text-success fw-bold"></i>Technician</a></li>

                        <li class="nav-item"><a class="nav-link text-dark adminHover <?php if(PAGE == 'requester'){echo 'adminActive';} ?>" href="requester.php"><i class="fas fas fa-users me-2 fw-bold"></i>Requester</a></li>

                        <li class="nav-item"><a class="nav-link text-dark adminHover <?php if(PAGE == 'sellReport'){echo 'adminActive';} ?>" href="sellReport.php"><i class="fas fa-table me-2 text-secondary fw-bold"></i>Sell Report</a></li>

                        <li class="nav-item"><a class="nav-link text-dark adminHover <?php if(PAGE == 'workReport'){echo 'adminActive';} ?>" href="workReport.php"><i class="fas fa-table me-2 text-primary fw-bold"></i>Work Report</a></li>

                        <li class="nav-item"><a class="nav-link text-dark adminHover <?php if(PAGE == 'changePass'){echo 'adminActive';} ?>" href="changePass.php"><i class="fas fa-key me-2 text-danger fw-bold"></i>Change Password</a></li>

                        <li class="nav-item"><a class="nav-link text-dark adminHover" href="../logout.php"><i class="fas fa-sign-out-alt me-2 text-warning fw-bold"></i>Logout</a></li>
                    </ul>
                </div> <!-- End 1st col start -->
            </nav> <!--End left sidebar -->