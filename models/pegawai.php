<?php
class pegawai{
	function show_per($conn){
		$sql	= "
        SELECT
            mprsh.nama as pnama,
            mcab.nama as cnama,
            mdept.nama as dnama,
            mpeg.no,
            mpeg.kode,
            mpeg.nama,
            mpeg.alm,
            mpeg.telp,
            mpeg.hp,
            mpeg.email,
            mpeg.ig,
            mpeg.fb,
            mpeg.bnkcab,
            mpeg.bnkac,
            mpeg.bnknm,
            mpeg.pkpno,
            mpeg.pkpnm,
            mpeg.pkpalm,
            mpeg.pos,
            mpeg.tgllahir,
            mpeg.tgljoin,
            mpeg.ket,
            mpeg.staktif,
            mpeg.sthapus,
            mpeg.stinput
		FROM
            mprsh, mcab, mdept, mpeg
        WHERE
            mpeg.sthapus = 0
        AND
            mpeg.mprsh = mprsh.no
        AND
            mpeg.mcab = mcab.no
        AND
            mpeg.mdept = mdept.no
		ORDER BY
			mpeg.kode DESC
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
	function pegsales($conn){
		$sql	= "
		SELECT
			*
		FROM
			mpeg
		WHERE
			pos = 'Sales'
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
			mpeg
		";

		$result	= $conn->query($sql);
		$rec = $result->fetch_assoc();
        if(empty($rec)){
            $kode = 'PEG0000000';
        }else{
            $kode = $rec['nama'];
        }
					
		
		return $kode;
	}
	function insert($conn){
		$tgllahir 	= $_POST['tgllahir'];
		$tgljoin	= $_POST['tgljoin'];
		$mprsh  	= $_POST['mprsh'];
        $mcab   	= $_POST['mcab'];
		$ws			= $_POST['ws'];
		$ip			= $_POST['ip'];
		$nama 		= $_POST['nama'];
		$alm		= $_POST['alm'];
		$telp		= $_POST['telp'];
		$hp			= $_POST['hp'];
		$email		= $_POST['email'];
		$ig			= $_POST['ig'];
		$fb			= $_POST['fb'];
		$bnkcab 	= $_POST['bnkcab'];
		$bnkac		= $_POST['bnkac'];
		$bnknm		= $_POST['bnknm'];
		$pkpno		= $_POST['pkpno'];
		$pkpnm		= $_POST['pkpnm'];
		$pkpalm		= $_POST['pkpalm'];
		$mdept		= $_POST['mdept'];
		$pos		= $_POST['pos'];
		$kode 		= $_POST['kode'];
		$urutan = (int) substr($kode, 3, 7);
		$urutan++;
		$huruf = "PEG";
		$kode1 = $huruf . sprintf("%07s", $urutan);
		$ket 	= $_POST['ket'];
		$staktif = $_POST['sthapus'];
		$sql	= "
			INSERT INTO 
				mpeg(
						mprsh, mcab, kode, nama, alm, telp, hp, email, ig, fb, bnkcab, bnkac, bnknm, pkpno, pkpnm, pkpalm, mdept, pos, tgllahir, tgljoin, ket, staktif, sthapus, creaIP, creaWS, creaTS
					) 
					VALUES (
						'$mprsh', '$mcab', '$kode1', '$nama', '$alm', '$telp', '$hp', '$email', '$ig', '$fb', '$bnkcab', '$bnkac', '$bnknm', '$pkpno', '$pkpnm', '$pkpalm', '$mdept', '$pos', '$tgllahir', '$tgljoin', '$ket', '$staktif', 0, '$ip', '$ws', now() 
					)";

		$result	= $conn->query($sql);
	}
	function select($conn,$id){
		$sql	= "
			SELECT
				*
			FROM
				mpeg
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
		$id			= $_POST['no'];
		$mprsh  	= $_POST['mprsh'];
        $mcab   	= $_POST['mcab'];
		$ws			= $_POST['ws'];
		$ip			= $_POST['ip'];
		$nama 		= $_POST['nama'];
		$alm		= $_POST['alm'];
		$telp		= $_POST['telp'];
		$hp			= $_POST['hp'];
		$email		= $_POST['email'];
		$ig			= $_POST['ig'];
		$fb			= $_POST['fb'];
		$bnkcab 	= $_POST['bnkcab'];
		$bnkac		= $_POST['bnkac'];
		$bnknm		= $_POST['bnknm'];
		$pkpno		= $_POST['pkpno'];
		$pkpnm		= $_POST['pkpnm'];
		$pkpalm		= $_POST['pkpalm'];
		$mdept		= $_POST['mdept'];
		$pos		= $_POST['pos'];
		$ket 		= $_POST['ket'];
		$tgllahir	= $_POST['tgllahir'];
		$tgljoin	= $_POST['tgljoin'];

		$sql	= "
			UPDATE 
				mpeg 
			SET 
				mprsh	= '$mprsh',
                mcab    = '$mcab',
				nama	= '$nama',
				alm		= '$alm',
				telp	= '$telp',
				hp		= '$hp',
				email	= '$email',
				ig		= '$ig',
				fb		= '$fb',
				bnkcab	= '$bnkcab',
				bnknm	= '$bnknm',
				bnkac	= '$bnkac',
				pkpno	= '$pkpno',
				pkpnm	= '$pkpnm',
				pkpalm	= '$pkpalm',
				mdept	= '$mdept',
				pos		= '$pos',
				tgllahir= '$tgllahir',
				tgljoin = '$tgljoin',
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
				mpeg 
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
				mpeg 
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
				mpeg 
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
$pegawai = new pegawai();
?>