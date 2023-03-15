<?php
require_once './bootstrap.php';
if (strtolower($_SERVER['REQUEST_METHOD']) == 'options') {
    http_response_code(200);
    return;

  }
// Init Core Library
$init = new Core;