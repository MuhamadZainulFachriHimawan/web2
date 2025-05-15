<?php
require_once '../../config/connection.php';

use config\Connection;

$pdo = Connection::make();

require_once '../../models/anggota.php';
$obj = new Anggota($pdo);
$data = $obj->getAll();

include __DIR__ . '/../templates/header.php';
include __DIR__ . '/../templates/sidebar.php';
?>

<div class="container mt-4">
    <h2 class="mb-4">Data Anggota</h2>
    <a href="create.php" class="btn btn-primary mb-3">Tambah Anggota</a>
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <tr>
                <th>Nama Lengkap</th>
                <th>Alamat</th>
                <th>Telepon</th>
                <th>Tanggal Gabung</th>
                <th>Aksi</th>
            </tr>
            <?php foreach ($data as $row): ?>
                <tr>
                    <td><?= htmlspecialchars($row['nama_lengkap']) ?></td>
                    <td><?= htmlspecialchars($row['alamat']) ?></td>
                    <td><?= htmlspecialchars($row['telepon']) ?></td>
                    <td><?= htmlspecialchars($row['tanggal_gabung']) ?></td>
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