<div class="form_erp">
	<div class="form_erp_top">Tambah Pegawai</div>
	<div style="float:left;">
		<a onclick="balik()" style="color:white;text-decoration: none;">
			<svg style="width:15px;height:15px;" viewBox="0 0 24 24" class="mb-1">
				<path fill="#000000" d="M2,12A10,10 0 0,1 12,2A10,10 0 0,1 22,12A10,10 0 0,1 12,22A10,10 0 0,1 2,12M18,11H10L13.5,7.5L12.08,6.08L6.16,12L12.08,17.92L13.5,16.5L10,13H18V11Z" />
			</svg> Back To Data
		</a>
	</div>
	<div style="clear:both;"></div>
    <div class="container">
        <form action="<?php echo $config->base_url();?>updatempeg.html" class="" method="post">
            <input type="hidden" name="no" value="<?= $mpeg['no']; ?>" required>
            <input type="hidden" name="ip" value="<?= $ip; ?>" required>
            <input type="hidden" name="ws" value="<?= $ws; ?>" required>
        
            <div style="margin-top: 20px;">
                <label>Pilih Perusahaan<span class="required">*</span></label>
                <div class="alas_luar">
                    <select class="form_input" style="width: 100%;" name="mprsh">
                    <?php foreach( $prsh as $row1 ) : ?> 
                        <option value="<?= $row1['no'] ?>" <?php if($mpeg['mprsh']==$row1['no']) echo 'selected="selected"'; ?>><?= $row1['nama'] ?></option>
                    <?php endforeach ?>
                    </select>
                </div>
            </div>
            <div style="margin-top: 20px;">
                <label>Pilih Cabang<span class="required">*</span></label>
                <div class="alas_luar">
                    <select class="form_input" style="width: 100%;" name="mcab">
                    <?php foreach( $mcab as $row ) : ?> 
                        <option value="<?= $row['no'] ?>" <?php if($mpeg['mcab']==$row['no']) echo 'selected="selected"'; ?>><?= $row['nama'] ?></option>
                    <?php endforeach ?>
                    </select>
                </div>
            </div>
            <div style="margin-top: 20px;">
                <label>Nama<span class="required">*</span></label>
                <div class="alas_luar">
                    <input type="text" name="nama" class="form_input" value="<?= $mpeg['nama']; ?>" maxlength="64" required autofocus>
                </div>
            </div>
            <div style="margin-top: 20px;">
                <label>Alamat<span class="required">*</span></label>
                <div class="alas_luar">
                    <textarea class="form_input" rows="3" id="Alamat" name="alm"><?= $mpeg['alm']; ?></textarea>
                </div>
            </div>
            <div style="margin-top: 20px;">
                <label>No. Telepon<span class="required">*</span></label>
                <div class="alas_luar">
                    <input type="number" name="telp" value="<?= $mpeg['telp']; ?>" class="form_input" maxlength="15" required>
                </div>
            </div>
            <div style="margin-top: 20px;">
                <label>No. Handphone<span class="required">*</span></label>
                <div class="alas_luar">
                    <input type="number" name="hp" class="form_input" value="<?= $mpeg['hp']; ?>" maxlength="14" required>
                </div>
            </div>
            <div style="margin-top: 20px;">
                <label>Email<span class="required">*</span></label>
                <div class="alas_luar">
                    <input type="email" name="email" class="form_input" value="<?= $mpeg['email']; ?>" maxlength="128" required>
                </div>
            </div>
            <div style="margin-top: 20px;">
                <label>Akun Instagram<span class="required">*</span></label>
                <div class="alas_luar">
                    <input type="text" name="ig" class="form_input" value="<?= $mpeg['ig']; ?>" maxlength="96" required>
                </div>
            </div>
            <div style="margin-top: 20px;">
                <label>Akun Facebook<span class="required">*</span></label>
                <div class="alas_luar">
                    <input type="text" name="fb" class="form_input" value="<?= $mpeg['fb']; ?>" maxlength="96" required>
                </div>
            </div>
            <div style="margin-top: 20px;">
                <label>Pilih Bank<span class="required">*</span></label>
                <div class="alas_luar">
                    <select class="form_input" style="width: 100%;" name="bnknm">
                    <?php foreach( $mbank as $row2 ) : ?> 
                        <option value="<?= $row2['nama'] ?>" <?php if($mpeg['bnknm']==$row2['nama']) echo 'selected="selected"'; ?>><?= $row2['nama'] ?></option>
                    <?php endforeach ?>
                    </select>
                </div>
            </div>
            <div style="margin-top: 20px;">
                <label>Bank Cabang<span class="required">*</span></label>
                <div class="alas_luar">
                    <input type="text" name="bnkcab" value="<?= $mpeg['bnkcab']; ?>" class="form_input" maxlength="60" required>
                </div>
            </div>
            <div style="margin-top: 20px;">
                <label>Akun Bank<span class="required">*</span></label>
                <div class="alas_luar">
                    <input type="text" name="bnkac" value="<?= $mpeg['bnkac']; ?>" class="form_input" maxlength="40" required>
                </div>
            </div>
            <div style="margin-top: 20px;">
                <label>No. PKP<span class="required">*</span></label>
                <div class="alas_luar">
                    <input type="text" name="pkpno" value="<?= $mpeg['pkpno']; ?>" class="form_input" maxlength="20" required>
                </div>
            </div>
            <div style="margin-top: 20px;">
                <label>Nama PKP<span class="required">*</span></label>
                <div class="alas_luar">
                    <input type="text" name="pkpnm" class="form_input" value="<?= $mpeg['pkpnm']; ?>" maxlength="60" required>
                </div>
            </div>
            <div style="margin-top: 20px;">
                <label>Alamat PKP<span class="required">*</span></label>
                <div class="alas_luar">
                    <textarea class="form_input" rows="3" name="pkpalm"><?= $mpeg['pkpalm']; ?></textarea>
                </div>
            </div>
            <div style="margin-top: 20px;">
                <label>Pilih Departemen<span class="required">*</span></label>
                <div class="alas_luar">
                    <select class="form_input" style="width: 100%;" name="mdept" required>
                    <?php foreach( $mdept as $row3 ) : ?> 
                        <option value="<?= $row3['no'] ?>" <?php if($mpeg['mdept']==$row3['no']) echo 'selected="selected"'; ?>><?= $row3['nama'] ?></option>
                    <?php endforeach ?>
                    </select>
                </div>
            </div>
            <div style="margin-top: 20px;">
                <label>Posisi<span class="required">*</span></label>
                <div class="alas_luar">
                    <select class="form_input" style="width:100%;" name="pos" required>
                        <option disabled></option>
						<option>Sales</option>
						<option>Purchasing</option>
                        <option>Marketing</option>
                        <option>Gudang</option>
                        <option>IT</option>
					</select>
                </div>
            </div>
            <div style="margin-top: 20px;">
                <label>Tgl Lahir<span class="required">*</span></label>
                <div class="alas_luar">
                    <input type="date" name="tgllahir" class="form_input" value="<?= $mpeg['tgllahir']; ?>" maxlength="40" required>
                </div>
            </div>
            <div style="margin-top: 20px;">
                <label>Tgl Join<span class="required">*</span></label>
                <div class="alas_luar">
                    <input type="date" name="tgljoin" class="form_input" value="<?= $mpeg['tgljoin']; ?>" maxlength="40" required>
                </div>
            </div>
            <div style="margin-top: 20px;">
                <label>Keterangan<span class="required">*</span></label>
                <div class="alas_luar">
                    <textarea class="form_input" rows="3" name="ket"><?= $mpeg['ket']; ?></textarea>
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
		$.post('<?php echo $config->base_url();?>mpeg.html',function(data){
			$('#tester').html(data);
		});
	}
</script>