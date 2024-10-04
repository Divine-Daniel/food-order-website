

   <!-- main content section starts -->
   <div class="main_content">
       <div class="wrapper">

       <h1><span style="color: red;">Customer</span> Order</h1> <br><br>

       <?php 
       
        if($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["order_id"])) {

            $order_id = filter_input(INPUT_GET, "order_id", FILTER_SANITIZE_NUMBER_INT);

            $sql = " SELECT * FROM tbl_order WHERE id = ? ;";
            $query = $conn->prepare($sql);
            $query->bind_param("s", $order_id);
            $query->execute();
            $res = $query->get_result();
            $row = $res->fetch_assoc();

            ?>

                <div class="" style="width: 100%; margin: 25px auto; border: 2px solid red; padding: 40px 0 70px 40px; border-radius: 8px;">

                    <h1 class="text-center" style="margin-bottom: 60px;"><span style="color: red; margin-top: 50px;">Order From </span><?= $row["customer_name"]; ?></h1>

                    <div style="width: 96%; background-color: coral; color: white; margin-top: 40px; padding-left: 20px; padding-top: 15px; padding-bottom: 15px; border-radius: 5px;">

                        <strong style="color: black;"><b> Customer Name: </b></strong>

                        <p style="margin-top: 10px; color: white; background-color: grey; margin-right: 10px; padding: 20px 10px; border-radius: 5px; line-height: 1.2;">
                            <?= $row["customer_name"]; ?>
                        </p>

                    </div>

                    <div style="display: flex; width: 96%; justify-content: space-between;">
                        
                        <div style="width: 32%; background-color: coral; color: white; margin-top: 40px; padding-left: 20px; padding-top: 15px; padding-bottom: 15px; border-radius: 5px;">

                            <strong style="color: black;"><b>Customer Phone No: </b></strong>

                            <p style="margin-top: 10px; color: white; background-color: grey; margin-right: 10px; padding: 20px 10px; border-radius: 5px; line-height: 1.2;">
                                <?= $row["customer_contact"]; ?>
                            </p>

                        </div>

                        <div style="width: 32%; float: right; background-color: coral; color: white; margin-top: 40px; padding-left: 20px; padding-top: 15px; padding-bottom: 15px; border-radius: 5px;">

                            <strong style="color: black;"><b> Customer Email: </b></strong>

                            <p style="margin-top: 10px; color: white; background-color: grey; margin-right: 10px; padding: 20px 0 20px 15px; border-radius: 5px; line-height: 1.2; overflow: hidden;">
                                <?= $row["customer_email"]; ?>
                            </p>

                        </div>

                        <div style="width: 32%; float: right; background-color: coral; color: white; margin-top: 40px; padding-left: 20px; padding-top: 15px; padding-bottom: 15px; border-radius: 5px;">

                            <strong style="color: black;"><b> Customer Address: </b></strong>

                            <p style="margin-top: 10px; color: white; background-color: grey; margin-right: 10px; padding: 20px 0 20px 15px; border-radius: 5px; line-height: 1.2; overflow: hidden;">
                                <?= $row["customer_address"]; ?>
                            </p>

                        </div>
                        
                    </div>

                    <div style="display: flex; width: 96%; justify-content: space-between;">
                        
                        <div style="width: 32%; background-color: coral; color: white; margin-top: 40px; padding-left: 20px; padding-top: 15px; padding-bottom: 15px; border-radius: 5px;">

                            <strong style="color: black;"><b>Ordered Food: </b></strong>

                            <p style="margin-top: 10px; color: white; background-color: grey; margin-right: 10px; padding: 20px 10px; border-radius: 5px; line-height: 1.2;">
                                <?= $row["food"]; ?>
                            </p>

                        </div>

                        <div style="width: 32%; float: right; background-color: coral; color: white; margin-top: 40px; padding-left: 20px; padding-top: 15px; padding-bottom: 15px; border-radius: 5px;">

                            <strong style="color: black;"><b> Food Price: </b></strong>

                            <p style="margin-top: 10px; color: white; background-color: grey; margin-right: 10px; padding: 20px 0 20px 15px; border-radius: 5px; line-height: 1.2; overflow: hidden;">
                                $.<?= $row["price"]; ?>
                            </p>

                        </div>

                        <div style="width: 32%; float: right; background-color: coral; color: white; margin-top: 40px; padding-left: 20px; padding-top: 15px; padding-bottom: 15px; border-radius: 5px;">

                            <strong style="color: black;"><b> Food Quantity: </b></strong>

                            <p style="margin-top: 10px; color: white; background-color: grey; margin-right: 10px; padding: 20px 0 20px 15px; border-radius: 5px; line-height: 1.2; overflow: hidden;">
                                <?= $row["qty"]; ?>
                            </p>

                        </div>
                        
                    </div>

                    <div style="display: flex; width: 96%; justify-content: space-between;">
                        
                        <div style="width: 32%; background-color: coral; color: white; margin-top: 40px; padding-left: 20px; padding-top: 15px; padding-bottom: 15px; border-radius: 5px;">

                            <strong style="color: black;"><b>Total Order: </b></strong>

                            <p style="margin-top: 10px; color: white; background-color: grey; margin-right: 10px; padding: 20px 10px; border-radius: 5px; line-height: 1.2;">
                                $.<?= $row["total"]; ?>
                            </p>

                        </div>

                        <div style="width: 32%; float: right; background-color: coral; color: white; margin-top: 40px; padding-left: 20px; padding-top: 15px; padding-bottom: 15px; border-radius: 5px;">

                            <strong style="color: black;"><b> Order Date: </b></strong>

                            <p style="margin-top: 10px; color: white; background-color: grey; margin-right: 10px; padding: 20px 0 20px 15px; border-radius: 5px; line-height: 1.2; overflow: hidden;">
                                <?= $row["order_date"]; ?>
                            </p>

                        </div>

                        <div style="width: 32%; float: right; background-color: coral; color: white; margin-top: 40px; padding-left: 20px; padding-top: 15px; padding-bottom: 15px; border-radius: 5px;">

                            <strong style="color: black;"><b> Order Status: </b></strong>

                            <p style="margin-top: 10px; color: white; background-color: grey; margin-right: 10px; padding: 20px 0 20px 15px; border-radius: 5px; line-height: 1.2; overflow: hidden;">
                                <?php

                                    if($row["status"] == "Ordered") {

                                ?>

                                    <label style="font-size: 13px; border-radius: 5px; background-color: black; color: white; padding: 10px;"> <?= $row["status"]; ?> </label>

                                <?php

                                    } elseif($row["status"] == "On Delivery") {

                                ?>

                                    <label style="font-size: 13px; border-radius: 5px; background-color: orange; color: white; padding: 10px; text-wrap: nowrap;"> <?= $row["status"]; ?> </label>

                                <?php

                                    } elseif($row["status"] == "Delivered") {

                                ?>

                                    <label style="font-size: 13px; border-radius: 5px; background-color: green; color: white; padding: 10px;"> <?= $row["status"]; ?> </label>

                                <?php

                                    } elseif($row["status"] == "Cancelled") {

                                ?>

                                    <label style="font-size: 13px; border-radius: 5px; background-color: red; color: white; padding: 10px;"> <?= $row["status"]; ?> </label>

                                <?php

                                    }

                                ?>

                            </p>

                        </div>
                        
                    </div>

                    <a href="<?= SITE_URL_OR_HOME_URL; ?>admin/manage_order.php">
                    <button style="background-color: coral; color: black; padding: 17px 25px; margin-top: 35px; border-radius: 7px; border: none; font-size: 20px; font-weight: 700; cursor: pointer; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;"> Go Back </button>
                    </a>
                    
                </div>

            <?php
            

        } else {

            redirect(SITE_URL_OR_HOME_URL . "admin/manage_message.php");
            die();

        }
       
       ?>

        <div class="clearfix"></div>

       </div>
   </div>
   <!-- main content section ends -->

