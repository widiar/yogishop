<?php

class HomeModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function ambildatabarang()
    {
        $sql = "SELECT * FROM barang";
        return $this->db->result($sql);
    }

    public function ambildatabarangbycategory($cat)
    {
        $sql = "SELECT * FROM barang WHERE id_kategori='$cat'";
        return $this->db->result($sql);
    }
    public function ambildatabarangbyid($id)
    {
        $sql = "SELECT * FROM barang WHERE id_brg='$id'";
        return $this->db->single($sql);
    }

    public function ambildatakategori()
    {
        $sql = "SELECT * FROM kategori";
        return $this->db->result($sql);
    }

    public function ambilprovinsi()
    {
        $sql = "SELECT * FROM provinsi";
        return $this->db->result($sql);
    }

    public function ambilkabupaten($id)
    {
        $sql = "SELECT * FROM kabupaten WHERE id_provinsi='$id'";
        return $this->db->result($sql);
    }
}
