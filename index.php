<?php
require 'functions.php';
$data = query("SELECT*FROM suspek");
$data_marker = query("SELECT*FROM marker");
?>

<style>
#gambar-doctor:hover{
    transform: scale(1.1);
}
##carouselExampleIndicators{
  color:black;
}

.container-info .card:hover{
  transform: scale(1.1);
}


@media screen and (max-width: 500px){
  #container-gambar{
    width: 10%
  }
}

</style>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="icon" href="https://sim.unissula.ac.id/assets/default/img/header/logo.png">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/customStyle.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">

    <!-- flikity -->
    <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">


    <!-- map -->

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css" integrity="sha512-Rksm5RenBEKSKFjgI3a41vrjkw4EVPlJ3+OiI65vTjIdo9brlAacEuKOiQ5OFh7cOI1bkDwLqdLw3Zg0cRJAAQ==" crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js" integrity="sha512-/Nsx9X4HebavoBvEBuyp3I7od5tA0UzAxs+j83KgC8PU0kgB4XiK4Lfe4y4cgBtaRJQEIFCW+oC506aPT2L1zw==" crossorigin=""></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet-ajax/2.1.0/leaflet.ajax.min.js"></script>

    <title>Kelet Siaga Covid-19 | KKN UNISSULA</title>
  </head>
  <body>
    <!-- nav -->
    <!-- <nav class="navbar navbar-light" style="background-color: #05B0F5;">
    <a class="navbar-brand" href="#" style="size: 0.7em; color: whitesmoke">
    Buko Tanggap Covid-19
  </a>
  <a class="tambah" href="ubah.php"><button class="btn btn-warning my-2 my-sm-0" type="submit">Login</button></a>
</nav> -->



    <!-- contents -->
    <div class="container container-jumbotron" style="display: flex; justify-content: space-evenly; flex-wrap: wrap">
    <div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h3 class="display-5"><b>Tanggap Covid-19 Desa Kelet</b></h3>
    <p style="font-size: 1em" class="lead">Dashboard Data & Persebaran Covid-19 Desa Kelet,<br>Sebagai info Terkait covid-19 Kepada Masyarakat.</p>
  </div>
  
  <div class="container" id="container-gambar" style="margin-bottom: -10%; margin-top:-5%">
  <img src="img/doctor.png" id="gambar-doctor" style="max-width: 60%; margin-left: 20%; margin-top:10" alt="">
  </div>
</div>
</div>


<!-- map -->


<div class="container mb-5 mt-3">
    <h3 style="font-family: 'Montserrat', sans-serif;">Persebaran covid-19 Kelet</h3>
    <div id="mapid" style="border: 2px solid #C1C1C1;"></div>
  </div>




<div class="container main-gallery" >
<?php 
    foreach($data as $row):
    ?>
  <div class="card text-white gallery-cell" style="width: 20rem; height:10rem;margin-right: 2%; margin-left:2%; background-color:#EDA35D;">
  <div class="card-body">
    <h3 class="card-title"><?php echo $row['positif']; ?></h3>
    <h5 class="card-subtitle mb-2">Positif Covid-19</h5>
    <p class="card-text">Jumlah Pasien Positif dari Covid-19 di Desa Kelet</p>
  </div>
</div>

<div class="card text-white gallery-cell" style="width: 20rem; height:10rem; margin-right: 2%; margin-left:2%; background-color:#67C386">
  <div class="card-body">
    <h3 class="card-title"><?php echo $row['sembuh']; ?></h3>
    <h5 class="card-subtitle mb-2">Sembuh Covid-19</h5>
    <p class="card-text">Jumlah Pasien Sembuh dari Covid-19 di Desa Kelet</p>
  </div>
</div>

<div class="card text-white gallery-cell" style="width: 20rem; height:10rem; margin-right: 2%; margin-left:2%; background-color:#6A6D6B">
  <div class="card-body">
    <h3 class="card-title"><?php echo $row['meninggal']; ?></h3>
    <h5 class="card-subtitle mb-2">Meninggal Covid-19</h5>
    <p class="card-text">Jumlah Pasien Meninggal dari Covid-19 di Desa Kelet</p>
  </div>
</div>


<?php endforeach ?>

</div>


<div class="container mt-5" style="display:flex; flex-wrap:wrap; justify-content:space-evenly">
<div class="card text-center mb-3" style="width: 18rem;">
        <div class="card-header" style="background-color: #C13CA3">
            <h5 style="color: white;">Data Suspek Indonesia</h5>
        </div>
        <div class="card-body">
        <div class="sub"  style="display: flex; justify-content: space-evenly">
        <div class="otkp">
        <p class="card-text positif"><h3><b></b></h3></p>
        <small class="form-text text-muted">Positif</small>
        </div>
        <div class="otkp">
            <p class="card-text sembuh"><h3><b></b></h3></p>
            <small class="form-text text-muted">Sembuh</small>
            </div>

            <div class="otkp">
            <p class="card-text meninggal"><h3><b></b></h3></p>
            <small class="form-text text-muted">meninggal</small>
            </div>
        </div>
        </div>
    </div>



    <div class="card text-center mb-3" style="width: 18rem;">
        <div class="card-header" style="background-color: #8041DA">
            <h5 style="color: white;">Data Suspek ODP kelet</h5>
        </div>
        <div class="card-body">
        <div class="sub"  style="display: flex; justify-content: space-evenly">
        <div class="otkp">
        <p class="card-text positif"><?php echo $row['odp_selesai'] ?></p>
        <small class="form-text text-muted">ODP Selesai</small>
        </div>
        <div class="otkp">
            <p class="card-text"><?php echo $row['odp'] ?></p>
            <small class="form-text text-muted">ODP</small>
            </div>
        </div>
        </div>
    </div>

    <div class="card text-center mb-3" style="width: 18rem;">
        <div class="card-header" style="background-color: #36A99B">
            <h5 style="color: white;">Data Suspek ODP kelet</h5>
        </div>
        <div class="card-body">
        <div class="sub"  style="display: flex; justify-content: space-evenly">
        <div class="otkp">
        <p class="card-text"><?php echo $row['pdp_sembuh'] ?></p>
        <small class="form-text text-muted">PDP Sembuh</small>
        </div>
        <div class="otkp">
            <p class="card-text"><?php echo $row['pdp_meninggal'] ?></p>
            <small class="form-text text-muted">PDP Meninggal</small>
            </div>

            <div class="otkp">
            <p class="card-text"><?php echo $row['pdp_sembuh'] ?></p>
            <small class="form-text text-muted">PDP Sembuh</small>
            </div>
        </div>
        </div>
    </div>


