<?php
class armada{
	function show_per($conn){
		$sql	= "
        SELECT
            mprsh.nama as pnama,
            mcab.nama as cnama,
            mmrk.nama as mnama,
            mwrn.nama as wnama,
            marmd.no,
            marmd.kode,
            marmd.nama,
            marmd.tipe,
            marmd.tahun,
            marmd.nobpkb,
            marmd.notnkb,
            marmd.tglbpkb,
            marmd.tgltnkb,
            marmd.ket,
            marmd.staktif,
            marmd.sthapus
		FROM
            mprsh, mcab, mmrk, mwrn, marmd
        WHERE
            marmd.sthapus = '0'
        AND
            marmd.mprsh = mprsh.no
        AND
            marmd.mcab = mcab.no
        AND
            marmd.mmrk = mmrk.no
        AND
            marmd.mwrn = mwrn.no
		ORDER BY 
			marmd.kode DESC
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
			marmd
		";

		$result	= $conn->query($sql);
		$rec = $result->fetch_assoc();
        if(empty($rec)){
            $kode = 'ARM0000000';
        }else{
            $kode = $rec['nama'];
        }
					
		
		return $kode;
	}
	function insert($conn){
		$mprsh      = $_POST['mprsh'];
        $mcab       = $_POST['mcab'];
		$ws		    = $_POST['ws'];
		$ip		    = $_POST['ip'];
		$nama 	    = $_POST['nama'];
		$mmrk	    = $_POST['mmrk'];
		$mwrn	    = $_POST['mwrn'];
		$tipe	    = $_POST['tipe'];
        $nobpkb     = $_POST['nobpkb'];
        $notnkb     = $_POST['notnkb'];
        $tglbpkb    = $_POST['tglbpkb'];
        $tgltnkb    = $_POST['tgltnkb'];
		$tahun	    = $_POST['tahun'];
		$kode 	    = $_POST['kode'];
		$urutan     = (int) substr($kode, 3, 7);
		$urutan++;
		$huruf      = "ARM";
		$kode1      = $huruf . sprintf("%07s", $urutan);
		$ket 	    = $_POST['ket'];
		$staktif    = $_POST['sthapus'];
		$sql	= "
			INSERT INTO 
				marmd(
						mprsh, mcab, kode, nama, mmrk, mwrn, tipe, tahun, nobpkb, notnkb, tglbpkb, tgltnkb, ket, staktif, sthapus, creaIP, creaWS, creaTS
					) 
					VALUES (
						'$mprsh', '$mcab', '$kode1', '$nama', '$mmrk', '$mwrn', '$tipe', '$tahun', '$nobpkb', '$notnkb', '$tglbpkb', '$tgltnkb', '$ket', '$staktif', 0, '$ip', '$ws', now() 
					)";

		$result	= $conn->query($sql);
	}
	function select($conn,$id){
		$sql	= "
			SELECT
				*
			FROM
				marmd
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
	function update($conn){
		$ip		    = $_POST['ip'];
		$ws		    = $_POST['ws'];
		$id 	    = $_POST['no'];
		$mprsh      = $_POST['mprsh'];
        $mcab       = $_POST['mcab'];
		$nama 	    = $_POST['nama'];
		$mmrk	    = $_POST['mmrk'];
		$mwrn	    = $_POST['mwrn'];
        $nobpkb     = $_POST['nobpkb'];
        $notnkb     = $_POST['notnkb'];
        $tglbpkb    = $_POST['tglbpkb'];
        $tgltnkb    = $_POST['tgltnkb'];
		$tipe	    = $_POST['tipe'];
		$tahun	    = $_POST['tahun'];
		$ket 	    = $_POST['ket'];

		$sql	= "
			UPDATE 
				marmd 
			SET 
				mprsh	    = '$mprsh',
                mcab        = '$mcab',
				nama	    = '$nama',
				mmrk	    = '$mmrk',
				mwrn	    = '$mwrn',
				tipe	    = '$tipe',
				tahun	    = '$tahun',
                nobpkb      = '$nobpkb',
                notnkb      = '$notnkb',
                tglbpkb     = '$tglbpkb',
                tgltnkb     = '$tgltnkb',
				ket		    = '$ket',
				lastIP	    = '$ip',
				lastWS	    = '$ws',
				lastTS	    = now()
			WHERE 
				no = '$id'";

		$result	= $conn->query($sql);
	}
	function aktif($conn,$id,$ip,$ws){
		$sql	= "
			UPDATE 
				marmd 
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
				marmd 
			SET 
				staktif	= '1',
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
				marmd 
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
$armada	= new armada();
?>