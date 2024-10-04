
<div class="main_content">
    <div class="wrapper">
        <h1><span style="color: red;">Manage</span> Category</h1>

        <br> <br>

        <!-- Button to Add Admin -->
        <a href="<?php echo SITE_URL_OR_HOME_URL; ?>admin/add_category.php" class="btn-primary">Add Category</a>

        <br> <br> <br>
        
        <?php 
 
            if(isset($_SESSION['add'])) {

                # Display session message
                echo $_SESSION['add'];

                # Unset session message
                unset($_SESSION['add']);

            }
 
            if(isset($_SESSION['deleted'])) {

                # Display session message
                echo $_SESSION['deleted'];

                # Unset session message
                unset($_SESSION['deleted']);

            }

        ?>

        <?php

                        
            if(isset($_SESSION['category'])) {

                # Display session message
                echo $_SESSION['category'];

                # Unset session message
                unset($_SESSION['category']);

            }

        ?>

        <br>

        <table class="tbl-full">
            <tr>
                <th style="padding-right: 15px;">S.N </th>
                <th>Title</th>
                <th>Image</th>
                <th>Featured</th>
                <th>Active</th>
                <th>Actions</th>
            </tr>


            <?php

                // Query to get Category info
                $sql = "SELECT * FROM tbl_category";

                // Execute the Query
                // $res = mysqli_query($conn, $sql);
                $res = $conn->query($sql);

                if($res == true) {

                    // function to get all the data in database
                    $count = mysqli_num_rows($res);

                    if($count > 0) {

                        $sn = 1;
                        
                        while ($rows = mysqli_fetch_assoc($res)) {

                            $id = $rows['id'];
                            $title = $rows['title'];
                            $current_image = $rows['image_name'];
                            $featured = $rows['featured'];
                            $active = $rows['active'];

                            ?>

                                <tr class="tr2 tr5">
                                    <td><?php echo $sn++ ?></td>
                                    <td><?php echo $title ?></td>

                                    <td>
                                        <?php
                                         if($current_image != "") {

                                            ?>
                                                <img src="<?= SITE_URL_OR_HOME_URL; ?>images/category/<?php echo $current_image; ?>" width="100px" alt="Category Image">
                                            <?php

                                         } else {

                                            ?>
                                                <h3 style="color: red;">Image Not Added</h3>
                                            <?php

                                         }
                                        ?>
                                    </td>

                                    <td><?php echo $featured ?></td>
                                    
                                    <td><?php echo $active ?></td>

                                    <td>
                                        <a href="<?= SITE_URL_OR_HOME_URL; ?>admin/update_category.php?id=<?= mysqli_escape_string(mysql: $conn, string: $id); ?>&image_name=<?= mysqli_escape_string(mysql: $conn, string: $current_image); ?>" class="btn-secondary" title="Update Category" style="padding: 17px; border-radius: 5px;"><i class="fas fa-edit"></i></a>

                                        <a href="<?= SITE_URL_OR_HOME_URL; ?>admin_process/delete_category.php?id=<?= mysqli_escape_string(mysql: $conn, string: $id); ?>&image_name=<?= mysqli_escape_string(mysql: $conn, string: $current_image); ?>" class="btn-danger" title="Delete Category" style="padding: 17px; margin-left: 25px; border-radius: 5px;"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>

                            <?php

                        }

                    }

                }

            ?>

        </table>
    </div>
</div>

