

<?php 
    
    global $conn;

    # check whether the id is isset or not
    if($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["category_id"])) {

        $category_id = mysqli_real_escape_string($conn, $_GET["category_id"]);

        # get the category title base on the category id
        $sql = " SELECT title FROM tbl_category WHERE id = $category_id ;";
        $query = $conn->query($sql);

        if ($query == true) {
            
            $rows = $query->fetch_assoc();

            $category_title = $rows["title"];

        } else {

            // Category is not available
            
            ?>

                <div style="color: red;"> Category Not Added </div>

            <?php

        }

    } else {

        header("location: " . SITE_URL_OR_HOME_URL);
        exit();

    }
    
?>


    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            
            <h2>Foods on <a href="<?= SITE_URL_OR_HOME_URL ?>categories.php" class="text-white">"<?= $category_title; ?>"</a></h2>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>

            <?php 
            
                # create SQL Query to get food based on the selected category id
                $sql2 = " SELECT * FROM tbl_food WHERE category_id = $category_id ;";
                $query2 = $conn->query($sql2);

                if ($query2 == true) {
            
                    $count2 = $query2->num_rows;

                    if ($count2 > 0) {
                        
                        while($rows2 = $query2->fetch_array()) {

                            $food_id = $rows2['id'];
                            $food_title = $rows2['title'];
                            $food_price = $rows2['price'];
                            $food_description = $rows2['description'];
                            $food_image_name = $rows2['image_name'];

                            ?>
                            
                                <div class="food-menu-box">
                                    <div class="food-menu-img">
                                        
                                        <?php 
                                        
                                            if($food_image_name != "") :
                                            
                                            ?>

                                                <img src="<?= SITE_URL_OR_HOME_URL; ?>images/food/<?= $food_image_name; ?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve food">

                                                <?php 
                                                
                                                else :
                                                
                                                ?>

                                                <div style="color: red;">food image not Added</div>

                                            <?php

                                            endif;

                                        ?>

                                    </div>

                                    <div class="food-menu-desc">
                                        <h4><?= $food_title; ?></h4>
                                        <p class="food-price">$<?= $food_price; ?></p>
                                        <p class="food-detail">
                                            <?= $food_description; ?>
                                        </p>
                                        <br>

                                        <a href="<?= SITE_URL_OR_HOME_URL; ?>order.php?food_id=<?= $food_id; ?>" class="btn btn-primary">Order Now</a>
                                    </div>
                                </div>

                            <?php

                        }
                        
                    } else {
        
                        // food is not available
                        
                        ?>
            
                            <div style="color: red;"> Food Not Available </div>
            
                        <?php
            
                    }
        
                } else {
        
                    // something went wrong
                    
                    ?>
        
                        <div style="color: red;"> something went wrong </div>
        
                    <?php
        
                }
                
            ?>

            <div class="clearfix"></div>
            
        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->
     