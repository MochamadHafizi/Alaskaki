<div class="container-fluid">
<div class="row">



</div>
<div class="row">
          <div class="col-12">
            <h4>Pesanan Saya</h4>
          </div>
        </div>
        <!-- ./row -->
        <div class="row">
          <div class="col-sm-12">
          <?php 
if ($this->session->flashdata('pesan')) {
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Selamat!</strong> 
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
}
?>
            <div class="card card-primary card-tabs">
              <div class="card-header p-0 pt-1">
                <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">Daftar Order</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">Dikemas</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-one-messages-tab" data-toggle="pill" href="#custom-tabs-one-messages" role="tab" aria-controls="custom-tabs-one-messages" aria-selected="false">Dikirim</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-one-settings-tab" data-toggle="pill" href="#custom-tabs-one-settings" role="tab" aria-controls="custom-tabs-one-settings" aria-selected="false">Selesai</a>
                  </li>
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content" id="custom-tabs-one-tabContent">
                  <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                    <table class="table table bordered table-hover table-striped">
                    <tr>
                        <th>No. Order</th>
                        <th>Tanggal</th>
                        <th>Expedisi</th>
                        <th>Total Bayar</th>
                        <th>Aksi</th>
                    </tr>
                    <?php foreach ($belum_bayar as $key => $value) {?>
                        <tr>
                        <td><?= $value->no_order?></td>
                        <td><?= $value->tgl_order?></td>
                        <td><b><?= $value->expedisi?></b><br>
                            Paket: <?= $value->paket?><br>
                        </td>
                        <td>Rp. 
                        <?=  number_format($value->total_bayar) ?><br>
                        
                        <?php if ($value->status_bayar==0) {?>
                        <span class="badge badge-warning badge-pill">Belum Bayar</span>
                    <?php }else {?>
                        <span class="badge badge-success badge-pill">Sudah Bayar</span><br>
                        <span class="badge badge-primary badge-pill">Menunggu Verifikasi</span>
                    
                    <?php } ?>
                        </td> 
                        <?php if ($value->status_bayar==0) {?>
                        
                        <td><a href="<?= base_url('pesanan_saya/bayar/'.$value->id_transaksi)?>" class="btn btn-sm btn-flat btn-primary">Bayar</a></td>
                    
                    <?php } ?>  
                        

                    </tr>
                        
                    <?php } ?>
                    
                    
                    </table>
                  </div>
                  <!-- diproses -->
                  <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
                     <table class="table table bordered table-hover table-striped">
                    <tr>
                        <th>No. Order</th>
                        <th>Tanggal</th>
                        <th>Expedisi</th>
                        <th>Total Bayar</th>
                        
                    </tr>
                    <?php foreach ($diproses as $key => $value) {?>
                        <tr>
                        <td><?= $value->no_order?></td>
                        <td><?= $value->tgl_order?></td>
                        <td><b><?= $value->expedisi?></b><br>
                            Paket: <?= $value->paket?><br>
                        </td>
                        <td>Rp. 
                        <?=  number_format($value->total_bayar) ?><br>
                        
                        <span class="badge badge-success badge-pill">Terverifikasi</span><br>
                        <span class="badge badge-primary badge-pill">Diproses/Dikemas</span>

                    </tr>
                        
                    <?php } ?>
                    
                    
                    </table> 
                  </div>
                  <div class="tab-pane fade" id="custom-tabs-one-messages" role="tabpanel" aria-labelledby="custom-tabs-one-messages-tab">
                    <table class="table table bordered table-hover table-striped">
                    <tr>
                        <th>No. Order</th>
                        <th>Tanggal</th>
                        <th>Expedisi</th>
                        <th>Total Bayar</th>
                        <th>Nomor Resi</th>
                        
                        
                    </tr>
                    <?php foreach ($dikirim as $key => $value) {?>
                        <tr>
                        <td><?= $value->no_order?></td>
                        <td><?= $value->tgl_order?></td>
                        <td><b><?= $value->expedisi?></b><br>
                            Paket: <?= $value->paket?><br>
                        </td>
                        <td>Rp. 
                        <?=  number_format($value->total_bayar) ?><br>
                        
                        <span class="badge badge-primary badge-pill">Dikirim</span>
                      <td><?= $value->no_resi?><br>
                      <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#diterima<?= $value->id_transaksi?>">Barang Diterima</button>
                      </td>
                    </tr>
                        
                    <?php } ?>
                    
                    
                    </table> 
                  </div>
                  <div class="tab-pane fade" id="custom-tabs-one-settings" role="tabpanel" aria-labelledby="custom-tabs-one-settings-tab">
                     <table class="table table bordered table-hover table-striped">
                    <tr>
                        <th>No. Order</th>
                        <th>Tanggal</th>
                        <th>Expedisi</th>
                        <th>Total Bayar</th>
                        <th>Nomor Resi</th>
                        
                        
                    </tr>
                    <?php foreach ($selesai as $key => $value) {?>
                        <tr>
                        <td><?= $value->no_order?></td>
                        <td><?= $value->tgl_order?></td>
                        <td><b><?= $value->expedisi?></b><br>
                            Paket: <?= $value->paket?><br>
                        </td>
                        <td>Rp. 
                        <?=  number_format($value->total_bayar) ?><br>
                        
                        <h4><span class="badge badge-success badge-pill">Selesai</h4></span>
                      <td><?= $value->no_resi?><br>
                     
                      </td>
                    </tr>
                     <?php if ($value->status_order=3) {
                       echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Terima Kasih!</strong> Sudah Membeli barang di Toko Kami.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
                     } ?>   
                    <?php } ?>
                    
                    
                    </table> 
                  </div>
                </div>
              </div>
              <!-- /.card -->
            </div>
          </div>
</div>
 <?php foreach ($dikirim as $key => $value) {?> 
<div class="modal fade" id="diterima<?= $value->id_transaksi ?>">
<div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Pesanan Diterima</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p class="text-success">Apakah Anda Yakin Pesanan Sudah Diterima?</p>
            </div>
      
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Tidak</button>
              <a href="<?= base_url('pesanan_saya/diterima/'.$value->id_transaksi)?>" class="btn btn-primary text-white">Ya</a>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
      <?php } ?>