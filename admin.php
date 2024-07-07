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

// Fonction pour générer un slug unique avec un nombre aléatoire
function generateSlug($courseName, $pdo) {
    $slug = strtolower(str_replace(' ', '-', $courseName));
    $randomNumber = rand(1000, 9999); // Génère un nombre aléatoire entre 1000 et 9999
    $uniqueSlug = $slug . '-' . $randomNumber;

    // Vérifier si le slug est unique, sinon récursivement ajouter un autre nombre aléatoire
    if (isSlugInUse($uniqueSlug, $pdo)) {
        return generateSlug($courseName, $pdo);
    }

    return $uniqueSlug;
}
// Fonction pour vérifier si un slug est déjà utilisé
function isSlugInUse($slug, $pdo) {
    $sql = "SELECT COUNT(*) FROM course WHERE slug = :slug";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':slug', $slug);
    $stmt->execute();
    $count = $stmt->fetchColumn();
    return $count > 0;
}

// Vérification si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupération des données du formulaire
    $courseCategory = $_POST['courseCategory'];
    $courseName = $_POST['courseName'];
    $courseDuration = $_POST['courseDuration'];
    $linkVideos = $_POST['numberVideos'];
    $aboutCourse = $_POST['aboutCourse'];
    $syllabus = $_POST['syllabus'];
    

    // Génération du slug avec un nombre aléatoire
    $slug = generateSlug($courseName, $pdo);

    // Requête SQL d'insertion avec le slug
    $sql = "INSERT INTO course (slug, category, course_name, about_course, syllabus, duration, video_link) 
            VALUES (:slug, :courseCategory, :courseName, :aboutCourse, :syllabus, :courseDuration, :linkVideos )";
    // Préparation de la requête avec PDO
    $stmt = $pdo->prepare($sql);

    // Liaison des paramètres
    $stmt->bindParam(':courseCategory', $courseCategory);
    $stmt->bindParam(':courseName', $courseName);
    $stmt->bindParam(':aboutCourse', $aboutCourse);
    $stmt->bindParam(':syllabus', $syllabus);
    $stmt->bindParam(':courseDuration', $courseDuration);
    $stmt->bindParam(':linkVideos', $linkVideos);
    $stmt->bindParam(':slug', $slug);

    // Exécution de la requête
    if ($stmt->execute()) {
        echo "Course created successfully";
    } else {
        echo "Erreur lors de l'insertion des données.";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create course</title>
    <link rel="stylesheet" href="css/signup.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@500;700;800&family=Varela+Round&display=swap" rel="stylesheet">
    <script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>
</head>
<body style="background-image: url(./images/headline-img.jpg)">
    <!-- Sign Up form -->
    <form method="post" class="form modal-hidden">
        <div class="logo"><img src="images/logo Digital School.png" alt="">
            <span>CREATE NEW COURSE</span>
        </div>
        
        <!-- Course category -->
        <div class="form-group ">
            <label for="username">Course category:</label>
            <input type="text" id="username" name="courseCategory" placeholder="Entrer la catédorie du cours.." required>
            <span class="err">Error message</span>
        </div>
        <!-- Course Price -->
       
        <!-- Course Name -->
        <div class="form-group ">
            <label for="username">Course Name:</label>
            <input type="text" id="username" name="courseName" placeholder="Entrer le titre de la leçon.." required>
            <span class="err">Error message</span>
        </div>
        <!-- Course Price -->
        <div class="form-group ">
            <label for="duration">Course Duration:</label>
            <input type="number" id="duree" name="courseDuration" placeholder="Entrer la durée.." required>
            <span class="err">Error message</span>
        </div>
        <!-- Course Price -->
        <div class="form-group ">
            <label for="videos">Course Videos:</label>
            <input type="text" id="videos" name="numberVideos" placeholder="Entrer le lien de la video" required>
            <span class="err">Error message</span>
        </div>
        <!-- Course Description -->
        <div class="form-group ">
            <label for="description">Une description du cours </label>
            <textarea name="aboutCourse" id="description" cols="30" rows="10" ></textarea>
            <span class="err">Error message</span>
        </div>

        <!-- Course Syllabus -->
        <div class="form-group ">
            <label for="syllabus">Syllabus du cours </label>
            <textarea name="syllabus" id="syllabus" cols="30" rows="10"></textarea>
            <span class="err">Error message</span>
        </div>
        
        

        <!-- Button -->
  <button type="submit" class="signup-btn">Create Course</button>

    </form>
    
</body>

<script>
    function CKEditorInitGlobal(selector_name){
//        alert("curieux");
        ClassicEditor
            .create( document.querySelector( selector_name ) )
            .then( editor => {
                console.log( 'Editor was initialized', editor );
//                alert("initialise");
            } )
            .catch( err => {
                console.error( err.stack );
            } );
    }

    CKEditorInitGlobal("#syllabus");
    CKEditorInitGlobal("#description");
</script>
</html>


