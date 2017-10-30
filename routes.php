<?php

$router->get('', 'pagesController@index');
$router->get('register', 'pagesController@register');
$router->get('home', 'pagesController@home');
$router->get('login', 'pagesController@login');
$router->post('loginaccount', 'userController@logincheck');
