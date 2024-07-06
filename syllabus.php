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

// Vérification si l'ID du cours est présent dans l'URL
if (isset($_GET['slug'])) {
    $courseSlug = $_GET['slug'];

    // Requête SQL pour récupérer les informations du cours en fonction de l'ID
    $sql = "SELECT * FROM course WHERE slug = :slug";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':slug', $courseSlug);
    $stmt->execute();

    // Récupération des résultats
    $course = $stmt->fetch(PDO::FETCH_ASSOC);
} else {
    // Redirection si l'ID n'est pas présent dans l'URL
    header('Location: Courses.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Courses</title>
    <link rel="stylesheet" href="css/Courses.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@500;700;800&family=Varela+Round&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>
<body>

     <!-- Nav-bar starts -->
     <header>
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
      </header>


      

    <!-- headline section -->
    <section class="headline reveal reveal-section">
        <div class="title">
            <h2><?= $course['nom_cours'] ?></h2>
            <p>  <?= $course['description'] ?> </p>
        </div>

        <!-- New course container -->
        <div class="new-course">
            <div class="new-course-img"></div>
            <div class="new-course-content">
                <div class="new-course-description">
                <div class="notification">
                    <i class="bi bi-bell-fill"></i>
                    <span>Premium course</span>
                </div>

                <div class="new-course-headline">
                    <h2>Syllabus</h2>
                    <p><?=$course['syllabus'] ?></p>
                </div>
                <hr class="divider">

                <div class="duration-price">
                    <div class="duration">
                        <i class="bi bi-stopwatch-fill"></i>
                        <span><?= $course['duree'] ?> hours</span>
                    </div>
                        <span>FCFA <?= $course['prix'] ?> .00</span>
                   </div>
                   <a class="new-course-btn" href="">Subscribe Now</a>
            </div>
            </div>
        </div>
    </section>

    <!-- =====COURSES FLEXBOC -->

    <!-- footer  -->
<footer class="reveal reveal-section">
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
    
<script src="js/Courses.js"></script>
<script src="js/script.js"></script>
</body>
</html>
