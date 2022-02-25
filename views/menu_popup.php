<div id="menu0" style="display:none;">
	<div style="float:left;width:140px;">
		<div class="title_utama" onClick="action_href('1')">
			Perusahaan
		</div>
		<div class="title_utama" onClick="action_href('2')">
			Cabang
		</div>
		<div class="title_utama" onClick="action_href('3')">
			Departemen
		</div>
		<div class="title_utama" onClick="action_href('4')">
			Gudang
		</div>
		<div class="title_utama" onClick="action_href1('1')">
			Warna
		</div>
		<div class="title_utama" onClick="action_href1('2')">
			Satuan
		</div>
		<div class="title_utama" onClick="action_mprint()">
			Print
		</div>
	</div>
	<div style="float:left;width:140px;">
		<div class="title_utama" onClick="action_href1('3')">
			Merk
		</div>
		<div class="title_utama" onClick="action_href1('4')">
			Kategory 1
		</div>
		<div class="title_utama" onClick="action_href1('5')">
			Kategory 2
		</div>
		<div class="title_utama" onClick="action_href1('6')">
			Kategory 3
		</div>
		<div class="title_utama" onClick="action_href1('7')">
			Barang
		</div>
		<div class="title_utama" onClick="action_bank()">
			Bank
		</div>
	</div>
	<div style="float:left;width:140px;">
		<div class="title_utama" onClick="action_mentt()">
			Entitas
		</div>
		<div class="title_utama" onClick="action_maset()">
			Aset
		</div>
		<div class="title_utama" onClick="action_mcoa()">
			COA
		</div>
		<div class="title_utama" onClick="action_mpeg()">
			Pegawai
		</div>
		<div class="title_utama" onClick="action_marmd()">
			Armada
		</div>
		<div class="title_utama" onClick="action_meks()">
			Ekspedisi
		</div>
	</div>
</div>
<div id="menu1" style="display:none;">
	<div class="title_utama" onclick="action_po()">
		Purchase Order
	</div>
</div>
<div id="menu3" style="display:none;">
	<div class="title_utama" onclick="action_so()">
		Sales Order
	</div>
	<div class="title_utama" onclick="action_sj()">
		Surat Jalan
	</div>
	<div class="title_utama" onclick="action_ij()">
		Invoice Jual
	</div>
	<div class="title_utama" onclick="action_mk()">
		Memo Keluar
	</div>
</div>
<div id="menu2" style="display:none;">
	<div class="title_utama" onclick="action_lpb()">
		Penerimaan Barang
	</div>
	<div class="title_utama" onclick="action_ib()">
		Invoice Beli
	</div>
</div>
<div id="menu4" style="display:none;">
	<div style="float:left;width:140px;">
		<div class="title_utama">
			Kas Masuk
		</div>
		<div class="title_utama">
			Kas Keluar
		</div>
		<div class="title_utama">
			Bank Masuk
		</div>
		<div class="title_utama">
			Bank Keluar
		</div>
		<div class="title_utama">
			Bayar Hutang
		</div>
	</div>
	
	<div style="float:left;width:140px;">
		<div class="title_utama">
			Bayar Piutang
		</div>
		<div class="title_utama">
			Netting Hutang
		</div>
		<div class="title_utama">
			Tukar Hutang
		</div>
		<div class="title_utama">
			Dokumen Penagihan
		</div>
		<div class="title_utama">
			J. Bayar Piutang
		</div>
	</div>
	
	<div style="float:left;width:140px;">
		<div class="title_utama">
			Giro/Cek Masuk
		</div>
		<div class="title_utama">
			Giro/Cek Keluar
		</div>
		<div class="title_utama">
			F.Pajak Masukan
		</div>
		<div class="title_utama">
			F.Pajak Keluar
		</div>
	</div>
	
</div>

