<div class="form_erp">
	<div class="form_erp_top">Tambah Invoice Detail</div>
	<div style="float:left;">
		<a style="color:white;text-decoration: none; cursor: pointer;" onclick="balik()">
			<svg style="width:15px;height:15px;" viewBox="0 0 24 24" class="mb-1">
				<path fill="#000000" d="M2,12A10,10 0 0,1 12,2A10,10 0 0,1 22,12A10,10 0 0,1 12,22A10,10 0 0,1 2,12M18,11H10L13.5,7.5L12.08,6.08L6.16,12L12.08,17.92L13.5,16.5L10,13H18V11Z" />
			</svg> Back To Data
		</a>
	</div>
	<div style="clear:both;"></div>
    <div class="container">
        <form action="<?php echo $config->base_url();?>inserttibd.html" class="" method="post">
            <input type="hidden" id="kode" name="kode" value="<?= $kd ?>" required>
            <input type="hidden" id="tibh" name="tibh" value="<?= $id ?>" required>
    
            <div style="margin-top: 20px;">
                <label>Pilih Barang PO</label>
                <div class="alas_luar">
                    <input type="text" class="form_input" name="tpbd" id="tpbd" list="PO" required>
                </div>
            </div>
                <datalist id="PO">
                    <?php foreach( $tpbd as $row4 ) : ?>
                        <option value="<?=$row4['brg'];?>, <?= $row4['tpbh'];?>, <?=$row4['kodepb'];?>, <?=$row4['tpoh'];?>, <?=$row4['kodepo'];?>, <?=$row4['mgdn'];?>, <?=$row4['mbrg'];?>, <?=$row4['jum'];?>, <?=$row4['bobot'];?>, <?= $row4['msat']; ?>, <?=$row4['hrg'];?>, <?=$row4['sbtot'];?>, <?=$row4['dsc'];?>, <?=$row4['tot'];?>"></option>
                    <?php endforeach ?>
                </datalist>
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
    function balik(){
        $('#tester').html('Loading...');
		$.post('<?php echo $config->base_url();?>pb.html',function(data){
			$('#tester').html(data);
		});
    }
</script>