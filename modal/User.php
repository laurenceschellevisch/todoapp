<?php
/**
 * Created by PhpStorm.
 * User: Laurence
 * Date: 10/23/2017
 * Time: 22:59
 */
class User extends QueryBuilder
{
    public function getAllUsers() {
        //gets all users for ajax request that makes select options with all users
    $statement = $this->pdo->prepare('select id,name from account');
    $statement->execute();

    return $statement->fetchAll(PDO::FETCH_CLASS);
    }
    public function getAllUserscheck() {
        //gets all users for checking if you dont duplicate a email in the database
        $statement = $this->pdo->prepare('select name,email from account');
        $statement->execute();

        return $statement->fetchAll();
    }

    public function checkLoginDetail() {
        if(!$_POST['email']) {
            return false;
        }
        $parameter = array(':email' =>$_POST['email']);
//makes satement to check if your login details are correct
        $query = $this->pdo->prepare("SELECT * FROM account WHERE email=:email ");
        $query->execute($parameter);
        $result = $query->fetchAll();
// password needs to be correct in db i dont even check username but okay ,its friday so i cant do it sorry
        if ($_POST['pass'] == $result[0]['password']) {
            $_SESSION['account'] = $result[0];
            return true;
        } else {return false;}
    }
    public function isLoggedin() {
        // checks if session is set for user otherwise return false wich i check  in bootstrap.php
        if (!empty($_SESSION['account'])) {
            return true;
        } else {
            return false;
        }
    }

    public function logOut() {
        //logout just destroys session and send back to login
        session_destroy();
        header('location: /');
        return;
    }
    public function registerAccount() {
        //makes acocunt and does some simple checks else it throws eception i didnt have time for fancy errors
        foreach ($this->getAllUserscheck() as $userarray) {
            if ($userarray['email'] == $_POST['email']) {
                return false;
            }
            if ($userarray['name'] == $_POST['name']) {
                return false;
            }
        }
        try {
            $statement = $this->pdo->prepare(
                'INSERT INTO account (name,password,email) 
                      VALUES (:name,:password,:email)');

            $statement->bindValue(":name", $_POST['name']);
            $statement->bindValue(":password", $_POST['pass']);
            $statement->bindValue(":email", $_POST['email']);
            $statement->execute();
            return true;
        } catch (PDOException $e) {
            throw new Exception('Insert didnt work '.$e);
            return false;
        }
    }
}