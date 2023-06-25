<?php

namespace App\Exports;

use App\Models\Uniforme;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class uniformeExport implements ShouldAutoSize, FromView
{
    protected $idUser;

    public function __construct($id)
    {
        $this->idUser=$id;
    }
    
    public function view(): View
    { 
        return view('exports.uniformeExport', [
            'uniformes' => Uniforme::where('user_id', $this->idUser)->orderBy('descricao', 'asc')->get()
        ]);
    }

}
