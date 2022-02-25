<?php
class kategori3{
	function show_per($conn){
		$sql	= "
        SELECT
            mprsh.nama as pnama,
            mcab.nama as cnama,
            mkat2.nama as knama,
			mkat3.no,
            mkat3.kode,
            mkat3.nama,
            mkat3.ket,
			mkat3.staktif
		FROM
            mprsh, mcab, mkat2, mkat3
		WHERE
			mkat3.sthapus = '0'
        AND
            mkat3.mprsh = mprsh.no
        AND
            mkat3.mcab = mcab.no
        AND
            mkat3.mkat2 = mkat2.no
		ORDER BY 
			mkat3.kode DESC
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
			mkat3
		";

		$result	= $conn->query($sql);
		$rec = $result->fetch_assoc();
        if(empty($rec)){
            $kode = 'KT30000000';
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
		$nama 	= $_POST['nama'];
        $mkat2  = $_POST['mkat2'];
		$kode 	= $_POST['kode'];
		$urutan = (int) substr($kode, 3, 7);
		$urutan++;
		$huruf = "KT3";
		$kode1 = $huruf . sprintf("%07s", $urutan);
		$ket 	= $_POST['ket'];
		$staktif = $_POST['sthapus'];
		$sql	= "
			INSERT INTO 
				mkat3(
						mprsh, mcab, kode, mkat2, nama, ket, staktif, sthapus, creaIP, creaWS, creaTS
					) 
					VALUES (
						'$mprsh', '$mcab', '$kode1', '$mkat2', '$nama', '$ket', '$staktif', 0, '$ip', '$ws', now() 
					)";

		$result	= $conn->query($sql);
	}
	function select($conn,$id){
		$sql	= "
			SELECT
				*
			FROM
				mkat3
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
        $mkat2  = $_POST['mkat2'];
		$id 	= $_POST['no'];
		$nama 	= $_POST['nama'];
		$mcab 	= $_POST['mcab'];
		$ket 	= $_POST['ket'];

		$sql	= "
			UPDATE 
				mkat3
			SET 
				mprsh	= '$mprsh',
				nama	= '$nama',
				mcab	= '$mcab',
                mkat2   = '$mkat2',
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
				mkat3 
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
				mkat3 
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
				mkat3 
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
$kategori3	= new kategori3();
?>