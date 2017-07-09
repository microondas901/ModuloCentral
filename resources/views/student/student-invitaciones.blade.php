@extends('layouts.student-dash')

@section('content')
    <div class="col-md-12">
        @component('components.portlet', ['icon' => 'fa fa-home', 'title' => 'Invitaciones'])
          <div id="app" class="row">

            <p class="text-center" v-if="accepted.nombre">
                Haz aceptado la invitacion del proyecto
                <strong>@{{accepted.nombre}}</strong><br>
                Ya puedes ver el proyecto <a href="{{ route('student') }}">Aqui.</a>
            </p>

            <ul class="list-group col-md-8 col-md-offset-2" v-else>
              <li class="list-group-item" v-for="proyecto in invitaciones">
                <div class="row">
                  <div class="col-sm-8 col-xs-12 text-center">
                    El proyecto <strong>@{{ proyecto.nombre }}</strong> te ha invitado a ser parte
                    de su equipo de trabajo
                  </div>
                  <div class="col-sm-4 col-xs-12 text-center">
                      <button class="btn blue" @click="accept(proyecto)">Aceptar</button>
                      <button class="btn" @click="reject(proyecto)">Rechazar</button>
                  </div>
                </div>
              </li>
            </ul>

          </div>
        @endcomponent
    </div>

@endsection

@push('functions')
  <script src="/js/invitaciones.js"></script>
@endpush
