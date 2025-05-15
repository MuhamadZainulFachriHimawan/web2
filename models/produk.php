<?php
class Produk
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function getAll()
    {
        $stmt = $this->pdo->prepare("
            SELECT produk.*, jenis_produk.nama_jenis 
            FROM produk 
            LEFT JOIN jenis_produk ON produk.id_jenis = jenis_produk.id
            ORDER BY produk.id DESC
        ");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getById($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM produk WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function create($data)
    {
        $stmt = $this->pdo->prepare("INSERT INTO produk (nama_produk, harga, stok, id_jenis) VALUES (?, ?, ?, ?)");
        $stmt->execute([$data['nama_produk'], $data['harga'], $data['stok'], $data['id_jenis']]);
    }

    public function update($id, $data)
    {
        $stmt = $this->pdo->prepare("UPDATE produk SET nama_produk = ?, harga = ?, stok = ?, id_jenis = ? WHERE id = ?");
        $stmt->execute([$data['nama_produk'], $data['harga'], $data['stok'], $data['id_jenis'], $id]);
    }

    public function delete($id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM produk WHERE id = ?");
        $stmt->execute([$id]);
    }

    public function getJenisProduk()
    {
        $stmt = $this->pdo->prepare("SELECT * FROM jenis_produk ORDER BY nama_jenis ASC");
        $stmt->execute();
        return $stmt->fetchAll();
    }
}
