<?php

require '../method.php';

//Registrasi User
if( isset ($_POST["regis"])){

    if($_POST["password"] != $_POST["password2"]){
        echo "<script> 
        alert('Password Yang Anda Masukkan Berbeda !!');
        document.location.href = 'registrasi.php';
        </script>";
        exit;
    }

    $nama= htmlspecialchars($_POST["nama"]);
    $email= htmlspecialchars($_POST["email"]);
    $pass= htmlspecialchars($_POST["password"]);
    $password = password_hash($pass, PASSWORD_DEFAULT);
    

    $masukan="INSERT INTO `aeec`.`user` (`NAMA`, `EMAIL`, `PASSWORD`, `ROLE`) VALUES ('$nama', '$email', '$password', 'USER')";
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


//Login User
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
            if($user['ROLE'] == 'USER'){
                header("Location: ../dashboard/index.php");
            }else{
                header("Location: ../../admin/dashboard/layout/dashboard.php");
            }
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
