<?php
require_once '../config/connection.php';

use config\Connection;

$pdo = Connection::make();

$anggota = $pdo->query("SELECT COUNT(*) FROM anggota")->fetchColumn();
$pegawai = $pdo->query("SELECT COUNT(*) FROM pegawai")->fetchColumn();
$produk = $pdo->query("SELECT COUNT(*) FROM produk")->fetchColumn();
$pesanan = $pdo->query("SELECT COUNT(*) FROM pesanan")->fetchColumn();
$pembayaran = $pdo->query("SELECT COUNT(*) FROM pembayaran")->fetchColumn();
$detail_pesanan = $pdo->query("SELECT COUNT(*) FROM detail_pesanan")->fetchColumn();
$kartu_diskon = $pdo->query("SELECT COUNT(*) FROM kartu_diskon")->fetchColumn();
$jenis_produk = $pdo->query("SELECT COUNT(*) FROM jenis_produk")->fetchColumn();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Dashboard - Koperasi Pegawai</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="../public/css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand ps-3" href="dashboard.php">Dashboard</a>
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle"><i class="fas fa-bars"></i></button>
    </nav>

    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Main Menu</div>
                        <a class="nav-link" href="../views/anggota/index.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>Anggota
                        </a>
                        <a class="nav-link" href="../views/pegawai/index.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-user-tie"></i></div>Pegawai
                        </a>
                        <a class="nav-link" href="../views/produk/index.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-box"></i></div>Produk
                        </a>
                        <a class="nav-link" href="../views/pesanan/index.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-shopping-cart"></i></div>Pesanan
                        </a>
                        <a class="nav-link" href="../views/pembayaran/index.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-credit-card"></i></div>Pembayaran
                        </a>
                        <a class="nav-link" href="../views/detail_pesanan/index.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-file-invoice"></i></div>Detail Pesanan
                        </a>
                        <a class="nav-link" href="../views/kartu_diskon/index.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-gift"></i></div>Kartu Diskon
                        </a>
                        <a class="nav-link" href="../views/jenis_produk/index.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tags"></i></div>Jenis Produk
                        </a>
                    </div>
                </div>
            </nav>
        </div>

        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Dashboard</h1>
                    <div class="row">
                        <?php
                        $boxes = [
                            ["Total Anggota", $anggota, "primary", "users"],
                            ["Total Pegawai", $pegawai, "success", "user-tie"],
                            ["Total Produk", $produk, "warning", "box"],
                            ["Total Pesanan", $pesanan, "info", "shopping-cart"],
                            ["Total Pembayaran", $pembayaran, "dark", "credit-card"],
                            ["Detail Pesanan", $detail_pesanan, "secondary", "file-invoice"],
                            ["Kartu Diskon", $kartu_diskon, "danger", "gift"],
                            ["Jenis Produk", $jenis_produk, "light text-dark", "tags"]
                        ];

                        foreach ($boxes as [$label, $value, $color, $icon]) {
                            echo "
                            <div class='col-xl-3 col-md-6 mb-4'>
                                <div class='card bg-$color text-white h-100'>
                                    <div class='card-body d-flex justify-content-between align-items-center'>
                                        <div>
                                            <h5 class='card-title mb-0'>$label</h5>
                                            <h3>$value</h3>
                                        </div>
                                        <i class='fas fa-$icon fa-2x'></i>
                                    </div>
                                </div>
                            </div>";
                        }
                        ?>
                    </div>
                </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">© <?= date('Y') ?> Koperasi Pegawai</div>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../public/js/scripts.js"></script>
</body>

</html>