<?php
require 'koneksi.php';

// Ambil ID destinasi dari parameter URL
if (!isset($_GET['id'])) {
    echo "ID tidak valid!";
    exit();
}
$id = $_GET['id'];

// Proses form submit untuk menambahkan rating, nama, dan komentar
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'];
    $rating = $_POST['rating'];
    $komentar = $_POST['komentar'];

    // Query untuk memasukkan rating, nama, dan komentar
    $query = "INSERT INTO ratings (tempat_id, nama, rating, komentar) VALUES (:tempat_id, :nama, :rating, :komentar)";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':tempat_id', $id);
    $stmt->bindParam(':nama', $nama);
    $stmt->bindParam(':rating', $rating);
    $stmt->bindParam(':komentar', $komentar);
    $stmt->execute();

    echo "<script>alert('Rating dan komentar berhasil ditambahkan!'); window.location.href = 'beri_rating.php?id=$id';</script>";
    exit();
}

// Ambil daftar rating dan komentar sebelumnya dari database
$query = "SELECT nama, rating, komentar, tanggal FROM ratings WHERE tempat_id = :tempat_id ORDER BY tanggal DESC";
$stmt = $conn->prepare($query);
$stmt->bindParam(':tempat_id', $id);
$stmt->execute();
$ratings = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Pastikan $ratings diinisialisasi sebagai array kosong jika tidak ada data
if ($ratings === false) {
    $ratings = [];
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beri Rating dan Komentar</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0-alpha1/css/bootstrap.min.css">
    <style>
        /* Palet warna */
        :root {
            --primary-color: #003161;  /* Deep Blue */
            --secondary-color: #006A67;  /* Teal */
            --accent-color: #FFF4B7;  /* Soft Yellow */
            --background-color: #F7F7F8;  /* Light Grey */
            --card-bg-color: #004E7C;  /* Dark Blue */
        }

        body {
            background: linear-gradient(to bottom right, #F0BB78, #FFF4B7);
            color: #333;
        }

        .navbar {
            background: linear-gradient(to bottom right, #004E7C, #006A67);
        }

        .navbar-brand {
            color: var(--accent-color);
            font-weight: bold;
        }

        .navbar-brand:hover {
            color: #fff;
        }

        .btn-secondary, .btn-success {
            background-color: var(--secondary-color);
            border-color: var(--secondary-color);
        }

        .btn-secondary:hover, .btn-success:hover {
            background-color: var(--accent-color);
            border-color: var(--accent-color);
            color: var(--primary-color);
        }

        .container {
            padding-top: 40px;
        }

        .card {
            background-color: var(--card-bg-color);
            border: none;
            color: white;
        }

        .card-title {
            color: var(--accent-color);
        }

        .form-control {
            border: 2px solid var(--secondary-color);
            border-radius: 8px;
            padding: 10px;
        }

        .form-control:focus {
            border-color: var(--accent-color);
            box-shadow: 0 0 0 0.25rem rgba(255, 244, 183, 0.25);
        }

        .form-label {
            font-weight: bold;
            color: var(--primary-color);
        }

        h1, h2 {
            color: var(--primary-color);
        }

        .btn {
            font-size: 1.2rem;
        }

        .card-body {
            padding: 20px;
        }

        .card-text {
            font-size: 1rem;
        }

        .text-muted {
            font-size: 0.9rem;
            color: #b0b0b0;
        }

        .text-start {
            margin-bottom: 20px;
        }

        hr {
            border-color: var(--secondary-color);
            border-width: 2px;
        }

        .btn {
            text-transform: uppercase;
        }

        .form-group {
            margin-bottom: 30px;
        }

        .form-control {
            max-width: 500px;
            margin: 0 auto;
        }

        .btn {
            margin-top: 15px;
            width: 100%;
        }

        .card-title {
            font-size: 1.2rem;
            font-weight: bold;
        }

        .card-text {
            color: #FFF;
        }

    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="index.php">Wisata Badung</a>
        </div>
    </nav>

    <div class="container mt-5">
        <!-- Tombol Kembali -->
        <div class="text-start mb-3">
            <button onclick="history.back()" class="btn btn-secondary">&larr; Kembali</button>
        </div>

        <!-- Form Input -->
        <h4 class="text-center mb-4">Beri Rating dan Komentar</h4>
        <form method="POST" class="mt-4">
            <div class="form-group mb-3">
                <label for="nama" class="form-label">Nama Anda:</label>
                <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukkan nama Anda" required>
            </div>
            <div class="form-group mb-3">
                <label for="rating" class="form-label">Pilih Rating:</label>
                <select name="rating" id="rating" class="form-control" required>
                    <option value="5">5 - Sangat Baik</option>
                    <option value="4">4 - Baik</option>
                    <option value="3">3 - Cukup</option>
                    <option value="2">2 - Buruk</option>
                    <option value="1">1 - Sangat Buruk</option>
                </select>
            </div>
            <div class="form-group mb-3">
                <label for="komentar" class="form-label">Komentar Anda:</label>
                <textarea name="komentar" id="komentar" rows="4" class="form-control" placeholder="Tulis komentar Anda" required></textarea>
            </div>
            <button type="submit" class="btn btn-success">Kirim Rating dan Komentar</button>
        </form>

        <hr>

        <!-- Menampilkan Daftar Rating dan Komentar -->
        <h4 class="text-center mb-4">Rating dan Komentar Sebelumnya</h4>
        <?php if (count($ratings) > 0): ?>
            <?php foreach ($ratings as $rating): ?>
                <div class="card mb-3 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo htmlspecialchars($rating['nama']); ?></h5>
                        <p class="card-text">Rating: <strong><?php echo htmlspecialchars($rating['rating']); ?>/5</strong></p>
                        <p class="card-text"><?php echo nl2br(htmlspecialchars($rating['komentar'])); ?></p>
                        <p class="card-text"><small class="text-muted">Dikirim pada: <?php echo htmlspecialchars($rating['tanggal']); ?></small></p>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p class="text-center">Belum ada rating atau komentar untuk destinasi ini.</p>
        <?php endif; ?>
    </div>
</body>

</html>
