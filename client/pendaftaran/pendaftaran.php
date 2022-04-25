
<?php 
// require_once("auth.php"); 
require '../method.php';
$pendaftaran = query("SELECT ID_PENDAFTARAN, NAMA_PROGRAM, BATCH, TGL_PENDAFTARAN, pendaftaran.STATUS
from client join pendaftaran
on (client.ID_CLIENT = pendaftaran.ID_CLIENT)
join batch_program
on batch_program.ID_BATCH = pendaftaran.ID_BATCH
join program
on program.ID_PROGRAM = batch_program.ID_PROGRAM
and client.ID_USER = 'US04220002'");
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
<!-- BAGIAN SIDEBAR -->
<?php include_once('../sidebar/sidebar.php'); ?>


<!-- BAGIAN UTAMA CODING [MULAI main-content] -->

                    <!-- HALAMAN UTAMA -->
                    <div id="main-content">
                
                <div class="page-heading">
                    <div class="page-title">
                        <div class="row">
                            <div class="col-12 col-md-6 order-md-1 order-last">
                                <h3>Pendaftaran Anda</h3>
                                <p class="text-subtitle text-muted">Program Yang Sedang Berada Dalam Proses Pendaftaran</p>
                            </div>
                            <div class="col-12 col-md-6 order-md-2 order-first">
                                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Layout Vertical Navbar</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                    

                    <!-- Basic Tables start -->
    <section class="section">
        <div class="card" >
            <div class="card-header">
            <a href="insert_non-reg.php" class="btn btn-success">Add +</a>
            </div>
            <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="table1" width="100%" cellspacing="0">
                    <thead> 
                        <tr>
                            <th class="col-2">ID Pendaftaran</th>
                            <th>Nama Program</th>            
                            <th class="col-1">Tanggal</th>
                            <th class="col-1">status Pendaftaran</th>
                            <th class="col-1">Detail </th>
                        </tr>
                    </thead>
                    <tbody>
                    
                    <?php foreach($pendaftaran as $hasil): ?>
                        <tr>
                            <td><?= $hasil['ID_PENDAFTARAN'] ?> </td>
                            <td><?= $hasil['NAMA_PROGRAM'].' Batch '.$hasil['BATCH'] ?></td>
                            <td><?= $hasil['TGL_PENDAFTARAN'] ?></td>
                            <td><?= $hasil['STATUS'] ?></td>
                            <td>Detail</td>    
                        </tr>
                    
                    <?php endforeach; ?>
                                                
                    </tbody>
                    
                    </div>
                </table>
            </div>
        </div>

    </section>
    <!-- Basic Tables end -->




                </div>


<!-- BAGIAN FOOTER -->
<footer>
    <div class="footer clearfix mb-0 text-muted">
        <div class="float-start">
            <p>2022 &copy; AEEC</p>
        </div>
        <div class="float-end">
            <p>AIRLANGGA EXECUTIVE EDUCATION CENTER <span class="text-danger"><i class="bi bi-heart-fill icon-mid"></i></span></p>
        </div>
    </div>
</footer>
        </div>
            <!-- END HALAMAN UTAMA -->
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