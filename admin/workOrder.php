<?php
    // title define and Page define for active class in sidebar
    define('TITLE', 'Admin | workOrder');
    define('PAGE', 'workOrder');
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
<!-- Start workOrder part -->
<?php
    // start delete query part
    if (isset($_REQUEST['deleteBtn'])) {
        $sql="DELETE FROM assign_work_tb where requester_id = {$_REQUEST['deleteID']}";
        
        if ($conn->query($sql) == true) {
            echo '<div class="col-sm-6 col-md-5 col-xl-3 alert alert-success alert-dismissible fade show" role="alert" style="position: fixed;right: 10px; top: 10%; z-index: 1;">
            <span class="me-2" id="counter" ></span>
                Request Id (' . "{$_REQUEST['deleteID']}" . ') Deleted Successfully.
                <button type="button" class="btn-close btn-sm" data-bs-dismiss="alert" aria-label="Close">
                </button>
            </div>';

            echo '<meta http-equiv="refresh" content="0; url=?closed">';
        } else {
            echo '<div class="col-sm-6 col-md-5 col-xl-3 alert alert-danger alert-dismissible fade show" role="alert" style="position: fixed;right: 10px; top: 10%; z-index: 1;">
            <span class="me-2" id="counter" ></span>
                Unable to Request Id (' . "{$_REQUEST['deleteID']}" . ') Deleted.
                <button type="button" class="btn-close btn-sm" data-bs-dismiss="alert" aria-label="Close">
                </button>
            </div>';
        } // End delete query part
    }
?>

<!-- Start 2nd column workOrder part -->
    <div class="col-sm-8 col-xl-10 col-md-9 py-5">
    <?php
        $sql = "SELECT * FROM assign_work_tb";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            echo"
                <table class='table'>
                    <thead>
                        <tr>
                            <th scope='col'>Req ID</th>
                            <th scope='col'>Req Name</th>
                            <th scope='col'>Req Info</th>
                            <th scope='col'>Req Date</th>
                            <th scope='col'>Req Mobile</th>
                            <th scope='col'>Req City</th>
                            <th scope='col'>Tech Name</th>
                            <th scope='col'>Assign Date</th>
                            <th scope='col'>Action</th>
                        </tr>
                    </thead>
                    <tbody>";
                    while ($row = $result->fetch_assoc()) {
                        echo"
                            <tr>
                                <td scope='row'>{$row['requester_id']}</td>
                                <td scope='row'>{$row['assign_name']}</td>
                                <td scope='row'>{$row['assign_info']}</td>
                                <td scope='row'>{$row['request_date']}</td>
                                <td scope='row'>{$row['assign_mobile']}</td>
                                <td scope='row'>{$row['assign_city']}</td>
                                <td scope='row'>{$row['assign_tech']}</td>
                                <td scope='row'>{$row['assign_date']}</td>
                                <td scope='row' class='d-flex'>
                                    <form class='me-1' action='viewAssignWork.php' method='post'>
                                        <input type='hidden' name='viewID' value='{$row['requester_id']}'>
                                        <button class='btn btn-warning' type='submit' name='viewBtn'><i class='far fa-eye'></i></button>
                                    </form>

                                    <form action='' method='post'>
                                        <input type='hidden' name='deleteID' value='{$row['requester_id']}'>
                                        <button class='btn btn-danger' type='button' name='delete' data-bs-toggle='modal' data-bs-target='#user{$row['requester_id']}'><i class='far fa-trash-alt'></i></button>
                                    </form>
                                </td>
                            </tr>
                        "; ?>

    <!-- start delete Modal part -->

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
                <input type='hidden' value='<?php echo $row['requester_id']; ?>' name='deleteID'>
                <input type='submit' value='Yes' name='deleteBtn' class='btn btn-danger btn-sm'>
            </form>
            <!-- <a class="btn btn-danger" href="">Yes</a> -->
            </div>
        </div>
        </div>
    </div>
    
    <!-- end delete Modal part -->

                   <?php }
                    
            echo"</tbody>
                </table>
            ";
        } else {
            echo"<div class='alert text-center p-1 mx-5 mt-2 alert-danger alert-dismissible fade show' role='alert'>No Record Found.
                <button type='button' class='btn-close p-2' data-bs-dismiss = 'alert' aria-label='close'></button>
            </div>";
        }

    ?>
    </div>
<!-- End 2nd column workOrder part -->

<!-- End workOrder part -->

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

<!-- footer part -->
<?php include('adminFooter.php'); ?>