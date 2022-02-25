<?php
class percobaan{
	function show_arm($conn){
		$sql	= "
		SELECT
            mprsh.nama as pnama,
            mcab.kode,
            mcab.nama,
            mcab.alm,
            mcab.telp,
            mcab.fax,
            mcab.hp,
            mcab.email,
            mcab.bnknm,
            mcab.bnkcab,
            mcab.bnkac,
            mcab.ket,
            mcab.staktif,
            mcab.sthapus,
            mcab.stinput
		FROM
            `mprsh`
        inner join
            mcab
        on
            mprsh.id = mcab.mprsh
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
	
}
$percobaan	= new percobaan();
?>