<div id="menu5" style="display:none;">
	<div style="float:left;width:140px;">
		<div class="title_utama">
			Posting
		</div>
		<div class="title_utama">
			Jurnal Koreksi
		</div>
		<div class="title_utama">
			Peny. Stock
		</div>
		<div class="title_utama">
			Peny. HPP
		</div>
		<div class="title_utama">
			Recal. Stock
		</div>
	</div>
	
	<div style="float:left;width:140px;">
		<div class="title_utama">
			Recal HPP
		</div>
		<div class="title_utama">
			J.Penyesuaian
		</div>
		<div class="title_utama">
			J.Penutup
		</div>
		<div class="title_utama">
			J.Pembalik
		</div>
		<div class="title_utama">
			Tutup Periode
		</div>
	</div>
	
	<div style="float:left;width:140px;">
		<div class="title_utama">
			Penyu.Aset
		</div>
		<div class="title_utama">
			Pemb.Aset
		</div>
		<div class="title_utama">
			Penj.Aset
		</div>
		<div class="title_utama">
			Omset/Penj.
		</div>
	</div>
	<div style="float:left;width:140px;">
		<div class="title_utama">
			Laba Berjalan
		</div>
		<div class="title_utama">
			Biaya Berjalan
		</div>
		<div class="title_utama">
			Neraca
		</div>
		<div class="title_utama">
			Buku Besar
		</div>
	</div>
	
	
</div>
<script>
	function action_href(param){
		$('#tester').html('Loading...');
		$.post('<?php echo $config->base_url();?>prsh/'+ param +'.html',function(data){
			$('#tester').html(data);
		});
	}
	function action_href1(param){
		$('#tester').html('Loading...');
		$.post('<?php echo $config->base_url();?>mbrg/'+ param +'.html',function(data){
			$('#tester').html(data);
		});
	}
	function action_bank(){
		$('#tester').html('Loading...');
		$.post('<?php echo $config->base_url();?>bank.html',function(data){
			$('#tester').html(data);
		});
	}
	function action_mentt(){
		$('#tester').html('Loading...');
		$.post('<?php echo $config->base_url();?>mentt.html',function(data){
			$('#tester').html(data);
		});
	}
	function action_maset(){
		$('#tester').html('Loading...');
		$.post('<?php echo $config->base_url();?>aset.html',function(data){
			$('#tester').html(data);
		});
	}
	function action_mcoa(){
		$('#tester').html('Loading...');
		$.post('<?php echo $config->base_url();?>coa.html',function(data){
			$('#tester').html(data);
		});
	}
	function action_mpeg(){
		$('#tester').html('Loading...');
		$.post('<?php echo $config->base_url();?>mpeg.html',function(data){
			$('#tester').html(data);
		});
	}
	function action_marmd(){
		$('#tester').html('Loading...');
		$.post('<?php echo $config->base_url();?>marmd.html',function(data){
			$('#tester').html(data);
		});
	}
	function action_meks(){
		$('#tester').html('Loading...');
		$.post('<?php echo $config->base_url();?>meks.html',function(data){
			$('#tester').html(data);
		});
	}
	function action_mprint(){
		$('#tester').html('Loading...');
		$.post('<?php echo $config->base_url();?>mprint.html',function(data){
			$('#tester').html(data);
		});
	}
	function action_po(){
		$('#tester').html('Loading...');
		$.post('<?php echo $config->base_url(); ?>po.html', function(data){
			$('#tester').html(data);
		})
	}
	function action_lpb(){
		$('#tester').html('Loading...');
		$.post('<?php echo $config->base_url(); ?>pb.html', function(data){
			$('#tester').html(data);
		})
	}
	function action_ib(){
		$('#tester').html('Loading...');
		$.post('<?php echo $config->base_url(); ?>ib.html', function(data){
			$('#tester').html(data);
		})
	}
	function action_so(){
		$('#tester').html('Loading...');
		$.post('<?php echo $config->base_url(); ?>so.html', function(data){
			$('#tester').html(data);
		})
	}
	function action_mk(){
		$('#tester').html('Loading...');
		$.post('<?php echo $config->base_url(); ?>mk.html', function(data){
			$('#tester').html(data);
		})
	}
	function action_sj(){
		$('#tester').html('Loading...');
		$.post('<?php echo $config->base_url(); ?>sj.html', function(data){
			$('#tester').html(data);
		})
	}
	function action_ij(){
		$('#tester').html('Loading...');
		$.post('<?php echo $config->base_url(); ?>ij.html', function(data){
			$('#tester').html(data);
		})
	}
</script>