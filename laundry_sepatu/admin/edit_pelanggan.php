<?php
session_start();
include '../config/koneksi.php';

if(!isset($_SESSION['login'])){
    header("Location: ../login.php");
    exit;
}

$id = $_GET['id'];

$data = mysqli_query($koneksi, "SELECT * FROM pelanggan WHERE id_pelanggan='$id'");
$row = mysqli_fetch_assoc($data);

if(isset($_POST['update'])){
    $nama = $_POST['nama'];
    $no_hp = $_POST['no_hp'];
    $alamat = $_POST['alamat'];

    mysqli_query($koneksi, "UPDATE pelanggan SET 
        nama='$nama',
        no_hp='$no_hp',
        alamat='$alamat'
        WHERE id_pelanggan='$id'
    ");

    header("Location: pelanggan.php");
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Pelanggan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="background:#0f172a;">

<div class="container py-5">

    <div class="card border-0 rounded-4 mx-auto" style="max-width:600px;">
        <div class="card-body p-4">

            <h4 class="mb-4">Edit Data Pelanggan</h4>

            <form method="POST">

                <div class="mb-3">
                    <label>Nama Pelanggan</label>
                    <input type="text" name="nama" class="form-control" value="<?= $row['nama']; ?>" required>
                </div>

                <div class="mb-3">
                    <label>No HP</label>
                    <input type="text" name="no_hp" class="form-control" value="<?= $row['no_hp']; ?>" required>
                </div>

                <div class="mb-3">
                    <label>Alamat</label>
                    <textarea name="alamat" class="form-control" required><?= $row['alamat']; ?></textarea>
                </div>

                <button type="submit" name="update" class="btn btn-primary">
                    Update
                </button>

                <a href="pelanggan.php" class="btn btn-secondary">
                    Batal
                </a>

            </form>

        </div>
    </div>

</div>

</body>
</html>