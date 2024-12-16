<?php
require_once 'koneksi.php';

// Array data acara
$events = [
    1 => [
        'title' => 'Ritual Unik Mebuug-buugan Setelah Nyepi',
        'date' => '30 Mar 2025',
        'image' => 'images/mebuug-buugan.jpg',
        'description' => 'Bagi Anda yang ingin merasakan keunikan tradisi Bali, Mebuug-buugan di Desa Kedonganan adalah 
        pengalaman yang tak boleh dilewatkan. Festival ini merupakan tradisi unik di mana masyarakat bergembira bermain lumpur, 
        sebagai simbol membersihkan diri dari energi negatif. Dikelilingi oleh keindahan alam pedesaan, peserta melumuri tubuh 
        mereka dengan lumpur, lalu mencuci diri di laut sebagai penutup ritual. Tradisi ini tidak hanya menjadi momen seru, 
        tetapi juga pengingat akan pentingnya menjaga keharmonisan antara manusia dan alam. Siapkan diri Anda untuk terlibat 
        dalam keceriaan yang autentik dan menyegarkan!',
        'status' => 'Akan Datang'
    ],
    2 => [
        'title' => 'Tradisi Siat Yeh: Ritual Perang Air di Desa Adat Jimbaran Bali',
        'date' => '30 Mar 2025',
        'image' => 'images/siat-yeh.jpg',
        'description' => 'Pernahkah Anda membayangkan sebuah festival di mana perang air menjadi bentuk perayaan? Siat Yeh di 
        Desa Adat Jimbaran menghadirkan keunikan tersebut. Ritual ini adalah tradisi penuh makna spiritual, di mana masyarakat 
        saling memercikkan air untuk menyucikan diri sekaligus memohon berkah. Air dianggap sebagai elemen pemurnian, dan suasana 
        penuh tawa serta keceriaan membuat acara ini sangat menarik untuk diikuti. Dengan latar belakang keindahan Jimbaran, ritual 
        ini menjadi pengalaman yang menyatukan wisatawan dengan tradisi lokal dalam harmoni yang menyenangkan.',
        'status' => 'Akan Datang'
    ],
    3 => [
        'title' => 'Tradisi Perang Tipat di Desa Kapal, Badung',
        'date' => '17 Okt 2024',
        'image' => 'images/perang-tipat.jpg',
        'description' => 'Jika Anda tertarik dengan tradisi unik yang melibatkan kuliner, Perang Tipat di Desa Kapal wajib Anda saksikan! 
        Dalam ritual ini, masyarakat saling melempar tipat (ketupat) sebagai simbol rasa syukur atas keberkahan panen. Festival ini penuh 
        dengan semangat kebersamaan, warna-warni budaya, dan tentunya momen yang tak terlupakan. Setelah "perang" selesai, tipat yang tersisa 
        dikumpulkan untuk menjadi persembahan kepada dewa sebagai wujud syukur. Jangan lupa untuk mencicipi hidangan khas ini saat Anda berkunjung, 
        karena Perang Tipat bukan hanya sebuah tradisi, tetapi juga perayaan rasa syukur dan kebersamaan.',
        'status' => 'Terlaksana'
    ],
    4 => [
        'title' => 'Sejarah dan Makna Tradisi Mekotek di Desa Munggu',
        'date' => '5 Okt 2024',
        'image' => 'images/mekotek.jpg',
        'description' => 'Tradisi Mekotek di Desa Munggu adalah salah satu atraksi budaya yang memikat dan sarat sejarah. Festival ini dilakukan untuk 
        memohon keselamatan dan kesejahteraan desa, di mana masyarakat membawa tongkat kayu panjang dan menyusunnya menjadi piramida, yang dikenal sebagai 
        mekotek. Tradisi ini diyakini telah berlangsung sejak era Kerajaan Mengwi dan menjadi simbol persatuan dan keberanian. Peserta pria dari berbagai usia 
        turut serta dalam kegiatan ini, menciptakan atmosfer yang penuh semangat. Saksikan bagaimana tradisi kuno ini terus hidup dalam modernitas, dan rasakan 
        kedalaman makna spiritual yang menginspirasi semua yang hadir.',
        'status' => 'Terlaksana'
    ]
];

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$event = isset($events[$id]) ? $events[$id] : null;

if (!$event) {
    header('Location: festival.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($event['title']); ?> - The Beauty of Badung</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0-alpha1/css/bootstrap.min.css">
    <style>
        .navbar {
            background-color: #973131;
            padding: 1rem;
        }

        .navbar-brand,
        .nav-link {
            color: white !important;
        }

        .nav-link:hover {
            color: #ddd !important;
        }

        .event-header {
            position: relative;
            background: linear-gradient(to bottom right, #fdfbfb, #DEAC80);
            color: #973131;
            padding: 50px 0;
            margin-bottom: 2rem;
        }

        .event-image {
            width: 100%;
            max-height: 500px;
            object-fit: cover;
            margin-bottom: 2rem;
        }

        .event-status {
            display: inline-block;
            padding: 5px 15px;
            border-radius: 20px;
            color: white;
            font-weight: bold;
            margin-bottom: 1rem;
        }

        .status-upcoming {
            background-color: #17a2b8;
        }

        .status-completed {
            background-color: #28a745;
        }

        .event-description {
            font-size: 1.1rem;
            /* Ukuran teks yang nyaman dibaca */
            line-height: 1.8;
            /* Spasi antarbaris lebih besar */
            color: #333;
            /* Warna teks */
            text-align: justify;
            /* Rata kanan dan kiri untuk kesan rapi */
            word-wrap: break-word;
            /* Pecah kata panjang agar tidak keluar area */
            white-space: normal;
            /* Teks tidak memaksakan baris baru */
            margin-bottom: 2rem;
            /* Jarak bawah yang cukup */
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

    <!-- Event Detail -->
    <div class="event-header">
        <div class="container">
            <span class="event-status <?php echo $event['status'] === 'Akan Datang' ? 'status-upcoming' : 'status-completed'; ?>">
                <?php echo htmlspecialchars($event['status']); ?>
            </span>
            <h1><?php echo htmlspecialchars($event['title']); ?></h1>
            <p class="lead">Tanggal: <?php echo htmlspecialchars($event['date']); ?></p>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <img src="<?php echo htmlspecialchars($event['image']); ?>" alt="<?php echo htmlspecialchars($event['title']); ?>" class="event-image">
                <div class="event-description">
                    <?php echo nl2br(str_replace(["\n", "\r"], " ", $event['description'])); ?>
                </div>
                <div class="text-center mt-4 mb-5">
                    <a href="festival.php" class="btn btn-primary">Kembali ke Daftar Acara</a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0-alpha1/js/bootstrap.bundle.min.js"></script>
</body>

</html>