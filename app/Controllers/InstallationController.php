<?php

namespace App\Controllers;

use App\Controllers\BaseController;

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
        if (phpversion() >= 7.4) {
            echo "PHP version is more than 7.4, Current version is " . phpversion() . "<br>";
        } else {
            echo "PHP version is not more than 7.4, Current version is " . phpversion() . "<br>";
        }

        if (extension_loaded('intl')) {
            echo "INTL extension enabled and loaded<br>";
        } else {
            echo "INTL extension not enabled or loaded<br>";
        }

        if (extension_loaded('mbstring')) {
            echo "MBString extension enabled and loaded<br>";
        } else {
            echo "MBString extension not enabled or loaded<br>";
        }

        if (is_writable('../writable')) {
            echo "Writable folder is writable<br>";
        } else {
            echo "Writable folder is not writable<br>";
        }

        if (is_writable('../public')) {
            echo "Public folder is accessible<br>";
        } else {
            echo "Public folder is not accessible<br>";
        }
    }

    public function databaseCheck()
    {
        $custom = [
            'DSN'      => '',
            'hostname' => 'localhost',
            'username' => 'root',
            'password' => '',
            'database' => '',
            'DBDriver' => 'MySQLi',
            'DBPrefix' => '',
            'pConnect' => false,
            'DBDebug'  => true,
            'charset'  => 'utf8',
            'DBCollat' => 'utf8_general_ci',
            'swapPre'  => '',
            'encrypt'  => false,
            'compress' => false,
            'strictOn' => false,
            'failover' => [],
            'port'     => 3306,
        ];
        $database = \Config\Database::connect($custom);
        $connection = \CodeIgniter\Database\Config::getConnections();

        if ($connection) {
            echo "Database connected";
        } else {
            echo "Database connection error";
        }

        $database->close();
    }
}
