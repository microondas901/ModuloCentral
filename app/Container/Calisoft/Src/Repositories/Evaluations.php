<?php
namespace App\Container\Calisoft\Src\Repositories;

use App\Container\Calisoft\Src\Documento;
use App\Container\Calisoft\Src\ItemsCodificacion;
use App\Container\Calisoft\Src\Script;

class Evaluations
{
    /**
     * Retorna las Evaluaciones del documento
     *
     * @param Document $documento
     * @param integer $evaluatorId
     * @return Collection Coleccion de evaluaciones
     */
    public function forDocument(Documento $documento, $evaluatorId)
    {
        //mapea los componentes del tipo de documento a evaluaciones
        return $documento->tipo->componentes->map(
            function ($componente) use ($evaluatorId, $documento) {

                //consulta o crea la evaluacion
                return $documento->evaluaciones()->firstOrCreate([
                    'FK_ComponenteId' => $componente->PK_id,
                    'FK_EvaluatorId' => $evaluatorId,
                    'FK_DocumentoId' => $documento->PK_id
                ]);

            }
        )->load('componente'); //carga los componentes a las evaluaciones

    
    

    }
    /**
     * Retorna las Evaluaciones del script
     *
     * @param Scripts script
     * @return Collection Coleccion de scripts
     */
    public function forScript(Script $script)
    {
        
        $items=ItemsCodificacion::all();
        return $items->map(
            function($item) use ($script)
            {
                return $script->notaCodificacion()->firstOrCreate([
                    'FK_ItemsId'=>$item->PK_id,
                    'FK_ScriptsId'=>$item->PK_id,
                ]);
            }
        )->load('itemsCodificacion');

    }

}