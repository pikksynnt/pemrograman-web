<?php
session_start();
include '../config/koneksi.php';

if(!isset($_SESSION['login'])){
    header("Location: ../login.php");
    exit;
}

$pelanggan = mysqli_query($koneksi, "SELECT * FROM pelanggan ORDER BY nama ASC");

if(isset($_GET['hapus'])){
    $id = $_GET['hapus'];

    mysqli_query($koneksi, "DELETE FROM transaksi WHERE id_transaksi='$id'");
    header("Location: transaksi.php");
    exit;
}

if(isset($_POST['simpan'])){
    $id_pelanggan = $_POST['id_pelanggan'];
    $layanan = $_POST['layanan'];
    $jumlah = $_POST['jumlah'];
    $harga = $_POST['harga'];
    $status = $_POST['status'];
    $tanggal = date('Y-m-d');

    $total = $jumlah * $harga;

    mysqli_query($koneksi, "INSERT INTO transaksi
    (id_pelanggan, layanan, jumlah, harga, total, status, tanggal)
    VALUES
    ('$id_pelanggan','$layanan','$jumlah','$harga','$total','$status','$tanggal')");

    header("Location: transaksi.php");
    exit;
}

$where = "";

$keyword = $_GET['keyword'] ?? "";
$layanan_filter = $_GET['layanan_filter'] ?? "";
$status_filter = $_GET['status_filter'] ?? "";

if(isset($_GET['cari'])){
    $where = "WHERE 1=1";

    if($keyword != ""){
        $where .= " AND pelanggan.nama LIKE '%$keyword%'";
    }

    if($layanan_filter != ""){
        $where .= " AND transaksi.layanan = '$layanan_filter'";
    }

    if($status_filter != ""){
        $where .= " AND transaksi.status = '$status_filter'";
    }
}

$data = mysqli_query($koneksi, "SELECT transaksi.*, pelanggan.nama 
FROM transaksi 
JOIN pelanggan ON transaksi.id_pelanggan = pelanggan.id_pelanggan
$where
ORDER BY transaksi.id_transaksi DESC");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Transaksi</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="background:#0f172a; color:white;">

<div class="container py-5">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="mb-1">Data Transaksi</h3>
            <p class="text-secondary mb-0">Kelola transaksi laundry sepatu</p>
        </div>

        <a href="dashboard.php" class="btn btn-light btn-sm">
            Kembali
        </a>
    </div>

    <div class="card border-0 rounded-4 mb-4">
        <div class="card-body p-4">

            <h5 class="mb-3 text-dark">Tambah Transaksi</h5>

            <form method="POST">
                <div class="row g-3">

                    <div class="col-md-3">
                        <label class="form-label text-dark">Pelanggan</label>
                        <select name="id_pelanggan" class="form-control" required>
                            <option value="">Pilih Pelanggan</option>
                            <?php while($p = mysqli_fetch_assoc($pelanggan)){ ?>
                                <option value="<?= $p['id_pelanggan']; ?>">
                                    <?= $p['nama']; ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="col-md-3">
                        <label class="form-label text-dark">Layanan</label>
                        <select name="layanan" id="layanan" class="form-control" required>
                            <option value="">Pilih Layanan</option>
                            <option value="Fast Clean" data-harga="25000">Fast Clean - Rp25.000</option>
                            <option value="Deep Clean" data-harga="35000">Deep Clean - Rp35.000</option>
                            <option value="Repaint" data-harga="75000">Repaint - Rp75.000</option>
                        </select>
                    </div>

                    <div class="col-md-2">
                        <label class="form-label text-dark">Jumlah</label>
                        <input type="number" name="jumlah" class="form-control" placeholder="Jumlah" required>
                    </div>

                    <div class="col-md-2">
                        <label class="form-label text-dark">Harga</label>
                        <input type="number" name="harga" id="harga" class="form-control" placeholder="Harga" readonly required>
                    </div>

                    <div class="col-md-2">
                        <label class="form-label text-dark">Status</label>
                        <select name="status" class="form-control" required>
                            <option value="Proses">Proses</option>
                            <option value="Selesai">Selesai</option>
                            <option value="Diambil">Diambil</option>
                        </select>
                    </div>

                    <div class="col-md-12">
                        <button type="submit" name="simpan" class="btn btn-primary">
                            Simpan Transaksi
                        </button>
                    </div>

                </div>
            </form>

        </div>
    </div>

    <div class="card border-0 rounded-4">
        <div class="card-body p-4">

            <h5 class="mb-3 text-dark">Daftar Transaksi</h5>

            <form method="GET" class="row g-2 mb-4">
                <div class="col-md-4">
                    <input type="text" name="keyword" class="form-control"
                           placeholder="Cari nama pelanggan"
                           value="<?= $keyword; ?>">
                </div>

                <div class="col-md-3">
                    <select name="layanan_filter" class="form-control">
                        <option value="">Semua Layanan</option>
                        <option value="Fast Clean" <?= ($layanan_filter == 'Fast Clean') ? 'selected' : ''; ?>>Fast Clean</option>
                        <option value="Deep Clean" <?= ($layanan_filter == 'Deep Clean') ? 'selected' : ''; ?>>Deep Clean</option>
                        <option value="Repaint" <?= ($layanan_filter == 'Repaint') ? 'selected' : ''; ?>>Repaint</option>
                    </select>
                </div>

                <div class="col-md-3">
                    <select name="status_filter" class="form-control">
                        <option value="">Semua Status</option>
                        <option value="Proses" <?= ($status_filter == 'Proses') ? 'selected' : ''; ?>>Proses</option>
                        <option value="Selesai" <?= ($status_filter == 'Selesai') ? 'selected' : ''; ?>>Selesai</option>
                        <option value="Diambil" <?= ($status_filter == 'Diambil') ? 'selected' : ''; ?>>Diambil</option>
                    </select>
                </div>

                <div class="col-md-2">
                    <button type="submit" name="cari" class="btn btn-dark w-100">
                        Cari
                    </button>
                </div>

                <div class="col-md-12 mt-2">
                    <a href="transaksi.php" class="btn btn-secondary btn-sm">
                        Reset
                    </a>
                </div>
            </form>

            <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>Pelanggan</th>
                            <th>Layanan</th>
                            <th>Jumlah</th>
                            <th>Harga</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>Tanggal</th>
                            <th width="150">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php $no = 1; while($row = mysqli_fetch_assoc($data)){ ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $row['nama']; ?></td>
                            <td><?= $row['layanan']; ?></td>
                            <td><?= $row['jumlah']; ?></td>
                            <td>Rp <?= number_format($row['harga'],0,',','.'); ?></td>
                            <td>Rp <?= number_format($row['total'],0,',','.'); ?></td>
                            <td>
                                <?php if($row['status'] == 'Proses'){ ?>
                                    <span class="badge bg-warning text-dark">Proses</span>
                                <?php } elseif($row['status'] == 'Selesai'){ ?>
                                    <span class="badge bg-success">Selesai</span>
                                <?php } else { ?>
                                    <span class="badge bg-secondary">Diambil</span>
                                <?php } ?>
                            </td>
                            <td><?= $row['tanggal']; ?></td>
                            <td>
                                <a href="edit_transaksi.php?id=<?= $row['id_transaksi']; ?>" class="btn btn-warning btn-sm">
                                    Edit
                                </a>

                                <a href="transaksi.php?hapus=<?= $row['id_transaksi']; ?>" 
                                   onclick="return confirm('Yakin hapus transaksi ini?')"
                                   class="btn btn-danger btn-sm">
                                    Hapus
                                </a>
                            </td>
                        </tr>
                        <?php } ?>

                        <?php if(mysqli_num_rows($data) == 0){ ?>
                        <tr>
                            <td colspan="9" class="text-center text-muted">
                                Data tidak ditemukan
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>

                </table>
            </div>

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