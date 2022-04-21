<?php 
include_once 'header.php'; 

$program = query("SELECT * from program
join batch_program where program.ID_PROGRAM = batch_program.ID_PROGRAM and batch_program.STATUS = 1;");
?>
            <!-- HALAMAN UTAMA -->
            <div id="main-content">
                
<div class="page-heading">
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
                        echo " <br><h3>Selamat Sore !!";
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
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Layout Vertical Navbar</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title"><?= $_SESSION["user"]["NAMA"]; ?></h4>
            </div>
            <div class="card-body">
                
            <section class="wrapper">
                <div class="container-fostrap">
                    
                    <div class="content">
                        <div class="container">
                            <div class="row">
                            <?php foreach($program as $hasil) : ?>
                                <div class="col-xs-12 col-sm-4">
                                    <div class="card">
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
                                            <a href="pendaftaran/jenis.php?idprog=<?=$hasil['ID_PROGRAM'] ?>&idbatch=<?=$hasil['ID_BATCH'] ?>" class="btn btn-link btn-block">
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

<?php include 'footer.php'; ?>
