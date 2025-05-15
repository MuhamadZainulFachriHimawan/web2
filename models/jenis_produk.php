<?php
class JenisProduk
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function getAll()
    {
        $stmt = $this->pdo->prepare("SELECT * FROM jenis_produk ORDER BY id DESC");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getById($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM jenis_produk WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function create($data)
    {
        $stmt = $this->pdo->prepare("INSERT INTO jenis_produk (nama_jenis, deskripsi) VALUES (?, ?)");
        $stmt->execute([$data['nama_jenis'], $data['deskripsi']]);
    }

    public function update($id, $data)
    {
        $stmt = $this->pdo->prepare("UPDATE jenis_produk SET nama_jenis = ?, deskripsi = ? WHERE id = ?");
        $stmt->execute([$data['nama_jenis'], $data['deskripsi'], $id]);
    }

    public function delete($id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM jenis_produk WHERE id = ?");
        $stmt->execute([$id]);
    }
}
