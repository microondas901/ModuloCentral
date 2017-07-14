<?php

namespace App\Container\Calisoft\Src\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\TiposDocumento;
use App\Categorias;

class AdminController extends Controller
{
    public function index()
    {
        return view('calisoft.admin.admin-home');
    }

    public function semilleros()
    {
        return view('calisoft.admin.admin-semilleros');
    }

    public function categorias()
    {
        return view('calisoft.admin.admin-categorias');
    }

    public function usuarios()
    {
        return view('calisoft.admin.admin-usuarios');
    }

    public function tipoDocumento()
    {
        return view('calisoft.admin.admin-tipo-documento');
    }

    public function peticiones()
    {
        return view('calisoft.admin.admin-peticiones');
    }

    public function componentes(TiposDocumento $tdocumento)
    {
        return view('calisoft.admin.admin-componentes', compact('tdocumento'));
    }

    public function proyectos()
    {
        return view('calisoft.admin.admin-proyectos',['categorias' => Categorias::all()]);
    }
}
