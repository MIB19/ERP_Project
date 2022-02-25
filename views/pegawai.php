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
		<table id="myTable" style="font-size:13px;width:auto;">
			<thead>
				<tr onClick=""  class="border_black">
					<th style="width: 4%;">No</th>
					<th style="width: 4%;">Action</th>
					<th style="width: 5%;">St Aktif</th>
					<th style="width: 10%;">Nama Perusahaan</th>
                    <th style="width: 10%;">Nama Cabang</th>
					<th style="width: 6%;">Kode</th>
					<th style="width: 10%;">Nama</th>
                    <th style="width: 10%;">Alamat</th>
                    <th style="width: 7%;">No. Telepon</th>
                    <th style="width: 7%;">No. HP</th>
                    <th style="width: 8%;">Email</th>
                    <th style="width: 6%;">Akun IG</th>
                    <th style="width: 6%;">Akun FB</th>
                    <th style="width: 8%;">Cabang Bank</th>
                    <th style="width: 8%;">Bank Akun</th>
                    <th style="width: 10%;">Bank Nama</th>
                    <th style="width: 6%;">No PKP</th>
                    <th style="width: 10%;">Nama PKP</th>
                    <th style="width: 10%;">Alamat PKP</th>
                    <th style="width: 10%;">Nama Departemen</th>
                    <th style="width: 8%;">Posisi</th>
                    <th style="width: 7%;">Tgl Lahir</th>
                    <th style="width: 7%;">Tgl Join</th>
                    <th style="width: 10%;">Keterangan</th>
				</tr>
			</thead>
			<tbody>
	
				<?php $no = 1; ?>
				<?php foreach( $mpeg as $row ) : ?>
				<tr>
					<td><?= $no ?></td>
					<td>
						<img src="<?php echo $config->base_url();?>icon/edit.png" onClick="update('<?php echo $row['no'];?>')" style="cursor:pointer;width:15px;height:15px;border-radius:0px;" />
					
						<img src="<?php echo $config->base_url();?>icon/trash.png" onClick="hapus('<?php echo $row['no'];?>')" style="cursor:pointer;width:15px;height:15px;border-radius:0px;" />
					</td>
					<td class="text-center"><?php $st = $row['staktif']; if($st == '1'){?>
						<div onClick="aktif('<?= $row['no'];?>')" title="aktif" style="box-sizing:border-box; background-color:green;cursor: pointer;"> Aktif
						</div><?php }else{ ?>
						<div onClick="nonaktif('<?= $row['no'];?>')" title="Delete" style="box-sizing:border-box; background-color:red;cursor: pointer;"> Nonaktif						</div> <?php } ?>
					</td>
					<td><?= $row['pnama'] ?></td>
					<td><?= $row['cnama'] ?></td>
					<td><?= $row['kode'] ?></td>
					<td><?= $row['nama'] ?></td>
                    <td><?= $row['alm'] ?></td>
                    <td><?= $row['telp'] ?></td>
                    <td><?= $row['hp'] ?></td>
                    <td><?= $row['email'] ?></td>
                    <td><?= $row['ig'] ?></td>
                    <td><?= $row['fb'] ?></td>
                    <td><?= $row['bnkcab'] ?></td>
                    <td><?= $row['bnkac'] ?></td>
                    <td><?= $row['bnknm'] ?></td>
                    <td><?= $row['pkpno'] ?></td>
                    <td><?= $row['pkpnm'] ?></td>
                    <td><?= $row['pkpalm'] ?></td>
                    <td><?= $row['dnama'] ?></td>
                    <td><?= $row['pos'] ?></td>
                    <td><?= $row['tgllahir'] ?></td>
                    <td><?= $row['tgljoin'] ?></td>
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
<script >
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
	function add(){
		$('#tester').html('Loading...');
		$.post('<?php echo $config->base_url();?>addmpeg.html',function(data){
			$('#tester').html(data);
		});
	}
	function update(param){
		$('#tester').html('Loading...');
		$.post('<?php echo $config->base_url();?>selectmpeg/'+param+'.html',function(data){
			$('#tester').html(data);
		});
	}
	function aktif(param){
		$('#tester').html('Loading...');
		$.post('<?php echo $config->base_url();?>aktifmpeg/'+param+'.html',function(data){
			$.post('<?php echo $config->base_url();?>mpeg.html',function(data){
				$('#tester').html(data);
			});
		});
	}
	function nonaktif(param){
		$('#tester').html('Loading...');
		$.post('<?php echo $config->base_url();?>nonaktifmpeg/'+param+'.html',function(data){
			$.post('<?php echo $config->base_url();?>mpeg.html',function(data){
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
		$.post('<?php echo $config->base_url();?>hapusmpeg/'+param+'.html',function(data){
			$.post('<?php echo $config->base_url();?>mpeg.html',function(data){
				$('#tester').html(data);
			});
		});
	}

    </script>
