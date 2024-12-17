<?php
require_once 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peta Wisata Badung</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0-alpha1/css/bootstrap.min.css">
    <style>
        .navbar {
            background-color: #5B0909;
            padding: 1rem;
        }

        body {
            background-color: #A04747;
        }

        .navbar-brand,
        .nav-link {
            color: white !important;
        }

        .nav-link:hover {
            color: #ddd !important;
        }

        .page-header {
            text-align: center;
            padding: 40px 3rem;
            /* padding kiri dan kanan */
            background-color: #A04747;
            color: white;
            margin-bottom: 0rem;
        }

        #map {
            height: 80vh;
            margin: 30px 0;
        }

        .main-container {
            padding: 0 2rem;
        }

        .layer-control {
            background: white;
            padding: 10px;
            border-radius: 5px;
            box-shadow: 0 1px 5px rgba(0, 0, 0, 0.2);
            margin: 10px;
        }
    </style>
</head>

<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="index.php">The Beauty of Badung</a>
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
        <h1>Peta Wisata Badung <i class="fa-regular fa-compass"></i></h1>
        <p>Jelajahi keindahan Badung dengan lebih mudah menggunakan peta wisata lengkap!
            Temukan lokasi menarik seperti pantai-pantai eksotis, pura megah, air terjun tersembunyi,
            hingga pusat kuliner dan belanja yang khas. Dengan peta ini, perjalanan Anda menjadi lebih terarah,
            efisien, dan penuh petualangan. Mulailah petualangan Anda di Badung dan temukan surga di setiap titiknya! 🌏✨</p>
    </header>

    <div class="main-container">
        <!-- Interactive Map -->
        <div id="map"></div>
    </div>

    <!-- JS untuk Leaflet dan Bootstrap -->
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0-alpha1/js/bootstrap.bundle.min.js"></script>
    <script>
        // Inisialisasi peta
        var map = L.map('map').setView([-8.5797, 115.1776], 9.5);

        // Base Layer (OpenStreetMap)
        var baseLayer = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© OpenStreetMap contributors'
        }).addTo(map);

        // Layer Administrasi
        var administrasiLayer = L.tileLayer.wms("http://localhost:8080/geoserver/responsi/wms", {
            layers: 'responsi:ADMINISTRASIKECAMATAN_AR',
            format: 'image/png',
            transparent: true,
            version: '1.1.0',
            attribution: "GeoServer"
        }).addTo(map);

        // Layer Jalan
        var jalanLayer = L.tileLayer.wms("http://localhost:8080/geoserver/responsi/wms", {
            layers: 'responsi:JALAN_LN_25K',
            format: 'image/png',
            transparent: true,
            version: '1.1.0',
            attribution: "GeoServer"
        }).addTo(map);

        // Menambahkan marker dari database
        <?php
        if (isset($locations) && !empty($locations)) {
            foreach ($locations as $location) {
                echo "L.marker([" . $location['latitude'] . ", " . $location['longitude'] . "])
                    .addTo(map)
                    .bindPopup('<b>" . addslashes(htmlspecialchars($location['nama_tempat'])) . "</b><br>" .
                    addslashes(htmlspecialchars($location['deskripsi'])) . "');";
            }
        }
        ?>

        // Layer Control
        var baseMaps = {
            "OpenStreetMap": baseLayer
        };

        var overlayMaps = {
            "Administrasi": administrasiLayer,
            "Jalan": jalanLayer
        };

        L.control.layers(baseMaps, overlayMaps, {
            position: 'topright',
            collapsed: false
        }).addTo(map);
    </script>
</body>

</html>