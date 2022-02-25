<div class="form_erp">
	<div class="form_erp_top">Tambah Barang</div>
	<div style="float:left;">
		<a onclick="balik('7')" style="color:white;text-decoration: none;">
			<svg style="width:15px;height:15px;" viewBox="0 0 24 24" class="mb-1">
				<path fill="#000000" d="M2,12A10,10 0 0,1 12,2A10,10 0 0,1 22,12A10,10 0 0,1 12,22A10,10 0 0,1 2,12M18,11H10L13.5,7.5L12.08,6.08L6.16,12L12.08,17.92L13.5,16.5L10,13H18V11Z" />
			</svg> Back To Data
		</a>
	</div>
	<div style="clear:both;"></div>
    <div class="container">
        <form action="<?php echo $config->base_url();?>insertmbrg.html" class="" enctype="multipart/form-data" method="post">
            <input type="hidden" name="kode" value="<?= $kdbrg; ?>" required>
            <input type="hidden" name="ip" value="<?= $ip; ?>" required>
            <input type="hidden" name="ws" value="<?= $ws; ?>" required>
        
            <div style="margin-top: 10px;">
                <label>Pilih Perusahaan<span class="required">*</span></label>
                <div class="alas_luar">    
                    <select class="form_input" style="width:100%;" name="mprsh" required>
                    <?php foreach( $prsh as $row1 ) : ?> 
                        <option value="<?= $row1['no'] ?>"><?= $row1['nama'] ?></option>
                    <?php endforeach ?>
                    </select>
                </div>
            </div>
            <div style="margin-top: 10px;">
                <label>Pilih Cabang<span class="required">*</span></label>
                <div class="alas_luar">
                    <select class="form_input" style="width: 100%;" name="mcab" required>
                    <?php foreach( $mcab as $row ) : ?> 
                        <option value="<?= $row['no'] ?>"><?= $row['nama'] ?></option>
                    <?php endforeach ?>
                    </select>
                </div>
            </div>
            <div style="margin-top: 10px;">
                <label>Kode GL<span class="required">*</span></label>
                <div class="alas_luar">
                    <input type="text" name="kodegl" class="form_input" minlength="1" maxlength="16">
                </div>
            </div>
            <div style="margin-top: 10px;">
                <label>Nama Barang<span class="required">*</span></label>
                <div class="alas_luar">
                    <input type="text" name="nama" class="form_input" minlength="1" required autofocus>
                </div>
            </div>
            <div style="margin-top: 10px;">
                <label>Pilih Merk<span class="required">*</span></label>
                <div class="alas_luar">
                    <select class="form_input" style="width: 100%;" name="mmrk" required>
                    <?php foreach( $mmrk as $row2 ) : ?> 
                        <option value="<?= $row2['no'] ?>"><?= $row2['nama'] ?></option>
                    <?php endforeach ?>
                    </select>
                </div>
            </div>
            <div style="margin-top: 10px;">
                <label>Pilih Satuan<span class="required">*</span></label>
                <div class="alas_luar">
                    <select class="form_input" style="width: 100%;" name="msat" required>
                    <?php foreach( $msat as $row3 ) : ?> 
                        <option value="<?= $row3['no'] ?>"><?= $row3['nama'] ?></option>
                    <?php endforeach ?>
                    </select>
                </div>
            </div>
            <div style="margin-top: 10px;">
                <label>Pilih Warna<span class="required">*</span></label>
                <div class="alas_luar">
                    <select class="form_input" style="width: 100%;" name="mwrn" required>
                    <?php foreach( $mwrn as $row4 ) : ?> 
                        <option value="<?= $row4['no'] ?>"><?= $row4['nama'] ?></option>
                    <?php endforeach ?>
                    </select>
                </div>
            </div>
            <div style="margin-top: 10px;">
                <label>Pilih Kategori 1<span class="required">*</span></label>
                <div class="alas_luar">
                    <select class="form_input" style="width: 100%;" name="mkat1">
                    <?php foreach( $mkat1 as $row5 ) : ?> 
                        <option value="<?= $row5['no'] ?>"><?= $row5['nama'] ?></option>
                    <?php endforeach ?>
                    </select>
                </div>
            </div>
            <div style="margin-top: 10px;">
                <label>Pilih Kategori 2<span class="required">*</span></label>
                <div class="alas_luar">
                    <select class="form_input" style="width: 100%;" name="mkat2">
                    <?php foreach( $mkat2 as $row6 ) : ?> 
                        <option value="<?= $row6['no'] ?>"><?= $row6['nama'] ?></option>
                    <?php endforeach ?>
                    </select>
                </div>
            </div>
            <div style="margin-top: 10px;">
                <label>Pilih Kategori 3<span class="required">*</span></label>
                <div class="alas_luar">
                    <select class="form_input" style="width: 100%;" name="mkat3">
                    <?php foreach( $mkat3 as $row7 ) : ?> 
                        <option value="<?= $row7['no'] ?>"><?= $row7['nama'] ?></option>
                    <?php endforeach ?>
                    </select>
                </div>
            </div>
            <div style="margin-top: 10px;">
                <label>Stok Min<span class="required">*</span></label>
                <div class="alas_luar">
                    <input type="text" name="stokmin" class="form_input" minlength="1" required>
                </div>
            </div>
            <div style="margin-top: 10px;">
                <label>Bobot <span class="required"> *kg</span></label>
                <div class="alas_luar">
                    <input type="double" name="bobot" class="form_input" minlength="1" required>
                </div>
            </div>
            <div style="margin-top: 10px;">
                <label>Harga Min<span class="required">*</span></label>
                <div class="alas_luar">
                    <input type="text" name="hargamin" class="form_input" minlength="1" required>
                </div>
            </div>
            <div style="margin-top: 10px;">
                <label>HPP<span class="required">*</span></label>
                <div class="alas_luar">
                    <input type="double" name="hpp" class="form_input" minlength="1" required>
                </div>
            </div>
            <div style="margin-top: 10px;">
                <label>Harga<span class="required">*</span></label>
                <div class="alas_luar">
                    <input type="double" name="harga" class="form_input" minlength="1" required>
                </div>
            </div>
            <div style="margin-top: 10px;">
                <label>Tag<span class="required">*</span></label>
                <div class="alas_luar">
                    <input type="text" name="tag" class="form_input" minlength="1" required>
                </div>
            </div>
            <div style="margin-top: 10px;">
                <label>Upload Gambar<span class="required">*</span></label>
                <div class="alas_luar">
                    <input name="gmbr" type="file" class="form_input" required /><br/>
                </div>
            </div>
            <div style="margin-top: 10px;">
                <label>Keterangan<span class="required">*</span></label>
                <div class="alas_luar">
                    <textarea class="form_input" rows="3" name="ket"></textarea>
                </div>
            </div>
            <div style="margin-top:10px">
			    <label>Status Trade<span class="required">*</span></label>
			    <div class="alas_luar">
                    <select class="form_input" style="width:100%;" name="sttrade">
                        <option value="1">Ya</option>
                        <option value="0">Tidak</option>
                    </select>
                </div>
            </div>
            <div style="margin-top:10px">
			    <label>Status Aset<span class="required">*</span></label>
			    <div class="alas_luar">
                    <select class="form_input" style="width:100%;" name="staset" required>
                        <option value="1">Ya</option>
                        <option value="0">Tidak</option>
                    </select>
                </div>
            </div>
            <div style="margin-top:10px">
			    <label>Status ATK<span class="required">*</span></label>
			    <div class="alas_luar">
                    <select class="form_input" style="width:100%;" name="statk" required>
                        <option value="1">Ya</option>
                        <option value="0">Tidak</option>
                    </select>
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
		$.post('<?php echo $config->base_url();?>mbrg/'+ param +'.html',function(data){
			$('#tester').html(data);
		});
	}
</script>