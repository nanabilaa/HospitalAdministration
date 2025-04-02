<?php
include('db_connection.php');

// Query untuk mengambil data pasien dari database
$query = "SELECT * FROM pasien"; // Menggunakan tabel 'pasien'
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pasien - Sistem Manajemen Rumah Sakit</title>
    <style>
        /* Global Styles */
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
            color: #333;
        }

        /* Dashboard Container */
        .dashboard-container {
            display: flex;
            height: 100vh;
        }

        /* Sidebar Styling */
        .sidebar {
            width: 250px;
            background-color: #00796b;
            color: white;
            padding: 20px;
            box-sizing: border-box;
            height: 100vh;
        }

        .sidebar h2 {
            color: white;
            margin-bottom: 20px;
            font-size: 1.5rem;
        }

        .sidebar ul {
            list-style: none;
            padding: 0;
        }

        .sidebar ul li {
            margin: 15px 0;
        }

        .sidebar ul li a {
            color: white;
            text-decoration: none;
            font-size: 1.1rem;
            padding: 10px;
            display: block;
            border-radius: 4px;
        }

        .sidebar ul li a:hover {
            background-color: #004d40; 
        }

        /* Main Content Area */
        .main-content {
            flex: 1;
            padding: 20px;
            background-color: #fff;
            height: 100vh;
            overflow-y: auto;
        }

        .main-content h1 {
            font-size: 2rem;
            margin-bottom: 20px;
            color: #00796b;
        }

        /* Table Styling */
        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            border: 1px solid #ddd;
        }

        .table th, .table td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
        }

        .table th {
            background-color: #00796b; 
            color: white;
            text-align: center;
        }

        .table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .table a {
            color: #00796b;
            text-decoration: none;
        }

        .table a:hover {
            text-decoration: underline;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .dashboard-container {
                flex-direction: column;
            }

            .sidebar {
                width: 100%;
                height: auto;
            }

            .main-content {
                padding: 15px;
            }
        }
    </style>
</head>
<body>
    <div class="dashboard-container">
        <!-- Sidebar -->
        <div class="sidebar">
            <h2>Admin Dashboard</h2>
            <ul>
                <li><a href="admin.html">Dashboard</a></li>
                <li><a href="add_patient.php">Tambah Pasien</a></li>
                <li><a href="list_patients.php">Daftar Pasien</a></li>
                <li><a href="list_jadwal.php">Jadwal</a></li>
                <li><a href="list_pembayaran.php">Pembayaran</a></li>
                <li><a href="list_rekam_medis.php">Rekam Medis</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </div>

        <!-- Main Content Area -->
        <div class="main-content">
            <!-- Tabel untuk Daftar Pasien -->
            <h1>Daftar Pasien</h1>
            <table class="table">
                <tr>
                    <th>ID Pasien</th>
                    <th>Nama Depan</th>
                    <th>Nama Belakang</th>
                    <th>Tanggal Lahir</th>
                    <th>Jenis Kelamin</th>
                    <th>Kontak</th>
                    <th>Alamat</th>
                    <th>Opsi</th>
                </tr>
                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['id_pasien'] . "</td>";
                    echo "<td>" . $row['nama_depan'] . "</td>";
                    echo "<td>" . $row['nama_belakang'] . "</td>";
                    echo "<td>" . $row['tanggal_lahir'] . "</td>";
                    echo "<td>" . ($row['jenis_kelamin'] == 'L' ? 'Laki-laki' : 'Perempuan') . "</td>";
                    echo "<td>" . $row['kontak'] . "</td>";
                    echo "<td>" . $row['alamat'] . "</td>";
                    echo "<td><a href='edit_patient.php?id=" . $row['id_pasien'] . "'>Edit</a> | 
                              <a href='delete_patient.php?id=" . $row['id_pasien'] . "'>Hapus</a></td>";
                    echo "</tr>";
                }
                ?>
            </table>
        </div>
    </div>
</body>
</html>
