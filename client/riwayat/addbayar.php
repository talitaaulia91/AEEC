<?php
require_once("../auth/auth.php"); 
include_once('../../config/database.php');

$iduser     = $_SESSION["user"]["ID_USER"];
$iddaftar   = $_GET["id"];
$tagihan    = $_GET["tagihan"];

$bayar = mysqli_query($mysqli, "SELECT pn.ID_PENDAFTARAN, pn.TAGIHAN, pn.VIRTUAL_ACC, c.ID_CLIENT, pe.ID_PEMBAYARAN, pe.NOMINAL, pe.TGL_PEMBAYARAN, pe.BUKTI, pe.STATUS
                        FROM program pr, batch_program b, pendaftaran pn, CLIENT c, pembayaran pe
                        WHERE pr.ID_PROGRAM = b.ID_PROGRAM
                        AND pn.ID_PENDAFTARAN = '$iddaftar'
                        AND pe.ID_PEMBAYARAN = '$tagihan'
                        AND pn.ID_BATCH = b.ID_BATCH
                        AND pn.ID_CLIENT = c.ID_CLIENT
                        AND c.ID_USER = '$iduser'");
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Airlangga Executive Education</title>
    
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="../../assets/css/bootstrap.css">
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
        <a href="#" class="burger-btn d-block d-xl-none"><i class="bi bi-justify fs-3"></i></a>
    </header>
            
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <!-- <h3>Data Pembayaran</h3> -->
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end"></nav>
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
                            <h4 class="card-title" >Tambahkan Data Pembayaran</h4>
                        </div>
                        
                        <div class="card-body">
                            <form class="form form-vertical" method="post" action="" enctype="multipart/form-data">
                                <div class="form-body">
                                    <div class="row">

                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="first-name-vertical">ID Pendaftaran</label>
                                                <input type="text" id="first-name-vertical" readonly value="<?= "$iddaftar"?>" 
                                                       class="form-control" required>
                                            </div>
                                        </div>                                        
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="first-name-vertical">Tanggal Pembayaran</label>
                                                <input type="date" id="first-name-vertical" class="form-control"
                                                    name="tgl_pembayaran" placeholder="Tanggal Pembayaran" required>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="first-name-vertical">Nominal</label>
                                                <input type="text" id="first-name-vertical" readonly value="<?= "$tagihan"?>" 
                                                       class="form-control" required>
                                            </div>
                                        </div>       
                                        <div class="form-group ">
                                            <label for="exampleInputPassword1">Bukti Pembayaran</label>
                                            <input type="file" name="bukti" class="form-control" required >
                                        </div>
                                        </div>
                                        <br></br>
                                        <br></br>
                                        <div class="col-12 d-flex justify-content-end ">
                                            <button type="submit" name="tambah" value="tambah" class="btn btn-success me-1 mb-1">Add +</button>
                                            <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
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
            $iddaftar       = $_GET["id"];
            $tgl_pembayaran = $_POST['tgl_pembayaran'];
            $tagihan        = $_GET["tagihan"];

            $bukti          = $_FILES['bukti']['name'];
            $lokasi         = $_FILES['bukti']['tmp_name'];
            move_uploaded_file($lokasi, '../../penyimpanan/buktipembayaran/'.$bukti);

            $bayar          = mysqli_query($mysqli, 
                                "INSERT INTO pembayaran (ID_PENDAFTARAN, TGL_PEMBAYARAN, NOMINAL, BUKTI) 
                                    VALUES ('$iddaftar','$tgl_pembayaran', '$tagihan', '$bukti')");
        if ($bayar) {
            echo " <script>location='detailbayar.php?id=$iddaftar';</script>";
        } else {
            echo "gagal input data";
        } 
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
            <p>Crafted with <span class="text-danger"><i class="bi bi-heart"></i></span> by <a href="http://ahmadsaugi.com">A. Saugi</a></p>
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