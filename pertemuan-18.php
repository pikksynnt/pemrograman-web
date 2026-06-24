<?php
echo "<h1>Jawaban Latihan Soal Pertemuan 18 - Error Handling</h1>";
echo "<hr>";
echo "<h2>Soal 1: Pesan Kesalahan Program PHP</h2>";
$nama = "Budi"; 
echo "<p><strong>1. Parse Error Solved:</strong> Nama saya adalah " . $nama . "</p>";
ob_start();
$redirect_kondisi = false;
if ($redirect_kondisi) {
    header("Location: catalog.php");
    exit;
}
echo "<p><strong>2. Header Error Solved:</strong> Fungsi header dipisahkan dari output awal atau menggunakan ob_start().</p>";
function hitung_total_karakter($str) {
    return strlen($str);
}
echo "<p><strong>3. Undefined Function Solved:</strong> Total karakter: " . hitung_total_karakter("Unpam") . "</p>";

echo "<hr>";
echo "<h2>Soal 2: Pesan Kesalahan Pembuatan Database (SQL Script)</h2>";
$sql_db = "CREATE DATABASE IF NOT EXISTS db_latihan18;";
echo "<pre><strong>1. Database Exists Solved:</strong>\n" . $sql_db . "</pre>";
$host = "localhost"; $user = "root"; $pass = ""; $db = "db_latihan18";
$conn = @mysqli_connect($host, $user, $pass, $db);
if (!$conn) {
    $solusi_koneksi = "Periksa konfigurasi config/koneksi Anda, pastikan user adalah root.";
} else {
    $solusi_koneksi = "Koneksi database berhasil dan aman.";
}
echo "<p><strong>2. Access Denied Solved:</strong> Status Koneksi -> " . $solusi_koneksi . "</p>";
$sql_table = "CREATE TABLE IF NOT EXISTS tbl_berita (
    id_berita INT AUTO_INCREMENT PRIMARY KEY,
    judul VARCHAR(255) NOT NULL
);";
echo "<pre><strong>3. Table Not Found Solved:</strong>\n" . $sql_table . "</pre>";

echo "<hr>";
echo "<h2>Soal 3: Pesan Kesalahan Penyimpanan & Perhitungan Database</h2>";

$sql_insert_solve = "INSERT INTO produk (nama, harga) VALUES ('Keyboard Gasket', 1200000); 
INSERT INTO produk (id, nama) VALUES (1, 'Keyboard') ON DUPLICATE KEY UPDATE nama='Keyboard';";
echo "<pre><strong>1. Duplicate Entry Solved:</strong>\n" . $sql_insert_solve . "</pre>";

$sql_alter_solve = "ALTER TABLE produk MODIFY COLUMN kategori VARCHAR(100) NOT NULL;";
echo "<pre><strong>2. Data Too Long Solved:</strong>\n" . $sql_alter_solve . "</pre>";

$total_harga = 50000;
$jumlah_item = 0; 
if ($jumlah_item > 0) {
    $rata_rata = $total_harga / $jumlah_item;
} else {
    $rata_rata = 0; 
}
echo "<p><strong>3. Division by Zero Solved:</strong> Hasil pembagian aman, Nilai rata-rata = " . $rata_rata . "</p>";

?>