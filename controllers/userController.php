<?php
/**
 * Created by PhpStorm.
 * User: Laurence
 * Date: 10/25/2017
 * Time: 11:17
 */

class userController extends Controller
{
    public function logincheck() {

//cheacks if you get back true if not redirect
        if (App::get('userdb')->checkLoginDetail() === true){

            header('location: /home');
        } else if (App::get('userdb')->checkLoginDetail() === false) {
            echo 'oops something went wrong';
            header('location: /');
        }
    }
    public function logout() {
        App::get('userdb')->logout();
    }
    public function registerAccount() {
        //same here checks if you get back true redirect
        if (App::get('userdb')->registerAccount() === true) {
            header('location:/');
        } else {
            throw new Exception('no time for fancy errors but: Email or Username is already in use');
            die();
        }
    }
}