<?php

require 'lang.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <link rel="stylesheet" href="css/contact.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@500;700;800&family=Varela+Round&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>
<body>

    <!--========== NAV BAR STARTS ========== -->
<header class="container">
        <!-- Nav-image -->
        <a class="school-logo"  href="Home.php"><img src="images/logo Digital School.png" alt=""></a>
        <nav class="navigation-bar">       
            <!-- Nav-links -->
            <ul class="nav-links">
                <li ><a href="Home.php"><?= __('Home') ?></a></li>
                <li><a href="Courses.php"><?= __('Courses') ?></a></li>
                <li><a href="About.php"><?= __('About') ?></a></li>
                <li><a href="contact.php">Contact</a></li>
            </ul>
       
        <!-- login and signup links -->
        <div class="nav-btns">
            <a href="login.php" class="login login-btn "><?= __('Login') ?></a>
            <a href="signup.php" class="signup signup-btn "><?= __('Sign Up') ?></a>
        </div>
        </nav>

        <div class="nav--right">
        <!-- language -->
        <div class="language">
            <a href="contact.php?lang=en"><img class="english hid" src="images/english.png" alt=""></a>
            <a href="contact.php?lang=fr"><img class="french" src="images/french.png" alt=""></a>
        </div>

        <!-- menu icons -->
        <div class="nav-icons">
            <i class="bi bi-list open-icon"></i>
            <i class="bi bi-x close-icon"></i>
        </div>
        </div>
       
    </header>
    <!--========== NAV BAR ENDS ========== -->

    <!-- =====CONTACT SECTION===== -->
    <section class="contact">
        <div class="contact-box contact-container">
            <div class="wrapper">
        <div class="contact-aside">
            <div class="aside-img">
                <img src="images/contactus.png" alt="">
            </div>
                <h2><?= __('Contact Us') ?></h2>
                <p><?= __("Do you have specific needs? Contact us! We will discuss about it and find a solution for you") ?></p>
                <ul class="contact-details">
                    <li>
                        <i class="bi bi-telephone-inbound"></i>
                        <span>+237 656-193-199</span>
                    </li>
                    <li>
                        <i class="bi bi-envelope"></i>
                        <span>info@seeds.cm</span>
                    </li>
                    <li>
                        <i class="bi bi-geo-alt"></i>
                        <span>Yaoundé, <?= __('Cameroon') ?></span>
                    </li>
                </ul>
                <ul class="contact-socials">
                    <li><a href=""><i class="bi bi-whatsapp"></i></a></li>
                    <li><a href=""><i class="bi bi-facebook"></i></a></li>
                    <li><a href=""><i class="bi bi-instagram"></i></a></li>
                </ul>
            </div>
            <!-- ====contact form==== -->
            <form class="contact-form" action="">
                <div class="form-name">
                    <input type="text" id="name" name="name" placeholder="<?= __('Name') ?>" required>
                    <input type="email" id="email" name="e-mail" placeholder="Email" required>
                </div>
                    <input type="text" id="subject" name="subject" placeholder="<?= __('Subject') ?>" required>
                    <textarea name="message" id="message" rows="7" placeholder="<?= __('Your message') ?>" required></textarea>
                <button onclick="sendWhatsapp()"><?= __('Send') ?></button>

            </form> 
        </div>
    </section>

 
<!-- ==========FOOTER STARTS==========  -->
<footer class="container reveal reveal-section">
    <div class="footer-top">
        <a href="Home.php"><img src="images/logo Digital School.png" alt=""></a>
        <p><?= __('Empowering Trainees for Rapid Technical Proficiency and Competitive Success.') ?></p>
    </div>
    <div class="divider-footer divider-top"></div>

    <!-- middle of footer -->
    <div class="footer-middle">
        <!-- subscribe to newsletter section -->
        <div class="subscribe">
            <div class="email-icon">
                <i class="bi bi-envelope-fill"></i>
            </div>
            <h2><?= __('Subscribe to our newsletter') ?></h2>
            <p><?= __('Receive updates on our trainings and seminars every month.') ?></p>
            <div class="submit-email">
                <input type="email" id="e-mail" name="email" placeholder="<?= __('Enter your email') ?>" required>
                <button type="submit" ><?= __('SUBMIT') ?></button>
            </div>
        </div>

        <div class="middle-3-col">
            <!-- contact us section -->
            <div class="footer-list contact-us">
                <span><?= __('Contact Us') ?></span>
                <ul>
                    <li>Email: info@seeds.cm</li>
                    <li><?= __('Phone') ?>: +237 656-193-199</li>
                    <li>BP 14947, Acacias, <?= __('Afriland First Bank Building') ?> Yaoundé, <?= __('Cameroon') ?></li>
                </ul>
            </div>

            <!-- Our pages section -->
            <div class="footer-list">
                <span><?= __('Our pages') ?></span>
                <ul>
                    <li><a href="Home.php"><?= __('Home') ?></a></li>
                    <li><a href="About.php"><?= __('About') ?></a></li>
                    <li><a href="Contact.php"><?= __('Contact') ?></a></li>
                    <li><a href="Courses.php"><?= __('Courses') ?></a></li>
                </ul>
            </div>

            <!-- language -->
            <div class="footer-list">
                <span><?= __('Language') ?></span>
                <ul>
                    <li><a href="contact.php?lang=en">English</a></li>
                    <li><a href="contact.php?lang=fr">Français</a></li>  
                </ul>
            </div>
        </div>
    </div>
    <div class="divider-footer divider-bottom"></div>

    <!-- bottom of footer -->
    <div class="footer-bottom">
        <span>Copyright © 2023 <?= __('All rights reserved') ?></span>
        <!-- media -->
        <div class="media">
            <a href=""><i class="bi bi-whatsapp"></i></a>
            <a href=""><i class="bi bi-instagram"></i></a>
            <a href=""><i class="bi bi-facebook"></i></a> 
        </div>
    </div>
</footer>
<!-- ==========FOOTER ENDS ==========  -->

<script src="js/script.js">
</script>
</body>
</html>
