<?php
class invoicejual{
	function show_per($conn){
		$sql	= "
        SELECT
            mprsh.nama as pnama,
            mcab.nama as cnama,
            mgdn.nama as gnama,
            tijh.no,
            tijh.kode,
            tijh.mentt,
            tijh.cust,
            tijh.custpo,
            tijh.mpeg,
            tijh.sales,
            tijh.tgl,
            tijh.jbyr,
            tijh.termin,
            tijh.tgljt,
            tijh.nofp,
            tijh.tglfp,
            tijh.sbtot,
            tijh.prsn,
            tijh.dsc,
            tijh.dpp,
            tijh.ppn,
            tijh.tot,
            tijh.ket
		FROM
            mprsh, mcab, mgdn, tijh
        WHERE
            tijh.mprsh = mprsh.no
        AND
            tijh.mcab = mcab.no
        AND
            tijh.mgdn = mgdn.no
		ORDER BY 
			tijh.kode DESC
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
            tijd.brg,
            msat.nama as snama,
            tijd.jum,
            tijd.bobot,
            tijd.hrg,
            tijd.sbtot,
            tijd.dsc,
            tijd.tot,
            tijd.ket
		FROM
            mgdn, msat, tijd
        WHERE
            tijd.tijh = $id
		AND
			tijd.msat = msat.no
        AND
            tijd.mgdn = mgdn.no
		
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
            tijh.no,
            tijh.kode,
            tijh.mentt,
            tijh.cust,
            tijh.custpo,
            tijh.mpeg,
            tijh.sales,
            tijh.tgl,
            tijh.jbyr,
            tijh.termin,
            tijh.tgljt,
            tijh.nofp,
            tijh.tglfp,
            tijh.sbtot,
            tijh.prsn,
            tijh.dsc,
            tijh.dpp,
            tijh.ppn,
            tijh.tot,
            tijh.ket
		FROM
            mprsh, mcab, mgdn, tijh
        WHERE
			tijh.no = '$id'
		AND
            tijh.mprsh = mprsh.no
        AND
            tijh.mcab = mcab.no
        AND
            tijh.mgdn = mgdn.no
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
			tijh
		";

		$result	= $conn->query($sql);
		$rec = $result->fetch_assoc();
        if(empty($rec)){
            $kode = 'TIJ0000000';
        }else{
            $kode = $rec['nama'];
        }
		$urutan 	= (int) substr($kode, 3, 7);
		$urutan++;
		$huruf 		= "TIJ";
		$kode1 		= $huruf . sprintf("%07s", $urutan);	
		
		return $kode1;
	}
	function insert($conn){
		$mprsh	= $_POST['mprsh'];
		$mcab	= $_POST['mcab'];
		$kode	= $_POST['kode'];
        $mgdn   = $_POST['mgdn'];
        $en     = $_POST['mentt'];
        $string = explode(", ", $en);
        $mentt  = $string[0];
        $cust   = $string[1];
        $custpo = $_POST['custpo'];
        $peg    = $_POST['mpeg'];
        $str1   = explode("|", $peg);
        $mpeg   = $str1[0];
        $sales  = $str1[1];
        $tgl    = $_POST['tgl'];
        $jbyr   = $_POST['jbyr'];
        $termin = $_POST['termin'];
        $tgljt  = $_POST['tgljt'];
        $nofp   = $_POST['nofp'];
        $tglfp  = $_POST['tglfp'];
        $dpp    = $_POST['dpp'];
		$ket	= $_POST['ket'];
		$ip		= $_POST['ip'];
		$ws		= $_POST['ws'];

		$sql	= "
			INSERT INTO 
				tijh(
                        mprsh, mcab, kode, mgdn, mentt, cust, custpo, mpeg, sales, tgl, jbyr, termin, tgljt, nofp, tglfp, dpp, ket, creaIP, creaWS
					) 
					VALUES (
						'$mprsh', '$mcab', '$kode', '$mgdn', '$mentt', '$cust', '$custpo', '$mpeg', '$sales', '$tgl', '$jbyr', '$termin', '$tgljt', '$nofp', '$tglfp', '$dpp', '$ket', '$ip', '$ws'
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
	function insert_tijd($conn){
		$tijh    	= $_POST['tijh'];
		$kodeij 	= $_POST['kode'];
		$so 		= $_POST['tsjd'];
		$string		= explode(", ", $so);
		$kodeso		= $string[2];
		$brg		= $string[0];
        $tsoh       = $string[1];
        $tsjh       = $string[3];
        $kodesj     = $string[4];
        $mgdn       = $string[5];
        $mbrg       = $string[6];
        $msat       = $string[7];
        $jum        = $string[8];
        $bobot      = $string[9];
        $harga      = $string[10];
        $sbtot      = $string[11];
        $dsc        = $string[12];
        $tot        = $string[13];
        $ket        = $_POST['ket'];
		$sql 	= "
			INSERT INTO
				tijd(
					tijh, kodeij, tsoh, kodeso, tsjh, kodesj, mgdn, mbrg, brg, msat, jum, bobot, hrg, sbtot, dsc, tot, ket
				) VALUES (
					'$tijh', '$kodeij', '$tsoh', '$kodeso', '$tsjh', '$kodesj', '$mgdn', '$mbrg', '$brg', '$msat', '$jum', '$bobot', '$harga', '$sbtot', '$dsc', '$tot', '$ket'
				)
		";
		
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
$invoicejual = new invoicejual();
?>