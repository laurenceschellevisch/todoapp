<?php
require 'core/bootstrap.php';
//this is where you always go to and where you always load up the router with the file routes.php so you alway shave routes and you always
//get redirected
Router::load('routes.php')
    ->direct(Request::uri(), Request::method());
