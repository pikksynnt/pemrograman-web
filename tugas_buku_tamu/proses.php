<?php
if (isset($_POST['simpan'])) {
    $nama     = $_POST['nama'];
    $email    = $_POST['email'];
    $komentar = $_POST['komentar'];
    
    // Format teks data yang akan disimpan ke dalam file teks (.dat)
    $data_tamu = "Nama: $nama | Email: $email | Komentar: $komentar\n";
    
    // Proses penulisan data ke berkas bukutamu.dat (FILE_APPEND agar data tidak menimpa data lama)
    file_put_contents("bukutamu.dat", $data_tamu, FILE_APPEND);
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log Success</title>
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <style>
        body { background-color: #030712; color: #f3f4f6; font-family: ui-sans-serif, system-ui, sans-serif; }
        .glass-panel { background: rgba(17, 24, 39, 0.35); backdrop-filter: blur(24px); border: 1px solid rgba(255, 255, 255, 0.05); }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center p-6">

    <div class="max-w-sm w-full glass-panel rounded-3xl p-6 text-center border border-gray-900">
        <div class="w-10 h-10 rounded-full bg-green-500/10 border border-green-500/20 text-green-400 flex items-center justify-center mx-auto mb-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
            </svg>
        </div>
        <h3 class="text-sm font-bold font-mono text-white uppercase tracking-wider">Log Commit Success</h3>
        <p class="text-xs text-gray-400 mt-2">Data kunjungan Anda berhasil diproses dan dienkapsulasi ke dalam file <code class="text-cyan-400 font-mono">bukutamu.dat</code>.</p>
        
        <a href="bukutamu.php" class="inline-block mt-6 px-4 py-2 text-xs font-bold font-mono bg-gray-900 hover:bg-gray-800 text-gray-300 rounded-xl border border-gray-800 transition">
            RETURN_BACK
        </a>
    </div>

</body>
</html>