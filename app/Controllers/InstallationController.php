<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class InstallationController extends BaseController
{
    public function index()
    {
        return view('installation/install');
    }
}
