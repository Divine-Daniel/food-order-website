<?php

// 1. Get the ID of selected Admin.
// $id = $_GET["id"];
$id = mysqli_real_escape_string($conn, $_GET["id"]);

// 2. Create SQL Query To Get The Details
$sql = " SELECT * FROM tbl_admin WHERE id=$id ";

// 3. Execute the Query
// $res = mysqli_query($conn, $sql);
$res = $conn->query($sql);

// Check whether the Query is executed or not
if ($res == true) {

    // 4. Check whether the data is available or not
    // $count = $res->num_rows;
    $count = mysqli_num_rows($res);

    // 5. Check whether we have admin data or not
    if ($count == 1) {

        // 6. Get the Details
        // $_SESSION["update"] = "<div class='success'><strong>Yeah!: </strong> Admin Is Available. </div>";
        $row = mysqli_fetch_assoc($res);

        $fullname = $row["full_name"];
        $username = $row["username"];

    } else {

        // 6b. Redirect To Manage Admin Page
        header("location:" . SITE_URL_OR_HOME_URL . "admin/manage_admin.php");

    }

}

?>

<?php

$submit = isset($_POST["submit"]);

// check whether the submit button is clicked or not
if($submit == true) {

    // $_SESSION["update"] = "<div class='success'><strong>Success!: </strong> Admin Button Clicked Successfully </div>";
    // Get All The Value From Form To Update
    $id = mysqli_real_escape_string($conn, $_POST["id"]);
    $fullname = mysqli_real_escape_string($conn, $_POST["full_name"]);
    $username = mysqli_real_escape_string($conn, $_POST["username"]);

    $sql = " UPDATE tbl_admin SET full_name = '$fullname', username = '$username' WHERE id=$id ";
    // $res = $conn->query($sql);

    // Execute The Query.
    $res = mysqli_query($conn, $sql);

    // Check whether The Query Is Executed Successfully Or Not
    if($res == true) {

        // Query Executed And Admin Updated.
        $_SESSION["update"] = "<div class='success'><strong>Success!: </strong> Admin Updated Successfully. </div>";

        // Redirect To Manage Admin Page.
        header("location:".SITE_URL_OR_HOME_URL."admin/manage_admin.php");

    }else {
        
        // Failed To Updated.
        // Query Executed And Admin Updated.
        $_SESSION["update"] = "<div class='error'><strong>Ooh Sorry!: </strong> Failed To Update Admin. </div>";

        // Redirect To Manage Admin Page.
        header("location:".SITE_URL_OR_HOME_URL."admin/manage_admin.php");

    }

}

?>