<div class="form_erp">
	<!-- <div class="form_erp_top">Tambah PO</div>
	<div style="float:left;">
		<a onclick="balik()" style="color:white;text-decoration: none; cursor: pointer;">
			<svg style="width:15px;height:15px;" viewBox="0 0 24 24" class="mb-1">
				<path fill="#000000" d="M2,12A10,10 0 0,1 12,2A10,10 0 0,1 22,12A10,10 0 0,1 12,22A10,10 0 0,1 2,12M18,11H10L13.5,7.5L12.08,6.08L6.16,12L12.08,17.92L13.5,16.5L10,13H18V11Z" />
			</svg> Back To Data
		</a>
	</div> -->
	<div style="clear:both;"></div>
    <div class="container">
        
        <form action="<?php echo $config->base_url();?>coba.html" class="" method="post">
            <input type="hidden" name="kode" value="<?= $kd; ?>" required>
            <input type="hidden" name="ip" value="<?= $ip; ?>" required>
            <input type="hidden" name="ws" value="<?= $ws; ?>" required>
            
            <div style="display: grid; grid-template-columns: auto auto auto; grid-gap: 10px;" class="grid-container">
                <div class="item1" style="grid-row: 1;">
                    <div style="margin-top: 5px;">
                        <label>Pilih Cabang<span class="required">*</span></label>
                        <div>
                            <select style="width: 75%;" name="mcab" required>
                            <option disabled selected></option>
                            <?php foreach( $mcab as $row ) : ?> 
                                <option value="<?= $row['no'] ?>"><?= $row['nama'] ?></option>
                            <?php endforeach ?>
                            </select>
                        </div>
                    </div>
                    <div style="margin-top: 5px;">
                        <label>Kode Gl<span class="required">*</span></label>
                        <div>
                            <input type="text" name="kodegl" style="width: 50%;" maxlength="16">
                        </div>
                    </div>
                    <div style="margin-top: 5px;">
                        <label>Pilih Ekspedisi<span class="required">*</span></label>
                        <div>
                            <select style="width: 75%;" name="meks" required>
                            <option disabled selected></option>
                            <?php foreach( $meks as $row3 ) : ?> 
                                <option value="<?= $row3['no'] ?>"><?= $row3['nama'] ?></option>
                            <?php endforeach ?>
                            </select>
                        </div>
                    </div>
                    
                </div>
            
                <div class="item1" style="grid-row: 1;">
                    <div style="margin-top: 5px;">
                        <label>Tanggal Kirim<span class="required">*</span></label>
                        <div>
                            <input type="date" name="tglkrm" style="width: 75%;">
                        </div>
                    </div>
                    <div style="margin-top: 5px;">
                        <label>Pilih Supplier<span class="required">*</span></label>
                        <div>
                            <select name="mentt" style="width: 75%;" id="mentt" required>
                            <option disabled selected></option>
                            <?php foreach( $mentt as $row2 ) : ?> 
                                <option value="<?= $row2['no'] ?>|<?= $row2['kodegl']; ?>|<?= $row2['nama']; ?>|<?= $row2['cpnm']; ?>"><?= $row2['nama'] ?></option>
                            <?php endforeach ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="item1" style="grid-row: 1;">
                    <div style="margin-top: 5px;">
                        <label>Jenis Ppn<span class="required">*</span></label>
                        <div>
                            <select style="width: 75%;" name="jppn">
                                <option value="0"></option>
                                <option value="1">Exclude PPN</option>
                            </select>
                        </div>
                    </div>
                    <div style="margin-top: 5px;">
                        <label>Jenis Pembayaran<span class="required">*</span></label>
                        <div>
                            <select style="width: 75%;" name="jbyr" required>
                                <option disabled selected></option>
                                <option>Tunai</option>
                                <option>Debet</option>
                                <option>Kredit</option>
                                <option>eWallet</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>                
            
            <div>
                <h3>Barang dipilih</h3>
            </div>
            <div style="color:white;padding:5px;overflow-y:auto;">
                <table style="width:100%;" id="mytable" style="border: 2px; border-color:white;">
                    <tr>
                        <th style="width: 4%; border-bottom: 1px solid rgba(255,255,255,0.2);">No</th>
                        <th style="width: 15%;border-bottom: 1px solid rgba(255,255,255,0.2);">Nama Barang</th> 
                        <th style="width: 6%;border-bottom: 1px solid rgba(255,255,255,0.2);">Satuan</th>
                        <th style="width: 5%;border-bottom: 1px solid rgba(255,255,255,0.2);">Qty</th>
                        <th style="width: 8%;border-bottom: 1px solid rgba(255,255,255,0.2);">Bobot</th>
                        <th style="width: 8%;border-bottom: 1px solid rgba(255,255,255,0.2);">Harga</th>
                        <th style="width: 8%;border-bottom: 1px solid rgba(255,255,255,0.2);">Subtotal</th>
                        <th style="width: 6%;border-bottom: 1px solid rgba(255,255,255,0.2);">Disc</th>
                        <th style="width: 8%;border-bottom: 1px solid rgba(255,255,255,0.2);">total</th>
                        <th style="width: 10%;border-bottom: 1px solid rgba(255,255,255,0.2);">Keterangan</th>
                    </tr>
                    <tr id="table"></tr>
                    <tr>
                        <td style="border-bottom: 1px solid rgba(255,255,255,0.2);"></td>
                        <td style="border-bottom: 1px solid rgba(255,255,255,0.2);"><input type="text" name="tglkrm" style="height: 8px;" class="form_input"></td> 
                        <td style="border-bottom: 1px solid rgba(255,255,255,0.2);"></td>
                        <td style="border-bottom: 1px solid rgba(255,255,255,0.2);"></td>
                        <td style="border-bottom: 1px solid rgba(255,255,255,0.2);"></td>
                        <td style="border-bottom: 1px solid rgba(255,255,255,0.2);"></td>
                        <td style="border-bottom: 1px solid rgba(255,255,255,0.2);"></td>
                        <td style="border-bottom: 1px solid rgba(255,255,255,0.2);"></td>
                        <td style="border-bottom: 1px solid rgba(255,255,255,0.2);"></td>
                        <td style="border-bottom: 1px solid rgba(255,255,255,0.2);"></td>
                    </tr>
                </table>
            </div>
            
            <div style="display: grid; grid-template-columns: auto auto auto; grid-gap: 10px; margin-top:10px;">
                <div class="item1" style="grid-row: 1;" id="kiri">
                    
                </div>
                <div class="item1" style="grid-row: 1;" id="kiri">
                    
                </div>
                <div class="item1" style="grid-row: 1;" id="kanan">
                    <div style="margin-top: 5px; margin-left:20px;">
                        <label style="width: 50px;">Subtotal</label>
                        <input type="text" name="kodegl" style="width: 50%;" maxlength="16">
                    </div>
                    <div style="margin-top: 5px; margin-left:20px;">
                        <label style="width: 50px;">DPP</label>
                        <input type="text" name="kodegl" style="width: 50%; margin-left: 22px" maxlength="16">
                    </div>
                    <div style="margin-top: 5px; margin-left:20px;">
                        <label style="width: 50px;">PPN</label>
                        <input type="text" name="kodegl" style="width: 50%;margin-left: 20px" maxlength="16">
                    </div>
                    <div style="margin-top: 5px; margin-left:20px;">
                        <label style="width: 50px;">TOTAL</label>
                        <input type="text" name="kodegl" style="width: 50%; margin-left: 2px" maxlength="16">
                    </div>
                </div>
            </div>
			
            <div style="margin-top:16px;float:right;">
				<div class="alas_form_bawah">
					<input type="submit" class="btn btn-primary m-1" value="Tambah Barang">
				</div>
			</div>
		</form>
		<div style="clear:both;"></div>
	</div>
</div>
<script>
    function balik(){
		$('#tester').html('Loading...');
		$.post('<?php echo $config->base_url();?>po.html',function(data){
			$('#tester').html(data);
		});		
	}
</script>