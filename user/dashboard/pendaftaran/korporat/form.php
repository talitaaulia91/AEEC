<?php 
include_once 'header.php'; 
?>

<!-- HALAMAN UTAMA -->
<div id="main-content">
    <div class="page-heading">
        <div class="page-heading">
            <div class="page-title">
                <div class="row">
                    <div class="col-12 col-md-6 order-md-1 order-last">
                        <h3>Formulir Pendaftaran Kolektif</h3>
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
                                <th>Nama Lengkap</th>
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
                        <!-- <?php foreach ($sql as $item) : ?> -->
                        <tr>
                        <td class="align-middle text-center text-sm">
                            <span class="text-secondary font-weight-bold text-xs"><?php echo $item['']; ?></span>
                        </td>
                        <td class="align-middle text-center text-sm">
                            <span class="text-secondary font-weight-bold text-xs"><?php echo $item['']; ?></span>
                        </td>
                        <td class="align-middle text-center text-sm">
                            <span class="text-secondary font-weight-bold text-xs"><?php echo $item['']; ?></span>
                        </td>
                        <td class="align-middle text-center text-sm">
                            <span class="text-secondary font-weight-bold text-xs"><?php echo $item['']; ?></span>
                        </td>
                        <td>
                            <a class="btn btn-link text-danger text-gradient px-3 mb-0" href="deleteoffer.php?id_penawaran=<?php echo $item['']; ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><i class="material-icons text-sm me-2">delete</i>Delete</a>
                            <a class="btn btn-link text-warning px-3 mb-0" href="editoffer.php?id_penawaran=<?php echo $item['']; ?>"><i class="material-icons text-sm me-2">edit</i>Edit</a>
                        </td>
                        </tr>
                        <!-- <?php endforeach; ?>                       -->
                    </tbody>
                    </div>

                </table>
            </div>
        </div>

    </section>
    <!-- Basic Tables end -->             
</div>

<?php include 'footer.php'; ?>