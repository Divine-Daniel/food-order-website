

        <!-- main content section starts -->
        <div class="main_content">
            <div class="wrapper">

            <h1> DASHBOARD </h1><marquee behavior="smooth" direction=""><h1> FOOD RESTURANT </h1></marquee> <br><br>

                <?php
        
                    // Session message
                    if (isset($_SESSION["login_message"])) {

                        # Display Session message
                        echo $_SESSION["login_message"];  // Display message
                        unset($_SESSION["login_message"]); // Remove the message.

                    }

                ?> <br>

                <div class="col-4 text-center">

                    <?php 
                    
                        global $conn;

                        $sql = " SELECT * FROM tbl_category ;";

                        $query = $conn->query($sql);

                        $count = $query->num_rows;
                    
                    ?>

                    <h1><?= $count; ?></h1>

                    <br>

                    Categories

                </div>



                <div class="col-4 text-center">

                    <?php 
                        
                        global $conn;

                        $sql2 = " SELECT * FROM tbl_food ;";

                        $query2 = $conn->query($sql2);

                        $count2 = $query2->num_rows;
                    
                    ?>

                    <h1> <?= $count2; ?> </h1>

                    <br>

                    Foods

                </div>

                <div class="col-4 text-center">

                    <?php

                        $sql3 = " SELECT * FROM tbl_order ;";
                        $query3 = $conn->query($sql3);

                        $count3 = $query3->num_rows;

                    ?>

                    <h1> <?= $count3 ?> </h1>
                    <br>
                    Total Ordered
                </div>

                <div class="col-4 text-center">

                    <?php
                        $status = "Delivered";
                        $sql4 = " SELECT SUM(total) AS Total FROM tbl_order WHERE status = '$status';";
                        $query4 = $conn->query($sql4);

                        $rows = $query4->fetch_assoc();

                        $total_revenue = $rows["Total"];

                    ?>

                    <h1> $<?= $total_revenue; ?> </h1>
                    <br>
                    Revenue Genarated
                </div>

                <div class="clearfix"></div>

            </div>
        </div>
        <!-- main content section ends -->
