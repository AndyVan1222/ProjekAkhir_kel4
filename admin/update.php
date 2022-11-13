<?php
    require "../config.php";
    
    $id = $_GET["id"];
    $read_sql = "SELECT * FROM produk WHERE id = $id";
    $result = mysqli_query($conn, $read_sql);

    $merek = [];

    while($row = mysqli_fetch_assoc($result))
    {
        $merek[] = $row;
    }

    $merek = $merek[0];

    if(isset($_POST["update"]))
    {
        $gambar = htmlspecialchars($_FILES["image"]["name"]);
        $tmp = htmlspecialchars($_FILES["image"]["tmp_name"]);
        $nama_produk = htmlspecialchars($_POST["nama-produk"]);
        $harga = htmlspecialchars($_POST["harga-produk"]);
        $kategori = htmlspecialchars($_POST["kategori"]);

        move_uploaded_file($tmp, "../clothes/".$gambar);

        $sql = "UPDATE produk SET gambar = '$gambar', nama_produk = '$nama_produk', harga = '$harga', kategori = '$kategori' WHERE id = '$id'";
        $result = mysqli_query($conn, $sql);

        if($result)
        {
            echo "
            <script>
            alert('Data Berhasil Di Edit');
            document.location.href = 'delete.php'
            </script>";
        }

        else
        {
            echo "
            <script>
            alert('Data Gagal Di Edit');
            document.location.href = 'update.php?id=$id'
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
            <input type="text" name="harga-produk" placeholder="harga produk...">

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
            <button name="update" class="input-btn"><i class="fa-solid fa-pencil"></i>update</button>
        </form>
    </div>
</body>
</html>