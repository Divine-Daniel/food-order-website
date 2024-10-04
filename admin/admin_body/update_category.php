


<div class="main_content">
    <div class="wrapper">
        <h1>Update Category</h1> <br>

        <?php 
 
            if(isset($_GET['id'])) {

                $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);

                $sql = " SELECT * FROM tbl_category WHERE id = $id ";
                $query = $conn->query($sql);

                $count = $query->num_rows;

                if($count==1) {

                    $row = $query->fetch_assoc();

                    $id = $row['id'];
                    $title = $row['title'];
                    $current_image = $row['image_name'];
                    $featured = $row['featured'];
                    $active = $row['active'];

                } else {

                    $_SESSION['category'] = "<div class='error'> <strong> Failed: </strong> Category Not Found. </div>";
                    header("location: " . SITE_URL_OR_HOME_URL . "admin/manage_category.php");
                    die();

                }

            } else {

                header("location: " . SITE_URL_OR_HOME_URL . "admin/manage_category.php");
                die();

            }

        ?>
        
        <br>

        <!-- Update Category Form Starts -->

            <form action="../admin_process/update_category_process.php" method="POST" enctype="multipart/form-data">

                <table class="tbl-30">

                    <tr>
                        <td>Title: </td>
                        <td><input type="text" name="title" value="<?= $title; ?>" placeholder="Category Title"> </td>
                    </tr>

                    <tr>
                        <td style="text-wrap: nowrap;">Current Image: </td>
                        <td>
                            <?php 

                                if($current_image != "") {

                                    ?>

                                        <img src="<?= SITE_URL_OR_HOME_URL; ?>images/category/<?= $current_image ?>" width="100px" height="100px" alt="Category Image">

                                    <?php

                                } else {

                                    ?>

                                        <h2 style="color: red;"> Image Not Added </h2>
                                        <!-- <img src="<?= SITE_URL_OR_HOME_URL; ?>images/category/food_category.png" width="100px" height="100px" alt=""> -->

                                    <?php

                                }

                            ?>
                        </td>
                    </tr>

                    <tr>
                        <td style="text-wrap: nowrap;"> New Image: </td>
                        <td><input type="file" name="new_image" id=""></td>
                    </tr>

                    <tr>
                        <td>Featured: </td>

                        <td>
                        
                            <input type="radio" name="featured" <?php if($featured === "Yes") { echo 'checked'; } ?> id="featured_Yes" value="Yes"> <label for="featured_Yes">Yes</label>
                            <input type="radio" name="featured" <?php if($featured === "No") { echo 'checked'; } ?> id="featured_No" value="No"> <label for="featured_No">No</label>
                        
                        </td>
                    </tr>

                    <tr>
                        <td>Active: </td>
                    
                        <td>

                            <input type="radio" name="active" <?php if($active === "Yes"){ echo 'checked'; } ?> id="active_Yes" value="Yes">  <label for="active_Yes">Yes</label>
                            <input type="radio" name="active" <?php if($active === "No"){ echo 'checked'; } ?> id="active_No" value="No"> <label for="active_No">No</label> 

                        </td>
                    </tr>

                    <tr>
                        <td colspan="2">
                            <input type="hidden" name="old_image" value="<?= $current_image; ?>" >
                            <input type="hidden" name="id" value="<?= mysqli_escape_string($conn, $id); ?>" >
                            <button type="submit" name="submit" class="btn-secondary" style="cursor: pointer; border-radius: 5px; border: none; padding: .8rem; font-size: 15.5px; margin-top: 1rem;"> Update Category</button>
                        </td>
                    </tr>

                </table>

            </form>

        <!-- Update Category Form Ends -->
    </div>
</div>
