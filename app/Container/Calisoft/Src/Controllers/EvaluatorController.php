<?php
namespace App\Container\Calisoft\Src\Controllers;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Container\Calisoft\Src\Proyecto;
use App\Container\Calisoft\Src\NomenclaturaBd;
use App\Container\Calisoft\Src\Script;
use App\Container\Calisoft\Src\Documento;
use App\Container\Calisoft\Src\CasoPrueba;
use App\Container\Calisoft\Src\CalificacionBD;
use App\Container\Calisoft\Src\Requests\CalificacionBDRequest;
use Illuminate\Support\Facades\DB;


class EvaluatorController extends Controller
{

    public function categorias()
    {
        return view('calisoft.evaluator.evaluator-categoria');
    }

    public function documentacion(Proyecto $proyecto)
    {
        return view('calisoft.evaluator.evaluator-modelacion', compact('proyecto'));
    }

    public function plataforma(Proyecto $proyecto)
    {
        return view('calisoft.evaluator.evaluator-plataforma', compact('proyecto'));
    }

    public function evaluar(Documento $documento)
    {
        return view('calisoft.evaluator.evaluator-docs', compact('documento'));
    }
    public function codificacion(Proyecto $proyecto)
    {
        return view('calisoft.evaluator.evaluator-codificacion', compact('proyecto'));
    }

    public function evaluarScripts(Script $script)
    {
        return view('calisoft.evaluator.evaluator-scripts',compact('script'));
    }
    public function basedatos(Proyecto $proyecto){

        $nomenclaturabd = NomenclaturaBd::
                    select('TBL_TipoNomenclatura.nomenclatura')
                          ->get();

        $palabra_info = "";
        $palabra_infos = "";
        $palabra = "";
        $palabras = "";
        $totalImpostantesBD ="";
        $totalEstandarBD ="";
  
        $importantesBD = array('BASE DATOS','CREATE SCHEMA', 'CREATE TABLE', 'VIEWS', 'PRIMARY KEY', 'FOREIGN KEY', 'klkkñlk', 'jknkjnkjn', 'jnojhojuoi');
        $estandarBD = array();

        foreach($nomenclaturabd as $nomenbds)
        {
            $estandarBD[] = $nomenbds->nomenclatura;
        }

        $rutaArchivo = storage_path() . "/app/uploads/sql/".$proyecto->sql->url;
        $rutalecturaArchivo = file($rutaArchivo);
        $abrirArchivo=fopen($rutaArchivo, "r+");

        $obtenerArchivo = fgets($abrirArchivo);
        $leerArchivo = fread($abrirArchivo, 350000);

        foreach ($importantesBD as $i) 
        {

            $repeticion = substr_count($leerArchivo, $i); 
            $totalImpostantesBD += substr_count($leerArchivo, $i); 
            $palabra_infos .= "$repeticion,";
            $array = explode(",", $palabra_infos);
            $palabras .= "$i ($repeticion)<br>";


        }

        foreach ($estandarBD as $k) 
        {
            $repeticiones = substr_count($leerArchivo, $k); 
            $totalEstandarBD += substr_count($leerArchivo, $k);
            $palabra_info .= "$repeticiones,"; 
            $array1 = explode(",", $palabra_info);
            $palabra .= "$k ($repeticiones)<br>"; 
        }

        // array total en la calificacion
        $total = $array[0];
        $total1 = $array[1];
        $total2 = $array[2];
        $total3 = $array[3];
        $total4 = $array[4];
        $total5 = $array[5];
        $total6 = $array[6];
        $total7 = $array[7];
        $total8 = $array[8];

        // array acertadas en la calificacion
        $acertadas  = $array1[0];
        $acertadas1 = $array1[1];
        $acertadas2 = $array1[2];
        $acertadas3 = $array1[3];
        $acertadas4 = $array1[4];
        $acertadas5 = $array1[5];
        $acertadas6 = $array1[6];
        $acertadas7 = $array1[7];
        $acertadas8 = $array1[8];
        

            $sql = "UPDATE TBL_CalificacionBd SET total= ?, acertadas= ?  WHERE FK_TipoNomenclaturaId=? and FK_ArchivoBdId= ?";
            DB::update($sql, array($total, $acertadas,1,  $proyecto->PK_id));

            $sql = "UPDATE TBL_CalificacionBd SET total= ?, acertadas= ?   WHERE FK_TipoNomenclaturaId=? and FK_ArchivoBdId= ?";
            DB::update($sql, array($total1, $acertadas1,2,  $proyecto->PK_id));

            $sql = "UPDATE TBL_CalificacionBd SET total= ?, acertadas= ?   WHERE FK_TipoNomenclaturaId=? and FK_ArchivoBdId= ?";
            DB::update($sql, array($total2, $acertadas2,3,  $proyecto->PK_id));

            $sql = "UPDATE TBL_CalificacionBd SET total= ?, acertadas= ?   WHERE FK_TipoNomenclaturaId=? and FK_ArchivoBdId= ?";
            DB::update($sql, array($total3, $acertadas3,4,  $proyecto->PK_id));

            $sql = "UPDATE TBL_CalificacionBd SET total= ?, acertadas= ?   WHERE FK_TipoNomenclaturaId=? and FK_ArchivoBdId= ?";
            DB::update($sql, array($total4, $acertadas4,5,  $proyecto->PK_id));

            $sql = "UPDATE TBL_CalificacionBd SET total= ?, acertadas= ?   WHERE FK_TipoNomenclaturaId=? and FK_ArchivoBdId= ?";
            DB::update($sql, array($total5, $acertadas5,6,  $proyecto->PK_id));

            $sql = "UPDATE TBL_CalificacionBd SET total= ?, acertadas= ?   WHERE FK_TipoNomenclaturaId=? and FK_ArchivoBdId= ?";
            DB::update($sql, array($total6, $acertadas6,7,  $proyecto->PK_id));

            $sql = "UPDATE TBL_CalificacionBd SET total= ?, acertadas= ?   WHERE FK_TipoNomenclaturaId=? and FK_ArchivoBdId= ?";
            DB::update($sql, array($total7, $acertadas7,8,  $proyecto->PK_id));

            $sql = "UPDATE TBL_CalificacionBd SET total= ?, acertadas= ?   WHERE FK_TipoNomenclaturaId=? and FK_ArchivoBdId= ?";
            DB::update($sql, array($total8, $acertadas8,9,  $proyecto->PK_id));


        return view('calisoft.evaluator.evaluator-basedatos',compact('proyecto'),[
            'nomenclaturabd' => $nomenclaturabd,
          ]);
    }

    public function escenario(Proyecto $proyecto, CasoPrueba $casoPrueba)
    {
        return view('calisoft.evaluator.evaluator-escenario', compact('proyecto','casoPrueba'));
    }
    
}
