<?php

namespace App\Http\Controllers;

use App\Models\reserva_senha_estudante;
use App\Models\reserva_senha_funcionario;
use Illuminate\Http\Request;

class reserva_senha_control extends Controller
{
    //
    public function show(){
        $admin_id = Auth()->user()->id;
        $senhas = reserva_senha_funcionario::where('organization_id', $admin_id)->get();
        return response()->json($senhas);
    }
}
