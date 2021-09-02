<?php
    define('TITLE', 'Submit | Request');
    define('PAGE', 'submitReq');
    include('../dbConnection.php');
    // session start to login start
    session_start();
    if (isset($_SESSION['is_login'])) {
        $rEmail = $_SESSION['rEmail'];
    } else {
        echo "<script>location.href='../login.php';</script>";
    } // session end to login start

    // start submit btn click
    if (isset($_REQUEST['requestSubmit'])) {
        # Start Checking for empty fields
        if (($_REQUEST['requestInfo'] == '') || ($_REQUEST['requestDesc'] == '') || ($_REQUEST['requestName'] == '') || ($_REQUEST['requestAdd1'] == '') || ($_REQUEST['requestAdd2'] == '') || ($_REQUEST['requestCity'] == '') || ($_REQUEST['requestState'] == '') || ($_REQUEST['requestZip'] == '') || ($_REQUEST['requestEmail'] == '') || ($_REQUEST['requestMobile'] == '') || ($_REQUEST['requestDate'] == '')) {
            $msg = "<div class='alert text-center p-1 alert-warning alert-dismissible fade show' role='alert'>All Fields Are Required.
                <button type='button' class='btn-close p-2' data-bs-dismiss = 'alert' aria-label='close'></button>
            </div>";
            # End Checking for empty fields
        } else {
            // show already data for table validation
            $sql = "SELECT tech_email FROM technician_tb";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $old_email = $row['tech_email'];
                }
            } // end already data for table validation

            if($tech_email >= $old_email){
                $msg = "<div class='alert text-center alert-danger alert-dismissible fade show' role='alert'>Email ID Already Registered
                    <button type='button' class='btn-close' data-bs-dismiss = 'alert' aria-label='close'></button>
                </div>";
            } else {
                # start insert data
                $rInfo = $_REQUEST['requestInfo'];
                $rDesc = $_REQUEST['requestDesc'];
                $rName = $_REQUEST['requestName'];
                $rAdd1 = $_REQUEST['requestAdd1'];
                $rAdd2 = $_REQUEST['requestAdd2'];
                $rCity = $_REQUEST['requestCity'];
                $rState = $_REQUEST['requestState'];
                $rZip = $_REQUEST['requestZip'];
                $rEmail = $_REQUEST['requestEmail'];
                $rMobile = $_REQUEST['requestMobile'];
                $rDate = $_REQUEST['requestDate'];
    
                $sql = "INSERT INTO submit_requester_tb(requester_info, requester_desc, requester_name, requester_add1, requester_add2, requester_city, requester_state, requester_zip, requester_email, requester_mobile, requester_date) VALUES('{$rInfo}', '{$rDesc}', '{$rName}', '{$rAdd1}', '{$rAdd2}', '{$rCity}', '{$rState}', {$rZip}, '{$rEmail}', {$rMobile}, '{$rDate}')";
    
                if ($conn->query($sql) == true) {
                    $genId = mysqli_insert_id($conn);
                    $msg = "<div class='alert text-center p-1 alert-success alert-dismissible fade show' role='alert'>Request Submitted Successfully.
                        <button type='button' class='btn-close p-2' data-bs-dismiss = 'alert' aria-label='close'></button>
                    </div>";
                    $_SESSION['myId'] = $genId;
                    echo "<script>location.href='subReqSucc.php';</script>";
                } else {
                    $msg = "<div class='alert text-center p-1 alert-warning alert-dismissible fade show' role='alert'>Unable to Submit.
                        <button type='button' class='btn-close p-2' data-bs-dismiss = 'alert' aria-label='close'></button>
                    </div>";
                }
                
                
            } # end insert data
        } 
        
    }
    // end submit btn click

?>
<!-- include header -->
<?php include('headReq.php'); ?>
    <!-- Start Submit Request Area -->
        <div class="col-sm-8 col-xl-10 col-md-9 mt-5">
            <form class="mx-5" action="" method="post">
                    <?php if(isset($msg)){echo $msg;} ?>
                <div class="form-group"> <!-- End info desc form -->
                    <label class="mb-1" for="">Request Info</label>
                    <input class="form-control" type="text" name="requestInfo" id="requestInfo" placeholder="Request Info">
                </div>
                <div class="form-group mt-2">
                    <label class="mb-1" for="requestDesc">Description</label>
                    <input class="form-control" type="text" name="requestDesc" id="requestDesc" placeholder="Write Description ...">
                </div>
                <div class="form-group mt-2">
                    <label class="mb-1" for="requestName">Name</label>
                    <input class="form-control" type="text" name="requestName" id="requestName" placeholder="Your Name">
                </div> <!-- End info desc form -->
                <!-- Start Address row form -->
                <div class="row mt-2">
                    <div class="form-group col-md-6">
                        <label class="mb-1" for="requestAdd1">Address Line 1</label>
                        <input class="form-control" type="text" name="requestAdd1" id="requestAdd1" placeholder="House-No. 123, Road-no. 123">
                    </div>
                    <div class="form-group col-md-6">
                        <label class="mb-1" for="requestAdd2">Address Line 2</label>
                        <input class="form-control" type="text" name="requestAdd2" id="requestAdd2" placeholder="Sector-06, Uttara, Dhaka">
                    </div>
                </div> <!-- End Address row form -->
                <!-- Start city state zip row form -->
                <div class="row mt-2">
                    <div class="form-group col-md-6">
                        <label class="mb-1" for="requestCity">City</label>
                        <input class="form-control" type="text" name="requestCity" id="requestCity" placeholder="Your City Name">
                    </div>
                    <div class="form-group col-md-4">
                        <label class="mb-1" for="requestState">State</label>
                        <input class="form-control" type="text" name="requestState" id="requestState" placeholder="Your State Name">
                    </div>
                    <div class="form-group col-md-2">
                        <label class="mb-1" for="requestZip">Zip</label>
                        <input class="form-control" type="text" name="requestZip" id="requestZip" placeholder="Your Zip Code" onkeypress="isInputNumber(event)">
                    </div>
                </div> <!-- End city state zip row form -->
                <!-- Start Email Mobile Date row form -->
                <div class="row mt-2 mb-3">
                    <div class="form-group col-md-6">
                        <label class="mb-1" for="requestEmail">Email</label>
                        <input class="form-control" type="email" name="requestEmail" id="requestEmail" placeholder="Enter Your Email">
                    </div>
                    <div class="form-group col-md-3">
                        <label class="mb-1" for="requestMobile">Mobile</label>
                        <input class="form-control" type="text" name="requestMobile" id="requestMobile" placeholder="Your Mobile No." onkeypress="isInputNumber(event)">
                    </div>
                    <div class="form-group col-md-3">
                        <label class="mb-1" for="requestDate">Date</label>
                        <input class="form-control" type="date" name="requestDate" id="requestDate">
                    </div>
                </div> <!-- End city Mobile Date row form -->
                <!--start btn -->
                <button class="btn btn-primary" type="submit" name="requestSubmit">Submit</button>
                <button class="btn btn-danger" type="reset" name="requestSubmit">Reset</button>
                <!--end btn -->

            </form>
        </div>
        <!--start only number for input tag-->
        <script>
            function isInputNumber(evt){
                var ch = String.fromCharCode(evt.which);
                if (!(/[0-9]/.test(ch))) {
                    evt.preventDefault();
                }
            }
        </script>
        <!--start only number for input tag-->
    <!-- End Submit Request Area -->
<!-- include footer -->
<?php include('footerReq.php'); ?>