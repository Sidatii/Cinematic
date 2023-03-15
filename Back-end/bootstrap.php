<?php
require_once "./vendor/autoload.php";
header('Access-Control-Allow-Origin: http://127.0.0.1:5173');
header("Access-Control-Allow-Headers: *");
header('Access-Control-Allow-Methods: POST, GET, DELETE, OPTIONS');
header('Content-type: application/json');

// Autoload Core Libraries
spl_autoload_register(function ($className) {
  require_once 'libraries/' . $className . '.php';
});
