<?php

    if(empty($_SESSION['user'])) {

        // display error message
        $_SESSION['login_check'] = "<div class='error'><strong> Login!: </strong> please Login to access admin panel. </div>";

        // Redirect to login page
        header("location:" . SITE_URL_OR_HOME_URL . "admin/login.php");

    }

?>