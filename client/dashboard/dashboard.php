<?php 
require_once("../auth/auth.php"); 
require '../method.php';
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
    <style>
        .wrapper {
  display: table;
  height: 100%;
  width: 100%;
}

.container-fostrap {
  display: table-cell;
  padding: 1em;
  text-align: center;
  vertical-align: middle;
}
.fostrap-logo {
  width: 100px;
  margin-bottom:15px
}
h1.heading {
  color: #fff;
  font-size: 1.15em;
  font-weight: 900;
  margin: 0 0 0.5em;
  color: #505050;
}
@media (min-width: 450px) {
  h1.heading {
    font-size: 3.55em;
  }
}
@media (min-width: 760px) {
  h1.heading {
    font-size: 3.05em;
  }
}
@media (min-width: 900px) {
  h1.heading {
    font-size: 3.25em;
    margin: 0 0 0.3em;
  }
} 
.card {
  display: block; 
    margin-bottom: 20px;
    line-height: 1.42857143;
    background-color: #fff;
    border-radius: 2px;
    box-shadow: 0 2px 5px 0 rgba(0,0,0,0.16),0 2px 10px 0 rgba(0,0,0,0.12); 
    transition: box-shadow .25s; 
}
.card:hover {
  box-shadow: 0 8px 17px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
}
.img-card {
  width: 100%;
  height:200px;
  border-top-left-radius:2px;
  border-top-right-radius:2px;
  display:block;
    overflow: hidden;
}
.img-card img{
  width: 100%;
  height: 200px;
  object-fit:cover; 
  transition: all .25s ease;
} 
.card-content {
  padding:15px;
  text-align:left;
}
.card-title {
  margin-top:0px;
  font-weight: 700;
  font-size: 1.65em;
}
.card-title a {
  color: #000;
  text-decoration: none !important;
}
.card-read-more {
  border-top: 1px solid #D4D4D4;
}
.card-read-more a {
  text-decoration: none !important;
  padding:10px;
  font-weight:600;
  text-transform: uppercase
}
    </style>
</head>
<!-- BAGIAN SIDEBAR -->
<?php include_once('../sidebar/sidebar.php'); ?>


<!-- BAGIAN UTAMA CODING [MULAI main-content] -->
<?php 

$program = query("SELECT * from program
join batch_program where program.ID_PROGRAM = batch_program.ID_PROGRAM and batch_program.STATUS = 1;");
?>
            <!-- HALAMAN UTAMA -->
            <div id="main-content">
                
<div class="page-heading mt-0">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <!-- <h3>Vertical Layout with Navbar</h3> -->
                <?php 
                    date_default_timezone_set("Asia/Jakarta");
                    $a = date ("H");
                    if (($a>=6) && ($a<=11)) {
                        echo " <br><h3>Selamat Pagi !! </h3>";
                    }else if(($a>=11) && ($a<=15)){
                        echo " <br> <h3>Selamat  Siang !!</h3> ";
                    }elseif(($a>15) && ($a<=18)){
                        echo " <br><h3>Selamat Sore !! </h3>";
                    }else{
                        echo " <br><h3> Selamat Malam </h3>";
                    }
                    $tanggal = mktime(date('m'), date("d"), date('Y'));
                    echo "Tanggal : <b> " . date("d-m-Y", $tanggal ) . "</b>";
                    
                    $jam = date ("H:i:s");
                    echo " | Pukul : <b> " . $jam . " " ." </b> ";
                ?>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title"> <?= $_SESSION["user"]["NAMA"]; ?> </h4>
            
                <!-- NAVBAR 2 -->
                <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: blue; ">
                <div class="container-fluid" >
                    <!-- <a class="navbar-brand" href="#">Navbar</a> -->
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-link active" aria-current="page" href="#">Regular Class</a>
                        <a class="nav-link" href="#">In-House Training</a>
                        <a class="nav-link" href="#">C-Suite Connection</a>
                        <a class="nav-link" href="#">Non-Regular Class</a>
                        <!-- <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a> -->
                    </div>
                    </div>
                </div>
                </nav>
            
            
            </div>
            <div class="card-body">
                
            <section class="wrapper">
                <div class="container-fostrap">
                    
                    <div class="content">
                        <div class="container">
                            <div class="row">
                            <?php foreach($program as $hasil) : ?>
                                <div class="col-xs-12 col-sm-4">
                                    <div class="card" >
                                        <a class="img-card" href="">
                                        <img src="../assets/program/aeec1.jpg" />
                                    </a>
                                        <div class="card-content">
                                            <h4 class="card-title">
                                                <a href=""> <?= $hasil['NAMA_PROGRAM']?>
                                            </a>
                                            </h4>
                                            <p class="">
                                            FINANCE ACCOUNTING FOR NON-FINANCIAL MANAGER
                                            </p>
                                        </div>
                                        <div class="card-read-more">
                                            <!-- <a href="../formregis/jenisdaftar.php?idprog=<?=$hasil['ID_PROGRAM'] ?>&idbatch=<?=$hasil['ID_BATCH'] ?>" class="btn btn-link btn-block">
                                                DAFTAR
                                            </a> -->
                                            <a href="../program/detail.php?idprog=<?=$hasil['ID_PROGRAM'] ?>&idbatch=<?=$hasil['ID_BATCH'] ?>" class="btn btn-link btn-block">
                                                DAFTAR
                                            </a>
                                        
                                        </div>
                                    </div>
                                </div>
                                

                                <?php endforeach; ?>
                                <div class="col-xs-12 col-sm-4">
                                    <div class="card">
                                        <a class="img-card" href="">
                                        <img src="../assets/program/aeec2.jpg" />
                                    </a>
                                        <div class="card-content">
                                            <h4 class="card-title">
                                                <a href=""> FINANCE ACCOUNTING FOR NON-FINANCIAL MANAGER
                                            </a>
                                            </h4>
                                            <p class="">
                                            FINANCE ACCOUNTING FOR NON-FINANCIAL MANAGER
                                            </p>
                                        </div>
                                        <div class="card-read-more">
                                            <a href="" class="btn btn-link btn-block">
                                                DAFTAR
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-4">
                                    <div class="card">
                                        <a class="img-card" href="">
                                        <img src="../assets/program/aeec2.jpg" />
                                    </a>
                                        <div class="card-content">
                                            <h4 class="card-title">
                                                <a href=""> FINANCE ACCOUNTING FOR NON-FINANCIAL MANAGER
                                            </a>
                                            </h4>
                                            <p class="">
                                            FINANCE ACCOUNTING FOR NON-FINANCIAL MANAGER
                                            </p>
                                        </div>
                                        <div class="card-read-more">
                                            <a href="" class="btn btn-link btn-block">
                                                DAFTAR
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-4">
                                    <div class="card">
                                        <a class="img-card" href="">
                                        <img src="../assets/program/aeec3.jpg" />
                                    </a>
                                        <div class="card-content">
                                            <h4 class="card-title">
                                                <a href="">FINANCE ACCOUNTING FOR NON-FINANCIAL MANAGER
                                            </a>
                                            </h4>
                                            <p class="">
                                            FINANCE ACCOUNTING FOR NON-FINANCIAL MANAGER
                                            </p>
                                        </div>
                                        <div class="card-read-more">
                                            <a href="" class="btn btn-link btn-block">
                                                DAFTAR
                                            </a>
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
</body>

</html>