<?php
require_once 'core/bootstrap.php';
error_reporting(E_ALL);
ini_set('error_reporting', E_ALL);
//this is where you always go to and where you always load up the router with the file routes.php so you alway shave routes and you always
//get redirected
Router::load('routes.php')
    ->direct(Request::uri(), Request::method());

$public = '../public/' . $uri;

if (file_exists($public)) {
    $fileType = explode('.', $public);
    $mimeType = mime_content_type($public);
    $mimeType = $fileType[count($fileType) - 1] == 'css' ? 'text/css' : $mimeType;
    header("Content-type:$mimeType");
    // Return an actual file.
    echo (string) file_get_contents($public);
    // Exit complete method.
    return;
}