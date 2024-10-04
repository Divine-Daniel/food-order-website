
<!-- fOOD sEARCH Section Starts Here -->
<section class="food-search">
    <div class="container">

        <?php

            $fname = $_SESSION["k_err"]['fname'] ?? null;
            $lname = $_SESSION["k_err"]['lname'] ?? null;
            $phone = $_SESSION["k_err"]['phone'] ?? null;
            $email = $_SESSION["k_err"]['email'] ?? null;
            $message = $_SESSION["k_err"]['message'] ?? null;

            unset($_SESSION["k_err"]);


            if (isset($_SESSION['suc'])) {
                
                ?>

                    <div style="margin-bottom: 25px; background-color: green; color: white; padding: 15px 0; border-radius: 10px;" class="text-center"><?= $_SESSION['suc']; ?></div>

                <?php

                unset($_SESSION['suc']); 
                                
            }

        ?>
        
        <h2 class="text-center text-white fs-20-px" style="margin-bottom: 40px;" >Contact Us</h2>

        <form action="<?= SITE_URL_OR_HOME_URL; ?>partial_body/contact_proccess.php" method="POST" class="order">
            
                <div class="order-label" style="margin-top: 15px;">First Name</div>
                <input type="text" name="fname" value="<?= $fname; ?>" placeholder="E.g. Divine" class="input-responsive" style="padding-top: 15px; padding-left: 15px; padding-bottom: 15px; width: 95%;">

                <?php

                    if (isset($_SESSION['fname'])) {

                ?>

                    <div style="color: red;">
                        <?= $_SESSION['fname']; ?>
                    </div>

                <?php

                    unset($_SESSION['fname']);

                    }

                ?>

                <div class="order-label" style="margin-top: 15px;">Last Name</div>
                <input type="text" name="lname" value="<?= $lname; ?>" placeholder="E.g. Daniel" class="input-responsive" style="padding-top: 15px; padding-left: 15px; padding-bottom: 15px; width: 95%;">
                
                <?php

                    if (isset($_SESSION['lname'])) {

                    ?>

                    <div style="color: red;">
                        <?= $_SESSION['lname']; ?>
                    </div>

                    <?php

                    unset($_SESSION['lname']);

                    }

                ?>

                <div class="order-label" style="margin-top: 15px;">Phone Number</div>
                <input type="tel" name="phone" value="<?= $phone; ?>" placeholder="E.g. 9843xxxxxx" class="input-responsive" style="padding-top: 15px; padding-left: 15px; padding-bottom: 15px; width: 95%;">
                
                <?php

                    if (isset($_SESSION['phone'])) {

                    ?>

                    <div style="color: red;">
                        <?= $_SESSION['phone']; ?>
                    </div>

                    <?php

                    unset($_SESSION['phone']);

                    }

                ?>

                <div class="order-label" style="margin-top: 15px;">Email</div>
                <input type="email" name="email" value="<?= $email; ?>" placeholder="E.g. hi@divinedaniel.com" class="input-responsive" style="padding-top: 15px; padding-left: 15px; padding-bottom: 15px; width: 95%;">
                
                <?php

                    if (isset($_SESSION['email'])) {

                    ?>

                    <div style="color: red;">
                        <?= $_SESSION['email']; ?>
                    </div>

                    <?php

                    unset($_SESSION['email']);

                    }

                ?>

                <div class="order-label" style="margin-top: 15px;">Message</div>
                <textarea name="message" rows="10" placeholder="Your Message..." class="input-responsive" style="padding-top: 15px; padding-left: 15px; width: 95%;"><?= $message; ?></textarea>
                
                <?php

                    if (isset($_SESSION['message'])) {

                    ?>

                    <div style="color: red;">
                        <?= $_SESSION['message']; ?>
                    </div>

                    <?php

                    unset($_SESSION['message']);

                    }

                ?>

                <input type="submit" name="submit" value="Send Message" class="btn btn-primary" style="padding: 18px 25px; border-radius: 8px; margin-top: 15px;">

        </form>

    </div>
</section>
<!-- fOOD sEARCH Section Ends Here -->
