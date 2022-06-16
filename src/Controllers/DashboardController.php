<?php

namespace App\Controllers;

use App\Controller;
use App\Registry;

class DashboardController extends Controller {
    
    public function index() {
        $user = $_SESSION['user']['userId'];

        if(!$user) {
            $this->redirectTo("index");
        }

        $db = Registry::get('database');

        try {
            $statement = $db->query("SELECT listId, listName FROM list WHERE userId = ?;");
            $statement->execute([$user]);
            $lists = $statement->fetchAll(\PDO::FETCH_OBJ);
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }

        try {
            $statement = $db->query("SELECT taskId, taskName FROM task WHERE userId = ?;");
            $statement->execute([$user]);
            $tasks = $statement->fetchAll(\PDO::FETCH_OBJ);
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
       
        return view('dashboard', ['lists' => $lists, 'tasks' => $tasks]);
    }

    public function tasksCreate() {

        if(isset($_POST['taskName']) && isset($_POST['listId'])) {
            $user = $_SESSION['user']['userId'];
            $taskName = filter_input(INPUT_POST, 'taskName');
            $list = filter_input(INPUT_POST, 'listId');
            $db = Registry::get('database');
            
            try {
                $statement = $db->query("INSERT INTO task(listId, taskName, userId) VALUES(?, ?, ?)");
                $statement->execute([$list, $taskName, $user]);
            } catch (\PDOException $e) {
                echo $e->getMessage();
            }
        
            $this->redirectTo("dashboard");
        }
    }

    public function listsCreate() {

        if(isset($_POST['listName'])) {
            $user = $_SESSION['user']['userId'];
            $listName = filter_input(INPUT_POST, 'listName');

            $db = Registry::get('database');
            
            try {
                $statement = $db->query("INSERT INTO list(userId, listName) VALUES(?, ?)");
                $statement->execute([$user, $listName]);
            } catch (\PDOException $e) {
                echo $e->getMessage();
            }
        
            $this->redirectTo("dashboard"); 
        }
    }
}