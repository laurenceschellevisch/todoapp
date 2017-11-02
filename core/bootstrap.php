<?php

session_start();


require_once 'App.php';

require_once 'Router.php';
require_once 'App.php';
require_once 'Request.php';
require_once 'database/Connection.php';
//modals
require_once __DIR__ . '/../modal/QueryBuilder.php';
require_once __DIR__ . '/../modal/User.php';
require_once __DIR__ . '/../modal/Task.php';

//controllers
require_once __DIR__ . '/../controllers/Controller.php';
require_once __DIR__ . '/../controllers/taskController.php';
require_once __DIR__ . '/../controllers/pagesController.php';
require_once __DIR__ . '/../controllers/userController.php';

// injects key value to app.php container
App::bind('config', require __DIR__. '/../config.php');
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
