<div class="container-fluid">
<h3 class="text-left">Checkout Belanja</h3>
<h5 class="text-right">Tanggal: <?= date('d-m-Y')?></h5>


<table class="table table-bordered table-striped table-hover">
        <tr>
            <th>No</th>
            <th>Nama Produk</th>
            <th>Jumlah</th>
            <th>Harga</th>
            <th>Sub-Total</th>
        </tr>
        <?php $no=1;
        foreach ($this->cart->contents() as $items) : ?>
            <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $items['name'] ?></td>
                <td><?php echo $items['qty'] ?></td>
                <td align="right">Rp. <?php echo number_format($items['price'],0,',','.')?></td>
                <td align="right">Rp. <?php echo number_format($items['subtotal'],0,',','.') ?></td>
            </tr>
           
        <?php endforeach; ?>
        <tr>
        <td colspan="5" align="right">
        <div class="btn btn-sm btn-success">
            <?php 
            $grand_total = 0;
            if ($keranjang = $this->cart->contents()) {
                foreach ($keranjang as $item) {
                    $grand_total = $grand_total + $item['subtotal'];
                }
                echo "Total Belanja Anda: Rp. ".number_format($grand_total,0,',','.');
            
            ?>
            
            </div>
        </td>
        </tr>
        <tr>
        <td colspan="5" align="right"><h5><span class="badge badge-pill badge-primary">Total Berat = 900</span></h5></td><br>  
        </tr>
        
    </table>
    <?= 
form_error('provinsi','<div class="alert alert-danger alert-dismisisble "><button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
<h5><i class="fas fa-info"></i>','</h5></div>');
?>
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <br><br>
             
            <?= form_open('dashboard/cekout');
            $no_order = date('Ymd').strtoupper(random_string('alnum',8)) ;
            
            ?>
            <h3 style="font-family: times new roman;">Form Alamat Pengiriman</h3>
            <hr style="background-color: orange;">
            
                <div class="form-group">
                    <label for="">Nama Penerima</label>
                    <input  name="nama_penerima" placeholder="Nama Lengkap Anda" class="form-control" required>
                </div>

                <div class="form-group">
                <label for="">Provinsi</label>
                <select name="provinsi" id="" class="form-control"></select>
                </div>

                <div class="form-group">
                <label for="">Kota</label>
                <select name="kota" id="" class="form-control"></select>
                </div>

                <div class="form-group">
                <label for="">Expedisi</label>
                <select name="expedisi" id="" class="form-control"></select>
                </div>

                <div class="form-group">
                <label for="">Paket</label>
                <select name="paket" id="" class="form-control"></select>
                </div>

                <div class="form-group">
                <label for="">Alamat</label>
                <input  name="alamat" class="form-control " placeholder="Alamat Anda" required>
                </div>

                <div class="form-group">
                <label for="">Kode Pos</label>
                <input  name="kode_pos" class="form-control " placeholder="Alamat Anda" required>
                </div>

                
                <div class="form-group">
                    <label for="">Nomor Telepon</label>
                    <input  name="no_telepon" placeholder="Nomor Telepon Anda" class="form-control" required>
                </div><br>
    
                <!-- simpan trasnsaksi -->
                <input name="no_order" value="<?= $no_order?>" hidden>
                <input name="estimasi" hidden>
                <input name="ongkir" hidden>
                <input name="grand_total" value="<?= $grand_total?>"hidden>
                <input name="total_bayar" hidden>
                <!-- end simpan trasnsaksi -->
                <!-- simpan rincian trasnsaksi -->

                <?php 
                $i=1;
                foreach ($this->cart->contents() as $items) {
                    echo form_hidden('qty'.$i++,$items['qty']);
                }
                ?>
                <!-- end simpan trasnsaksi -->
                    <?php echo anchor('dashboard/detail_keranjang', '<div class="btn btn-md btn-danger mb-3 ">Kembali Ke Keranjang</div>') ?>
                    <button type="submit" class="btn btn-md btn-primary mb-3 ml-4">Pesan</button>
            
            <?php }else {
                echo "Anda Belum Memiliki Keranjang Belanjaan";
                
            } ?>
        </div>
        <?php echo form_close() ?>

        
        <div class="col-md-2">
        <tr><td colspan="4"></td>
            <td>Ongkir:  <label id="ongkir"></label></td>
        </tr><br><br>  

        <tr>
            <tr>Total Bayar: Rp. </tr>
            <td ><label id="total_bayar"> </label></td>
        </tr>
        </div>
    </div>
</div>  
<script>
$(document).ready(function(){
  $.ajax({
      type: "POST",
      url: "<?= base_url('rajaongkir/provinsi') ?>",
      success: function(hasil_provinsi){
          $("select[name=provinsi]").html(hasil_provinsi);
      }
  });
  
  $("select[name=provinsi]").on("change",function(){
      var id_provinsi_terpilih = $("option:selected",this).attr("id_provinsi");
      $.ajax({
        type: "POST",
        url: "<?= base_url('rajaongkir/kota') ?>",
        data: 'id_provinsi=' + id_provinsi_terpilih,
        success: function(hasil_kota){
            $("select[name=kota]").html(hasil_kota);
        }
      });
  });
  $("select[name=kota]").on("change",function(){
     $.ajax({
        type: "POST",
        url: "<?= base_url('rajaongkir/expedisi') ?>",
        success: function(hasil_expedisi){
            $("select[name=expedisi]").html(hasil_expedisi);
        }
      });
});

 $("select[name=expedisi]").on("change",function(){
     //mendapatkan expedisi terpilih
     var expedisi_terpilih = $("select[name=expedisi]").val()
     //mendapatkan id kota terpilih
     var id_kota_tujuan_terpilih = $("option:selected","select[name=kota]").attr('id_kota');
     //mengambil data ongkos kirm
     
    
     $.ajax({
        type: "POST",
        url: "<?= base_url('rajaongkir/paket') ?>",
        data: 'expedisi=' + expedisi_terpilih +'&id_kota='+id_kota_tujuan_terpilih,
        success: function(hasil_paket){
           
            $("select[name=paket]").html(hasil_paket);
        }
      });
});

$("select[name=paket]").on("change",function(){
    var dataongkir = "Rp. "+ $("option:selected",this).attr('ongkir');
    
    $("#ongkir").html(dataongkir)
    //menghitung total bayar
    var ongkir =$("option:selected", this).attr('ongkir');
    var data_total_bayar = parseInt(ongkir) + parseInt(<?=$this->cart->total() ?>);
    $("#total_bayar").html(data_total_bayar);
    //estimasi dan ongkir
    var estimasi = $("option:selected",this).attr('estimasi');
    $("input[name=estimasi]").val(estimasi);
    $("input[name=ongkir]").val(dataongkir);
    $("input[name=total_bayar]").val(data_total_bayar);
});


});
</script>