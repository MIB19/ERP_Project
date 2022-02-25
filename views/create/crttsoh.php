<div class="form_erp">
	<div class="form_erp_top">Tambah Penerimaan Barang</div>
	<div style="float:left;">
		<a style="color:white;text-decoration: none; cursor: pointer;" onclick="balik()">
			<svg style="width:15px;height:15px;" viewBox="0 0 24 24" class="mb-1">
				<path fill="#000000" d="M2,12A10,10 0 0,1 12,2A10,10 0 0,1 22,12A10,10 0 0,1 12,22A10,10 0 0,1 2,12M18,11H10L13.5,7.5L12.08,6.08L6.16,12L12.08,17.92L13.5,16.5L10,13H18V11Z" />
			</svg> Back To Data
		</a>
	</div>
	<div style="clear:both;"></div>
    <div class="container">
            <!-- <div style="margin-top: 20px;">
                <label>Barang dipilih</label>
            </div>
            <div style="color:white;padding:10px;overflow-y:auto;">
                <table style="width:100%; margin-top:30px;" id="mytable">
                    <tr>
                        <th style="width: 4%;">No</th>
                        <th style="width: 15%">Nama Barang</th> 
                        <th style="width: 6%">Satuan</th>
                        <th style="width: 5%">Qty</th>
                        <th style="width: 8%">Bobot</th>
                        <th style="width: 8%">Harga</th>
                        <th style="width: 8%">Subtotal</th>
                        <th style="width: 6%">Disc</th>
                        <th style="width: 8%">total</th>
                        <th style="width: 10%">Keterangan</th>
                    </tr>
                     <?php $no = 1; ?>
				    <?php foreach( $tpod as $row ) : ?>
                    <tr>
                        <td><?= $no; ?></th>
                        <td><?= $row['brg']; ?></th> 
                        <td><?= $row['snama']; ?></th>
                        <td><?= round($row['jum']); ?></th>
                        <td><?= round($row['bobot']) ?> kg</th>
                        <td><?= round($row['hrg']); ?></th>
                        <td><?= $row['sbtot']; ?></th>
                        <td><?= $row['dsc']; ?></th>
                        <td><?= $row['tot']; ?></th>
                        <td><?= $row['ket']; ?></th>
                    </tr>
                    <?php $no++; ?>
                    <?php endforeach ?>
                </table>
            </div>
            <div id="coba">
                <button onclick="coba()" class="button button4" style="width:100%; height:50px; font-size: 15pt;"> Tambah Barang +</button>
            </div> -->
        <form action="<?php echo $config->base_url();?>inserttsoh.html" class="" method="post">
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
                        <option value="<?= $row5['no'];?>, <?=$row5['nama'];?>, <?=$row5['cpnm'];?>"><?=$row5['nama'];?></option>
                    <?php endforeach ?>
                </datalist>
            <div style="margin-top: 20px;">
                <label>Customer PO<span class="required">*</span></label>
                <div class="alas_luar">
                    <input type="text" name="custpo" id="custpo" class="form_input" required>
                </div>
            </div>
            <div style="margin-top: 20px;">
                <label>Pilih Ekspedisi<span class="required">*</span></label>
                <div class="alas_luar">
                    <select class="form_input" style="width: 100%;" name="meks" required>
                    <option disabled selected></option>
                    <?php foreach( $meks as $row3 ) : ?> 
                        <option value="<?= $row3['no'] ?>"><?= $row3['nama'] ?></option>
                    <?php endforeach ?>
                    </select>
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
                <label>Jenis Ppn<span class="required">*</span></label>
                <div class="alas_luar">
                    <select class="form_input" style="width: 100%;" id="jppn" name="jppn">
                        <option value="0"></option>
                        <option value="1">Exclude PPN</option>
                    </select>
                </div>
            </div>
            <div style="margin-top: 20px;">
                <label>Jenis Pembayaran<span class="required">*</span></label>
                <div class="alas_luar">
                    <select class="form_input" style="width: 100%;" name="jbyr" required>
                        <option disabled selected></option>
                        <option>Tunai</option>
                        <option>Debet</option>
                        <option>Kredit</option>
                        <option>eWallet</option>
                    </select>
                </div>
            </div>
            <div style="margin-top: 20px;">
                <label>Tanggal Kirim<span class="required">*</span></label>
                <div class="alas_luar">
                    <input type="date" name="tglkrm" class="form_input" id="tglkrm">
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
		$.post('<?php echo $config->base_url();?>so.html',function(data){
			$('#tester').html(data);
		});
	}
</script>