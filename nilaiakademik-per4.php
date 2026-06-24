<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Akademik - Pertemuan 4 (Switch Case)</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        :root {
            --bg-dark: #0a0c10;
            --glass: rgba(255, 255, 255, 0.03);
            --neon: #00f2fe;
            --text: #e2e8f0;
        }

        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Space Grotesk', sans-serif; }

        body {
            background: var(--bg-dark);
            background-image: 
                radial-gradient(at 0% 0%, rgba(0, 242, 254, 0.15) 0, transparent 50%), 
                radial-gradient(at 100% 100%, rgba(79, 172, 254, 0.15) 0, transparent 50%);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            color: var(--text);
            padding: 20px;
        }

        .container {
            display: grid;
            grid-template-columns: 1fr 1fr;
            max-width: 1100px;
            width: 100%;
            gap: 30px;
            animation: fadeIn 0.8s ease-out;
        }

        @keyframes fadeIn { from { opacity: 0; transform: translateY(20px); } to { opacity: 1; transform: translateY(0); } }

        /* SISI KIRI: FORM CASE */
        .card-input {
            background: var(--glass);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            padding: 40px;
            border-radius: 30px;
        }

        .card-input h2 {
            font-size: 28px;
            margin-bottom: 5px;
            background: linear-gradient(to right, #fff, var(--neon));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .card-input p { font-size: 13px; color: #888; margin-bottom: 30px; }

        .input-box { position: relative; margin-bottom: 20px; }
        .input-box i { position: absolute; left: 15px; top: 50%; transform: translateY(-50%); color: var(--neon); font-size: 14px; }
        
        input {
            width: 100%;
            padding: 14px 14px 14px 45px;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 12px;
            color: white;
            transition: 0.3s;
        }

        input:focus {
            border-color: var(--neon);
            outline: none;
            background: rgba(255, 255, 255, 0.08);
            box-shadow: 0 0 15px rgba(0, 242, 254, 0.2);
        }

        button {
            width: 100%;
            padding: 16px;
            background: linear-gradient(90deg, #4facfe 0%, #00f2fe 100%);
            border: none;
            border-radius: 12px;
            color: #0a0c10;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            cursor: pointer;
            transition: 0.3s;
        }

        button:hover { transform: scale(1.02); box-shadow: 0 0 25px rgba(0, 242, 254, 0.4); }

        /* SISI KANAN: HASIL SWITCH */
        .card-output {
            background: rgba(0, 0, 0, 0.4);
            border: 2px dashed rgba(0, 242, 254, 0.2);
            padding: 40px;
            border-radius: 30px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        .grade-box {
            font-size: 80px;
            font-weight: 800;
            color: var(--neon);
            text-shadow: 0 0 30px rgba(0, 242, 254, 0.5);
            margin-bottom: 10px;
        }

        .status-badge {
            padding: 8px 25px;
            border-radius: 50px;
            font-weight: 700;
            font-size: 12px;
            letter-spacing: 2px;
            margin-bottom: 30px;
            border: 1px solid;
        }

        .details { width: 100%; text-align: left; }
        .row { display: flex; justify-content: space-between; padding: 10px 0; border-bottom: 1px solid rgba(255,255,255,0.05); font-size: 14px; }
        .row span { color: #888; }
        .row b { color: var(--text); }

        @media (max-width: 850px) {
            .container { grid-template-columns: 1fr; }
        }
    </style>
</head>
<body>

<div class="container">
    <div class="card-input">
        <h2>Academic System</h2>
        <p>Pertemuan 4: Implementasi Logic Switch Case</p>

        <form method="POST">
            <div class="input-box">
                <i class="fas fa-user"></i>
                <input type="text" name="nama" placeholder="Nama Mahasiswa" required>
            </div>
            <div class="input-box">
                <i class="fas fa-fingerprint"></i>
                <input type="text" name="nim" placeholder="NIM" required>
            </div>
            <div class="input-box">
                <i class="fas fa-book"></i>
                <input type="text" name="matkul" placeholder="Mata Kuliah" required>
            </div>
            <div style="display:grid; grid-template-columns:1fr 1fr; gap:15px;">
                <div class="input-box">
                    <i class="fas fa-calendar-check"></i>
                    <input type="number" name="hadir" placeholder="Hadir (0-18)" required>
                </div>
                <div class="input-box">
                    <i class="fas fa-tasks"></i>
                    <input type="number" name="tugas" placeholder="Tugas" required>
                </div>
            </div>
            <div style="display:grid; grid-template-columns:1fr 1fr; gap:15px;">
                <div class="input-box">
                    <i class="fas fa-file-signature"></i>
                    <input type="number" name="uts" placeholder="UTS" required>
                </div>
                <div class="input-box">
                    <i class="fas fa-graduation-cap"></i>
                    <input type="number" name="uas" placeholder="UAS" required>
                </div>
            </div>
            <button type="submit" name="submit">Analyze Performance <i class="fas fa-bolt"></i></button>
        </form>
    </div>

    <div class="card-output">
        <?php
        if (isset($_POST['submit'])) {
            $nama = htmlspecialchars($_POST['nama']);
            $nim = htmlspecialchars($_POST['nim']);
            $matkul = htmlspecialchars($_POST['matkul']);
            $n_hadir = ($_POST['hadir'] / 18) * 100;
            $n_tugas = $_POST['tugas'];
            $n_uts = $_POST['uts'];
            $n_uas = $_POST['uas'];

            $akhir = ($n_hadir * 0.1) + ($n_tugas * 0.2) + ($n_uts * 0.3) + ($n_uas * 0.4);

            // LOGIKA SWITCH CASE UNTUK GRADE
            $kategori = floor($akhir / 10);
            switch ($kategori) {
                case 10:
                case 9:
                case 8:  $grade = "A"; $color = "#00f2fe"; break;
                case 7:  $grade = "B"; $color = "#4facfe"; break;
                case 6:  $grade = "C"; $color = "#f9d423"; break;
                case 5:  $grade = "D"; $color = "#ff4e50"; break;
                default: $grade = "E"; $color = "#f80759";
            }

            // LOGIKA SWITCH CASE UNTUK STATUS
            switch ($grade) {
                case "A":
                case "B":
                case "C": $status = "PASSED"; $bg = "rgba(0, 242, 254, 0.1)"; break;
                default:  $status = "FAILED"; $bg = "rgba(248, 7, 89, 0.1)";
            }
        ?>
            <div class="grade-box" style="color: <?php echo $color; ?>"><?php echo $grade; ?></div>
            <div class="status-badge" style="color: <?php echo $color; ?>; border-color: <?php echo $color; ?>; background: <?php echo $bg; ?>">
                <?php echo $status; ?>
            </div>

            <div class="details">
                <div class="row"><span>Nama</span><b><?php echo $nama; ?></b></div>
                <div class="row"><span>NIM</span><b><?php echo $nim; ?></b></div>
                <div class="row"><span>Mata Kuliah</span><b><?php echo $matkul; ?></b></div>
                <div class="row"><span>Skor Akhir</span><b><?php echo number_format($akhir, 2); ?></b></div>
            </div>
        <?php } else { ?>
            <i class="fas fa-microchip" style="font-size: 60px; color: rgba(255,255,255,0.1); margin-bottom: 20px;"></i>
            <h3 style="color: rgba(255,255,255,0.4);">Awaiting Data Analysis</h3>
            <p style="color: rgba(255,255,255,0.2); font-size: 12px; margin-top: 10px;">Input data nilai mahasiswa untuk memulai kalkulasi Switch Case.</p>
        <?php } ?>
    </div>
</div>

</body>
</html>