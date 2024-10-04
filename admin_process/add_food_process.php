<?php

    require_once("../config/constant.php");
    global $conn;

    if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["submit"])) {

        $title = mysqli_real_escape_string($conn, $_POST['title']);
        $description = mysqli_real_escape_string($conn, $_POST['description']);
        $price = mysqli_real_escape_string($conn, $_POST['price']);
        // $image = $_FILES['image_food']['name'];
        $category_id = mysqli_real_escape_string($conn, $_POST['category_id']);
        $featured = mysqli_real_escape_string($conn, $_POST['featured']);
        $active = mysqli_real_escape_string($conn, $_POST['active']);

        // Check whether the redio button for featured and active is checked or not

        # Featured Radio Button
        if(isset($_POST['featured'])) {

            $featured = mysqli_real_escape_string($conn, $_POST['featured']);

        } else {

            $featured = "No";

        }

        # Active radion button
        if(isset($_POST['active'])) {

            $active = mysqli_real_escape_string($conn, $_POST['active']);

        } else {

            $active = "No";

        }

        # upload the image
        if(isset($_FILES['image_food']['name'])) {

            $image_name = $_FILES['image_food']['name'];

            // check whether the image is selected or not and upload image only if selected
            if($image_name != "") {

                // image is selected 

                // Rename the image name
                // $rename_image = "food_name_" . rand(0000, 9999);

                // Get the extension of the selected image (jpeg, jpg, png, gif, e.t.c)
                $ext_1 = explode(".", $image_name);
                $ext = end($ext_1);
                // $image_name = $rename_image . "." . $ext;
                $image_name = "food_name_" . rand(0000, 9999) . "." . $ext; // New image name

                // Get the src path and Destination path

                # src path is the current location of the image
                $src = $_FILES['image_food']['tmp_name'];

                # Destination path where the image will newly be located 
                $dest = "../images/food/".$image_name;

                // finally upload the image
                $upload = move_uploaded_file($src, $dest);

                // check whether the image is uploaded or not
                if ($upload == false) {

                    # failed to upload the image then display session message
                    $_SESSION['failed'] = "<div class='error'><strong>Failed!: </strong> Failed to upload image. </div>";

                    # redirect to add food page
                    header("location: " . SITE_URL_OR_HOME_URL . "admin/manage_food.php");

                    # stop the process
                    die();
                }

            } else {

                $image_name = ""; // setting the image value as blank

            }

        } else {

            $image_name = ""; // setting the default value as blank

        }


        // insert data into database

        # craete a query to save or add food
        $sql = "INSERT INTO tbl_food(title, description, price, image_name, category_id, featured, active) VALUE('$title', '$description', $price, '$image_name', $category_id, '$featured', '$active')";
        $query = $conn->query($sql);

        # check if data is inserted or not
        if($query == TRUE) {

            # data inserted successfully then display session message
            $_SESSION['failed'] = "<div class='success'><strong>Success!: </strong> Inserted Food Details Successfully. </div>";

            # redirect to manage food page
            header("location: " . SITE_URL_OR_HOME_URL . "admin/manage_food.php");

            # stop the process
            die();

        } else {

            # failed to execute or insert data then display session message
            $_SESSION['failed'] = "<div class='error'><strong>Failed!: </strong> Failed to Add Food. </div>";

            # redirect to add food page
            header("location: " . SITE_URL_OR_HOME_URL . "admin/manage_food.php");

            # stop the process
            die();

        }


    } else {

        header("location: " . SITE_URL_OR_HOME_URL . "admin/manage_food.php");
        exit();

    }

?>