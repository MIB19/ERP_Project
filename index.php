<?php

require "config/config.php";
require "config/database.php";
require "models/percobaan.php";
require "models/perusahaan.php";
require "models/cabang.php";
require "models/bank.php";
require "models/getip.php";
require "models/getws.php";
require "models/warna.php";
require "models/satuan.php";
require "models/merk.php";
require "models/kategori1.php";
require "models/kategori2.php";
require "models/kategori3.php";
require "models/barang.php";
require "models/departemen.php";
require "models/gudang.php";
require "models/aset.php";
require "models/coa.php";
require "models/pegawai.php";
require "models/entitas.php";
require "models/armada.php";
require "models/ekspdisi.php";
require "models/print.php";
require "models/PO.php";
require "models/penerimaanbarang.php";
require "models/invoicebeli.php";
require "models/salesorder.php";
require "models/memokeluar.php";
require "models/suratjalan.php";
require "models/invoicejual.php";

$menu = "";
if(isset($_REQUEST['menu'])){
	$menu = $_REQUEST['menu'];
}
$menu	= isset($_REQUEST['fsa'])?$_REQUEST['fsa']:'';

switch($menu){

	// NAVIGASI NAVBAR

	case "prsh":
		$prsh1 = $_REQUEST['param1'];
		
		if($prsh1 =='1'){
			$var	= "perusahaan";
			$data['prsh']				= $perusahaan->show_per($conn);
			extract($data);
		}elseif($prsh1 =='2'){
			$var	= "cabang";
			$data['cabang']				= $cabang->show_per($conn);
			extract($data);
		}elseif($prsh1 =='3'){
			$var	= "departemen";
			$data['mdept']				= $departemen->show_per($conn);
			extract($data);
		}elseif($prsh1 =='4'){
			$var	= "gudang";
			$data['mgdn']				= $gudang->show_per($conn);
			extract($data);
		}
		require 'views/'.$var.'.php';
		
	break;

	case "mbrg":
		$mbrg1 = $_REQUEST['param1'];
		$data['mwarn']				= $mwarn->show_per($conn);
		$data['msat']				= $satuan->show_per($conn);
		$data['mmrk']				= $merk->show_per($conn);
		$data['mkat1']				= $kategori1->show_per($conn);
		$data['mkat2']				= $kategori2->show_per($conn);
		$data['mkat3']				= $kategori3->show_per($conn);
		$data['mbrg']				= $barang->show_per($conn);
		extract($data);
		if($mbrg1 =='1'){
			require 'views/warna.php';
		}elseif($mbrg1 =='2'){
			require 'views/satuan.php';
		}elseif($mbrg1 =='3'){
			require 'views/merk.php';
		}elseif($mbrg1 =='4'){
			require 'views/kategori1.php';
		}elseif($mbrg1 =='5'){
			require 'views/kategori2.php';
		}elseif($mbrg1 =='6'){
			require 'views/kategori3.php';
		}elseif($mbrg1 =='7'){
			require 'views/barang.php';
		}
		
	break;

	case "aset":
		$data['maset']				= $aset->show_per($conn);
		extract($data);
			require 'views/aset.php';
	break;

	case "coa":
		$data['mcoa']				= $coa->show_per($conn);
		extract($data);
			require 'views/coa.php';
	break;

	case "bank":
		$data['mbank']				= $bank->show_per($conn);
		extract($data);
			require 'views/bank.php';
	break;

	case "mpeg":
		$data['mpeg']				= $pegawai->show_per($conn);
		extract($data);
			require 'views/pegawai.php';
	break;

	case "mentt":
		$data['mentt']				= $entitas->show_per($conn);
		extract($data);
			require 'views/entitas.php';
	break;

	case "marmd":
		$data['marmd']				= $armada->show_per($conn);
		extract($data);
			require 'views/armada.php';
	break;

	case "meks":
		$data['meks']				= $ekspedisi->show_per($conn);
		extract($data);
			require 'views/ekspedisi.php';
	break;

	case "mprint":
		$data['mprint']				= $mprint->show_per($conn);
		extract($data);
			require 'views/print.php';
	break;

	case "po":
		function rupiah($ang){
			$hasil_rupiah = "Rp " . number_format($ang,2,',','.');
			return $hasil_rupiah;
		}
		$data['tpoh']				= $TPOH->show_per($conn);
		extract($data);
			require 'views/po.php';
	break;

	case "pod":
		$id = $_REQUEST['param1'];
		function rupiah($angka){
			$hasil_rupiah = "Rp " . number_format($angka,2,',','.');
			return $hasil_rupiah;
		}
		$data['tpoh']				= $TPOH->selection($conn, $id);
		$data['tpod']				= $TPOH->detail($conn, $id);
		extract($data);
			require 'views/TPOD.php';
	break;

	case "pb":
		function rupiah($angka){
			$hasil_rupiah = "Rp " . number_format($angka,2,',','.');
			return $hasil_rupiah;
		}
		$data['tpbh']				= $penerimaanbarang->show_per($conn);
		extract($data);
			require 'views/penerimaanbarang.php';
	break;

	case "tpbd":
		$id	= $_REQUEST['param1'];
		$no = $_REQUEST['param2'];
		function rupiah($angka){
			$hasil_rupiah = "Rp " . number_format($angka,2,',','.');
			return $hasil_rupiah;
		}
		$data['tpbh']				= $penerimaanbarang->selection($conn, $id);
		$data['tpbd']				= $penerimaanbarang->detail($conn, $id);
		extract($data);
			require 'views/TPBD.php';
	break;

	case "ib":
		function rupiah($angka){
			$hasil_rupiah = "Rp " . number_format($angka,2,',','.');
			return $hasil_rupiah;
		}
		$data['tibh']				= $invoicebeli->show_per($conn);
		extract($data);
			require 'views/invoicebeli.php';
	break;

	case "tibd":
		$id	= $_REQUEST['param1'];
		function rupiah($angka){
			$hasil_rupiah = "Rp " . number_format($angka,2,',','.');
			return $hasil_rupiah;
		}
		$data['tibh']				= $invoicebeli->selection($conn, $id);
		$data['tibd']				= $invoicebeli->detail($conn, $id);
		extract($data);
			require 'views/TIBD.php';
	break;

	case "so":
		function rupiah($ang){
			$hasil_rupiah = "Rp " . number_format($ang,2,',','.');
			return $hasil_rupiah;
		}
		$data['tsoh']				= $salesorder->show_per($conn);
		extract($data);
			require 'views/salesorder.php';
	break;

	case "tsod":
		$id	= $_REQUEST['param1'];
		function rupiah($a){
			$hasil_rupiah = "Rp " . number_format($a,2,',','.');
			return $hasil_rupiah;
		}
		$data['tsoh']				= $salesorder->selection($conn, $id);
		$data['tsod']				= $salesorder->detail($conn, $id);
		extract($data);
			require 'views/TSOD.php';
	break;

	case "mk":
		function rupiah($ang){
			$hasil_rupiah = "Rp " . number_format($ang,2,',','.');
			return $hasil_rupiah;
		}
		$data['tmemoh']				= $memokeluar->show_per($conn);
		extract($data);
			require 'views/memokeluar.php';
	break;

	case "tmemod":
		$id	= $_REQUEST['param1'];
		
		$data['tmemoh']				= $memokeluar->selection($conn, $id);
		$data['tmemod']				= $memokeluar->detail($conn, $id);
		extract($data);
			require 'views/TMEMOD.php';
	break;

	case "sj":
		function rupiah($ang){
			$hasil_rupiah = "Rp " . number_format($ang,2,',','.');
			return $hasil_rupiah;
		}
		$data['tsjh']				= $suratjalan->show_per($conn);
		extract($data);
			require 'views/suratjalan.php';
	break;

	case "tsjd":
		$id	= $_REQUEST['param1'];
		
		$data['tsjh']				= $suratjalan->selection($conn, $id);
		$data['tsjd']				= $suratjalan->detail($conn, $id);
		extract($data);
			require 'views/TSJD.php';
	break;

	case "ij":
		function rupiah($l){
			$hasil_rupiah = "Rp " . number_format($l,2,',','.');
			return $hasil_rupiah;
		}
		$data['tijh']				= $invoicejual->show_per($conn);
		extract($data);
			require 'views/invoicejual.php';
	break;

	case "tijd":
		$id	= $_REQUEST['param1'];
		function rupiah($i){
			$hasil_rupiah = "Rp " . number_format($i,2,',','.');
			return $hasil_rupiah;
		}
		$data['tijh']				= $invoicejual->selection($conn, $id);
		$data['tijd']				= $invoicejual->detail($conn, $id);
		extract($data);
			require 'views/TIJD.php';
	break;

	// NAVIGASI INSERT

	case "insertmcab":
		
		$cabang						-> insert($conn);
		header("location:$config->base_url"."mcab.html");
	break;

	case "insertprsh":
		
		$perusahaan					-> insert($conn);
		header("location:$config->base_url");
	break;

	case "insertmdept":
		
		$departemen					-> insert($conn);
		header("location:$config->base_url"."mdept.html");
	break;

	case "insertmgdn":
		
		$gudang						-> insert($conn);
		header("location:$config->base_url"."mgdn.html");
	break;

	case "insertmwrn":
		
		$mwarn						-> insert($conn);
		header("location:$config->base_url"."mwarn.html");
	break;

	case "insertmsat":
		
		$satuan						-> insert($conn);
		header("location:$config->base_url"."msat.html");
	break;

	case "insertmmrk":
		
		$merk						-> insert($conn);
		header("location:$config->base_url"."mmrk.html");
	break;

	case "insertmkat1":
		
		$kategori1					-> insert($conn);
		header("location:$config->base_url"."mkat1.html");
	break;

	case "insertmkat2":
		
		$kategori2					-> insert($conn);
		header("location:$config->base_url"."mkat2.html");
	break;

	case "insertmkat3":
		
		$kategori3					-> insert($conn);
		header("location:$config->base_url"."mkat3.html");
	break;

	case "insertmbrg":
		if (is_uploaded_file($_FILES['gmbr']['tmp_name'])) {
			$gambar 		= rand(0,9999).$_FILES['gmbr']['name'];
        	$typefile 		= $_FILES['gmbr']['type'];
        	$tmp_file 		= $_FILES['gmbr']['tmp_name'];
			$file_size 		= $_FILES['gmbr']['size'];
			$path 			= "image/".$gambar;
			if($file_size < 2048000){
				if($typefile =='image/jpeg' or $typefile == 'image/png'){
					move_uploaded_file($tmp_file, $path);
					$barang	 -> insert($conn, $gambar);
					header("location:$config->base_url"."mbrg1.html");
				}else{
					echo "<div class=\"alert alert-danger\" role=\"alert\">Gambar Harus Berekstensi JPG / PNG / JPEG</div>";
				}
			}else{
				echo "<div class=\"alert alert-danger\" role=\"alert\">Gambar Harus Kurang Dari 2 MB</div>";
			}
		
		}
		
	break;

	case "insertmaset":
		
		$aset						-> insert($conn);
		header("location:$config->base_url"."maset.html");
	break;

	case "insertmcoa":
		
		$coa						-> insert($conn);
		header("location:$config->base_url"."mcoa.html");
	break;

	case "insertmbank":
		
		$bank						-> insert($conn);
		header("location:$config->base_url"."mbank.html");
	break;

	case "insertmpeg":
		
		$pegawai					-> insert($conn);
		header("location:$config->base_url"."mpeg1.html");
	break;

	case "insertmen":
		
		$entitas					-> insert($conn);
		header("location:$config->base_url"."mentt1.html");
	break;

	case "insertmarmd":
		
		$armada						-> insert($conn);
		header("location:$config->base_url"."marmd1.html");
	break;

	case "insertmeks":
		
		$ekspedisi					-> insert($conn);
		header("location:$config->base_url"."meks1.html");
	break;

	case "insertmprint":
		
		$mprint						-> insert($conn);
		header("location:$config->base_url"."mprint1.html");
	break;

	case "inserttpo":
		$id	= $_POST['no'];
		$TPOH						-> insert_tpod($conn);
		header("location:$config->base_url"."addpo1/$id.html");
	break;

	case "inserttpoh":
		$TPOH						-> insert_tpoh($conn);
		header("location:$config->base_url"."tpoh.html");
	break;

	case "inserttpbh":
		$kd = $_POST['kode'];
		$po		= $_POST['tpoh'];
		$string	= explode(", ", $po);
		$tpoh = $string[2];
		$penerimaanbarang			-> insert($conn);
		header("location:$config->base_url"."addtpbd/$kd/$tpoh.html");
	break;

	case "inserttpbd":
		$id = $_POST['tpoh'];
		$no = $_POST['tpbh'];
		$ip							= $getip->show_per();
		$ws							= $getws->show_per();
		$penerimaanbarang			-> insert_tpbd($conn);
		header("location:$config->base_url"."tpbd1/$id/$no.html");
	break;

	case "inserttibh":
		$invoicebeli			-> insert($conn);
		header("location:$config->base_url"."tibh.html");
	break;

	case "inserttibd":
		$id = $_POST['tibh'];
		$invoicebeli			-> insert_tibd($conn);
		header("location:$config->base_url"."tibd1/$id.html");
	break;

	case "inserttsoh":
		$salesorder			-> insert($conn);
		header("location:$config->base_url"."tsoh.html");
	break;

	case "inserttsod":
		$id = $_POST['tsoh'];
		$salesorder			-> insert_tsod($conn);
		header("location:$config->base_url"."tsod1/$id.html");
	break;

	case "inserttmemoh":
		$memokeluar		-> insert($conn);
		header("location:$config->base_url"."tmemoh.html");
	break;

	case "inserttmemod":
		$id = $_POST['tmemoh'];
		$memokeluar			-> insert_tmemod($conn);
		header("location:$config->base_url"."tmemod1/$id.html");
	break;

	case "inserttsjh":
		$suratjalan		-> insert($conn);
		header("location:$config->base_url"."tsjh.html");
	break;

	case "inserttsjd":
		$id = $_POST['tsjh'];
		$suratjalan			-> insert_tsjd($conn);
		header("location:$config->base_url"."tsjd1/$id.html");
	break;

	case "inserttijh":
		$invoicejual		-> insert($conn);
		header("location:$config->base_url"."tijh.html");
	break;

	case "inserttijd":
		$id = $_POST['tijh'];
		$invoicejual			-> insert_tijd($conn);
		header("location:$config->base_url"."tijd1/$id.html");
	break;

	// NAVIGASI UPDATE

	case "selectprsh":
		$id = $_REQUEST['param1'];
		$data['per']			= $perusahaan	->select($conn,$id);
		$data['bank']			= $bank			->show_per($conn);
		extract($data);
		$ip						= $getip		->show_per();
		$ws						= $getws		->show_per();
		require 'views/update/updperusahaan.php';
	break;

	case "selectcab":
		$id = $_REQUEST['param1'];
		$data['cab']			= $cabang		->select($conn,$id);
		$data['mbank']			= $bank			->show_per($conn);
		$data['prsh']			= $perusahaan	->show_per($conn);
		extract($data);
		$ip						= $getip		->show_per();
		$ws						= $getws		->show_per();
		require 'views/update/updcabang.php';
	break;

	case "selectmdept":
		$id = $_REQUEST['param1'];
		$data['mdept']			= $departemen	->select($conn, $id);
		$data['mcab']			= $cabang		->show_per($conn);
		$data['prsh']			= $perusahaan	->show_per($conn);
		extract($data);
		$ip						= $getip		->show_per();
		$ws						= $getws		->show_per();
		require 'views/update/upddepartemen.php';
	break;

	case "selectmgdn":
		$id = $_REQUEST['param1'];
		$data['mgdn']			= $gudang		->select($conn, $id);
		$data['mcab']			= $cabang		->show_per($conn);
		$data['prsh']			= $perusahaan	->show_per($conn);
		extract($data);
		$ip						= $getip		->show_per();
		$ws						= $getws		->show_per();
		require 'views/update/updgudang.php';
	break;

	case "selectmwarn":
		$id = $_REQUEST['param1'];
		$data['mwrn']			= $mwarn		->select($conn,$id);
		extract($data);
		$ip						= $getip		->show_per();
		$ws						= $getws		->show_per();
		require 'views/update/updwarna.php';
	break;

	case "selectmsat":
		$id = $_REQUEST['param1'];
		$data['msat']			= $satuan		->select($conn,$id);
		extract($data);
		$ip						= $getip		->show_per();
		$ws						= $getws		->show_per();
		require 'views/update/updsatuan.php';
	break;

	case "selectmmrk":
		$id = $_REQUEST['param1'];
		$data['mmrk']			= $merk			->select($conn,$id);
		$data['prsh']			= $perusahaan	->show_per($conn);
		$data['mcab']			= $cabang		->show_per($conn);
		extract($data);
		$ip						= $getip		->show_per();
		$ws						= $getws		->show_per();
		require 'views/update/updmerk.php';
	break;

	case "selectkat1":
		$id = $_REQUEST['param1'];
		$data['mkat1']			= $kategori1	->select($conn,$id);
		$data['prsh']			= $perusahaan	->show_per($conn);
		$data['mcab']			= $cabang		->show_per($conn);
		extract($data);
		$ip						= $getip		->show_per();
		$ws						= $getws		->show_per();
		require 'views/update/updkategori1.php';
	break;

	case "selectkat2":
		$id = $_REQUEST['param1'];
		$data['mkat2']			= $kategori2	->select($conn,$id);
		$data['prsh']			= $perusahaan	->show_per($conn);
		$data['mcab']			= $cabang		->show_per($conn);
		$data['mkat1']			= $kategori1	->show_per($conn);
		extract($data);
		$ip						= $getip		->show_per();
		$ws						= $getws		->show_per();
		require 'views/update/updkategori2.php';
	break;

	case "selectkat3":
		$id = $_REQUEST['param1'];
		$data['mkat3']			= $kategori3	->select($conn,$id);
		$data['prsh']			= $perusahaan	->show_per($conn);
		$data['mcab']			= $cabang		->show_per($conn);
		$data['mkat2']			= $kategori2	->show_per($conn);
		extract($data);
		$ip						= $getip		->show_per();
		$ws						= $getws		->show_per();
		require 'views/update/updkategori3.php';
	break;

	case "selectmbrg":
		$id = $_REQUEST['param1'];
		$data['mbrg']			= $barang		->select($conn,$id);
		$data['prsh']			= $perusahaan	->show_per($conn);
		$data['mwrn']			= $mwarn		->show_per($conn);
		$data['mcab']			= $cabang		->show_per($conn);
		$data['msat']			= $satuan		->show_per($conn);
		$data['mmrk']			= $merk			->show_per($conn);
		$data['mkat1']			= $kategori1	->show_per($conn);
		$data['mkat2']			= $kategori2	->show_per($conn);
		$data['mkat3']			= $kategori3	->show_per($conn);
		extract($data);
		$ip						= $getip		->show_per();
		$ws						= $getws		->show_per();
		require 'views/update/updbarang.php';
	break;

	case "selectmaset":
		$id = $_REQUEST['param1'];
		$data['maset']			= $aset			->select($conn,$id);
		$data['prsh']			= $perusahaan	->show_per($conn);
		$data['mcab']			= $cabang		->show_per($conn);
		$data['mwrn']			= $mwarn		->show_per($conn);
		$data['mmrk']			= $merk			->show_per($conn);
		extract($data);
		$ip						= $getip		->show_per();
		$ws						= $getws		->show_per();
		require 'views/update/updaset.php';
	break;

	case "selectmcoa":
		$id = $_REQUEST['param1'];
		$data['mcoa']			= $coa			->select($conn,$id);
		$data['prsh']			= $perusahaan	->show_per($conn);
		$data['mcab']			= $cabang		->show_per($conn);
		$data['mbank']			= $bank			->show_per($conn);
		extract($data);
		$ip						= $getip		->show_per();
		$ws						= $getws		->show_per();
		require 'views/update/updcoa.php';
	break;

	case "selectmbank":
		$id = $_REQUEST['param1'];
		$data['mbank']			= $bank			->select($conn,$id);
		extract($data);
		$ip						= $getip		->show_per();
		$ws						= $getws		->show_per();
		require 'views/update/updbank.php';
	break;

	case "selectmpeg":
		$id = $_REQUEST['param1'];
		$data['mpeg']			= $pegawai		->select($conn, $id);
		$data['prsh']			= $perusahaan	->show_per($conn);
		$data['mcab']			= $cabang		->show_per($conn);
		$data['mdept']			= $departemen	->show_per($conn);
		$data['mbank']			= $bank			->show_per($conn);
		extract($data);
		$ip						= $getip		->show_per();
		$ws						= $getws		->show_per();
		require 'views/update/updpegawai.php';
	break;

	case "selectmentt":
		$id = $_REQUEST['param1'];
		$data['mentt']			= $entitas		->select($conn,$id);
		$data['prsh']			= $perusahaan	->show_per($conn);
		$data['mbank']			= $bank			->show_per($conn);
		$data['mcab']			= $cabang		->show_per($conn);
		extract($data);
		$ip						= $getip		->show_per();
		$ws						= $getws		->show_per();
		require 'views/update/updentitas.php';
	break;

	case "selectmarmd":
		$id = $_REQUEST['param1'];
		$data['marmd']			= $armada		->select($conn,$id);
		$data['prsh']			= $perusahaan	->show_per($conn);
		$data['mcab']			= $cabang		->show_per($conn);
		$data['mwrn']			= $armada		->show_per($conn);
		$data['mmrk']			= $merk			->show_per($conn);
		extract($data);
		$ip						= $getip		->show_per();
		$ws						= $getws		->show_per();
		require 'views/update/updarmada.php';
	break;

	case "selectmeks":
		$id = $_REQUEST['param1'];
		$data['meks']			= $ekspedisi	->select($conn,$id);
		$data['prsh']			= $perusahaan	->show_per($conn);
		$data['mcab']			= $cabang		->show_per($conn);
		extract($data);
		$ip						= $getip		->show_per();
		$ws						= $getws		->show_per();
		require 'views/update/updekspedisi.php';
	break;

	case "selectmprint":
		$id = $_REQUEST['param1'];
		$data['mprint']			= $mprint		->select($conn,$id);
		$data['prsh']			= $perusahaan	->show_per($conn);
		$data['mcab']			= $cabang		->show_per($conn);
		extract($data);
		$ip						= $getip		->show_per();
		$ws						= $getws		->show_per();
		require 'views/update/updprint.php';
	break;

	case "selecttpod":
		$id = $_REQUEST['param1'];
		$data['tpod']			= $TPOH			->select_tpod($conn,$id);
		$data['mbrg']			= $barang		->show_per($conn);
		$data['mgdn']			= $gudang		->show_per($conn);
		extract($data);
		$ip						= $getip		->show_per();
		$ws						= $getws		->show_per();
		require 'views/update/updtpod.php';
	break;

	case "selecttpoh":
		$id = $_REQUEST['param1'];
		$data['tpoh']			= $TPOH->select($conn, $id);
		$data['tpod']			= $TPOH->detail($conn, $id);
		$ip						= $getip->show_per();
		$ws 					= $getws->show_per();
		$data['mprsh']			= $perusahaan->show_per($conn);
		$data['mcab']			= $cabang->show_per($conn); 
		$data['mentt']			= $entitas->show($conn);
		$data['meks']			= $ekspedisi->show_per($conn);
			extract($data);
		require 'views/update/updtpoh.php';
	break;

	// NAVIGASI SETELAH UPDATE

	case "updatemcab":
		
		$cabang					-> update($conn);
		header("location:$config->base_url"."mcab.html");
	break;

	case "updateprsh":
		
		$perusahaan				-> update($conn);
		header("location:$config->base_url");
	break;

	case "updatemdept":
		
		$departemen				-> update($conn);
		header("location:$config->base_url"."mdept.html");
	break;

	case "updatemgdn":
		
		$gudang					-> update($conn);
		header("location:$config->base_url"."mgdn.html");
	break;

	case "updatemwrn":
		
		$mwarn					-> update($conn);
		header("location:$config->base_url"."mwarn.html");
	break;

	case "updatemsat":
		
		$satuan					-> update($conn);
		header("location:$config->base_url"."msat.html");
	break;

	case "updatemmrk":
		
		$merk					-> update($conn);
		header("location:$config->base_url"."mmrk.html");
	break;

	case "updatemkat1":
		
		$kategori1				-> update($conn);
		header("location:$config->base_url"."mkat1.html");
	break;

	case "updatemkat2":
		
		$kategori2				-> update($conn);
		header("location:$config->base_url"."mkat2.html");
	break;

	case "updatemkat3":
		
		$kategori3				-> update($conn);
		header("location:$config->base_url"."mkat3.html");
		
	break;

	case "updatembrg":
		if (is_uploaded_file($_FILES['gmbr']['tmp_name'])) {
			$gambar = rand(0,9999).$_FILES['gmbr']['name'];
        	$typefile = $_FILES['gmbr']['type'];
        	$tmp_file = $_FILES['gmbr']['tmp_name'];
			$file_size = $_FILES['gmbr']['size'];
			$path = "image/".$gambar;
			if($file_size < 2048000){
				if($typefile =='image/jpeg' or $typefile == 'image/png'){
					move_uploaded_file($tmp_file, $path);
					$barang	 -> update($conn, $gambar);
					header("location:$config->base_url"."mbrg1.html");
				}else{
					echo "<div class=\"alert alert-danger\" role=\"alert\">Gambar Harus Berekstensi JPG / PNG / JPEG</div>";
				}
			}else{
				echo "<div class=\"alert alert-danger\" role=\"alert\">Gambar Harus Kurang Dari 2 MB</div>";
			}
		}else{
			$gambar = $_POST['gambar'];
		}
		
		$barang					-> update($conn, $gambar);
		header("location:$config->base_url"."mbrg1.html");
	break;

	case "updatemaset":
		
		$aset					-> update($conn);
		header("location:$config->base_url"."maset.html");
	break;

	case "updatemcoa":
		
		$coa					-> update($conn);
		header("location:$config->base_url"."mcoa.html");
	break;

	case "updatembank":
		
		$bank					-> update($conn);
		header("location:$config->base_url"."mbank.html");
	break;

	case "updatempeg":
		
		$pegawai				-> update($conn);
		header("location:$config->base_url"."mpeg1.html");
	break;

	case "updatementt":
		
		$entitas				-> update($conn);
		header("location:$config->base_url"."mentt1.html");
	break;

	case "updatemarmd":
		
		$armada					-> update($conn);
		header("location:$config->base_url"."marmd1.html");
	break;

	case "updatemeks":
		
		$ekspedisi				-> update($conn);
		header("location:$config->base_url"."meks1.html");
	break;

	case "updatemprint":
		
		$mprint					-> update($conn);
		header("location:$config->base_url"."mprint1.html");
	break;

	case "updatetpod":
		$tpoh = $_POST['tpoh'];
		$TPOH					-> update($conn);
		header("location:$config->base_url"."tpod/$tpoh.html");
	break;

	// NAVIGASI DELETE

	case "hapusprsh":
		$id 				= $_REQUEST['param1'];
		$ip 				= $getip		->show_per();
		$ws					= $getws		->show_per();
		$perusahaan			-> hapus($conn, $id, $ip, $ws);
		header("location:$config->base_url");
	break;

	case "hapusmcab":
		$id = $_REQUEST['param1'];
		$ip					= $getip		->show_per();
		$ws					= $getws		->show_per();
		$cabang				-> hapus($conn, $id, $ip, $ws);
	break;

	case "hapusmdept":
		$id = $_REQUEST['param1'];
		$ip					= $getip		->show_per();
		$ws					= $getws		->show_per();
		$departemen			-> hapus($conn, $id, $ip, $ws);
	break;

	case "hapusmgdn":
		$id 				= $_REQUEST['param1'];
		$ip					= $getip		->show_per();
		$ws					= $getws		->show_per();
		$gudang				-> hapus($conn, $id, $ip, $ws);
	break;

	case "hapusmwrn":
		$id 				= $_REQUEST['param1'];
		$ip					= $getip		->show_per();
		$ws					= $getws		->show_per();
		$mwarn				-> hapus($conn, $id, $ip, $ws);
	break;

	case "hapusmsat":
		$id 				= $_REQUEST['param1'];
		$ip					= $getip		->show_per();
		$ws					= $getws		->show_per();
		$satuan				-> hapus($conn, $id, $ip, $ws);
	break;

	case "hapusmmrk":
		$id 				= $_REQUEST['param1'];
		$ip					= $getip		->show_per();
		$ws					= $getws		->show_per();
		$merk				-> hapus($conn, $id, $ip, $ws);
	break;

	case "hapusmkat1":
		$id 				= $_REQUEST['param1'];
		$ip					= $getip		->show_per();
		$ws					= $getws		->show_per();
		$kategori1			-> hapus($conn, $id, $ip, $ws);
	break;

	case "hapusmkat2":
		$id 				= $_REQUEST['param1'];
		$ip					= $getip		->show_per();
		$ws					= $getws		->show_per();
		$kategori2			-> hapus($conn, $id, $ip, $ws);
	break;

	case "hapusmkat3":
		$id 				= $_REQUEST['param1'];
		$ip					= $getip		->show_per();
		$ws					= $getws		->show_per();
		$kategori3			-> hapus($conn, $id, $ip, $ws);
	break;

	case "hapusmbrg":
		$id 				= $_REQUEST['param1'];
		$ip					= $getip		->show_per();
		$ws					= $getws		->show_per();
		$barang				-> hapus($conn, $id, $ip, $ws);
	break;

	case "hapusmaset":
		$id 				= $_REQUEST['param1'];
		$ip					= $getip		->show_per();
		$ws					= $getws		->show_per();
		$aset				-> hapus($conn, $id, $ip, $ws);
	break;

	case "hapusmcoa":
		$id 				= $_REQUEST['param1'];
		$ip					= $getip		->show_per();
		$ws					= $getws		->show_per();
		$coa				-> hapus($conn, $id, $ip, $ws);
	break;

	case "hapusmbank":
		$id 				= $_REQUEST['param1'];
		$ip					= $getip		->show_per();
		$ws					= $getws		->show_per();
		$bank				-> hapus($conn, $id, $ip, $ws);
	break;

	case "hapusmpeg":
		$id 				= $_REQUEST['param1'];
		$ip					= $getip		->show_per();
		$ws					= $getws		->show_per();
		$pegawai			-> hapus($conn, $id, $ip, $ws);
	break;

	case "hapusmentt":
		$id 				= $_REQUEST['param1'];
		$ip					= $getip		->show_per();
		$ws					= $getws		->show_per();
		$entitas			-> hapus($conn, $id, $ip, $ws);
	break;

	case "hapusmarmd":
		$id 				= $_REQUEST['param1'];
		$ip					= $getip		->show_per();
		$ws					= $getws		->show_per();
		$armada				-> hapus($conn, $id, $ip, $ws);
	break;

	case "hapusmeks":
		$id 				= $_REQUEST['param1'];
		$ip					= $getip		->show_per();
		$ws					= $getws		->show_per();
		$ekspedisi			-> hapus($conn, $id, $ip, $ws);
	break;

	case "hapusmprint":
		$id 				= $_REQUEST['param1'];
		$ip					= $getip		->show_per();
		$ws					= $getws		->show_per();
		$mprint				-> hapus($conn, $id, $ip, $ws);
	break;

	case "hapustpoh":
		$id 				= $_REQUEST['param1'];
		$TPOH				-> hapus($conn, $id);
	break;

	case "hapustpod":
		$id 				= $_REQUEST['param2'];
		$TPOH				-> hapus_tpods($conn, $id);
	break;

	// aktif non aktif st aktif

	case "aktifprsh":
		$id 				= $_REQUEST['param1'];
		$ip					= $getip		->show_per();
		$ws					= $getws		->show_per();
		$perusahaan			-> aktif($conn, $id, $ip, $ws);
	break;

	case "nonaktifprsh":
		$id 				= $_REQUEST['param1'];
		$ip					= $getip		->show_per();
		$ws					= $getws		->show_per();
		$perusahaan			-> nonaktif($conn, $id, $ip, $ws);
	break;

	case "aktifmsat":
		$id 				= $_REQUEST['param1'];
		$ip					= $getip		->show_per();
		$ws					= $getws		->show_per();
		$satuan				-> aktif($conn, $id, $ip, $ws);
	break;

	case "nonaktifmsat":
		$id 				= $_REQUEST['param1'];
		$ip					= $getip		->show_per();
		$ws					= $getws		->show_per();
		$satuan				-> nonaktif($conn, $id, $ip, $ws);
	break;

	case "aktifmwrn":
		$id 				= $_REQUEST['param1'];
		$ip					= $getip		->show_per();
		$ws					= $getws		->show_per();
		$mwarn				-> aktif($conn, $id, $ip, $ws);
	break;

	case "nonaktifmwrn":
		$id 				= $_REQUEST['param1'];
		$ip					= $getip		->show_per();
		$ws					= $getws		->show_per();
		$mwarn				-> nonaktif($conn, $id, $ip, $ws);
	break;

	case "aktifmaset":
		$id 				= $_REQUEST['param1'];
		$ip					= $getip		->show_per();
		$ws					= $getws		->show_per();
		$aset				-> aktif($conn, $id, $ip, $ws);
	break;

	case "nonaktifmaset":
		$id 				= $_REQUEST['param1'];
		$ip					= $getip		->show_per();
		$ws					= $getws		->show_per();
		$aset				-> nonaktif($conn, $id, $ip, $ws);
	break;

	case "aktifmbank":
		$id 				= $_REQUEST['param1'];
		$ip					= $getip		->show_per();
		$ws					= $getws		->show_per();
		$bank				-> aktif($conn, $id, $ip, $ws);
	break;

	case "nonaktifmbank":
		$id 				= $_REQUEST['param1'];
		$ip					= $getip		->show_per();
		$ws					= $getws		->show_per();
		$bank				-> nonaktif($conn, $id, $ip, $ws);
	break;

	case "aktifmbrg":
		$id 				= $_REQUEST['param1'];
		$ip					= $getip		->show_per();
		$ws					= $getws		->show_per();
		$barang				-> aktif($conn, $id, $ip, $ws);
	break;

	case "nonaktifmbrg":
		$id 				= $_REQUEST['param1'];
		$ip					= $getip		->show_per();
		$ws					= $getws		->show_per();
		$barang				-> nonaktif($conn, $id, $ip, $ws);
	break;

	case "aktiftrdmbrg":
		$id 				= $_REQUEST['param1'];
		$ip					= $getip		->show_per();
		$ws					= $getws		->show_per();
		$barang				-> aktiftrd($conn, $id, $ip, $ws);
	break;

	case "nonaktiftrdmbrg":
		$id 				= $_REQUEST['param1'];
		$ip					= $getip		->show_per();
		$ws					= $getws		->show_per();
		$barang				-> nonaktiftrd($conn, $id, $ip, $ws);
	break;

	case "aktifastmbrg":
		$id 				= $_REQUEST['param1'];
		$ip					= $getip		->show_per();
		$ws					= $getws		->show_per();
		$barang				-> aktifast($conn, $id, $ip, $ws);
	break;

	case "nonaktifastmbrg":
		$id 				= $_REQUEST['param1'];
		$ip					= $getip		->show_per();
		$ws					= $getws		->show_per();
		$barang				-> nonaktifast($conn, $id, $ip, $ws);
	break;

	case "aktifatkmbrg":
		$id					= $_REQUEST['param1'];
		$ip					= $getip		->show_per();
		$ws					= $getws		->show_per();
		$barang				-> aktifatk($conn, $id, $ip, $ws);
	break;

	case "nonaktifatkmbrg":
		$id 				= $_REQUEST['param1'];
		$ip					= $getip		->show_per();
		$ws					= $getws		->show_per();
		$barang				-> nonaktifatk($conn, $id, $ip, $ws);
	break;

	case "aktifmcab":
		$id 				= $_REQUEST['param1'];
		$ip					= $getip		->show_per();
		$ws					= $getws		->show_per();
		$cabang				-> aktif($conn, $id, $ip, $ws);
	break;

	case "nonaktifmcab":
		$id 				= $_REQUEST['param1'];
		$ip					= $getip		->show_per();
		$ws					= $getws		->show_per();
		$cabang				-> nonaktif($conn, $id, $ip, $ws);
	break;

	case "aktifmcoa":
		$id 				= $_REQUEST['param1'];
		$ip					= $getip		->show_per();
		$ws					= $getws		->show_per();
		$coa				-> aktif($conn, $id, $ip, $ws);
	break;

	case "nonaktifmcoa":
		$id 				= $_REQUEST['param1'];
		$ip					= $getip		->show_per();
		$ws					= $getws		->show_per();
		$coa				-> nonaktif($conn, $id, $ip, $ws);
	break;

	case "aktifmdept":
		$id 				= $_REQUEST['param1'];
		$ip					= $getip		->show_per();
		$ws					= $getws		->show_per();
		$departemen			-> aktif($conn, $id, $ip, $ws);
	break;

	case "nonaktifmdept":
		$id 				= $_REQUEST['param1'];
		$ip					= $getip		->show_per();
		$ws					= $getws		->show_per();
		$departemen			-> nonaktif($conn, $id, $ip, $ws);
	break;

	case "aktifmentt":
		$id 				= $_REQUEST['param1'];
		$ip					= $getip		->show_per();
		$ws					= $getws		->show_per();
		$entitas			-> aktif($conn, $id, $ip, $ws);
	break;

	case "nonaktifmentt":
		$id 				= $_REQUEST['param1'];
		$ip					= $getip		->show_per();
		$ws					= $getws		->show_per();
		$entitas			-> nonaktif($conn, $id, $ip, $ws);
	break;

	case "aktifsupmentt":
		$id 				= $_REQUEST['param1'];
		$ip					= $getip		->show_per();
		$ws					= $getws		->show_per();
		$entitas			-> aktifsup($conn, $id, $ip, $ws);
	break;

	case "nonaktifsupmentt":
		$id 				= $_REQUEST['param1'];
		$ip					= $getip		->show_per();
		$ws					= $getws		->show_per();
		$entitas			-> nonaktifsup($conn, $id, $ip, $ws);
	break;

	case "aktifcustmentt":
		$id 				= $_REQUEST['param1'];
		$ip					= $getip		->show_per();
		$ws					= $getws		->show_per();
		$entitas			-> aktifcust($conn, $id, $ip, $ws);
	break;

	case "nonaktifcustmentt":
		$id 				= $_REQUEST['param1'];
		$ip					= $getip		->show_per();
		$ws					= $getws		->show_per();
		$entitas			-> nonaktifcust($conn, $id, $ip, $ws);
	break;

	case "aktifmgdn":
		$id 				= $_REQUEST['param1'];
		$ip					= $getip		->show_per();
		$ws					= $getws		->show_per();
		$gudang				-> aktif($conn, $id, $ip, $ws);
	break;

	case "nonaktifmgdn":
		$id 				= $_REQUEST['param1'];
		$ip					= $getip		->show_per();
		$ws					= $getws		->show_per();
		$gudang				-> nonaktif($conn, $id, $ip, $ws);
	break;

	case "aktifmkat1":
		$id 				= $_REQUEST['param1'];
		$ip					= $getip		->show_per();
		$ws					= $getws		->show_per();
		$kategori1			-> aktif($conn, $id, $ip, $ws);
	break;

	case "nonaktifmkat1":
		$id 				= $_REQUEST['param1'];
		$ip					= $getip		->show_per();
		$ws					= $getws		->show_per();
		$kategori1			-> nonaktif($conn, $id, $ip, $ws);
	break;

	case "aktifmkat2":
		$id 				= $_REQUEST['param1'];
		$ip					= $getip		->show_per();
		$ws					= $getws		->show_per();
		$kategori2			-> aktif($conn, $id, $ip, $ws);
	break;

	case "nonaktifmkat2":
		$id 				= $_REQUEST['param1'];
		$ip					= $getip		->show_per();
		$ws					= $getws		->show_per();
		$kategori2			-> nonaktif($conn, $id, $ip, $ws);
	break;

	case "aktifmkat3":
		$id 				= $_REQUEST['param1'];
		$ip					= $getip		->show_per();
		$ws					= $getws		->show_per();
		$kategori3			-> aktif($conn, $id, $ip, $ws);
	break;

	case "nonaktifmkat3":
		$id 				= $_REQUEST['param1'];
		$ip					= $getip		->show_per();
		$ws					= $getws		->show_per();
		$kategori3			-> nonaktif($conn, $id, $ip, $ws);
	break;

	case "aktifmmrk":
		$id 				= $_REQUEST['param1'];
		$ip					= $getip		->show_per();
		$ws					= $getws		->show_per();
		$merk				-> aktif($conn, $id, $ip, $ws);
	break;

	case "nonaktifmmrk":
		$id 				= $_REQUEST['param1'];
		$ip					= $getip		->show_per();
		$ws					= $getws		->show_per();
		$merk				-> nonaktif($conn, $id, $ip, $ws);
	break;

	case "aktifmpeg":
		$id 				= $_REQUEST['param1'];
		$ip					= $getip		->show_per();
		$ws					= $getws		->show_per();
		$pegawai			-> aktif($conn, $id, $ip, $ws);
	break;

	case "nonaktifmpeg":
		$id 				= $_REQUEST['param1'];
		$ip					= $getip		->show_per();
		$ws					= $getws		->show_per();
		$pegawai			-> nonaktif($conn, $id, $ip, $ws);
	break;

	case "aktifmarmd":
		$id 				= $_REQUEST['param1'];
		$ip					= $getip		->show_per();
		$ws					= $getws		->show_per();
		$armada				-> aktif($conn, $id, $ip, $ws);
	break;

	case "nonaktifmarmd":
		$id 				= $_REQUEST['param1'];
		$ip					= $getip		->show_per();
		$ws					= $getws		->show_per();
		$armada				-> nonaktif($conn, $id, $ip, $ws);
	break;

	case "aktifmeks":
		$id 				= $_REQUEST['param1'];
		$ip					= $getip		->show_per();
		$ws					= $getws		->show_per();
		$ekspedisi			-> aktif($conn, $id, $ip, $ws);
	break;

	case "nonaktifmeks":
		$id 				= $_REQUEST['param1'];
		$ip					= $getip		->show_per();
		$ws					= $getws		->show_per();
		$ekspedisi			-> nonaktif($conn, $id, $ip, $ws);
	break;

	case "aktifmprint":
		$id 				= $_REQUEST['param1'];
		$ip					= $getip		->show_per();
		$ws					= $getws		->show_per();
		$mprint				-> aktif($conn, $id, $ip, $ws);
	break;

	case "nonaktifmprint":
		$id 				= $_REQUEST['param1'];
		$ip					= $getip		->show_per();
		$ws					= $getws		->show_per();
		$mprint				-> nonaktif($conn, $id, $ip, $ws);
	break;

	// NAVIGASI TAMBAH DATA

	case "addprsh":
		$add = $_REQUEST['param1'];
		$data['bank']			= $bank->show_per($conn);
		$data['prsh']			= $perusahaan->show_per($conn);	
		$data['mcab']			= $cabang->show_per($conn);
		$kdmgdn					= $gudang->kode($conn);	
		$code					= $perusahaan->kode($conn);
		$kode					= $cabang->kode($conn);
		$kddep					= $departemen->kode($conn);
		$ip						= $getip->show_per();
		$ws 					= $getws->show_per();
		extract($data);

		if($add == '1'){
			require 'views/create/crtmprsh.php';
		}elseif($add == '2'){
			require 'views/create/crtmcab.php';
		}elseif($add == '3'){
			require 'views/create/crtmdept.php';
		}elseif($add == '4'){
			require 'views/create/crtmgdn.php';
		}
	break;

	case "addbrg":
		$add = $_REQUEST['param1'];
		$ip						= $getip->show_per();
		$ws 					= $getws->show_per();
		$kdwrn					= $mwarn->kode($conn);
		$kdsat					= $satuan->kode($conn);
		$kdmrk					= $merk->kode($conn);
		$kdkat1					= $kategori1->kode($conn);
		$kdkat2					= $kategori2->kode($conn);
		$kdkat3					= $kategori3->kode($conn);
		$kdbrg					= $barang->kode($conn);
		$data['prsh']			= $perusahaan->show_per($conn);
		$data['mcab']			= $cabang->show_per($conn);
		$data['mkat1']			= $kategori1->show_per($conn);
		$data['mkat2']			= $kategori2->show_per($conn);
		$data['mkat3']			= $kategori3->show_per($conn);
		$data['mwrn']			= $mwarn->show_per($conn);
		$data['mmrk']			= $merk->show_per($conn);
		$data['msat']			= $satuan->show_per($conn);
			extract($data);
		if($add == '1'){
			require 'views/create/crtmwrn.php';
		}elseif($add == '2'){
			require 'views/create/crtmsat.php';
		}elseif($add == '3'){
			require 'views/create/crtmmrk.php';
		}elseif($add == '4'){
			require 'views/create/crtmkat1.php';
		}elseif($add == '5'){
			require 'views/create/crtmkat2.php';
		}elseif($add == '6'){
			require 'views/create/crtmkat3.php';
		}elseif($add == '7'){
			require 'views/create/crtbarang.php';
		}
	break;

	case "addaset":
		$ip						= $getip->show_per();
		$ws 					= $getws->show_per();
		$data['mprsh']			= $perusahaan->show_per($conn);
		$data['mcab']			= $cabang->show_per($conn);
		$data['mwrn']			= $mwarn->show_per($conn);
		$data['mmrk']			= $merk->show_per($conn);
		$kdaset					= $aset->kode($conn);
			extract($data);
		require 'views/create/crtmaset.php';
	break;

	case "addcoa":
		$ip						= $getip->show_per();
		$ws 					= $getws->show_per();
		$data['mprsh']			= $perusahaan->show_per($conn);
		$data['mcab']			= $cabang->show_per($conn);
		$data['mbank']			= $bank->show_per($conn);
		$kdcoa					= $coa->kode($conn);
			extract($data);
		require 'views/create/crtmcoa.php';
	break;

	case "addbank":
		$ip						= $getip->show_per();
		$ws 					= $getws->show_per();
		$data['mbank']			= $bank->show_per($conn);
		$kdbnk					= $bank->kode($conn);
			extract($data);
		require 'views/create/crtmbank.php';
	break;

	case "addmpeg":
		$ip						= $getip->show_per();
		$ws 					= $getws->show_per();
		$data['mbank']			= $bank->show_per($conn);
		$data['prsh']			= $perusahaan->show_per($conn);
		$data['mcab']			= $cabang->show_per($conn);
		$data['mdept']			= $departemen->show_per($conn);
		$kdmpeg					= $pegawai->kode($conn);
			extract($data);
		require 'views/create/crtmpeg.php';
	break;

	case "addmentt":
		$ip						= $getip->show_per();
		$ws 					= $getws->show_per();
		$data['mbank']			= $bank->show_per($conn);
		$data['prsh']			= $perusahaan->show_per($conn);
		$data['mcab']			= $cabang->show_per($conn);
		$kdentt					= $entitas->kode($conn);
			extract($data);
		require 'views/create/crtmentt.php';
	break;

	case "addmarmd":
		$ip						= $getip->show_per();
		$ws 					= $getws->show_per();
		$data['mwrn']			= $mwarn->show_per($conn);
		$data['mmrk']			= $merk->show_per($conn);
		$data['prsh']			= $perusahaan->show_per($conn);
		$data['mcab']			= $cabang->show_per($conn);
		$kdarm					= $armada->kode($conn);
			extract($data);
		require 'views/create/crtmarmd.php';
	break;

	case "addmeks":
		$ip						= $getip->show_per();
		$ws 					= $getws->show_per();
		$data['prsh']			= $perusahaan->show_per($conn);
		$data['mcab']			= $cabang->show_per($conn);
		$kdeks					= $ekspedisi->kode($conn);
			extract($data);
		require 'views/create/crtmeks.php';
	break;

	case "addmprint":
		$ip						= $getip->show_per();
		$ws 					= $getws->show_per();
		$data['prsh']			= $perusahaan->show_per($conn);
		$data['mcab']			= $cabang->show_per($conn);
		$kdprnt					= $mprint->kode($conn);
			extract($data);
		require 'views/create/crtmprint.php';
	break;

	case "addpo":
		$kd						= $TPOH->kode($conn);
		$ip						= $getip->show_per();
		$ws 					= $getws->show_per();
		$data['mprsh']			= $perusahaan->show_per($conn);
		$data['mcab']			= $cabang->show_per($conn); 
		$data['mentt']			= $entitas->show($conn);
		$data['meks']			= $ekspedisi->show_per($conn);
			extract($data);
		require 'views/create/crttpoh.php';
	break;

	case "addpo1":
		$halaman = "crtpoh";
		$id = $_REQUEST['param1'];
		$data['tpoh']			= $TPOH->select($conn, $id);
		$data['tpod']			= $TPOH->detail($conn, $id);
		$ip						= $getip->show_per();
		$ws 					= $getws->show_per();
		$data['mprsh']			= $perusahaan->show_per($conn);
		$data['mcab']			= $cabang->show_per($conn); 
		$data['mentt']			= $entitas->show($conn);
		$data['meks']			= $ekspedisi->show_per($conn);
			extract($data);
		require 'views/index.php';
	break;

	case "addtpbh":
		$ip						= $getip->show_per();
		$ws 					= $getws->show_per();
		$data['prsh']			= $perusahaan->show_per($conn);
		$data['mcab']			= $cabang->show_per($conn);
		$data['tpoh']			= $TPOH->show_per1($conn);
		$data['mgdn']			= $gudang->show_per($conn);
		$kd						= $penerimaanbarang->kode($conn);
			extract($data);
		require 'views/create/crttpbh.php';
	break;


	case "addtibh":
		$ip						= $getip->show_per();
		$ws 					= $getws->show_per();
		$data['prsh']			= $perusahaan->show_per($conn);
		$data['mcab']			= $cabang->show_per($conn);
		$data['tpbh']			= $penerimaanbarang->show_per1($conn);
		$data['mgdn']			= $gudang->show_per($conn);
		$data['mentt']			= $entitas->show($conn);
		$data['mpeg']			= $pegawai->pegsales($conn);
		$kd						= $invoicebeli->kode($conn);
			extract($data);
		require 'views/create/crttibh.php';
	break;

	case "addtibd":
		$id = $_REQUEST['param1'];
		$data['msat']			= $satuan->show_per($conn);
		$data['mcab']			= $cabang->show_per($conn);
		$data['mgdn']			= $gudang->show_per($conn);
		$data['tpbd']			= $penerimaanbarang->selectpbd($conn);
		$kd						= $invoicebeli->kodeib($conn);
			extract($data);
		require 'views/create/crttibd.php';
	break;

	case "addtsoh":
		$kd						= $salesorder->kode($conn);
		$ip						= $getip->show_per();
		$ws 					= $getws->show_per();
		$data['mprsh']			= $perusahaan->show_per($conn);
		$data['mcab']			= $cabang->show_per($conn); 
		$data['mentt']			= $entitas->showcust($conn);
		$data['meks']			= $ekspedisi->show_per($conn);
		$data['mpeg']			= $pegawai->pegsales($conn);
		$data['mgdn']			= $gudang->show_per($conn);
			extract($data);
		require 'views/create/crttsoh.php';
	break;

	case "addtsod":
		$id = $_REQUEST['param1'];
		$kode = $_REQUEST['param2'];
		$data['msat']			= $satuan->show_per($conn);
		$data['mgdn']			= $gudang->show_per($conn);
		$data['mbrg']			= $barang->show_per($conn);
			extract($data);
		require 'views/create/crttsod.php';
	break;

	case "addtmemoh":
		$kd						= $memokeluar->kode($conn);
		$ip						= $getip->show_per();
		$ws 					= $getws->show_per();
		$data['mprsh']			= $perusahaan->show_per($conn);
		$data['mcab']			= $cabang->show_per($conn); 
			extract($data);
		require 'views/create/crttmemoh.php';
	break;

	case "addtmemod":
		$id = $_REQUEST['param1'];
		$kode = $_REQUEST['param2'];
		$data['msat']			= $satuan->show_per($conn);
		$data['mbrg']			= $barang->show_per($conn);
			extract($data);
		require 'views/create/crttmemod.php';
	break;

	case "addtsjh":
		$kd						= $suratjalan->kode($conn);
		$ip						= $getip->show_per();
		$ws 					= $getws->show_per();
		$data['mprsh']			= $perusahaan->show_per($conn);
		$data['mcab']			= $cabang->show_per($conn);
		$data['mgdn']			= $gudang->show_per($conn);
		$data['mentt']			= $entitas->showcust($conn);
		$data['meks']			= $ekspedisi->show_per($conn);
		$data['mpeg']			= $pegawai->pegsales($conn); 
			extract($data);
		require 'views/create/crttsjh.php';
	break;

	case "addtsjd":
		$id = $_REQUEST['param1'];
		$kode = $_REQUEST['param2'];
		$data['msat']			= $satuan->show_per($conn);
		$data['mgdn']			= $gudang->show_per($conn);
		$data['mbrg']			= $barang->show_per($conn);
		$data['tsod']			= $salesorder->show_per1($conn);
			extract($data);
		require 'views/create/crttsjd.php';
	break;

	case "addtijh":
		$kd						= $invoicejual->kode($conn);
		$ip						= $getip->show_per();
		$ws 					= $getws->show_per();
		$data['mprsh']			= $perusahaan->show_per($conn);
		$data['mcab']			= $cabang->show_per($conn);
		$data['mgdn']			= $gudang->show_per($conn);
		$data['mentt']			= $entitas->showcust($conn);
		$data['mpeg']			= $pegawai->pegsales($conn); 
			extract($data);
		require 'views/create/crttijh.php';
	break;

	case "addtijd":
		$id = $_REQUEST['param1'];
		$kode = $_REQUEST['param2'];
		$data['mgdn']			= $gudang->show_per($conn);
		$data['mbrg']			= $barang->show_per($conn);
		$data['tsjd']			= $suratjalan->show_sjs($conn);
			extract($data);
		require 'views/create/crttijd.php';
	break;

	case "addtpod":
		$halaman = "/create/form";
		$kode = $_REQUEST['param1'];
		$data['tpoh']		= $TPOH->show_($conn, $kode);
		$data['mbrg']		= $barang->show_per($conn);
		$data['mgdn']		= $gudang->show_per($conn);
			extract($data);
		require 'views/index.php';
	break;

	case "add":
		$halaman = "departemen";
		$data['mdept']				= $departemen->show_per($conn);
		extract($data);
		require 'views/index.php';
	break;

	case "coba":
		$kode = $_POST['kode'];
		$TPOH					-> insert($conn);
		header("location:$config->base_url"."addtpod/$kode.html");
	break;

	case "tpoh":
		$halaman = "po";
		function rupiah($angka){
			$hasil_rupiah = "Rp " . number_format($angka,2,',','.');
			return $hasil_rupiah;
		}
		$data['tpoh']				= $TPOH->show_per($conn);
		extract($data);
			require 'views/index.php';
	break;

	case "tpod":
		$halaman = "TPOD";
		$id = $_REQUEST['param1'];
		function rupiah($k){
			$hasil_rupiah = "Rp " . number_format($k,2,',','.');
			return $hasil_rupiah;
		}
		$data['tpoh']				= $TPOH->selection($conn, $id);
		$data['tpod']				= $TPOH->detail($conn, $id);
		extract($data);
			require 'views/index.php';
	break;

	// NAVIGASI UTAMA

	case "addtpbd":
		$halaman = "create/crttpbd";
		$kd = $_REQUEST['param1'];
		$id = $_REQUEST['param2'];

		$data['tpbh']		= $penerimaanbarang->selectpbh($conn, $kd);
		$data['tpod']		= $TPOH->detail($conn, $id);
			extract($data);
		require 'views/index.php';
	break;

	case "tijd1":
		$halaman = "TIJD";
		$id	= $_REQUEST['param1'];
		function rupiah($ii){
			$hasil_rupiah = "Rp " . number_format($ii,2,',','.');
			return $hasil_rupiah;
		}
		$data['tijh']				= $invoicejual->selection($conn, $id);
		$data['tijd']				= $invoicejual->detail($conn, $id);
		extract($data);
			require 'views/index.php';
	break;

	case "tijh":
		$halaman = "invoicejual";
		function rupiah($p){
			$hasil_rupiah = "Rp " . number_format($p,2,',','.');
			return $hasil_rupiah;
		}
		$data['tijh']				= $invoicejual->show_per($conn);
		extract($data);
			require 'views/index.php';
	break;

	case "tsjd1":
		$halaman = "TSJD";
		$id	= $_REQUEST['param1'];
		
		$data['tsjh']				= $suratjalan->selection($conn, $id);
		$data['tsjd']				= $suratjalan->detail($conn, $id);
		extract($data);
			require 'views/index.php';
	break;

	case "tsjh":
		$halaman = "suratjalan";
		function rupiah($ae){
			$hasil_rupiah = "Rp " . number_format($ae,2,',','.');
			return $hasil_rupiah;
		}
		$data['tsjh']				= $suratjalan->show_per($conn);
		extract($data);
			require 'views/index.php';
	break;

	case "tmemod1":
		$halaman = "TMEMOD";
		$id	= $_REQUEST['param1'];
		
		$data['tmemoh']				= $memokeluar->selection($conn, $id);
		$data['tmemod']				= $memokeluar->detail($conn, $id);
		extract($data);
			require 'views/index.php';
	break;

	case "tmemoh":
		$halaman = "memokeluar";
		$data['tmemoh']				= $memokeluar->show_per($conn);
		extract($data);
			require 'views/index.php';
	break;

	case "tsod1":
		$halaman = "TSOD";
		$id	= $_REQUEST['param1'];
		function rupiah($a){
			$hasil_rupiah = "Rp " . number_format($a,2,',','.');
			return $hasil_rupiah;
		}
		$data['tsoh']				= $salesorder->selection($conn, $id);
		$data['tsod']				= $salesorder->detail($conn, $id);
		extract($data);
			require 'views/index.php';
	break;

	case "tsoh":
		$halaman = "salesorder";
		function rupiah($sulit){
			$hasil_rupiah = "Rp " . number_format($sulit,2,',','.');
			return $hasil_rupiah;
		}
		$data['tsoh']				= $salesorder->show_per($conn);
		extract($data);
			require 'views/index.php';
	break;

	case "tibd1":
		$halaman = "TIBD";
		$id	= $_REQUEST['param1'];
		function rupiah($angk){
			$hasil_rupiah = "Rp " . number_format($angk,2,',','.');
			return $hasil_rupiah;
		}
		$data['tibh']				= $invoicebeli->selection($conn, $id);
		$data['tibd']				= $invoicebeli->detail($conn, $id);
		extract($data);
			require 'views/index.php';
	break;

	case "tibh":
		$halaman = "invoicebeli";
		function rupiah($b){
			$hasil_rupiah = "Rp " . number_format($b,2,',','.');
			return $hasil_rupiah;
		}
		$data['tibh']				= $invoicebeli->show_per($conn);
		extract($data);
			require 'views/index.php';
	break;

	case "tpbh":
		$halaman = "penerimaanbarang";
		function rupiah($c){
			$hasil_rupiah = "Rp " . number_format($c,2,',','.');
			return $hasil_rupiah;
		}
		$data['tpbh']				= $penerimaanbarang->show_per($conn);
		extract($data);
			require 'views/index.php';
	break;

	case "tpbd1":
		$halaman = "TPBD";
		$id	= $_REQUEST['param2'];
		$no = $_REQUEST['param1'];
		function rupiah($an){
			$hasil_rupiah = "Rp " . number_format($an,2,',','.');
			return $hasil_rupiah;
		}
		$data['tpbh']				= $penerimaanbarang->selection($conn, $id);
		$data['tpbd']				= $penerimaanbarang->detail($conn, $id);
		extract($data);
			require 'views/index.php';
	break;
	
	case "mdept":
		$halaman = "departemen";
		$data['mdept']				= $departemen->show_per($conn);
		extract($data);
		require 'views/index.php';
	break;
	
	case "mcab":
		$halaman = "cabang";
		$data['cabang']				= $cabang->show_per($conn);
		extract($data);
		require 'views/index.php';
	break;

	case "mgdn":
		$halaman = "gudang";
		$data['mgdn']				= $gudang->show_per($conn);
		extract($data);
		require 'views/index.php';
	break;

	case "maset":
		$halaman = "aset";
		$data['maset']				= $aset->show_per($conn);
		extract($data);
		require 'views/index.php';
	break;

	case "marmd1":
		$halaman = "armada";
		$data['marmd']				= $armada->show_per($conn);
		extract($data);
		require 'views/index.php';
	break;

	case "mbank":
		$halaman = "bank";
		$data['mbank']				= $bank->show_per($conn);
		extract($data);
		require 'views/index.php';
	break;

	case "mbrg1":
		$halaman = "barang";
		$data['mbrg']				= $barang->show_per($conn);
		extract($data);
		require 'views/index.php';
	break;

	case "mcoa":
		$halaman = "coa";
		$data['mcoa']				= $coa->show_per($conn);
		extract($data);
		require 'views/index.php';
	break;

	case "msat":
		$halaman = "satuan";
		$data['msat']				= $satuan->show_per($conn);
		extract($data);
		require 'views/index.php';
	break;

	case "meks1":
		$halaman = "ekspedisi";
		$data['meks']				= $ekspedisi->show_per($conn);
		extract($data);
		require 'views/index.php';
	break;

	case "mentt1":
		$halaman = "entitas";
		$data['mentt']				= $entitas->show_per($conn);
		extract($data);
		require 'views/index.php';
	break;

	case "mkat1":
		$halaman = "kategori1";
		$data['mkat1']				= $kategori1->show_per($conn);
		extract($data);
		require 'views/index.php';
	break;

	case "mkat2":
		$halaman = "kategori2";
		$data['mkat2']				= $kategori2->show_per($conn);
		extract($data);
		require 'views/index.php';
	break;

	case "mkat3":
		$halaman = "kategori3";
		$data['mkat3']				= $kategori3->show_per($conn);
		extract($data);
		require 'views/index.php';
	break;

	case "mmrk":
		$halaman = "merk";
		$data['mmrk']				= $merk->show_per($conn);
		extract($data);
		require 'views/index.php';
	break;

	case "mpeg1":
		$halaman = "pegawai";
		$data['mpeg']				= $pegawai->show_per($conn);
		extract($data);
		require 'views/index.php';
	break;

	case "mprint1":
		$halaman = "print";
		$data['mprint']				= $mprint->show_per($conn);
		extract($data);
		require 'views/index.php';
	break;

	case "mwarn":
		$halaman = "warna";
		$data['mwrn']				= $mwarn->show_per($conn);
		extract($data);
		require 'views/index.php';
	break;

	default:
		$halaman = "perusahaan";
		$prshn['prsh']			= $perusahaan->show_per($conn);
		extract($prshn);
		require "views/index.php";
	break;
}
?>