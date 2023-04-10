<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsersModel;
use Exception;

class InstallationController extends BaseController
{
    public function index()
    {
        return view('installation/install');
    }

    public function createEnvFile()
    {
        $app_url = $this->request->getPost('app_url');
        $db_host = $this->request->getPost('db_host');
        $db_name = $this->request->getPost('db_name');
        $db_user = $this->request->getPost('db_user');
        $db_pass = $this->request->getPost('db_pass');
        $db_port = $this->request->getPost('db_port');

        helper('filesystem');
        $data = "CI_ENVIRONMENT = development\napp.baseURL = '".$app_url."'\ndatabase.default.hostname = ".$db_host."\ndatabase.default.database = ".$db_name."\ndatabase.default.username = ".$db_user."\ndatabase.default.password = ".$db_pass."\ndatabase.default.DBDriver = MySQLi\ndatabase.default.DBPrefix =\ndatabase.default.port = ".$db_port;

        if (!write_file('../.env', $data)) {
            return json_encode(['status' => false]);
        } else {
            return json_encode(['status' => true]);
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
        } catch (Exception $e) {
            return json_encode(['status' => false]);
        }
        
    }

    public function createDatabaseTables(){
        $migrate = \Config\Services::migrations();
        try {
            if ($migrate->latest()) {
                return json_encode(['status' => true]);
            } else {
                return json_encode(['status' => false]);
            }
        } catch (Exception $e) {
            return json_encode(['status' => false]);
        }
    }

    public function createAdminUser(){
        $usersModel = new UsersModel();

        $data = [
            'user_name' => $this->request->getPost('username'),
            'user_email' => $this->request->getPost('email'),
            'user_password' => $this->request->getPost('password'),
            'user_type_id' => 1,
            'user_deleted' => 0,
        ];
        try {
            if ($usersModel->save($data)) {
                return json_encode(['status' => true]);
            } else {
                return json_encode(['status' => false]);
            }
        } catch (Exception $e) {
            return json_encode(['status' => false]);
        }
    }

    public function createInstallLock()
    {
        helper('filesystem');
        $data = "";

        try {
            if (!write_file('../INSTALL.lock', $data)) {
                return json_encode(['status' => false]);
            } else {
                return json_encode(['status' => true]);
            }
        } catch (Exception $e) {
            return json_encode(['status' => false]);
        }

    }

    public function finishInstallation(){
        try {
            if (!file_exists('../INSTALL.lock')) {
                return json_encode(['status' => false]);
            } else {
                return json_encode(['status' => true]);
            }
            
        } catch (Exception $e) {
            return json_encode(['status' => false]);
        }
    }
}
