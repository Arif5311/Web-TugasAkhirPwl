<?php
include 'koneksi.php';
$id = intval($_GET['id']);
mysqli_query($koneksi, "DELETE FROM pegawai WHERE id_pegawai=$id");
header("Location: tampil_pegawai.php");
?>