<?php
    session_start();
    require "config.php";
    
    if(isset($_SESSION["id"]))
    {
        $username = $_SESSION["id"];
    }
    else
    {
        $username = "guest";
    }
    // echo $_GET["id"] == NULL;

    if(isset($_GET["search"]))
    {
        $key = $_GET["key"];
        $hasil = mysqli_query($conn, "SELECT * FROM produk WHERE nama_produk LIKE '%$key%'");
    }
    else
    {
        $hasil = mysqli_query($conn, "SELECT * FROM produk");    
    }

    $produk = [];

    while($col = mysqli_fetch_assoc($hasil))
    {
        $produk[]=  $col;
        
    }
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
            background-color: #FFFF;
            margin: 0;
            padding: 0;
        }
        
        .header
        {
            background-color: white;
        }

        .header-contain
        {
            position: fixed;
            width: 100%;
        }

        .home-nav
        {
            margin-top: 0;
        }

        .footer-index
        {
            background-color: #ffc052;
            padding: 20px;
            
        }

        .model
        {
            display: none;
        }

        .prev, .next
        {
            background-color: #ffc052;
            border: none;
            cursor: pointer;
            width: 100px;
            height: 30px;
            font-size: 20px;
            border-radius: 10px;
            background-color: ;
        }

        .prev:hover
        {
            background-color: #ffe2b0;
            border: none;
            cursor: pointer;
            width: 100px;
            height: 30px;
            transition: 0.6s;
            font-size: 20px;
            border-radius: 10px;
            background-color: ;
        }

        .next:hover
        {
            transition: 0.6s;
            background-color: #ffe2b0;
            border: none;
            cursor: pointer;
            width: 100px;
            height: 30px;
            font-size: 20px;
            border-radius: 10px;
            background-color: ;
        }

        .button
        {
            padding-left: 20px;
            padding-right: 20px;
            padding-top: 10px;
            display: flex;
            background-color: #3f3c3d;
            height: 40px;
            justify-content: space-between;
        }

    </style>
</head>
<body>
    
    <div class="header-contain">
        <!-- header-web -->
        <div class="header">

            <!-- logo -->
            <div class="title-logo"><h4>StyleFashion</h4></div>

            <!-- kolom-pencarian -->
            <div class="search-box">
                <form action="" method="get">
                    <input type="text" name="key" id="key" placeholder="Search outfit...">
                    <button name="search" class="search-btn"><i class="fa-solid fa-magnifying-glass"></i></button>
                </form>
            </div>

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

        <!-- home-navigator -->
        <div class="home-nav">
            <ul>
                <li><a href="user/cart.php"><i class="fa-solid fa-shopping-cart"></i>Cart</a></li>
                <li><a href="home.php"><i class="fa-solid fa-home"></i> Home</a></li>
                <li><a href="../about.php">About</a></li>
            </ul>
        </div>
    </div>

    <!-- menu utama -->
    <div class="main-content">
        <!-- iklan -->
        <div class="ads-model">
            <br><br><br><br><br><br>
            <img class="model" src="ads/m4.jpeg" alt="">
            <img class="model" src="ads/m5.jpeg" alt="">
            <img class="model" src="ads/m-1.jpeg" alt="">
            <img class="model" src="ads/m-2.jpeg" alt="">
            <img class="model" src="ads/m-3.jpeg" alt="">
            <div class="button">
                <button class="prev" onclick="plusDivs(-1)"><</button>
                <p style="font-family: 'Manrope'; color: #FFFF;">Slide Image</p>
                <button class="next" onclick="plusDivs(1)">></button>
            </div>

            <!-- <div class="cart">
                <p>Black Hoodie</p>
                <a href="#"><button class="cart-btn"><i class="fa-solid fa-cart-shopping"></i>Add to Cart</button></a>
                
            </div> -->
        </div>

        <!-- produk -->
        <div class="product">
            <?php $i=0; foreach($produk as $pd) : ?>
            <div class="clothes">
                <img src="clothes/<?php echo $pd["gambar"]; ?>" alt="">
                <p><?php echo $pd["nama_produk"]; ?></p>
                <p>Rp. <?php echo" ".$pd["harga"]; ?></p>
                    
                <a href="detail.php?id=<?php echo $pd['id']; ?>"><button class="buy-button"><i class="fa-solid fa-cart-shopping"></i>add</button></a>
                </div>
            
            <?php $i++; endforeach; ?>
        </div>
    </div>


    <footer class="footer-index"><h4>Kelompok 4</h4>
    
    <ul>
        <li>Sarah Syifani</li>
        <li>Angelita Catrin</li>
        <li>Andi Ari Wardana</li>
    </ul>

    
    </footer>
    
</body>
</html>

<script>
    var slideIndex = 1;
    showDivs(slideIndex);

    function plusDivs(n) {
        showDivs(slideIndex += n);
    }

    function showDivs(n) {
    var i;
    var x = document.getElementsByClassName("model");
    if (n > x.length) {slideIndex = 1}
    if (n < 1) {slideIndex = x.length}
    for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";  
    }
    x[slideIndex-1].style.display = "block";  
}
</script>