
<div class="main_content">
    <div class="wrapper_full">
        <h1><span style="color: red;">Manage</span> Order</h1>

        <br>

        <?php

            if(isset($_SESSION["update_failed"])) {

                echo $_SESSION["update_failed"]; // display message
                unset($_SESSION["update_failed"]); // remove the message

            }

        ?>

        <br> 

        <table class="tbl-full">
            <tr class="tr">
                <th>S.N </th>
                <th>Food</th>
                <th>Price</th>
                <th>Ord.Date</th>
                <th>Status</th>
                <th>Name</th>
                <th>Actions</th>
            </tr>

            <?php

                $sn = 1;
                $sql = " SELECT * FROM tbl_order ORDER BY id DESC;";
                $query = $conn->query($sql);

                if ($query == true) {
                    
                    $count = $query->num_rows;

                    if ($count > 0) {
                        
                        // order details is available
                        while ($rows = $query->fetch_assoc()) {
                            
                            $id = $rows["id"];
                            $food = $rows["food"];
                            $price = $rows["price"];
                            $order_date = $rows["order_date"];
                            $status = $rows["status"];
                            $customer_name = $rows["customer_name"];

                            ?>

                                <tr class="tr2 tr5">

                                    <td><?= $sn++; ?>. </td>

                                    <td class="td"><?= substr($food, 0, 15); ?>. </td>

                                    <td>$.<?= $price; ?> </td>

                                    <td class="nowrap"><?= $order_date; ?> </td>


                                    <td>
                                    
                                        <?php

                                            if($status == "Ordered") {

                                                ?>

                                                    <label style="font-size: 13px; border-radius: 5px; background-color: black; color: white; padding: 10px;"> <?= $status; ?> </label>

                                                <?php

                                            } elseif($status == "On Delivery") {

                                                ?>

                                                    <label style="font-size: 13px; border-radius: 5px; background-color: orange; color: white; padding: 10px; text-wrap: nowrap;"> <?= $status; ?> </label>

                                                <?php

                                            } elseif($status == "Delivered") {

                                                ?>

                                                    <label style="font-size: 13px; border-radius: 5px; background-color: green; color: white; padding: 10px;"> <?= $status; ?> </label>

                                                <?php

                                            } elseif($status == "Cancelled") {

                                                ?>

                                                    <label style="font-size: 13px; border-radius: 5px; background-color: red; color: white; padding: 10px;"> <?= $status; ?> </label>

                                                <?php

                                            }

                                        ?>

                                    </td>

                                    
                                    <td class="td"><?= substr($customer_name, 0, 15); ?>.. </td>

                                    <td class="nowrap">

                                        <a href="<?= SITE_URL_OR_HOME_URL; ?>admin/view_order.php?order_id=<?= mysqli_real_escape_string($conn, $id); ?>" class="btn-primary" title="View Order" style="padding: 13px; border-radius: 5px;"><i class="fas fa-eye"></i></a>

                                        <a href="<?= SITE_URL_OR_HOME_URL; ?>admin/update_order.php?order_id=<?= mysqli_real_escape_string($conn, $id); ?>" class="btn-secondary" title="Update Order" style="padding: 13px; border-radius: 5px; margin-left: 9px;"><i class="fas fa-edit"></i></a>

                                        <a href="<?= SITE_URL_OR_HOME_URL; ?>admin_process/delete_order.php?order_delete_id=<?= mysqli_real_escape_string($conn, $id); ?>" class="btn-danger" title="Delete Order" style="padding: 13px; margin-left: 9px; border-radius: 5px;"><i class="fas fa-trash"></i></a>

                                    </td>


                                </tr>

                            <?php
                            
                        }
                        
                    } else {

                        // Order details not available
                        echo "<tr> <td colspan='12' class='error'> Order Details Not Found. </td> </tr>";
                        die();

                    }
                    
                } else {

                    echo "<tr> <td colspan='12' class='error'> Something went wrong, Try again later. </td> </tr>";
                    die();

                }

            ?>
            
        </table>
    </div>
</div>

