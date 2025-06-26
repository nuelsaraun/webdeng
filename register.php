<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Pendaftaran Pasien</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f4f9; display: flex; justify-content: center; align-items: center; min-height: 100vh; padding: 20px; }
        .container { background: #fff; padding: 30px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); width: 100%; max-width: 500px; }
        h2 { text-align: center; color: #333; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input, textarea, select { width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px; box-sizing: border-box; }
        button { width: 100%; background-color: #007bff; color: white; padding: 12px; border: none; border-radius: 4px; cursor: pointer; font-size: 16px; }
        button:hover { background-color: #0056b3; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Pendaftaran Pasien Online</h2>
        <form method="POST" action="generate_qrcode.php">
            <div class="form-group">
                <label>Nama Lengkap</label>
                <input type="text" name="name" required placeholder="Masukkan nama lengkap">
            </div>
            <div class="form-group">
                <label>No. HP</label>
                <input type="text" name="phone" required placeholder="08xxxxxxxxxx">
            </div>
            <div class="form-group">
                <label>Tanggal Lahir</label>
                <input type="date" name="dob" required>
            </div>
            <div class="form-group">
                <label>Alamat</label>
                <textarea name="address" required placeholder="Masukkan alamat lengkap"></textarea>
            </div>
            <div class="form-group">
                <label>Keluhan</label>
                <textarea name="complaint" required placeholder="Jelaskan keluhan yang dialami"></textarea>
            </div>
            <div class="form-group">
                <label>Dokter</label>
                <select name="dokter" required>
                    <option value="">-- Pilih Dokter --</option>
                    <option value="dr. Andi, Sp.KJ">dr. Andi, Sp.KJ</option>
                    <option value="dr. Maria, Sp.A">dr. Maria, Sp.A</option>
                    <option value="dr. Budi, Umum">dr. Budi, Umum</option>
                </select>
            </div>
            <div class="form-group">
                <label>Jadwal</label>
                <select name="jadwal" required>
                    <option value="">-- Pilih Jadwal --</option>
                    <option value="Senin - 08:00 s/d 09:00">Senin - 08:00 s/d 09:00</option>
                    <option value="Selasa - 08:00 s/d 09:00">Selasa - 08:00 s/d 09:00</option>
                </select>
            </div>
            <button type="submit">Daftar & Dapatkan QR Code</button>
        </form>
    </div>
</body>
</html>