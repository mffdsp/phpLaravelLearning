<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    use HasFactory;

    protected $fillable = ['nome', 'email', 'cpf', 'turmas', 'imagem'];

    protected $primaryKey = 'id';
    public $incrementing = true;
}
