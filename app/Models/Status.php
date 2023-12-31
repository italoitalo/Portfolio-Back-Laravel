<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;
    protected $table = 'status';
    protected $fillable = [
        'descricao'

    ];
    protected $attributes = [
        'descricao' => 'INICIADA',
    ];
    protected $rules = [
        'descricao' => 'in:INICIADA,FINALIZADA,EM PROCESSO',
    ];
}