<?php
include 'koneksi.php';
?>

<!DOCTYPE html>
<html>
<head>
  <title>Input Riwayat Jabatan</title>
  <meta charset="UTF-8">

  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Flatpickr CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
</head>
<body class="bg-light">

<div class="container mt-5 p-4 bg-white rounded shadow">
  <h3 class="text-center text-danger mb-4">Input Riwayat Jabatan</h3>

  <form id="formRiwayat">

    <div class="mb-3">
      <label for="id_pegawai" class="form-label">Pegawai:</label>
      <select name="id_pegawai" id="id_pegawai" class="form-select" required>
        <option value="">-- Pilih Pegawai --</option>
        <?php
        $query = mysqli_query($koneksi, "SELECT * FROM pegawai ORDER BY nama");
        if (mysqli_num_rows($query) > 0) {
            while ($data = mysqli_fetch_array($query)) {
                echo "<option value='$data[id_pegawai]'>$data[nama] (NIP: $data[nip])</option>";
            }
        } else {
            echo "<option value=''>Tidak ada data pegawai</option>";
        }
        ?>
      </select>
    </div>

    <div class="mb-3">
      <label class="form-label">Jabatan Sebelumnya:</label>
      <input type="text" name="jabatan_sebelumnya" class="form-control" required>
    </div>

    <div class="mb-3">
      <label class="form-label">Jabatan Sekarang:</label>
      <input type="text" name="jabatan_sekarang" class="form-control" required>
    </div>

    <div class="mb-3">
      <label class="form-label">Tanggal Promosi:</label>
      <input type="text" name="tanggal_promosi" id="tanggal_promosi" class="form-control" required placeholder="dd-mm-yyyy">
    </div>

    <div class="d-grid gap-2">
      <button type="submit" class="btn btn-danger">Simpan</button>
      <a href="index.php" class="btn btn-secondary">Kembali</a>
    </div>

  </form>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- Flatpickr JS -->
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  flatpickr("#tanggal_promosi", {
    dateFormat: "d-m-Y",
    maxDate: "today"
  });

  // AJAX Form Submit
  $('#formRiwayat').on('submit', function (e) {
    e.preventDefault();
    $.ajax({
      type: 'POST',
      url: 'ajax_input_riwayat.php',
      data: $(this).serialize(),
      dataType: 'json',
      success: function (response) {
        if (response.status === 'success') {
          Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: response.message,
            timer: 2000,
            showConfirmButton: false
          }).then(() => {
            window.location.href = 'tampil_riwayat.php';
          });
          $('#formRiwayat')[0].reset();
        } else {
          Swal.fire({
            icon: 'error',
            title: 'Gagal!',
            text: response.message
          });
        }
      },
      error: function() {
        Swal.fire({
          icon: 'error',
          title: 'Error!',
          text: 'Terjadi kesalahan sistem'
        });
      }
    });
  });
</script>

</body>
</html>