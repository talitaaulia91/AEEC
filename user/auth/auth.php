<?php

require '../method.php';
//var untuk nyambung ke db
$koneksi = mysqli_connect("localhost", "root", "", "aeec");

//Registrasi Konsumen
if( isset ($_POST["regis"])){

    if($_POST["password"] != $_POST["password2"]){
        echo "<script> 
        alert('Password Yang Anda Masukkan Berbeda !!');
        document.location.href = 'registrasi.php';
        </script>";
        exit;
    }

    // $nama= htmlspecialchars($_POST["nama"]);
    $email= htmlspecialchars($_POST["email"]);
    $pass= htmlspecialchars($_POST["password"]);
    $password = password_hash($pass, PASSWORD_DEFAULT);
    

    $masukan="INSERT INTO `aeec`.`user` (`EMAIL`, `PASSWORD`) VALUES ('$email', '$password')";
    mysqli_query($koneksi, $masukan); //buat query

    // Cek Data
    if (mysqli_affected_rows($koneksi) > 0){
        echo "<script> 
                alert('Registrasi Berhasil, Silahkan Login !!');
                document.location.href = 'login.php';
            </script>";
    }else{
        echo "<script> 
        alert('Registrasi Gagal, Coba Lagi !!');
        document.location.href = 'registrasi.php';
        </script>";
    }
}
