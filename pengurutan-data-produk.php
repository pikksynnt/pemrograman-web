<?php
$koneksi = mysqli_connect("localhost", "root", "", "db_latihan13");

$batas = 5;
$halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
$mulai = ($halaman - 1) * $batas;

$data = mysqli_query($koneksi, "SELECT * FROM produk ORDER BY harga ASC LIMIT $mulai, $batas");
$total = mysqli_query($koneksi, "SELECT * FROM produk");
$jumlah = mysqli_num_rows($total);
$total_halaman = ceil($jumlah / $batas);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Pengurutan Data Produk</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f7fb;
            margin: 0;
            padding: 40px;
        }

        .container {
            max-width: 900px;
            margin: auto;
            background: white;
            padding: 25px;
            border-radius: 14px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.08);
        }

        h2 {
            margin-top: 0;
            color: #222;
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th {
            background: #2563eb;
            color: white;
            padding: 12px;
        }

        td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
            text-align: center;
        }

        tr:hover {
            background: #f1f5ff;
        }

        .pagination {
            margin-top: 20px;
            text-align: center;
        }

        .pagination a {
            padding: 8px 12px;
            background: #2563eb;
            color: white;
            text-decoration: none;
            border-radius: 6px;
            margin: 3px;
            display: inline-block;
        }

        .pagination a:hover {
            background: #1d4ed8;
        }

        .btn {
            display: inline-block;
            margin-bottom: 15px;
            padding: 10px 14px;
            background: #16a34a;
            color: white;
            text-decoration: none;
            border-radius: 8px;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Data Produk Diurutkan Berdasarkan Harga</h2>

    <a href="pencarian-data-produk.php" class="btn">Ke Halaman Pencarian</a>

    <table>
        <tr>
            <th>ID</th>
            <th>Nama Produk</th>
            <th>Harga</th>
            <th>Stok</th>
        </tr>

        <?php while ($row = mysqli_fetch_array($data)) { ?>
        <tr>
            <td><?= $row['id_produk']; ?></td>
            <td><?= $row['nama_produk']; ?></td>
            <td>Rp <?= number_format($row['harga'], 0, ',', '.'); ?></td>
            <td><?= $row['stok']; ?></td>
        </tr>
        <?php } ?>
    </table>

    <div class="pagination">
        <?php for ($i = 1; $i <= $total_halaman; $i++) { ?>
            <a href="?halaman=<?= $i; ?>"><?= $i; ?></a>
        <?php } ?>
    </div>
</div>

</body>
</html>