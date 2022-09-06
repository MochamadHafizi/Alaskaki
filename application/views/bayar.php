<div class="row">   
<div class="col-sm-6">
        <div class="card card-primary">
         <div class="card-header">
                <h3 class="card-title">Nomor Rekening Toko</h3>
              </div>
                <div class="card-body">
                    <p >Silahkan Transfer ke Nomor Rekening Di Bawah Ini Sebesar: <h2 class="text-success">Rp. <?= number_format($pesanan->total_bayar,0) ?></h2></p>
                    <table class="table table-bordered table-hover table-striped">
                        <tr>
                            <th>Bank</th>
                            <th>No Rekening</th>
                            <th>Atas Nama</th>
                        </tr>
                        <?php foreach ($rekening as $key => $value) {?>
                           <tr>
                            <td><?= $value->nama_bank?></td>
                            <td><?= $value->no_rek?></td>
                            <td><?= $value->atas_nama?></td>
                        </tr>
                        <?php }?>
                        
                    </table>
        </div>
    </div>
</div>
    <div class="col-sm-6">
    <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Upload Bukti Pembayaran</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <?php echo form_open_multipart('pesanan_saya/bayar/'.$pesanan->id_transaksi); ?>
                <div class="card-body">
                  <div class="form-group">
                    <label >Atas Nama</label>
                    <input  class="form-control" name="atas_nama" placeholder="Atas Nama"required>
                  </div>
                   <div class="form-group">
                    <label >Nama Bank</label>
                    <input  class="form-control" name="nama_bank" placeholder="Nama Bank"required>
                  </div>
                   <div class="form-group">
                    <label >Nomor Rekening</label>
                    <input  class="form-control" name="no_rek" placeholder="Nomor Rekening"required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Bukti Pembayaran</label>
                     <input type="file" class="form-control" name="bukti_bayar"required>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Kirim</button>
                  <a href="<?= base_url('pesanan_saya')?>" class="btn btn-danger">Kembali</a>
                </div>
              <?php echo form_close() ?>
            </div>
    </div>
    
</div>