<!-- partial -->
<div class="main-panel">
        <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 style="color: #1E7BCB;">Bukti Pembayaran</h4><br>
                  
                  <div class="table-responsive">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>
                            #Id Bayar
                          </th>
                          <th>
                            <center>#Kode_pesan</center>
                          </th>
                          <th>
                            <center>Nama pemilik rekening</center>
                          </th>
                          <th>
                            <center>Bank</center>
                          </th>
                          <th>
                            <center>Gambar</center>
                          </th>
                          
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($bukti as $a) {?>
                        <tr>
                          <td class="font-weight-medium">
                            <?php echo $a->id_bayar; ?>
                          </td>
                          <td>
                            <?php echo $a->kode_pesan; ?>
                          </td>
                          <td>
                            <?php echo $a->nama_pemilik; ?>
                          </td>
                          <td>
                            <?php echo $a->bank; ?>
                          </td>
                          <td>
                            <center><a target="_blank" href="<?php echo base_url($a->bukti_pembayaran); ?>"><img src="<?php echo base_url($a->bukti_pembayaran); ?>"></a></center>
                          </td>
                         
                           
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>


        </div>
        
