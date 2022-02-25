<div class="form_erp">
	<div class="form_erp_top">Tambah Invoice Jual</div>
	<div style="float:left;">
		<a style="color:white;text-decoration: none; cursor: pointer;" onclick="balik()">
			<svg style="width:15px;height:15px;" viewBox="0 0 24 24" class="mb-1">
				<path fill="#000000" d="M2,12A10,10 0 0,1 12,2A10,10 0 0,1 22,12A10,10 0 0,1 12,22A10,10 0 0,1 2,12M18,11H10L13.5,7.5L12.08,6.08L6.16,12L12.08,17.92L13.5,16.5L10,13H18V11Z" />
			</svg> Back To Data
		</a>
	</div>
	<div style="clear:both;"></div>
    <div class="container">
        <form action="<?php echo $config->base_url();?>inserttijh.html" class="" method="post">
            <input type="hidden" name="kode" value="<?= $kd; ?>" required>
            <input type="hidden" name="ip" value="<?= $ip; ?>" required>
            <input type="hidden" name="ws" value="<?= $ws; ?>" required>
        
            <div style="margin-top: 20px;">
                <label>Pilih Perusahaan<span class="required">*</span></label>
                <div class="alas_luar">
                    <select class="form_input" style="width: 100%;" name="mprsh" required>
                    <option disabled selected></option>
                    <?php foreach( $mprsh as $row1 ) : ?> 
                        <option value="<?= $row1['no'] ?>"><?= $row1['nama'] ?></option>
                    <?php endforeach ?>
                    </select>
                </div>
            </div>
            <div style="margin-top: 20px;">
                <label>Pilih Cabang<span class="required">*</span></label>
                <div class="alas_luar">
                    <select class="form_input" style="width: 100%;" name="mcab" required>
                    <option disabled selected></option>
                    <?php foreach( $mcab as $row ) : ?> 
                        <option value="<?= $row['no'] ?>"><?= $row['nama'] ?></option>
                    <?php endforeach ?>
                    </select>
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
                <label>Pilih Customer</label>
                <div class="alas_luar">
                    <input type="text" class="form_input" name="mentt" id="mentt" list="PO" required>
                </div>
            </div>
                <datalist id="PO">
                    <?php foreach( $mentt as $row5 ) : ?>
                        <option value="<?= $row5['no'];?>, <?=$row5['nama'];?>"><?=$row5['nama'];?></option>
                    <?php endforeach ?>
                </datalist>
            <div style="margin-top: 20px;">
                <label>Customer PO<span class="required">*</span></label>
                <div class="alas_luar">
                    <input type="text" name="custpo" id="custpo" class="form_input" required>
                </div>
            </div>
            <div style="margin-top: 20px;">
                <label>Pilih Sales<span class="required">*</span></label>
                <div class="alas_luar">
                    <select class="form_input" style="width: 100%;" name="mpeg" required>
                    <option disabled selected></option>
                    <?php foreach( $mpeg as $row4 ) : ?> 
                        <option value="<?= $row4['no'] ?>|<?= $row4['nama'];?>"><?= $row4['nama'] ?></option>
                    <?php endforeach ?>
                    </select>
                </div>
            </div>
            <div style="margin-top: 20px;">
                <label>Tanggal<span class="required">*</span></label>
                <div class="alas_luar">
                    <input type="date" name="tgl" class="form_input" id="tgl">
                </div>
            </div>
            <div style="margin-top: 20px;">
                <label>Jenis Pembayaran<span class="required">*</span></label>
                <div class="alas_luar">
                    <select class="form_input" style="width: 100%;" name="jbyr" required>
                        <option disabled selected></option>
                        <option>tunai</option>
                        <option>kredit</option>
                    </select>
                </div>
            </div>
            <div style="margin-top: 20px;">
                <label>Termin<span class="required">*</span></label>
                <div class="alas_luar">
                    <input type="number" name="termin" id="term" class="form_input" required>
                </div>
            </div>
            <div style="margin-top: 20px;">
                <label>Tanggal Jatuh Tempo<span class="required">*</span></label>
                <div class="alas_luar">
                    <input type="date" name="tgljt" class="form_input" id="tgljt" required>
                </div>
            </div>
            <div style="margin-top: 20px;">
                <label>No Faktur<span class="required">*</span></label>
                <div class="alas_luar">
                    <input type="text" name="nofp" id="nofp" class="form_input" required>
                </div>
            </div>
            <div style="margin-top: 20px;">
                <label>Tanggal Faktur<span class="required">*</span></label>
                <div class="alas_luar">
                    <input type="date" name="tglfp" class="form_input" id="tglfp" required>
                </div>
            </div>
            <div style="margin-top: 20px;">
                <label>DPP<span class="required">*</span></label>
                <div class="alas_luar">
                    <input type="number" name="dpp" id="dpp" class="form_input" required>
                </div>
            </div>
            <!-- <div style="margin-top: 20px;">
                <label>Subtotal<span class="required">*</span></label>
                <div class="alas_luar">
                    <input type="text" name="sub" id="sub" class="form_input">
                </div>
            </div>
            <div style="margin-top: 20px;">
                <label>Diskon Tambahan<span class="required">*</span></label>
                <div class="alas_luar">
                    <input type="number" name="dsc" id="dsc" class="form_input" onchange="key()">
                </div>
            </div>
            <div style="margin-top: 20px;">
                <label>DPP<span class="required">*</span></label>
                <div class="alas_luar">
                    <input type="number" name="dpp" id="dpp" class="form_input">
                </div>
            </div>
            <div style="margin-top: 20px;">
                <label>TOTAL<span class="required">*</span></label>
                <div class="alas_luar">
                    <input type="text" name="tot" id="tot" class="form_input">
                </div>
            </div> -->
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
    /* function key(){
        tot = 0;
        dis = 0;
        jumlah = <?= $jum; ?>;
        var ppb = document.getElementById('jppn').value;
        dis = document.getElementById('dsc').value;
        if(ppb == 1){
            dsc = jumlah*dis/100;
            total = jumlah-dsc;
            ppn = total*10/100;
            tot = total+ppn;
            document.getElementById('tot').value=tot;
            document.getElementById('diskon').value=dsc;
        }else{
            dsc = jumlah*dis/100;
            total = jumlah-dsc;
            document.getElementById('tot').value=total;
            document.getElementById('diskon').value=dsc;
        }
    }
    function cobal(){
        var ppb = document.getElementById('jppn').value;
        if(ppb == 1){
            jumlah = <?= $jum; ?>;
            ppn = jumlah*10/100;
            total = jumlah + ppn;
            document.getElementById('tot').value=total;
            document.getElementById('ppn').value=ppn;
        }
    } */
    function coba(){
		$('#coba').html('Loading...');
		$.post('<?php echo $config->base_url();?>coba.html',function(data){
			$('#coba').html(data);
		});
	}
    function balik(){
		$('#tester').html('Loading...');
		$.post('<?php echo $config->base_url();?>sj.html',function(data){
			$('#tester').html(data);
		});
	}
</script>