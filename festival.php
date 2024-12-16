<?php
require_once 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Festival dan Acara - The Beauty of Badung</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0-alpha1/css/bootstrap.min.css">
    <style>
        .navbar {
            background-color: #5B0909;
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
            background: linear-gradient(to bottom right, #F0D290, #A04747);
        }

        .page-header {
            text-align: center;
            padding: 50px 0;
            background: linear-gradient(to bottom right, #fdfbfb, #F0D290);
            ;
            color: #A04747;
            margin-bottom: 2rem;
        }

        .event-card {
            margin-bottom: 2rem;
            transition: transform 0.3s;
            background-color: #F0D290;
        }

        .event-card:hover {
            transform: translateY(-5px);
        }

        .event-image {
            height: 250px;
            object-fit: cover;
        }

        .event-status {
            position: absolute;
            top: 10px;
            right: 10px;
            padding: 5px 15px;
            border-radius: 20px;
            color: white;
            font-weight: bold;
        }

        .status-upcoming {
            background-color: #17a2b8;
        }

        .status-completed {
            background-color: #28a745;
        }

        .btn-detail {
            background-color: #006400;
            color: white;
            padding: 8px 20px;
            border-radius: 5px;
            text-decoration: none;
            display: inline-block;
            transition: background-color 0.3s;
        }

        .btn-detail:hover {
            background-color: #004d00;
            color: white;
        }

        .event-description {
            color: #666;
            margin: 10px 0;
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
        <div class="container">
            <h1>Festival dan Acara di Badung <i class="fa-regular fa-calendar-days"></i></h1>
            <p>Wilayah Badung, Bali, bukan hanya dikenal dengan pantai-pantainya yang memesona,
                tetapi juga sebagai tempat berbagai festival dan acara yang menggambarkan kekayaan budaya,
                tradisi, dan keramahan masyarakat setempat. Setiap tahunnya, Badung menjadi tuan rumah berbagai perayaan
                yang tidak hanya memikat wisatawan domestik,
                tetapi juga menarik perhatian wisatawan mancanegara.</p>
        </div>
    </header>

    <!-- Event List -->
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-3">
                <div class="card event-card">
                    <span class="event-status status-upcoming">Akan Datang</span>
                    <img src="images/mebuug-buugan.jpg" class="card-img-top event-image" alt="Ritual Mebuug-buugan">
                    <div class="card-body">
                        <h5 class="card-title">Ritual Unik Mebuug-buugan Setelah Nyepi</h5>
                        <p class="card-text event-description">30 Mar 2025</p>
                        <a href="event-detail.php?id=1" class="btn-detail">Lihat Acara</a>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="card event-card">
                    <span class="event-status status-upcoming">Akan Datang</span>
                    <img src="images/siat-yeh.jpg" class="card-img-top event-image" alt="Tradisi Siat Yeh">
                    <div class="card-body">
                        <h5 class="card-title">Tradisi Siat Yeh: Ritual Perang Air di Desa Adat Jimbaran Bali</h5>
                        <p class="card-text event-description">30 Mar 2025</p>
                        <a href="event-detail.php?id=2" class="btn-detail">Lihat Acara</a>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="card event-card">
                    <span class="event-status status-completed">Terlaksana</span>
                    <img src="images/perang-tipat.jpg" class="card-img-top event-image" alt="Tradisi Perang Tipat">
                    <div class="card-body">
                        <h5 class="card-title">Tradisi Perang Tipat di Desa Kapal, Badung</h5>
                        <p class="card-text event-description">17 Okt 2024</p>
                        <a href="event-detail.php?id=3" class="btn-detail">Lihat Acara</a>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="card event-card">
                    <span class="event-status status-completed">Terlaksana</span>
                    <img src="images/mekotek.jpg" class="card-img-top event-image" alt="Tradisi Mekotek">
                    <div class="card-body">
                        <h5 class="card-title">Sejarah dan Makna Tradisi Mekotek di Desa Munggu</h5>
                        <p class="card-text event-description">5 Okt 2024</p>
                        <a href="event-detail.php?id=4" class="btn-detail">Lihat Acara</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0-alpha1/js/bootstrap.bundle.min.js"></script>
</body>

</html>