<?php
    session_start();
    require "../config.php";


    if(!isset($_SESSION["login"]))
    {
        header("Location: login-user.php");
        exit;
    }
    else
    {
        
        if(isset($_POST["buy"]))
        {
            $id = $_SESSION["data"];
            $produk = $_SESSION["baju"];
            $npenerima = $_POST["npenerima"];
            $alamat = $_POST["alamat"];
            $nhp = $_POST["phone"];
            
            $sql = mysqli_query($conn, "INSERT INTO pembelian VALUES('', $id, $produk, '$npenerima', $nhp , '$alamat')");

            if($sql)
            {
                echo "<script>
                alert('Data telah dimasukan harap tunggu sebentar')
                document.location.href='../home.php'
                </script>";
            }
            else
            {
                echo "<script>
                alert('Server error');
                document.location.href='beli.php'
                </script>";
            }
        }
    }

    
?>


<!DOCTYPE html>
<html lang="en">
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
        .input-btn
        {
            width: 252px;
        }
        .title
        {
            margin-left: 530px;
        }
    </style>
</head>
<body>
    <div class="title">
        <h3>StyleFashion</h3>
    </div>

    <div class="login-form">
        <form action="" method="post">
            <p>Nama Penerima</p>
            <input type="text" name="npenerima" placeholder="penerima..." required>
            <p>alamat anda</p>
            <input type="text" name="alamat" placeholder="Alamat..." required>
            <p>No. Hp</p>
            <input type="number" name="phone" placeholder="Nomor hp anda..." required>
            <br><br>
            <button class="input-btn" name="buy"><i class="fa-solid fa-shopping-cart"></i>Buy Now</button>
        </form>
    </div>

    
</body>
</html>