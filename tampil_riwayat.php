<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Riwayat Jabatan</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background-color: #f8f9fc;">

  <div class="container mt-5">
    <div class="card shadow rounded">
      <div class="card-body">
        <h3 class="text-center text-danger mb-4 fw-bold">Riwayat Jabatan Pegawai</h3>

        <div class="table-responsive">
          <table class="table table-bordered table-hover text-center align-middle">
            <thead class="table-danger text-dark">
              <tr>
                <th>No</th>
                <th>NIP</th>
                <th>Nama Pegawai</th>
                <th>Jabatan Sebelumnya</th>
                <th>Jabatan Sekarang</th>
                <th>Tanggal Promosi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              include 'koneksi.php';
              $no = 1;

              $sql = mysqli_query($koneksi, "
                SELECT rj.*, p.nip, p.nama 
                FROM riwayat_jabatan rj 
                LEFT JOIN pegawai p ON rj.id_pegawai = p.id_pegawai
              ");

              while ($row = mysqli_fetch_assoc($sql)) {
              ?>
              <tr>
                <td><?= $no++; ?></td>
                <td><?= $row['nip']; ?></td>
                <td><?= $row['nama']; ?></td>
                <td><?= $row['jabatan_sebelumnya']; ?></td>
                <td><?= $row['jabatan_sekarang']; ?></td>
                <td><?= $row['tanggal_promosi']; ?></td>
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
