<?php

class Admin extends Controller
{
    public function index()
    {
        header('Location:' . BASEURL . 'admin/dashboard');
    }
    public function dashboard()
    {
        $this->view('admin/template/header');
        $this->view('admin/template/sidebar');
        $this->view('admin/dashboard');
        $this->view('admin/template/footer');
    }
    public function barang()
    {
        // var_dump(__DIR__);
        $data['barang'] = $this->model('HomeModel')->ambildatabarang();
        $data['kategori'] = $this->model('HomeModel')->ambildatakategori();
        $this->view('admin/template/header');
        $this->view('admin/template/sidebar');
        $this->view('admin/barang', $data);
        $this->view('admin/template/footer');
    }
    public function _tambahbarang()
    {
        if (isset($_POST['tambah'])) {
            $ekstensi = ["png", "jpg", "jpeg"];
            $gambar = $_FILES['gambar']['name'];
            $direktori = 'public/img/barang/';
            $eks = explode(".", $_FILES['gambar']['name']);
            $ekst = $eks[count($eks) - 1];
            if (in_array($ekst, $ekstensi)) {
                $tmpdir = $_FILES['gambar']['tmp_name'];
                $gambar = uniqid() . "." . $ekst;
                if (move_uploaded_file($tmpdir, $direktori . $gambar)) {
                    $data = [
                        'nama_brg' => $_POST['nama_brg'],
                        'kategori' => $_POST['kategori'],
                        'harga' => $_POST['harga'],
                        'stok' => $_POST['stok'],
                        'gambar' => $gambar,
                        'keterangan' => $_POST['keterangan'],
                    ];
                    if ($this->model('AdminModel')->tambahbarang($data))
                        echo "<script> alert('Berhasil ditambah'); window.location = '" . BASEURL . "admin/barang';</script>";
                    else echo "<script> alert('Gagal ditambah'); window.location = '" . BASEURL . "admin/barang';</script>";
                } else {
                    echo "<script> alert('Gagal ditambah tidak bisa upload gambar'); window.location = '" . BASEURL . "admin/barang';</script>";
                }
            } else {
                echo "<script> alert('Ekstensi salah gan'); window.location = '" . BASEURL . "admin/barang';</script>";
            }
        } else header('Location:' . BASEURL . 'admin/dashboard');
    }
    public function _tambahkategori()
    {
        if (isset($_POST['tambahbtn'])) {
            if ($this->model('AdminModel')->tambahkategori($_POST))
                echo "<script> alert('Berhasil ditambah'); window.location = '" . BASEURL . "admin/barang';</script>";
            else echo "<script> alert('Gagal ditambah'); window.location = '" . BASEURL . "admin/barang';</script>";
        } else header('Location:' . BASEURL . 'admin/dashboard');
    }

    public function databarang($id)
    {
        $datak = $this->model('HomeModel')->ambildatakategori();
        $id_brg = $id;
        $barang = $this->model('HomeModel')->ambildatabarangbyid($id_brg);
        $nama = $barang['nama_brg'];
        $kategori = [];
        foreach ($datak as $k) {
            if (strcmp($barang['id_kategori'], $k['id_kategori']) == 0)
                $string = '<option value="' . $k['id_kategori'] . '" selected>' . $k['nama'] . '</option>';
            else $string = '<option value="' . $k['id_kategori'] . '">' . $k['nama'] . '</option>';
            array_push($kategori, $string);
        };
        $harga = $barang['harga'];
        $keterangan = $barang['keterangan'];
        $stok = $barang['stok'];
        $gambar = $barang['gambar'];
        $kirim = [
            'id' => $barang['id_brg'],
            'nama' => $nama,
            'keterangan' => $keterangan,
            'kategori' => $kategori,
            'harga' => $harga,
            'stok' => $stok,
            'gambar' => $gambar
        ];
        echo json_encode($kirim);
    }

    public function _editbarang()
    {
        if (isset($_POST['editgan'])) {
            $ekstensi = ["png", "jpg", "jpeg"];
            $gambarlama = $_POST['gambarlama'];
            $id = $_POST['id'];
            $gambar = $_FILES['gambar']['name'];
            $direktori = 'public/img/barang/';
            if ($gambar) {
                $eks = explode(".", $_FILES['gambar']['name']);
                $ekst = $eks[count($eks) - 1];
                if (in_array($ekst, $ekstensi)) {
                    $tmpdir = $_FILES['gambar']['tmp_name'];
                    $gambar = uniqid() . "." . $ekst;
                    if (move_uploaded_file($tmpdir, $direktori . $gambar)) {
                        $data = [
                            'nama_brg' => $_POST['nama_brg'],
                            'kategori' => $_POST['kategori'],
                            'harga' => $_POST['harga'],
                            'stok' => $_POST['stok'],
                            'gambar' => $gambar,
                            'keterangan' => $_POST['keterangan'],
                        ];
                        $this->model('AdminModel')->updatebarang($data, $id);
                        unlink($direktori . $gambarlama);
                        echo "<script> alert('Berhasil di Ubah'); window.location = '" . BASEURL . "admin/barang';</script>";
                    } else {
                        echo "<script> alert('Gagal di Ubah'); window.location = '" . BASEURL . "admin/barang';</script>";
                    }
                } else {
                    echo "<script> alert('Ekstensi salah gan'); window.location = '" . BASEURL . "admin/barang';</script>";
                }
            } else {
                $data = [
                    'nama_brg' => $_POST['nama_brg'],
                    'kategori' => $_POST['kategori'],
                    'harga' => $_POST['harga'],
                    'stok' => $_POST['stok'],
                    'gambar' => $gambarlama,
                    'keterangan' => $_POST['keterangan'],
                ];
                $this->model('AdminModel')->updatebarang($data, $id);
                echo "<script> alert('Berhasil di Ubah'); window.location = '" . BASEURL . "admin/barang';</script>";
            }
        } else header('Location:' . BASEURL . 'admin/dashboard');
    }
    public function _deletebarang($id)
    {
        $direktori = 'public/img/barang/';
        $data = $this->model('HomeModel')->ambildatabarangbyid($id);
        unlink($direktori . $data['gambar']);
        if ($this->model('AdminModel')->destroybarang($id))
            echo "<script> alert('Berhasil di Hapus'); window.location = '" .  BASEURL . "admin/barang';</script>";
        else echo "<script> alert('Gagal di Hapus'); window.location = '" .  BASEURL . "admin/barang';</script>";
    }
}
