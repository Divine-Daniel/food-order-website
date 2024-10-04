<?php 

    require_once("../config/constant.php");
    session_start();

    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["update"])) {
       
        // 1. Get all the details from the form
        $food_id = mysqli_real_escape_string($conn, $_POST["food_id"]);

        $title = mysqli_real_escape_string($conn, $_POST["title"]);

        $description = mysqli_real_escape_string($conn, $_POST["description"]);

        $price = mysqli_real_escape_string($conn, $_POST["price"]);

        $current_image =  $_POST["current_image"];

        // $new_image = $_FILES["new_image"]["name"];

        $category_id = mysqli_real_escape_string($conn, $_POST["category_id"]);

        $featured = mysqli_real_escape_string($conn, $_POST["featured"]);

        $active = mysqli_real_escape_string($conn, $_POST["active"]);


        // 2. Upload the image if selected
        # check whether the upload button is clicked or not

        if ($_FILES["new_image"]["name"]) {
            
            $image_name = $_FILES["new_image"]["name"];

            if ($image_name != "") {
              
                // $rename_image = "food_name_" . rand(0000, 9999);
                $ext_1 = explode(".", $image_name);
                $ext = end($ext_1);
                // $image_name = $rename_image . "." . $ext;
                $image_name = "food_name_" . rand(0000, 9999) . "." . $ext; // this will rename the image

                // source path and destination path
                $src_path = $_FILES["new_image"]["tmp_name"]; // source path

                $dest_path = "../images/food/".$image_name; // destinatination path

                $upload_food = move_uploaded_file($src_path, $dest_path);

                if ($upload_food == false) {
                    
                    // Display message
                    $_SESSION['update_food'] = "<div class='error'> Failed to upload new image. </div>";

                    // Redurect to add_category.php
                    header('location:' . SITE_URL_OR_HOME_URL . 'admin/manage_food.php');

                    // Stop the process
                    exit();
                    
                }

                // 3. Remove the image if new image is selected and current image exist
                if ($current_image != "") {
                    
                    $remove_path = "../images/food/".$current_image;

                    $remove = unlink($remove_path);

                    if ($remove == false) {
                        
                        $_SESSION['update_food'] = "<div class='error'> Failed to Remove Current Image. </div>";
                        header("location: " . SITE_URL_OR_HOME_URL . "admin/manage_food.php");
                        exit();
                        
                    }
                    
                }
                
            } else {

                $image_name = $current_image;
    
            }
            
        } else {

            $image_name = $current_image;

        }

        // 4. Update the food in database
        $sql = " UPDATE tbl_food SET 
        title = '$title',
        description = '$description', 
        price = $price,
        image_name = '$image_name',
        category_id = $category_id,
        featured = '$featured',
        active = '$active' WHERE id = $food_id ;";

        $query = $conn->query($sql);

        // 5. Redirect to manage food with session message
        if ($query == true) {
            
            // Display message
            $_SESSION['update_food'] = "<div class='success'> Food Updated Successfully. </div>";

            // Redurect to add_category.php
            header('location:' . SITE_URL_OR_HOME_URL . 'admin/manage_food.php');

            // Stop the process
            exit();
            
        } else {

            // Display message
            $_SESSION['update_food'] = "<div class='error'> Failed Update Food. </div>";

            // Redurect to add_category.php
            header('location:' . SITE_URL_OR_HOME_URL . 'admin/manage_food.php');

            // Stop the process
            exit();

        }
        
    } else {
        $_SESSION['update_food'] = "<div class='error'> Unauthorized Access. </div>";
        header("location: " . SITE_URL_OR_HOME_URL . "admin/manage_food.php");
        exit();

    }

?>