<?php

Route::get('/', 'StudentController@index')
    ->name('student');

Route::get('/proyectos', 'StudentController@proyectos')
    ->name('proyectos')
    ->middleware('create-project');

Route::post('/proyectos', 'ProyectosController@store')
    ->name('proyectos.store');

Route::get('/porcentajes', 'StudentController@verPorcentajes')
    ->name('porcentajes');

Route::get('/documentacion', 'StudentController@subirDocumentacion')
    ->name('documentacion');

Route::get('/documentos/{documento}/documentos', 'StudentController@documentos')->name('documentos');
