<?php

namespace App\Database;

class QueryBuilder {

    private $selectables = [];
    private $table;
    private $whereClause;
    private $limit;
    protected $pdo;

    function __construct($pdo) {
        $this -> pdo = $pdo;
    }

    function selectAll($table){
        $statement = $this -> pdo -> prepare("select * from {$table}");
        $statement -> execute();
        return $statement -> fetchAll(\PDO::FETCH_CLASS);
    }

    public function select() {
        $this -> selectables = func_get_args();
        return $this;
    }

    public function query($sql) {
        return $statement = $this -> pdo ->prepare($sql);
    }

    function insert ($table, $parameters) {
        $sql = sprintf (
            'insert into %s (%s) values (%s)',
            $table,
            implode(',', array_keys($parameters)),
            ':' . implode(', :', array_keys($parameters))
        );
    }

    public function register($uname, $passwd, $role, $email, $course):bool {
    
        if ($uname != null and $passwd != null and $role != null and $email != null and $course != null) {
            $statement = $this -> pdo -> prepare("INSERT INTO users(uname, passwd, role, email) VALUES (?, ?, ?, ?, ?)");
    
            $statement->bindParam(1, $uname);
            $statement->bindParam(2, password_hash($passwd, PASSWORD_BCRYPT));
            $statement->bindParam(3, $role);
            $statement->bindParam(4, $email);
            $statement->bindParam(5, $course);
    
            $statement -> execute();
    
            return true;
        }
        
        return false;
    }

    public function tasks($task, $list):bool {
    
        if ($task != null and $list != null) {
            $statement = $this -> pdo -> prepare("INSERT INTO tasks(task, list) VALUES (?, ?, ?)");
    
            $statement->bindParam(1, $task);
            $statement->bindParam(2, $list);
    
            $statement -> execute();
    
            return true;
        }
        
        return false;
    }
    
    public function lists($uname, $listname):bool {
        
        if ($uname != null and $listname != null) {
            $statement = $this -> pdo -> prepare("INSERT INTO lists(uname, listname) VALUES (?, ?)");
    
            $statement->bindParam(1, $uname);
            $statement->bindParam(2, $listname);
    
            $statement -> execute();
    
            return true;
        }
        
        return false;
    }

}