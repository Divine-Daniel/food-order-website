<?php

include_once('../config/constant.php');

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {

   // Get the values from category form
   $title = $_POST['title'];

   // For radio iput, we need to check whether the button is selected or not
   # featured radio input
   if(isset($_POST['featured'])) {

      # get the value from form
      $featured = $_POST['featured'];

   } else {

      # Set the defult value
      $featured = "No";

   }

   # Active radio input
   if(isset($_POST['active'])) {

      # Get the value from form
      $active = $_POST['active'];

   } else {

      # Set the defult value
      $active = "No";

   }


   // Check whether the image is selected or not and set the value for image name accordiling
   // echo '<pre>';
   // var_dump($_FILES['image']);
   // echo '</pre>';

   // die(); // Break the code here

   
   if(isset($_FILES['image']['name'])) {

      $image_name = $_FILES['image']['name'];

      if($image_name != '') {

         
         // Upload the image

         # To upload the image we need image name, source path and destination path
         # image name
         $image_name = $_FILES['image']['name'];

         // Auto rename our image
         // Get the extention of our initail image (jpg, png, gif, etc) e.g "Specialfood1.jpg"
         $ext_1 = explode('.', $image_name);
         $ext = end($ext_1);

         // Rename the image
         $image_name = "food_category_".rand(000, 999).'.'.$ext; // this will automatically change the name and give it a three digit random number of the image and also add the extension of the image e.g food_category_654.jpg

         # Source path
         $source_path = $_FILES['image']['tmp_name'];

         # Destination path
         $destination_path = "../images/category/".$image_name;

         // Finally upload the image
         $upload = move_uploaded_file($source_path, $destination_path);

         // Check whether the image is uploaded or not

         // And if the image is not uploaded then we will stop the process and redirect it with error message
         if($upload == false) {

            // Display message
            $_SESSION['upload'] = "<div class='error'><strong>Failed!: </strong> Failed to upload image. </div>";

            // Redurect to add_category.php
            header('location:' . SITE_URL_OR_HOME_URL . 'admin/add_category.php');

            // Stop the process
            die();

         }

      } else {

         $image_name = '';

      }

   } else {

      // Don`t upload the image and set the image_name to blank
      $image_name = "";

   }


   // 2. Create SQL Query to insert category into Database
   $sql = "INSERT INTO tbl_category SET 
      title = '$title',
      image_name = '$image_name',
      featured = '$featured',
      active = '$active'
   ";

   // Execute the query and save in the database
   // $res = $conn->query($sql);
   $res = mysqli_query($conn, $sql);

   // Checkwhether the query is executed ir not and data insrted or not
   if($res == true) {

      // Query Executed and Category Added
      $_SESSION['add'] = "<div class='success'><strong>Success!: </strong> Category Added Successfully. </div>";

      // Redirect to manage category
      header('location:' . SITE_URL_OR_HOME_URL . 'admin/manage_category.php');
      
   } else {
      
      // Failed to insert category data
      $_SESSION['add'] = "<div class='error'><strong>Failed!: </strong> Failed to Add Category. </div>";

      // Redirect to manage category page
      header('location:' . SITE_URL_OR_HOME_URL . 'admin/add_category.php');

   }

}

?>