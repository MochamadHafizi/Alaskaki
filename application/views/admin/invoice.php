<div class="container-fluid">
    <h4 style="font-family: times new roman;">Invoice Pemesanan Produk</h4>
    <table class="table table-bordered table-hover table-striped">
    <tr>
        <th>Id Invoice</th>
        <th>Nama Pemesan</th>
        <th>Alamat Pengiriman</th>
        <th>No Telepon</th>
        <th>Provinsi</th>
        <th>Kota</th>
        <th>Ekspedisi</th>
        <th>Paket</th>
        <th>Tanggal Pemesanan</th>
        <th>Batas Pembayaran</th>
        <th colspan="2">Aksi</th>
    </tr>
    <?php foreach($invoice as $inv) : ?>
    <tr>
        <td><?php echo $inv->id ?></td>
        <td><?php echo $inv->nama ?></td>
        <td><?php echo $inv->alamat ?></td>
        <td><?php echo $inv->no_telepon ?></td>
        <td><?php echo $inv->provinsi ?></td>
        <td><?php echo $inv->kota ?></td>
        <td><?php echo $inv->expedisi ?></td>
        <td><?php echo $inv->paket ?></td>
        <td><?php echo $inv->tgl_pesan ?></td>
        <td><?php echo $inv->batas_bayar ?></td>
        <td><?php echo anchor('admin/invoice/detail/' .$inv->id, '<div class="btn btn-sm btn-primary">Detail</div>') ?></td>
        <td><?php echo anchor('admin/invoice/hapus/'.$inv->id, '<div class="btn btn-danger btn-sm">Hapus</div>') ?></td>
    </tr>
    <?php endforeach; ?>
    </table>
</div>