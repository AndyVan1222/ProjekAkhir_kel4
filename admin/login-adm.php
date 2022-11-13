<?php
    session_start();
    require "../config.php";
    if(isset($_POST["login"]))
    {
        $username = $_POST["username"];
        $password = $_POST["password"];
        $cek = mysqli_query($conn,"SELECT * FROM adm_account WHERE username = '$username'");
        if(mysqli_num_rows($cek) === 1)
        {
            $row = mysqli_fetch_assoc($cek);
            if($password == $row["password"])
            {
                $_SESSION["login"] = true;
                $_SESSION["username"] = $row["username"];
                $_SESSION["gambar"] = $row["gambar"];
                header("Location: index.php");
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
        <p>ADMIN</p>
    </div>

    <div class="login-form">
        <form action="" method="post">
            <p>ussername</p>
            <input type="text" name="username" placeholder="username..." required>
            <p>Password</p>
            <input type="password" name="password" placeholder="password..." required> <br><br>
            <button name="login" class="login-btn">Sign in</button>
            <?php if(isset($error))
            {
                echo "<p style='color: red;>Username/password salah!</p>";
            } ?>
        </form>
    </div>
    
</body>
</html>