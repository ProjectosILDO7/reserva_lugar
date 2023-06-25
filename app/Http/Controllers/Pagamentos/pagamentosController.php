<?php

namespace App\Http\Controllers\Pagamentos;

use App\Http\Controllers\Controller;
use App\Models\Pagamentos\pag_mensalidade;
use Illuminate\Http\Request;

class pagamentosController extends Controller
{
    protected $user_id;

    public function __construct()
    {
        $this->user_id = Auth()->user()->id;
    }


    public function mensalidade(Request $request)
    {

        setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
        date_default_timezone_set('Africa/Luanda');
        $dataPagamento= strftime('%B de %Y', strtotime($request->picked));

        //$dataPagamento = date('M-Y', strtotime($request->picked));
        $estudanteID = $request->estudante_id;
        $consulta = pag_mensalidade::where('user_id', $this->user_id)->where('estudante_id', $estudanteID)->where('data_pagamento', ucfirst($dataPagamento))->get();

        if (count($consulta) == 0) {
            $create = pag_mensalidade::create([
                'user_id' => $this->user_id,
                'estudante_id' => $request->estudante_id,
                'valor_mensalidade' => $request->cobrancaInfo,
                'data_pagamento' => ucfirst($dataPagamento),
            ]);

            if (isset($create)) {
                return response()->json([
                    'mensalidade' => 'Mensalidade do mês em causa foi paga com sucesso!'
                ], 200);
            } else {
                return response()->json([
                    'errors' => ['mensalidade' => 'Erro durante o processo de registo do'],
                ], 422);
            }
        } else {
            return response()->json([
                'errors' => ['mensalidade' => 'Esse estudante já efectuou o pagamento actual'],
            ], 422);
        }
    }
}
