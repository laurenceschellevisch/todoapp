<?php
/**
 * Created by PhpStorm.
 * User: Laurence
 * Date: 10/23/2017
 * Time: 16:03
 */


class pagesController
{
    public function home() {

        require 'views/index.view.php';
    }

    public function register() {
        require 'views/login/register.view.php';

    }
}