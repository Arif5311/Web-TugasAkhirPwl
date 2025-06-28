<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Menu Utama | Sistem Kepegawaian</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background-color: #f1f3f6;
            font-family: 'Segoe UI', sans-serif;
        }
        .card {
            border: none;
            transition: transform 0.3s ease;
            border-radius: 12px;
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 0.5rem 1rem rgba(0,0,0,0.1);
        }
        .card-icon {
            font-size: 2rem;
            color: #dc3545;
        }
        .btn-red {
            background-color: #dc3545;
            color: white;
            border-radius: 8px;
        }
        .btn-red:hover {
            background-color: #c82333;
            color: white;
        }
    </style>
</head>
<body>

<div class="container py-5 text-center">
    <div class="mb-5">
        <h1 class="fw-bold text-danger"><i class="bi bi-briefcase-fill"></i> Menu Utama</h1>
        <p class="text-muted">Sistem Informasi Kepegawaian</p>
    </div>

    <!-- Input Data Section -->
    <div class="text-center mb-4">
        <h5 class="text-danger fw-semibold">Input Data</h5>
    </div>
    <div class="row justify-content-center g-4 mb-5">
        <div class="col-md-5 col-lg-4">
            <div class="card p-4 shadow-sm bg-white">
                <div class="d-flex align-items-center mb-3">
                    <i class="bi bi-file-earmark-plus-fill card-icon me-3"></i>
                    <h6 class="mb-0 text-danger">Input Data Pegawai</h6>
                </div>
                <a href="input_pegawai.php" class="btn btn-red w-100">Buka Form</a>
            </div>
        </div>
        <div class="col-md-5 col-lg-4">
            <div class="card p-4 shadow-sm bg-white">
                <div class="d-flex align-items-center mb-3">
                    <i class="bi bi-journal-plus card-icon me-3"></i>
                    <h6 class="mb-0 text-danger">Input Riwayat Jabatan</h6>
                </div>
                <a href="input_riwayat.php" class="btn btn-red w-100">Buka Form</a>
            </div>
        </div>
    </div>

    <!-- Tampilkan Data Section -->
    <div class="text-center mb-4">
        <h5 class="text-danger fw-semibold">Tampilkan Data</h5>
    </div>
    <div class="row justify-content-center g-4">
        <div class="col-md-5 col-lg-4">
            <div class="card p-4 shadow-sm bg-white">
                <div class="d-flex align-items-center mb-3">
                    <i class="bi bi-people-fill card-icon me-3"></i>
                    <h6 class="mb-0 text-danger">Tampilkan Data Pegawai</h6>
                </div>
                <a href="tampil_pegawai.php" class="btn btn-red w-100">Lihat Data</a>
            </div>
        </div>
        <div class="col-md-5 col-lg-4">
            <div class="card p-4 shadow-sm bg-white">
                <div class="d-flex align-items-center mb-3">
                    <i class="bi bi-journal-text card-icon me-3"></i>
                    <h6 class="mb-0 text-danger">Tampilkan Riwayat Jabatan</h6>
                </div>
                <a href="tampil_riwayat.php" class="btn btn-red w-100">Lihat Data</a>
            </div>
        </div>
    </div>

    <footer class="text-center mt-5">
        <p class="text-muted">&copy; <?= date("Y") ?> Sistem Kepegawaian</p>
    </footer>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
