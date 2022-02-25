<?php
class invoicebeli{
	function show_per($conn){
		$sql	= "
        SELECT
            mprsh.nama as pnama,
            mcab.nama as cnama,
            mgdn.nama as gnama,
            mentt.nama as enama,
            tibh.kode,
            tibh.sup,
            tibh.no,
            tibh.mentt,
			tibh.supcp,
            tibh.msales,
            tibh.sales,
            tibh.tgl,
            tibh.jbyr,
            tibh.termin,
            tibh.tgljt,
            tibh.nofp,
            tibh.tglfp,
            tibh.sbtot,
            tibh.prsn,
            tibh.dsc,
            tibh.dpp,
            tibh.ppn,
            tibh.tot,
            tibh.ket
		FROM
            mprsh, mcab, mgdn, mentt, tibh
        WHERE
            tibh.mprsh = mprsh.no
        AND
            tibh.mcab = mcab.no
        AND
            tibh.mentt = mentt.no
		AND
            tibh.mgdn = mgdn.no
		ORDER BY 
			tibh.kode DESC
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
            tibh.kode,
            tibh.sup,
            tibh.no,
            tibh.mentt,
			tibh.supcp,
            tibh.msales,
            tibh.sales,
            tibh.tgl,
            tibh.jbyr,
            tibh.termin,
            tibh.tgljt,
            tibh.nofp,
            tibh.tglfp,
            tibh.sbtot,
            tibh.prsn,
            tibh.dsc,
            tibh.dpp,
            tibh.ppn,
            tibh.tot,
            tibh.ket
		FROM
            mprsh, mcab, mgdn, mentt, tibh
        WHERE
            tibh.mprsh = mprsh.no
        AND
            tibh.mcab = mcab.no
        AND
            tibh.mentt = mentt.no
		AND
            tibh.mgdn = mgdn.no
		ORDER BY 
			tibh.kode DESC
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
            mgdn.nama as gnama,
            tibd.tibh,
            tibd.kodepbh,
			tibd.kodeib,
            tibd.kodepo,
			tibd.tpbh,
            tibd.tpoh,
            tibd.tsjh,
            tibd.kodesj,
            tibd.mgdn,
			tibd.mbrg,
			tibd.brg,
			msat.nama as snama,
			tibd.jum,
			tibd.bobot,
			tibd.hrg,
			tibd.sbtot,
			tibd.dsc,
			tibd.tot,
			tibd.ket
		FROM
            tibd, msat, mgdn
        WHERE
            tibh = $id
		AND
			tibd.msat = msat.no
        AND
            tibd.mgdn = mgdn.no
		ORDER BY
			tibd.kodeib ASC
		
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
            tibh.kode,
            tibh.sup,
            tibh.no,
            tibh.mentt,
            tibh.supcp,
            tibh.msales,
            tibh.sales,
            tibh.tgl,
            tibh.jbyr,
            tibh.termin,
            tibh.tgljt,
            tibh.nofp,
            tibh.tglfp,
            tibh.sbtot,
            tibh.prsn,
            tibh.dsc,
            tibh.dpp,
            tibh.ppn,
            tibh.tot,
            tibh.ket
        FROM
            mprsh, mcab, mgdn, mentt, tibh
        WHERE
			tibh.no = '$id'
		AND
            tibh.mprsh = mprsh.no
        AND
            tibh.mcab = mcab.no
        AND
            tibh.mentt = mentt.no
		AND
            tibh.mgdn = mgdn.no
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
		$sql	= "
		SELECT 
			max(kode) as nama
		FROM 
			tibh
		";

		$result	= $conn->query($sql);
		$rec = $result->fetch_assoc();
        if(empty($rec)){
            $kode = 'TIB0000000';
        }else{
            $kode = $rec['nama'];
        }
		$urutan 	= (int) substr($kode, 3, 7);
		$urutan++;
		$huruf 		= "TIB";
		$kode1 		= $huruf . sprintf("%07s", $urutan);	
		
		return $kode1;
	}
	function kodeib($conn){
		$sql	= "
		SELECT 
			max(kodeib) as nama
		FROM 
			tibd
		";

		$result	= $conn->query($sql);
		$rec = $result->fetch_assoc();
        if(empty($rec)){
            $kode = 'IBD0000000';
        }else{
            $kode = $rec['nama'];
        }
		$urutan 	= (int) substr($kode, 3, 7);
		$urutan++;
		$huruf 		= "IBD";
		$kode1 		= $huruf . sprintf("%07s", $urutan);	
		
		return $kode1;
	}
	function insert($conn){
		$mprsh	= $_POST['mprsh'];
		$mcab	= $_POST['mcab'];
		$kode	= $_POST['kode'];
		$ent	= $_POST['mentt'];
		$string = explode(", ", $ent);
		$mentt	= $string[0];
		$sup	= $string[1];
		$supcp	= $string[2];
		$sls	= $_POST['sales'];
		$string1 = explode("|", $sls);
		$mpeg	= $string1[0];
		$sales	= $string1[1];
		$mgdn	= $_POST['mgdn'];
		$tgl	= $_POST['tgl'];
		$jbyr	= $_POST['jbyr'];
		$termin	= $_POST['termin'];
		$tgljt	= $_POST['tgljt'];
		$nofp	= $_POST['nofp'];
		$tglfp	= $_POST['tglfp'];
		$sbtot	= $_POST['sub'];
		$prsn	= $_POST['dsc'];
		$dpp	= $_POST['dpp'];
		$tot	= $_POST['tot'];
		$ket	= $_POST['ket'];
		$ip		= $_POST['ip'];
		$ws		= $_POST['ws'];

		$sql	= "
			INSERT INTO 
				tibh(
						mprsh, mcab, kode, mgdn, mentt, sup, supcp, mpeg, sales, tgl, jbyr, termin, tgljt, nofp, tglfp, sbtot, prsn, dpp, tot, ket, creaIP, creaWS 	
					) 
					VALUES (
						'$mprsh', '$mcab', '$kode', '$mgdn', '$mentt', '$sup', '$supcp', '$mpeg', '$sales', '$tgl', '$jbyr', '$termin', '$tgljt', '$nofp', '$tglfp', '$sbtot', '$prsn', '$dpp', '$tot', '$ket', '$ip', '$ws'
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
	function insert_tibd($conn){
		$tibh 		= $_POST['tibh'];
		$kodeib		= $_POST['kode'];
		$isi		= $_POST['tpbd'];
		$string		= explode(", ", $isi);
		$tpbh		= $string[1];
		$kodepb		= $string[2];
		$tpoh		= $string[3];
		$kodepo		= $string[4];
		$mgdn		= $string[5];
		$mbrg		= $string[6];
		$brg		= $string[0];
		$jum		= $string[7];
		$bobot		= $string[8];
		$msat		= $string[9];
		$hrg		= $string[10];
		$sbtot		= $string[11];
		$dsc		= $string[12];
		$tot		= $string[13];
		$ket		= $_POST['ket'];

		$sql 	= "
			INSERT INTO
				tibd(
					tibh, kodeib, tpbh, kodepbh, tpoh, kodepo, mgdn, mbrg, brg, jum, bobot, msat, hrg, sbtot, dsc, tot, ket
				) VALUES (
					'$tibh', '$kodeib', '$tpbh', '$kodepb', '$tpoh', '$kodepo', '$mgdn', '$mbrg', '$brg', '$jum', '$bobot', '$msat', '$hrg', '$sbtot', '$dsc', '$tot', '$ket'
				)
		";
		$this->updatetpbh($conn, $kodepb);
		$result	= $conn->query($sql);
	}
	function updatetpbh($conn, $kodepb){
		$sql	= "
			UPDATE
				tpbd
			SET
				stsls = 1
			WHERE
				kodepb = $kodepb
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
$invoicebeli   = new invoicebeli();
?>