<?php

namespace App\Exports;

use App\Models\Emolumento;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class emolumentoExport implements ShouldAutoSize, FromView
{
    protected $idUser;

    public function __construct($id)
    {
        $this->idUser=$id;
    }
    
    public function view(): View
    { 
        return view('exports.emolumentoExport', [
            'emolumentos' => Emolumento::where('user_id', $this->idUser)->orderBy('emolumento', 'asc')->get()
        ]);
    }
}
