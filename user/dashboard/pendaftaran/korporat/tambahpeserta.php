<?php 
include_once 'header.php'; 
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
    
    <!-- Basic Tables start -->
    <section class="section">
        <div class="card" >
            <div class="card-body">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Mohon Isi Data Dibawah Dengan Benar</h4>
                    </div>

                    <div class="card-content">
                        <div class="card-body">
                            <form class="form form-vertical">
                                <div class="form-body">
                                    <div class="row">                                        
                                        <div class="col-12">
                                        <div class="form-group has-icon-left">
                                                <label for="email-id-icon">Nama Lengkap : </label>
                                                <div class="position-relative">
                                                    <input type="text" class="form-control" placeholder="John Charter"
                                                        id="email-id-icon">
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-person"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group has-icon-left">
                                                <label for="email-id-icon">No Telp : </label>
                                                <div class="position-relative">
                                                    <input type="text" class="form-control" placeholder="+62.."
                                                        id="email-id-icon">
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
                                                        id="mobile-id-icon">
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
                                                        id="password-id-icon">
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
                                                        id="password-id-icon">
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
                                                        id="password-id-icon">
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
                                                        id="password-id-icon">
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-person-badge"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="mb-3">
                                                <label for="formFile" class="form-label">File NPWP</label>
                                                <input class="form-control" type="file" id="formFile">
                                            </div>
                                        </div>
                                        <div class="col-12 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
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
