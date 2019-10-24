@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
<h1>Meus Eventos</h1>
@stop


@section('content')


<div class="box-header">
    <a href="{{ route('cadastro.evento')}}" class="btn btn-primary">Novo Evento</a>

</div>

@include('includes.alerts')


<div class="box-body">
    <table class="table table-bordered table-hover">
        <thead>
            <tr style="background:  #ddd;">
                <th>Id</th>
                <th>Título</th>
                <th>Data do Evento</th>
                <th>Hora do Evento</th>
                <th>Opções</th>
            </tr>
        </thead>

        <tbody>
            @forelse($eventos as $evento)
       
            <tr style="background:  #e8e8e8;">
                <td>{{ $evento->id }}</td>
               <td> <a href="{{route('visualizar.evento', $evento->id)}}"> {{ $evento->titulo }}</a></td>
                <td>{{ \Carbon\Carbon::parse($evento->data_evento)->format('d/m/Y')}}</td>
                <td>{{$evento->hora_evento }}</td>
                <td>
                    <a href="{{route('editar.evento', $evento->id)}}">Editar</a> - 
                    <a href="{{route('excluir.evento', $evento->id)}}">Excluir</a>
                </td>

            </tr>
         
            @empty
            @endforelse

        </tbody>


    </table>

</div>

@stop





