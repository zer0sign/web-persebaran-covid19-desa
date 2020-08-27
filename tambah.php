<?php
session_start();

if(!isset($_SESSION["login"])){

    header("Location: login.php");
}
?>

<style>
    label{
        display:block;
    }
</style>
<?php
//cek tombol submit
require ("functions.php");
$conn=mysqli_connect("localhost","root","","covid19");
if(isset($_POST["submit"])){
 if(tambah($_POST)>0){
     echo "
        <script>
        alert('data berhasil ditambah');
        document.location.href = 'index.php';
        </script>
     ";
 }
 else{
    echo "
    <script>
    alert('data gagal ditambahkan');
    document.location.href = 'index.php';
    </script>
    ";
 }
    
}
    
?>
</html>
<head>
<title>
</title>
</head>
<body>
<h1>tambah data Pasien</h1>
<form action="" method="post" enctype="multipart/form-data">
<ul>
<li>
    <label for="nama">Positif</label>
        <input type="text" name="positif" required autocomplete="off">
    </li>
    <li>
    <label for="nim">Sembuh</label>
        <input type="text" name="sembuh" required autocomplete="off">
    </li>
    <li>
    <label for="email">Meninggal</label>
        <input type="text" name="meninggal" required autocomplete="off">
    </li>
    <li>
    <button type="submit" name="submit">Tambah data</button>
    </li>
</ul>
</form>
</body>
  </body>
</html>