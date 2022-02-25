<?php
class salesorder{
	function show_per($conn){
		$sql	= "
        SELECT
            mprsh.nama as pnama,
            mcab.nama as cnama,
            tsoh.no,
            tsoh.kode,
            mgdn.nama as gnama,
            tsoh.mentt,
            tsoh.cust,
            tsoh.custcp,
            tsoh.custpo,
            meks.nama as enama,
            tsoh.mpeg,
            tsoh.sales,
            tsoh.tgl,
            tsoh.jppn,
            tsoh.jbyr,
            tsoh.tglkrm,
            tsoh.sbtot,
            tsoh.prsn,
            tsoh.dsc,
            tsoh.dpp,
            tsoh.ppn,
            tsoh.tot,
            tsoh.ket
		FROM
            mprsh, mcab, mgdn, meks, tsoh
        WHERE
            tsoh.mprsh = mprsh.no
        AND
            tsoh.mcab = mcab.no
        AND
            tsoh.mgdn = mgdn.no
		AND
            tsoh.meks = meks.no
		ORDER BY 
			tsoh.kode DESC
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
           *
		FROM
            tsod
        WHERE
            stsls = 0
		ORDER BY 
			kodeso DESC
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
			tsod.no,
			tsod.tsoh,
			tsod.kodeso,
			tsod.mbrg,
			tsod.brg,
			msat.nama as snama,
			tsod.jum,
			tsod.bobot,
			tsod.hrg,
			tsod.sbtot,
			tsod.dsc,
			tsod.tot,
			tsod.krm,
			tsod.ket
		FROM
            mgdn, msat, tsod
        WHERE
            tsod.tsoh = $id
		AND
			tsod.msat = msat.no
        AND
            tsod.mgdn = mgdn.no
		ORDER BY
			tsod.kodeso DESC
		
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
			tsoh.no,
			tsoh.kode,
			mgdn.nama as gnama,
			tsoh.mentt,
			tsoh.cust,
			tsoh.custcp,
			tsoh.custpo,
			meks.nama as enama,
			tsoh.mpeg,
			tsoh.sales,
			tsoh.tgl,
			tsoh.jppn,
			tsoh.jbyr,
			tsoh.tglkrm,
			tsoh.sbtot,
			tsoh.prsn,
			tsoh.dsc,
			tsoh.dpp,
			tsoh.ppn,
			tsoh.tot,
			tsoh.ket
		FROM
			mprsh, mcab, mgdn, meks, tsoh
        WHERE
			tsoh.no = '$id'
		AND
			tsoh.mprsh = mprsh.no
        AND
            tsoh.mcab = mcab.no
        AND
            tsoh.mgdn = mgdn.no
		AND
            tsoh.meks = meks.no
		ORDER BY 
			tsoh.kode DESC
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
			tsoh
		";

		$result	= $conn->query($sql);
		$rec = $result->fetch_assoc();
        if(empty($rec)){
            $kode = 'TSO0000000';
        }else{
            $kode = $rec['nama'];
        }
		$urutan 	= (int) substr($kode, 3, 7);
		$urutan++;
		$huruf 		= "TSO";
		$kode1 		= $huruf . sprintf("%07s", $urutan);	
		
		return $kode1;
	}
	function insert($conn){
		$mprsh	= $_POST['mprsh'];
		$mcab	= $_POST['mcab'];
		$kode	= $_POST['kode'];
		$mgdn	= $_POST['mgdn'];
		$ent	= $_POST['mentt'];
		$string = explode(", ", $ent);
		$mentt	= $string[0];
		$cust	= $string[1];
		$custcp	= $string[2];
		$custpo	= $_POST['custpo'];
		$meks	= $_POST['meks'];
		$peg	= $_POST['mpeg'];
		$pegawai = explode("|", $peg);
		$mpeg	= $pegawai[0];
		$sales	= $pegawai[1];
		$tgl	= $_POST['tgl'];
		$jppn	= $_POST['jppn'];
		$jbyr	= $_POST['jbyr'];
		$tglkrm	= $_POST['tglkrm'];
		$ket	= $_POST['ket'];
		$ip		= $_POST['ip'];
		$ws		= $_POST['ws'];

		$sql	= "
			INSERT INTO 
				tsoh(
						mprsh, mcab, kode, mgdn, mentt, cust, custcp, custpo, meks, mpeg, sales, tgl, jppn, jbyr, tglkrm, ket, creaIP, creaWS 	
					) 
					VALUES (
						'$mprsh', '$mcab', '$kode', '$mgdn', '$mentt', '$cust', '$custcp', '$custpo', '$meks', '$mpeg', '$sales', '$tgl', '$jppn', '$jbyr', '$tglkrm', '$ket', '$ip', '$ws'
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
	function insert_tsod($conn){
		$tsoh 		= $_POST['tsoh'];
		$kodeso		= $_POST['kode'];
		$mgdn		= $_POST['mgdn'];
		$br 		= $_POST['mbrg'];
		$string		= explode(", ", $br);
		$mbrg		= $string[0];
		$brg		= $string[1];
		$msat		= $_POST['msat'];
		$ket		= $_POST['ket'];
		$jum		= $_POST['qty'];
		$bobot		= $_POST['bobot'];
		$hrg		= $string[2];
		$sbtot		= $_POST['subtotal'];
		$dsc		= $_POST['disc'];
		$tot		= $_POST['total'];
		$ket		= $_POST['ket'];
		$diskon		= $_POST['diskon'];
		$sql 	= "
			INSERT INTO
				tsod(
					tsoh, kodeso, mgdn, mbrg, brg, msat, jum, bobot, hrg, sbtot, dsc, tot, ket
				) VALUES (
					'$tsoh', '$kodeso', '$mgdn', '$mbrg', '$brg', '$msat', '$jum', '$bobot', '$hrg', '$sbtot', '$dsc', '$tot', '$ket'
				)
		";
		
		$sub = $this->tot($conn, $tsoh);
		$jumlah = $sub+$tot;
		$st	 = $this->status($conn, $tsoh);
		if($st == 1){
			$ppn = $jumlah*10/100;
			$total = $jumlah + $ppn;
		}else{
			$ppn = 0;
			$total = $jumlah;
		}
		$this-> updatetsoh($conn, $jumlah, $ppn, $total, $tsoh);
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
$salesorder = new salesorder();
?>