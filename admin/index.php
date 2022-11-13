<?php
    session_start();
    require "../config.php";

    if(!isset($_SESSION["login"]))
    {
        header("Location: login-adm.php");
        exit;
    }   

    $comand = mysqli_query($conn, "SELECT * FROM adm_account WHERE username = 'andiari'");

    $data = [];
    while($row = mysqli_fetch_assoc($comand))
    {
        $data[] = $row;
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
    <title>Admin StyleFashion</title>

    <style>
        body
        {
            background-image: url("../admin/background/white.jpg");
            background-repeat: no-repeat;
            background-size: 100%;
        }
    </style>
</head>
<body>
    <!-- header -->
    <div class="header-adm">
        <div class="title">
            <h3>StyleFashion</h3>
            <p>ADMIN</p>
        </div>
        
        <a href="logout.php"><button class="logout-btn">Sign Out</button></a>
    </div>

    

    
    <!-- menu -->
    <div class="menu">
        <div class="edit">
            <a href="transaksi.php">Daftar Transaksi</a>
        </div>

        <div class="edit">
            <a href="add-product.php">TAMBAH PRODUK</a>
        </div>

        <div class="edit">
            <a href="delete.php">LIHAT PRODUK</a>
        </div>  
  
    </div>
</body>
</html>