<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Distribuidora extends Model
{
    protected $table = 'distribuidoras';
    protected $fillable = ['nome','descricao'];
}
