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
                        <br>
                        <?php
                        date_default_timezone_set("Asia/Jakarta");
                        $tanggal           = date("Y-m-d");

                        $select_cashback   = mysqli_query($mysqli,"SELECT u.*, c.* FROM user u, cashback c
                                                                   WHERE u.ID_USER = c.ID_USER
                                                                   AND u.ID_USER = '$iduser'
                                                                   AND c.KADALUWARSA > '$tanggal'");

                        $emoney            = mysqli_query($mysqli,"SELECT SUM(c.NOMINAL) AS EMONEY FROM user u, cashback c
                                                                   WHERE u.ID_USER = c.ID_USER
                                                                   AND u.ID_USER = '$iduser'
                                                                   AND c.KADALUWARSA > '$tanggal'");
                        $row_emoney        = $emoney->fetch_assoc();
                        $data_em           = $row_emoney['EMONEY'];

                        $class             = mysqli_query($mysqli, "SELECT p.*, b.* 
                                                        FROM program p, batch_program b
                                                        WHERE p.ID_PROGRAM = b.ID_PROGRAM
                                                        AND ID_BATCH = '$idbatch'");
                        $row_class         = $class->fetch_assoc();
                        $individu          = $row_class['INDIVIDU'];

                        $total             = $individu;
     
                        $default_em        = 0;
                        $harga_fix         = 0;
                        
                        if(mysqli_num_rows($select_cashback)>0){
                        $default_em        = 0;
                        ?>
                              <h6 >E-money AEEC yang Anda miliki : Rp. <?= number_format($data_em); ?>; </h6>
                              <h6 >Gunakan sekarang?</h6>
                              <form method="post" action="">
                              <button type="submit" class="btn btn-secondary" name="lain_kali">Lain kali</button>
                              <button type="submit" class="btn btn-warning" name="gunakan">Gunakan</button>
                              </form>
                        <?php
                        }
                        ?>
                        <br>                 
                        <?php
                        if(isset($_POST['gunakan'])){
                        $default_em = $data_em;
                        $total      = $total-$data_em;
                    
                        ?>
                            <table class="table table-bordered bg-white">
                            <thead>
                                <tr>
                                    <th>ID</th>    
                                    <th>Nama Program</th>
                                    <th>Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    foreach ($class as $data):
                                    echo '<tr>
                                            <td>'.$data['ID_BATCH'].'</td>
                                            <td>'.$data['NAMA_PROGRAM'].'</td>
                                            <td>'.'Rp. '.number_format($data['INDIVIDU']).'</td>
                                        </tr>';
                                    endforeach
                                ?>
                                <tr>
                                    <td colspan="2" class="text-right">Potongan E-money AEEC</td>
                                    <td><?= 'Rp. '.number_format($data_em) ?></td>
                                </tr>
                                <tr>
                                    <th colspan="2" class="text-right">TOTAL</th>
                                    <th><?= 'Rp. '.number_format($total) ?></th>
                                </tr>
                            </tbody>
                            </table>
                        <?php
                        $harga_fix=$total;
                        }else{
                            $default_em = 0;
                        ?>
                            <table class="table table-bordered bg-white">
                            <thead>
                                <tr>
                                    <th>ID</th>    
                                    <th>Nama Program</th>
                                    <th>Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
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
                                    <th><?= 'Rp. '.number_format($total) ?></th>
                                </tr>
                            </tbody>
                            </table>

                        <?php
                        $harga_fix=$total;
                        }
                        ?>

                        <form method="post" action="">
                        <div class="form-group">
                        <input type="hidden" value="<?= "$harga_fix"?>" name= "harga_fix" required>
                        <input type="hidden" value="<?= "$default_em"?>" name= "default_em" required>
                        </div>
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

            $fix       = $_POST['harga_fix'];
            $default   = $_POST['default_em'];
            $id_client = $ambil_data['ID_CLIENT'];

            //insert pendaftaran
            $pendaftaran    = mysqli_query($mysqli, "INSERT INTO pendaftaran (ID_BATCH, ID_CLIENT, TAGIHAN, TGL_PENDAFTARAN, STATUS) 
                                                     VALUES ('$idbatch', '$id_client','$fix', '$tanggal', '0')"); 

            $select_daftar  = mysqli_query($mysqli,"SELECT ID_PENDAFTARAN FROM pendaftaran ORDER BY ID_PENDAFTARAN DESC LIMIT 1");          
            $row_daftar     = $select_daftar->fetch_assoc();
            $id_pendaftaran = $row_daftar['ID_PENDAFTARAN'];

            //insert histori 
            $insert_leader  = mysqli_query($mysqli, "INSERT INTO histori (ID_CLIENT, ID_PENDAFTARAN)
                                                     VALUE ('$id_client', '$id_pendaftaran')");

            //delete cashback
            if($default != 0){
                $delete_cashback  = mysqli_query($mysqli, "DELETE FROM cashback WHERE ID_USER = '$iduser'");
            }
             

            
            
            echo "<script> 
                alert('Pendaftaran Berhasil');
                document.location.href = '../pendaftaran/pendaftaran.php';
                </script>";
            
        }
        
        if(isset($_POST['cancel'])){
            $id_client = $ambil_data['ID_CLIENT'];
            $cek = mysqli_query($mysqli,"SELECT * FROM histori WHERE ID_CLIENT = '$id_client'");

            if(mysqli_num_rows($cek) == 0){  
                $delete = mysqli_query($mysqli, "DELETE FROM client WHERE ID_CLIENT = '$id_client'");
                echo "<script>location='../dashboard/dashboard.php';</script>;";              
            }else{
                echo "<script>location='../dashboard/dashboard.php';</script>;";
            }

           
        }

?>