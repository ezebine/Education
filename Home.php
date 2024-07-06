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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="css/Home.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@500;700;800&family=Varela+Round&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>
<body>
    <!--========== Nav-bar starts========== -->
    <header class="container">
        <!-- Nav-image -->
        <img class="school-logo" src="images/logo Digital School.png" alt="">
        <nav class="navigation-bar">       
            <!-- Nav-links -->
            <ul class="nav-links">
                <li ><a href="Home.php">Home</a></li>
                <li><a href="Courses.php">Courses</a></li>
                <li><a href="About.php">About</a></li>
                <li><a href="contact.php">Contact</a></li>
            </ul>
        </nav>
        <!-- login and signup links -->
        <div class="nav-btns">
            <a href="login.php" class="login login-btn ">Login</a>
            <a href="signup.php" class="signup signup-btn ">Sign Up</a>
        </div>
        <div class="nav-icons">
            <i class="bi bi-list open-icon"></i>
            <i class="bi bi-x close-icon"></i>
        </div>
    </header>
    <!--========== Nav-bar ends========== -->


    <!-- =====HEADLINES SECTION STARTS -->
    <!-- Headlines flexbox -->
    <section class="header">
        <!-- headline-text -->
        <div class="headline-text">
            <div class="headline-heading">
                <h2><span>Grow your skills,</span> define your future.</h2>
                <p>Presenting SEED Digital School, the tech school of the future. We teach you the right skills to be prepared for tomorrow.</p>
            </div>
            <!-- Headline buttons -->
            <div class="headline-btns">
                <a class="explorecourses" href="Courses.php">Explore courses</a>
                <a class="learnmore" href="About.php">Learn more</a>
            </div>
        </div>
        <!-- headline image -->
        <div class="headline-img"></div>
    </section>

<!-- ========OUR POPULAR COURSES======== -->
<section class="popular-courses reveal reveal-section">
    <div class="title">
    <h3>Browse our popular courses</h3>
    </div>
    
    <div class="courses-categories">
        <!-- search course block -->
    <div class="search-course">
        <input type="text" id="course-name" name="courseName" placeholder="Search for courses...">
        <i class="bi bi-search"></i>
    </div>
    <div class="find-categories">
        <span>Category</span>
        <i class="bi bi-chevron-down"></i>
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
        <div class="course">
            <div class="image-box course1-img"></div>
            <div class="course-content">
               <!-- course name and price -->
               <div class="name-price">
                <span class="name"><?= $course['nom_cours'] ?></span>
                <span class="price">FCFA <?= $course['prix'] ?>.00</span>
               </div>
               <!-- course brief -->
               <p class="course-brief"><?= substr($course['description'], 0, 100) . '...'; ?></p>
               <hr class="divider">
               <!-- number of videos and duration -->
               <div class="videos-duration">
                <div class="videos">
                    <i class="bi bi-play-fill"></i>
                    <span><?= $course['nombre_videos'] ?> videos</span>
                </div>
                <div class="duration">
                    <i class="bi bi-stopwatch-fill"></i>
                    <span><?= $course['duree'] ?> hours</span>
                </div>
                <div class="duration">
                            <i class="bi bi-stopwatch-fill"></i>
                            <span><a href="syllabus.php?slug=<?= $course['slug'] ?>" class="btn btn-info">Voir+</a></span>
                </div>
               </div>
            </div>
        </div>
        <?php endforeach; ?>
            
           
          
<!-- explore all courses button -->
<div class="courses-btn">  
    <a href="Courses.php">Explore all courses</a>
</div>  
</section>
<!-- =====POPULAR COURSES=====-->
 
<!-- ===== OVERVIEW SECTION ===== -->
<section class="overview container reveal reveal-section">
        <div class="overview-img">
            <img src="images/section3-img.jpg" alt="">
        </div>
        <div class="overview-content">
            <div class="overview-headline">
                    <h2>Uncover a fresh approach to advancing your professional skills.</h2>
                    <h3>Enhance your skills with flexible online training.</h3>
                    <p>Experience the advantages of E-learning for advancing your career. Benefit from accredited training and earn certifications endorsed by the Ministry of Employment and Vocational Training.</p>
                <!-- overview-button -->
                <div class="overview-btn">
                <a href="About.php">Learn more</a>
            </div>
            </div>
            </div>
