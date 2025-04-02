<?php
include('db_connection.php');

// Ambil id pasien
$id = $_GET['id'];

// Query untuk mengambil data pasien berdasarkan ID
$query = "SELECT * FROM pasien WHERE id_pasien = '$id'"; // Menggunakan tabel 'pasien'
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

// Jika form disubmit
if (isset($_POST['submit'])) {
    // Ambil data dari form
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $contact = $_POST['contact'];
    $address = $_POST['address'];

    // Query untuk update data pasien
    $sql = "UPDATE pasien SET nama_depan = '$first_name', nama_belakang = '$last_name', 
            tanggal_lahir = '$dob', jenis_kelamin = '$gender', kontak = '$contact', alamat = '$address' 
            WHERE id_pasien = '$id'";

    if ($conn->query($sql) === TRUE) {
        echo "Data pasien berhasil diperbarui";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pasien</title>
</head>
<body>
    <h1>Edit Data Pasien</h1>
    <form action="edit_patient.php?id=<?php echo $id; ?>" method="POST">
        <label for="first_name">Nama Depan:</label>
        <input type="text" name="first_name" value="<?php echo $row['nama_depan']; ?>" required><br><br>
        
        <label for="last_name">Nama Belakang:</label>
        <input type="text" name="last_name" value="<?php echo $row['nama_belakang']; ?>" required><br><br>
        
        <label for="dob">Tanggal Lahir:</label>
        <input type="date" name="dob" value="<?php echo $row['tanggal_lahir']; ?>" required><br><br>
        
        <label for="gender">Jenis Kelamin:</label>
        <select name="gender" required>
            <option value="L" <?php echo ($row['jenis_kelamin'] == 'L' ? 'selected' : ''); ?>>Laki-laki</option>
            <option value="P" <?php echo ($row['jenis_kelamin'] == 'P' ? 'selected' : ''); ?>>Perempuan</option>
        </select><br><br>
        
        <label for="contact">Kontak:</label>
        <input type="text" name="contact" value="<?php echo $row['kontak']; ?>" required><br><br>
        
        <label for="address">Alamat:</label>
        <textarea name="address" required><?php echo $row['alamat']; ?></textarea><br><br>
        
        <button type="submit" name="submit">Simpan Perubahan</button>
    </form>
</body>
</html>
