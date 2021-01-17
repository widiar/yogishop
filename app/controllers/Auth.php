<?php

class Auth extends Controller
{
    public function login()
    {
        return $this->view("login");
    }

    public function _login()
    {
        // var_dump($_POST);die;
        if(isset($_POST['submit'])){
            $email = $_POST['email'];
            $password = $_POST['password'];
            $user = $this->model('AuthModel')->cekuser($email);
            if($user){
                if(password_verify($password, $user['password'])){
                $_SESSION["user"] = $email;
                echo "<script> alert('Login berhasil gan!'); window.location = '". BASEURL ."';</script>";
                }else{
                echo "<script> alert('Password salah gan!'); window.location = '". BASEURL ."auth/login';</script>";
                }
            }else{
                $admin = $this->model('AuthModel')->cekadmin($email);
                if($admin){
                if(strcmp($password, $admin['password']) == 0){
                    $_SESSION["admin"] = "true";
                    echo "<script> alert('Login berhasil gan!'); window.location = '". BASEURL ."admin/dashboard';</script>";
                }else{
                    echo "<script> alert('Password salah gan!'); window.location = '". BASEURL ."auth/login';</script>";
                }
                }else{
                    echo "<script> alert('Gada emailnya gan!'); window.location = '". BASEURL ."auth/login';</script>";
                }
            }
        }
    }

    public function register()
    {
        $data['provinsi'] = $this->model('HomeModel')->ambilprovinsi();
        $this->view('register', $data);
    }

    public function _register()
    {
        if(isset($_POST['submit'])){
            $password = amankan($_POST['password']);
            $password2 = amankan($_POST['password2']);
            if(strcmp($password, $password2) == 0){
              if($this->model('AuthModel')->register($_POST)){
                  echo "<script> alert('Daftar Berhasil, Login Gan!'); window.location = '". BASEURL ."auth/login';</script>";
                }else echo "<script> alert('Daftar Gagal'); window.location = '". BASEURL ."auth/register';</script>";
            }else{
                echo "<script> alert('Password tidak sama Gan'); window.location = '". BASEURL ."auth/register';</script>";
            }
          }
    }

    public function logout()
    {
        session_unset();
        session_destroy();
        header('Location: ' . BASEURL);
    }
}