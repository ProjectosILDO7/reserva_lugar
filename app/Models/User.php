<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Notifications\ResetPasswordNotification;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

use Tymon\JWTAuth\Contracts\JWTSubject;


class User extends Authenticatable implements JWTSubject
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'numBI',
        'dataValidadeBI',
        'departamento_id',
        'image',
        'acesso',
        'password',
        'status'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

    public function departamentos()
    {
        return $this->belongsTo(Departamento::class, 'departamento_id');
    }
    public function senha()
    {
        return $this->hasOne(reserva_senha_funcionario::class, 'user_id');
    }

    public function assinaturas(){
        return $this->hasMany(Assinatura::class, 'user_id');
    }

    public function transportes(){
        return $this->hasMany(reserva::class, 'transporte_id');
    }
}
