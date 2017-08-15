<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */

Route::resource('notificaciones', 'NotificationController', [
    'only' => ['index', 'store']
]);


Route::resource('semilleros', 'SemilleroController', [
    'only' => ['index', 'store', 'update', 'destroy'],
]);

Route::resource('grupos-de-investigacion', 'GrupoDeInvestigacionController', [
    'only' => ['index', 'store', 'update', 'destroy'],
]);

Route::resource('categorias', 'CategoriaController', [
    'only' => ['index', 'store', 'update', 'destroy'],
]);

Route::resource('usuarios', 'UserController', [
    'only' => ['index', 'store', 'update', 'destroy'],
]);

Route::resource('documentacion', 'DocumentoController', [
    'only' => ['index', 'store', 'update', 'destroy'],
]);

Route::resource('tdocumentos', 'TiposDocumentoController', [
    'only' => ['index', 'store', 'update', 'destroy'],
]);

Route::get('tdocumentos/{tdocumento}/componentes', 'TiposDocumentoController@getComponents')
    ->name('tdocumentos.componentes');

Route::get('/user/proyectos', 'UserController@proyectos');

Route::prefix('student')->group(function () {
    Route::get('search', 'UserController@searchFreeStudents');
    Route::get('invitations', 'UserController@invitaciones');
});

Route::get('/evaluator/search', 'UserController@searchEvaluators');

Route::resource('invitations', 'InvitationController', [
    'only'       => ['store', 'update', 'destroy'],
    'parameters' => [
        'invitations' => 'proyecto',
    ],
]);

Route::resource('componentes', 'ComponenteController', [
    'only' => ['store', 'update', 'destroy', 'index'],
]);

// Inicio proyectos
Route::prefix('proyectos/{proyecto}')->group(function () {
    Route::put('propuesta', 'ProyectoController@propuesta');
    Route::put('aceptar', 'ProyectoController@aceptar');
    Route::put('asignar', 'ProyectoController@asignar');
    Route::get('documentacion', 'ProyectoController@documentos');
});

Route::resource('proyectos', 'ProyectoController', [
    'only' => ['index', 'update', 'destroy', 'show'],
]);

// Fin proyectos

// subir documentación estudiante
Route::post('file', 'DocumentoController@postfile');
Route::get('seeFile/{file}', 'DocumentoController@getfile');
Route::get('downloadFile/{file}', 'DocumentoController@download');
// fin subir documentación estudiante
Route::resource('basedatos', 'BaseDatosController', [
    'only' => ['index', 'store', 'update', 'destroy'],
]);

Route::resource('codificacion', 'ItemsCodificacionController', [
    'only' => ['index','update'],
]);
