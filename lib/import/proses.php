<?php
// menggunakan class phpExcelReader
include "excel_reader2.php";

// koneksi ke mysql
//mysql_connect("localhost", "root", "root");
//mysql_select_db("m4inan4nak");
include "../../fungsi.inc.php";
connectdb();

//hapus yang lama terlebih dahulu
//$del=mysql_query("truncate prod")or die("error kosongkan");

// membaca file excel yang diupload
$data = new Spreadsheet_Excel_Reader($_FILES['file']['tmp_name']);

// membaca jumlah baris dari data excel
$baris = $data->rowcount($sheet_index=0);

// nilai awal counter untuk jumlah data yang sukses dan yang gagal diimport
$sukses = 0;
$gagal = 0;

$tanda=array("'","/");
$ganti=array(" "," ");

// import data excel mulai baris ke-2 (karena baris pertama adalah nama kolom)
for ($i=2; $i<=$baris; $i++)
{
  // membaca data kolom (kolom ke-sekian)
//  $kode = $data->val($i, 1);
  $nama = $data->val($i, 1);
  $manufacturer_id = trim($data->val($i, 2));
  $principal_id = trim($data->val($i, 3));
  $kid = trim($data->val($i, 4));
  $indikasi_id= trim($data->val($i, 5));
  $ktrg= $data->val($i, 6);
  $fungsi_id= trim($data->val($i, 7));

$que1=mysql_fetch_array(mysql_query("select * from manufacturer where nama like '%$manufacturer_id%'"));
$que2=mysql_fetch_array(mysql_query("select * from principal where nama like '%$principal_id%'"));
$que3=mysql_fetch_array(mysql_query("select * from prodkat where nama like '%$kid%'"));
$que4=mysql_fetch_array(mysql_query("select * from indikasi where nama like '%$indikasi_id%'"));
$que5=mysql_fetch_array(mysql_query("select * from fungsi where nama like '%$fungsi_id%'"));

//echo $que1[$i]['id']."<br>";
//exit();

  $namakoreksi=str_replace($tanda,$ganti,$nama);
$acak1=rand(000000,999999); $acak2=rand(000000,999999); $acak3=rand(000000,999999); $acak=$acak1."_".$acak2."_".$acak3;
$char1=array("~", "`", "!", "@", "#", "$", "%", "^", "&", "*", "(", ")", "_", "-", "+", "=", "|", "\\", "{", "}", "[", "]", ":", ";", "\"", "'", "<", ">", ",", ".", "?", "/", "&reg;", "&copy;", "&trade;");
$char2=array("");
$seo1=str_replace($char1, $char2, htmlentities($namakoreksi));
$seo=str_replace(" ", "-", string_limit_words($seo1, 10));
  // setelah data dibaca, sisipkan ke dalam tabel mhs
  $query = "INSERT INTO prod (nama, manufacturer_id, principal_id, kid, indikasi_id, ktrg, fungsi_id, pub, acak, seo) VALUES ('$namakoreksi', '$que1[id]', '$que2[id]', '$que3[kid]', '$que4[id]', '$ktrg', '$que5[id]', '1', '$acak', '$seo')";
  $hasil = mysql_query($query);
  
  //$hasil=mysql_query("INSERT INTO shadow_pro2 VALUES ('','$kode','$nama','$saldo')")or die("error masuk");

  // jika proses insert data sukses, maka counter $sukses bertambah
  // jika gagal, maka counter $gagal yang bertambah
  if ($hasil) {$sukses++;} else{ $gagal++;$idnya=$kode."<br>";$nyaid=$idnya.$nyaid;}
}

// tampilan status sukses dan gagal
/*echo "<h3>Proses import data selesai.</h3>";
echo "<p>Jumlah data yang sukses diimport : ".$sukses."<br>";
echo "Jumlah data yang gagal diimport : ".$gagal."</p>";*/
//echo"$nyaid";
/*header("Location:".abspathadm."fw.php?mod=prod&pesan=Proses import data selesai&sukses=Jumlah data yang sukses diimport : $sukses&gagal=Jumlah data yang gagal diimport : $gagal");
exit;*/
	echo "<script>window.location='".abspathadm."fw.php?module="."prod"."&file="."prod"."v&pg="."1"."&import=1&msg=Proses import data selesai, Jumlah data yang berhasil diimport : $sukses, Jumlah data yang gagal diimport : $gagal';</script>";

?>