<?php

require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../routes/api.php';

$uri = parse_url(url: $_SERVER['REQUEST_URI'], component: PHP_URL_PATH);
$method = $_SERVER['REQUEST_METHOD'];

route(uri: $uri, method: $method);
