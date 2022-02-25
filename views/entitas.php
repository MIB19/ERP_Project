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
					<th style="width: 4%;">Action</th>
					<th style="width: 5%;">St Aktif</th>
					<th style="width: 5%;">Status Supplier</th>
                    <th style="width: 5%;">Status Customer</th>
					<th style="width: 10%;">Nama Perusahaan</th>
                    <th style="width: 10%;">Nama Cabang</th>
					<th style="width: 6%;">Kode</th>
                    <th style="width: 5%;">kodegl</th>
					<th style="width: 10%;">Nama</th>
                    <th style="width: 10%;">Alamat</th>
                    <th style="width: 5%;">No. Telepon</th>
                    <th style="width: 5%;">Fax</th>
                    <th style="width: 5%;">No. HP</th>
                    <th style="width: 7%;">Email</th>
                    <th style="width: 6%;">Akun IG</th>
                    <th style="width: 6%;">Akun FB</th>
                    <th style="width: 10%;">Bank Nama</th>
                    <th style="width: 8%;">Cabang Bank</th>
                    <th style="width: 7%;">Bank Akun</th>
                    <th style="width: 5%;">No PKP</th>
                    <th style="width: 7%;">Nama PKP</th>
                    <th style="width: 10%;">Alamat PKP</th>
                    <th style="width: 10%;">Nama CP</th>
                    <th style="width: 7%;">No.HP CP</th>
                    <th style="width: 8%;">Email CP</th>
                    <th style="width: 5%;">IG CP</th>
                    <th style="width: 5%;">FB CP</th>
                    <th style="width: 5%;">Jenis</th>
                    <th style="width: 8%;">Term</th>
                    <th style="width: 8%;">Limit</th>
                    <th style="width: 10%;">Alamat Kirim</th>
                    <th style="width: 10%;">Keterangan</th>
				</tr>
			</thead>
			<tbody>
	
				<?php $no = 1; ?>
				<?php foreach( $mentt as $row ) : ?>
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
					<td class="text-center"><?php $st = $row['stsup']; if($st == '1'){?>
						<div onClick="aktifsup('<?= $row['no'];?>')" title="aktif" style="box-sizing:border-box; background-color:green;cursor: pointer;"> ya
						</div><?php }else{ ?>
						<div onClick="nonaktifsup('<?= $row['no'];?>')" title="Delete" style="box-sizing:border-box; background-color:red;cursor: pointer;"> tidak						</div> <?php } ?>
					</td>
					<td class="text-center"><?php $st = $row['stcust']; if($st == '1'){?>
						<div onClick="aktifcust('<?= $row['no'];?>')" title="aktif" style="box-sizing:border-box; background-color:green;cursor: pointer;"> ya
						</div><?php }else{ ?>
						<div onClick="nonaktifcust('<?= $row['no'];?>')" title="Delete" style="box-sizing:border-box; background-color:red;cursor: pointer;"> tidak						</div> <?php } ?>
					</td>
					<td><?= $row['pnama'] ?></td>
					<td><?= $row['cnama'] ?></td>
					<td><?= $row['kode'] ?></td>
                    <td><?= $row['kodegl'] ?></td>
					<td><?= $row['nama'] ?></td>
                    <td><?= $row['alm'] ?></td>
                    <td><?= $row['telp'] ?></td>
                    <td><?= $row['fax'] ?></td>
                    <td><?= $row['hp'] ?></td>
                    <td><?= $row['email'] ?></td>
                    <td><?= $row['ig'] ?></td>
                    <td><?= $row['fb'] ?></td>
                    <td><?= $row['bnknm'] ?></td>
                    <td><?= $row['bnkcab'] ?></td>
                    <td><?= $row['bnkac'] ?></td>
                    <td><?= $row['pkpno'] ?></td>
                    <td><?= $row['pkpnm'] ?></td>
                    <td><?= $row['pkpalm'] ?></td>
                    <td><?= $row['cpnm'] ?></td>
                    <td><?= $row['cphp'] ?></td>
                    <td><?= $row['cpemail'] ?></td>
                    <td><?= $row['cpig'] ?></td>
                    <td><?= $row['cpfb'] ?></td>
                    <td><?= $row['jenis'] ?></td>
                    <td><?= $row['term'] ?></td>
                    <td><?= $row['limit'] ?></td>
                    <td><?= $row['almkrm'] ?></td>
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
	function add(){
		$('#tester').html('Loading...');
		$.post('<?php echo $config->base_url();?>addmentt.html',function(data){
			$('#tester').html(data);
		});
	}
	function update(param){
		$('#tester').html('Loading...');
		$.post('<?php echo $config->base_url();?>selectmentt/'+param+'.html',function(data){
			$('#tester').html(data);
		});
	}
	function aktif(param){
		$('#tester').html('Loading...');
		$.post('<?php echo $config->base_url();?>aktifmentt/'+param+'.html',function(data){
			$.post('<?php echo $config->base_url();?>mentt.html',function(data){
				$('#tester').html(data);
			});
		});
	}
	function nonaktif(param){
		$('#tester').html('Loading...');
		$.post('<?php echo $config->base_url();?>nonaktifmentt/'+param+'.html',function(data){
			$.post('<?php echo $config->base_url();?>mentt.html',function(data){
				$('#tester').html(data);
			});
		});
	}
	function aktifsup(param){
		$('#tester').html('Loading...');
		$.post('<?php echo $config->base_url();?>aktifsupmentt/'+param+'.html',function(data){
			$.post('<?php echo $config->base_url();?>mentt.html',function(data){
				$('#tester').html(data);
			});
		});
	}
	function nonaktifsup(param){
		$('#tester').html('Loading...');
		$.post('<?php echo $config->base_url();?>nonaktifsupmentt/'+param+'.html',function(data){
			$.post('<?php echo $config->base_url();?>mentt.html',function(data){
				$('#tester').html(data);
			});
		});
	}
	function aktifcust(param){
		$('#tester').html('Loading...');
		$.post('<?php echo $config->base_url();?>aktifcustmentt/'+param+'.html',function(data){
			$.post('<?php echo $config->base_url();?>mentt.html',function(data){
				$('#tester').html(data);
			});
		});
	}
	function nonaktifcust(param){
		$('#tester').html('Loading...');
		$.post('<?php echo $config->base_url();?>nonaktifcustmentt/'+param+'.html',function(data){
			$.post('<?php echo $config->base_url();?>mentt.html',function(data){
				$('#tester').html(data);
			});
		});
	}
	function hapus(param){
		if(confirm('Apakah Anda Yakin ?')){
			$('#tester').html('Loading...');
			$.post('<?php echo $config->base_url();?>hapusmentt/'+param+'.html',function(data){
				$.post('<?php echo $config->base_url();?>mentt.html',function(data){
					$('#tester').html(data);
				});
			});
		}
	}
</script>
