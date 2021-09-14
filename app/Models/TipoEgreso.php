<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoEgreso extends Model
{
    use HasFactory;

    protected $fillable = ['descripcion', 'user_id'];

}
