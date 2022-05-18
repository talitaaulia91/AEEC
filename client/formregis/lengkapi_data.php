<?php 
require_once("../auth/auth.php"); 
require_once("../../config/database.php");

$email = $_GET['email'];
$idprog = $_GET['idprog'];
$idbatch = $_GET['idbatch'];

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
                                </nav>
                            </div>
                        </div>
                    </div>

                    <!-- CARD UNTUK FORM -->
                    <section class="section">
        <div class="card" >
            <div class="card-body">             
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form form-vertical " method="post" action=""  enctype="multipart/form-data">
                                <div class="form-body">
                                    <div class="row">
                                    <div class="col-12">
                                            <div class="form-group">
                                                <label for="first-name-vertical">Email</label>
                                                <input type="text" id="first-name-vertical" readonly value="<?= "$email"?>" 
                                                       class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="first-name-vertical">Nama Lengkap</label>
                                                <input type="text" id="first-name-vertical" class="form-control"
                                                    name="nama" placeholder="Nama Lengkap" required>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="first-name-vertical">No. Telepon</label>
                                                <input type="text" id="first-name-vertical" class="form-control"
                                                    name="no_telp" placeholder="No. Telepon" required>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                        <div class="form-group">
                                                <label for="first-name-vertical">Jenis Kelamin</label>
                                                    <select class="form-select" name="jk" required>
                                                        <option >Pilih </option>
	                                                    <option value="0">Laki-Laki</option>
	                                                    <option value="1">Perempuan</option>
                                                    </select>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="first-name-vertical">NPWP</label>
                                                <input type="text" id="first-name-vertical" class="form-control"
                                                    name="npwp" placeholder="NPWP" required>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="first-name-vertical">Alamat Rumah</label>
                                                <input type="text" id="first-name-vertical" class="form-control"
                                                    name="alamat_rumah" placeholder="Alamat Rumah" required>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="first-name-vertical">Alamat NPWP</label>
                                                <input type="text" id="first-name-vertical" class="form-control"
                                                    name="alamat_npwp" placeholder="Alamat NPWP" required>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="first-name-vertical">Instansi</label>
                                                <input type="text" id="first-name-vertical" class="form-control"
                                                    name="instansi" placeholder="Asal Instansi">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="first-name-vertical">Jabatan</label>
                                                <input type="text" id="first-name-vertical" class="form-control"
                                                    name="jabatan" placeholder="Jabatan di Instansi">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                        <div class="form-group">
                                                <label for="first-name-vertical">Alumni Universitas Airlangga</label>
                                                    <select class="form-select" name="alumni" required>
                                                        <option >Pilih </option>
	                                                    <option value="0">Bukan</option>
	                                                    <option value="1">Iya</option>
                                                    </select>
                                            </div>
                                        </div>

                                        <div class="form-group ">
                                        <label for="exampleInputPassword1">Berkas NPWP</label>
                                        <input type="file" name="npwp"class="form-control" required >
                                        </div>
                                      
                                        
                                        <div class="col-12 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary me-1 mb-1" type="submit" name="tambah">Submit</button>
                                            <button type="reset"
                                                class="btn btn-light-secondary me-1 mb-1">Reset</button>                                    
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
            $nama       = $_POST['nama'];
            $jk         = $_POST['jk'];
            $notelp     = $_POST['no_telp'];
            $npwp       = $_POST['npwp'];
            $alamatnpwp = $_POST['alamat_npwp'];
            $alamat     = $_POST['alamat_rumah'];
            $instansi   = $_POST['instansi'];
            $jabatan    = $_POST['jabatan'];
            $alumni     = $_POST['alumni'];

            $select_id  = mysqli_query($mysqli,"SELECT * FROM user WHERE EMAIL='$email'");
            $row        = $select_id->fetch_assoc();
            $iduser     = $row['ID_USER'];

            // UNTUK BUKTI NPWP
            $npwp           = $_FILES['npwp']['name'];
            $lokasi         = $_FILES['npwp']['tmp_name'];
            move_uploaded_file($lokasi, '../../assets/NPWP/'.$npwp);

            $client         = mysqli_query($mysqli, "INSERT INTO client (ID_USER, NAMA, JK, NO_TELP, NPWP, ALAMAT_NPWP, ALAMAT_RUMAH, INSTANSI, BERKAS_NPWP, ALUMNI, JABATAN) 
                                                     VALUES ('$iduser','$nama', '$jk', '$notelp', '$npwp', '$alamatnpwp', '$alamat', '$instansi', '$npwp', $alumni, '$jabatan')");


            //Mengambil id CLIENT
            $idterbaru = mysqli_query($mysqli,"SELECT ID_CLIENT FROM client ORDER BY ID_CLIENT DESC LIMIT 1");
            $row       = $idterbaru->fetch_assoc();
            $id_client = $row['ID_CLIENT']; 
               
            echo "<script>location='confirm_2.php?idprog=$idprog&idbatch=$idbatch&iddiskon=D02';</script>";
            
        }

?>