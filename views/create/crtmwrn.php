<div class="form_erp">
	<div class="form_erp_top">Tambah Warna</div>
	<div style="float:left;">
		<a onclick="back('1')" style="color:white;text-decoration: none;">
			<svg style="width:15px;height:15px;" viewBox="0 0 24 24" class="mb-1">
				<path fill="#000000" d="M2,12A10,10 0 0,1 12,2A10,10 0 0,1 22,12A10,10 0 0,1 12,22A10,10 0 0,1 2,12M18,11H10L13.5,7.5L12.08,6.08L6.16,12L12.08,17.92L13.5,16.5L10,13H18V11Z" />
			</svg> Back To Data
		</a>
	</div>
	<div style="clear:both;"></div>
    <div class="container">
        <form action="<?php echo $config->base_url();?>insertmwrn.html" class="" method="POST">
            <input type="hidden" name="kode" value="<?= $kdwrn; ?>" required>
            <input type="hidden" name="ip" value="<?= $ip; ?>" required>
            <input type="hidden" name="ws" value="<?= $ws; ?>" required>
            <div style="margin-top:10px;">
                <label><span class="required">*</span>Nama</label>
                <input type="text" name="nama" class="form_input" minlength="1" required autofocus>
            </div>
            <div style="margin-top:10px;">
                <label><span class="required">*</span>Keterangan</label>
                <textarea class="form_input" rows="3" name="ket"></textarea>
            </div>
            <div style="margin-top: 10px;">
                <label><span class="required">*</span>Aktif</label>
                <div class="alas_luar">
                    <select class="form_input" style="width:100%;" name="sthapus" required>
                        <option value="1">Ya</option>
                        <option value="0">Tidak</option>
                    </select>
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
    function back(param){
		$('#tester').html('Loading...');
		$.post('<?php echo $config->base_url();?>mbrg/'+ param +'.html',function(data){
			$('#tester').html(data);
		});
	}
</script>
</div>
