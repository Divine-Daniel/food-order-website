

<!-- main content section starts -->
<div class="main_content">
    <div class="wrapper">
        <h1><span style="color: red;">Manage</span> Admin</h1>

        <br>

        <!-- Displaying Session message if user Inserted the neccesary info required -->
        <?php

        if (isset($_SESSION["add"])) {

            # Display Session message
            echo $_SESSION["add"]; // Displaying Session Message
            unset($_SESSION["add"]); // Removing Session Message
        
        }

        if (isset($_SESSION["delete"])) {

            # Display Session message
            echo $_SESSION["delete"]; // Displaying Session message
            unset($_SESSION["delete"]); // Removing Session Message
        
        }

        if (isset($_SESSION["update"])) {

            # Display Session message
            echo $_SESSION["update"]; // Displaying Session message
            unset($_SESSION["update"]); // Removing Session Message
        
        }

        if (isset($_SESSION["user_not_found"])) {

            # Display Session message
            echo $_SESSION["user_not_found"]; // Displaying Session message
            unset($_SESSION["user_not_found"]); // Removing Session Message
        
        }

        if (isset($_SESSION["pwd_not_match"])) {

            # Display Session message
            echo $_SESSION["pwd_not_match"]; // Displaying Session message
            unset($_SESSION["pwd_not_match"]); // Removing Session Message
        
        }

        if (isset($_SESSION["pwd_updated"])) {

            # Display Session message
            echo $_SESSION["pwd_updated"]; // Displaying Session message
            unset($_SESSION["pwd_updated"]); // Removing Session Message
        
        }

        ?>
        <!-- Displaying Session message if user Inserted the neccesary info required -->

        <br> <br>

        <!-- Button to Add Admin -->
        <a href="add_admin.php" class="btn-primary">Add Admin</a>

        <br> <br> <br> <br>


        <table class="tbl-full">
            <tr>
                <th>S.N </th>
                <th>Full Name</th>
                <th>Username</th>
                <th>Actions</th>
            </tr>


            <?php

            // Query to get all the Admin
            $sql = " SELECT * FROM tbl_admin ";

            // Execute the Query
            $res = mysqli_query($conn, $sql);

            $sn = 1; // Create a valriable and assign value to it.
            
            // Conditional statement: Check whether the Query is Executed or Not
            if ($res == true) {

                # (First to do is to Count Rows: Which Means if the data is inserted we have multiple Rows Values, if we don`t have any admin then thier would`t any Rows) Count Rows To Check Whether We Have Date In Our Database Or Not
                $count = mysqli_num_rows($res); // Functions to get all Rows in the Database.
            
                // Check the number of Rows if Variable Count is Greater than Zero(0) { Conditional Statement }
                if ($count > 0) {

                    // Which means we have data in database
                    while ($rows = mysqli_fetch_assoc($res)) { # (mysqli_fetch_assoc) -> will fetch all the data in database and install it in variables Rows we just created.
            
                        // Using while loop to get all the data from database.
                        // And while_loop will run as long as we have data in database.
            
                        // Get Individual Data in Database.
                        $id = $rows["id"];
                        $full_name = $rows["full_name"];
                        $username = $rows["username"];

                        // Displaying the values in our Tables.
            
                        ?>



                        <tr class="tr2 tr5">
                            <td> <?php echo $sn++; ?>. </td>
                            <td> <?php echo $full_name; ?> </td>
                            <td> <?php echo $username; ?> </td>
                            <td>
                                <a href="<?php echo SITE_URL_OR_HOME_URL; ?>admin/update_password.php?id=<?php echo $id; ?>" class="btn-primary" title="Change Password" style="padding: 13px; border-radius: 5px;"><i class="fas fa-edit"></i></a>

                                <a href="<?php echo SITE_URL_OR_HOME_URL; ?>admin/update_admin.php?id=<?php echo $id; ?>" class="btn-secondary" title="Update Admin" style="padding: 13px; border-radius: 5px; margin: 0 20px;"><i class="fas fa-edit"></i></a>

                                <a href="<?php echo SITE_URL_OR_HOME_URL; ?>admin_process/delete_admin.php?id=<?php echo $id; ?>" class="btn-danger" title="Delete Admin" style="padding: 13px; border-radius: 5px;"><i class="fas fa-trash"></i></a>

                            </td>
                        </tr>



                        <?php



                    }

                } else {

                    // which means we do not have data in database
                    echo "<h1 style='color: red;'> No data found </h1>";
            
                }

            }

            ?>

        </table>
    </div>
</div>
<!-- main content section ends -->

