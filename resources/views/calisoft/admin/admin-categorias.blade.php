@extends('layouts.dash')
@section('content')
<div class="col-md-12">
    @component('components.portlet', ['icon' => 'fa fa-pie-chart', 'title' => 'Categorias'])

    <div id="app">

        <!-- Table de categorias -->
        <div class="table-responsive">
            <table class="table table-hover table-bordered table-condensed">
                <thead>
                    <th class="text-center">Nombre</th>
                    <th class="text-center">Plataforma</th>
                    <th class="text-center">Modelado</th>
                    <th class="text-center">Base de datos</th>
                    <th class="text-center">Codificación</th>
                   
                    <th class="text-center">Operaciones</th>
                </thead>
                <tbody>
                    <tr v-for="categoria in categorias" class="text-center">
                        <td v-text="categoria.nombre"></td>
                        <td v-text="categoria.plataforma"></td>
                        <td v-text="categoria.modelado"></td>
                        <td></td>
                        <td></td>
                        
                        
                        <td class="text-center">
                        <popover title="Popover Title" placement="bottom">
                            <button type="button" class="btn btn-default btn-xs" data-role="trigger" title="Descripción" >
                            <span class="fa fa-map-o"></span>
                            </button>
                            <div slot="popover">
                                <h1>Hello world!</h1>
                            </div>
                        </popover>

                            <button class="editar-categoria btn blue btn-xs" title="Editar Categoria" @click.prevent="openEditModal(categoria)">
                                    <span class="glyphicon glyphicon-pencil"></span>
                                </button>
                            

                            <button class="editar-modal btn red btn-xs" title="Eliminar Categoria" @click.prevent="openDeleteModal(categoria)">
                                    <span class="glyphicon glyphicon-trash"></span>
                                </button>

                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="table-responsive">
                <table class="table table-hover table-bordered table-condensed">
                   
                    <tbody>
                        
                    </tbody>
                </table>
            </div>
            <!-- Tabla de Categorias -->
            <button type="button" data-toggle="modal" data-target="#crear-categoria" class="btn green-jungle center-block">
                    <i class="fa fa-plus"></i>
                    Crear Nueva Categoría
                </button>
        </div>

        <!--Modal de creacion de categoria -->
        <modal id="crear-categoria" title="Crear Categoria">
            <form @submit.prevent="store()">

                <div class="form-group">
                    <label for="nombre">Nombre de la Categoría </label>
                    <input type="text" name="nombre" class="form-control" v-model="newCategoria.nombre" required/>
                    <span v-if="formErrors['nombre']" class="error text-danger">
                            @{{formErrors.nombre[0]}}
                        </span>
                </div>

                <!-- Fila De Porcentajes -->
                <div class="row">

                    <div class="form-group col-sm-6">
                        <label for="plataforma">Evaluación de plataforma</label>
                        <input type="number" name="plataforma" class="form-control" v-model="newCategoria.plataforma" min="0" max="100" required/>
                        <span v-if="formErrors['plataforma']" class="error text-danger">
                                @{{formErrors.plataforma[0]}}
                            </span>
                    </div>

                    <div class="form-group col-sm-6">
                        <label for="modelado">Evaluación del modelado</label>
                        <input type="number" name="modelado" class="form-control" v-model="newCategoria.modelado" min="0" max="100" required/>
                        <span v-if="formErrors.modelado" class="error text-danger">
                                @{{formErrors.modelado}}
                            </span>
                    </div>
                </div>

                <div class="row">

                    <div class="form-group col-sm-6">
                        <label for="despliegue">Diagrama de despliegue</label>
                        <input type="number" name="despliegue" class="form-control" v-model="newCategoria.despliegue" min="0" max="100" required/>
                        <span v-if="formErrors['despliegue']" class="error text-danger">
                                @{{formErrors.despliegue[0]}}
                            </span>
                    </div>

                    <div class="form-group col-sm-6">
                        <label for="entidad_relacion">Modelo Entidad Relación</label>
                        <input type="number" name="entidad_relacion" class="form-control" v-model="newCategoria.entidad_relacion" min="0" max="100" required/>
                        <span v-if="formErrors['entidad_relacion']" class="error text-danger">
                                @{{formErrors.entidad_relacion[0]}}
                            </span>
                    </div>

                </div>

                <div class="row">

                    <div class="form-group col-sm-6">
                        <label for="clases">Diagrama de clases</label>
                        <input type="number" name="clases" class="form-control" v-model="newCategoria.clases" min="0" max="100" required/>
                        <span v-if="formErrors['clases']" class="error text-danger">
                                @{{formErrors.clases[0]}}
                            </span>
                    </div>

                    <div class="form-group col-sm-6">
                        <label for="actividades">Diagrama de actividades</label>
                        <input type="number" name="actividades" class="form-control" v-model="newCategoria.actividades" min="0" max="100" required/>
                        <span v-if="formErrors['actividades']" class="error text-danger">
                                @{{formErrors.actividades[0]}}
                            </span>
                    </div>

                </div>

                <div class="row">

                    <div class="form-group col-sm-6">
                        <label for="sequencia">Diagrama de secuencias</label>
                        <input type="number" name="sequencia" class="form-control" v-model="newCategoria.sequencia" min="0" max="100" required/>
                        <span v-if="formErrors['sequencia']" class="error text-danger">
                                @{{formErrors.sequencia[0]}}
                            </span>
                    </div>

                    <div class="form-group col-sm-6">
                        <label for="uso">Diagrama de casos de uso.</label>
                        <input type="number" name="uso" class="form-control" v-model="newCategoria.uso" min="0" max="100" required/>
                        <span v-if="formErrors['uso']" class="error text-danger">
                                @{{formErrors.uso[0]}}
                            </span>
                    </div>

                </div>
                <div class="modal-footer">
                    <div class="form-group">
                        <button type="submit" class="btn green-jungle"><i class="fa fa-plus"></i>Crear Categoría</button>
                        <button type="button" class="btn red" data-dismiss="modal">
                            <i class="fa fa-ban"></i>
                            Cancelar
                        </button>
                    </div>
                </div>
            </form>
        </modal>
        <!-- Fin Modal de creacion de categoria -->

        <!--Comienzo Modal de edicion -->
        <modal id="editar-categoria" title="Editar Categoria">
            <form @submit.prevent="update(fillCategoria.PK_id)">

                <div class="form-group">
                    <label for="title">Nombre de la Categoría </label>
                    <input type="text" name="nombre" class="form-control" v-model="fillCategoria.nombre" required/>
                    <span v-if="formErrorsUpdate['nombre']" class="error text-danger">
                            @{{formErrorsUpdate.nombre[0]}}
                        </span>
                </div>

                <div class="row">
                    <div class="form-group col-sm-6">
                        <label for="title">Evaluación de la plataforma</label>
                        <input type="number" name="plataforma" class="form-control" v-model="fillCategoria.plataforma" min="0" max="100" required/>
                        <span v-if="formErrorsUpdate['plataforma']" class="error text-danger">
                                @{{formErrorsUpdate.plataforma[0]}}
                            </span>
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="title">Evaluación del modelado</label>
                        <input type="number" name="modelado" class="form-control" v-model="fillCategoria.modelado" min="0" max="100" required/>
                        <span v-if="formErrorsUpdate['modelado']" class="error text-danger">
                                @{{formErrorsUpdate.modelado[0]}}
                            </span>
                    </div>
                </div>

                <div class="row">

                    <div class="form-group col-sm-6">
                        <label for="title">Diagrama de clases</label>
                        <input type="number" name="clases" class="form-control" v-model="fillCategoria.clases" min="0" max="100" required/>
                        <span v-if="formErrorsUpdate['clases']" class="error text-danger">
                                @{{formErrorsUpdate.clases[0]}}
                            </span>
                    </div>

                    <div class="form-group col-sm-6">
                        <label for="title">Diagrama de despliegue</label>
                        <input type="number" name="despliegue" class="form-control" v-model="fillCategoria.despliegue" min="0" max="100" required/>
                        <span v-if="formErrorsUpdate['despliegue']" class="error text-danger">
                                @{{formErrorsUpdate.despliegue[0]}}
                            </span>
                    </div>

                </div>

                <div class="row">

                    <div class="form-group col-sm-6">
                        <label for="title">Modelo Entidad Relación</label>
                        <input type="number" name="entidad_relacion" class="form-control" v-model="fillCategoria.entidad_relacion" min="0" max="100" required/>
                        <span v-if="formErrorsUpdate['entidad_relacion']" class="error text-danger">
                                @{{formErrorsUpdate.entidad_relacion[0]}}
                            </span>
                    </div>

                    <div class="form-group col-sm-6">
                        <label for="title">Diagrama de actividades</label>
                        <input type="number" name="actividades" class="form-control" v-model="fillCategoria.actividades" min="0" max="100" required/>
                        <span v-if="formErrorsUpdate['actividades']" class="error text-danger">
                                @{{formErrorsUpdate.actividades[0]}}
                            </span>
                    </div>

                </div>

                <div class="row">

                    <div class="form-group col-sm-6">
                        <label for="title">Diagrama de secuencias</label>
                        <input type="number" name="sequencia" class="form-control" v-model="fillCategoria.sequencia" min="0" max="100" required/>
                        <span v-if="formErrorsUpdate['sequencia']" class="error text-danger">
                                @{{formErrorsUpdate.sequencia[0]}}
                            </span>
                    </div>

                    <div class="form-group col-sm-6">
                        <label for="title">Diagrama de casos de uso.</label>
                        <input type="number" name="uso" class="form-control" v-model="fillCategoria.uso" min="0" max="100" required/>
                        <span v-if="formErrorsUpdate['uso']" class="error text-danger">
                                @{{formErrorsUpdate.uso[0]}}
                            </span>
                    </div>

                </div>
                <div class="modal-footer">
                    <div class="form-group">
                        <button type="submit" class="btn green-jungle">
                            <i class="fa fa-edit"></i>Editar Categoría
                        </button>
                        <button type="button" class="btn red" data-dismiss="modal">
                            <i class="fa fa-ban"></i>Cancelar
                        </button>
                    </div>
                </div>

            </form>
        </modal>
        <!-- Fin de Modal de edicion -->

        <!-- inicio modal eliminar-->
        <modal id="eliminar-categoria" title="Eliminar Categoria">
            ¿Desea eliminar la categoría @{{elimiCategoria.nombre}}?

            <div class="modal-footer" slot="footer">
                <button class="btn green-jungle" @click="destroy(elimiCategoria)">
                    <i class="fa fa-edit"></i>Eliminar Categoria
                </button>
                <button type="button" class="btn red" data-dismiss="modal">
                    <i class="fa fa-ban"></i>Cancelar
                </button>
            </div>
        </modal>
        <!-- Fin Modal Eliminar -->

        @include('partials.modal-help-categoria')

        </div>

    </div>

    @endcomponent

</div>

@endsection

@push('functions')
<script src="/js/categorias.js"></script>
@endpush
