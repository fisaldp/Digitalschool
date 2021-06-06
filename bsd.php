<?php
require 'functions.php';
session_start();
$id = $_SESSION["id"];
$buku = query("SELECT distinct kategori FROM user JOIN role_ebook ON user.role = role_ebook.role_user JOIN ebook ON role_ebook.id = ebook.role WHERE user.id = '$id'");

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ebook</title>
    <link href="../pemweb/css/bsd.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</head>

<body>
    <div class="bg-loader">
        <div class="loader"></div>
    </div>
    <header>
        <div class="container">
            <h1><a href="">Digital School</a></h1>
            <ul>
                <li><a href="../pemweb/bsd.php">Buku BSD</a></li>
                <li><a href="../pemweb/logout.php">Keluar</a></li>
            </ul>
        </div>
    </header>

    <section class="label">
        <div class="container">
            <p>Home - Buku BSD</p>
        </div>
    </section>

    <section class="bsd">
        <div class="container-fluid">
            <div class="row">
                <div class="container konten-wrapper">
                    <div class="panel panel-default">
                        <div class="panel-body main">
                            <div class="col-6">
                                <h1>Kategori</h1>
                                <?php foreach ($buku as $row) : ?>
                                    <div class="post">
                                        <div class="row post-title">
                                            <div class="col-sm-12" style="background-color: #4b3965;">
                                                <a href="kat_ebook.php?kategori=<?= $row["kategori"]; ?>">
                                                    <h2 style="color: white ;"> <?= $row["kategori"]; ?></h2>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer>
        <div class="container">
            <small>Copyright &copy; 2021 - Digital School. All Rights Reserved</small>
        </div>
    </footer>

    <script type="text/javascript">
        $(document).ready(function() {
            $(".bg-loader").hide();
        })
    </script>
</body>

</html>