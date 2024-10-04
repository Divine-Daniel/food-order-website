<!-- Add Admin Process Backend Page -->

<?php include_once ("../admin_process/add_admin_process.php"); ?>

<div class="main_content">
    <div class="wrapper">

        <h1>Add Admin</h1>
        <br><br>

        <!-- Displaying Session message if user Inserted the neccesary info required -->
        <?php
        // Checking whether the session is set or not 
        if (isset($_SESSION["not_added"])) {

            echo $_SESSION["not_added"]; // Displaying Session Message if set
            unset($_SESSION["not_added"]); // Removing session Message
        
        }
        ?>

        <form action="" method="POST">

            <table class="tbl-30">

                <tr>
                    <td>Full Name: </td>
                    <td>
                        <input type="text" name="full_name" placeholder="Enter Your Name" required>
                    </td>
                </tr>

                <tr>
                    <td>Username: </td>
                    <td>
                        <input type="text" name="username" placeholder="Your Username" required>
                    </td>
                </tr>

                <tr>
                    <td>Password: </td>
                    <td>
                        <input type="password" name="password" placeholder="Your Password" required>
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Admin" class="btn-secondary" style="cursor: pointer; border-radius: 5px; border: none; padding: .8rem; font-size: 15.5px; margin-top: 1rem;">
                    </td>
                </tr>

            </table>

        </form>
    </div>
</div>
