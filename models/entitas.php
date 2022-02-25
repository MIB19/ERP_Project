<?php
class entitas{
	function show_per($conn){
		$sql	= "
        SELECT
            mprsh.nama as pnama,
            mcab.nama as cnama,
            mentt.no,
            mentt.kode,
            mentt.kodegl,
            mentt.nama,
            mentt.alm,
            mentt.telp,
            mentt.fax,
            mentt.hp,
            mentt.email,
            mentt.ig,
            mentt.fb,
            mentt.bnknm,
            mentt.bnkac,
            mentt.bnkcab,
            mentt.pkpno,
            mentt.pkpnm,
            mentt.pkpalm,
            mentt.cpnm,
            mentt.cphp,
            mentt.cphp,
            mentt.cpemail,
            mentt.cpig,
            mentt.cpfb,
            mentt.jenis,
            mentt.term,
            mentt.limit,
            mentt.almkrm,
            mentt.ket,
            mentt.stsup,
            mentt.stcust,
            mentt.staktif,
            mentt.sthapus,
            mentt.stinput
		FROM
            mprsh, mcab, mentt
        WHERE
            mentt.sthapus = '0'
        AND
            mentt.mprsh = mprsh.no
        AND
            mentt.mcab = mcab.no
		ORDER BY 
			mentt.kode DESC
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
	function show($conn){
		$sql	= "
        SELECT
            *
		FROM
        	mentt
        WHERE
            sthapus = '0' AND stsup = '1'
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
	function showcust($conn){
		$sql	= "
        SELECT
            *
		FROM
        	mentt
        WHERE
            sthapus = '0' AND stcust = '1'
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
			mentt
		";

		$result	= $conn->query($sql);
		$rec = $result->fetch_assoc();
        if(empty($rec)){
            $kode = 'ENT0000000';
        }else{
            $kode = $rec['nama'];
        }
					
		
		return $kode;
	}
	function insert($conn){
		$mprsh      = $_POST['mprsh'];
        $mcab       = $_POST['mcab'];
		$kode 	    = $_POST['kode'];
		$urutan     = (int) substr($kode, 3, 7);
		$urutan++;
		$huruf      = "ENT";
		$kode1      = $huruf . sprintf("%07s", $urutan);
        $kodegl     = $_POST['kodegl'];
        $nama       = $_POST['nama'];
        $alm        = $_POST['alm'];
        $telp       = $_POST['telp'];
        $fax        = $_POST['fax'];
        $hp         = $_POST['hp'];
        $email      = $_POST['email'];
        $ig         = $_POST['ig'];
        $fb         = $_POST['fb'];
        $bnkcab     = $_POST['bnkcab'];
        $bnkac      = $_POST['bnkac'];
        $bnknm      = $_POST['bnknm'];
        $pkpno      = $_POST['pkpno'];
        $pkpnm      = $_POST['pkpnm'];
        $pkpalm     = $_POST['pkpalm'];
        $cpnm       = $_POST['cpnm'];
        $cphp       = $_POST['cphp'];
        $cpemail    = $_POST['cpemail'];
        $cpig       = $_POST['cpig'];
        $cpfb       = $_POST['cpfb'];
        $limit      = $_POST['limit'];
        $almkrm     = $_POST['almkrm'];
        $ket        = $_POST['ket'];
        $stsup      = $_POST['stsup'];
        $stcust     = $_POST['stcust'];
        $staktif   = $_POST['sthapus'];
        $ws		    = $_POST['ws'];
		$ip		    = $_POST['ip'];
		$sql	= "
        INSERT INTO 
        `mentt`(
            `mprsh`, `mcab`, `kode`, `kodegl`, 
            `nama`, `alm`, `telp`, `fax`, `hp`, 
            `email`, `ig`, `fb`, `bnkcab`, 
            `bnkac`, `bnknm`, `pkpno`, `pkpnm`, `pkpalm`, 
            `cpnm`, `cphp`, `cpemail`, `cpig`, `cpfb`, 
            `limit`, `almkrm`, `ket`, `stsup`, `stcust`,
            `staktif`, `sthapus`, 
            `creaIP`, `creaWS`, `creaTS`
        ) VALUES (
            '$mprsh', '$mcab', '$kode1', '$kodegl',
            '$nama', '$alm', '$telp', '$fax', '$hp',
            '$email', '$ig', '$fb', '$bnkcab',
            '$bnkac', '$bnknm', '$pkpno', '$pkpnm', '$pkpalm',
            '$cpnm', '$cphp', '$cpemail', '$cpig', '$cpfb',
            '$limit', '$almkrm', '$ket', '$stsup', '$stcust',
            '$staktif', 0, '$ip', '$ws', now()
        )";

		$result	= $conn->query($sql);
	}
	function select($conn,$id){
		$sql	= "
			SELECT
				*
			FROM
				mentt
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
		$ip		    = $_POST['ip'];
		$ws		    = $_POST['ws'];
		$id 	    = $_POST['no'];
		$mprsh      = $_POST['mprsh'];
        $mcab       = $_POST['mcab'];
		$kodegl     = $_POST['kodegl'];
        $nama       = $_POST['nama'];
        $alm        = $_POST['alm'];
        $telp       = $_POST['telp'];
        $fax        = $_POST['fax'];
        $hp         = $_POST['hp'];
        $email      = $_POST['email'];
        $ig         = $_POST['ig'];
        $fb         = $_POST['fb'];
        $bnkcab     = $_POST['bnkcab'];
        $bnkac      = $_POST['bnkac'];
        $bnknm      = $_POST['bnknm'];
        $pkpno      = $_POST['pkpno'];
        $pkpnm      = $_POST['pkpnm'];
        $pkpalm     = $_POST['pkpalm'];
        $cpnm       = $_POST['cpnm'];
        $cphp       = $_POST['cphp'];
        $cpemail    = $_POST['cpemail'];
        $cpig       = $_POST['cpig'];
        $cpfb       = $_POST['cpfb'];
        $limit      = $_POST['limit'];
        $almkrm     = $_POST['almkrm'];
        $ket        = $_POST['ket'];

		$sql	= "
			UPDATE 
				mentt 
			SET 
				`mprsh`	    = '$mprsh',
                `mcab`      = '$mcab',
                `kodegl`    = '$kodegl',
				`nama`	    = '$nama',
                `alm`       = '$alm',
                `telp`      = '$telp',
                `fax`       = '$fax',
                `hp`        = '$hp',
                `email`     = '$email',
                `ig`        = '$ig',
                `fb`        = '$fb',
                `bnkcab`    = '$bnkcab',
                `bnkac`     = '$bnkac',
                `bnknm`     = '$bnknm',
                `pkpno`     = '$pkpno',
                `pkpnm`     = '$pkpnm',
                `pkpalm`    = '$pkpalm',
                `cpnm`      = '$cpnm',
                `cphp`      = '$cphp',
                `cpemail`   = '$cpemail',
                `cpig`      = '$cpig',
                `cpfb`      = '$cpfb',
                `limit`     = '$limit',
                `almkrm`    = '$almkrm',
				`ket`		= '$ket',
				`lastIP`	= '$ip',
				`lastWS`	= '$ws',
				`lastTS`	= now()
			WHERE 
				no = '$id'";

		$result	= $conn->query($sql);
	}
    function aktif($conn,$id,$ip,$ws){
		$sql	= "
			UPDATE 
				mentt 
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
				mentt 
			SET 
				staktif	= '1',
				lastWS	= '$ws',
				lastIP	= '$ip',
				lastTS	= now()
			WHERE 
				no = '$id'";

		$result	= $conn->query($sql);
	}
    function aktifsup($conn,$id,$ip,$ws){
		$sql	= "
			UPDATE 
				mentt 
			SET 
				stsup	= '0',
				lastWS	= '$ws',
				lastIP	= '$ip',
				lastTS	= now()
			WHERE 
				no = '$id'";

		$result	= $conn->query($sql);
	}
    function nonaktifsup($conn,$id,$ip,$ws){
		$sql	= "
			UPDATE 
				mentt 
			SET 
				stsup	= '1',
				lastWS	= '$ws',
				lastIP	= '$ip',
				lastTS	= now()
			WHERE 
				no = '$id'";

		$result	= $conn->query($sql);
	}
    function aktifcust($conn,$id,$ip,$ws){
		$sql	= "
			UPDATE 
				mentt 
			SET 
				stcust	= '0',
				lastWS	= '$ws',
				lastIP	= '$ip',
				lastTS	= now()
			WHERE 
				no = '$id'";

		$result	= $conn->query($sql);
	}
    function nonaktifcust($conn,$id,$ip,$ws){
		$sql	= "
			UPDATE 
				mentt 
			SET 
				stcust	= '1',
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
				mentt 
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
$entitas	= new entitas();
?>