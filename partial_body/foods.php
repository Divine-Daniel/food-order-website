
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



    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>

            <?php 
            
                global $conn;
                $yes = "Yes";

                $sql = " SELECT * FROM tbl_food WHERE active = '$yes' ;";
                $query = $conn->query($sql);

                if ($query == true) {
                    
                    $count = $query->num_rows;

                    if ($count > 0) {
                        
                        while($rows = $query->fetch_assoc()) :

                            $food_id = $rows['id'];
                            $food_title = $rows['title'];
                            $food_price = $rows['price'];
                            $food_description = $rows['description'];
                            $food_image_name = $rows['image_name'];

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

                        endwhile;
                        
                    } else {

                        ?>

                            <div style="color: red;"> Food Not Found </div>

                        <?php

                    }
                    
                }
            
            ?>

            <div class="clearfix"></div>

        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->
     