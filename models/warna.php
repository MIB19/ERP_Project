<?php
class mwarn{
	function show_per($conn){
		$sql	= "
		SELECT
            *
		FROM
            mwrn
		WHERE
			sthapus = '0'
		ORDER BY 
			mwrn.kode DESC
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
			mwrn
		";

		$result	= $conn->query($sql);
		$rec = $result->fetch_assoc();
        if(empty($rec)){
            $kode = 'WRN0000000';
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
		$huruf = "WRN";
		$kode1 = $huruf . sprintf("%07s", $urutan);
		$ket 	= $_POST['ket'];
		$staktif = $_POST['sthapus'];
		$sql	= "
			INSERT INTO 
				mwrn(
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
				mwrn
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
				mwrn 
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
				mwrn 
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
				mwrn 
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
				mwrn 
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
$mwarn	= new mwarn();
?>