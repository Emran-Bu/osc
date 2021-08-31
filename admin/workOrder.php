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
                                <td scope='row'>
                                    <form action='viewAssignWork.php' action='post'>
                                        <input type='hidden' name='viwID' value='{$row['requester_id']}'>
                                        <button class='btn btn-warning' type='submit' name='viewBtn'><i class='far fa-eye'></i></button>
                                    </form>
                                </td>
                            </tr>
                        ";
                    }
                    
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
<!-- footer part -->
<?php include('adminFooter.php'); ?>