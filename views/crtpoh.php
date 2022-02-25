<div class="form_erp">
	<div class="form_erp_top">Tambah PO</div>
	<div style="float:left;">
		<a onclick="" style="color:white;text-decoration: none;">
			<svg style="width:15px;height:15px;" viewBox="0 0 24 24" class="mb-1">
				<path fill="#000000" d="M2,12A10,10 0 0,1 12,2A10,10 0 0,1 22,12A10,10 0 0,1 12,22A10,10 0 0,1 2,12M18,11H10L13.5,7.5L12.08,6.08L6.16,12L12.08,17.92L13.5,16.5L10,13H18V11Z" />
			</svg> Back To Data
		</a>
	</div>
	<div style="clear:both;"></div>
    <div class="container">
            
        <form action="<?php echo $config->base_url();?>inserttpoh.html" class="" method="post">
            <input type="hidden" name="no" value="<?= $tpoh['no']; ?>" required>
            <input type="hidden" name="ip" value="<?= $ip; ?>" required>
            <input type="hidden" name="ws" value="<?= $ws; ?>" required>
            
        
            <div style="margin-top: 20px;">
                <label>Pilih Perusahaan<span class="required">*</span></label>
                <div class="alas_luar">
                    <select class="form_input" style="width: 100%;" name="mprsh" required>
                    <option disabled selected></option>
                    <?php foreach( $mprsh as $row1 ) : ?> 
                        <option value="<?= $row1['no'] ?>" <?php if($tpoh['mprsh'] == $row1['no']) echo 'selected="selected"'; ?>><?= $row1['nama'] ?></option>
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
                        <option value="<?= $row['no'] ?>" <?php if($tpoh['mcab'] == $row['no']) echo 'selected="selected"'; ?>><?= $row['nama'] ?></option>
                    <?php endforeach ?>
                    </select>
                </div>
            </div>
            <div style="margin-top: 20px;">
                <label>Kode Gl<span class="required">*</span></label>
                <div class="alas_luar">
                    <input type="text" name="kodegl" class="form_input" value="<?= $tpoh['kodegl']; ?>" maxlength="16">
                </div>
            </div>
            <div style="margin-top: 20px;">
                <label>Pilih Supplier<span class="required">*</span></label>
                <div class="alas_luar">
                    <select class="form_input" style="width: 100%;" name="mentt" id="mentt" required>
                    <option disabled selected></option>
                    <?php foreach( $mentt as $row2 ) : ?> 
                        <option value="<?= $row2['no'] ?>|<?= $row2['kodegl']; ?>|<?= $row2['nama']; ?>|<?= $row2['cpnm']; ?>" <?php if($tpoh['mentt'] == $row2['no']) echo 'selected="selected"'; ?>><?= $row2['nama'] ?></option>
                    <?php endforeach ?>
                    </select>
                </div>
            </div>
            <div style="margin-top: 20px;">
                <label>Pilih Ekspedisi<span class="required">*</span></label>
                <div class="alas_luar">
                    <select class="form_input" style="width: 100%;" name="meks" required>
                    <option disabled selected></option>
                    <?php foreach( $meks as $row3 ) : ?> 
                        <option value="<?= $row3['no'] ?>" <?php if($tpoh['meks'] == $row3['no']) echo 'selected="selected"'; ?>><?= $row3['nama'] ?></option>
                    <?php endforeach ?>
                    </select>
                </div>
            </div>
            <div style="margin-top: 20px;">
                <label>Jenis Ppn<span class="required">*</span></label>
                <div class="alas_luar">
                    <select class="form_input" style="width: 100%;" id="jppn" name="jppn" onchange="cobal()">
                        <option <?php if( $tpoh['jppn'] == 0){echo "selected"; } ?> value="0"></option>
                        <option <?php if( $tpoh['jppn'] == 1){echo "selected"; } ?> value="1">Exclude PPN</option>
                    </select>
                </div>
            </div>
            <div style="margin-top: 20px;">
                <label>Jenis Pembayaran<span class="required">*</span></label>
                <div class="alas_luar">
                    <select class="form_input" style="width: 100%;" name="jbyr" id="jbyr" required>
                        <option <?php if( $tpoh['jbyr'] == 'Tunai'){echo "selected"; } ?>>Tunai</option>
                        <option <?php if( $tpoh['jbyr'] == 'Debet'){echo "selected"; } ?>>Debet</option>
                        <option <?php if( $tpoh['jbyr'] == 'Kredit'){echo "selected"; } ?>>Kredit</option>
                        <option <?php if( $tpoh['jbyr'] == 'eWallet'){echo "selected"; } ?>>eWallet</option>
                    </select>
                </div>
            </div>
            <div style="margin-top: 20px;">
                <label>Tanggal Kirim<span class="required">*</span></label>
                <div class="alas_luar">
                    <input type="date" name="tglkrm" class="form_input" value="<?= $tpoh['tglkrm']; ?>">
                </div>
            </div>
            <div style="margin-top: 20px;">
                <label>Termin<span class="required">*</span></label>
                <div class="alas_luar">
                    <input type="number" name="term" id="term" value="<?= $tpoh['term']; ?>" class="form_input">
                </div>
            </div>
            <div style="margin-top: 30px;">
                <label>Barang dipilih</label>
            </div>
            <div style="color:white;padding:10px;overflow-y:auto;">
                <table style="width:100%; margin-top:30px;" id="mytable">
                    <tr>
                        <th style="width: 4%;">No</th>
                        <th style="width: 15%">Nama Barang</th> 
                        <th style="width: 6%">Satuan</th>
                        <th style="width: 5%">Gudang</th>
                        <th style="width: 5%">urgent</th>
                        <th style="width: 5%">Qty</th>
                        <th style="width: 8%">Bobot</th>
                        <th style="width: 8%">Harga</th>
                        <th style="width: 8%">Subtotal</th>
                        <th style="width: 6%">Disc</th>
                        <th style="width: 8%">total</th>
                        <th style="width: 10%">Keterangan</th>
                    </tr>
                     <?php $no = 1; $a = 0; $b = 0;?>
				    <?php foreach( $tpod as $row ) : ?>
                    <tr>
                        <td><?= $no; ?></th>
                        <td><?= $row['brg']; ?></th> 
                        <td><?= $row['snama']; ?></th>
                        <td><?= $row['gnama']; ?></th>
                        <td><?= $row['urgnt']; ?></th>
                        <td><?= round($row['jum']); ?></th>
                        <td><?= round($row['bobot']) ?> kg</th>
                        <td><?= round($row['hrg']); ?></th>
                        <td><?= $row['sbtot']; ?></th>
                        <td><?= $row['dsc']; ?></th>
                        <td><?= $row['tot']; ?></th>
                        <td><?= $row['ket']; ?></th>
                        <?php $a += $row['tot']; $b += $row['sbtot'];?>

                    </tr>
                    <?php $no++; ?>
                    <?php endforeach ?>
                    <?php if($tpoh['jppn'] == 0){
                        $ppn = 0;
                        $tot = $a;
                    }else{
                        $ppn = $a*10/100;
                        $tot = $a+$ppn; 
                    }; $dsc = $b-$a; ?>
                </table>
            </div>

            <a href="<?php echo $config->base_url();?>addtpod/<?=$tpoh['kode'];?>.html" class="button button4" style="width:92%; margin-left: 10px; height:30px; font-size: 15pt; margin-top: 20px"> Tambah Barang +</a>
            
            <div style="margin-top: 20px;">
                <label>DPP<span class="required">*</span></label>
                <div class="alas_luar">
                    <input type="number" name="dpp" value="<?= $a; ?>" id="dpp" class="form_input">
                </div>
            </div>

            <input type="hidden" name="diskon" id="diskon" value="<?= $dsc; ?>">
            <input type="hidden" name="ppn" id="ppn" value="<?= $ppn; ?>">
            <input type="hidden" name="sub" id="sub" value="<?= $b; ?>" >
            
            <div style="margin-top: 20px;">
                <label>TOTAL<span class="required">*</span></label>
                <div class="alas_luar">
                    <input type="number" name="tot" id="tot" value="<?= $tot; ?>" class="form_input" required>
                </div>
            </div>
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
    function cobal(){
        jppn = document.getElementById('jppn').value;
        if(jppn == 1){
            dpp = document.getElementById('dpp').value;
            ppn = dpp*10/100;
            total = parseInt(dpp)+ppn;
            document.getElementById('ppn').value = ppn;
            document.getElementById('tot').value = total;
        }else{
            subtot = document.getElementById('sub').value;
            document.getElementById('tot').value = subtot
            ppn = 0;
        }
    }   
    function coba1(param){
		$('#tester').html('Loading...');
		$.post('<?php echo $config->base_url();?>addtpod/'+param+'.html',function(data){ $('#tester').html(data);});
	}
    function balik(){
		$('#tester').html('Loading...');
		$.post('<?php echo $config->base_url();?>po.html',function(data){
			$('#tester').html(data);
		});
	}
</script>