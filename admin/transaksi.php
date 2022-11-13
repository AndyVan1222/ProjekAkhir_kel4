<?php
    require "../config.php";
    $sql = mysqli_query($conn, "SELECT * FROM pembelian JOIN produk ON(pembelian.product = produk.id)");
    $list = [];
    while($row = mysqli_fetch_assoc($sql))
    {
        $list[] = $row;
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
        table
        {
            background-color: #fefefe;
        }
    </style>
</head>
<body>

    <div class="header-adm">
        <div class="title">
            <h3>StyleFashion</h3>
            <p>ADMIN</p>
        </div>
        
        <a href="logout.php"><button class="logout-btn">Sign Out</button></a>
    </div>

    <div class="transaksi">
        <table style="text-align: center; margin-left: 300px; background-color: #fefefe;">
            <tr>
                <td>id_pembelian</td>
                <td>nama pembeli</td>
                <td>no_hp</td>
                <td>alamat</td>
                <td colspan="2">produk</td>
                <td>harga</td>
            </tr>

            <?php $i=0; foreach($list as $li) : ?>
            <tr>
                <td><?php echo $li["id_pembelian"]; ?></td>
                <td><?php echo $li["penerima"]; ?></td>
                <td><?php echo $li["no_hp"]; ?></td>
                <td><?php echo $li["alamat"] ; ?></td>
                <td><img src="../clothes/<?php echo $li["gambar"]; ?>" alt="" style="width: 200px; height: 200px;"></td>
                <td><?php echo $li["nama_produk"]; ?></td>
                <td><?php echo $li["harga"];  ?></td>

            </tr>
            <?php $i++; endforeach; ?>
        </table>
    </div>
    
</body>
</html>