<?php

namespace App\Controllers;

use App\Controller;
use App\Registry;

class RegisterController extends Controller {

    public function index() {
        return view('register');
    }

    public function register() {

        if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['email']) && isset($_POST['role'])) {
            $user = filter_input(INPUT_POST, 'username');
            $passwd = filter_input(INPUT_POST, 'password');
            $role = filter_input(INPUT_POST, 'role');
            $email = filter_input(INPUT_POST, 'email');
            $hashedPasswd = password_hash($passwd, PASSWORD_BCRYPT);

            $db = Registry::get('database');
            
            try {
                $statement = $db->query("INSERT INTO users(username, password, email, role) VALUES(?, ?, ?, ?)");
                $statement->execute([$user, $hashedPasswd, $email, $role]);
            } catch (\PDOException $e) {
                echo $e->getMessage();
            }

            if(LoginController::auth($db, $email, $passwd)) {
                $this->redirectTo("dashboard");
            }
        }
    }
}
