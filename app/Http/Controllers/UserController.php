<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }
}
