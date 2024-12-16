<?php
require_once 'koneksi.php';

// Query untuk mengambil data jumlah wisatawan beserta kabupaten
try {
    $sql = "SELECT tahun, jumlah_wisnus, jumlah_wisman, kabupaten FROM jumlah_wisatawan";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    // Mengambil hasil query
    $wisatawan_data = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error fetching data: " . $e->getMessage();
    die();
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - The Beauty of Badung</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0-alpha1/css/bootstrap.min.css">
    <style>
        .navbar {
            background-color: #5B0909;
            padding: 1rem;
            position: fixed;
            width: 100%;
            z-index: 1000;
        }

        .navbar-brand,
        .nav-link {
            color: white !important;
        }

        .nav-link:hover {
            color: #ddd !important;
        }

        /* Hero header styles */
        .hero-header {
            position: relative;
            height: 100vh;
            overflow: hidden;
        }

        .hero-carousel {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }

        .hero-content {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            background: rgba(0, 0, 0, 0.5);
            color: white;
            z-index: 2;
        }

        .hero-content h1 {
            font-size: 4rem;
            font-weight: bold;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
            margin-bottom: 1rem;
        }

        .hero-content p {
            font-size: 1.5rem;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5);
        }

        .hero-carousel .carousel-item {
            height: 100vh;
        }

        .hero-carousel .carousel-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /* Category Cards Styles */
        .category-section {
            padding: 4rem 0;
            background-color: #A04747;
        }

        .category-cards {
            display: flex;
            justify-content: center;
            gap: 2rem;
        }

        .category-card {
            width: 250px;
            background-color: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .category-card:hover {
            transform: translateY(-10px);
        }

        .category-card img {
            width: 100%;
            height: 250px;
            object-fit: cover;
        }

        .category-card-body {
            padding: 1rem;
            text-align: center;
        }

        .category-card-body h3 {
            margin-bottom: 0.5rem;
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

    <!-- Fullscreen Hero Header with Carousel Background -->
    <div class="hero-header">
        <div id="carouselExample" class="carousel slide hero-carousel" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="images/badung1.jpeg" class="d-block w-100" alt="Badung Tourism 1">
                </div>
                <div class="carousel-item">
                    <img src="images/badung2.jpg" class="d-block w-100" alt="Badung Tourism 2">
                </div>
                <div class="carousel-item">
                    <img src="images/badung4.jpeg" class="d-block w-100" alt="Badung Tourism 3">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <div class="hero-content">
            <h1><i class="fa-solid fa-plane"></i> The Beauty of Badung</h1>
            <p>Discover the magic and wonders of Badung, Bali!</p>
        </div>
    </div>

    <!-- Jumlah Wisatawan Section -->
    <section class="container mt-5 py-5" style="background-color: #f8f9fa; border-radius: 7px; margin-bottom: 40px;">
        <h2 class="text-center mb-4" style="color: #5B0909;">Jumlah Wisatawan di Pulau Bali</h2>
        <table class="table table-bordered table-sm">
            <thead class="table-dark">
                <tr>
                    <th scope="col">Tahun</th>
                    <th scope="col">Kabupaten</th> <!-- Kolom baru untuk kabupaten -->
                    <th scope="col">Jumlah Wisatawan Domestik</th>
                    <th scope="col">Jumlah Wisatawan Mancanegara</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($wisatawan_data as $row): ?>
                    <tr style="<?= $row['kabupaten'] == 'Kabupaten Badung' ? 'background-color: rgb(254, 211,  100);' : ($row['kabupaten'] != 'Kabupaten Badung' ? 'background-color: #f5e1a4;' : ''); ?>">
                        <td><?= htmlspecialchars($row['tahun']); ?></td>
                        <td><?= htmlspecialchars($row['kabupaten']); ?></td>
                        <td><?= number_format($row['jumlah_wisnus']); ?></td>
                        <td><?= number_format($row['jumlah_wisman']); ?></td>
                    </tr>
                <?php endforeach; ?>

            </tbody>
        </table>
        <p class="text-center" style="font-size: 1.1rem; color: #333;">
            Pulau Bali telah lama dikenal sebagai destinasi wisata terpopuler di Indonesia,
            menarik jutaan wisatawan setiap tahunnya, baik domestik maupun internasional.
            Di antara berbagai daerah di Bali, <span style="font-weight: bold; color: #d14f2e;">Kabupaten Badung</span>
            menonjol sebagai salah satu yang paling diminati, menduduki posisi ketiga dalam hal jumlah wisatawan
            terbanyak pada tahun 2019, dengan total mencapai <span style="font-weight: bold; color: #d14f2e;">4.277.052 wisatawan</span>. Daerah ini dikenal dengan destinasi ikonik
            seperti <span style="font-weight: bold; color: #d14f2e;">Pantai Kuta, Jimbaran, dan Nusa Dua</span>,
            yang terus memikat ribuan pengunjung setiap tahun. Keindahan alam, kekayaan budaya, serta suasana yang mempesona
            menjadikan Badung sebagai pusat pariwisata utama Bali yang tak pernah kehilangan daya tariknya.
        </p>
    </section>


    <!-- Category Section -->
    <section class="category-section">
        <div class="container">
            <div class="text-center mb-4">
                <h2>Explore Badung</h2>
                <p>Kabupaten Badung yang terletak di Provinsi Bali, adalah salah satu daerah dengan kekayaan alam, budaya, dan pariwisata yang luar biasa. Kabupaten ini dikenal sebagai pusat pariwisata Bali, dengan berbagai destinasi yang menawarkan pengalaman tak terlupakan bagi para wisatawan.</p>
            </div>
            <div class="category-cards">
                <div class="category-card">
                    <img src="images/beach.jpeg" alt="Beaches">
                    <div class="category-card-body">
                        <h3>Beaches</h3>
                        <p>Pantai Kuta, Seminyak, dan Jimbaran memukau dengan pasir putih,
                            ombak berselancar, dan matahari terbenam yang memikat. Dari ketenangan Pantai
                            Pandawa hingga eksotisme Uluwatu, Badung adalah surga bagi pencinta pantai.</p>
                    </div>
                </div>
                <div class="category-card">
                    <img src="images/culture.jpg" alt="Culture">
                    <div class="category-card-body">
                        <h3>Culture</h3>
                        <p>Kesenian seperti tarian Kecak, keagungan Pura Uluwatu, dan upacara adat yang sakral
                            memperlihatkan jiwa Bali yang autentik. Di Badung, setiap sudutnya bercerita tentang
                            tradisi yang hidup dan bernilai tinggi.</p>
                    </div>
                </div>
                <div class="category-card">
                    <img src="images/nature.jpeg" alt="Nature">
                    <div class="category-card-body">
                        <h3>Nature</h3>
                        <p>Tebing spektakuler Uluwatu dan keindahan Danau Beratan di Bedugul menciptakan perpaduan
                            pesona laut dan pegunungan. Badung menghadirkan keajaiban alam yang menyejukkan jiwa dan tak terlupakan.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-dark text-white text-center py-3">
        <p>&copy; 2024 The Beauty of Badung. All rights reserved.</p>
    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0-alpha1/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
</body>

</html>