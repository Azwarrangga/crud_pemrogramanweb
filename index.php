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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sim Rs - Data Alat Medis</title>
    <style>
        /* 1. BACKGROUND GRADASI TERANG DAN MENARIK */
        body { 
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; 
            margin: 0; 
            padding: 40px 20px; 
            background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%); 
            background-attachment: fixed;
            color: #333;
        }

        /* 2. CONTAINER MODERN */
        .container {
            max-width: 90%;
            margin: 0 auto;
            background: rgba(255, 255, 255, 0.93); 
            padding: 30px;
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15); 
            backdrop-filter: blur(10px);
        }

        /* SIFAT HEADER DIBUAT BERJAJAR KIRI-KANAN (FLEXBOX) */
        .header-wrapper {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 2px solid #e1e8ed;
            padding-bottom: 15px;
            margin-bottom: 25px;
        }

        h2 {
            color: #1a5f7a; 
            margin: 0;
            font-size: 26px;
        }

        /* STYLING KOTAK ICON ALKES KANAN ATAS */
        .alkes-icon-wrapper {
            background-color: #e3fafc;
            padding: 12px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
        }

        /* 3. DESAIN TOMBOL TAMBAH BARU */
        .btn-tambah { 
            padding: 12px 24px; 
            background-color: #00b4d8; 
            color: white; 
            text-decoration: none; 
            border-radius: 8px; 
            display: inline-block; 
            margin-bottom: 25px;
            font-weight: bold;
            box-shadow: 0 4px 12px rgba(0, 180, 216, 0.3);
            transition: all 0.3s ease;
        }
        .btn-tambah:hover { 
            background-color: #0096c7; 
            transform: translateY(-2px); 
            box-shadow: 0 6px 15px rgba(0, 180, 216, 0.4);
        }

        /* 4. DESAIN TABEL */
        table { 
            width: 100%; 
            border-collapse: collapse; 
            background-color: #ffffff;
            border-radius: 10px;
            overflow: hidden; 
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.02);
        }

        .header { 
            background-color: #1a5f7a; 
            color: white; 
            text-transform: uppercase;
            font-size: 14px;
            letter-spacing: 0.7px;
        }

        th, td { 
            padding: 16px 20px; 
            text-align: left; 
        }

        td {
            border-bottom: 1px solid #eef2f5;
            font-size: 15px;
        }

        tr:nth-child(even) { 
            background-color: #f8fafc; 
        }

        tr:hover { 
            background-color: #e3fafc; 
        }

        /* 5. DESAIN TOMBOL AKSI */
        .btn-aksi { 
            text-decoration: none; 
            padding: 6px 14px; 
            border-radius: 6px; 
            color: white; 
            font-size: 13px;
            font-weight: bold;
            display: inline-block;
            transition: background 0.2s ease;
        }
        .btn-edit { 
            background-color: #38b000; 
        }
        .btn-edit:hover {
            background-color: #007200;
        }
        .btn-delete { 
            background-color: #ff4d4d; 
            margin-left: 5px;
        }
        .btn-delete:hover {
            background-color: #cc0000;
        }

        .footer-text {
            margin-top: 25px;
            font-size: 14px;
            color: #555;
            font-weight: 600;
        }
    </style>
</head>
<body>

    <div class="container">

        <!-- KOTAK HEADER: JUDUL & ICON SVG MEDIS -->
        <div class="header-wrapper">
            <h2>Daftar Inventaris Data Alat Medis</h2>
            
            <!-- Menggunakan Kode SVG (Pasti Muncul Tanpa Internet) -->
            <div class="alkes-icon-wrapper">
                <svg width="50" height="50" viewBox="0 0 24 24" fill="none" stroke="#1a5f7a" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M22 12h-4l-3 9L9 3l-3 9H2"/>
                </svg>
            </div>
        </div>

        <!-- Tombol Tambah Data -->
        <a href="add.php" class="btn-tambah">+ Tambah Alat Baru</a>

        <!-- Tabel Data -->
        <table>
            <tr class="header">
                <th>Nama Alat</th>
                <th>Tahun</th>
                <th>Merek</th>
                <th>Lokasi</th>
                <th style="width: 160px;">Aksi</th>
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

        <!-- Footer Identitas Nama -->
        <div class="footer-text">
            CRUD PEMROGRAMAN WEB : Azwar Rangga Arasaf 2202050517
        </div>

    </div>

</body>
</html>