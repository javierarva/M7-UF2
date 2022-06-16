<?php

namespace App\Controllers;

class PagesController {

    function index() {
        return view('index');
    }

    function badlogin() {
        return view('badlogin');
    }

    function dashboard() {
        return view('dashboard');
    }

    function login() {
        return view('login');
    }

    function register() {
        return view('register');
    }

    function tasks() {
        return view('tasks');
    }

    function manager() {
        return view('manager');
    }

}