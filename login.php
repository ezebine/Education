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

// Vérification si le formulaire de connexion a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupération des données du formulaire
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Requête SQL pour récupérer l'utilisateur par son nom d'utilisateur
    $sql = "SELECT * FROM user WHERE email = :email";

    // Préparation de la requête avec PDO
    $stmt = $pdo->prepare($sql);

    // Liaison des paramètres
    $stmt->bindParam(':email', $email);

    // Exécution de la requête
    $stmt->execute();

    // Récupération du résultat
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        // Authentification réussie
        session_start(); // Démarrer la session
    
        // Enregistrez les informations de l'utilisateur dans la session
        $_SESSION['username'] = $user['username'];
        $_SESSION['role'] = $user['role'];
    
        // Redirection en fonction du rôle
        if ($user['role'] == 'Admin') {
            header('Location: admin.php');
            exit(); // Assurez-vous de terminer l'exécution après la redirection
        } elseif ($user['role'] == 'User') {
            header('Location: Home.php');
            exit();
        }
    } else {
        // Authentification échouée
        echo "Nom d'utilisateur ou mot de passe incorrect.";
    }
    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/login.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@500;700;800&family=Varela+Round&display=swap" rel="stylesheet">
</head>
<body>
    <!-- Sign Up form -->
    <form method="post" class="form modal-hidden">
        <div class="logo"><img src="images/logo Digital School.png" alt="">
            <span>SIGN IN</span>
        </div>
        
        <!-- Email -->
        <div class="form-group ">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" placeholder="Enter email.." required>
            <span class="err">Error message</span>
        </div>
        <!-- Password -->
        <div class="form-group ">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" placeholder="Enter password.." required>
            <span class="err">Error message</span>
            <span class="forgot-password"><a href="retrieveAccount.html">Forgot Password ?</a></span>
        </div>
       
        <!-- Button -->
  <button type="submit" class="signup-btn">Login</button>
  
  <!-- if account exixts -->
  <div class="account-check">
  <p>Don't have an account? <span><a href="signup.php">Sign Up</a></span></p>
</div>
    </form>
    
    <script src="js/signu.js"></script>
</body>
</html>