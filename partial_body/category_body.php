
    <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore Foods</h2>

            <?php

                global $conn;
                $yes = "Yes";

                $sql = " SELECT * FROM tbl_category WHERE active = '$yes' ;";
                $query = $conn->query($sql);

                if ($query == TRUE) {
                    
                    $count = $query->num_rows;

                    if($count > 0) {

                        while($rows = $query->fetch_assoc()) :

                            $id = $rows['id'];
                            $title = $rows['title'];
                            $image_name = $rows['image_name'];
                            
                            ?>

                                <a href="category-foods.php?category_id=<?= $id; ?>">
                                    <div class="box-3 float-container">

                                        <?php

                                            if($image_name != "") :

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

                        ?>

                            <div style="color: red;"> Category Not Found </div>

                        <?php

                    }
                    
                }

            ?>

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories Section Ends Here -->
     