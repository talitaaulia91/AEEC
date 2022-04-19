<?php
include_once('../../config/database.php');

$program = mysqli_query($mysqli, "SELECT ACTIVE from program WHERE ID_PROGRAM = '".$_GET['id']."'");
$data    = mysqli_fetch_assoc($program);
$status  = $data['ACTIVE'];

if($status == 0){
    $update = mysqli_query($mysqli,"UPDATE program SET ACTIVE='1' WHERE ID_PROGRAM = '".$_GET['id']."'");
}else{
    $update = mysqli_query($mysqli,"UPDATE program SET ACTIVE='0' WHERE ID_PROGRAM = '".$_GET['id']."'");
}
echo "<script> alert('konfirmasi berhasil!'); </script>";
echo "<script> location='reguler.php'; </script>";

?>

