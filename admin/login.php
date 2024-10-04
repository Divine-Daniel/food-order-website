<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/admin.css">
    <link rel="stylesheet" href="../css/utility.css">
    <title>Login - Food Order System</title>
</head>

<body>

    <div class="login">

        <h1 class="text-center">Login</h1><br>

        <?php include("../admin_process/login_process.php"); ?>

        <?php

            $username = $_SESSION["keep"]["username"] ?? null;
            $password = $_SESSION["keep"]["password"] ?? null;

            unset($_SESSION["keep"]);

        ?>

        <?php
        
            // Session message
            if(isset($_SESSION["login_message"])) {

                # Display Session message
                echo $_SESSION["login_message"];  // Display message

                unset($_SESSION["login_message"]); // Remove the message.

            }

        ?> <br>

        <?php
        
            // Session message
            if(isset($_SESSION["login_check"])) {

                # Display Session message
                echo $_SESSION["login_check"];  // Display message

                unset($_SESSION["login_check"]); // Remove the message.

            }

        ?> <br>

        <!-- Login Form Starts Here -->
        <form action="../admin_process/login_process.php" method="POST">

            <label for="username">Username:</label> <br>
            <input type="text" name="username" value="<?= $username; ?>" placeholder="Enter Username" id="username"> <br><br>

            <label for="password">Password:</label> <br>
            <input type="password" name="password" value="<?= $password; ?>" placeholder="Enter Password" id="password"> <br>

            <input type="submit" name="submit" value="Login" class="btn-primary input"><br><br>

        </form>
        <!-- Login Form Ends Here -->

        <p class="text-center">Created By - <a href="divinedanial13.com">Divine Daniel</a></p>
    </div>

</body>

</html>
