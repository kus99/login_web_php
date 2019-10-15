<?php
require_once "core/init.php";

if (isset($_GET['id'])) {
  if (hapus_data($_GET['id'])) {
    header('Location: artikel.php');
  }else {
    echo "Gagal Menghapus Artikel!";
  }
}

?>
