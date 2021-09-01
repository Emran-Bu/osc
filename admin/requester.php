<?php
    // title define and Page define for active class in sidebar
    define('TITLE', 'Admin | Requester');
    define('PAGE', 'requester');
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
<!-- Start requester part -->

<!-- start 2nd column requester -->
    <div class="col-sm-8 col-xl-10 col-md-9 py-5 text-center">
        <div class="mx-5">
            <p class="text-light bg-dark p-2">List Of Requesters</p>
            <table class="table">
                <thead>
                    <tr>
                        <th>Req ID.</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $sql="SELECT * FROM requester_login_tb";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {?>


                        <tr>
                            <td><?= $row['r_id']; ?></td>
                            <td><?= $row['r_name']; ?></td>
                            <td><?= $row['r_email']; ?></td>
                            <td class="d-flex align-items-center justify-content-center">
                                <form class='me-1' action='editRequester.php' method='post'>
                                    <input type='hidden' name='editID' value='<?= $row['r_id']; ?>'>
                                    <button class='btn btn-warning' type='submit' name='viewBtn'><i class='fas fa-edit'></i></button>
                                </form>

                                <form action='' method='post'>
                                    <input type='hidden' name='deleteID' value='<?= $row['r_id']; ?>'>
                                    <button class='btn btn-danger' type='button' name='delete' data-bs-toggle='modal' data-bs-target='#user<?= $row['r_id']; ?>'><i class='far fa-trash-alt'></i></button>
                                </form>
                            </td>
                        </tr>


    <!-- start delete Modal part -->

    <div class="modal fade" id="user<?php if(isset($row['r_id'])){echo $row['r_id'];}?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Delete Requester ID <?php if(isset($row['r_id'])){echo "(" . $row['r_id'] . ")";}?></h5>
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
                <input type='hidden' value='<?php echo $row['r_id']; ?>' name='deleteID'>
                <input type='submit' value='Yes' name='deleteBtn' class='btn btn-danger btn-sm'>
            </form>
            <!-- <a class="btn btn-danger" href="">Yes</a> -->
            </div>
        </div>
        </div>
    </div>
    
    <!-- end delete Modal part -->

                    <?php            
                            }
                        } else {
                            echo '<div class="col-sm-6 text-center bg-danger rounded-3 text-light p-3">
                                No Requesters Found.
                            </div>';
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <?php // start delete query part
    
    if (isset($_REQUEST['deleteBtn'])) {
        $sql="DELETE FROM requester_login_tb where r_id = {$_REQUEST['deleteID']}";
        
        if ($conn->query($sql) == true) {
            echo '<div class="col-sm-6 col-md-5 col-xl-3 alert alert-success alert-dismissible fade show" role="alert" style="position: fixed; right: 10px; top: 10%; z-index: 1;">
            <span class="me-2" id="counter"></span>
                Request Id (' . "{$_REQUEST['deleteID']}" . ') Deleted Successfully.
                <button type="button" class="btn-close btn-sm" data-bs-dismiss="alert" aria-label="Close">
                </button>
            </div>';

            echo '<meta http-equiv="refresh" content="0; url=?closed">';
        } else {
            echo '<div class="col-sm-6 col-md-5 col-xl-3 alert alert-danger alert-dismissible fade show" role="alert" style="position: fixed; right: 10px; top: 10%; z-index: 1;">
            <span class="me-2" id="counter"></span>
                Unable to Request Id (' . "{$_REQUEST['deleteID']}" . ') Deleted.
                <button type="button" class="btn-close btn-sm" data-bs-dismiss="alert" aria-label="Close">
                </button>
            </div>';
            } 
        }
    ?>  <!-- End delete query part -->

<!-- end 2nd column requester -->

<!-- End requester part -->
    
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
            counter.innerHTML = count;
            counter.style.color = "blue";

        }, 1000);
    </script> <!--End Alert box script-->

<!-- back to row div for insert data in table Therefore direct footer part adjust -->
<!-- footer part -->
</div> <!-- End Row -->
        <div class="float-end mx-5 my-3">
            <form action="insertReq.php" method="post">
                <button class="btn btn-info">
                    <i class="fas fa-plus fa-2x text-light"></i>
                </button>
            </form>
        </div>
    </div> <!-- End left sidebar container -->

    <!-- jquery link -->
    <script src="../js/jquery-3.5.1.min.js"></script>
    <!-- bootstrap link -->
    <script src="../js/bootstrap.bundle.min.js"></script>
    <!-- font awesome link -->
    <script src="../js/all.min.js"></script>
    
</body>
</html>