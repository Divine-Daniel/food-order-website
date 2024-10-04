<?php

    require("../config/constant.php");

    if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {

        $id = mysqli_real_escape_string($conn, $_POST['id']);
        $title = mysqli_real_escape_string($conn, $_POST['title']);
        $current_image =  $_POST['old_image'];
        $featured = mysqli_real_escape_string($conn, $_POST['featured']);
        $active = mysqli_real_escape_string($conn, $_POST['active']);

        if(isset($_FILES['new_image']['name'])) {

            $image_name = $_FILES['new_image']['name'];

            if(!empty($image_name)) {

                // Upload the image

                # To upload the image we need image name, source path and destination path
                # image name
                $image_name = $_FILES['new_image']['name'];

                // Auto rename our image
                // Get the extention of our initail image (jpg, png, gif, etc) e.g "Specialfood1.jpg"
                $ext_1 = explode('.', $image_name);
                $ext = end($ext_1);

                // Rename the image
                $image_name = "food_category_".rand(000, 999).'.'.$ext; // this will automatically change the name and give it a three digit random number of the image and also add the extension of the image e.g food_category_654.jpg

                # Source path
                $source_path = $_FILES['new_image']['tmp_name'];

                # Destination path
                $destination_path = "../images/category/".$image_name;

                // Finally upload the image
                $upload = move_uploaded_file($source_path, $destination_path);

                // Check whether the image is uploaded or not

                // And if the image is not uploaded then we will stop the process and redirect it with error message
                if($upload == false) {

                    // Display message
                    $_SESSION['category'] = "<div class='error'><strong>Failed!: </strong> Failed to upload image. </div>";

                    // Redurect to add_category.php
                    header('location:' . SITE_URL_OR_HOME_URL . 'admin/manage_category.php');

                    // Stop the process
                    die();

                }

                if($current_image != "")  {

                    $remove_path = "../images/category/".$current_image;
                    $remove = unlink($remove_path);

                    if($remove == false) {

                        $_SESSION['category'] = "<div class='error'><strong>failed!: </strong> Failed to Remove Current Image. </div>";
                        header("location: " . SITE_URL_OR_HOME_URL . "admin/manage_category.php");
                        die();

                    }

                }

            } else {

                $image_name = $current_image;
    
            }

        } else {

            $image_name = $current_image;

        }

        $sql = " UPDATE tbl_category SET title = '$title', image_name = '$image_name', featured = '$featured', active = '$active' WHERE id = $id ; ";
        $query = $conn->query($sql); 

        if($query == TRUE) {

            $_SESSION['category'] = "<div class='success'><strong>Updated!: </strong> Category Updated Successfully. </div>";
            header("location: " . SITE_URL_OR_HOME_URL . "admin/manage_category.php");
            die();

        } else {

            // Redirect to manage category page with message
            $_SESSION['category'] = "<div class='error'><strong>Failed!: </strong> Failed To Updated Category. </div>";
            header("location: " . SITE_URL_OR_HOME_URL . "admin/manage_category.php");
            die();

        }
        
        
    } else { 

        header("location: " . SITE_URL_OR_HOME_URL . "admin/manage_category.php");
        die();

    }
    










    

    // OLD CODE




    // Update new image if selected
        # Check whether the image is selected or not
        // if(isset($_FILES['new_image']['name'])) {

            # check whether the image is available
            // if($image_name = $_FILES['new_image']['name'] != "") {

            //     # Image is available

            //     $rename_image = "food_category_" . rand(000, 999);
            //     $ext_1 = explode('.', $image_name);
            //     $ext = end($ext_1);
            //     $tmp_name = $_FILES['new_image']['tmp_name'];
            //     $image_name = $rename_image . '.' . $ext;
            //     $destination = "../images/category/".$image_name;

            //     $upload = move_uploaded_file($tmp_name, $destination);

            //     if($upload == false) {

            //         $_SESSION['category'] = "<div class='error'><strong>failed!: </strong> Failed to Upload Image. </div>";
            //         header("location: " . SITE_URL_OR_HOME_URL . "admin/manage_category.php");
            //         die();

            //     }

            //     // Check whether the Old image or the current image is removed or not

            //     # if the current image do not removed then display error message

            //     if($current_image != "")  {

            //         $remove_path = "../images/category/".$current_image;
            //         $remove = unlink($remove_path);

            //         if($remove == false) {

            //             $_SESSION['category'] = "<div class='error'><strong>failed!: </strong> Failed to Remove Current Image. </div>";
            //             header("location: " . SITE_URL_OR_HOME_URL . "admin/manage_category.php");
            //             die();

            //         }

            //     }

            //     // Update the database 
            //     $sql = " UPDATE tbl_category SET title = '$title', image_name = '$image_name', featured = '$featured', active = '$active' WHERE id = $id ; ";
            //     $query = $conn->query($sql);

            //     if($query == TRUE) {

            //         $_SESSION['category'] = "<div class='success'><strong>Updated!: </strong> Category Updated Successfully. </div>";
            //         header("location: " . SITE_URL_OR_HOME_URL . "admin/manage_category.php");
            //         die();

            //     } else {

            //         // Redirect to manage category page with message
            //         $_SESSION['category'] = "<div class='error'><strong>Failed!: </strong> Failed To Updated Category. </div>";
            //         header("location: " . SITE_URL_OR_HOME_URL . "admin/manage_category.php");
            //         die();

            //     }

            // } else {

            //     // Update the database 
            //     $sql = " UPDATE tbl_category SET title = '$title', featured = '$featured', active = '$active' WHERE id = $id ; ";
            //     $query = $conn->query($sql);

            //     if($query == TRUE) {

            //         $_SESSION['category'] = "<div class='success'><strong>Updated!: </strong> Category Updated Successfully. </div>";
            //         header("location: " . SITE_URL_OR_HOME_URL . "admin/manage_category.php");
            //         die();

            //     } else {

            //         // Redirect to manage category page with message
            //         $_SESSION['category'] = "<div class='error'><strong>Failed!: </strong> Failed To Updated Category. </div>";
            //         header("location: " . SITE_URL_OR_HOME_URL . "admin/manage_category.php");
            //         die();

            //     }

            // }

        // } else {

        //     // Update the database 
        //     $sql = " UPDATE tbl_category SET title = '$title', featured = '$featured', active = '$active' WHERE id = $id ; ";
        //     $query = $conn->query($sql);

        //     if($query == TRUE) {

        //         $_SESSION['category'] = "<div class='success'><strong>Updated!: </strong> Category Updated Successfully. </div>";
        //         header("location: " . SITE_URL_OR_HOME_URL . "admin/manage_category.php");
        //         die();

        //     } else {

        //         // Redirect to manage category page with message
        //         $_SESSION['category'] = "<div class='error'><strong>Failed!: </strong> Failed To Updated Category. </div>";
        //         header("location: " . SITE_URL_OR_HOME_URL . "admin/manage_category.php");
        //         die();

        //     }

// }




?>