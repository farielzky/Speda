<?php 
// Manggil koneksi.php
include "koneksi.php";

// Nangkap Datanya
$id = $_POST['id'];
$nama = $_POST['nama']; 
$nim = $_POST['nim'];
$gender = $_POST['gender'];

// Query Cara 2
$sql = "UPDATE mahasiswa SET nim=?, nama=?, jenis_kelamin=? WHERE id=?";
$stmt = $koneksi->prepare($sql);
$stmt->bind_param("sssi", $nim, $nama, $gender, $id);

if ($stmt->execute()) {
    header("Location: index.php");
}else{
    echo "Error: Gagal";
}

$stmt->close();
$koneksi->close();

?>