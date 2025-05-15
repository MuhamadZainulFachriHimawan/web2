<?php
class DetailPesanan
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function getAll()
    {
        $stmt = $this->pdo->prepare("
            SELECT dp.id, dp.id_pesanan, p.nama_produk, dp.jumlah
            FROM detail_pesanan dp
            JOIN produk p ON dp.id_produk = p.id
            ORDER BY dp.id DESC
        ");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getById($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM detail_pesanan WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function create($data)
    {
        $stmt = $this->pdo->prepare("INSERT INTO detail_pesanan (id_pesanan, id_produk, jumlah) VALUES (?, ?, ?)");
        $stmt->execute([$data['id_pesanan'], $data['id_produk'], $data['jumlah']]);
    }

    public function update($id, $data)
    {
        $stmt = $this->pdo->prepare("UPDATE detail_pesanan SET id_pesanan = ?, id_produk = ?, jumlah = ? WHERE id = ?");
        $stmt->execute([$data['id_pesanan'], $data['id_produk'], $data['jumlah'], $id]);
    }

    public function delete($id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM detail_pesanan WHERE id = ?");
        $stmt->execute([$id]);
    }
}
