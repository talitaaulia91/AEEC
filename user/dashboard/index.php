<?php 
include_once 'header.php'; 

?>
            <!-- HALAMAN UTAMA -->
            <div id="main-content">
                
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <!-- <h3>Vertical Layout with Navbar</h3> -->
                <?php 

                    $a = date ("H");
                    if (($a>=6) && ($a<=11)) {
                        echo " <br><h3>Selamat Pagi !! </h3>";
                    }else if(($a>=11) && ($a<=15)){
                        echo " <br> Selamat  Siang !! ";
                    }elseif(($a>15) && ($a<=18)){
                        echo " <br><h3>Selamat Sore !!";
                    }else{
                        echo " <br><h3> Selamat Malam </h3>";
                    }
                    $tanggal = mktime(date('m'), date("d"), date('Y'));
                    echo "Tanggal : <b> " . date("d-m-Y", $tanggal ) . "</b>";
                    date_default_timezone_set("Asia/Jakarta");
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
                <h4 class="card-title">Nama Client</h4>
            </div>
            <div class="card-body">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur quas omnis laudantium tempore
                exercitationem, expedita aspernatur sed officia asperiores unde tempora maxime odio reprehenderit
                distinctio incidunt! Vel aspernatur dicta consequatur!
            </div>
        </div>
    </section>
</div>

<?php include 'footer.php'; ?>
