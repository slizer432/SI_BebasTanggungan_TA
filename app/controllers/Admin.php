<?php

class Admin extends Controller
{
    public function index()
    {
        $this->view('not_found');
    }

    public function home()
    {
        $this->model('Admin_model')->isLoggedIn();
        $data = $this->model('Admin_model')->getData();
        $this->lampiran();
    }

    public function profil()
    {
        $this->model('Admin_model')->isLoggedIn();
        $data = $this->model('Admin_model')->getData();
        $this->view('admin/profil', $data);
    }

    public function logout()
    {
        $this->model('Admin_model')->logout();
    }

    public function lampiran()
    {
        $this->model('Admin_model')->isLoggedIn();
        $data = $this->model('Admin_model')->getMhs();
        $this->view('admin/lampiran', $data);
    }

    public function check()
    {
        $this->model('Admin_model')->isLoggedIn();
        $data['dokumen'] = $this->model('Admin_model')->getDokumen();
        $this->view('admin/check');
    }

    public function edit()
    {
        $this->model('Admin_model')->isLoggedIn();
        $data = $this->model('Admin_model')->getData();
        $this->view('admin/edit', $data);
    }

    public function terimaVerif()
    {
        $this->model('Admin_model')->terimaVerif();
    }

    public function tolakVerif()
    {
        $this->model('Admin_model')->tolakVerif();
    }
}