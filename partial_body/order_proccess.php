<?php

    require_once("../config/constant.php");

    global $conn;

    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["submit"])) {
        
        // Get all the details from the form
        $food = mysqli_real_escape_string($conn, $_POST["food"]);
        $price = mysqli_real_escape_string($conn, $_POST["price"]);
        $qty = mysqli_real_escape_string($conn, $_POST["qty"]);
        $total = $price * $qty;
        $order_date = date("Y-m-d h:i:sa"); // order date
        $status = "Ordered"; // status eg. ordered, on Delivery, Delivered, cancel
        $customer_name = mysqli_real_escape_string($conn, $_POST["customer_name"]);
        $customer_contact = mysqli_real_escape_string($conn, $_POST["customer_contact"]);
        $customer_email = mysqli_real_escape_string($conn, $_POST["customer_email"]);
        $customer_address = mysqli_real_escape_string($conn, $_POST["customer_address"]);

        // Save the order details in database
        # create SQL to save the data
        $sql = " INSERT INTO tbl_order (food, price, qty, total, order_date, status, customer_name, customer_contact, customer_email, customer_address) VALUE('$food', $price, $qty, $total, '$order_date', '$status', '$customer_name', '$customer_contact', '$customer_email', '$customer_address') ";
        $query = $conn->query($sql);

        if ($query == true) {
            
            $_SESSION['order'] = "<div class='order_success'> Food Ordered Successfully. </div>";
            header("location: " . SITE_URL_OR_HOME_URL);
            exit();
            
        } else {

            // Failed to insert data
            $_SESSION['order'] = "<div class='order_error'> Failed To Order Food </div>";
            header("location: " . SITE_URL_OR_HOME_URL);
            exit();
            
        }
        
    } else {
        
        header("location: " . SITE_URL_OR_HOME_URL);
        exit();
        
    }


?>