<?php
class ekspedisi{
	function show_per($conn){
		$sql	= "
        SELECT
            mprsh.nama as pnama,
            mcab.nama as cnama,
            meks.no,
            meks.kode,
            meks.nama,
            meks.alm,
            meks.telp,
            meks.fax,
            meks.hp,
            meks.email,
            meks.ket,
            meks.staktif
		FROM
            mprsh, mcab, meks
        WHERE
            meks.sthapus = '0'
        AND
            meks.mprsh = mprsh.no
        AND
            meks.mcab = mcab.no
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
			meks
		";

		$result	= $conn->query($sql);
		$rec = $result->fetch_assoc();
        if(empty($rec)){
            $kode = 'EKS0000000';
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
        $alm    = $_POST['alm'];
        $telp   = $_POST['telp'];
        $fax    = $_POST['fax'];
        $hp     = $_POST['hp'];
        $email  = $_POST['email'];
		$kode 	= $_POST['kode'];
		$urutan = (int) substr($kode, 3, 7);
		$urutan++;
		$huruf = "EKS";
		$kode1 = $huruf . sprintf("%07s", $urutan);
		$ket 	= $_POST['ket'];
		$staktif = $_POST['sthapus'];
		$sql	= "
			INSERT INTO 
				meks(
						mprsh, mcab, kode, nama, alm, telp, fax, hp, email, ket, staktif, sthapus, creaIP, creaWS, creaTS
					) 
					VALUES (
						'$mprsh', '$mcab', '$kode1', '$nama', '$alm', '$telp', '$fax', '$hp', '$email', '$ket', '$staktif', 0, '$ip', '$ws', now() 
					)";

		$result	= $conn->query($sql);
	}
	function select($conn,$id){
		$sql	= "
			SELECT
				*
			FROM
				meks
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
        $alm    = $_POST['alm'];
        $telp   = $_POST['telp'];
        $fax    = $_POST['fax'];
        $hp     = $_POST['hp'];
        $email  = $_POST['email'];
		$ket 	= $_POST['ket'];

		$sql	= "
			UPDATE 
				meks
			SET 
				mprsh	= '$mprsh',
                mcab    = '$mcab',
				nama	= '$nama',
                alm     = '$alm',
                telp    = '$telp',
                fax     = '$fax',
                hp      = '$hp',
                email   = '$email',
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
				meks 
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
				meks 
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
				meks 
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
$ekspedisi	= new ekspedisi();
?>