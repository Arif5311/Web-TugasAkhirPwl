<?php
include 'koneksi.php';

$id = intval($_GET['id']);
$data = mysqli_query($koneksi, "SELECT * FROM riwayat_jabatan WHERE id_riwayat = $id");
$row = mysqli_fetch_assoc($data);

if (!$row) {
    echo "<script>alert('Data tidak ditemukan!'); window.location.href='tampil_riwayat.php';</script>";
    exit;
}
?>

<h3>Edit Riwayat Jabatan</h3>
<form method="post">
    Pegawai:
    <select name="id_pegawai">
        <?php
        $data_pegawai = mysqli_query($koneksi, "SELECT * FROM pegawai");
        while ($p = mysqli_fetch_assoc($data_pegawai)) {
            $sel = ($p['id_pegawai'] == $row['id_pegawai']) ? 'selected' : '';
            echo "<option value='{$p['id_pegawai']}' $sel>" . htmlspecialchars($p['nama']) . "</option>";
        }
        ?>
    </select><br>
    Jabatan Sebelumnya: <input type="text" name="sebelum" value="<?= htmlspecialchars($row['jabatan_sebelumnya']) ?>"><br>
    Jabatan Sekarang: <input type="text" name="sekarang" value="<?= htmlspecialchars($row['jabatan_sekarang']) ?>"><br>
    Tanggal Promosi: <input type="date" name="tanggal" value="<?= $row['tanggal_promosi'] ?>"><br>
    <input type="submit" name="submit" value="Update">
</form>

<?php
if (isset($_POST['submit'])) {
    $id_pegawai = intval($_POST['id_pegawai']);
    $sebelum = mysqli_real_escape_string($koneksi, $_POST['sebelum']);
    $sekarang = mysqli_real_escape_string($koneksi, $_POST['sekarang']);
    $tanggal = mysqli_real_escape_string($koneksi, $_POST['tanggal']);

    $update = "UPDATE riwayat_jabatan SET id_pegawai=$id_pegawai, jabatan_sebelumnya='$sebelum',
               jabatan_sekarang='$sekarang', tanggal_promosi='$tanggal' WHERE id_riwayat=$id";

    if (mysqli_query($koneksi, $update)) {
        echo "Berhasil diupdate. <a href='tampil_riwayat.php'>Kembali</a>";
    } else {
        echo "Gagal: " . mysqli_error($koneksi);
    }
}
?>