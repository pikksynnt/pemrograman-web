<?php
$koneksi = mysqli_connect("localhost", "root", "", "db_latihan14");

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

if (isset($_POST['bayar'])) {
    $id_produk = $_POST['id_produk'];
    $jumlah_beli = $_POST['jumlah_beli'];

    mysqli_query($koneksi, "CALL transaksi_pembayaran('$id_produk', '$jumlah_beli')");
    header("Location: transaksi-pembayaran.php");
    exit;
}

$produk = mysqli_query($koneksi, "SELECT * FROM produk");
$pembayaran = mysqli_query($koneksi, "SELECT pembayaran.*, produk.nama_produk 
FROM pembayaran 
JOIN produk ON pembayaran.id_produk = produk.id_produk 
ORDER BY pembayaran.id_bayar DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Transaksi Pembayaran</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f7fb;
            padding: 40px;
        }

        .container {
            max-width: 950px;
            margin: auto;
            background: white;
            padding: 25px;
            border-radius: 14px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.08);
        }

        h2 {
            text-align: center;
        }

        form {
            display: flex;
            gap: 10px;
            margin-bottom: 25px;
        }

        select, input {
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 8px;
            flex: 1;
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
            margin-top: 15px;
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

        .section {
            margin-top: 25px;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Aplikasi Transaksi Pembayaran Produk</h2>

    <form method="POST">
        <select name="id_produk" required>
            <option value="">Pilih Produk</option>
            <?php
            $listProduk = mysqli_query($koneksi, "SELECT * FROM produk");
            while ($p = mysqli_fetch_array($listProduk)) {
                echo "<option value='".$p['id_produk']."'>".$p['nama_produk']." - Stok: ".$p['stok']."</option>";
            }
            ?>
        </select>

        <input type="number" name="jumlah_beli" placeholder="Jumlah beli" required>
        <button type="submit" name="bayar">Bayar</button>
    </form>

    <div class="section">
        <h3>Data Produk</h3>
        <table>
            <tr>
                <th>ID</th>
                <th>Nama Produk</th>
                <th>Stok</th>
                <th>Harga</th>
            </tr>

            <?php while ($row = mysqli_fetch_array($produk)) { ?>
            <tr>
                <td><?= $row['id_produk']; ?></td>
                <td><?= $row['nama_produk']; ?></td>
                <td><?= $row['stok']; ?></td>
                <td>Rp <?= number_format($row['harga'], 0, ',', '.'); ?></td>
            </tr>
            <?php } ?>
        </table>
    </div>

    <div class="section">
        <h3>Riwayat Pembayaran</h3>
        <table>
            <tr>
                <th>ID Bayar</th>
                <th>Produk</th>
                <th>Jumlah Beli</th>
                <th>Total Bayar</th>
                <th>Tanggal</th>
            </tr>

            <?php while ($row = mysqli_fetch_array($pembayaran)) { ?>
            <tr>
                <td><?= $row['id_bayar']; ?></td>
                <td><?= $row['nama_produk']; ?></td>
                <td><?= $row['jumlah_beli']; ?></td>
                <td>Rp <?= number_format($row['total_bayar'], 0, ',', '.'); ?></td>
                <td><?= $row['tanggal']; ?></td>
            </tr>
            <?php } ?>
        </table>
    </div>
</div>

</body>
</html>