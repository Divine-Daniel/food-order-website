

   <!-- main content section starts -->
   <div class="main_content">
       <div class="wrapper">

       <h1><span style="color: red;">Customer</span> Message</h1> <br><br>

       <?php 
       
        if($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["message_id"])) {

            $message_id = filter_input(INPUT_GET, "message_id", FILTER_SANITIZE_NUMBER_INT);

            $sql = " SELECT * FROM contact WHERE id = ? ;";
            $query = $conn->prepare($sql);
            $query->bind_param("s", $message_id);
            $query->execute();
            $res = $query->get_result();
            $row = $res->fetch_assoc();

            ?>

                <div class="" style="width: 100%; margin: 25px auto; border: 2px solid red; padding: 40px 0 70px 40px; border-radius: 8px;">

                    <h1 class="text-center" style="margin-bottom: 60px;"><span style="color: red; margin-top: 50px;">Message From </span><?= $row["fname"] . " " . $row["lname"]; ?></h1>

                    <div style="width: 96%; background-color: coral; color: white; margin-top: 40px; padding-left: 20px; padding-top: 15px; padding-bottom: 15px; border-radius: 5px;">

                        <strong style="color: black;"><b> Customer Name: </b></strong>

                        <p style="margin-top: 10px; color: white; background-color: grey; margin-right: 10px; padding: 20px 10px; border-radius: 5px; line-height: 1.2;">
                            <?= $row["fname"] . " " . $row["lname"]; ?>
                        </p>

                    </div>

                    <div style="display: flex; width: 96%; justify-content: space-between;">
                        
                        <div style="width: 48%; background-color: coral; color: white; margin-top: 40px; padding-left: 20px; padding-top: 15px; padding-bottom: 15px; border-radius: 5px;">

                            <strong style="color: black;"><b> <?= $row['fname']; ?> Phone No: </b></strong>

                            <p style="margin-top: 10px; color: white; background-color: grey; margin-right: 10px; padding: 20px 10px; border-radius: 5px; line-height: 1.2;">
                                <?= $row["phone"]; ?>
                            </p>

                        </div>

                        <div style="width: 48%; float: right; background-color: coral; color: white; margin-top: 40px; padding-left: 20px; padding-top: 15px; padding-bottom: 15px; border-radius: 5px;">

                            <strong style="color: black;"><b> <?= $row['fname']; ?> Email: </b></strong>

                            <p style="margin-top: 10px; color: white; background-color: grey; margin-right: 10px; padding: 20px 0 20px 15px; border-radius: 5px; line-height: 1.2; overflow: hidden;">
                                <?= $row["email"]; ?>
                            </p>

                        </div>
                        
                    </div>
                    
                    <div style="width: 96%; background-color: coral; color: white; margin-top: 40px; padding-left: 20px; padding-top: 15px; padding-bottom: 15px; border-radius: 5px;">

                        <h2 style="color: black; margin-bottom: 30px; margin-top: 10px; font-size: 30px;" class="text-center"><?= $row['fname'] . " " . $row['lname']; ?>`s Message </h2>

                        <p style="margin-top: 10px; color: white; background-color: grey; margin-right: 10px; padding: 30px 20px; border-radius: 5px; line-height: 1.5; word-spacing: 3px;">
                            <?= $row["message"]; ?>
                        </p>

                    </div>

                    <a href="<?= SITE_URL_OR_HOME_URL; ?>admin/manage_message.php">
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

