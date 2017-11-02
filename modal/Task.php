<?php
/**
 * Created by PhpStorm.
 * User: Laurence
 * Date: 11/1/2017
 * Time: 13:10
 */

class Task extends QueryBuilder
{
    public function getTask() {
        //gets all tasks for the users wich i print in home .view
        $task = $this->selectAll('task');
        return $task;
    }
    public function updateTask() {
        //opdate task goes via ajax thats why the post exists here
     try {
         $statement = $this->pdo->prepare(
             "UPDATE `task`   
                       SET `todo` = :todo,
                           `status` = :status,
                           `description` = :description,
                           `userid` = :userid 
                     WHERE `id` = :id "
         );
         $statement->bindValue(":todo", $_POST['todoname']);
         $statement->bindValue(":status", $_POST['todostatus']);
         $statement->bindValue(":description", $_POST['tododesc']);
         $statement->bindValue(":userid", $_POST['assigned']);
         $statement->bindValue(":id", $_POST['idmodal']);

         $statement->execute();
     }
        catch(PDOException $e) {
         throw new Exception('update failed'.$e);
        }
    }
    public function deleteTask() {//deletes with id send form ajax request


        try {
            $statement = $this->pdo->prepare('DELETE FROM `task` WHERE `id`=:id');
            $statement->bindValue(":id", $_POST['id']);
            $statement->execute();
        } catch (PDOException $e) {
            throw new Exception('failed to delete'.$e);
        }
    }
    public function addTask() {//adds with data send from ajax request
        try {
            $statement = $this->pdo->prepare(
                'INSERT INTO task (todo,status,description,userid) 
                      VALUES (:todo,:status,:description,:userid)');

            $statement->bindValue(":todo", $_POST['todoname']);
            $statement->bindValue(":status", $_POST['todostatus']);
            $statement->bindValue(":description", $_POST['tododesc']);
            $statement->bindValue(":userid", $_POST['assigned']);
            $statement->execute();
        } catch (PDOException $e) {
            throw new Exception('Insert didnt work '.$e);
        }

    }
}