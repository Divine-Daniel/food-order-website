<?php

// Check whether the submit Button is clicked or not
if (isset($_POST["submit"])) {

    // echo "<div class='success'><strong>Success!: </strong> Button Has Been Clicked. </div>";

    // 1. Get the Data from Form
    // $id = mysqli_real_escape_string($conn, $_POST["id"]);
    $id = $_POST["id"];

    $current_password = mysqli_real_escape_string($conn, md5($_POST["current_password"]));
    // $current_password = mysqli_real_escape_string($conn, password_hash($_POST["password"], PASSWORD_BCRYPT));
    // $current_password = password_hash($_POST["current_password"], PASSWORD_BCRYPT);
    // $current_password = md5($_POST["current_password"]);

    $new_password = mysqli_real_escape_string($conn, md5($_POST["new_password"]));
    // $new_password = mysqli_real_escape_string($conn, password_hash($_POST["new_password"], PASSWORD_BCRYPT));
    // $new_password = password_hash($_POST["new_password"], PASSWORD_BCRYPT);
    // $new_password = md5($_POST["new_password"]);

    $confirm_password = mysqli_real_escape_string($conn, md5($_POST["confirm_password"]));
    // $confirm_password = mysqli_real_escape_string($conn, password_hash($_POST["confirm_password"], PASSWORD_BCRYPT));
    // $confirm_password = password_hash($_POST["confirm_password"], PASSWORD_BCRYPT);
    // $confirm_password = md5($_POST["confirm_password"]);

    // 2b. Execute the Query
    // 2. Check whether the user with the current ID and current password exist or not
    $sql = "SELECT * FROM tbl_admin WHERE id=$id AND password='$current_password'";

    // $res = mysqli_query($conn, $sql);
    $res = $conn->query($sql);

    if ($res==true) {

        // 2c. Check whether Data is Available or not
        // $count = mysqli_num_rows($res);
        $count = $res->num_rows;

        if ($count==1) {

            // 2d. User Exist and Password can be changed
            // echo "<div class='success'><strong>Yeah!: </strong> User Found. </div>";

            // 3. Check whether the New password and the Current password Match or NOt
            if ($new_password==$confirm_password) {

                // echo "<div class='success'><strong>Yeah!: </strong> Password Match. </div>";

                // 3b. Updated The Password
                $sql2 = " UPDATE tbl_admin SET password='$new_password' WHERE id=$id ";

                // 3c. Execute the Query.
                $res2 = $conn->query($sql2);
                
                // 3d. Check Whether The Query Executed Or Not
                if ($res2 == true) {

                    // Display Message
                    // Redirect To Manage Admin Page With success Message
                    $_SESSION["pwd_updated"] = "<div class='success'><strong>Changed!: </strong> Password Changed Successfully. </div>";
                    // Redirect the User to Manage Admin Page.
                    header("location:" . SITE_URL_OR_HOME_URL . "admin/manage_admin.php");

                } else {

                    // Display Error Message.
                    // Redirect To Manage Admin Page With Error Message
                    $_SESSION["pwd_updated"] = "<div class='error'><strong>Try Again!: </strong> Failed To Change Password. </div>";
                    // 2e(a). Redirect the User to Manage Admin Page.
                    header("location:" . SITE_URL_OR_HOME_URL . "admin/manage_admin.php");

                }

            } else {

                // Redirect To Manage Admin Page With Error Message
                $_SESSION["pwd_not_match"] = "<div class='error'><strong>Try Again!: </strong> Password Did Not Match. </div>";
                // 2e(a). Redirect the User to Manage Admin Page.
                header("location:" . SITE_URL_OR_HOME_URL . "admin/manage_admin.php");

            }

        } else {

            // 2e. User Does not Exist Set message and Redirect
            $_SESSION["user_not_found"] = "<div class='error'><strong>Sorry!: </strong> User Not Found. </div>";
            // 2e(a). Redirect the User to Manage Admin Page.
            header("location:" . SITE_URL_OR_HOME_URL . "admin/manage_admin.php");

        }

    }


    // 4. Change password if all above is True

}

?>