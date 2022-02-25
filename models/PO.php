<?php
class TPOH{
	function show_per($conn){
		$sql	= "
        SELECT
            mprsh.nama as pnama,
            mcab.nama as cnama,
            meks.nama as mnama,
            mentt.nama as enama,
			tpoh.mentt,
			tpoh.meks,
			tpoh.sup,
            tpoh.no,
            tpoh.kode,
            tpoh.kodegl,
            mentt.cpnm,
            tpoh.tgl,
            tpoh.jppn,
            tpoh.jbyr,
            tpoh.tglkrm,
            tpoh.term,
            tpoh.sbtot,
            tpoh.prsn,
            tpoh.dsc,
            tpoh.dpp,
            tpoh.ppn,
            tpoh.tot,
            tpoh.ket,
            tpoh.revisi,
            tpoh.stambsdr,
            tpoh.stsls
		FROM
            mprsh, mcab, meks, mentt, tpoh
        WHERE
            tpoh.mprsh = mprsh.no
        AND
            tpoh.mcab = mcab.no
        AND
            tpoh.meks = meks.no
        AND
            tpoh.mentt = mentt.no
		ORDER BY 
			tpoh.tgl DESC
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
	function show_($conn, $kode){
		$sql	= "
        SELECT
            *
		FROM
            tpoh
        WHERE
			kode = '$kode'
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
	function show_per1($conn){
		$sql	= "
        SELECT
            *
		FROM
            tpoh
        WHERE
			stsls = 0
		ORDER BY 
			kode DESC
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
			tpod.urgnt,
			tpod.no,
			tpod.msat,
            tpod.kodepo,
			tpod.stsls,
			tpod.tpoh,
			tpod.mbrg,
			tpod.brg,
			msat.nama as snama,
			tpod.jum,
			tpod.bobot,
			tpod.hrg,
			tpod.sbtot,
			tpod.dsc,
			tpod.tot,
			tpod.trm,
			tpod.ket,
			tpod.staktif
		FROM
            tpod, msat, mgdn
        WHERE
            tpoh = $id
		AND
			tpod.mgdn = mgdn.no
		AND
			tpod.msat = msat.no
		ORDER BY
			tpod.kodepo ASC
		
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
	function detailpo($conn, $id){
		$sql	= "
        SELECT
			tpod.no,
			tpod.msat,
            tpod.kodepo,
			tpod.stsls,
			tpod.tpoh,
			tpod.mbrg,
			tpod.brg,
			msat.nama as snama,
			tpod.jum,
			tpod.bobot,
			tpod.hrg,
			tpod.sbtot,
			tpod.dsc,
			tpod.tot,
			tpod.trm,
			tpod.ket,
			tpod.staktif
		FROM
            tpod, msat
        WHERE
            tpoh = $id
		AND 
			tpod.stsls = 0
		AND
			tpod.msat = msat.no
		ORDER BY
			tpod.kodepo ASC
		
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
            meks.nama as mnama,
            mentt.nama as enama,
            tpoh.no,
            tpoh.kode,
            tpoh.kodegl,
            mentt.cpnm,
            tpoh.tgl,
            tpoh.jppn,
            tpoh.jbyr,
            tpoh.tglkrm,
            tpoh.term,
            tpoh.sbtot,
            tpoh.prsn,
            tpoh.dsc,
            tpoh.dpp,
            tpoh.ppn,
            tpoh.tot,
            tpoh.ket,
            tpoh.revisi,
            tpoh.stambsdr,
            tpoh.stsls
		FROM
            mprsh, mcab, meks, mentt, tpoh
        WHERE
			tpoh.no = '$id'
		AND
            tpoh.mprsh = mprsh.no
        AND
            tpoh.mcab = mcab.no
        AND
            tpoh.meks = meks.no
        AND
            tpoh.mentt = mentt.no
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
		$tahun = date('y');
		$buln = date('m');
		$huruf 		= "PO$tahun$buln";

		$sql	= "
		SELECT 
			max(RIGHT(kode, 5)) as nama
		FROM 
			tpoh
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
	function insert($conn){
		$mprsh		= $_POST['mprsh'];
		$mcab		= $_POST['mcab'];
		$kode		= $_POST['kode'];
		$kodegl		= $_POST['kodegl'];
		$en			= $_POST['mentt'];
		$string		= explode("|", $en);
		$mentt		= $string[0];
		$supgl		= $string[1];
		$sup		= $string[2];
		$supcp		= $string[3];
		$meks		= $_POST['meks'];
		$jppn		= $_POST['jppn'];
		$jbyr		= $_POST['jbyr'];
		$tglkrm		= $_POST['tglkrm'];
		$term		= $_POST['term'];
		$ip			= $_POST['ip'];
		$ws			= $_POST['ws'];
		$sql	= "
			INSERT INTO 
				tpoh(
						mprsh, mcab, kode, kodegl, mentt, supgl, sup, supcp, meks, tgl, jppn, jbyr, tglkrm, term, creaIP, creaWS
					) 
					VALUES (
						'$mprsh', '$mcab', '$kode', '$kodegl', '$mentt', '$supgl', '$sup', '$supcp', '$meks', now(), '$jppn', '$jbyr', '$tglkrm', '$term', '$ip', '$ws'
					)";

		$result	= $conn->query($sql);
	}
	function insert_tpoh($conn){
		$no 		= $_POST['no'];
		$mprsh 		= $_POST['mprsh'];
		$mcab		= $_POST['mcab'];
		$kodegl		= $_POST['kodegl'];
		$en			= $_POST['mentt'];
		$string = explode("|",$en);
		$mentt		= $string[0];
		$supgl		= $string[1];
		$sup		= $string[2];
		$supcp		= $string[3];
		$dsc		= $_POST['diskon'];
		$meks		= $_POST['meks'];
		$jppn		= $_POST['jppn'];
		$jbyr		= $_POST['jbyr'];
		$tglkrm		= $_POST['tglkrm'];
		$term		= $_POST['term'];
		$ppn		= $_POST['ppn'];
		$sbtot		= $_POST['sub'];
		$dpp		= $_POST['dpp'];
		$tot		= $_POST['tot'];
		$ket		= $_POST['ket'];

		$sql	= "
			UPDATE
				tpoh
			SET
				mprsh	= '$mprsh',
				mcab	= '$mcab',
				kodegl	= '$kodegl',
				mentt	= '$mentt',
				supgl	= '$supgl',
				sup		= '$sup',
				supcp	= '$supcp',
				meks	= '$meks',
				tgl		= now(),
				jppn	= '$jppn',
				jbyr	= '$jbyr',
				tglkrm	= '$tglkrm',
				term	= '$term',
				sbtot	= '$sbtot',
				dsc		= '$dsc',
				ppn		= '$ppn',
				dpp		= '$dpp',
				tot		= '$tot',
				ket		= '$ket'
			WHERE 
				no = '$no'";

		$result	= $conn->query($sql);
	}
	function insert_tpod($conn){
		$no 		= $_POST['no'];
		$kodepo		= $_POST['kode'];
		$br			= $_POST['mbrg'];
		$urgnt		= $_POST['urgnt'];
		$mgdn		= $_POST['mgdn'];
		$string1 = explode(", ",$br);
		$mbrg		= $string1[0];
		$brg		= $string1[1];
		$msat		= $string1[4];
		$hrg		= $_POST['harga'];
		$bobot		= $_POST['bobot'];
		$jum		= $_POST['qty'];
		$sbtot		= $_POST['subtotal'];
		$dsc		= $_POST['disc'];
		$term		= $_POST['term'];
		$tot		= $_POST['total'];
		$ket		= $_POST['ket'];

		$sql 	= "
			INSERT INTO
				tpod(
					tpoh, kodepo, mbrg, brg, msat, urgnt, mgdn, jum, bobot, hrg, sbtot, dsc, tot, trm, ket
				) VALUES (
					'$no', '$kodepo', '$mbrg', '$brg', '$msat', '$urgnt', '$mgdn', '$jum', '$bobot', '$hrg', '$sbtot', '$dsc', '$tot', '$term', '$ket'
				)
		";

		$result	= $conn->query($sql);
	}
	function select($conn,$id){
		$sql	= "
			SELECT
				*
			FROM
				tpoh
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
		$ip			= $_POST['ip'];
		$ws			= $_POST['ws'];
		$id 		= $_POST['no'];
		$tpoh		= $_POST['tpoh'];
		$br			= $_POST['mbrg'];
		$urgnt		= $_POST['urgnt'];
		$mgdn		= $_POST['mgdn'];
		$string1 = explode(", ",$br);
		$mbrg		= $string1[0];
		$brg		= $string1[1];
		$msat		= $string1[4];
		$hrg		= $_POST['harga'];
		$bobot		= $_POST['bobot'];
		$jum		= $_POST['qty'];
		$sbtot		= $_POST['subtotal'];
		$dsc		= $_POST['disc'];
		$term		= $_POST['term'];
		$tot		= $_POST['total'];
		$ket		= $_POST['ket'];
		

		$sql	= "
			UPDATE 
				tpod 
			SET 
				mbrg	= '$mbrg', 
				brg		= '$brg',
				msat	= '$msat',
				urgnt	= '$urgnt',
				mgdn	= '$mgdn',
				jum		= '$jum',
				bobot	= '$bobot',
				hrg		= '$hrg',
				sbtot	= '$sbtot',
				dsc		= '$dsc',
				tot		= '$tot',
				trm		= '$term',
				ket		= '$ket'
			WHERE 
				no = '$id'";

		$result	= $conn->query($sql);
		$sub = $this->sub($conn, $tpoh);
		$ttl = $this->ttl($conn, $tpoh);
		$diskon = $sub - $ttl;
		$sts = $this->sts($conn, $tpoh);
		if($sts == 1){
			$ppn = $ttl*10/100;
			$jumlah = $ttl+$ppn;
		}else{
			$ppn = 0;
			$jumlah = $ttl;
		}
		$this->upd_ttl($conn, $sub, $diskon, $ttl, $ppn, $jumlah, $tpoh, $ip, $ws);
	}
	function upd_ttl($conn, $sub, $diskon, $ttl, $ppn, $jumlah, $tpoh, $ip, $ws){
		$sql	= "
			UPDATE
				tpoh
			SET
				sbtot	= '$sub',
				dsc		= '$diskon',
				dpp		= '$ttl',
				ppn		= '$ppn',
				tot		= '$jumlah',
				lastIP	= '$ip',
				lastWS	= '$ws',
				lastTS	= now()
			WHERE
				no = '$tpoh'
		";
		$result	= $conn->query($sql);
	}
	function sts($conn, $tpoh){
		$sql	= "
			SELECT
				jppn
			FROM
				tpoh
			WHERE
				no = '$tpoh'
		";
		$result	= $conn->query($sql);
		$rec = $result->fetch_assoc();

		return $rec['jppn'];
	}
	function ttl($conn, $tpoh){
		$sql	= "
			SELECT
				SUM(tot) as jumlah
			FROM
				tpod
			WHERE
				tpoh = '$tpoh'
		";

		$result	= $conn->query($sql);
		$rec = $result->fetch_assoc();

		return $rec['jumlah'];
	}
	function sub($conn, $tpoh){
		$sql	= "
			SELECT
				SUM(sbtot) as jumlah
			FROM
				tpod
			WHERE
				tpoh = '$tpoh'
		";

		$result	= $conn->query($sql);
		$rec = $result->fetch_assoc();

		return $rec['jumlah'];
	}
	function hapus($conn,$id){
		$sql	= "
			DELETE FROM
				tpoh 
			WHERE 
				no = '$id'";
		$this->hapus_tpod($conn, $id);
		$result	= $conn->query($sql);
	}
	function hapus_tpod($conn,$id){
		$sql	= "
			DELETE FROM
				tpod 
			WHERE 
				tpoh = '$id'";
		$result	= $conn->query($sql);
	}
	function hapus_tpods($conn,$id){
		$sql	= "
			DELETE FROM
				tpod 
			WHERE 
				no = '$id'";
		$result	= $conn->query($sql);
	}
	function select_tpod($conn,$id){
		$sql	= "
			SELECT
				*
			FROM
				tpod
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
	
}
$TPOH	= new TPOH();
?>