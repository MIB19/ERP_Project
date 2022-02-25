<?php
class coa{
	function show_per($conn){
		$sql	= "
        SELECT
            mprsh.nama as pnama,
            mcab.nama as cnama,
            mbank.nama as bnama,
            mcoa.no,
            mcoa.kode,
            mcoa.nama,
            mcoa.lvl,
            mcoa.ket,
            mcoa.staktif,
            mcoa.sthapus,
            mcoa.stinput
		FROM
            mprsh, mcab, mbank, mcoa
        WHERE
            mcoa.sthapus = '0'
        AND
            mcoa.mprsh = mprsh.no
        AND
            mcoa.mcab = mcab.no
        AND
            mcoa.mbnk = mbank.no
		ORDER BY 
			mcoa.kode DESC
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
			mcoa
		";

		$result	= $conn->query($sql);
		$rec = $result->fetch_assoc();
        if(empty($rec)){
            $kode = 'COA0000000';
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
		$mbank	= $_POST['mbank'];
        $lvl    = $_POST['lvl'];
		$kode 	= $_POST['kode'];
		$urutan = (int) substr($kode, 3, 7);
		$urutan++;
		$huruf = "COA";
		$kode1 = $huruf . sprintf("%07s", $urutan);
		$ket 	= $_POST['ket'];
		$staktif = $_POST['sthapus'];
		$sql	= "
			INSERT INTO 
				mcoa(
						mprsh, mcab, mbnk, kode, nama, lvl, ket, staktif, sthapus, creaIP, creaWS, creaTS
					) 
					VALUES (
						'$mprsh', '$mcab', '$mbank', '$kode', '$nama', '$lvl', '$ket', '$staktif', 0, '$ip', '$ws', now() 
					)";

		$result	= $conn->query($sql);
	}
	function select($conn,$id){
		$sql	= "
			SELECT
				*
			FROM
				mcoa
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
		$mbank  = $_POST['mbank'];
		$lvl	= $_POST['lvl'];
        $kode   = $_POST['kode'];
		$ket 	= $_POST['ket'];

		$sql	= "
			UPDATE 
				mcoa 
			SET 
				mprsh	= '$mprsh',
                mcab    = '$mcab',
				nama	= '$nama',
				mbnk	= '$mbank',
				lvl	    = '$lvl',
				kode	= '$kode',
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
				mcoa 
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
				mcoa 
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
				mcoa 
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
$coa	= new coa();
?>