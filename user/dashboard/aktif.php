<?php 
include_once 'header.php'; 

?>
            <!-- HALAMAN UTAMA -->
            <div id="main-content">
                
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Program Yang Saat Ini Anda Ikuti</h3>
                <p class="text-subtitle text-muted">Navbar will appear in top of the page.</p>
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
            <a href="#" class="btn btn-success">Daftar +</a>
            </div>
            <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="table1" width="100%" cellspacing="0">
                    <thead> 
                        <tr>
                            <th>No Pendaftaran</th>
                            <th>Nama Program</th>
                            <th>Tanggal Mulai</th>
                            <th>Tanggal Berakhir</th>
                            <th>Detail</th>
                            <!-- <th></th>   
                            <th>Delete</th>                          -->
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>DS1</td>
                            <td>Program 1</td>
                            <td>14 April 2022</td>  
                            <td>14 Mei 2022</td>   
                            <!-- <td>Diskon untuk peserta yang mengikuti sosial media AEEC sesuai ketentuan</td>     -->
                            <td>
                            <a href="#" class="btn btn-info">Edit</a>
                            </td>
                        <!-- <td>
                            <a href="#" class="btn btn-danger">Delete</a>
                            </td>               -->
                        </tr>                      
                    </tbody>
                    </div>

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
                            <p>Crafted with <span class="text-danger"><i class="bi bi-heart-fill icon-mid"></i></span>
                                by <a href="https://ahmadsaugi.com">Saugi</a></p>
                        </div>
                    </div>
                </footer>
            </div>
            <!-- END HALAMAN UTAMA -->
        </div>
    </div>
    <script src="../../assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="../../assets/js/bootstrap.bundle.min.js"></script>
    
    <script src="../../assets/js/mazer.js"></script>
</body>

</html>
