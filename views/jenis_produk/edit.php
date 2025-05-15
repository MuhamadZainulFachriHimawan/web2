<?php
require_once '../../config/connection.php';

use config\Connection;

$pdo = Connection::make();

require_once '../../models/jenis_produk.php';
$obj = new JenisProduk($pdo);
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
    <h2>Edit Jenis Produk</h2>
    <form method="POST">
        <div class="mb-3">
            <label>Nama Jenis</label>
            <input type="text" name="nama_jenis" class="form-control" value="<?= htmlspecialchars($data['nama_jenis']) ?>" required>
        </div>
        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="deskripsi" class="form-control" required><?= htmlspecialchars($data['deskripsi']) ?></textarea>
        </div>
        <button class="btn btn-primary">Update</button>
    </form>
</div>

<?php include __DIR__ . '/../templates/footer.php'; ?>