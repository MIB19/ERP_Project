<div class="header_table_erp">
    <div class="form_erp_top">DETAIL</div>
	    <div style="float:left;">
		    <a onclick="balik()" style="color:white;text-decoration: none; cursor: pointer;">
			    <svg style="width:15px;height:15px;" viewBox="0 0 24 24" class="mb-1">
				    <path fill="#000000" d="M2,12A10,10 0 0,1 12,2A10,10 0 0,1 22,12A10,10 0 0,1 12,22A10,10 0 0,1 2,12M18,11H10L13.5,7.5L12.08,6.08L6.16,12L12.08,17.92L13.5,16.5L10,13H18V11Z" />
			    </svg> Back To Data
		    </a>
	    </div>
	<div style="clear:both;"></div>
</div>
<div style="clear:both;"></div>
<div class="layout-button-riwayat">
	<div style="color:white;padding:10px;overflow-y:auto;">
        
		<div style="margin-top: 10px;">
            <label>Kode pemesanan</span></label>
            <div class="alas_luar">
                <input type="text" value="<?php echo $tpoh['kode']; ?>" class="form_input" disabled>
            </div>
        </div>
		<div style="margin-top: 10px;">
            <label>Perusahaan, Cabang</label>
            <div class="alas_luar">
                <input type="text" value="<?= $tpoh['pnama'];?>             /          <?= $tpoh['cnama']; ?>" class="form_input" disabled>
            </div>
        </div>
		<div style="margin-top: 10px;">
            <label>Supplier</label>
            <div class="alas_luar">
                <input type="text" value="<?= $tpoh['enama'];?>" class="form_input" disabled>
            </div>
        </div>
		<div style="margin-top: 10px;">
            <label>Tanggal</label>
            <div class="alas_luar">
                <input type="text" value="<?= date("d / m / Y", strtotime($tpoh['tgl']));?>" class="form_input" disabled>
            </div>
        </div>
		<br/>
		<h1 style="text-align: center; text-decoration-line: underline;">Data Pemesanan</h1>
		<table id="myTable" style="font-size:13px;width:1500px;">
			<thead>
				<tr onClick=""  class="border_black">
					<th style="width: 4%;">No</th>
					<th style="width: 5%;">Action</th>
					<th style="width: 15%;">Barang</th>
                    <th style="width: 7%;">Satuan</th>
                    <th style="width: 7%;">Jumlah</th>
                    <th style="width: 10%;">Harga</th>
                    <th style="width: 10%;">Subtotal</th>
                    <th style="width: 5%;">Disc</th>
                    <th style="width: 10%;">Total</th>
                    <th style="width: 5%;">Term</th>
                    <th style="width: 10%;">Ket</th>
				</tr>
			</thead>
			<tbody>
	
				<?php $no = 1; $a = 0; ?>
				<?php foreach( $tpod as $row ) : ?>
				
					<td><?= $no; ?></td>
					<td>
						<img src="<?php echo $config->base_url();?>icon/edit.png" onClick="update('<?php echo $row['no'];?>')" style="cursor:pointer;width:15px;height:15px;border-radius:0px;" />
					
						<img src="<?php echo $config->base_url();?>icon/trash.png" onClick="hapus('<?= $tpoh['no'] ?>/<?php echo $row['no'];?>')" style="cursor:pointer;width:15px;height:15px;border-radius:0px;" />
					</td>
					<td><?= $row['brg'] ?></td>
					<td><?= $row['snama'] ?></td>
					<td><?= round($row['jum']) ?></td>
					<td><?= rupiah($row['hrg']) ?></td>
					<td><?= rupiah($row['sbtot']); ?></td>
                    <td><?= $row['dsc'] ?></td>
                    <td><?= rupiah($row['tot']); ?></td>
                    <td><?= $row['trm'] ?></td>
                    <td><?= $row['ket'] ?></td>
					<?php $a += $row['tot']; ?>
				</tr>
				<?php $no++ ?>
				<?php endforeach ?>
			</tbody>
		</table>
		
		<div style="margin-top: 20px;">
            <label>Total</label>
            <div class="alas_luar">
                <input type="text" value="<?= rupiah($a); ?>" class="form_input" id="tot" disabled>
            </div>
        </div>
	</div>
	<div id="nav" style="float:right;margin-top:8px;" ></div>
</div>
<div style="clear:both;"></div>

<script>
$(document).ready(function(){
    var rowsShown = 10;
    var rowsTotal = $('#myTable tbody tr').length;
	
    var numPages = rowsTotal/rowsShown;
    for(i = 0;i < numPages;i++) {
        var pageNum = i + 1;
        $('#nav').append('<a href="#" rel="'+i+'" class="paging-bt">'+pageNum+'</a> ');
    }
    $('#myTable tbody tr').hide();
    $('#myTable thead tr').slice(0, rowsShown).show();
    $('#myTable tbody tr').slice(0, rowsShown).show();
    $('#nav a:first').addClass('active');
    $('#nav a').bind('click', function(){

        $('#nav a').removeClass('active');
        $(this).addClass('active');
        var currPage = $(this).attr('rel');
        var startItem = currPage * rowsShown;
        var endItem = startItem + rowsShown;
        $('#myTable tbody tr').css('opacity','0.0').hide().slice(startItem, endItem).
        css('display','table-row').animate({opacity:1}, 300);
    });
	
});
	function hapus(param){
		document.getElementById("alert").style.display = "block" ;
		document.getElementById("kunci").value = "1" ;
		document.getElementById("parameter").value = param ;
	}
	function action_delete(param){
		$('#tester').html('Loading...');
		$.post('<?php echo $config->base_url();?>hapustpod/'+param+'.html',function(data){
			$.post('<?php echo $config->base_url();?>pod/'+param+'.html',function(data){
				$('#tester').html(data);
			});
		});
	}
	function update(param){
		$('#tester').html('Loading...');
		$.post('<?php echo $config->base_url();?>selecttpod/'+param+'.html',function(data){
			$('#tester').html(data);
		});
	}
	function aktif(param){
		$('#tester').html('Loading...');
		$.post('<?php echo $config->base_url();?>aktifmarmd/'+param+'.html',function(data){
			$.post('<?php echo $config->base_url();?>marmd.html',function(data){
				$('#tester').html(data);
			});
		});
	}
	function nonaktif(param){
		$('#tester').html('Loading...');
		$.post('<?php echo $config->base_url();?>nonaktifmarmd/'+param+'.html',function(data){
			$.post('<?php echo $config->base_url();?>marmd.html',function(data){
				$('#tester').html(data);
			});
		});
	}
	function hapus(param){
		document.getElementById("alert").style.display = "block" ;
		document.getElementById("kunci").value = "1" ;
		document.getElementById("parameter").value = param ;
	}
	function balik(){
		$('#tester').html('Loading...');
		$.post('<?php echo $config->base_url();?>po.html',function(data){
			$('#tester').html(data);
		});
	}
    </script>