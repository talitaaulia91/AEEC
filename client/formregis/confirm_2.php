<?php 

require_once("../auth/auth.php"); 
require_once("../../config/database.php"); 

// Tangkap Data
$idprog = $_GET['idprog'];
$idbatch = $_GET['idbatch'];
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
                                <h3>Pendaftaran</h3>
                            </div>
                            <div class="col-12 col-md-6 order-md-2 order-first">
                                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                </nav>
                            </div>
                        </div>
                    </div>

                    <!-- CARD UNTUK FORM -->
    <section class="section">
        <div class="card" >
            <div class="card-body">             
                    <div class="card-content">
                        <div class="card-body">
                        

                    <div class="table-responsive">
                            <table class="table table-bordered" id="table1" width="100%" cellspacing="0">
                                <thead> 
                                    <tr>
                                        <th>No</th>
                                        <th>ID User</th>
                                        <th>Email</th>                
                                        <th>Kelengkapan data</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    
                                    $counter = 1;
                                    
                                    for($i = 0; $i < count($_SESSION['data']); $i++){ 
                                        // foreach ($_SESSION['data'] as $data):    
                                        $data_client = mysqli_query($mysqli, "SELECT * FROM  user  WHERE EMAIL ='".$_SESSION['data'][$i][0]."'");
                                        $user        = $data_client->fetch_assoc();

                                        
                                    ?>
                                    <tr>
                                        <!-- <?php
                                        var_dump($_SESSION['data'][$i][0])
                                        ?> -->
                                        <td><?php echo $counter; ?></td>
                                        <td><?php echo $user['ID_USER']; ?></td>
                                        <td><?php echo $user['EMAIL']; ?></td>
                                        <td>
                                        <a href="lengkapi_data.php?id=<?php echo $user['ID_USER']; ?>" class="btn btn-primary">Edit dan lengkapi</a>
                                        </td>          
                                    </tr>  
                                    <?php
                                $counter ++;
                                        // endforeach;
                                }
                                ?>                    
                                </tbody>                
                                </div>

                            </table>

                        </div>      



                        <table class="table table-bordered bg-white">
                        <thead>
                            <tr>
                                <th>ID</th>    
                                <th>Nama Program</th>
                                <th>Harga</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                    $class = mysqli_query($mysqli, "SELECT p.*, b.* 
                                                                  FROM program p, batch_program b
                                                                  WHERE p.ID_PROGRAM = b.ID_PROGRAM
                                                                  AND ID_BATCH = '$idbatch'");
                                    
                            
                                    foreach ($class as $data):
                                    echo '<tr>
                                            <td>'.$data['ID_BATCH'].'</td>
                                            <td>'.$data['NAMA_PROGRAM'].'</td>
                                            <td>'.'Rp. '.number_format($data['INDIVIDU']).'</td>
                                        </tr>';
                                endforeach
                            ?>
                            <tr>
                                <th colspan="2" class="text-right">TOTAL</th>
                                <th><?= 'Rp. '.number_format($data['INDIVIDU']) ?></th>
                            </tr>
                        </tbody>
                    </table>

                    <form method="post" action="">
                    <button type="submit" class="btn btn-danger" name="cancel">Cancel</button>
                    <button type="submit" class="btn btn-primary" name="daftar">Daftar</button>
                    </form>
                      
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




    <script src="../../assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="../../assets/js/bootstrap.bundle.min.js"></script>
    
    <script src="../../assets/js/mazer.js"></script>


    <!-- Include Choices JavaScript -->
<script src="../../assets/vendors/choices.js/choices.min.js"></script>
<script src="../../assets/js/pages/form-element-select.js"></script>


</body>

</html>


<?php
        
        if(isset($_POST['daftar'])){

            date_default_timezone_set("Asia/Jakarta");
            $tanggal   = date("Y-m-d");
            $id_client = $ambil_data['ID_CLIENT'];

            //insert pendaftaran
            $pendaftaran = mysqli_query($mysqli, "INSERT INTO pendaftaran (ID_BATCH, ID_CLIENT, TGL_PENDAFTARAN, STATUS) 
                                                  VALUES ('$idbatch', '$id_client', '$tanggal', '0')");
            
            echo "<script> 
                alert('Pendaftaran Berhasil');
                document.location.href = '../pendaftaran/pendaftaran.php';
                </script>";
            
        }
        
        if(isset($_POST['cancel'])){
            $id_client = $ambil_data['ID_CLIENT'];
            $cek = mysqli_query($mysqli,"SELECT * FROM pendaftaran WHERE ID_CLIENT = '$id_client'");

            if(mysqli_num_rows($cek) == 0){  
                $delete = mysqli_query($mysqli, "DELETE FROM client WHERE ID_CLIENT = '$id_client'");
                echo "<script>location='../dashboard/dashboard.php';</script>;";              
            }else{
                echo "<script>location='../dashboard/dashboard.php';</script>;";
            }

           
        }

?>