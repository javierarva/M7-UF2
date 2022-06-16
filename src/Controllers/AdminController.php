<?php

namespace App\Controllers;

use App\Controller;
use App\Registry;

class AdminController extends Controller {

    public function index() {
        $user = $_SESSION['user']['userId'];

        if(!$_SESSION['role'] == 'admin') {
            $this->redirectTo("index");
        }

        $db = Registry::get('database');

        try {
            $statement = $db->query("SELECT userId, username, email, role, courseId FROM users;");
            $statement->execute([$user]);
            $users = $statement->fetchAll(\PDO::FETCH_OBJ);
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }

        try {
            $statement = $db->query("SELECT subjectId, name, courseId FROM subject;");
            $statement->execute([$user]);
            $subjects = $statement->fetchAll(\PDO::FETCH_OBJ);
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }

        try {
            $statement = $db->query("SELECT courseId, courseName FROM course;");
            $statement->execute([$user]);
            $courses = $statement->fetchAll(\PDO::FETCH_OBJ);
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }

        return view('admin', ['users' => $users, 'subjects' => $subjects, 'courses' => $courses]);
    }

    function usersEdit() {
        $username = filter_input(INPUT_POST, 'username');
        $email = filter_input(INPUT_POST, 'email');
        $role = filter_input(INPUT_POST, 'role');
        $courseId = filter_input(INPUT_POST, 'courseId');
        $userId = filter_input(INPUT_POST, 'userId');

        $db = Registry::get('database');
        
        try {
            $statement = $db->query("UPDATE users SET username = '$username', email = '$email', role = '$role', courseId = '$courseId' WHERE userId = '$userId';");
            $statement->bindParam(":u, $username");
            $statement->bindParam(":e, $email");
            $statement->bindParam(":r, $role");
            $statement->bindParam(":c, $courseId");
            $statement->bindParam(":ui, $userId");

            $statement->execute([$username, $email, $role, $courseId, $userId]);
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    
        $this->redirectTo("admin");
    }

    function usersDelete() {
        $userId = filter_input(INPUT_POST, 'deleteUserId');

        $db = Registry::get('database');
        
        try {
            $statement = $db->query("DELETE FROM users WHERE userId = '$userId';");
            $statement->execute();
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    
        $this->redirectTo("admin");
    }

    function subjectsEdit() {
        $subjectId = filter_input(INPUT_POST, 'subjectId');
        $subjectName = filter_input(INPUT_POST, 'subjectName');
        $courseId = filter_input(INPUT_POST, 'courseId');

        $db = Registry::get('database');
        
        try {
            $statement = $db->query("UPDATE subject SET name = '$subjectName', courseId = '$courseId' WHERE subjectId = '$subjectId';");
            $statement->bindParam(":si, $subjectId");
            $statement->bindParam(":n, $subjectName");
            $statement->bindParam(":ci, $courseId");

            $statement->execute([$subjectId, $subjectName, $courseId]);
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    
        $this->redirectTo("admin");
    }

    function subjectsDelete() {
        $subjectId = filter_input(INPUT_POST, 'deleteSubjectId');

        $db = Registry::get('database');
        
        try {
            $statement = $db->query("DELETE FROM subject WHERE subjectId = '$subjectId';");
            $statement->execute();
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    
        $this->redirectTo("admin");
    }

    function coursesEdit() {
        $courseId = filter_input(INPUT_POST, 'courseId');
        $courseName = filter_input(INPUT_POST, 'courseName');

        $db = Registry::get('database');
        
        try {
            $statement = $db->query("UPDATE course SET courseName = '$courseName' WHERE courseId = '$courseId';");
            $statement->bindParam(":ci, $courseId");
            $statement->bindParam(":cn, $courseName");

            $statement->execute([$courseId, $courseName]);
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    
        $this->redirectTo("admin");
    }

    function coursesDelete() {
        $courseId = filter_input(INPUT_POST, 'deleteCourseId');

        $db = Registry::get('database');
        
        try {
            $statement = $db->query("DELETE FROM course WHERE courseId = '$courseId';");
            $statement->execute();
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    
        $this->redirectTo("admin");
    }

}