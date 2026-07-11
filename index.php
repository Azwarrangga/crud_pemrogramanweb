<?php
// Mengambil file koneksi
include_once("config.php");

// Mengambil data dari tabel 'alat' diurutkan berdasarkan id terbaru
$result = mysqli_query($mysqli, "SELECT * FROM alat ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Sim Rs - Data Alat Medis</title>
    <style>
        /* 1. MENGUBAH WARNA BACKGROUND HALAMAN */
        body { 
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; 
            margin: 0; 
            padding: 30px; 
            background-color: #f0f4f8; /* Warna background abu-abu kebiruan yang lembut */
            color: #333;
        }

        .container {
            max-width: 90%;
            margin: 0 auto;
            background: #ffffff; /* Kotak putih pembungkus konten */
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05); /* Efek bayangan halus */
        }

        h2 {
            color: #1a5f7a; /* Warna teks judul biru tua medis */
            margin-top: 0;
            font-size: 24px;
            border-bottom: 2px solid #e1e8ed;
            padding-bottom: 10px;
        }

        /* 2. DESAIN TOMBOL TAMBAH BARU */
        .btn-tambah { 
            padding: 10px 20px; 
            background-color: #00b4d8; /* Warna cyan/biru muda terang */
            color: white; 
            text-decoration: none; 
            border-radius: 5px; 
            display: inline-block; 
            margin-bottom: 20px;
            font-weight: bold;
            transition: background 0.3s ease;
        }
        .btn-tambah:hover { 
            background-color: #0096c7; 
        }

        /* 3. DESAIN TABEL YANG LEBIH BERWARNA */
        table { 
            width: 100%; 
            border-collapse: collapse; 
            margin-top: 10px;
            background-color: #ffffff;
            border-radius: 8px;
            overflow: hidden; /* Agar sudut tabel melengkung rapi */
        }

        /* Warna Header Tabel */
        .header { 
            background-color: #1a5f7a; /* Mengganti orange ke biru medis profesional */
            color: white; 
            text-transform: uppercase;
            font-size: 14px;
            letter-spacing: 0.5px;
        }

        th, td { 
            padding: 14px 16px; 
            text-align: left; 
        }

        /* Garis tipis antar baris data */
        td {
            border-bottom: 1px solid #eef2f5;
        }

        /* Efek warna selang-seling (Zebra striping) pada baris data */
        tr:nth-child(even) { 
            background-color: #f8fafc; 
        }

        /* Efek saat baris disorot kursor mouse (Hover effect) */
        tr:hover { 
            background-color: #e3fafc; /* Warna sorotan cyan tipis */
        }

        /* 4. DESAIN TOMBOL AKSI (EDIT & DELETE) */
        .btn-aksi { 
            text-decoration: none; 
            padding: 6px 12px; 
            border-radius: 4px; 
            color: white; 
            font-size: 13px;
            font-weight: bold;
            display: inline-block;
        }
        .btn-edit { 
            background-color: #38b000; /* Hijau cerah untuk edit */
        }
        .btn-edit:hover {
            background-color: #007200;
        }
        .btn-delete { 
            background-color: #ff4d4d; /* Merah cerah untuk delete */
        }
        .btn-delete:hover {
            background-color: #cc0000;
        }
    </style>
</head>
<body>

    <!-- Pembungkus halaman agar terlihat seperti aplikasi modern -->
    <div class="container">

        <h2>Daftar Inventaris Data Alat Medis</h2>

        <!-- Tombol Tambah Data -->
        <a href="add.php" class="btn-tambah">+ Tambah Alat Baru</a>

        <!-- Tabel Data -->
        <table>
            <tr class="header">
                <th>Nama Alat</th>
                <th>Tahun</th>
                <th>Merek</th>
                <th>Lokasi</th>
                <th style="width: 150px;">Aksi</th>
            </tr>
            <?php  
            while($user_data = mysqli_fetch_array($result)) {         
                echo "<tr>";
                echo "<td><strong>".$user_data['nama_alat']."</strong></td>";
                echo "<td>".$user_data['tahun']."</td>";
                echo "<td>".$user_data['merek']."</td>";
                echo "<td>".$user_data['lokasi']."</td>";    
                echo "<td>
                        <a href='edit.php?id=".$user_data['id']."' class='btn-aksi btn-edit'>Edit</a> 
                        <a href='delete.php?id=".$user_data['id']."' class='btn-aksi btn-delete' onclick='return confirm(\"Apakah Anda yakin ingin menghapus data ini?\")'>Delete</a>
                      </td>";
                echo "</tr>";        
            }
            ?>
        </table>

    </div>

</body>
</html>