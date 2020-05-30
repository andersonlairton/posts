@extends('layouts.app')

@section('content')
<div class="container">
    teste
    <div class="row justify-content-center">
        <div class="col-md-8">


            <div class="card">

                <h1>@if(empty($p))Novo
                    @else
                    Editar
                    @endif
                    post
                </h1>
                <?php $erros = [0]; ?>
                <!--@if(count($erros)>0)
                <div class="alert alert-danger">
    <ul>
        
    </ul>
</div>
@endif
-->
                <div class="card-body">


                    <form action="{{empty($p)?route('posts.adiciona'):action('PostsController@update',$p->id)}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Titulo</label>
                            <input type="text" class="form-group" name="titulo" value="{{!empty($p->titulo)?$p->titulo:old('titulo')}}">
                        </div>
                        <div class="form-group">
                            <label>Descricão</label>
                            <input type="text" class="form-group" name="descricao" value="{{!empty($p->descricao)?$p->descricao:old('descricao')}}">
                        </div>
                        <div class="form-group">
                            <label>Url imagem</label>
                            <input type="text" class="form-group" name="url_imagem" value="{{!empty($p->url_imagem)?$p->url_imagem:old('url_imagem')}}">
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Salvar</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
@stop