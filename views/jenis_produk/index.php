<?php
require_once '../../config/connection.php';

use config\Connection;

$pdo = Connection::make();

require_once '../../models/jenis_produk.php';
$obj = new JenisProduk($pdo);
$data = $obj->getAll();

include __DIR__ . '/../templates/header.php';
include __DIR__ . '/../templates/sidebar.php';
?>

<div class="container mt-4">
    <h2 class="mb-4">Data Jenis Produk</h2>
    <a href="create.php" class="btn btn-primary mb-3">Tambah Jenis Produk</a>
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <tr>
                <th>Nama Jenis</th>
                <th>Deskripsi</th>
                <th>Aksi</th>
            </tr>
            <?php foreach ($data as $row): ?>
                <tr>
                    <td><?= htmlspecialchars($row['nama_jenis']) ?></td>
                    <td><?= htmlspecialchars($row['deskripsi']) ?></td>
                    <td>
                        <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="delete.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin hapus?')">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>

<?php include __DIR__ . '/../templates/footer.php'; ?>