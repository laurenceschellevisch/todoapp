<?php


$app = [];

$app['config'] = require 'config.php';

require 'core/Router.php';
require 'core/Request.php';
require 'core/database/Connection.php';
//modals
require 'modal/QueryBuilder.php';
require 'modal/Task.php';

//controllers
require 'controllers/Controller.php';
require 'controllers/pagesController.php';
require 'controllers/userController.php';

$app['database'] = new QueryBuilder(
    Connection::make($app['config']['database'])
);