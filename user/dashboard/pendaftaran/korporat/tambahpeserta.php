<?php 
include_once 'header.php'; 
include_once('../../../../config/database.php');
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
                            <!-- <form method="POST" action="proses-tambah.php" role="form" class="text-start" enctype="multipart/form-data"> -->
                            <form class="form form-vertical" method="post" action="" enctype="multipart/form-data">
                                <div class="form-body">
                                    <div class="row">
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
        </div>

    </section>
    <!-- Basic Tables end -->
</div>

<?php include 'footer.php'; ?>


<?php
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
?>