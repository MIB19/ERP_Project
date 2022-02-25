<div class="form_erp">
	<div class="form_erp_top">Tambah Penerimaan Barang</div>
	<div style="float:left;">
		<a style="color:white;text-decoration: none; cursor: pointer;" onclick="balik()">
			<svg style="width:15px;height:15px;" viewBox="0 0 24 24" class="mb-1">
				<path fill="#000000" d="M2,12A10,10 0 0,1 12,2A10,10 0 0,1 22,12A10,10 0 0,1 12,22A10,10 0 0,1 2,12M18,11H10L13.5,7.5L12.08,6.08L6.16,12L12.08,17.92L13.5,16.5L10,13H18V11Z" />
			</svg> Back To Data
		</a>
	</div>
	<div style="clear:both;"></div>
    <div class="container">
        <form action="<?php echo $config->base_url();?>inserttpbd.html" class="" method="post">
            <input type="hidden" id="kode" name="kode" value="<?= $tpbh['kode'] ?>" required>
            <input type="hidden" id="tpbh" name="tpbh" value="<?= $tpbh['no'] ?>" required>
    
            <h1 style="text-align: center; text-decoration-line: underline;">Data Pemesanan</h1>
            <div style="color:white;padding:10px;overflow-y:auto;">
                <table style="width:100%; margin-top:30px;" id="mytable">
                    <tr>
                        <th style="width: 4%;">No</th>
                        <th style="width: 15%">Nama Barang</th> 
                        <th style="width: 6%">Satuan</th>
                        <th style="width: 5%">Gudang</th>
                        <th style="width: 5%">urgent</th>
                        <th style="width: 5%">Qty</th>
                        <th style="width: 8%">Bobot</th>
                        <th style="width: 8%">Harga</th>
                        <th style="width: 8%">Subtotal</th>
                    </tr>
                     <?php $no = 1; $a = 0; $b = 0;?>
				    <?php foreach( $tpod as $row ) : ?>
                    <tr>
                        <td><?= $no; ?></th>
                        <td><?= $row['brg']; ?></th> 
                        <td><?= $row['snama']; ?></th>
                        <td><?= $row['gnama']; ?></th>
                        <td><?= $row['urgnt']; ?></th>
                        <td><input type="text" name="ket" id="ket" value="<?= round($row['jum']); ?>" max="<?= round($row['jum']); ?>" class="form_input"></th>
                        <td><?= round($row['bobot']) ?> kg</th>
                        <td><?= round($row['hrg']); ?></th>
                        <td><?= $row['sbtot']; ?></th>
                    </tr>
                    <?php $no++; ?>
                    <?php endforeach ?>
                </table>
            </div>
		
            <div style="margin-top: 20px;">
                <label>Keterangan<span class="required">*</span></label>
                <div class="alas_luar">
                    <input type="text" name="ket" id="ket" class="form_input">
                </div>
            </div>
            <div style="margin-top:16px;float:right;">
		        <div class="alas_form_bawah">
			        <input type="submit" class="btn btn-primary m-1" value="Simpan">
		        </div>
	        </div>
        </form>
        <div style="clear:both;"></div>
	</div>
</div>
<script>
    function change(){
        var val1 = document.getElementById('mbrg').value ;
        var strArray =  val1.split(", ");
        var hasil = Math.ceil(strArray[2]);
        var bobot = Math.ceil(strArray[3]);
        document.getElementById('bobot').value = bobot;
        var sub = document.getElementById('subtotal');
        if(sub == "[object HTMLInputElement]"){
            //alert(hasil);
            document.getElementById('subtotal').value=hasil;
        }else{
            var subt = hasil+sub;
            document.getElementById('subtotal').value=subt;
        }
        var tot = document.getElementById('total');
        if(tot == "[object HTMLInputElement]"){
            //alert(hasil);
            document.getElementById('total').value=hasil;
        }else{
            var total = hasil+tot;
            document.getElementById('total').value=total;
        }
	}
    function changeqty(){
        var qty = document.getElementById('qty').value;
        var val1 = document.getElementById('mbrg').value;
        var strArray =  val1.split(", ");
        var bot = Math.ceil(strArray[3]);
        var hrg = Math.ceil(strArray[2]);
        var bobot = qty*bot;
        var harga = qty*hrg;
        document.getElementById('bobot').value=bobot;
        document.getElementById('subtotal').value=harga;
        document.getElementById('total').value=harga;
	}
    function diskon(){
        var dsc = document.getElementById('disc').value;
        var jum = document.getElementById('qty').value;
        var val1 = document.getElementById('mbrg').value;
        var strArray =  val1.split(", ");
        var hrg = Math.ceil(strArray[2]);
        var jumlah = jum*hrg*dsc/100;
        if(jumlah == 0){
            alert("hasil 0");
        }else{
            total = jum*hrg-jumlah;
            document.getElementById('diskon').value=jumlah;
            document.getElementById('total').value=total;
        }
    }
    function balik(){
        $('#tester').html('Loading...');
		$.post('<?php echo $config->base_url();?>pb.html',function(data){
			$('#tester').html(data);
		});
    }
</script>