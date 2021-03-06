<?php

    if (isset($_REQUEST['cSubmit'])) {
        # Checking for empty fields
        if (($_REQUEST['cName'] == "") || ($_REQUEST['cSubject'] == "") || ($_REQUEST['cEmail'] == "") || ($_REQUEST['cMessage'] == "")) {
            $msg = "<div class='alert mt-2 text-center alert-danger alert-dismissible fade show' role='alert'>All Fields Are Required.
                <button type='button' class='btn-close' data-bs-dismiss = 'alert' aria-label='close'></button>
            </div>";
            echo "<script>location.href = 'http://localhost/osc/index.php#contact'</script>";
        } else {
            $c_name = $_REQUEST['cName'];
            $c_subject = $_REQUEST['cSubject'];
            $c_email = $_REQUEST['cEmail'];
            $c_message = $_REQUEST['cMessage'];

            $mailTo = "mdemranhasan809@gmail.com";
            $headers = "From: ". $c_email;
            $txt = "You have received an email from " . $c_name . ".\n\n" . $c_message;
            mail($mailTo, $c_subject, $txt, $headers);

            $msg = "<div class='alert mt-2 text-center alert-success alert-dismissible fade show' role='alert'>Sent Successfully.
                <button type='button' class='btn-close' data-bs-dismiss = 'alert' aria-label='close'></button>
            </div>";
            echo "<script>location.href = 'http://localhost/osc/index.php#contact'</script>";
        }
    }

?>

<!-- start contact part -->
<div class="container my-5" id="contact">
        <h2 class="text-center mb-4">Contact Us</h2>
        <div class="row">
            <div class="col-md-8"> <!-- 1st col form start -->
                <form action="" method="post" class="p-5 shadow">
                <?php if (isset($msg)) {echo $msg;} ?>
                    <div class="form-group my-4">
                        <i class="fas fa-user text-primary"></i><label class="ps-2 mb-2 fw-bold" for="cname">Name</label>
                        <input class="form-control" type="text" name="cName" id="" placeholder="Name">
                    </div>
                    <div class="form-group my-4">
                        <i class="fas fa-book text-info"></i><label class="ps-2 mb-2 fw-bold" for="csubject">Subject</label>
                        <input class="form-control" type="text" name="cSubject" id="" placeholder="Subject">
                    </div>
                    <div class="form-group my-3">
                        <i class="fas fa-envelope text-success"></i><label class="ps-2 mb-2 fw-bold" for="cname">Email</label>
                        <input class="form-control" type="email" name="cEmail" id="" placeholder="Email">
                        <small class="form-text" style="font-size: 12px;">We'll Never share your email with anyone else.</small>
                    </div>
                    <div class="form-group my-3">
                        <i class="fas fa-pen text-danger"></i><label class="ps-2 mb-2 fw-bold" for="cmessage">About Your Need</label>
                        <textarea  class="form-control" name="cMessage" id="" cols="30" rows="5" placeholder="How car we help you?"></textarea>
                    </div>

                    <div class="form-Group mt-5">
                        <button type="submit" name="cSubmit" class="btn btn-primary d-block w-100 "><i class="me-2 fas fa-paper-plane"></i>Send</button>
                    </div>
                </form>
            </div> <!--1st col form end -->

            <div class="col-md-4 text-center mt-5"> <!-- 2nd col start side bar -->
                <strong class="text-decoration-underline fs-4">Headquerter</strong><br>
                <label class="text-success fw-bold">OSC pvt Ltd.</label><br>
                <span class="text-info">Address : </span>
                <label>Sector-3, Uttara</label><br>
                <label>Dhaka, Bngladesh.</label><br>
                <span class="text-warning">Phone : </span>
                <label>+8800000000000</label><br>
                <span class="text-secondary">Email : </span>
                <label>osc@admin.com</label><br>
                <span class="text-danger">Website : </span>
                <a href="index.php" target="_blank">www.osc.com</a>
                <br><br>
                <strong class="text-decoration-underline fs-4">Dinajpur Branch</strong><br>
                <label class="text-success fw-bold">OSC pvt Ltd.</label><br>
                <span class="text-info">Address : </span>
                <label>sadar road, Balu bari</label><br>
                <label>Dinajpur, Bngladesh.</label><br>
                <span class="text-warning">Phone : </span>
                <label>+8811111111111</label><br>
                <span class="text-secondary">Email : </span>
                <label>osc@dadmin.com</label><br>
                <span class="text-danger">Website : </span>
                <a href="index.php" target="_blank">www.osc.com</a>
                <br><br>
                <strong class="text-decoration-underline fs-4">Bogura Branch</strong><br>
                <label class="text-success fw-bold">OSC pvt Ltd.</label><br>
                <span class="text-info">Address : </span>
                <label>sadar road, coloni</label><br>
                <label>Bogura, Bngladesh.</label><br>
                <span class="text-warning">Phone : </span>
                <label>+8822222222222</label><br>
                <span class="text-secondary">Email : </span>
                <label>osc@badmin.com</label><br>
                <span class="text-danger">Website : </span>
                <a href="index.php" target="_blank">www.osc.com</a>
            </div> <!-- 2nd col end side bar -->
        </div>
    </div> <!-- End contact part -->