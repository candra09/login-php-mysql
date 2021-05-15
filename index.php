<?php
session_start();

if( !isset($_SESSION["login"])){
    header("location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Halaman Login</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <nav class="navtop">
                <h1>Home</h1>
        </nav>

        <div class="content">
            <h2>SELAMAT DATANG!!</h2>
            <br><br>

            <a href="logout.php">Logout</a>
        </div>

    </body>
</html> 