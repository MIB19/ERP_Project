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
        <form action="<?php echo $config->base_url();?>inserttpbh.html" class="" method="post">
            <input type="hidden" name="kode" value="<?= $kd; ?>" required>
            <input type="hidden" name="ip" value="<?= $ip; ?>" required>
            <input type="hidden" name="ws" value="<?= $ws; ?>" required>
        
            <div style="margin-top: 20px;">
                <label>Kode Gl<span class="required">*</span></label>
                <div class="alas_luar">
                    <input type="text" name="kodegl" class="form_input" maxlength="16">
                </div>
            </div>
            <div style="margin-top: 20px;">
                <label>Nomor Surat Jalan<span class="required">*</span></label>
                <div class="alas_luar">
                    <input type="text" name="supsj" id="supsj" class="form_input" required>
                </div>
            </div>
            <div style="margin-top: 20px;">
                <label>Pilih Gudang<span class="required">*</span></label>
                <div class="alas_luar">
                    <select class="form_input" style="width: 100%;" name="mgdn" required>
                    <option disabled selected></option>
                    <?php foreach( $mgdn as $row2 ) : ?> 
                        <option value="<?= $row2['no'] ?>"><?= $row2['nama'] ?></option>
                    <?php endforeach ?>
                    </select>
                </div>
            </div>
            <div style="margin-top: 20px;">
                <label>Pilih PO</label>
                <div class="alas_luar">
                    <input type="text" class="form_input" name="tpoh" id="tpoh" list="PO" >
                </div>
            </div>
                <datalist id="PO">
                    <?php foreach( $tpoh as $row4 ) : ?>
                        <option value="<?=$row4['kode'];?>, <?=$row4['sup'];?>, <?= $row4['no'];?>, <?= $row4['mprsh']; ?>, <?= $row4['mcab']; ?>, <?=$row4['mentt'];?>, <?= $row4['supcp']; ?>, <?= $row4['meks']; ?>, <?= $row4['jppn'];?>, <?= $row4['jbyr'];?>, <?= $row4['sbtot'];?>, <?= $row4['prsn'];?>, <?= $row4['dsc'];?>, <?= $row4['dpp'];?>, <?= $row4['ppn'];?>, <?= $row4['tot'];?>"><?=$row4['kode'];?></option>
                    <?php endforeach ?>
                </datalist>
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
		$.post('<?php echo $config->base_url();?>pb.html',function(data){
			$('#tester').html(data);
		});
	}
</script>