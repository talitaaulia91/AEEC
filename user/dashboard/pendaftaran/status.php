<?php 
include_once 'header.php'; 
// $id = $_GET['idprog'];
// $program = query("SELECT * FROM aeec.program where ID_PROGRAM = '$id'");
// foreach($program as $hasil){

// };

?>
            <!-- HALAMAN UTAMA -->
            <div id="main-content">
                
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Pendaftaran</h3>
                <!-- <p class="text-subtitle text-muted">Navbar will appear in top of the page.</p> -->
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Pembayaran</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Jenis Pendaftaran</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
       <!-- Basic Tables start -->
       <section class="section">
        <div class="card" >
            <div class="card-header">
            <h4>Status Pendaftaran<h4>
            </div>
            <div class="card-body">
                

            <section class="section">
                <div class="card">
                <div class="card-header">
                    <table class="table table-bordered"  width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID Pendaftaran</th>    
                                <td>ID Pendaftaran</td>
                            </tr>
                            <tr>
                                <th>Nama Program</th>    
                                <td>Nama Program</td>
                            </tr>
                            <tr>
                                <th>Batch</th>    
                                <td>Batch</td>
                            </tr>
                            <tr>
                                <th>Status</th>    
                                <td><a href="#" class="btn disabled btn-primary">Menunggu Verifikasi</a></td>
                            </tr>
                            <tr>
                                <th width="200px">Nominal Bayar</th>    
                                <td>Nominal Bayar</td>
                            </tr>
                            <tr>
                                <th width="200px">No Virtual Account</th>    
                                <td>No Virtual Account</td>
                            </tr>
                        </thead>
                    </table>   
                </div>
            </div>
            </section>

                
            </div>
        </div>

    </section>
    <!-- Basic Tables end -->
</div>

<?php include 'footer.php'; ?>
