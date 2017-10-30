<?php
/**
 * Created by PhpStorm.
 * User: Laurence
 * Date: 10/25/2017
 * Time: 12:48
 */

class Controller
{
    public $task;
    public $config = [];

    public function __construct()
    {
        $this->config['config'] = require 'config.php';
        $this->task = new  Task(
            Connection::make($this->config['config']['database'])
        );
    }
}