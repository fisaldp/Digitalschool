<?php
include "functions.php";
?>
<!DOCTYPE html>
<html>

<head>
    <title>Aplikasi Untuk Mengupload File PDF Dengan PHP | belajarwebpedia.com</title>
    <style type="text/css">
        body {
            font-family: verdana;
            font-size: 12px;
        }

        a {
            text-decoration: none;
            color: #3050F3;
        }

        a:hover {
            color: #000F5E;
        }
    </style>
</head>

<body>
    <?php
    $id    = mysqli_real_escape_string($conn, $_GET['id']);
    $query = mysqli_query($conn, "SELECT * FROM ebook WHERE id='$id' ");
    $data  = mysqli_fetch_array($query);
    ?>
    <h1>Aplikasi Untuk Mengupload File PDF Dengan PHP</h1>
    <hr>
    <b>Judul:</b> <?php echo $data['judul']; ?> | <a href='index.php'> Kembali </a>
    <hr>
    <embed type="application/pdf" src="file/ <?php echo $data['nama_file']; ?>" width="800" height="600">
</body>

</html>