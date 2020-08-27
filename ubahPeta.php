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
</style>
<?php
//cek tombol submit
require ("functions.php");

//ambil data di url


//query berdasarkan id
$data_marker = query("SELECT*FROM marker");







$conn=mysqli_connect("localhost","root","","covid19");
if(isset($_POST["submit"])){
 if(tambahMarker($_POST)>0){
     echo "
        <script>
        alert('data Map berhasil diubah');
        document.location.href = 'index.php';
        </script>
     ";
 }
 else{
    echo "
    <script>
    alert('data Map gagal diubah');
    
    </script>
    ";
 }
    
}

    
    //kondisi cek
?>
</html>
<head>
<link rel="icon" href="https://sim.unissula.ac.id/assets/default/img/header/logo.png">
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
<title>Kelet Sigap Covid | KKN UNISSULA</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/customStyle.css">
    <!-- <link rel="stylesheet" href="css/login.css"> -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">


    <!-- map -->
    
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css" integrity="sha512-Rksm5RenBEKSKFjgI3a41vrjkw4EVPlJ3+OiI65vTjIdo9brlAacEuKOiQ5OFh7cOI1bkDwLqdLw3Zg0cRJAAQ==" crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js" integrity="sha512-/Nsx9X4HebavoBvEBuyp3I7od5tA0UzAxs+j83KgC8PU0kgB4XiK4Lfe4y4cgBtaRJQEIFCW+oC506aPT2L1zw==" crossorigin=""></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet-ajax/2.1.0/leaflet.ajax.min.js"></script>
</head>
<body>
<nav class="navbar navbar-light" style="background: rgb(34,213,34);
background: linear-gradient(137deg, rgba(34,213,34,1) 0%, rgba(116,222,146,1) 67%, rgba(38,194,56,1) 100%);">
    <a class="navbar-brand" href="index.php" style="size: 0.7em; color: whitesmoke">
    Kelet Sigap Covid-19
  </a>
  <div class="tombol">
  <a class="tambah" href="registrasi.php"><button class="btn btn-primary" type="submit">Registrasi</button></a>
  <a class="tambah" href="logout.php"><button class="btn btn-danger my-2 my-sm-0" type="submit">Logout</button></a>
  </div>
</nav>


    <div class="container" style="background-color: none !important;">
    <h3 style="font-family: 'Montserrat', sans-serif;">Update Zona Merah</h3>
    <div id="mapid"></div>
  </div>

<div class="container mt-3" style="display:flex; justify-content:space-evenly;">
  <form action="" method="post">
    <input type="hidden" value="" id="lng" name="lng">
    <input type="hidden" value="" id="lat" name="lat">
    <button type="submit" name="submit" class="btn btn-success">Tambah Lokasi</button>
    </form>
</div>




<!-- tabel -->
<div class="container mt-5">
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">No.</th>
      <th scope="col">Longitude</th>
      <th scope="col">Latitude</th>
      <th scope="col">Hapus</th>
    </tr>
  </thead>
  <tbody>
  <?php $i= 1; ?>
<?php foreach($data_marker as $row):?>
    <tr>
      <th scope="row"><?php echo $i; ?></th>
      <td><?php echo $row['longitude'];?></td>
      <td><?php echo $row['latitude'];?></td>
      <td><a href="hapusMarker.php?id_marker=<?php echo $row['id_marker'];?>" class="badge badge-danger">Hapus</a></td>
    </tr>
  </tbody>
  <?php $i++; ?>
<?php endforeach; ?> 
</table>
</div>

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/customScript.js"></script>
</body>
</html>

<script>
map.on('click', function(e){
    var marker = new L.circle(e.latlng,{ color: 'red',
    fillColor: '#FF01A1 ',
    fillOpacity: 0.5,
    radius: 100,color:"none"} ).addTo(map);


    var dataMap = {
        lat: e.latlng.lat,
        lng: e.latlng.lng
    }
    $('#lng').val(e.latlng.lng)
    $('#lat').val(e.latlng.lat)

});

var positions = <?php echo json_encode($data_marker); ?>;

for (var i in positions) {
  console.log(positions);

  new L.circle([positions[i].latitude, positions[i].longitude], {
    color: 'none',
    fillColor: '#FF0000',
    fillOpacity: 0.5,
    radius: 100
}).addTo(map);

    // new L.circle([positions[i].latitude, positions[i].longitude]).addTo(map);
}
</script>
