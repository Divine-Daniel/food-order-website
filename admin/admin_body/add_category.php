


<div class="main_content">
    <div class="wrapper">
        <h1><span style="color: red;">Add</span> Category</h1> <br>

        <?php 
 
            if(isset($_SESSION['add'])) {

                # Display session message
                echo $_SESSION['add'];

                # Unset session message
                unset($_SESSION['add']);

            }
 
            if(isset($_SESSION['upload'])) {

                # Display session message
                echo $_SESSION['upload'];

                # Unset session message
                unset($_SESSION['upload']);

            }

        ?>
        
        <br>

        <!-- Add Category Form Starts -->

            <form action="../admin_process/add_category_process.php" method="POST" enctype="multipart/form-data">

                <table class="tbl-30">

                    <tr>
                        <td>Title: </td>
                        <td><input type="text" name="title" placeholder="Category Title"> </td>
                    </tr>

                    <tr>
                        <td style="text-wrap: nowrap;">Select Image: </td>
                        <td><input type="file" name="image"> </td>
                    </tr>

                    <tr>
                        <td>Featured: </td>

                        <td>
                        
                            <input type="radio" name="featured" id="featured_Yes" value="Yes"> <label for="featured_Yes">Yes</label>
                            <input type="radio" name="featured" id="featured_No" value="No"> <label for="featured_No">No</label>
                        
                        </td>
                    </tr>

                    <tr>
                        <td>Active: </td>
                    
                        <td>

                            <input type="radio" name="active" id="active_Yes" value="Yes">  <label for="active_Yes">Yes</label>
                            <input type="radio" name="active" id="active_No" value="No"> <label for="active_No">No</label> 

                        </td>
                    </tr>

                    <tr>
                        <td colspan="2">
                            <button type="submit" name="submit" class="btn-secondary" style="cursor: pointer; border-radius: 5px; border: none; padding: .8rem; font-size: 15.5px; margin-top: 1rem;"> Add Category</button>
                        </td>
                    </tr>

                </table>

            </form>

        <!-- Add Category Form Ends -->
    </div>
</div>

