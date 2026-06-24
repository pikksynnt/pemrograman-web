<?php
include 'koneksi.php';

// Mengambil semua data produk dari database baru
$query = "SELECT * FROM produk";
$result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Premium Store - db_latihan17</title>
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
<body class="min-h-screen p-6 md:p-12">

    <div class="max-w-6xl mx-auto">
        <header class="flex justify-between items-center mb-12 border-b border-gray-800 pb-6">
            <div>
                <h1 class="text-3xl font-extrabold tracking-tight bg-gradient-to-r from-cyan-400 to-blue-500 bg-clip-text text-transparent">Latihan17.io</h1>
                <p class="text-sm text-gray-400 mt-1">Implementasi Cookies & Database Baru</p>
            </div>
            <div class="text-xs px-3 py-1.5 rounded-full bg-cyan-500/10 text-cyan-400 border border-cyan-500/20 font-medium">
                DB: db_latihan17
            </div>
        </header>

        <?php if (isset($_COOKIE['terakhir_dilihat_nama'])): ?>
            <section class="mb-12 p-6 rounded-2xl glass-card relative overflow-hidden border border-cyan-500/30 shadow-lg shadow-cyan-950/20">
                <div class="absolute -top-10 -right-10 w-32 h-32 bg-cyan-500/10 rounded-full blur-2xl"></div>
                <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                    <div class="flex items-center gap-4">
                        <div class="p-3 bg-cyan-500/10 text-cyan-400 rounded-xl border border-cyan-500/20">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div>
                            <span class="text-xs font-semibold uppercase tracking-wider text-cyan-400">Terakhir Anda Lihat</span>
                            <h3 class="text-lg font-bold text-white mt-0.5">Tertarik dengan produk ini lagi?</h3>
                            <p class="text-sm text-gray-300">
                                <?php echo htmlspecialchars($_COOKIE['terakhir_dilihat_nama']); ?> - 
                                <span class="text-cyan-400 font-semibold">Rp <?php echo number_format($_COOKIE['terakhir_dilihat_harga'], 0, ',', '.'); ?></span>
                            </p>
                        </div>
                    </div>
                    <a href="detail.php?id=<?php echo $_COOKIE['terakhir_dilihat_id']; ?>" class="w-full sm:w-auto px-5 py-2.5 text-center text-sm font-medium bg-gradient-to-r from-cyan-500 to-blue-600 hover:from-cyan-400 hover:to-blue-500 text-white rounded-xl transition duration-300 shadow-md shadow-blue-900/30">
                        Buka Detail
                    </a>
                </div>
            </section>
        <?php endif; ?>

        <main>
            <h2 class="text-xl font-bold mb-6 text-gray-200">Daftar Produk</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <?php while($row = mysqli_fetch_assoc($result)): ?>
                    <div class="rounded-2xl glass-card overflow-hidden flex flex-col group hover:border-gray-700 transition duration-300">
                        <div class="h-48 overflow-hidden bg-gray-900 relative">
                            <img src="<?php echo $row['gambar']; ?>" alt="<?php echo $row['nama']; ?>" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                            <span class="absolute top-3 left-3 text-[10px] uppercase font-bold tracking-widest bg-gray-900/80 backdrop-blur-md text-gray-300 px-2.5 py-1 rounded-md border border-gray-700/50">
                                <?php echo $row['kategori']; ?>
                            </span>
                        </div>
                        <div class="p-6 flex flex-col flex-grow">
                            <h3 class="text-base font-bold text-white group-hover:text-cyan-400 transition mb-2">
                                <?php echo $row['nama']; ?>
                            </h3>
                            <p class="text-xs text-gray-400 line-clamp-2 mb-4 flex-grow">
                                <?php echo $row['deskripsi']; ?>
                            </p>
                            <div class="flex justify-between items-center pt-4 border-t border-gray-800/80 mt-auto">
                                <span class="text-base font-extrabold text-white">
                                    Rp <?php echo number_format($row['harga'], 0, ',', '.'); ?>
                                </span>
                                <a href="detail.php?id=<?php echo $row['id']; ?>" class="px-4 py-2 text-xs font-semibold bg-gray-800 hover:bg-gray-700 text-gray-200 rounded-lg border border-gray-700 transition duration-300">
                                    Detail Produk
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </main>
    </div>

</body>
</html>