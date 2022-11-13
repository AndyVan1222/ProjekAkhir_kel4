<?php
    // session_start();
    require "../config.php";
    if( isset($_POST["regis"])){
        $email = $_POST["email"];
        $username = $_POST["username"];
        $password = $_POST["password"];
        $cpassword = $_POST["password2"];
        
        if($password === $cpassword)
        {
            $password = password_hash($password, PASSWORD_DEFAULT);
            $hasil = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");

            if(mysqli_fetch_assoc($hasil))
            {
                echo
                "<script>
                    alert('username telah digunakan!');
                    document.location.href = 'regis-user.php';
                </script>";
            }

            else
            {
                $sql = "INSERT INTO user VALUES('', '$email', '$username', '$password')";
                $hasil = mysqli_query($conn, $sql);

                if(mysqli_affected_rows($conn) > 0)
                {
                    echo 
                    "<script>
                        alert('Registrasi berhasil');
                        document.location.href='login-user.php';
                    </script>";
                }
            }
        }
        else
        {
            echo "<script>
            alert('kedua passowrd tidak sama');
            document.location.href = 'regis-users.php';
            </script>";
        }

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
            background-color: white;
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
        <p>LOGIN</p>
    </div>

    <div class="regist-form">
        <form action="" method="post">
            <p>Email</p>
            <input type="email" name="email" placeholder="Email..." required >
            <p>Username</p>
            <input type="text" name="username" placeholder="username..." required>
            <p>Password</p>
            <input type="password" name="password" placeholder="password..." required>
            <p>Konfirmasi Password</p>
            <input type="password" name="password2" placeholder="konfirmasi password..." required> <br><br>
            <button name="regis" class="regist-btn">Sign up</button> <br><br>
            <a href="../user/login-user.php">Sudah memiliki akun? Login disini</a>
        </form>
    </div>
    
</body>
</html>