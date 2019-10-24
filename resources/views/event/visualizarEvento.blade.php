@extends('adminlte::page')

@section('title', 'Evento')

@section('content_header')


@stop

@section('content')

<div class="box">
    <div class="box-header">
        <h2 class="text-primary">{{$eventoD->titulo}}</h2>
    </div>
    <div class="box-body">
        {{$eventoD->descricao}}

        @foreach($eventoD->fotos as $foto)
        <br><br>
        @if($foto->nome != null)
        <img src="{{ url("storage/fotos/").'/'.$foto->nome }}" alt="Foto relacionado ao evento" style="width: 70%">
        @endif
        @endforeach

    </div>
</div>
@stop