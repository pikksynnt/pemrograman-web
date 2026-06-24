<?php
$nama = "";
$hasil = "";
$jumlah = "";

if(isset($_POST['proses'])){
    $nama = $_POST['nama'];
    $hasil = strtoupper($nama);
    $jumlah = strlen($nama);
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Fungsi String</title>

<style>
body {
    font-family: 'Segoe UI';
    background: linear-gradient(135deg, #020617, #1e293b);
    color: #fff;
    text-align: center;
    padding-top: 100px;
}

.card {
    background: #1e293b;
    padding: 30px;
    border-radius: 15px;
    width: 350px;
    margin: auto;
    box-shadow: 0 10px 30px rgba(0,0,0,0.3);
}

input {
    width: 100%;
    padding: 10px;
    margin-top: 10px;
    border-radius: 8px;
    border: none;
}

button {
    margin-top: 15px;
    padding: 10px;
    width: 100%;
    border: none;
    border-radius: 8px;
    background: #38bdf8;
    font-weight: bold;
    cursor: pointer;
}

.result {
    margin-top: 15px;
    background: #0f172a;
    padding: 10px;
    border-radius: 10px;
}
</style>

</head>
<body>

<div class="card">
    <h2>🔤 Fungsi String</h2>

    <form method="POST">
        <input type="text" name="nama" placeholder="Masukkan nama..." required>
        <button type="submit" name="proses">Proses</button>
    </form>

    <?php if($hasil != ""){ ?>
    <div class="result">
        <p>Nama: <strong><?php echo $hasil; ?></strong></p>
        <p>Jumlah karakter: <strong><?php echo $jumlah; ?></strong></p>
    </div>
    <?php } ?>
</div>

</body>
</html>
