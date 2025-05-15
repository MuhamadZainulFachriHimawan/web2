<?php
class Anggota
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function getAll()
    {
        $stmt = $this->pdo->prepare("SELECT * FROM anggota ORDER BY id DESC");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getById($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM anggota WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function create($data)
    {
        $stmt = $this->pdo->prepare("INSERT INTO anggota (nama_lengkap, alamat, telepon, tanggal_gabung) VALUES (?, ?, ?, ?)");
        $stmt->execute([$data['nama_lengkap'], $data['alamat'], $data['telepon'], $data['tanggal_gabung']]);
    }

    public function update($id, $data)
    {
        $stmt = $this->pdo->prepare("UPDATE anggota SET nama_lengkap = ?, alamat = ?, telepon = ?, tanggal_gabung = ? WHERE id = ?");
        $stmt->execute([$data['nama_lengkap'], $data['alamat'], $data['telepon'], $data['tanggal_gabung'], $id]);
    }

    public function delete($id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM anggota WHERE id = ?");
        $stmt->execute([$id]);
    }
}
