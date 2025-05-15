<?php
require_once '../../config/connection.php';

use config\Connection;

$pdo = Connection::make();

require_once '../../models/kartu_diskon.php';
$obj = new KartuDiskon($pdo);
$data = $obj->getById($_GET['id']);
$anggotaList = $obj->getAnggota();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $obj->update($_GET['id'], $_POST);
    header("Location: index.php");
    exit;
}

include __DIR__ . '/../templates/header.php';
include __DIR__ . '/../templates/sidebar.php';
?>

<div class="container mt-4">
    <h2>Edit Kartu Diskon</h2>
    <form method="POST">
        <div class="mb-3">
            <label>Nama Anggota</label>
            <select name="id_anggota" class="form-control" required>
                <option value="">-- Pilih Anggota --</option>
                <?php foreach ($anggotaList as $anggota): ?>
                    <option value="<?= $anggota['id'] ?>" <?= $anggota['id'] == $data['id_anggota'] ? 'selected' : '' ?>>
                        <?= htmlspecialchars($anggota['nama_lengkap']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="mb-3">
            <label>Diskon (%)</label>
            <input type="number" name="diskon" class="form-control" value="<?= htmlspecialchars($data['diskon']) ?>" required>
        </div>
        <div class="mb-3">
            <label>Masa Berlaku</label>
            <input type="date" name="masa_berlaku" class="form-control" value="<?= htmlspecialchars($data['masa_berlaku']) ?>" required>
        </div>
        <button class="btn btn-primary">Update</button>
    </form>
</div>

<?php include __DIR__ . '/../templates/footer.php'; ?>