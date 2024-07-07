


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Purchase</title>
    <link rel="stylesheet" href="css/buyCourse.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@500;700;800&family=Varela+Round&display=swap" rel="stylesheet">
</head>
<body style="background-image: url(./images/blur.jpg)">
    <form class="buy">
        <h1>Welcome, Tajouego</h1>
        <p>This course, <span class="courseName">Deploying a website completely using wordpress</span> will cost you FCFA <span class="coursePrice"> 150000</span>. Click on the button below in order to purchase the course</p>
        <button  onclick="sendWhatsapp()">Purchase</button>
    </form>

    <script>

function sendWhatsapp(){

var courseName = document.querySelector('.courseName').textContent;
var url ="https://wa.me/+237681526616?text="
+  "Good day,I came across your website and I wish to purchase the course:"+ 
+"*Course Name :* " +courseName+"%0a"
window.open(url,'_blank').focus();
};

</script>
</body>
</html>