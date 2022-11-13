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
        if(isset($_SESSION["id"]))
        {
            $username = $_SESSION["id"];
        }
        else
        {
            $username = "guest";
        }   

        $id_user = $_SESSION["data"];
        $query = mysqli_query($conn, "SELECT gambar, nama_produk, harga FROM pembelian JOIN produk ON(pembelian.product = produk.id) WHERE id_user = $id_user");
        $list = [];
        while($row = mysqli_fetch_assoc($query))
        {
            $list[] = $row;
        }
    }
    
    
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="../style/style.css">
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
                        echo "<a href='login-user.php'><button class='login-btn' id='sign-in' style='display: none;'><i class='fa-solid fa-user'></i> Sign in</button></a>";
                        echo "<a href='logout.php'><button class='logout-btn' id='sign-out'><i class='fa-solid fa-arrow-right-from-bracket'></i> Sign out</button></a>";
                    }
                    else
                    {
                        echo "<a href='login-user.php'><button class='login-btn' id='sign-in'><i class='fa-solid fa-user'></i> Sign in</button></a>";
                        echo "<a href='logout.php'><button class='logout-btn' id='sign-out' style='display: none;'><i class='fa-solid fa-arrow-right-from-bracket'></i> Sign out</button></a>";
                    }
                ?>
                
            </div>

            

        </div>

        <!-- home-navigator -->
        <!-- <div class="home-nav">
            <ul>
                <li><a href="#">Clothes</a></li>
                <li><a href="#"><i class="fa-solid fa-home"></i> Home</a></li>
                <li><a href="#">Shoes</a></li>
            </ul>
        </div> -->
    </div>
    <br><br><br><br><br><br><br>
    <?php $i=0; foreach($list as $li) : ?>
    <div class="ctest">
        <div class="cart-list">
            <h3 style="text-align: center;">Ordered</h3>
            <img src="../clothes/<?php echo $li["gambar"]; ?>" alt="">
            <p style="text-align: center;"><?php echo $li["nama_produk"]; ?></p>
            <p class="price"><?php echo "Rp. ".$li["harga"]; ?></p>
            

        </div>
        
    </div>
    <?php $i++; endforeach; ?>
</body>
</html>