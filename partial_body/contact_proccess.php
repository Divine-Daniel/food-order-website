<?php

    if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["submit"])) {

        require_once("../config/constant.php");

        $fname = filter_input(INPUT_POST, "fname", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $lname = filter_input(INPUT_POST, "lname", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $phone = filter_input(INPUT_POST, "phone", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
        $message = filter_input(INPUT_POST, "message", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $date = date("Y-m-d  h:i:sa");

        if(!$fname) {

            $_SESSION["fname"] = "First Name Is Required";

        } elseif(!$lname) {

            $_SESSION["lname"] = "Last Name Is Required";

        } elseif(!$phone) {

            $_SESSION["phone"] = "Phone Number Is Required";

        } elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {

            $_SESSION["email"] = "Enter Valid Email";

        } elseif(!$message) {

            $_SESSION["message"] = "Your Message Please";

        }

        if(isset($_SESSION["fname"]) || isset($_SESSION["lname"]) || isset($_SESSION["phone"]) || isset($_SESSION["email"]) || isset($_SESSION["message"])) {

            $_SESSION["k_err"] = $_POST;

            redirect(SITE_URL_OR_HOME_URL . "contact.php");

        } else {
            
            $sql = "INSERT INTO contact ( fname, lname, phone, email, message, date ) VALUE ( ?, ?, ?, ?, ?, ? ) ;";

            $stmt = $conn->prepare($sql);

            $stmt->bind_param("ssssss", $fname, $lname, $phone, $email, $message, $date);

            $res = $stmt->execute();

            if($res === TRUE) {

                $_SESSION["suc"] = "Message Send Successfully";
                redirect( SITE_URL_OR_HOME_URL . "contact.php");
                die();

            } else {

                $_SESSION["err"] = "Failed To Send Your Message, Try Again";
                redirect( SITE_URL_OR_HOME_URL . "contact.php");
                die();

            }

        }

    } else {

        redirect( SITE_URL_OR_HOME_URL . "contact.php");
        die();

    }

?>