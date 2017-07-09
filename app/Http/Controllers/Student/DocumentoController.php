<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Documentos;
use App\TiposDocumento;
use App\User;
use Illuminate\Notifications\Notifiable;
use App\Notifications\ProyectoCreado;

class DocumentosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $docs = Documentos::All();
            return view('student.student-subir-documentacion',compact('docs'));
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
    public function store(Request $request, User $admin)
    {
        $this->validate($request, [
            'url'=>'required|string',
            'FK_ProyectoId'=>'required|integer',
            'FK_TipoDocumentoId'=>'required|integer'

        ]);

        $this->admin=$admin;

        //$admi = User::where('role','admin')->get();

        //$admin->addComment('1');
        //$thread->addComment($request->body);
        //$thread->addComment($request->body);

        auth()->user()->notify(new ProyectoCreado($admin));

        return Documentos::create([
            'url'=> $request->url,
            'FK_ProyectoId'=>$request->FK_ProyectoId,
            'FK_TipoDocumentoId'=>$request->FK_TipoDocumentoId
            ]);

        
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
    public function update(Request $request, Documentos $documentacion)
    {
        $this->validate($request,[
            'url'=>'required|string',
            'FK_ProyectoId'=>'required|integer',
            'FK_TipoDocumentoId'=>'required|integer'
        ]);
        $documentacion->fill($request->all());
        $documentacion->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Documentos $documentacion)
    {
        $documentacion->delete();
    }

    public function getTipos()
    {
        return $tdocumento = TiposDocumento::all();
    }

    //public function getDocumentos(Proyecto $documento)
    //{
      //  return $documento->
    //}

}
