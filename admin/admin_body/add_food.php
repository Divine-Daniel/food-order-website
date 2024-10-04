<?php


    if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["add_food"])) {

        require_once("partials/menu.php");

        ?>
                        
            <div class="main_content">
                <div class="wrapper">
                    <h1>Add Food</h1> <br>

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

                        <form action="../admin_process/add_food_process.php" method="POST" enctype="multipart/form-data">

                            <table class="tbl-30">

                                <tr>
                                    <td> <label for="title">Title: </label> </td>
                                    <td><input type="text" name="title" id="title" placeholder="Title of the food" style="width: 60%; outline: none;"> </td>
                                </tr>

                                <tr>
                                    <td> <label for="description">Description: </label> </td>
                                    <td><textarea name="description" id="description" cols="22" rows="5" placeholder="Description of the food" style="width: 60%; outline: none;"></textarea></td>
                                </tr>
                                
                                <tr>
                                    <td> <label for="price">Price: </label> </td>
                                    <td><input type="number" name="price" id="price" placeholder="Price of the food" style="width: 60%; outline: none;"> </td>
                                </tr>

                                <tr>
                                    <td style="text-wrap: nowrap;"> <label for="image_name">Select Image: </label> </td>
                                    <td><input type="file" id="image_name" name="image_food"> </td>
                                </tr>

                                <tr>
                                    <td><label for="category_id">Category: </label> </td>
                                    <td>
                                        <select name="category_id" id="category_id" style="width: 60%; outline: none;">

                                            <?php

                                                $yes = "Yes";
                                                $sql = "SELECT * FROM tbl_category WHERE active = '$yes'";
                                                $statement = mysqli_query($conn, $sql);
                                                $result = $statement;

                                                if($result == true) {

                                                    $count = mysqli_num_rows($result);

                                                    if($count > 0) {

                                                        while($rows = $result->fetch_assoc()) {

                                                            $id = $rows['id'];
                                                            $title = $rows['title'];

                                                            ?>

                                                                <option value="<?= $id; ?>"><?= $title; ?></option>

                                                            <?php

                                                        }

                                                    } else {

                                                        ?>

                                                            <option value="0">No Category Found</option>

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
                                    
                                        <input type="radio" name="featured" id="featured_Yes" value="Yes"> <label for="featured_Yes">Yes</label>
                                        <input type="radio" name="featured" id="featured_No" value="No"> <label for="featured_No">No</label>
                                    
                                    </td>
                                </tr>

                                <tr>
                                    <td>Active: </td>
                                
                                    <td>

                                        <input type="radio" name="active" id="active_Yes" value="Yes">  <label for="active_Yes">Yes</label>
                                        <input type="radio" name="active" id="active_No" value="No"> <label for="active_No">No</label> 

                                    </td>
                                </tr>

                                <tr>
                                    <td colspan="2">
                                        <button type="submit" name="submit" class="btn-secondary" style="cursor: pointer; border-radius: 5px; border: none; padding: .8rem; font-size: 15.5px; margin-top: 1rem;"> Add Food </button>
                                    </td>
                                </tr>

                            </table>

                        </form>

                    <!-- Add Category Form Ends -->
                </div>
            </div>

        <?php

        require_once("partials/footer.php");

    } else {

        require_once("../config/constant.php");
        header("location: " . SITE_URL_OR_HOME_URL . "admin/manage_food.php");
        exit();

    }

?>