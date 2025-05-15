<?php
class KartuDiskon
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function getAll()
    {
        $stmt = $this->pdo->prepare("
            SELECT kd.*, a.nama_lengkap 
            FROM kartu_diskon kd
            JOIN anggota a ON kd.id_anggota = a.id
            ORDER BY kd.id DESC
        ");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getById($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM kartu_diskon WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function create($data)
    {
        $stmt = $this->pdo->prepare("INSERT INTO kartu_diskon (id_anggota, diskon, masa_berlaku) VALUES (?, ?, ?)");
        $stmt->execute([$data['id_anggota'], $data['diskon'], $data['masa_berlaku']]);
    }

    public function update($id, $data)
    {
        $stmt = $this->pdo->prepare("UPDATE kartu_diskon SET id_anggota = ?, diskon = ?, masa_berlaku = ? WHERE id = ?");
        $stmt->execute([$data['id_anggota'], $data['diskon'], $data['masa_berlaku'], $id]);
    }

    public function delete($id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM kartu_diskon WHERE id = ?");
        $stmt->execute([$id]);
    }

    public function getAnggota()
    {
        $stmt = $this->pdo->prepare("SELECT * FROM anggota ORDER BY nama_lengkap ASC");
        $stmt->execute();
        return $stmt->fetchAll();
    }
}
