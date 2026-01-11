<?php
// Memanggil library yang sudah dibersihkan tadi
require 'php-crud-api.php';

use Tqdev\PhpCrudApi\Api;
use Tqdev\PhpCrudApi\Config\Config;
use Tqdev\PhpCrudApi\RequestFactory;
use Tqdev\PhpCrudApi\ResponseUtils;

$config = new Config([
    'driver'   => 'mysql',
    'address'  => 'localhost',
    'port'     => '3306',
    'username' => 'root',       // Default XAMPP
    'password' => '',           // Default XAMPP (kosong)
    'database' => 'resto_db', // Pastikan nama DB benar
    'debug'    => true,

    // PENTING: Hanya cors, validation, dan sanitation. 
    // JANGAN ADA 'dbAuth' disini agar tidak minta login.
    'middlewares' => 'cors,validation,sanitation'
]);

$request = RequestFactory::fromGlobals();
$api = new Api($config);
$response = $api->handle($request);
ResponseUtils::output($response);
