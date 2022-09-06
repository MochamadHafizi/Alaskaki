<div class="container-fluid">
    <div class="card">
  <h5 class="card-header" style="font-family: times new roman;">Detail Produk</h5>
  <div class="card-body">
  <?php foreach ($barang as $brg) : ?>
    <div class="row">
        <div class="col-md-4">
        <img src="<?php echo base_url(). '/uploads/' .$brg->gambar ?>" class="card-img-top" alt="">
        </div>
        <div class="col-md-8">
            <table class="table">
                <tr>
                    <td>Nama Produk</td>
                    <td>:</td>
                    <td><strong><?php echo $brg->nama_brg ?></strong></td>
                </tr>

                 <tr>
                    <td>Keterangan</td>
                    <td>:</td>
                    <td><strong><?php echo $brg->keterangan ?></strong></td>
                </tr>

                 <tr>
                    <td>Kategori</td>
                    <td>:</td>
                    <td><strong><?php echo $brg->kategori ?></strong></td>
                </tr>

                <tr>
                    <td>Brand</td>
                    <td>:</td>
                    <td><strong><?php echo $brg->brand ?></strong></td>
                </tr>
                <tr>
                    <td>Stok</td>
                    <td>:</td>
                    <td><strong><?php echo $brg->stok ?></strong></td>
                </tr>

                <tr>
                    <td>Ukuran</td>
                    <td>:</td>
                    <td><strong><?php echo $brg->ukuran ?></strong></td>
                </tr>

                <tr>
                    <td>Harga</td>
                    <td>:</td>
                    <td><strong><p class="text-success">Rp. <?php echo number_format($brg->harga,0,',','.')  ?></strong></p></td>
                </tr>
            </table>
            
            <?php echo anchor('admin/data_barang', '<div class="btn btn-md btn-danger">Kembali</div>') ?>
         </div>
        
       
    </div>
    <?php endforeach; ?>
  </div>
</div>
</div>