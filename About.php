<?php

require 'lang.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= __('About') ?></title>
    <link rel="stylesheet" href="css/About.css">
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
            <a href="About.php?lang=en"><img class="english hid" src="images/english.png" alt=""></a>
            <a href="About.php?lang=fr"><img class="french" src="images/french.png" alt=""></a>
        </div>

        <!-- menu icons -->
        <div class="nav-icons">
            <i class="bi bi-list open-icon"></i>
            <i class="bi bi-x close-icon"></i>
        </div>
        </div>
       
    </header>
    <!--========== NAV BAR ENDS ========== -->



    <!-- ===== HEADLINE SECTION =====  -->
    <section class="headline reveal reveal-section">
        <div class="title">
            <h2><?= __('About Digital School') ?></h2>
            <p><?= __('An institution for immersive training and professional development in digital professions. We offer several products ranging from supporting children to improving businesses around digital technology.') ?></p>
        </div>
        <!-- grid container of about photos -->
        <div class="headline-grid-photos">
            <div class="grid-item grid-1-col item1">
                <div class="sub-grid-65"><img src="images/item1.png" alt=""></div>
                <div class="sub-grid"><img src="images/item4.png" alt=""></div>
            </div>
            <div class="grid-item item2"><img src="images/item2.jpg" alt=""></div>
            <div class="grid-item grid-1-col item3">
                <div class="sub-grid"><img src="images/item3.png" alt=""></div>
                <div class="sub-grid-65"><img src="images/item5.png" alt=""></div>
            </div> 
        </div>
        
    </section>
    <!-- statistics  -->
    <section class="stats">
        <div class="stat-item techno-pedagogue">
            <div class="stat-number">
                <span class="num" data-val="5">000</span>
                <span class="plus">+</span>
            </div>
            <span class="stat-name">Techno-pedagogues</span>
        </div>
        <div class="stat-item">
            <div class="stat-number">
                <span class="num" data-val="200">000</span>
                <span class="plus">+</span>
            </div>
            <span class="stat-name"><?= __('Trained professionals') ?></span>
        </div>
        <div class="stat-item">
            <div class="stat-number">
                <span class="num" data-val="500">000</span>
                <span class="plus">+</span>
            </div>
            <span class="stat-name"><?= __('Initiated children') ?></span>
        </div>
        <div class="stat-item">
            <div class="stat-number">
                <span class="num" data-val="500">000</span>
                <span class="plus">+</span>
            </div>
            <span class="stat-name"><?= __('Delivered certificates') ?></span>
        </div>
    </section>

    <!-- mission and story section -->
    <section class="mission-story reveal reveal-section">
        <!-- mission of didgital school -->
        <div class="box mission">
            <div class="image mission-img">
                <img src="images/mission.png" alt="">
            </div>
            <div class="content">
                <div class="text">
                    <h2><?= __('The mission behind Digital School') ?></h2>
                    <p>Lorem ipsum dolor sit amet consectetur. Mollis dolor ut tellus pulvinar bibendum. Congue nibh feugiat sit amet diam lacinia vitae. Non leo rutrum donec turpis risus consequat facilisi. Tincidunt sagittis in scelerisque vitae euismod aliquam nisl pretium quam. Eget proin quis pulvinar tempor tincidunt tellus.</p>
                </div>
            </div>
        </div>

        <!-- story of digital school -->
        <div class="box story">
            <div class="content">
                <div class="text">
                    <h2><?= __('The story behind Digital School') ?></h2>
                    <p>Lorem ipsum dolor sit amet consectetur. Mollis dolor ut tellus pulvinar bibendum. Congue nibh feugiat sit amet diam lacinia vitae. Non leo rutrum donec turpis risus consequat facilisi. Tincidunt sagittis in scelerisque vitae euismod aliquam nisl pretium quam. Eget proin quis pulvinar tempor tincidunt tellus.</p>
                </div>
            </div>
                <div class="image story-img">
                    <img src="images/story.png" alt="">
                </div>
        </div>
    </section>

    <!-- working values -->
    <section class="values reveal reveal-section">
        <div class="title">
            <h2><?= __('Our work values') ?></h2>
            <p><?= __('Our organization is committed to a set of core values that guide our work and define who we are. We believe that by embodying these values in everything we do, we can achieve great things for our clients and stakeholders.') ?></p>
        </div>
        <div class="grid-working-values">
            <!-- first working value -->
            <div class="grid-value value1">
                <div class="value-img"><img src="images/innovation.png" alt=""></div>
                <div class="value-content">
                    <h2><?= __('Innovation') ?></h2>
                    <p><?= __('We are always on the lookout for fresh and inventive solutions to challenges and ways to enhance our operations.') ?></p>
                </div>
            </div>
            <!-- second working value -->
            <div class="grid-value value2">
                <div class="value-img"><img src="images/punctuality.png" alt=""></div>
                <div class="value-content">
                    <h2><?= __('Punctuality') ?></h2>
                    <p><?= __('We hold ourselves accountable for meeting deadlines and delivering results on time.') ?></p>
                </div>
            </div>
            <!-- third working value -->
            <div class="grid-value value3">
                <div class="value-img"><img src="images/resourceful.png" alt=""></div>
                <div class="value-content">
                    <h2><?= __('Resourcefulness') ?></h2>
                    <p><?= __('We remain agile and innovative in maximizing the potential of the resources we have on hand.') ?></p>
                </div>
            </div>
            <!-- fourth working value -->
            <div class="grid-value value4">
                <div class="value-img"><img src="images/commitment.png" alt=""></div>
                <div class="value-content">
                    <h2><?= __('Commitment') ?></h2>
                    <p><?= __('We are dedicated to delivering exceptional results and going above and beyond for our clients.') ?></p>
                </div>
            </div>
            <!-- fifth working value-->
            <div class="grid-value value5">
                <div class="value-img"><img src="images/openness.png" alt=""></div>
                <div class="value-content">
                    <h2><?= __('Openness') ?></h2>
                    <p><?= __('We create an environment where everyone feels comfortable sharing their thoughts and opinions.') ?></p>
                </div>
            </div>
            <!-- sixth working value -->
            <div class="grid-value value6">
                <div class="value-img"><img src="images/teamwork.png" alt=""></div>
                <div class="value-content">
                    <h2><?= __('Teamwork') ?></h2>
                    <p><?= __("We value diversity and inclusivity, we encourage open communication and respect for each other's opinions.") ?></p>
                </div>
            </div>
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
                    <li><a href="Home.php?lang=en">English</a></li>
                    <li><a href="Home.php?lang=fr">Français</a></li>  
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

<script src="js/script.js"></script>
<script src="js/About.js"></script>
</body>
</html>