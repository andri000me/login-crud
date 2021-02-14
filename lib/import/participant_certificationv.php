<?
/*require "../fungsi.inc.php"; require "../session.php"; //require "../head.php";
$module="member";*/
?>
<div id="admin_isi">
	<div id="admin_isi2">
		<div class="row">
	    <div class="form-group col-md-3">
		  	<?php if (!$_GET['import']==1) {?>
					<form action="<?=$absadm;?>/lib/import/import-<?=$module;?>.php" method="post" enctype="multipart/form-data">
					  <label>upload file excel (.xls)
					  	<span class="warning">*</span>
					  </label> 
					  <input type="file" class="input form-control" size="" name="file" required="required">
					  <input type="submit" value="Import" class="btn btn-primary btn-xs" />
					</form>
				<? }?>    			
	    </div>
		</div>
		<?php  
		if (isset($_GET['sval']) && $_GET['sval']!="") {
			if ($_GET['sort']) {
				if ($_GET['sort']=="" || $_GET['sort']=="desc") 
					$que=mysql_query("SELECT * FROM $module where nama like '%$_GET[sval]%' || email like '%$_GET[sval]%' order by $_GET[field] desc") or die("s1");
				else if ($_GET['sort']=="asc") 
					$que=mysql_query("SELECT * FROM $module where nama like '%$_GET[sval]%' || email like '%$_GET[sval]%' order by $_GET[field] asc") or die("s2");
			}
			else
				$que = mysql_query("SELECT * FROM $module WHERE nama like '%$_GET[sval]%' || email like '%$_GET[sval]%' ORDER BY nama") or die("s3");
		}

		else if ($_GET['sort']) {
			if ($_GET['sort']=="" || $_GET['sort']=="desc") 
				$que=mysql_query("SELECT * FROM $module order by $_GET[field] desc") or die("s4");
			else if ($_GET['sort']=="asc") 
				$que=mysql_query("SELECT * FROM $module order by $_GET[field] asc") or die ("s5");
		}

		else if ($_GET['aktiv']<>"")
			$que=mysql_query("SELECT * FROM $module where aktiv='$_GET[aktiv]' ORDER BY id desc") or die(mysql_error());
		else if ($_GET['id']<>"")
			$que=mysql_query("SELECT * FROM $module where id='$_GET[id]' ORDER BY id desc") or die ("s7");
		else
			$que=mysql_query("SELECT * FROM $module ORDER BY id desc") or die ("s8");

		$row = mysql_num_rows($que);	
			
		if (!isset($_GET['pg'])) $pg=1;
		if (isset($_GET['pg'])) $pg=$_GET['pg'];

    $per=10; // 5 record/page
		$jml_hal = intval($row / $per);
		if(($row % $per) > 0)
			$jml_hal = $jml_hal + 1;
		if ($jml_hal == 0)
			$jml_hal = $jml_hal + 1;
		if ($jml_hal > 1000)
		    $jml_hal = 1000;	

		$h_m = intval($pg / 10) * 10;// halaman mulai
		if($h_m == 0)
			$h_m = 1;

		$h_a = $h_m + 9;
		?>

		<form name="myform" method="post" action="<?=$absadm;?>/do_del_all.php?module=<?=$module;?>&amp;act=del">
			<? if ($_GET['view']<>"") {?>
				<div title="complex-view" style="overflow-x:scroll; width:">
					<table class="table table-striped table-bordered table-hover" id="dataTables-example">
						<thead>
							<tr>
								<th>#</th>
								<?php
								$sql="SELECT * FROM $module ORDER BY id";
								if ($result=mysqli_query($con,$sql)) {
								  // Get field information for all fields
								  while ($fieldinfo=mysqli_fetch_field($result)) {
								?>
								<th><?=$fieldinfo->name;?></th>
								<? }
								  // Free result set
								  mysqli_free_result($result);
								}
								//mysqli_close($con);
								?> 
							</tr>
						</thead>
						<tbody>
							<?php
							if ($_GET['spc_price']<>"")
								$que=mysqli_query($con, "SELECT * FROM $module where spc_price='$_GET[spc_price]' ORDER BY id desc") or die ("s6");
							else if ($_GET['pub']<>"")
								$que=mysqli_query($con, "SELECT * FROM $module where pub='$_GET[pub]' ORDER BY id desc") or die ("s6");
							else if ($_GET['sid3']<>"")
								$que=mysqli_query($con, "SELECT * FROM $module where sid3='$_GET[sid3]' ORDER BY id desc") or die ("s7");
							else if ($_GET['sid2']<>"")
								$que=mysqli_query($con, "SELECT * FROM $module where sid2='$_GET[sid2]' ORDER BY id desc") or die ("s7");
							else if ($_GET['sid']<>"")
								$que=mysqli_query($con, "SELECT * FROM $module where sid='$_GET[sid]' ORDER BY id desc") or die ("s7");
							else if ($_GET['kid']<>"")
								$que=mysqli_query($con, "SELECT * FROM $module where kid='$_GET[kid]' ORDER BY id desc") or die ("s7");
							else
								$que=mysqli_query($con, "SELECT * FROM $module ORDER BY id desc");
							//if ($que=mysqli_query($con,"SELECT * FROM prod ORDER BY id desc")) {
						  while ($obj=mysqli_fetch_object($que)) {
								//    printf("%s (%s)\n",$obj->id,$obj->nama);
										?>
								<?php
								/*if ($row>0) {	
									if ($row >= ($pg-1)*$per) mysqli_data_seek($que, ($pg-1)*$per);	
									if (!isset($pg) || $pg==1) { $num=0; } else { $num=($pg*10)-10; } 
									
									$i=0;
								//	while(($rec = mysql_fetch_array($que)) && ($i < $per)){			
									while ($obj=mysqli_fetch_object($que) &&  $i<$per) {			
									// jika admin & sekarang lagi menunjuk record pemilik (tertinggi) maka continue ke rec berikutnya
									if ($i%2==0) $warna=$wgnp; else $warna=$wgjl;*/

								//if ($i==0) {?>
								<tr class="odd gradeX sbadmin-table -blockrow">
									<td><?=$num+1;?></td>
									<td><?=$obj->id;?></td>
									<td><?=$obj->user;?></td>
									<td><?=$obj->kunci;?></td>
									<td><?=$obj->gender;?></td>
									<td><?=$obj->tmp_lahir;?></td>
									<td><?=$obj->tgl_lahir;?></td>
									<td><?=$obj->telp;?></td>
									<td><?=$obj->email;?></td>
									<td><?=$obj->pass_real;?></td>
									<td><?=$obj->aktiv;?></td>
									<td><?=$obj->status;?></td>
									<td>
										<a class="" target="" href="<?=$absadm;?>/fw.php?module=<?=$module;?>&file=<?=$module;?>&task=edt&id=<?=$obj->id;?>&pg=<?=$pg;?>"><?=$obj->nama;?></a>
										<div class="-action">
											<a href="<?=$absadm;?>/fw.php?module=<?=$module;?>&file=<?=$module;?>&task=edt&id=<?=$obj->id;?>&pg=<?=$pg;?>"><i class="fa fa-edit fa-fw"></i> edit</a>
											<a href="#" onClick="#" class="delbut" id="<?=$obj->kid;?>" title="click to delete"><i class="fa fa-trash-o fa-fw"></i> delete</a>
										</div>
									</td>
									<td><?=stripslashes(html_entity_decode($obj->alamat));?></td>
									<td><?=stripslashes(html_entity_decode($obj->alamat_id));?></td>
									<td><?=stripslashes(html_entity_decode($obj->kodepos));?></td>
									<td><?=stripslashes(html_entity_decode($obj->live_in));?></td>
									<td><?=stripslashes(html_entity_decode($obj->pid));?></td>
									<td><?=stripslashes(html_entity_decode($obj->koid));?></td>
									<td><?=stripslashes(html_entity_decode($obj->district_id));?></td>
									<td><?=stripslashes(html_entity_decode($obj->country));?></td>
									<td><?=stripslashes(html_entity_decode($obj->region));?></td>
									<td><?=stripslashes(html_entity_decode($obj->point));?></td>
									<td><?=stripslashes(html_entity_decode($obj->model));?></td>
									<td><?=stripslashes(html_entity_decode($obj->bil_disk));?></td>
									<td><?=stripslashes(html_entity_decode($obj->noacak));?></td>
									<td><?=stripslashes(html_entity_decode($obj->sejak));?></td>
									<td><?=stripslashes(html_entity_decode($obj->jagen));?></td>
									<td><?=stripslashes(html_entity_decode($obj->kd));?></td>
									<td><?=stripslashes(html_entity_decode($obj->nopel));?></td>
									<td><?=stripslashes(html_entity_decode($obj->captcha));?></td>
									<td><?=stripslashes(html_entity_decode($obj->acak));?></td>
								</tr>
							<? $x++; $num++;}
						  // Free result set
						  mysqli_free_result($que);
							//}
							mysqli_close($con);
							?> 
						</tbody>
					</table>
				</div>
			<? } else {?>
				<div class="table-responsive" title="normal-view">
					<div class="pagi-nation"><?=$row;?> record(s) found
						<?
						$url=$_SERVER['PHP_SELF']."?module=".$module."&file=".$module."field=".$_GET['field']."&sort=".$_GET['sort']."&sval=".$_GET['sval']."&status=".$_GET['status']."&kid=".$_GET['kid']."&sid=".$_GET['sid']."&sid2=".$_GET['sid2'];
						if ($pg==1) echo "<a class='text-page' href='#'>|< first</a>";
						else echo "<a class='text-page' href='".$url."&pg=1'>|< first</a>";

						if ($pg>1) echo "<a class='text-page' href='".$url."&pg=".($pg-1)."'><< prev</a>";
						else echo "<a class='text-page' href='#'><< prev</a>";

						for ($i=$h_m; $i<=$h_a && $i<=$jml_hal; $i++) {
							if ($i==$pg) echo "<a class='text-page-aktif'>".$i."</a>";
							else echo "<a class='text-page' href='".$url."&pg=".$i."'>".$i."</a>";			
						}
									
						if ($pg<$jml_hal) echo "<a class='text-page' href='".$url."&pg=".($pg+1)."'>next >></a>";
						else echo "<a class='text-page' href='#'>next >></a>";

						if ($pg==$jml_hal) echo "<a class='text-page' href='#'>last >|</a>";
						else echo "<a class='text-page' href='".$url."&pg=".$jml_hal."'>last >|</a>";
						?>
						Page <?=$pg;?> of <?=$jml_hal;?>
					</div>
					<table class="table table-striped table-bordered table-hover" width="100%" border="1" align="center" cellpadding="0" cellspacing="0" id="table">
						<?php
						if ($row>0) {	
							if ($row >= ($pg-1)*$per) mysql_data_seek($que, ($pg-1)*$per);	
							if (!isset($pg) || $pg==1) { $num=0; } else { $num=($pg*10)-10; } 
							
							$i=0;
							while(($rec = mysql_fetch_array($que)) && ($i < $per)){			
								// jika admin & sekarang lagi menunjuk record pemilik (tertinggti) maka continue ke rec berikutnya
								if ($i%2==0) $warna=$wgnp; else $warna=$wgjl;

								if ($i==0) {?>
									<tr>
										<th width="1%" align="center"><input type="checkbox" class="input" name="pilih" onClick="pilihan()" /></th>
										<th width="1%" align="center">#</th>
										<th width="6%"><?=field("$module", "id", "id");?></th>
										<th align="center" class="col_pub"><?=field("$module", "pub", "Publish");?></th>
										<th class="col_nama"><?=field("$module", "nama", "Nama");?></th>
										<th align="center"><?=field("$module", "reg_number", "registration number");?></th>
										<th align="center"><?=field("$module", "certify_number", "certification number");?></th>
										<th align="center"><?=field("$module", "date_issued", "date issued");?></th>
										<th align="center">Image Certification</th>
									</tr>
								<?php }?>

								<tr bgcolor="<?=$warna;?>" class="blockrow">
									<td align="center"><input type="checkbox" class="input" name="id<?=$i;?>" value="<?=$rec['id'];?>" /></td>
									<td align="center"><?=$num+1;?> </td>
									<td align="center"><?=$rec['id'];?></td>
									<td align="center" class="animated"><?=pub($module, id, $rec['id']);?></td>
									<td align="center" valign="top">
										<?=stripslashes(html_entity_decode($rec['nama']));?><?//=$rec['nama_eng'];?>
										<!-- <div class="action">
											<a href="<?=$absadm;?>/fw.php?module=<?=$module;?>&file=<?=$module;?>&task=edt&id=<?=$rec['id'];?>&pg=<?=$pg;?>" title="click to edit">
												<img src="<?=$abs;?>/images/edit.png" alt="edit" align="absmiddle" border="0" />&nbsp;edit
											</a> 
											<a href="#" onClick="#" class="delbut" id="<?=$rec['id'];?>" title="click to delete">
												<img src="<?=$abs;?>/images/delete.png" alt="delete" border="0" align="absmiddle">&nbsp;delete
											</a>
										</div> -->
									</td>
									<td align="center" class="animated">
										<!-- <a class="email mordet" href="mailto:<?=$rec['email'];?>"><i class="fa fa-envelope-o fa-fw"></i> <?=$rec['email'];?></a> -->
										<?=$rec['reg_number'];?>
									</td>
									<td align="center" class="animated"><?=$rec['certify_number'];?></td>
									<td align="center" class="animated">
										<?php
										$product=mysql_fetch_array(mysql_query("select * from product_category where kid='$rec[certify_product]'"));
										// echo $product['nama'];
										?>
										<?=tgl($rec['date_issued']);?>
									</td>
									<td align="center">
										<?php 
										if ($fp=@fopen($abs."/images/$module/$rec[acak]"."_1.jpg", "r"))
											echo "<img src='".$abs."/timthumb.php?src=images/$module/$rec[acak]"."_1.jpg' title='$rec[acak]' border='0' height='90'>";
										else echo $rec['acak']; ?>
									</td>
								</tr>
							<?php $i++; $num++;}
						} else { 
							echo "<center>-- no record found --</center>";
						}?>
					</table>
					<div class="pagi-nation"><?=$row;?> record(s) found
						<?
						$url=$_SERVER['PHP_SELF']."?module=".$module."&file=".$module."field=".$_GET['field']."&sort=".$_GET['sort']."&sval=".$_GET['sval']."&status=".$_GET['status']."&kid=".$_GET['kid']."&sid=".$_GET['sid']."&sid2=".$_GET['sid2'];
						if ($pg==1) echo "<a class='text-page' href='#'>|< first</a>";
						else echo "<a class='text-page' href='".$url."&pg=1'>|< first</a>";

						if ($pg>1) echo "<a class='text-page' href='".$url."&pg=".($pg-1)."'><< prev</a>";
						else echo "<a class='text-page' href='#'><< prev</a>";

						for ($i=$h_m; $i<=$h_a && $i<=$jml_hal; $i++) {
							if ($i==$pg) echo "<a class='text-page-aktif'>".$i."</a>";
							else echo "<a class='text-page' href='".$url."&pg=".$i."'>".$i."</a>";			
						}
									
						if ($pg<$jml_hal) echo "<a class='text-page' href='".$url."&pg=".($pg+1)."'>next >></a>";
						else echo "<a class='text-page' href='#'>next >></a>";

						if ($pg==$jml_hal) echo "<a class='text-page' href='#'>last >|</a>";
						else echo "<a class='text-page' href='".$url."&pg=".$jml_hal."'>last >|</a>";
						?>
						Page <?=$pg;?> of <?=$jml_hal;?>
					</div>
					<p class="text-right">
						<input class="form-control" type="hidden" name="module" value="<?=$module;?>" />
						<input class="form-control" type="hidden" name="n" value="<?=$num;?>" />
						<button type="submit" class="btn btn-danger btn-xs" name="submit1" onClick="return delconf()">Delete</button>
						<button type="reset" class="btn btn-default btn-xs" name="submit2">Reset</button>
					</p>
				</div>
			<? }?>
		</form>
	</div>
</div>
<? //require "../bottom-script-js.php";?>