

<!-- main content goes here -->
 <div class="main_content">
    <div class="wrapper">
        <h1>Update Admin</h1>
        <br><br>

        <?php include_once("../admin_process/update_admin.php"); ?>

        <form action="" method="POST">

        <table class="tbl-30">

           <tbody>

              <tr>
                <td>Full Name: </td>
                <td>
                    <input type="text" name="full_name" value="<?php echo $fullname; ?>">
                </td>
              </tr>

              <tr>
                <td>Username: </td>
                <td>
                    <input type="text" name="username" value="<?php echo $username; ?>">
                </td>
              </tr>

              <tr>
                <td colspan="2">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <input type="submit" name="submit" value="Update Admin" class="btn-secondary" style="cursor: pointer; border-radius: 5px; border: none; padding: .8rem; font-size: 15.5px; margin-top: 1rem;">
                </td>
              </tr>

           </tbody>

        </table>

        </form>
    </div>
 </div>
