<?php
class merk{
	function show_per($conn){
		$sql	= "
        SELECT
            mprsh.nama as pnama,
            mcab.nama as cnama,
            mmrk.no,
            mmrk.kode,
            mmrk.kodegl,
            mmrk.nama,
            mmrk.ket,
			mmrk.staktif
		FROM
            mprsh, mcab, mmrk
		WHERE
			mmrk.sthapus = '0'
        AND
            mmrk.mprsh = mprsh.no
        AND
            mmrk.mcab = mcab.no
		ORDER BY 
			mmrk.kode DESC
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
			mmrk
		";

		$result	= $conn->query($sql);
		$rec = $result->fetch_assoc();
        if(empty($rec)){
            $kode = 'MRK0000000';
        }else{
            $kode = $rec['nama'];
        }
					
		
		return $kode;
	}
	function insert($conn){
		$mprsh  = $_POST['mprsh'];
		$ws		= $_POST['ws'];
		$ip		= $_POST['ip'];
        $mcab   = $_POST['mcab'];
        $kodegl = $_POST['kodegl'];
		$nama 	= $_POST['nama'];
		$kode 	= $_POST['kode'];
		$urutan = (int) substr($kode, 3, 7);
		$urutan++;
		$huruf = "MRK";
		$kode1 = $huruf . sprintf("%07s", $urutan);
		$ket 	= $_POST['ket'];
		$staktif = $_POST['sthapus'];
		$sql	= "
			INSERT INTO 
				mmrk(
						mprsh, mcab, kode, kodegl, nama, ket, staktif, sthapus, creaIP, creaWS, creaTS
					) 
					VALUES (
						'$mprsh', '$mcab', '$kode1', '$kodegl', '$nama', '$ket', '$staktif', 0, '$ip', '$ws', now() 
					)";

		$result	= $conn->query($sql);
	}
	function select($conn,$id){
		$sql	= "
			SELECT
				*
			FROM
				mmrk
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
		$mprsh  = $_POST['mprsh'];
		$id 	= $_POST['no'];
		$nama 	= $_POST['nama'];
		$kodegl	= $_POST['kodegl'];
		$mcab 	= $_POST['mcab'];
		$ket 	= $_POST['ket'];

		$sql	= "
			UPDATE 
				mmrk	 
			SET 
				mprsh	= '$mprsh',
				nama	= '$nama',
				mcab	= '$mcab',
				kodegl	= '$kodegl',
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
				mmrk 
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
				mmrk 
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
				mmrk 
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
$merk	= new merk();
?>