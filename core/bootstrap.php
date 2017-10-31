<?php




require_once 'core/App.php';

require_once 'core/Router.php';
require_once 'core/App.php';
require_once 'core/Request.php';
require_once 'core/database/Connection.php';
//modals
require_once 'modal/QueryBuilder.php';
require_once 'modal/Task.php';

//controllers
require_once 'controllers/Controller.php';
require_once 'controllers/pagesController.php';
require_once 'controllers/userController.php';

App::bind('config', require 'config.php');
App::bind('querydb', new QueryBuilder(
    Connection::make(App::get('config')['database'])
));
App::bind('taskdb', new Task(
    Connection::make(App::get('config')['database'])
));