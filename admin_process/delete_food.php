<?php

    require_once("../config/constant.php");
    global $conn;

    if($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["id"]) && isset($_GET["image_name"])) {

        # proccess tp delete food

        //1. GET ID AND the IMAGE NAME
        $id = mysqli_real_escape_string($conn, $_GET["id"]);
        $image_name = mysqli_real_escape_string($conn, $_GET["image_name"]);

        //2. Remove the image if available
        # Check whether the image is avaiable or not and delete Only when the image is available
        if($image_name != "") {

            // it has image and need to be be removed
            # Get the image path
            $path = "../images/food/".$image_name;

            // Remove image file from folder
            $remove = unlink($path);

            // check whether the image is removed or not
            if($remove == false) {

                # Redirect to manage food page
                $_SESSION["failed"] = "<div class='error'> Failed to remove image faile</div>";
                header("location: " . SITE_URL_OR_HOME_URL . "admin/manage_food.php");
                # stop the the process
                die();

            }

        }

        //3. Delete food from database
        $sql = "DELETE FROM tbl_food WHERE id = $id;";
        # Execute the query
        $query = $conn->query($sql);

        // check whether the query is executed or not and set session message respectively
        //4. Redirect to manage admin with session message
        if ($query == TRUE) {
             
            // Food deleted 
            # Redirect to manage food page
            $_SESSION["failed"] = "<div class='success'> Food deleted successfully </div>";
            header("location: " . SITE_URL_OR_HOME_URL . "admin/manage_food.php");
            die();

        } else {

            // failed to delete
            # Redirect to manage food page
            $_SESSION["failed"] = "<div class='error'> Failed to delete food </div>";
            header("location: " . SITE_URL_OR_HOME_URL . "admin/manage_food.php");
            die();

        }

    } else {

        # Redirect to manage food page
        $_SESSION["failed"] = "<div class='error'> Unauthorized Access </div>";
        header("location: " . SITE_URL_OR_HOME_URL . "admin/manage_food.php");
        die();

    }