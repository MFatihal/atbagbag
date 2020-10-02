<!doctype html>
<html lang="en">

<head>

	<?php $this->load->view('templates/head'); ?>


</head>


<header class="header-area">
	<?php $this->load->view('templates/header'); ?>
</header>
<!--====== HEADER PART ENDS ======-->

<body style="margin-top:200px;">
	<div class="colorlib-hero" style="margin-left:200px;">
		<div class="container">
			<div class="row row-pb-md">
				<div class="col-md-10 col-md-offset-1">
					<div class="process-wrap">
						<div class="process text-center active">
							<p><span>01</span></p>
							<h3>Shopping Cart</h3>
						</div>
						<div class="process text-center">
							<p><span>02</span></p>
							<h3>Checkout</h3>
						</div>
						<div class="process text-center">
							<p><span>03</span></p>
							<h3>Order Complete</h3>
						</div>
					</div>
				</div>
			</div>
			<br><br><br>
			<!-- TABEL -->
			
			<h5>PESANAN ANDA TELAH SELESAI, PESANAN ANDA AKAN SEGERA DIKIRIM. ANDA AKAN MENDAPAT PESAN MELALUI WHATSAPP APABILA PESANAN TELAH DIKIRIM</h5>
            <a href="<?php echo base_url('Transaksi'); ?>"><button type="button" value="batal" class="btn btn-primary">Kembali</button></a>
			<!-- FORM UNTUK PENGISIAN DATA -->
			
			<!--/register-req-->


			
		</div>

		<!--====== FOOTER PART START ======-->

		<section id="footer" class="footer-area">
			<?php $this->load->view('templates/footer') ?>
		</section>

		<!--====== FOOTER PART ENDS ======-->

		<!--====== BACK TO TOP PART START ======-->

		<a href="#" class="back-to-top"><i class="lni-chevron-up"></i></a>

		<!--====== BACK TO TOP PART ENDS ======-->


		<?php $this->load->view('templates/foot') ?>


</body>



<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/JQuery.min.js"></script>



</html>