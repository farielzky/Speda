<?php 
//Manggil koneksi.php
include "koneksi.php";

$nim = $_POST["nim"];
$nama = $_POST["nama"];
$gender = $_POST["gender"];

$sql = "INSERT INTO mahasiswa (nim, nama, jenis_kelamin) VALUES (?, ?, ?)";
$stmt = $koneksi->prepare($sql);
$stmt->bind_param("sss", $nim, $nama, $gender);

if($stmt->execute()){
    header("Location: index.php");
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$koneksi->close();

?>