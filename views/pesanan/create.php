<?php
require_once '../../config/connection.php';
use config\Connection;
$pdo = Connection::make();
require_once '../../models/pesanan.php';
$obj = new Pesanan($pdo);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $obj->create($_POST);
    header("Location: index.php");
    exit;
}
include __DIR__ . '/../templates/header.php';
include __DIR__ . '/../templates/sidebar.php';

?>

<div class="container mt-4">
    <h2 class="mb-4">Tambah Pesanan</h2>
    <form method="POST">
        <div class="mb-3">
            <label for="id_anggota" class="form-label">Id Anggota</label>
            <input type="text" class="form-control" name="id_anggota" value="<?= $data['id_anggota'] ?? '' ?>" required>
        </div>

        <div class="mb-3">
            <label for="tanggal_pesanan" class="form-label">Tanggal Pesanan</label>
            <input type="text" class="form-control" name="tanggal_pesanan" value="<?= $data['tanggal_pesanan'] ?? '' ?>" required>
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
    </form>
</div>

<?php include __DIR__ . '/../templates/footer.php'; ?>
