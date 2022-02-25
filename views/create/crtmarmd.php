<div class="form_erp">
	<div class="form_erp_top">Tambah Armada</div>
	<div style="float:left;">
		<a onclick="balik()" style="color:white;text-decoration: none;">
			<svg style="width:15px;height:15px;" viewBox="0 0 24 24" class="mb-1">
				<path fill="#000000" d="M2,12A10,10 0 0,1 12,2A10,10 0 0,1 22,12A10,10 0 0,1 12,22A10,10 0 0,1 2,12M18,11H10L13.5,7.5L12.08,6.08L6.16,12L12.08,17.92L13.5,16.5L10,13H18V11Z" />
			</svg> Back To Data
		</a>
	</div>
	<div style="clear:both;"></div>
    <div class="container">
        <form action="<?php echo $config->base_url();?>insertmarmd.html" class="" method="POST">
            <input type="hidden" name="kode" value="<?= $kdarm; ?>" required>
            <input type="hidden" name="ip" value="<?= $ip; ?>" required>
            <input type="hidden" name="ws" value="<?= $ws; ?>" required>
            
            <div style="margin-top:10px">
				<label>Pilih Perusahaan<span class="required">*</span></label>
				<div class="alas_luar">
					<select class="form_input" name="mprsh" style="width:100%;" required>
					<?php foreach( $prsh as $row1 ) : ?> 
						<option value="<?= $row1['no']; ?>"><?= $row1['nama'] ?></option>
					<?php endforeach ?>
					</select>
				</div>
			</div>
            <div style="margin-top:10px">
				<label>Pilih Cabang<span class="required">*</span></label>
				<div class="alas_luar">
					<select class="form_input" name="mcab" style="width:100%;" required>
					<?php foreach( $mcab as $row ) : ?> 
						<option value="<?= $row['no']; ?>"><?= $row['nama'] ?></option>
					<?php endforeach ?>
					</select>
				</div>
			</div>
            <div style="margin-top:10px">
				<label>Nama<span class="required">*</span></label>
				<div class="alas_luar">
					<input type="text" name="nama" class="form_input" minlength="1" required autofocus>
				</div>
			</div>
            <div style="margin-top:10px">
				<label>Pilih Merk<span class="required">*</span></label>
				<div class="alas_luar">
					<select class="form_input" name="mmrk" style="width:100%;" required>
					<?php foreach( $mmrk as $row2 ) : ?> 
						<option value="<?= $row2['no']; ?>"><?= $row2['nama'] ?></option>
					<?php endforeach ?>
					</select>
				</div>
			</div>
            <div style="margin-top:10px">
				<label>Pilih Warna<span class="required">*</span></label>
				<div class="alas_luar">
					<select class="form_input" name="mwrn" style="width:100%;" required>
					<?php foreach( $mwrn as $row3 ) : ?> 
						<option value="<?= $row3['no']; ?>"><?= $row3['nama'] ?></option>
					<?php endforeach ?>
					</select>
				</div>
			</div>
            <div style="margin-top:10px">
				<label>Tipe<span class="required">*</span></label>
				<div class="alas_luar">
					<input type="text" name="tipe" class="form_input" maxlength="20" required>
				</div>
			</div>
            <div style="margin-top: 20px;">
                <label>Pilih Tahun<span class="required">*</span></label>
                <div class="alas_luar">
                    <select class="form_input" style="width: 50%;" name="tahun">
                    <?php $now=date('Y');  for($i=1980; $i<=$now; $i++ ){ ?> 
                        <option value="<?= $i; ?>"><?= $i; ?></option>
                    <?php } ?>
                    </select>
                </div>
            </div>
            <div style="margin-top:10px">
				<label>No. BPKB<span class="required">*</span></label>
				<div class="alas_luar">
					<input type="text" name="nobpkb" class="form_input" maxlength="10" required>
				</div>
			</div>
            <div style="margin-top:10px">
				<label>No. TNKB (plat)<span class="required">*</span></label>
				<div class="alas_luar">
					<input type="text" name="notnkb" class="form_input" id="Notelp" maxlength="13" required>
				</div>
			</div>
            <div style="margin-top: 20px;">
                <label>Tgl BPKB<span class="required">*</span></label>
                <div class="alas_luar">
                    <input type="date" name="tglbpkb" class="form_input" required>
                </div>
            </div>
            <div style="margin-top: 20px;">
                <label>Tgl TNKB<span class="required">*</span></label>
                <div class="alas_luar">
                    <input type="date" name="tgltnkb" class="form_input" required>
                </div>
            </div>
			<div style="margin-top:10px">
				<label>Keterangan<span class="required">*</span></label>
				<div class="alas_luar">
					<textarea class="form_input" rows="3" id="Keterangan" name="ket"></textarea>
				</div>
			</div>
            <div style="margin-top:10px">
				<label>Aktif<span class="required">*</span></label>
				<div class="alas_luar">
					<select class="form_input" style="width:100%;" name="sthapus" required>
						<option value="1">Ya</option>
						<option value="0">Tidak</option>
					</select>
				</div>
			</div>
			<div style="margin-top:16px;float:right;">
				<div class="alas_form_bawah">
					<input type="submit" value="Simpan">
				</div>
			</div>
		</form>
		<div style="clear:both;"></div>
	</div>
</div>
<script>
function balik(param){
		$('#tester').html('Loading...');
		$.post('<?php echo $config->base_url();?>marmd.html',function(data){
			$('#tester').html(data);
		});
	}
</script>