<?php
include('db_connection.php');

if (isset($_POST['submit'])) {
    // Ambil data dari form
    $nama_depan = $_POST['first_name'];  // Nama depan
    $nama_belakang = $_POST['last_name'];  // Nama belakang
    
    // Format tanggal menjadi YYYY-MM-DD
    $tanggal_lahir = date('Y-m-d', strtotime($_POST['dob']));
    
    // Memastikan bahwa jenis kelamin adalah salah satu dari nilai ENUM ('L' atau 'P')
    $jenis_kelamin = $_POST['gender'];
    
    $kontak = $_POST['contact'];  // Kontak
    $alamat = $_POST['address'];  // Alamat

    // Validasi apakah 'kontak' tidak kosong dan berupa angka
    if (empty($kontak) || !is_numeric($kontak)) {
        die("Kontak harus berupa angka dan tidak boleh kosong.");
    }

    // Query untuk menyimpan data pasien
    $sql = "INSERT INTO pasien (nama_depan, nama_belakang, tanggal_lahir, jenis_kelamin, kontak, alamat) 
        VALUES ('$nama_depan', '$nama_belakang', '$tanggal_lahir', '$jenis_kelamin', '$kontak', '$alamat')";

    // query dijalankan
    if ($conn->query($sql) === TRUE) {
        echo "";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pasien - Sistem Manajemen Rumah Sakit</title>
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

        /* Form Styling */
        form {
            background-color: white;
            padding: 30px;
            max-width: 600px;
            margin: 20px auto;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        /* Labels */
        label {
            display: block;
            margin-bottom: 10px;
            font-size: 1.1rem;
            color: #00796b; 
        }

        /* Input Fields */
        input[type="text"], input[type="date"], select, textarea {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 1rem;
            background-color: #fafafa; 
        }

        /* Input Focus Effect */
        input[type="text"]:focus, input[type="date"]:focus, select:focus, textarea:focus {
            border-color: #00796b; 
            outline: none;
        }

        /* Button Styling */
        button {
            background-color: #00796b;
            color: white;
            padding: 15px 20px;
            font-size: 1.1rem;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }

        button:hover {
            background-color: #004d40; 
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
            <h1>Tambah Pasien Baru</h1>
            <form action="add_patient.php" method="POST">
                <label for="first_name">Nama Depan:</label>
                <input type="text" name="first_name" required><br><br>

                <label for="last_name">Nama Belakang:</label>
                <input type="text" name="last_name" required><br><br>

                <label for="dob">Tanggal Lahir:</label>
                <input type="date" name="dob" required><br><br>

                <label for="gender">Jenis Kelamin:</label>
                <select name="gender" required>
                    <option value="L">Laki-laki</option>
                    <option value="P">Perempuan</option>
                </select><br><br>

                <label for="contact">Kontak:</label>
                <input type="text" name="contact" required><br><br>

                <label for="address">Alamat:</label>
                <textarea name="address" required></textarea><br><br>

                <button type="submit" name="submit">Tambah Pasien</button>
            </form>
        </div>
    </div>
</body>
</html>
