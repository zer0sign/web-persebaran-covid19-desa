<?php
session_start();
require "functions.php";

//cek cookie

if(isset($_COOKIE["id"])&& isset($_COOKIE['key'])){
    $id = $_COOKIE['id'];
    $key = $_COOKIE ['key'];


    // ambil username berdasarkan id
    $result = mysqli_query($conn,"SELECT username FROM user WHERE id = $id");

    $row = mysqli_fetch_assoc($result);


    if($key === hash('sha256',$row["username"])){
        $_SESSION["login"] = 'true';

    }
}

if(isset($_SESSION["login"])){
    header("Location: index.php");
    exit;
}


if(isset($_POST["login"])){
    $username = $_POST["username"];
    $password = $_POST["password"];
    //cek username
    $result=mysqli_query($conn,"SELECT*FROM user WHERE username ='$username'");

    if(mysqli_num_rows($result)===1){
        $row=mysqli_fetch_assoc($result);
        if(password_verify($password,$row["password"])){
            //set session
            $_SESSION["login"] = true;
            header("Location: ubah.php");

            //cek remember me
            if(isset($_POST["remember"])){
                //buat cookie
                
                setcookie("id",$row['id'],time()+120);
                setcookie("key", hash('sha256',$row['username']),time()+120);
            }

            exit;
        }
        
    }
    $error = true;
}

?>
<style>
label{
    display: block;
}
button{
    display: block;
}
</style>

<html>
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Login</title>
    <link rel="icon" href="https://sim.unissula.ac.id/assets/default/img/header/logo.png">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/customStyle.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">
</head>
<body>
<!-- nav -->
<nav class="navbar navbar-light" style="background: rgb(34,213,34);
background: linear-gradient(137deg, rgba(34,213,34,1) 0%, rgba(116,222,146,1) 67%, rgba(38,194,56,1) 100%);">
    <a class="navbar-brand" href="index.php" style="size: 0.7em; color: whitesmoke">
        Kelet Sigap Covid-19
  </a>
  <a class="tambah" href="ubah.php"><button class="btn btn-outline-warning my-2 my-sm-0" type="submit">Login</button></a>
</nav>






<?php
if(isset($error)):
?>
<p style="color:red;font-style: italic;">username atau password salah</p>
<?php endif;?>

    <div class="container mt-5">
        <div class="card" style="max-width: 23rem; margin: auto">
        <div class="card-header">Login Form</div>
        <div class="card-body">

        <form action="" method="post" style="max-width: 20rem">
            <div class="form-group">
            <label for="exampleInputEmail1">Username</label>
            <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" name="password" id="password">
        </div>
        <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" id="remember" name="remember">
            <label class="form-check-label" for="exampleCheck1">Remember me</label>
        </div>
        <button type="submit" name="login" class="btn btn-primary">Login</button>
        </form>
        </div>
    </div>
    </div>
</body>
</html>
