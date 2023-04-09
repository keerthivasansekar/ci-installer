<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use mysqli;

class InstallationController extends BaseController
{
    public function index()
    {
        return view('installation/install');
    }

    public function createEnvFile()
    {
        helper('filesystem');
        $data = "app.baseURL = 'http://test.loc/'\ndatabase.default.hostname = localhost\ndatabase.default.database = ci4\ndatabase.default.username = root\ndatabase.default.password = root\ndatabase.default.DBDriver = MySQLi\ndatabase.default.DBPrefix =\ndatabase.default.port = 3306";

        if (!write_file('../.env', $data)) {
            echo 'Unable to write the file';
        } else {
            echo 'File written!';
        }
    }

    public function prerequisiteCheck()
    {
        $result = [];

        if (phpversion() >= 7.4) {
            $result['php_version'] = true;
        } else {
            $result['php_version'] = false;
        }

        if (extension_loaded('intl')) {
            $result['intl'] = true;
        } else {
            $result['intl'] = false;
        }

        if (extension_loaded('mbstring')) {
            $result['mbstring'] = true;
        } else {
            $result['mbstring'] = false;
        }

        if (is_writable('../writable')) {
            $result['writable_folder'] = true;
        } else {
            $result['writable_folder'] = false;
        }

        if (is_writable('../public')) {
            $result['public_folder'] = true;
        } else {
            $result['public_folder'] = false;
        }

        $result['overall'] = true;

        foreach ($result as $key => $value) {
            if ($value === false) {
                $result['overall'] = false;
            }
        }

        return json_encode($result);
    }

    public function databaseCheck()
    {
        try {
            $db_host = $this->request->getPost('db_host');
            $db_name = $this->request->getPost('db_name');
            $db_user = $this->request->getPost('db_user');
            $db_pass = $this->request->getPost('db_pass');

            $connection = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
            if (mysqli_connect_errno()){
                return json_encode(['status' => false]);
            } else {
                return json_encode(['status' => true]);
            }
        } catch (\Exception $e) {
            return json_encode(['status' => false]);
        }
        
    }

    public function createInstallLock()
    {
        helper('filesystem');
        $data = "";

        if (!write_file('../INSTALL.lock', $data)) {
            echo 'Unable to write the file';
        } else {
            echo 'File written!';
        }
    }
}
