<!DOCTYPE html>
<html>
<head>
    <title>Tambah Data Alat</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .btn-kembali { text-decoration: none; color: #008CBA; font-weight: bold; }
        table { margin-top: 20px; border-collapse: collapse; width: 40%; }
        td { padding: 10px; }
        input[type=text], input[type=number] { width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; }
        input[type=submit] { background-color: #4CAF50; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer; font-weight: bold; }
        input[type=submit]:hover { background-color: #45a049; }
    </style>
</head>
<body>

    <a href="index.php" class="btn-kembali">&laquo; Kembali ke Daftar Alat</a>

    <h3>Formulir Tambah Alat Baru</h3>

    <!-- Ini adalah tempat pengisian data (Form) -->
    <form action="add.php" method="post" name="form_tambah">
        <table border="0">
            <tr> 
                <td>Nama Alat</td>
                <td><input type="text" name="nama_alat" placeholder="Contoh: Stetoskop" required></td>
            </tr>
            <tr> 
                <td>Tahun</td>
                <td><input type="number" name="tahun" placeholder="Contoh: 2024" required></td>
            </tr>
            <tr> 
                <td>Merek</td>
                <td><input type="text" name="merek" placeholder="Contoh: Gea" required></td>
            </tr>
            <tr> 
                <td>Lokasi</td>
                <td><input type="text" name="lokasi" placeholder="Contoh: Ruang IGD" required></td>
            </tr>
            <tr> 
                <td></td>
                <td><input type="submit" name="Submit" value="Simpan Data"></td>
            </tr>
        </table>
    </form>
    
    <?php
    // Menangkap data jika tombol Simpan Data di-klik
    if(isset($_POST['Submit'])) {
        $nama_alat = $_POST['nama_alat'];
        $tahun = $_POST['tahun'];
        $merek = $_POST['merek'];
        $lokasi = $_POST['lokasi'];
        
        // Menghubungkan ke database
        include_once("config.php");
                
        // Query untuk menyimpan data
        $result = mysqli_query($mysqli, "INSERT INTO alat(nama_alat, tahun, merek, lokasi) VALUES('$nama_alat', '$tahun', '$merek', '$lokasi')");
        
        // Notifikasi sukses
        if($result) {
            echo "<br/><p style='color: green; font-weight: bold;'>Data berhasil disimpan! <a href='index.php'>Lihat Daftar Alat</a></p>";
        } else {
            echo "<br/><p style='color: red;'>Gagal menyimpan data: " . mysqli_error($mysqli) . "</p>";
        }
    }
    ?>
</body>
</html>