<div class="container-fliud">
<div class="text-center">
<button class="btn btn-sm btn-primary  ml-3 mb-4" data-toggle="modal" data-target="#tambah_barang"><i class="fas fa-plus fa-sm"></i>Tambah Barang</button>
</div>
<table class="table table-bordered mx-auto">
    <tr align="center">
        <th>NO</th>
        <th>NAMA BARANG</th>
        <th>KETERANGAN</th>
        <th>KATEGORI</th>
        <th>BRAND</th>
        <th>HARGA</th>
        <th>UKURAN</th>
        <th>STOK</th>
        <th colspan="3">AKSI</th>
    </tr>
    <?php
    $no=1;
    foreach($barang as $brg) : ?>
        <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $brg->nama_brg ?></td>
            <td><?php echo $brg->keterangan ?></td>
            <td><?php echo $brg->kategori ?></td>
            <td><?php echo $brg->brand ?></td>
            <td><?php echo $brg->harga ?></td>
            <td><?php echo $brg->ukuran ?></td>
            <td><?php echo $brg->stok ?></td>
            <td><?php echo anchor('admin/data_barang/detail/'.$brg->id_brg, '<div class="btn btn-success btn-sm">Detail</div>') ?></td>
            <td><?php echo anchor('admin/data_barang/edit/'.$brg->id_brg, '<div class="btn btn-primary btn-sm">Edit</div>') ?></td>
            <td><?php echo anchor('admin/data_barang/hapus/'.$brg->id_brg, '<div class="btn btn-danger btn-sm">Hapus</div>') ?></td>
        </tr>
    <?php endforeach; ?>
</table>
</div>
<!-- Modal -->
<div class="modal fade" id="tambah_barang" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">FORM TAMBAH PRODUK</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url().'admin/data_barang/tambah_aksi'; ?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
            <label for="">Nama Barang</label>
            <input type="text"name="nama_brg" class="form-control">
            </div>

            <div class="form-group">
            <label for="">Keterangan</label>
            <input type="text"name="keterangan" class="form-control">
            </div>

            <div class="form-group">
            <label for="exampleFormControlSelect1">Kategori</label>
            <select class="form-control" id="exampleFormControlSelect1" name="kategori">
              <option>Sepatu Olahraga</option>
              <option>Sepatu Vulcanized</option>
              <option>Sepatu Slip On</option>
            </select>
            </div>

            <div class="form-group">
            <label for="">Brand</label>
            <input type="text"name="brand" class="form-control">
            </div>

            <div class="form-group">
            <label for="">Harga</label>
            <input type="text"name="harga" class="form-control">
            </div>

            <div class="form-group">
            <label for="">Ukuran</label>
            <input type="text"name="ukuran" class="form-control">
            </div>

            <div class="form-group">
            <label for="">Stok</label>
            <input type="text"name="stok" class="form-control">
            </div>

            <div class="form-group">
            <label for="">Gambar Sepatu</label><br>
            <input type="file"name="gambar" class="form-control">
            </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-dark">Simpan</button>
      </div>
      </form>
    </div>
  </div>
</div>