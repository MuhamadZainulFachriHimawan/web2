<?php
require_once '../../config/connection.php';

use config\Connection;

$pdo = Connection::make();

require_once '../../models/produk.php';
$obj = new Produk($pdo);
$jenisProduk = $obj->getJenisProduk();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $obj->create($_POST);
    header("Location: index.php");
    exit;
}

include __DIR__ . '/../templates/header.php';
include __DIR__ . '/../templates/sidebar.php';
?>

<div class="container mt-4">
    <h2>Tambah Produk</h2>
    <form method="POST">
        <div class="mb-3">
            <label>Nama Produk</label>
            <input type="text" name="nama_produk" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Harga</label>
            <input type="number" name="harga" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Stok</label>
            <input type="number" name="stok" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Jenis Produk</label>
            <select name="id_jenis" class="form-control" required>
                <option value="">-- Pilih Jenis Produk --</option>
                <?php foreach ($jenisProduk as $jenis): ?>
                    <option value="<?= $jenis['id'] ?>"><?= htmlspecialchars($jenis['nama_jenis']) ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <button class="btn btn-success">Simpan</button>
    </form>
</div>

<?php include __DIR__ . '/../templates/footer.php'; ?>