<?php
include_once('../../config/database.php');

$id     = $_GET['id'];
$status = $_GET['status'];

if ($status=='1'){
    $update = mysqli_query($mysqli, "UPDATE pembayaran 
        set STATUS=0
        WHERE ID_PEMBAYARAN='$id'");
} else {
    $update = mysqli_query($mysqli, "UPDATE pembayaran 
        set STATUS=1
        WHERE ID_PEMBAYARAN='$id'");
}

echo " <script>location='pembayaran.php';</script>";

?>