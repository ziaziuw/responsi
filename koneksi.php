<?php
// Konfigurasi database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pgweb8";

try {
    // Membuat koneksi PDO dengan charset UTF-8 untuk menghindari masalah karakter
    $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
    
    // Set error mode ke exception untuk menangani error dengan baik
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Query untuk mengambil data
    $sql = "SELECT id, nama_tempat, latitude, longitude, deskripsi, lokasi FROM tempat_wisata";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    
    // Menyimpan hasil query dalam array
    $locations = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
} catch(PDOException $e) {
    // Menangani error dengan menampilkan pesan yang jelas
    echo "Koneksi gagal: " . $e->getMessage();
    die();
}
?>
