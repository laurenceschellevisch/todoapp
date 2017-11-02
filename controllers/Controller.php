<?php
/**
 * Created by PhpStorm.
 * User: Laurence
 * Date: 10/25/2017
 * Time: 12:48
 */

class Controller
{

    public function __construct()
    {
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
    }
}