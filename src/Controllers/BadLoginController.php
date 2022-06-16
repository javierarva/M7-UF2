<?php

namespace App\Controllers;

use App\Controller;

class BadLoginController extends Controller {
    
    function index() {
        return view('badlogin');
    }
}