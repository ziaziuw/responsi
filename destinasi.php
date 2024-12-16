<?php
require 'koneksi.php'; // Menghubungkan ke database
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Destinasi Wisata Badung</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0-alpha1/css/bootstrap.min.css">
    <style>
        .navbar {
            background-color: #003161;
            padding: 1rem;
        }

        .navbar-brand,
        .nav-link {
            color: white !important;
        }

        .nav-link:hover {
            color: #ddd !important;
        }

        body {
            background: linear-gradient(to bottom right, #fdfbfb, #006A67, #003161);
        }

        .page-header {
            text-align: center;
            padding: 50px 0;
            background: linear-gradient(to bottom right, #fdfbfb, #FFF4B7);
            color: #003161;
            margin-bottom: 2rem;
        }

        .destination-card {
            margin-bottom: 2rem;
            transition: transform 0.3s;
            background: linear-gradient(to bottom right, #F0BB78, #FFF4B7);
            border: none;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
        }

        .destination-card:hover {
            transform: translateY(-5px);
        }

        .destination-image {
            width: 100%;
            /* Menyesuaikan lebar gambar dengan kolom */
            height: 200px;
            /* Tinggi gambar tetap 200px */
            object-fit: cover;
            /* Menjaga gambar agar tidak terdistorsi dan memenuhi area */
            margin: 5px;
            /* Memberi sedikit ruang di sekitar gambar */
        }

        .card-title {
            color: #2c3e50;
            font-weight: 600;
        }

        .card-text {
            color: #666;
            line-height: 1.6;
        }
    </style>
</head>

<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="index.php"><i class="fa-solid fa-umbrella-beach"></i> The Beauty of Badung</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="index.php"><i class="fa-solid fa-house-chimney"></i> Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-magnifying-glass"></i> Explore
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="festival.php">Festival dan Acara</a></li>
                            <li><a class="dropdown-item" href="destinasi.php">Destinasi</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="peta.php"><i class="fa-solid fa-earth-asia"></i> Peta</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pembuat.php"><i class="fa-solid fa-user"></i> Pembuat</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Header -->
    <header class="page-header">
        <div class="container">
            <h1><i class="fa-solid fa-location-dot"></i> Destinasi Wisata Badung</h1>
            <p>Wilayah Badung di Bali adalah permata yang memadukan keindahan alam, kekayaan budaya, dan pesona modern dalam satu paket yang memukau.</p>
        </div>
    </header>

    <!-- Destination List -->
    <div class="container">
        <?php foreach ($locations as $location): ?>
            <div class="card destination-card">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="images/<?php echo htmlspecialchars($location['id']); ?>.jpg" class="destination-image" alt="<?php echo htmlspecialchars($location['nama_tempat']); ?>">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo htmlspecialchars($location['nama_tempat']); ?></h5>
                            <p class="card-text"><?php echo htmlspecialchars($location['deskripsi']); ?></p>
                            <p class="card-text"><small class="text-muted">Lokasi: <?php echo htmlspecialchars($location['lokasi']); ?></small></p>

                            <!-- Link ke Halaman Beri Rating -->
                            <div class="text-center mt-3">
                                <a href="beri_rating.php?id=<?php echo $location['id']; ?>" class="btn btn-warning">Beri Rating</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0-alpha1/js/bootstrap.bundle.min.js"></script>
</body>

</html>