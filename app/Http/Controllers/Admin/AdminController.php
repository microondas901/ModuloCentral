<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\TiposDocumento;
use App\Categorias;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.admin-home');
    }

    public function semilleros()
    {
        return view('admin.semilleros');
    }

    public function categorias()
    {
        return view('admin.categorias');
    }

    public function usuarios()
    {
        return view('admin.usuarios');
    }

    public function tipoDocumento()
    {
        return view('admin.tipo-documento');
    }

    public function componentes($tdocumento)
    {
        $tdocumento= TiposDocumento::Where('PK_id', $tdocumento)->first();
        return view('admin.componentes')->with('tdocumento', $tdocumento);
        //return view('admin.componentes', compact('tdocumento'));
    }

    public function proyectos()
    {
        return view('admin.proyectos',
      ['categorias' => Categorias::all()]
    );
    }
}
