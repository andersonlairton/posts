<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    protected $table = 'posts';
    public $timestamps=true;
    protected $fillable = ['titulo','descricao','url_imagem','user_id'];
}
