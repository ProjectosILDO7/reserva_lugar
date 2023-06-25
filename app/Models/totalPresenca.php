<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class totalPresenca extends Model
{
    use HasFactory;
    protected $fillable=[
        'assinatura_id',
        'mes',
        'ano',
        'total'
    ];

    public function totalPresencas(){
        return $this->belongsTo(User::class);
    }
}
