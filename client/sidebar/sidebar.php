<body>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
            <div class="sidebar-header ">
        <div class="d-flex justify-content-between">
               <img src="../../assets/images/logo/aeec.png" style="width: 200px; height: 60px;"  alt="Logo" srcset="">       
            <div class="toggler">
                <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
            </div>
        </div>
    </div>
    <div class="sidebar-menu">
        <ul class="menu">
            <li class="sidebar-title">Menu</li>
            
            <li
                class="sidebar-item <?= !!strpos($_SERVER['REQUEST_URI'], 'profile') ? 'active' : '' ?> ">
                <a href="../profile/profile.php" class='sidebar-link'>
                    <i class="bi bi-person-badge-fill"></i>
                    <span>Profile</span>
                </a>
            </li>

            <li
                class="sidebar-item  has-sub ">
                <a href="#" class='sidebar-link '>
                    <i class="bi bi-grid-1x2-fill"></i>
                    <span>Program</span>
                </a>
                <ul class="submenu ">
                    <li class="submenu-item  <?= !!strpos($_SERVER['REQUEST_URI'], 'regular') ? 'active' : '' ?>">
                        <a href="../dashboard/regular.php">Regular Class</a>
                    </li>
                    <li class="submenu-item  <?= !!strpos($_SERVER['REQUEST_URI'], 'in-house') ? 'active' : '' ?>">
                        <a href="../dashboard/in-house.php">In-House Training</a>
                    </li>
           
                    <li class="submenu-item <?= !!strpos($_SERVER['REQUEST_URI'], 'non-reg') ? 'active' : '' ?>">
                        <a href="../dashboard/non-reg.php">Non-Regular Class</a>
                    </li>
                    
                </ul>
            </li>

            <li
                class="sidebar-item <?= !!strpos($_SERVER['REQUEST_URI'], 'transaksi') ? 'active' : '' ?> ">
                <a href="../transaksi/pendaftaran.php" class='sidebar-link'>
                    <i class="bi bi-grid-fill"></i>
                    <span>Pendaftaran</span>
                </a>
            </li>

            <li
                class="sidebar-item <?= !!strpos($_SERVER['REQUEST_URI'], 'list') ? 'active' : '' ?> ">
                <a href="../program_aktif/list.php" class='sidebar-link'>
                    <i class="bi bi-grid-fill"></i>
                    <span>Program Aktif</span>
                </a>
            </li>

            <li
                class="sidebar-item <?= !!strpos($_SERVER['REQUEST_URI'], 'history') ? 'active' : '' ?> ">
                <a href="../riwayat/program.php" class='sidebar-link'>
                    <i class="bi bi-grid-fill"></i>
                    <span>Histori Program</span>
                </a>
            </li>

            <li
                class="sidebar-item <?= !!strpos($_SERVER['REQUEST_URI'], 'pembayaran') ? 'active' : '' ?> ">
                <a href="../histori_pembayaran/pembayaran.php" class='sidebar-link'>
                    <i class="bi bi-grid-fill"></i>
                    <span>Riwayat Pembayaran</span>
                </a>
            </li>

            <br></br>   
            <br></br>  
            <br></br>  
            
   


            <li  class="sidebar-item mt-3">
                <center>                
                <a href="../auth/logout.php" class="btn btn-danger" style="width: 200px; height: 40px;">LOGOUT</a>
                </center>

            </li>
            
            
        </ul>
    </div>
    <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
</div>
        </div>
        <div id="main" class='layout-navbar'>
            <!-- <header class='mb-3'>
                <nav class="navbar navbar-expand navbar-light ">
                    <div class="container-fluid">
                        <a href="#" class="burger-btn d-block">
                            <i class="bi bi-justify fs-3"></i>
                        </a>

                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                                <li class="nav-item dropdown me-1">
                                    <a class="nav-link active dropdown-toggle text-gray-600" href="#" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        <i class='bi bi-envelope bi-sub fs-4'></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                                        <li>
                                            <h6 class="dropdown-header">Mail</h6>
                                        </li>
                                        <li><a class="dropdown-item" href="#">No new mail</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item dropdown me-3">
                                    <a class="nav-link active dropdown-toggle text-gray-600" href="#" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        <i class='bi bi-bell bi-sub fs-4'></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                                        <li>
                                            <h6 class="dropdown-header">Notifications</h6>
                                        </li>
                                        <li><a class="dropdown-item">No notification available</a></li>
                                    </ul>
                                </li>
                            </ul>
                            <div class="dropdown">
                                <a href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                    <div class="user-menu d-flex">
                                        <div class="user-name text-end me-3">
                                            <h6 class="mb-0 text-gray-600">John Ducky</h6>
                                            <p class="mb-0 text-sm text-gray-600">Administrator</p>
                                        </div>
                                        <div class="user-img d-flex align-items-center">
                                            <div class="avatar avatar-md">
                                                <img src="../../assets/images/faces/1.jpg">
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton" style="min-width: 11rem;">
                                    <li>
                                        <h6 class="dropdown-header">Hello, John!</h6>
                                    </li>
                                    <li><a class="dropdown-item" href="#"><i class="icon-mid bi bi-person me-2"></i> My
                                            Profile</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="icon-mid bi bi-gear me-2"></i>
                                            Settings</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="icon-mid bi bi-wallet me-2"></i>
                                            Wallet</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="../auth/logout.php"><i
                                                class="icon-mid bi bi-box-arrow-left me-2"></i> Logout</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </nav>
            </header>

 -->
