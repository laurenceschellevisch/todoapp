<?php

session_start();


require_once 'core/App.php';

require_once 'core/Router.php';
require_once 'core/App.php';
require_once 'core/Request.php';
require_once 'core/database/Connection.php';
//modals
require_once 'modal/QueryBuilder.php';
require_once 'modal/User.php';
require_once 'modal/Task.php';

//controllers
require_once 'controllers/Controller.php';
require_once 'controllers/taskController.php';
require_once 'controllers/pagesController.php';
require_once 'controllers/userController.php';

// injects key value to app.php container
App::bind('config', require 'config.php');
App::bind('querydb', new QueryBuilder(
    Connection::make(App::get('config')['database'])
));
App::bind('userdb', new User(
    Connection::make(App::get('config')['database'])
));
App::bind('taskdb', new Task(
    Connection::make(App::get('config')['database'])
));
// gives access without logging in to all pages needed to login
if (App::get('userdb')->isLoggedin() === false) {
    if ($_SERVER['REQUEST_URI'] != '/') {
        if ($_SERVER['REQUEST_URI'] != '/loginaccount') {
            if ($_SERVER['REQUEST_URI'] != '/register') {
                if ($_SERVER['REQUEST_URI'] != '/registeraccount') {
                    header('location: /');
                }
            }
        }
    }
}
