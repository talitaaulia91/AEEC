<?php 
require_once("../auth/auth.php"); 
require_once("../../config/database.php"); 

$type = $_GET['jenis'];
$message = $_GET['pesan'];
$jumlah = $_GET['jumlah'];
$iduser = $_SESSION["user"]["ID_USER"];

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
    
    <link rel="stylesheet" href="../../assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="../../assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="../../assets/css/app.css">
    <link rel="shortcut icon" href="../../assets/images/favicon.svg" type="image/x-icon">

    <!-- FORM DINAMIS -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

    <style>
        #response {
            padding: 10px;
            margin-top: 10px;
            border-radius: 2px;
            display: none;
        }

        .success {
            background: #c7efd9;
            border: #bbe2cd 1px solid;
        }

        .error {
            background: #fbcfcf;
            border: #f3c6c7 1px solid;
        }

        div#response.display-block {
            display: block;
        }
    </style>
  
</head>
<!-- BAGIAN SIDEBAR -->
<?php include_once('../sidebar/sidebar.php'); ?>


<!-- BAGIAN UTAMA CODING [MULAI main-content] -->

<!-- HALAMAN UTAMA -->
<div id="main-content">
                
                <div class="page-heading">
                    <div class="page-title">
                        <div class="row">
                        <div class="row">
                            <div class="col-12 col-md-6 order-md-1 order-last">
                            <a href="#" class="burger-btn d-block">
                                            <i class="bi bi-justify fs-3"></i>
                            </a>
                            </div>
                            <div class="col-12 col-md-6 order-md-2 order-first">
                                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                </nav>
                            </div>
                        </div>

                            <div class="col-12 col-md-6 order-md-1 order-last">
                                <h3>Pendaftaran</h3>
                            </div>
                            <div class="col-12 col-md-6 order-md-2 order-first">
                                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.html">Pendaftaran</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Korporat</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>

            <!-- CARD UNTUK FORM -->
            <section class="section">
                <div class="card" >
                    <div class="card-header">
                    <div id="response" class="<?php if(!empty($type)) { echo $type . " display-block"; } ?>"><?php if(!empty($message)) { echo $message; } ?></div>
                    </div>
                    <div class="card-body">
                        
                    <div class="table-responsive">
                    <?php
                        $client = mysqli_query($mysqli, "SELECT * FROM client WHERE ID_USER ='$iduser'" );
                        $ambil_data = $client->fetch_assoc();
                        ?>

                            <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th class="col-3">ID Peserta</th>    
                                <td><?=$ambil_data['ID_CLIENT'] ?></td>
                            </tr>
                            <tr>
                                <th>Nama Peserta</th>    
                                <td><?=$ambil_data['NAMA'] ?></td>
                            </tr>
                            <tr>
                                <th>NPWP</th>    
                                <td><?= $ambil_data['NPWP'] ?></td>
                            </tr>
                            <tr>
                                <th>No. Telepon</th>    
                                <td><?= $ambil_data['NO_TELP'] ?></td>
                            </tr>
                            <tr>
                                <th>Alamat NPWP</th>    
                                <td><?= $ambil_data['ALAMAT_NPWP'] ?></td>
                            </tr>
                            <tr>
                                <th>Alamat Rumah</th>    
                                <td><?= $ambil_data['ALAMAT_RUMAH'] ?></td>
                            </tr>
                            <tr>
                                <th>Instansi</th>    
                                <?php
                                if($ambil_data['INSTANSI'] != null){
                                ?>
                                    <td><?= $ambil_data['INSTANSI'] ?></td>
                                <?php
                                }else{
                                ?>
                                    <td><?php echo '-'?></td>

                                <?php
                                }
                                ?>                              
                            </tr>
                            <tr>
                                <th>Jabatan</th>    
                                <?php
                                if($ambil_data['JABATAN'] != null){
                                ?>
                                    <td><?= $ambil_data['JABATAN'] ?></td>
                                <?php
                                }else{
                                ?>
                                    <td><?php echo '-'?></td>

                                <?php
                                }
                                ?>                              
                            </tr>
                        </thead>
                        </table>
                        <br></br>           

                            <table class="table table-bordered" id="table1" width="100%" cellspacing="0">
                                <thead> 
                                    <tr>
                                        <th>ID Client</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Jenis Kelamin</th>
                                        <th>No Telp</th>
                                        <th>NPWP</th>                         
                                        <!-- <th>Detail</th>
                                        <th>Edit</th>
                                        <th>Delete</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    $query_client = "SELECT * FROM peserta ORDER BY ID_CLIENT DESC LIMIT $jumlah";
                                    $tabel_client = mysqli_query($mysqli, $query_client);
                                    foreach ($tabel_client as $data_client) :                            
                                    ?>
                                    <tr>
                                        <td><?php echo $data_client['ID_CLIENT']; ?></td>                           
                                        <td><?php echo $data_client['NAMA']; ?></td> 
                                        <td><?php echo $data_client['EMAIL']; ?></td> 
                                        <td><?php
                                        if($data_client['JK']==1){
                                            echo 'Perempuan'; 
                                        }else{
                                            echo 'Laki-Laki';
                                        }
                                        
                                        ?></td> 
                                        <td><?php echo $data_client['NO_TELP']; ?></td> 
                                        <td><?php echo $data_client['NPWP']; ?></td> 
                                        <!-- <td>
                                            <a href="detail.php?id=<?php echo $data_client['ID_CLIENT']; ?>" class="btn btn-primary">Detail</a>
                                        </td>            
                                        <td>
                                            <a href="edit.php?id=<?php echo $data_client['ID_CLIENT']; ?>" class="btn btn-warning">Edit</a>
                                        </td>  
                                        <td>
                                            <a href="delete.php?id=<?php echo $data_client['ID_CLIENT']; ?>" class="btn btn-danger">Delete</a>
                                        </td>     -->
                                    </tr>
                                    <?php
                                        endforeach
                                    ?>
                                    </tbody>                   
                                </div>

                            </table>
                        </div>

                        <!-- <a href="delete.php?" class="btn btn-info">Konfirmasi Pendaftaran</a> -->
                        <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal"
                            data-bs-target="#primary">
                            Konfirmasi Pendaftaran
                        </button>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </section>


                
            
                    <!-- END CARD -->
                    <!-- Basic Tables end -->
                </div>


<!-- BAGIAN FOOTER -->
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


    <div class="modal fade text-left" id="primary" tabindex="-1" role="dialog"
            aria-labelledby="myModalLabel160" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                role="document">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <h5 class="modal-title white" id="myModalLabel160">Primary Modal
                        </h5>
                        <button type="button" class="close" data-bs-dismiss="modal"
                            aria-label="Close">
                            <i data-feather="x"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        Tart lemon drops macaroon oat cake chocolate toffee chocolate
                        bar icing. Pudding jelly beans
                        carrot cake pastry gummies cheesecake lollipop. I love cookie
                        lollipop cake I love sweet
                        gummi
                        bears cupcake dessert.
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
                            <span class="d-none d-sm-block">Accept</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <script src="../../assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="../../assets/js/bootstrap.bundle.min.js"></script>
    
    <script src="../../assets/js/mazer.js"></script>


    <!-- Include Choices JavaScript -->
<script src="../../assets/vendors/choices.js/choices.min.js"></script>
<script src="../../assets/js/pages/form-element-select.js"></script>


</body>

</html>

