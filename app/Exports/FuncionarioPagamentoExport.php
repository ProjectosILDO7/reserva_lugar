<?php

namespace App\Exports;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class FuncionarioPagamentoExport implements ShouldAutoSize, FromView
{
    protected $idUser;

    public function __construct($id)
    {
        $this->idUser=$id;
    }
    
    public function view(): View
    { 
        return view('exports.FuncionarioPagamentoExport', [
            'funcionarios' => User::with('departamentos', 'assinaturas')->where('status', '!=', 1)->where('status', '!=', 'Inativo')->orderBy('name', 'asc')->get()
        ]);
    }
}
