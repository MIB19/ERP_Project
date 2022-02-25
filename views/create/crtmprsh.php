<div class="form_erp">
	<div class="form_erp_top">Tambah Perusahaan</div>
	<div style="float:left;">
		<a href="<?php echo $config->base_url();?>" style="color:white;text-decoration: none;">
			<svg style="width:15px;height:15px;" viewBox="0 0 24 24" class="mb-1">
				<path fill="#000000" d="M2,12A10,10 0 0,1 12,2A10,10 0 0,1 22,12A10,10 0 0,1 12,22A10,10 0 0,1 2,12M18,11H10L13.5,7.5L12.08,6.08L6.16,12L12.08,17.92L13.5,16.5L10,13H18V11Z" />
			</svg> Back To Data
		</a>
	</div>
	<div style="clear:both;"></div>
	<div class="container">
		<form action="<?php echo $config->base_url();?>insertprsh.html" class="" method="POST">
			<input type="hidden" name="kode" value="<?= $code; ?>" required>
			<input type="hidden" name="ip" value="<?= $ip; ?>" required>
			<input type="hidden" name="ws" value="<?= $ws; ?>" required>
			
			<div style="margin-top:10px">
				<label>Nama<span class="required">*</span></label>
				<div class="alas_luar">
					<input type="text" name="nama" class="form_input" id="Nama" required autofocus>
				</div>
			</div>
			<div style="margin-top:10px">
				<label>Alamat<span class="required">*</span></label>
				<div class="alas_luar">
					<textarea class="form_input" rows="3" id="Alamat" name="alamat" required></textarea>
				</div>
			</div>
			<div style="margin-top:10px">
				<label>No.Telepon<span class="required">*</span></label>
				<div class="alas_luar">
					<input type="number" name="notelp" class="form_input" id="Notelp" maxlength="13" minlength="6" required>
				</div>
			</div>
			<div style="margin-top:10px">
				<label>No. Fax<span class="required">*</span></label>
				<div class="alas_luar">
					<input type="number" name="fax" class="form_input" id="Fax" minlength="3" required>
				</div>
			</div>
			<div style="margin-top:10px">
				<label>No.Handphone<span class="required">*</span></label>
				<div class="alas_luar">
					<input type="number" name="nohp" class="form_input" id="Nohp" maxlength="13" minlength="6" required>
				</div>
			</div>
			<div style="margin-top:10px">
				<label>Email<span class="required">*</span></label>
				<div class="alas_luar">
					<input type="email" name="email" class="form_input" id="Email" maxlength="50" required>
				</div>
			</div>
			<div style="margin-top:10px">
				<label>Pilih Bank<span class="required">*</span></label>
				<div class="alas_luar">
					<select class="form_input" id="Bank" name="bank" style="width:100%;" required>
					<?php foreach( $bank as $row ) : ?> 
						<option><?= $row['nama'] ?></option>
					<?php endforeach ?>
					</select>
				</div>
			</div>
			<div style="margin-top:10px">
				<label>Cabang<span class="required">*</span></label>
				<div class="alas_luar">
					<input type="text" name="cabang" class="form_input" id="Bnkcab" required autofocus>
				</div>
			</div>
			<div style="margin-top:10px">
				<label>Nama Akun Bank<span class="required">*</span></label>
				<div class="alas_luar">
					<input type="text" name="bnkac" class="form_input" id="Bnkac" required autofocus>
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
					<select class="form_input" id="Sthapus" style="width:100%;" name="sthapus" required>
						<option value="1">Ya</option>
						<option value="0">Tidak</option>
					</select>
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