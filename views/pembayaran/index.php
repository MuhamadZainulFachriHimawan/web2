<?php
require_once '../../config/connection.php';

use config\Connection;

$pdo = Connection::make();

require_once '../../models/pembayaran.php';
$obj = new Pembayaran($pdo);
$data = $obj->getAll();

include __DIR__ . '/../templates/header.php';
include __DIR__ . '/../templates/sidebar.php';
?>

<div class="container mt-4">
    <h2 class="mb-4">Data Pembayaran</h2>
    <a href="create.php" class="btn btn-primary mb-3">Tambah Pembayaran</a>
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <tr>
                <th>ID Pesanan</th>
                <th>Nama Anggota</th>
                <th>Tanggal Pesanan</th>
                <th>Jumlah</th>
                <th>Tanggal Pembayaran</th>
                <th>Metode</th>
                <th>Aksi</th>
            </tr>
            <?php foreach ($data as $row): ?>
                <tr>
                    <td><?= htmlspecialchars($row['id_pesanan']) ?></td>
                    <td><?= htmlspecialchars($row['nama_lengkap']) ?></td>
                    <td><?= htmlspecialchars($row['tanggal_pesanan']) ?></td>
                    <td><?= htmlspecialchars($row['jumlah']) ?></td>
                    <td><?= htmlspecialchars($row['tanggal_pembayaran']) ?></td>
                    <td><?= htmlspecialchars($row['metode']) ?></td>
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