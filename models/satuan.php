<?php
class satuan{
	function show_per($conn){
		$sql	= "
		SELECT
            *
		FROM
            msat
		WHERE
			sthapus = '0'
		ORDER BY 
			msat.kode DESC
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
			msat
		";

		$result	= $conn->query($sql);
		$rec = $result->fetch_assoc();
        if(empty($rec)){
            $kode = 'SAT0000000';
        }else{
            $kode = $rec['nama'];
        }
					
		
		return $kode;
	}
	function insert($conn){
		
		$ip		= $_POST['ip'];
		$ws		= $_POST['ws'];
		$nama 	= $_POST['nama'];
		$kode 	= $_POST['kode'];
		$urutan = (int) substr($kode, 3, 7);
		$urutan++;
		$huruf = "SAT";
		$kode1 = $huruf . sprintf("%07s", $urutan);
		$ket 	= $_POST['ket'];
		$staktif = $_POST['sthapus'];
		$sql	= "
			INSERT INTO 
				msat(
						kode, nama, ket, staktif, sthapus, creaIP, creaWS, creaTS
					) 
					VALUES (
						'$kode1', '$nama', '$ket', '$staktif', 0, '$ip', '$ws', now()
					)";

		$result	= $conn->query($sql);
	}
	function select($conn,$id){
		$sql	= "
			SELECT
				*
			FROM
				msat
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
		$nama 	= $_POST['nama'];
		$ket 	= $_POST['ket'];

		$sql	= "
			UPDATE 
				msat 
			SET 
				nama	= '$nama',
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
				msat 
			SET 
				staktif	= '0',
				lastIP 	= '$ip',
				lastWS 	= '$ws',
				lastTS	= now()
			WHERE 
				no = '$id'";

		$result	= $conn->query($sql);
	}
	function nonaktif($conn,$id,$ip,$ws){
		$sql	= "
			UPDATE 
				msat 
			SET 
				staktif	= '1',
				lastIP 	= '$ip',
				lastWS 	= '$ws',
				lastTS	= now()
			WHERE 
				no = '$id'";

		$result	= $conn->query($sql);
	}
	function hapus($conn,$id,$ip,$ws){
		$sql	= "
			UPDATE 
				msat 
			SET 
				sthapus	= '1',
				lastIP 	= '$ip',
				lastWS 	= '$ws',
				lastTS	= now()
			WHERE 
				no = '$id'";

		$result	= $conn->query($sql);
	}
	
}
$satuan	= new satuan();
?>