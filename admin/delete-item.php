<?php
    require "../config.php";
    $id = $_GET["id"];

    $sql = "DELETE FROM produk WHERE id = $id";

    $hasil = mysqli_query($conn, $sql);

    if($hasil)
    {
        echo
    "<script>
    alert('Data Sudah Dihapus');
    document.location.href = 'delete.php'
    </script>";
    }
    else
    {
        echo
        "<script>
        alert('Data Gagal Dihapus');
        document.location.href = 'delete.php'
        </script>";
    }

?>