<?php
include_once('../../config/database.php');

$program = mysqli_query($mysqli, "SELECT STATUS from batch_program WHERE ID_BATCH = '".$_GET['id']."'");
$data    = mysqli_fetch_assoc($program);
$status  = $data['STATUS'];

if($status == 0){
    $update = mysqli_query($mysqli,"UPDATE batch_program SET STATUS='1' WHERE ID_BATCH = '".$_GET['id']."'");
}else{
    $update = mysqli_query($mysqli,"UPDATE batch_program SET STATUS='0' WHERE ID_BATCH = '".$_GET['id']."'");
}
echo "<script> alert('status berhasil diganti!'); </script>";
echo "<script> location='reguler.php'; </script>";

?>

