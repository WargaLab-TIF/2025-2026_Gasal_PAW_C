<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biodata Fleksibel (Input Submit)</title>
    <style>
        /* CSS Sederhana untuk Tampilan */
        body { font-family: Arial, sans-serif; margin: 20px; background-color: #f4f4f4; }
        .container { max-width: 600px; margin: 0 auto; padding: 25px; background: white; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        h1 { text-align: center; color: #333; }
        
        /* Gaya Formulir */
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input[type="text"] { width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; }
        button { 
            background-color: #007bff; 
            color: white; 
            padding: 10px 15px; 
            border: none; 
            border-radius: 4px; 
            cursor: pointer;
            width: 100%;
            margin-top: 10px;
        }
        button:hover { background-color: #0056b3; }

        /* Gaya Area Hasil */
        #biodata-hasil { 
            margin-top: 20px; 
            padding: 15px; 
            border: 1px solid #007bff; 
            border-radius: 4px; 
            background-color: #e6f7ff; 
            display: none; /* Awalnya disembunyikan */
        }
        #biodata-hasil h2 { margin-top: 0; color: #007bff; }
        .detail-item { margin-bottom: 8px; }
        .detail-item strong { display: inline-block; width: 100px; }
    </style>
</head>
<body>

    <div class="container">
        <h1>Input Biodata Variabel</h1>
        
        <form id="biodataForm">
            <div class="form-group">
                <label for="inputNama">Nama:</label>
                <input type="text" id="inputNama" required>
            </div>
            <div class="form-group">
                <label for="inputUsia">Usia:</label>
                <input type="text" id="inputUsia">
            </div>
            <div class="form-group">
                <label for="inputKota">Kota:</label>
                <input type="text" id="inputKota">
            </div>
            
            <button type="submit">Tampilkan Biodata</button>
        </form>

        <div id="biodata-hasil">
            <h2>Detail Biodata</h2>
            <div class="detail-item"><strong>Nama:</strong> <span id="outputNama">...</span></div>
            <div class="detail-item"><strong>Usia:</strong> <span id="outputUsia">...</span></div>
            <div class="detail-item"><strong>Kota:</strong> <span id="outputKota">...</span></div>
        </div>
    </div>

    <script>
        // --- Logika JavaScript ---
        
        // 1. Dapatkan elemen formulir dan tambahkan event listener
        document.getElementById('biodataForm').addEventListener('submit', function(event) {
            
            // Menghentikan aksi default submit (agar halaman tidak refresh)
            event.preventDefault(); 

            // 2. Ambil nilai dari input formulir
            // Menggunakan || 'Tidak Diisi' sebagai nilai default jika input kosong
            const nama = document.getElementById('inputNama').value || 'Tidak Diisi';
            const usia = document.getElementById('inputUsia').value || 'Tidak Diisi';
            const kota = document.getElementById('inputKota').value || 'Tidak Diisi';

            // 3. Tampilkan nilai ke area hasil biodata
            document.getElementById('outputNama').textContent = nama;
            document.getElementById('outputUsia').textContent = usia;
            document.getElementById('outputKota').textContent = kota;

            // 4. Tampilkan area hasil biodata
            document.getElementById('biodata-hasil').style.display = 'block';
        });
    </script>

</body>
</html>
