<?php
    // title define and Page define for active class in sidebar
    define('TITLE', 'Admin | WorkReport');
    define('PAGE', 'workReport');
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
<!-- Start workReport part -->
<!-- start 2nd column-->
<div class="col-sm-8 col-xl-10 col-md-9 mt-5">
    <form class="d-print-none mx-5" method="post">
        <div class="row">
            <div class="form-group col-md-4 col-lg-3">
                <input class="form-control" type="date" name="start_date" id="start_date">
            </div>
            <div class="col-md-1 col-lg-1 text-center">
                <span class=""> To </span>
            </div>
            <div class="form-group col-md-4 col-lg-3">
                <input class="form-control" type="date" name="end_date" id="end_date">
            </div>
            <div class="form-group col-md-3 col-lg-2 mt-2 mt-md-0">
                <input class="form-control btn btn-secondary" type="submit" name="search_date" id="search_date" value="Search">
            </div>
        </div>
    </form>
    <?php
        if (isset($_REQUEST['search_date'])) {

            $startDate = $_REQUEST['start_date'];
            $endDate = $_REQUEST['end_date'];

            $sql = "SELECT * FROM assign_work_tb WHERE assign_date BETWEEN '$startDate' AND '$endDate'";
        
            $result = $conn->query($sql);
        
            if ($result->num_rows > 0) {
                
                echo "<div class='mt-5'>
                    <table class='table table-bordered table-striped'>
                        <h3 class='mb-3 text-center'>Work Assign Details.</h3>
                        <thead>
                            <tr>
                                <th>Request ID</th>
                                <th>Request Info</th>
                                <th>Name</th>
                                <th>City</th>
                                <th>Mobile</th>
                                <th>Technician</th>
                                <th>Assign Date</th>
                            </tr>
                        </thead>
                        <tbody>";?>
                        <?php
                            while($row = $result->fetch_assoc()){
                            echo "<tr>
                                <td>{$row['requester_id']}</td>
                                <td>{$row['assign_info']}</td>
                                <td>{$row['assign_name']}</td>
                                <td>{$row['assign_city']}</td>
                                <td>{$row['assign_mobile']}</td>
                                <td>{$row['assign_tech']}</td>
                                <td>{$row['assign_date']}</td>
                            </tr>";
                            }
                        ?>
                    <?php
                        echo "</tbody>    
                        
                    </table>
        
                    <div class='d-print-none mx-5 text-end my-5'>
                        <form class=''>
                            <input class='btn btn-danger' type='submit' value='Print' onclick='window.print()'>
                            <a class='btn btn-secondary ms-3' href='workReport.php'>Close</a>
                        </form>
                    </div>
                
                </div>";
            } else {
                echo "<div class='col-sm-4 mt-5 mx-5 alert alert-danger text-center'> No Search Found </div>";
            }
        }
    ?>
</div>
<!-- end 2nd column-->
<!-- End workReport part -->
<!-- footer part -->
<?php include('adminFooter.php'); ?>