<?php
require_once '../../config/connection.php';

use config\Connection;

$pdo = Connection::make();

require_once '../../models/detail_pesanan.php';
$obj = new DetailPesanan($pdo);
$data = $obj->getById($_GET['id']);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $obj->update($_GET['id'], $_POST);
    header("Location: index.php");
    exit;
}

include __DIR__ . '/../templates/header.php';
include __DIR__ . '/../templates/sidebar.php';
?>

<div class="container mt-4">
    <h2>Edit Detail Pesanan</h2>
    <form method="POST">
        <div class="mb-3">
            <label>ID Pesanan</label>
            <input type="number" name="id_pesanan" class="form-control" value="<?= htmlspecialchars($data['id_pesanan']) ?>" required>
        </div>
        <div class="mb-3">
            <label>ID Produk</label>
            <input type="number" name="id_produk" class="form-control" value="<?= htmlspecialchars($data['id_produk']) ?>" required>
        </div>
        <div class="mb-3">
            <label>Jumlah</label>
            <input type="number" name="jumlah" class="form-control" value="<?= htmlspecialchars($data['jumlah']) ?>" required>
        </div>
        <button class="btn btn-primary">Update</button>
    </form>
</div>

<?php include __DIR__ . '/../templates/footer.php'; ?>