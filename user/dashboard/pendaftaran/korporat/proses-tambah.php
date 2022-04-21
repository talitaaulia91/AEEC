<?php 
	// panggil koneksi ke database
	include_once('../../../../config/database.php');
	
	// errror
	mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);


	if(isset($_POST['tambah'])){
        // var_dump($_POST['berkas']);
        $iduser = $_SESSION["user"]["ID_USER"];
        $jk = $_POST['jk'];
        $notelp = $_POST['telp'];
        $npwp = $_POST['npwp'];
        $alamatnpwp = $_POST['alamatnpwp'];
        $alamat = $_POST['alamat'];
        $instansi = $_POST['instansi'];
        $jabatan = $_POST['jabatan'];

        // UNTUK BUKTI NPWP
        $gambar         = $_FILES['berkas']['name'];
        $lokasi         = $_FILES['berkas']['tmp_name'];
        move_uploaded_file($lokasi, '../../../penyimpanan/npwp/'.$gambar);

        // TAMBAH DATA CLIENT
        $masukan="INSERT INTO `aeec`.`client` (`ID_USER`, `JK`, `NO_TELP`, `NPWP`, `ALAMAT_NPWP`, `ALAMAT_RUMAH`, `INSTANSI`, `JABATAN`, `BERKAS_NPWP`) 
        VALUES ('$iduser', '$jk', '$notelp', '$npwp', '$alamatnpwp', '$alamat', '$instansi', '$jabatan', '$gambar')";
        mysqli_query($mysqli, $masukan); //buat query  

//AMbil ID CLient Terbaru
//ambil id_jadwal
$id = query("SELECT ID_CLIENT FROM client
ORDER BY ID_CLIENT DESC LIMIT 1");
foreach($id as $idterbaru){
}
// $id_pemesanan = $id['id_pemesanan'];

$id_client  = $idterbaru['ID_CLIENT'];

//Menangkap Data
$batch = $_GET['idbatch'];
date_default_timezone_set("Asia/Jakarta");
$tanggal = date("d-m-Y");

//Tambah Data pendaftaran
$masukan2 = "INSERT INTO `aeec`.`pendaftaran` (`ID_BATCH`, `ID_CLIENT`, `TGL_PENDAFTARAN`, `STATUS`) 
VALUES ('$batch', '$id_client', '$tanggal', '0',)";

// if (mysqli_affected_rows($koneksi) > 0){
//     echo "<script> 
//             alert('Data MASUK');
//         </script>";
// }else{
//     echo "<script> 
//     alert('GAGAL');

//     </script>";
// }

echo "<script> 
alert('Data Masuk');
document.location.href = '../../index.php';
</script>";
}




			  
	// 	// masukkan data ke database
	// 	$query 					= "INSERT INTO pembayaran VALUES (NULL,'$id_pegawai','$id_pemesanan',
	// 								NULL,'$bukti_pembayaran','$jenis_pembayaran',NULL,'$total_pembayaran',NULL)"; 
	// 	$sql 					= mysqli_query($db, $query);
		
	// 	if ($sql) {
	// 		header('location: ../pages/payment.php');
	// 	} else {
	// 		echo "gagal input data";
	// 	}
	// }

        
        

            
?>