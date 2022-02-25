<div class="form_erp">
	<div class="form_erp_top">Tambah Detail Surat Jalan</div>
	<div style="float:left;">
		<a style="color:white;text-decoration: none; cursor: pointer;" onclick="balik()">
			<svg style="width:15px;height:15px;" viewBox="0 0 24 24" class="mb-1">
				<path fill="#000000" d="M2,12A10,10 0 0,1 12,2A10,10 0 0,1 22,12A10,10 0 0,1 12,22A10,10 0 0,1 2,12M18,11H10L13.5,7.5L12.08,6.08L6.16,12L12.08,17.92L13.5,16.5L10,13H18V11Z" />
			</svg> Back To Data
		</a>
	</div>
	<div style="clear:both;"></div>
    <div class="container">
        <form action="<?php echo $config->base_url();?>inserttsjd.html" class="" method="post">
            <input type="hidden" id="kode" name="kode" value="<?= $kode ?>" required>
            <input type="hidden" id="tsjh" name="tsjh" value="<?= $id; ?>" required>
    
            
            <div style="margin-top: 20px;">
                <label>Pilih Sales Order</label>
                <div class="alas_luar">
                    <input type="text" class="form_input" name="tsod" id="tsod" list="cityname" onkeyup="change()">
                </div>
            </div>
                <datalist id="cityname">
                <?php foreach( $tsod as $row4 ) : ?>
                    <option value="<?=$row4['brg'];?>, <?= $row4['no'];?>, <?=$row4['mbrg'];?>, <?= $row4['mgdn']; ?>, <?= $row4['msat']; ?>, <?= $row4['jum']; ?>, <?=$row4['bobot'];?>"><?=$row4['brg'];?></option>
                <?php endforeach ?>
                </datalist>
            <div style="margin-top: 20px;">
                <label>Pilih Gudang<span class="required">*</span></label>
                <div class="alas_luar">
                    <select class="form_input" style="width: 100%;" name="mgdn" id="mgdn" required>
                    <option disabled selected></option>
                    <?php foreach( $mgdn as $row2 ) : ?> 
                        <option value="<?= $row2['no'] ?>"><?= $row2['nama'] ?></option>
                    <?php endforeach ?>
                    </select>
                </div>
            </div>
            <div style="margin-top: 20px;">
                <label>Satuan<span class="required">*</span></label>
                <div class="alas_luar">
                    <select class="form_input" style="width: 100%;" name="msat" id="msat" required>
                    <option disabled selected></option>
                    <?php foreach( $msat as $row5 ) : ?> 
                        <option value="<?= $row5['no'] ?>"><?= $row5['nama'] ?></option>
                    <?php endforeach ?>
                    </select>
                </div>
            </div>
            <div style="margin-top: 20px;">
                <label>Qty<span class="required">*</span></label>
                <div class="alas_luar">
                    <input type="number" name="qty" class="form_input" id="qty" min="1" max="99" value="1" onkeyup="qti()" required>
                </div>
            </div>
            <div style="margin-top: 20px;">
                <label>bobot<span class="required">*</span></label>
                <div class="alas_luar">
                    <input type="number" name="bobot" class="form_input" id="bobot" required>
                </div>
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
        var val1 = document.getElementById('tsod').value ;
        var strArray = val1.split(", ");
        var qty = document.getElementById('qty');
        qty.max = Math.ceil(strArray[5]);
        document.getElementById('mgdn').value=strArray[3];
        document.getElementById('msat').value=strArray[4];
        document.getElementById('qty').value=Math.ceil(strArray[5]);
        document.getElementById('bobot').value=Math.ceil(strArray[6]);
	}
    function qti(){
        var val1 = document.getElementById('tsod').value;
        var strArray = val1.split(", ");
        bobot = Math.ceil(strArray[6]);
        qty = Math.ceil(strArray[5]);
        bobot1 = bobot/qty;
        jumlah = document.getElementById('qty').value;
        asli = jumlah*bobot1;
        document.getElementById('bobot').value = asli;
    }
    function balik(){
        $('#tester').html('Loading...');
		$.post('<?php echo $config->base_url();?>pb.html',function(data){
			$('#tester').html(data);
		});
    }
</script>