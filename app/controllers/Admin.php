<?php

class Admin extends Controller
{
    public function index()
    {
    }

    public function home()
    {
        $this->view('admin/edit');
    }


}