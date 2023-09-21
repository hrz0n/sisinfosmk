<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Admin extends BaseController
{
    public function index()
    {
        $data = [
            'page_title' => 'Halaman Admin',
            'page_desc' => 'Halaman ini khusus untuk admin',
            'page_key' => 'Halaman Admin',
        ];
        return view('admin/v_index', $data);
    }

}
