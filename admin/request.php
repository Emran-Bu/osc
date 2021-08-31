<?php
    // title define and Page define for active class in sidebar
    define('TITLE', 'Admin | Request');
    define('PAGE', 'request');
    // database connection
    include('../dbConnection.php');
    // start login session
    session_start();
    if (isset($_SESSION['is_adminLogin'])) {
        // $_SESSION['aEmail'] = $aemail;
    } else {
        echo "<script>location.href='adminLogin.php';</script>";
    } // end login session

?>

<!-- header part -->
<?php include('adminHead.php'); ?>
<!-- Start 1st col request part -->
    <div class="col-sm-8 col-md-4 col-lg-4 py-5">
        <?php  
            $sql = "SELECT requester_id, requester_info, requester_desc, requester_date FROM submit_requester_tb";

            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "
                        <div class='card  mb-5  mx-3'>
                            <div class='card-header'>
                                Requester ID : {$row['requester_id']}
                            </div>

                            <div class='card-body'>
                                <div class='card-title'>
                                    <h5>Request Info: {$row['requester_info']}</h5>
                                </div>
                                <p class='card-text'>{$row['requester_desc']}</p>
                                <p class='card-text'>Request Date : {$row['requester_date']}</p>
                                <div class='float-end'>
                                    <form action='' method='post'>
                                        <input type='hidden' value='{$row['requester_id']}' name='id'>
                                        <input type='submit' value='View' name='view' class='btn btn-success'>
                                        <input type='button' value='Delete' class='btn btn-danger' data-bs-toggle='modal' data-bs-target='#user{$row['requester_id']}'>
                                    </form>
                                </div>
                            </div>
                        </div>
                    ";
                    ?>
        <!-- Start Delete Modal part-->
        <?php #if(isset($_REQUEST['id'])){echo $_REQUEST['id'];}?>
<div class="modal fade" id="user<?php if(isset($row['requester_id'])){echo $row['requester_id'];}?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete Requester ID <?php if(isset($row['requester_id'])){echo "(" . $row['requester_id'] . ")";}?></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body p-0 text-center p-1">
          Are You Sure Permanently Deleted Requester ID?
      <?php //echo $row['std_id'];?>
      </div>
      <div class="modal-footer p-1">
        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
        <!-- <button type="submit" class="btn btn-danger" name='delete' value="Yes">Yes</button> -->
        <form action='' method='post'>
            <input type='hidden' value='<?php echo $row['requester_id']; ?>' name='id'>
            <input type='submit' value='Yes' name='delete' class='btn btn-danger btn-sm'>
        </form>
        <!-- <a class="btn btn-danger" href="">Yes</a> -->
      </div>
    </div>
  </div>
</div> <!-- End Delete Modal part-->
            <?php
                }
            } else {
                echo '<div class="col-sm-6 text-center bg-danger rounded-3 text-light p-3">
                    No Request Found.
                </div>';
            }
            
        ?>
    </div>

