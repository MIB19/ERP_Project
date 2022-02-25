<!DOCTYPE html>
<html lang="en">
<head>
	<title>Bentang Persada Internusa</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="<?php echo $config->base_url()."";?>css/style.css" rel="stylesheet">
	<script src="<?php echo $config->base_url();?>css/st.js"></script>
	<script src="<?php echo $config->base_url();?>css/jquery.mask.min.js"></script>
	<style>
		input:focus {
  			background-color: yellow;
			  color: red;
		}
		textarea:focus {
  			background-color: yellow;
			  color: red;
		}
		select:focus {
  			background-color: yellow;
			  color: red;
		}
	</style>
</head>
<body>
<script>
	$(document).ready(function(){
		$("#myInput").on("keyup", function() {
			var value = $(this).val().toLowerCase();
			if(value === ""){
				document.getElementById("nav").style.display = "block" ;
				var rowsShown = 10;
				var rowsTotal = $('#myTable tbody tr').length;
				var numPages = rowsTotal/rowsShown;
				$('#myTable tbody tr').hide();
				$('#myTable thead tr').slice(0, rowsShown).show();
				$('#myTable tbody tr').slice(0, rowsShown).show();
				$('#nav a:first').addClass('active');
				
			}else{
				$("#myTable tr").filter(function() {
					document.getElementById("nav").style.display = "none" ;
					$('#myTable thead tr').slice(0, rowsShown).show();
					$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
				});
			}
		});
	});
</script>
<div id="alert" class="latar_popup" style="display:none;z-index:999999" onClick="close_alert()">
	<div class="alert_pops">
		<div class="alert_pops1" id="alert_title" >
			Apakah Anda Yakin ?
		</div>
		<input type="text" id="kunci" hidden></input><input type="text" id="parameter" hidden></input>
		<div style="clear:both;"></div>
		<div class="alert_pops2">
		</div>
		<div class="alert_pops3">
			<div class="alert_pops4" id ="alert_input_kiri" onClick="eksekusi()" style="display:block">Ya</div>
			<div class="alert_pops5" id ="alert_input_tengah" onClick="close_alert()" style="display:block">Tidak</div>
			<div class="alert_pops6" id ="alert_input_kanan" style="display:none" onClick="close_alert()" >Tutup</div>
			<div style="clear:both;"></div>
		</div>
		<div style="clear:both;"></div>
	</div>
</div>
<div id="pops" class="latar_popup" onClick="tampil_pops()">
	<div class="utama_isi_popup" id="utama_isi_popup">
		<?php require "views/menu_popup.php"; ?>
	</div>
</div>
<div id="wrapper">
	<div id="header" style="background:black;">
	
		<div id="logo-large">
			<div class="menu-riwayat">
				<div id="perusahaan" onClick="tampil_pops('0')" class="menu_erp">
					Master
				</div>
				<div class="garis_menu_erp"></div>
				<div id="barang" onClick="tampil_pops('1')" class="menu_erp">
					Purchasing
				</div>
				<div class="garis_menu_erp"></div>
				<div id="sales" onClick="tampil_pops('2')" class="menu_erp">
					Gudang
				</div>
				<div class="garis_menu_erp"></div>
				<div id="sales" onClick="tampil_pops('3')" class="menu_erp">
					Sales
				</div>
				<div class="garis_menu_erp"></div>
				<div id="sales" onClick="tampil_pops('4')" class="menu_erp">
					Finance
				</div>
				<div class="garis_menu_erp"></div>
				<div id="sales" onClick="tampil_pops('5')" class="menu_erp">
					Accounting
				</div>
				<div class="garis_menu_erp"></div>
				<div class="menu-header">
					<div class="menu-kanan" onClick="tampil_pops()">
						<img src="<?php echo $config->base_url()."";?>icon/hamburger.png" class="menu-logo-atas"/>
					</div>
				</div>
				
				<div style="clear: both"></div>
				<div class="the-body">
					<div class="the-body-kiwo_riwayat"  style="width:100%;">
					
						<div class="layout-riwayat" id="tester">
							<?php require 'views/'.$halaman.'.php';?>
						</div>
					</div>
					
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	function eksekusi(){
		var inisiasi = document.getElementById("kunci").value;
		var param = document.getElementById("parameter").value;
		if(inisiasi == '1'){
			action_delete(param);
		}
	}
	function close_alert(){
		document.getElementById("alert").style.display = "none" ;
		document.getElementById("kunci").value = "" ;
		
		document.getElementById("alert_title").innerHTML = "Apakah Anda Yakin ?" ;
		document.getElementById("alert_input_kiri").style.display = "block" ;
		document.getElementById("alert_input_tengah").style.display = "block" ;
		document.getElementById("alert_input_kanan").style.display = "none" ;
	}
	function tampil_pops(param){
		// alert(''+param);
		var nil = 120*param;
		document.getElementById("menu0").style.display = "none" ;
		document.getElementById("menu1").style.display = "none" ;
		document.getElementById("menu2").style.display = "none" ;
		document.getElementById("menu3").style.display = "none" ;
		document.getElementById("menu4").style.display = "none" ;
		document.getElementById("menu5").style.display = "none" ;
		if(param == 0){
			document.getElementById("utama_isi_popup").style.width = "420px";
			document.getElementById("utama_isi_popup").style.marginLeft = nil+"px";
		}else if(param == 4){
			document.getElementById("utama_isi_popup").style.width = "420px";
			document.getElementById("utama_isi_popup").style.marginLeft = "330px";
		}else if(param == 5){
			document.getElementById("utama_isi_popup").style.width = "560px";
			document.getElementById("utama_isi_popup").style.marginLeft = "370px";
		}else{
			document.getElementById("utama_isi_popup").style.width = "120px";
			document.getElementById("utama_isi_popup").style.marginLeft = nil+"px";
		}
		document.getElementById("menu4").style.display = "none" ;
		
		if( document.getElementById("pops").style.display === "none" ){
			document.getElementById("menu"+param).style.display = "block" ;
			document.getElementById("pops").style.display = "block" ;
		}else{
			document.getElementById("pops").style.display = "none" ;
		}
	}
	function prsh(param){
		$('#tester').html('testing');
		$.post('<?php echo $config->base_url();?>testing/'+ param +'.html',function(data){
			$('#tester').html(data);
		});
	}
	function brg(param){
		$('#tester').html('testing');
		$.post('<?php echo $config->base_url();?>mbrg/'+ param +'.html',function(data){
			$('#tester').html(data);
		});
	}
</script>
</body>
</html>