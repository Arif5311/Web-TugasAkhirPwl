<?php
include 'koneksi.php';

$id = intval($_GET['id']);
$data = mysqli_query($koneksi, "SELECT * FROM pegawai WHERE id_pegawai = $id");
$row = mysqli_fetch_assoc($data);

if (!$row) {
    echo "<script>alert('Data tidak ditemukan!'); window.location.href='tampil_pegawai.php';</script>";
    exit;
}
?>

<h3>Edit Data Pegawai</h3>
<form method="post">
    Nama: <input type="text" name="nama" value="<?= htmlspecialchars($row['nama']) ?>"><br>
    NIP: <input type="text" name="nip" value="<?= htmlspecialchars($row['nip']) ?>"><br>
    Jabatan: <input type="text" name="jabatan" value="<?= htmlspecialchars($row['jabatan']) ?>"><br>
    Golongan: <input type="text" name="golongan" value="<?= htmlspecialchars($row['golongan']) ?>"><br>
    Tanggal Masuk: <input type="date" name="tgl_masuk" value="<?= $row['tgl_masuk'] ?>"><br>
    Bagian:
    <select name="id_bagian">
        <?php
        $bagian = mysqli_query($koneksi, "SELECT * FROM bagian");
        while ($b = mysqli_fetch_assoc($bagian)) {
            $sel = ($b['id_bagian'] == $row['id_bagian']) ? 'selected' : '';
            echo "<option value='{$b['id_bagian']}' $sel>" . htmlspecialchars($b['nama_bagian']) . "</option>";
        }
        ?>
    </select><br>
    <input type="submit" name="submit" value="Update">
</form>

<?php
if (isset($_POST['submit'])) {
    $nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $nip = mysqli_real_escape_string($koneksi, $_POST['nip']);
    $jabatan = mysqli_real_escape_string($koneksi, $_POST['jabatan']);
    $golongan = mysqli_real_escape_string($koneksi, $_POST['golongan']);
    $tgl = mysqli_real_escape_string($koneksi, $_POST['tgl_masuk']);
    $id_bagian = intval($_POST['id_bagian']);

    $update = "UPDATE pegawai SET nama='$nama', nip='$nip', jabatan='$jabatan', golongan='$golongan',
                tgl_masuk='$tgl', id_bagian=$id_bagian WHERE id_pegawai=$id";

    if (mysqli_query($koneksi, $update)) {
        echo "Berhasil diupdate. <a href='tampil_pegawai.php'>Kembali</a>";
    } else {
        echo "Gagal: " . mysqli_error($koneksi);
    }
}
?>