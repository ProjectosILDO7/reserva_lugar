<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reserva extends Model
{
    use HasFactory;
    protected $fillable=[
        'user_id',
        'transporte_id',
        'data'
    ];

    public function transportes(){
        return $this->belongsTo(Transporte::class, 'transporte_id');
    }


    public function clientes(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
