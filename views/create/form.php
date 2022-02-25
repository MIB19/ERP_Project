<div class="form_erp">
	<div class="form_erp_top">Tambah Barang</div>
	<div style="float:left;">
		<!-- <a onclick="balik(<?= $tpoh['no']; ?>)" style="color:white;text-decoration: none; cursor: pointer;">
			<svg style="width:15px;height:15px;" viewBox="0 0 24 24" class="mb-1">
				<path fill="#000000" d="M2,12A10,10 0 0,1 12,2A10,10 0 0,1 22,12A10,10 0 0,1 12,22A10,10 0 0,1 2,12M18,11H10L13.5,7.5L12.08,6.08L6.16,12L12.08,17.92L13.5,16.5L10,13H18V11Z" />
			</svg> Back To Data
		</a> -->
	</div>
	<div style="clear:both;"></div>
    <div class="container">
        <form action="<?php echo $config->base_url();?>inserttpo.html" class="" method="post">
            <input type="hidden" id="kode" name="kode" value="<?= $tpoh['kode']; ?>" required>
            <input type="hidden" id="no" name="no" value="<?= $tpoh['no']; ?>" required>
    
            <div style="margin-top: 20px;">
                <label>Pilih Barang</label>
                <div class="alas_luar">
                    <input type="text" class="form_input" name="mbrg" id="mbrg" list="cityname" onkeyup="change()">
                </div>
            </div>
                <datalist id="cityname">
                <?php foreach( $mbrg as $row4 ) : ?>
                    <option value="<?= $row4['no'];?>, <?=$row4['nama'];?>, <?=$row4['hrg'];?>, <?=$row4['bobot'];?>, <?= $row4['msat']; ?>"><?=$row4['nama'];?></option>
                <?php endforeach ?>
                </datalist>
    
            <div style="margin-top: 20px;">
                <label>Tingkat Urgent<span class="required">*</span></label>
                <div class="alas_luar">
                    <select class="form_input" style="width: 100%;" name="urgnt" required>
                        <option disabled selected></option>
                        <option>S</option>
                        <option>B</option>
                    </select>
                </div>
            </div>
            <div style="margin-top: 20px;">
                <label>Pilih Gudang<span class="required">*</span></label>
                <div class="alas_luar">
                    <select class="form_input" style="width: 100%;" name="mgdn" required>
                        <option disabled selected></option>
                        <?php foreach( $mgdn as $row3 ) : ?> 
                            <option value="<?= $row3['no'] ?>"><?= $row3['nama'] ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
            </div>
            <div style="margin-top: 20px;">
                <label>Harga<span class="required">*</span></label>
                <div class="alas_luar">
                    <input type="number" name="harga" class="form_input" id="harga" onkeyup="changehrg()" required>
                </div>
            </div>
            <div style="margin-top: 20px;">
                <label>Qty<span class="required">*</span></label>
                <div class="alas_luar">
                    <input type="number" name="qty" class="form_input" id="qty" value="1" onkeyup="changeqty()">
                </div>
            </div>
            <div style="margin-top: 20px;">
                <!-- <label>bobot<span class="required">*</span></label> -->
                <div class="alas_luar">
                    <input type="hidden" name="bobot" class="form_input" id="bobot">
                </div>
            </div>
            <div style="margin-top: 20px;">
                <label>Subtotal<span class="required">*</span></label>
                <div class="alas_luar">
                    <input type="number" name="subtotal" class="form_input" id="subtotal" required>
                </div>
            </div>
            <div style="margin-top: 20px;">
                <label>Disc<span class="required">* bentuk %</span></label>
                <div class="alas_luar">
                    <input type="number" name="disc" class="form_input" id="disc" onkeyup="diskon1()">
                </div>
            </div>
            <div style="margin-top: 20px;">
                <label>Total<span class="required">*</span></label>
                <div class="alas_luar">
                    <input type="number" name="total" id="total" class="form_input" value="" required>
                </div>
            </div>
            <div style="margin-top: 20px;">
                <label>Termin<span class="required">*</span></label>
                <div class="alas_luar">
                    <input type="term" name="term" id="term" class="form_input">
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
$(document).ready(function(){

$( '.subtotal' ).mask('000.000.000', {reverse: true});

})
    function changehrg(){
        harga = document.getElementById('harga').value;
        qty   = document.getElementById('qty').value;
        document.getElementById('subtotal').value = harga*qty;
        document.getElementById('total').value = harga*qty;        
    }
    function change(){
        var val1 = document.getElementById('mbrg').value ;
        var strArray =  val1.split(", ");
        var hasil = Math.ceil(strArray[2]);
        var bobot = Math.ceil(strArray[3]);
        document.getElementById('harga').value = hasil;
        document.getElementById('bobot').value = bobot;
        var sub = document.getElementById('subtotal');
        if(sub == "[object HTMLInputElement]"){
            //alert(hasil);
            document.getElementById('subtotal').value=hasil;
        }else{
            var subt = hasil+sub;
            document.getElementById('subtotal').value=subt;
        }
        var tot = document.getElementById('total');
        if(tot == "[object HTMLInputElement]"){
            //alert(hasil);
            document.getElementById('total').value=hasil;
        }else{
            var total = hasil+tot;
            document.getElementById('total').value=total;
        }
	}
    function changeqty(){
        var qty = document.getElementById('qty').value;
        var val1 = document.getElementById('mbrg').value;
        var strArray =  val1.split(", ");
        var bot = Math.ceil(strArray[3]);
        hrg = document.getElementById('harga').value;
        bobot = qty*bot;
        harga = qty*hrg;
        document.getElementById('bobot').value=bobot;
        document.getElementById('subtotal').value=harga;
        document.getElementById('total').value=harga;
	}
    function diskon1(){
        dsc = document.getElementById('disc').value;
        qti = document.getElementById('qty').value;
        harga = document.getElementById('harga').value;
        hasil = harga*qti*dsc/100;
        if(hasil == 0){
            alert("hasil 0");
        }else{
            hsl = harga*qti-hasil;
            document.getElementById('total').value = hsl;
        }
    }
</script>