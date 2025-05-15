<?php
require_once '../../config/connection.php';
use config\Connection;
$pdo = Connection::make();
require_once '../../models/pegawai.php';
$obj = new Pegawai($pdo);

$data = $obj->getAll();
include __DIR__ . '/../templates/header.php';
include __DIR__ . '/../templates/sidebar.php';

?>

<div class="container mt-4">
    <h2 class="mb-4">Data Pegawai</h2>
    <a href="create.php" class="btn btn-primary mb-3">Tambah Data</a>
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <tr><th>Nama</th><th>Jabatan</th><th>Email</th><th>Telepon</th><th>Aksi</th></tr>
            <?php foreach ($data as $row): ?>
            <tr>
                <td><?= htmlspecialchars($row['nama']) ?></td><td><?= htmlspecialchars($row['jabatan']) ?></td><td><?= htmlspecialchars($row['email']) ?></td><td><?= htmlspecialchars($row['telepon']) ?></td>
                <td>
                    <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="delete.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin?')">Hapus</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>

<?php include __DIR__ . '/../templates/footer.php'; ?>
