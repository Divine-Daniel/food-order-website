<?php include ("../config/constant.php"); ?>

<?php

// Check  whether the submit button is working or not
if (isset($_POST["submit"])) {

    // echo $_SESSION["update"] = "<div class='success'><strong> Yeah: </strong> Button Has Been Clicked. </div>";

    // Process for Login
    // Get The Data From Login Form.
    $username = $_POST["username"];
    $password = md5($_POST["password"]);

    // 2. SQL tocheck whether the user with username and password exist or not.
    $sql = " SELECT * FROM tbl_admin WHERE username='$username' AND password='$password' ";

    // 3. Execute the query
    // $res = $conn->query($sql);
    $res = mysqli_query($conn, $sql);

    // 4. Count rows to check whether the user exist or not.
    // $count = mysqli_num_rows($res);
    $count = $res->num_rows;

    if ($count==1) {

        // User available and login successfully.
        $_SESSION["login_message"] = "<div class='success'><strong> Logged in!: </strong> Login Successfull. </div>";

        $_SESSION['user'] = $username; // To Check whether the user is logged in or not And logout will unset it
        
        // Redirect to Home page/Dashboard.
        header("location:" . SITE_URL_OR_HOME_URL . "admin/");

    } else {

        // User not available Login failed.
        $_SESSION["login_message"] = "<div class='error'> <strong>Try again!: </strong> Username or incorrect password. </div>";
        $_SESSION["keep"] = $_POST;
        // Redirect to login page.
        header("location:" . SITE_URL_OR_HOME_URL . "admin/login.php");

    }

}

?>