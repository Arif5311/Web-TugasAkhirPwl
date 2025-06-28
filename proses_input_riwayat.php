<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil dan sanitasi data input
    $id_pegawai = intval($_POST['id_pegawai']);
    $jabatan_sebelumnya = mysqli_real_escape_string($koneksi, trim($_POST['jabatan_sebelumnya']));
    $jabatan_sekarang = mysqli_real_escape_string($koneksi, trim($_POST['jabatan_sekarang']));
    $tanggal_promosi = $_POST['tanggal_promosi'];
    
    // Konversi format tanggal dari d-m-Y ke Y-m-d untuk database
    $date_parts = explode('-', $tanggal_promosi);
    if (count($date_parts) == 3) {
        $tgl_promosi = $date_parts[2] . '-' . $date_parts[1] . '-' . $date_parts[0];
    } else {
        $tgl_promosi = date('Y-m-d', strtotime($tanggal_promosi));
    }
    
    // Validasi input
    if ($id_pegawai <= 0 || empty($jabatan_sebelumnya) || empty($jabatan_sekarang) || empty($tgl_promosi)) {
        echo "<script>
                alert('Semua field harus diisi dengan benar!');
                window.location.href = 'input_riwayat.php';
              </script>";
        exit;
    }
    
    // Cek apakah pegawai ada
    $check_pegawai = mysqli_query($koneksi, "SELECT id_pegawai FROM pegawai WHERE id_pegawai = $id_pegawai");
    if (mysqli_num_rows($check_pegawai) == 0) {
        echo "<script>
                alert('Pegawai tidak ditemukan!');
                window.location.href = 'input_riwayat.php';
              </script>";
        exit;
    }
    
    // Insert data ke database
    $sql = "INSERT INTO riwayat_jabatan (id_pegawai, jabatan_sebelumnya, jabatan_sekarang, tanggal_promosi) 
            VALUES ($id_pegawai, '$jabatan_sebelumnya', '$jabatan_sekarang', '$tgl_promosi')";
    
    if (mysqli_query($koneksi, $sql)) {
        echo "<script>
                alert('Data riwayat jabatan berhasil disimpan!');
                window.location.href = 'tampil_riwayat.php';
              </script>";
    } else {
        echo "<script>
                alert('Gagal menyimpan data: " . mysqli_error($koneksi) . "');
                window.location.href = 'input_riwayat.php';
              </script>";
    }
} else {
    header("Location: input_riwayat.php");
    exit;
}
?>
