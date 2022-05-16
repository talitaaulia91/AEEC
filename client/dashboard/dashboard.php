<?php
//Cek Login
require_once("../auth/auth.php"); 

require '../method.php';
?>

<!-- BAGIAN HEADER -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AEEC || DASHBOARD</title>
    
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../assets/css/bootstrap.css">
    
    <link rel="stylesheet" href="../../assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="../../assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="../../assets/css/app.css">
    <link rel="shortcut icon" href="../../assets/images/favicon.svg" type="image/x-icon">
    <style>
/* TAB CSS */

.wrapper{
  /* max-width: 700px; */
  width: 100%;
  margin: 50px auto;
  padding: 25px 30px 30px 30px;
  border-radius: 5px;
  background: #fff;
  box-shadow: 0px 10px 15px rgba(0,0,0,0.1);
}
.wrapper header{
  font-size: 30px;
  font-weight: 600;
  padding-bottom: 20px;
}
.wrapper nav{
  position: relative;
  width: 100%;
  height: 50px;
  display: flex;
  align-items: center;
}
.wrapper nav label{
  display: block;
  height: 100%;
  width: 100%;
  text-align: center;
  line-height: 50px;
  cursor: pointer;
  position: relative;
  z-index: 1;
  color: #17a2b8;
  font-size: 14px;
  border-radius: 5px;
  margin: 0 5px;
  transition: all 0.3s ease;
}
.wrapper nav label:hover{
  background: rgba(23,162,184,0.3);
}
#home:checked ~ nav label.home,
#blog:checked ~ nav label.blog,
#code:checked ~ nav label.code,
#help:checked ~ nav label.help,
  #about:checked ~ nav label.about{
  color: #fff;
}
nav label i{
  padding-right: 7px;
}
nav .slider{
  position: absolute;
  height: 100%;
  width: 20%;
  left: 0;
  bottom: 0;
  z-index: 0;
  border-radius: 5px;
  background: #17a2b8;
  transition: all 0.3s ease;
}
input[type="radio"]{
  display: none;
}
#blog:checked ~ nav .slider{
  left: 20%;
}
#code:checked ~ nav .slider{
  left: 40%;
}
#help:checked ~ nav .slider{
  left: 60%;
}
#about:checked ~ nav .slider{
  left: 80%;
}
section .content{
  display: none;
  background: #fff;
}
#home:checked ~ section .content-1,
#blog:checked ~ section .content-2,
#code:checked ~ section .content-3,
#help:checked ~ section .content-4,
#about:checked ~ section .content-5{
  display: block;
}
section .content .title{
  font-size: 21px;
  font-weight: 500;
  margin: 30px 0 10px 0;
}
section .content p{
text-align: justify;
}
/* END TAB CSS */

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
}
/* .card:hover {
  box-shadow: 0 8px 17px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
} */
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

$reguler = query("SELECT p.*, b.* 
                FROM batch_program b, program p
                WHERE  p.ID_PROGRAM = b.ID_PROGRAM
                AND p.ID_KATEGORI = 'RC'
                AND b.STATUS = '1';");
?>
            <!-- HALAMAN UTAMA -->
            <div id="main-content">
                
<div class="page-heading mt-0">
    <div class="page-title">
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
    </div>
    <section class="section">
        <div class="card">          
            <div class="wrapper">
    <header>Program yang Tersedia</header>
    <input type="radio" name="slider" checked id="home">
    <input type="radio" name="slider" id="blog">
    <input type="radio" name="slider" id="code">
    <input type="radio" name="slider" id="help">
    <input type="radio" name="slider" id="about">
    <nav>
        <label for="home" class="home"><i class="fas fa-home"></i>Regular Class</label>
        <label for="blog" class="blog"><i class="fas fa-blog"></i>In-House Training</label>
        <label for="code" class="code"><i class="fas fa-code"></i>C-Suite Connection</label>
        <label for="help" class="help"><i class="far fa-envelope"></i>Non-Regular Class</label>
        <label for="about" class="about"><i class="far fa-user"></i>Program Lain ..</label>
        <div class="slider"></div>
    </nav>
    <section>


    <div class="content content-1">
    
        <!-- ISI CARD -->
            <div class="container" style="margin:30px auto">
                <div class="row">
                <?php foreach($reguler as $hasil) : ?>
                    <div class="col-xs-12 col-sm-4" >
                        <div class="card" >
                            <a class="img-card" href="">
                            <img src="../../assets/images/program/<?php echo $hasil['IMAGE'];?>" />
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
                            <center>                
                            <a href="../formregis/jenisdaftar.php?idprog=<?=$hasil['ID_PROGRAM'] ?>&idbatch=<?=$hasil['ID_BATCH'] ?>" class="btn btn-primary" style="width: 320px; height: 40px;">DAFTAR</a>
                            </center>
                        </div>
                </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <!-- END ISI CARD -->
    </div>

    <!-- IN HOUSE -->
    <div class="content content-2">
    
     <!-- ISI CARD -->
     <div class="container" style="margin:30px auto">
                <div class="row">
                
                    <div class="col-xs-12 col-sm-4" >
                        <div class="card" >
                            <a class="img-card" href="">
                            <img src="../../assets/images/program/" />
                        </a>
                            <div class="card-content">
                                <h4 class="card-title">
                                    <a href=""> NANTI BUAT IN HOUSE 
                                </a>
                                </h4>
                                <p class="">
                                Baru Prototype
                                </p>
                            </div>
                            <div class="card-read-more a" style="height:50px;">
                                <a href="../formregis/jenisdaftar.php?idprog=<?=$hasil['ID_PROGRAM'] ?>&idbatch=<?=$hasil['ID_BATCH'] ?>" class="btn btn-link btn-block">
                                    DAFTAR
                                </a>
                            </div>
                        </div>
                </div>

            </div>
            <!-- END ISI CARD -->

    </div>



      <div class="content content-3">
        <div class="title">This is a Code content</div>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iure, debitis nesciunt! Consectetur officiis, libero nobis dolorem pariatur quisquam temporibus. Labore quaerat neque facere itaque laudantium odit veniam consectetur numquam delectus aspernatur, perferendis repellat illo sequi excepturi quos ipsam aliquid est consequuntur.</p>
      </div>
      <div class="content content-4">
        <div class="title">This is a Help content</div>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Enim reprehenderit null itaq, odio repellat asperiores vel voluptatem magnam praesentium, eveniet iure ab facere officiis. Quod sequi vel, rem quam provident soluta nihil, eos. Illo oditu omnis cumque praesentium voluptate maxime voluptatibus facilis nulla ipsam quidem mollitia! Veniam, fuga, possimus. Commodi, fugiat aut ut quorioms stu necessitatibus, cumque laborum rem provident tenetur.</p>
      </div>
      <div class="content content-5">
        <div class="title">This is a About content</div>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur officia sequi aliquam. Voluptatem distinctio nemo culpa veritatis nostrum fugit rem adipisci ea ipsam, non veniam ut aspernatur aperiam assumenda quis esse soluta vitae, placeat quasi. Iste dolorum asperiores hic impedit nesciunt atqu, officia magnam commodi iusto aliquid eaque, libero.</p>
      </div>
    </section>
  </div>

            <!-- end coba -->

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