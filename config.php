<?php
    $server = "localhost";
    $username = "root";
    $password = "";
    $db = "stylefashion";

    $conn = mysqli_connect($server, $username, $password, $db);

    if(!$conn)
    {
        echo "<p style='color: red;'><i>Error : tidak terhubung ke server</i></p>";
    }
?>