<div class="header_table_erp">
	<div class="header_top_table_erp">
		<input list="dlist" name="cari" id="myInput" class = "form-search" placeholder="Pencarian ....."  style="margin-bottom:16px;" />	
	</div>
	<div  onClick="add('7')" class="header_bottom_table_erp">
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
					<th style="width: 4%;">St Aktif</th>
					<th style="width: 4%;">St Trade</th>
                    <th style="width: 4%;">St Aset</th>
                    <th style="width: 4%;">St ATK</th>
					<th style="width: 8%;">Perusahaan</th>
                    <th style="width: 8%;">Cabang</th>
                    <th style="width: 4%;">Kode</th>
                    <th style="width: 4%;">Kode GL</th>
                    <th style="width: 8%;">Nama</th>
                    <th style="width: 8%;">Merk</th>
                    <th style="width: 5%;">Satuan</th>
                    <th style="width: 5%;">Warna</th>
                    <th style="width: 8%;">Kategori 1</th>
                    <th style="width: 8%;">Kategori 2</th>
                    <th style="width: 8%;">Kategori 3</th>
                    <th style="width: 5%;">Stok Min</th>
                    <th style="width: 5%;">Bobot</th>
                    <th style="width: 5%;">Harga Min</th>
                    <th style="width: 6%;">HPP</th>
                    <th style="width: 8%;">Harga</th>
                    <th style="width: 7%;">Tag</th>
                    <th style="width: 8%;">Gambar</th>
                    <th style="width: 8%;">Keterangan</th>
				</tr>
			</thead>
			<tbody>
	
				<?php $no = 1; ?>
				<?php foreach( $mbrg as $row ) : ?>
				<tr>
					<td><?= $no ?></td>
					<td>
						<img src="<?php echo $config->base_url();?>icon/edit.png" onClick="update('<?php echo $row['no'];?>')" style="cursor:pointer;width:15px;height:15px;border-radius:0px;" />
					
						<img src="<?php echo $config->base_url();?>icon/trash.png" onClick="hapus('<?php echo $row['no'];?>')" style="cursor:pointer;width:15px;height:15px;border-radius:0px;" />
					</td>
					<td class="text-center"><?php $st = $row['staktif']; if($st == '1'){?>
						<div onClick="aktif('<?= $row['no'];?>')" title="aktif" style="box-sizing:border-box; background-color:green;cursor: pointer;">Aktif
						</div><?php }else{ ?>
						<div onClick="nonaktif('<?= $row['no'];?>')" title="Delete" style="box-sizing:border-box; background-color:red;cursor: pointer;">Nonaktif						</div> <?php } ?>
					</td>
					<td class="text-center"><?php $st = $row['sttrade']; if($st == '1'){?>
						<div onClick="aktiftrd('<?= $row['no'];?>')" title="aktif" style="box-sizing:border-box; background-color:green;cursor: pointer;">Ya
						</div><?php }else{ ?>
						<div onClick="nonaktiftrd('<?= $row['no'];?>')" title="Delete" style="box-sizing:border-box; background-color:red;cursor: pointer;">Tidak
						</div> <?php } ?>
					</td>
                    <td class="text-center"><?php $st = $row['staset']; if($st == '1'){?>
						<div onClick="aktifast('<?= $row['no'];?>')" title="aktif" style="box-sizing:border-box; background-color:green;cursor: pointer;">Ya
						</div><?php }else{ ?>
						<div onClick="nonaktifast('<?= $row['no'];?>')" title="Delete" style="box-sizing:border-box; background-color:red;cursor: pointer;">Tidak
						</div> <?php } ?>
					</td>
                    <td class="text-center"><?php $st = $row['statk']; if($st == '1'){?>
						<div onClick="aktifatk('<?= $row['no'];?>')" title="aktif" style="box-sizing:border-box; background-color:green;cursor: pointer;">Ya
						</div><?php }else{ ?>
						<div onClick="nonaktifatk('<?= $row['no'];?>')" title="Delete" style="box-sizing:border-box; background-color:red;cursor: pointer;">Tidak
						</div> <?php } ?>
					</td>
                    <td><?= $row['pnama'] ?></td>
                    <td><?= $row['cnama'] ?></td>
                    <td><?= $row['kode'] ?></td>
                    <td><?= $row['kodegl'] ?></td>
					<td><?= $row['nama'] ?></td>
                    <td><?= $row['mrknama'] ?></td>
                    <td><?= $row['satnama'] ?></td>
                    <td><?= $row['wrnnama'] ?></td>
                    <td><?= $row['k1nama'] ?></td>
                    <td><?= $row['k2nama'] ?></td>
                    <td><?= $row['k3nama'] ?></td>
                    <td><?= $row['stokmin'] ?></td>
                    <td><?= $row['bobot'] ?></td>
                    <td><?= $row['hrgmin'] ?></td>
                    <td><?= $row['hpp'] ?></td>
                    <td><?= $row['hrg'] ?></td>
                    <td><?= $row['tag'] ?></td>
                    <td><img src="image/<?= $row['gmbr'] ?>" style="height: 75px; width: 75px;"></td>
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
	function update(param){
		 $('#tester').html('Loading...');
		 $.post('<?php echo $config->base_url();?>selectmbrg/'+param+'.html',function(data){
		 	$('#tester').html(data);
		 });
	}
	function aktif(param){
		$('#tester').html('Loading...');
		$.post('<?php echo $config->base_url();?>aktifmbrg/'+param+'.html',function(data){
			$.post('<?php echo $config->base_url();?>mbrg/7.html',function(data){
				$('#tester').html(data);
			});
		});
	}
	function nonaktif(param){
		$('#tester').html('Loading...');
		$.post('<?php echo $config->base_url();?>nonaktifmbrg/'+param+'.html',function(data){
			$.post('<?php echo $config->base_url();?>mbrg/7.html',function(data){
				$('#tester').html(data);
			});
		});
	}
	function aktiftrd(param){
		$('#tester').html('Loading...');
		$.post('<?php echo $config->base_url();?>aktiftrdmbrg/'+param+'.html',function(data){
			$.post('<?php echo $config->base_url();?>mbrg/7.html',function(data){
				$('#tester').html(data);
			});
		});
	}
	function nonaktiftrd(param){
		$('#tester').html('Loading...');
		$.post('<?php echo $config->base_url();?>nonaktiftrdmbrg/'+param+'.html',function(data){
			$.post('<?php echo $config->base_url();?>mbrg/7.html',function(data){
				$('#tester').html(data);
			});
		});
	}
	function aktifast(param){
		$('#tester').html('Loading...');
		$.post('<?php echo $config->base_url();?>aktifastmbrg/'+param+'.html',function(data){
			$.post('<?php echo $config->base_url();?>mbrg/7.html',function(data){
				$('#tester').html(data);
			});
		});
	}
	function nonaktifast(param){
		$('#tester').html('Loading...');
		$.post('<?php echo $config->base_url();?>nonaktifastmbrg/'+param+'.html',function(data){
			$.post('<?php echo $config->base_url();?>mbrg/7.html',function(data){
				$('#tester').html(data);
			});
		});
	}
	function aktifatk(param){
		$('#tester').html('Loading...');
		$.post('<?php echo $config->base_url();?>aktifatkmbrg/'+param+'.html',function(data){
			$.post('<?php echo $config->base_url();?>mbrg/7.html',function(data){
				$('#tester').html(data);
			});
		});
	}
	function nonaktifatk(param){
		$('#tester').html('Loading...');
		$.post('<?php echo $config->base_url();?>nonaktifatkmbrg/'+param+'.html',function(data){
			$.post('<?php echo $config->base_url();?>mbrg/7.html',function(data){
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
		$.post('<?php echo $config->base_url();?>hapusmbrg/'+param+'.html',function(data){
			$.post('<?php echo $config->base_url();?>mbrg/7.html',function(data){
				$('#tester').html(data);
			});
		});
	}
	function add(param){
		$('#tester').html('Loading...');
		$.post('<?php echo $config->base_url();?>addbrg/'+ param +'.html',function(data){
			$('#tester').html(data);
		});
	}
    </script>