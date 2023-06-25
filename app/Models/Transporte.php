<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transporte extends Model
{
    use HasFactory;
    protected $fillable=[
        'transporte',
        'modelo',
        'total_lugares',
        'preco_por_lugar',
    ];

    public function users(){
        return $this->belongosTo(User::class);
    }
}
