<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maquinas extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_maqui',
        'nome',
        'local',
        'status',
        'dominio',
        'cpu',
        'ram',
        'gpu',
        'storage',
        'mac_address',
        'senha',
        'endereco',
        'restrita',
        'manut',
    ];


    public $timestamps = false;
}
