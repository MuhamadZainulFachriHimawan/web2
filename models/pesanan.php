<?php
class Pesanan
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function getAll()
    {
        $stmt = $this->pdo->prepare("
            SELECT p.id, a.nama AS nama_anggota, p.tanggal_pesanan, p.status_bayar
            FROM pesanan p
            JOIN anggota a ON p.id_anggota = a.id
            ORDER BY p.tanggal_pesanan DESC
        ");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getById($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM pesanan WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function create($data)
    {
        $stmt = $this->pdo->prepare("INSERT INTO pesanan (id_anggota, tanggal_pesanan, status_bayar) VALUES (?, ?, ?)");
        $stmt->execute([$data['id_anggota'], $data['tanggal_pesanan'], $data['status_bayar']]);
    }

    public function update($id, $data)
    {
        $stmt = $this->pdo->prepare("UPDATE pesanan SET id_anggota = ?, tanggal_pesanan = ?, status_bayar = ? WHERE id = ?");
        $stmt->execute([$data['id_anggota'], $data['tanggal_pesanan'], $data['status_bayar'], $id]);
    }

    public function delete($id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM pesanan WHERE id = ?");
        $stmt->execute([$id]);
    }
}
