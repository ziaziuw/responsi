<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembuat - The Beauty of Badung</title>
    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0-alpha1/css/bootstrap.min.css">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        /* Navbar Styles */
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

        /* Pembuat Page Styles */
        .pembuat-section {
            padding: 4rem 0;
            background: linear-gradient(to bottom right, #fdfbfb, #CC2B52);
            position: relative;
        }

        body {
            background-color: #FBB4A5;
        }

        .pembuat-card {
            display: flex;
            align-items: center;
            background-color: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            padding: 2rem;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            background-color: #FFD1E3;
        }

        .pembuat-card:hover {
            transform: scale(1.03);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3);
        }

        .pembuat-image {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            border: 5px solid #F44336;
            object-fit: cover;
            margin-right: 2rem;
            transition: transform 0.3s ease;
        }

        .pembuat-card:hover .pembuat-image {
            transform: rotate(5deg) scale(1.1);
        }

        .pembuat-info h3 {
            font-size: 1.8rem;
            font-weight: bold;
            color: #333;
        }

        .pembuat-info p {
            font-size: 1rem;
            color: #555;
        }

        .social-icons {
            display: flex;
            gap: 1rem;
            margin-top: 1rem;
        }

        .social-icons a {
            color: #555;
            font-size: 1.5rem;
            transition: color 0.3s ease, transform 0.3s ease;
        }

        .social-icons a:hover {
            color: #F44336;
            transform: scale(1.2);
        }
    </style>
</head>

<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
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

    <!-- Pembuat Section -->
    <section class="pembuat-section">
        <div class="container">
            <div class="text-center mb-4">
                <h2 class="fw-bold">Tentang Pembuat</h2>
                <p class="text-muted">Halo! Saya adalah seorang pecinta perjalanan dan penjelajah budaya 
                    yang terinspirasi oleh keindahan Badung. Melalui website ini, saya ingin berbagi pengalaman, 
                    pengetahuan, dan rasa cinta saya terhadap destinasi-destinasi menakjubkan di daerah ini. Dengan 
                    hati dan dedikasi, saya berharap dapat membantu Anda menemukan keajaiban Badung dan menciptakan 
                    kenangan tak terlupakan. Selamat menjelajah, dan semoga perjalanan Anda penuh inspirasi! ✨</p>
            </div>
            <div class="row justify-content-center">
                <div class="pembuat-card">
                    <img src="images/adinda.png" alt="Adinda Fauzia Azizah" class="pembuat-image">
                    <div class="pembuat-info">
                        <h3>Adinda Fauzia Azizah</h3>
                        <p>Mahasiswa Sistem Informasi Geografis, Universitas Gadjah Mada</p>
                        <div class="social-icons">
                            <a href="https://www.instagram.com/adindaafzy/" target="_blank"><i class="fab fa-instagram"></i></a>
                            <a href="mailto:adindafauziah0405@gmail.com" target="_blank"><i class="far fa-envelope"></i></a>
                            <a href="https://wa.me/62895424822030" target="_blank"><i class="fab fa-whatsapp"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- JS for Bootstrap -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0-alpha1/js/bootstrap.bundle.min.js"></script>
</body>

</html>
