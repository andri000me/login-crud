<?php
include '../inc.php';
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>

<head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8">
  <title>Produk</title>
</head>
<script type="text/javascript">
  function deleteData(id) {
    var cfm = confirm("Apakah anda yakin akan menghapus data ini?");
    if (cfm) {
      window.location.href = 'produk-delete.php?id=' + id;
    }
  }
</script>

<body>
  <?php
  $api_categories_list = $api_url . '/produk/list.php';
  $json_list = @file_get_contents($api_categories_list);
  ?>

  <h1>Produk</h1>

  <?php
  $info = isset($_GET['info']) ? $_GET['info'] : '';
  $msg = isset($_GET['msg']) ? $_GET['msg'] : '';

  if (!empty($info)) {
    echo 'Info: ' . $info;
    echo '<br />Msg: ' . $msg;
    echo '<br />';
  }
  ?>

  <p>
    <!-- <a href="../categories/kategori.php">categories</a> | -->
    <a href="../kategori/kategori.php">kategori</a> |
    <a href="../produk/kategori.php">produk</a>
  </p>
  <p><a href="produk-add.php">Add New</a> | <a href="produk.php">Reload</a></p>

  <table border="1">
    <tr>
      <th>ID</th>
      <th>Nama</th>
      <th>Kategori</th>
      <!-- <th>Keterangan</th> -->
      <!-- <th>Gambar</th> -->
      <th>Action</th>
    </tr>
    <?php
    $array = json_decode($json_list, true);
    $result = isset($array['result']) ? $array['result'] : array();

    $no = 0;
    foreach ($result as $arr) {
      $no++;

      $link_edit = '<a href="produk-edit.php?id=' . $arr['id'] . '">[Edit]</a>';
      $link_delete = '<a href="javascript:void:;" onclick="deleteData(\'' . $arr['id'] . '\')">[Delete]</a>';

    ?>
      <tr>
        <td><?= $no; ?></td>
        <td><?= $arr['nama_pro']; ?></td>
        <td><?= $arr['nama']; ?></td>
        <!-- <td><?= $arr['ket']; ?></td> -->
        <!-- <td><?= $arr['acak1']; ?></td> -->
        <td><?= $link_edit . ' ' . $link_delete; ?></td>
      </tr>
    <?php
    }
    ?>
  </table>
</body>

</html>