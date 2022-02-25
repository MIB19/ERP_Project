<?php
class bank{
	function show_per($conn){
		$sql	= "
		SELECT
            *
		FROM
            mbank
		WHERE
			sthapus = '0'
		ORDER BY 
			kode DESC
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
			mbank
		";

		$result	= $conn->query($sql);
		$rec = $result->fetch_assoc();
        if(empty($rec)){
            $kode = 'BNK0000000';
        }else{
            $kode = $rec['nama'];
        }
					
		
		return $kode;
	}
	function insert($conn){
		
		$ip			= $_POST['ip'];
		$ws			= $_POST['ws'];
		$nama 		= $_POST['nama'];
		$kode 		= $_POST['kode'];
		$urutan 	= (int) substr($kode, 3, 7);
		$urutan++;
		$huruf 		= "BNK";
		$kode1 		= $huruf . sprintf("%07s", $urutan);
		$ket 		= $_POST['ket'];
		$staktif 	= $_POST['sthapus'];
		$sql	= "
			INSERT INTO 
				mbank(
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
				mbank
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
				mbank 
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
				mbank
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
				mbank
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
				mbank
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
$bank	= new bank();
?>