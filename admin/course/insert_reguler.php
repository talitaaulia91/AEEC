<?php
include_once('../../config/database.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AEEC || Administrator</title>
    
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
            
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Regular Class</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Regular Class</li>
                    </ol>
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
                        <h4 class="card-title" >Insert New Class</h4>
                    </div>
                    <!-- <div class="card-content"> -->
                        <div class="card-body">
                            <form class="form form-vertical" method="post" action=""  enctype="multipart/form-data">
                                <div class="form-body">
                                    <div class="row">
                                    <div class="col-12">
                                            <div class="form-group">
                                                <label for="first-name-vertical">Kode Program</label>
                                                <input type="text" id="first-name-vertical" class="form-control"
                                                    name="id_program" placeholder="Kode Program" required>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="first-name-vertical">Nama Program</label>
                                                <input type="text" id="first-name-vertical" class="form-control"
                                                    name="nama_program" placeholder="Nama Program" required>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="first-name-vertical">Harga Individu</label>
                                                <input type="text" id="first-name-vertical" class="form-control"
                                                    name="individu" placeholder="Harga Individu (sebelum PPN)" required>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="first-name-vertical">Harga Kolektif</label>
                                                <input type="text" id="first-name-vertical" class="form-control"
                                                    name="kolektif" placeholder="Harga Kolektif (sebelum PPN)" required>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="first-name-vertical">Harga Korporat</label>
                                                <input type="text" id="first-name-vertical" class="form-control"
                                                    name="korporat" placeholder="Harga Korporat (sebelum PPN)" required>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="contact-info-vertical">Batch</label>
                                                <input type="number" id="contact-info-vertical" class="form-control"
                                                    name="batch" placeholder="Batch">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="password-vertical">Tanggal Mulai Program</label>
                                                <input type="date" id="password-vertical" class="form-control"
                                                    name="tgl_mulai" placeholder="Tanggal Mulai Program">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="password-vertical">Tanggal Berakhir Program</label>
                                                <input type="date" id="password-vertical" class="form-control"
                                                    name="tgl_berakhir" placeholder="Tanggal Berakhir Program">
                                            </div>
                                        </div>
                                        <div class="col-12 mb-2">
                                           Deskripsi
                                            <div class="form-floating">
                                                        <textarea class="form-control" type="text" name="deskripsi" id="floatingTextarea" required></textarea>
                                                        </div>
                                        </div>
                                        <div class="form-group ">
                                        <label for="exampleInputPassword1">Gambar</label>
                                        <input type="file" name="gambar"class="form-control" required>
                                        </div>
                                      
                                       <br></br>
                                       <br></br>
                                
                                        <div class="col-12 d-flex justify-content-end ">
                                            <button type="submit" name="tambah" value="tambah" class="btn btn-success me-1 mb-1">Tambah</button>
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
                $id_program      = $_POST['id_program'];
                $nama_program    = $_POST['nama_program'];
                $individu        = $_POST['individu'];
                $kolektif        = $_POST['kolektif'];
                $korporat        = $_POST['korporat'];
                $batch           = $_POST['batch'];
                $tgl_mulai       = $_POST['tgl_mulai'];
                $tgl_berakhir    = $_POST['tgl_berakhir'];
                $deskripsi       = $_POST['deskripsi'];


                $individu_ppn = $individu + ($individu * 11/100);
                $kolektif_ppn = $kolektif + ($kolektif  * 11/100);
                $korporat_ppn = $korporat + ($korporat * 11/100);

                $gambar         = $_FILES['gambar']['name'];
                $lokasi         = $_FILES['gambar']['tmp_name'];
                move_uploaded_file($lokasi, '../../assets/images/program/'.$gambar);
 
                
    
  
                //insert program
                $program       = mysqli_query($mysqli,"INSERT INTO program (ID_PROGRAM, ID_KATEGORI, NAMA_PROGRAM, INDIVIDU, KOLEKTIF, KORPORAT, TGL_MULAI, TGL_BERAKHIR, DESKRIPSI, BATCH, IMAGE)
                                                     VALUES ('$id_program', 'SR', '$nama_program', '$individu_ppn', '$kolektif_ppn', '$korporat_ppn', '$tgl_mulai', '$tgl_berakhir', '$deskripsi', '$batch','$gambar')");


                
                echo "<script>location='reguler.php';</script>";
              }
              ?>








    <!-- Basic Tables end -->
</div>

            <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>2021 &copy; Mazer</p>
                    </div>
                    <div class="float-end">
                        <p>Crafted with <span class="text-danger"><i class="bi bi-heart"></i></span> by <a
                                href="http://ahmadsaugi.com">A. Saugi</a></p>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="../../assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="../../assets/js/bootstrap.bundle.min.js"></script>
    
<script src="../../assets/vendors/jquery/jquery.min.js"></script>
<script src="../../assets/vendors/jquery-datatables/jquery.dataTables.min.js"></script>
<script src="../../assets/vendors/jquery-datatables/custom.jquery.dataTables.bootstrap5.min.js"></script>
<script src="../../assets/vendors/fontawesome/all.min.js"></script>
<script>
    // Jquery Datatable
    let jquery_datatable = $("#table1").DataTable()
</script>

    <script src="../../assets/js/mazer.js"></script>
</body>

</html>
