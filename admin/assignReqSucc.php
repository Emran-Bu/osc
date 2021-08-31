<?php

    define('TITLE', 'Assign | Success');
    define('PAGE', 'submitReq');
    include('adminHead.php');
    include('../dbConnection.php');
    // start login session
    session_start();
    if (isset($_SESSION['is_adminLogin'])) {
        // $_SESSION['aEmail'] = $aemail;
    } else {
        echo "<script>location.href='adminLogin.php';</script>";
    } // end login session

    if (isset($_SESSION['myId'])) {
    
    $sql = "SELECT * FROM assign_work_tb where assign_id = {$_SESSION['myId']}";

    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        echo "<div class='mt-5 col-sm-6 col-xl-8 col-md-7'>
            <table class='table mx-md-5 mx-sm-3'>
                <tbody>
                    <tr>
                        <th>Assign ID : </th>
                        <td>{$row['assign_id']}</td>
                    </tr>
                    <tr>
                        <th>Request ID : </th>
                        <td>{$row['requester_id']}</td>
                    </tr>
                    <tr>
                        <th>Request Date : </th>
                        <td>{$row['request_date']}</td>
                    </tr>
                    <tr>
                        <th>Name : </th>
                        <td>{$row['assign_name']}</td>
                    </tr>

                    <tr>
                        <th>Request Info : </th>
                        <td>{$row['assign_info']}</td>
                    </tr>
                    <tr>
                        <th>Request Desc : </th>
                        <td>{$row['assign_desc']}</td>
                    </tr>

                    <tr>
                        <th>Email ID : </th>
                        <td>{$row['assign_email']}</td>
                    </tr>
                    <tr>
                        <th>Mobile No : </th>
                        <td>{$row['assign_mobile']}</td>
                    </tr>
                    <tr>
                        <th>Request City : </th>
                        <td>{$row['assign_city']}</td>
                    </tr>
                    <tr>
                        <th>Request State : </th>
                        <td>{$row['assign_state']}</td>
                    </tr>
                    <tr>
                        <th>Request Zip : </th>
                        <td>{$row['assign_zip']}</td>
                    </tr>
                    <tr>
                        <th>Request Address : </th>
                        <td>{$row['assign_add1']} {$row['assign_add2']}</td>
                    </tr>
                    <tr>
                        <th>Technician Name : </th>
                        <td>{$row['assign_tech']}</td>
                    </tr>
                    <tr>
                        <th>Assign Date : </th>
                        <td>{$row['assign_date']}</td>
                    </tr>
                    <tr>
                        <td class='border-bottom-0'>
                            <form class='d-print-none'>
                                <input class='btn btn-danger' type='submit' value='print' onclick='window.print()'>
                            </form>
                        </td>
                    </tr>
                    
                </tbody>
            </table>
        
        </div>";
    } else {
        echo "<h1>Failed.</h1>";
    }
}
    include('adminFooter.php');

?>