<?php
// Vos paramètres de connexion à la base de données
$dsn = 'mysql:host=localhost;dbname=ds';
$username = 'root';
$password = '';

// Tentative de connexion à la base de données avec PDO
try {
    $pdo = new PDO($dsn, $username, $password);
} catch (PDOException $e) {
    die('Erreur de connexion : ' . $e->getMessage());
}

// Vérification si le formulaire de filtrage a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $dureeFiltre = $_POST['dureeFiltre'];

    if ($dureeFiltre) {
        $sql = "SELECT * FROM course WHERE duration = :duree";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':duree', $dureeFiltre);
        $stmt->execute();
        $courses = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (empty($courses)) {
            $message = "No course found for the given duration";
        }
        
    } else {
        $sql = "SELECT * FROM course";
        $stmt = $pdo->query($sql);
        $courses = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
} 
else {
    $sql = "SELECT * FROM course";
    $stmt = $pdo->query($sql);
    $courses = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Retrieve the course slug from the URL parameters
$category = isset($_GET['category']) ? $_GET['category'] : 'Nos cours';

// Validate and sanitize the course slug
$category = filter_var($category, FILTER_SANITIZE_STRING);

// Retrieve course details from database
$sql = "SELECT * FROM course WHERE category = :category";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':category', $category);
$stmt->execute();

$course = $stmt->fetchAll(PDO::FETCH_ASSOC);

if (empty($courses)) {
    $message = "No course found in this category";


} else {
$sql = "SELECT * FROM course";
$stmt = $pdo->query($sql);
$courses = $stmt->fetchAll(PDO::FETCH_ASSOC);
}



require 'lang.php';
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= __('Courses') ?></title>
    <link rel="stylesheet" href="css/Courses.css">
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
            <a href="Courses.php?lang=en"><img class="english hid" src="images/english.png" alt=""></a>
            <a href="Courses.php?lang=fr"><img class="french" src="images/french.png" alt=""></a>
        </div>

        <!-- menu icons -->
        <div class="nav-icons">
            <i class="bi bi-list open-icon"></i>
            <i class="bi bi-x close-icon"></i>
        </div>
        </div>
       
    </header>
    <!--========== NAV BAR ENDS ========== -->


      
    <!-- =====HEADLINE SECTION BEGINS===== -->
    <section class="headline reveal reveal-section">
        <div class="title">
            <h2><?php echo ucfirst($category); ?></h2>
            <p><?= __("We offer a wide range of courses that are designed to cater to your needs despite your skill levels. Whether you're looking to enhance your skills or start a new career, our courses are a great milestone to achieve your goals.") ?></p>
        </div>

        <!-- New course container
        <div class="new-course">
            <div class="new-course-img">
                <img src="images/wordpress.png" alt="">
            </div>
            <div class="new-course-content">
                <div class="new-course-description">
                    <div class="notification">
                        <i class="bi bi-bell-fill"></i>
                        <span><?= __('New course') ?></span>
                    </div>
                    <div class="new-course-headline">
                        <h2>Deploying a website completely using Wordpress</h2>
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Culpa, error repellendus nemo consequuntur corrupti ea!</p>
                    </div>
                    <hr class="divider">

                <div class="duration-price">
                    <div class="duration">
                        <i class="bi bi-stopwatch-fill"></i>
                        <span>3:25 <?= __('hours') ?></span>
                    </div>
                        <span>FCFA 15000.00</span>
                   </div>
                   <a class="new-course-btn" href=""><?= __('Learn more') ?></a>
            </div>
            </div>
        </div>  -->
    </section>
    <!-- =====HEADLINE SECTION ENDS===== -->

    <!-- =====COURSES FLEXBOX STARTS=====-->
    <section class="flexbox-course reveal reveal-section">
    <form method="POST" style="width:100%;">

        <div class="header">
            <span class="all-courses"><?= __('All courses') ?></span>
            <div class="courses-categories">

                <!-- search course block -->
                <div class="search-course border-blue">
                    <input type="text" id="course-name" name="dureeFiltre" placeholder="<?= __('Search for courses') ?>...">
                    <button type="submit" value="filter"><i class="bi bi-search"></i></button>
                </div>

                 <!-- search Categories block -->
                <div class="find-categories border-blue">
                    <span><?= __('Category') ?></span>
                    <i class="bi bi-chevron-down"></i>
                    <div class="display-categories">
                        <a href=""><?= __('Security') ?></a>
                        <a href=""><?= __('Education') ?></a>
                    </div>
                </div>   
            </div>   
        </div>
    </form>
    
    


        <!-- flexbox for popular courses -->
       <div class="course-box">
        <!-- All Courses course -->
            <?php if (isset($message)): ?>
                <div class="alert alert-warning" role="alert">
                <?= $message ?>
                </div>
            <?php endif; ?>

           <?php foreach ($courses as $course): ?>
            <a href="individualCourse.php?slug=<?=$course['slug']?>" class="course">
                <div class="image-box course1-img">
                    <img src="images/cours.png" alt="">
                </div>
                <div class="course-content">
               <!-- course name and price -->
              
               <!-- course brief -->
               <p class="course--name"><?= substr($course['course_name'], 0, 70) . '...'; ?></p>
               <div class="divider"></div>
               <!-- number of videos and duration -->
               <div class="videos-duration">
                <div class="videos">
                    <i class="bi bi-play-fill"></i>
                    <span><?= $course['num_videos'] ?> <?= __('videos') ?></span>
                </div>
                <div class="duration">
                    <i class="bi bi-stopwatch-fill"></i>
                    <span><?= $course['duration'] ?> <?= __('hours') ?></span>
                </div>
                
               </div>
        </div>
        </a>

        
        <?php endforeach; ?>        
              
        </div> 
    </section>
    <!-- =====COURSES FLEXBOX ENDS=====-->

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
            <h2><?= __('Enregistrer vous sur notre site') ?></h2>
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
                    <li>Email: tezemfoudjiezebine@gmail.com</li>
                    <li><?= __('Phone') ?>: +237 690-470-204</li>
                    <li>Bonas Yaoundé, <?= __('Cameroon') ?></li>
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
                    <li><a href="Courses.php?lang=en">English</a></li>
                    <li><a href="Courses.php?lang=fr">Français</a></li>  
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
    
<script src="js/Courses.js"></script>
<script src="js/script.js"></script>
</body>
</html>