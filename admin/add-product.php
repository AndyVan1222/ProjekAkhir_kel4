<?php
    require "../config.php";
    if(isset($_POST["input"]))
    {
        $image = $_FILES["image"]["name"];
        $tmp = $_FILES["image"]["tmp_name"];

        $nama_produk = $_POST["nama-produk"];
        $harga_produk = $_POST["harga-produk"];

        $kategori = $_POST["kategori"];
        $desc = $_POST["desc"];

        move_uploaded_file($tmp, "../clothes/".$image);

        $add = "INSERT INTO produk(id, gambar, nama_produk, harga, Deskripsi, kategori) VALUES('', '$image', '$nama_produk', $harga_produk,'$desc', '$kategori')";
        $hasil = mysqli_query($conn, $add);

        if($hasil)
        {
            echo "<script>
            alert('Berhasil di tambah');
            </script>";
        }

        else
        {
            echo "<script>
            alert('Gagal di tambah');
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
    <title>Admin StyleFashion</title>

    <style>
        body
        {
            background-color: #e2e2e2;
        }
    </style>
</head>
<body>
    <div class="input-form">
        <form action="" method="post" enctype="multipart/form-data">
            <p>Gambar</p>
            <div class="file-input">
            <input type="file" name="image"></div>
            <p>Nama Produk</p>
            <input type="text" name="nama-produk" placeholder="nama produk...">

            <p>harga</p>
            <input type="number" name="harga-produk" placeholder="harga produk...">

            <p>Deskripsi</p>
            <textarea name="desc" id="desc" cols=" 41" rows="10"></textarea>
            <!-- <input type="text" name="desc" placeholder="deskripsi..." required> -->

            <div class="radio-input">
                <p>Kategori :</p>
                <div class="radio">
                    <input type="radio" name="kategori" id="Baju" value="Baju">
                    <label for="Baju">Baju</label>
                    <input type="radio" name="kategori" id="Celana" value="Celana">
                    <label for="Celana">Celana</label>
                    <input type="radio" name="kategori" id="sepatu" value="sepatu">
                    <label for="sepatu">sepatu</label>
                </div>
            </div>
            <br><br>
            <button name="input" class="input-btn"><i class="fa-solid fa-plus"></i>Add Product</button>
        </form>
    </div>
</body>
</html>