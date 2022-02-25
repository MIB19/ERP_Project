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
					<th style="width: 4%;">Detail</th>
                    <th style="width: 6%;">St Selesai</th>
					<th style="width: 8%;">Perusahaan</th>
					<th style="width: 8%;">Unit Kerja</th>
					<th style="width: 5%;">Kode</th>
                    <th style="width: 8%;">Pengaju</th>
                    <th style="width: 6%;">Tanggal</th>
                    <th style="width: 10%;">Keterangan</th>
				</tr>
			</thead>
			<tbody>
	
				<?php $no = 1; ?>
				<?php foreach( $tmemoh as $row ) : ?>
				<tr>
					<td><?= $no ?></td>
					<td>
						<img src="<?php echo $config->base_url();?>icon/employee.png" onClick="detail('<?php echo $row['no'];?>/<?= $row['kode']; ?>')" style="cursor:pointer;width:25px;height:25px;border-radius:0px;" />
					</td>
                    <td class="text-center"><?php $st = $row['stsls']; if($st == '1'){?>
						<div onClick="aktifsls('<?= $row['no'];?>')" title="aktif" style="box-sizing:border-box; background-color:green;cursor: pointer;"> sudah
						</div><?php }else{ ?>
						<div onClick="nonaktifsls('<?= $row['no'];?>')" title="Delete" style="box-sizing:border-box; background-color:red;cursor: pointer;">Belum						</div> <?php } ?>
					</td>
                    <td><?= $row['pnama'] ?></td>
                    <td><?= $row['cnama'] ?></td>
					<td><?= $row['kode'] ?></td>
					<td><?= $row['pengaju'] ?></td>
                    <td><?= $row['tgl'] ?></td>
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
	function detail(param){
		$('#tester').html('Loading...');
		$.post('<?php echo $config->base_url();?>tmemod/'+param+'.html',function(data){
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
	function nonaktif(param){
		$('#tester').html('Loading...');
		$.post('<?php echo $config->base_url();?>nonaktiftpoh/'+param+'.html',function(data){
			$.post('<?php echo $config->base_url();?>po.html',function(data){
				$('#tester').html(data);
			});
		});
	}
	/* function nonaktifsls(param){
		$('#tester').html('Loading...');
		$.post('<?php echo $config->base_url();?>nonaktifslstpoh/'+param+'.html',function(data){
			$.post('<?php echo $config->base_url();?>po.html',function(data){
				$('#tester').html(data);
			});
		});
	} */
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
	function add(){
		$('#tester').html('Loading...');
		$.post('<?php echo $config->base_url();?>addtmemoh.html',function(data){
			$('#tester').html(data);
		});
	}
    </script>