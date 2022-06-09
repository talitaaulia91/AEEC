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
                <h3>Detail Pendaftaran</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end"></nav>
            </div>
        </div>
    </div>

    <!-- Basic Tables start -->
    <?php
    // AMBIL ID CLIENT
    $idclient = $_GET['idclient'];
    $iddaftar = $_GET['id'];
        $regular    = mysqli_query($mysqli, "SELECT * FROM aeec.pendaftaran join client 
        where pendaftaran.ID_CLIENT = client.ID_CLIENT
        and pendaftaran.ID_PENDAFTARAN = '$iddaftar'
        and client.ID_CLIENT = '$idclient'; " );
        $ambil_data = $regular->fetch_assoc();
        $id_cli    = $ambil_data['ID_PENDAFTARAN'];

        // AMBIL ID CLIENT
        $idclient = $_GET['idclient'];
    ?>
 
    <section class="section">
        <div class="card">
            <div class="card-header">
                <table class="table table-bordered"  width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID Batch</th>    
                            <td><?=$ambil_data['ID_BATCH'] ?></td>
                        </tr>
                        <tr>
                            <th>ID Client</th>    
                            <td><?=$ambil_data['ID_CLIENT'] ?></td>
                        </tr>
                        <tr>
                            <th>ID Diskon</th>    
                            <td><?=$ambil_data['ID_DISKON'] ?></td>
                        </tr>
                        <tr>
                            <th>Virtual Account</th>    
                            <td><?=$ambil_data['VIRTUAL_ACC'] ?>
                                
                            </td>
                        </tr>
                        <tr>
                            <th>Nama</th>    
                            <td><?=$ambil_data['NAMA'] ?></td>
                        </tr>
                        <tr>
                            <th>Tanggal Pendaftaran</th>    
                            <td><?=$ambil_data['TGL_PENDAFTARAN'] ?></td>
                        </tr>
                        <tr>
                            <th>Tagihan</th>    
                            <td><?=$ambil_data['TAGIHAN'] ?></td>
                        </tr>
                        <tr>
                            <th>Alamat NPWP</th>    
                            <td><?=$ambil_data['ALAMAT_NPWP'] ?></td>
                        </tr>
                        <tr>
                            <th>Berkas NPWP</th>    
                            <td><a href="../../assets/NPWP/<?= $ambil_data['BERKAS_NPWP'] ?> " class="btn btn-success">Lihat</a>  </td>
                        </tr>
                    </thead>
                </table>   
                <a href="pendaftaran.php" class="btn btn-primary">Kembali</a>
            </div>
        </div>

        <!-- <div class="card" >
            <div class="card-header">
            </div>
            <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="table1" width="100%" cellspacing="0">
                <thead> 
                        <tr>
                            <th class="col-1">ID</th>
                            <th class="col-2">Nama Peserta</th>
                            <th class="col-2">Program</th>
                            <th>Tanggal</th>   
                            <th>Status</th>
                            <th>Detail</th>                      
                            <th>VA</th>
                    </tr>                    
                    </thead>
                    <tbody>
                        <?php
                        $query_daftar = "SELECT p.ID_PENDAFTARAN, p.TGL_PENDAFTARAN, p.STATUS, b.NAMA_CLASS, c.NAMA 
                                            FROM pendaftaran p, batch_program b, client c
                                            WHERE p.ID_BATCH = b.ID_BATCH
                                            AND p.ID_CLIENT = c.ID_CLIENT";
                        $tabel_daftar= mysqli_query($mysqli, $query_daftar);
                        foreach ($tabel_daftar as $data_daftar) : 
                        ?>
                        <tr>
                            <td><?php echo $data_daftar['ID_PENDAFTARAN'];?></td>
                            <td><?php echo $data_daftar['NAMA'];?></td>
                            <td><?php echo $data_daftar['NAMA_CLASS'];?></td>
                            <td><?php echo $data_daftar['TGL_PENDAFTARAN'];?></td>
                            <td>
                                <?php
                                if($data_daftar['STATUS']=='1'){
                                ?>
                                <a href="verif.php?id=<?php echo $data_daftar['ID_PENDAFTARAN']; ?>&status=<?= $data_daftar['STATUS'] ?>"><font color="success"><i><b>Verifed</b></i></font></a>
                                <?php
                                }else{
                                ?>
                                 <a href="verif.php?id=<?php echo $data_daftar['ID_PENDAFTARAN']; ?>&status=<?= $data_daftar['STATUS'] ?>"><font color="grey"><i><b>Unverified</b></i></font></a>
                                <?php
                                }
                                ?>
                            </td>            
                            <td>
                                <a href="detail.php?id=<?php echo $data_daftar['ID_PENDAFTARAN']; ?>" class="btn btn-primary">Detail</a>
                            </td>                     
                            <td>
                                <a href="add.php?id=<?php echo $data_daftar['ID_PENDAFTARAN']; ?>" class="btn btn-success">Add</a>                            
                            </td>         
                        </tr>   
                        <?php
                        endforeach
                        ?>                   
                    </tbody>
                    </div>

                </table>
            </div>
        </div> -->


    <!-- Basic Tables end -->
</div>

            <!-- <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>2021 &copy; Mazer</p>
                    </div>
                    <div class="float-end">
                        <p>Crafted with <span class="text-danger"><i class="bi bi-heart"></i></span> by <a
                                href="http://ahmadsaugi.com">A. Saugi</a></p>
                    </div>
                </div>
            </footer> -->
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
