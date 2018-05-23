@extends('layouts.dash')

@section('content')
    <div class="col-md-12">
        @component('components.portlet', [
                'icon' => 'fa fa-database', 
                'title' => 'Evaluacion de Base de Datos', 
                'pdf' => route('pdf.basedatos', compact('proyecto'))
        ])

        <div id="app" class="row">
        <button type="button"  class="btn green-jungle center-block" data-toggle="modal" data-target="#ModalAutomatica">
                                    <i class="fa fa-arrow-circle-right"></i>
                                    Ver Resultados Calificados
                                </button><br>
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <tabla-componente :read="true"></tabla-componente>  
            </div>
            <div class="col-md-1"></div>                           
        </div>


                                    <!-- Modal -->
                                    <div id="ModalAutomatica" class="modal fade" data-backdrop="static" data-keyboard="false" role="dialog">
                            <div class="modal-dialog modal-lg" style="overflow-y: scroll; max-height:85%;  margin-top: 50px; margin-bottom:50px;">

                                <!-- Modal content-->
                                <div class="modal-content">
                                <div class="modal-header bg-info">
                                    <h4 class="modal-title" align="center"><b>Calificación Nomenclatura Base de datos - Proyecto: "{{$proyecto->nombre}}"</b> </h4>
                                    
                                </div>
                                <div class="modal-body" >
                                <?php
                                $palabra_info = "";
                                $palabra_infos = "";
                                $palabra = "";
                                $palabras = "";
                                $totalImpostantesBD ="";
                                $totalEstandarBD ="";
                                $palabrasAlone = "";
                                $palabrasRepeat = "";
                                $palabraAlone = "";
                                $palabraRepeat = "";
                                $mensajeEncontradas = "Palabras Encontradas: ";
                                $mensajePropias = "Palabras Encontradas Propias del SQL: ";
                                $mensajeLineas = "Las palabras estan en la linea: ";
                                $importantesBD = array('CREATE DATABASE','CREATE SCHEMA', 'CREATE TABLE', '`TBL_', 'VIEWS', 'PRIMARY KEY', 'KEY (`PK_','FOREIGN KEY', 'KEY (`FK_','PGS_', 'CTB_', 'PSN_');
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
                                    $palabra_infos .= "$repeticion,";
                                    $array = explode(",", $palabra_infos);
                                    $totalImpostantesBD = array_sum($array);
                                    $palabras .= "$i ($repeticion)<br>";
                                    $palabrasAlone .= "<b>$i<br><br></b>";
                                    $palabrasRepeat .= "<b>$repeticion<br><br></b>";
                            
                                    if(strpos($leerArchivo, $i)> -1)
                                    {
                                    $mensajePropias .= $i . ', ';
                                    }

                                }

                                foreach ($estandarBD as $k) 
                                {

                                    $repeticiones = substr_count($leerArchivo, $k); 
                                    $palabra_info .= "$repeticiones,"; 
                                    $array1 = explode(",", $palabra_info);
                                    $totalEstandarBD = array_sum($array1);
                                    $palabra .= "$k ($repeticiones)<br>"; 
                                    $palabraAlone .= "<b>$k<br><br></b>"; 
                                    $palabraRepeat .= "<b>$repeticiones<br><br></b>"; 

                                    if(strpos($leerArchivo, $k)> -1)
                                    {
                                        $mensajeEncontradas .= $k . ', ';
                                    }
                                }

                                ?>

                                
                            
                                <div class="col-md-12">
                                <table class="table">
                                    <thead>
                                        <tr>
                                        <th width="60%"><b>Contenido Linea</b> </th>
                                        <th width="20%"><b>Linea N°</b> </th>
                                        <th width="20%"><b>Calificación</b> </th>
                                        </tr>
                                    </thead>

                                <?php

                                    $primaryKey = 'KEY (`PK_';
                                    $table      = '`TBL_';
                                    $foreignKey = 'KEY (`FK_';

                                    $pos = 1;

                                    foreach($rutalecturaArchivo as $linea)
                                    {
                                        for ( $x = 0; $x < count ( $importantesBD ); $x++ )
                                        {
                                            if (strstr($linea,$importantesBD[$x]))
                                            {    
                                                echo  "<table class='table table-bordered'>
                                                        <thead>
                                                            <tr>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                            <td width='60%'><b>$linea</b></td>
                                                            <td width='20%'><b>$pos</b></td>";
                                                            if(strpos($primaryKey, $importantesBD[$x]) !== false || strpos($table, $importantesBD[$x]) !== false || strpos($foreignKey, $importantesBD[$x]) !== false){
                                                                echo "<td width='20%'><span class='glyphicon glyphicon-ok'></span></td>";
                                                            }else{
                                                                echo "<td width='20%'><span class='glyphicon glyphicon-remove'></span></td>";
                                                            }

                                                            echo "</tr>
                                            
                                                        </tbody>
                                                        </table>";
                                            }
                                                
                                        }
                                        $pos++;
                                    }

                                ?>
                                </div>
                                </div>
                                <div class="modal-footer">
                                </div>
                                </div>

                            </div>
                            </div>

        @endcomponent
    </div>
@endsection
@push('functions')
    <script>window.archivoId = "{{ $proyecto->sql->PK_id }}"</script>
    <script src="/assets/global/plugins/jquery.media.js"></script>
    <script src="/js/base-datos.js"></script>
@endpush