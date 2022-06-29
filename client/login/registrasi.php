
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Registrasi</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="../../assets/csslogin/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../assets/csslogin/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../assets/csslogin/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../assets/csslogin/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../assets/csslogin/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="../../assets/csslogin/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../assets/csslogin/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../assets/csslogin/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="../../assets/csslogin/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../assets/csslogin/css/util.css">
	<link rel="stylesheet" type="text/css" href="../../assets/csslogin/css/main.css">
<!--===============================================================================================-->

<!-- CSS MODAL -->
<link rel="stylesheet" href="../../assets/css/bootstrap.css">
<link rel="stylesheet" href="../../assets/css/app.css">
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('../../assets/background/background.jpg');">
			<div class="wrap-login100 p-t-30 p-b-50">
				<span class="login100-form-title p-b-41">
					Buat Akun
				</span>
				<div class="login100-form validate-form p-b-33 p-t-5 ">
				<form  action="auth.php" method="POST" enctype="multipart/form-data">

					<div class="wrap-input100 validate-input" data-validate = "Masukkan Email">
						<input class="input100" type="text" name="email" placeholder="email">
						<span class="focus-input100" data-placeholder="&#xe82a;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Masukkan Password">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100" data-placeholder="&#xe80f;"></span>
					</div>
                    <div class="wrap-input100 validate-input" data-validate="Masukkan Password ">
						<input class="input100" type="password" name="password2" placeholder="Konfirmasi Password">
						<span class="focus-input100" data-placeholder="&#xe80f;"></span>
					</div>

					<div class="container-login100-form-btn m-t-32">
						<!-- <button class="login100-form-btn" name="regis" type="submit">
							Daftar
						</button> -->
						<button type="button" class="login100-form-btn" data-bs-toggle="modal"
							data-bs-target="#primary">
							Daftar
						</button>
					</div>

					
					
				
					<!-- Sudah Punya Akun ? <a href="login.php" >Login</a> -->
					<h6 class="mt-3 "><center>Sudah Punya Akun ? 
						<a href="login.php" >
							<font color="blue"><b>Login</b></font>
						</a>
					</center></h6>
				</div>
				
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>

	<!-- MODAL CHECKLIST -->
				<!--primary theme Modal -->
				<div class="modal text-left" id="primary" tabindex="-1" role="dialog"
					aria-labelledby="myModalLabel160" aria-hidden="true">
					<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
						role="document">
						<div class="modal-content">
							<div class="modal-header bg-primary">
								<h5 class="modal-title white" id="myModalLabel160">Konfirmasi Registrasi
								</h5>
								<button type="button" class="close" data-bs-dismiss="modal"
									aria-label="Close">
									<i data-feather="x"></i>
								</button>
							</div>
							<div class="modal-body">
								<p>Pilih jika berkenan
								</p>
								<ul class="list-group">
									<li class="list-group-item d-flex justify-content-between align-items-center">
										<span> Saya bersedia menerima email dari Airlangga Executive Education Center mengenai 
											berbagai pembaruan dan penawaran khusus AEEC UNAIR.</span>
											<div class="custom-control custom-checkbox">
												<input type="checkbox"
													class="form-check-input form-check-primary form-check-glow" 
													name="check_email" id="customColorCheck1">
                                        	</div>
									</li>

									<li class="list-group-item d-flex justify-content-between align-items-center">
										<span> Saya bersedia berlangganan newsletter dari Airlangga Executive Education Center</span>
											<div class="custom-control custom-checkbox">
											<input type="checkbox"
													class="form-check-input form-check-primary form-check-glow" 
													name="check_news" id="customColorCheck1">
                                        	</div>
									</li>
									
								</ul>

							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-light-secondary"
									data-bs-dismiss="modal">
									<i class="bx bx-x d-block d-sm-none"></i>
									<span class="d-none d-sm-block">Tutup</span>
								</button>
								<button  name="regis" type="submit" class="btn btn-primary ml-1">
									<i class="bx bx-check d-block d-sm-none"></i>
									<span class="d-none d-sm-block">Daftar</span>
								</button>
							</div>
						</div>
					</div>
				</div>
					<!-- END MODAL -->
			</form>
<!--===============================================================================================-->
	<script src="../../assets/csslogin/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="../../assets/csslogin/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="../../assets/csslogin/vendor/bootstrap/js/popper.js"></script>
	<script src="../../assets/csslogin/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="../../assets/csslogin/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="../../assets/csslogin/vendor/daterangepicker/moment.min.js"></script>
	<script src="../../assets/csslogin/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="../../assets/csslogin/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="../../assets/csslogin/js/main.js"></script>

	<!-- JS MODAL -->
	<script src="../../assets/js/bootstrap.bundle.min.js"></script>
    
    <script src="../../assets/js/mazer.js"></script>

</body>
</html>