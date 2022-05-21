<?php
require_once("../auth/auth.php"); 
include_once('../../config/database.php');

$iduser     = $_SESSION["user"]["ID_USER"];
$id         = $_GET['id']; 

$pembayaran = mysqli_query($mysqli, "SELECT pr.NAMA_PROGRAM, b.BATCH, pn.ID_PENDAFTARAN, pn.TAGIHAN, pn.VIRTUAL_ACC, c.ID_CLIENT, pe.ID_PEMBAYARAN, pe.NOMINAL, pe.TGL_PEMBAYARAN, pe.BUKTI, pe.STATUS
                        FROM program pr, batch_program b, pendaftaran pn, CLIENT c, pembayaran pe
                        WHERE pr.ID_PROGRAM = b.ID_PROGRAM
                        AND pn.ID_PENDAFTARAN = '$id'
                        AND pe.ID_PENDAFTARAN = '$id'
                        AND pn.ID_BATCH = b.ID_BATCH
                        AND pn.ID_CLIENT = c.ID_CLIENT
                        AND c.ID_USER = '$iduser'");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AEEC || CLIENT</title>
    
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
                <h3>Riwayat Pembayaran</h3>
                <p class="text-subtitle text-muted">Riwayat Pembayaran Program Anda</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="../dashboard/regular.php">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Riwayat Pembayaran</li>
                </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- Basic Tables start -->
    <section class="section">
    <div class="card" >
            <div class="card-header"></div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="table1" width="100%" cellspacing="0">
                        <thead> 
                            <tr>
                                <th>ID Pendaftaran</th>
                                <th>ID Pembayaran</th>            
                                <th>Nominal</th>
                                <th>Virtual Account</th>
                                <th>Bukti Bayar</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                foreach($pembayaran as $hasil): ?>
                                <tr>
                                    <td><?= $hasil['ID_PENDAFTARAN'] ?> </td>
                                    <td><?= $hasil['ID_PEMBAYARAN'] ?></td>
                                    <td><?= $hasil['NOMINAL'] ?></td>
                                    <td><?= $hasil['VIRTUAL_ACC'] ?></td>
                                    <td> 
                                        <a href="../../penyimpanan/buktipembayaran/<?php echo $hasil['BUKTI']; ?>"
                                        class="btn btn-primary">Lihat Berkas</a>
                                    </td> 
                                    <td>
                                    <?php
                                        if($hasil['STATUS']=='1'){
                                        ?>
                                            <a href=""><font color="success"><i><b>Verifed</b></i></font></a>
                                        <?php
                                            }else{
                                        ?>
                                            <a href=""><font color="grey"><i><b>Unverified</b></i></font></a>
                                        <?php
                                        }
                                    ?>           
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </div>
                    </table>
                    <a href="pembayaran.php" class="btn btn-primary">Kembali</a>
                </div>
            </div>
        </section>

        <div class="card" >
            <div class="card-header"></div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="table1" width="100%" cellspacing="0">
                        <thead> 
                            <tr>
                                <th>ID Pendaftaran</th>
                                <th>Nama Program</th>            
                                <th>Tanggal Pendaftaran</th>
                                <th>Tagihan</th>
                                <th>Bukti Pembayaran</th>
                                <th>Detail</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $pembayaran = mysqli_query($mysqli, "SELECT pr.NAMA_PROGRAM, pn.TGL_PENDAFTARAN, 
                                                    b.NAMA_CLASS, pn.STATUS, pn.ID_PENDAFTARAN, pn.TAGIHAN, 
                                                    c.ID_CLIENT
                                                FROM program pr, batch_program b, pendaftaran pn, client c
                                                WHERE pr.ID_PROGRAM = b.ID_PROGRAM
                                                AND pn.ID_BATCH = b.ID_BATCH
                                                AND pn.ID_CLIENT = c.ID_CLIENT
                                                AND c.ID_USER = '$iduser'");
                                foreach($pembayaran as $hasil): ?>
                                <tr>
                                    <td><?= $hasil['ID_PENDAFTARAN'] ?> </td>
                                    <td><?= $hasil['NAMA_CLASS'] ?></td>
                                    <td><?= $hasil['TGL_PENDAFTARAN'] ?></td>
                                    <td><?= $hasil['TAGIHAN'] ?></td>
                                    <td>
                                        <a href="addbayar.php?id=<?php echo $hasil['ID_PENDAFTARAN']; ?>&tagihan=<?= $hasil['TAGIHAN']?>" class="btn btn-success">Add</a>
                                    </td>   
                                    <td>
                                        <a href="detailbayar.php?id=<?php echo $hasil['ID_PENDAFTARAN']; ?>" class="btn btn-primary">Detail</a>
                                    </td>    
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </div>
                    </table>
                </div>
            </div>
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