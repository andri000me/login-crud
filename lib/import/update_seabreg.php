<?
require "fungsi.inc.php";
connectdb();
//additional
$x=1;
$select=mysql_query("select * from prodsub1 order by id asc") or die(mysql_error());
while ($rec_update=mysql_fetch_array($select)) {
//	echo $rec_update['sid2']."<br>";
	$pecah=explode(" ", $rec_update['nama']);
	$pecah2=explode(".", $rec_update['acak']);
//	echo $pecah[0];
	$susun=$pecah[0]."-".$pecah[1]."-".$pecah[2]."-".$pecah[3]."-".$pecah[4]."-".$pecah[5];
	$susun2=$pecah2[0]."_".$pecah2[1]."_".$pecah2[2];
//	$update=mysql_query("update prod set acak='1_1_$rec_update[id]' where id='$rec_update[id]'") or die(mysql_error());
	$update2=mysql_query("update prodsub1 set seo='$susun' where nama='$rec_update[nama]' && (id between 1800 and 2200)") or die(mysql_error());
//	$update2=mysql_query("update prod set acak='$susun2' where acak='$rec_update[acak]'") or die(mysql_error());
	$x++;
}?>
