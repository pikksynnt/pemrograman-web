<?php
session_start();
include '../config/koneksi.php';

if(!isset($_SESSION['login'])){
    header("Location: ../login.php");
    exit;
}

$total_pelanggan = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM pelanggan"));
$total_transaksi = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM transaksi"));
$pendapatan = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT SUM(total) AS total FROM transaksi"));
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: #0f172a;
            min-height: 100vh;
            color: #fff;
        }

        .navbar-custom {
            background: rgba(255, 255, 255, 0.06);
            backdrop-filter: blur(14px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.10);
        }

        .hero-box {
            background: linear-gradient(135deg, #1e293b, #111827);
            border: 1px solid rgba(255, 255, 255, 0.10);
            border-radius: 24px;
            padding: 30px;
        }

        .stat-card {
            border: none;
            border-radius: 22px;
            color: #fff;
            overflow: hidden;
            transition: 0.3s;
        }

        .stat-card:hover {
            transform: translateY(-5px);
        }

        .card-purple {
            background: linear-gradient(135deg, #7c3aed, #4f46e5);
        }

        .card-blue {
            background: linear-gradient(135deg, #06b6d4, #2563eb);
        }

        .card-orange {
            background: linear-gradient(135deg, #f97316, #ef4444);
        }

        .menu-box {
            background: #1e293b;
            border: 1px solid rgba(255, 255, 255, 0.10);
            border-radius: 24px;
        }

        .menu-btn {
            border-radius: 14px;
            padding: 13px 20px;
            font-weight: 500;
        }

        .text-soft {
            color: #cbd5e1;
        }
    </style>
</head>

<body>

<nav class="navbar navbar-custom px-4 py-3">
    <div class="container-fluid">
        <span class="navbar-brand text-white fw-semibold">
            👟 Laundry Sepatu
        </span>

        <a href="../logout.php" class="btn btn-danger btn-sm px-3">
            <i class="bi bi-box-arrow-right"></i> Logout
        </a>
    </div>
</nav>

<div class="container py-5">

    <div class="hero-box mb-4">
        <h2 class="fw-bold mb-2">Halo, Admin 👋</h2>
        <p class="text-soft mb-0">
            Selamat datang di dashboard pengelolaan laundry sepatu.
        </p>
    </div>

    <div class="row g-4">

        <div class="col-md-4">
            <div class="card stat-card card-purple shadow">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <p class="mb-1">Total Pelanggan</p>
                            <h2 class="fw-bold mb-0"><?= $total_pelanggan; ?></h2>
                        </div>
                        <i class="bi bi-people-fill fs-1"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card stat-card card-blue shadow">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <p class="mb-1">Total Transaksi</p>
                            <h2 class="fw-bold mb-0"><?= $total_transaksi; ?></h2>
                        </div>
                        <i class="bi bi-receipt-cutoff fs-1"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card stat-card card-orange shadow">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <p class="mb-1">Pendapatan</p>
                            <h2 class="fw-bold mb-0">
                                Rp <?= number_format($pendapatan['total'] ?? 0, 0, ',', '.'); ?>
                            </h2>
                        </div>
                        <i class="bi bi-wallet2 fs-1"></i>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="menu-box p-4 mt-5 shadow">
        <h5 class="fw-semibold mb-3">Menu Utama</h5>
        <p class="text-soft mb-4">
            Pilih menu di bawah untuk mengelola data aplikasi.
        </p>

        <a href="pelanggan.php" class="btn btn-light menu-btn me-2 mb-2">
            <i class="bi bi-person-lines-fill"></i> Data Pelanggan
        </a>

        <a href="transaksi.php" class="btn btn-primary menu-btn mb-2">
            <i class="bi bi-bag-check-fill"></i> Data Transaksi
        </a>
    </div>

</div>

</body>
</html>