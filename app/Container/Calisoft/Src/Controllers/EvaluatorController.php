<?php

namespace App\Container\Calisoft\Src\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EvaluatorController extends Controller
{

    public function index(){
        return view('evaluator.evaluator-home');
    }
    public function categorias(){
        return view('evaluator.evaluador-categoria');
    }
}
