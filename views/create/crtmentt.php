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
        <form action="<?php echo $config->base_url();?>insertmen.html" class="" method="post" enctype="multipart/form-data">
            <input type="hidden" name="kode" value="<?= $kdentt; ?>" required>
            <input type="hidden" name="ip" value="<?= $ip; ?>" required>
            <input type="hidden" name="ws" value="<?= $ws; ?>" required>

            <div style="margin-top: 10px;">
                <label>Pilih Perusahaan<span class="required">*</span></label>
                <div class="alas_luar">
                    <select class="form_input" style="width: 100%;" name="mprsh">
                    <?php foreach( $prsh as $row1 ) : ?> 
                        <option value="<?= $row1['no'] ?>"><?= $row1['nama'] ?></option>
                    <?php endforeach ?>
                    </select>
                </div>
            </div>
            <div style="margin-top: 10px;">
                <label>Pilih Cabang<span class="required">*</span></label>
                <div class="alas_luar">
                    <select class="form_input" style="width: 100%;" name="mcab">
                    <?php foreach( $mcab as $row ) : ?> 
                        <option value="<?= $row['no'] ?>"><?= $row['nama'] ?></option>
                    <?php endforeach ?>
                    </select>
                </div>
            </div>
            <div style="margin-top: 10px;">
                <label>Kode GL<span class="required">*</span></label>
                <div class="alas_luar">
                    <input type="text" name="kodegl" class="form_input" maxlength="16">
                </div>
            </div>
            <div style="margin-top: 10px;">
                <label>Nama<span class="required">*</span></label>
                <div class="alas_luar">
                    <input type="text" name="nama" class="form_input" maxlength="64" required autofocus>
                </div>
            </div>
            <div style="margin-top: 10px;">
                <label>Alamat<span class="required">*</span></label>
                <div class="alas_luar">
                    <textarea class="form_input" rows="3" name="alm" required></textarea>
                </div>
            </div>
            <div style="margin-top: 10px;">
                <label>No. Telepon<span class="required">*</span></label>
                <div class="alas_luar">
                    <input type="number" name="telp" class="form_input" maxlength="15" required>
                </div>
            </div>
            <div style="margin-top: 10px;">
                <label>No. Fax<span class="required">*</span></label>
                <div class="alas_luar">
                    <input type="number" name="fax" class="form_input" maxlength="15" required>
                </div>
            </div>
            <div style="margin-top: 10px;">
                <label>No. Handphone<span class="required">*</span></label>
                <div class="alas_luar">
                    <input type="number" name="hp" class="form_input" maxlength="15" required>
                </div>
            </div>
            <div style="margin-top: 10px;">
                <label>Email<span class="required">*</span></label>
                <div class="alas_luar">
                    <input type="email" name="email" class="form_input" maxlength="128" required>
                </div>
            </div>
            <div style="margin-top: 10px;">
                <label>Akun Instagram<span class="required">*</span></label>
                <div class="alas_luar">
                    <input type="text" name="ig" class="form_input" maxlength="96" required>
                </div>
            </div>
            <div style="margin-top: 10px;">
                <label>Akun Facebook<span class="required">*</span></label>
                <div class="alas_luar">
                    <input type="text" name="fb" class="form_input" maxlength="96">
                </div>
            </div>
            <div style="margin-top: 10px;">
                <label>Pilih Bank<span class="required">*</span></label>
                <div class="alas_luar">
                    <select class="form_input" style="width: 100%;" name="bnknm">
                    <?php foreach( $mbank as $row2 ) : ?> 
                        <option value="<?= $row2['nama'] ?>"><?= $row2['nama'] ?></option>
                    <?php endforeach ?>
                    </select>
                </div>
            </div>
            <div style="margin-top: 10px;">
                <label>Cabang Bank<span class="required">*</span></label>
                <div class="alas_luar">
                    <input type="text" name="bnkcab" class="form_input" maxlength="128" required>
                </div>
            </div>
            <div style="margin-top: 10px;">
                <label>Akun Bank<span class="required">*</span></label>
                <div class="alas_luar">
                    <input type="text" name="bnkac" class="form_input" maxlength="40" required>
                </div>
            </div>
            <div style="margin-top: 10px;">
                <label>No. PKP<span class="required">*</span></label>
                <div class="alas_luar">
                    <input type="text" name="pkpno" class="form_input" maxlength="64">
                </div>
            </div>
            <div style="margin-top: 10px;">
                <label>Nama PKP<span class="required">*</span></label>
                <div class="alas_luar">
                    <input type="text" name="pkpnm" class="form_input" maxlength="96">
                </div>
            </div>
            <div style="margin-top: 10px;">
                <label>Alamat PKP<span class="required">*</span></label>
                <div class="alas_luar">
                    <textarea class="form_input" rows="3" name="pkpalm"></textarea>
                </div>
            </div>
            <div style="margin-top: 10px;">
                <label>Nama Kontak<span class="required">*</span></label>
                <div class="alas_luar">
                    <input type="text" name="cpnm" class="form_input" maxlength="96" required>
                </div>
            </div>
            <div style="margin-top: 10px;">
                <label>No. Handphone Kontak<span class="required">*</span></label>
                <div class="alas_luar">
                    <input type="number" name="cphp" class="form_input" maxlength="16" required>
                </div>
            </div>
            <div style="margin-top: 10px;">
                <label>Email Kontak<span class="required">*</span></label>
                <div class="alas_luar">
                    <input type="email" name="cpemail" class="form_input" maxlength="128" required>
                </div>
            </div>
            <div style="margin-top: 10px;">
                <label>IG Kontak<span class="required">*</span></label>
                <div class="alas_luar">
                    <input type="text" name="cpig" class="form_input" maxlength="96">
                </div>
            </div>
            <div style="margin-top: 10px;">
                <label>FB Kontak<span class="required">*</span></label>
                <div class="alas_luar">
                    <input type="text" name="cpfb" class="form_input" maxlength="96">
                </div>
            </div>
            <div style="margin-top: 10px;">
                <label>LIMIT<span class="required">*</span></label>
                <div class="alas_luar">
                    <textarea class="form_input" rows="3" name="limit" required></textarea>
                </div>
            </div>
            <div style="margin-top: 10px;">
                <label>Alamat Pengiriman<span class="required">*</span></label>
                <div class="alas_luar">
                    <textarea class="form_input" rows="3" name="almkrm" required></textarea>
                </div>
            </div>
            <div style="margin-top: 10px;">
                <label>Keterangan<span class="required">*</span></label>
                <div class="alas_luar">
                    <textarea class="form_input" rows="3" name="ket"></textarea>
                </div>
            </div>
            <div style="margin-top: 10px;">
                <label>Supplier</label>
                <div class="alas_luar">
                    <select class="form_input" style="width: 100%;" name="stsup">
                        <option value="1">Ya</option>
                        <option value="0">Tidak</option>
                    </select>
                </div>
            </div>
            <div style="margin-top: 10px;">
                <label>Customer ?</label>
                <div class="alas_luar">
                    <select class="form_input" style="width: 100%;" name="stcust">
                        <option value="1">Ya</option>
                        <option value="0">Tidak</option>
                    </select>
                </div>
            </div>
            <div style="margin-top: 10px;">
                <label>Aktif ?</label>
                <div class="alas_luar">
                    <select class="form_input" style="width: 100%;" name="sthapus">
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
<script>
function balik(){
		$('#tester').html('Loading...');
		$.post('<?php echo $config->base_url();?>mentt.html',function(data){
			$('#tester').html(data);
		});
	}
</script>