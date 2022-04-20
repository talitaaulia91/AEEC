<?php 
include_once 'header.php'; 

?>
            <!-- HALAMAN UTAMA -->
            <div id="main-content">
                
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Pembayaran</h3>
                <!-- <p class="text-subtitle text-muted">Navbar will appear in top of the page.</p> -->
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Pembayaran</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Pilih Diskon</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
       <!-- Basic Tables start -->
       <section class="section">
        <div class="card" >
            <div class="card-header">
            <h4>Nama Program<h4>
            </div>
            <div class="card-body">
                

            <section class="section">
        <div class="row">
            <div class="col-12 col-md-8 offset-md-2">
                <div class="pricing">
                    <div class="row align-items-center">
                        <div class="col-md-4 px-0">
                            <div class="card">
                                <div class="card-header text-center">
                                    <h4 class="card-title">Cashback</h4>
                                    <p class="text-center"><br>Mengajak 3 Peserta Lain (pastikan peserta telah memiliki akun aeec)</p>
                                </div>
                                <h1 class="price"><i class="bi bi-cash-stack"></i></h1>
                            
                                <div class="card-footer">
                                    <button class="btn btn-primary btn-block" data-bs-toggle="modal"
                                    data-bs-target="#inlineForm">Daftar</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 px-0">
                            <div class="card card-highlighted">
                                <div class="card-header text-center">
                                    <h4 class="card-title">Belum Pernah Daftar</h4>
                                    <p></p>
                                </div>
                                <h1 class="price text-white"><i class="bi bi-person-x"></i></h1>
                                
                                <div class="card-footer">
                                    <button class="btn btn-outline-white btn-block">Daftar</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 px-0">
                            <div class="card">
                                <div class="card-header text-center">
                                    <h4 class="card-title">Pernah Daftar</h4>
                                    <p class="text-center">Pernah Daftar Program Reguler Sebelumnya</p>
                                </div>
                                <h1 class="price"><i class="bi bi-person-check"></i></h1>
                                
                                <div class="card-footer">
                                    <button class="btn btn-primary btn-block" data-bs-toggle="modal"
                                    data-bs-target="#border-less">Daftar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

                
            </div>
        </div>

    </section>
    <!-- Basic Tables end -->
</div>

<!--login form Modal -->
<div class="modal fade text-left" id="inlineForm" tabindex="-1" role="dialog"
                                    aria-labelledby="myModalLabel33" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                                        role="document">
                                        <div class="modal-content">
                                            <div class="modal-header bg-primary" >
                                                <h4 class="modal-title" id="myModalLabel33" >Masukkan Nama Rekan </h4>
                                                <button type="button" class="close" data-bs-dismiss="modal"
                                                    aria-label="Close">
                                                    <i data-feather="x"></i>
                                                </button>
                                            </div>
                                            <form action="#">
                                                <div class="modal-body">
                                                    <label>Nama 1 : </label>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control">
                                                    </div>
                                                    <label>Nama 2 : </label>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control">
                                                    </div>
                                                    <label>Nama 3 : </label>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-light-secondary"
                                                        data-bs-dismiss="modal">
                                                        <i class="bx bx-x d-block d-sm-none"></i>
                                                        <span class="d-none d-sm-block">Close</span>
                                                    </button>
                                                    <button type="button" class="btn btn-primary ml-1"
                                                        data-bs-dismiss="modal">
                                                        <i class="bx bx-check d-block d-sm-none"></i>
                                                        <span class="d-none d-sm-block">Periksa</span>
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>


                                <!-- MODAL UNTUK SALAH REKAN -->
                                <div class="modal fade text-left modal-borderless" id="border-less" tabindex="-1"
                                role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header bg-danger">
                                            <h5 class="modal-title">Data Tidak Ditemukan</h5>
                                            <button type="button" class="close rounded-pill" data-bs-dismiss="modal"
                                                aria-label="Close">
                                                <i data-feather="x"></i>
                                            </button>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
<?php include 'footer.php'; ?>
