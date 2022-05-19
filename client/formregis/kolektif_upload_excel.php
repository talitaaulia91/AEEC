<?php 
require_once("../auth/auth.php"); 
require '../method.php';

$idprog    = $_GET['idprog'];
$idbatch   = $_GET['idbatch'];
$program = query("SELECT * FROM aeec.program where ID_PROGRAM = '$idprog'");
foreach($program as $hasil){
}

// untuk EXCEL
use Phppot\DataSource;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

require_once 'DataSource.php';
$db = new DataSource();
$conn = $db->getConnection();
require_once ('../../vendor/autoload.php');

if (isset($_POST["import"])) {

    // var_dump($_POST["import"]);
    // exit;
    $allowedFileType = [
        'application/vnd.ms-excel',
        'text/xls',
        'text/xlsx',
        'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
    ];

    if (in_array($_FILES["file"]["type"], $allowedFileType)) {

        $namafile= $_FILES['file']['name'];
        $tempat = $_FILES['file']['tmp_name'];
        //hanya boleh up Exce;
        $ekstensiboleh = ['xls', 'xlsx'];
        $ekstensiupload = explode('.', $namafile);
        $ekstensiupload = strtolower (end($ekstensiupload));

         //upload
        //Ganti NamaMh
        $namafotobaru= uniqid();
        $namafotobaru.= ".";
        $namafotobaru.=$ekstensiupload;

        // move_uploaded_file($tempat, '../../assets/excel/'.$namafotobaru);


        $targetPath = '../../assets/excel/' . $namafotobaru;
        move_uploaded_file($tempat, $targetPath);

        $Reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();

        $spreadSheet = $Reader->load($targetPath);
        $excelSheet = $spreadSheet->getActiveSheet();
        $spreadSheetAry = $excelSheet->toArray();
        $sheetCount = count($spreadSheetAry);
        // var_dump($sheetCount);
        // exit;
        if(count($spreadSheetAry) < 5){
            echo "<script> 
            alert('Data Yang Anda Masukkan Dalam Excel Kurang Dari dari 4 Peserta, Mohon Lengkapi Data !');
            document.location.href = 'kolektif_upload_excel.php?idprog=$idprog&idbatch=$idbatch';
            </script>";
            exit;
        }

        for ($i = 2; $i <= $sheetCount; $i ++) {
            $email = "";
            if (isset($spreadSheetAry[$i][0])) {
                $email = mysqli_real_escape_string($conn, $spreadSheetAry[$i][0]);
            }
            
            $pass = "";
            if (isset($spreadSheetAry[$i][1])) {
                $pass = mysqli_real_escape_string($conn, $spreadSheetAry[$i][1]);
            }
            $name = "";
            if (isset($spreadSheetAry[$i][2])) {
                $name = mysqli_real_escape_string($conn, $spreadSheetAry[$i][2]);
            }
            $jk = "";
            if (isset($spreadSheetAry[$i][3])) {
                $gender = strtolower (mysqli_real_escape_string($conn, $spreadSheetAry[$i][3]));
                if($gender == 'l'){
                    $jk = 0;
                }else if($gender == 'p'){
                    $jk = 1;
                }
            }
            $notelp = "";
            if (isset($spreadSheetAry[$i][4])) {
                $notelp = mysqli_real_escape_string($conn, $spreadSheetAry[$i][4]);
            }
            $npwp = "";
            if (isset($spreadSheetAry[$i][5])) {
                $npwp = mysqli_real_escape_string($conn, $spreadSheetAry[$i][5]);
            }
            $alamatnpwp = "";
            if (isset($spreadSheetAry[$i][6])) {
                $alamatnpwp = mysqli_real_escape_string($conn, $spreadSheetAry[$i][6]);
            }
            $alamatrumah = "";
            if (isset($spreadSheetAry[$i][7])) {
                $alamatrumah = mysqli_real_escape_string($conn, $spreadSheetAry[$i][7]);
            }
            $instansi = "";
            if (isset($spreadSheetAry[$i][8])) {
                $instansi = mysqli_real_escape_string($conn, $spreadSheetAry[$i][8]);
            }
            $jabatan = "";
            if (isset($spreadSheetAry[$i][9])) {
                $jabatan = mysqli_real_escape_string($conn, $spreadSheetAry[$i][9]);
            }
            
            $alumni = "";
            if (isset($spreadSheetAry[$i][10])) {
                $al = strtolower (mysqli_real_escape_string($conn, $spreadSheetAry[$i][10]));
                if($al == 'tidak'){
                    $alumni = 0;
                }else if($al == 'ya'){
                    $alumni = 1;
                }
            }
            

            
            
            if (!empty($name)) {
                
                $password = password_hash($pass, PASSWORD_DEFAULT);
                $queri = "INSERT INTO `aeec`.`user` (`EMAIL`, `PASSWORD`, `ROLE`) VALUES ('$email', '$password', 'user')";
                $hasil = mysqli_query($conn, $queri);

                //ambil id_user
                $id         = mysqli_query($conn,"SELECT ID_USER FROM user ORDER BY ID_USER DESC LIMIT 1");
                $row_id     = $id->fetch_assoc();
                $id_user = $row_id['ID_USER'];

                $query = "INSERT INTO client (`ID_USER`, `NAMA`, `JK`, `NO_TELP`, `NPWP`, `ALAMAT_NPWP`, `ALAMAT_RUMAH`, `INSTANSI`,`JABATAN`, `ALUMNI`) 
                VALUES('$id_user','$name','$jk','$notelp','$npwp','$alamatnpwp','$alamatrumah','$instansi','$jabatan', '$alumni')";
                $paramType = "ssssssssss";
                $jumlahInput = $sheetCount -2;

                $paramArray = array(
                    $name,
                    $jk,
                    $notelp,
                    $npwp,
                    $alamatnpwp,
                    $alamatrumah,
                    $instansi,
                    $jabatan,
                    $alumni
                );
                // $insertId = $db->insert($query, $paramType, $paramArray);
                // $query = "insert into tbl_info(name,description) values('" . $name . "','" . $description . "')";
                $result = mysqli_query($conn, $query);

                // if (! empty($insertId)) {
                    
                if($result = true){
                    $type = "success";
                    $message = "Data Berhasil Dimasukkan";

                    echo"<script>location='kolektif_tampil_excel.php?idprog=$idprog&idbatch=$idbatch&jenis=$type&pesan=$message&jumlah=$jumlahInput'</script>";
                } else {
                    $type = "error";
                    $message = "Data Gagal Dimasukkan";
                }
            }
            // else if(empty($name)) {
            //     $type = "error";
            //     $message = "Data Gagal Dimasukkan Ada Data Yang Kosong";
            // }
        }
    } else {
        $type = "error";
        $message = "Invalid Tipe File. Upload File Excel Sesuai Template.";
    }

    
}

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
                            <div class="col-12 col-md-6 order-md-1 order-last">
                                <h3>Pendaftaran</h3>
                            </div>
                            <div class="col-12 col-md-6 order-md-2 order-first">
                                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.html">Pendaftaran</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Kolektif</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>

            <!-- CARD UNTUK FORM -->
            <section class="section">
                <div class="card" >
                    <div class="card-header">
                        <h4><?= $hasil['NAMA_PROGRAM'] ?><h4>
                    </div>
                    <div class="card-body">
                        <div class="card">
                            <div class="card-header">
                        <h4 class="card-title">Mohon Isi File dengan Data yang Sudah Benar</h4>
                        <p> Template File : <a href="../../assets/template/kolektif.xlsx"><i class="bi bi-file-arrow-down-fill fs-4"></i></a> </p>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form form-vertical " method="post" action=""  enctype="multipart/form-data" name="frmExcelImport" id="frmExcelImport">
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="mb-3">
                                                <label for="formFile" class="form-label">Berkas Pendaftaran</label>
                                                <input class="form-control"  required  type="file" name="file" id="file" accept=".xls,.xlsx">
                                            </div>
                                        </div>
                                                                                
                                        <div class="col-12 d-flex justify-content-end">
                                            <button class="btn btn-primary me-1 mb-1" type="submit" id="submit" name="import">Submit</button>
                                            <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div id="response" class="<?php if(!empty($type)) { echo $type . " display-block"; } ?>"><?php if(!empty($message)) { echo $message; } ?></div>
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