<!-- End 1st col request part -->
<!-- start php view data in form -->
    <?php
        // start show data in form
        if (isset($_REQUEST['view'])) {
            $sql = "SELECT * FROM submit_requester_tb where requester_id = {$_REQUEST['id']}";

            $result = $conn->query($sql);
    
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
            }

        //start show assign table data for repeat assign id validation
            $sql1 = "SELECT requester_id, assign_info FROM assign_work_tb where requester_id = {$_REQUEST['id']}";

            $result1 = $conn->query($sql1);

            if ($result1->num_rows > 0) {

                $row1 = $result1->fetch_assoc();
                // echo $row1['assign_info'];
                // echo $row['requester_id'];
            }    
        //End show assign table data for repeat assign id validation 

        } // End show data in form

        // start delete data
        if (isset($_REQUEST['delete'])) {
            $sql = "DELETE FROM submit_requester_tb where requester_id = {$_REQUEST['id']}";
    
            if ($conn->query($sql) == true) {
                echo '<div class="col-sm-6 col-md-5 col-xl-3 alert alert-success alert-dismissible fade show" role="alert" style="position: fixed;right: 10px; top: 10%; z-index: 1;">
                <span class="me-2" id="counter" ></span>
                    Request Id (' . "{$_REQUEST['id']}" . ') Deleted Successfully.
                    <button type="button" class="btn-close btn-sm" data-bs-dismiss="alert" aria-label="Close">
                    </button>
                </div>';

                echo '<meta http-equiv="refresh" content="0; url=?closed">';
            } else {
                echo '<div class="col-sm-6 col-md-5 col-xl-3 alert alert-danger alert-dismissible fade show" role="alert" style="position: fixed;right: 10px; top: 10%; z-index: 1;">
                <span class="me-2" id="counter" ></span>
                    Unable to Request Id (' . "{$_REQUEST['id']}" . ') Deleted.
                    <button type="button" class="btn-close btn-sm" data-bs-dismiss="alert" aria-label="Close">
                    </button>
                </div>';
            } 
        }  // end delete data

        // start submit btn click
        if (isset($_REQUEST['assign'])) {
                         
            # Start Checking for empty fields
            if (($_REQUEST['requestID'] == '') ||($_REQUEST['requestInfo'] == '') || ($_REQUEST['requestDesc'] == '') || ($_REQUEST['requestName'] == '') || ($_REQUEST['requestAdd1'] == '') || ($_REQUEST['requestAdd2'] == '') || ($_REQUEST['requestCity'] == '') || ($_REQUEST['requestState'] == '') || ($_REQUEST['requestZip'] == '') || ($_REQUEST['requestEmail'] == '') || ($_REQUEST['requestMobile'] == '') || ($_REQUEST['requestDate'] == '') || ($_REQUEST['assignTech'] == '') || ($_REQUEST['assignDate'] == '')) {
                echo "<div class='col-sm-6 col-md-5 col-xl-3 alert text-center alert-danger alert-dismissible fade show' role='alert' style='position: fixed;right: 10px;top: 10%px;z-index: 1;'>
                <span class='me-2' id='counter' ></span>    
                All Fields Are Required.
                    <button type='button' class='btn-close btn-sm' data-bs-dismiss = 'alert' aria-label='close'></button>
                </div>";
                # End Checking for empty fields
            } elseif (($_REQUEST['requestID']) === ($_REQUEST['requestid'])) {
                echo "<div class='col-sm-6 col-md-5 col-xl-3 alert text-center alert-danger alert-dismissible fade show' role='alert' style='position: fixed;right: 10px;top: 10%px;z-index: 1;'>
                    <span class='me-2' id='counter' ></span> 
                        Request Assign Already Exists.
                        <button type='button' class='btn-close btn-sm' data-bs-dismiss = 'alert' aria-label='close'></button>
                    </div>";
            } else {
                # start insert data
                $rID = $_REQUEST['requestID'];
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
                $aTech = $_REQUEST['assignTech'];
                $aDate = $_REQUEST['assignDate'];

                $sql = "INSERT INTO assign_work_tb(	requester_id, assign_info, assign_desc, assign_name, assign_add1, assign_add2, assign_city, assign_state, assign_zip, assign_email, assign_mobile, request_date, assign_tech, assign_date) VALUES({$rID} ,'{$rInfo}', '{$rDesc}', '{$rName}', '{$rAdd1}', '{$rAdd2}', '{$rCity}', '{$rState}', {$rZip}, '{$rEmail}', {$rMobile}, '{$rDate}', '{$aTech}', '{$aDate}')";

                if ($conn->query($sql) == true) {
                    $genId = mysqli_insert_id($conn);
                    echo "<div class='col-sm-6 col-md-5 col-xl-3 alert text-center alert-success alert-dismissible fade show' role='alert' style='position: fixed;right: 10px;top: 10%px;z-index: 1;'>
                    <span class='me-2' id='counter' ></span> 
                        Request Assign Successfully.
                        <button type='button' class='btn-close btn-sm' data-bs-dismiss = 'alert' aria-label='close'></button>
                    </div>";
                    $_SESSION['myId'] = $genId;
                    echo "<script>location.href='assignReqSucc.php';</script>";
                } else {
                    echo"<div class='alert text-center p-1 alert-warning alert-dismissible fade show' role='alert'>Unable to Request Assign.
                        <button type='button' class='btn-close btn-sm' data-bs-dismiss = 'alert' aria-label='close'></button>
                    </div>";
                }
                
                # end insert data
            }
            
        }
        // end submit btn click
        // End php update data in assign table

    ?>
