<?php
namespace App\Http\Controllers\Student;

use App\Categorias as Categoria;
use App\GrupoDeInvestigacion as Grupo;
use App\Http\Controllers\Controller;
use App\Notifications\ProyectoCreado;
use App\Proyecto;
use App\Semillero;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProyectoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:student')->except('index');

        $this->middleware('can:update,proyecto')->only('update');
    }

    public function index()
    {
        return Proyecto::all();
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nombre'    => 'required|string|min:5|unique:TBL_Proyectos',
            'grupo'     => 'required|integer',
            'semillero' => 'required|integer',
            'categoria' => 'required|integer',
        ]);

        $admin = User::where('role', 'admin')->first();
        auth()->user()->notify(new ProyectoCreado($admin));

        $request->user()->proyectos()->create([
            'nombre'                    => $request->nombre,
            'FK_GrupoDeInvestigacionId' => $request->grupo,
            'FK_SemilleroId'            => $request->semillero,
            'FK_CategoriaId'            => $request->categoria,
        ], [
            'tipo' => 'integrante',
        ]);

        return redirect()->route('student');
    }

    public function update(Request $request, Proyecto $proyecto)
    {
        $this->validate($request, [
            'nombre'                    => sprintf('string|min:5|unique:TBL_Proyectos,nombre,%d,PK_id', $proyecto->PK_id),
            'FK_CategoriaId'            => 'integer',
            'FK_SemilleroId'            => 'integer',
            'FK_GrupoDeInvestigacionId' => 'integer',
        ]);

        $proyecto->update($request->all());
    }

    public function documentos(Proyecto $proyecto)
    {
        return $proyecto->documentos;
    }

    public function invitados(Proyecto $proyecto)
    {
        return $proyecto->usuarios()->wherePivot('tipo', 'invitado')->get();
    }

    public function integrantes(Proyecto $proyecto)
    {
        return $proyecto->usuarios()->wherePivot('tipo', 'integrante')->get();
    }

}
