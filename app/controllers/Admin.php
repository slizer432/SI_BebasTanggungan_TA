<?php

class Admin extends Controller
{
    public function index()
    {
        $this->view('not_found');
    }

    public function home()
    {
        $this->view('admin/edit');
    }


}