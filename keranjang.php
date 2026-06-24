<?php
session_start();

if (!isset($_SESSION['keranjang'])) {
    $_SESSION['keranjang'] = [];
}

$produkList = [
    "Laptop Gaming" => 12000000,
    "Mouse Wireless" => 150000,
    "Keyboard Mechanical" => 450000,
    "Headset RGB" => 300000
];

if (isset($_POST['tambah'])) {
    $nama = $_POST['produk'];
    $_SESSION['keranjang'][] = [
        "nama" => $nama,
        "harga" => $produkList[$nama]
    ];
}

if (isset($_POST['hapus'])) {
    session_destroy();
    header("Location: keranjang.php");
    exit;
}

$total = 0;
foreach ($_SESSION['keranjang'] as $item) {
    $total += $item['harga'];
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Keranjang Belanja Session</title>
    <style>
        * {
            box-sizing: border-box;
            font-family: 'Segoe UI', sans-serif;
        }

        body {
            margin: 0;
            min-height: 100vh;
            background: linear-gradient(135deg, #0f172a, #1e293b, #2563eb);
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
        }

        .card {
            width: 420px;
            background: rgba(255, 255, 255, 0.12);
            backdrop-filter: blur(15px);
            border-radius: 22px;
            padding: 28px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.35);
            border: 1px solid rgba(255,255,255,0.2);
        }

        h2 {
            text-align: center;
            margin-bottom: 8px;
        }

        p {
            text-align: center;
            color: #cbd5e1;
            font-size: 14px;
        }

        select, button {
            width: 100%;
            padding: 13px;
            border-radius: 12px;
            border: none;
            margin-top: 12px;
            font-size: 15px;
        }

        select {
            background: white;
            color: #0f172a;
        }

        button {
            cursor: pointer;
            font-weight: bold;
            transition: 0.3s;
        }

        .btn-add {
            background: #38bdf8;
            color: #0f172a;
        }

        .btn-add:hover {
            background: #0ea5e9;
            transform: scale(1.02);
        }

        .btn-delete {
            background: #ef4444;
            color: white;
        }

        .btn-delete:hover {
            background: #dc2626;
            transform: scale(1.02);
        }

        .item {
            background: rgba(255,255,255,0.15);
            margin-top: 12px;
            padding: 14px;
            border-radius: 14px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .empty {
            text-align: center;
            background: rgba(255,255,255,0.1);
            padding: 18px;
            border-radius: 14px;
            margin-top: 15px;
            color: #cbd5e1;
        }

        .total {
            margin-top: 18px;
            padding: 15px;
            background: rgba(34,197,94,0.2);
            border-radius: 14px;
            display: flex;
            justify-content: space-between;
            font-size: 18px;
            font-weight: bold;
        }
    </style>
</head>
<body>

<div class="card">
    <h2>Keranjang Belanja</h2>
    <p>Contoh program PHP menggunakan Session</p>

    <form method="post">
        <select name="produk">
            <?php foreach ($produkList as $nama => $harga): ?>
                <option value="<?= $nama ?>">
                    <?= $nama ?> - Rp<?= number_format($harga, 0, ',', '.') ?>
                </option>
            <?php endforeach; ?>
        </select>

        <button class="btn-add" type="submit" name="tambah">
            + Tambah ke Keranjang
        </button>

        <button class="btn-delete" type="submit" name="hapus">
            Hapus Session
        </button>
    </form>

    <?php if (!empty($_SESSION['keranjang'])): ?>
        <?php foreach ($_SESSION['keranjang'] as $item): ?>
            <div class="item">
                <span><?= $item['nama'] ?></span>
                <strong>Rp<?= number_format($item['harga'], 0, ',', '.') ?></strong>
            </div>
        <?php endforeach; ?>

        <div class="total">
            <span>Total</span>
            <span>Rp<?= number_format($total, 0, ',', '.') ?></span>
        </div>
    <?php else: ?>
        <div class="empty">
            Keranjang masih kosong
        </div>
    <?php endif; ?>
</div>

</body>
</html>