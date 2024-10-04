
    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">

            <?php 
            
                global $conn;
                $search = mysqli_real_escape_string($conn, $_POST["search"]);

            ?>
            
            <h2>Foods on Your Search <a href="<?= SITE_URL_OR_HOME_URL; ?>foods.php" class="text-white">"<?= $search; ?>"</a></h2>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>

            <?php 
            
                global $conn;

                if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
                    
                    // get the search key word
                    $search = mysqli_real_escape_string($conn, $_POST["search"]);

                    // SQL query to get food base on the search key word
                    $sql = " SELECT * FROM tbl_food WHERE title LIKE '%$search%' OR description LIKE '%$search%' ;";

                    # Execute the query
                    $query = $conn->query($sql);

                    if ($query == true) {
                        
                        $count = $query->num_rows;

                        if ($count > 0) {
                            
                            # food is available
                            while($rows = $query->fetch_assoc()) {

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

                                                <div style="color: red;">Food Image Not Added</div>

                                            <?php

                                            endif;

                                        ?>

                                        </div>

                                        <div class="food-menu-desc">

                                            <h4><?= $food_title; ?></h4>

                                            <p class="food-price">$<?= $food_price; ?></p>

                                            <p class="food-detail"> <?= $food_description; ?> </p>

                                            <br>

                                            <a href="<?= SITE_URL_OR_HOME_URL; ?>order.php?food_id=<?= $food_id; ?>" class="btn btn-primary">Order Now</a>

                                        </div>
                                    </div>

                                <?php

                            }
                            
                        } else {

                            # food not available

                            ?>

                                <div style="color: red;"> Food Not Found </div>

                            <?php


                        }
                        
                    }

                } else {

                    header("location: " . SITE_URL_OR_HOME_URL);
                    die();

                }
            
            ?>

            <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->
     