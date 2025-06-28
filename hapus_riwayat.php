<?php
include 'koneksi.php';
$id = intval($_GET['id']);
mysqli_query($koneksi, "DELETE FROM riwayat_jabatan WHERE id_riwayat=$id");
header("Location: tampil_riwayat.php");
?>