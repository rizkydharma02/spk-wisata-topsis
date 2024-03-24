<?php
session_start();
$error = false;
if (isset($_POST['user'])) {
    include("konfig/koneksi.php");
    /** LOGIN **/
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    $s = mysqli_query($conn, "SELECT * FROM admin WHERE username='$user' AND password='$pass'");
    $user = mysqli_fetch_assoc($s);
    $row = mysqli_num_rows($s);
    if ($row) {
        $_SESSION['auth'] = $user;
        header("Location: ./index.php");
    } else {
        $error = "Salah kombinasi username dan password.";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>TOPSIS</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <style>
    body {
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #eee;
    }

    .form-signin {
        max-width: 330px;
        padding: 15px;
        margin: 0 auto;
    }

    .form-signin .form-signin-heading,
    .form-signin .checkbox {
        margin-bottom: 10px;
    }

    .form-signin .checkbox {
        font-weight: normal;
    }

    .form-signin .form-control {
        position: relative;
        height: auto;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
        padding: 10px;
        font-size: 16px;
    }

    .form-signin .form-control:focus {
        z-index: 2;
    }

    .form-signin input[type="text"] {
        margin-bottom: -1px;
        border-bottom-right-radius: 0;
        border-bottom-left-radius: 0;
    }

    .form-signin input[type="password"] {
        margin-bottom: 10px;
        border-top-left-radius: 0;
        border-top-right-radius: 0;
    }
    </style>
</head>

<body style="padding: 0;">
    <nav class="navbar navbar-static-top bg-primary" style="background-color: #325d88;">
        <div class="container">
            <h3 align="center">Pemilihan Objek Wisata Dengan Metode TOPSIS</h3>
        </div>
    </nav>
    <div class="container">
        <form class="form-signin" action="?act=login" method="post">
            <h2 class="form-signin-heading" align="center" style="color: black;">Silahkan masuk</h2>
            <?php if ($error) {
                echo $error;
            } ?>
            <label for="inputEmail" class="sr-only">Usernames</label>
            <input type="text" id="inputEmail" class="form-control" placeholder="Username" name="user" autofocus />
            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="pass" />
            <button class="btn btn-primary btn-block" type="submit" style="background-color: #325d88;">Masuk</button>
        </form>
    </div>
</body>

</html>