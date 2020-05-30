<?php

namespace App\Http\Controllers;


use App\Http\Requests\PostsRequest;
use App\Posts;
use App\User;
use Illuminate\Http\Request;
use Illuminate\support\Facades\DB;

class PostsController extends Controller
{
    public function novo()
    {
        return view('formulario');
    }
    public function adiciona(PostsRequest $p)
    {
        $p['user_id'] = auth()->user()->id;
        Posts::create($p->all());

        return redirect()->action('PostsController@lista');
    }
    public function update(PostsRequest $id)
    {
        $post = Posts::find($id->id);
        $post->update($id->all());
        return redirect()->action('PostsController@lista');
    }
    public function lista()
    {
        $id_user = auth()->user()->id;
        $usuario = User::where('id', $id_user)->get()->first();
        $posts = $usuario->posts;
        return view('listagem')->withPosts($posts);
    }
    public function editar($id)
    {
        $post = Posts::find($id);
        return view('formulario')->withPost($post);
    }
}
