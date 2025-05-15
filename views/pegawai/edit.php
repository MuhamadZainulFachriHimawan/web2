<?php
require_once '../../config/connection.php';
use config\Connection;
$pdo = Connection::make();
require_once '../../models/pegawai.php';
$obj = new Pegawai($pdo);

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
    <h2 class="mb-4">Edit Pegawai</h2>
    <form method="POST">
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" name="nama" value="<?= $data['nama'] ?? '' ?>" required>
        </div>

        <div class="mb-3">
            <label for="jabatan" class="form-label">Jabatan</label>
            <input type="text" class="form-control" name="jabatan" value="<?= $data['jabatan'] ?? '' ?>" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="text" class="form-control" name="email" value="<?= $data['email'] ?? '' ?>" required>
        </div>

        <div class="mb-3">
            <label for="telepon" class="form-label">Telepon</label>
            <input type="text" class="form-control" name="telepon" value="<?= $data['telepon'] ?? '' ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>

<?php include __DIR__ . '/../templates/footer.php'; ?>
