<?php

//var untuk nyambung ke db
$koneksi = mysqli_connect("localhost", "root", "", "aeec");


//Function untuk kuery db dan mengembalikan hasilnya berupa array
function query($query){
    global $koneksi;

    $hasil = mysqli_query($koneksi, $query); //membuat query mysql
    $data = [];

    while($sql = mysqli_fetch_assoc($hasil) ) { //mengambil data di mysql
        $data[] = $sql;
    }

    return  $data;
}

//Login Admin
if( isset($_POST["login"]) ) {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $cekid = mysqli_query($koneksi, "SELECT * from user where `EMAIL` = '$email' ");
    //cek id,  idnya ada tidak
    if( mysqli_num_rows($cekid) === 1){

        //cek paswword
        $user = mysqli_fetch_assoc($cekid);

        if( password_verify($password, $user["PASSWORD"]) ){

            // buat Session
            session_start();
            $_SESSION["user"] = $user;
            // login sukses, alihkan ke halaman timeline
            header("Location: ../layout/dashboard.php");
            
            exit;
        }else{
            echo "<script> 
            alert('Login Gagal, Coba Lagi !!');
            document.location.href = 'login.php';
            </script>";
            
        }
    }else{
        echo "<script> 
        alert('Login Gagal, Coba Lagi !!');
        document.location.href = 'login.php';
        </script>";
    }

}


?>