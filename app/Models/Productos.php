<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
    use HasFactory;
    protected $table = 'productos';

    public function getKeyName(){
        return "id";
    }

    public $fillable = [
        'id',
        'titulo',
        'descripcion',
        'img',
        'valor',
        'activo',
        'created_at',
        'updated_at'
    ];
}
