<?php

class SuperAdmin extends Controller
{
    public function index()
    {
    }

    public function home()
    {
        $this->model('SuperAdmin_model')->isLoggedIn();
        $data['mhs'] = $this->model('SuperAdmin_model')->getAllMahasiswa();
        $this->view('super_admin/data_mhs', $data);
    }

    public function log()
    {
        $this->model('SuperAdmin_model')->isLoggedIn();
        $data['log'] = $this->model('SuperAdmin_model')->getLog();
        $this->view('super_admin/log', $data);
    }

    public function add_mhs()
    {
        $this->model('SuperAdmin_model')->isLoggedIn();
        $this->model('SuperAdmin_model')->addMhs();
        $this->view('super_admin/add/add_mhs');
    }

    public function add_adm()
    {
        $this->model('SuperAdmin_model')->isLoggedIn();
        $this->model('SuperAdmin_model')->addAdmin();
        $this->view('super_admin/add/add_adm');
    }

    public function verifikasi_all()
    {
        $this->model('SuperAdmin_model')->isLoggedIn();
        $data['verif'] = $this->model('SuperAdmin_model')->getVerif();
        $this->view('super_admin/verifikasi_all', $data);
    }

    public function module()
    {
        $this->model('SuperAdmin_model')->isLoggedIn();
        $data['module'] = $this->model('SuperAdmin_model')->getModule();
        $this->view('super_admin/module', $data);
    }

    public function profil()
    {
        $this->model('SuperAdmin_model')->isLoggedIn();
        $data = $this->model('SuperAdmin_model')->getData();
        $this->view('super_admin/profil', $data);
    }

    public function logout()
    {
        $this->model('SuperAdmin_model')->logout();
    }

    public function edit()
    {
        $this->model('SuperAdmin_model')->isLoggedIn();
        $this->model('SuperAdmin_model')->edit();
        $data = $this->model('SuperAdmin_model')->getData();
        $this->view('super_admin/edit_profile', $data);
    }
}