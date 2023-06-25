<?php

namespace App\Exports;

use App\Models\Multa;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class multaExport implements ShouldAutoSize, FromView
{
    protected $idUser;

    public function __construct($id)
    {
        $this->idUser=$id;
    }
    
    public function view(): View
    { 
        return view('exports.multaExport', [
            'multas' => Multa::with('cursos')->where('user_id', $this->idUser)->orderBy('cobranca', 'asc')->get()
        ]);
    }
}
