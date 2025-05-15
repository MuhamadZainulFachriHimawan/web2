<?php
require_once '../../config/connection.php';

use config\Connection;

$pdo = Connection::make();

require_once '../../models/produk.php';
$obj = new Produk($pdo);
$data = $obj->getById($_GET['id']);
$jenisProduk = $obj->getJenisProduk();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $obj->update($_GET['id'], $_POST);
    header("Location: index.php");
    exit;
}

include __DIR__ . '/../templates/header.php';
include __DIR__ . '/../templates/sidebar.php';
?>

<div class="container mt-4">
    <h2>Edit Produk</h2>
    <form method="POST">
        <div class="mb-3">
            <label>Nama Produk</label>
            <input type="text" name="nama_produk" class="form-control" value="<?= htmlspecialchars($data['nama_produk']) ?>" required>
        </div>
        <div class="mb-3">
            <label>Harga</label>
            <input type="number" name="harga" class="form-control" value="<?= htmlspecialchars($data['harga']) ?>" required>
        </div>
        <div class="mb-3">
            <label>Stok</label>
            <input type="number" name="stok" class="form-control" value="<?= htmlspecialchars($data['stok']) ?>" required>
        </div>
        <div class="mb-3">
            <label>Jenis Produk</label>
            <select name="id_jenis" class="form-control" required>
                <option value="">-- Pilih Jenis Produk --</option>
                <?php foreach ($jenisProduk as $jenis): ?>
                    <option value="<?= $jenis['id'] ?>" <?= $jenis['id'] == $data['id_jenis'] ? 'selected' : '' ?>>
                        <?= htmlspecialchars($jenis['nama_jenis']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <button class="btn btn-primary">Update</button>
    </form>
</div>

<?php include __DIR__ . '/../templates/footer.php'; ?>