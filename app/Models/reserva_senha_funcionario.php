<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reserva_senha_funcionario extends Model
{
    use HasFactory;
    protected $fillable=[
        'user_id',
        'organization_id',
        'senha_reserva'
    ];
}
