<?php

$router->get('register', 'pagesController@register');
$router->get('home', 'pagesController@home');
$router->get('', 'pagesController@login');
$router->post('loginaccount', 'userController@logincheck');
$router->get('logout', 'userController@logout');
$router->post('getuser', 'taskController@ajax');
$router->post('updatetask', 'taskController@editTask');
$router->post('deleteitem', 'taskController@deleteTask');
$router->post('addtask', 'taskController@addTask');
$router->post('registeraccount', 'userController@registerAccount');
