<!doctype html>
<html lang="en">

<head>
   
  <?php $this->load->view('templates/head'); ?>
  
  
</head>
    

  
<header class="header-area">
    <?php $this->load->view('templates/header'); ?>
    </header>
 
    
    <!--====== HEADER PART ENDS ======-->
	<body style="margin-top:150px">
    <body class="colorlib">
   
		<div class="container">
			<div class="review-payment">
				
				
			
            </div>
            
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Kode Pesan</td>
							<td class="description">Tanggal pesan</td>
							<td class="price">Pengiriman</td>
							<td class="quantity">Total</td>
							<td class="total">Status</td>
							<td class="total"></td>
						</tr>
					</thead>
					<tbody>
						<?php foreach($pesan as $a){ ?>
						<tr>
							<td class="cart_product">
								<h3 style="padding-left: 7px;"><?php echo $a->id_pesan; ?></h3>
							</td>
							<td class="cart_description">
								<h4><a><?php echo $a->tanggal_pesan; ?></a></h4>
							</td>
							<td class="cart_price">
								<p><?php echo $a->kurir; ?></p>
							</td>
							<td class="cart_quantity">
								<h4>Rp <?php $format_indonesia = number_format ($a->total_pesan, 0, ',', '.');
                                     echo $format_indonesia; ?></h4>
							</td>
							<td class="cart_total">
								<?php 
								if ($a->status=='Proses') {
									echo '<button type="button" class="btn">'.$a->status.'</button>';
								}elseif ($a->status=='Batal') {
									echo '<button type="button" class="btn btn-danger">'.$a->status.'</button>';
								}else{
									echo '<button type="button" class="btn btn-success">'.$a->status.'</button>';
								}
								?>
								
								<!-- <button type="button" class="btn"><?php echo $a->status; ?></button> -->
								<!-- <button type="button" class="btn btn-danger">Danger</button> -->
							</td>
							<td class="cart_total">
							<form target="_blank" action="<?php echo base_url('Transaksi/detail_transaksi/'.$a->id_kirim); ?>" method="post">
                                <input type="hidden" name="idpesan" value="<?php echo $a->id_pesan;?>">
                                <input type="hidden" name="harga_kirim" value="<?php echo $a->harga_kirim;?>">
                                <input type="hidden" name="total_pesan" value="<?php echo $a->total_pesan;?>">
                                <input type="hidden" name="iduser" value="<?php echo $a->id_kostumer_id;?>">
                                <input type="hidden" name="kode_pos" value="<?php echo $a->kodepos;?>">
                                <input type="hidden" name="status" value="<?php echo $a->status; ?>">
                                <button type="submit" class="btn btn-primary">Lihat detail transaksi</button>
                            </form><br>
								<!-- <p><a target="_blank" href="<?php echo base_url('Transaksi/detail_transaksi/'.$a->keranjang_id_keranjang.'/'.$a->id_pesan.'/'.$a->total_pesan.'/'.$a->id_kirim); ?>">Lihat detail transaksi</a></p> -->
							</td>
						</tr>
						<?php } ?>
					</tbody>
					<p>*Daftar transaksi pemesanan yang anda lakukan,<br> lakukan pembayaran dalam jangka waktu 5 jam semenjak transaksi anda lakukan.</p>
				</table>
			</div>
			<p>Segera lakukan pembayaran lalu upload bukti transfer di menu bukti pembayaran atau bisa klik &nbsp<a style="color: orange;" href="<?php echo base_url('Bukti');?>"><b>DISINI</b></a></p>
		</div>

    </body>
	<!--====== FOOTER PART START ======-->
    

    <!--====== FOOTER PART ENDS ======-->
    
    <!--====== BACK TO TOP PART START ======-->
    
    <a href="#" class="back-to-top"><i class="lni-chevron-up"></i></a>
    
    <!--====== BACK TO TOP PART ENDS ======-->
    
    <section id="footer" class="footer-area">
       <?php $this->load->view('templates/footer') ?>
    </section>
    
    
    
    
    <?php $this->load->view('templates/foot') ?>


</body>

</html>
