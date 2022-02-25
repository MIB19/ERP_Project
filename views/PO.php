<div class="header_table_erp">
	<div class="header_top_table_erp">
		<input list="dlist" name="cari" id="myInput" class = "form-search" placeholder="Pencarian ....."  style="margin-bottom:16px;" />	
	</div>
	<div  onClick="add()" class="header_bottom_table_erp">
		TAMBAH DATA
	</div>
</div>
<div style="clear:both;"></div>
<div class="layout-button-riwayat">
	<div style="color:white;padding:10px;overflow-y:auto;">
		<table id="myTable" style="font-size:13px;width:1500px;">
			<thead>
				<tr onClick=""  class="border_black">
					<th style="width: 4%;">No</th>
					<th style="width: 6%;">Action</th>
					<th style="width: 4%;">Detail</th>
                    <th style="width: 6%;">Unit Kerja</th>
					<th style="width: 6%;">Kode</th>
                    <th style="width: 10%;">Nama Supplier</th>
                    <th style="width: 10%;">Ekspedisi</th>
                    <th style="width: 5%;">Tanggal</th>
                    <th style="width: 7%;">Jenis PPN</th>
                    <th style="width: 7%;">Jenis Pembayaran</th>
                    <th style="width: 5%;">Tanggal Kirim</th>
                    <th style="width: 6%;">Term</th>
					<th style="width: 7%;">Subtotal</th>
					<th style="width: 7%;">Disc</th>
					<th style="width: 6%;">PPN</th>
					<th style="width: 6%;">Total</th>
                    <th style="width: 10%;">Keterangan</th>
				</tr>
			</thead>
			<tbody>
	
				<?php $no = 1; ?>
				<?php foreach( $tpoh as $row ) : ?>
				<tr>
					<td><?= $no ?></td>
					<td>
						<img src="<?php echo $config->base_url();?>icon/edit.png" onClick="update('<?php echo $row['no'];?>')" style="cursor:pointer;width:15px;height:15px;border-radius:0px;" />
					
						<img src="<?php echo $config->base_url();?>icon/trash.png" onClick="hapus('<?php echo $row['no'];?>')" style="cursor:pointer;width:15px;height:15px;border-radius:0px;" />
					</td>
					<td>
						<img src="<?php echo $config->base_url();?>icon/employee.png" onClick="detail('<?php echo $row['no'];?>')" style="cursor:pointer;width:25px;height:25px;border-radius:0px;" />
					</td>
                    <td><?= $row['cnama'] ?></td>
					<td><?= $row['kode'] ?></td>
					<td><?= $row['enama'] ?></td>
					<td><?= $row['mnama'] ?></td>
                    <td><?= $row['tgl'] ?></td>
                    <td><?php if($row['jppn']=='0'){echo 'exclude ppn';}else{echo 'include ppn';} ?></td>
                    <td><?= $row['jbyr'] ?></td>
                    <td><?= $row['tglkrm'] ?></td>
                    <td><?= $row['term'] ?></td>
                    <td><?= rupiah($row['sbtot']); ?></td>
					<td><?= rupiah(round($row['dsc'])) ?></td>
					<td><?= rupiah(round($row['ppn'])) ?></td>
					<td><?= rupiah($row['tot']) ?></td>
                    <td><?= $row['ket'] ?></td>
				</tr>
				<?php $no++ ?>
				<?php endforeach ?>
			</tbody>
		</table>
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
	function print(){
		window.print();
	}
	function update(param){
		$('#tester').html('Loading...');
		$.post('<?php echo $config->base_url();?>selecttpoh/'+param+'.html',function(data){
			$('#tester').html(data);
		});
	}
	function detail(param){
		$('#tester').html('Loading...');
		$.post('<?php echo $config->base_url();?>pod/'+param+'.html',function(data){
			$('#tester').html(data);
		});
	}
	function aktif(param){
		$('#tester').html('Loading...');
		$.post('<?php echo $config->base_url();?>aktiftpoh/'+param+'.html',function(data){
			$.post('<?php echo $config->base_url();?>po.html',function(data){
				$('#tester').html(data);
			});
		});
	}
	function hapus(param){
		document.getElementById("alert").style.display = "block" ;
		document.getElementById("kunci").value = "1" ;
		document.getElementById("parameter").value = param ;
	}
	function action_delete(param){
		$('#tester').html('Loading...');
		$.post('<?php echo $config->base_url();?>hapustpoh/'+param+'.html',function(data){
			$.post('<?php echo $config->base_url();?>po.html',function(data){
				$('#tester').html(data);
			});
		});
	}
	function add(){
		$('#tester').html('Loading...');
		$.post('<?php echo $config->base_url();?>addpo.html',function(data){
			$('#tester').html(data);
		});
	}
    </script>