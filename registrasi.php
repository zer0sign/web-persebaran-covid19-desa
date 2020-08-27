
<?php
session_start();
if(!isset($_SESSION["login"])){
    header("Location:login.php");
    exit;
}
require 'functions.php';
if(isset($_POST["register"])){
    if(registrasi($_POST)>0){
        echo "<script>
                alert('user baru telah ditambahkan');
                </script>   
                ";
    }else{
        echo mysqli_error($conn);
    }
}
?>

<style>
#username{
    width: 100%;
    background-color: white;
    border-color: lightgray;
}
</style>
<html>
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Halaman Registrasi</title>
<link rel="icon" href="https://sim.unissula.ac.id/assets/default/img/header/logo.png">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/customStyle.css">
    <link rel="stylesheet" href="css/login.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">
</head>
<body>

<!-- nav -->
<nav class="navbar navbar-light" style="background: rgb(34,213,34);
background: linear-gradient(137deg, rgba(34,213,34,1) 0%, rgba(116,222,146,1) 67%, rgba(38,194,56,1) 100%);">
    <a class="navbar-brand" href="index.php" style="size: 0.7em; color: whitesmoke">
        Kelet Sigap Covid-19
  </a>
  <a class="tambah" href="ubah.php"><button class="btn btn-warning my-2 my-sm-0" type="submit">Login</button></a>
</nav>






<div class="container mt-5">
        <div class="card" style="max-width: 23rem; margin: auto">
        <div class="card-header">Registrasi Form</div>
        <div class="card-body">

        <form action="" method="post" style="max-width: 20rem">
            <div class="form-group">
            <label for="exampleInputEmail1">Username</label>
            <input type="text" class="form-control" id="username" name="username" id>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" name="password" id="password">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Repeat Password</label>
            <input type="password" class="form-control" name="password2" id="password2">
        </div>
        <button type="submit" name="register" class="btn btn-primary">Register</button>
        </form>
        </div>
    </div>
    </div>
</body>
</html>