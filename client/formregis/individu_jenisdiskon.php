<?php 
require_once("../auth/auth.php"); 
require '../method.php';

$id = $_GET['idprog'];
$batch = $_GET['idbatch'];
$program = query("SELECT * FROM aeec.program where ID_PROGRAM = '$id'");
foreach($program as $hasil){
}
// Ambil ID USER
$iduser = $_SESSION["user"]["ID_USER"];

$program = query("SELECT * FROM aeec.kategori_program");
$nama = query("SELECT * FROM aeec.batch_program join program");
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
<?php include('../sidebar/sidebar.php'); ?>


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
                       <!-- Basic Tables start -->
                       <section class="section">
                        <div class="card" >
                            <div class="card-header">
                            <h4><?= $hasil['NAMA_PROGRAM'] ?><h4>
                            </div>
                            <div class="card-body">
                                
                
                            <section class="section">
                        <div class="row">
                            <!-- <div class="col-12 col-md-8 offset-md-2"> -->
                                <div class="pricing">
                                    <div class="row align-items-center">

                                        <div class="col-xs-12 col-sm-4">
                                            <div class="card card-highlighted">
                                                <div class="card-header text-center">
                                                    <h6 class="card-title">Belum Pernah Daftar</h6>
                                                    <p></p>
                                                </div>
                                                <h1 class="price text-white"><i class="bi bi-person-x-fill"></i></h1>
                                                
                                                <div class="card-footer">
                                                    <!-- <a href="belumpernah_form.php?idprog=<?=$hasil['ID_PROGRAM']?>&idbatch=<?=$_GET['idbatch'] ?>&iddiskon=0"><button class="btn btn-outline-white btn-block">Daftar</button></a> -->
                                                    <button type="button" class="btn btn-outline-white btn-block" data-bs-toggle="modal"
                                                        data-bs-target="#sosmed">
                                                        Daftar
                                                    </button>

                                                </div>
                                            </div>
                                        </div>

                                        <!-- DISKON KALAU PERNAH DAFTAR -->
                                        <div class="col-xs-12 col-sm-4">
                                            <div class="card card-highlighted">
                                                <div class="card-header text-center">
                                                    <h6 class="card-title">Pernah Mendaftar Program</h6>
                                                    <p> Mendapatkan Voucher 5%</p>
                                                </div>
                                                <h1 class="price text-white"><i class="bi bi-person-check-fill"></i></h1>
                                                
                                                <div class="card-footer">
                                                    <!-- <a href="individu/diskon.php?idprog=<?=$hasil['ID_PROGRAM']?>&idbatch=<?=$_GET['idbatch'] ?>&iddiskon=D01"><button class="btn btn-outline-white btn-block">Daftar</button></a> -->
                                                    <button type="button" class="btn btn-outline-white btn-block" data-bs-toggle="modal"
                                                        data-bs-target="#program">
                                                        Daftar
                                                    </button>
                                                
                                                </div>
                                            </div>
                                        </div>

                                        <!--CASHBACK FOLLOW SOSMED -->
                                        <!-- <div class="col-xs-12 col-sm-4">
                                            <div class="card card-highlighted">
                                                <div class="card-header text-center">
                                                    <h6 class="card-title">Follow Media Sosial AEEC</h6>
                                                    <p> Mendapatkan Cashback 5%</p>
                                                </div>
                                                <h1 class="price text-white"><i class="bi bi-facebook"></i></h1>
                                                
                                                <div class="card-footer">
                                                    <a href="individu/diskon.php?idprog=<?=$hasil['ID_PROGRAM']?>&idbatch=<?=$_GET['idbatch'] ?>&iddiskon=D02"><button class="btn btn-outline-white btn-block">Daftar</button></a>
                                                </div>
                                            </div>
                                        </div> -->

                                        <!--CASHBACK FOLLOW SOSMED -->
                                        <div class="col-xs-12 col-sm-4">
                                            <div class="card card-highlighted">
                                                <div class="card-header text-center">
                                                    <h6 class="card-title">Mengajak 3 Partisipan</h6>
                                                    <p> Mendapatkan Cashback 10%</p>
                                                </div>
                                                <h1 class="price text-white"><i class="bi bi-people-fill"></i></h1>
                                                
                                                <div class="card-footer">
                                                    <!-- <a href="individu/diskon.php?idprog=<?=$hasil['ID_PROGRAM']?>&idbatch=<?=$_GET['idbatch'] ?>&iddiskon=D03"><button class="btn btn-outline-white btn-block">Daftar</button></a> -->
                                                
                                                    <button type="button" class="btn btn-outline-white btn-block" data-bs-toggle="modal"
                                                        data-bs-target="#ajak">
                                                        Daftar
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </section>               
                            </div>
                        </div>
                    </section>
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



