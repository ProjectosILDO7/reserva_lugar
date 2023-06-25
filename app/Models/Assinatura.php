<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assinatura extends Model
{
    use HasFactory;
    
    protected $fillable=[
        'user_id',
        'data_assinatura'
    ];

    public function total_Presencas(){
        return $this->belongsTo(totalPresenca::class, 'assinaturas_id');
    }
}
