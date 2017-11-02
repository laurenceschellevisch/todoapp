<?php


class QueryBuilder
{
    protected $pdo;


    /**
     *  @param $pdo PDO
     */
    public function __construct($pdo)
    {
//gets connection from construct
        $this->pdo = $pdo;
    }

    public function selectAll($table)
    {
        //this was in the tutorial i dont realy use it ofthen in the code but it works
        $statement = $this->pdo->prepare("select * from {$table} WHERE userid = {$_SESSION['account']['id']}");

        $statement->execute();

        return $statement->fetchAll();
    }
}