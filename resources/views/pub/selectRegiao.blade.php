@extends('adminlte::page')

@section('title', 'Selecione seu Estado e Cidade')

@section('content_header')
<h2 class="text-primary">Vamos Começar...</h2>
<h3>Selecione seu Estado e Cidade</h3>
@include('includes.alerts')
@stop

@section('content')

<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>

<div class="box-header">

    <form action="{{route('salvar.publicador')}}" method="POST" class="form form-group">
        {{ csrf_field() }}
        <div class="form-group col-lg-3">
            <select class="form-control estado" id="estado" name="estado_cod">
                <option value="">Selecione seu Estado</option>
                @foreach($estados as $estado)
                <option value="{{$estado->id}}">{{$estado->nome}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group col-lg-3">
            <select class="form-control cidade" id="cidade" name="cidade_cod">
                <option value="">Selecione sua Cidade</option>
            </select>
        </div>
        <div class="form-group col-lg-3">
            <button class="btn btn-primary" id="teste">Salvar</button>
        </div>
    </form>

</div>

<script type="text/javascript">

$("#estado").change(function () {

    var url = '{{ route("regiao.list.cidades", ":id") }}';
    url = url.replace(':id', $(this).val());
    $(".cidade").html('<option>Carregando...</option>');
    $(".cidade").prop('disabled', true);

    $.get(url, function (data) {
        $(".cidade").html(data);
        $(".cidade").prop('disabled', false);

    });
});

</script>

@stop



