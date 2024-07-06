<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>retrieve-account</title>
    <link rel="stylesheet" href="css/retrieveAccount.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@500;700;800&family=Varela+Round&display=swap" rel="stylesheet">
</head>
<body>
    <!-- Sign Up form -->
    <form action="/" class="form modal-hidden">
        <div class="logo"><img src="images/logo Digital School.png" alt="">
            <span>RETRIEVE ACCOUNT</span>
        </div>
        
        <!-- Email -->
        <div class="form-group ">
            <label for="email">Email:</label>
            <input type="email" id="email" name="e-mail" placeholder="Enter email.." required>
            <span class="err">Error message</span>
        </div>
       
       
        <!-- Button -->
  <button type="submit" class="signup-btn">Submit</button>
  
  <!-- login and sigun links -->
  <div class="account-check">
  <a class="signin" href="login.php">Log into my account</a></span></span>
  <a class="signup" href="signup.php">Create account</a>
</div>
    </form>
    <div class="overlay"></div>
    <script src="js/signup.js"></script>
</body>
</html>