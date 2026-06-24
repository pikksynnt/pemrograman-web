<?php
session_start();
include '../config/koneksi.php';

if(!isset($_SESSION['login'])){
    header("Location: ../login.php");
    exit;
}

if(isset($_POST['simpan'])){
    $nama = $_POST['nama'];
    $no_hp = $_POST['no_hp'];
    $alamat = $_POST['alamat'];

    mysqli_query($koneksi, "INSERT INTO pelanggan(nama, no_hp, alamat) VALUES('$nama','$no_hp','$alamat')");
    header("Location: pelanggan.php");
}

if(isset($_GET['hapus'])){
    $id = $_GET['hapus'];
    mysqli_query($koneksi, "DELETE FROM pelanggan WHERE id_pelanggan='$id'");
    header("Location: pelanggan.php");
}

$data = mysqli_query($koneksi, "SELECT * FROM pelanggan ORDER BY id_pelanggan DESC");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Pelanggan</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="background:#0f172a; color:white;">

<div class="container py-5">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3>Data Pelanggan</h3>
        <a href="dashboard.php" class="btn btn-light btn-sm">Kembali</a>
    </div>

    <div class="card border-0 rounded-4 mb-4">
        <div class="card-body p-4">

            <h5 class="mb-3">Tambah Pelanggan</h5>

            <form method="POST">
                <div class="row g-3">

                    <div class="col-md-4">
                        <input type="text" name="nama" class="form-control" placeholder="Nama pelanggan" required>
                    </div>

                    <div class="col-md-3">
                        <input type="text" name="no_hp" class="form-control" placeholder="No HP" required>
                    </div>

                    <div class="col-md-3">
                        <input type="text" name="alamat" class="form-control" placeholder="Alamat" required>
                    </div>

                    <div class="col-md-2">
                        <button type="submit" name="simpan" class="btn btn-primary w-100">
                            Simpan
                        </button>
                    </div>

                </div>
            </form>

        </div>
    </div>

    <div class="card border-0 rounded-4">
        <div class="card-body p-4">

            <h5 class="mb-3">Daftar Pelanggan</h5>

            <table class="table table-bordered table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th width="50">No</th>
                        <th>Nama</th>
                        <th>No HP</th>
                        <th>Alamat</th>
                        <th width="160">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    $no = 1;
                    while($row = mysqli_fetch_assoc($data)){
                    ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $row['nama']; ?></td>
                        <td><?= $row['no_hp']; ?></td>
                        <td><?= $row['alamat']; ?></td>
                        <td>
                            <a href="edit_pelanggan.php?id=<?= $row['id_pelanggan']; ?>" class="btn btn-warning btn-sm">
                                Edit
                            </a>

                            <a href="pelanggan.php?hapus=<?= $row['id_pelanggan']; ?>" 
                               onclick="return confirm('Yakin hapus data ini?')"
                               class="btn btn-danger btn-sm">
                                Hapus
                            </a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>

            </table>

        </div>
    </div>

</div>

</body>
</html>