<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Indicacoes extends Model
{
    use HasFactory;
    protected $table = 'indicacoes';
    protected $fillable = [
        'nome',
        'cpf',
        'telefone',
        'email',
        'status_id'
    ];
    // protected $attributes = [
    //     'status_id' => 1
    // ];
}