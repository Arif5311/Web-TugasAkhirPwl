<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Data Pegawai</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background-color:rgb(254, 250, 250);">

  <div class="container mt-5">
    <div class="card shadow rounded">
      <div class="card-body">
        <h3 class="text-center text-danger mb-4 fw-bold">
          <i class="bi bi-people-fill"></i> Data Pegawai
        </h3>

        <div class="table-responsive">
          <table class="table table-hover table-bordered align-middle text-center">
            <thead class="table-danger text-dark">
              <tr>
                <th>No</th>
                <th>NIP</th>
                <th>Nama Pegawai</th>
                <th>Jabatan</th>
                <th>Golongan</th>
                <th>Tanggal Masuk</th>
                <th>Bagian</th>
              </tr>
            </thead>
            <tbody>
              <?php
              include 'koneksi.php';
              $no = 1;
              $sql = mysqli_query($koneksi, "SELECT pegawai.*, bagian.nama_bagian FROM pegawai LEFT JOIN bagian ON pegawai.id_bagian = bagian.id_bagian");

              while ($row = mysqli_fetch_assoc($sql)) {
              ?>
              <tr>
                <td><?= $no++; ?></td>
                <td><?= $row["nip"]; ?></td>
                <td><?= $row["nama"]; ?></td>
                <td><?= $row["jabatan"]; ?></td>
                <td><?= $row["golongan"]; ?></td>
                <td><?= $row["tgl_masuk"]; ?></td>
                <td><?= $row["nama_bagian"]; ?></td>
              </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>

      </div>
    </div>
  </div>

</body>
</html>
