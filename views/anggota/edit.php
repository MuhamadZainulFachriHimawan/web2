<?php
require_once '../../config/connection.php';

use config\Connection;

$pdo = Connection::make();

require_once '../../models/anggota.php';
$obj = new Anggota($pdo);
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
    <h2>Edit Anggota</h2>
    <form method="POST">
        <div class="mb-3">
            <label>Nama Lengkap</label>
            <input type="text" name="nama_lengkap" class="form-control" value="<?= htmlspecialchars($data['nama_lengkap']) ?>" required>
        </div>
        <div class="mb-3">
            <label>Alamat</label>
            <textarea name="alamat" class="form-control" required><?= htmlspecialchars($data['alamat']) ?></textarea>
        </div>
        <div class="mb-3">
            <label>Telepon</label>
            <input type="text" name="telepon" class="form-control" value="<?= htmlspecialchars($data['telepon']) ?>" required>
        </div>
        <div class="mb-3">
            <label>Tanggal Gabung</label>
            <input type="date" name="tanggal_gabung" class="form-control" value="<?= htmlspecialchars($data['tanggal_gabung']) ?>" required>
        </div>
        <button class="btn btn-primary">Update</button>
    </form>
</div>

<?php include __DIR__ . '/../templates/footer.php'; ?>