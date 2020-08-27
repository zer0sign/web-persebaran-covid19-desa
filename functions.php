<?php
$conn = mysqli_connect("localhost","root","","covid19");

function query($query){
    global $conn;
    $result = mysqli_query($conn,$query);
    $rows = [];
    while($row= mysqli_fetch_assoc($result)){
        $rows[]=$row;
    }
    return $rows;

}

function tambah($data){
    global $conn;
    //ambil data dari tiap form
    $positif =htmlspecialchars($data["positif"]);
    $sembuh =htmlspecialchars($data["sembuh"]);
    $meninggal =htmlspecialchars($data["meninggal"]);
    $query="INSERT INTO suspek
            VALUES
            ('','$positif','$sembuh','$meninggal');
            ";
            
    mysqli_query($conn,$query);

    return mysqli_affected_rows($conn);    
}



// function hapus($id){
//     global $conn;
//     mysqli_query($conn,"DELETE FROM mahasiswa WHERE id = $id");
//     return mysqli_affected_rows($conn);
// }

function hapusMarker($id){
    global $conn;
    mysqli_query($conn,"DELETE FROM marker WHERE id_marker = $id");
    return mysqli_affected_rows($conn);
}

function ubah($data){
    global $conn;
    //ambil data dari tiap form
    $positif =htmlspecialchars($data["positif"]);
    $sembuh =htmlspecialchars($data["sembuh"]);
    $meninggal =htmlspecialchars($data["meninggal"]);
    $pdp =htmlspecialchars($data["pdp"]);
    $pdp_sembuh =htmlspecialchars($data["pdp_sembuh"]);
    $pdp_meninggal =htmlspecialchars($data["pdp_meninggal"]);
    $odp =htmlspecialchars($data["odp"]);
    $odp_selesai =htmlspecialchars($data["odp_selesai"]);
    $query="UPDATE suspek SET
            positif = '$positif',
            sembuh  = '$sembuh',
            meninggal = '$meninggal',
            pdp = '$pdp',
            pdp_meninggal = '$pdp_meninggal',
            pdp_sembuh = '$pdp_sembuh',
            odp = '$odp',
            odp_selesai = '$odp_selesai'
        WHERE id = '1'
            ";
    mysqli_query($conn,$query);

    return mysqli_affected_rows($conn);    

}


function registrasi($data){
    global $conn;

    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn,$data["password"]);
    $password2 = mysqli_real_escape_string($conn,$data["password2"]);
    //cek username

    $result=mysqli_query($conn,"SELECT username FROM user WHERE username = '$username'");
    if(mysqli_fetch_assoc($result)){
        echo "<script>
        alert ('username tidak tersedia');
        </script>
        ";
        return false;

    }

    //cek informasi password
    if($password !== $password2){
        echo "<script>
            alert('konfirmasi password tidak sesuai');
        </script>";
        return false;
    }
    
    //enkripsi password
    $password = password_hash($password,PASSWORD_DEFAULT);
    


    //tambahkan kedatabase
    mysqli_query($conn,"INSERT INTO user VALUES('','$username','$password')");
    return mysqli_affected_rows($conn);



}

function tambahMarker($data){
    global $conn;
    //ambil data dari tiap form
    $longitude =htmlspecialchars($data["lng"]);
    $latitude =htmlspecialchars($data["lat"]);
    $query="INSERT INTO marker
            VALUES
            ('','$longitude','$latitude');
            ";
            
    mysqli_query($conn,$query);

    return mysqli_affected_rows($conn); 
}   
?>