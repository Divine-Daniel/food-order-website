
<?php


    if($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["id"])) {

        global $conn;

        $id = $_GET["id"];

        $sql2 = "SELECT * FROM tbl_food WHERE id = $id ;";
        $query2 = $conn->query($sql2);

        if($query2 == TRUE) {

            $row = $query2->fetch_assoc();

            $food_id = $row["id"];
            $title = $row["title"];
            $description = $row["description"];
            $price = $row["price"];
            $current_image = $row["image_name"];
            $current_category_id = $row["category_id"];
            $featured = $row["featured"];
            $active = $row["active"];
            
        } else {

            $_SESSION['failed'] = "<div class='error'>Oops Something went wrong. </div>";
            header("location: " . SITE_URL_OR_HOME_URL . "admin/manage_food.php");
            exit();

        }

    } else {

        header("location: manage_food.php");
        exit();

    }

?>
                        
    <div class="main_content">
        <div class="wrapper">
            <h1>Update Food</h1> <br>

            <?php 
    
                if(isset($_SESSION['failed'])) {

                    # Display session message
                    echo $_SESSION['failed'];

                    # Unset session message
                    unset($_SESSION['failed']);

                }

            ?>
            
            <br>

            <!-- Add Category Form Starts -->

                <form action="../admin_process/update_food_process.php" method="POST" enctype="multipart/form-data">

                    <table class="tbl-30">

                        <tr>
                            <td> <label for="title">Title: </label> </td>
                            <td><input type="text" name="title" id="title" value="<?= $title; ?>" placeholder="Title of the food" style="width: 60%; outline: none;"> </td>
                        </tr>

                        <tr>
                            <td> <label for="description">Description: </label> </td>
                            <td><textarea name="description" id="description" cols="22" rows="5" placeholder="Description of the food" style="width: 60%; outline: none;"><?= $description; ?></textarea></td>
                        </tr>
                        
                        <tr>
                            <td> <label for="price">Price: </label> </td>
                            <td><input type="number" name="price" value="<?= $price; ?>" id="price" placeholder="Price of the food" style="width: 60%; outline: none;"> </td>
                        </tr>

                        <tr>
                            <td style="text-wrap: nowrap;">Current Image:  </td>
                            <td>

                                <?php
                                
                                    if ($current_image != "") :
                                        
                                    ?>

                                        <img src="<?= SITE_URL_OR_HOME_URL; ?>images/food/<?= $current_image; ?>" name="current_food" width="100px" alt="<?= $title; ?>">

                                    <?php

                                    else :

                                    ?>

                                        <p style="color: red;">Food Image not added</p>

                                    <?php

                                    endif;

                                ?>
                                
                            </td>
                        </tr>

                        <tr>
                            <td style="text-wrap: nowrap;"> <label for="image_name">Select Image: </label> </td>
                            <td><input type="file" id="image_name" name="new_image"> </td>
                        </tr>

                        <tr>
                            <td><label for="category_id">Category: </label> </td>
                            <td>
                                <select name="category_id" value="<?= $title; ?>" id="category_id" style="width: 60%; outline: none;">

                                    <?php

                                        $yes = "Yes";
                                        $id = mysqli_real_escape_string($conn, $_GET['id']);
                                        $sql = "SELECT * FROM tbl_category WHERE active = '$yes';";
                                        $statement = mysqli_query($conn, $sql);
                                        $result = $statement;

                                        if($result == true) {

                                            $count = mysqli_num_rows($result);

                                            if($count > 0) {

                                                while($rows = $result->fetch_assoc()) {

                                                    $category_id = $rows['id'];
                                                    $category_title = $rows['title'];

                                                    ?>

                                                        <option <?php if($current_category_id === $category_id) { echo "selected"; }; ?> value="<?= $category_id; ?>"><?= $category_title; ?></option>

                                                    <?php

                                                }

                                            } else {

                                                ?>

                                                    <option value="0">Category Food Not  Available </option>

                                                <?php

                                            }

                                        }

                                    ?>

                                </select>
                            </td>
                        </tr>

                        <tr>
                            <td>Featured: </td>

                            <td>
                            
                                <input type="radio" <?php if($featured == "Yes") { echo "checked"; }; ?> name="featured" id="featured_Yes" value="Yes"> <label for="featured_Yes">Yes</label>
                                <input type="radio" <?php if($featured == "No") { echo "checked"; }; ?> name="featured" id="featured_No" value="No"> <label for="featured_No">No</label>
                            
                            </td>
                        </tr>

                        <tr>
                            <td>Active: </td>
                        
                            <td>

                                <input type="radio" <?php if($active == "Yes") { echo "checked"; }; ?> name="active" id="active_Yes" value="Yes">  <label for="active_Yes">Yes</label>
                                <input type="radio" <?php if($active == "No") { echo "checked"; }; ?> name="active" id="active_No" value="No"> <label for="active_No">No</label> 

                            </td>
                        </tr>

                        <tr>
                            <td colspan="2">

                                <input type="hidden" name="current_image" value="<?= $current_image; ?>">
                                <input type="hidden" name="food_id" value="<?= $food_id; ?>">

                                <button type="submit" name="update" class="btn-secondary" style="cursor: pointer; border-radius: 5px; border: none; padding: .8rem; font-size: 15.5px; margin-top: 1rem;"> Update Food </button>

                            </td>
                        </tr>

                    </table>

                </form>

            <!-- Add Category Form Ends -->
        </div>
    </div>

