<?php

namespace App\Exports;

use App\Models\Confirmacao;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class confirmacaoExport implements ShouldAutoSize, FromView
{
    protected $idUser;

    public function __construct($id)
    {
        $this->idUser=$id;
    }
    
    public function view(): View
    { 
        return view('exports.confirmacaoExport', [
            'confirmacaos' => Confirmacao::with('graduacoes')->where('user_id', $this->idUser)->orderBy('cobranca', 'asc')->get()
        ]);
    }
}
