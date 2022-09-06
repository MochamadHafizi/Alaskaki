<div class="container-fluid">
<div class="row">



</div>
<div class="row">
          <div class="col-12">
            <h4 style="font-family: times new roman;">Pesanan</h4>
          </div>
        </div>
          <!-- ./row -->
        <div class="row">
          <div class="col-sm-12">
          <?php 
if ($this->session->flashdata('pesan')) {
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Selamat!</strong> Pesanan Anda Berhasil Diproses
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
                    <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">Pesanan Masuk</a>
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
                        <th colspan="2">Aksi</th>
                    </tr>
                    <?php foreach ($pesanan as $key => $value) {?>
                        <tr>
                        <td><?= $value->no_order?></td>
                        <td><?= $value->tgl_order?></td>
                        <td><b><?= $value->expedisi?></b><br>
                            Paket: <?= $value->paket?><br>
                        </td>
                        <td>Rp. 
                        <?= number_format($value->total_bayar) ?><br>
                        
                        <?php if ($value->status_bayar==0) {?>
                        <span class="badge badge-warning badge-pill">Belum Bayar</span>
                    <?php }else {?>
                        <span class="badge badge-success badge-pill">Sudah Bayar</span><br>
                        <span class="badge badge-primary badge-pill">Menunggu Verifikasi</span>
                    
                    <?php } ?>
                        </td> 
                        <?php if ($value->status_bayar==1) {?>
                        <td><button class="btn btn-success btn-sm" data-toggle="modal" data-target="#cek<?= $value->id_transaksi?>">Cek Bukti Bayar</button></td>
                        <td><a href="<?= base_url('admin/dashboard_admin/proses/'.$value->id_transaksi)?>" class="btn btn-sm btn-flat btn-primary">Proses</a></td>
                    
                    <?php } ?>  
                        

                    </tr>
                        
                    <?php } ?>
                    
                    
                    </table>
                  </div>
                  <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
                     <table class="table table bordered table-hover table-striped">
                    <tr>
                        <th>No. Order</th>
                        <th>Tanggal</th>
                        <th>Expedisi</th>
                        <th>Total Bayar</th>
                        <th colspan="2">Aksi</th>
                    </tr>
                    <?php foreach ($pesanan_diproses as $key => $value) {?>
                        <tr>
                        <td><?= $value->no_order?></td>
                        <td><?= $value->tgl_order?></td>
                        <td><b><?= $value->expedisi?></b><br>
                            Paket: <?= $value->paket?><br>
                        </td>
                        <td>Rp. 
                        <?= number_format($value->total_bayar) ?><br>
                        
                        
                        <span class="badge badge-primary badge-pill">Diproses/Dikemas</span>
                        </td> 
                        <?php if ($value->status_bayar==1) {?>
                        <td><button data-toggle="modal" data-target="#kirim<?=$value->id_transaksi ?>" class="btn btn-sm btn-flat btn-primary"><i class="fas fa-paper-plane">Kirim</i></button></td>
                    
                    <?php } ?>  
                        

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
                    <?php foreach ($pesanan_dikirim as $key => $value) {?>
                        <tr>
                        <td><?= $value->no_order?></td>
                        <td><?= $value->tgl_order?></td>
                        <td><b><?= $value->expedisi?></b><br>
                            Paket: <?= $value->paket?><br>
                        </td>
                        <td>Rp. 
                        <?= number_format($value->total_bayar) ?><br>
                        
                        
                        <span class="badge badge-primary badge-pill">Dikirim</span>
                        </td>  
                        <td>
                        <?= $value->no_resi?>
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
                    <?php foreach ($pesanan_selesai as $key => $value) {?>
                        <tr>
                        <td><?= $value->no_order?></td>
                        <td><?= $value->tgl_order?></td>
                        <td><b><?= $value->expedisi?></b><br>
                            Paket: <?= $value->paket?><br>
                        </td>
                        <td>Rp. 
                        <?= number_format($value->total_bayar) ?><br>
                        
                        
                        <span class="badge badge-primary badge-pill">Sudah Diterima</span>
                        </td>  
                        <td>
                        <?= $value->no_resi?>
                        </td>
                        

                    </tr>
                        
                    <?php } ?>
                    
                    
                    </table>
                  </div>
                </div>
              </div>
              <!-- /.card -->
            </div>
          </div>
</div>
<?php foreach ($pesanan as $key => $value) {?>
   

<!-- modal -->
 <div class="modal fade" id="cek<?= $value->id_transaksi?>">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">No Order: <?= $value->no_order?></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <table class="table table-bordered table-hover table-striped">
              <tr>
                <th>Nama Bank</th>
                <th>:</th>
                <th><?= $value->nama_bank?></th>
              </tr>
              <tr>
                <th>Nomor Rekening</th>
                <th>:</th>
                <th><?= $value->no_rek?></th>
              </tr>
              <tr>
                <th>Atas Nama</th>
                <th>:</th>
                <th><?= $value->atas_nama?></th>
              </tr>
              <tr>
                <th>Total Bayar</th>
                <th>:</th>
                <th>Rp. <?=number_format( $value->total_bayar)?></th>
              </tr>
              </table>
              <img  width="100%" src="<?= base_url('assets/bukti_bayar/'.$value->bukti_bayar)?>" alt="">
            </div>
            
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
      <?php }?>
      <?php foreach ($pesanan_diproses as $key => $value) {?>
      <div class="modal fade" id="kirim<?= $value->id_transaksi?>">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title"><?= $value->no_order?></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              
              <?= form_open('admin/dashboard_admin/kirim/'.$value->id_transaksi) ?>
               <table class="table table-bordered table-hover table-striped">
                  <tr>
                    <th>Expedisi</th>
                    <th>:</th>
                    <th><?= $value->expedisi?></th>
                  </tr>
                  <tr>
                    <th>Paket</th>
                    <th>:</th>
                    <th><?= $value->paket?></th>
                  </tr>
                  <tr>
                    <th>Nomor Resi</th>
                    <th>:</th>
                    <th><input class="form-control" name="no_resi" placeholder="Nomor Resi" reqiured></th>
                  </tr>
               </table> 

              
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Kirim</button>
            </div>
            <?= form_close() ?>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
      <?php } ?>