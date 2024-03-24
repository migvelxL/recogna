<?php

/*namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maquina extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'image',
    ];
}

<?php
*/
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maquinas extends Model
{
    use HasFactory;

    protected $fillable = [
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
        'name',
        'description',
        'image',
    ];


    public $timestamps = false;
}
