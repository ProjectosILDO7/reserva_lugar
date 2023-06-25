<?php

namespace App\Exports;

use App\Models\Prova_atrasada;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class Prova_atrasadaExport implements ShouldAutoSize, FromView
{
    protected $idUser;

    public function __construct($id)
    {
        $this->idUser=$id;
    }
    
    public function view(): View
    { 
        return view('exports.provas_atrasoExport', [
            'provas' => Prova_atrasada::with('disciplinas')->where('user_id', $this->idUser)->orderBy('cobranca', 'asc')->get()
        ]);
    }
}
