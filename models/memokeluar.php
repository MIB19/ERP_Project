<?php
class memokeluar{
	function show_per($conn){
		$sql	= "
        SELECT
            mprsh.nama as pnama,
            mcab.nama as cnama,
            tmemoh.no,
            tmemoh.kode,
            tmemoh.pengaju,
            tmemoh.tgl,
            tmemoh.ket,
            tmemoh.stsls,
            tmemoh.staktif
		FROM
            mprsh, mcab, tmemoh
        WHERE
            tmemoh.mprsh = mprsh.no
        AND
            tmemoh.mcab = mcab.no
		ORDER BY 
			tmemoh.kode DESC
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
            tmemod.mbrg,
            tmemod.brg,
            tmemod.jum,
            msat.nama as snama,
            tmemod.ket
		FROM
            msat, tmemod
        WHERE
            tmemod.tmemoh = $id
		AND
			tmemod.msat = msat.no
		ORDER BY
			tmemod.kodememo DESC
		
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
            tmemoh.no,
            tmemoh.kode,
            tmemoh.pengaju,
            tmemoh.tgl,
            tmemoh.ket,
            tmemoh.stsls,
            tmemoh.staktif
		FROM
            mprsh, mcab, tmemoh
        WHERE
			tmemoh.no = '$id'
		AND
            tmemoh.mprsh = mprsh.no
        AND
            tmemoh.mcab = mcab.no
		ORDER BY 
			tmemoh.kode DESC
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
    function kode($conn){
		$sql	= "
		SELECT 
			max(kode) as nama
		FROM 
			tmemoh
		";

		$result	= $conn->query($sql);
		$rec = $result->fetch_assoc();
        if(empty($rec)){
            $kode = 'TMK0000000';
        }else{
            $kode = $rec['nama'];
        }
		$urutan 	= (int) substr($kode, 3, 7);
		$urutan++;
		$huruf 		= "TMK";
		$kode1 		= $huruf . sprintf("%07s", $urutan);	
		
		return $kode1;
	}
	function insert($conn){
		$mprsh	= $_POST['mprsh'];
		$mcab	= $_POST['mcab'];
		$kode	= $_POST['kode'];
		$pengaju = $_POST['pengaju'];
		$ket	= $_POST['ket'];
		$ip		= $_POST['ip'];
		$ws		= $_POST['ws'];

		$sql	= "
			INSERT INTO 
				tmemoh(
						mprsh, mcab, kode, pengaju, tgl, ket, creaIP, creaWS 	
					) 
					VALUES (
						'$mprsh', '$mcab', '$kode', '$pengaju', now(), '$ket', '$ip', '$ws'
					)";
		$result	= $conn->query($sql);
	}
	function tot($conn, $tsoh){
		
		$sql	= "
			SELECT 
				sbtot 
			FROM 
				tsoh
			WHERE 
				no = '$tsoh'
		";

		$result	= $conn->query($sql);
		$rec = $result->fetch_assoc();

		return $rec['sbtot'];
	} 
	function insert_tmemod($conn){
		$tmemoh 	= $_POST['tmemoh'];
		$kodememo	= $_POST['kode'];
		$br 		= $_POST['mbrg'];
		$string		= explode(", ", $br);
		$mbrg		= $string[0];
		$brg		= $string[1];
		$msat		= $_POST['msat'];
		$ket		= $_POST['ket'];
		$jum		= $_POST['qty'];
		$sql 	= "
			INSERT INTO
				tmemod(
					tmemoh, kodememo, mbrg, brg, jum, msat, ket
				) VALUES (
					'$tmemoh', '$kodememo', '$mbrg', '$brg', '$jum', '$msat', '$ket'
				)
		";
		
		$result	= $conn->query($sql);
	}
	function updatetsoh($conn, $jumlah, $ppn, $total, $tsoh){
		$sql	= "
		UPDATE
			tsoh
		SET
			sbtot	= '$jumlah',
			ppn		= '$ppn',
			tot		= '$total'
		WHERE
			no = $tsoh
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
	function status($conn, $tsoh){
		$sql	= "
		SELECT
			jppn
		FROM
			tsoh
		WHERE
			no = $tsoh
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
$memokeluar = new memokeluar();
?>