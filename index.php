<?php
require_once 'core/bootstrap.php';
error_reporting(E_ALL);
ini_set('error_reporting', E_ALL);
//this is where you always go to and where you always load up the router with the file routes.php so you alway shave routes and you always
//get redirected


Router::load('routes.php')
    ->direct(Request::uri(), Request::method());

