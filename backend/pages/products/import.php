<?php
use Phppot\DataSource;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

require_once '../../../api/panggil.php';
require_once '../../../lib/DataSource.php';
$db = new DataSource();
$conn = $db->getConnection();
require_once ('../../../vendor/autoload.php');

if (isset($_POST["import"])) {

    $allowedFileType = [
        'application/vnd.ms-excel',
        'text/xls',
        'text/xlsx',
        'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
    ];

    if (in_array($_FILES["file"]["type"], $allowedFileType)) {

        $targetPath = '../../../assets/uploads/files/' . $_FILES['file']['name'];
        move_uploaded_file($_FILES['file']['tmp_name'], $targetPath);

        $Reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();

        $spreadSheet = $Reader->load($targetPath);
        $excelSheet = $spreadSheet->getActiveSheet();
        $spreadSheetAry = $excelSheet->toArray();
        $sheetCount = count($spreadSheetAry);

        for ($i = 0; $i <= $sheetCount; $i ++) {
            // $nama = "";
            // if (isset($spreadSheetAry[$i][0])) {
            //     $nama = mysqli_real_escape_string($conn, $spreadSheetAry[$i][0]);
            // }
            // $id_brands = "";
            // if (isset($spreadSheetAry[$i][1])) {
            //     $id_brands = mysqli_real_escape_string($conn, $spreadSheetAry[$i][1]);
            // }
            // $harga = "";
            // if (isset($spreadSheetAry[$i][2])) {
            //     $harga = mysqli_real_escape_string($conn, $spreadSheetAry[$i][2]);
            // }
            $nama = mysqli_real_escape_string($conn, $spreadSheetAry[$i][0]);
            $id_brands = mysqli_real_escape_string($conn, $spreadSheetAry[$i][1]);
            $harga = mysqli_real_escape_string($conn, $spreadSheetAry[$i][2]);
            $created_at = date('Y-m-d H:i:s');
            $updated_at = date('Y-m-d H:i:s');

            if (! empty($nama)) {
                $query = "insert into tbl_products(nama, id_brands, harga, created_at, updated_at) values(?, ?, ?, ?, ?)";
                $paramType = "sssss";
                $paramArray = array(
                    $nama,
                    $id_brands,
                    $harga,
                    $created_at,
                    $updated_at,
                );
                $insertId = $db->insert($query, $paramType, $paramArray);
                // $query = "insert into tbl_info(name,description) values('" . $name . "','" . $description . "')";
                // $result = mysqli_query($conn, $query);

                if (! empty($insertId)) {
                    $type = "success";
                    $message = "Excel Data Imported into the Database";
                } else {
                    $type = "error";
                    $message = "Problem in Importing Excel Data";
                }
            }
        }
    } else {
        $type = "error";
        $message = "Invalid File Type. Upload Excel File.";
    }
}
header('location: '.$abs.'/backend/pages/index.php?page=products&msg=import-success');
?>
