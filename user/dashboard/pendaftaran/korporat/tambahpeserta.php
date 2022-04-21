<?php 
include_once('../../../../config/database.php');

include_once 'header.php'; 
?>

<!-- HALAMAN UTAMA -->
<div id="main-content">
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Kolektif</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Tambah Data Peserta</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    
    <!-- baru -->
    <div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Regular Class - Korporat</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                </nav>
            </div>
        </div>
    </div>

    <!-- Basic Tables start -->
    <section class="section">
        <section id="basic-vertical-layouts">
            <div class="row match-height">
                <div class="col-md-12 col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Mohon Isi Data Dibawah Ini Dengan Benar</h4>
                        </div>
                        <!-- <div class="card-content"> -->
                        <div class="card-body">
                            <form class="form form-vertical" method="post" action="" enctype="multipart/form-data">
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="first-name-vertical">Jenis Kelamin</label>
                                                    <select class="form-select" name="jk" required>
	                                                    <option value="0">Laki-Laki</option>
	                                                    <option value="1">Wanita</option>
                                                    </select>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="first-name-vertical">No Telp</label>
                                                <input type="number" id="first-name-vertical" class="form-control"
                                                    name="no_telp" placeholder="No Telp" required>
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
                                                <label for="first-name-vertical">Alamat NPWP</label>
                                                <input type="text" id="first-name-vertical" class="form-control"
                                                    name="alamat_npwp" placeholder="Alamat NPWP" required>
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
                                                <label for="first-name-vertical">Instansi</label>
                                                <input type="text" id="first-name-vertical" class="form-control"
                                                    name="instansi" placeholder="Instansi" required>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="first-name-vertical">Jabatan</label>
                                                <input type="text" id="first-name-vertical" class="form-control"
                                                    name="jabatan" placeholder="Jabatan" required>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="formFile" class="form-label">Berkas NPWP</label>
                                                <input type="file" id="formFile" class="form-control"
                                                    name="alamat_rumah" placeholder="Alamat Rumah" required>
                                            </div>
                                        </div>     
                                      
                                       <br></br>
                                       <br></br>
                                
                                        <div class="col-12 d-flex justify-content-end ">
                                            <button type="submit" name="tambah" value="tambah" class="btn btn-success me-1 mb-1">Add +</button>
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
    </section>

    <?php
                if(isset($_POST['tambah'])){
                $jk             = $_POST['jk'];
                $no_telp        = $_POST['no_telp'];
                $npwp           = $_POST['npwp'];
                $alamat_npwp    = $_POST['alamat_npwp'];
                $alamat_rumah   = $_POST['alamat_rumah'];    
                $instansi       = $_POST['instansi'];
                $jabatan        = $_POST['jabatan'];
                $berkas_npwp    = $_FILES['berkas_npwp']['name'];
                $lokasi         = $_FILES['berkas_npwp']['tmp_name'];
                move_uploaded_file($lokasi, '../../../../assets/berkas-npwp/'.$berkas_npwp);
  
                //insert 
                $program       = mysqli_query($mysqli,"INSERT INTO client (JK, NO_TELP, NPWP, ALAMAT_NPWP, ALAMAT_RUMAH, INSTANSI, JABATAN, BERKAS NPWP)
                                                       VALUES ('$jk', '$no_telp', '$npwp', '$alamat_npwp', '$alamat_rumah', '$instansi'
                                                       , '$jabatan', '$berkas_npwp')");
                
                echo "<script>location='form.php';</script>";
              }
              ?>
</div>

<?php include 'footer.php'; ?>