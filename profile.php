<?php
session_start();
include "koneksi.php";

$id = $_SESSION['id']; // Pastikan user sudah login
$query = $conn->query("SELECT foto FROM user WHERE id='$id'");
$user = $query->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <title>Profile</title>
</head>
<body>
    <h2>Profil</h2>
    
    <form action="update_profile.php" method="POST" enctype="multipart/form-data">
        <label>Ganti Password:</label>
        <input type="password" name="new_password" placeholder="Masukkan password baru">
        
        <label>Ganti Foto Profil:</label>
        <input type="file" name="foto">
        
        <p>Foto Profil Saat Ini:</p>
        <img src="upload/<?php echo $user['foto']; ?>" width="100">

        <button type="submit" name="update">Simpan</button>
    </form>
</body>
</html>
