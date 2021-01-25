<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carros extends Model
{
    protected $fillable = ['nome_carro', 'proprietario', 'placa'];
}