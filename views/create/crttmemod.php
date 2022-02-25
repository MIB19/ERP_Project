<div class="form_erp">
	<div class="form_erp_top">Tambah Detail Barang</div>
	<div style="float:left;">
		<a style="color:white;text-decoration: none; cursor: pointer;" onclick="balik()">
			<svg style="width:15px;height:15px;" viewBox="0 0 24 24" class="mb-1">
				<path fill="#000000" d="M2,12A10,10 0 0,1 12,2A10,10 0 0,1 22,12A10,10 0 0,1 12,22A10,10 0 0,1 2,12M18,11H10L13.5,7.5L12.08,6.08L6.16,12L12.08,17.92L13.5,16.5L10,13H18V11Z" />
			</svg> Back To Data
		</a>
	</div>
	<div style="clear:both;"></div>
    <div class="container">
        <form action="<?php echo $config->base_url();?>inserttmemod.html" class="" method="post">
            <input type="hidden" id="kode" name="kode" value="<?= $kode ?>" required>
            <input type="hidden" id="tmemoh" name="tmemoh" value="<?= $id; ?>" required>
    
            <div style="margin-top: 20px;">
                <label>Pilih Barang</label>
                <div class="alas_luar">
                    <input type="text" class="form_input" name="mbrg" id="mbrg" list="cityname">
                </div>
            </div>
                <datalist id="cityname">
                <?php foreach( $mbrg as $row4 ) : ?>
                    <option value="<?= $row4['no'];?>, <?=$row4['nama'];?>"><?=$row4['nama'];?></option>
                <?php endforeach ?>
                </datalist>
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
                    <input type="number" name="qty" class="form_input" id="qty" value="1">
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
    function balik(){
        $('#tester').html('Loading...');
		$.post('<?php echo $config->base_url();?>mk.html',function(data){
			$('#tester').html(data);
		});
    }
</script>