<?php

    define('TITLE', 'Sell | Product');
    define('PAGE', 'assets');
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
    
    $sql = "SELECT * FROM sell_product_tb where s_c_id = {$_SESSION['myId']}";

    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        echo "<div class='mt-5 col-sm-6 col-xl-8 col-md-7'>
            <table class='table table-bordered table-striped mx-md-5 mx-sm-3'>
                <h3 class='mb-3 text-center'>Customer Bill</h3>
                <tbody>
                    <tr>
                        <th>Customer ID : </th>
                        <td>{$row['s_c_id']}</td>
                    </tr>
                    <tr>
                        <th>Customer Name : </th>
                        <td>{$row['s_c_name']}</td>
                    </tr>
                    <tr>
                        <th>Customer Address : </th>
                        <td>{$row['s_c_add']}</td>
                    </tr>

                    <tr>
                        <th>Customer Mobile : </th>
                        <td>{$row['s_c_mobile']}</td>
                    </tr>
                    <tr>
                        <th>Product Name : </th>
                        <td>{$row['s_p_name']}</td>
                    </tr>

                    <tr>
                        <th>Product Quantity : </th>
                        <td>{$row['s_p_quan']}</td>
                    </tr>
                    <tr>
                        <th>Product Each Price : </th>
                        <td>{$row['s_p_each_price']}</td>
                    </tr>
                    <tr>
                        <th>Product Total Price : </th>
                        <td>{$row['s_p_total_price']}</td>
                    </tr>
                    <tr>
                        <th>Selling Date : </th>
                        <td>{$row['s_p_date']}</td>
                    </tr>
                    <tr>
                        <th>Customer Signs : </th>
                        <td></td>
                    </tr>
                    <tr>
                        <th>Author Signs : </th>
                        <td></td>
                    </tr>
                    
                </tbody>
            </table>

            <div class='d-print-none mx-5 text-end my-5'>
                <form class=''>
                    <input class='btn btn-danger' type='submit' value='Print' onclick='window.print()'>
                    <a class='btn btn-secondary ms-3' href='assets.php'>Close</a>
                </form>
            </div>
        
        </div>";
    } else {
        echo "<h1>Failed.</h1>";
    }
}
    include('adminFooter.php');

?>