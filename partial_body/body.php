
 <!-- fOOD sEARCH Section Starts Here -->
 <section class="food-search text-center">
        <div class="container">
            
            <form action="<?= SITE_URL_OR_HOME_URL; ?>food-search.php" method="POST">
                <input type="search" name="search" placeholder="Search for Food.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->

    <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">

            <?php

                if (isset($_SESSION['order'])) {
                    
                    echo $_SESSION['order'];
                    unset($_SESSION['order']);
                    
                }

            ?>

            <br>
            <h2 class="text-center">Explore Foods</h2>
            <br>

            <?php

                // create SQL query to display categories from database
                global $conn;
                $yes = "Yes";
                $sql = " SELECT * FROM tbl_category WHERE active = '$yes' AND featured = '$yes' LIMIT 9 ;";
                $query = $conn->query($sql);

                if ($query == TRUE) {

                    # count rows to check whether the category is still available or not
                    $count = $query->num_rows;

                    if ($count > 0) {

                        // Category is available
                        # Fetch the data from datebase
                        while ($rows = $query->fetch_assoc()) :
                            
                            # get the value like id, title, and image
                            $id = $rows['id'];
                            $title = $rows['title'];
                            $image_name = $rows['image_name'];

                            ?>

                                <a href="<?= SITE_URL_OR_HOME_URL; ?>category-foods.php?category_id=<?= $id; ?>">
                                    <div class="box-3 float-container">

                                        <?php

                                            if ($image_name != "") :

                                                # image is available

                                            ?>

                                                <img src="<?= SITE_URL_OR_HOME_URL; ?>images/category/<?= $image_name; ?>" alt="Pizza" class="img-responsive img-curve height">
                                                                                            
                                            <?php

                                                else :

                                            ?>

                                                <div style="color: red;"> Category image not Added </div>

                                            <?php
                                            
                                            endif;

                                        ?>


                                        <h3 class="float-text text-white"><?= $title; ?></h3>
                                    </div>
                                </a>

                            <?php

                        endwhile;

                    } else {

                        // Category is not available
                        
                        ?>

                            <div style="color: red;"> Category Not Added </div>

                        <?php

                    }

                }

            ?>

            <div class="clearfix"></div>

        </div>
    </section>
    <!-- Categories Section Ends Here -->

    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>

            <?php

                // Getting foods from database that are active and featured
                // SQL query
                // $yes2 = "Yes";
                global $conn;

                $sql2 = " SELECT * FROM tbl_food WHERE active = 'Yes' AND featured = 'Yes' LIMIT 6 ";
                $query2 = $conn->query($sql2);

                if($query2) {
                    
                    // $count2 = $query2->num_rows;
                    $count2 = mysqli_num_rows($query2);

                    if ($count2 > 0) {
                        
                        while($rows2 = $query2->fetch_assoc()) :
                            
                            $food_id = $rows2['id'];
                            $food_title = $rows2['title'];
                            $food_price = $rows2['price'];
                            $food_description = $rows2['description'];
                            $food_image_name = $rows2['image_name'];

                        ?>

                            <!-- food-menu-box -->
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
                            <!-- food-menu-box -->

                        <?php

                        endwhile;
                        
                        
                    } else {

                        ?>

                            <div style="color: red;"> Food Not Found </div>

                        <?php

                    }
                    
                } else {

                    echo "error";

                }

            ?>
        
            <div class="clearfix"></div>

        </div>

        <p class="text-center">
            <a href="<?= SITE_URL_OR_HOME_URL; ?>foods.php">See All Foods</a>
        </p>
        
        
    </section>
    <!-- fOOD Menu Section Ends Here -->
  