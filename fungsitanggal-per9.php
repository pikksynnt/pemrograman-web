<?php
date_default_timezone_set("Asia/Jakarta");

// Ambil hari
$hari = date("l");

$hariIndo = [
    "Sunday"=>"Minggu",
    "Monday"=>"Senin",
    "Tuesday"=>"Selasa",
    "Wednesday"=>"Rabu",
    "Thursday"=>"Kamis",
    "Friday"=>"Jumat",
    "Saturday"=>"Sabtu"
];

// Format tanggal & waktu
$tanggal = date("d-m-Y");
$waktu = date("H:i:s");

// Nama
$nama = "Suprianto";
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Fungsi Tanggal</title>

<style>
body {
    font-family: 'Segoe UI';
    background: linear-gradient(135deg, #0f172a, #1e293b);
    color: #fff;
    text-align: center;
    padding-top: 100px;
}

.card {
    background: #1e293b;
    padding: 30px;
    border-radius: 15px;
    width: 320px;
    margin: auto;
    box-shadow: 0 10px 30px rgba(0,0,0,0.3);
}

h2 {
    margin-bottom: 15px;
}

p {
    margin: 8px 0;
}
</style>

</head>
<body>

<div class="card">
    <h2>📅 Informasi Hari Ini</h2>

    <p><strong>Nama:</strong> <?php echo $nama; ?></p>
    <p><strong>Hari:</strong> <?php echo $hariIndo[$hari]; ?></p>
    <p><strong>Tanggal:</strong> <?php echo $tanggal; ?></p>
    <p><strong>Waktu:</strong> <?php echo $waktu; ?></p>
</div>

</body>
</html>
