<?php

    require_once("../config/constant.php");
    global $conn;

    if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["update_order"])) {

        $order_id = mysqli_real_escape_string($conn, $_POST["order_id"]);
        $price = mysqli_real_escape_string($conn, $_POST["price"]);
        $qty = mysqli_real_escape_string($conn, $_POST["qty"]);
        $total = $qty * $price;
        $status = mysqli_real_escape_string($conn, $_POST["status"]);
        $customer_name = mysqli_real_escape_string($conn, $_POST["customer_name"]);
        $customer_contact = mysqli_real_escape_string($conn, $_POST["customer_contact"]);
        $customer_email = mysqli_real_escape_string($conn, $_POST["customer_email"]);
        $customer_address = mysqli_real_escape_string($conn, $_POST["customer_address"]);

        $sql = " UPDATE tbl_order SET 
            qty = '$qty',
            total = '$total',
            status = '$status',
            customer_name = '$customer_name',
            customer_contact = '$customer_contact',
            customer_email = '$customer_email',
            customer_address = '$customer_address' WHERE id = $order_id
        ";

        $query = $conn->query($sql);

        if($query == true) {

            $_SESSION["update_failed"] = "<div class='success'>Order Updated Successfully. </div>";
            redirect(SITE_URL_OR_HOME_URL . "admin/manage_order.php");
            exit();
            
        } else {
            
            $_SESSION["update_failed"] = "<div class='error'>Failed To Update Order Datails. </div>";
            redirect(SITE_URL_OR_HOME_URL . "admin/manage_order.php");
            exit();
            
        }

    } else {

        
        redirect(SITE_URL_OR_HOME_URL . "admin/manage_order.php");
        die();

    }

?>