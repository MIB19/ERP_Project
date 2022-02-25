<div class="header_table_erp">
    <div class="form_erp_top" onClick="add('<?= $tmemoh['no']; ?>/<?= $tmemoh['kode']; ?>')" style="cursor: pointer;">Tambah Data</div>
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
            <label>Kode MEMO</span></label>
            <div class="alas_luar">
                <input type="text" value="<?php echo $tmemoh['kode']; ?>" class="form_input" disabled>
            </div>
        </div>
		<div style="margin-top: 10px;">
            <label>Perusahaan, Cabang</label>
            <div class="alas_luar">
                <input type="text" value="<?= $tmemoh['pnama'];?>             /          <?= $tmemoh['cnama']; ?>" class="form_input" disabled>
            </div>
        </div>
		<div style="margin-top: 10px;">
            <label>Pengaju</label>
            <div class="alas_luar">
                <input type="text" value="<?= $tmemoh['pengaju'];?>" class="form_input" disabled>
            </div>
        </div>
		<div style="margin-top: 10px;">
            <label>Tanggal</label>
            <div class="alas_luar">
                <input type="text" value="<?= date("d / m / Y", strtotime($tmemoh['tgl']));?>" class="form_input" disabled>
            </div>
        </div>
		<br/>
		<h1 style="text-align: center; text-decoration-line: underline;">Data Barang</h1>
		<table id="myTable" style="font-size:13px;width:1500px;">
			<thead>
				<tr onClick=""  class="border_black">
					<th style="width: 4%;">No</th>
					<th style="width: 15%;">Barang</th>
                    <th style="width: 6%;">Satuan</th>
					<th style="width: 6%;">Jumlah</th>
                    <th style="width: 10%;">Ket</th>
				</tr>
			</thead>
			<tbody>
	
				<?php $no = 1; ?>
				<?php $a = 0; ?>
				<?php foreach( $tmemod as $row ) : ?>
				
					<td><?= $no; ?></td>
					<td><?= $row['brg'] ?></td>
					<td><?= $row['snama'] ?></td>
					<td><?= round($row['jum']) ?></td>
                    <td><?= $row['ket'] ?></td>
					<?php $a +=$row['jum']; ?>
				</tr>
				<?php $no++ ?>
				<?php endforeach ?>
			</tbody>
		</table>
		
		<div style="margin-top: 20px;">
            <label>Total</label>
            <div class="alas_luar">
                <input type="text" value="<?= $a; ?>" class="form_input" id="tot" disabled>
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
	function add(param){
		$('#tester').html('Loading...');
		$.post('<?php echo $config->base_url(); ?>addtmemod/'+param+'.html',function(data){
			$('#tester').html(data);
		})
	}
	function update(param){
		$('#tester').html('Loading...');
		$.post('<?php echo $config->base_url();?>selectmarmd/'+param+'.html',function(data){
			$('#tester').html(data);
		});
	}
	function hapus(param){
		document.getElementById("alert").style.display = "block" ;
		document.getElementById("kunci").value = "1" ;
		document.getElementById("parameter").value = param ;
	}
	function action_delete(param){
		$('#tester').html('Loading...');
		$.post('<?php echo $config->base_url();?>hapusmarmd/'+param+'.html',function(data){
			$.post('<?php echo $config->base_url();?>marmd.html',function(data){
				$('#tester').html(data);
			});
		});
	}
	function balik(){
		$('#tester').html('Loading...');
		$.post('<?php echo $config->base_url();?>mk.html',function(data){
			$('#tester').html(data);
		});
	}
    </script>