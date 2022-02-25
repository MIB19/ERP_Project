<?php
class barang{
	function show_per($conn){
		$sql	= "
        SELECT
            mprsh.nama as pnama,
            mcab.nama as cnama,
            mmrk.nama as mrknama,
            msat.nama as satnama,
            mwrn.nama as wrnnama,
            mkat1.nama as k1nama,
            mkat2.nama as k2nama,
            mkat3.nama as k3nama,
			mbrg.msat,
			mbrg.no,
            mbrg.kode,
            mbrg.kodegl,
            mbrg.nama,
            mbrg.stokmin,
            mbrg.bobot,
            mbrg.hrgmin,
            mbrg.hpp,
            mbrg.hrg,
            mbrg.tag,
            mbrg.gmbr,
            mbrg.ket,
			mbrg.sttrade,
            mbrg.staset,
            mbrg.statk,
			mbrg.staktif
		FROM
            mprsh, mcab, mmrk, msat, mwrn, mkat1, mkat2, mkat3, mbrg
		WHERE
			mbrg.sthapus = '0'
        AND
            mbrg.mprsh = mprsh.no
        AND
            mbrg.mcab = mcab.no
        AND
            mbrg.mmrk = mmrk.no
        AND
            mbrg.msat = msat.no
        AND
            mbrg.mwrn = mwrn.no
        AND
            mbrg.mkat1 = mkat1.no
        AND
            mbrg.mkat2 = mkat2.no
        AND
            mbrg.mkat3 = mkat3.no
		ORDER BY 
			mbrg.kode DESC
		";

		$result	= $conn->query($sql);
		$record	= array();
		if($result){
			if(!empty($result)){
				while($rec = $result->fetch_assoc()){
					$record[]	= $rec;
				}
			}
		}
		
		return $record;
    }
    function kode($conn){
		$sql	= "
		SELECT 
			max(kode) as nama
		FROM 
			mbrg
		";

		$result	= $conn->query($sql);
		$rec = $result->fetch_assoc();
        if(empty($rec)){
            $kode = 'BRG0000000';
        }else{
            $kode = $rec['nama'];
        }
					
		
		return $kode;
	}
	function insert($conn, $gambar){
		$mprsh      = $_POST['mprsh'];
        $mcab       = $_POST['mcab'];
        $kode 	    = $_POST['kode'];
		$urutan     = (int) substr($kode, 3, 7);
		$urutan++;
		$huruf = "BRG";
		$kode1      = $huruf . sprintf("%07s", $urutan);
        $kodegl     = $_POST['kodegl'];
		$nama 	    = $_POST['nama'];
        $mmrk       = $_POST['mmrk'];
        $msat       = $_POST['msat'];
        $mwrn       = $_POST['mwrn'];
        $mkat1      = $_POST['mkat1'];
        $mkat2      = $_POST['mkat2'];
        $mkat3      = $_POST['mkat3'];
        $stokmin    = $_POST['stokmin'];
        $bobot      = $_POST['bobot'];
        $hrgmin     = $_POST['hargamin'];
        $hpp        = $_POST['hpp'];
        $hrg        = $_POST['harga'];
        $tag        = $_POST['tag'];
		$ket 	    = $_POST['ket'];
		$sttrade	= $_POST['sttrade'];
        $staset     = $_POST['staset'];
        $statk      = $_POST['statk'];
		$staktif    = $_POST['sthapus'];
        $ws		    = $_POST['ws'];
		$ip		    = $_POST['ip'];
		$sql	= "
			INSERT INTO 
				mbrg(
						mprsh, mcab, kode, kodegl, nama, mmrk, msat, mwrn, mkat1, mkat2, mkat3, stokmin, bobot, hrgmin, hpp, hrg, tag, gmbr, ket, sttrade, staset, statk, staktif, sthapus, creaIP, creaWS, creaTS
					) 
					VALUES (
						'$mprsh', '$mcab', '$kode1', '$kodegl', '$nama', '$mmrk', '$msat', '$mwrn', '$mkat1', '$mkat2', '$mkat3', '$stokmin', '$bobot', '$hrgmin', '$hpp', '$hrg', '$tag', '$gambar', '$ket', '$sttrade', '$staset', '$statk', '$staktif', 0, '$ip', '$ws', now()
					)";

		$result	= $conn->query($sql);
	}
	function select($conn,$id){
		$sql	= "
			SELECT
				*
			FROM
				mbrg
			WHERE
				no = '$id'";
		$result	= $conn->query($sql);
		$record	= array();
		if($result){
			if(!empty($result)){
				$rec	= $result->fetch_assoc();
				$record	= $rec;
			}
		}
		return $record;
	}
	function update($conn, $gambar){
		$id 		= $_POST['no'];
		$mprsh  	= $_POST['mprsh'];
		$mcab		= $_POST['mcab'];
		$kodegl 	= $_POST['kodegl'];
		$nama 		= $_POST['nama'];
		$mmrk		= $_POST['mmrk'];
		$msat		= $_POST['msat'];
		$mwrn		= $_POST['mwrn'];
		$mkat1		= $_POST['mkat1'];
        $mkat2  	= $_POST['mkat2'];
		$mkat3		= $_POST['mkat3'];
		$stokmin	= $_POST['stokmin'];
		$bobot		= $_POST['bobot'];
		$hrgmin		= $_POST['hargamin'];
		$hpp		= $_POST['hpp'];
		$hrg		= $_POST['harga'];
		$tag		= $_POST['tag'];
		$ket 		= $_POST['ket'];
		$sttrade	= $_POST['sttrade'];
		$staset		= $_POST['staset'];
		$statk		= $_POST['statk'];
		$ip			= $_POST['ip'];
		$ws			= $_POST['ws'];

		$sql	= "
			UPDATE 
				mbrg
			SET 
				mprsh	= '$mprsh',
				mcab	= '$mcab',
				kodegl	= '$kodegl',
				nama	= '$nama',
				mmrk	= '$mmrk',
				msat	= '$msat',
				mwrn	= '$mwrn',
				mkat1	= '$mkat1',
                mkat2   = '$mkat2',
				mkat3	= '$mkat3',
				stokmin = '$stokmin',
				bobot	= '$bobot',
				hrgmin	= '$hrgmin',
				hpp		= '$hpp',
				hrg		= '$hrg',
				tag		= '$tag',
				gmbr	= '$gambar',
				ket		= '$ket',
				sttrade = '$sttrade',
				staset	= '$staset',
				statk	= '$statk',
				lastIP	= '$ip',
				lastWS	= '$ws',
				lastTS	= now()
			WHERE 
				no = '$id'";

		$result	= $conn->query($sql);
	}
	function aktif($conn,$id,$ip,$ws){
		$sql	= "
			UPDATE 
				mbrg 
			SET 
				staktif	= '0',
				lastWS	= '$ws',
				lastIP	= '$ip',
				lastTS	= now()
			WHERE 
				no = '$id'";

		$result	= $conn->query($sql);
	}
	function nonaktif($conn,$id,$ip,$ws){
		$sql	= "
			UPDATE 
				mbrg 
			SET 
				staktif	= '1',
				lastWS	= '$ws',
				lastIP	= '$ip',
				lastTS	= now()
			WHERE 
				no = '$id'";

		$result	= $conn->query($sql);
	}
	function aktiftrd($conn,$id,$ip,$ws){
		$sql	= "
			UPDATE 
				mbrg 
			SET 
				sttrade	= '0',
				lastWS	= '$ws',
				lastIP	= '$ip',
				lastTS	= now()
			WHERE 
				no = '$id'";

		$result	= $conn->query($sql);
	}
	function nonaktiftrd($conn,$id,$ip,$ws){
		$sql	= "
			UPDATE 
				mbrg 
			SET 
				sttrade	= '1',
				lastWS	= '$ws',
				lastIP	= '$ip',
				lastTS	= now()
			WHERE 
				no = '$id'";

		$result	= $conn->query($sql);
	}
	function aktifast($conn,$id,$ip,$ws){
		$sql	= "
			UPDATE 
				mbrg 
			SET 
				staset	= '0',
				lastWS	= '$ws',
				lastIP	= '$ip',
				lastTS	= now()
			WHERE 
				no = '$id'";

		$result	= $conn->query($sql);
	}
	function nonaktifast($conn,$id,$ip,$ws){
		$sql	= "
			UPDATE 
				mbrg 
			SET 
				staset	= '1',
				lastWS	= '$ws',
				lastIP	= '$ip',
				lastTS	= now()
			WHERE 
				no = '$id'";

		$result	= $conn->query($sql);
	}
	function aktifatk($conn,$id,$ip,$ws){
		$sql	= "
			UPDATE 
				mbrg 
			SET 
				statk	= '0',
				lastWS	= '$ws',
				lastIP	= '$ip',
				lastTS	= now()
			WHERE 
				no = '$id'";

		$result	= $conn->query($sql);
	}
	function nonaktifatk($conn,$id,$ip,$ws){
		$sql	= "
			UPDATE 
				mbrg 
			SET 
				statk	= '1',
				lastWS	= '$ws',
				lastIP	= '$ip',
				lastTS	= now()
			WHERE 
				no = '$id'";

		$result	= $conn->query($sql);
	}
	function hapus($conn,$id,$ip,$ws){
		$sql	= "
			UPDATE 
				mbrg 
			SET 
				sthapus	= '1',
				lastWS	= '$ws',
				lastIP	= '$ip',
				lastTS	= now()
			WHERE 
				no = '$id'";

		$result	= $conn->query($sql);
	}
	
}
$barang	= new barang();
?>