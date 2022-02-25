<?php
class penerimaanbarang{
	function show_per($conn){
		$sql	= "
        SELECT
            mprsh.nama as pnama,
            mcab.nama as cnama,
            mgdn.nama as gnama,
            mentt.nama as enama,
            meks.nama as mnama,
            tpbh.supsj,
            tpbh.no,
            tpbh.kode,
			tpbh.kodepo,
            tpbh.kodegl,
            tpbh.tpoh,
            tpbh.tgl,
            tpbh.jppn,
            tpbh.jbyr,
            tpbh.sbtot,
            tpbh.prsn,
            tpbh.dsc,
            tpbh.dpp,
            tpbh.ppn,
            tpbh.tot,
            tpbh.ket
		FROM
            mprsh, mcab, mgdn, meks, mentt, tpbh
        WHERE
            tpbh.mprsh = mprsh.no
        AND
            tpbh.mcab = mcab.no
        AND
            tpbh.meks = meks.no
        AND
            tpbh.mentt = mentt.no
		AND
            tpbh.mgdn = mgdn.no
		ORDER BY 
			tpbh.kode DESC
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
	function show_per1($conn){
		$sql	= "
        SELECT
            mprsh.nama as pnama,
            mcab.nama as cnama,
            mgdn.nama as gnama,
            mentt.nama as enama,
            meks.nama as mnama,
            tpbh.supsj,
            tpbh.no,
            tpbh.kode,
			tpbh.kodepo,
            tpbh.kodegl,
            tpbh.tpoh,
            tpbh.tgl,
            tpbh.jppn,
            tpbh.jbyr,
            tpbh.sbtot,
            tpbh.prsn,
            tpbh.dsc,
            tpbh.dpp,
            tpbh.ppn,
            tpbh.tot,
            tpbh.ket
		FROM
            mprsh, mcab, mgdn, meks, mentt, tpbh
        WHERE
			tpbh.stsls = 0
		AND
            tpbh.mprsh = mprsh.no
        AND
            tpbh.mcab = mcab.no
        AND
            tpbh.meks = meks.no
        AND
            tpbh.mentt = mentt.no
		AND
            tpbh.mgdn = mgdn.no
		ORDER BY 
			tpbh.kode DESC
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
	function selectpbd($conn){
		$sql	= "
		SELECT
			*
		FROM
			tpbd
		WHERE 
			stsls = 0
		ORDER BY
			kodepb DESC
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
	function selectpbh($conn, $kd){
		$sql	= "
		SELECT
			*
		FROM
			tpbh
		WHERE 
			kode = '$kd'
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
    function detail($conn, $id){
		$sql	= "
        SELECT
            tpbd.kodepo,
			tpbd.kodepb,
			tpbd.tpbh,
			tpbd.mbrg,
			tpbd.brg,
			msat.nama as snama,
			tpbd.jum,
			tpbd.bobot,
			tpbd.hrg,
			tpbd.sbtot,
			tpbd.dsc,
			tpbd.tot,
			tpbd.ket,
			tpbd.staktif
		FROM
            tpbd, msat
        WHERE
            tpbh = $id
		AND
			tpbd.msat = msat.no
		ORDER BY
			tpbd.kodepb ASC
		
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
	function selection($conn, $id){
		$sql	= "
        SELECT
			mprsh.nama as pnama,
			mcab.nama as cnama,
			mgdn.nama as gnama,
			mentt.nama as enama,
			meks.nama as mnama,
			tpbh.supsj,
			tpbh.no,
			tpbh.kode,
			tpbh.kodepo,
			tpbh.kodegl,
			tpbh.tpoh,
			tpbh.tgl,
			tpbh.jppn,
			tpbh.jbyr,
			tpbh.sbtot,
			tpbh.prsn,
			tpbh.dsc,
			tpbh.dpp,
			tpbh.ppn,
			tpbh.tot,
			tpbh.ket
		FROM
			mprsh, mcab, mgdn, meks, mentt, tpbh
        WHERE
			tpbh.no = '$id'
		AND
			tpbh.mprsh = mprsh.no
        AND
            tpbh.mcab = mcab.no
        AND
            tpbh.meks = meks.no
        AND
            tpbh.mentt = mentt.no
		AND
            tpbh.mgdn = mgdn.no
		";

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
	function kodesel($conn){
		$sql	= "
		SELECT 
			max(kode) as nama
		FROM 
			tpod
		";

		$result	= $conn->query($sql);
		$rec = $result->fetch_assoc();
        	
		
		return $rec['nama'];
	}
    function kode($conn){
		$tahun = date('y');
		$buln = date('m');
		$huruf 		= "PB$tahun$buln";

		$sql	= "
		SELECT 
			max(RIGHT(kode, 5)) as nama
		FROM 
			tpbh
		WHERE
			LEFT(kode, 6) = '$huruf'
		";

		$result	= $conn->query($sql);
		$rec = $result->fetch_assoc();
        if(empty($rec)){
            $kode = '00000';
        }else{
            $kode = $rec['nama'];
        }
		$urutan 	= (int)$kode;
		$urutan++;
		
		$kode1 		= $huruf . sprintf("%05s", $urutan);	
		
		return $kode1;
	}
	function kodepb($conn){
		$sql	= "
		SELECT 
			max(kodepb) as nama
		FROM 
			tpbd
		";

		$result	= $conn->query($sql);
		$rec = $result->fetch_assoc();
        if(empty($rec)){
            $kode = 'PBD0000000';
        }else{
            $kode = $rec['nama'];
        }
		$urutan 	= (int) substr($kode, 3, 7);
		$urutan++;
		$huruf 		= "PBD";
		$kode1 		= $huruf . sprintf("%07s", $urutan);	
		
		return $kode1;
	}
	function insert($conn){
		$po		= $_POST['tpoh'];
		$string	= explode(", ", $po);
		$kodepo = $string[0];
		$sup	= $string[1];
		$tpoh	= $string[2];
		$mprsh	= $string[3];
		$mcab	= $string[4];
		$mentt	= $string[5];
		$supcp	= $string[6];
		$meks	= $string[7]; 
		$jppn	= $string[8];
		$jbyr	= $string[9];
		$sbtot	= $string[10];
		$prsn	= $string[11];
		$dsc	= $string[12];
		$dpp	= $string[13];
		$ppn	= $string[14];
		$tot	= $string[15];
		$kode	= $_POST['kode'];
		$kodegl = $_POST['kodegl'];
		$supsj	= $_POST['supsj'];
		$mgdn	= $_POST['mgdn'];
		$ip		= $_POST['ip'];
		$ws		= $_POST['ws'];

		$sql	= "
			INSERT INTO 
				tpbh(
						mprsh, mcab, kode, kodegl, tpoh, kodepo, mgdn, mentt, sup, supcp, supsj, meks, tgl, jppn, jbyr, sbtot, prsn, dsc, dpp, ppn, tot, creaIP, creaWS 	
					) 
					VALUES (
						'$mprsh', '$mcab', '$kode', '$kodegl', '$tpoh', '$kodepo', '$mgdn', '$mentt', '$sup', '$supcp', '$supsj', '$meks', now(), '$jppn', '$jbyr', '$sbtot', '$prsn', '$dsc', '$dpp', '$ppn', '$tot', '$ip', '$ws'
					)";
		$result	= $conn->query($sql);
	}
	function tot($conn, $no){
		
		$sql	= "
			SELECT 
				SUM(tot) 
			FROM 
				tpbd 
			WHERE 
				tpbh = '$no'
		";

		$result	= $conn->query($sql); 
	} 
	function insert_tpbd($conn){
		$tpbh 		= $_POST['tpbh'];
		$tpoh		= $_POST['tpoh'];
		$kodepb		= $_POST['kode'];
		$po			= $_POST['tpod'];
		$string		= explode(", ",$po);
		$tpod		= $string[0];
		$kodepo		= $string[1];
		$mgdn		= $_POST['mgdn'];
		$mbrg		= $string[2];
		$brg		= $string[3];
		$msat		= $string[4];
		$jum		= $string[5];
		$bobot		= $string[6];
		$hrg		= $string[7];
		$sbtot		= $string[8];
		$dsc		= $string[9];
		$tot		= $string[10];
		$ket		= $_POST['ket'];

		$sql 	= "
			INSERT INTO
				tpbd(
					tpbh, tpoh, kodepb, tpod, kodepo, mgdn, mbrg, brg, msat, jum, bobot, hrg, sbtot, dsc, tot, ket
				) VALUES (
					'$tpbh', '$tpoh', '$kodepb', '$tpod', '$kodepo', '$mgdn', '$mbrg', '$brg', '$msat', '$jum', '$bobot', '$hrg', '$sbtot', '$dsc', '$tot', '$ket'
				)
		";
		$total = $this->total($conn, $tpbh);
		$sub = $total+$tot;
		$ppn = $sub*10/100;
		$jppn = $this->status($conn, $tpbh);
		if($jppn == 1){
			$julah = $sub+$ppn;
		}else{
			$ppn = 0;
			$julah = $sub;
		}
		$this->updatetot($conn, $sub, $ppn, $julah, $tpbh);
		$this->updatepo($conn, $tpod);
		$sls = $this->hitungpo($conn, $tpoh);
		if($sls == 0){
			$this->updatetpoh($conn, $tpoh);
		}
		$result	= $conn->query($sql);
	}
	function updatetpoh($conn, $tpoh){
		$sql	= "
			UPDATE
				tpoh
			SET
				stsls = 1
			WHERE
				no = $tpoh
		";
		$result	= $conn->query($sql);
	}
	function hitungpo($conn, $tpoh){
		$sql	= "
			SELECT 
				COUNT(*) as jumlah
			FROM 
				tpod 
			WHERE 
				tpoh = $tpoh 
			AND 
				stsls = 0
		";

		$result	= $conn->query($sql);
		$rec = $result->fetch_assoc();
    
		return $rec['jumlah'];
	}
	function updatepo($conn, $tpod){
		$sql	= "
			UPDATE
				tpod
			SET
				stsls = 1
			WHERE
				no = $tpod
		";
		$result = $conn->query($sql);
	}
	function updatetot($conn, $sub, $ppn, $julah, $tpbh){
		$sql	= "
		UPDATE
			tpbh
		SET
			sbtot	= '$sub',
			ppn		= '$ppn',
			tot		= '$julah'
		WHERE
			no = $tpbh
		";
		$result	= $conn->query($sql);
	}
	function total($conn, $tpbh){
		$sql	= "
		SELECT
			sbtot
		FROM
			tpbh
		WHERE
			no = $tpbh
		";

		$result	= $conn->query($sql);
		$rec = $result->fetch_assoc();
        	
		
		return $rec['sbtot'];
	}
	function status($conn, $tpbh){
		$sql	= "
		SELECT
			jppn
		FROM
			tpbh
		WHERE
			no = $tpbh
		";

		$result	= $conn->query($sql);
		$rec = $result->fetch_assoc();
        	
		
		return $rec['jppn'];
	}
	function select($conn,$kd){
		$sql	= "
			SELECT
				*
			FROM
				tpoh
			WHERE
				kode = '$kd'";
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
	
}
$penerimaanbarang	= new penerimaanbarang();
?>