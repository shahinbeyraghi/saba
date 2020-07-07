<?php

$routes = require __DIR__.'/../Router/Api.php';
require __DIR__.'/../Request/Base.php';
require __DIR__.'/../Core/Core.php';

$fullUrl = str_replace(str_replace('index.php', '', $_SERVER['SCRIPT_NAME']),
    '', $_SERVER['REQUEST_URI']);
$urlArr = parse_url($fullUrl);

if ($routes[$urlArr['path']] ?? false) {
    $action = $routes[$urlArr['path']];
    $handler = explode('@', $action);

    if (class_exists($className = '\App\Controllers\\' . $handler[0])) {
        try {
            $method = $handler[1];
            $request = request();
            response((new $className($request))->$method($request));
        } catch (\Exception $exception) {
            response(null, $exception->getCode(), $exception->getMessage());
        }
    }
    else {
        (new \App\Controllers\Notfound())->index();
    }
}