<?php 
include_once 'header.php'; 
include_once('../../../../config/database.php');
?>

<!-- HALAMAN UTAMA -->
<div id="main-content">
    <div class="page-heading">
        <div class="page-heading">
            <div class="page-title">
                <div class="row">
                    <div class="col-12 col-md-6 order-md-1 order-last">
                        <h3>Formulir Pendaftaran Korporat</h3>
                        <!-- <p class="text-subtitle text-muted">For user to check they list</p> -->
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="dashboard.php">Daftar Program</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Kolektif</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>

<!-- Basic Tables start -->
    <section class="section">
        <div class="card">
            <div class="card-header">
                <a href="tambahpeserta.php" class="btn btn-success">Add +</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="table1" width="100%" cellspacing="0">
                        <thead> 
                            <tr>
                                <th>Jenis Kelamin</th>
                                <th>No Telp</th>
                                <th>NPWP</th>
                                <th>Alamat NPWP</th>
                                <th>Alamat Rumah</th>                         
                                <th>Instansi</th>
                                <th>Jabatan</th>
                                <th>Berkas NPWP</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                    <tbody>
                    <?php
                        $query_client = "SELECT * FROM client ";
                        $tabel_client = mysqli_query($mysqli, $query_client);
                        foreach ($tabel_client as $data_client) :                            
                        ?>
                        <tr>
                            <td><?php echo $data_client['JENIS_KELAMIN']; ?></td>
                            <td><?php echo $data_client['NO_TELP']; ?></td> 
                            <td><?php echo $data_client['NPWP']; ?></td> 
                            <td><?php echo $data_client['ALAMAT_NPWP']; ?></td> 
                            <td><?php echo $data_client['ALAMAT_RUMAH']; ?></td> 
                            <td><?php echo $data_client['INSTANSI']; ?></td> 
                            <td><?php echo $data_client['JABATAN']; ?></td> 
                            <td><?php echo $data_client['BERKAS NPWP']; ?></td> 
                            <td>
                                <a href="detail.php?id=<?php echo $data_client['ID_CLIENT']; ?>" class="btn btn-primary">Detail</a>
                                <a href="edit.php?id=<?php echo $data_client['ID_CLIENT']; ?>" class="btn btn-warning">Edit</a>
                                <a href="delete.php?id=<?php echo $data_client['ID_CLIENT']; ?>" class="btn btn-danger">Delete</a>
                            </td>              
                        </tr>
                        </tbody>
                        <?php
                            endforeach
                        ?>
                    </tbody>
                    </div>

                </table>
            </div>
        </div>

    </section>
    <!-- Basic Tables end -->             
</div>

<?php include 'footer.php'; ?>