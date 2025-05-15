<?php
require_once '../../config/connection.php';

use config\Connection;

$pdo = Connection::make();

require_once '../../models/pembayaran.php';
$obj = new Pembayaran($pdo);
$pesananList = $obj->getPesanan();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $obj->create($_POST);
    header("Location: index.php");
    exit;
}

include __DIR__ . '/../templates/header.php';
include __DIR__ . '/../templates/sidebar.php';
?>

<div class="container mt-4">
    <h2>Tambah Pembayaran</h2>
    <form method="POST">
        <div class="mb-3">
            <label>ID Pesanan</label>
            <select name="id_pesanan" class="form-control" required>
                <option value="">-- Pilih Pesanan --</option>
                <?php foreach ($pesananList as $pesanan): ?>
                    <option value="<?= $pesanan['id'] ?>">
                        <?= htmlspecialchars($pesanan['id']) ?> - <?= htmlspecialchars($pesanan['nama_lengkap']) ?> (<?= htmlspecialchars($pesanan['tanggal_pesanan']) ?>)
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="mb-3">
            <label>Jumlah</label>
            <input type="number" name="jumlah" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Tanggal Pembayaran</label>
            <input type="date" name="tanggal_pembayaran" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Metode</label>
            <input type="text" name="metode" class="form-control" required>
        </div>
        <button class="btn btn-success">Simpan</button>
    </form>
</div>

<?php include __DIR__ . '/../templates/footer.php'; ?>