<!-- end php view data in form -->
<!-- Start 2nd form col request part -->
    <div class="col-md-5 col-lg-5 col-xl-6 mt-5 mb-5">
        <form class="me-3 rounded-3 p-5 text-light bg-secondary" action="" method="post">
            <h5 class="fs-5 text-center">Assign Work Order Request</h5>

            <div class="form-group mt-2"> <!-- start show assign table data for repeat assign id validation Hidden form-->
                <input class="form-control" type="hidden" name="requestid" id="requestID" value='<?php if(isset($row1['requester_id'])){ echo $row1['requester_id'];}?>' readonly>
            </div> <!-- end show assign table data for repeat assign id validation hidden form -->

            <div class="form-group mt-2"> <!-- Start requester id form -->
                <label class="mb-1" for="requestID">Request ID</label>
                <input class="form-control" type="text" name="requestID" id="requestID" value='<?php if(isset($row['requester_id'])){ echo $row['requester_id'];}?>' readonly>
            </div> <!-- Start requester id form -->

            <div class="form-group"><!-- Start info desc form --> 
                <label class="mb-1" for="">Request Info</label>
                <input class="form-control" type="text" name="requestInfo" id="requestInfo" value='<?php if(isset($row['requester_info'])){ echo $row['requester_info'];}?>'>
            </div>
            <div class="form-group mt-2">
                <label class="mb-1" for="requestDesc">Description</label>
                <input class="form-control" type="text" name="requestDesc" id="requestDesc" value='<?php if(isset($row['requester_desc'])){ echo $row['requester_desc'];}?>'>
            </div>
            <div class="form-group mt-2">
                <label class="mb-1" for="requestName">Name</label>
                <input class="form-control" type="text" name="requestName" id="requestName" value='<?php if(isset($row['requester_name'])){ echo $row['requester_name'];}?>'>
            </div> <!-- End info desc form -->
            <!-- Start Address row form -->
            <div class="row mt-2">
                <div class="form-group col-md-6">
                    <label class="mb-1" for="requestAdd1">Address Line 1</label>
                    <input class="form-control" type="text" name="requestAdd1" id="requestAdd1" value='<?php if(isset($row['requester_add1'])){ echo $row['requester_add1'];}?>'>
                </div>
                <div class="form-group col-md-6">
                    <label class="mb-1" for="requestAdd2">Address Line 2</label>
                    <input class="form-control" type="text" name="requestAdd2" id="requestAdd2" value='<?php if(isset($row['requester_add2'])){ echo $row['requester_add2'];}?>'>
                </div>
            </div> <!-- End Address row form -->
            <!-- Start city state zip row form -->
            <div class="row mt-2">
                <div class="form-group col-md-6">
                    <label class="mb-1" for="requestCity">City</label>
                    <input class="form-control" type="text" name="requestCity" id="requestCity" value='<?php if(isset($row['requester_city'])){ echo $row['requester_city'];}?>'>
                </div>
                <div class="form-group col-md-4">
                    <label class="mb-1" for="requestState">State</label>
                    <input class="form-control" type="text" name="requestState" id="requestState" value='<?php if(isset($row['requester_state'])){ echo $row['requester_state'];}?>'>
                </div>
                <div class="form-group col-md-2">
                    <label class="mb-1" for="requestZip">Zip</label>
                    <input class="form-control" type="text" name="requestZip" id="requestZip" value='<?php if(isset($row['requester_zip'])){ echo $row['requester_zip'];}?>' onkeypress="isInputNumber(event)">
                </div>
            </div> <!-- End city state zip row form -->
            <!-- Start Email Mobile Date row form -->
            <div class="row mt-2 mb-3">
                <div class="form-group col-md-6">
                    <label class="mb-1" for="requestEmail">Email</label>
                    <input class="form-control" type="email" name="requestEmail" id="requestEmail" value='<?php if(isset($row['requester_email'])){ echo $row['requester_email'];}?>'>
                </div>
                <div class="form-group col-md-3">
                    <label class="mb-1" for="requestMobile">Mobile</label>
                    <input class="form-control" type="text" name="requestMobile" id="requestMobile" value='<?php if(isset($row['requester_mobile'])){ echo $row['requester_mobile'];}?>' onkeypress="isInputNumber(event)">
                </div>
                <div class="form-group col-md-3">
                    <label class="mb-1" for="requestDate">Date</label>
                    <input class="form-control" type="date" name="requestDate" id="requestDate" value='<?php if(isset($row['requester_date'])){ echo $row['requester_date'];}?>'>
                </div>
            </div> <!-- End city Mobile date row form -->
            <div class='row mt-2 mb-3'> <!-- start Assign technician name and date row form -->
                <div class="form-group col-md-6">
                    <label class="mb-1" for="assignTech">Assign Technician</label>
                    <input class="form-control" type="text" name="assignTech" id="assignTech" value=''>
                </div>
                <div class="form-group col-md-6">
                    <label class="mb-1" for="assignDate">Assign Date</label>
                    <input class="form-control" type="date" name="assignDate" id="assignDate" value=''>
                </div>
            </div> <!-- End Assign technician name and date row form -->
            <!--start btn -->
            <div class="float-end">
                <button class="btn btn-primary me-2" type="submit" name="assign">Assign</button>
                <button class="btn btn-danger" type="reset" name="requestSubmit">Reset</button>
            </div>
            <!--end btn -->
        </form>
    </div>
<!-- End 2nd form col request part -->
<!--start only number for input tag-->
    <script>
        function isInputNumber(evt){
            var ch = String.fromCharCode(evt.which);
            if (!(/[0-9]/.test(ch))) {
                evt.preventDefault();
            }
        }
    </script>

    <!--Start Alert box script-->
    <script> 
        setTimeout(() => {
            // location.href = 'session.php'
            $('.alert').fadeOut();
        }, 5000);

        let count = 5
        var stop = setInterval(() => {

            if (count <= 0) {
                clearInterval(stop)
                // $('.alert').fadeOut();
            }

            count--
            counter.innerHTML = count
            counter.style.color = "blue"

        }, 1000);
    </script> <!--End Alert box script-->
    <!--start only number for input tag-->
<!-- footer part -->
<?php include('adminFooter.php'); ?>
