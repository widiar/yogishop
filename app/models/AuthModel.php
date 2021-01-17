<?php

class AuthModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function cekuser($email)
    {
        $q = "SELECT * FROM user WHERE email='$email'";
        return $this->db->single($q);
    }

    public function cekadmin($email)
    {
        $q = "SELECT * FROM admin WHERE email='$email'";
        return $this->db->single($q);
    }

    public function register($data)
    {
        $nama = amankan($data['nama']);
        $email = amankan($data['email']);
        $notlp = amankan($data['notlp']);
        $alamat = amankan($data['alamat']);
        $provinsi = amankan($data['provinsi']);
        $kabupaten = amankan($data['kabupaten']);
        $password = amankan($data['password']);
        $pass = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO user VALUES('', ?, ?, ? ,? ,? ,? ,? )";
        $this->db->query($sql);
        $param = 'sssssss';
        $values = [$nama, $email, $alamat, $provinsi, $kabupaten, $notlp, $pass];
        $this->db->bind($param, $values);
        if($this->db->execute()) return 1;
        else return 0;
    }
}