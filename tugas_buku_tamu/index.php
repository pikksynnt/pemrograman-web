<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enterprise Guestbook - Core v1.0</title>
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <style>
        body {
            background-color: #030712;
            color: #f3f4f6;
            font-family: ui-sans-serif, system-ui, -apple-system, sans-serif;
        }
        .glass-panel {
            background: rgba(17, 24, 39, 0.35);
            backdrop-filter: blur(24px);
            -webkit-backdrop-filter: blur(24px);
            border: 1px solid rgba(255, 255, 255, 0.05);
        }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center p-6 antialiased selection:bg-cyan-500 selection:text-black">

    <div class="max-w-md w-full glass-panel rounded-3xl p-8 shadow-2xl relative overflow-hidden border border-gray-900">
        <div class="absolute -top-12 -right-12 w-40 h-40 bg-cyan-500/10 rounded-full blur-3xl pointer-events-none"></div>
        <div class="absolute -bottom-12 -left-12 w-40 h-40 bg-blue-500/5 rounded-full blur-3xl pointer-events-none"></div>

        <header class="mb-8 border-b border-gray-900/60 pb-5">
            <div class="flex items-center gap-2.5">
                <div class="w-2.5 h-2.5 rounded-full bg-cyan-400 shadow-[0_0_12px_rgba(6,182,212,1)]"></div>
                <h1 class="text-md font-bold tracking-wider text-white uppercase font-mono">Guestbook.Core</h1>
            </div>
            <p class="text-xs text-gray-500 mt-1">Registrasi pencatatan log kunjungan tamu digital</p>
        </header>

        <form action="proses.php" method="POST" class="space-y-5">
            <div>
                <label class="block text-[10px] font-bold font-mono uppercase tracking-widest text-gray-400 mb-1.5">Nama Lengkap</label>
                <input type="text" name="nama" placeholder="Ketik nama Anda di sini..." required 
                       class="w-full bg-gray-950/60 border border-gray-800 focus:border-cyan-500/40 rounded-xl px-4 py-2.5 text-xs text-white transition duration-200 outline-none shadow-inner">
            </div>

            <div>
                <label class="block text-[10px] font-bold font-mono uppercase tracking-widest text-gray-400 mb-1.5">Alamat Email</label>
                <input type="email" name="email" placeholder="contoh@domain.com" required 
                       class="w-full bg-gray-950/60 border border-gray-800 focus:border-cyan-500/40 rounded-xl px-4 py-2.5 text-xs text-white transition duration-200 outline-none shadow-inner">
            </div>

            <div>
                <label class="block text-[10px] font-bold font-mono uppercase tracking-widest text-gray-400 mb-1.5">Komentar / Feedback</label>
                <textarea name="komentar" rows="4" placeholder="Tuliskan pesan atau kesan kunjungan Anda..." required 
                          class="w-full bg-gray-950/60 border border-gray-800 focus:border-cyan-500/40 rounded-xl px-4 py-2.5 text-xs text-white transition duration-200 outline-none shadow-inner resize-none"></textarea>
            </div>
            
            <div class="pt-2">
                <button type="submit" name="simpan" 
                        class="w-full py-3.5 text-center text-xs font-bold font-mono bg-cyan-500 hover:bg-cyan-400 text-black rounded-xl transition duration-200 shadow-lg shadow-cyan-950/40 cursor-pointer uppercase tracking-wider">
                    Commit_Log_Data
                </button>
            </div>
        </form>

        <footer class="mt-8 pt-4 border-t border-gray-900/60 flex justify-between items-center text-[9px] font-mono text-gray-600">
            <span>Storage Target:</span>
            <span class="text-cyan-500/70 bg-gray-950 px-2 py-0.5 rounded border border-gray-900">bukutamu.dat</span>
        </footer>
    </div>

</body>
</html>