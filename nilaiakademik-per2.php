<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Premium Academic System</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        :root {
            --dark: #121417; /* Hitam Berkelas */
            --accent: #d4af37; /* Gold/Emas */
            --slate: #1e2126; /* Abu-abu Gelap */
            --text-light: #f8fafc;
            --text-dim: #94a3b8;
        }

        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Plus Jakarta Sans', sans-serif; }

        body {
            background-color: var(--dark);
            background-image: radial-gradient(circle at 2px 2px, #25292e 1px, transparent 0);
            background-size: 40px 40px;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
            color: var(--text-light);
        }

        .dashboard {
            display: grid;
            grid-template-columns: 1.3fr 0.7fr;
            max-width: 1100px;
            width: 100%;
            background: var(--slate);
            border-radius: 30px;
            overflow: hidden;
            border: 1px solid rgba(212, 175, 55, 0.2);
            box-shadow: 0 40px 100px rgba(0, 0, 0, 0.5);
        }

        /* SISI KIRI: FORM */
        .input-side {
            padding: 50px;
            background: var(--slate);
        }

        .main-title {
            margin-bottom: 35px;
            border-left: 4px solid var(--accent);
            padding-left: 20px;
        }

        .main-title h1 {
            font-size: 22px;
            font-weight: 800;
            letter-spacing: -0.5px;
            color: var(--text-light);
            text-transform: uppercase;
        }

        .main-title p {
            font-size: 13px;
            color: var(--accent);
            font-weight: 600;
            margin-top: 5px;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin-bottom: 20px;
        }

        .input-group { margin-bottom: 20px; }
        
        .input-group label {
            display: block;
            font-size: 11px;
            font-weight: 700;
            color: var(--text-dim);
            margin-bottom: 8px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        input {
            width: 100%;
            padding: 14px;
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 12px;
            font-size: 14px;
            color: white;
            transition: 0.3s;
        }

        input:focus {
            outline: none;
            border-color: var(--accent);
            background: rgba(255, 255, 255, 0.07);
        }

        button {
            width: 100%;
            background: var(--accent);
            color: var(--dark);
            padding: 18px;
            border: none;
            border-radius: 14px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 1px;
            cursor: pointer;
            margin-top: 15px;
            transition: 0.4s;
        }

        button:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(212, 175, 55, 0.3);
            filter: brightness(1.1);
        }

        /* SISI KANAN: RESULT */
        .result-side {
            background: #16191d;
            padding: 40px;
            border-left: 1px solid rgba(255, 255, 255, 0.05);
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .result-card {
            text-align: center;
            animation: fadeIn 0.8s ease;
        }

        @keyframes fadeIn {
            from { opacity: 0; scale: 0.9; }
            to { opacity: 1; scale: 1; }
        }

        .grade-circle {
            width: 120px;
            height: 120px;
            border: 4px solid var(--accent);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            font-size: 50px;
            font-weight: 800;
            color: var(--accent);
            box-shadow: 0 0 30px rgba(212, 175, 55, 0.1);
        }

        .status-tag {
            font-weight: 700;
            letter-spacing: 2px;
            margin-bottom: 30px;
            font-size: 14px;
        }

        .data-list {
            text-align: left;
            background: rgba(255,255,255,0.03);
            padding: 20px;
            border-radius: 15px;
        }

        .data-item {
            display: flex;
            justify-content: space-between;
            font-size: 13px;
            padding: 10px 0;
            border-bottom: 1px solid rgba(255,255,255,0.05);
        }

        .data-item:last-child { border: none; }
        .label { color: var(--text-dim); }
        .val { color: var(--text-light); font-weight: 600; }

        @media (max-width: 900px) {
            .dashboard { grid-template-columns: 1fr; }
            .result-side { border-left: none; border-top: 1px solid rgba(255, 255, 255, 0.05); }
        }
    </style>
</head>
<body>

<div class="dashboard">
    <div class="input-side">
        <div class="main-title">
            <h1>Kalkulator Perhitungan Nilai Akademik</h1>
            <p><i class="fas fa-code"></i> Menggunakan Logika Struktur If Else</p>
        </div>

        <form method="POST">
            <div class="input-group">
                <label>Nama Mahasiswa</label>
                <input type="text" name="nama" required placeholder="Masukkan Nama Lengkap">
            </div>

            <div class="form-row">
                <div class="input-group">
                    <label>NIM</label>
                    <input type="text" name="nim" required placeholder="Contoh: 2400123">
                </div>
                <div class="input-group">
                    <label>Program Studi</label>
                    <input type="text" name="prodi" required placeholder="Informatika">
                </div>
            </div>

            <div class="input-group">
                <label>Mata Kuliah</label>
                <input type="text" name="matkul" required placeholder="Pemrograman Web Dasar">
            </div>

            <div class="form-row">
                <div class="input-group">
                    <label>Absensi (Max 18)</label>
                    <input type="number" name="hadir" max="18" required>
                </div>
                <div class="input-group">
                    <label>Tugas (0-100)</label>
                    <input type="number" name="tugas" max="100" required>
                </div>
            </div>

            <div class="form-row">
                <div class="input-group">
                    <label>Nilai UTS</label>
                    <input type="number" name="uts" max="100" required>
                </div>
                <div class="input-group">
                    <label>Nilai UAS</label>
                    <input type="number" name="uas" max="100" required>
                </div>
            </div>

            <button type="submit" name="hitung">Kalkulasi Nilai <i class="fas fa-chevron-right"></i></button>
        </form>
    </div>

    <div class="result-side">
        <?php
        if (isset($_POST['hitung'])) {
            $nama = htmlspecialchars($_POST['nama']);
            $nim = htmlspecialchars($_POST['nim']);
            $matkul = htmlspecialchars($_POST['matkul']);
            $n_hadir = ($_POST['hadir'] / 18) * 100;
            $n_tugas = $_POST['tugas'];
            $n_uts = $_POST['uts'];
            $n_uas = $_POST['uas'];

            // Rumus: 10% Hadir, 20% Tugas, 30% UTS, 40% UAS
            $skor = ($n_hadir * 0.1) + ($n_tugas * 0.2) + ($n_uts * 0.3) + ($n_uas * 0.4);

            // LOGIKA IF ELSE
            if ($skor >= 85) { $grade = "A"; $status = "EXCELLENT"; $scol = "#d4af37"; }
            elseif ($skor >= 75) { $grade = "B"; $status = "GOOD JOB"; $scol = "#4facfe"; }
            elseif ($skor >= 65) { $grade = "C"; $status = "PASSED"; $scol = "#2ecc71"; }
            elseif ($skor >= 50) { $grade = "D"; $status = "RETAKE"; $scol = "#f39c12"; }
            else { $grade = "E"; $status = "FAILED"; $scol = "#e74c3c"; }
        ?>

            <div class="result-card">
                <div class="grade-circle"><?php echo $grade; ?></div>
                <div class="status-tag" style="color: <?php echo $scol; ?>"><?php echo $status; ?></div>
                
                <div class="data-list">
                    <div class="data-item"><span class="label">Nama</span><span class="val"><?php echo $nama; ?></span></div>
                    <div class="data-item"><span class="label">NIM</span><span class="val"><?php echo $nim; ?></span></div>
                    <div class="data-item"><span class="label">Mata Kuliah</span><span class="val"><?php echo $matkul; ?></span></div>
                    <div class="data-item"><span class="label">Skor Akhir</span><span class="val"><?php echo number_format($skor, 2); ?></span></div>
                </div>
                
                <p style="font-size: 10px; color: var(--text-dim); margin-top: 20px;">DIHASILKAN OLEH SISTEM ENGINE PHP 8.0</p>
            </div>

        <?php } else { ?>
            <div style="text-align: center; opacity: 0.3;">
                <i class="fas fa-shield-halved" style="font-size: 50px; margin-bottom: 15px;"></i>
                <p style="font-size: 12px; font-weight: 700;">WAITING FOR DATA</p>
            </div>
        <?php } ?>
    </div>
</div>

</body>
</html>