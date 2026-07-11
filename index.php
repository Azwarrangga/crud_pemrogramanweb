<?php
// Mengambil file koneksi
include_once("config.php");

// Mengambil data dari tabel 'alat' diurutkan berdasarkan id terbaru
$result = mysqli_query($mysqli, "SELECT * FROM alat ORDER BY id DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Sim Rs - Data Alat</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .btn-tambah { 
            padding: 8px 15px; 
            background-color: #4CAF50; 
            color: white; 
            text-decoration: none; 
            border-radius: 4px; 
            display: inline-block; 
            margin-bottom: 15px;
        }
        .btn-tambah:hover { background-color: #45a049; }
        .header { background-color: orange; color: white; }
        table { width: 80%; border-collapse: collapse; }
        th, td { border: 1px solid #ddd; padding: 10px; text-align: left; }
        tr:nth-child(even) { background-color: #f2f2f2; }
        .btn-aksi { text-decoration: none; padding: 3px 8px; border-radius: 3px; color: white; }
        .btn-edit { background-color: #008CBA; }
        .btn-delete { background-color: #f44336; }
    </style>
</head>
<body>

    <h2>Daftar Data Alat Medis</h2>

    <!-- Tombol navigasi ke halaman tambah data -->
    <a href="add.php" class="btn-tambah">+ Tambah Alat Baru</a>

    <table>
        <tr class="header">
            <th>Nama Alat</th>
            <th>Tahun</th>
            <th>Merek</th>
            <th>Lokasi</th>
            <th>Aksi</th>
        </tr>
        <?php  
        // Melakukan perulangan untuk menampilkan data alat
        while($user_data = mysqli_fetch_array($result)) {         
            echo "<tr>";
            echo "<td>".$user_data['nama_alat']."</td>";
            echo "<td>".$user_data['tahun']."</td>";
            echo "<td>".$user_data['merek']."</td>";
            echo "<td>".$user_data['lokasi']."</td>";    
            echo "<td>
                    <a href='edit.php?id=".$user_data['id']."' class='btn-aksi btn-edit'>Edit</a> | 
                    <a href='delete.php?id=".$user_data['id']."' class='btn-aksi btn-delete' onclick='return confirm(\"Apakah Anda yakin ingin menghapus data ini?\")'>Delete</a>
                  </td>";
            echo "</tr>";        
        }
        ?>
    </table>
</body>
</html>