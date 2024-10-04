
<div class="main_content">
    <div class="wrapper">
        <h1><span style="color: red;">Manage</span> Food</h1>

        <br> <br>

        <!-- Button to Add Admin -->
        <form action="<?= SITE_URL_OR_HOME_URL; ?>admin/add_food.php" method="post" style="margin-bottom: -10px;">
            <button name="add_food" class="btn-primary" style="cursor: pointer; border: none; margin-bottom: 0px;"> Add Food</button>
        </form>

        <br><br>
        
        <?php 
            
            if(isset($_SESSION['failed'])) {

                # Display session message
                echo $_SESSION['failed'];

                # Unset session message
                unset($_SESSION['failed']);

            }
            
            if(isset($_SESSION['update_food'])) {

                # Display session message
                echo $_SESSION['update_food'];

                # Unset session message
                unset($_SESSION['update_food']);

            }

        ?>

        <br> <br>

        <table class="tbl-full">
            <tr>
                <th>S.N </th>
                <th>Title</th>
                <th>Price</th>
                <th>Image</th>
                <th>Featured</th>
                <th>Active</th>
                <th>Actions</th>
            </tr>

            <?php

                $sn = 1;
                $sql = "SELECT * FROM tbl_food";
                $query = $conn->query($sql);

                if($query == TRUE) {

                    // $count = $query->num_rows;
                    $count = mysqli_num_rows($query);

                    if ($count > 0) {
                        
                       while( $rows = $query->fetch_assoc() ) {

                        $id = $rows['id'];
                        $title = $rows['title'];
                        $price = $rows['price'];
                        $image_name = $rows['image_name'];
                        $featured = $rows['featured'];
                        $active = $rows['active'];

                        ?>
                        
                            <tr class="tr2 tr6">
                                <td><?= $sn++; ?> </td>
                                <td><?= $title; ?></td>
                                <td>$<?= $price; ?></td>

                                <td>
                                    <?php

                                        if ($image_name != "") {
                                            
                                            ?>
                                                <img src="<?= SITE_URL_OR_HOME_URL; ?>images/food/<?= $image_name; ?>" alt="food image" width="100px">
                                            <?php

                                        } else {

                                            ?>
                                                <p style="color: red;">Did`t add food.</p>
                                            <?php

                                        }

                                    ?>
                                </td>

                                <td><?= $featured; ?></td>
                                <td><?= $active; ?></td>
                                <td>
                                    <a href="<?= SITE_URL_OR_HOME_URL; ?>admin/update_food.php?id=<?= mysqli_real_escape_string($conn, $id); ?>" class="btn-secondary" name="update_food" title="Update Food" style="padding: 17px; border-radius: 5px;"><i class="fas fa-edit"></i></a>

                                    <a href="<?= SITE_URL_OR_HOME_URL; ?>admin_process/delete_food.php?id=<?= mysqli_real_escape_string($conn, $id); ?>&image_name=<?= mysqli_real_escape_string($conn, $image_name); ?>" class="btn-danger" title="Delete Food" style="padding: 17px; margin-left: 25px; border-radius: 5px;"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>

                        <?php

                       }

                    } else {

                        # food not added in database
                        ?>

                            <tr>
                                <td colspan="7" style="color: red;">Food not added yet.</td>
                            </tr>

                        <?php

                    }

                }

            ?>
           
        </table>
    </div>
</div>

