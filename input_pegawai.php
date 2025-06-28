<?php
include 'koneksi.php';
?>

<!DOCTYPE html>
<html>
<head>
  <title>Input Data Pegawai</title>
  <meta charset="UTF-8">

  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Flatpickr (Datepicker) -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
</head>
<body class="bg-light">

<div class="container mt-5 p-4 bg-white rounded shadow">
  <h3 class="text-center text-danger mb-4">Input Data Pegawai</h3>

  <form id="formPegawai">

    <div class="mb-3">
      <label class="form-label">Nama:</label>
      <input type="text" name="nama" class="form-control" required>
    </div>

    <div class="mb-3">
      <label class="form-label">NIP:</label>
      <input type="text" name="nip" class="form-control" required>
    </div>

    <div class="mb-3">
      <label class="form-label">Jabatan:</label>
      <input type="text" name="jabatan" class="form-control" required>
    </div>

    <div class="mb-3">
      <label class="form-label">Golongan:</label>
      <input type="text" name="golongan" class="form-control" required>
    </div>

    <div class="mb-3">
      <label class="form-label">Tanggal Masuk:</label>
      <input type="text" name="tgl_masuk" id="tanggal_masuk" class="form-control" placeholder="dd-mm-yyyy" required>
    </div>

    <div class="mb-4">
      <label class="form-label">Bagian:</label>
      <select name="id_bagian" class="form-select" required>
        <option value="">-- Pilih Bagian --</option>
        <?php
        $query = mysqli_query($koneksi, "SELECT * FROM bagian ORDER BY nama_bagian");
        if (mysqli_num_rows($query) > 0) {
            while ($data = mysqli_fetch_array($query)) {
                echo "<option value='$data[id_bagian]'>$data[nama_bagian]</option>";
            }
        } else {
            echo "<option value=''>Tidak ada data bagian</option>";
        }
        ?>
      </select>
    </div>

    <div class="d-grid gap-2">
      <button type="submit" class="btn btn-danger">Simpan</button>
      <a href="index.php" class="btn btn-secondary">Kembali</a>
    </div>

  </form>
</div>

<!-- Script Bootstrap & Flatpickr -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  flatpickr("#tanggal_masuk", {
    dateFormat: "d-m-Y",
    maxDate: "today"
  });

  // AJAX Form Submit
  $('#formPegawai').on('submit', function (e) {
    e.preventDefault();
    $.ajax({
      type: 'POST',
      url: 'ajax_input_pegawai.php',
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
            window.location.href = 'tampil_pegawai.php';
          });
          $('#formPegawai')[0].reset();
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