<?php
class suratjalan{
	function show_per($conn){
		$sql	= "
        SELECT
            mprsh.nama as pnama,
            mcab.nama as cnama,
            mgdn.nama as gnama,
            meks.nama as mnama,
            tsjh.no,
            tsjh.kode,
            tsjh.kodegl,
            tsjh.mentt,
            tsjh.cust,
            tsjh.custcp,
            tsjh.custpo,
            tsjh.mpeg,
            tsjh.sales,
            tsjh.tgl,
            tsjh.jppn,
            tsjh.jbyr,
            tsjh.tglkrm,
            tsjh.ket
		FROM
            mprsh, mcab, mgdn, meks, tsjh
        WHERE
            tsjh.mprsh = mprsh.no
        AND
            tsjh.mcab = mcab.no
        AND
            tsjh.mgdn = mgdn.no
        AND
            tsjh.meks = meks.no
		ORDER BY 
			tsjh.kode DESC
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
	function show_sjs($conn){
		$sql	= "
		SELECT
			tsod.tsoh,
    		tsod.kodeso,
    		tsjd.tsjh,
    		tsjd.kodesj,
    		tsjd.mgdn,
    		tsjd.mbrg,
    		tsjd.brg,
    		tsjd.msat,
    		tsjd.jum,
    		tsjd.bobot,
    		tsod.hrg,
    		tsod.sbtot,
    		tsod.dsc,
    		tsod.tot
		FROM 
			tsod, tsjd
		WHERE
			tsjd.staktif = 1
		AND
			tsjd.tsod = tsod.no
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
            tsjd.brg,
            msat.nama as snama,
            tsjd.jum,
            tsjd.bobot,
            tsjd.ket
		FROM
            mgdn, msat, tsjd
        WHERE
            tsjd.tsjh = $id
		AND
			tsjd.msat = msat.no
        AND
            tsjd.mgdn = mgdn.no
		ORDER BY
			tsjd.kodesj DESC
		
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
            meks.nama as mnama,
            tsjh.no,
            tsjh.kode,
            tsjh.kodegl,
            tsjh.mentt,
            tsjh.cust,
            tsjh.custcp,
            tsjh.custpo,
            tsjh.mpeg,
            tsjh.sales,
            tsjh.tgl,
            tsjh.jppn,
            tsjh.jbyr,
            tsjh.tglkrm,
            tsjh.ket
		FROM
            mprsh, mcab, mgdn, meks, tsjh
        WHERE
			tsjh.no = '$id'
		AND
            tsjh.mprsh = mprsh.no
        AND
            tsjh.mcab = mcab.no
        AND
            tsjh.mgdn = mgdn.no
        AND
            tsjh.meks = meks.no
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
			tsjh
		";

		$result	= $conn->query($sql);
		$rec = $result->fetch_assoc();
        if(empty($rec)){
            $kode = 'TSJ0000000';
        }else{
            $kode = $rec['nama'];
        }
		$urutan 	= (int) substr($kode, 3, 7);
		$urutan++;
		$huruf 		= "TSJ";
		$kode1 		= $huruf . sprintf("%07s", $urutan);	
		
		return $kode1;
	}
	function insert($conn){
		$mprsh	= $_POST['mprsh'];
		$mcab	= $_POST['mcab'];
		$kode	= $_POST['kode'];
        $kodegl = $_POST['kodegl'];
        $mgdn   = $_POST['mgdn'];
        $en     = $_POST['mentt'];
        $string = explode(", ", $en);
        $mentt  = $string[0];
        $cust   = $string[1];
        $custcp = $string[2];
        $custpo = $_POST['custpo'];
        $meks   = $_POST['meks'];
        $peg    = $_POST['mpeg'];
        $str1   = explode("|", $peg);
        $mpeg   = $str1[0];
        $sales  = $str1[1];
        $tgl    = $_POST['tgl'];
        $jppn   = $_POST['jppn'];
        $jbyr   = $_POST['jbyr'];
        $tglkrm = $_POST['tglkrm'];
		$ket	= $_POST['ket'];
		$ip		= $_POST['ip'];
		$ws		= $_POST['ws'];

		$sql	= "
			INSERT INTO 
				tsjh(
                        kode, kodegl, mprsh, mcab, mgdn, mentt, cust, custcp, custpo, meks, mpeg, sales, tgl, jppn, jbyr, tglkrm, ket, creaIP, creaWS
					) 
					VALUES (
						'$kode', '$kodegl', '$mprsh', '$mcab', '$mgdn', '$mentt', '$cust', '$custcp', '$custpo', '$meks', '$mpeg', '$sales', '$tgl', '$jppn', '$jbyr', '$tglkrm', '$ket', '$ip', '$ws'
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
	function insert_tsjd($conn){
		$tsjh    	= $_POST['tsjh'];
		$kodesj 	= $_POST['kode'];
		$so 		= $_POST['tsod'];
		$string		= explode(", ", $so);
        $bbt        = round($string[6]);
        $qty        = round($string[5]);
		$mbrg		= $string[2];
		$brg		= $string[0];
        $tsod       = $string[1];
        $bobot      = $_POST['bobot'];
        $mgdn       = $_POST['mgdn'];
		$msat		= $_POST['msat'];
		$ket		= $_POST['ket'];
		$jum		= $_POST['qty'];
		$sql 	= "
			INSERT INTO
				tsjd(
					tsod, tsjh, kodesj, mgdn, mbrg, brg, msat, jum, bobot, ket
				) VALUES (
					'$tsod', '$tsjh', '$kodesj', '$mgdn', '$mbrg', '$brg', '$msat', '$jum', '$bobot', '$ket'
				)
		";
		
        $jumlah = $qty - $jum;
        $krm = $this->krm($conn, $tsod);
        $kr = (int)$krm;
        $k = $kr + $jum;
        if($jumlah == 0){
            $this->updatetsod($conn, $k, $tsod);
        }else{    
            $bobotasl = $bbt - $bobot;
            $qtysisa = $qty - $jum; 
            $this->updatekrm($conn, $qtysisa, $bobotasl, $k, $tsod);
        }
		$result	= $conn->query($sql);
	}
	function updatetsod($conn, $k, $tsod){
		$sql	= "
		UPDATE
			tsod
		SET
			stsls 	= 1,
			krm		= '$k',
            jum     = 0,
            bobot   = 0
		WHERE
			no = $tsod
		";
		$result	= $conn->query($sql);
	}
	function updatekrm($conn, $qtysisa, $bobotasl, $k, $tsod){
		$sql	= "
		UPDATE
			tsod
		SET
			krm     = '$k',
            jum     = '$qtysisa',
            bobot   = '$bobotasl'
		WHERE
			no = $tsod
		";

		$result	= $conn->query($sql);
	}
	function krm($conn, $tsod){
		$sql	= "
		SELECT
			krm
		FROM
			tsod
		WHERE
			no = $tsod
		";

		$result	= $conn->query($sql);
		$rec = $result->fetch_assoc();
        	
		
		return $rec['krm'];
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
$suratjalan = new suratjalan();
?>