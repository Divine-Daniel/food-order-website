
<?php

    require_once("../config/constant.php");
    global $conn;

    if($_SERVER["REQUEST_METHOD"] === "GET" &&isset($_GET["order_delete_id"])) {

        $order_delete_id = mysqli_real_escape_string($conn, $_GET["order_delete_id"]);
        $sql = " DELETE FROM tbl_order WHERE id = $order_delete_id ;";
        $query = $conn->query($sql);

        if($query == true) {

            $_SESSION["update_failed"] = "<div class='success'> Order Details Deleted Successfully. </div>";
            redirect(SITE_URL_OR_HOME_URL . "admin/manage_order.php");
            exit();
            
        } else {
            
            $_SESSION["update_failed"] = "<div class='error'> Failed To Delete Order Details. </div>";
            redirect(SITE_URL_OR_HOME_URL . "admin/manage_order.php");
            exit();
            
        }

    } else {

        redirect(SITE_URL_OR_HOME_URL . "admin/manage_order.php");
        exit();

    }

?>