</section>
<!--===== OVERVIEW ENDS =====-->


<!-- ==========COURSE CATEGORIES STARTS========== -->
<section class="categories reveal reveal-section">
    <!--course title  -->
    <div class="title">
        <h3>Courses categories</h3>
    </div>
    <div class="category-grid">
        <!-- first category -->
        <div class="course-category category1">
            <!-- category image -->
            <div class="category-img">
                <img src="images/programming.png" alt="">
            </div>
            <!-- category content -->
            <div class="category-content">
                <div class="heading">
                    <h2>Programming</h2>
                    <p>Lorem ipsum dolor sit amet consectetur. Amet mi lorem diam congue nulla et dui pulvinar.</p>
                </div>
                <div class="category-btns">
                    <div class="explore-link">
                        <a href="">Explore courses</a>
                        <i class="bi bi-arrow-right"></i>
                    </div>
                    <a class="crse" href="">5 courses</a>
                </div>
            </div>
        </div>

        <!-- second category -->
        <div class="course-category category2">
            <!-- category image -->
            <div class="category-img">
                <img src="images/automation.png" alt="">
            </div>
            <!-- category content -->
            <div class="category-content">
                <div class="heading">
                    <h2>Office automation</h2>
                    <p>Lorem ipsum dolor sit amet consectetur. Quam ut cras vel habitant faucibus. Sed et mauris sit dictum</p>
                </div>
                <div class="category-btns">
                    <div class="explore-link">
                        <a href="">Explore courses</a>
                        <i class="bi bi-arrow-right"></i>
                    </div>
                    <a class="crse" href="">3 courses</a>
                </div>
            </div>
        </div>

        <!-- third category -->
        <div class="course-category category3">
            <!-- category image -->
            <div class="category-img">
                <img src="images/market.png" alt="">
            </div>
            <!-- category content -->
            <div class="category-content">
                <div class="heading">
                    <h2>Marketing</h2>
                    <p>Lorem ipsum dolor sit amet consectetur. Curabitur diam arcu dui etiam posuere mauris tortor.</p>
                </div>
                <div class="category-btns">
                    <div class="explore-link">
                        <a href="">Explore courses</a>
                        <i class="bi bi-arrow-right"></i>
                    </div>
                    <a class="crse" href="">7 courses</a>
                </div>
            </div>
        </div>

        <!-- fourth category -->
         <div class="course-category category4">
            <!-- category image -->
            <div class="category-img">
                <img src="images/infographics.jpg" alt="">
            </div>
            <!-- category content -->
            <div class="category-content">
                <div class="heading">
                    <h2>Infographics</h2>
                    <p>Lorem ipsum dolor sit amet consectetur. Fermentum scelerisque tortor ut eros semper enim in sit netus.  </p>
                </div>
                <div class="category-btns">
                    <div class="explore-link">
                        <a href="">Explore courses</a>
                        <i class="bi bi-arrow-right"></i>
                    </div>
                    <a class="crse" href="">10 courses</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!--===== ABOUT SECTION =====-->
<section class="about container reveal reveal-section">
    <div class="about-seed">
        <!-- content -->
        <div class="about-content">
            <div class="about-text">
                <h2>About Digital School</h2>
                <p class="top-headline">Digital School is an accredited institution for immersive training and professional development in digital professions, validated by the Ministry of Employment and Vocational Training. </p>
                <p class="bottom-headline">We design and deliver specific and customized training in various IT fields according to your needs. </p>
            </div>
            <div class="about-btns">
                <a href="About.php">About Us</a>
            </div>
        </div>
        <!-- content image -->
        <div class="about-img">
            <img src="images/section-img.png" alt="">
        </div>
    </div>
</section>

