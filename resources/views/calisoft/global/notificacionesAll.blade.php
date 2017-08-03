@extends('layouts.dash')

@section('content')

    <div class="col-md-12">
        @component('components.portlet', ['icon' => 'fa fa-bell', 'title' => 'Notificaciones'])
            <div id="app">
                <br>
                <div class="panel panel-primary">

                    <div class="portlet-body">
                                    <div class="mt-element-list">
                                        <div class="mt-list-head list-news ext-1 font-white bg-yellow-crusta">
                                            <div class="list-head-title-container">
                                                <h3 class="list-title">Historial</h3>
                                            </div>
                                            <div class="list-count pull-right bg-yellow-saffron">@{{ notificaciones.length }}</div>
                                        </div>
                                        <div class="mt-list-container list-news ext-2">
                                            <ul>
                                                <li class="mt-list-item" v-for="notificacion in notificaciones">

                                                    <!--Rutas de las diferentes notificaciones-->                                                    
                                                    <div v-if="notificacion.data.type === 'proyecto-creado'" class="list-icon-container">
                                                        <a href="/proyecto">
                                                            <i class="fa fa-angle-right"></i>
                                                        </a>
                                                    </div>
                                                    <div v-if="notificacion.data.type === 'proyecto-denegado'" class="list-icon-container">
                                                        
                                                    </div>
                                                    <div v-if="notificacion.data.type === 'invitacion-recibida'" class="list-icon-container">
                                                        <a href="#">
                                                            <i class="fa fa-angle-right"></i>
                                                        </a>
                                                    </div>
                                                    <!--Fin de rutas de las diferentes notificaciones-->
                                                    <!--Imagenes de perfil-->        
                                                    <div class="list-thumb">
                                                        <a v-if="notificacion.data.foto" href="javascript:;">
                                                            <img class="img-circle" alt="" src="/img/default.png" />
                                                        </a>
                                                        <a v-else href="javascript:;">
                                                            <img class="img-circle" alt="" src="/img/default.png" />
                                                        </a>
                                                    </div>
                                                    <!--Fin imagenes de perfil-->    
                                                    <!--Texto según notificación-->    
                                                    <div class="list-datetime bold uppercase font-yellow-casablanca" v-text="notificacion.created_at"></div>
                                                    <div class="list-item-content">
                                                        <h3 class="uppercase bold">
                                                            <strong v-text="notificacion.data.type"></strong>
                                                        </h3>
                                                        <p v-if="notificacion.data.type === 'proyecto-creado'">Nueva propuesta de proyecto: <strong>@{{notificacion.data.proyecto}}</strong></p>
                                                        <p v-if="notificacion.data.type === 'proyecto-denegado'">Se eliminó el proyecto: <strong>@{{notificacion.data.proyecto}}</strong>. Por la siguienre razón: <strong>@{{notificacion.data.text}}</strong> </p>
                                                        <p v-if="notificacion.data.type === 'invitacion-recibida'"><strong>@{{notificacion.data.user}}</strong> te ha invitado a ser parte del proyecto: <strong>@{{notificacion.data.proyecto}}</strong></p>
                                                    </div>
                                                    <!--Fin texto según notificación-->    
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                </div>

           </div>

        @endcomponent

    </div>
@endsection

@push('styles')
    <link href="../assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="/assets/global/plugins/bootstrap-toastr/toastr.min.css">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
    <link href="../assets/pages/css/profile.min.css" rel="stylesheet" type="text/css" />

@endpush

@push('functions')
    <script src="../assets/global/plugins/bootstrap-toastr/toastr.min.js"></script>
    <script src="/js/notificaciones.js"></script>
@endpush



@push('plugins')
    <script src="../assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>
    <script src="../assets/global/plugins/bootstrap-selectsplitter/bootstrap-selectsplitter.min.js" type="text/javascript"></script>
     <script src="../assets/pages/scripts/components-bootstrap-select-splitter.min.js" type="text/javascript"></script>

@endpush
