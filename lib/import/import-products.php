<!-- import excel ke mysql -->
<!-- www.malasngoding.com -->

<?php 
// menghubungkan dengan koneksi
// include 'koneksi.php';
// $koneksi = mysqli_query("localhost","k1090803_morilloroom","!@#123QWEasdzxc","k1090803_morilloroom");
// $abs="https://localhost/morilloroom";
// menghubungkan dengan library excel reader
include "../../api/panggil.php";
include "excel_reader2.php";
?>

<?php
// upload file xls
$target = basename($_FILES['file']['name']) ;
move_uploaded_file($_FILES['file']['tmp_name'], $target);

// beri permisi agar file xls dapat di baca
chmod($_FILES['file']['name'],0777);

// mengambil isi file xls
$data = new Spreadsheet_Excel_Reader($_FILES['file']['name'],false);
// menghitung jumlah baris data yang ada
$jumlah_baris = $data->rowcount($sheet_index=0);

// jumlah default data yang berhasil di import
$berhasil = 0;
for ($i=1; $i<=$jumlah_baris; $i++){

  // menangkap data dan memasukkan ke variabel sesuai dengan kolumnya masing-masing
  $nama     = $data->val($i, 1);
  $id_brands   = $data->val($i, 2);
  $harga  = $data->val($i, 3);

  if($nama != ""){
    // input data ke database (table data_pegawai)
    mysqli_query($koneksi,"INSERT into tbl_products (nama, id_brands, harga) values('$nama','$id_brands','$harga')");
    $berhasil++;
  }
}

// hapus kembali file .xls yang di upload tadi
unlink($_FILES['file']['name']);

// alihkan halaman ke index.php
header("location: ".$abs."/backend/pages/index.php?page=products&berhasil=$berhasil");
?>