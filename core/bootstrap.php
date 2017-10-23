<?php


$app = [];

$app['config'] = require 'config.php';

require 'core/Router.php';
require 'core/Request.php';
require 'core/database/Connection.php';
require 'modal/QueryBuilder.php';
require 'controllers/pagesController.php';

$app['database'] = new QueryBuilder(
    Connection::make($app['config']['database'])
);