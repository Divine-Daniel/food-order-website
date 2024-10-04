
<div class="main_content">
    <div class="wrapper_full">
        <h1><span style="color: red;">Customer </span> Messages</h1>

        <br>

        <?php

            if(isset($_SESSION["update_failed"])) {

                echo $_SESSION["update_failed"]; // display message
                unset($_SESSION["update_failed"]); // remove the message

            }

            if(isset($_SESSION["deleted"])) {

                echo $_SESSION["deleted"]; // display message
                unset($_SESSION["deleted"]); // remove the message

            }

            if(isset($_SESSION["deleted_suc"])) {

                echo $_SESSION["deleted_suc"]; // display message
                unset($_SESSION["deleted_suc"]); // remove the message

            }

        ?>

        <br> 

        <table class="tbl-full">
            <tr class="tr">
                <th>S.N </th>
                <th>C. Name</th>
                <th>C.Phone No.</th>
                <th>C.Email</th>
                <th>C.Message</th>
                <th>Date</th>
                <th>Action</th>
            </tr>

            <?php

                $sn = 1;
                $sql = " SELECT * FROM contact ORDER BY id DESC;";
                $query = $conn->query($sql);

                if ($query == true) {
                    
                    $count = $query->num_rows;

                    if ($count > 0) {
                        
                        // order details is available
                        while ($rows = $query->fetch_assoc()) {
                            
                            $id = $rows["id"];
                            $fname = $rows["fname"];
                            $lname = $rows["lname"];
                            $phone = $rows["phone"];
                            $email = $rows["email"];
                            $message = $rows["message"];
                            $date = $rows["date"];

                            ?>

                                <tr class="tr2 tr3 tr5">

                                    <td><?= $sn++; ?>. </td>

                                    <td class="td"><?= substr($fname . " " . $lname, 0, 15); ?>... </td>

                                    <td><?= $phone; ?> </td>

                                    <td><?= substr($email, 0, 25); ?>... </td>

                                    <td class="nowrap"><?= substr($message, 0, 25); ?>... </td>

                                    <td class="nowrap"><?= $date; ?> </td>

                                    <td class="nowrap">

                                        <a href="<?= SITE_URL_OR_HOME_URL; ?>admin/view_message.php?message_id=<?= mysqli_real_escape_string($conn, $id); ?>" class="btn-secondary" title="View Message" style="padding: 13px; border-radius: 5px;"><i class="fas fa-eye"></i></a>

                                        <a href="<?= SITE_URL_OR_HOME_URL; ?>admin_process/delete_message.php?message_delete_id=<?= mysqli_real_escape_string($conn, $id); ?>" class="btn-danger" title="Delete Message" style="padding: 13px; margin-left: 9px; border-radius: 5px;"><i class="fas fa-trash"></i></a>

                                    </td>


                                </tr>

                            <?php
                            
                        }
                        
                    } else {

                        // Order details not available
                        echo "<tr> <td colspan='12' class='error'> Message Details Not Found. </td> </tr>";
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

