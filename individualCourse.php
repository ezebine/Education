<?php
// Retrieve the course slug from the URL parameters
$courseSlug = isset($_GET['slug']) ? $_GET['slug'] : '';

// Validate and sanitize the course slug
$courseSlug = filter_var($courseSlug, FILTER_SANITIZE_STRING);

// Connect to the database
$dsn = 'mysql:host=localhost;dbname=ds';
$username = 'root';
$password = '';

// Tentative de connexion à la base de données avec PDO
try {
    $pdo = new PDO($dsn, $username, $password);
} catch (PDOException $e) {
    die('Erreur de connexion : ' . $e->getMessage());
}

// Retrieve course details from database
$sql = "SELECT * FROM course WHERE slug = :slug";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':slug', $courseSlug);
$stmt->execute();

$course = $stmt->fetch(PDO::FETCH_ASSOC);



require 'lang.php';



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>individual Course</title>
    <link rel="stylesheet" href="css/individualCourse.css">
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
            <a href="individualCourse.php?lang=en"><img class="english hid" src="images/english.png" alt=""></a>
            <a href="individualCourse.php?lang=fr"><img class="french" src="images/french.png" alt=""></a>
        </div>

        <!-- menu icons -->
        <div class="nav-icons">
            <i class="bi bi-list open-icon"></i>
            <i class="bi bi-x close-icon"></i>
        </div>
        </div>
       
    </header>
    <!--========== NAV BAR ENDS ========== -->


<?php if ($course) { ?>
    <section class="header">
    <div class="header-heading">
        <span><?= $course['category']; ?></span>
        <p><?= $course['course_name'] ?></p>
        <!-- <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Non, accusamus. Saepe cumque, perspiciatis repellendus asperiores rem ratione tempora optio doloribus.</p> -->
    </div>
    <div class="course-details">
            <ul class="details">
                <li>
                    <i class="bi bi-play-fill"></i>
                    <span><?= $course['num_videos'] ?> <?= __('videos') ?></span>
                </li>
                <li>
                    <i class="bi bi-stopwatch-fill"></i>
                    <span><?= __('Duration') ?>:<?= $course['duration'] ?> <?= __('hours') ?></span>
                    </li>
                <li>
                    <i class="bi bi-phone-fill"></i>
                    <span><?= __('Accessible through computer, tablet and mobile') ?></span>
                        
                    </li>
                </ul>
            </div>

    <!-- CUSTOM VIDEO PLAYER -->
        <div class="video-player">
        <iframe width="560" height="315" src="https://www.youtube.com/embed/<?= $course['video_link'] ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
    </section>

    <!-- ABOUT COURSE -->
    <div class="about-course reveal reveal-section">
            <div class="description-text">
            <h3><?= __('About course') ?></h3>
            <p><?= $course['about_course'] ?></p>
        </div>
    
        <!-- Course syllabus -->
        <div class="syllabus-text">
            <h3><?= __('Course syllabus') ?></h3>
            <div class="overflow--scroll">
            <p><?= $course['syllabus'] ?></p>
            </div>
        </div>
        
        </div>
    
        <!-- Down bar -->
        <div class="down-bar">
            <div class="price">
                <p><?= __('Get this course') ?></p>
                <span>FCFA <?= $course['price'] ?>.00</span>
            </div>
                <a class="buy--btn" href="buyCourse.php" onclick="checkLogin()"><?= __('Buy Now') ?></a>
            
        </div>

        <?php } else { ?>
        <h1>Course not found</h1>
    <?php } ?>

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
    
<script src="js/script.js">
    <script>
    function checkLogin() {
      // Call the check_login.php file to perform the login check
      window.location.href = "check_login.php";
    }
  </script>
</script>
</body>
</html>