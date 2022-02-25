<?php
class kategori2{
	function show_per($conn){
		$sql	= "
        SELECT
            mprsh.nama as pnama,
            mcab.nama as cnama,
            mkat1.nama as knama,
			mkat2.no,
            mkat2.kode,
            mkat2.nama,
            mkat2.ket,
			mkat2.staktif
		FROM
            mprsh, mcab, mkat1, mkat2
		WHERE
			mkat2.sthapus = '0'
        AND
            mkat2.mprsh = mprsh.no
        AND
            mkat2.mcab = mcab.no
        AND
            mkat2.mkat1 = mkat1.no
		ORDER BY 
			mkat2.kode DESC
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
			mkat2
		";

		$result	= $conn->query($sql);
		$rec = $result->fetch_assoc();
        if(empty($rec)){
            $kode = 'KT20000000';
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
        $mkat1  = $_POST['mkat1'];
		$kode 	= $_POST['kode'];
		$urutan = (int) substr($kode, 3, 7);
		$urutan++;
		$huruf = "KT2";
		$kode1 = $huruf . sprintf("%07s", $urutan);
		$ket 	= $_POST['ket'];
		$staktif = $_POST['sthapus'];
		$sql	= "
			INSERT INTO 
				mkat2(
						mprsh, mcab, kode, mkat1, nama, ket, staktif, sthapus, creaIP, creaWS, creaTS
					) 
					VALUES (
						'$mprsh', '$mcab', '$kode1', '$mkat1', '$nama', '$ket', '$staktif', 0, '$ip', '$ws', now() 
					)";

		$result	= $conn->query($sql);
	}
	function select($conn,$id){
		$sql	= "
			SELECT
				*
			FROM
				mkat2
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
        $mkat1  = $_POST['mkat1'];
		$id 	= $_POST['no'];
		$nama 	= $_POST['nama'];
		$mcab 	= $_POST['mcab'];
		$ket 	= $_POST['ket'];

		$sql	= "
			UPDATE 
				mkat2	 
			SET 
				mprsh	= '$mprsh',
				nama	= '$nama',
				mcab	= '$mcab',
                mkat1   = '$mkat1',
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
				mkat2 
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
				mkat2 
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
				mkat2 
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
$kategori2	= new kategori2();
?>