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

     <!--========== Nav-bar starts========== -->
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
    <!--========== Nav-bar ends========== -->

    <section class="header">
    <div class="header-heading">
        <a href="">Marketing</a>
        <h3>Deploying a website completely using wordpress.</h3>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Non, accusamus. Saepe cumque, perspiciatis repellendus asperiores rem ratione tempora optio doloribus.</p>
    </div>

    <!-- CUSTOM VIDEO PLAYER -->
        <div class="video-player">
            <video controls src="videos/dev.mp4" id="video" poster="images/item4.jpg"></video>
        </div>
    </section>

        <!-- ABOUT COURSE -->
        <div class="about-course">
            <div class="description">
                <div class="description-text">
                <h3>About the course</h3>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eveniet quia necessitatibus error officiis commodi veniam consequuntur est earum. Provident sint pariatur perferendis dolorum. Dolorem in, facere voluptatum esse atque rerum dolore eaque consequatur itaque beatae numquam sequi quis error? Magnam modi aspernatur tempore animi iste?</p>
                <hr>
            </div>
            </div>
            <div class="course-details">
                <h4>Course details</h4>
                <hr>
                <ul class="details">
                    <li>
                        <i class="bi bi-play-fill"></i>
                        <span>3 videos</span>
                    </li>
                    <li>
                        <i class="bi bi-stopwatch-fill"></i>
                        <span>Duration:1 hr</span>
                    </li>
                    <li>
                        <i class="bi bi-phone-fill"></i>
                        <span>Accessible through computer and mobile</span>
                        
                    </li>
                </ul>
            </div>
        </div>
    
        <div class="down-bar">
            <div class="price">
                <P>Get this course</P>
                <span>FCFA 15000.000</span>
            </div>
            <div class="bar-btn">
                <button type="submit" name="submit" value="Submit" class="btn btn-primary">Buy Now</button>
            </div>
        </div>

        <!-- ==========FOOTER BEGINS==========  -->
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
    
</body>
</html>