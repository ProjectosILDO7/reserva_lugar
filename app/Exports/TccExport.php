<?php

namespace App\Exports;

use App\Models\Tcc;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class TccExport implements ShouldAutoSize, FromView
{
    protected $idUser;

    public function __construct($id)
    {
        $this->idUser=$id;
    }
    
    public function view(): View
    { 
        return view('exports.tccExport', [
            'tccs' => Tcc::with('cursos')->where('user_id', $this->idUser)->orderBy('cobranca', 'asc')->get()
        ]);
    }
}