<!-- MODAL PERNAH MENDAFTAR PROGRAM -->
 <!--primary theme Modal -->
 <div class="modal fade text-left" id="program" tabindex="-1" role="dialog" aria-labelledby="myModalLabel160" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
            role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title white" id="myModalLabel160">Masukkan Bukti Keikutsertaan Program
                    </h5>
                    <button type="button" class="close" data-bs-dismiss="modal"
                        aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form  action="#" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="squareText">Program yang pernah didaftar </label>
                            <select class="choices form-select" required>
                                    <optgroup label="Kategory Program">
                                        <option selected>Pilih..</option>
                                        <?php foreach($program as $kategory): ?>
                                        <option value="<?= $kategory['ID_KATEGORI'] ?>"><?= $kategory['NAMA_KATEGORI'] ?></option>
                                        <?php endforeach; ?>
                                    </optgroup>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="squareText">Program Pelatihan Pendidikan Eksekutif yang pernah didaftar </label>
                            <select class="choices form-select" name="batch" required>
                                    <optgroup label="Nama Program">
                                    <option selected>Pilih..</option>
                                        <?php foreach($nama as $namaprog): ?>
                                        <option value="<?= $namaprog['ID_BATCH'] ?>"><?= $namaprog['NAMA_PROGRAM'].' Batch'.$namaprog['BATCH'] ?></option>
                                        <?php endforeach; ?>
                                    </optgroup>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Upload Sertifikat </label>
                            <input class="form-control" type="file" id="formFile">
                        </div>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-secondary"
                        data-bs-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Close</span>
                    </button>
                    <button  class="btn btn-primary ml-1"  type="submit" name="caririwayatprogram">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Konfirmasi</span>
                    </button>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END MODAL PROGRAM -->



<!-- MODAL AJAK TEMAN -->
<div class="modal fade text-left" id="ajak" tabindex="-1" role="dialog" aria-labelledby="myModalLabel160" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
            role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title white" id="myModalLabel160">Masukkan Email Partisipan Lain
                    </h5>
                    <button type="button" class="close" data-bs-dismiss="modal"
                        aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-body">
                        <form action="#" method="POST">
                        <div class="input-group control-group after-add-more">
                        <input type="text" name="addmore[]" class="form-control" placeholder="Masukkan Email : ">
                        <div class="input-group-btn"> 
                            <button class="btn btn-success add-more" type="button"><i class="glyphicon glyphicon-plus"></i> Tambah</button>
                        </div>
                        </div>
                        <div class="control-group text-center">
                            <br>
                            <button class="btn btn-success" type="submit" name="cariemail">Submit</button>
                        </div>
                        </form>
                        <!-- Copy Fields -->
                        <div class="copy hide" style="display: none">
                        <div class="control-group input-group" style="margin-top:10px">
                            <input type="text" name="addmore[]" class="form-control" placeholder="Masukkan Email :">
                            <div class="input-group-btn"> 
                            <button class="btn btn-danger remove" type="button"><i class="glyphicon glyphicon-remove"></i> Hapus</button>
                            </div>
                        </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-secondary"
                        data-bs-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Close</span>
                    </button>
                    <button type="button" class="btn btn-primary ml-1"
                        data-bs-dismiss="modal">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Accept</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- END MODAL AJAK TEMAN -->



