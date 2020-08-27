<?php
session_start();
if(!isset($_SESSION["login"])){
    header("Location:login.php");
    exit;
}
?>
<style>
    label{
        display:block;
    }

#odp_pdp .form-group{
    margin:8%;
}
</style>
<?php
//cek tombol submit
require ("functions.php");

//ambil data di url


//query berdasarkan id
$suspek = query("SELECT * FROM suspek WHERE id=1");
$data_marker = query("SELECT*FROM marker");





$conn=mysqli_connect("localhost","root","","covid19");
if(isset($_POST["submit"])){
 if(ubah($_POST)>0){
     echo "
        <script>
        alert('data suspek berhasil diubah');
        document.location.href = 'index.php';
        </script>
     ";
 }
 else{
    echo "
    <script>
    alert('data suspek gagal diubah');
    </script>
    ";
 }
    
}
    
    //kondisi cek
?>
</html>
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Kelet Sigap Covid-19 | KKN UNISSULA</title>
<link rel="icon" href="https://sim.unissula.ac.id/assets/default/img/header/logo.png">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/customStyle.css">
    <!-- <link rel="stylesheet" href="css/login.css"> -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">


</head>
<body>
<nav class="navbar navbar-light" style="background-color: background: rgb(34,213,34);
background: linear-gradient(137deg, rgba(34,213,34,1) 0%, rgba(116,222,146,1) 67%, rgba(38,194,56,1) 100%);">
    <a class="navbar-brand" href="index.php" style="size: 0.7em; color: whitesmoke">
    Kelet Sigap Covid-19
  </a>
  <div class="tombol">
  <a class="tambah" href="ubahPeta.php"><button class="btn btn-warning" type="submit">Update Map</button></a>
  <a class="tambah" href="registrasi.php"><button class="btn btn-outline-warning" type="submit">Registrasi</button></a>
  <a class="tambah" href="logout.php"><button class="btn btn-danger my-2 my-sm-0" type="submit">Logout</button></a>
  </div>
</nav>

<div class="container mt-5">
        <div class="card" style="max-width: 23rem; margin: auto">
        <div class="card-header">Data Pasien Covid-19 Desa Kelet</div>
        <div class="card-body">
        <form action="" method="post">
            <div class="form-group">
            <label for="exampleInputEmail1">Positif</label>
            <input type="text" class="form-control" id="positif" value="<?php echo $suspek[0]['positif'] ?>" name="positif">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Sembuh</label>
            <input type="text" class="form-control" name="sembuh" id="sembuh" value="<?php echo $suspek[0]['sembuh'] ?>">
        </div>

        <div class="form-group">
            <label for="exampleInputPassword1">Meninggal</label>
            <input type="text" class="form-control" name="meninggal" id="meninggal" value="<?php echo $suspek[0]['meninggal'] ?>">
        </div>
        </div>
    </div>
<div class="container mt-5">
<div class="card" style="max-width: 23rem; margin: auto" id="odp_pdp">
<div class="card-header">ODP & PDP Desa Kelet</div>
    <div class="form-group">
            <label for="exampleInputPassword1">PDP</label>
            <input type="text" class="form-control" name="pdp" id="pdp" value="<?php echo $suspek[0]['pdp'] ?>">
        </div>

        <div class="form-group">
            <label for="exampleInputPassword1">PDP Sembuh</label>
            <input type="text" class="form-control" name="pdp_sembuh" id="pdp_sembuh" value="<?php echo $suspek[0]['pdp_sembuh'] ?>">
        </div>

        <div class="form-group">
            <label for="exampleInputPassword1">PDP</label>
            <input type="text" class="form-control" name="pdp_meninggal" id="pdp_meninggal" value="<?php echo $suspek[0]['pdp_meninggal'] ?>">
        </div>

        <div class="form-group">
            <label for="exampleInputPassword1">ODP</label>
            <input type="text" class="form-control" name="odp" id="odp" value="<?php echo $suspek[0]['odp'] ?>">
        </div>

        <div class="form-group">
            <label for="exampleInputPassword1">ODP Selesai</label>
            <input type="text" class="form-control" name="odp_selesai" id="odp_selesai" value="<?php echo $suspek[0]['odp_selesai'] ?>">
        </div>
    </div>

    </div>
    </div>

<div class="container mt-3" style="display:flex; justify-content:space-evenly;">
    <button type="submit" name="submit" class="btn btn-success">Update</button>
        </form>
        </div>

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/customScript.js"></script>
</body>
</html>
