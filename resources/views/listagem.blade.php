@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        @if(session('success'))
        <div class="alert alert-success">
            {{session('success')}}
        </div>
        @endif
        @if(empty($posts))
        <div class="alert alert-danger">
            Você ainda nao tem posts cadastrados
        </div>
        @else
        <nav class="navbar navbar-light bg-light">
            <a class="navbar-brand">Meus Posts</a>
            <a href="{{route('posts.novo')}}" class="btn btn-info my-2 my-sm-0">Novo Post</a>
        </nav>
        <div class="card-body">
            <div class="card-deck">
                @foreach($posts as $p)
                <div class="col-sm-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{$p->titulo}}</h5>
                            <img class="card-img-top" src="{{$p->url_imagem}}" width="220" height="220" alt="Imagem de capa do card">
                            <p class="card-text">{{$p->descricao}}</p>
                            <a href="{{action('PostsController@editar',$p->id)}}" class="btn btn-secondary">Editar</a>
                            <a href="#" class="btn btn-danger" onclick="js:btnExcluir('{{$p->id}}')">Remover</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    function btnExcluir($id) {
        let redirect = "{{ action('PostsController@deletar', ['id' => ':id']) }}";
        redirect = redirect.replace(":id", $id);
        $direciona = confirm('Deseja remover este post?');
        if ($direciona == true) {
            location.href = redirect;
        }
    }
</script>
@endif
@stop