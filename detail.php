<?php
    session_start();
    require "config.php";
    $username = $_GET["id"];
    if(!isset($_SESSION["login"]))
    {
        header("Location: user/login-user.php");
        exit;
    }

    if(isset($_SESSION["id"]))
    {
        $username = $_SESSION["id"];
    }
    else
    {
        $username = "guest";
    }

    $id = $_GET["id"];
    $result = mysqli_query($conn, "SELECT * FROM produk WHERE id = $id");
    $bar = [];

    while($row = mysqli_fetch_assoc($result))
    {
        $bar[] = $row;
    }
    $_SESSION["baju"] = $id;
    $baju = $_SESSION["baju"];
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="style/style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&family=Manrope:wght@200&display=swap" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200&display=swap" rel="stylesheet"> 
    <script src="https://kit.fontawesome.com/bf9497bfb3.js" crossorigin="anonymous"></script>
    <title>StyleFashion</title>

    <style>
        *
        {
            margin: 0;
            padding: 0;
        }

        body
        {
            background-color: #e2e2e2;
            margin: 0;
            padding: 0;
        }
        
        .header
        {
            background-color: white;
            margin-bottom: 40px;
        }

        .header-contain
        {
            position: fixed;
            width: 100%;
        }

    </style>

</head>
<body>

    <div class="header-contain">
            <!-- header-web -->
            <div class="header">

                <!-- logo -->
                <div class="title-logo"><h4>StyleFashion</h4></div>

                <!-- tombol-login-logout -->
                <div class="btn">
                
                <?php
                    if(isset($_SESSION["login"]))
                    {
                        echo "You :".$username??"guest";
                        echo "<a href='user/login-user.php'><button class='login-btn' id='sign-in' style='display: none;'><i class='fa-solid fa-user'></i> Sign in</button></a>";
                        echo "<a href='user/logout.php'><button class='logout-btn' id='sign-out'><i class='fa-solid fa-arrow-right-from-bracket'></i> Sign out</button></a>";
                    }
                    else
                    {
                        echo "<a href='user/login-user.php'><button class='login-btn' id='sign-in'><i class='fa-solid fa-user'></i> Sign in</button></a>";
                        echo "<a href='user/logout.php'><button class='logout-btn' id='sign-out' style='display: none;'><i class='fa-solid fa-arrow-right-from-bracket'></i> Sign out</button></a>";
                    }
                ?>
                
            </div>

    </div>

    <?php $i=0; foreach($bar as $br) ?>
    <div class="detail-item">
        
        <img src="clothes/<?php echo $br["gambar"]; ?>" alt="">

        <div class="desc">
            <p style="margin-left: 200px; color: #ffc052; font-size: 40px;"><?php echo $br["nama_produk"]; ?></p> <br>
            <p style="margin-left: 60px;"><?php echo "Rp. ".$br["harga"]; ?></p> <br>
            <p style="margin-left: 60px;"><?php echo "Kategori : ".$br["kategori"]; ?></p><br>
            <p style="margin-left: 60px; font-size: 20px; background-color: #e6e6e6; padding: 10px;"><?php echo "deskripsi : <br>".$br["Deskripsi"];?></p>
        </div>
    </div>
    <a href="user/beli.php"><button class="buy-button" style="margin-left: 1120px;"><i class="fa-solid fa-shopping-cart"></i>Buy Now</button></a>
    
    
</body>
</html>