<div class="form_erp">
	<div class="form_erp_top">Tambah Entitas</div>
	<div style="float:left;">
		<a onclick="balik()" style="color:white;text-decoration: none;">
			<svg style="width:15px;height:15px;" viewBox="0 0 24 24" class="mb-1">
				<path fill="#000000" d="M2,12A10,10 0 0,1 12,2A10,10 0 0,1 22,12A10,10 0 0,1 12,22A10,10 0 0,1 2,12M18,11H10L13.5,7.5L12.08,6.08L6.16,12L12.08,17.92L13.5,16.5L10,13H18V11Z" />
			</svg> Back To Data
		</a>
	</div>
	<div style="clear:both;"></div>
    <div class="container">
        <form action="<?php echo $config->base_url();?>updatementt.html" class="" method="post" enctype="multipart/form-data">
            <input type="hidden" name="no" value="<?= $mentt['no']; ?>" required>
            <input type="hidden" name="ip" value="<?= $ip; ?>" required>
            <input type="hidden" name="ws" value="<?= $ws; ?>" required>
        
            <div style="margin-top: 10px;">
                <label>Pilih Perusahaan<span class="required">*</span></label>
                <div class="alas_luar">
                    <select class="form_input" style="width: 100%;" name="mprsh">
                    <?php foreach( $prsh as $row1 ) : ?> 
                        <option value="<?= $row1['no'] ?>" <?php if($mentt['mprsh']==$row1['no']) echo 'selected="selected"'; ?>><?= $row1['nama'] ?></option>
                    <?php endforeach ?>
                    </select>
                </div>
            </div>
            <div style="margin-top: 10px;">
                <label>Pilih Cabang<span class="required">*</span></label>
                <div class="alas_luar">
                    <select class="form_input" style="width: 100%;" name="mcab">
                    <?php foreach( $mcab as $row ) : ?> 
                        <option value="<?= $row['no'] ?>" <?php if($mentt['mcab']==$row['no']) echo 'selected="selected"'; ?>><?= $row['nama'] ?></option>
                    <?php endforeach ?>
                    </select>
                </div>
            </div>
            <div style="margin-top: 10px;">
                <label>Kode GL<span class="required">*</span></label>
                <div class="alas_luar">
                    <input type="text" name="kodegl" value="<?= $mentt['kodegl']; ?>" class="form_input" maxlength="16">
                </div>
            </div>
            <div style="margin-top: 10px;">
                <label>Nama<span class="required">*</span></label>
                <div class="alas_luar">
                    <input type="text" name="nama" class="form_input" value="<?= $mentt['nama']; ?>" maxlength="64" required autofocus>
                </div>
            </div>
            <div style="margin-top: 10px;">
                <label>Alamat<span class="required">*</span></label>
                <div class="alas_luar">
                    <textarea class="form_input" rows="3" name="alm" required><?= $mentt['alm']; ?></textarea>
                </div>
            </div>
            <div style="margin-top: 10px;">
                <label>No. Telepon<span class="required">*</span></label>
                <div class="alas_luar">
                    <input type="number" name="telp" class="form_input" value="<?= $mentt['telp']; ?>" maxlength="15" required>
                </div>
            </div>
            <div style="margin-top: 10px;">
                <label>No. Fax<span class="required">*</span></label>
                <div class="alas_luar">
                    <input type="number" name="fax" class="form_input" value="<?= $mentt['fax']; ?>" maxlength="15" required>
                </div>
            </div>
            <div style="margin-top: 10px;">
                <label>No. Handphone<span class="required">*</span></label>
                <div class="alas_luar">
                    <input type="number" name="hp" class="form_input" value="<?= $mentt['hp']; ?>" maxlength="15" required>
                </div>
            </div>
            <div style="margin-top: 10px;">
                <label>Email<span class="required">*</span></label>
                <div class="alas_luar">
                    <input type="email" name="email" class="form_input" value="<?= $mentt['email']; ?>" maxlength="128" required>
                </div>
            </div>
            <div style="margin-top: 10px;">
                <label>Akun Instagram<span class="required">*</span></label>
                <div class="alas_luar">
                    <input type="text" name="ig" class="form_input" value="<?= $mentt['ig']; ?>" maxlength="96" required>
                </div>
            </div>
            <div style="margin-top: 10px;">
                <label>Akun Facebook<span class="required">*</span></label>
                <div class="alas_luar">
                    <input type="text" name="fb" class="form_input" value="<?= $mentt['fb']; ?>" maxlength="96">
                </div>
            </div>
            <div style="margin-top: 10px;">
                <label>Pilih Bank<span class="required">*</span></label>
                <div class="alas_luar">
                    <select class="form_input" style="width: 100%;" name="bnknm">
                    <?php foreach( $mbank as $row2 ) : ?> 
                        <option value="<?= $row2['nama'] ?>" <?php if($mentt['bnknm']==$row2['nama']) echo 'selected="selected"'; ?>><?= $row2['nama'] ?></option>
                    <?php endforeach ?>
                    </select>
                </div>
            </div>
            <div style="margin-top: 10px;">
                <label>Cabang Bank<span class="required">*</span></label>
                <div class="alas_luar">
                    <input type="text" name="bnkcab" class="form_input" value="<?= $mentt['bnkcab'];?>" maxlength="128" required>
                </div>
            </div>
            <div style="margin-top: 10px;">
                <label>Akun Bank<span class="required">*</span></label>
                <div class="alas_luar">
                    <input type="text" name="bnkac" value="<?= $mentt['bnkac']; ?>" class="form_input" maxlength="40" required>
                </div>
            </div>
            <div style="margin-top: 10px;">
                <label>No. PKP<span class="required">*</span></label>
                <div class="alas_luar">
                    <input type="text" name="pkpno" value="<?= $mentt['pkpno']; ?>" class="form_input" maxlength="64">
                </div>
            </div>
            <div style="margin-top: 10px;">
                <label>Nama PKP<span class="required">*</span></label>
                <div class="alas_luar">
                    <input type="text" name="pkpnm" value="<?= $mentt['pkpnm']; ?>" class="form_input" maxlength="96">
                </div>
            </div>
            <div style="margin-top: 10px;">
                <label>Alamat PKP<span class="required">*</span></label>
                <div class="alas_luar">
                    <textarea class="form_input" rows="3" name="pkpalm"><?= $mentt['pkpalm']; ?></textarea>
                </div>
            </div>
            <div style="margin-top: 10px;">
                <label>Nama Kontak<span class="required">*</span></label>
                <div class="alas_luar">
                    <input type="text" name="cpnm" class="form_input" value="<?= $mentt['cpnm']; ?>" maxlength="96" required>
                </div>
            </div>
            <div style="margin-top: 10px;">
                <label>No. Handphone Kontak<span class="required">*</span></label>
                <div class="alas_luar">
                    <input type="number" name="cphp" class="form_input" value="<?= $mentt['cphp']; ?>" maxlength="16" required>
                </div>
            </div>
            <div style="margin-top: 10px;">
                <label>Email Kontak<span class="required">*</span></label>
                <div class="alas_luar">
                    <input type="email" name="cpemail" class="form_input" value="<?= $mentt['cpemail']; ?>" maxlength="128" required>
                </div>
            </div>
            <div style="margin-top: 10px;">
                <label>IG Kontak<span class="required">*</span></label>
                <div class="alas_luar">
                    <input type="text" name="cpig" class="form_input" value="<?= $mentt['cpig']; ?>" maxlength="96">
                </div>
            </div>
            <div style="margin-top: 10px;">
                <label>FB Kontak<span class="required">*</span></label>
                <div class="alas_luar">
                    <input type="text" name="cpfb" class="form_input" value="<?= $mentt['cpfb']; ?>" maxlength="96">
                </div>
            </div>
            <div style="margin-top: 10px;">
                <label>LIMIT<span class="required">*</span></label>
                <div class="alas_luar">
                    <textarea class="form_input" rows="3" name="limit" required><?= $mentt['limit']; ?></textarea>
                </div>
            </div>
            <div style="margin-top: 10px;">
                <label>Alamat Pengiriman<span class="required">*</span></label>
                <div class="alas_luar">
                    <textarea class="form_input" rows="3" name="almkrm" required><?= $mentt['almkrm']; ?></textarea>
                </div>
            </div>
            <div style="margin-top: 10px;">
                <label>Keterangan<span class="required">*</span></label>
                <div class="alas_luar">
                    <textarea class="form_input" rows="3" name="ket"><?= $mentt['ket']; ?></textarea>
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
		$.post('<?php echo $config->base_url();?>mentt.html',function(data){
			$('#tester').html(data);
		});
	}
</script>