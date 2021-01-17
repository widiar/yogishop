<?php

class AdminModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function tambahbarang($data)
    {
        $nama_brg = amankan($data['nama_brg']);
        $kategori = amankan($data['kategori']);
        $harga = amankan($data['harga']);
        $stok = amankan($data['stok']);
        $gambar = amankan($data['gambar']);
        $keterangan = amankan($data['keterangan']);
        $sql = "INSERT INTO barang VALUES('', ?, ?, ? ,? ,? ,? )";
        $this->db->query($sql);
        $param = 'ssidis';
        $values = [$nama_brg, $keterangan, $kategori, $harga, $stok, $gambar];
        $this->db->bind($param, $values);
        if ($this->db->execute()) return 1;
        else return 0;
    }
    public function tambahkategori($data)
    {
        $nama = amankan($data['nama']);
        $sql = "INSERT INTO kategori VALUES('', ?)";
        $this->db->query($sql);
        $param = 's';
        $values = [$nama];
        $this->db->bind($param, $values);
        if ($this->db->execute()) return 1;
        else return 0;
    }

    public function updatebarang($data, $id)
    {
        $nama_brg = amankan($data['nama_brg']);
        $kategori = amankan($data['kategori']);
        $harga = amankan($data['harga']);
        $stok = amankan($data['stok']);
        $gambar = amankan($data['gambar']);
        $keterangan = amankan($data['keterangan']);
        $sql = "UPDATE barang SET nama_brg=?, keterangan=?, id_kategori=?, harga=?, stok=?, gambar=? WHERE id_brg='$id'";
        $this->db->query($sql);
        $param = 'ssidis';
        $values = [$nama_brg, $keterangan, $kategori, $harga, $stok, $gambar];
        $this->db->bind($param, $values);
        $this->db->execute();
    }
    public function destroybarang($id)
    {
        if ($this->db->queryexecute("DELETE FROM barang WHERE id_brg='$id'")) return 1;
        else return 0;
    }
}
