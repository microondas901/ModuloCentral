@extends('pdf.master')

@section('body')
    <div class="text-center">
        <h3>{{ $proyecto->nombre }} - Evaluación de modelado</h3>
        <hr>
    </div>
    
    @foreach($documentos as $documento)
        @if($documento->evaluaciones->count())
            <div class="panel panel-success">
                <div class="panel-heading">
                    {{ $documento->nombre }}
                    <i class="pull-right">
                        {{ $documento->tipo->nombre }}
                        ({{ round($documento->evaluaciones->avg('checked') * 100)}}%)
                    </i>
                </div>
                <div class="panel-body">
                    @each('pdf.sections.document', $documento->evaluaciones->groupBy('evaluador.name'), 'evaluaciones')
                </div>
            </div>
        @endif  
    @endforeach
    <table class="table table-borderless">
        <tbody>
            <tr class="info">
                <th>Promedio General Modelacion</th>
                <th>{{ $total }}%</th>
            </tr>
        </tbody>
    </table>
@endsection