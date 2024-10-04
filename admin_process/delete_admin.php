<?php
// include constant.php file here
include("../config/constant.php");

// 1. Get the id of admin to be deleted
// $id = $_GET['id']; //same as above

$id = mysqli_real_escape_string($conn, $_GET["id"]);

// 2. Create SQL Query to delete admin
$sql = "DELETE FROM tbl_admin WHERE id=$id";

// 3. Execute the query
// $res = mysqli_query($conn, $sql); // same as above
$res = $conn->query($sql);

// Check whether the query executed successfully or not
if ( /* isset($res): same as above */ $res == true ) {

    // Query Executed Successfully and Admin Deleted
    // echo "<h2> Admin Deleted Successfully </h2>";
    // Create Session Variable to Display Message
    $_SESSION["delete"] = "<div class='success'><strong>Success!: </strong> Admin Deleted Successfully </div>";

    // Redirect To Manage_admin.php Page
    header("location:" . SITE_URL_OR_HOME_URL . "admin/manage_admin.php");

}else {

    // Failed to Delete Admin
    // echo "<h2> Failed To Delete Admin </h2>";
    // Create Session Variable to Display Error Message
    $_SESSION["delete"] = "<div class='error'><strong>Failed!: </strong> Failed To Delete Admin. Try Again Later. </div>";

    // Redirect To Manage_admin.php Page.
    header("Location:" . SITE_URL_OR_HOME_URL . "admin/manage_admin.php");

}

// 4. Redirect to manage admin page with message ( Success or Danger[ error ] )

?>