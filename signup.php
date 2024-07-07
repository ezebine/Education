<?php
// Establish connection
$dsn = 'mysql:host=localhost;dbname=ds';
$username = 'root';
$password = '';

// Tentative de connexion à la base de données avec PDO
try {
    $pdo = new PDO($dsn, $username, $password);
} catch (PDOException $e) {
    die('Connection failed : ' . $e->getMessage());
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // fetching of data
    $username = $_POST['username'];
    $email = $_POST['e-mail'];
    $password = $_POST['password'];
    $password2 = $_POST['confirmPassword'];

    // form validation
    if (empty($username)) {
        die("Username is required");
    }
    
    if ( ! filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Valid email is required");
    }
    
    if (strlen($password) < 8) {
        die("Password must be at least 8 characters");
    }
    
    if ( ! preg_match("/[a-z]/i", $password)) {
        die("Password must contain at least one letter");
    }
    
    if ( ! preg_match("/[0-9]/", $password)) {
        die("Password must contain at least one number");
    }
    
    if ($password !== $password2) {
        die("Passwords must match");
    }

    // Hash password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // check user email
    $checkUser = $pdo->prepare("SELECT * FROM user WHERE email = ?");
    $checkUser->execute([$email]);
    $result = $checkUser->rowCount();
    if ($result > 0){
        echo"Email already exists";
        exit;
    }
    else{

    // Préparation de la requête SQL d'insertion
    $sql = "INSERT INTO user (username, email, password) 
            VALUES (:username, :email, :password)";

    // Préparation de la requête avec PDO
    $stmt = $pdo->prepare($sql);

    // Liaison des paramètres
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $hashedPassword);

    // Query execution
    if ($stmt->execute()) {
        echo "Signup successful" ;
        exit;
    } else{
        echo "Connection error";
    }
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignUp</title>
    <link rel="stylesheet" href="css/signup.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@500;700;800&family=Varela+Round&display=swap" rel="stylesheet">
</head>
<body style="background-image: url(./images/headline-img.jpg)">
    <!-- Sign Up form -->
    <form method="post" action="" class="form modal-hidden" novalidate>
        <div class="logo"><img src="images/logo Digital School.png" alt="">
            <span>SIGN UP</span>
        </div>
        <!-- Name -->
        <div class="form-group ">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" placeholder="Enter username..">
            <span class="err">Error message</span>
        </div>
        <!-- Email -->
        <div class="form-group ">
            <label for="email">Email:</label>
            <input type="email" id="email" name="e-mail" placeholder="Enter email..">
            <span class="err">Error message</span>
        </div>
        <!-- Password -->
        <div class="form-group ">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" placeholder="Enter password..">
            <span class="err">Error message</span>
        </div>
        <!-- Confirm password -->
        <div class="form-group">
            <label for="confirmPassword"> Confirm Password:</label>
            <input type="password" id="confirmPassword" name="confirmPassword" placeholder="Confirm password..">
            <span class="err">Error message</span>
        </div>
        <!-- terms and conditions -->
        <div class="terms-services">
        <input type="checkbox" id="terms" name="terms" value="termsandservices" checked>
        <label for="terms"> I agree to all <span><a href="">terms and conditions</a></span></label>
        </div>

        <!-- Button -->
  <button type="submit" class="signup-btn">Create account</button>
  
  <!-- if account exixts -->
  <div class="account-check">
  <p>Already have an account? <span><a href="login.php">Login</a></span></p>
</div>
    </form>
    
    
    <!-- <script src="js/signup.js"></script> -->
</body>
</html>