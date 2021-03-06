<?php
    // title define and Page define for active class in sidebar
    define('TITLE', 'Admin | Dashboard');
    define('PAGE', 'dashboard');
    // database connection
    include('../dbConnection.php');
    // start login session
    session_start();
    if (isset($_SESSION['is_adminLogin'])) {
        // $_SESSION['aEmail'] = $aemail;
    } else {
        echo "<script>location.href='adminLogin.php';</script>";
    } // end login session

    // start submit request show data
    $sql = "SELECT max(requester_id) FROM submit_requester_tb";
    $result = $conn->query($sql);
    $row = $result->fetch_row();
    $totalSubReq = $row[0];
    // end submit request show data

    // start assign request show data
    $sql = "SELECT max(requester_id) FROM assign_work_tb";
    $result = $conn->query($sql);
    $row = $result->fetch_row();
    $totalSubAssign = $row[0];
    // end assign request show data

    // start Technician show data
    $sql = "SELECT * FROM technician_tb";
    $result = $conn->query($sql);
    $totalTech = $result->num_rows;
    // end Technician show data

?>

<!-- header part -->
<?php include('adminHead.php'); ?>
<!-- Start dashboard part -->
    <div class="col-sm-8 col-xl-10 col-md-9 py-5"> <!-- Start dashboard 2nd column -->
        <div class="row mx-5"> <!-- start first row -->
            <div class="col-md-4 col-12">
                <div class="card text-light text-center bg-primary mb-3">
                    <div class="card-header">Requests Received</div>
                    <div class="card-body">
                        <div class="card-title"><?= $totalSubReq ?></div>
                        <a class="btn text-light" href="request.php">View</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-12">
                <div class="card text-light text-center bg-success mb-3">
                    <div class="card-header">Assigned Work</div>
                    <div class="card-body">
                        <div class="card-title"><?= $totalSubAssign ?></div>
                        <a class="btn text-light" href="workOrder.php">View</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-12">
                <div class="card text-light text-center bg-warning mb-3">
                    <div class="card-header">No. of Technician</div>
                    <div class="card-body">
                        <div class="card-title"><?= $totalTech ?></div>
                        <a class="btn text-light" href="technician.php">View</a>
                    </div>
                </div>
            </div>
        </div> <!-- End first row -->
        <!-- Start Request List part -->
        <div class="mx-5 mt-5 text-center">
            <p class="bg-secondary text-light p-2">List Of Request</p>
            <?php
                $sql = "SELECT * FROM requester_login_tb";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    echo "
                        <table class='table'>
                            <thead>
                                <tr>
                                    <th scop='col'>Request ID</th>
                                    <th scop='col'>Name</th>
                                    <th scop='col'>Email</th>   
                                </tr> 
                            </thead> <thead>";

                            while ($row = $result->fetch_assoc()) {
                                echo "
                                <tr>
                                    <td>{$row['r_id']}</td>
                                    <td>{$row['r_name']}</td>
                                    <td>{$row['r_email']}</td>
                                </tr>";
                            }      
                    echo "</thead> </table>";
                } else {
                    echo "<h1>No record found</h1>";
                }
                
            ?>
        </div>
        <!-- End Request List part -->
    </div> <!-- End dashboard 2nd column -->
<!-- End dashboard part -->
<!-- footer part -->
<?php include('adminFooter.php'); ?>