<!DOCTYPE html>
<?php
    session_start();
    include '../controller/Login.php';
    if(!empty($_POST['username'])){
        $uname = $_POST['username'];
        $passwd = $_POST['password'];

        login($uname,$passwd);
    }

    if(!empty($_SESSION['username'])){
        header("location:../index.php");
    }
?>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Master | Barang</title>

    <link rel="stylesheet" href="../css/bootstrap.min.css" />
    <link rel="stylesheet" href="../css/style.css" />
    <link rel="stylesheet" href="../css/fontawesome/css/all.min.css">
    <link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">
    <style>
        body{
            font-family: 'Raleway', sans-serif;
        }
    </style>
  </head>
  <body>

    <div class="container">
        <div class="row justify-content-md-center">
            <div class="card form-login">
                <h3 style="margin-bottom:20px; margin-top:20px;">Login</h3>
                <form action="" method="POST">
                    <div class="form-group">
                        <input type="text" class="form-control" name="username" placeholder="Masukkan username">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="password" placeholder="Masukkan password">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-warning" style="color:#fff; width:100%; height:34px">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="../js/jquery-3.3.1.slim.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/popper.min.js"></script>
  </body>
</html>
