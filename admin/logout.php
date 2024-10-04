<?php

// Include constant.php
include("../config/constant.php");

// Destroy the session we have create so far
session_destroy(); // This will destroy $_SESSION['user'];

// Redirect to login page
header("location:" . SITE_URL_OR_HOME_URL . "admin/login.php");

?>