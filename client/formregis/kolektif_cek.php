<?php 
require_once("../auth/auth.php"); 
require '../method.php';


$id = $_GET['idprog'];
$idbatch = $_GET['idbatch'];
$iduser = $_SESSION["user"]["ID_USER"];
// Cek apakah dia udah pernah daftar belum
$client = mysqli_query($koneksi,"SELECT * FROM client where ID_USER = '$iduser'");

if(mysqli_num_rows($client) > 0){  
    echo "<script> 
    document.location.href = 'kolektif_upload_excel.php?idprog=$id&idbatch=$idbatch';
    </script>";
   
}else{
    echo "<script> 
    document.location.href = 'kolektif_form.php?idprog=$id&idbatch=$idbatch';
    </script>";
}

?>