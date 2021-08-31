<?php
    define('TITLE', 'Service | Status');
    define('PAGE', 'serviceStatus');
    include('../dbConnection.php');
    // session start to login start
    session_start();
    if (isset($_SESSION['is_login'])) {
        $rEmail = $_SESSION['rEmail'];
    } else {
        echo "<script>location.href='../login.php';</script>";
    } // session end to login start
?>
<!-- include header -->
<?php include('headReq.php'); ?>
    <!-- Start Service status Area -->
    <!-- Start Second column -->
    <div class="col-sm-8 col-md-6 py-5">
        <form class="mx-5 d-print-none" action="" method="post">
            <div class="form-group">
                <label class="mb-1" for="checkID">Enter Request ID : </label>
                <input class="form-control mb-2" type="text" name="checkID" id="checkID" onkeypress="isInputNumber(event)" autocomplete="off">
                <button class="btn btn-info" type="submit">Search</button>
            </div>
        </form>
        <?php
            if (isset($_REQUEST['checkID'])) {
                if ($_REQUEST['checkID'] == '') {
                    echo"<div class='alert text-center mx-5 p-1 alert-danger mt-2 alert-dismissible fade show' role='alert'>Fill The Form.
                    <button type='button' class='btn-close p-2' data-bs-dismiss = 'alert' aria-label='close'></button>
                    </div>";
                }else {

                    $sql = "SELECT * FROM assign_work_tb where requester_id = {$_REQUEST['checkID']}";
                    
                    $result = $conn->query($sql);
                    $row = $result->fetch_assoc();

                    if (isset($row['requester_id']) == $_REQUEST['checkID']) { ?>

                    <div class="mx-5 my-5">
                        <h2 class="text-center">Assign Work Details</h2>
                        <table class="table mt-5 table-bordered">
                            <tr>
                                <th>Request ID : </th>
                                <td><?php if(isset($row['requester_id'])){echo $row['requester_id'];} ?></td>
                            </tr>
                            <tr>
                                <th>Request Date : </th>
                                <td><?php if(isset($row['request_date'])){echo $row['request_date'];} ?></td>
                            </tr>
                            <tr>
                                <th>Request Name : </th>
                                <td><?php if(isset($row['assign_name'])){echo $row['assign_name'];} ?></td>
                            </tr>
                            <tr>
                                <th>Request Info : </th>
                                <td><?php if(isset($row['assign_info'])){echo $row['assign_info'];} ?></td>
                            </tr>
                            <tr>
                                <th>Request Description : </th>
                                <td><?php if(isset($row['assign_desc'])){echo $row['assign_desc'];} ?></td>
                            </tr>
                            <tr>
                                <th>Email : </th>
                                <td><?php if(isset($row['assign_email'])){echo $row['assign_email'];} ?></td>
                            </tr>
                            <tr>
                                <th>Mobile : </th>
                                <td><?php if(isset($row['assign_mobile'])){echo $row['assign_mobile'];} ?></td>
                            </tr>
                            <tr>
                                <th>City : </th>
                                <td><?php if(isset($row['assign_city'])){echo $row['assign_city'];} ?></td>
                            </tr>
                            <tr>
                                <th>State : </th>
                                <td><?php if(isset($row['assign_state'])){echo $row['assign_state'];} ?></td>
                            </tr>
                            <tr>
                                <th>Zip : </th>
                                <td><?php if(isset($row['assign_zip'])){echo $row['assign_zip'];} ?></td>
                            </tr>
                            <tr>
                                <th>Address : </th>
                                <td><?php if(isset($row['assign_add1'])){echo $row['assign_add1'];} if(isset($row['assign_add2'])){echo $row['assign_add2'];} ?></td>
                            </tr>
                            <tr>
                                <th>Technician Name : </th>
                                <td><?php if(isset($row['assign_tech'])){echo $row['assign_tech'];} ?></td>
                            </tr>
                            <tr>
                                <th>Assign Date : </th>
                                <td><?php if(isset($row['assign_date'])){echo $row['assign_date'];} ?></td>
                            </tr>
                        </table>
                        <div class="mt-4 text-end d-print-none">
                            <input type="submit" value="Print" class="btn btn-danger" onclick="window.print()">
                            <a href="serviceStatus.php" class="btn btn-secondary">Close</a>
                        </div>
                    </div>
                    <?php
                    } else {
                        echo"<div class='alert text-center p-1 mx-5 mt-2 alert-info alert-dismissible fade show' role='alert'>Your Request Is Still Pending.
                        <button type='button' class='btn-close p-2' data-bs-dismiss = 'alert' aria-label='close'></button>
                        </div>";
                    }
                    
                }
            }
        ?>
        
    </div> <!-- End Second column -->
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
    <!-- End Service status Area -->
<!-- include footer -->
<?php include('footerReq.php'); ?>