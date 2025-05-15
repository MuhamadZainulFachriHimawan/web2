<?php
class Pegawai {
    private $pdo;
    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function getAll() {
        $stmt = $this->pdo->query("SELECT * FROM pegawai");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM pegawai WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($data) {
        $stmt = $this->pdo->prepare("INSERT INTO pegawai (nama, jabatan, email, telepon) VALUES (?, ?, ?, ?)");
        return $stmt->execute([$data['nama'], $data['jabatan'], $data['email'], $data['telepon']]);
    }

    public function update($id, $data) {
        $stmt = $this->pdo->prepare("UPDATE pegawai SET nama = ?, jabatan = ?, email = ?, telepon = ? WHERE id = ?");
        return $stmt->execute([$data['nama'], $data['jabatan'], $data['email'], $data['telepon'], $id]);
    }

    public function delete($id) {
        $stmt = $this->pdo->prepare("DELETE FROM pegawai WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
?>
