<?php
/**
 * Created by PhpStorm.
 * User: Laurence
 * Date: 11/1/2017
 * Time: 17:09
 */

class taskController extends Controller
{
    public function editTask() {
        //executes functions in container taskdb look in bootstrap.php what class that is
        App::get('taskdb')->updateTask();
        header('location: /home');
    }
    public function ajax() {
        //gets all users for ajax
        $allusers = App::get('userdb')->getAllUsers();
        echo json_encode($allusers);
        return;
    }
    public function deleteTask() {
        App::get('taskdb')->deleteTask();
        header('location: /home');

    }
    public function addTask() {
        App::get('taskdb')->addTask();
        header('location: /home');
    }
}