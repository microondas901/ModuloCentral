@extends('layouts.dash')

@section('content')
    <div class="col-md-12">
        @component('components.portlet', [
            'icon' => 'fa fa-files-o', 
            'title' => 'Modelación: ' . $proyecto->nombre 
        ])

        <div id="app">
            <document-list :documentos="documentos" :tipos="tipos">
                <template slot="buttons" scope="props">
                    <a :href="'/evaluar/' + props.doc.PK_id" title="calificar" class="btn btn-warning btn-xs">
                        <span class="fa fa-asterisk"></span>
                    </a>
                </template>
            </document-list>
        </div>
        
            
        @endcomponent
    </div>
@endsection

@push('functions')
    <script>window.proyectoId = {{ $proyecto->PK_id }};</script>
    <script src="/assets/global/plugins/jquery.media.js"></script>
    <script src="/js/modelacion.js"></script>
@endpush