<?php

    if($_SERVER["REQUEST_METHOD"] === "GET" && isset($_REQUEST["message_delete_id"])) {

        require_once("../config/constant.php");
        
        $id = filter_input(INPUT_GET, "message_delete_id", FILTER_SANITIZE_NUMBER_INT);

        $sql = " DELETE FROM contact WHERE id = ? ;";
        $query = $conn->prepare($sql);
        $query->bind_param("s", $id);
        $query->execute();

        if($query == true) {

            $_SESSION["deleted_suc"] = "<div class='success'> Message Deleted Successfully. </div>";
            redirect(SITE_URL_OR_HOME_URL . "admin/manage_message.php");
            die();
            
        } else {
            
            $_SESSION["deleted"] = "<div class='error'> Failed To Delete Message. </div>";
            redirect(SITE_URL_OR_HOME_URL . "admin/manage_message.php");
            die();

        }
        
    } else {
        
        require_once("../config/constant.php");
        redirect(SITE_URL_OR_HOME_URL . "admin/manage_message.php");
        die();

    }

?>