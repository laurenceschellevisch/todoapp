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


        if (App::get('taskdb')->checkLoginDetail()){

            header('location: /home');
        } else if (App::get('taskdb')->checkLoginDetail() === false) {
            echo 'oops something went wrong';
            header('location: /login');
        }

    }
}