<!-- MODAL SOSIAL MEDIA -->
<div class="modal fade text-left" id="sosmed" tabindex="-1" role="dialog" aria-labelledby="myModalLabel160" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
            role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title white" id="myModalLabel160">Dapatkan Tambahan Cashback Dengan Cara Berikut
                    </h5>
                    <button type="button" class="close" data-bs-dismiss="modal"
                        aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row row-centered">
                            <div class="col-md-6 col-centered">

                            <div class="card">
                                <div class="card-content">
                                    <div class="card-body">
                                        <h4 class="card-title">Follow Social Media AEEC</h4>
                                        <p class="card-text">
                                            Dapatkan Cashback 5% dengan follow dan subscribe semua media sosial
                                            AEEC
                                        </p>
                                    </div>
                                </div>
                                <div class="card-footer d-flex justify-content-between">
                                <a href="form_sosmed.php?idprog=<?=$hasil['ID_PROGRAM']?>&idbatch=<?=$_GET['idbatch'] ?>&iddiskon=D03"><button class="btn btn-light-primary">Daftar</button></a>
                                </div>
                            </div>

                            </div>


                            <div class="col-md-6 col-centered">
                                    
                            <div class="card">
                                <div class="card-content">
                                    <div class="card-body">
                                        <h4 class="card-title">Lewati Promo Ini</h4>
                                        <p class="card-text">
                                            <br><br> <br><br><br>
                                        </p>
                                    </div>
                                    
                                </div>
                                <div class="card-footer d-flex justify-content-between">
                                <a href="belumpernah_form.php?idprog=<?=$hasil['ID_PROGRAM']?>&idbatch=<?=$_GET['idbatch'] ?>&iddiskon=0"><button class="btn btn-light-primary">Daftar</button></a>
                                </div>
                            </div>
                        
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-light-secondary"
                        data-bs-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Close</span>
                    </button> -->
                    <button type="button" class="btn btn-primary ml-1"
                        data-bs-dismiss="modal">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Close</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>



<!-- END MODAL SOSIAL MEDIA -->


    <script src="../../assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="../../assets/js/bootstrap.bundle.min.js"></script>
    
    <script src="../../assets/js/mazer.js"></script>


    <!-- Include Choices JavaScript -->
<!-- <script src="../../../assets/vendors/choices.js/choices.min.js"></script>
<script src="../../../assets/js/pages/form-element-select.js"></script> -->

<!-- JS FORM DINAMIS -->
<script type="text/javascript">
    $(document).ready(function() {
      $(".add-more").click(function(){ 
          var html = $(".copy").html();
          $(".after-add-more").after(html);
      });
      $("body").on("click",".remove",function(){ 
          $(this).parents(".control-group").remove();
      });
    });
</script>
</body>

</html>


<!-- SINTAX UNTUK CARI RIWAYAT PROGAM -->
<?php
        
        if(isset($_POST['caririwayatprogram'])){
            $batch = $_POST['batch'];


            // UNTUK BUKTI SERTIFIKAT YG LAMA
            // $gambar         = $_FILES['berkas']['name'];
            // $lokasi         = $_FILES['berkas']['tmp_name'];
            // move_uploaded_file($lokasi, '../../penyimpanan/npwp/'.$gambar);

            $riwayat=query("SELECT * from client 
            join pendaftaran where client.ID_USER = '$iduser'
            and pendaftaran.ID_BATCH = '$batch'");

            foreach($riwayat as $cekhasil){
            }

            if ($cekhasil != null){
                echo "<script> 
                alert('Data DItemukan');
                document.location.href = 'sudahpernah_form.php?idprog=$id&idbatch=$batch&iddiskon=D01';
                </script>";
            }else{
                echo "<script> 
                alert('Data Tidak DItemukan');
                document.location.href = '#';
                </script>";
            }

            
            
        }

        // MENCARI EMAIL PARTISIPAN
        if(isset($_POST['cariemail'])){
            $dataditemukan = 0;
            $input = $_POST['addmore'];
            $banyakemail = count($input);
            // Chechk EMail
            foreach ($input as $output) {
                
                $email=query("SELECT * FROM aeec.user where email = '$output'");
                foreach($email as $cekhasil){
                    $dataditemukan = $dataditemukan+1;
                }
            }
            

            if($dataditemukan == $banyakemail){
                // Ketika semua email benar
                echo "<script> 
                alert('Email Partisipan Ditemukan');
                document.location.href = 'form_indiv_ajak.php?idprog=$id&idbatch=$batch&iddiskon=D02';
                </script>";
            }else{
                // Ketika ada email yang salah
                echo "<script> 
                alert('Email Tidak Ditemukan');
                document.location.href = '#';
                </script>";
            }
        }

?>