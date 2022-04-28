<?php 
require_once("../auth/auth.php"); 
require '../method.php';

$id = $_GET['idprog'];
$idbatch = $_GET['idbatch'];
$iddiskon = $_GET['iddiskon'];
$program = query("SELECT * FROM aeec.program where ID_PROGRAM = '$id'");
foreach($program as $hasil){
}

$program = query("SELECT * FROM aeec.kategori_program");
$nama = query("SELECT * FROM aeec.program");
?>

<!-- BAGIAN HEADER -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AEEC || CLIENT</title>
    
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../assets/css/bootstrap.css">
    
    <link rel="stylesheet" href="../../assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="../../assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="../../assets/css/app.css">
    <link rel="shortcut icon" href="../../assets/images/favicon.svg" type="image/x-icon">

    <!-- FORM DINAMIS -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
  
</head>
<!-- BAGIAN SIDEBAR -->
<?php include_once('../sidebar/sidebar.php'); ?>


<!-- BAGIAN UTAMA CODING [MULAI main-content] -->

<!-- HALAMAN UTAMA -->
<div id="main-content">
                
                <div class="page-heading">
                    <div class="page-title">
                        <div class="row">
                            <div class="col-12 col-md-6 order-md-1 order-last">
                                <h3>Pendaftaran</h3>
                            </div>
                            <div class="col-12 col-md-6 order-md-2 order-first">
                                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.html">Pendaftaran</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Jenis Diskon</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>

                    <!-- CARD UNTUK FORM -->
    <section class="section">
        <div class="card" >
            <div class="card-header">
            <h4><?= $hasil['NAMA_PROGRAM'] ?><h4>
            </div>
            <div class="card-body">
                
            <!-- Basic Tables start -->
    <section class="section">
        <div class="card" >
            <div class="card-header">
            </div>
            <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="table1" width="100%" cellspacing="0">
                    <thead> 
                        <tr>
                            <th>ID Client</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Jenis Kelamin</th>
                            <th>No Telp</th>
                            <th>NPWP</th>                         
                            <th>Detail</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $query_client = "SELECT * FROM peserta ";
                        $tabel_client = mysqli_query($mysqli, $query_client);
                        foreach ($tabel_client as $data_client) :                            
                        ?>
                        <tr>
                            <td><?php echo $data_client['ID_CLIENT']; ?></td>                           
                            <td><?php echo $data_client['NAMA']; ?></td> 
                            <td><?php echo $data_client['EMAIL']; ?></td> 
                            <td><?php
                            if($data_client['JK']==1){
                                echo 'Perempuan'; 
                            }else{
                                echo 'Laki-Laki';
                            }
                            
                             ?></td> 
                            <td><?php echo $data_client['NO_TELP']; ?></td> 
                            <td><?php echo $data_client['NPWP']; ?></td> 
                            <td>
                                <a href="detail.php?id=<?php echo $data_client['ID_CLIENT']; ?>" class="btn btn-primary">Detail</a>
                            </td>            
                            <td>
                                <a href="edit.php?id=<?php echo $data_client['ID_CLIENT']; ?>" class="btn btn-warning">Edit</a>
                            </td>  
                            <td>
                                <a href="delete.php?id=<?php echo $data_client['ID_CLIENT']; ?>" class="btn btn-danger">Delete</a>
                            </td>    
                        </tr>
                        <?php
                            endforeach
                        ?>
                        </tbody>                   
                    </div>

                </table>
            </div>
        </div>

    </section>
                    <!-- END CARD -->
                    <!-- Basic Tables end -->
                </div>


<!-- BAGIAN FOOTER -->
<footer>
    <div class="footer clearfix mb-0 text-muted">
        <div class="float-start">
            <p>2021 &copy; Mazer</p>
        </div>
        <div class="float-end">
            <p>Crafted with <span class="text-danger"><i class="bi bi-heart-fill icon-mid"></i></span>
                by <a href="https://ahmadsaugi.com">Saugi</a></p>
        </div>
    </div>
</footer>
        </div>
            <!-- END HALAMAN UTAMA -->
        </div>
    </div>




    <script src="../../assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="../../assets/js/bootstrap.bundle.min.js"></script>
    
    <script src="../../assets/js/mazer.js"></script>


    <!-- Include Choices JavaScript -->
<script src="../../assets/vendors/choices.js/choices.min.js"></script>
<script src="../../assets/js/pages/form-element-select.js"></script>


</body>

</html>


<?php
        
        if(isset($_POST['tambah'])){
            // var_dump($_POST['berkas']);
            // $iduser = $_SESSION["user"]["ID_USER"];
            $jk = $_POST['jk'];
            $notelp = $_POST['telp'];
            $npwp = $_POST['npwp'];
            $alamatnpwp = $_POST['alamatnpwp'];
            $alamat = $_POST['alamat'];
            $instansi = $_POST['instansi'];
            $jabatan = $_POST['jabatan'];
            $alumni = $_POST['alumni'];
            $iduser = $_SESSION["user"]["ID_USER"];


            // UNTUK BUKTI NPWP
            $gambar         = $_FILES['berkas']['name'];
            $lokasi         = $_FILES['berkas']['tmp_name'];
            move_uploaded_file($lokasi, '../../penyimpanan/npwp/'.$gambar);

            $masukan="INSERT INTO `aeec`.`client` (`ID_USER`, `JK`, `NO_TELP`, `NPWP`, `ALAMAT_NPWP`, `ALAMAT_RUMAH`, `INSTANSI`, `BERKAS_NPWP`, `ALUMNI`, `JABATAN`) 
                                    VALUES ('$iduser', '$jk', '$notelp', '$npwp', '$alamatnpwp', '$alamat', '$instansi', '$gambar', $alumni, '$jabatan')";
            mysqli_query($koneksi, $masukan); //buat query  

            //Mengambil id CLIENT
            $idterbaru = query("SELECT ID_CLIENT FROM client ORDER BY ID_CLIENT DESC LIMIT 1;");
            foreach($idterbaru as $id){
            }
            $ID_CLIENT = $id['ID_CLIENT'];  
            
            //Menangkap Data
            $batch = $_GET['idbatch'];
            date_default_timezone_set("Asia/Jakarta");
            $tanggal = date("Y-m-d");
            // //Tambah Data pendaftaran
            $masukan2 = "INSERT INTO `aeec`.`pendaftaran` (`ID_BATCH`, `ID_CLIENT`, `ID_DISKON`, `TGL_PENDAFTARAN`,  `STATUS`) 
            VALUES ('$idbatch', '$ID_CLIENT', '$iddiskon', '$tanggal', '0')";
            mysqli_query($koneksi, $masukan2); //buat query  

            echo "<script> 
                alert('Pendaftaran Berhasil');
                document.location.href = '../pendaftaran/pendaftaran.php';
                </script>";
            
        }

?>