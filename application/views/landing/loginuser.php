<!DOCTYPE html>
<html lang="en">

<head>
   
  <?php $this->load->view('templates/head'); ?>
  
  
</head>

<body>
	
<header class="header-area">
    <?php $this->load->view('templates/header'); ?>
    </header>
<br><br><br><br><br><br><br>
	
<section><!--form-->
		<div class="container" >
			<div class="row justify-content-center">
				<div class="col-sm-4 col-sm-offset-2">
					<!--login form-->
					<div class="login-form" style="background-color: #F0F0E9;padding: 50px;">
						<h5 style="color: green;"><strong>LOGIN</strong></h5>
						<form action="<?php echo base_url('Landing_controller/login/login'); ?>" method="post">
							<input class="form-control" style="background-color: white;" type="email" placeholder="Email" name="email" required="required" />
							<input class="form-control" style="background-color: white;" type="password" placeholder="Password" name="password" required="required" />
							<span>
								<input style="background-color: white;" type="checkbox" class="checkbox" required="required"> 
								Biarkan tetap masuk
							</span>
                            <br><br>
							<button type="submit" class="btn btn-sm btn-success">Masuk</button>
						</form>
					</div><!--/login form-->
				</div>

                <div class="col-sm-1 col-sm-offset-3">
                    <h5 class="or"></h5>
                </div>
			
				<div class="col-sm-4">
					<!--sign up form-->
					<div class="signup-form" style="background-color: #F0F0E9;padding: 50px;">
						<h5 style="color: green;"><strong>REGISTER</strong></h5>
						<form action="<?php echo base_url('Landing_controller/Login/register'); ?>" method="post">
							<input class="form-control" style="background-color: white;" type="text" placeholder="Nama" name="nama" />
							<input class="form-control" style="background-color: white;" type="email" placeholder="Alamat email" name="email">
							<input class="form-control" style="background-color: white;" type="number" placeholder="No telp" name="telp">
							<input class="form-control" style="background-color: white;" type="password" placeholder="Kata Sandi" name="password" /><br>
							<button type="submit" class="btn btn-sm btn-success">Daftar</button>
						</form><br>
					</div><!--/sign up form-->
				</div>
				<!-- button login admin -->
				<div class="col-md-5">
					<form method="post" action="<?php echo base_url('Owner_controller/A_login'); ?>">
						<button type="submit" class="btn btn-sm btn-success">Login Admin</button>
					</form>
				</div>
			</div>
		</div><br><br>
		
	</section><!--/form-->
	

	<!-- fungsi inputan hanya angka -->
	<script>
		                function hanyaAngka(evt) {
		                 var charCode = (evt.which) ? evt.which : event.keyCode
		                   if (charCode > 31 && (charCode < 48 || charCode > 57))
                        return false;
                        return true;
                      }
                    </script>


    <section id="footer" class="footer-area">
       <?php $this->load->view('templates/footer') ?>
    </section>
    
    <!--====== FOOTER PART ENDS ======-->
    
    <!--====== BACK TO TOP PART START ======-->
    
    <a href="#" class="back-to-top"><i class="lni-chevron-up"></i></a>
    
    <!--====== BACK TO TOP PART ENDS ======-->
    
    
    
    
    <?php $this->load->view('templates/foot') ?>

</body>
</html>

