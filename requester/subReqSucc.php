<?php

    define('TITLE', 'Submit | Success');
    define('PAGE', 'submitReq');
    include('headReq.php');
    include('../dbConnection.php');
    // session start to login start
    session_start();
    if (isset($_SESSION['is_login'])) {
        $rEmail = $_SESSION['rEmail'];
    } else {
        echo "<script>location.href='../login.php';</script>";
    } // session end to login start

    if (isset($_SESSION['myId'])) {
    
    $sql = "SELECT * FROM submit_requester_tb where requester_id = {$_SESSION['myId']}";

    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        echo "<div class='mt-5 col-sm-6 col-xl-8 col-md-7'>
            <table class='table mx-md-5 mx-sm-3'>
                <tbody>
                    <tr>
                        <th>Request ID : </th>
                        <td>{$row['requester_id']}</td>
                    </tr>
                    <tr>
                        <th>Request Date : </th>
                        <td>{$row['requester_date']}</td>
                    </tr>
                    <tr>
                        <th>Name : </th>
                        <td>{$row['requester_name']}</td>
                    </tr>

                    <tr>
                        <th>Request Info : </th>
                        <td>{$row['requester_info']}</td>
                    </tr>
                    <tr>
                        <th>Request Desc : </th>
                        <td>{$row['requester_desc']}</td>
                    </tr>

                    <tr>
                        <th>Email ID : </th>
                        <td>{$row['requester_email']}</td>
                    </tr>
                    <tr>
                        <th>Mobile No : </th>
                        <td>{$row['requester_mobile']}</td>
                    </tr>
                    <tr>
                        <th>Request City : </th>
                        <td>{$row['requester_city']}</td>
                    </tr>
                    <tr>
                        <th>Request State : </th>
                        <td>{$row['requester_state']}</td>
                    </tr>
                    <tr>
                        <th>Request Zip : </th>
                        <td>{$row['requester_zip']}</td>
                    </tr>
                    <tr>
                        <th>Request Address : </th>
                        <td>{$row['requester_add1']} {$row['requester_add2']}</td>
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
    include('footerReq.php');

?>