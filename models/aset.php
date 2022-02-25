<?php
class aset{
	function show_per($conn){
		$sql	= "
        SELECT
            mprsh.nama as pnama,
            mcab.nama as cnama,
            mmrk.nama as mnama,
            mwrn.nama as wnama,
            maset.no,
            maset.kode,
            maset.nama,
            maset.noseri,
            maset.tipe,
            maset.tahun,
            maset.qty,
            maset.ket,
            maset.staktif,
            maset.sthapus,
            maset.stinput
		FROM
            mprsh, mcab, mmrk, mwrn, maset
        WHERE
            maset.sthapus = '0'
        AND
            maset.mprsh = mprsh.no
        AND
            maset.mcab = mcab.no
        AND
            maset.mmrk = mmrk.no
        AND
            maset.mwrn = mwrn.no
		ORDER BY 
			maset.kode DESC
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
			maset
		";

		$result	= $conn->query($sql);
		$rec = $result->fetch_assoc();
        if(empty($rec)){
            $kode = 'AST0000000';
        }else{
            $kode = $rec['nama'];
        }
					
		
		return $kode;
	}
	function insert($conn){
		$mprsh  	= $_POST['mprsh'];
        $mcab   	= $_POST['mcab'];
		$ws			= $_POST['ws'];
		$ip			= $_POST['ip'];
		$nama 		= $_POST['nama'];
		$mmrk		= $_POST['mmrk'];
		$mwrn		= $_POST['mwrn'];
		$noseri		= $_POST['noseri'];
		$tipe		= $_POST['tipe'];
		$tahun		= $_POST['tahun'];
		$qty		= $_POST['qty'];
		$kode 		= $_POST['kode'];
		$urutan 	= (int) substr($kode, 3, 7);
		$urutan++;
		$huruf 		= "AST";
		$kode1 		= $huruf . sprintf("%07s", $urutan);
		$ket 		= $_POST['ket'];
		$staktif 	= $_POST['sthapus'];
		$sql	= "
			INSERT INTO 
				maset(
						mprsh, mcab, kode, nama, mmrk, mwrn, noseri, tipe, tahun, qty, ket, staktif, sthapus, creaIP, creaWS, creaTS
					) 
					VALUES (
						'$mprsh', '$mcab', '$kode1', '$nama', '$mmrk', '$mwrn', '$noseri', '$tipe', '$tahun', '$qty', '$ket', '$staktif', 0, '$ip', '$ws', now() 
					)";

		$result	= $conn->query($sql);
	}
	function select($conn,$id){
		$sql	= "
			SELECT
				*
			FROM
				maset
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
		$ip		= $_POST['ip'];
		$ws		= $_POST['ws'];
		$id 	= $_POST['no'];
		$mprsh  = $_POST['mprsh'];
        $mcab   = $_POST['mcab'];
		$nama 	= $_POST['nama'];
		$mmrk	= $_POST['mmrk'];
		$mwrn	= $_POST['mwrn'];
		$noseri	= $_POST['noseri'];
		$tipe	= $_POST['tipe'];
		$tahun	= $_POST['tahun'];
		$qty	= $_POST['qty'];
		$ket 	= $_POST['ket'];

		$sql	= "
			UPDATE 
				maset 
			SET 
				mprsh	= '$mprsh',
                mcab    = '$mcab',
				nama	= '$nama',
				mmrk	= '$mmrk',
				mwrn	= '$mwrn',
				noseri	= '$noseri',
				tipe	= '$tipe',
				tahun	= '$tahun',
				qty		= '$qty',
				ket		= '$ket',
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
				maset 
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
				maset 
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
				maset 
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
$aset	= new aset();
?>