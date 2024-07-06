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

// Vérification si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupération des données du formulaire
    $username = $_POST['username'];
    $email = $_POST['e-mail'];
    $password = $_POST['password'];

    // Hachage du mot de passe
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Préparation de la requête SQL d'insertion
    $sql = "INSERT INTO user (username, email, password) 
            VALUES (:username, :email, :password)";

    // Préparation de la requête avec PDO
    $stmt = $pdo->prepare($sql);

    // Liaison des paramètres
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $hashedPassword);

    // Exécution de la requête
    if ($stmt->execute()) {
        echo "L'utilisateur a été enregistré avec succès.";
    } else {
        echo "Erreur lors de l'enregistrement de l'utilisateur.";
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
<body>
    <!-- Sign Up form -->
    <form method="post" class="form modal-hidden">
        <div class="logo"><img src="images/logo Digital School.png" alt="">
            <span>SIGN UP</span>
        </div>
        <!-- Name -->
        <div class="form-group ">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" placeholder="Enter username.." required>
            <span class="err">Error message</span>
        </div>
        <!-- Email -->
        <div class="form-group ">
            <label for="email">Email:</label>
            <input type="email" id="email" name="e-mail" placeholder="Enter email.." required>
            <span class="err">Error message</span>
        </div>
        <!-- Password -->
        <div class="form-group ">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" placeholder="Enter password.." required>
            <span class="err">Error message</span>
        </div>
        <!-- Confirm password -->
        <div class="form-group">
            <label for="confirmPassword"> Confirm Password:</label>
            <input type="password" id="confirmPassword" name="confirmPassword" placeholder="Confirm password.." required>
            <span class="err">Error message</span>
        </div>
        <!-- terms and conditions -->
        <div class="terms-services">
        <input type="checkbox" id="terms" name="terms" value="termsandservices">
        <label for="terms"> I agree to all <span><a href="">terms and conditions</a></span></label>
        </div>

        <!-- Button -->
  <button type="submit" class="signup-btn">Create account</button>
  
  <!-- if account exixts -->
  <div class="account-check">
  <p>Already have an account? <span><a href="login.php">Login</a></span></p>
</div>
    </form>
    
    
    <script src="js/signu.js"></script>
</body>
</html>