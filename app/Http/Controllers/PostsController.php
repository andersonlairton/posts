<?php

namespace App\Http\Controllers;


use App\Http\Requests\PostsRequest;
use App\Posts;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function novo(){
        return view('formulario');
    }
    public function adiciona(PostsRequest $p){
        $p['id_usuario']=auth()->user()->id;
        Posts::create($p->all());
        
        return redirect()->action('PostsController@lista');
    }
    public function update(PostsRequest $id){
        $post = Posts::find($id->id);
        $post->update($id->all());
        return redirect()->action('PostsController@lista');
    }
    public function lista(){
        $id = auth()->user()->id;
       
        $posts = Posts::find($id->id_usuario);
        var_dump($posts);
        die;
        return view('listagem')->withPosts($posts);
    }
}
