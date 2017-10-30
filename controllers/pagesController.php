<?php
/**
 * Created by PhpStorm.
 * User: Laurence
 * Date: 10/23/2017
 * Time: 16:03
 */

class pagesController extends Controller
{
    public function index() {
        require 'views/index.view.php';
    }
    public function register() {
        require 'views/login/register.view.php';
    }
    public function login() {
        require 'views/login/login.view.php';
    }
    public function home() {
        require 'views/home/home.view.php';
    }

}