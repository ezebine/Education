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
    <!--========== Nav-bar starts========== -->
    <header>
        <!-- Nav-image -->
        <img class="school-logo" src="/images/logo Digital School.png" alt="">
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

    <!-- =====CONTACT SECTION===== -->
    <!-- <section class="contact"> -->
        <div class="contact-box contact-container">
        <div class="contact-aside">
            <div class="aside-img">
                <img src="images/contactus.png" alt="">
            </div>
                <h2>Contact Us</h2>
                <p>Do you have specific needs? Contact us! We will discuss about it and find a solution for you</p>
                <ul class="contact-details">
                    <li>
                        <i class="bi bi-telephone-inbound"></i>
                        <span> +237 690-470-204</span>
                    </li>
                    <li>
                        <i class="bi bi-envelope"></i>
                        <span>tezemfoudjiezebine@gmail.com</span>
                    </li>
                    <li>
                        <i class="bi bi-geo-alt"></i>
                        <span>Yaounde,Cameroon</span>
                    </li>
                </ul>
                <ul class="contact-socials">
                    <li><a href=""><i class="bi bi-whatsapp"></i></a></li>
                    <li><a href=""><i class="bi bi-facebook"></i></a></li>
                    <li><a href=""><i class="bi bi-instagram"></i></a></li>
                </ul>
            </div>
            <!-- ====contact form==== -->
            <form class="contact-form">
                <div class="form-name">
                    <input type="text" id="name" name="name" placeholder="Name" required>
                    <input type="email" id="email" name="e-mail" placeholder="Email" required>
                    </div>
                    <input type="text" id="subject" name="subject" placeholder="Subject" required>
                    <textarea name="message" id="message" rows="7" placeholder="Your message" required></textarea>
                <button type="submit" >Send</button>
            </form>    
            
        </div>
    </section>

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
        <li>Email: tezemfoudjiezebine@gmail.com</li>
        <li>Phone: +237 690-470-204</li>
        <li>BP 14947, Ngoa-ekellé,  Yaoundé, Cameroun</li>
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

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les données du formulaire
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Configuration de l'envoi d'email
    $to = 'votre-adresse-email@example.com';
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "X-Mailer: PHP/" . phpversion();

    // Préparer le corps du message
    $body = "Nom: $name\n";
    $body .= "Email: $email\n";
    $body .= "Sujet: $subject\n";
    $body .= "Message:\n$message";

    // Envoyer l'email
    if (mail($to, $subject, $body, $headers)) {
        http_response_code(200);
        echo 'Email sent successfully!';
    } else {
        http_response_code(500);
        echo 'Failed to send email. Please try again later.';
    }
} else {
    http_response_code(405);
    echo 'Method not allowed.';
}
?>

<script src="js/script.js">
    // java script du contact form ci dessus 
    async function sendEmail(event) {
  event.preventDefault();

  const name = document.getElementById('name').value;
  const email = document.getElementById('email').value;
  const subject = document.getElementById('subject').value;
  const message = document.getElementById('message').value;

  try {
    const response = await fetch('/send-email.php', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/x-www-form-urlencoded',
      },
      body: new URLSearchParams({ name, email, subject, message }),
    });

    if (response.ok) {
      alert('Email sent successfully!');
    } else {
      alert('Failed to send email. Please try again later.');
    }
  } catch (error) {
    console.error('Error sending email:', error);
    alert('An error occurred. Please try again later.');
  }
}
</script>


</body>
</html>
