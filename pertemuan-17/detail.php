<?php
include 'koneksi.php';

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Cari produk berdasarkan ID
$query = "SELECT * FROM produk WHERE id = $id";
$result = mysqli_query($conn, $query);
$produk = mysqli_fetch_assoc($result);

if (!$produk) {
    header("Location: catalog.php");
    exit;
}

// PROSES MENANAMKAN COOKIES (Masa aktif 1 Jam)
setcookie("terakhir_dilihat_id", $produk['id'], time() + 3600, "/");
setcookie("terakhir_dilihat_nama", $produk['nama'], time() + 3600, "/");
setcookie("terakhir_dilihat_harga", $produk['harga'], time() + 3600, "/");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $produk['nama']; ?> - Detail</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <style>
        body {
            background-color: #0b0f19;
            color: #f3f4f6;
            font-family: system-ui, -apple-system, sans-serif;
        }
        .glass-card {
            background: rgba(17, 24, 39, 0.7);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.08);
        }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center p-6">

    <div class="max-w-4xl w-full glass-card rounded-3xl overflow-hidden shadow-2xl grid grid-cols-1 md:grid-cols-2">
        <div class="h-64 md:h-full relative min-h-[300px] bg-gray-900">
            <img src="<?php echo $produk['gambar']; ?>" alt="<?php echo $produk['nama']; ?>" class="w-full h-full object-cover">
        </div>
        
        <div class="p-8 md:p-12 flex flex-col justify-between">
            <div>
                <a href="catalog.php" class="inline-flex items-center text-xs font-semibold text-cyan-400 hover:text-cyan-300 gap-1 mb-6 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Kembali ke Katalog
                </a>
                <span class="block text-[10px] font-bold tracking-widest text-cyan-400 uppercase mb-2"><?php echo $produk['kategori']; ?></span>
                <h1 class="text-2xl font-extrabold text-white mb-4"><?php echo $produk['nama']; ?></h1>
                <p class="text-2xl font-black text-white mb-6">Rp <?php echo number_format($produk['harga'], 0, ',', '.'); ?></p>
                <p class="text-sm text-gray-400 leading-relaxed mb-6"><?php echo $produk['deskripsi']; ?></p>
            </div>
            
            <div class="pt-6 border-t border-gray-800 flex gap-4">
                <button class="flex-1 py-3 text-center text-sm font-bold bg-gradient-to-r from-cyan-500 to-blue-600 hover:from-cyan-400 hover:to-blue-500 text-white rounded-xl transition duration-300 shadow-lg shadow-blue-900/30">
                    Beli Sekarang
                </button>
            </div>
        </div>
    </div>

</body>
</html>