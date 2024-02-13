<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'titulo',
        'autor',
        'data_lancamento',
        'num_paginas',
        'genero'
    ];
}