<?php
Route::get('/proyectos/{proyecto}/modelacion', 'EvaluatorController@documentacion')
    ->name('evaluator-modelacion');

Route::get('/proyectos/{proyecto}/plataforma', 'EvaluatorController@plataforma')
    ->name('evaluator-plataforma');

Route::get('/evaluar/{documento}', 'EvaluatorController@evaluar')
    ->name('evaluator-eval');

Route::get('/proyectos/{proyecto}/codificacion','EvaluatorController@codificacion')
    ->name('evaluator-codificacion');

Route::get('/evaluar-codificacion/{script}','EvaluatorController@evaluarScripts')
    ->name('evaluator-eval-script');

Route::get('/proyectos/{proyecto}/basedatos','EvaluatorController@basedatos')
    ->name('evaluator-basedatos');

Route::get('/proyectos/{proyecto}/plataforma/{casoPrueba}','EvaluatorController@escenario')
    ->name('evaluator-escenario'); 

Route::put('/evaluar-codificacion/{script}','NotaScriptController@comentario')
    ->name('actualizar-comentario');

Route::post('/evaluar-basedatos/{sql}','NotaFileBDController@observacion')
    ->name('observacion-bd');

// Consulta el número de pruebas hechas sobre un caso prueba
Route::get('pruebasCasoPrueba/{casoPrueba}', 'CasoPruebaController@pruebas');

Route::get('/analizesql', 'EvaluatorController@analizesql')
    ->name('analizesql');
