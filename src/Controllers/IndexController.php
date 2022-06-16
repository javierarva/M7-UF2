<?php

namespace App\Controllers;

use App\Controller;
use App\Registry;
use App\Request;
use App\Session;

class IndexController extends Controller {

    public function __construct(Request $request, Session $session) {
        parent::__construct($request, $session);
    }

    public function index() {
        $users = Registry::get('database') -> selectAll('users');
            
        return view('index', compact('users'));
    }
}