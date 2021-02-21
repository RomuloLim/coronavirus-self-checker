<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pacient extends Model
{
    use HasFactory;

    protected $table = 'pacients';

    protected $fillable = ['name', 'year', 'cpf', 'wpp'];
}
