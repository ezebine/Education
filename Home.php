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
        $sql = "SELECT * FROM course WHERE duree = :duree";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':duree', $dureeFiltre);
        $stmt->execute();
        $courses = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (empty($courses)) {
            $message = "Aucun cours trouvé pour la durée spécifiée.";
        }
    } else {
        $sql = "SELECT * FROM course";
        $stmt = $pdo->query($sql);
        $courses = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
} else {
    $sql = "SELECT * FROM course LIMIT 3";
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
    <title><?= __('Home') ?></title>
    <link rel="stylesheet" href="css/Home.css">
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
            <a href="Home.php?lang=en"><img class="english hid" src="images/english.png" alt=""></a>
            <a href="Home.php?lang=fr"><img class="french" src="images/french.png" alt=""></a>
        </div>

        <!-- menu icons -->
        <div class="nav-icons">
            <i class="bi bi-list open-icon"></i>
            <i class="bi bi-x close-icon"></i>
        </div>
        </div>
       
    </header>
    <!--========== NAV BAR ENDS ========== -->


    <!-- ========== HEADLINES SECTION STARTS ========== -->
    <!-- Headlines flexbox -->
    <section class="header ">
        
        <!-- headline-text -->
        <div class="headline-text">
            <div class="headline-heading">
                <h2><span><?= __('Grow your skills') ?>,</span> <br><?= __(' define your future') ?>.</h2>
                <p><?= __("Presenting SEED Digital School, the tech school of the future. We teach you the right skills to be prepared for tomorrow.") ?></p>
            </div>

            <!-- Headline buttons -->
            <div class="headline-btns">
                <a class="explorecourses" href="Courses.php"><?= __('Explore courses') ?></a>
                <a class="learnmore" href="About.php"><?= __('Learn more') ?></a>
            </div>
        </div>

        <!-- headline image -->
        <div class="headline-img">
            <img src="images/headline-img.jpg" alt="">
        </div>
    </section>
     <!-- ========== HEADLINES SECTION ENDS ========== -->


    <!-- ========== OUR POPULAR COURSES STARTS ========== -->
    <section class="popular-courses reveal reveal-section">
        <div class="title">
            <h2><?= __('Browse our popular courses') ?></h2>
        </div>

        <!-- Search course and find categories -->
        <div class="courses-categories">

            <!-- search course block -->
            <div class="search-course border-blue">
                <input type="text" id="course-name" name="courseName" placeholder="<?= __('Search for courses') ?>...">
                <i class="bi bi-search"></i>
            </div>

            <!-- search Categories block -->
            <div class="find-categories border-blue">
                <span><?= __('Category') ?></span>
                <i class="bi bi-chevron-down"></i>
                <div class="display-categories">
                    <a href=""><?= __('Programming') ?></a>
                    <a href=""><?= __('Office automation') ?></a>
                    <a href="">Marketing</a>
                    <a href=""><?= __('Infographics') ?></a>
                </div>
            </div>
        </div>

        <!-- flexbox for popular courses -->
        <div class="course-box">
        <?php if (isset($message)): ?>
                <div class="alert alert-warning" role="alert">
                <?= $message ?>
                </div>
            <?php endif; ?>
            
        <!-- first course -->
        <?php foreach ($courses as $course): ?>
            <a href= "individualCourse.php?slug=<?=$course['slug']?>" class="course">

                <!-- Course image -->
                <div class="image-box course1-img">
                    <img src="images/wordpress.png" alt="">
                </div>

                <!-- course content -->
                <div class="course-content">
                    <!-- course name and price -->
                    <div class="cat-price">
                        <span class="cat--name"><?= $course['category'] ?></span>
                        <span class="price">FCFA <?= $course['price'] ?>.00</span>
                    </div>

                    <!-- course brief -->
                    <p class="course--name"><?= substr($course['course_name'], 0, 50) . '...'; ?></p>
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
                <!-- <div class="duration">
                        <i class="bi bi-stopwatch-fill"></i>
                        <span><a href="syllabus.php?slug=<?= $course['slug'] ?>" class="btn btn-info">Voir+</a></span>
                </div> -->
                    </div>
            </div>
        </a>
            
        <?php endforeach; ?>                       
    <!-- explore all courses button -->
    <div class="courses-btn">  
        <a href="Courses.php"><?= __('Explore all courses') ?></a>
    </div> 

    </section>
    <!-- ========== OUR POPULAR COURSES ENDS ========== -->
 

    <!-- ========== OVERVIEW SECTION STARTS ========== -->
    <section class="overview reveal reveal-section">
        <!-- Overview image -->
        <div class="overview-img">
            <img src="images/section3-img.jpg" alt="">
        </div>

        <!-- overview content -->
        <div class="overview-content">
            <div class="overview-headline">
                    <h2><?= __('Uncover a fresh approach to advancing your professional skills.') ?></h2>
                    <h3><?= __('Enhance your skills with flexible online training.') ?></h3>
                    <p><?= __('Experience the advantages of E-learning for advancing your career. Benefit from accredited training and earn certifications endorsed by the Ministry of Employment and Vocational Training.') ?></p>
                    <!-- overview-button -->
                    <div class="overview-btn">
                        <a href="About.php"><?= __('Learn more') ?></a>
                    </div>
            </div>
        </div>
</section>
<!--===== OVERVIEW SECTION ENDS =====-->


<!-- ==========COURSE CATEGORIES STARTS========== -->
<section class="categories reveal reveal-section">
    <!--course title  -->
    <div class="title">
        <h2><?= __('Courses categories') ?></h2>
    </div>

    <!-- category grid -->
    <div class="category-grid">
        <!-- first category -->
        <div class="course--category">
            <a href="courses.php?category=Programming" class="course-category category1">

                <!-- category image -->
                <div class="category-img">
                    <img src="images/programming.png" alt="">
                </div>

                <!-- category content -->
                <div class="category-content">
                    <h2><?= __('Programming') ?></h2>
                    <p>Lorem ipsum dolor sit amet consectetur. Amet mi lorem diam congue nulla et dui pulvinar.</p>
                    <div class="category-btns">
                        <div class="explore-link">
                            <span><?= __('Explore courses') ?></span>
                            <i class="bi bi-arrow-right-short"></i>
                        </div>
                        <div class="crse">5 <?= __('cours') ?></div>
                    </div>
                </div>
            </a>
        </div>

        <!-- second category -->
        <div class="course--category">
            <a href="courses.php?category=Office automation" class="course-category category2">

                <!-- category image -->
                <div class="category-img">
                    <img src="images/automation.png" alt="">
                </div>

                <!-- category content -->
                <div class="category-content">
                    <h2><?= __('Office automation') ?></h2>
                    <p>Lorem ipsum dolor sit amet consectetur. Quam ut cras vel habitant faucibus. Sed et mauris sit dictum</p>
                    <div class="category-btns">
                        <div class="explore-link">
                            <span><?= __('Explore courses') ?></span>
                            <i class="bi bi-arrow-right-short"></i>
                        </div>
                        <div class="crse">5 <?= __('cours') ?></div>
                    </div>
                </div>
            </a>
        </div>

        <!-- third category -->
        <div class="course--category">
            <a href="courses.php?category=Marketing" class="course-category category3">

                <!-- category image -->
                <div class="category-img">
                    <img src="images/marketing.png" alt="">
                </div>

                <!-- category content -->
                <div class="category-content">
                    <h2>Marketing</h2>
                    <p>Lorem ipsum dolor sit amet consectetur. Curabitur diam arcu dui etiam posuere mauris tortor.</p>
                    <div class="category-btns">
                        <div class="explore-link">
                            <span><?= __('Explore courses') ?></span>
                            <i class="bi bi-arrow-right-short"></i>
                        </div>
                        <div class="crse">5 <?= __('courses') ?></div>
                    </div>
                </div>
            </a>
        </div>

        <!-- fourth category -->
        <div class="course--category">
            <a href="courses.php?category=Infographics" class="course-category category4">

                <!-- category image -->
                <div class="category-img">
                    <img src="images/infographics.png" alt="">
                </div>

                <!-- category content -->
                <div class="category-content">
                    <h2><?= __('Infographics') ?></h2>
                    <p>Lorem ipsum dolor sit amet consectetur. Fermentum scelerisque tortor ut eros semper enim in sit netus.  </p>
                    <div class="category-btns">
                        <div class="explore-link">
                            <span><?= __('Explore courses') ?></span>
                            <i class="bi bi-arrow-right-short"></i>
                        </div>
                        <div class="crse">5 <?= __('courses') ?></div>
                    </div>
                </div>
            </a>
        </div>
    </div>
</section>
<!-- ========== COURSE CATEGORIES ENDS ========== -->


<!--========== ABOUT SECTION STARTS ==========-->
<section class="about reveal reveal-section">
    <div class="about-seed">

        <!-- about-content -->
        <div class="about-content">
            <div class="about-text">
                <h2><?= __('About') ?> Digital School</h2>
                <p class="top-headline"><?= __('Digital School is an accredited institution for immersive training and professional development in digital professions, validated by the Ministry of Employment and Vocational Training.') ?></p>
                <p class="bottom-headline"><?= __('We design and deliver specific and customized training in various IT fields according to your needs.') ?></p>
            </div>
            <div class="about-btns">
                <a href="About.php"><?= __('About Us') ?></a>
            </div>
        </div>

        <!-- about image -->
        <div class="about-img">
            <img src="images/section-img.png" alt="">
        </div>
    </div>
</section>
<!--========== ABOUT SECTION ENDS ==========-->


<!-- ==========FAQs SECTION STARTS ========== -->
<section class="faqs reveal reveal-section">
    <div class="title">
        <h2><?= __('Frequently Asked') ?> Questions</h2>
    </div>

    <!-- faq grid -->
    <div class="faq-grid">
        <!-- faq1 -->
        <article class="faq">
            <div class="faq-icon"><i class="bi bi-plus"></i></i></div>
            <div class="question-answer">
                <h4><?= __('How do I know the right courses for me?') ?></h4>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium beatae a esse commodi magni sunt dolorem! Expedita, dolorem mollitia sit dolores molestias repudiandae. Aspernatur, nesciunt?</p>
            </div>
        </article>

        <!-- faq2 -->
        <article class="faq">
            <div class="faq-icon"><i class="bi bi-plus"></i></div>
            <div class="question-answer">
                <h4><?= __('Does the institution offer internships?') ?></h4>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium beatae a esse commodi magni sunt dolorem! Expedita, dolorem mollitia sit dolores molestias repudiandae. Aspernatur, nesciunt?</p>
            </div>
        </article>

        <!-- faq3 -->
        <article class="faq">
            <div class="faq-icon"><i class="bi bi-plus"></i></div>
            <div class="question-answer">
                <h4><?= __('Does the institution favor remote learning?') ?></h4>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium beatae a esse commodi magni sunt dolorem! Expedita, dolorem mollitia sit dolores molestias repudiandae. Aspernatur, nesciunt?</p>
            </div>
        </article>

        <!-- faq4 -->
        <article class="faq">
            <div class="faq-icon"><i class="bi bi-plus"></i></div>
            <div class="question-answer">
                <h4><?= __('Will certificates be offered at the end of training?') ?></h4>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium beatae a esse commodi magni sunt dolorem! Expedita, dolorem mollitia sit dolores molestias repudiandae. Aspernatur, nesciunt?</p>
            </div>
        </article>

        <!-- faq5 -->
        <article class="faq">
            <div class="faq-icon"><i class="bi bi-plus"></i></div>
            <div class="question-answer">
                <h4><?= __('Is the institution an accredited one?') ?></h4>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium beatae a esse commodi magni sunt dolorem! Expedita, dolorem mollitia sit dolores molestias repudiandae. Aspernatur, nesciunt?</p>
            </div>
        </article>

        <!-- faq6 -->
        <article class="faq">
            <div class="faq-icon"><i class="bi bi-plus"></i></div>
            <div class="question-answer">
                <h4><?= __('What training is offered by the institution?') ?></h4>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium beatae a esse commodi magni sunt dolorem! Expedita, dolorem mollitia sit dolores molestias repudiandae. Aspernatur, nesciunt?</p>
            </div>
        </article>

        <!-- faq7 -->
        <article class="faq">
            <div class="faq-icon"><i class="bi bi-plus"></i></div>
            <div class="question-answer">
                <h4>How do I know the right courses for me?</h4>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium beatae a esse commodi magni sunt dolorem! Expedita, dolorem mollitia sit dolores molestias repudiandae. Aspernatur, nesciunt?</p>
            </div>
        </article>

        <!-- faq8 -->
        <article class="faq ">
            <div class="faq-icon"><i class="bi bi-plus"></i></div>
            <div class="question-answer">
                <h4>How do I know the right courses for me?</h4>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium beatae a esse commodi magni sunt dolorem! Expedita, dolorem mollitia sit dolores molestias repudiandae. Aspernatur, nesciunt?</p>
            </div>
        </article>
    </div>
</section>
<!-- ==========FAQs SECTION ENDS ========== -->


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

<script src="js/Home.js"></script>
<script src="js/script.js"></script>
</body>
</html>