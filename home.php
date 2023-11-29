<?php
include 'functions.php';

session_start();
if (!isset($_SESSION['loggedin'])) {
    header('Location: index.html');
    exit;
}
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <title>Home Page</title>
    <link href='css/style.css' rel='stylesheet' type='text/css'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css' integrity='sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==' crossorigin='anonymous' referrerpolicy='no-referrer'>
</head>
<body class='loggedin'>
<nav class='navtop'>
    <div>
        <h1>PHP Final Project</h1>
        <a href="home.php"><i class="fas fa-home"></i>Home</a>
        <a href='profile.php'><i class='fas fa-user-circle'></i>Profile</a>
        <a href="read.php"><i class="fas fa-address-book"></i>Contacts</a>
        <a href='logout.php'><i class='fas fa-sign-out-alt'></i>Logout</a>
        
    		
    </div>
</nav>
<div class='content' style="width: 400px; padding: 20px; background-color: #f0f0f0; border-radius: 10px; text-align: center;">
    <h2>Home Page</h2>
    <p>Welcome back, <?=$_SESSION['name']?>!</p>
    <p>In Admin page you can edit and delete your contacts information.</p>
</div>
</body>
</html>