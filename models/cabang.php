<?php
class cabang{
	function show_per($conn){
		$sql	= "
        SELECT
            mprsh.nama as pnama,
            mcab.no,
            mcab.kode,
            mcab.nama,
            mcab.alm,
            mcab.telp,
            mcab.fax,
            mcab.hp,
            mcab.email,
            mcab.bnknm,
            mcab.bnkcab,
            mcab.bnkac,
            mcab.ket,
            mcab.staktif,
            mcab.sthapus,
            mcab.stinput
		FROM
            mprsh
        inner join
            mcab
        on
            mprsh.no = mcab.mprsh
		WHERE
			mcab.sthapus = '0'
		ORDER BY 
			mcab.kode DESC
        
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
			mcab
		";

		$result	= $conn->query($sql);
		$rec = $result->fetch_assoc();
        if(empty($rec)){
            $kode = 'CAB0000000';
        }else{
            $kode = $rec['nama'];
        }
					
		
		return $kode;
	}
	function insert($conn){
		$mprsh  = $_POST['mprsh'];
		$ws		= $_POST['ws'];
		$ip		= $_POST['ip'];
		$nama 	= $_POST['nama'];
		$alm	= $_POST['alamat'];
		$telp 	= $_POST['notelp'];
		$fax 	= $_POST['fax'];
		$email 	= $_POST['email'];
		$kode 	= $_POST['kode'];
		$urutan = (int) substr($kode, 3, 7);
		$urutan++;
		$huruf = "CAB";
		$kode1 = $huruf . sprintf("%07s", $urutan);
		$hp 	= $_POST['nohp'];
		$bnkcab	= $_POST['cabang'];
		$bnkac 	= $_POST['bnkac'];
	    $bnknm 	= $_POST['bank'];
		$ket 	= $_POST['ket'];
		$staktif = $_POST['sthapus'];
		$sql	= "
			INSERT INTO 
				mcab(
						mprsh, kode, nama, alm, telp, fax, hp, email, mbnk, bnkcab, bnkac, bnknm, ket, staktif, sthapus, creaIP, creaWS, creaTS
					) 
					VALUES (
						'$mprsh','$kode1', '$nama', '$alm', '$telp', '$fax', '$hp', '$email', '1', '$bnkcab', '$bnkac', '$bnknm', '$ket', '$staktif', 0, '$ip', '$ws', now() 
					)";

		$result	= $conn->query($sql);
	}
	function select($conn,$id){
		$sql	= "
			SELECT
				*
			FROM
				mcab
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
		$alm	= $_POST['alamat'];
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
				mcab	 
			SET 
				mprsh	= '$mprsh',
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
				mcab 
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
				mcab 
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
				mcab 
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
$cabang	= new cabang();
?>