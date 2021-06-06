<?php

require 'functions.php';
session_start();
$role = (isset($_SESSION["role"])) ? $_SESSION["role"] : null;
if ($role == 2) {
    header("Location: home_user.php");
} elseif ($role == 1) {
    header("Location: home.html");
}

if (isset($_POST["register"])) {
    $result = registrasi($_POST, 2);
    if ($result > 0) {
        echo "<script>
                alert('user baru berhasil ditambahkan!');
             </script>";
    } else {
        echo "<script>alert($result)</script>";
    }
}

if (isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

    //cek username
    if (mysqli_num_rows($result) === 1) {
        //cek password
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row["password"])) {
            //set session
            //echo var_dump($row);
            $_SESSION["username"] = $row["username"];
            $_SESSION["email"] = $row["email"];
            $_SESSION["id"] = $row["id"];
            $_SESSION["role"] = $row["role"];
            if ($row["role"] == 2) {
                header("Location: home_user.php");
            } else {
                header("Location: home.html");
            }
            exit;
        }
    }
    $error = true;
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk</title>
    <link href="../pemweb/css/index.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

</head>

<body>
    <div class="bg-loader">
        <div class="loader"></div>
    </div>

    <?php if (isset($error)) : ?>
        <p style="color: red; font-style: italic;">Username / Password salah!</p>
    <?php endif; ?>

    <div class="login-wrap">
        <div class="login-html">
            <input id="tab-1" type="radio" name="tab" class="sign-in" checked>
            <label for="tab-1" class="tab">Sign In</label>
            <input id="tab-2" type="radio" name="tab" class="sign-up">
            <label for="tab-2" class="tab">Sign Up</label>
            <div class="login-form">
                <div class="sign-in-htm">
                    <form action="" method="post">
                        <div class="group">
                            <label for="username">Username</label>
                            <input id="username" type="text" name="username">
                        </div>
                        <div class="group">
                            <label for="password">Password</label>
                            <input id="password" type="password" name="password" data-type="password">
                        </div>
                        <div class="group">
                            <input id="check" type="checkbox" class="check" checked>
                            <label for="check"><span class="icon"></span> Keep me Signed in</label>
                        </div>
                        <div class="group">
                            <button type="submit" name="login">Sign In</button>
                        </div>
                        <div class="hr"></div>
                        <div class="foot-lnk">
                            <a href="#forgot">Forgot Password?</a>
                        </div>
                        <br>
                        <div class="foot-lnk">
                            <a href="index.php">Home</a>
                        </div>
                        <br>
                        <div class="foot-lnk">
                            <a href="webadmin/index.php">Login Admin Portal</a>
                        </div>


                </div>
                </form>

                <form action="" method="post">
                    <div class="sign-up-htm">
                        <div class="group">
                            <label for="username">Username</label>
                            <input id="username" type="text" name="username">
                        </div>
                        <div class="group">
                            <label for="password">Password</label>
                            <input id="password" type="password" name="password">
                        </div>
                        <div class="group">
                            <label for="password2">Repeat Password</label>
                            <input id="password2" type="password" name="password2">
                        </div>
                        <div class="group">
                            <label for="email">Email Address</label>
                            <input id="email" type="text" name="email">
                        </div>
                        <div class="group">
                            <button type="submit" name="register">Sign Up</button>
                        </div>
                        <div class="hr"></div>
                        <div class="foot-lnk">
                            <label for="tab-1">Already Member?</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

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