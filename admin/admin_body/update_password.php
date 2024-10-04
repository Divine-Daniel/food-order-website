
<div class="main_content">
    <div class="wrapper">

        <h1>Change Password</h1>
        <br>

        <?php include ("../admin_process/update_password.php"); ?>
        <br>

        <?php

        if (isset($_GET["id"])) {

            $id = mysqli_real_escape_string($conn, $_GET["id"]);

        }

        ?>

        <form action="" method="POST">

            <table class="tbl-30">

                <tr>
                    <td style="text-wrap: nowrap; padding-right: 2em;">Current Password: </td>
                    <td>
                        <input type="password" name="current_password" placeholder="Current Password">
                    </td>
                </tr>

                <tr>
                    <td style="text-wrap: nowrap; padding-right: 2em;">New Password: </td>
                    <td>
                        <input type="password" name="new_password" placeholder="New Password">
                    </td>
                </tr>

                <tr>
                    <td style="text-wrap: nowrap; padding-right: 2em;">Confirm Password: </td>
                    <td>
                        <input type="password" name="confirm_password" placeholder="Confirm Password">
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" name="submit" value="Change Password" class="btn-secondary"
                            style="cursor: pointer; border-radius: 5px; border: none; padding: .8rem; font-size: 15.5px; margin-top: 1rem;">
                    </td>
                </tr>

            </table>

        </form>

    </div>
</div>


