<?php
// 1. Memanggil file koneksi database
include_once("config.php");

// 2. Proses update data (Akan berjalan saat tombol "Update Data" di-klik)
if(isset($_POST['update'])) {	
    $id = $_POST['id'];
    
    $nama_alat = $_POST['nama_alat'];
    $tahun = $_POST['tahun'];
    $merek = $_POST['merek'];
    $lokasi = $_POST['lokasi'];
    
    // Query update ke database
    $result = mysqli_query($mysqli, "UPDATE alat SET nama_alat='$nama_alat', tahun='$tahun', merek='$merek', lokasi='$lokasi' WHERE id=$id");
    
    // Setelah sukses update, langsung otomatis kembali ke halaman utama
    header("Location: index.php");
    exit();
}
?>

<?php
// 3. Mengambil data alat lama berdasarkan ID dari URL (untuk ditampilkan di form)
// Memastikan parameter 'id' tersedia di URL sebelum diambil
if(isset($_GET['id']) && $_GET['id'] != '') {
    $id = $_GET['id'];

    // Ambil data dari database berdasarkan ID alat
    $result = mysqli_query($mysqli, "SELECT * FROM alat WHERE id=$id");

    // Jika data ditemukan, masukkan ke dalam variabel
    if($result && mysqli_num_rows($result) > 0) {
        while($user_data = mysqli_fetch_array($result)) {
            $nama_alat = $user_data['nama_alat'];
            $tahun = $user_data['tahun'];
            $merek = $user_data['merek'];
            $lokasi = $user_data['lokasi'];
        }
    } else {
        // Jika ID tidak ada di database, kembalikan ke index.php
        header("Location: index.php");
        exit();
    }
} else {
    // Jika diakses tanpa ID di URL, kembalikan ke index.php
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>	
    <meta charset="UTF-8">
    <title>Edit Data Alat Medis</title>
    <style>
        /* Desain disamakan dengan index.php agar terlihat modern */
        body { 
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; 
            margin: 0; 
            padding: 30px; 
            background-color: #f0f4f8; 
            color: #333;
        }
        .container {
            max-width: 500px;
            margin: 40px auto;
            background: #ffffff; 
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05); 
        }
        h3 {
            color: #1a5f7a; 
            margin-top: 0;
            border-bottom: 2px solid #e1e8ed;
            padding-bottom: 10px;
        }
        .btn-kembali { 
            text-decoration: none; 
            color: #ff4d4d; 
            font-weight: bold;
            font-size: 14px;
        }
        table { 
            width: 100%; 
            margin-top: 20px;
        }
        td { 
            padding: 8px 0; 
        }
        input[type=text], input[type=number] { 
            width: 100%; 
            padding: 10px; 
            border: 1px solid #ccc; 
            border-radius: 5px; 
            box-sizing: border-box; 
            font-size: 14px;
        }
        input[type=submit] { 
            width: 100%; 
            background-color: #38b000; 
            color: white; 
            padding: 12px; 
            margin-top: 15px;
            border: none; 
            border-radius: 5px; 
            cursor: pointer; 
            font-weight: bold;
            font-size: 15px;
        }
        input[type=submit]:hover { 
            background-color: #007200; 
        }
    </style>
</head>
<body>

    <div class="container">
        <a href="index.php" class="btn-kembali">&laquo; Batal / Kembali</a>
        
        <h3>Form Edit Data Alat</h3>
        
        <form name="update_alat" method="post" action="edit.php">
            <table border="0">
                <tr> 
                    <td>Nama Alat</td>
                    <td><input type="text" name="nama_alat" value="<?php echo $nama_alat; ?>" required></td>
                </tr>
                <tr> 
                    <td>Tahun</td>
                    <td><input type="number" name="tahun" value="<?php echo $tahun; ?>" required></td>
                </tr>
                <tr> 
                    <td>Merek</td>
                    <td><input type="text" name="merek" value="<?php echo $merek; ?>" required></td>
                </tr>
                <tr> 
                    <td>Lokasi</td>
                    <td><input type="text" name="lokasi" value="<?php echo $lokasi; ?>" required></td>
                </tr>
                <tr>
                    <!-- Input hidden untuk menyimpan ID alat saat form di-submit -->
                    <td><input type="hidden" name="id" value="<?php echo $id; ?>"></td>
                    <td><input type="submit" name="update" value="Update Data Alat"></td>
                </tr>
            </table>
        </form>
    </div>

</body>
</html>