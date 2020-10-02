<!doctype html>
<html lang="en">

<head>

	<?php $this->load->view('templates/head'); ?>


</head>


<header class="header-area">
	<?php $this->load->view('templates/header'); ?>
</header>
<br><br><br><br><br><br>
<div class="container">
	<div class="row">
		<div class="col-sm-4 col-sm-offset-1">
			<h4>Upload bukti pembayaran</h4><br>
			<form action="<?php echo base_url('Bukti/upload_image'); ?>" id="main-contact-form" class="contact-form row" name="contact-form" method="post" enctype="multipart/form-data">
				<div class="form-group col-md-12">
					<input type="text" name="kode_pesan" class="form-control" required="required" placeholder="#Kode pesan">
				</div> 
				<div class="form-group col-md-12">
					<input type="text" name="nama" class="form-control" required="required" placeholder="*Nama pemilik rekening">
				</div> 
				<div class="form-group col-md-12">
					<input type="text" name="bank" class="form-control" required="required" placeholder="*Bank">
				</div> 
				<div class="form-group col-md-6">
					<input type="file" name="filefoto"  required="required" placeholder="Upload gambar">
				</div>        
				<div class="form-group col-md-12">
					<input type="submit" name="submit" class="btn btn-primary" value="Submit">
					<a href="<?php echo base_url('Transaksi'); ?>"><button type="button" value="batal" class="btn btn-primary">Batal</button></a>
				</div>
			</form>
			<!-- <?php foreach ($gambar as $a) { ?>
					<img src="<?php echo base_url($a->bukti_pembayaran); ?>">
				<?php } ?> -->
		</div>
		<div class="col-sm-6">
			
			<p style="background-color: #F2F8F9;margin: 30px;padding: 5px;padding-left: 10px;">
				Bukti pembayaran merupakan bukti transfer bank transaksi pemesanan yang anda lakukan, caranya :<br><br>
				1. Masukkan kode pesan transaksi anda,<br>
				2. Jangan lupa nama pemilik si nomor rekening,<br>
				3. Bank transfer, misal: BRI, BCA, dan lain sebagainya,<br>
				4. Terakhir scan atau foto bukti transfer yaa...<br><br>
				*ukuran gambar max 1 mb<br>
			</p>
		</div>
	</div>
</div>
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

