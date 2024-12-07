<?php

class Login extends Controller
{
    public function index()
    {
        $this->view('login');
    }

    public function login()
    {
        $this->model('Login_model')->login();
    }
}