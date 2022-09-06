<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>

<div class="container-fluid">
<div class="row">
<div class="col-md-2"></div>
<div class="col-md-8">
            <div class="btn btn-sm btn-success">
            <?php 
            $grand_total = 0;
            if ($keranjang = $this->cart->contents()) {
                foreach ($keranjang as $item) {
                    $grand_total = $grand_total + $item['subtotal'];
                }
                echo "Total Belanja Anda: Rp. ".number_format($grand_total,0,',','.');
            
            ?>
			</div><br><br>
            <h3 style="font-family: times new roman;">Form Alamat Pengiriman Dan Pembayaran</h3>
            <hr style="background-color: orange;">
            <form method="post" action="<?php echo base_url() ?> dashboard/proses_pesanan">
			<div class="form-group">
                    <label for="">Nama Lengkap</label>
                    <input type="text" name="nama" placeholder="Nama Lengkap Anda" class="form-control">
                </div>
			<div class="form-group">
                    <label for="">Provinsi</label>
                    <select  class="form-control" name="nama_provinsi">
					</select>
                </div>
			<div class="form-group">
                    <label for="">Kabupaten/Kota</label>
                    <select  class="form-control" name="nama_distrik">
					</select>
                </div>	
			<div class="form-group">
                    <label for="">Jasa Pengiriman</label>
                    <select  class="form-control" name="nama_ekspedisi">
					</select>
                </div>	

			<div class="form-group">
                    <label for="">Paket</label>
                    <select  class="form-control" name="nama_paket">
					</select>
                </div>	
		<input type="text" name="total_berat" value="1200">
		<input type="text" name="provinsi">
		<input type="text" name="distrik">
		<input type="text" name="tipe">
		<input type="text" name="kodepos">
		<input type="text" name="ekspedisi">
		<input type="text" name="paket">
		<input type="text" name="ongkir">
		<input type="text" name="estimasi">	
		<button type="submit" class="btn btn-md btn-primary mb-3">Pesan</button>	
</form>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script>
	$(document).ready(function(){
		$.ajax({
			type:'post',
			url:'dataprovinsi.php',
			success:function(hasil_provinsi)
			{
				$("select[name=nama_provinsi]").html(hasil_provinsi);
				
			}
		});
	$("select[name=nama_provinsi]").on("change",function(){
// ambil id_provinsi yang dipilih (dari atribut pribadi/bid ah)
	var id_provinsi_terpilih = $("option:selected",this).attr("id_provinsi");
		$.ajax({
			type:'post',
			url:'datadistrik.php',
			data:'id_provinsi='+id_provinsi_terpilih,
			success:function(hasil_distrik)
			{
				$("select[name=nama_distrik]").html(hasil_distrik);
			}
		});
		});
// ekspedisi
	$.ajax({
		type:'post',
		url:'dataekspedisi.php',
		success:function(hasil_ekspedisi)
		{
			// console.log(hasil_ekspedisi);
			$("select[name=nama_ekspedisi]").html(hasil_ekspedisi);
		}

	});
	$("select[name=nama_ekspedisi]").on("change",function(){
		// mendapatkan data ongkos kirim 

		// mendapatkan ekspedisi yang di beli
		var ekspedisi_terpilih = $("select[name=nama_ekspedisi]").val();
		
	
		// mendapatkan id_ditrik yang dipilih pengguna
		var distrik_terpilih = $("option:selected","select[name=nama_distrik]").attr("id_distrik");
	
		// mendapatkan total berat dari inputan 
		var total_berat = $("input[name=total_berat]").val();
		$.ajax({
			type:'post',
			url:'datapaket.php',
			data:'ekspedisi='+ekspedisi_terpilih+'&distrik='+distrik_terpilih+'&berat='+total_berat,
			success:function(hasil_paket)
			{
				// console.log(hasil_paket);
				$("select[name=nama_paket]").html(hasil_paket);
				// letakan nam ekspidisi terpilih di inputan ekspedisi
				$("input[name=ekspedisi]").val(ekspedisi_terpilih);
			}
		})
	});
	$("select[name=nama_distrik]").on("change",function(){
		var prov = $("option:selected",this).attr("nama_provinsi");
		var dis = $("option:selected",this).attr("nama_distrik");
		var tipe = $("option:selected",this).attr("tipe_distrik");
		var kodepos = $("option:selected",this).attr("kodepos");
		$("input[name=provinsi]").val(prov);
		$("input[name=distrik]").val(dis);
		$("input[name=tipe]").val(tipe);
		$("input[name=kodepos]").val(kodepos);

	});
	$("select[name=nama_paket]").on("change",function(){
		var paket = $("option:selected",this).attr("paket");
		var ongkir = $("option:selected",this).attr("ongkir");
		var etd = $("option:selected",this).attr("etd");
		$("input[name=paket]").val(paket);
		$("input[name=ongkir]").val(ongkir);
		$("input[name=estimasi]").val(etd);
})

	});
</script>

<?php }else {
                echo "Anda Belum Memiliki Keranjang Belanjaan";
                
            } ?>
        </div>

        
        <div class="col-md-2"></div>
    </div>
</div>  

</body>
</html>