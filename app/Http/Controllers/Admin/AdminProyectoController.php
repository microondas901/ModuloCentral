<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Categorias;
use App\Proyecto;

class AdminProyectoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->validate($request,[
        'categoriaId' => 'integer'
        ]);
        $categoriaId=$request->categoriaId;
        return Proyecto::with('semillero', 'categoria', 'grupoDeInvestigacion', 'usuarios')
        ->when($categoriaId,function($query) use ($categoriaId){
            return $query->where('FK_CategoriaId',$categoriaId);
        })
        ->paginate(5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Proyecto $proyecto)
    {

        $this->validate($request,[
            
            'state' => 'required|string'
        ]);
        $proyecto->state= $request->state;
        $proyecto->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getPeticiones()
    {
        
        return Proyecto::with('semillero', 'categoria', 'grupoDeInvestigacion', 'usuarios')
        ->where('state', 'propuesta')->get();
        
        
        //return Proyecto::where('state', 'propuesta')
        //->get();
    }
}