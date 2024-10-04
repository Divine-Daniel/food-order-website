<?php

// include("../config/constant.php");

// Process the value from form and save it in Database
global $conn;

// Check whether the submit button is working or not
if (isset($_POST["submit"])) {

    //1. Get the Data from form
    $full_name = $_POST["full_name"];
    $username = $_POST["username"];
    // $password = password_hash($_POST["password"], PASSWORD_BCRYPT); //password Encryption with password_hash(PASSWORD_BCRYPT)
    $password = md5($_POST["password"]); //password Encryption with MD5

    //2. SQL Query to save the data into database
    $sql = "INSERT INTO tbl_admin SET
     full_name = '$full_name',
     username = '$username',
     password = '$password'
    ";

    //3. Execute Query and save Data in Database
    $res = mysqli_query($conn, $sql);

    //4. Check whether the (Query is Executed) data is inserted or not and display appropriate message
    if ($res == TRUE) {

        # Display: Data Inserted
        # Create a session variables to Display a message
        $_SESSION["add"] = "<div class='success'><strong>Success!: </strong> Admin Added Successfully</div>";

        # First Redirect to HomeURL Before Manage_admin_page, SITE_URL gives the value of our HOME_URL, But we need to Redirect this page to Manage_admin_page
        header("location:" . SITE_URL_OR_HOME_URL . "admin/manage_admin.php");

    } else {

        # Didsplay: Failed To Inserte Data
        # Create a session variables to Display a message
        $_SESSION["add"] = "<div class='error'><strong>Failed!: </strong> Failed To Add Admin</div>";

        # First Redirect to HomeURL Before Manage_admin_page, SITE_URL gives the value of our HOME_URL, But we need to Redirect this page to Manage_admin_page
        header("location:" . SITE_URL_OR_HOME_URL . "admin/add_admin.php");

    }


}


?>