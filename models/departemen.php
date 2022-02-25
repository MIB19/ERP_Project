<?php
class departemen{
	function show_per($conn){
		$sql	= "
        SELECT
            mprsh.nama as pnama,
            mcab.nama as cnama,
            mdept.no,
            mdept.kode,
            mdept.nama,
            mdept.ket,
            mdept.staktif,
            mdept.sthapus,
            mdept.stinput
		FROM
            mprsh, mcab, mdept
        WHERE
            mdept.sthapus = '0'
        AND
            mdept.mprsh = mprsh.no
        AND
            mdept.mcab = mcab.no
		ORDER BY 
			mdept.kode DESC
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
			mdept
		";

		$result	= $conn->query($sql);
		$rec = $result->fetch_assoc();
        if(empty($rec)){
            $kode = 'DEP0000000';
        }else{
            $kode = $rec['nama'];
        }
					
		
		return $kode;
	}
	function insert($conn){
		$mprsh  = $_POST['mprsh'];
        $mcab   = $_POST['mcab'];
		$ws		= $_POST['ws'];
		$ip		= $_POST['ip'];
		$nama 	= $_POST['nama'];
		$kode 	= $_POST['kode'];
		$urutan = (int) substr($kode, 3, 7);
		$urutan++;
		$huruf = "DEP";
		$kode1 = $huruf . sprintf("%07s", $urutan);
		$ket 	= $_POST['ket'];
		$staktif = $_POST['sthapus'];
		$sql	= "
			INSERT INTO 
				mdept(
						mprsh, mcab, kode, nama, ket, staktif, sthapus, creaIP, creaWS, creaTS
					) 
					VALUES (
						'$mprsh', '$mcab', '$kode1', '$nama', '$ket', '$staktif', 0, '$ip', '$ws', now() 
					)";

		$result	= $conn->query($sql);
	}
	function select($conn,$id){
		$sql	= "
			SELECT
				*
			FROM
				mdept
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
        $mcab   = $_POST['mcab'];
		$ket 	= $_POST['ket'];

		$sql	= "
			UPDATE 
				mdept	 
			SET 
				mprsh	= '$mprsh',
                mcab    = '$mcab',
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
				mdept 
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
				mdept 
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
				mdept 
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
$departemen	= new departemen();
?>