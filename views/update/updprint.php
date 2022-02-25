<div class="form_erp">
	<div class="form_erp_top">Edit Printer</div>
	<div style="float:left;">
		<a onclick="balik()" style="color:white;text-decoration: none;">
			<svg style="width:15px;height:15px;" viewBox="0 0 24 24" class="mb-1">
				<path fill="#000000" d="M2,12A10,10 0 0,1 12,2A10,10 0 0,1 22,12A10,10 0 0,1 12,22A10,10 0 0,1 2,12M18,11H10L13.5,7.5L12.08,6.08L6.16,12L12.08,17.92L13.5,16.5L10,13H18V11Z" />
			</svg> Back To Data
		</a>
	</div>
	<div style="clear:both;"></div>
    <div class="container">
        <form action="<?php echo $config->base_url();?>updatemprint.html" class="" method="POST">
            <input type="hidden" name="no" value="<?= $mprint['no'] ?>" required>
            <input type="hidden" name="ip" value="<?= $ip; ?>" required>
            <input type="hidden" name="ws" value="<?= $ws; ?>" required>
            
            <div style="margin-top:20px">
				<label>Pilih Perusahaan<span class="required">*</span></label>
				<div class="alas_luar">
					<select class="form_input" name="mprsh" style="width:100%;" required>
					<?php foreach( $prsh as $row1 ) : ?> 
						<option value="<?= $row1['no']; ?>" <?php if($mprint['mprsh']==$row1['no']) echo 'selected="selected"' ?>><?= $row1['nama'] ?></option>
					<?php endforeach ?>
					</select>
				</div>
			</div>
            <div style="margin-top:20px">
				<label>Pilih Cabang<span class="required">*</span></label>
				<div class="alas_luar">
					<select class="form_input" name="mcab" style="width:100%;" required>
					<?php foreach( $mcab as $row ) : ?> 
						<option value="<?= $row['no']; ?>" <?php if($mprint['mcab']==$row['no']) echo 'selected="selected"' ?>><?= $row['nama'] ?></option>
					<?php endforeach ?>
					</select>
				</div>
			</div>
            <div style="margin-top:20px">
				<label>Nama<span class="required">*</span></label>
				<div class="alas_luar">
					<input type="text" name="nama" value="<?= $mprint['nama']; ?>" class="form_input" required autofocus>
				</div>
			</div>
			<div style="margin-top:10px">
				<label>IP<span class="required">*</span></label>
				<div class="alas_luar">
					<input type="text" name="gip" value="<?= $mprint['ip']; ?>" class="form_input" required>
				</div>
			</div>
			<div style="margin-top:10px">
				<label>Keterangan<span class="required">*</span></label>
				<div class="alas_luar">
					<textarea class="form_input" rows="3" name="ket"><?= $mprint['ket']; ?></textarea>
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
function balik(param){
		$('#tester').html('Loading...');
		$.post('<?php echo $config->base_url();?>mprint.html',function(data){
			$('#tester').html(data);
		});
	}
</script>