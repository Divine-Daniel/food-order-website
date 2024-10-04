<?php


    require("../config/constant.php");

    if(isset($_GET['id']) && isset($_GET['image_name'])) {

        $id = mysqli_real_escape_string($conn, $_GET['id']);
        $image_name = mysqli_real_escape_string($conn, $_GET['image_name']);

        if($image_name != "") {

            $path = "../images/category/".$image_name;

            $remove = unlink($path);

            if($remove == false) {

                $_SESSION['deleted'] = " <div class='error'><strong>Failed!: </strong> Failed To Remove Category Image </div> ";
                header("location: " . SITE_URL_OR_HOME_URL . "admin/manage_category.php");
                die();

            }

        }

        $sql = " DELETE FROM tbl_category WHERE id = $id ; ";
        $query = $conn->query($sql);

        if($query == TRUE) {

            $_SESSION['deleted'] = " <div class='success'><strong>Success!: </strong> Category Deleted Successfully </div> ";
            header("location: " . SITE_URL_OR_HOME_URL . "admin/manage_category.php");
            die();

        } else {

            $_SESSION['deleted'] = " <div class='error'><strong>Failed!: </strong> Failed To Delete Category </div> ";
            header("location: " . SITE_URL_OR_HOME_URL . "admin/manage_category.php");
            die();

        }
        

    } else {

        header("location: " . SITE_URL_OR_HOME_URL . "admin/manage_category.php");
        die();

    }


?>