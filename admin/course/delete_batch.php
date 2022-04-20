<?php
include_once('../../config/database.php');
if(isset($_GET['id'])){
    $cek = mysqli_query($mysqli, "SELECT ID_PROGRAM from batch_program WHERE ID_BATCH = '".$_GET['id']."'");
    $id  = $cek->fetch_assoc();
    $program = $id['ID_PROGRAM'];
    $hapus = mysqli_query($mysqli, "DELETE FROM batch_program WHERE ID_BATCH = '".$_GET['id']."'");
}


echo " <script>alert('Data berhasil dihapus!');</script>";
echo " <script>location='detail_regular.php?id=$program';</script>";

 

?>