<?php
class perusahaan{
	function show_per($conn){
		$sql	= "
		SELECT
            *
		FROM
            mprsh
		WHERE
			sthapus = '0'
		ORDER BY 
			mprsh.kode DESC
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
			mprsh
		";

		$result	= $conn->query($sql);
		$rec = $result->fetch_assoc();
        if(empty($rec)){
            $kode = 'PRS0000000';
        }else{
            $kode = $rec['nama'];
        }
					
		
		return $kode;
	}
	function insert($conn){
		
		$ip		= $_POST['ip'];
		$ws		= $_POST['ws'];
		$nama 	= $_POST['nama'];
		$alm	= $_POST['alamat'];
		$telp 	= $_POST['notelp'];
		$fax 	= $_POST['fax'];
		$email 	= $_POST['email'];
		$kode 	= $_POST['kode'];
		$urutan = (int) substr($kode, 3, 7);
		$urutan++;
		$huruf = "PRS";
		$kode1 = $huruf . sprintf("%07s", $urutan);
		$hp 	= $_POST['nohp'];
		$bnkcab	= $_POST['cabang'];
		$bnkac 	= $_POST['bnkac'];
	    $bnknm 	= $_POST['bank'];
		$ket 	= $_POST['ket'];
		$staktif = $_POST['sthapus'];
		$sql	= "
			INSERT INTO 
				mprsh(
						kode, nama, alm, telp, fax, hp, email, bnkcab, bnkac, bnknm, ket, staktif, sthapus, creaIP, creaWS, creaTS
					) 
					VALUES (
						'$kode1', '$nama', '$alm', '$telp', '$fax', '$hp', '$email', '$bnkcab', '$bnkac', '$bnknm', '$ket', '$staktif', 0, '$ip', '$ws', now()
					)";

		$result	= $conn->query($sql);
	}
	function select($conn,$id){
		$sql	= "
			SELECT
				*
			FROM
				mprsh
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
		$alm	= $_POST['alm'];
		$telp 	= $_POST['notelp'];
		$fax 	= $_POST['fax'];
		$email 	= $_POST['email'];
		$hp 	= $_POST['nohp'];
		$bnkcab	= $_POST['cabang'];
		$bnkac 	= $_POST['bnkac'];
	    $bnknm 	= $_POST['bank'];
		$ket 	= $_POST['ket'];

		$sql	= "
			UPDATE 
				mprsh 
			SET 
				nama	= '$nama',
				alm		= '$alm',
				telp	= '$telp',
				fax		= '$fax',
				email	= '$email',
				hp		= '$hp',
				bnkcab	= '$bnkcab',
				bnkac	= '$bnkac',
				bnknm	= '$bnknm',
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
				mprsh 
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
				mprsh 
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
				mprsh 
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
$perusahaan	= new perusahaan();
?>