<?php
session_start();
include '../config/koneksi.php';

if(!isset($_SESSION['login'])){
    header("Location: ../login.php");
    exit;
}

$id = $_GET['id'];

$transaksi = mysqli_query($koneksi, "SELECT * FROM transaksi WHERE id_transaksi='$id'");
$row = mysqli_fetch_assoc($transaksi);

$pelanggan = mysqli_query($koneksi, "SELECT * FROM pelanggan ORDER BY nama ASC");

if(isset($_POST['update'])){
    $id_pelanggan = $_POST['id_pelanggan'];
    $layanan = $_POST['layanan'];
    $jumlah = $_POST['jumlah'];
    $harga = $_POST['harga'];
    $status = $_POST['status'];

    $total = $jumlah * $harga;

    mysqli_query($koneksi, "UPDATE transaksi SET
        id_pelanggan='$id_pelanggan',
        layanan='$layanan',
        jumlah='$jumlah',
        harga='$harga',
        total='$total',
        status='$status'
        WHERE id_transaksi='$id'
    ");

    header("Location: transaksi.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Transaksi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="background:#0f172a;">

<div class="container py-5">

    <div class="card border-0 rounded-4 mx-auto" style="max-width:700px;">
        <div class="card-body p-4">

            <h4 class="mb-4">Edit Transaksi</h4>

            <form method="POST">

                <div class="mb-3">
                    <label>Pelanggan</label>
                    <select name="id_pelanggan" class="form-control" required>
                        <?php while($p = mysqli_fetch_assoc($pelanggan)){ ?>
                            <option value="<?= $p['id_pelanggan']; ?>"
                                <?= ($p['id_pelanggan'] == $row['id_pelanggan']) ? 'selected' : ''; ?>>
                                <?= $p['nama']; ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label>Layanan</label>
                    <select name="layanan" id="layanan" class="form-control" required>
                        <option value="Fast Clean" data-harga="25000" <?= ($row['layanan'] == 'Fast Clean') ? 'selected' : ''; ?>>
                            Fast Clean - Rp25.000
                        </option>
                        <option value="Deep Clean" data-harga="35000" <?= ($row['layanan'] == 'Deep Clean') ? 'selected' : ''; ?>>
                            Deep Clean - Rp35.000
                        </option>
                        <option value="Repaint" data-harga="75000" <?= ($row['layanan'] == 'Repaint') ? 'selected' : ''; ?>>
                            Repaint - Rp75.000
                        </option>
                    </select>
                </div>

                <div class="mb-3">
                    <label>Jumlah</label>
                    <input type="number" name="jumlah" class="form-control" value="<?= $row['jumlah']; ?>" required>
                </div>

                <div class="mb-3">
                    <label>Harga</label>
                    <input type="number" name="harga" id="harga" class="form-control" value="<?= $row['harga']; ?>" readonly required>
                </div>

                <div class="mb-3">
                    <label>Status</label>
                    <select name="status" class="form-control" required>
                        <option value="Proses" <?= ($row['status'] == 'Proses') ? 'selected' : ''; ?>>Proses</option>
                        <option value="Selesai" <?= ($row['status'] == 'Selesai') ? 'selected' : ''; ?>>Selesai</option>
                        <option value="Diambil" <?= ($row['status'] == 'Diambil') ? 'selected' : ''; ?>>Diambil</option>
                    </select>
                </div>

                <button type="submit" name="update" class="btn btn-primary">
                    Update
                </button>

                <a href="transaksi.php" class="btn btn-secondary">
                    Batal
                </a>

            </form>

        </div>
    </div>

</div>

<script>
document.getElementById('layanan').addEventListener('change', function(){
    let harga = this.options[this.selectedIndex].getAttribute('data-harga');
    document.getElementById('harga').value = harga;
});
</script>

</body>
</html>