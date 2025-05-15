<?php
class Pembayaran
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function getAll()
    {
        $stmt = $this->pdo->prepare("
            SELECT pembayaran.*, p.tanggal_pesanan, a.nama_lengkap
            FROM pembayaran
            JOIN pesanan p ON pembayaran.id_pesanan = p.id
            JOIN anggota a ON p.id_anggota = a.id
            ORDER BY pembayaran.id DESC
        ");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getById($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM pembayaran WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function create($data)
    {
        $stmt = $this->pdo->prepare("INSERT INTO pembayaran (id_pesanan, jumlah, tanggal_pembayaran, metode) VALUES (?, ?, ?, ?)");
        $stmt->execute([$data['id_pesanan'], $data['jumlah'], $data['tanggal_pembayaran'], $data['metode']]);
    }

    public function update($id, $data)
    {
        $stmt = $this->pdo->prepare("UPDATE pembayaran SET id_pesanan = ?, jumlah = ?, tanggal_pembayaran = ?, metode = ? WHERE id = ?");
        $stmt->execute([$data['id_pesanan'], $data['jumlah'], $data['tanggal_pembayaran'], $data['metode'], $id]);
    }

    public function delete($id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM pembayaran WHERE id = ?");
        $stmt->execute([$id]);
    }

    public function getPesanan()
    {
        $stmt = $this->pdo->prepare("
            SELECT p.id, a.nama_lengkap, p.tanggal_pesanan
            FROM pesanan p
            JOIN anggota a ON p.id_anggota = a.id
            ORDER BY p.tanggal_pesanan DESC
        ");
        $stmt->execute();
        return $stmt->fetchAll();
    }
}
