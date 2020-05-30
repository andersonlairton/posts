@extends('layouts.app')

@section('content')

<div class="container">
    <div class="card">
        <div class="card-header">
            @if(empty($post))Novo
            @else
            Editar
            @endif
            Post
        </div>
        <div class="card-body">
            @if(count($errors)>0)
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form action="{{empty($post)?route('posts.adiciona'):action('PostsController@update',$post->id)}}" method="POST">
                @csrf
                <div class="form-group">
                    <div class="form-group">
                        <label>Titulo</label>
                        <input type="text" class="form-control" name="titulo" value="{{!empty($post->titulo)?$post->titulo:old('titulo')}}" placeholder="Digite o titulo do post">
                    </div>
                    <div class="form-group">
                        <label>Descricão</label>
                        <textarea class="form-control" name="descricao" rows="3" placeholder="Digite a descrição do post">{{!empty($post->descricao)?$post->descricao:old('descricao')}}</textarea>

                    </div>
                    <div class="form-group">
                        <label>Url imagem</label>
                        <input type="text" class="form-control" name="url_imagem" value="{{!empty($post->url_imagem)?$post->url_imagem:old('url_imagem')}}" placeholder="Entre com a url da imagem">
                    </div>
                </div>
                <a href="{{route('posts.listagem')}}" class="btn btn-secondary">Voltar</a>
                <button type="submit" class="btn btn-primary">Salvar</button>
            </form>
        </div>
    </div>
    @stop