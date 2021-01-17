<?php

class Home extends Controller
{
    public function index()
    {
        // var_dump($_GET);
        $data['barang'] = $this->model('HomeModel')->ambildatabarang();
        $data['kategori'] = $this->model('HomeModel')->ambildatakategori();
        // $kategori = $this->model('HomeModel')->ambildatakategori();
        // var_dump($data['barang']);
        $this->view('template/header');
        $this->view('template/navbar');
        $this->view('index', $data);
        $this->view('template/footer');
    }

    public function kategori($catid)
    {
        $data['barang'] = $this->model('HomeModel')->ambildatabarangbycategory($catid);
        $data['kategori'] = $this->model('HomeModel')->ambildatakategori();
        $data['catid'] = $catid;
        $this->view('template/header');
        $this->view('template/navbar');
        $this->view('index', $data);
        $this->view('template/footer');
    }

    public function barang($id)
    {
        $barang = $this->model('HomeModel')->ambildatabarangbyid($id);
        $this->view('template/header');
        $this->view('template/navbar');
        $this->view('barang', $barang);
        $this->view('template/footer');
    }

    public function ambilkabupaten()
    {
        $id_prov = $_POST['id_provinsi'];
        $data = $this->model('HomeModel')->ambilkabupaten($id_prov);
        foreach ($data as $kabupaten) {
            echo '<option value="' . $kabupaten['id'] . '">' . $kabupaten['name'] . '</option>';
        }
    }
}