<!-- ==========FAQs SECTION BEGINS -->
<section class="section5 container reveal reveal-section">
    <div class="title">
        <h3>Frequently Asked questions</h3>
    </div>
    <div class="faq-grid">
        <!-- faq1 -->
        <article class="faq">
            <div class="faq-icon"><i class="bi bi-plus"></i></i></div>
            <div class="question-answer">
                <h4>How do I know the right courses for me?</h4>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium beatae a esse commodi magni sunt dolorem! Expedita, dolorem mollitia sit dolores molestias repudiandae. Aspernatur, nesciunt?</p>
            </div>
        </article>

        <!-- faq2 -->
        <article class="faq">
            <div class="faq-icon"><i class="bi bi-plus"></i></div>
            <div class="question-answer">
                <h4>How do I know the right courses for me?</h4>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium beatae a esse commodi magni sunt dolorem! Expedita, dolorem mollitia sit dolores molestias repudiandae. Aspernatur, nesciunt?</p>
            </div>
        </article>

        <!-- faq3 -->
        <article class="faq">
            <div class="faq-icon"><i class="bi bi-plus"></i></div>
            <div class="question-answer">
                <h4>How do I know the right courses for me?</h4>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium beatae a esse commodi magni sunt dolorem! Expedita, dolorem mollitia sit dolores molestias repudiandae. Aspernatur, nesciunt?</p>
            </div>
        </article>

        <!-- faq4 -->
        <article class="faq">
            <div class="faq-icon"><i class="bi bi-plus"></i></div>
            <div class="question-answer">
                <h4>Will certificates be offered at the end of training?</h4>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium beatae a esse commodi magni sunt dolorem! Expedita, dolorem mollitia sit dolores molestias repudiandae. Aspernatur, nesciunt?</p>
            </div>
        </article>

        <!-- faq5 -->
        <article class="faq">
            <div class="faq-icon"><i class="bi bi-plus"></i></div>
            <div class="question-answer">
                <h4>How do I know the right courses for me?</h4>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium beatae a esse commodi magni sunt dolorem! Expedita, dolorem mollitia sit dolores molestias repudiandae. Aspernatur, nesciunt?</p>
            </div>
        </article>

        <!-- faq6 -->
        <article class="faq">
            <div class="faq-icon"><i class="bi bi-plus"></i></div>
            <div class="question-answer">
                <h4>How do I know the right courses for me?</h4>
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

<!-- ==========FOOTER BEGINS==========  -->
<footer class="container reveal reveal-section">
   
    <div class="footer-top">
        <img src="images/logo Digital School.png" alt="">
        <div class="footer-top-text">
        <p>Empowering Trainees for Rapid Technical Proficiency and Competitive Success.</p>
    </div>
    </div>
    <hr class="divider">

    <!-- middle of footer -->
    <div class="footer-middle">

        <!-- subscribe to newsletter section -->
        <div class="subscribe">
        <div class="email-icon">
            <i class="bi bi-envelope-fill"></i>
        </div>
        <h2>Subscribe to our newsletter</h2>
        <p>Receive updates on our trainings and seminars every month.</p>
    
    <div class="submit-email">
        <input type="text" id="e-mail" name="email" placeholder="Enter your email">
        <a href="">SUBMIT</a>
    </div>
</div>

<!-- contact us section -->
<div class="footer-list contact-us">
    <span>Contact Us</span>
    <ul>
        <li>Email: info@seeds.cm</li>
        <li>Phone: +237 656-193-199</li>
        <li>BP 14947, Acacias, Afriland First Bank Building Yaoundé, Cameroun</li>
    </ul>
</div>

<!-- Our pages section -->
<div class="footer-list">
    <span>Our pages</span>
    <ul>
        <li><a href="">Home</a></li>
        <li><a href="">About</a></li>
        <li><a href="">Contact</a></li>
        <li><a href="">Courses</a></li>
    </ul>
</div>

<!-- language -->
<div class="footer-list">
    <span>Language</span>
    <ul>
        <li><a href="">English</a></li>
        <li><a href="">Français</a></li>
        
    </ul>
</div>
</div>
<hr class="divider">

<!-- bottom of footer -->
<div class="footer-bottom">
    <span>Copyright © 2023 All rights reserved</span>
    <!-- media -->
    <div class="media">
        <a href=""><i class="bi bi-whatsapp"></i></a>
        <a href=""><i class="bi bi-instagram"></i></a>
        <a href=""><i class="bi bi-facebook"></i></a> 
    </div>
</div>
</footer>

<script src="js/Home.js"></script>
<script src="js/script.js"></script>
</body>
</html>