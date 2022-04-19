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
                </nav>
            </div>
        </div>
    </div>

    <!-- Basic Tables start -->
    <?php
     $regular    = mysqli_query($mysqli, "SELECT * FROM program WHERE ID_PROGRAM ='".$_GET['id']."' " );
     $ambil_data = $regular->fetch_assoc();
     $start      = strtotime($ambil_data['TGL_MULAI']);
     $end        = strtotime($ambil_data['TGL_BERAKHIR']);
    ?>
    <section class="section">
    <div class="card" >
    <div class="card-header">
    <table class="table table-bordered"  width="100%" cellspacing="0">
        <thead>
        <tr>
            <th>Kode program</th>    
            <th><?=$ambil_data['ID_PROGRAM'] ?></th>
        </tr>
        <tr>
            <th>Nama Program</th>    
            <th><?= $ambil_data['NAMA_PROGRAM'] ?></th>
        </tr>
        <tr>
            <th>Kategori Program</th>    
            <th>
            <?php
            $kategori = mysqli_query($mysqli, "SELECT k.NAMA_KATEGORI FROM kategori_program k, program p 
                                                WHERE k.ID_KATEGORI = p.ID_KATEGORI 
                                                AND p.ID_PROGRAM = '".$_GET['id']."'");
            $data     = mysqli_fetch_assoc($kategori);
            $kat      = $data['NAMA_KATEGORI'];
            echo $kat;                                    
            ?>

            </th>
        </tr>
        <tr>
            <th>Batch</th>    
            <th><?= $ambil_data['BATCH'] ?></th>
        </tr>
        <tr>
            <th>Individu (PPN)</th>    
            <th><?= 'Rp. '. number_format($ambil_data['INDIVIDU']) ?></th>
        </tr>
        <tr>
            <th>Kolektif (PPN)</th>    
            <th><?= 'Rp. '. number_format($ambil_data['KOLEKTIF']) ?></th>
        </tr>
        <tr>
            <th>Korporat (PPN)</th>    
            <th><?= 'Rp. '. number_format($ambil_data['KORPORAT']) ?></th>
        </tr>
        <tr>
            <th>Voucher 5%</th>    
            <th><?= 'coming soon' ?></th>
        </tr>
        <tr>
            <th>Cashback 10%</th>    
            <th><?= 'coming soon' ?></th>
        </tr>
        <tr>
            <th>Tanggal Mulai</th>    
            <th><?= date("d-m-Y", $start) ?></th>
        </tr>
        <tr>
            <th>Tanggal Berakhir</th>  
            <th>
            <?php            
            if($ambil_data['TGL_BERAKHIR']== null){
               echo "-";
            }else{
                echo date("d-m-Y", $end);
            }
            ?>
            </th>
        </tr>
        <tr>
            <th width="200px">Deskripsi</th>    
            <th><?= $ambil_data['DESKRIPSI'] ?></th>
        </tr>
        <tr>
            <th>Status</th>    
            <th>
            <?php 
            if($ambil_data['ACTIVE']=='1'){?> 
            <a href="change_status.php?id=<?php echo $ambil_data['ID_PROGRAM']; ?>" class="btn btn-success">ACTIVE</a>
            <?php } else{ ?> 
            <a href="change_status.php?id=<?php echo $ambil_data['ID_PROGRAM']; ?>" class="btn btn-secondary">NON-ACTIVE</a>
            <?php } ?>
            </th>
        </tr>
    </thead>
    </table>
</div>
</div>
    </section>
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