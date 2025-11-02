<?php 

$host = "localhost";
$port = 3306;
$username = "root";
$password = "";
$database = "universitas";

//MYSQL HANDSHAKE

$koneksi = new mysqli($host, $username, $password, $database, $port);

// //CONTROL
// if($koneksi){
//     echo "koneksi jalan";
// } else {
//     echo "koneksi mati";
//     die;
// }

?>