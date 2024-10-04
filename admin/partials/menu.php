<?php

include("../config/constant.php");

include('login_check.php');

 ?>


<DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewpoint" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/admin.css">
        <link rel="stylesheet" href="../css/utility.css">
        <link rel="stylesheet" href="../css/all.min.css">
        <!-- <link rel="shortcut icon" href="/images/logo.png" type="image/x-icon"> -->
        <title> food 0rder websites - Admin Panel </title>
    </head>

    <body>


        <!-- menu section starts -->
        <div class="menu text-center">
            <div class="wrapper">
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="manage_admin.php">Admin</a></li>
                    <li><a href="manage_category.php">Category</a></li>
                    <li><a href="manage_food.php">Food</a></li>
                    <li><a href="manage_order.php">Order</a></li>
                    <li><a href="manage_message.php">Message</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </div>
        </div>
        <!-- menu section ends -->
