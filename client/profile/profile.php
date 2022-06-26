<?php 
require_once("../auth/auth.php"); 
require_once("../../config/database.php");


$iduser   = $_SESSION["user"]["ID_USER"];
$email    = $_SESSION["user"]["EMAIL"];



$client = mysqli_query($mysqli,"SELECT * FROM client where ID_USER = '$iduser'");
// if(mysqli_num_rows($client) > 0){  
//     echo "<script>location='confirm_2.php?idprog=$id&idbatch=$idbatch&iddiskon1=D01&iddiskon2=D02';</script>";
// }

 ?>

<!-- BAGIAN HEADER -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Airlangga Executive Education</title>
    
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../assets/css/bootstrap.css">
    
<!-- <link rel="stylesheet" href="assets/vendors/jquery-datatables/jquery.dataTables.min.css"> -->
<link rel="stylesheet" href="../../assets/vendors/jquery-datatables/jquery.dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="../../assets/vendors/fontawesome/all.min.css">
<style>
    table.dataTable td{
        padding: 15px 8px;
    }
    .fontawesome-icons .the-icon svg {
        font-size: 24px;
    }
</style>

    <link rel="stylesheet" href="../../assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="../../assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="../../assets/css/app.css">
    <link rel="shortcut icon" href="../../assets/images/favicon.svg" type="image/x-icon">
</head>

<body>

<?php include_once('../sidebar/sidebar.php'); ?>

        </ul>
    </div>
    <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
</div>
        </div>
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

<!-- BAGIAN UTAMA CODING [MULAI main-content] -->

<!-- HALAMAN UTAMA -->
<!-- <div id="main-content"> -->
                
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
            <div class="card-header mb-0">
            </div>
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
                                <?php if(mysqli_num_rows($client) > 0){   
                                        $data_client        = $client->fetch_assoc();    
                                ?>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="first-name-vertical">Nama Lengkap</label>
                                                <input type="text" id="first-name-vertical" class="form-control"
                                                    name="nama" placeholder="Nama Lengkap" readonly value="<?= $data_client['NAMA']?>">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="first-name-vertical">No. Telepon</label>
                                                <input type="text" id="first-name-vertical" class="form-control"
                                                    name="no_telp" placeholder="No. Telepon" readonly value="<?= $data_client['NO_TELP']?>">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                        <div class="form-group">
                                                <label for="first-name-vertical">Jenis Kelamin</label>
                                                    <select class="form-select" name="jk" readonly>
                                                        <?php if($data_client['JK'] == 0) { ?>
	                                                    <option value="0" readonly>Laki-Laki</option>
                                                        <?php }else { ?>
	                                                    <option value="1">Perempuan</option>
                                                        <?php } ?>
                                                    </select>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="first-name-vertical">NPWP</label>
                                                <input type="text" id="first-name-vertical" class="form-control"
                                                    name="npwp" placeholder="NPWP" readonly value="<?= $data_client['NPWP']?>">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="first-name-vertical">Alamat Rumah</label>
                                                <input type="text" id="first-name-vertical" class="form-control"
                                                    name="alamat_rumah" placeholder="Alamat Rumah" readonly value="<?= $data_client['ALAMAT_RUMAH']?>">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="first-name-vertical">Alamat NPWP</label>
                                                <input type="text" id="first-name-vertical" class="form-control"
                                                    name="alamat_npwp" placeholder="Alamat NPWP" readonly value="<?= $data_client['ALAMAT_NPWP']?>">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="first-name-vertical">Instansi</label>
                                                <input type="text" id="first-name-vertical" class="form-control"
                                                    name="instansi" placeholder="Asal Instansi" readonly value="<?= $data_client['INSTANSI']?>">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="first-name-vertical">Jabatan</label>
                                                <input type="text" id="first-name-vertical" class="form-control"
                                                    name="jabatan" placeholder="Jabatan di Instansi" readonly value="<?= $data_client['JABATAN']?>">
                                            </div>
                                        </div>

                                        <div class="col-12">
                                        <div class="form-group">
                                                <label for="first-name-vertical">Alumni Universitas Airlangga</label>
                                                    <select class="form-select" name="alumni" required>
                                                        <!-- <option >Apakah Anda alumni? </option> -->
                                                        <?php if($data_client['ALUMNI'] == 0) { ?>
	                                                    <option value="0">Bukan</option>
                                                        <?php }else { ?>
	                                                    <option value="1">Iya</option>
                                                        <?php } ?>
                                                    </select>
                                            </div>
                                        </div>
                                        <?php if($data_client['ALUMNI'] == 1) { ?>
                                        <div class="col-12">
                                        <div class="form-group">
                                                <label for="first-name-vertical">Fakultas</label>
                                                <select class="form-select" name="fakultas">
                                                        <?php
                                                        $idfak = $data_client['ID_FAKULTAS'];
                                                        $fakultas = $mysqli->query("SELECT * FROM fakultas where ID_FAKULTAS = '$idfak'");
                                                        while ( $fak = $fakultas->fetch_assoc()){
                                                        ?>
                                                        <option value="<?php echo $fak['ID_FAKULTAS'] ?>">
                                                        <?php 
                                                        echo $fak['NAMA_FAKULTAS'];
                                                        ?>
                                                        </option>
                                                        <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <?php };?>

                                        <div class="form-group ">
                                        <label for="exampleInputPassword1">Berkas NPWP</label>
                                        <br>
                                        <a href="../../assets/NPWP/<?php echo $data_client['BERKAS_NPWP'] ?>" class="btn btn-primary me-1 mb-1 mt-6"><i class="bi bi-archive"></i>Lihat Berkas</a>
                                        </div>   

                                        <?php 
                                        // AMBIL DATA CASHBACK
                                        $cashback = $mysqli->query("SELECT sum(cashback.NOMINAL) as JUMLAH from cashback
                                                                    join user
                                                                    on (cashback.ID_USER = user.ID_USER)
                                                                    where user.ID_USER = '$iduser'");
                                        $data_cashback = $cashback->fetch_assoc();
                                        
                                        if(is_null($data_cashback['JUMLAH'])){
                                            $data_cashback['JUMLAH'] = 0;
                                        }
                                        
                                        ?>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="first-name-vertical">E - Money AEEC</label>
                                                <input type="text" id="first-name-vertical" class="form-control me-1 mb-3"
                                                    name="cashback"  readonly value="<?= $data_cashback['JUMLAH']?>">
                                                <p style="color:red"><i>E - money tidak berlaku untuk pendaftaran kolektif dan korporat</i></p>
                                                
                                                
                                            </div>
                                        </div>
                                        

                                        <!-- END DATA CLIENT -->
                                        <?php }; ?>


                                        <!-- <div class="col-12 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary me-1 mb-1" type="submit" name="tambah">Edit</button>
                                        </div> -->
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
<!-- <footer>
    <div class="footer clearfix mb-0 text-muted">
        <div class="float-start">
            <p>2021 &copy; Mazer</p>
        </div>
        <div class="float-end">
            <p>Crafted with <span class="text-danger"><i class="bi bi-heart-fill icon-mid"></i></span>
                by <a href="https://ahmadsaugi.com">Saugi</a></p>
        </div>
    </div>
</footer> -->
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