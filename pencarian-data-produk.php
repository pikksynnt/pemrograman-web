<?php
$koneksi = mysqli_connect("localhost", "root", "", "db_latihan13");

$cari = isset($_GET['cari']) ? $_GET['cari'] : "";
$batas = 5;
$halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
$mulai = ($halaman - 1) * $batas;

$data = mysqli_query($koneksi, "SELECT * FROM produk 
WHERE nama_produk LIKE '%$cari%' 
LIMIT $mulai, $batas");

$total = mysqli_query($koneksi, "SELECT * FROM produk 
WHERE nama_produk LIKE '%$cari%'");

$jumlah = mysqli_num_rows($total);
$total_halaman = ceil($jumlah / $batas);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Pencarian Data Produk</title>
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
            text-align: center;
            color: #222;
        }

        form {
            display: flex;
            gap: 10px;
            margin-bottom: 20px;
        }

        input {
            flex: 1;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 8px;
        }

        button {
            padding: 12px 18px;
            background: #2563eb;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
        }

        button:hover {
            background: #1d4ed8;
        }

        table {
            width: 100%;
            border-collapse: collapse;
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
    <h2>Pencarian Data Produk</h2>

    <a href="pengurutan-data-produk.php" class="btn">Ke Halaman Pengurutan</a>

    <form method="GET">
        <input type="text" name="cari" placeholder="Cari nama produk..." value="<?= $cari; ?>">
        <button type="submit">Cari</button>
    </form>

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
            <a href="?cari=<?= $cari; ?>&halaman=<?= $i; ?>"><?= $i; ?></a>
        <?php } ?>
    </div>
</div>

</body>
</html>