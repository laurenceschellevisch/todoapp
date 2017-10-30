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


        if ($this->task->checkLoginDetail()){

            header('location: /home');
        } else if ($this->task->checkLoginDetail() === false) {
            echo 'oops something went wrong';
            header('location: /login');
        }

    }
}