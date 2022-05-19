<?php 

require_once("../auth/auth.php"); 
require_once("../../config/database.php"); 

// Tangkap Data
$idprog    = $_GET['idprog'];
$idbatch   = $_GET['idbatch'];
$iduser    = $_SESSION["user"]["ID_USER"];
$iddiskon  = $_GET['iddiskon'];


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
                                        <th class="col-1">No</th>
                                        <th>ID User</th>
                                        <th>Email</th>                
                                        <th class="col-2">Kelengkapan data</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <tr>
                                        <td> 1 </td>
                                        <td> <?php echo $iduser; ?></td>
                                        <td> <?php echo $_SESSION['user']['EMAIL']; ?></td>
                                        <td>
                                        <font color="success"><b><i>data lengkap</i></b></font>
                                        </td>          
                                    </tr>  


                                    <?php
                                    $counter = 2;   
                                    $id_user = [];                          
                                    for($i = 0; $i < count($_SESSION['data']); $i++){   
                                        $data_client = mysqli_query($mysqli, "SELECT * FROM  user  WHERE EMAIL ='".$_SESSION['data'][$i][0]."'");
                                        $user        = $data_client->fetch_assoc();

                                        
                                    ?>
                                    <tr>
                                        <td><?php echo $counter; ?></td>
                                        <td><?php echo $user['ID_USER']; ?></td>
                                        <td><?php echo $user['EMAIL']; ?></td>
                                        <td>
                                            <?php
                                            $cek = mysqli_query($mysqli,"SELECT c.*, u.* FROM client c, user u 
                                                                         WHERE c.ID_USER = u.ID_USER
                                                                         AND u.EMAIL = '".$user['EMAIL']."'");
                                            
                                            if(mysqli_num_rows($cek) > 0){
                                            ?>
                                            <font color="success"><b><i>data lengkap</i></b></font>
                                            <?php array_push($id_user, $user['ID_USER']); ?>
                                            <?php
                                            }else{
                                            ?>
                                            <a href="lengkapi_data.php?email=<?php echo $user['EMAIL']; ?>&idprog=<?=$idprog?>&idbatch=<?=$idbatch?>&iddiskon=D02" class="btn btn-primary">Lengkapi data</a>
                                            <?php
                                            }
                                            ?>
                                        </td>          
                                    </tr>  
                                    <?php
                                $counter ++;
                                }
                                ?>                    
                                </tbody>                
                              </div>
                            </table>
                        </div>  
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

                        $jumlah_email      = count($_SESSION['data']);
                        $jumlah_client     = count($id_user);  

                        $select_diskon     = mysqli_query($mysqli,"SELECT * FROM DISKON WHERE ID_DISKON = '$iddiskon'");
                        $row_diskon        = $select_diskon->fetch_assoc();

                        $persentase1       = mysqli_query($mysqli, "SELECT cashback10 ('$idprog') AS CASHBACK");
                        $row_p1            = $persentase1->fetch_assoc();
                        $cs10              = $row_p1['CASHBACK'];

                        $cashback          = (($jumlah_email - ( $jumlah_client % 3))/3)*$cs10;


                        $class             = mysqli_query($mysqli, "SELECT p.*, b.* 
                                                        FROM program p, batch_program b
                                                        WHERE p.ID_PROGRAM = b.ID_PROGRAM
                                                        AND ID_BATCH = '$idbatch'");
                        $row_class         = $class->fetch_assoc();
                        $individu          = $row_class['INDIVIDU'];

                        $total             = $individu;

                        $persentase2       = mysqli_query($mysqli, "SELECT voucher5 ('$idprog') AS VOUCHER");
                        $row_p2            = $persentase2->fetch_assoc();
                        $vo5               = $row_p2['VOUCHER'];

                        for($i=0; $i<$jumlah_email; $i++){
                            $total         = $total + $vo5;
                        } 

                        $harga_fix   = 0;
                                                

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
                                    <th>Harga</th>
                                    <th>Jumlah</th>
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
                                            <td>'.($jumlah_email+1).'</td>
                                            <td>'.'Rp. '.number_format($data['INDIVIDU']*($jumlah_email+1)).'</td>
                                        </tr>';
                                    endforeach
                                ?>
                                <tr>
                                    <td colspan="4" class="text-right">Diskon 5% untuk <?=$jumlah_email?> peserta yang diajak</td>
                                    <td><?= 'Rp. '.number_format($jumlah_email*(5/100*$data['INDIVIDU'])) ?></td>
                                </tr>
                                <tr>
                                    <td colspan="4" class="text-right">Potongan E-money AEEC</td>
                                    <td><?= 'Rp. '.number_format($data_em) ?></td>
                                </tr>
                                <tr>
                                    <th colspan="4" class="text-right">TOTAL</th>
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
                                    <th>Harga</th>
                                    <th>Jumlah</th>
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
                                            <td>'.($jumlah_email+1).'</td>
                                            <td>'.'Rp. '.number_format($data['INDIVIDU']*($jumlah_email+1)).'</td>
                                        </tr>';
                                    endforeach
                                ?>
                                <tr>
                                    <td colspan="4" class="text-right">Diskon 5% untuk <?=$jumlah_email?> peserta yang diajak</td>
                                    <td><?= 'Rp. '.number_format($jumlah_email*(5/100*$data['INDIVIDU'])) ?></td>
                                </tr>
                                <tr>
                                    <th colspan="4" class="text-right">TOTAL</th>
                                    <th><?= 'Rp. '.number_format($total) ?></th>
                                </tr>
                            </tbody>
                            </table>

                        <?php
                        $harga_fix=$total;
                        }
                        ?>

                        <h6>Cashback yang akan Anda dapatkan : Rp. <?= number_format($cashback)?>; </h6>
                        <br></br>

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



        $select_client  = mysqli_query($mysqli, "SELECT * FROM client WHERE ID_USER = '$iduser'");
        $row_client     = $select_client->fetch_assoc();
        $id_client      = $row_client['ID_CLIENT'];

        
        if(isset($_POST['daftar'])){
            $fix       = $_POST['harga_fix'];
            $default   = $_POST['default_em'];

            if($jumlah_email != $jumlah_client){
                echo "<script>alert('Lengkapi data peserta!');</script>";
            }else{                
                //insert pendaftaran
                $pendaftaran    = mysqli_query($mysqli, "INSERT INTO pendaftaran (ID_BATCH, ID_CLIENT, ID_DISKON, TAGIHAN, TGL_PENDAFTARAN, STATUS) 
                                                         VALUES ('$idbatch', '$id_client','D02','$fix', '$tanggal', '0')");

                //ambil id pendaftaran
                $select_daftar  = mysqli_query($mysqli,"SELECT ID_PENDAFTARAN FROM pendaftaran ORDER BY ID_PENDAFTARAN DESC LIMIT 1");
                $row_daftar     = $select_daftar->fetch_assoc();
                $id_pendaftaran = $row_daftar['ID_PENDAFTARAN'];

                //insert histori leader
                $insert_leader  = mysqli_query($mysqli, "INSERT INTO histori (ID_CLIENT, ID_PENDAFTARAN)
                                                         VALUE ('$id_client', '$id_pendaftaran')");

                //insert histori member
                for($i = 0; $i < $jumlah_client; $i++){ 
                    $cek_client  = mysqli_query($mysqli,"SELECT c.* FROM client c, user u 
                                                         WHERE c.ID_USER = u.ID_USER
                                                         AND u.EMAIL = '".$_SESSION['data'][$i][0]."'");
                    $row_cl      = $cek_client->fetch_assoc();

                    $insert_hs   = mysqli_query($mysqli,"INSERT INTO histori (ID_CLIENT, ID_PENDAFTARAN)
                                                         VALUES ('".$row_cl['ID_CLIENT']."', '$id_pendaftaran')");
                }

                //delete cashback
                if($default != 0){
                   $delete_cashback  = mysqli_query($mysqli, "DELETE FROM cashback WHERE ID_USER = '$iduser'");
                }

                //insert cashback
                $kadaluarsa      = date('Y-m-d', strtotime('+30 days', strtotime($tanggal)));
                $insert_cashback = mysqli_query($mysqli,"INSERT INTO cashback (ID_USER, NOMINAL, KADALUWARSA)
                                                         VALUES ('$iduser', '$cashback','$kadaluarsa')");

               

                echo "<script> 
                    alert('Pendaftaran Berhasil');
                    document.location.href = '../pendaftaran/pendaftaran.php';
                    </script>";
            }          
        }



        
        if(isset($_POST['cancel'])){
            $cek = mysqli_query($mysqli,"SELECT * FROM histori WHERE ID_CLIENT = '$id_client'");

            if(mysqli_num_rows($cek) == 0){  
                $delete_leader = mysqli_query($mysqli, "DELETE FROM client WHERE ID_CLIENT = '$id_client'");       
            }

           

            for($i = 0; $i < $jumlah_client; $i++){ 
                $cek_cl2     = mysqli_query($mysqli,"SELECT c.* FROM client c, user u 
                                                     WHERE c.ID_USER = u.ID_USER
                                                     AND u.EMAIL = '".$_SESSION['data'][$i][0]."'");

                $row_cl2      = $cek_cl2->fetch_assoc();

                $cek_cl3      = mysqli_query($mysqli,"SELECT * FROM histori 
                                                     WHERE ID_CLIENT = '".$row_cl2['ID_CLIENT']."'");

                if(mysqli_num_rows($cek_cl3) == 0){
                $delete_member = mysqli_query($mysqli, "DELETE FROM CLIENT 
                                                        WHERE ID_CLIENT =  '".$row_cl2['ID_CLIENT']."'");
                }
            }
                echo "<script>location='../dashboard/dashboard.php';</script>;";
            

           
        }

?>