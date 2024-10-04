

    <?php 
    
        global $conn;
        if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["food_id"])) {
           
            $food_id = mysqli_real_escape_string($conn, $_GET["food_id"]);

            $sql = " SELECT * FROM tbl_food WHERE id = $food_id ;";
            $query = $conn->query($sql);

            $count = $query->num_rows;

            if ($count == 1) {
                
                $rows = $query->fetch_assoc();

                $id = $rows["id"];
                $title = $rows["title"];
                $price = $rows["price"];
                $image_name = $rows["image_name"];
                
            }  else {
        
                // food is not available
                
                ?>
    
                    <div style="color: red;"> Food Not Found </div>
    
                <?php
    
            }
            
        } else {

            header("location: " . SITE_URL_OR_HOME_URL);
            exit();

        }
    
    ?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search">
        <div class="container">
            
            <h2 class="text-center text-white">Fill this form to confirm your order.</h2>

            <form action="<?= SITE_URL_OR_HOME_URL; ?>partial_body/order_proccess.php" method="POST" class="order">
                <fieldset>
                    <legend>Selected Food</legend>

                    <div class="food-menu-img">

                        <?php 
                            
                            if($image_name != "") :
                            
                            ?>

                                <img src="<?= SITE_URL_OR_HOME_URL; ?>images/food/<?= $image_name; ?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve qtt">

                                <?php 
                                
                                else :
                                
                                ?>

                                <div style="color: red;">food image not Added</div>

                            <?php

                            endif;

                        ?>
                        
                    </div>
    
                    <div class="food-menu-desc">
                        <h3><?= $title; ?></h3>
                        <input type="hidden" name="food" value="<?= $title; ?>">

                        <p class="food-price">$<?= $price; ?></p>
                        <input type="hidden" name="price" value="<?= $price; ?>">

                        <div class="order-label">Quantity</div>
                        <input type="number" name="qty" class="input-responsive" value="1" required>
                        
                    </div>

                </fieldset>
                
                <fieldset>
                    <legend>Delivery Details</legend>
                    <div class="order-label">Full Name</div>
                    <input type="text" name="customer_name" placeholder="E.g. Divine Daniel" class="input-responsive" required>

                    <div class="order-label">Phone Number</div>
                    <input type="tel" name="customer_contact" placeholder="E.g. 9843xxxxxx" class="input-responsive" required>

                    <div class="order-label">Email</div>
                    <input type="email" name="customer_email" placeholder="E.g. hi@divinedaniel.com" class="input-responsive" required>

                    <div class="order-label">Address</div>
                    <textarea name="customer_address" rows="10" placeholder="E.g. Street, City, Country" class="input-responsive" required></textarea>

                    <input type="submit" name="submit" value="Confirm Order" class="btn btn-primary">
                </fieldset>

            </form>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->