</div>


<!-- carousel card -->
<div class="container">
<h3 style="font-family: 'Montserrat', sans-serif;">Pencegahan Covid-19</h3>
<div class="main-gallery" style="text-align:left !important;">
  <div class="gallery-cell" style="margin-right: 2%; margin-left:2%;">
  <div class="card" style="width: 18rem;">
  <img src="img/cuci.jpg" class="card-img-top" alt="...">
  <div class="card-body">
    <h6 class="card-title" style="text-align:left;">Cuci Tangan</h6>
    <p class="card-text" style="text-align:justify;">Cuci Tangan Adalah Cara yang Sangat Efektif namun Mudah untuk melakukan pencegahan Terhadap Virus Corona.</p>
  </div>
</div>
  </div>
  <div class="gallery-cell" style="margin-right: 2%; margin-left:2%;">
  <div class="card" style="width: 18rem;">
  <img src="img/masker.jpg" class="card-img-top" alt="...">
  <div class="card-body">
    <h6 class="card-title" style="text-align:left;">Memakai Masker</h6>
    <p class="card-text" style="text-align:justify;">Selalu Kenakan Masker Ketika Berpergian, dan Gunakan Masker Selama 4-5 Jam, dan Ganti Masker Setelah Itu.</p>
  </div>
</div>
  </div>
  <div class="gallery-cell" style="margin-right: 2%; margin-left:2%;">
  <div class="card" style="width: 18rem;">
  <img src="img/jagajarak.jpg" class="card-img-top" alt="...">
  <div class="card-body">
    <h6 class="card-title" style="text-align:justify;">Jaga Jarak</h6>
    <p class="card-text" style="text-align:justify;">Selalu Jaga Jarak anda dari orang lain ketika berada ditempat umum, jaga jarak minimal 1-2 meter.</p>
  </div>
</div>
</div>

<div class="gallery-cell" style="margin-right: 2%; margin-left:2%;">
  <div class="card" style="width: 18rem;">
  <img src="img/dalamrumah.jpg" class="card-img-top" alt="...">
  <div class="card-body">
    <h6 class="card-title" style="text-align:justify;">Work From Home</h6>
    <p class="card-text" style="text-align:justify;">Jangan Keluar Rumah Kalau tidak ada urusan yang penting, dan lakukan pekerjaan anda dirumah jika memungkinkan.</p>
  </div>
</div>
</div>


<div class="gallery-cell" style="margin-right: 2%; margin-left:2%;">
  <div class="card" style="width: 18rem;">
  <img src="img/hindarikerumunan.jpg" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title" style="text-align:justify;">Hindari Tempat Ramai</h5>
    <p class="card-text" style="text-align:justify;">Hindari Tempat yang ada banyak orang, karena akan menyulitkan anda melakukan social distancing jika berada dikeramaian.</p>
  </div>
</div>
</div>



</div>
</div>


<!-- Image and text -->
<nav class="navbar navbar-dark mt-5" style="display:flex; justify-content:center;     background: rgb(34,213,34);
background: linear-gradient(137deg, rgba(34,213,34,1) 0%, rgba(116,222,146,1) 67%, rgba(38,194,56,1) 100%);">
  <a class="tambah" href="ubah.php"><button class="btn btn-warning my-2 my-sm-0" type="submit">Login</button></a>
  <a class="navbar-brand" href="#">
  <div class="container" style=" font-size:0.7em;">
  <div class="container" style="display:flex; justify-content: space-evenly;">
    <img src="https://sim.unissula.ac.id/assets/default/img/header/logo.png" width="40" height="40"  alt="">
    Kelompok 48
    <br>
    KKN Tematik UNISSULA
    </div>
    </div>
  </a>
</nav>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/customScript.js"></script>
    <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
  </body>
</html>

<script>


var positions = <?php echo json_encode($data_marker); ?>;

for (var i in positions) {

  new L.circle([positions[i].latitude, positions[i].longitude], {
    color: 'none',
    fillColor: '#FF0000',
    fillOpacity: 0.5,
    radius: 100
}).addTo(map);

    // new L.circle([positions[i].latitude, positions[i].longitude]).addTo(map);
}

$('.main-gallery').flickity({
  // options
  cellAlign: 'left',
  contain: true
});
</script>

