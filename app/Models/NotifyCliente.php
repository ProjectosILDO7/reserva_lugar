<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotifyCliente extends Model
{
    use HasFactory;
    protected $fillable=[
        'cliente_id',
        'user_id',
        'conteudo',
        'status'
    ];
}
