<?php
    session_start();
    require "../config.php";
    if(isset($_POST["login"]))
    {
        $email = $_POST["email"];
        $password = $_POST["password"];
        $cek = mysqli_query($conn,"SELECT * FROM user WHERE email = '$email'");
        if(mysqli_num_rows($cek) === 1)
        {
            $row = mysqli_fetch_assoc($cek);
            if(password_verify($password, $row["password"]))
            {
                $_SESSION["login"] = true;
                $_SESSION['id'] = $row["username"];
                $_SESSION["data"] = $row["id_user"];
                $data = $_SESSION["data"];
                // var_dump($);die()
                header("Location: ../home.php");
                echo "$data";
                exit;
            }
        }
        
        $error = true;
    }
?>


<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="../style/style-adm.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&family=Manrope:wght@200&display=swap" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200&display=swap" rel="stylesheet"> 
    <script src="https://kit.fontawesome.com/bf9497bfb3.js" crossorigin="anonymous"></script>
    <title>StyleFashion</title>
    <style>
        body
        {
            padding-top: 40px;
        }

        .title
        {
            margin-left: 500px;
        }
    </style>
</head>
<body>
    <div class="title">
        <h3>StyleFashion</h3>
        <p>USER</p>
    </div>

    <div class="login-form">
        <form action="" method="post">
            <p>Email</p>
            <input type="email" name="email" placeholder="email..." required>
            <p>Password</p>
            <input type="password" name="password" placeholder="password..." required> <br><br>
            <button name="login" class="login-btn">Sign in</button>
            <a href="../user/regis-user.php">Belum memiliki akun? Registrasi disini</a>
        </form>
        <?php if(isset($error))
        {echo "<p style='color: red;'>Ussername atau password salah!</p>"   ;
        } ?>
    </div>
    
</body>
</html>