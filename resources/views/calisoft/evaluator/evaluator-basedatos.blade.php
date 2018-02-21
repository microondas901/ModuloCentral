@extends('layouts.dash')

@section('content')
    <div class="col-md-12">
        @component('components.portlet', [
            'icon' => 'fa fa-files-o', 
            'title' => 'Nomenclatura: ' . $proyecto->nombre
            ])
            <div id="app">
                <div class="row">
                    <div class="col-md-6">
                        <h5><center><strong>Codigo SQL</strong></center></h5>
                        <code-preview url="{{$proyecto->sql->url}}" prefix="/api/sql/preview/" mode="text/x-sql"></code-preview>                  
                    </div>
                    <div class="col-md-6">
                            <button type="button"  class="btn green-jungle center-block">
                                    <i class="fa fa-arrow-circle-right"></i>
                                    Calificación Automatica
                                </button>
                        <h5><center><strong>Información</strong></center></h5>
                        <tabla-componente ></tabla-componente>  
                        <form method="POST" action="{{route('observacion-bd',['sql'=>$proyecto->sql->PK_id])}}">
                            {{csrf_field()}}               
                                    @component('components.textarea',[
                                        'name'=>'observacion',
                                        'attributes'=>'required',
                                        'label'=>'Comentario',
                                        'value'=>$proyecto->sql->observacion,
                                    ])
                                    @endcomponent
                            <button type="submit"  class="btn green-jungle center-block">
                            <i class="fa fa-edit"></i> Aceptar Calificación</button>
                        </form>                        
                    </div>
                </div>
                @include('partials.modal-help-calificar-bd')
            </div>                
        @endcomponent  
    </div>
@endsection
@push('functions')
    <script>window.archivoId = "{{ $proyecto->sql->PK_id }}"</script>
    <script src="/assets/global/plugins/jquery.media.js"></script>
    <script src="/js/base-datos.js"></script>
@endpush