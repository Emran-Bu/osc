<?php include('head.php') ?>

<!-- End Navigation -->

    <!-- Start header -->
    <header class="back-image">

        <div class="headerPos">
            <div class="headerDiv">
                <h1 class="text-uppercase fw-bold">Welcome to OSC</h1>
                <p class="fst-italic">Customer's Happiness is Our Aim</p>
                <a class="btn btn-primary me-4" href="login.php">Login</a>
                <a class="btn btn-danger" href="registration.php">Sign Up</a>
            </div>
        </div>

    </header> <!-- End header -->

    <!-- Introduction Part -->
    <div class="container mt-5">
        <div class="introBg p-5">
            <h3 class="text-center fw-bold mb-3">OSC Services</h3>
            <p class="container">OSC Services is Bangladesh leading chain of multi-brand Electronics and Electrical service workshops offering wide array of services. We focus on enhancing your uses experience by offering world-class Electronic Appliances maintenance services. Our sole mission is “To provide Electronic Appliances care services to keep the devices fit and healthy and customers happy and smiling”. With well-equipped Electronic Appliances service centres and fully trained mechanics, we provide quality services with excellent packages that are designed to offer you great savings. Our state-of-art workshops are conveniently located in many cities across the country. Now you can book your service online by doing Registration.</p>
        </div>
    </div> <!-- End Introduction Part -->

    <!-- start services section -->
    <div class="container text-center mt-5 border-bottom" id="services">
        <h2 class="mb-2">Our Services</h2>
        <div class="row mt-4 mb-4">
            <div class="col-sm-4 mt-sm-0 mt-4">
                <a href="#"><i class="fa fa-tv fa-8x"></i></a>
                <h4 class="mt-4">Electronic Appliances</h4>
            </div>
            <div class="col-sm-4 mt-sm-0 mt-4">
                <a href="#"><i class="fa fa-sliders-h fa-8x text-success"></i></a>
                <h4 class="mt-4">Preventive Maintenance</h4>
            </div>
            <div class="col-sm-4 mt-sm-0 mt-4">
                <a href="#"><i class="fa fa-cogs fa-8x text-secondary"></i></a>
                <h4 class="mt-4">Fault Repair</h4>
            </div>
        </div>
    </div><!-- End services section -->

    <!-- Start Registration form -->
        <?php include('userReg.php') ?>
    <!-- End Registration form -->

    <!-- start happy client section -->
    <div class="bg-success p-5 mt-5">
        <div class="container">
            <h2 class="text-center text-light fw-bold">Happy Customers</h2>
            <div class="row mt-5">
                <div class="col-lg-3 col-md-6"> <!-- start 1st col -->
                    <div class="card shadow mb-2">
                        <div class="card-body text-center">
                            <img class="rounded-circle img-fluid" src="images/man-1.jpg" alt="man-1" style="height:150px ;width:150px">
                            <h4 class="card-title text-primary">Rahul Khan</h4>
                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quasi reprehenderit nulla aliquid.</p>
                        </div>
                    </div>
                </div> <!-- end 1st col -->
                <div class="col-lg-3 col-md-6"> <!--Start 2nd col -->
                    <div class="card shadow mb-2">
                        <div class="card-body text-center">
                            <img class="rounded-circle img-fluid" src="images/man-2.jpg" alt="man-2" style="height:150px ;width:150px">
                            <h4 class="card-title text-warning">Riyana Akter</h4>
                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quasi reprehenderit nulla aliquid.</p>
                        </div>
                    </div>
                </div> <!--end 2nd col -->
                <div class="col-lg-3 col-md-6"> <!--Start 3rd col -->
                    <div class="card shadow mb-2">
                        <div class="card-body text-center">
                            <img class="rounded-circle img-fluid" src="images/Untitled-2.jpg" alt="Untitled-2" style="height:150px ;width:150px">
                            <h4 class="card-title text-info">Emran Hasan</h4>
                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quasi reprehenderit nulla aliquid.</p>
                        </div>
                    </div>
                </div> <!--end 3rd col -->
                <div class="col-lg-3 col-md-6"> <!--Start 4th col -->
                    <div class="card shadow">
                        <div class="card-body text-center">
                            <img class="rounded-circle img-fluid" src="images/man-4.jpg" alt="man-4" style="height:150px ;width:150px">
                            <h4 class="card-title text-secondary">Sunayna Sarker</h4>
                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quasi reprehenderit nulla aliquid.</p>
                        </div>
                    </div>
                </div> <!--end 4th col -->
            </div>
        </div>
    </div> <!-- End happy client section -->

    <!-- start contact part -->
       <?php include('contactForm.php') ?>
    <!-- End contact part -->

    <!-- start footer -->
    <footer class="bg-dark mt-5 py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center text-md-start"> <!-- 1st media col start -->
                    <span class="text-light">Follow us : </span>
                    <a href="#" target="_blank"><i class="fab fa-facebook text-warning ms-2 mediaHover"></i></a>
                    <a href="#" target="_blank"><i class="fab fa-twitter text-warning ms-2 mediaHover"></i></a>
                    <a href="#" target="_blank"><i class="fab fa-youtube text-warning ms-2 mediaHover"></i></a>
                    <a href="#" target="_blank"><i class="fab fa-google-plus-g text-warning ms-2 mediaHover"></i></a>
                    <a href="#" target="_blank"><i class="fas fa-rss text-warning ms-2 mediaHover"></i></a>
                </div> <!-- 1st media col end-->

                <div class="col-md-6 text-center text-md-end"> <!-- 2nd col start -->
                    <small class="text-light">Designed by &copy; Emran Hasan</small>
                    <small class="ms-2"><a class="text-warning mediaHover" href="admin/adminLogin.php">Admin Login</a></small>
                </div> <!-- 2nd col end -->
            </div>
        </div>
    </footer>
    <!-- end footer -->

    <!-- JQuery Plugin -->
    <script src="js/jquery-3.5.1.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="js/bootstrap.bundle.min.js"></script>
    <!-- Font Awesome JS -->
    <script src="js/all.min.js"></script>
</body>
</html>