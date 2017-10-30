<?php
/**
 * Created by PhpStorm.
 * User: Laurence
 * Date: 10/23/2017
 * Time: 22:59
 */
class Task extends QueryBuilder
{
    public function checkLoginDetail() {
        if(!$_POST['email']) {
            return false;
        }
        $parameter = array(':email' =>$_POST['email']);

        $query = $this->pdo->prepare("SELECT * FROM account WHERE email=:email ");
        $query->execute($parameter);
        $result = $query->fetchAll();

        if ($_POST['pass'] == $result[0]['password']) {
            session_start();
            $_SESSION['account'] = $result[0];

            return true;
        } else {return false;}
    }
}