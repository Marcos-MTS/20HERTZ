@extends('adminlte::page')

@section('title', 'Cadastro de Eventos')

@section('content_header')
<h2 class="text-primary">Informe os dados</h2>

@include('includes.alerts')
@stop

@section('content')

<div class="box">
    <div class="box-header">

    </div>
    <div class="box-body">

        <form method="POST" action="{{route('salvar.evento', $eventoD->id)}}"> 
            {!! csrf_field() !!}
            <div class="form-group">
                <label >Nome do Evento</label>
                <input name="titulo" type="text"  value="{{ old('titulo', $eventoD->titulo) }}" class="form-control">
            </div>

            <div class="form-group">
                <label >Decrição do Evento</label>
                <textarea rows="10" name="descricao" type="text" class="form-control">{{ old('descricao', $eventoD->descricao) }}</textarea>
            </div>
            <div class="form-group">
                <label >Data/Hora</label>
                <input type="date" class="" value="{{ old('data_evento', $eventoD->data_evento) }}" name="data_evento"> 
                <input type="time" id="appt" value="{{ old('hora_evento', $eventoD->hora_evento) }}" name="hora_evento">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success">Salvar</button>
            </div>
        </form>
    </div>
</div>
@stop