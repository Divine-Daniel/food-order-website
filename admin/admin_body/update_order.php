
<?php


    if($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["order_id"])) {

        global $conn;

        $order_id = mysqli_real_escape_string($conn, $_GET["order_id"]);

        $sql = "SELECT * FROM tbl_order WHERE id = $order_id ;";
        $query = $conn->query($sql);

        if($query == TRUE) {

            $row = $query->fetch_assoc();

            $food = $row["food"];
            $price = $row["price"];
            $qty = $row["qty"];
            $status = $row["status"];
            $customer_name = $row["customer_name"];
            $customer_contact = $row["customer_contact"];
            $customer_email = $row["customer_email"];
            $customer_address = $row["customer_address"];
            
        } else {

            $_SESSION['update_failed'] = "<div class='error'>Oops Something went wrong. </div>";
            header("location: " . SITE_URL_OR_HOME_URL . "admin/manage_order.php");
            exit();

        }

    } else {

        header("location: manage_order.php");
        exit();

    }

?>
                        
    <div class="main_content">
        <div class="wrapper">
            <h1>Update Order</h1> <br>
            <br>

            <!-- Add Category Form Starts -->

                <form action="../admin_process/update_order_process.php" method="POST">

                    <table class="tbl-30">

                        <tr>
                            <td> <label for="food">Food Name: </label> </td>
                            <td>
                                <b><?= $food; ?></b>
                            </td>
                        </tr>

                        <tr>
                            <td> <label for="price">Price: </label> </td>
                            <td>
                                <b>$ <?= $price; ?></b>
                            </td>
                        </tr>

                        <tr>
                            <td> <label for="qty">Qty: </label> </td>
                            <td><input type="text" name="qty" id="qty" value="<?= $qty; ?>" style="width: 60%; outline: none;" required> </td>
                        </tr>

                        <tr>
                            <td> <label for="food">Status: </label> </td>
                            <td>
                                <select name="status" id="" style="width: 60%; outline: none;">
                                    <option <?php if($status == "Ordered") { echo "selected"; } ?> value="Ordered">Ordered</option>
                                    <option <?php if($status == "On Delivery") { echo "selected"; } ?> value="On Delivery">On Delivery</option>
                                    <option <?php if($status == "Delivered") { echo "selected"; } ?> value="Delivered">Delivered</option>
                                    <option <?php if($status == "Cancelled") { echo "selected"; } ?> value="Cancelled">Cancelled</option>
                                </select>
                            </td>
                        </tr>

                        
                        <tr>
                            <td> <label for="customer_name">Customer Name: </label> </td>
                            <td><input type="text" name="customer_name" id="customer_name" value="<?= $customer_name; ?>" style="width: 60%; outline: none;" required> </td>
                        </tr>

                        
                        <tr>
                            <td> <label for="customer_contact">Customer Contact: </label> </td>
                            <td><input type="text" name="customer_contact" id="customer_contact" value="<?= $customer_contact; ?>" style="width: 60%; outline: none;" required> </td>
                        </tr>

                        
                        <tr>
                            <td> <label for="customer_email">Customer Email: </label> </td>
                            <td><input type="email" name="customer_email" id="customer_email" value="<?= $customer_email; ?>" style="width: 60%; outline: none;" required> </td>
                        </tr>

                        
                        <tr>
                            <td> <label for="customer_address">Customer Address: </label> </td>
                            <td><textarea type="text" cols="30" rows="5" name="customer_address" id="customer_address" style="width: 60%; outline: none;" required><?= $customer_address; ?></textarea> </td>
                        </tr>

                        <tr>
                            <td colspan="2">

                                <input type="hidden" name="order_id" value="<?= $order_id; ?>">

                                <input type="hidden" name="price" value="<?= $price; ?>">

                                <button type="submit" name="update_order" class="btn-secondary" style="cursor: pointer; border-radius: 5px; border: none; padding: .8rem; font-size: 15.5px; margin-top: 1rem;"> Update Order </button>

                            </td>
                        </tr>

                    </table>

                </form>

            <!-- Add Category Form Ends -->
        </div>
    </div>

