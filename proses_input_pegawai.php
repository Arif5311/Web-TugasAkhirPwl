<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil dan sanitasi data input
    $nama = mysqli_real_escape_string($koneksi, trim($_POST['nama']));
    $nip = mysqli_real_escape_string($koneksi, trim($_POST['nip']));
    $jabatan = mysqli_real_escape_string($koneksi, trim($_POST['jabatan']));
    $golongan = mysqli_real_escape_string($koneksi, trim($_POST['golongan']));
    $tanggal_masuk = $_POST['tanggal_masuk'];
    $id_bagian = intval($_POST['id_bagian']);
    
    // Konversi format tanggal dari d-m-Y ke Y-m-d untuk database
    $date_parts = explode('-', $tanggal_masuk);
    if (count($date_parts) == 3) {
        $tgl_masuk = $date_parts[2] . '-' . $date_parts[1] . '-' . $date_parts[0];
    } else {
        $tgl_masuk = date('Y-m-d', strtotime($tanggal_masuk));
    }
    
    // Validasi input
    if (empty($nama) || empty($nip) || empty($jabatan) || empty($golongan) || empty($tgl_masuk) || $id_bagian <= 0) {
        echo "<script>
                alert('Semua field harus diisi dengan benar!');
                window.location.href = 'input_pegawai.php';
              </script>";
        exit;
    }
    
    // Cek apakah NIP sudah ada
    $check_nip = mysqli_query($koneksi, "SELECT nip FROM pegawai WHERE nip = '$nip'");
    if (mysqli_num_rows($check_nip) > 0) {
        echo "<script>
                alert('NIP sudah terdaftar! Gunakan NIP yang berbeda.');
                window.location.href = 'input_pegawai.php';
              </script>";
        exit;
    }
    
    // Insert data ke database
    $sql = "INSERT INTO pegawai (nama, nip, jabatan, golongan, tgl_masuk, id_bagian) 
            VALUES ('$nama', '$nip', '$jabatan', '$golongan', '$tgl_masuk', $id_bagian)";
    
    if (mysqli_query($koneksi, $sql)) {
        echo "<script>
                alert('Data pegawai berhasil disimpan!');
                window.location.href = 'tampil_pegawai.php';
              </script>";
    } else {
        echo "<script>
                alert('Gagal menyimpan data: " . mysqli_error($koneksi) . "');
                window.location.href = 'input_pegawai.php';
              </script>";
    }
} else {
    header("Location: input_pegawai.php");
    exit;
}
?>