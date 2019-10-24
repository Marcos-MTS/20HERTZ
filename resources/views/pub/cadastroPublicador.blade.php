@extends('layouts.base')

@section('title', 'Meu Perfil')

@section('content')

<h1>Meu Perfil</h1>


@include('includes.alerts')

<form action="{{route('cadastrar.publicador')}}" method="POST" >

    {!! csrf_field() !!}
    

    <div class='form-group'>
        <label for="name">Nome</label>
        <input value="" type="text" name="name" placeholder="Nome" class="form-control">
    </div>
    <div class='form-group'>
        <label for="name">E-mail</label>
        <input value="" type="email" name="email" placeholder="E-mail" class="form-control">
    </div>
    <div class='form-group'>
        <label for="name">Senha</label>
        <input type="password" name="password" placeholder="Senha" class="form-control">
    </div>

<!--    <div class='form-group'>

        <label for="name">Imagem:</label>
        <input type="file" name="image" class="form">
    </div>-->

    <div class='form-group'>
        <button type="submit" class="btn btn-info">Cadastrar</button>
    </div>
</form>


@endsection