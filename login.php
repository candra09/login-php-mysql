<?php
session_start();

if(isset($_COOKIE["login"])){
    if($_COOKIE["login"] == 'true') {
        $_SESSION["login"] = true;
    }
}

if(isset($_SESSION["login"])){
    header("location: index.php");
    exit;
}
require'koneksi.php';

$err = "";

if(isset($_POST["login"])){
    $username = $_POST["username"];
    $password = $_POST["password"];
    $nama = $_POST["nama"];


    if($username == '' or $password == ''){
        $err .= "<li>Silakan masukkan username dan juga password.</li>";
    }
    else{
        $result = mysqli_query($con, "SELECT * FROM user where username = '$username'");
        $r1 = mysqli_fetch_array($result);
        
        if($r1['username'] == ''){
            $err .= "<li>Username <b>$username</b> tidak tersedia.</li>";
        }elseif($r1['password'] != ($password)){
            $err .= "<li>Password yang dimasukkan tidak sesuai.</li>";
        }       
        
        if(empty($err)){
            //set session
            $_SESSION["login"] = true;
            
            // cek cookie
            if(isset($_POST['remember'])){ 
                // set selama 1 bulan
                setcookie('login','true', time()+ (60 * 60 * 24 * 30));
            } 
            header("location: index.php");
            exit;
        }
    }
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
            <h1 class="h1">Halaman Login</h1>
        </nav>

        <div class="content">
            <div class="err-input">
                <?php if($err){ ?>
                            <div id="login-alert" class="alert alert-danger col-sm-12">
                                <ul><?php echo $err ?></ul>
                            </div>

                        <?php } ?> 

            </div>
        
            <form action="" method="post">
                <div class="input-">
                    <label for="username">Username</label><br>
                    <input type="text" name="username" id="username" placeholder="Username"><br>

                    <label for="password">Password</label><br>
                    <input type="password" name="password" id="password" placeholder="Password"><br>
                </div>
                <div class="submit">
                    <label for="remember">Remember Me</label>
                    <input type="checkbox" name="remember" id="remember" placeholder="remember"><br>
                </div>
    
                <button class="btn" type="submit" name="login">Login</button>
            </form>
        </div>
    </body>
</html> 
