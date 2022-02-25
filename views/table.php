<script>
$.post("<?php echo $config->base_url();?>bayar_transaksi.html",{
				kode_transaksi: ""+<?php echo $param1;?>, subtotal_akhir: ""+document.getElementById('subtotal_akhir').innerHTML.replace(/[^0-9.-]+/g,""), 
				ppn_akhir: ""+<?php echo $param3;?>, service_akhir: ""+<?php echo $param4;?>, 
				grandtotal_akhir: ""+document.getElementById('grandtotal_akhir').innerHTML.replace(/[^0-9.-]+/g,""),
				pilihan: ""+pilihan, variable1: ""+variable1, variable2: ""+variable2, variable3: ""+variable3, variable4: ""+variable4, voucher: ""+voucher
			}, function(data){
				
				open('<?php echo $config->base_url();?>bill/'+<?php echo $param1;?>+'.html');
				
				document.getElementById("pops1").style.display = "none" ;
				<?php 
					if($param5 == '1'){
				?>
						$.post('<?php echo $config->base_url();?>refresh_kanan_kakak.html',function(data){
							$('#samping-kanan-kakak').html(data);
						});
				<?php
					}else if($param5 == '2'){
				?>
						window.location.href = '<?php echo $config->base_url()."";?>cart.html';
				<?php
					}
				?>
			});
</script>