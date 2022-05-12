<?php 
require_once("../auth/auth.php"); 
require '../method.php';
// Buat Tangkat Data
$id = $_GET['idprog'];
$idbatch = $_GET['idbatch'];
$iddiskon = $_GET['iddiskon'];

// Cek apakah dia udah pernah daftar belum
$client = query("SELECT * FROM aeec.client where ID_USER = 'US04220002'");
if($client != null){
    
    echo "<script> 
    alert('Anda Sudah Pernah Mendaftar !, Silahkan pilih jenis pendaftaran lainnya ');
    document.location.href = 'individu_jenisdiskon.php?idprog=$id&idbatch=$idbatch';
    </script>";
}
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
                
            <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Mohon Isi Data Dibawah Dengan Benar</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form form-vertical " method="post" action=""  enctype="multipart/form-data">
                                <div class="form-body">
                                    <div class="row">
                                        <!-- BAGIAN FOLLOW SOSMED -->
                                        <div class="col-12">
                                            <div class="form-group has-icon-left">
                                                <label for="email-id-icon">Username Instagram : </label>
                                                <div class="position-relative">
                                                    <input type="text" class="form-control" placeholder="+62.."
                                                        id="email-id-icon" name="" >
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-phone"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group has-icon-left">
                                                <label for="email-id-icon">Username Twitter : </label>
                                                <div class="position-relative">
                                                    <input type="text" class="form-control" placeholder="+62.."
                                                        id="email-id-icon" name="" >
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-phone"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group has-icon-left">
                                                <label for="email-id-icon">Akun LinkedIn Anda : </label>
                                                <div class="position-relative">
                                                    <input type="text" class="form-control" placeholder="+62.."
                                                        id="email-id-icon" name="" >
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-phone"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group has-icon-left">
                                                <label for="email-id-icon">Akun LinkedIn Anda : </label>
                                                <div class="position-relative">
                                                    <input type="text" class="form-control" placeholder="+62.."
                                                        id="email-id-icon" name="" >
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-phone"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group has-icon-left">
                                                <label for="email-id-icon">Akun Facebook Anda : </label>
                                                <div class="position-relative">
                                                    <input type="text" class="form-control" placeholder="+62.."
                                                        id="email-id-icon" name="" >
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-phone"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="mb-3">
                                                <label for="formFile" class="form-label">Berbagai File Follow</label>
                                                <input class="form-control" type="file" id="formFile">
                                            </div>
                                        </div>
                                        <!-- END BAGIAN FOLLOW -->
                                        <div class="col-12">
                                            <div class="form-group has-icon-left">
                                                <label for="email-id-icon">No Telp : </label>
                                                <div class="position-relative">
                                                    <input type="text" class="form-control" placeholder="+62.."
                                                        id="email-id-icon" name="telp" required>
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-phone"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group has-icon-left">
                                                <label for="mobile-id-icon">NPWP</label>
                                                <div class="position-relative">
                                                    <input type="text" class="form-control" placeholder="NPWP"
                                                        id="mobile-id-icon" name="npwp" required>
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-archive-fill"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group has-icon-left">
                                                <label for="password-id-icon">Alamat NPWP</label>
                                                <div class="position-relative">
                                                    <input type="text" class="form-control" placeholder="Alamat NPWP"
                                                        id="password-id-icon" name="alamatnpwp" required>
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-house"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group has-icon-left">
                                                <label for="password-id-icon">Alamat Rumah</label>
                                                <div class="position-relative">
                                                    <input type="text" class="form-control" placeholder="Alamat Rumah"
                                                        id="password-id-icon" name="alamat" required>
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-house-door-fill"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group has-icon-left">
                                                <label for="password-id-icon">Instansi</label>
                                                <div class="position-relative">
                                                    <input type="text" class="form-control" placeholder="Instansi"
                                                        id="password-id-icon" name="instansi" required>
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-building"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group has-icon-left">
                                                <label for="password-id-icon">Jabatan</label>
                                                <div class="position-relative">
                                                    <input type="text" class="form-control" placeholder="Jabatan"
                                                        id="password-id-icon" name="jabatan" required>
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-person-badge"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="mb-3">
                                                <label for="formFile" class="form-label">Berkas NPWP</label>
                                                <input class="form-control" type="file" id="formFile" name="berkas" required>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <h7>Jenis Kelamin</h7>
                                            <fieldset class="form-group">
                                                <select class="form-select" id="basicSelect" name="jk" required>
                                                    <option >Pilih </option>
                                                    <option value="0">Laki - Laki </option>
                                                    <option value="1">Perempuan</option>
                                                </select>
                                            </fieldset>
                                        </div>
                                        <div class="col-12">
                                            <h7>Alumni Universitas Airlangga</h7>
                                            <fieldset class="form-group">
                                                <select class="form-select" id="basicSelect" name="alumni" required>
                                                    <option >Pilih </option>
                                                    <option value="1">Ya</option>
                                                    <option value="0">Tidak</option>
                                                </select>
                                            </fieldset>
                                        </div>
                                        
                                        <div class="col-12 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary me-1 mb-1" type="submit" name="tambah">Submit</button>
                                            <button type="reset"
                                                class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
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