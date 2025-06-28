<?php
$conn = mysqli_connect("localhost", "root", "", "kepegawaian_fakultas_teknik");

if (mysqli_connect_errno()) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

mysqli_set_charset($conn, "utf8");
?>