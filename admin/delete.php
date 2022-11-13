<?php
    require "../config.php";
    $hail = mysqli_query($conn, "SELECT * FROM produk");

    $data = [];
    while($row = mysqli_fetch_assoc($hail))
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

    <div class="contain-display">
        <div class="isi">
            <table style="text-align: center;">
                <tr>
                    <td>id</td>
                    <td>gambar</td>
                    <td>nama produk</td>
                    <td>harga</td>
                    <td>Kategori</td>
                </tr>
                <?php $i=0; foreach($data as $dt): ?>
                <tr>
                    
                    <td><?php echo $dt["id"]; ?></td>
                    <td><img src="../clothes/<?php echo $dt["gambar"] ?>" alt=""></td>
                    <td><?php echo $dt["nama_produk"]; ?></td>
                    <td><?php echo $dt["harga"]; ?></td>
                    <td><?php echo $dt["kategori"]; ?></td>
                    <td><a href="delete-item.php?id=<?php echo $dt["id"]; ?>"><button class="dlt-btn"><i class="fa-solid fa-trash"></i>Delete</button></a></td>
                    <td><a href="update.php?id=<?php echo $dt["id"]; ?>"><button class="dlt-btn"><i class="fa-solid fa-pencil"></i>Edit</button></a></td>

                </tr>
                <?php $i++; endforeach; ?>
            </table>
        </div>
    </div>
    
</body>
</html>