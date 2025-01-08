<?php
session_start();
include "koneksi.php";

if(isset($_POST['update'])) {
    $id = $_SESSION['id'];
    
    // Update Password (jika diisi)
    if (!empty($_POST['new_password'])) {
        $new_password = md5($_POST['new_password']); 
        $conn->query("UPDATE user SET password='$new_password' WHERE id='$_id'");
    }

    // Upload Foto Profil (jika diisi)
    if (!empty($_FILES['foto']['name'])) {
        $target_dir = "upload/";
        $file_name = basename($_FILES["foto"]["name"]);
        $target_file = $target_dir . $file_name;
        move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file);
        
        $conn->query("UPDATE user SET foto='$file_name' WHERE id='$id'");
    }

    header("Location: profile.php");
}
?>
