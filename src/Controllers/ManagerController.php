<?php

namespace App\Controllers;

use App\Controller;
use App\Registry;

class ManagerController extends Controller {

    public function index() {
        $user = $_SESSION['user']['userId'];
        $db = Registry::get('database');

        try {
            $statement = $db->query("SELECT username FROM users WHERE role = 'teacher'");
            $statement->execute([$user]);
            $resultTeacher = $statement->fetchAll(\PDO::FETCH_COLUMN, 0);
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }

        try {
            $statement = $db->query("SELECT username FROM users WHERE role = 'student'");
            $statement->execute([$user]);
            $resultStudent = $statement->fetchAll(\PDO::FETCH_COLUMN, 0);
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }

        try {
            $statement = $db->query("SELECT name FROM subject;");
            $statement->execute([$user]);
            $resultSubject = $statement->fetchAll(\PDO::FETCH_COLUMN, 0);
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
       
        return view('manager', ['resultTeacher' => $resultTeacher, 'resultStudent' => $resultStudent, 'resultSubject' => $resultSubject]);
    }

    public function tasksEdit() {

        if(isset($_POST['taskName']) && isset($_POST['taskId'])) {
            $taskName = filter_input(INPUT_POST, 'taskName');
            $taskId = filter_input(INPUT_POST, 'taskId');
            $db = Registry::get('database');
            
            try {
                $statement = $db->query("UPDATE task SET taskName = '$taskName' WHERE taskId = '$taskId';");
                $statement->bindParam(":i, $taskId");
                $statement->bindParam(":n, $taskName");

                $statement->execute([$taskId, $taskName]);
            } catch (\PDOException $e) {
                echo $e->getMessage();
            }
        
            $this->redirectTo("manager");
        }
    }

}